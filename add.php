<?php

include('config/db_connect.php');


$type = $reps = $sets = $exercise = '';
$errors = array('type' => '', 'reps' => '', 'sets' => '', 'exercise' => '');

if (isset($_POST['submit'])) {

    // check type
    if (empty($_POST['type'])) {
        $errors['type'] = 'Please designate a type for this exercise. </br>';
    } else {
        $type = $_POST['type'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $type)) {
            $errors['type'] = 'Letters and spaces only please';
        }
    }

    //check reps
    if (empty($_POST['reps'])) {
        $errors['reps'] = 'Please enter a number of reps for this exercise. </br>';
    } else {
        $reps = $_POST['reps'];
        if (!preg_match('/^([0-9]+)$/', $reps)) {
            $errors['reps'] = 'Numbers only please';
        }
    }

    //check sets
    if (empty($_POST['sets'])) {
        $errors['sets'] = 'Please enter a number of sets for this exercise. </br>';
    } else {
        $sets = $_POST['sets'];
        if (!preg_match('/^([0-9]+)$/', $sets)) {
            $errors['sets'] = 'Numbers only please';
        }
    }

    //check exercise
    if (empty($_POST['exercise'])) {
        $errors['exercise'] = 'Please designate a name for this exercise. </br>';
    } else {
        $exercise = $_POST['exercise'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $exercise)) {
            $errors['exercise'] = 'Exercise names must be letters and spaces only';
        }
    }

    if (array_filter($errors)) {
        // echo 'Form errors';
    } else {
        $exercise = mysqli_real_escape_string($conn, $_POST['exercise']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $reps = mysqli_real_escape_string($conn, $_POST['reps']);
        $sets = mysqli_real_escape_string($conn, $_POST['sets']);

        $sql = "INSERT INTO exercises(exercise, type, reps, sets) VALUES('$exercise', '$type', '$reps', '$sets')";
        if (mysqli_query($conn, $sql)) {
            header('location: exercises.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'; ?>

<div class="section col s12 ">
    <h4 class="center bold upcase">Add an Exercise</h4>
</div>

<section class="section container">

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="container col xl6 transparent ">


        <label for="exercise">Exercise Name:</label>
        <input type="text" name="exercise" value="<?php echo htmlspecialchars($exercise) ?>">
        <div class="red-text"><?php echo $errors['exercise'] ?> </div>

        <label for="type">Muscle group this exercise covers (Upper, Lower, or Total):</label>
        <input type="text" name="type" value="<?php echo htmlspecialchars(ucwords($type)) ?>">
        <div class="red-text"><?php echo $errors['type'] ?> </div>

        <label for="reps"># of Reps:</label>
        <input type="text" name="reps" value="<?php echo htmlspecialchars($reps) ?>">
        <div class="red-text"><?php echo $errors['reps'] ?> </div>

        <label for="sets"># of Sets:</label>
        <input type="text" name="sets" value="<?php echo htmlspecialchars($sets) ?>">
        <div class="red-text"><?php echo $errors['sets'] ?> </div>

        <div class="center white-text">
            <input type="submit" name="submit" value='submit' class='btn waves-effect waves-light purple lighten-2'>
        </div>

    </form>
</section>



<div class="container bg-img-container hide-on-small-only">
    <img class="section bg-img" src="img/undraw_pilates_gpdb.svg" alt="illustration of a person doing pilates">
</div>
<?php include 'templates/footer.php'; ?>


</html>