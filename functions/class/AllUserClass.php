<?php
    class AUTH
    {
      
        public function Check_Auth($mail, $pass){
            
            if( isset($_POST["student-checkbox"]) && $_POST["student-checkbox"] == "on" && !isset($_POST["teacher-checkbox"])){
                include("../functions/DB/DB.php");
                $mail = $_POST["email"];
                $pass = $_POST["password"];
                $s_query = "SELECT * FROM students_table WHERE student_email = '$mail' AND student_password = '$pass'";
                $do_query = $conn->query($s_query);
                    if( $do_query->num_rows > 0 && $do_query->num_rows < 2 ){
                        echo "Logged Successfullly as Student";
                        return true;
                    }else{
                        echo "Somethings Wrong";
                        return false;
                    }
                    
            }elseif( isset($_POST["teacher-checkbox"]) && $_POST["teacher-checkbox"] == "on" && !isset($_POST["student-checkbox"])){
                include("../functions/DB/DB.php");
                $mail = $_POST["email"];
                $pass = $_POST["password"];
                $s_query = "SELECT * FROM teachers_table WHERE teacher_email = '$mail' AND teacher_password = '$pass'";
                $do_query = $conn->query($s_query);
                    if( $do_query->num_rows > 0 && $do_query->num_rows < 2 ){
                        echo "Logged Successfullly as Student";
                        return true;
                    }else{
                        echo "Somethings Wrong";
                        return false;
                    }
                    
            }elseif( $_POST["teacher-checkbox"] == "on" && $_POST["student-checkbox"] == "on" ){
                echo "Chooseonly one login status";
                
            }elseif( !isset($_POST["student-checkbox"]) && !isset($_POST["teacher-checkbox"]) ){
                echo "Please choose the statues";
            }

        }
    }
?>