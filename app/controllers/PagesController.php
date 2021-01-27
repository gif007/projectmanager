<?php

namespace App\Controllers;
use App\Core\App;

class PagesController {
    public function home() {

        return view('index');
    }

    public function about() {
        $company = App::get('company');

        return view('about', compact('company'));
    }

    public function contact() {
        return view('contact');
    }

    public function culture() {
        return view('about-culture');
    }
}