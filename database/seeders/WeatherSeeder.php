<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::whereIn("id", function ($query){
            $query->select("city_id")
            ->from("city_user");
        })->get();

        $weathers = [];
        $j=0;
        $max = 200;
        $count = count($cities);

        while($j<$count){
            $weathers = [];
            if($j<$count && $j+$max>$count) $max=$count-$j;
            for($i=$j;$i<$j+$max; $i++){
                $response = Http::get("https://api.openweathermap.org/data/2.5/weather", ["lat" => $cities[$i]->coordLat, "lon" => $cities[$i]->coordLon, "appid" => config("weather.api")]);
                $dane = $response->json();
                $weathers[] = [
                    "temperature" => $dane["main"]["temp"],
                    "humidity" => $dane["main"]["humidity"],
                    "city_id" => $cities[$i]->id,
                    "created_at" => Carbon::now()
                ];
            }
            $j+=$max;
            DB::table("weather")->insert($weathers);
        }
    }
}
