<?php $this->load->view('default_template\new\contact_header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .contact-banner {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            display: flex;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-section {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            margin-right: 20px;
        }
        .form-section h3 {
            margin-top: 0;
            margin-bottom: 15px;
        }
        .form-section label {
            display: block; /* Ensures labels are on separate lines */
            margin-bottom: 5px;
            font-weight: bold; /* Make labels bold */
        }
        .form-section input, .form-section textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding is included in width */
        }
        .form-section button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Increase font size */
        }
        .form-section button:hover {
            background-color: #45a049;
        }
        .card-section {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
        }
        .card i {
            font-size: 30px;
            margin-right: 10px;
            color: #4CAF50;
        }
        .social-media {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .social-media a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 24px;
            transition: color 0.3s;
        }
        .social-media a:hover {
            color: #45a049;
        }
        .map-container {
            margin-top: 20px;
            text-align: center;
        }
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>

<h1>Contact Us</h1>

<div class="contact-banner">
    <!-- Message Form Section -->
    <div class="form-section">
        <h3>Send Your Message</h3>
        <form method="POST" action="process_contact.php">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" placeholder="e.g., John Doe" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="e.g., john@example.com" required>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" placeholder="e.g., +91-8763558734" required>

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" placeholder="Subject of your message" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Your message here..." required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Contact Cards Section -->
    <div class="card-section">
        <div class="card">
            <i class="fas fa-phone-alt"></i>
            <div>
                <div class="card-title">Telephone:</div>
                <span>+91-8763558734 / +91-9861357334</span>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-envelope"></i>
            <div>
                <div class="card-title">E-Mail:</div>
                <span>contact@example.com</span>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-map-marker-alt"></i>
            <div>
                <div class="card-title">Address:</div>
                <span>Plot No.-35, Gangotri Nagar, Lane-2, Bhubaneswar-751002</span>
            </div>
        </div>

        <!-- Social Media Section -->
        <div class="social-media">
            <h3>Follow Us</h3>
            <a href="https://wa.me/your-whatsapp-number" target="_blank" title="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://www.facebook.com/your-facebook-page" target="_blank" title="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/your-instagram-profile" target="_blank" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/in/your-linkedin-profile" target="_blank" title="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://twitter.com/your-twitter-handle" target="_blank" title="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="map-container">
    <h3>Our Location</h3>
    <div id="map"></div>
</div>

<script>
    function initMap() {
        var location = { lat: 20.231619885641738, lng: 85.8436788 }; // Coordinates for Bhubaneswar
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location,
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Our Location'
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_API_KEY; ?>&libraries=places&callback=initMap&libraries=visualization" async defer></script>

<?php $this->load->view('default_template\new\footer'); ?>
</body>
</html>
