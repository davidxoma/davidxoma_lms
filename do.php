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
    
      include("parts/leftnav.php");
    ?>

    <div id="content-wrapper" class="d-flex flex-column">


      <div id="content">

     
        <?php
          include("parts/topnav.php");
        ?>
      
      </div>

      
 <?php
  include("parts/footer.php");
 ?>
