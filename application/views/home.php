<?php $this->load->view('default_template\new\header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour and Travel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
           
            
        }
        .box {
        background-color: green; /* Set the background color to green */
        color: white; /* Set text color to white for contrast */
        flex: 0 0 300px; /* Set a fixed width for each box */
        margin: 10px; /* Add margin for spacing */
        border-radius: 5px; /* Add border radius for rounded corners */
        padding: 20px; /* Add padding for inner spacing */
        text-align: center; /* Center align the text inside the box */
        height: 400px; /* Increased fixed height for uniformity */
        box-sizing: border-box; /* Include padding and border in height/width */
        display: flex; /* Use flexbox for vertical alignment */
        flex-direction: column; /* Stack items vertically */
        justify-content: space-between; /* Space out content evenly */
    }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
           
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }

       .slider-container {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .slider {
        display: flex;
        transition: transform 0.5s ease;
        height: 550px;
    }

    .box {
        background-color: green; /* Set the background color to green */
        color: white; /* Set text color to white for contrast */
        flex: 0 0 300px; /* Set a fixed width for each box */
        margin: 10px; /* Add margin for spacing */
        border-radius: 5px; /* Add border radius for rounded corners */
        padding: 20px; /* Add padding for inner spacing */
        text-align: center; /* Center align the text inside the box */
        height: 430px;
    }

    .box h2 {
        margin: 0 0 10px; /* Adjust margin for title spacing */
        font-size: 1.5em; /* Set font size for title */
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
        border-radius: 5px; /* Add border radius to images */
    }

    .arrow {
        position: absolute;
        top: 40%;
        transform: translateY(-50%);
        font-size: 30px;
        color: white; /* Color for arrows */
        cursor: pointer;
        z-index: 10; /* Ensure arrows are above other content */
    }

    .arrow.left {
        left: 0px;
    }

    .arrow.right {
        right: 0px;
    }

    /* Optional: Change button styling */
    .more-info {
        background-color: #fff; /* Button background color */
        color: green; /* Button text color */
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease; /* Smooth transition */
    }

    .more-info:hover {
        background-color: #e0e0e0; /* Button hover effect */
    }

        

        .slideshow-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        }

        .card {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            transition: transform 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 350px; /* Fixed height to keep all cards same size */
            width: 350px;
        }

        .card img {
            max-height: 150px; /* Fixed image height to maintain card size consistency */
            width: auto;
            margin: 0 auto;
            border-radius: 5px;
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
            background-color: #33ccff;
        }

        .card-details {
            margin-top: 10px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 15px; /* Adjust spacing between cards */
        }
        
        .carousel-item img {
            height: 300px; /* Adjust height as needed */
            object-fit: cover;
        }
   

        .form-container {
            display: flex;
            height: 100 px;
        }
        .form-section {
            flex: 1;
            padding: 5px;
            border-right: 1px solid #ccc; /* Optional: add a border between sections */
            background-color:  ;
        }
        .image-section {
            flex: 1;
            background: url('path/to/your/image.jpg') no-repeat center center; /* Replace with your image path */
            background-size: cover; /* Cover the entire section */
        }
        .modal-header {
        background-color: #4CAF50;
        color: white;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }
        button {
            background-color: #007BFF; /* Primary blue color */
            color: white; /* Text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px 20px; /* Padding for size */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 1em; /* Font size */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: translateY(-2px); /* Lift effect on hover */
        }

        button:focus {
            outline: none; /* Remove outline on focus */
        }

        button:active {
            transform: translateY(1px); /* Slightly lower on click */
        }
        .box-body {
            background-image: url('stylesheet/images/audi.jpg'); /* Add your image path here */
            background-size: cover;
            background-position: center;
            filter: blur(0.1px); /* Blurs the entire body */
            height: 115vh; /* Full viewport height */
            overflow: hidden;
        }
        h3 {
            background: linear-gradient(to right, #000099 0%, #ff99cc 100%);
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="box-body" >
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#carRentalModal">
            Book Now
        </button> -->

        <!-- Modal Structure -->
        <div class="modal fade" id="carRentalModal" tabindex="-1" role="dialog" aria-labelledby="carRentalModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="carRentalModalLabel">Car Rental Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('CarRental/submit'); ?>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <?php echo form_error('name'); ?>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number:</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
                                <?php echo form_error('contact'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email ID:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <?php echo form_error('email'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="car_type">Car Type:</label>
                                <input type="text" class="form-control" id="car_type" name="car_type" required>
                                <?php echo form_error('car_type'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pickup_date">Pickup Date and Time:</label>
                                <input type="datetime-local" class="form-control" id="pickup_date" name="pickup_date" required>
                                <?php echo form_error('pickup_date'); ?>
                            </div>
                            <div class="form-group">
                                <label for="dropoff_date">Drop-off Date and Time:</label>
                                <input type="datetime-local" class="form-control" id="dropoff_date" name="dropoff_date" required>
                                <?php echo form_error('dropoff_date'); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="pickup_location">Pickup Location:</label>
                                <input type="text" class="form-control" id="pickup_location" name="pickup_location" required>
                                <?php echo form_error('pickup_location'); ?>
                            </div>
                            <div class="form-group">
                                <label for="drop_location">Drop Location:</label>
                                <input type="text" class="form-control" id="drop_location" name="drop_location" required>
                                <?php echo form_error('drop_location'); ?>
                            </div>
                            
                            <!-- ... rest of the form ... -->
                            

                            <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

            
        <div class="container">
            <h3 align="center">Type of Cars</h3>
           <br><br>
            <div class="row">
                <!-- Slideshow 1 -->
                <div class="col-md-3">
                    <div class="slideshow-container" id="slideshow1">
                        <div class="card active">
                            <div class="card-title">Mini</div>
                            <img src="<?php echo base_url('stylesheet/images/wagonR.jpg');?>" alt="Car Image 1" class="card-image"/>
                            <div class="card-details">
                                <div class="rating">Wagon R</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: 25,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Mini</div>
                            <img src="<?php echo base_url('stylesheet/images/alto.jfif');?>" alt="Car Image 2" class="card-image">
                            <div class="card-details">
                                <div class="rating">Alto</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: 26,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Mini</div>
                            <img src="<?php echo base_url('stylesheet/images/swift.jfif');?>" alt="Car Image 3" class="card-image">
                            <div class="card-details">
                                <div class="rating">Swift</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: 27,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Mini</div>
                            <img src="<?php echo base_url('stylesheet/images/i10.jfif');?>" alt="Car Image 4" class="card-image">
                            <div class="card-details">
                                <div class="rating">i 10</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: 28,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Mini</div>
                            <img src="<?php echo base_url('stylesheet/images/santro.jfif');?>" alt="Car Image 5" class="card-image">
                            <div class="card-details">
                                <div class="rating">Santro</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $29,000</div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slideshow 2 -->
                <div class="col-md-3">
                    <div class="slideshow-container" id="slideshow2">
                        <div class="card active">
                            <div class="card-title">Sedan</div>
                            <img src="<?php echo base_url('stylesheet/images/elantra.jfif');?>" alt="Car Image 1" class="card-image"/>
                            <div class="card-details">
                                <div class="rating">Elantra</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $25,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Sedan</div>
                            <img src="<?php echo base_url('stylesheet/images/verna.jfif');?>" alt="Car Image 2" class="card-image">
                            <div class="card-details">
                                <div class="rating">Verna</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $26,000</div>
                               
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Sedan</div>
                            <img src="<?php echo base_url('stylesheet/images/city.jfif');?>" alt="Car Image 3" class="card-image">
                            <div class="card-details">
                                <div class="rating">Honda City</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $27,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Sedan</div>
                            <img src="<?php echo base_url('stylesheet/images/amazee.jfif');?>" alt="Car Image 4" class="card-image">
                            <div class="card-details">
                                <div class="rating">Amazee</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $28,000</div>
                               
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Sedan</div>
                            <img src="<?php echo base_url('stylesheet/images/dzire.jpg');?>" alt="Car Image 5" class="card-image">
                            <div class="card-details">
                                <div class="rating">Dzire</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $29,000</div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slideshow 3 -->
                <div class="col-md-3">
                    <div class="slideshow-container" id="slideshow3">
                        <div class="card active">
                            <div class="card-title">SUV/MUV</div>
                            <img src="<?php echo base_url('stylesheet/images/innova.jfif');?>" alt="Car Image 1" class="card-image"/>
                            <div class="card-details">
                                <div class="rating">Innova</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $25,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">SUV/MUV</div>
                            <img src="<?php echo base_url('stylesheet/images/ertiga.jfif');?>" alt="Car Image 2" class="card-image">
                            <div class="card-details">
                                <div class="rating">Ertiga</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $26,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">SUV/MUV</div>
                            <img src="<?php echo base_url('stylesheet/images/creta.jfif');?>" alt="Car Image 3" class="card-image">
                            <div class="card-details">
                                <div class="rating">Creta</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $27,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">SUV/MUV</div>
                            <img src="<?php echo base_url('stylesheet/images/ecosport.jfif');?>" alt="Car Image 4" class="card-image">
                            <div class="card-details">
                                <div class="rating">Eco Sports</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $28,000</div>
                                
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">SUV/MUV</div>
                            <img src="<?php echo base_url('stylesheet/images/breeza.jfif');?>" alt="Car Image 5" class="card-image">
                            <div class="card-details">
                                <div class="rating">Breeza</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $29,000</div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slideshow 4 -->
                <!-- <div class="col-md-3">
                    <div class="slideshow-container" id="slideshow4">
                        <div class="card active">
                            <div class="card-title">Premium</div>
                            <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" alt="Car Image 1" class="card-image"/>
                            <div class="card-details">
                                <div class="rating">Audi</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $25,000</div>
                                <div class="fuel-type">Fuel Type: Gasoline</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Premium</div>
                            <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" alt="Car Image 2" class="card-image">
                            <div class="card-details">
                                <div class="rating">Mercedes</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $26,000</div>
                                <div class="fuel-type">Fuel Type: Diesel</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Premium</div>
                            <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" alt="Car Image 3" class="card-image">
                            <div class="card-details">
                                <div class="rating">BMW</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $27,000</div>
                                <div class="fuel-type">Fuel Type: Electric</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Premium</div>
                            <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" alt="Car Image 4" class="card-image">
                            <div class="card-details">
                                <div class="rating">Mini Cooper</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $28,000</div>
                                <div class="fuel-type">Fuel Type: Hybrid</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">Premium</div>
                            <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" alt="Car Image 5" class="card-image">
                            <div class="card-details">
                                <div class="rating">Range Rover</div>
                                <div class="rating">Rating: ★★★★☆</div>
                                <div class="price">Price: $29,000</div>
                                <div class="fuel-type">Fuel Type: Gasoline</div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="container">
        <h3 class="text-center my-4">Trending Tour Destinations</h3>
        <div class="slider-container">
            <div class="slider" id="destinationSlider">
                <div class="box">
                    <h2>Odisha Tribal Tour</h2>
                    <img src="<?php echo base_url('stylesheet/images/odisha-tribal-tour.jpg');?>" alt="Odisha Tribal Tour" class="img-fluid">
                    <p>The city of light and love.</p>
                    <p><strong>Duration:</strong> 12 Days 11 Nights</p>
                    <button class="more-info" onclick="alert('More details about Odisha Tribal Tour...')">Click for More</button>
                </div>
                <div class="box">
                    <h2>Odisha Wildlife Tour</h2>
                    <img src="<?php echo base_url('stylesheet/images/odisha-wildlife.jpg');?>" alt="Odisha Wildlife Tour" class="img-fluid">
                    <p>The city that never sleeps.</p>
                    <p><strong>Duration:</strong> 09 Days 08 Nights</p>
                    <button class="more-info" onclick="alert('More details about Odisha Wildlife Tour...')">Click for More</button>
                </div>
                <div class="box">
                    <h2>Olive Ridley Tours</h2>
                    <img src="<?php echo base_url('stylesheet/images/olive-ridley.jpg');?>" alt="Olive Ridley Tours" class="img-fluid">
                    <p>A bustling metropolis with a unique culture.</p>
                    <p><strong>Duration:</strong> 06 Days 05 Nights</p>
                    <button class="more-info" onclick="alert('More details about Olive Ridley Tours...')">Click for More</button>
                </div>
                <div class="box">
                    <h2>Golden Triangle of Odisha</h2>
                    <img src="<?php echo base_url('stylesheet/images/golden-triangle.jpg');?>" alt="Golden Triangle of Odisha" class="img-fluid">
                    <p>Famous for its Sydney Opera House.</p>
                    <p><strong>Duration:</strong> 04 Days 03 Nights</p>
                    <button class="more-info" onclick="alert('More details about Golden Triangle of Odisha...')">Click for More</button>
                </div>
                <div class="box">
                    <h2>Odisha Buddhist Tour</h2>
                    <img src="<?php echo base_url('stylesheet/images/buddhist-tour.jpg');?>" alt="Odisha Buddhist Tour" class="img-fluid">
                    <p>Known for its stunning landscapes and Table Mountain.</p>
                    
                    <p><strong>Duration:</strong> 06 Days 05 Nights </p>
                    <button class="more-info" onclick="alert('More details about Odisha Buddhist Tour...')">Click for More</button>
                </div>
            </div>
            <div class="arrow left" onclick="changeSlide(-1)">&#10094;</div>
            <div class="arrow right" onclick="changeSlide(1)">&#10095;</div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>stylesheet/plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_API_KEY; ?>&libraries=places&callback=initMap&libraries=visualization" async defer></script>


    <script type="text/javascript">
        function initSlideshow(slideshowId) {
            let currentIndex = 0;
            const cards = document.querySelectorAll(`#${slideshowId} .card`);
            const totalCards = cards.length;

            function showCard(index) {
                cards.forEach((card, i) => {
                    card.style.display = (i === index) ? 'block' : 'none';
                });
            }

            function nextCard() {
                currentIndex = (currentIndex + 1) % totalCards;
                showCard(currentIndex);
            }

            // Show the first card initially
            showCard(currentIndex);
            // Change card every 3 seconds
            setInterval(nextCard, 3000);
        }

            // Initialize all slideshows
            initSlideshow('slideshow1');
            initSlideshow('slideshow2');
            initSlideshow('slideshow3');
            initSlideshow('slideshow4');
    </script>
    <script type="text/javascript">
        let currentSlide = 0;
        const slides = document.querySelectorAll('.box');
        const totalSlides = slides.length;

        function changeSlide(direction) {
            currentSlide += direction;
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1; // Wrap to last slide
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0; // Wrap to first slide
            }
            updateSlider();
        }

        function updateSlider() {
            const slider = document.getElementById('destinationSlider');
            const offset = -currentSlide * (310); // Adjust offset based on box width + margin
            slider.style.transform = `translateX(${offset}px)`;
        }
    </script>
    </div>
</body>
</html>
<br>
<?php $this->load->view('default_template\new\footer'); ?>