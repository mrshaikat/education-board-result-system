<?php 
    require_once "libs/config.php";
?>
<!DOCTYPE html>
<html lang="en" class=" ">

<head>
    <meta charset="utf-8" />
    <title>Scale | Web Application</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>

<body class="">

    <?php 
    
        if(isset($_POST['submit']) ){

            $name = $_POST['name'];
            $email = $_POST['email'];

            //passmannage ment
            $pass = $_POST['pass'];
            $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
          
            if( isset($_POST['check']) AND $_POST['check'] == 'agree' ){
                $allow = true;
            }else{
                $allow = false;
            }

            if( empty($name) || empty($email) || empty($pass)){

                $message = "<p class='alert alert-danger text-center'>Fild Must Not Be Empty!! <button class='close' data-dismiss='alert'>&times;</button> </p>";

             }elseif( $allow == false ){
                $message = "<p class='alert alert-danger text-center'>You Must Mark Check Box !! <button class='close' data-dismiss='alert'>&times;</button> </p>";
             }
             else{

                $sql = "INSERT INTO user_info(name, email, pass, status) VALUES('$name', '$email', '$hash_pass', 'active')";
                $connection -> query($sql);

                $message = "<p class='alert alert-success text-center'>Your registratin Done!! <button class='close' data-dismiss='alert'>&times;</button> </p>";
             }

        }
    
    ?>
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
        <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Admin</a>
            <section class="m-b-lg">
                <header class="wrapper text-center"> <strong>Sign up to find interesting thing</strong> </header>
                <div class="message">
                       <?php

                        if( isset($message) ){

                              echo $message;
                        }
                       
                       ?>
                 </div>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="list-group">
                        <div class="list-group-item">
                            <input name="name" placeholder="Name" class="form-control no-border"> </div>
                        <div class="list-group-item">
                            <input name="email" type="email" placeholder="Email" class="form-control no-border"> </div>
                        <div class="list-group-item">
                            <input name="pass" name="" type="password" placeholder="Password" class="form-control no-border"> </div>

                        

                    </div>

                    <div class="checkbox m-b">
                        <label>
                            <input name="check" value="agree" type="checkbox"> Agree the <a href="#">terms and policy</a>
                        </label>
                    </div>
                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
                    <div class="line line-dashed"></div>
                    <p class="text-muted text-center"><small>Already have an account?</small></p> <a href="index.php" class="btn btn-lg btn-default btn-block">Sign in</a> 
                    </form>
            </section>
        </div>
    </section>
    <!-- footer -->
    <footer id="footer">
        <div class="text-center padder clearfix">
            <p> <small>Ashikujjaman Shaikat<br>&copy; 2018</small> </p>
        </div>
    </footer>
    <!-- / footer -->
    <!-- Bootstrap -->
    <!-- App -->
    <script src="js/app.v1.js"></script>
    <script src="js/app.plugin.js"></script>
</body>

</html>