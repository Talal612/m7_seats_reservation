<?php
session_start();
include './includes/functions.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Airplane Seat Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fontawesome.com/releases/v5.15/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
nav,
main {
    -webkit-box-shadow: 0px 10px 13px -7px #000000, 0px 0px 5px 5px rgba(0, 0, 0, 0.45);
    box-shadow: 0px 10px 13px -7px #000000, 0px 0px 5px 5px rgba(0, 0, 0, 0.45);
}
</style>


<body style=" background-image:url('./assets/images/index.jpg'); height:100vh ; ">



    <header>
        <nav class="navbar navbar-dark bg-info d-flex justify-content-center ">
            <h1 class="text-center fw-bolder"><i class="fa-sharp fa-solid fa-monkey"></i>Royal Jordanian Seat
                Reservation <i class="fa-light fa-cat-space"></i> </h1>
        </nav>
    </header>


    <main class="container w-50 mt-5 p-4" style="background-color: white ;">

        <div class="text-center">
            <i class="fa-solid fa-lock"></i>
            <span class="ps-2 fw-bolder"> Login Authentication </span>
            <i class="fa-solid fa-lock ps-2"></i>

        </div>
        <hr>

        <form action="./auth/validation.php" method="POST" class="d-flex justify-content-center flex-column ">
            <?php if (!empty($_SESSION["errorMsg"])) : ?>
            <div class='alert alert-danger' role='alert'>
                <?= $_SESSION["errorMsg"] ?>
            </div>
            <?php
            endif;
            ?>
            <div class="mb-3  w-75 ">
                <label for="email" class="form-label fw-bolder bg-info p-1">E-mail:</label>
                <input type="email" class="form-control" id="email" required placeholder="Enter your Name.."
                    name="email">
            </div>
            <div class="mb-3 w-75 ">
                <label for="pwd" class="form-label fw-bolder bg-info p-1">Password:</label>
                <input type="password" class="form-control" id="pwd" required placeholder="Enter your Password.."
                    name="pass">
            </div>
            <button type="submit" class="btn btn-info ">
                <i class="fa-sharp fa-solid fa-plane-departure"></i>
            </button>

            <a href="./user_registration.php">Do you want to Register?</a>
        </form>
    </main>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

<?php require "./footer.php" ?>

</html>