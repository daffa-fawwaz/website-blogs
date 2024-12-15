<?php

require_once __DIR__ . '/Model.php';

class Kategori extends Model
{
    protected $table = "categories";
    protected $primary_key = "id_category";

    public function create($datas)
    {
        return parent::create_data($datas, $this->table);
    }

    public function all()
    {
        return parent::all_data($this->table);
    }

    public function paginate($start, $limit)
    {
        $order = " order by name_category asc";
        return parent::paginate_data($this->table, $start, $limit, $order);
    }

    public function search($keyword, $start = null, $limit = null)
    {
        $queryLimit = "";
        if (isset($start) && isset($limit)) {
            $queryLimit = " LIMIT $start, $limit";
        }
        $keyword = " WHERE name_category LIKE '%{$keyword}%' $queryLimit";
        return parent::search_data($this->table, $keyword);
    }

    public function delete($id)
    {
        return parent::delete_data($this->table, $this->primary_key, $id);
    }

    public function find($id)
    {
        return parent::find_data($this->table, $id, $this->primary_key);
    }

    public function update($id, $datas)
    {
        return parent::update_data($this->table, $id, $datas, $this->primary_key);
    }

    public function count_cat($cat)
    {
        $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE categories.name_category = '$cat'";

        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }
}
