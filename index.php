<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Eldridge Haven Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>

    <div id="hero">
        <div id="overlay">
            <h1>Welcome to the Eldridge Haven Library</h1>
            <p class="fs-6"> a timeless sanctuary of knowledge and imagination nestled in the heart of our picturesque town. Founded in 1921, our library stands as a beacon of learning, community, and inspiration.</p>
            <div id="btns">
                <a href='stock.php' class='btn btn-success'>Books and more</a>
            </div>
        </div>
    </div>

    <?php require_once 'about.php'; ?>
    <?php require_once 'components/footer.php'; ?>

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
