<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SATARK Portal</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheet/dist/css/AdminLTE.min.css">                       
        <link rel="shortcut icon" href="<?php echo base_url(); ?>stylesheet/images/rimes.ico">
        <meta name="csrf-token" csrf_hash="<?php echo $this->security->get_csrf_hash(); ?>" csrf_name="<?php echo $this->security->get_csrf_token_name(); ?>" />
        <style>
            footer{ 
                background: #0066a6;
                font-size: 16px;
                position:static; 
                bottom:0; 
                width:100%; 
                height:90px; 
                color: #fff;
                font-size: 16px;
                /*margin-top: 120px;*/
                text-align: left;
            }
            .ftb{
                border-left: 10px solid #0066a6;
            }
        </style> 
        <!-- Firebase App is always required and must be first -->
        <script src="<?php echo base_url(); ?>stylesheet/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <script src="<?php echo base_url(); ?>stylesheet/bootstrap/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url(); ?>stylesheet/js/jquery.blockUI.js"></script>
        <<!-- script src="https://www.gstatic.com/firebasejs/6.2.3/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.2.3/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.2.3/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.2.3/firebase-firestore.js"></script> -->
        <script src="<?php echo base_url(); ?>assets/firebase/firebase.js"></script>
        <script src="<?php echo base_url(); ?>assets/firebase/firebase-app.js"></script>
        <script src="<?php echo base_url(); ?>assets/firebase/firebase-auth.js"></script>
        <script src="<?php echo base_url(); ?>assets/firebase/firebase-firestore.js"></script>
        <script src="<?php echo base_url(); ?>stylesheet/js/firebase_config.js"></script> 
        <script type="text/javascript">
            function handleSignUp() {
                var email       = document.getElementById('email').value;
                var password    = document.getElementById('password').value;
                firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                    if (errorCode == 'auth/weak-password') {
                        alert('The password is too weak.');
                    } else {
                        alert(errorMessage);
                    }
                    console.log(error);
                });
            }
            // Initiate Firebase
            function initApp() {
                firebase.auth().signOut();
                var user_token = '';
                firebase.auth().onAuthStateChanged(function (user) {
                    if (user) {
                        user_token = user.uid;
                        var last_id = $("#firebase_last_id").val();
                        if(user_token !== ''){
                            register_user_firebase(last_id,user_token)
                        }   
                    } else {
                        user_token = null;
                    }
                });
                user_token = null;
            }
        </script>
    </head>
    <body>
    <!-- Main content Start-->
    <img src="<?php echo base_url() ?>stylesheet/images/header_banner3.png" alt="" height="100%" width="100%" />
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Registration
                </h3>
            </div>
            <div class="box-body">
                <div style="height: 100%;"> <!--style="height: 650px;"-->
                    <center>   
                        <table style="width: 30%; margin: 10px;">
                            <tr>
                                <td>
                                    <div class="login-box-body" style="background-image: linear-gradient(#d1ddeb, #a2bee5, #7aa3db, #4d81ca);">
                                        <div id="the-message"></div>
                                        <?php
                                            $attributes = array("name" => "regis_form", "id" => "regis_form", "method" => "post" , "autocomplete" => "off");
                                            echo form_open("Login/registerValidation", $attributes);
                                        ?>
                                        <center><img src="<?php echo base_url(); ?>stylesheet/images/regis.png" width="100px" height="100px"></center>
                                        <br>
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>Full Name: </b></font>
                                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full name" autocomplete="off" />
                                        </div>
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>E-mail: </b></font>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off"/>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>Phone: </b></font>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" autocomplete="off"/>
                                            <span class="help-block"></span>
                                            <?php echo form_error('phone','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>District: </b></font>
                                            <?php
                                                $attributes = 'id="district" class="form-control"';
                                                echo form_dropdown('district', $district_list, set_value('district'), $attributes);
                                            ?>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>Block: </b></font>
                                            <?php
                                                $attributes = 'id="block" class="form-control"';
                                                echo form_dropdown('block', $block_list, set_value('block'), $attributes);
                                            ?>
                                        </div> 
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>User Name: </b></font>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
                                        </div>                                            
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>Password: </b></font>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                                        </div>
                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>Confirm Password: </b></font>
                                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" autocomplete="off" placeholder="Confirm password"/>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <font style="color: black;"><b>Role: </b></font>
                                            <?php
                                                $role_att = 'id="role" class="form-control" ';
                                                echo form_dropdown('role', $role_list, set_value('role'), $role_att);
                                            ?>
                                        </div>
                                        <div class="text_role" id="text_role" style="display:none">
                                            <div class="form-group has-feedback">
                                             <font style="color: black;"><b>Department: </b></font>
                                             <?php
                                                $attributes = 'id="department" class="form-control"';
                                                echo form_dropdown('department', $department_list, set_value('department'), $attributes);
                                            ?>
                                            </div>
                                            <div class="other_dept" id="other_dept"  style="display:none">
                                            
                                            <div class="form-group has-feedback">
                                             <font style="color: black;"><b>Other Department: </b></font>
                                             <input type="text" class="form-control" name="others" id="others" placeholder=" Other Department" autocomplete="off" />
                                            </div>
                                            
                                            </div>
                                        </div>
                                        <div class="text_role1" id="text_role1" name="text_role1" style="display:none">
                                            <div class="form-group has-feedback">
                                             <font style="color: black;"><b>Designation: </b></font>
                                             <input type="text" class="form-control" name="designation" id="designation" placeholder=" Designation" autocomplete="off" />
                                            </div>
                                            <div class="form-group has-feedback">
                                             <font style="color: black;"><b>Office Address: </b></font>
                                             <input type="text" class="form-control" name="off_address" id="off_address" placeholder=" Office Address" autocomplete="off" />
                                            </div>
                                            <div class="form-group">
                                            <font style="color: black;"><span>
                                                You have chosen to be a "expert user". However, you will be registered as a normal user. Your application shall undergo a review process, once all information are found accurate, you account will be upgraded. This may take upto 24 hours to activate.
                                            </span></font>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <input type="submit" name="regis_submit" id="regis_submit" value="Submit" class="form-control btn btn-success btn-flat ld-ext-left "/>
                                            </div>
                                            <div class="col-xs-1" id="loading_spin" name="loading_spin" style="display:none">
                                                <div class="ld ld-ring ld-spin">  </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <a href="<?php echo base_url(); ?>Login/login_form" class="form-control btn btn-danger btn-flat" role="button">Back</a>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </td>  
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>
        <input type="hidden" id="firebase_last_id" />
    </section>
    <!-- Main content End -->
    <!-- footer section Start-->
    <footer>
        <table style="text-align:left; width:40%; float:right; margin-top: -15px;">
            <tr>
                <td colspan="2" >
                    <p>&emsp;</p>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="<?php echo base_url(); ?>stylesheet/images/rimes_logo.png" height="60px" width="60px" >
                </td>
                <td class="ftb">
                    Regional Integrated Multi-hazard Early Warning System (RIMES), Thailand
                    <br>Copyright &copy; <?php echo date('Y'); ?>
                </td>
            </tr>
        </table>
        <table style="text-align:left; width: 40%; margin-left:70px; float:left; border-color: #0066a6; border: 10px">
            <tr>
                <td colspan="3">
                    <b>Jointly Developed by</b>
                </td>
            </tr>
            <tr>
                <td style="width:10%;">
                    <img src="<?php echo base_url(); ?>stylesheet/images/Logo_Odisha3.png" height="60px" width="60px">
                </td>
                <td style="width:80%;" class="ftb">
                    Odisha State Disaster Management Authority 
                </td>
            </tr>
        </table>
    </footer>      
    <!-- footer section End-->  
    <!--don't move this ajex--> 
    <script type="text/javascript">
        $('#district').change(function () {
            var ID_2 = $(this).val();
            $("#block > option").remove();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Login/populate_block'); ?>",
                data: {id: ID_2},
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (k, v) {
                        var opt = $('<option/>');
                        opt.val(k);
                        opt.text(v);
                        $('#block').append(opt);
                    });
                }
            });
        });
    </script>
    <script>
        $('#regis_form').submit(function (e) {
            loading_spin.style.display = "block";
            e.preventDefault();
            var me = $(this);
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data: me.serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.success == true) {
                        $.blockUI({ css: { 
                            border: 'none', 
                            padding: '15px', 
                            backgroundColor: '#000', 
                            '-webkit-border-radius': '10px', 
                            '-moz-border-radius': '10px', 
                            opacity: .5, 
                            color: '#fff' 
                        } });
                        initApp();
                        handleSignUp();
                        $("#firebase_last_id").val(response.last_id);
                    }
                    else {
                        $.each(response.messages, function (key, value) {
                            var element = $('#' + key);
                            element.closest('div.form-group')
                                    .removeClass('has-error')
                                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                    .find('.text-danger')
                                    .remove();
                            element.after(value);
                        });
                        loading_spin.style.display = "none";
                    }
                }
            });
        });
        $('#role').change(function () {
            if ($('#role').val() === '1' || $('#role').val() === '3') {
                $("#text_role").show();
                $("#text_role1").show();
            } else {
                $("#text_role").hide();
                $("#text_role1").hide();
            }
        });
        $('#department').change(function () {
            if ($('#department').val() == 'Others') {
                $("#other_dept").show();
            } else {
                $("#other_dept").hide();
            }
        });
        function register_user_firebase(id_to_update,token){
            $.ajax({
                url: '<?php echo base_url('Login/update_user_firebase_token'); ?>',
                type : 'post',
                data : {'id_to_update':id_to_update, 'user_token':token},
                dataType : 'json',
                success : function (res){
                    if (res.success == true) {
                        $.unblockUI();
                        firebase.auth().signOut(); 
                        alert('You have successfully registered.');
                        window.location = "<?php echo base_url('Login/login_form'); ?>";
                    }
                } 
            });
        }
        $.ajaxSetup({
                data: {
                    'csrf_hash_name': $('meta[name="csrf-token"]').attr('csrf_hash')
                }
            });
    </script>
    </body>
</html>