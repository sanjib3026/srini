<?php $this->load->view('default_template\new\service_header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Srinibash Tours & Travels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .counter-counting .text-dark {
            font-size: 3rem; /* Increase the font size */
        }
        /* Banner styles */
        .banner {
            padding: 20px;
            text-align: center;
            background-color: #007bff;
            color: white;
        }
        .box {
            padding: 20px;
            text-align: center;
            background-color: #007bff;
            
        }
        .banner h1 {
            margin: 0;
            font-size: 36px;
        }

        /* Card container styles */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
            margin: 20px auto;
        }
        .card {
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: calc(30% - 40px);
            box-sizing: border-box;
            text-align: center;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .card h2 {
            font-size: 20px;
            margin: 10px 0 5px;
        }
        .card p {
            margin: 0;
        }
        .blinking-icon {
            display: inline-flex; /* Change to inline-flex for better centering */
            justify-content: center;
            align-items: center;
            background-color: red; /* Red background */
            color: white;
            border-radius: 50%; /* Circular shape */
            width: 50px; /* Fixed width */
            height: 50px; /* Fixed height */
            font-size: 24px; /* Icon size */
            animation: blink 1s infinite, float 2s infinite;
            margin-bottom: 10px;
        }

        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }
        .card:hover {
            border-color: red;
            box-shadow: 0 4px 20px rgba(255, 0, 0, 0.5);
        }

        /* Counter section styles */
        .counter {
            background-color: #f0f8ff;
            color: #333;
            padding: 50px 0;
        }
        .counter-item {
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            transition: border-color 0.3s;
        }
        .counter-item:hover {
            border-color: red; /* Change border color on hover */
        }
        .counter-item-icon {
            margin-bottom: 10px;
            background-color: red; /* Red background */
            border: 2px solid #007bff;
            border-radius: 50%; /* Circular shape */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            color: white; /* Icon color matches background */
            animation: blink 1s infinite; /* Blinking effect */
        }
        .counter-item h4 {
            margin: 0;
        }

        /* Features section styles */
        .feature {
            background-color: #f8f9fa;
        }
        .feature-item {
            background: #ffc107;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            height: 200px;
            transition: border-color 0.3s, background-color 0.3s;
            border: 2px solid transparent; /* Transparent border for uniformity */
        }
        .feature-item:hover {
            border: 2px solid red;
            background-color: #ffca2e;
        }
        .feature-icon {
            background-color: red; /* Red background */
            color: white;
            border-radius: 50%; /* Circular shape */
            padding: 20px;
            margin-right: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px; /* Increased font size for better visibility */
            animation: blink 1s infinite; /* Blinking effect */
        }
        h5 {
            font-weight: bold;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .card {
                width: calc(45% - 40px);
            }
        }
        @media (max-width: 480px) {
            .card {
                width: calc(100% - 40px);
            }
            .counter-item {
                flex: 1 0 100%;
            }
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-xl-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="banner">
        <h1>Our Services</h1>
    </div>
    <div class="box">
        <div class="card-container">
            <div class="card">
                <span class="blinking-icon">📞</span>
                <h2>Phone Reservation</h2>
                <p>Booking your car rental is quick and easy with our phone reservation service...</p>
            </div>
            <div class="card">
                <span class="blinking-icon">💰</span>
                <h2>Special Rates</h2>
                <p>Unlock exceptional value with our special rates on tours and travels...</p>
            </div>
            <div class="card">
                <span class="blinking-icon">➡️</span>
                <h2>One Way Rental</h2>
                <p>Experience the ultimate flexibility with our one-way rental service...</p>
            </div>
            <div class="card">
                <span class="blinking-icon">🛡️</span>
                <h2>Life Insurance</h2>
                <p>Travel with peace of mind by adding life insurance to your tours...</p>
            </div>
            <div class="card">
                <span class="blinking-icon">🏙️</span>
                <h2>City to City</h2>
                <p>Discover the excitement of seamless city-to-city travel with our tailored packages...</p>
            </div>
            <div class="card">
                <span class="blinking-icon">🚗</span>
                <h2>Free Ride</h2>
                <p>Take advantage of our special offer for free rides and elevate your travel experience...</p>
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid counter">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-xl-3">
                    <div class="counter-item">
                        <div class="counter-item-icon">
                            <i class="fas fa-thumbs-up fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">829</span>
                            <span class="h1 fw-bold text-dark">+</span>
                        </div>
                        <h4 class="text-dark mb-0">Happy Clients</h4>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="counter-item">
                        <div class="counter-item-icon">
                            <i class="fas fa-car-alt fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">56</span>
                            <span class="h1 fw-bold text-dark">+</span>
                        </div>
                        <h4 class="text-dark mb-0">Number of Cars</h4>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="counter-item">
                        <div class="counter-item-icon">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">127</span>
                            <span class="h1 fw-bold text-dark">+</span>
                        </div>
                        <h4 class="text-dark mb-0">Car Centers</h4>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="counter-item">
                        <div class="counter-item-icon">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">589</span>
                            <span class="h1 fw-bold text-dark">+</span>
                        </div>
                        <h4 class="text-dark mb-0">Total Kilometers</h4>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="box">
        <div class="container-fluid counter">
            <div class="container">
                <div class="row g-5">
                    <div class="col-md-6 col-xl-3">
                        <div class="counter-item">
                            <div class="counter-item-icon">
                                <i class="fas fa-thumbs-up fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">829</span>
                            </div>
                            <h4 class="text-dark mb-0">Happy Clients</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="counter-item">
                            <div class="counter-item-icon">
                                <i class="fas fa-car-alt fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">56</span>
                            </div>
                            <h4 class="text-dark mb-0">Number of Cars</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="counter-item">
                            <div class="counter-item-icon">
                                <i class="fas fa-building fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">127</span>  
                            </div>
                            <h4 class="text-dark mb-0">Car Centers</h4>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-xl-3">
                        <div class="counter-item">
                            <div class="counter-item-icon">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <div class="counter-counting my-3">
                                <span class="text-dark fs-2 fw-bold" data-toggle="counter-up">589</span>
                            </div>
                            <h4 class="text-dark mb-0">Total Kilometers</h4>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="container-fluid feature py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize mb-3" style="color: red;"><span>Our Features</span></h1>
                    <p class="mb-0">At Sri Srinibash Tours and Travels, we pride ourselves on offering a premier travel experience...</p>
                </div>
                <div class="row g-4 align-items-stretch">
                    <div class="col-xl-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <span class="fa fa-trophy fa-2x"></span>
                            </div>
                            <div class="ms-4">
                                <h5 class="mb-3">First Class Services</h5>
                                <p class="mb-0">Experience unparalleled excellence with our first-class services...</p>
                            </div>
                        </div>
                        <br>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <span class="fa fa-road fa-2x"></span>
                            </div>
                            <div class="ms-4">
                                <h5 class="mb-3">24/7 Road Assistance</h5>
                                <p class="mb-0">Count on us for 24/7 road assistance...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-4">
                        <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" class="img-fluid w-100" style="object-fit: cover;" alt="Features Image">
                    </div>
                    <div class="col-xl-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <span class="fa fa-tag fa-2x"></span>
                            </div>
                            <div class="text-end me-4">
                                <h5 class="mb-3">Quality at Minimum</h5>
                                <p class="mb-0">Achieve exceptional quality at minimal cost...</p>
                            </div>
                        </div>
                        <br>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <span class="fa fa-map-pin fa-2x"></span>
                            </div>
                            <div class="text-end me-4">
                                <h5 class="mb-3">Pick-Up &amp; Drop-Off</h5>
                                <p class="mb-0">Seamlessly start and end your journey...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            function countUp(el, endVal) {
                let startVal = 0;
                const duration = 2000;
                const incrementTime = Math.floor(duration / endVal);

                const timer = setInterval(() => {
                    startVal += 1;
                    $(el).text(startVal + (startVal === 1 ? '' : ' +'));

                    if (startVal >= endVal) {
                        clearInterval(timer);
                    }
                }, incrementTime);
            }

            countUp('[data-toggle="counter-up"]:first', 829);
            countUp('[data-toggle="counter-up"]:nth(1)', 56);
            countUp('[data-toggle="counter-up"]:nth(2)', 127);
            countUp('[data-toggle="counter-up"]:nth(3)', 589);
        });
    </script>
</body>
</html>

<?php $this->load->view('default_template\new\footer'); ?>
