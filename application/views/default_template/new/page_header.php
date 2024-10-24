<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Srinibash Tours & Travels</title>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Add your CSS here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .header {
            background-color: #007bff;
            color: #fff;
            font-size: 14px;
            padding-bottom: 15px;
        }

        .top-info {
           background: linear-gradient(to left, #66ff99 0%, #ff99cc 100%);
            padding: 10px 0;
            text-align: center;
            color: #333;
            font-size: 14px;
        }

        .top-info span {
            margin-right: 20px;
            display: inline-block;
        }

        .top-info i {
            margin-right: 5px;
            color: #007bff;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
            background: linear-gradient(to right, #000099 0%, #99ff33 100%);
        }

        .navbar .navbar-brand {
            font-size: 26px;
            font-weight: bold;
        }

        .navbar .nav-links {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .navbar .nav-links a:hover {
             background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
        }

        .get-started {
            background: rgb(0, 191, 255);
            padding: 10px 20px;
            border-radius: 5px;
            color: #333;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .get-started:hover {
            background-color: #333;
            color: #fff;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
            }

            .navbar .nav-links {
                flex-direction: column;
                align-items: center;
            }

            .navbar .nav-links a {
                margin: 10px 0;
            }

            .navbar .get-started {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <!-- Navigation Bar -->
        <nav class="navbar">
            <!-- Logo / Brand Name -->
            <div class="navbar-brand">
                <i class='fas fa-car' style='font-size:28px;color:red'></i> Sri Srinibash Tours & Travels
            </div>

            <!-- Navigation Links -->
            <div class="nav-links">
                <li > <a href="<?php echo base_url(); ?>">Home</a></li>
                <li >  <a href="<?php echo base_url('About'); ?>"> About </a></li>
                <li >  <a href="<?php echo base_url('Service'); ?>">Service</a></li>
                <li >  <a href="<?php echo base_url('Blog'); ?>">Blog</a></li>
                <li class="active">  <a href="<?php echo base_url('Pages'); ?>"><b style="color: red;"> Pages </b></a></li>
                <li >  <a href="<?php echo base_url('Contact'); ?>">Contact</a></li>
            </div>

            <!-- Get Started Button -->
            <div>
                <a href="<?php echo base_url('get-started'); ?>" class="get-started"> Book Now</a>
            </div>
        </nav>
         <!-- Top Information Bar -->
    
        <div class="top-info">
            <span><i class="fas fa-map-marker-alt"></i> Gangotri Nagar, BBSR</span>
            <span><i class="fas fa-phone-alt"></i> +91 8763558734</span>
            <span><i class="fas fa-envelope"></i> contact@srinibashtravelsodisha.com</span>
            <span><i class='fab fa-whatsapp'></i> </span>
            <span><i class='fab fa-facebook'></i> </span>
            <span><i class='fab fa-instagram'></i> </span>
            <span><i class='fab fa-linkedin'></i> </span>
            <span><i class='fab fa-twitter'></i> </span>
        </div>
       
    </header>

</body>
</html>
