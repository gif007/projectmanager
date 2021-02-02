<?php

namespace App\Models;

class Task
{
    public $id;
    public $title;
    public $description;
    public $type;
    public $date_set;
    public $status;
    public $assigned_to;
    public $projectId;
                       
    
    

    // function __construct($title, $date_set, $status, $assigned_to, $desc, $type)
    // {
    //     $this->title = $title;
    //     $this->date_set = $date_set;
    //     $this->status = $status;
    //     $this->assigned_to = $assigned_to;
    //     $this->desc = $desc;
    //     $this->type = $type;
    // }

    public function getEditURL()
    {
        return "/task/$this->id/edit";
    }

    function getTimeStamp()
    {
        $dateAndTime = explode(' ', $this->date_set);
        $date = explode('-', $dateAndTime[0]);
        $time = explode(':', $dateAndTime[1]);
        $timestamp = mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);
        $date_created = date("Y/m/d H:m", $timestamp);

        return $date_created;
    }
}