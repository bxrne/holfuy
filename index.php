<!DOCTYPE html>
<html>

<head>
    <link rel="manifest" href="manifest.json">
    <meta charset='utf-8' />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="ventryweather">
    <meta name="apple-mobile-web-app-title" content="ventryweather">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-navbutton-color" content="#ffffff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="192x192" href="images/windsock192.png">
    <link rel="apple-touch-icon" type="image/png" sizes="192x192" href="images/windsock192.png">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />
    <title>Holfuy Dashboard</title>
</head>

<body class='container'>
    <?php
    $jsonurl = "--source--";
    $json = file_get_contents($jsonurl);
    $json = json_decode($json, true);
    $updated = $json['updated'];
    $windSpeed = $json['speed'];
    $windDirection = $json['dir'];
    $windIndicatorDirection = $windDirection - 180;
    $windDirectionVerbose = $json['dir_str'];
    $windSpeedGust = $json['gust'];
    $temperature = $json['temperature'];

    $pressure = $json['pressure'];
    $rain = $json['rain'];
    $compassId = 'N';
    ?>
    <br />
    <h1 class="text-center">
        VENTRYWEATHER
        <img src="images/windsock.png" />
    </h1>
    <br />
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <br />
                    <h5 class="card-title text-center">
                        <?php
                        echo "
                        <style>
                            @keyframes rotation {
                                from {
                                transform: rotate(0deg);
                                }
                                to {
                                transform: rotate(" . $windIndicatorDirection . "deg);
                                }
                            }
                        </style>
                        <img src='images/windDirection.png' style='animation: rotation 2s;transform:rotate(" . $windIndicatorDirection . "deg);'/>";
                        ?>
                    </h5>
                    <br />

                    <p class="card-text">
                        <div class="row" style='margin:0; padding:0;'>
                            <div class="col text-center text-secondary">
                                <h5>Direction</h5>
                            </div>
                            <div class="col text-center text-secondary">
                                <h5>Speed</h5>
                            </div>
                            <div class="col text-center text-secondary">
                                <h5>Gust</h5>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col text-center">
                                <h2>
                                    <?php echo $windDirectionVerbose; ?>
                                    <?php echo $windDirection; ?>&deg;</h2>
                            </div>
                            <div class="col text-center">
                                <h2>
                                    <?php echo $windSpeed; ?> kts</h2>
                            </div>
                            <div class="col text-center">
                                <h2>
                                    <?php echo $windSpeedGust; ?> kts</h2>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <br />
                    <h5 class="card-title text-center">
                        <img src='images/raindrop.png'>
                    </h5>
                    <br />
                    <h2 class='card-text text-center'>
                        <?php echo $rain; ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <br />
                    <h5 class="card-title text-center">
                        <img src='images/thermometer.png' />
                    </h5>
                    <br />
                    <p class="card-text">
                        <div class="row" style='margin:0; padding:0;'>
                            <div class="col text-center text-secondary">
                                <h5>Temperature</h5>
                            </div>



                            <div class="col text-center text-secondary">
                                <h5>Pressure</h5>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col text-center">
                                <h2>
                                    <?php echo $temperature; ?>&deg;C</h2>
                            </div>



                            <div class="col text-center">
                                <h2>
                                    <?php echo $pressure; ?> hPa</h2>
                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>
    <br />
    <p class='text-secondary text-center'>Updated
        <?php echo $updated; ?> &nbsp; - &nbsp; &copy; 2020 Adam Byrne</p>
    </div>

</body>

</html>