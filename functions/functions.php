<?php

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
