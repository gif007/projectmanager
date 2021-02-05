<?php

namespace App\Models;
use App\Core\App;

class Project
{
    public $id;
    public $title;
    public $client;
    public $comments;
    public $description;
    public $status;
    public $date_started;
    public $quote;
    public $department;
    public $created_by;

    const status_choices = [
        'Inactive',
        'On hold',
        'Active',
        'Review',
        'Completed'
    ];
    const department_choices = [
        'Estimating',
        'Design',
        'Manufacture',
        'Marketing'
    ];

    private $tasks = [];

    function setTasks()
    {
        $tasks = App::get('database')->getTasksByProject((int)$this->id);
        $this->tasks = $tasks;
    }

    function getTasks()
    {
        return $this->tasks;
    }

    function getTimeStamp()
    {
        $dateAndTime = explode(' ', $this->date_started);
        $date = explode('-', $dateAndTime[0]);
        $time = explode(':', $dateAndTime[1]);
        $timestamp = mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);
        $date_created = date("Y/m/d H:m", $timestamp);

        return $date_created;
    }

    function getURL()
    {
        return "/project/$this->id";
    }

    function getAddTaskURL()
    {
        return "/project/$this->id/add-task";
    }

    function getEditProjectURL() 
    {
        return "/project/$this->id/edit";
    }

    function getUser()
    {
        return App::get('database')->selectUser($this->created_by)[0]->username;
    }
        
}