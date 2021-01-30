<?php

namespace App\Controllers;
use App\Core\App;
use App\Models\Project;
use App\Models\Task;
use App\Core\{Router, Request};


class PagesController {
    public function home() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $projects = App::get('database')->selectProjects($_SESSION['userid']);

        foreach ($projects as $project) {
            $project->setTasks();
        }

        return view('index', compact('projects'));
    }


    public function auth() {
        session_start();
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $user = App::get('database')->authenticateUser($username, $password);

        if (sizeof($user) > 0) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $user[0]->username;
            $_SESSION["userid"] = $user[0]->id;
            return redirect('');
        } else {
            $message = '<span style="color: red;">Login failed. Please try again:</span>';
            return view('login', compact('message'));
        }
    }


    public function login() {
        session_start();
        if (isset($_SESSION['loggedin']) and $_SESSION['loggedin'] == true) {
            $message = '<span style="color: red;">You are already logged in.</span>';
            return view('login', compact('message'));
        }

        return view('login');
    }

    public function logout() {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['userid']);
        $_SESSION['loggedin'] = false;

        return redirect('login');
    }

    public function projectDetail(){
        session_start();
        $projectID = (int)explode('/', Request::uri())[1];
    
        $project = App::get('database')->selectProject($projectID)[0];
        $project->setTasks();

        // die(var_dump($project));
        return view('projectdetail', compact('project'));

    }

    // public function culture() {
    //     return view('about-culture');
    // }
}