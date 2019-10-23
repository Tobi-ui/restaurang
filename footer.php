<?php include_once 'header.php'; ?>
<!DOCTYPE html>
<html>  <!-- sidan för footer som hämtas av alla de andra sidorna -->
    <head>
        <link rel="stylesheet" type="text/css" href="footer.css">
        <meta charset="utf-8">
    </head>
    <body>
        <footer>
        	<div class="footer">
        		<table>
                    <tr>
                     	<th>About us</th>
                     	<th>Contact us</th>
                     	<th>Open Hours</th>             	
                     	<th>Media</th>
                   	</tr>
                   	<tr>
                     	<td><a href="../restaurang/terms-of-use.php" target="_blank">Terms of Use</a></td>
                     	<td>Phone number: +39 308 1187331</td>
                     	<td>Monday - Thursday......11:00 AM - 10:30 PM</td>
                     	<td><a href="https://www.facebook.com/pomodoro.ronaldo.7" target="_blank">Facebook</a></td>
                   	</tr>
                    <tr>
                        <td><a href="../restaurang/privacy-policy.php" target="_blank">Privacy Policy</a></td>
                        <td>E-mail: <a href="mailto:toel1501@student.miun.se?Subject=Hello%20again" target="_top">info@pomodoro.com</a></td>
                        <td>Friday - Saturday..........11:00 AM - 01:00 AM</td>
                     	<td><a href="https://twitter.com/Pomodoro2018" target="_blank">Twitter</a></td>
                    </tr>
                    <tr>
                        <td><a href="../restaurang/about.php" target="_blank">Our History</a></td>
                        <td>Find us: Corso Alcide de Gasperi, Italy</td>
                        <td>Sunday.........................12:00 AM - 11:30 PM</td>
                     	<td><a href="https://www.instagram.com/PomodoroRestaurant2018/" target="_blank">Instagram</a></td>
                    </tr>
                 </table>
                 <div class="copy">&copy; 2017-<?php echo date("Y");?>. POMODORO RESTAURANG. ALL RIGHTS RESERVED.</div>
        	</div>
        </footer>
    </body>
</html>