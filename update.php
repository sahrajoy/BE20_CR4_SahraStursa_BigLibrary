<?php
    require_once "components/db_connect.php";
    require_once "components/fileUpload.php";
   
    // Initialize variables to hold current stock item data
    $stockItem = null;
    $currentType = null;
    $currentAuthor = null;
    $currentPublisher = null;

    // Fetch current stock item data
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM stock WHERE `id_stock` = $id";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $currentType = $row['fk_type'];
            $currentAuthor = $row['fk_author'];
            $currentPublisher = $row['fk_publisher'];
        }
    }

    // read types for dropdown
    $sqlType = 'SELECT * FROM `type`';  
    $resultType = mysqli_query($conn, $sqlType);    
    $types = "";
    if(mysqli_num_rows($resultType) > 0) {
        while($typeRow = mysqli_fetch_assoc($resultType)) {
            $selected = ($typeRow['id_type'] == $currentType) ? ' selected' : '';
            $types .= "<option value='" . $typeRow['id_type'] . "'$selected>" . $typeRow['type'] . "</option>";
        }
    } else {
        $types = "<option value=''>No data found</option>";
    }
    
    // read authors for dropdown
    $sqlAuthor = 'SELECT * FROM `author`';  
    $resultAuthor = mysqli_query($conn, $sqlAuthor);    
    $authors = "";
    if(mysqli_num_rows($resultAuthor) > 0) {
        while($authorRow = mysqli_fetch_assoc($resultAuthor)) {
            $selected = ($authorRow['id_author'] == $currentAuthor) ? ' selected' : '';
            $authors .= "<option value='" . $authorRow['id_author'] . "'$selected>" . $authorRow['first_name'] . " " . $authorRow['last_name'] . "</option>";
        }
    } else {
        $authors = "<option value=''>No data found</option>";
    }
    
    // read publisher for dropdown
    $sqlPublisher = 'SELECT * FROM `publisher`';  
    $resultPublisher = mysqli_query($conn, $sqlPublisher);    
    $publishers = "";
    if(mysqli_num_rows($resultPublisher) > 0) {
        while($publisherRow  = mysqli_fetch_assoc($resultPublisher)) {
            $selected = ($publisherRow ['id_publisher'] == $currentPublisher) ? ' selected' : '';
            $publishers .= "<option value='" . $publisherRow ['id_publisher'] . "'$selected>" . $publisherRow ['first_name'] . " " . $publisherRow ['last_name'] . "</option>";
        }
    } else {
        $publishers = "<option value=''>No data found</option>";
    }

    // alerts
    $updateSuccess = false;
    $updateFailure = false;

    if(isset ($_POST["update"])){
        $title = $_POST["title"];
        $img = fileUpload($_FILES["img"]);
        $isbn = $_POST["isbn"];
        $description = $_POST["description"];
        $fk_type = $_POST['type'];
        $fk_author = $_POST['author'];
        $fk_publisher = $_POST['publisher'];
        $publish_date = $_POST["publishDate"];

       if($_FILES["img"]["error"] == 0) {
            if($row["img"] !== "product.png"){
                unlink("assets/$row[img]");
            }
                $sql = "UPDATE `stock` SET `title`= '$title', `img`='$img[0]', `isbn`='$isbn', `description`='$description', `fk_type`=$fk_type, `fk_author`=$fk_author, `fk_publisher`=$fk_publisher, `publish_date`='$publish_date' WHERE `id_stock` = $id";
            }
            else{
                $sql = "UPDATE `stock` SET `title`='$title', `isbn`='$isbn', `fk_type`=$fk_type, `fk_author`=$fk_author, `fk_publisher`=$fk_publisher, `publish_date`='$publish_date' WHERE `id_stock` = $id";
            }

       if (mysqli_query($conn, $sql)){
            $updateSuccess = true;
            mysqli_close($conn);
       }else  {
            $updateFailure = true;
        }
    }

    // close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <title>Eldridge Haven Library - Edit</title>
    <!-- bootstrap CSS -->
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"  crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <!-- SweetAlert library -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class='headline'>
        <h1>Edit</h1>
    </div>

    <div class="containerForm">
        <!-- you need enctype="multipart/form-data" if you use input type file-->
       <form class="form" action="" method="POST" enctype="multipart/form-data">
         <!-- title -->
         <label class="form-label">
                <h5>Title: </h5>
                <input type="text" name="title" class="form-control" value="<?= $row["title"]??"" ?>">
            </label>
            <!-- image -->
            <label class="form-label">
                <h5>Image: </h5>
                <input type="file" name="img" class="form-control" value="<?= $row["img"]??"" ?>">
            </label>
            <!-- isbn -->
            <label class="form-label">
                <h5>ISBN: </h5>
                <input type="text" name="isbn" class="form-control" value="<?= $row["isbn"]??"" ?>">
            </label>
            <!-- description -->
            <label class="form-label">
                <h5>Description: </h5>
                <input type="text" name="description" class="form-control" value="<?= $row["description"]??"" ?>">
            </label>
            <!-- Type Dropdown -->
            <label class="form-label">
                <h5>Type: </h5>
                <select name="type" class="form-control"><?= $types ?></select>
            </label>
            <!-- Author Dropdown -->
            <label class="form-label">
                <h5>Author: </h5>
                <select name="author" class="form-control"><?= $authors ?></select>
            </label>
            <!-- Publisher Dropdown -->
            <label class="form-label">
                <h5>Publisher: </h5>
                <select name="publisher" class="form-control"><?= $publishers ?></select>
            </label>
            <!-- publish date -->
            <label class="form-label">
                <h5>Publish Date: </h5>
                <input type="date" name="publishDate" class="form-control" value="<?= $row["publish_date"]??"" ?>">
            </label>

            <input type="submit" value="Update" name="update" class="btn btn-success">
        </form>
    </div>

    <!-- SweetAlert for Success -->
    <?php if ($updateSuccess): ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location = "stock.php";
        });
    </script>
    <?php endif; ?>
    
    <!-- SweetAlert for Failure -->
    <?php if ($updateFailure): ?> 
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!",
        }).then(function() {
            window.location = "stock.php"; // Or another appropriate action
        });
    </script>
    <?php endif; ?>

    <?php require_once 'components/footer.php'; ?>

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>