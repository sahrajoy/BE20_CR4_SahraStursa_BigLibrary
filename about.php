<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eldridge Haven Library - About</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php require_once 'components/navbar.php'; ?>
    
    <div class='headline'>
        <h1>About The Eldridge Haven Library</h1>
    </div>
    <div id='description'>
        <div class='row row-cols-1' id='content'>
            <img class='col-12' id='img' src='assets/about.jpg' alt=''>
            <p class='col-6 col-xs-12 fs-5'> <span class='fw-semibold'> Welcome to the Eldridge Haven Library, </span> a timeless sanctuary of knowledge and imagination nestled in the heart of our picturesque town. Founded in 1921, our library stands as a beacon of learning, community, and inspiration. </p>
            <p class='col-6 col-xs-12 fs-5'> <span class='fw-semibold'> Our Mission: </span> At the heart of our mission is the commitment to foster a lifelong love of reading, provide access to a vast range of information, and create a welcoming space for people of all ages to learn, dream, and grow together. </p>
            <p class='col-6 col-xs-12 fs-5'> <span class='fw-semibold'> Collections & Resources: </span> Our library boasts an extensive collection of over 200,000 books, ranging from timeless classics to contemporary bestsellers. Beyond books, we offer a diverse array of digital resources, periodicals, and multimedia materials. Our special collections include rare manuscripts, local historical archives, and a dedicated children's section that is a wonderland of young readers' favorites. </p>
            <p class='col-6 col-xs-12 fs-5'> <span class='fw-semibold'> Community Programs: </span> We believe in the power of community and regularly host a variety of events. From author talks and book clubs to educational workshops and children's story hours, there's always something happening at Eldridge Haven. Our community outreach initiatives also include literacy programs and partnerships with local schools. </p>
            <p class='col-6 col-xs-12 fs-5'> <span class='fw-semibold'> The Library Space: </span> Our building, an architectural gem, blends historical charm with modern amenities. Comfortable reading nooks, study areas, and a state-of-the-art computer lab make our library a perfect place for quiet study or collaborative work. The lush library garden, with its tranquil fountain, is a community favorite for outdoor reading and events. </p>
            <p class='col-6 col-xs-12 fs-5'> <span class='fw-semibold'> Join Us: </span> Whether you're a lifelong resident or a new visitor to our town, we invite you to explore the wonders within Eldridge Haven Library. Become a member, participate in our events, or simply enjoy the serene ambiance. Here, among the rows of books and the whispers of turning pages, you'll find a world waiting to be discovered. </p>
        </div>
    </div>

    <?php require_once 'components/footer.php'; ?>

    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>