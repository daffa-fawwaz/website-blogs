<?php

require_once __DIR__ . '/Model.php';


class Users extends Model
{
    protected $table = "users";
    protected $primary_key = "id_user";

    public function create($datas)
    {

        return parent::create_data($datas, $this->table);
    }

    public function all()
    {
        $query = "SELECT * FROM {$this->table} WHERE role = 'author'";
        $result = mysqli_query($this->db, $query);

        return $result;
    }

    public function paginate($start, $limit)
    {
        $order = " order by full_name";
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
        $avatar = '';
        if ($datas["files"]["avatar"]["name"] !== '') {
            $nama_file = $datas["files"]["avatar"]["name"];
            $tmp_name = $datas["files"]["avatar"]["tmp_name"];
            $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
            if (!in_array($ekstensi_file, $ekstensi_allowed)) {
                return "Ektensi file tidak sesuai";
            }

            if ($datas["files"]["avatar"]["size"] > 10000000) {
                return "Ukuran file tidak boleh lebih dari 10MB";
            }

            $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
            move_uploaded_file($tmp_name, "./../public/img/users/" . $nama_file);
            $avatar = $nama_file;
        }

        $datas = [
            "full_name" => $datas["post"]["full_name"],
            "email" => $datas["post"]["email"],
            "phone" => $datas["post"]["phone"],
            "bio" => $datas["post"]["bio"],
            "job" => $datas["post"]["job"],
        ];

        if ($avatar !== '') {
            $datas["avatar"] = $avatar;
        }

        return parent::update_data($this->table, $id, $datas, $this->primary_key);
    }

    public function register($datas)
    {
        $full_name = $datas["post"]["full_name"];
        $password = $datas["post"]["password"];
        $confirm_password = $datas["post"]["confirm_password"];
        $email = $datas["post"]["email"];
        $bio = $datas["post"]["bio"];
        $gender = $datas["post"]["gender"];
        $phone = $datas["post"]["phone"];
        $job = $datas["post"]["job"];
        $role = $datas["post"]["role"];


        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if (mysqli_num_rows($result) > 0) {
            return "Email Sudah Terdaftar";
        }

        if ($password !== $confirm_password) {
            return "Konfirmasi Password Salah";
        }

        $nama_file = $datas["files"]["avatar"]["name"];
        $tmp_name = $datas["files"]["avatar"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "heic", "gif", "webp", "raw"];
        if (!in_array($ekstensi_file, $ekstensi_allowed)) {
            return "Ektensi file tidak sesuai";
        }

        if ($datas["files"]["avatar"]["size"] > 5000000) {
            return "Ukuran file tidak boleh lebih dari 5MB";
        }

        $nama_file = random_int(1000, 9999) . "." . $ekstensi_file;
        move_uploaded_file($tmp_name, "./../public/img/users/" . $nama_file);

        $password = base64_encode($password);

        $query_register = "INSERT INTO {$this->table} (full_name, password, email, job, gender, avatar, phone, bio, role) VALUES ('$full_name', '$password', '$email', '$job', '$gender', '$nama_file', '$phone', '$bio', '$role')";
        $result_register = mysqli_query($this->db, $query_register);

        if (!$result_register) {
            return "Registrasi gagal";
        }


        $last_id = mysqli_insert_id($this->db);
        $query_user = "SELECT * FROM {$this->table} WHERE id_user = $last_id";
        $result_user = mysqli_query($this->db, $query_user);
        $user = mysqli_fetch_assoc($result_user);

        $user_id = $user["id_user"];

        $user = [
            'id' => $user_id,
            'name' => $full_name,
            'email' => $email,
            'avatar' => $nama_file
        ];

        return $user;
    }

    public function logout()
    {
        session_destroy();
        return "Logout Berhasil";
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if (mysqli_num_rows($result) == 0) {
            return "Email Yang Anda Masukan Salah";
        }

        $user = mysqli_fetch_assoc($result);

        if (base64_decode($user["password"], false) !== $password) {
            return "Password Yang Anda Masukan Salah";
        }

        if ($user["role"] == "user") {
            $_SESSION["user"] = $user["role"];
        }
    
        if ($user["role"] == "author") {
            $_SESSION["author"] = $user["role"];
        }

        if ($user["role"] == "admin") {
            $_SESSION["admin"] = $user["role"];
        }

        $_SESSION["id_user"] = $user["id_user"];
        $_SESSION["full_name"] = $user["full_name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["avatar"] = $user["avatar"];
        $_SESSION["bio"] = $user["bio"];
        $_SESSION["phone"] = $user["phone"];

        return [
            "id_user" => $user["id_user"],
            "full_name" => $user["full_name"],
            "email" => $user["email"],
            "avatar" => $user["avatar"],
            "phone" => $user["phone"],
            "bio" => $user["bio"],
        ];
    }

    public function update_pass($id, $new_pass, $old_pass, $confirm_pass)
    {
        $query = "SELECT * FROM users WHERE id_user = '$id'";
        $result = mysqli_query($this->db, $query);

        if (mysqli_num_rows($result) == 0) {
            return "User Tidak Ditemukan";
        }

        $user = mysqli_fetch_assoc($result);

        if ($new_pass !== $confirm_pass) {
            return "Konfirmasi Password Salah";
        }

        if (base64_decode($user["password"], false) != $old_pass) {
            return "Password Salah";
        }

        $new_pass = base64_encode($new_pass);

        $query_update = "UPDATE {$this->table} SET password = '$new_pass' WHERE id_user = '$id'";
        $result_update = mysqli_query($this->db, $query_update);

        $user_new = mysqli_fetch_assoc($result);

        $user_new = [
            "id_user" => $user["id_user"],
            "full_name" => $user["full_name"],
            "email" => $user["email"],
            "avatar" => $user["avatar"],
            "phone" => $user["phone"],
            "bio" => $user["bio"],
        ];

        return $user_new;
    }

    public function author_all()
    {
        $query = "SELECT * FROM users WHERE role = 'author'";
        $result = mysqli_query($this->db, $query);

        return parent::convert_data($result);
    }
}
