<?php
    require_once 'components/db_connect.php';
    
    if(isset($_GET['id']) && !empty($_GET["id"])){
        $sql = "SELECT * FROM `stock` WHERE `id_stock` = $_GET[id]";
        $result = mysqli_query($conn, $sql);    
        $cards = "";
    
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $cards .= "
                    <div class='card'>
                        <img src='assets/{$row["img"]}' class='card-img-top' style='width: 100%' alt='...'>
                        <div class='card-body'>
                            <h1>{$row["title"]}</h1>
                            <h4>{$row["isbn"]}</h4>
                            <p class='card-text'>Type: {$row["type"]}</p>
                            <p class='card-text'>Author: {$row["author"]}</p>
                            <p class='card-text'>Publisher: {$row["publisher"]}</p>
                            <p class='card-text'>Publisher: {$row["publisher"]}</p>
                            <p class='card-text'>{$row["description"]}</p>
                        </div>
                    </div>
                ";
        } else {
            $cards = "no data found";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DimSum - Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class='details'>
        <div id='headline'>
            <?= $title; ?>
        </div>
        <div id="cardDiv">
            <?= $cards; ?>
        </div>
        <?php if (isset($row)): ?>
            <a href='update.php?id=<?= $row["dishId"]; ?>' class='btn btn-success'>edit</a>
        <?php endif; ?>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>