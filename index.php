<?php
    session_start();
    require './internal/functions.php';
    if (isset($_POST['search'])) {
        getApiData();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>Weather</h1>
        <form method="post">
            <label>Enter City name:
                <input type="text" name="city-name">
            </label>
            <input type="submit" value="Search" name="search">
        </form>
        <div class="search-result">
            <?php
                if (isset($_SESSION['weather'])) {
                    $weather = $_SESSION['weather'];
                    showSearchResult($weather);
                }
            ?>
        </div>
        <hr>
        <h2>History</h2>
            <div class="cont">
                <?php
                if(isset($_SESSION['history'])) {
                    $history = $_SESSION['history'];
                    showHistory($history);
                }
                ?>
            </div>
    </div>
</body>
</html>