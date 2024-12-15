<?php

require_once __DIR__ . '/Model.php';

class Posts extends Model
{
    protected $table = "posts";
    protected $primary_key = "id_posts";

    public function create($datas)
    {


        if (!isset($datas["post"]["tag_id_pivot"])) {
            $tags_id = [];
        } else {
            $tags_id = $datas["post"]["tag_id_pivot"];
        }

        if ($datas["files"]["attachment"]["name"] == "") {
            return "Masukan gambar terlebih dahulu";
        }

        $contents = $datas["post"]["content"];
        $content = mysqli_escape_string($this->db, $contents);

        $nama_file = $datas["files"]["attachment"]["name"];
        $tmp_name = $datas["files"]["attachment"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ektensi file tidak sesuai";
        }

        if ($datas["files"]["attachment"]["size"] > 5000000) {
            return "Ukuran file tidak boleh lebih dari 5MB";
        }

        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "./../public/img/konten/" . $nama_file);

        $data = [
            "title" => $datas["post"]["title"],
            "content" => $content,
            "attachment" => $nama_file,
            "user_id" => $datas["post"]["user_id"],
            "category_id" => $datas["post"]["category_id"],
        ];

        parent::create_data($data, $this->table);


        $query_id = mysqli_insert_id($this->db);
        if (!$tags_id == '') {
            foreach ($tags_id as $tag) {
                $query = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$query_id', '$tag')";

                $result = mysqli_query($this->db, $query);
            };
        }

        if (isset($datas["post"]["name_tag"]) && !empty($datas["post"]["name_tag"])) {
            $create_tags = $datas["post"]["name_tag"];
            foreach ($create_tags as $tag_name) {
                // Pastikan tag tidak kosong sebelum memprosesnya
                if (!empty($tag_name)) {
                    $tag_name = mysqli_real_escape_string($this->db, $tag_name);

                    // Cek apakah tag sudah ada
                    $query_check = "SELECT id_tag FROM tags WHERE name_tag = '$tag_name'";
                    $result_check = mysqli_query($this->db, $query_check);

                    if (mysqli_num_rows($result_check) == 0) {
                        // Jika tag belum ada, masukkan tag baru
                        $query_insert = "INSERT INTO tags (name_tag) VALUES ('$tag_name')";
                        mysqli_query($this->db, $query_insert);
                        $tag_id = mysqli_insert_id($this->db);
                    } else {
                        return "Tags Baru Yang Anda Masukkan Sudah Ada";
                    }

                    // Masukkan ke tabel pivot
                    $query_pivot = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$query_id', '$tag_id')";
                    mysqli_query($this->db, $query_pivot);
                }
            }
        }

        return $data;
    }

    public function all()
    {
        return parent::all_data($this->table);
    }
    public function all_id($id)
    {
        $query = "SELECT posts.*, categories.name_category, users.full_name AS author_name FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE posts.user_id = '$id' order by title";
        $result = mysqli_query($this->db, $query);
        return parent::convert_data($result);
    }

    public function paginate($start, $limit)
    {
        $order = " order by title";
        return parent::paginate_data($this->table, $start, $limit, $order);
    }

    public function search($keyword, $start = null, $limit = null)
    {
        $queryLimit = "";
        if (isset($start) && isset($limit)) {
            $queryLimit = " LIMIT $start, $limit";
        }
        $keyword = " WHERE title LIKE '%{$keyword}%' $queryLimit";
        $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user $keyword";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
    }

    public function search_id($id, $keyword)
    {
        $queryLimit = "";
        if (isset($start) && isset($limit)) {
            $queryLimit = " LIMIT $start, $limit";
        }
        $keyword = " AND title LIKE '%{$keyword}%' $queryLimit";
        $query = "SELECT posts.*, categories.name_category, users.full_name AS author_name FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE posts.user_id = '$id' $keyword";
        $result = mysqli_query($this->db, $query);
        return $this->convert_data($result);
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
        if (!isset($datas["post"]["tag_id_pivot"])) {
            $tags_id = '';
        } else {
            $tags_id = $datas["post"]["tag_id_pivot"];
        }
        $attachment = '';
        if ($datas["files"]["attachment"]["name"] !== '') {
            $nama_file = $datas["files"]["attachment"]["name"];
            $tmp_name = $datas["files"]["attachment"]["tmp_name"];
            $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
            if (!in_array($ekstensi_file, $ekstensi_allowed)) {
                return "Ektensi file tidak sesuai";
            }

            if ($datas["files"]["attachment"]["size"] > 5000000) {
                return "Ukuran file tidak boleh lebih dari 5MB";
            }

            $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
            move_uploaded_file($tmp_name, "./../public/img/konten/" . $nama_file);
            $attachment = $nama_file;
        }

        $datas = [
            "title" => $datas["post"]["title"],
            "content" => $datas["post"]["content"],
            "user_id" => $datas["post"]["user_id"],
            "category_id" => $datas["post"]["category_id"],
        ];

        if ($attachment !== '') {
            $datas["attachment"] = $attachment;
        }
        parent::update_data($this->table, $id, $datas, $this->primary_key);

        if (!$tags_id == '') {
            $query_delete = "DELETE FROM pivot_posts_tags WHERE post_id_pivot = '$id'";
            $result_delete = mysqli_query($this->db, $query_delete);
            foreach ($tags_id as $tag) {
                $query_insert = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$id', '$tag')";
                $result = mysqli_query($this->db, $query_insert);
            };
        }

        return $datas;
    }
    public function all2($start, $limit)
    {
        $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user order by categories.name_category LIMIT $start, $limit";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function create_tags($tags_id)
    {
        $query_id = mysqli_insert_id($this->db);
        foreach ($tags_id as $tag) {
            $query = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$query_id', '$tag')";

            $result = mysqli_query($this->db, $query);
        }
    }
}
