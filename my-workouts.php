

<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'; ?>


<div class="section col s12 ">
    <h4 class="center bold upcase">My Workout</h4>
    <p class="center bold upcase">Your curated list of exercises. Remove and add as you wish.</p>
</div>

<div class="container">
    <div class="row">

        <!-- loop through workouts -->
        
            <div class=" col s12 m6 xl4 ">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5 class="bold upcase ">  </h5>
                            <p class="bold grey-text thin"> Body</p>
                            <h6 class="bold left left-aligned"> Reps:</h6>
                            <h6 class="bold right right-aligned"> Sets: </h6>

                        </div>
                        <div class="card-action">
                            <!-- DELETE FORM -->
                            <form action="my-workouts.php" method="POST" class="right">
                                <input type="hidden" name="id_to_delete" value="">
                                <button type="submit" name="delete" class="btn-floating btn-small waves-effect waves-light red lighten-1 right">
                                    <i class="material-icons">delete_forever</i>
                                </button>

                            </form>
                        </div>


                    </div>
                </div>
            </div>





        <div class="container bg-img-container hide-on-small-only">
            <img class="section bg-img" src="img/undraw_workout_gcgu.svg" alt="illustration of a person doing pilates">
        </div>

        <?php include 'templates/footer.php'; ?>

</html>