<?php require "./header.php";

// create_seats(20);
?>

<style>
.seat-card {
    -webkit-box-shadow: 0px 10px 13px -7px #000000, 0px 0px 5px 5px rgba(0, 0, 0, 0.45);
    box-shadow: 0px 10px 13px -7px #000000, 0px 0px 5px 5px rgba(0, 0, 0, 0.45);
}
</style>

<div class="container w-25 mt-2  text-center fw-bolder">
    <div class="bg-success">Avaliable</div>
    <div class="bg-danger">UnAvaliable</div>
</div>



<div class="row justify-content-center mt-2 my-5  p-2 " class="seat-card">
    <?php foreach (get_all_seats_data() as $seat) : ?>
    <?php
        if ($seat->isAvailable) {
        ?>
    <div class="col-2 mx-4 my-2 ">
        <a href="./seat_reservation.php?id=<?= $seat->id ?>" class="text-decoration-none">
            <div class="card seat-card <?= $seat->isAvailable ? 'bg-success' : 'bg-danger' ?>">
                <img src="./assets/images/seats.jpg" class="card-img-top" alt="royal jordanian airplan">
                <div class="card-body">
                    <h6 class="card-title text-dark fw-bolder">Seat Number <?= $seat->seatNumber ?></h6>
                    <a class="btn btn-info m-3 d-flex d-none justify-content-center py-2 "
                        href="./seats."><strong>Book</strong></a>
                </div>
            </div>
        </a>
    </div>
    <?php
        } else {
            if ($_SESSION["validUserData"]->id == $seat->userId) {
            ?>
    <div class="col-2 mx-4">
        <a href="./seat_reservation.php?id=<?= $seat->id ?>" class="text-decoration-none">
            <div class="card seat-card <?= $seat->isAvailable ? 'bg-success' : 'bg-danger' ?>">
                <img src="./assets/images/seats.jpg" class="card-img-top" alt="royal jordanian airplan">
                <div class="card-body">
                    <h6 class="card-title text-dark fw-bolder">Seat Number <?= $seat->seatNumber ?></h6>
                    <h6 class="card-title text-dark fw-bolder <?= $seat->isAvailable ? "d-none" : ""  ?>">Reservid by :
                        <?= $_SESSION["validUserData"]->name ?></h6>
                    <a class="btn btn-info m-3 d-flex d-none justify-content-center py-2 "
                        href="./seats."><strong>Book</strong></a>
                </div>
            </div>
        </a>
    </div>
    <?php
            } else {

            ?>
    <div class="col-2 mx-4">

        <div class="card seat-card <?= $seat->isAvailable ? 'bg-success' : 'bg-danger' ?>">
            <img src="./assets/images/seats.jpg" class="card-img-top" alt="royal jordanian airplan">
            <div class="card-body">
                <h6 class="card-title text-dark fw-bolder">Seat Number <?= $seat->seatNumber ?></h6>
                <h6 class="card-title text-dark fw-bolder <?= $seat->isAvailable ? "d-none" : ""  ?>">Reservid by :
                    <?= $_SESSION["validUserData"]->name ?></h6>
                <a class="btn btn-info m-3 d-flex d-none justify-content-center py-2 "
                    href="./seats."><strong>Book</strong></a>
            </div>
        </div>
    </div>
    <?php
            }
        }

        ?>
    <?php endforeach; ?>
</div>
<?php require "./footer.php"; ?>