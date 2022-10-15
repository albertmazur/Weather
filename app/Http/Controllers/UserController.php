<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyCityRequest;
use App\Repository\CityRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Url;

class UserController extends Controller
{

    private CityRepository $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("user.show", ["user" => Auth::user()]);
    }

    public function myCity(){
        //dd(Auth::user()->cities()->get());
        return view("user.city.list", ["cities" => Auth::user()->cities()->get()]);
    }

    public function addCity(MyCityRequest $request){
        $data = $request->validated();
        $cityId = $data["cityId"];
        $check =  Auth::user()->addCity($this->cityRepository->get($cityId));

        $p = "";
        $message = "";

        if($check){
           $p ="success";
           $message = "Dodano do listy";
        }
        else{
            $p = "error";
            $message = "Nie można już dodać";
        }

        return back()->with($p, $message);
    }

    public function removeCity(MyCityRequest $request){
        $data = $request->validated();
        $cityId = $data["cityId"];
        Auth::user()->removeCity($this->cityRepository->get($cityId));

        return back();
    }
}
