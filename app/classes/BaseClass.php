<?php

abstract class BaseClass
{
    public $id;

    public static abstract function getTable();

    // convert array data to object properties with values
    public function fromArray($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    // convert object properties to array
    private function toArray()
    {
        return get_object_vars($this);
    }

    public static function findBy($filterColumn = null, $filterValue = null, $orderColumn = null, $orderDir = 'ASC', $limit = null, $offset = 0)
    {
        $connection = dbConnect();
        $tableName = static::getTable();
        $className = static::class;
        $sql = "SELECT * FROM $tableName ";

        if (!is_null($filterColumn)) {
            $sql .= " WHERE $filterColumn='" . mysqli_real_escape_string($connection, $filterValue)  . "'";
        }

        if (!is_null($orderColumn)) {
            $sql .= " ORDER BY $orderColumn $orderDir";
        }

        if (!is_null($limit)) {
            $sql .= " LIMIT $offset,$limit;";
        }

        $data = runQuery($sql);
        $objectList = [];

        foreach ($data as $datum) {
            $obj = new $className();
            $obj->fromArray($datum);
            $objectList[] = $obj;
        }

        return $objectList;
    }

    public static function findOneBy($filterColumn = null, $filterValue = null, $orderColumn = null, $orderDir = 'ASC', $offset = 0)
    {
        $data = self::findBy($filterColumn, $filterValue, $orderColumn, $orderDir, 1, $offset);
        if (isset($data[0])) {
            return $data[0];
        } else {
            return null;
        }
    }

    public static function find($id)
    {
        return self::findOneBy('id', $id);
    }

    public static function findAll($orderColumn = null, $orderDir = 'ASC')
    {
        return self::findBy(null, null, $orderColumn, $orderDir);
    }

    public function save()
    {
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    private function insert()
    {
        $connection = dbConnect();
        $data = $this->toArray();
        $tableName = static::getTable();
        $columnsString = '';
        $valuesString = '';
        foreach ($data as $column => $value) {
            if ($column != 'id') {
                $columnsString = $columnsString . "`$column`, ";
                var_dump($value);
                $valuesString = $valuesString . "'". mysqli_real_escape_string($connection, $value) . "', ";
            }
        }
        $columnsString = rtrim($columnsString, ", ");
        $valuesString = rtrim($valuesString, ", ");
        $sql = "INSERT INTO $tableName ($columnsString) VALUES ($valuesString);";
        $this->id = runQuery($sql);
        return $this->id;
    }

    private function update()
    {
        $connection = dbConnect();
        $data = $this->toArray();
        $tableName = static::getTable();
        $id = $this->id;
        $setString = '';
        foreach ($data as $column => $value) {
           if($column != 'id') {
               $setString = $setString . "`$column`='". mysqli_real_escape_string($connection, $value) ."', ";
           }
        }
        $setString = rtrim($setString, ", ");
        $sql = "UPDATE $tableName SET  $setString WHERE `id`=$id;";
        runQuery($sql);
        return $this->id;
    }

    public function delete()
    {
        $tableName = static::getTable();
        $id = $this->id;
        $sql = "DELETE FROM $tableName WHERE `id`=$id;";
        return runQuery($sql);
    }
}
