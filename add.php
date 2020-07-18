<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'; ?>

<div class="section col s12 ">
    <h4 class="center bold upcase">Add an Exercise</h4>
</div>

<section class="section container">

    <form action="" method="POST" class="container col xl6 transparent ">


        <label for="exercise">Exercise Name:</label>
        <input type="text" name="exercise" value="">
        <div class="red-text"></div>

        <label for="type">Muscle group this exercise covers (Upper, Lower, or Total):</label>
        <input type="text" name="type" value="">
        <div class="red-text"></div>

        <label for="reps"># of Reps:</label>
        <input type="text" name="reps" value="">
        <div class="red-text"> </div>

        <label for="sets"># of Sets:</label>
        <input type="text" name="sets" value="">
        <div class="red-text"></div>

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