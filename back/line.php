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

                        <form enctype="multipart/form-data" id="line-form" action="/pruebas/module_e_1/line/create.php" method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Line_name" class="required">Name <span class="required">*</span></label>        <input size="50" maxlength="50" name="name" id="Line_name" type="text">            </div>

                            <div class="row">
                                <label for="Line_start_time_operation" class="required">Start Time Operation <span class="required">*</span></label>        

                                <select name="Line[start_time_operation]" id="start_time_operation">
                                    <option value="">00:00:00</option>
                                    <option value="">01:00:00</option>
                                    <option value="">02:00:00</option>
                                    <option value="">03:00:00</option>
                                    <option value="">04:00:00</option>
                                    <option value="">05:00:00</option>
                                    <option value="">06:00:00</option>
                                    <option value="">07:00:00</option>
                                    <option value="">08:00:00</option>
                                    <option value="">09:00:00</option>
                                    <option value="">10:00:00</option>
                                    <option value="">11:00:00</option>
                                    <option value="">12:00:00</option>
                                    <option value="">13:00:00</option>
                                    <option value="">14:00:00</option>
                                    <option value="">15:00:00</option>
                                    <option value="">16:00:00</option>
                                    <option value="">17:00:00</option>
                                    <option value="">18:00:00</option>
                                    <option value="">19:00:00</option>
                                    <option value="">20:00:00</option>
                                    <option value="">21:00:00</option>
                                    <option value="">22:00:00</option>
                                    <option value="">23:00:00</option>
                                </select>

                            </div>

                            <div class="row">
                                <label for="Line_end_time_operation" class="required">End Time Operation <span class="required">*</span></label>        
                                <select name="Line[end_time_operation]" id="end_time_operation">
                                    <option value="">00:00:00</option>
                                    <option value="">01:00:00</option>
                                    <option value="">02:00:00</option>
                                    <option value="">03:00:00</option>
                                    <option value="">04:00:00</option>
                                    <option value="">05:00:00</option>
                                    <option value="">06:00:00</option>
                                    <option value="">07:00:00</option>
                                    <option value="">08:00:00</option>
                                    <option value="">09:00:00</option>
                                    <option value="">10:00:00</option>
                                    <option value="">11:00:00</option>
                                    <option value="">12:00:00</option>
                                    <option value="">13:00:00</option>
                                    <option value="">14:00:00</option>
                                    <option value="">15:00:00</option>
                                    <option value="">16:00:00</option>
                                    <option value="">17:00:00</option>
                                    <option value="">18:00:00</option>
                                    <option value="">19:00:00</option>
                                    <option value="">20:00:00</option>
                                    <option value="">21:00:00</option>
                                    <option value="">22:00:00</option>
                                    <option value="">23:00:00</option>
                                </select>         
                            </div>

                            <div class="row">
                                <label for="Line_type">Type</label>        <select name="Line[type]" id="Line_type">
                                    <option value="Tram">Tram</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Nightliner">Nightliner</option>
                                    <option value="Regionalbus">Regionalbus</option>
                                </select>            </div>

                            <div class="row">
                                <label for="Line_map" class="required">Map <span class="required">*</span></label>                       
                                <input id="ytLine_map" type="hidden" value="" name="Line[map]"><input name="Line[map]" id="Line_map" type="file">            </div>

                                        <div class="row buttons">
                                            <input type="submit" name="yt0" value="Create">    </div>

                                        </form>
                                        </div><!-- form -->	</div><!-- content -->

                                        <?php
                            include 'db/connection.php'; 

                            if (isset($_POST['submit'])) {
                                $name  = $_POST['name'];
                                $capacity = $_POST['capacity'];
                                $type = $_POST['type'];
                                $gos_number=$_POST['gos_number'];
                                $line_id = $_POST['line_id'];

                                $sql = "INSERT INTO vehicle (code) VALUES ('$name',  )";
                                if ($conn->query($sql) == TRUE) {
                                    echo "<p class='message'>Vehicle has been created successfully!</p>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }

                            $conn->close();
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
                                       
