<?php
    include_once 'db.class.php';

    class Users extends DB{

        function register_user($department_id,$first_name,$last_name,$username,$profile_image,$password){
            return DB::execute("INSERT INTO users(department_id,first_name,last_name,username,profile_image,password) VALUES(?,?,?,?,?,?)", [$department_id,$first_name,$last_name,$username,$profile_image,$password]);
        }
        
        function fetch_users(){
            return DB::fetchAll("SELECT * FROM users",[]);
        }
        function fetch_user($username){
            return DB::fetch("SELECT * FROM users
            JOIN departments ON users.department_id = departments.id
            WHERE username = ? OR users.id = ?",[$username,$username] );
        }
        function fetch_user_id($username){
            $req = DB::fetch("SELECT * FROM users WHERE username = ? ",[$username] );
            return $req['id'];
        }
        function fetch_user_rating($id){
            return DB::fetch("SELECT user_rating FROM users WHERE id = ? ",[$id] );
        }
        function update_user($fullname,$othernames,$username,$id){
            return DB::execute("UPDATE users SET fullname =? ,othernames =?,username =? WHERE id = ? ", [$fullname,$othernames,$username,$id]);
        }
        function update_password($password,$id){
            return DB::execute("UPDATE users SET password =? WHERE id = ? ", [$password,$id]);
        }
        function update_profile_image($profile_image,$id){
            return DB::execute("UPDATE users SET profile_image =? WHERE id = ? ", [$profile_image,$id]);
        }
        function users_num(){
            return DB::num_row("SELECT id FROM users ", []);
        }

        function check_username($username){
            return DB::num_row("SELECT id FROM users WHERE username = ? ", [$username]);
        }
        function user_login($username,$password){
            if (DB::num_row("SELECT id FROM users WHERE username = ?   AND password = ? ", [$username,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        function fetch_user_posts($user_id){
            return DB::fetchAll("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            WHERE posts.user_id = ?
            ORDER BY posts.id DESC ",[$user_id]);
        }
    }
?>