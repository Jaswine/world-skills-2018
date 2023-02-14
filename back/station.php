<?php include './components/header.php' ?>

        <div class="container" id="page">

        <?php include('./navbar.php'); ?>

            <!-- mainmenu -->
            <div class="breadcrumbs">
                <a href="#">Home</a> &raquo; <a href="#">Station</a> &raquo; <span>Create</span></div><!-- breadcrumbs -->

            <div class="span-19">
                <div id="content">

                    <h1>Create Station</h1>


                    <div class="form">

                        <form id="station-form" action="" method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Station_name" class="required">
                                    Name <span class="required">*</span>
                                </label>		
                                <input size="60" maxlength="80" name="name" id="Station_name" type="text">			                    </div>

                            <div class="row">
                                <label for="Vehicle_type">Get Line</label>	
                                <select name="line_type" id="Line_type">
                                    <option disabled selected>Get Line</option>
                                <?php
                                    include 'db/connection.php'; 

                                    $all_lines  = $conn->query("SELECT * FROM line");

                                    foreach ($all_lines as $line) {
                                        echo "<option value=".$line['id'].">".$line['id']."</option>";
                                    }
                                  ?>
                                </select> 			
                            </div>
                            
                            <div class="row">
                                <label for="Position_Station" class="required">
                                    Position Station <span class="required">*</span>
                                </label>	
                            	<input size="60" maxlength="80" name="position" id="Position_Station" type="text">
                            </div>

                            <div class="row buttons">
                                <input type="submit" name="submit" value="Create">
                            </div>

                        </form>
                    </div><!-- form -->	</div>
                <!-- content -->
                <?php 
                    include 'db/connection.php';

                    if  (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $line_type = $_POST['line_type'];
                        $position = $_POST['position'];

                        $sql = "INSERT INTO station(name, position_station, line_id) VALUES ('$name', $position, $line_type)";
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
                                <li><a href="#list">List Station</a></li>
                                <li><a href="#manage">Manage Station</a></li>
                            </ul></div>
                    </div>	</div><!-- sidebar -->
            </div>

            <div class="clear"></div>

            <?php include('./components/footer.php'); ?>
