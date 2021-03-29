<?php
    include_once 'db.class.php';

    class Departments extends DB{

        function add_department($department){
            return DB::execute("INSERT INTO departments(department) VALUES(?)", [$department]);
        }
        function fetch_departments(){
            return DB::fetchAll("SELECT * FROM departments ORDER BY department ",[]);
        }
        function fetch_limited_departments($limit){
            return DB::fetchAll("SELECT * FROM departments ORDER BY department LIMIT $limit ",[]);
        }
        function fetch_department($id){
            return DB::fetch("SELECT * FROM departments WHERE id = ? ",[$id] );
        }
        function delete_department($id){
            return DB::execute("DELETE FROM departments WHERE id = ? ",[$id] );
        }
        function update_department($department,$id){
            return DB::execute("UPDATE departments SET department = ?  WHERE id = ? ", [$department,$id]);
        }
       
        function departments_num(){
            return DB::num_row("SELECT id FROM departments ", []);
        }

        function check_department_existence($department){
            if (DB::num_row("SELECT id FROM departments WHERE department = ?", [$department]) > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function check_edit_department_existence($department,$id){
            if (DB::num_row("SELECT id FROM departments WHERE department = ? AND id <> ? ", [$department,$id]) > 0) {
                return true;
            }
            else{
                return false;
            }
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
    }
?>