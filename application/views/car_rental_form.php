<?php $this->load->view('default_template/new/contact_header'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> <!-- Flatpickr CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .booking-banner {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .booking-section h3 {
            margin-top: 0;
            margin-bottom: 15px;
        }
        .booking-section label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .booking-section input, .booking-section select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .booking-section button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .booking-section button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Book Your Car Now</h1>

<div class="booking-banner">
    <div class="booking-section">
        <h3>Car Rental Form</h3>
        <form method="POST" action="<?php echo site_url('CarRental/book'); ?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>

            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" name="contact" placeholder="e.g., +91-9876543210" required>

            <label for="email">Email ID:</label>
            <input type="email" id="email" name="email" placeholder="e.g., john@example.com" required>

            <label for="car-type">Car Type:</label>
            <select id="car-type" name="car_type" required>
                <option value="" disabled selected>Select Car Type</option>
                <option value="sedan">Sedan</option>
                <option value="suv">SUV/MUV</option>
                <option value="mini">Mini</option>
                <option value="traveller">Mini Bus</option>
            </select>

            <label for="pickup-date">Pickup Date and Time:</label>
            <input type="text" id="pickup-date" name="pickup_date" required> <!-- Change to text for Flatpickr -->

            <label for="dropoff-date">Drop-off Date and Time:</label>
            <input type="text" id="dropoff-date" name="dropoff_date" required> <!-- Change to text for Flatpickr -->

            <label for="pickup-location">Pickup Location:</label>
            <input type="text" id="pickup-location" name="pickup_location" placeholder="e.g., Airport, Hotel" required>

            <label for="drop-location">Drop Location:</label>
            <input type="text" id="drop-location" name="drop_location" placeholder="e.g., Airport, Hotel" required>

            <button type="submit">Book Now</button>
        </form>
    </div>
</div>

<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize Flatpickr
    flatpickr("#pickup-date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        onChange: function(selectedDates, dateStr, instance) {
            instance.close(); // Close the picker on selection
        }
    });

    flatpickr("#dropoff-date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        onChange: function(selectedDates, dateStr, instance) {
            instance.close(); // Close the picker on selection
        }
    });
</script>

<?php $this->load->view('default_template/new/footer'); ?>
</body>
</html>
