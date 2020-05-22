
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/scss" href="Styles/Stylesheet.scss" />
</head>
<body>
<div class="container-fluid">
<?php require_once 'includes/header.php' ?>
        <div class='container' >
    <div class="row home-body justify-content-center">
        <div class="col-sm-12 col-md-8">
            <form action="reg-submit.php" method="post" class="text-center border border-light px-2 pt-3">
                <p class="h4 mb-4">Sign up</p>
                <div class="form-row mb-4">
                    <div class="col">
                        <input type="text" id="First_name" name="First_name" class="form-control" placeholder="First name*" required>
                    </div>
                    <div class="col">
                        <input type="text" id="Last_name" name="Last_name"  class="form-control" placeholder="Last name*" required>
                    </div>
                </div>
                <input type="email" id="Email" name="Email" class="form-control mb-4" placeholder="E-mail*" required>

                <!-- <input type="tel" id="Phone" name='phone'  class="form-control mb-4" placeholder="Phone number*"> -->
                <input type="text" id="username" name="username" class="form-control mb-4"  placeholder="Username*" required>

                <div class="form-row mb-4">
                    <div class="col">
                        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*" required>
                    </div>
                    <div class="col">
                        <input type="password" id="confirm" name="confirm" class="form-control mb-4" placeholder="Confirm password*" required>
                    </div>
                </div>
                <span class="">
                        Account Recovery Security Question 
                </span>
                <div class="form-row mb-4">
                    
                    <div class="col">
                        <label></label>
                        <input type="text" max="254" id="security_question" name="security_question" class="form-control mb-4" placeholder="Please come up with a question*" required>
                    </div>
                    <div class="col">
                    <label></label>
                        <input type="text" id="security_answer" name="security_answer" class="form-control mb-4" placeholder="Enter your answer here*" required>
                    </div>
                </div>

                <div class="form-row mb-4">
                    
                        <?php 
                            if ( isset($_SESSION['validation_errors']) && !empty($_SESSION['validation_errors'])){
                                echo '<div class="col alert alert-danger"><span class="warning">';
                                echo $_SESSION['validation_errors'];
                                echo '</span></div>';
                                cleanUpSession();
                            }
                        ?>
                        
                        
                </div>

                <button class="btn btn-primary btn-block my-4" type="submit">Sign up</button>
            </form>

            <div class="row justify-content-center px-3">
                <div class="col text-center">
                    <p>Already have an account? <a href="login.php"> Click here</a> to sign in</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?=template_footer()?>
</html>