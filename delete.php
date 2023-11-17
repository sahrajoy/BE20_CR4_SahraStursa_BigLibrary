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
        mysqli_query($conn, $sql);

        mysqli_close($conn);
        header("Location: stock.php");
    }
    else{
        mysqli_close($conn);
        header("Location: stock.php");
    }