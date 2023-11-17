<?php
    require_once 'components/db_connect.php';

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM `stock` WHERE `id_stock` = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        if($row["img"] !== "product.png"){
            unlink("assets/$row[img]");
        }

        $sql = "DELETE FROM `stock` WHERE id_stock=$id";
        if (mysqli_query($conn, $sql)) {
            // Redirect with success message
            header("Location: stock.php?delete=success");
        } else {
            // Redirect with error message
            header("Location: stock.php?delete=error");
        }
        mysqli_close($conn);
    }
    else{
        header("Location: stock.php");
    }