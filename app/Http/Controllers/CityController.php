<?php

namespace App\Http\Controllers;

use App\Repository\CityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{

    private CityRepository $cityRepository;

    public function __construct(CityRepository $cityReposiotry){
        $this->cityRepository = $cityReposiotry;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->get("nameSearch");

        $resultPaginator = $this->cityRepository->filterBy($name);
        $resultPaginator->appends(["nameSearch" => $name]);

        return view("city.list", ["myCities" => Auth::user()->cities()->get(), "cities" => $resultPaginator, "nameSearch" => $name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $city = $this->cityRepository->get($id);

        return view("city.show", ["city" => $city, "userHasCity" => Auth::user()->hasCity($id), "weathers" => $city->weathers()->orderBy("created_at")->get()]);
    }
}
