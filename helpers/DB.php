<?php

class DB {

    var $database;
    var $table;
    var $select = "*";
    var $where = "";
    var $join = "";
    var $order = "";
    var $group = "";
    var $params = [];
    
    function connection($database) {
        $dsn = "mysql:host=127.0.0.1;port=3306;dbname=" . $database;
        $username = "root";
        $password = "pass@word1";
        $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $connenction = new PDO($dsn, $username, $password, $option);
            return $connenction;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    function db($database) {
        $this->database = $database;
        return $this;
    }

    function table($table) {
        $this->table = $table;
        return $this;
    }

    function select($field) {
        $this->select = $field;
        return $this;
    }

    function innerJoin($innerClause) {
        $this->join = $this->join . " INNER JOIN " . $joinClause;
        return $this;
    }

    function leftJoin($joinClause) {
        $ $this->join = $this->join . " LEFT JOIN " . $joinClause;
        return $this;
    }

    function rightJoin($joinClause) {
        $this->join = $this->join . " RIGHT JOIN " . $joinClause;
        return $this;
    }

    function where($field, $value) {
        array_push($this->params, $value);
        $this->where = $this->where . "WHERE " . $field . " = ? ";
        return $this;
    }

    function andWhere($field, $value) {
        array_push($this->params, $value);
        $this->where = $this->where . " AND " . $field . " = ? ";
        return $this;
    }

    function orWhere($field, $value) {
        array_push($this->params, $value);
        $this->where = $this->where . " OR " . $field . " = ? ";
        return $this;
    }

    function groupBy($group) {
        $this->group = $group;
        return $this;
    }

    function orderBy($field = "id", $by = "ASC") {
        $this->orderBy = "ORDER BY " . $field . " " . $by;
        return $this;
    }

    function get() {
        $database = $this->database;
        $table = $this->table;
        $select = $this->select;
        $join = $this->join;
        $where = $this->where;
        $group = $this->group;
        $order = $this->order;
        $buildQuery = "SELECT " . $select . " FROM " . $table . " " . $join . " " . $where . " " . $group . " " . $order;
        $statement = $this->connection($database)->prepare($buildQuery);
        $statement->execute($this->params);
        $result = array();
        while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
            array_push($result,$data);
        }
        return $result;
    }

    function insert($data) {
        $database = $this->database;
        $table = $this->table;
        $keys = "";
        $holderValues = "";
        $values = [];
        foreach ($data as $k => $v) {
            $keys = $keys . "," . $k;
            $holderValues = $holderValues . ",?";
            array_push($values, $v);
        }
        $keys = substr($keys, 1);
        $holderValues = substr($holderValues, 1);
        $buildQuery = "INSERT  INTO " . $table . "(" . $keys . ") VALUES(" . $holderValues . ")";
        $statement = $this->connection($database)->prepare($buildQuery);
        $statement->execute($values);
        return $statement;
    }

    function update($data) {
        $database = $this->database;
        $table = $this->table;
        $keys = "";
        $values = [];
        foreach ($data as $k => $v) {
            if ($k == "id") {
                $this->where = "WHERE id = ?";
                array_push($this->params, $v);
                break;
            }
            $keys = $keys . "," . $k . "=?";
            $holderValues = $holderValues . ",?";
            array_push($values, $v);
        }
        $where = $this->where;
        array_push($values, $this->params);
        $keys = substr($keys, 1);
        $buildQuery = "UPDATE" . $table . "SET " . $keys . " " . $where;
        $statement = $this->connection($database)->prepare($buildQuery);
        $statement->execute($values);
        return $statement;
    }

    function delete($id = 0) {
        $database = $this->database;
        $table = $this->table;
        $values = [];
        if ($id != 0) {
            $this->where = "WHERE id = ?";
            array_push($this->params, $id);
        }

        $where = $this->where;
        array_push($values, $this->params);

        $buildQuery = "DELETE FROM " . $table . " " . $where;
        $statement = $this->connection($database)->prepare($buildQuery);
        $statement->execute($values);
        return $statement;
    }

    function rawQuery($query, $params) {
        $buildQuery = $query;
        $statement = $this->connection($database)->prepare($buildQuery);
        $statement->execute($params);
        $cekQuery = strtolower(substr($query, 0, 15));
        if (str_contains($cekQuery, "select")) {
            $result = array();
            while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
                array_push($result,$data);
            }
            return $result;
        }
        return $statement;
    }

}
