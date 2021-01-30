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

    private $tasks = [];

    // function __construct($id, $title, $client, $comments, $description, $status,
    // $date_started, $quote, $department, $created_by)
    //     {
    //         $this->id = $id;
    //         $this->title = $title;
    //         $this->client = $client;
    //         $this->comments = $comments;
    //         $this->desc = $desc;
    //         $this->status = $status;
    //         $this->date_started = $date_started;
    //         $this->quote = $quote;
    //         $this->department = $department;
    //         $this->created_by = $created_by;
    //     }

    function setTasks()
    {
        $tasks = App::get('database')->getTasksByProject((int)$this->id);
        $this->tasks = $tasks;
    }

    function getTasks()
    {
        return $this->tasks;
    }
        
}