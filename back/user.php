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

    <form id="user-form" action="" method="post">
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    
    <div class="row">
        <label for="User_name" class="required">Name <span class="required">*</span></label>        <input size="50" maxlength="50" name="name" id="User_name" type="text">            </div>

    <div class="row">
        <label for="User_gender" class="required">Gender <span class="required">*</span></label>       
        <select name="gender" id="Driver_type_vehicle">
            <option value="M">Male</option>
            <option value="F" >Female</option>
            <option value="O">Other</option>
        </select>    
    </div>

    <div class="row">
        <label for="User_birth_date" class="required">Birth Date <span class="required">*</span></label>        <input id="User_birth_date" name="birth_date" type="date" class="hasDatepicker">                    </div>

    <div class="row">
        <label for="User_email" class="required">Email <span class="required">*</span></label>        <input size="50" maxlength="50" name="email" id="User_email" type="email">            </div>

    <div class="row">
        <label for="User_login" class="required">Login <span class="required">*</span></label>        <input size="40" maxlength="40" name="login" id="User_login" type="text">            </div>

    <div class="row">
        <label for="User_password" class="required">Password <span class="required">*</span></label>        <input size="50" maxlength="50" name="password" id="User_password" type="password">            </div>

    <div class="row buttons">
        <input type="submit" name="yt0" value="Create">    </div>

    </form>
</div><!-- form -->	</div>
    <!-- content -->
<?php
include('./db/connection.php');

if (isset($_POST['yt0'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $validated = true;

    if (!$gender) {
        $validated = false;
        echo 'Please enter ur gender...<br>';
    }
    
    if (!$birth_date) {
        $validated = false;
        echo "<br>Please enter ur birth date...<br>";
    }    
    if (!$email) {
        $validated = false;
        echo "Please enter ur email...<br>";
    }
    if (!$name) {
        $validated = false;
        echo "Please enter ur name...<br>";
    }
    if (!$login) {
        $validated = false;
        echo "Please enter ur login...<br>";
    }
    if (!$password) {
        $validated = false;
        echo "Please enter ur login... <br>";
    }

   if ($validated) {
    $sql = "INSERT INTO user(name, gender, birth_date, email, login, password) VALUES ('$name', '$gender' ,'$birth_date', '$email', '$login', '$password') ";

    if ($conn->query($sql)) {
        echo "<p class='message'>User has been created successfully!</p>";   
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
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
<li><a href="#list">List User</a></li>
<li><a href="#manage">Manage User</a></li>
</ul></div>
</div>	</div><!-- sidebar -->
</div>

	<div class="clear"></div>

	<?php include('./components/footer.php'); ?>
