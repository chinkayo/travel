<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MtbArea;

class AreasController extends Controller
{

    public function get_areas()
    {
        $result = array();

        $areas = MtbArea::all();

        foreach($areas as $area) {

            $one_area = array();
            $one_area["id"] = $area->id;
            $one_area["area"] = $area->value;
            $one_area["locations"] = array();

            foreach($area->locations as $location) {
                $one_location = array();
                $one_location["id"] = $location->id;
                $one_location["location"] = $location->value;
                $one_area["locations"][] = $one_location;
            }



            $result[] = $one_area;


        }

        return $result;
    }


}
