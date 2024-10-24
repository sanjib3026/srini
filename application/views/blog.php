<?php $this->load->view('default_template\new\blog_header'); ?>
    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->
        <style>
            .container {
                padding-bottom: 100px; /* Space for the footer */
            }
            .card {
                margin: 20px 0;
                border: 1px solid #ddd; /* Border added */
                border-radius: 5px; /* Rounded corners */
                overflow: hidden; /* Prevents overflow when scaling */
                transition: transform 0.3s, background-color 0.3s; /* Smooth transition for scaling and background color */
                display: flex;
                flex-direction: column; /* Stack items vertically */
                height: 100%; /* Ensures all cards are of the same height */
                min-height: 400px; /* Ensures a minimum height for all cards */
            }
            .card:hover {
                transform: scale(1.05); /* Scale up the card */
                background-color: #f0f0f0; /* Change background color on hover */
            }
            .card-img-top {
                transition: transform 0.3s; /* Smooth transition for image scaling */
                height: 200px; /* Set a fixed height for images */
                object-fit: cover; /* Ensure image covers area without distortion */
            }
            .card:hover .card-img-top {
                transform: scale(1.1); /* Scale up the image on hover */
            }
            .card-body {
                flex: 1; /* Allows the card body to grow and take available space */
            }
            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .mini-card {
                background-color: #f8f9fa;
                padding: 5px;
                border-radius: 5px;
                font-size: 0.85em;
            }
            .user-info {
                display: flex;
                align-items: center;
                font-size: 0.9em;
            }
            .user-info i {
                font-size: 20px;
                margin-right: 5px;
            }
            .read-more {
                background-color: red;
                color: white;
                border: none;
                padding: 10px 15px;
                border-radius: 5px;
                text-decoration: none;
                text-align: center; /* Center text inside button */
                margin-top: auto; /* Push the button to the bottom */
            }
            .read-more:hover {
                background-color: darkred;
            }
            footer {
                background-color: #f8f9fa;
                text-align: center;
                padding: 10px 0;
                box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body>

        <div class="container">
            <h1 class="my-4"> Blog & News </h1>

            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" class="card-img-top" alt="Driving Fines">
                        <div class="card-header">
                            <div class="mini-card">30 Aug 2022</div>
                        </div>
                        <div class="user-info">
                            <i class="fa fa-user"></i> <!-- User Icon -->
                            <span>Martin.C</span>
                            <span class="ml-2"><i class="fa fa-comment"></i> 6 Comments</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-2">Rental Cars: How to Check Driving Fines?</h5>
                            <p class="card-text">
                                Stay informed and drive with peace of mind by easily checking for any driving fines associated with your rental car. Our simple process allows you to quickly review and address any outstanding fines, ensuring a hassle-free experience. Just follow our straightforward instructions to access your fine details and resolve them promptly, so you can focus on enjoying your journey without any surprises.
                            </p>
                        </div>
                        <a href="#" class="read-more">Read More ➔</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo base_url('stylesheet/images/bmw.jfif');?>" class="card-img-top" alt="Rental Cost">
                        <div class="card-header">
                            <div class="mini-card">25 Dec 2023</div>
                        </div>
                        <div class="user-info">
                            <i class="fa fa-user"></i> <!-- User Icon -->
                            <span>Washington</span>
                            <span class="ml-2"><i class="fa fa-comment"></i> 4 Comments</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-2">Rental Cost of Sport and Other Cars</h5>
                            <p class="card-text">
                                Discover unbeatable value with our competitive rental rates for both sport and everyday cars. Whether you're craving the thrill of a high-performance sports car or seeking the practicality of a reliable sedan, we offer flexible pricing options to fit your budget and needs. Enjoy a premium driving experience without breaking the bank—choose the perfect vehicle and drive away with confidence.
                            </p>
                        </div>
                        <a href="#" class="read-more">Read More ➔</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo base_url('stylesheet/images/rangerover.jfif');?>" class="card-img-top" alt="Documents Required">
                        <div class="card-header">
                            <div class="mini-card">27 Oct 2023</div>
                        </div>
                        <div class="user-info">
                            <i class="fa fa-user"></i> <!-- User Icon -->
                            <span>Carlos  </span>
                            <span class="ml-2"><i class="fa fa-comment"></i> 9 Comments</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-2">Documents Required for Car Rental</h5>
                            <p class="card-text">
                                To ensure a smooth car rental experience, please prepare the following documents: a valid driver's license, a credit card in your name for security purposes, and a government-issued ID such as a passport or national ID card. These documents help us verify your identity and process your rental quickly. Make sure all documents are current and in good condition to avoid any delays.
                            </p>
                        </div>
                        <a href="#" class="read-more">Read More ➔</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <footer>
           <?php $this->load->view('default_template\new\footer'); ?>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>