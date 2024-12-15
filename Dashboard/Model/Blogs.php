<?php

require_once __DIR__ . '/Model.php';

class Blogs extends Model
{
    protected $table = "pivot_posts_tags";

    public function create($post, $tags)
    {

        foreach ($tags as $tag) {
            $query = "INSERT INTO pivot_posts_tags (post_id_pivot, tag_id_pivot) VALUES ('$post', '$tag')";

            $result = mysqli_query($this->db, $query);
        }
    }


    public function all_with_tags($start = null, $limit = null)
    {
        $query = "SELECT posts.id_posts, posts.title, posts.content, posts.attachment, users.full_name AS author, categories.name_category, GROUP_CONCAT(tags.name_tag SEPARATOR ', ') AS tags FROM posts LEFT JOIN users ON posts.user_id = users.id_user LEFT JOIN categories ON posts.category_id = categories.id_category LEFT JOIN pivot_posts_tags ON posts.id_posts = pivot_posts_tags.post_id_pivot LEFT JOIN tags ON pivot_posts_tags.tag_id_pivot = tags.id_tag GROUP BY posts.id_posts, users.full_name, categories.name_category order by categories.name_category";

        if (isset($start) && isset($limit)) {
            $query .= " LIMIT $start, $limit";
        }

        $result = mysqli_query($this->db, $query);


        return $this->convert_data($result);
    }
}
