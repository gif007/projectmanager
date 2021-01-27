<?php

namespace App\Controllers;
use App\Core\App;

class UsersController {
    public function index() {
        $names = App::get('database')->selectAll('users');

        return view('users', compact('names'));
    }

    public function store() {
        App::get('database')->insert('users', [
            'name' => $_POST['name'],
        ]);

        return redirect('users');
    }
}