<?php
require './header.php';

session_destroy();

?>


<div class="container p-5">

    <h1 class="text-center my-3">Registeration Form</h1>
    <div class="d-flex justify-content-center align-items-center">
        <form class="w-50" action="./auth/create_user.php" method="POST">
            <?php if (!empty($_SESSION["errorMsg"])) : ?>
            <div class='alert alert-danger' role='alert'>
                <?= $_SESSION["errorMsg"] ?>
            </div>
            <?php
            endif;
            unset($_SESSION['errorMsg']); // to apply flash msgs
            ?>
            <div class="mb-3">
                <label for="display_name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="display_name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
            </div>
            <a href="./" class="btn btn-danger ">Back</a>
            <button type="submit" class="btn btn-info mx-5">Register</button>
        </form>
    </div>
</div>


<?php require './footer.php' ?>