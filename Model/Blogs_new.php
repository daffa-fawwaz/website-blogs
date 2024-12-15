<?php

require_once __DIR__ . '/../Dashboard/Model/Model.php';

class Blogs_new extends Model
{
    protected $table = "pivot_posts_tags";

    public function all_new($limit, $offset = null)
    {


        $query = "SELECT * FROM posts JOIN categories ON categories.id_category = posts.category_id ORDER BY posts.id_posts DESC LIMIT $limit";

        if ($offset) {
            $query .= " OFFSET $offset";
        }

        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function find_blog($id)
    {
        $query = "SELECT posts.id_posts, posts.title, posts.content, posts.attachment, posts.created_at, users.full_name, categories.name_category, GROUP_CONCAT(tags.name_tag) AS name_tag FROM posts LEFT JOIN users ON posts.user_id = users.id_user LEFT JOIN categories ON posts.category_id = categories.id_category LEFT JOIN pivot_posts_tags ON posts.id_posts = pivot_posts_tags.post_id_pivot LEFT JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag WHERE id_posts = '$id' GROUP BY posts.id_posts, users.full_name, categories.name_category";

        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function all_cat($cat)
    {
        $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE categories.name_category = '$cat'";

        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function all_blog_user($id)
    {
        $query = "SELECT * FROM posts JOIN categories ON posts.category_id = categories.id_category JOIN users ON posts.user_id = users.id_user WHERE posts.user_id = '$id'";

        $result = mysqli_query($this->db, $query);
 
        return $this->convert_data($result);
    }

    public function find_tags($tag)
    {
        $query = "SELECT posts.id_posts, posts.title, posts.content, posts.attachment, posts.created_at, users.full_name AS author, categories.name_category, GROUP_CONCAT(tags.name_tag SEPARATOR ', ') AS tags FROM posts LEFT JOIN users ON posts.user_id = users.id_user LEFT JOIN categories ON posts.category_id = categories.id_category LEFT JOIN pivot_posts_tags ON posts.id_posts = pivot_posts_tags.post_id_pivot LEFT JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag WHERE tags.name_tag = '$tag' GROUP BY posts.id_posts, users.full_name, categories.name_category order by categories.name_category";

        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function contacts()
    {
        $query = "SELECT * FROM contacts";

        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }
}
