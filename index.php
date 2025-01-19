<?php
include_once 'config/settings-configuration.php';

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

</head>

<body>

    <header>

        <a href="" id="logo" class="delete"><img src="src/img/naviaura-logo.svg" alt="E-CKET"></a>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar" class="fas fa-bars"></label>

        <nav class="navbar">
            <a href="" id="navbar">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="about-us" id="navbar">About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </nav>
    </header>
    <!-- Live queue Modal -->
    <section class="home" id="homes">
        <div class="content">
            <h3>Welcome to NaviAura <span> Guiding You Through SM Aura with Ease!</span></h3>
            <p>A user-friendly navigation system designed to provide visitors with a seamless and stress-free way to explore SM Aura. With user-friendly features and accurate mapping, it helps you find stores, restaurants, and amenities effortlessly, ensuring an enjoyable shopping and dining experience</p>
            <a href="qrcode-scanner" class="btn" >Navigate Now!</a>
        </div>&nbsp;&nbsp;

        <div class="image">
            <img src="src/img/navigation-user.svg" alt="navigation-user">
        </div>
    </section>
    <section class="covid" id="cov">

        <h1 class="heading" data-aos-once="false"> How to use <span>NaviAura</span></h1>

        <div class="column" id="column1">

            <div class="image">
                <img src="src/img/locate.svg" alt="enter-otp">
            </div>

            <div class="content">
                <div class="ic">
                    <h3>Locate the QR Code</h3>
                </div>
                <p data-aos="fade-in">Begin by finding the QR code displayed on the floor you are currently on. These QR codes are strategically placed for your convenience.</p>
            </div>

        </div>
        <div class="column" id="column2">

            <div class="image">
                <img src="src/img/launch.svg" alt="access-token">
            </div>

            <div class="content">
                <div class="ic">
                    <h3>Launch the Navigation Feature</h3>
                </div>
                <p data-aos="fade-in">Open the NaviAura system and tap the "Navigate Now" button to start. This will prompt the system to activate the QR code scanner.</p>
            </div>

        </div>
        <div class="column" id="column3">

            <div class="image">
                <img src="src/img/scanning-qrcode.svg" alt="choose-event">
            </div>

            <div class="content">
                <div class="ic">
                    <h3>Scan the QR Code</h3>
                </div>
                <p data-aos="fade-in">Use the QR code scanner that appears on your screen to scan the QR code located on your floor. Ensure the camera is properly aligned with the code for a successful scan.</p>
            </div>


        </div>
        <div class="column" id="column4">

            <div class="image">
                <img src="src/img/map.svg" alt="get-ticket">
            </div>

            <div class="content">
                <div class="ic">
                    <h3>Access Your Current Floor Map</h3>
                </div>
                <p data-aos="fade-in">After successfully scanning the QR code, NaviAura will automatically redirect you to the detailed map of your current floor. You can now explore and navigate the area with ease, finding your desired locations in SM Aura.</p>
            </div>

        </div>
    </section>

    <!-- modals -->

    <footer>

        <div class="pre-registration">
            <h3>Navigate Now!<br>
                <p>NaviAura</p>
            </h3>
            <a href="qrcode-scanner" class="btn get_ticket">Click This!</a>

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
        //navbar----------------------------------------------------------------------------------------------------->
        var navbar = document.querySelector('header')

        window.onscroll = function() {
            if (window.pageYOffset > 0) {
                navbar.classList.add('header-active')
            } else {
                navbar.classList.remove('header-active')
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