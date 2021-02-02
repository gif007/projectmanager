<?php


class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function authenticateUser($username) 
    {
        $statement = $this->pdo->prepare("select * from users where username='$username'");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectAll($table) 
    {
        $statement = $this->pdo->prepare("select * from $table");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectProjects($userid) 
    {
        $statement = $this->pdo->prepare("select * from projects where created_by=$userid order by date_started desc");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\Models\Project");
    }

    public function selectProject($projectid) 
    {
        $statement = $this->pdo->prepare("select * from projects where id=$projectid");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\Models\Project");
    }

    public function selectUser($userid) 
    {
        $statement = $this->pdo->prepare("select * from users where id=$userid");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectTask($taskid) 
    {
        $statement = $this->pdo->prepare("select * from tasks where id=$taskid");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\Models\Task");
    }

    public function getTasksByProject($projectid) 
    {
        $statement = $this->pdo->prepare("select * from tasks where projectId=$projectid");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\Models\Task");
    }

    public function selectAllIntoClass($table, $class) 
    {
        $statement = $this->pdo->prepare("select * from $table");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "$class");
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops, something went wrong');
        }

    }
  
    public function update($table, $parameters, $id)
    {

        foreach ($parameters as $key => $value)
        {
            $arr[] = "$key='$value'";
        }

        $colsvals = implode($arr, ', ');

        $sql = "update $table set $colsvals where id=$id";

        // die(var_dump($sql));

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();
        } catch (Exception $e) {
            die('Whoops, something went wrong');
        }

    }

    public function queryProjects($query)
    {
        $statement = $this->pdo->prepare("select * from projects where description like '%$query%'");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\Models\Project");

    }
}