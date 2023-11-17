<?php
   require_once "components/db_connect.php";
   require_once "components/fileUpload.php";

   if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM dishes WHERE `dishId` = $id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    }

   if(isset ($_POST["create"])){
        $name = $_POST["name"];
        $img = fileUpload($_FILES["img"]);
        $description = $_POST["description"];
        $price = $_POST["price"];
        $availability = isset($_POST["availability"]) ? 1 : 0;

       if($_FILES["img"]["error"] == 0) {
            if($row["img"] !== "product.png"){
                unlink("assets/$row[img]");
            }
            $sql = "UPDATE `dishes` SET `name`= '$name', `img`=$img[0], `description`=$description, `price`=$price, `availability`='$availability' WHERE dishId = $id";
       }else{
        $sql = "UPDATE `dishes` SET `name`= '$name', `description`=$description, `price`=$price, `availability`='$availability' WHERE dishId = $id";
       }

       if (mysqli_query($conn, $sql)){
            echo "
            <div class='alert alert-success' role='alert'>
                New record has been created
            </div>" ;
       }else  {
            echo "
            <div class='alert alert-danger' role='alert'>
                error found
            </div>" ;
       }
   }

    // close the connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta  charset="UTF-8">
   <meta name="viewport" content= "width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class="containerUpdate">
        <!-- you need enctype="multipart/form-data" if you use input type file-->
       <form class="updateForm" action="" method="POST" enctype="multipart/form-data">
            <label class="form-label">
                Name:
                <input type="text" name="name" class="form-control" value="<?= $row["name"]??"" ?>">
            </label>
            <label class="form-label">
                Image:
                <input type="file" name="img" class="form-control" value="<?= $row["img"]??"" ?>">
            </label>
            <label class="form-label">
                Description:
                <input type="text" name="description" class="form-control" value="<?= $row["description"]??"" ?>">
            </label>
            <label class="form-label">
                Price:
                <input type="number" name="price" class="form-control" value="<?= $row["price"]??"" ?>">
            </label>
            <label class="form-label">
                available: 
            <input class="form-check-input mt-0" type="checkbox" name="availability" class="form-control" value="<?= $row["availability"]??"" ?>" >
            </label>

            <input type="submit" value="Update" name="update" class="btn btn-success">
        </form>
    </div>
 
        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>