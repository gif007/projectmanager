<?php


class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function authenticateUser($username, $password) 
    {
        $statement = $this->pdo->prepare("select * from users where username='$username' and password='$password';");

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
        $statement = $this->pdo->prepare("select * from projects where created_by=$userid");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "App\Models\Project");
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
}