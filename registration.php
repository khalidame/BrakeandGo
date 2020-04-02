<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/functions.php' ?>


<div class="container-fluid">
    <div class="row w-75">
        <div class="col w-50">
            <form action="reg-submit.php" method="post" class="text-center border border-light p-5">

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

                <input type="tel" id="Phone" name='phone'  class="form-control mb-4" placeholder="Phone number*">

                <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username*">

                <div class="form-row mb-4">
                    <div class="col">
                        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password*">
                    </div>
                    <div class="col">
                        <input type="password" id="confirm" name="confirm" class="form-control mb-4" placeholder="Confirm password*">
                    </div>
                </div>
                <button class="btn btn-info my-4 btn-block" type="submit">Sign up</button>
            </form>
        </div>
    </div>
</div>