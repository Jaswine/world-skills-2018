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

                        <form id="station-form" action="/pruebas/module_e_1/station/create.php" method="post">
                            <p class="note">Fields with <span class="required">*</span> are required.</p>


                            <div class="row">
                                <label for="Station_name" class="required">Name <span class="required">*</span></label>		<input size="60" maxlength="80" name="Station[name]" id="Station_name" type="text">			</div>

                            <div class="row buttons">
                                <input type="submit" name="yt0" value="Create">	</div>

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
                                <li><a href="#list">List Station</a></li>
                                <li><a href="#manage">Manage Station</a></li>
                            </ul></div>
                    </div>	</div><!-- sidebar -->
            </div>

            <div class="clear"></div>

            <?php include('./components/footer.php'); ?>
