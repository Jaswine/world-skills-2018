<?php include './components/header.php' ?>


        <div class="container" id="page">

        <?php include('./navbar.php'); ?>
            
            <!-- mainmenu -->
            <div class="breadcrumbs">
                <a href="#">Home</a> &raquo; <a href="#">Vehicle</a> &raquo; <span>Create</span></div><!-- breadcrumbs -->

            <div class="span-19">
                <div id="content">

                    <h1>Create Vehicle</h1>


                    <div class="form">

                        <form id="vehicle-form"  method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Vehicle_name" class="required">Name <span class="required">*</span></label>		
                                <input size="30" maxlength="30" name="name" id="Vehicle_name" type="text">			</div>

                            <div class="row">
                                <label for="Vehicle_capacity" class="required">Capacity <span class="required">*</span></label>		<input name="capacity" id="Vehicle_capacity" type="text">			</div>

                            <div class="row">
                                <label for="Vehicle_type">Type</label>		
                                <select name="type" id="Line_type">
                                    <option value="Tram">Tram</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Nightliner">Nightliner</option>
                                    <option value="Regionalbus">Regionalbus</option>
                                </select> 			
                            </div>

                            <div class="row">
                                <label for="Line_id" class="required">Line Id<span class="required">*</span></label>		<input name="line_id" id="Line_id" type="text">			</div>

                            <div class="row">
                                <label for="Gos_Number" class="required">Gos Number <span class="required">*</span></label>		<input name="gos_number" id="Gos_Number" type="text">			</div>

                            <div class="row buttons">
                                <input type="submit" name="submit" value="Create">	</div>

                        </form>
                        <?php
                            include 'db/connection.php'; 

                            if (isset($_POST['submit'])) {
                                $name  = $_POST['name'];
                                $capacity = $_POST['capacity'];
                                $type = $_POST['type'];
                                $gos_number=$_POST['gos_number'];
                                $line_id = $_POST['line_id'];

                                $sql = "INSERT INTO vehicle (name, capacity, type, line_id, gos_number) VALUES ('$name', '$capacity', '$type', $'line_id', '$gos_number' )";
                                if ($conn->query($sql) == TRUE) {
                                    echo "<p class='message'>Vehicle has been created successfully!</p>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }

                            $conn->close();
                        ?>
                    </div><!-- form -->	</div>
                <!-- content -->



            </div>
            <div class="span-5 last">
                <div id="sidebar">
                    <div class="portlet" >
                        <div class="portlet-decoration">
                            <div class="portlet-title">Operations</div>
                        </div>
                        <div class="portlet-content">
                            <ul class="operations" >
                                <li><a href="#list">List Vehicle</a></li>
                                <li><a href="#manage">Manage Vehicle</a></li>
                            </ul></div>
                    </div>	</div><!-- sidebar -->
            </div>

            <div class="clear"></div>


            <?php include('./components/footer.php'); ?>
