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
            throw $e;
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

    private function action($action, $table,$where = array(), string $jointure = null, int $limit = null, string $orderBy = null)
    {
        if (isset($where) && count($where) === 3) {
            $operators= array('=','>','<','>=','<=');

            $field       = $where[0];
            $operator    = $where[1];
            $value       = $where[2];

            if (in_array($operator,$operators)) {
                $sql= isset($jointure) ?
                    ( "{$action} FROM {$table} {$jointure} WHERE {$field} {$operator} ?". (isset($orderBy) ? " {$orderBy}" : "") . (isset($limit) ? " LIMIT {$limit}" : "")
                    ) : ( "{$action} FROM {$table} WHERE {$field} {$operator} ?". (isset($orderBy) ? " {$orderBy}" : "") . (isset($limit) ? " LIMIT {$limit}" : "") );

                if (!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        } else {
            $sql= isset($jointure) ?
                ( "{$action} FROM {$table} {$jointure}" ) : ( "{$action} FROM {$table}". (isset($orderBy) ? " {$orderBy}" : "") . (isset($limit) ? " LIMIT {$limit}" : ""));

            if (!$this->query($sql)->error()) {
                return $this->results();
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
    public function get($table, $where = null)
    {
        return $this->action("SELECT *",$table,$where);
    }

    /**
     * Select * from $table where $where with limit
     * @param $table
     * @param int $limit
     * @param null $where
     * @return $this|false
     */
    public function getWithLimit($table, int $limit, string $orderBy = null,$where = null)
    {
        return $this->action("SELECT *",$table,$where, null, $limit, $orderBy);
    }

    /**
     * Select * from $table where $where and jointure
     * @param $table
     * @param $jointure
     * @param $where
     * @return $this|false
     */
    public function getWithJointure($table, $jointure,$where = null)
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

            for ($x = 0; $x < count($fields);$x++) {
                $values .= "?";
                if ($x < count($fields)-1) {
                    $values .= ',';
                }
            }

            $sql = "INSERT INTO {$table} (`" . join('`,`', $keys) . "`) VALUES ({$values})";
            if (!$this->query($sql,$fields)->error()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Update a row
     * @param $table
     * @param array $where
     * @param $fields
     */
    public function update($table, array $where = array(), $fields): bool
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

        $operators= array('=','>','<','>=','<=');

        $field       = $where[0];
        $operator    = $where[1];
        $value       = $where[2];

        if (in_array($operator,$operators)) {
            $sql = "UPDATE {$table} SET {$set} WHERE {$field} {$operator} ?";
            $fields[$field] = $value;
            if (!$this->query($sql,$fields)->error()) {
                return true;
            }
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
        return $this->results()[0] ?? null;
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