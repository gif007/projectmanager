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
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }
        $projectID = (int)explode('/', Request::uri())[1];
    
        $project = App::get('database')->selectProject($projectID)[0];
        $project->setTasks();

        // die(var_dump($project));
        return view('projectdetail', compact('project'));

    }

    public function createProject() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }
        
        return view('createproject');
    }

    public function submitProject() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }
        
        App::get('database')->insert('projects', [
            'title' => $_POST['title'],
            'client' => $_POST['client'],
            'comments' => $_POST['comments'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'quote' => $_POST['quote'],
            'department' => $_POST['department'],
            'created_by' => $_POST['created_by']
        ]);

        $project = App::get('database')->selectProjects($_SESSION['userid'])[0];

        return redirect("project/$project->id");
    }

    public function createTask() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $projectID = (int)explode('/', Request::uri())[1];
        $project = App::get('database')->selectProject($projectID)[0];

        if ($project->created_by !== $_SESSION['userid']) {
            return redirect('login');
        }
        
        return view('createtask', compact('project'));
    }

    public function submitTask() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        App::get('database')->insert('tasks', [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'type' => $_POST['type'],
            'status' => $_POST['status'],
            'assigned_to' => $_POST['assigned_to'],
            'projectId' => $_POST['projectId']
        ]);

        $projectid = $_POST['projectId'];
        $project = App::get('database')->selectProject($projectid)[0];

        if ($project->created_by !== $_SESSION['userid']) {
            return redirect('login');
        }

        return redirect("project/$projectid");

    }

    public function search() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }
        
        return view('search');
    }

    public function postSearch() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $result = App::get('database')->queryProjects($_POST['query']);

        if (sizeof($result) > 0) {
            return view('search', compact('result'));
        }

        $noresult = 'Nothing found';
        
        return view('search', compact('noresult'));
    }

    public function archive() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $projects = App::get('database')->selectAllIntoClass('projects', 'App\Models\Project');
        
        return view('archive', compact('projects'));
    }

    public function about() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }
        
        return view('about');
    }

    public function editProject() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $projectID = (int)explode('/', Request::uri())[1];
        $project = App::get('database')->selectProject($projectID)[0];

        if ($project->created_by !== $_SESSION['userid']) {
            return redirect('login');
        }

        return view('editproject', compact('project'));
    }

    public function submitProjectUpdate() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $projectID = (int)explode('/', Request::uri())[1];
        $project = App::get('database')->selectProject($projectID)[0];

        if ($project->created_by !== $_SESSION['userid']) {
            return redirect('login');
        }

        App::get('database')->update('projects', [
            'title' => $_POST['title'],
            'client' => $_POST['client'],
            'quote' => $_POST['quote'],
            'description' => $_POST['description'],
            'comments' => $_POST['comments'],
            'status' => $_POST['status'],
            'department' => $_POST['department']
        ], $projectID);

        return redirect("project/$projectID");
        
    }

    public function editTask() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $taskID = (int)explode('/', Request::uri())[1];
        $task = App::get('database')->selectTask($taskID)[0];

        $project = App::get('database')->selectProject($task->projectId)[0];

        if ($project->created_by !== $_SESSION['userid']) {
            return redirect('login');
        }

        return view('edittask', compact('task'));
    }

    public function submitTaskUpdate() {
        session_start();
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false) {
            return redirect('login');
        }

        $taskID = (int)explode('/', Request::uri())[1];
        $task = App::get('database')->selectTask($taskID)[0];

        $project = App::get('database')->selectProject($task->projectId)[0];

        if ($project->created_by !== $_SESSION['userid']) {
            return redirect('login');
        }

        App::get('database')->update('tasks', [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'type' => $_POST['type'],
            'status' => $_POST['status'],
            'assigned_to' => $_POST['assigned_to']
        ], $taskID);

        return redirect("project/$task->projectId");
        
    }




    // public function culture() {
    //     return view('about-culture');
    // }
}