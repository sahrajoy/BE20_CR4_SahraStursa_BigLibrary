<?php
    require_once 'components/db_connect.php';
    
    if(isset($_GET['id']) && !empty($_GET["id"])){
        $id_stock = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT stock.*, 
                        type.type AS typeName, 
                        author.first_name AS authorFirstName, 
                        author.last_name AS authorLastName, 
                        publisher.first_name AS publisherFirstName, 
                        publisher.last_name AS publisherLastName 
                FROM `stock` 
                INNER JOIN `type` ON stock.fk_type = type.id_type 
                INNER JOIN `author` ON stock.fk_author = author.id_author 
                INNER JOIN `publisher` ON stock.fk_publisher = publisher.id_publisher 
    	        WHERE `stock`.`id_stock` = $id_stock";

        $result = mysqli_query($conn, $sql);    
        $cards = "";
        $title = "";
    
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $cards .= "
                    <div class='card'>
                        <img src='assets/{$row["img"]}' class='card-img-top' style='width: 100%' alt='...'>
                        <div class='card-body'>
                            <h5>{$row["isbn"]}</h5>
                            <p class='card-text'>Type: {$row["typeName"]}</p>
                            <p class='card-text'>Author: {$row["authorFirstName"]} {$row["authorLastName"]}</p>
                            <p class='card-text'>Publisher: {$row["publisherFirstName"]} {$row["publisherLastName"]}</p>
                            <p class='card-text'>Publish Date: {$row["publish_date"]}</p>
                            <p class='card-text'>{$row["description"]}</p>
                        </div>
                    </div>
                ";
                $title = "<h1>{$row["title"]}</h1>";
        } else {
            $cards = "no data found";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Eldridge Haven Library - Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>
    
    <div class='headline'>
        <h1><?= $title; ?></h1>
    </div>
    <div class='details'>
        <div id="cardDiv">
            <?= $cards; ?>
        </div>
        <?php if (isset($row)): ?>
            <a href='update.php?id=<?= $row["id_stock"]; ?>' class='btn btn-success'>Edit</a>
        <?php endif; ?>
    </div>

    <?php require_once 'components/footer.php'; ?>

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>