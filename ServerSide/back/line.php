<?php include './components/header.php' ?>

        <div class="container" id="page">

        <?php include('./navbar.php'); ?>

            <!-- mainmenu -->
            <div class="breadcrumbs">
                <a href="#">Home</a> &raquo; <a href="#">Line</a> &raquo; <span>Create</span></div><!-- breadcrumbs -->

            <div class="span-19">


                <div id="content">

                    <h1>Create Line</h1>


                    <div class="form">

                        <form enctype="multipart/form-data" id="line-form" method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Line_name" class="required">Name <span class="required">*</span></label>        <input size="50" maxlength="50" name="name" id="Line_name" type="text">            </div>

                            <div class="row">
                                <label for="Line_start_time_operation" class="required">Start Time Operation <span class="required">*</span></label>        

                                <select name="start_time_operation" id="Line_start_time_operation">
                                    <option value="00:00:00">00:00:00</option>
                                    <option value="01:00:00">01:00:00</option>
                                    <option value="02:00:00">02:00:00</option>
                                    <option>03:00:00</option>   
                                    <option>04:00:00</option>
                                    <option >05:00:00</option>
                                    <option >06:00:00</option>
                                    <option  >07:00:00</option>
                                    <option  >08:00:00</option>
                                    <option  >09:00:00</option>
                                    <option  >10:00:00</option>
                                    <option  >11:00:00</option>
                                    <option  >12:00:00</option>
                                    <option  >13:00:00</option>
                                    <option  >14:00:00</option>
                                    <option  >15:00:00</option>
                                    <option  >16:00:00</option>
                                    <option  >17:00:00</option>
                                    <option  >18:00:00</option>
                                    <option  >19:00:00</option>
                                    <option  >20:00:00</option>
                                    <option  >21:00:00</option>
                                    <option  >22:00:00</option>
                                    <option  >23:00:00</option>
                                </select>

                            </div>

                            <div class="row">
                                <label for="Line_end_time_operation" class="required">End Time Operation <span class="required">*</span></label>        
                                <select name="end_time_operation" id="Line_end_time_operation">
                                    <option  >00:00:00</option>
                                    <option  >01:00:00</option>
                                    <option  >02:00:00</option>
                                    <option  >03:00:00</option>
                                    <option  >04:00:00</option>
                                    <option  >05:00:00</option>
                                    <option  >06:00:00</option>
                                    <option  >07:00:00</option>
                                    <option  >08:00:00</option>
                                    <option  >09:00:00</option>
                                    <option  >10:00:00</option>
                                    <option  >11:00:00</option>
                                    <option  >12:00:00</option>
                                    <option  >13:00:00</option>
                                    <option  >14:00:00</option>
                                    <option  >15:00:00</option>
                                    <option  >16:00:00</option>
                                    <option  >17:00:00</option>
                                    <option  >18:00:00</option>
                                    <option  >19:00:00</option>
                                    <option  >20:00:00</option>
                                    <option  >21:00:00</option>
                                    <option  >22:00:00</option>
                                    <option  >23:00:00</option>
                                </select>         
                            </div>

                            <div class="row">
                                <label for="Line_type">Type</label>        <select name="type" id="Line_type">
                                    <option value="Tram">Tram</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Nightliner">Nightliner</option>
                                    <option value="Regionalbus">Regionalbus</option>
                                </select>            </div>

                            <div class="row">
                                <label for="Line_map" class="required">Map <span class="required">*</span></label>                       
                                <input name="map" id="Line_map" type="file">            </div>

                                        <div class="row buttons">
                                            <input type="submit" name="submit" value="Create">    </div>

                                        </form>
                                        </div><!-- form -->	</div><!-- content -->

                        <?php
                            include 'db/connection.php'; 
                            $all_codes = $conn->query("SELECT * FROM line");
                            $errors = [];
                            $validated =false;

                            if (isset($_POST['submit'])) {
                                $name = $_POST['name'];
                                $start_time_operation = $_POST['start_time_operation'];
                                $end_time_operation = $_POST['end_time_operation'];
                                $type = $_POST['type'];
                                $map = $_FILES['map'];

                                $file_name = $_FILES['map']['name'];
                                $file_size = $_FILES['map']['size'];
                                $file_tmp = $_FILES['map']['tmp_name'];
                                $file_type = $_FILES['map']['type'];
                                $file_ext = strtolower(end(explode('.', $_FILES['map']['name'])));

                                
                                $sql = "INSERT INTO line (code, start_time_operation,end_time_operation, type, map) VALUES ('$name', '$start_time_operation', '$end_time_operation',  '$type', '$file_name')";

                                // $extensions = ['jpeg', 'png', 'jpg', 'gif'];

                                // if (in_array($file_ext, $extensions)) {
                                //     $errors[] = "i need 'jpeg', 'png', 'jpg' or 'gif' format";
                                // }

                                if ($file_size  > 10097152) {
                                    $errors[] =  'File size must be less than 10mb';
                                }

                                if (empty($errors) == true) {
                                    move_uploaded_file($file_tmp , "images/" . $file_name);
                                    // echo 'Uploaded';
                                } else {
                                    print_r($errors);
                                }

                                if ($conn->query($sql) == TRUE) {
                                    echo "<p class='message'>Line has been created successfully!</p>";
                                    
                                } else {
                                    echo "Error: ".$sql.'<br>'.$conn->error;
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
                                                            <li><a href="#list">List Line</a></li>
                                                            <li><a href="#manage">Manage Line</a></li>
                                                        </ul></div>
                                                </div>	</div><!-- sidebar -->
                                        </div>

                                        <div class="clear"></div>

 <?php include('./components/footer.php'); ?>
                                       
