<?php $this->load->view('default_template\new\about_header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri Srinibash Tours & Travels</title>
    <style>
       .banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #bab45d;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            height: 100vh;
            overflow: hidden;
        }
        .info {
            max-width: 50%;
            padding-right: 20px;
        }
        .info h1 {
            font-size: 3em;
            margin: 0;
            color: #003366;
        }
        .info p {
            font-size: 1.5em;
            color: #333;
            margin: 20px 0;
        }
        .cards {
            margin-top: 20px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
            width: 500px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            margin-top: 0;
            color: #003366;
        }
        .experience-card {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            background-color: #5d5dba;
            border-radius: 1px;
            margin-bottom: 20px;
            width: 200px;
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.1);

        }
        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .image-section img {
            max-width: 100%;
            border-radius: 10px;
        }
        .owner-section {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            border: 2px solid #003366;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }
        .owner-details {
            flex: 1;
            padding-right: 20px;
        }
        .owner-image img {
            border-radius: 50%;
            max-width: 150px;
            border: 3px solid #ffcc00;
        }
        .owner-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .owner-image p {
            font-size: 1.2em;
            color: #003366;
            text-align: center;
            margin-top: 10px;
        }
        /*.experience {
            font-size: 1.1em;
            color: #666;
            margin: 10px 0;
        }*/
        .service-list {
            list-style-type: none;
            padding: 0;
            font-size: 1em;
            color: #333;
            margin-right: 200px;


        }
        .service-list li {
            margin: 5px 0;
        }
        .button {
            background-color: #003366;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.2em;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #00509e;
        }
        .blinking-icon {
            display: inline-block;
            animation: blink 1s infinite;
            font-size: 24px;
            color: #ff9900;
            margin-right: 5px;
        }
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }
        @media (max-width: 768px) {
            .banner {
                flex-direction: column;
                height: auto;
                text-align: center;
            }
            .info {
                max-width: 100%;
                padding-right: 0;
            }
            .image-section img {
                max-width: 80%;
            }
            .owner-section {
                flex-direction: column;
                align-items: center;
            }
            .owner-image {
                margin-top: 20px;
            }
        }
        .features {
            list-style-type: none;
            padding: 0;
            margin: 0;
            flex: 1; /* Allow this section to grow */
        }
        .features li {
            margin: 5px 0;
        }
        .check-icon {
            color: green;
            margin-right: 5px;
        }
        .experience {
            margin-left: 20px; /* Space between the features and experience */
            text-align: right; /* Align text to the right */
        }
        .experience h2 {
            margin: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="banner">
        <div class="info">
            <h1><span class="blinking-icon">✨</span>About Us</h1>
            <p>Welcome to Sri Srinivasa Tours and Travels!

                "Welcome to Sri Srinibash Tours & Travels, where your journey begins with exceptional service and personalized experiences. With a passion for crafting unforgettable travel adventures, we are dedicated to turning your travel dreams into reality. Our team of experienced travel experts specializes in designing tailored itineraries that cater to your unique interests and preferences. From luxurious escapes and cultural explorations to thrilling adventures and serene retreats, we handle every detail with care and precision. At Sri Srinibash Tours & Travels, we believe that every trip should be a memorable experience, characterized by comfort, convenience, and discovery."
            </p>
            <div class="cards">
                <div class="card">
                    <h3><span class="blinking-icon">🌟</span>Our Vision</h3>
                    <p>To be the leading travel agency, known for exceptional service and unforgettable experiences.</p>
                </div>
                <br/>
                <div class="card">
                    <h3><span class="blinking-icon">🎯</span>Our Mission</h3>
                    <p>To provide quality travel solutions that cater to our customers' unique needs and preferences.</p>
                </div>
            </div>
            <a href="#" class="button">More About Us</a>
        </div>
        <div class="image-section">
            <img src="<?php echo base_url('stylesheet/images/audi.jpg');?>" alt="Cars" />
            
        </div>
    </div>
    <div class="owner-section">
        <div class="owner-details">
            <div class="experience-card" >
                <div class="experience"><b style="color: white;">Years of Experience: 17 </b></div>
            </div>
            <ul class="features">
                <li><span class="check-icon">✔</span>Diverse Fleet of Vehicles</li>
                <li><span class="check-icon">✔</span>Exceptional Vehicle Quality</li>
                <li><span class="check-icon">✔</span>Flexible Rental Options</li>
                <li><span class="check-icon">✔</span>Customer-Centric Service</li>
                <li><span class="check-icon">✔</span>Transparent Pricing</li>
            </ul>
            
        </div>
        <div class="owner-image">
            <img src="<?php echo base_url('stylesheet/images/owner.jpeg');?>" alt="Owner" />
            <p>Santosh Kumar Nanda</p>
        </div>
    </div>
</body>
</html>


<?php $this->load->view('default_template\new\footer'); ?>