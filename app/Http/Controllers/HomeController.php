<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "name" => "Ravi Malik",
            "age" => "22"
        ];

        return view("home", $data);
    }
}
