<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        $user = User::firstOrFail();
        $data["user"] = $user;

        $contacts = $user->contacts();
        if (count ($contacts) > 0)
            $data["contacts"] = $contacts;

        $skills = $user->skills;
        if (count($skills) > 0)
            $data["skills"] = $skills;

        $languages = $user->languages;
        if (count($languages) > 0)
            $data["languages"] = $languages;

        $hobbies = $user->hobbies;
        if (count($hobbies) > 0)
            $data["hobbies"] = $hobbies;

        $educations = $user->educations;
        if (count($educations) > 0)
            $data["educations"] = $educations;

        $experiences = $user->experiences();
        if (count($experiences) > 0)
            $data["experiences"] = $experiences;

        if ($user->dob != "0000-00-00") {
            $dob = strtotime($user->dob);
            $today = strtotime(date("Y-m-d"));

            $diff = $today-$dob;
            $age = floor($diff / (365*60*60*24));

            $data["age"] = $age;
        }

        return view("home", $data);
    }
}
