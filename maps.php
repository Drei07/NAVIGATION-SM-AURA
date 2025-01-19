<?php
include_once 'config/settings-configuration.php';
require_once __DIR__ . '/database/dbconfig2.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="src/img/favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="src/css/landing-page.css?v=<?php echo time(); ?>">
    <title>NaviAura</title>
    <style>
        .zoom-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .zoom-container img {
            max-width: 100%;
            transform: scale(1);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>

<header>

<a href="" id="logo" class="delete"><img src="src/img/naviaura-logo.svg" alt="E-CKET"></a>
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fas fa-bars"></label>

<nav class="navbar">
    <a href="./" id="navbar">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="about-us" id="navbar">About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
</header>

    <section class="home" id="homes">
        <div class="content">
<!-- Zoomable Image Section -->
<div class="zoom-container">
    <?php
    $qrcode_id = isset($_GET['maps_id']) ? $_GET['maps_id'] : ''; // Check if maps_id exists in the query string

    if (!empty($qrcode_id)) {
        // Query the database
        $pdoQuery = "SELECT * FROM floor WHERE qrcode = :qrcode";
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute(array(":qrcode" => $qrcode_id));
        $floor_data = $pdoResult->fetch(PDO::FETCH_ASSOC);

        // Check if data exists
        if ($floor_data && isset($floor_data['image'])) {
            // Display the queried image
            echo '<img id="zoomableImage" src="src/floor_img/' . htmlspecialchars($floor_data['image']) . '" alt="Map Image">';
        } else {
            // Display the default image if no data is found
            header('Location: ./');
        }
    } else {
        // Display the default image if maps_id is empty
        header('Location: ./');
    }
    ?>
</div>

        </div>
    </section>


    <footer>

        <div style="opacity: 0;" class="pre-registration">

            <a href="barcode-scanner" class="btn get_ticket">Click This!</a>
        </div>
        <h1 class="credit"> </h1>
    </footer>

    <button id="scrollToTop" onclick="scrolltop();"><img src="src/img/icons8-slide-up-30.png"></button>

    <script src="src/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="src/js/landing-page.js"></script>
    <script src="src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // Navbar Effect
        var navbar = document.querySelector('header');

        window.onscroll = function () {
            if (window.pageYOffset > 0) {
                navbar.classList.add('header-active');
            } else {
                navbar.classList.remove('header-active');
            }
        };

    </script>
        <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status_title']; ?>",
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: false,
                timer: <?php echo $_SESSION['status_timer']; ?>,
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>

</html>
