<?php
    // require_once is the most common used to link the database connetion
    require_once 'components/db_connect.php';

    if(isset($_GET['id']) && !empty($_GET["id"])){
        $id_publisher = mysqli_real_escape_string($conn, $_GET['id']);
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
                WHERE `stock`.`fk_publisher` = $id_publisher";
        $result = mysqli_query($conn, $sql);    
        $cards = "";
        $publisher = "";

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $cards .= "
                <div>
                    <div class='card'>
                        <div id='img'>
                            <img src='assets/$row[img]' class='card-img' alt=''>
                        </div>
                        <div class='card-body'>
                            <h3>$row[title]</h3>
                            <h5>$row[isbn]</h5>
                            <p class='card-text'>Type: {$row["typeName"]}</p>
                            <p class='card-text'>Author: {$row["authorFirstName"]} {$row["authorLastName"]}</p>
                            <p class='card-text'>Publisher: <a href='publisher.php?id=$row[fk_publisher]'>{$row["publisherFirstName"]} {$row["publisherLastName"]}</a></p>
                            <p class='card-text'>Publish Date: $row[publish_date]</p>
                            <p class='card-text'>$row[description]</p>
                            <a href='details.php?id=$row[id_stock]' class='btn btn-primary'>Details</a>
                            <a href='update.php?id=$row[id_stock]' class='btn btn-warning'>Edit</a>
                            <a href='delete.php?id=$row[id_stock]' class='btn btn-danger delete'>Delete</a>
                        </div>
                    </div>
                </div>
                ";
                $publisher = "<p class='card-text'>: {$row["publisherFirstName"]} {$row["publisherLastName"]}</p>
                ";
            }
        } else {
        $cards = "no data found";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eldridge Haven Library - Books & more</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <!-- SweetAlert library -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class='stock'>
        <div class='headline'>
            <h1>Books & more from</h1>
            <h1><?= $publisher ?></h1>
        </div>
        <div class='row row-cols-xl-5 row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-xs-1' id='result'>
            <?= $cards ?>
        </div>
    </div>

    <?php require_once 'components/footer.php'; ?>

    <!-- SweetAlert for Delete Success -->
    <?php if (isset($_GET['delete']) && $_GET['delete'] == 'success'): ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Record deleted successfully',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php endif; ?>

    <!-- SweetAlert for Delete Error -->
    <?php if (isset($_GET['delete']) && $_GET['delete'] == 'error'): ?>
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        });
    </script>
    <?php endif; ?>

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
