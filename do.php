<?php
    session_start();
    ob_start();
    if( !isset($_SESSION['logged_user']) && !isset($_SESSION['logged_user_status']) && !isset($_SESSION['logged_user_id'])){
      header("location: index.php");
    }
?>
<?php
  include("parts/header.php");
?>


  <div id="wrapper">
    

    <?php
    
      // include("parts/leftnav.php");
      if( $_SESSION["logged_user_status"] == "student" ){
        include("parts/leftnav/student-leftnav.php");
      }else if( $_SESSION["logged_user_status"] == "teacher" ){
        include("parts/leftnav/teacher-leftnav.php");
      }
    ?>

    <div id="content-wrapper" class="d-flex flex-column">


      <div id="content">

     
        <?php
          include("parts/topnav.php");
          if( !isset($_GET["section"]) || $_GET["section"] == "" ){
            if( $_SESSION["logged_user_status"] == "student" ){
              include("parts/dashboard/student-dashboard.php");
            }else if( $_SESSION["logged_user_status"] == "teacher" ){
              include("parts/dashboard/teacher-dashboard.php");
            }
          }

          if( isset($_GET["section"]) && $_GET["section"] == "studentexercises" ){
            include("parts/student/student-exercises.php");
          };
        ?>
    
      </div>

      
 <?php
  include("parts/footer.php");
 ?>
