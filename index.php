<?php
/**
 * Created by PhpStorm.
 * User: xemss
 * Date: 24.01.2017
 * Time: 13:57
 * TODO separate PHP
 */
    include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

   <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">

        <form>
            <h1>What the weather in your city?</h1>

            <p>Please enter your city.</p>

            <div class="form-group">
                <input type="text" class="form-control" id="city" name="city" placeholder="London, Warszawa, Berlin or eg" value="<?php echo $city;?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

<!--        <div id="today" class="alert alert-success" role="alert">--><?php //echo $today; ?>
        <div id="today">
            <?php

                if ($today) {

                    echo '<div class="alert alert-success" role="alert">' . $today . '</div>';

                } else if ($message) {

                    echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';

                }

            ?>

        </div>
    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
