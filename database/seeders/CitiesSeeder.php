<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pathFile = "city.list.json";
        if(Storage::exists($pathFile)){
            $file = Storage::get($pathFile);
            $content = json_decode($file);
            $j=0;
            $max = 200;
            $count = count($content);

            while($j<$count){
                $cities = [];
                if($j<$count && $j+$max>$count) $max=$count-$j;
                for($i=$j;$i<$j+$max; $i++){
                    $cities[] = [
                        'id' => $content[$i]->id,
                        "name" => $content[$i]->name,
                        "state" => $content[$i]->state,
                        "country" => $content[$i]->country,
                        "coordLon" => $content[$i]->coord->lon,
                        "coordLat" => $content[$i]->coord->lat
                    ];
                }
                $j+=$max;
                DB::table("cities")->insert($cities);
            }
        }
    }
}
