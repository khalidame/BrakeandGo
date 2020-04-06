<?php require_once 'includes/header.php' ?>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8">
            <form action="reg-submit.php" method="post" class="text-center border border-light px-3 pt-3">
                <p class="h4 mb-4">Sign up</p>
                <div class="form-row mb-4">
                    <div class="col">
                        <input type="text" id="First_name" name="First_name" class="form-control" placeholder="First name*">
                    </div>
                    <div class="col">
                        <input type="text" id="Last_name" name="Last_name" class="form-control" placeholder="Last name*">
                    </div>
                </div>
                <input type="email" id="Email" name="Email" class="form-control mb-4" placeholder="E-mail*">

                <!-- <input type="tel" id="Phone" name='phone'  class="form-control mb-4" placeholder="Phone number*"> -->
                <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username*">

                <div class="form-row mb-4">
                    <div class="col">
                        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*">
                    </div>
                    <div class="col">
                        <input type="password" id="confirm" name="confirm" class="form-control mb-4" placeholder="Confirm password*">
                    </div>
                </div>
                <button class="btn btn-primary btn-block my-4" type="submit">Sign up</button>
            </form>

            <div class="row justify-content-center px-3">
                <div class="col text-center">
                    <p>If you are already registered please <a href="login.php"> click here</a> to sign in </p>
                </div>
            </div>
        </div>
    </div>
</div>