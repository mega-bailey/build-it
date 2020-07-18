<?php
include('config/db_connect.php');

//GET ADDED EXCERCISES FROM DB
//query to get details
$sql = 'SELECT type, reps, sets, exercise, id FROM exercises ORDER BY created_at DESC';

//query to get result
$result = mysqli_query($conn, $sql);

//fecth the resulting rows as an array
$exercises = mysqli_fetch_all($result, MYSQLI_ASSOC); //This returns an associative array

//DELETE Button
if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM exercises WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header('Location: exercises.php');
    } else {
        echo 'query error: ' . mysqli_error($conn);
    }
}


//free the result from memory
mysqli_free_result($result);
//close connection
mysqli_close($conn);


//POST CHOSEN WORKOUTS TO 'MY-WORKOUTS' DB
$mytype = $myreps = $mysets = $myexercise = '';
$myerrors = array('type' => '', 'reps' => '', 'sets' => '', 'exercise' => '');

if (isset($_POST['submit'])) {

    if (array_filter($myerrors)) {
        // echo 'Form errors';
    } else {
        $myexercise = mysqli_real_escape_string($conn, $_POST['exercise']);
        $mytype = mysqli_real_escape_string($conn, $_POST['type']);
        $myreps = mysqli_real_escape_string($conn, $_POST['reps']);
        $mysets = mysqli_real_escape_string($conn, $_POST['sets']);

        $sql = "INSERT INTO myworkouts(exercise, type, reps, sets) VALUES('$myexercise', '$mytype', '$myreps', '$mysets')";
        if (mysqli_query($conn, $sql)) {
            header('location: my-workouts.php');
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
    <h4 class="center bold upcase">All Exercises</h4>
    <p class="center bold upcase">Select which exercises you want & build your own workout</p>
</div>

<div class="container">
    <div class="row">

        <!-- loop through exercises -->
        <?php foreach ($exercises as $exercise) { ?>
            <div class=" col m12 l6 ">
                <div class="card horizontal">
                    <div class="card-image z-depth-0">
                        <!-- select image based on exercise 'type' -->
                        <?php if (($exercise['type']) === 'Lower' || ($exercise['type']) === 'lower') { ?>
                            <img class="exercise-img" src="img/icons8-squats-100.png">
                        <?php } else if (($exercise['type']) === 'Upper' || ($exercise['type']) === 'upper') { ?>
                            <img class="exercise-img" src="img/icons8-pushups-100.png">
                        <?php } else { ?>
                            <img class="exercise-img" src="img/icons8-exercise-100.png">
                        <?php }  ?>

                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5 class="bold upcase"> <?php echo htmlspecialchars($exercise['exercise']); ?> </h5>
                            <p class="bold grey-text thin"> <?php echo htmlspecialchars(ucwords($exercise['type'])); ?> Body</p>
                            <p class="bold"> Reps: <?php echo htmlspecialchars($exercise['reps']); ?> | Sets: <?php echo htmlspecialchars($exercise['sets']); ?></p>

                        </div>
                        <div class="card-action">
                            <form action="my-workout.php" method="POST" class="left">
                                <input type="hidden" name="id_to_add" value="<?php echo $exercise['id'] ?>">
                                <input type="submit" name="add-workout" value='Add to my workout' class='btn grey-text text-darken-4 purple lighten-2 text-accent-2 '>
                            </form>

                            <!-- DELETE FORM -->
                            <form action="exercises.php" method="POST" class="right">
                                <input type="hidden" name="id_to_delete" value="<?php echo $exercise['id'] ?>">
                                <button type="submit" name="delete" class="btn-floating btn-small waves-effect waves-light red lighten-1 right">
                                    <i class="material-icons">delete_forever</i>
                                </button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>

        <?php } ?>



        <div class="container bg-img-container hide-on-small-only">
            <img class="section bg-img" src="img/undraw_personal_trainer_ote3.svg" alt="illustration of a person doing pilates">
        </div>

        <?php include 'templates/footer.php'; ?>

</html>