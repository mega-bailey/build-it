
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
      
            <div class=" col m12 l6 ">
                <div class="card horizontal">
                    <div class="card-image z-depth-0">
                       

                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <h5 class="bold upcase">  </h5>
                            <p class="bold grey-text thin">  Body</p>
                            <p class="bold"> Reps:  | Sets: </p>

                        </div>
                        <div class="card-action">
                            <form action="my-workout.php" method="POST" class="left">
                                <input type="hidden" name="id_to_add" value="">
                                <input type="submit" name="add-workout" value='Add to my workout' class='btn grey-text text-darken-4 purple lighten-2 text-accent-2 '>
                            </form>

                            <!-- DELETE FORM -->
                            <form action="exercises.php" method="POST" class="right">
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
            <img class="section bg-img" src="img/undraw_personal_trainer_ote3.svg" alt="illustration of a person doing pilates">
        </div>

        <?php include 'templates/footer.php'; ?>

</html>