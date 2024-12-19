<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsModel;

class demoController extends Controller
{
    public function SelectAll()
    {
        // Fetch all records from the 'details' table
        $result = DetailsModel::all();

        // Return the result as a JSON response
        return $result;
    }
}

