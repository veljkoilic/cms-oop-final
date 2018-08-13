<?php
namespace App\Database;
/**
 * Class QueryBuilder - it makes queries to database
 */
class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($table, $model = "")
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();

        if($model) {
            return $query->fetchAll(\PDO::FETCH_CLASS, $model);
        } else {
            return $query->fetchAll(\PDO::FETCH_OBJ);
        }
    }

    public function getAllTrainings($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE clubs_id = {$id}");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
    public function getAllClubsTrainings($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE clubs_id = {$id}");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
    public function getAllByClub($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE club_id = {$id}");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
    public function getAllByTrainer($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE trainers_id = {$id}");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }
    public function getOne($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$table}.id = $id ");
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }
    public function getOneClub($table, $userId, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE trainers_id = {$userId} AND id = {$id} ");
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }
    public function getUserTrainings($table, $user_id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = $user_id ");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);

    }
    public function addNew($table, $payload)
    {
        var_dump($payload);
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(", ", array_keys($payload)),
            ":" . implode(", :", array_keys($payload))
            );
        $query = $this->pdo->prepare($sql);
        var_dump($query);
        var_dump($query->execute($payload));

    }

    public function update($table, $payload)
    {
        $id = $_POST['id'];
        unset($_POST['id']);

        $variables = "";
        foreach($_POST as $key =>  $element) {
             $variables.= $key . "='" . $element . "', ";
        }
        $variables = substr($variables, 0, -2);
        $sql = "UPDATE {$table} SET {$variables} WHERE id = '{$id}'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
    }
    public function destroy($table, $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$table} WHERE id='{$id}'");
        $query->execute();
    }
    public function destroyTrainings($table, $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$table} WHERE clubs_id='{$id}'");
        $query->execute();
    }
}