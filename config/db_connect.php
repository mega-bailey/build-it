<?php
$conn = mysqli_connect('localhost', 'megan', 'test1234', 'workouts');


if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
