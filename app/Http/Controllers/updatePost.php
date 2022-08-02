<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class updatePost extends Controller
{
    function getUpdatedData(Request $req){
        return $req->input();
    }
}
