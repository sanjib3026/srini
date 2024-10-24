<style>
   footer {
    background-color: #0066cc;
    color: white;
    padding: 20px 0;
    text-align: center;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 100%;
    margin: 0 auto;
}

.footer-logo img {
    max-width: 150px;
    margin-bottom: 20px;
}
.footer-comapny-logo img {
    max-width: 50px;
    margin-bottom: 0px;
}
.footer-contact, .footer-about, .footer-links, .footer-hours {
    width: 20%;
    padding: 10px;
}

.footer-links ul {
    list-style-type: none;
    padding: 0;
}

.footer-links li a {
    color: #f1f1f1;
    text-decoration: none;
}

.footer-links li a:hover {
    text-decoration: underline;
}

.footer-bottom {
    margin-top: 20px;
    font-size: 0.9em;
}

</style>
<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <img src="<?php echo base_url('stylesheet/images/srini.png'); ?>" alt="Company Logo">
        </div>
        <div class="footer-contact">
            <h4>Contact Us</h4>
            <p>Email: contact@srinibashtravelsodisha.com</p>
            <p>Phone: 9861357334</p>
        </div>
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li > <a href="<?php echo base_url(); ?>">Home</a></li>
                <li >  <a href="<?php echo base_url('About'); ?>">About</a></li>
                <li >  <a href="<?php echo base_url('Service'); ?>">Service</a></li>
                <li >  <a href="<?php echo base_url('Blog'); ?>">Blog</a></li>
                <li >  <a href="<?php echo base_url('Contact'); ?>">Contact</a></li>
            </ul>
        </div>
        <div class="footer-comapny-logo">
            <img src="<?php echo base_url('stylesheet/images/BT.jpg'); ?>" alt="Company Logo">
             Bitomation Technology Pvt Ltd (BTPL) <br>Copyright &copy; <?php echo date("Y"); ?>
        </div>
    </div>
    
</footer>


