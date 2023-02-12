<?php include './components/header.php' ?>


<div class="container" id="page">

<?php include('./navbar.php'); ?>

<!-- mainmenu -->
			<div class="breadcrumbs">
<a href="#">Home</a> &raquo; <a href="#">User</a> &raquo; <span>Create</span></div><!-- breadcrumbs -->
	
	<div class="span-19">
    <div id="content">
		
<h1>Create User</h1>


<div class="form">

    <form id="user-form" action="/pruebas/module_e_1/user/create.php" method="post">
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    
    <div class="row">
        <label for="User_name" class="required">Name <span class="required">*</span></label>        <input size="50" maxlength="50" name="User[name]" id="User_name" type="text">            </div>

    <div class="row">
        <label for="User_gender" class="required">Gender <span class="required">*</span></label>       
        <select name="Driver[type_vehicle]" id="Driver_type_vehicle">
<option value="">Male</option>
<option value="">Female</option>
</select>    
        
        
                    </div>

    <div class="row">
        <label for="User_birth_date" class="required">Birth Date <span class="required">*</span></label>        <input id="User_birth_date" name="User[birth_date]" type="text" class="hasDatepicker">                    </div>

    <div class="row">
        <label for="User_email" class="required">Email <span class="required">*</span></label>        <input size="50" maxlength="50" name="User[email]" id="User_email" type="text">            </div>

    <div class="row">
        <label for="User_login" class="required">Login <span class="required">*</span></label>        <input size="40" maxlength="40" name="User[login]" id="User_login" type="text">            </div>

    <div class="row">
        <label for="User_password" class="required">Password <span class="required">*</span></label>        <input size="50" maxlength="50" name="User[password]" id="User_password" type="password">            </div>

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
<li><a href="#list">List User</a></li>
<li><a href="#manage">Manage User</a></li>
</ul></div>
</div>	</div><!-- sidebar -->
</div>

	<div class="clear"></div>

	<?php include('./components/footer.php'); ?>
