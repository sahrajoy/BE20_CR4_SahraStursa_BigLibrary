<?php
require_once "components/db_connect.php";
require_once "components/fileUpload.php";

// read types for dropdown
$sqlType = 'SELECT * FROM `type`';  
$resultType = mysqli_query($conn, $sqlType);    
$types = "";
if(mysqli_num_rows($resultType) > 0) {
    while($row = mysqli_fetch_assoc($resultType)) {
        $types .= "
            <option value='<?= $row[id_type]; ?>'><?= $row[type]; ?></option>
        ";
    }
} else {
    $types = "no data found";
}

// read types for dropdown
$sqlAuthor = 'SELECT * FROM `author`';  
$resultAuthor = mysqli_query($conn, $sqlAuthor);    
$authors = "";
if(mysqli_num_rows($resultAuthor) > 0) {
    while($row = mysqli_fetch_assoc($resultAuthor)) {
        $authors .= "
            <option value='<?= $row[id_author]; ?>'><?= $row[first_name] . ' ' . $row[last_name]; ?></option>
        ";
    }
} else {
    $authors = "no data found";
}

// read types for dropdown
$sqlPublisher = 'SELECT * FROM `publisher`';  
$resultPublisher = mysqli_query($conn, $sqlPublisher);    
$publishers = "";
if(mysqli_num_rows($resultPublisher) > 0) {
    while($row = mysqli_fetch_assoc($resultPublisher)) {
        $publishers .= "
            <option value='<?= $row[id_publisher]; ?>'><?= $row[first_name] . ' ' . $row[last_name]; ?></option>
        ";
    }
} else {
    $publishers = "no data found";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the foreign key values from the POST data
    $fk_type = $_POST['type'];
    $fk_author = $_POST['author'];
    $fk_publisher = $_POST['publisher'];
    // create 
    if (isset($_POST["create"])) {
        $title = $_POST["title"];
        $img = fileUpload($_FILES["img"]);
        $isbn = $_POST["isbn"];
        $description = $_POST["description"];
        // $fk_type = $_POST["type"];
        // $fk_author = $_POST["author"];
        // $fk_publisher = $_POST["publisher"];
        $publish_date = $_POST["publishDate"];
    
        $sql = "INSERT INTO `stock`(`title`, `img`, `isbn`, `description`, `fk_type`, `fk_author`, `fk_publisher`, `publish_date`) VALUES ('$title', '$img[0]', '$isbn','$description','$fk_type','$fk_author','$fk_publisher','$publish_date')";
        if (mysqli_query($conn, $sql)) {
            echo "
                <div class='alert alert-success' role='alert'>
                    New dish has been created
                </div>";
        } else {
            echo "
                <div class='alert alert-danger' role='alert'>
                    error found
                </div>";
        }
    }
}

// close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php require_once 'components/navbar.php'; ?>

    <div class="containerCreate">
        <!-- you need enctype="multipart/form-data" if you use input type file-->
        <form class="createForm" action="" method="POST" enctype="multipart/form-data">
            <!-- title -->
            <label class="form-label">
                Title:
                <input type="text" name="title" class="form-control">
            </label>
            <!-- image -->
            <label class="form-label">
                Image:
                <input type="file" name="img" class="form-control">
            </label>
            <!-- isbn -->
            <label class="form-label">
                ISBN: 
                <input type="text" name="isbn" class="form-control">
            </label>
            <!-- description -->
            <label class="form-label">
                Description:
                <input type="text" name="description" class="form-control">
            </label>
            <!-- Type Dropdown -->
            <label class="form-label">
                Type:
                <select name="type" class="form-control">
                    <?= $type ?>
                </select>
            </label>

            <!-- Author Dropdown -->
            <label class="form-label">
                Author:
                <select name="author" class="form-control">
                    <?= $authors ?>
                </select>
            </label>

            <!-- Publisher Dropdown -->
            <label class="form-label">
                Publisher:
                <select name="publisher" class="form-control">
                    <?= $publishers ?>
                </select>
            </label>
            <!-- publish date -->
            <label class="form-label">
                Publish Date:
                <input type="date" name="publishDate" class="form-control">
            </label>

            <input type="submit" value="Create" name="create" class="btn btn-success">
        </form>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>