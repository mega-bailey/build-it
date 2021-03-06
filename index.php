<?php

include('config/db_connect.php');

$name = '';
$errors = array('name' => '');

if (isset($_POST['submit'])) {
    session_start();
    $_SESSION['name'] = $_POST['name'];
    header("Location: add.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<?php include 'templates/header.php'; ?>

<div class="section col s12 ">
    <h1 class="center thin lowercase">Welcome to</h1>
    <h2 class="center bold upcase">Build It</h2>
</div>


<div class="section">
    <div class="row">



        <!-- Left Image -->
        <div class="section col l7 hide-on-med-and-down">
            <div class="main-img-container">
                <img class="section main-img" src="img/undraw_working_out_6psf.svg" alt="illustration of two people working out"></div>
        </div>


        <!-- Right Form -->
        <div class="section col m12 l5 flex-center">
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="z-depth-0">
                    <h3 class="section">Let's get started!</h3>
                    <label for="name">Your Name:</label>
                    <input type="text" name="name">
                    <div class="red-text"><?php echo $errors['name'] ?> </div>

                    <div class="section">
                        <input type="submit" name="submit" value='submit' class='btn waves-effect waves-light purple lighten-2'>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


<?php include 'templates/footer.php'; ?>

</html>