<?php
    // require_once is the most common used to link the database connetion
    require_once 'components/db_connect.php';

    $sql = 'SELECT * FROM `dishes`';  
    $result = mysqli_query($conn, $sql);    
    $cards = "";
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // PHP code for conditional logic
            $buttons = "";
            if($row["availability"]){
                $buttons .= "
                    <a href='details.php?id=$row[dishId]' class='btn btn-light'>details</a>
                    <a href='' class='btn btn-light'>order</a>
                    <a href='delete.php?id=$row[dishId]' class='btn btn-light'>delete</a>
                ";
            } else {
                $buttons .= "
                    <a href='details.php?id=$row[dishId]' class='btn btn-light'>details</a>
                    <a href='' class='btn btn-light disabled'>order</a>
                    <a href='delete.php?id=$row[dishId]' class='btn btn-light'>delete</a>
                ";
            }

            $cards .= "
            <div>
                <div class='card'>
                    <div id='img'>
                        <img src='assets/$row[img]' class='card-img' alt=''>
                    </div>
                    <div class='card-body'>
                        <h3 class='card-title'>$row[name]</h3>
                        <p>$row[description]</p>
                        <hr>
                        <p>€ $row[price]</p>
                        <hr>
                        <div class='container'>$buttons
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
        $cards = "no data found";
    }
        
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class='dishes'>
        <div id='headline'>
            <h1>Menu</h1>
        </div>
        <div class='row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-xs-1' id='result'>
            <?= $cards ?>
        </div>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
