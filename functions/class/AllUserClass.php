<?php
    ob_start();
    session_start();
    class AUTH
    {
        public function TEXT($text){
            echo '<div class="alert alert-danger" role="alert">' . $text . '</div>';
        }
        public function Check_Auth($mail, $pass){
            
            if( isset($_POST["student-checkbox"]) && $_POST["student-checkbox"] == "on" && !isset($_POST["teacher-checkbox"])){
                include("../functions/DB/DB.php");
                $mail = $_POST["email"];
                $pass = $_POST["password"];
                $s_query = "SELECT * FROM students_table WHERE student_email = '$mail' AND student_password = '$pass'";
                $do_query = $conn->query($s_query);
                    if( $do_query->num_rows > 0 && $do_query->num_rows < 2 ){
                        echo "Logged Successfullly as Student";
                        header("location: ../do.php?login=success&status=student");
                        return true;
                    }else{
                        echo "Somethings Wrong student";
                        header("location: ../index.php?check=false");
                        return false;
                    }
                    
            }elseif( isset($_POST["teacher-checkbox"]) && $_POST["teacher-checkbox"] == "on" && !isset($_POST["student-checkbox"])){
                include("../functions/DB/DB.php");
                $mail = $_POST["email"];
                $pass = $_POST["password"];
                $s_query = "SELECT * FROM teachers_table WHERE teacher_email = '$mail' AND teacher_password = '$pass'";
                $do_query = $conn->query($s_query);
                    if( $do_query->num_rows > 0 && $do_query->num_rows < 2 ){
                        echo "Logged Successfullly as Teacher";
                        $user_array = mysqli_fetch_assoc($do_query);
                        $user_id = $user_array["teacher_id"];
                        $_SESSION['logged_user'] = $mail;
                        $_SESSION['logged_user_status'] = "teacher";
                        $_SESSION['logged_user_id'] = $user_id;
                        header("location: ../do.php?login=success&status=teacher");
                        return true;
                    }else{
                        echo "Somethings Wrong teacher";
                        header("location: ../index.php?check=false");
                        return false;
                    }
                    
            }elseif( $_POST["teacher-checkbox"] == "on" && $_POST["student-checkbox"] == "on" ){
                echo "Chooseonly one login status";
                header("location: ../index.php?check=false&status=twologinstatus");
                
            }elseif( !isset($_POST["student-checkbox"]) && !isset($_POST["teacher-checkbox"]) ){
                echo "Please choose the statues";
                header("location: ../index.php?check=false&status=nostatus");
            }

        }
    }
?>