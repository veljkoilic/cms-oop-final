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

    /**
     * @param $table
     * @param string $model
     * @return mixed
     * Gets all columns form a table specified in a parameter
     */
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

    /**
     * @param $table
     * @param $id
     * @return mixed
     * Gets all Columns from a table depending on the logged in trainer
     */
    public function getAllByTrainer($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE trainers_id = {$id}");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     * Gets all Columns from a table depending on a selected club
     */
    public function getAllTrainings($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE clubs_id = {$id}");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param $table
     * @param $id
     * @return mixed
     * Gets all Columns from a table depending on club id
     */
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

    /**
     * @param $table
     * @param $id
     * @return mixed
     * Gets a database entry depending on the table and id
     */
    public function getOne($table, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$table}.id = $id ");
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }
    /**
     * @param $table
     * @param $id
     * @return mixed
     * Gets a database entry depending on the table and id and the logged in trainer
     */
    public function getOneClub($table, $userId, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE trainers_id = {$userId} AND id = {$id} ");
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @param $table
     * @param $user_id
     * @return mixed
     * Gets All the trainings for a particular user
     */
    public function getUserTrainings($table, $user_id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = $user_id ");
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);

    }

    public function getOneUserTraining($table, $user_id, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE trainers_id = $user_id AND id = $id");
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

    public function getOneUser($table, $email, $model = "")
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} WHERE email='{$email}'");
        $query->execute();

        if($model) {
            return $query->fetch(\PDO::FETCH_CLASS, $model);
        } else {
            return $query->fetch(\PDO::FETCH_OBJ);
        }
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