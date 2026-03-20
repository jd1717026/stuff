<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="design.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barriecito&display=swap');
        body, html {height: 100%; background-color: #91704b;}
        .hero-image {
        background-image: linear-gradient(#00000080), url("pexels-kureng-workx-2546437-4404518.jpg");
        height: 30%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        }
        .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        }
        .zoom {transition: transform .2s;}
        .zoom:hover {transform: scale(1.1);}
        a {color: #ffffff; text-decoration: underline;}
        a:hover {color: #000; text-decoration: underline;}
        .btn:hover {
        color: var(--bs-btn-hover-color);
        background-color: #ca9234;
        border-color: none;
        }
        .btn-primary { --bs-btn-border-color: none;}
    </style>
    <title>Safari Heights</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm fixed-top" style="background-color: #8c641c;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Home Page</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Experiences</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="booking.php">Zoo Visit</a></li>
                        <li><a class="dropdown-item" href="shop.php">Sunset Safari</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="page.html">Support</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="events.html">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Log In</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="hero-image">
    <div class="hero-text">
        <h1>Safari Heights</h1>
        <h3>Booking Page</h3>
    </div>
    </div><br />

    <br /><h1>Safari Heights Animal Family Trust</h1><br />

    <?php
    session_start();

    $page_title = 'Shop';
    // include('includes/header.html');

    require_once "config_ecommerce.php";

    $q = "SELECT * FROM products";
    $r = mysqli_query($link, $q);

    if(mysqli_num_rows($r)>0)
    {
        echo'<div class="container"> 

        ';

        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
            echo'<div class="col-sm">

            <h5>'.$row['ticket_type'].'</h5>
            <p">'.$row['description'].'</p>
            <p">£'.$row['price'].'</p>
            <a href="added.php?id='.$row['id'].'" class="btn btn-primary">Add to Cart</a><br><br></div>';

        }
        echo'<p><a href="cart.php"><button type="button" class="btn btn-warning">View Cart</button></a></p>
        </div></div>
        </main><br><br><br>';
        mysqli_close($link);
    }
    echo'</div>';
?>

<div class="container">
    <img src="placeholder.webp">
    <h6>Page Is Unfinished</h6>
</div><br />

</body>
</html>