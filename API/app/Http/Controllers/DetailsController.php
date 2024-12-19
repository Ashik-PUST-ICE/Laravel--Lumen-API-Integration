<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DetailsController extends Controller
{

    // request from body
    public function detailSelect(Request $request)
    {
       $SQL="Select *from details";

       $request=DB::select($SQL);

       return $request;
    }

    public function detailCreate(Request $request)
    {
        $name = $request->input("name");
        $roll = $request->input("roll");
        $city = $request->input("city");
        $phone = $request->input("phone");
        $class = $request->input("class");

        // Correct SQL for INSERT operation
        $SQL = "INSERT INTO `details` (`name`, `roll`, `city`, `phone`, `class`) VALUES (?, ?, ?, ?, ?)";

        $result = DB::insert($SQL, [$name, $roll, $city, $phone, $class]);

        if ($result) {
            return "Data save success";
        } else {
            return "Fail, try again";
        }
    }


    public function detailUpdate(Request $request)
    {
        $name = $request->input("name");
        $roll = $request->input("roll");
        $city = $request->input("city");
        $phone = $request->input("phone");
        $class = $request->input("class");

        // Correct SQL for UPDATE operation
        $SQL = "UPDATE `details` SET `name` = ?, `roll` = ?, `city` = ?, `phone` = ?, `class` = ? WHERE `roll` = ?";

        $result = DB::update($SQL, [$name, $roll, $city, $phone, $class, $roll]);

        if ($result) {
            return "Data update success";
        } else {
            return "Fail, try again";
        }
    }



public function detailDelete(Request $request)

{
    $id = $request->input("id");

    // Correct SQL syntax
    $SQL = "DELETE FROM `details` WHERE id = ?";

    // Execute the query
    $result = DB::delete($SQL, [$id]);

    if ($result==true) {
        return "Delete success";
    }

    else {
        return "Fail, try again";
    }

}


}
