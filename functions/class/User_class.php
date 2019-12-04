<?php
    class USER
    {   
        public $user_id;
        public function __construct()
        {
            $this->user_id = $_SESSION["logged_user_id"];
        }
        public function fullname(){
            include("functions/DB/DB.php");
            if( $_SESSION["logged_user_status"] == "student" ){
                $s_query = "SELECT student_name, student_lastname FROM students_table WHERE student_id = $this->user_id ";
                $do_query = mysqli_fetch_assoc($conn->query($s_query));
                return $do_query["student_name"] . ' ' . $do_query["student_lastname"];
                
            }elseif($_SESSION["logged_user_status"] == "teacher"){
                $s_query = "SELECT teacher_name, teacher_lastname FROM teachers_table WHERE teacher_id = $this->user_id ";
                $do_query = mysqli_fetch_assoc($conn->query($s_query));
                return $do_query["teacher_name"] . ' ' . $do_query["teacher_lastname"];
            }
        }
    }
?>