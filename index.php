<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="scripts/myscript.js"></script>
</head>
<body>
    <div class="container p-4">
    <div class="login_form">
       
        <form class="" action="do/autorization.php" method="post">
            <div class="form-row text-center flex-column">
                <div class="logo_form">
                    <img src="images/logo.png" class="img-fluid" alt="">
                </div>
                <?php
                    if( isset($_GET["status"]) && $_GET["status"] == "nostatus"){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            მონიშნე სტატუსი!
                        </div>
                        <?php
                    }elseif( isset($_GET["status"]) && $_GET["status"] == "twologinstatus" ){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            მონიშნე ერთი სტატუსი!
                        </div>
                        <?php
                    }elseif( isset($_GET["check"]) && $_GET["check"] == "false" ){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            ემაილი ან პაროლი არასწორია!
                        </div>
                        <?php
                    }
                ?>
                
                <div class="form-group">
                    <label for="inputEmail4">ემაილი</label>
                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="მიუთითე ემაილი..." required>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">პაროლი</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="მიუთითე პაროლი..." required>
                </div>
            </div>
            <h4 class="text-center m-3 border-bottom pb-2">სტატუსი</h4>
            <div class="login_type_checkboxes d-flex flex-row text-center justify-content-center m-4">
                    <div class="custom-control custom-checkbox m-2">
                        
                        <label class="checkbox-styled"> მოსწავლე
                            <input name="student-checkbox" type="checkbox" id="student-checkbox">
                            <span class="checkmark student-checkbox"></span>
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox m-2">
                        
                        <label class="checkbox-styled">მასწავლებელი
                            <input name="teacher-checkbox" type="checkbox" id="teacher-checkbox">
                            <span class="checkmark teacher-checkbox"></span>
                        </label>
                        
                        </div>
                </div>
            <input type="submit" class="btn btn-primary w-100" value="ავტორიზაცია">
        </form>
    </div>
    </div>
</body>
</html>