<a href="index.php">
                <div id="header">

                </div></a>

            <div id="mainmenu">

                <ul>

                    <li>
                        <a href="line.php" title="Line"><span style="background-image: url(src/images/line.png)"></span><!--Line--></a>
                    </li>
                    <li>
                        <a href="station.php" title="Station"><span style="background-image: url(src/images/station.png)"></span><!--Station--></a>
                    </li>
                    <li>
                        <a href="vehicle.php" title="Vehicle"><span style="background-image: url(src/images/vehicle.png)"></span><!--Vehicle--></a>
                    </li>
                    <li>
                        <a href="driver.php" title="Driver"><span style="background-image: url(src/images/driver.png)"></span><!--Driver--></a>
                    </li>
                    <li>
                        <a href="xml.php" title="XML-XSD"><span style="background-image: url(src/images/xml.png)"></span><!--XML Schema--></a>
                    </li>
                    <li>
                        <a href="user.php" title="User"><span style="background-image: url(src/images/user.png)"></span><!--User--></a>
                    </li>
                </ul>

                <!-- Login / Logout -->
                <div id='access'>
                    <?php 
                    include 'db/connection.php'; 

                    if ($login == 'true') {
                        echo "<form>Webmaster (<input value='Logout' name='logout' type='submit' />)</form>";
                    } else {
                        echo "<div>Webmaster (<a href='/signIn.php'>SIgn In</a>)</div>".$login;
                    }
                    
                    if (isset($_POST['logout'])) {
                        $login = 'false';
                    }
                      ?>
                </div>
            </div>

            <!-- mainmenu --><!-- breadcrumbs -->