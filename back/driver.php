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

                        <form enctype="multipart/form-data" id="driver-form" action="/pruebas/module_e_1/driver/create.php" method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Driver_name" class="required">Name <span class="required">*</span></label>        <input size="45" maxlength="45" name="Driver[name]" id="Driver_name" type="text">            </div>

                            <div class="row">
                                <label for="Driver_birth_date" class="required">Birth Date <span class="required">*</span></label>        <input id="Driver_birth_date" name="Driver[birth_date]" type="text" class="hasDatepicker">                    </div>

                            <div class="row">
                                <label for="Driver_email" class="required">Email <span class="required">*</span></label>        <input size="50" maxlength="50" name="Driver[email]" id="Driver_email" type="text">            </div>

                            <div class="row">
                                <label for="Driver_phone" class="required">Phone <span class="required">*</span></label>        <input size="40" maxlength="40" name="Driver[phone]" id="Driver_phone" type="text">            </div>

                            <div class="row">
                                <label for="Driver_avatar">Avatar</label>        

                                <input id="ytDriver_avatar" type="hidden" value="" name="Driver[avatar]"><input name="Driver[avatar]" id="Driver_avatar" type="file">            </div>

                                        <div class="row">
                                            <label for="Driver_type_vehicle" class="required">Type Vehicle <span class="required">*</span></label>                <select name="Driver[type_vehicle]" id="Driver_type_vehicle">
                                                <option value="Tram">Tram</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Nightliner">Nightliner</option>
                                                <option value="Regionalbus">Regionalbus</option>
                                            </select>            </div>

                                        <div class="row buttons">
                                            <input type="submit" name="yt0" value="Create">    </div>

                                        </form>
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
                                                            <li><a href="#list">List Driver</a></li>
                                                            <li><a href="#manage">Manage Driver</a></li>
                                                        </ul></div>
                                                </div>	
                                            </div><!-- sidebar -->
                                        </div>

                                        <div class="clear"></div>

 <?php include('./components/footer.php'); ?>
