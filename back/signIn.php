<?php include './components/header.php' ?>


        <div class="container" id="page">

        <?php include('./navbar.php'); ?>
            
            <!-- mainmenu -->
            <div class="breadcrumbs">
                <a href="#">Home</a> &raquo; <a href="#">Vehicle</a> &raquo; <span>Create</span></div><!-- breadcrumbs -->

            <div class="span-19">
                <div id="content">

                    <h1>Sign In</h1>


                    <div class="form">

                        <form id="vehicle-form"  method="post">

                            <div class="row">
                                <label for="SignIn" class="required">Email <span class="required">*</span></label>		
                                <input size="30" maxlength="30" name="email" id="SignIn" type="text" place>			</div>
                                <div class="row">
                                <label for="Password" class="required">Password <span class="required">*</span></label>		
                                <input size="30" maxlength="30" name="password" id="Password" type="text" place>			</div>

                            <div class="row buttons">
                                <input type="submit" name="submit" value="Create">	
                              </div>

                        </form>
   <?php
         include 'db/connection.php'; 
         $login = 'false';

         if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password']; 

            $sql  = "SELECT * FROM user WHERE (email='$email')";

            if ($conn->query($sql)) {
               $ALL_USER = $conn->query($sql);
            } else {
               echo "Error: ".$sql.'<br>'.$conn->error;
            }

            if ($ALL_USER) {
               foreach ( $ALL_USER as $user) {
                  if ($user['password'] == $password) {
                     $login = 'false';
                  } else {
                     echo "Email or password is not correct ";
                  }
               }
            } else {
            echo "Email or password is not correct ";
            }
            echo $login;
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
