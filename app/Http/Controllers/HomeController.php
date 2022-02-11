<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        // El metodo latest ordena los registro que recupere en forma descendente
        $courses = Course::where('status', '3')->latest('id')->take(8)->get();
        return view('welcome', compact('courses'));
    }
}
