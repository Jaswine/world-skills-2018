<?php include './components/header.php' ?>

        <div class="container" id="page">

            <?php include('./navbar.php'); ?>

            <!-- mainmenu -->
            <div class="breadcrumbs">
                <a href="#">Home</a> &raquo; <a href="#">Driver</a> &raquo; <span>Create</span></div><!-- breadcrumbs -->

            <div class="span-19">


                <div id="content">

                    <h1>Create Driver</h1>


                    <div class="form">

                        <form enctype="multipart/form-data" id="driver-form" action="" method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Driver_name" class="required">Name <span class="required">*</span></label>        <input size="45" maxlength="45" name="name" id="Driver_name" type="text">            </div>

                            <div class="row">
                                <label for="Driver_birth_date" class="required">Birth Date <span class="required">*</span></label>        <input id="Driver_birth_date" name="birth_date" type="date" class="hasDatepicker">                    </div>

                            <div class="row">
                                <label for="Driver_email" class="required">Email <span class="required">*</span></label>        <input size="50" maxlength="50" name="email" id="Driver_email" type="text">            </div>

                            <div class="row">
                                <label for="Driver_phone" class="required">Phone <span class="required">*</span></label>        <input size="40" maxlength="40" name="phone" id="Driver_phone" type="text">            </div>

                            <div class="row">
                                <label for="Driver_avatar">Avatar</label>        

                                <input id="ytDriver_avatar" type="file" value="" name="avatar">        </div>

                                        <div class="row">
                                            <label for="Driver_type_vehicle" class="required">Type Vehicle <span class="required">*</span></label>                <select name="type_vehicle" id="Driver_type_vehicle">
                                                <option value="Tram">Tram</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Nightliner">Nightliner</option>
                                                <option value="Regionalbus">Regionalbus</option>
                                            </select>    </div>

                                        <div class="row buttons">
                                            <input type="submit" name="submit" value="Create">    </div>

                                        </form>
                                        </div><!-- form -->	</div>
                                        <!-- content -->

                                        <?php
                                            include "db/connection.php";
                                            
                                            if (isset($_POST['submit'])) {
                                                $name = $_POST['name'];
                                                $birth_day = $_POST['birth_date'];
                                                $email =   $_POST['email'];
                                                $phone = $_POST['phone'];
                                                $avatar = $_FILES['avatar'];
                                                $type_vehicle = $_POST['type_vehicle'];
                                                $validated = true;

                                                $file_name = $_FILES['avatar']['name'];
                                                $file_size = $_FILES['avatar']['size'];
                                                $file_tmp = $_FILES['avatar']['tmp_name'];
                                                $file_type = $_FILES['avatar']['type'];
                                                $errors = [];
                                                $type_vehicle_id;

                                                $file_ext = strtolower(end(explode('.', $_FILES['avatar']['name'] )));

                                                if ($file_size > 100000000000) {
                                                    $errors[] =  'File size must be less than 10mb';
                                                }

                                                if (empty($errors) == true) {
                                                    move_uploaded_file($file_tmp , "images/avatars" . $file_name);
                                                } else {
                                                    print_r($errors);
                                                }
                                                if ($type_vehicle)  {
                                                    $vehicles = $conn->query("SELECT * FROM vehicle where type = '$type_vehicle' LIMIT 1 ");
                                                    if ($vehicles) {
                                                        foreach ( $vehicles as $vehicle ) {
                                                            $type_vehicle_id =  $vehicle['id'];
                                                            // echo $type_vehicle_id;
                                                        }
                                                    } else {
                                                        echo "No vehicle found";
                                                    }
                                                } else {
                                                    echo "U need to select a vehicle";
                                                }

                                                $sql = "INSERT INTO driver (name, birth_date, email, phone, avatar, vehicle_id) VALUES ('$name','$birth_day', '$email', '$phone', '$file_name','$type_vehicle_id') ";
                                                if ($conn->query($sql)) {
                                                    echo "<p class='message'>Station has been created successfully!</p>";   
                                                } else {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                            }
                                        ?>
                                        </div>
                                        <div class="span-5 last">
                                            <div id="sidebar">
                                                <div class="portlet" >
                                                    <div class="portlet-decoration">
                                                        <div class="portlet-title">Operations</div>
                                                    </div>
                                                    <div class="portlet-content">
                                                        <ul class="operations" >
                                                            <li><a href="#list">List Driver</a></li>
                                                            <li><a href="#manage">Manage Driver</a></li>
                                                        </ul></div>
                                                </div>	
                                            </div><!-- sidebar -->
                                        </div>
                                        <div class="clear"></div>

 <?php include('./components/footer.php'); ?>
