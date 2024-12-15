 <?php

    require_once __DIR__ . '/Model.php';

    class Tags extends Model
    {
        protected $table = "tags";
        protected $primary_key = "id_tag";

        public function create($datas, $check)
        {
            $query = "SELECT * FROM tags WHERE name_tag = '$check'";
            $result = mysqli_query($this->db, $query);

            if (mysqli_num_rows($result) > 0) {
                return "Tags sudah ada";
            }
            return parent::create_data($datas, $this->table);
        }

        public function all()
        {
            return parent::all_data($this->table);
        }

        public function all_tags()
        {
            $query = "SELECT tag_id_pivot FROM pivot_posts_tags";
        }

        public function paginate($start, $limit)
        {
            $order = " order by name_tag";
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

        public function all_blog()
        {
            $query = "SELECT posts.id_posts, posts.content, posts.attachment, posts.title, categories.name_category, posts.user_id, users.full_name, users.avatar, pivot_posts_tags.post_id_pivot, pivot_posts_tags.tag_id_pivot, tags.name_tag FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user JOIN pivot_posts_tags ON pivot_posts_tags.post_id_pivot = posts.id_posts JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag";

            $result = mysqli_query($this->db, $query);

            return parent::convert_data($result);
        }
    }
