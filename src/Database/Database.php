<?php


namespace App\Database;


use App\Helpers\ConfigHelper;
use PDO;
use PDOException;

class Database
{
    private static Database $_instance;
    private $_results;
    private int $_count = 0;
    private bool $_error = false;
    private PDO $_pdo;

    //connection to database
    private function __construct()
    {
        $host = ConfigHelper::get('mysql/host');
        $dbName = ConfigHelper::get('mysql/dbName');
        $username = ConfigHelper::get('mysql/username');
        $password = ConfigHelper::get('mysql/pwd');

        try {
            $this->_pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * check if connection is done already, and make it so it doesn't repeat
     * @return Database|null
     */
    public static function getInstance(): Database
    {
        if(!isset(self::$_instance)){
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    /**
     * Securize the DB Queries,binding parameters and preventing sql injections
     * @param $sql
     * @param array $params
     * @return $this
     */
    public function query($sql, array $params=array())
    {
        $this->_error = false;

        if ($_query = $this->_pdo ->prepare($sql)) {
            $x=1;
            if(count($params)) {
                foreach($params as $param) {
                    $_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($_query->execute()) {
                $this->_results = $_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $_query->rowcount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    private function action ($action, $table,$where = array(), string $jointure = null)
    {
        if (count($where) === 3) {
            $operators= array('=','>','<','>=','<=');

            $field       = $where[0];
            $operator    = $where[1];
            $value       = $where[2];

            if (in_array($operator,$operators)) {
                $sql= isset($jointure) ?
                    "{$action}  FROM {$table} WHERE {$field} {$operator} ?" :
                    "{$action}  FROM {$table} {$jointure} WHERE {$field} {$operator} ?";

                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }

            }
        }
        return false;
    }

    /**
     * Select * from $table where $where
     * @param $table
     * @param $where
     * @return $this|false
     */
    public function get($table, $where)
    {
        return $this->action("SELECT *",$table,$where);
    }

    /**
     * Select * from $table where $where and jointure
     * @param $table
     * @param $where
     * @return $this|false
     */
    public function getWithJointure($table, $jointure,$where)
    {
        return $this->action("SELECT *",$table,$where,$jointure);
    }

    /**
     * Delete row(s)
     * @param $table
     * @param $where
     * @return $this|false
     */
    public function delete($table, $where)
    {
        return $this->action('DELETE ', $table, $where);
    }

    /**
     * Insert a row
     * @param $table
     * @param array $fields
     * @return bool
     */
    public function insert($table, array $fields = array()): bool
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = null;
            $x = 1;
            foreach ($fields as $field) {
                $values .= "?";
                if ($x < count($field)) {
                    $values .= ',';
                }
                $x++;
            }

            $sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";
            if ($this->query($sql,$fields)->error()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Update a row
     * @param $table
     * @param $id
     * @param $fields
     */
    public function update($table,$id,$fields): bool
    {
        $set='';
        $x=1;

        foreach ($fields as $name => $value){
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .=' , ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id={$id} ";
        if ($this->query($sql,$fields)->error()) {
            return true;
        }

        return false;
    }

    /**
     * Return the request result
     * @return mixed
     */
    public function results()
    {
        return $this->_results;
    }

    /**
     * Get first row of result
     * @return mixed
     */
    public function first()
    {
        return $this->results()[0];
    }

    /**
     * Check if request has a error
     * @return bool
     */
    public function error(): bool
    {
        return $this->_error;
    }

    /**
     * Get request count
     * @return int
     */
    public function count(): int
    {
        return $this->_count;
    }
}