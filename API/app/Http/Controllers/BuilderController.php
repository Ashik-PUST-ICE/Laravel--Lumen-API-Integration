<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BuilderController extends Controller
{

  function AllRows()
  {
    $result=DB::table('details')->get();

    return $result;
  }


  function Rows()
  {
    $result=DB::table('details')->where('name','Rahman')->first();

    return $result->roll;
  }

  function singleValue()
  {
    $result=DB::table('details')->find('2');

    return $result->name;
  }

  function pluckmethod()
  {
    $result=DB::table('details')->pluck('name','roll');

    return $result;
  }

// use aggrigate function insert delete update
function Insert(Request $request)
{
    $name = $request->input("name");
    $roll = $request->input("roll");
    $city = $request->input("city");
    $phone = $request->input("phone");
    $class = $request->input("class");

    // Correct the array syntax for inserting data
    $result = DB::table('details')->insert([
        'name' => $name,
        'roll' => $roll,
        'city' => $city,
        'phone' => $phone,
        'class' => $class
    ]);

    if ($result) {
        return "Data insert success";
    } else {
        return "Insert failed";
    }
}


function Update(Request $request)
{

    $name = $request->input("name");
    $roll = $request->input("roll");
    $city = $request->input("city");
    $phone = $request->input("phone");
    $class = $request->input("class");
    $id=  $request->input("id");

    $result=DB::table('details')->where('id',$id)->update([
        'name'=>$name,
        'roll' => $roll,
        'city' => $city,
        'phone' => $phone,
        'class' => $class
    ]);

    if ($result==true) {
        return "Data update success";
    } else {
        return "update failed";
    }

}

function Delete(Request $request)
{
    $id=  $request->input("id");

    $result=DB::table('details')->where('id',$id)->delete();

    if ($result==true) {
        return "Data Dete success";
    } else {
        return "deleted failed";
    }

}


}
