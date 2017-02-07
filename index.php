<?php
/**
 * Created by PhpStorm.
 * User: xemss
 * Date: 24.01.2017
 * Time: 13:57
 * TODO separate PHP
 */

    $today = "";
    $message = "";

    if ($_GET['city']) {
//    if (array_key_exists('city', $_GET['city'])) {

        $city = str_replace(' ', '-',$_GET['city']);
        $weatherSite = "http://www.weather-forecast.com/locations/". $city ."/forecasts/latest";
        $file_headers = @get_headers($weatherSite);

//        print_r($file_headers);
//
//        if ($file_headers == $city) {
        if ($file_headers[0] == "HTTP/1.1 404 Not Found") {
//            $exists = false;
//            echo "<script>alert($file_headers[0])</script>";
            $message = "City with this name couldn't be found";

        } else {
//            $exists = true;
            $getContent = file_get_contents($weatherSite);
            $delimiterBefore = '3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">';
            $delimiterAfter = '</span></span></span></p>';
//            echo $getContent;
            $pageExplode = explode($delimiterBefore, $getContent);

            $size = sizeof($pageExplode);

            if ($size > 1) {

                $pageExplode2 = explode($delimiterAfter, $pageExplode[1]);

                $size2 = sizeof($pageExplode2);
                if ($size2  > 1) {
//            print_r ($pageExplode[0]);
                    $today = $pageExplode2[0];
                } else  {
                    $message = "City with this name couldn't be found";
                }

            } else {}

            $message = "City with this name couldn't be found";

        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <style type="text/css">
        * {

        }

        html {
            background: url("images/Blue Sea Horizon - Weather Wallpaper Image featuring Clouds.jpg") no-repeat center center fixed;
/*            background: url(http://blogimg.ohmynews.com/attach/26119/1102880939.jpg) no-repeat center center fixed;*/
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background: none;
            color: white;
        }

        .container {
            text-align:  center;
            margin-top: 150px;
            width: 600px;
        }

        input {
            margin: 35px 0;
        }

        #today {
            margin: 35px 0;
        }
    </style>
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
