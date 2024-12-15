<?php

session_start();

require_once __DIR__ . '/../DB/Koneksi.php';

abstract class Model extends Koneksi
{
    public function create_data($datas, $table)
    {

        $key = array_keys($datas);
        $value = array_values($datas);
        $key = implode(",", $key);
        $value = implode("','", $value);
        $query = "INSERT INTO $table ($key) VALUES ('$value')";
        $result = mysqli_query($this->db, $query);
        if (!$result) {
            return false;
        }

        return $result;
    }

    public function convert_data($datas)
    {
        $data = [];
        while ($row = mysqli_fetch_assoc($datas)) {
            $data[] = $row;
        }
        return $data;
    }

    public function all_data($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function paginate_data($table, $start, $limit, $order)
    {
        $query = "SELECT * FROM $table $order LIMIT $start, $limit";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function search_data($table, $keyword)
    {
        $query = "SELECT * FROM $table $keyword";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function delete_data($table, $id, $column)
    {
        $query = "DELETE FROM $table WHERE $column = $id";
        $result = mysqli_query($this->db, $query);
        return $result;
    }

    public function find_data($table, $id, $column)
    {
        $query = "SELECT * FROM $table WHERE $column = $id";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function update_data($table, $id, $datas, $column)
    {
        $key = array_keys($datas);
        $value = array_values($datas);

        $query = "UPDATE $table SET ";
        for ($i = 0; $i < count($key); $i++) {
            $query .= $key[$i] . "=" . "'" . $value[$i] . "'";
            if ($i != count($key) - 1) {
                $query .= ",";
            }
        }


        $query .= " WHERE $column = $id";
        $result = mysqli_query($this->db, $query);

        if ($result) {
            return $datas;
        } else {
            return false;
        }
        return $result;
    }
}
