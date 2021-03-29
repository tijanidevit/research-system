<?php
    include_once 'db.class.php';

    class Posts extends DB{

        function add_post($user_id,$department_id,$title,$content,$document){
            return DB::execute("INSERT INTO posts(user_id,department_id,title,content,document) VALUES(?,?,?,?,?)", [$user_id,$department_id,$title,$content,$document]);
        }
        function fetch_posts(){
            return DB::fetchAll("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            ORDER BY posts.id DESC ",[]);
        }
        function fetch_post($id){
            return DB::fetch("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            WHERE posts.id = ? ",[$id] );
        }
        function fetch_user_posts($user_id){
            return DB::fetchAll("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            WHERE posts.user_id = ?
            ORDER BY posts.id DESC ",[$user_id]);
        }
        function fetch_user_last_post($user_id){
            return DB::fetch("SELECT * FROM posts WHERE posts.user_id = ?
            ORDER BY posts.id DESC LIMIT 1 ",[$user_id]);
        }
        function fetch_limited_user_posts($user_id){
            return DB::fetchAll("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            WHERE posts.user_id = ?
            ORDER BY posts.id DESC LIMIT 8",[$user_id]);
        }
        function fetch_department_posts($department_id){
            return DB::fetchAll("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            WHERE posts.department_id = ?
            ORDER BY posts.id DESC ",[$department_id]);
        }

        function fetch_department_post_nums($department_id){
            return DB::num_row("SELECT posts.id FROM posts WHERE posts.department_id = ?",[$department_id]);
        }

        function fetch_limited_posts($limit){
            return DB::fetchAll("SELECT * FROM posts ORDER BY id DESC LIMIT $limit ",[]);
        }


        function update_post_views($views,$id){
            return DB::execute("UPDATE posts SET views = ? WHERE id = ? ", [$views,$id]);
        }

        function delete_post($id){
            return DB::execute("DELETE FROM posts WHERE id = ? ",[$id] );
        }
        function update_post($title,$content,$id){
            return DB::execute("UPDATE posts SET title = ?, content = ?  WHERE id = ? ", [$title,$content,$id]);
        }
       
        function posts_num(){
            return DB::num_row("SELECT id FROM posts ", []);
        }

        function check_post_existence($title){
            if (DB::num_row("SELECT id FROM posts WHERE title = ? ", [$title]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        function check_edit_post_existence($title,$id){
            if (DB::num_row("SELECT id FROM posts WHERE title = ? AND id <> ? ", [$title,$id]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        //Comments

        function add_comment($user_id,$post_id,$comment){
            return DB::execute("INSERT INTO comments(user_id,post_id,comment) VALUES(?,?,?)", [$user_id,$post_id,$comment]);
        }

        function check_comment_existence($user_id,$post_id,$comment){
            if (DB::num_row("SELECT id FROM comments WHERE user_id = ? AND post_id = ? AND comment = ? ", [$user_id,$post_id,$comment]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        function fetch_post_comments($post_id){
            return DB::fetchAll("SELECT * FROM comments 
                JOIN users on users.id = comments.user_id
                WHERE post_id = ? ORDER BY comments.id DESC ",[$post_id]);
        }
        function fetch_post_comments_num($post_id){
            return DB::num_row("SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC ",[$post_id]);
        }

        function fetch_search_posts($s){
            return DB::fetchAll("SELECT *,posts.id FROM posts
            JOIN departments on departments.id = posts.department_id
            JOIN users on users.id = posts.user_id
            WHERE posts.title LIKE '%$s%'
            ORDER BY posts.id DESC ",[]);
        }
    }
?>