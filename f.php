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
            position: relative;
            text-align: center;
            margin: 20px 0;
        }

        .zoom-container img {
            max-width: 100%;
            transform: scale(1);
            transition: transform 0.3s ease;
        }

        .zoom-controls {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .zoom-controls button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .zoom-controls button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

<header>

<a href="" id="logo" class="delete"><img src="src/img/naviaura-logo.svg" alt="E-CKET"></a>
<input type="checkbox" id="menu-bar">
<label for="menu-bar" class="fas fa-bars"></label>

<nav class="navbar">
    <a href="" id="navbar">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="maps" id="navbar">Maps</a></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="about-us" id="navbar">About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</nav>
</header>

    <section class="home" id="homes">
        <div class="content">
            <!-- Zoomable Image Section -->
            <div class="zoom-container">
                <img id="zoomableImage" src="src/floor_img/BASEMENT.png" alt="Sample Map">
                <div class="zoom-controls">
                    <button id="zoomIn">+</button>
                    <button id="zoomOut">-</button>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <h1 class="credit"></h1>
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

        // Zoomable Image Logic
        const zoomableImage = document.getElementById('zoomableImage');
        const zoomInButton = document.getElementById('zoomIn');
        const zoomOutButton = document.getElementById('zoomOut');

        let scale = 1;
        const scaleStep = 0.1;
        const maxScale = 3;
        const minScale = 0.5;

        zoomInButton.addEventListener('click', () => {
            if (scale < maxScale) {
                scale += scaleStep;
                zoomableImage.style.transform = `scale(${scale})`;
            }
        });

        zoomOutButton.addEventListener('click', () => {
            if (scale > minScale) {
                scale -= scaleStep;
                zoomableImage.style.transform = `scale(${scale})`;
            }
        });
    </script>
</body>

</html>
