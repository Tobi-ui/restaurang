
<!DOCTYPE html>
<?php include_once 'header.php'; ?>
<html>
	<head>
		<title>Pomodoro - Book</title>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="img/ico-p-logo.png">
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="index-reserve.css">
        <link href="https://fonts.googleapis.com/css?family=Merienda:700" rel="stylesheet"> 	<!-- font for the new web -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">	<!-- font for the placeholder -->
		<link href="https://fonts.googleapis.com/css?family=Righteous|Russo+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">	<!-- font for the reservation -->
	</head>
	<body>
		<?php if (!isset($_SESSION['user_aid'])) { ?>
			<?php if (isset($_SESSION['user_uid'])) { ?>		<!-- så länge man är inloggad kan man se och reservera bord -->

				<div id="cebow"> <?php echo "Welcome {$_SESSION['user_name']}"; ?></div>

				<?php
					$dbServername = "localhost";
					$dbUsername = "root";
					$dbPassword = "";
					$dbName = "restaurang";
					$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);					

					if (isset($_POST['submit'])) {		// har man tryckt på submit knappen gör nedanstående					
						$sql = "SELECT * FROM users WHERE user_uid = '{$_SESSION['user_uid']}';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if ($resultCheck > 0) {	
							$user_time = mysqli_real_escape_string($conn, $_POST['time']);
							$user_date = mysqli_real_escape_string($conn, $_POST['date']);
							$user_people = mysqli_real_escape_string($conn, $_POST['people']);	
							$reserved_date = date('Y-m-d H:i:s');								
							$ins = "INSERT INTO rtable VALUES ('', '$reserved_date', '{$_SESSION['user_uid']}','{$_SESSION['user_name']}','{$_SESSION['user_tel']}','$user_time','$user_date','$user_people')";
							$resins= mysqli_query($conn, $ins) or die("Failed".mysqli_error($conn));

						} else {	
							session_start();
							session_unset();
							session_destroy();
							header("Location: deleted-acount.php");
							exit();
							}
					}

					if( isset($_GET['del']) ){		// har man tryckt på radera posten gör nedanstående
						$rtable_id = $_GET['del'];
						$sql= "DELETE FROM rtable WHERE rtable_id='$rtable_id'";		// radera inneållet i databasen
						$res= mysqli_query($conn, $sql) or die("Failed".mysqli_error($conn));
						header("Location: login.php");
					}	
				?>
					<div class="reserve">
						<form method="post">
							<div id="order">
								<table>
									<caption>Reserve a Table</caption>
									<tr><td colspan="2">
										<div class="custom-select">
											<select name="time">
												<option>14:00</option>
												<option>14:30</option>
												<option>15:00</option>
												<option>15:30</option>
												<option>16:00</option>
												<option>16:30</option>
												<option>20:00</option>
												<option>20:30</option>
												<option>21:00</option>
												<option>21:30</option>
												<option>22:00</option>
												<option>22:30</option>
											</select>
										</div>
									</td></tr>
									<tr><td colspan="2">
										<div class="custom-select">
											<select name="date">
												<?php 
													$today = (date('l d'));
													$date = (date('l d F')); 
													echo "<option> Today, " . $today . "</option>";
													$x = 1; 
													while($x <= 9) {
													    $tomorrow = date('l d F',strtotime($date . "+$x day"));
													    echo "<option> $tomorrow </option>";
													    $x++;
													} 
												?>
											</select>
										</div>
									</td></tr>
									<tr><td colspan="2">
										<div class="custom-select">
											<select name="people">
												<option>1 person</option>
												<option>2 people</option>
												<option>3 people</option>
												<option>4 people</option>
												<option>5 people</option>
												<option>6 people</option>
												<option>7 people</option>
												<option>8 people</option>
											</select>
										</div>
									</td></tr>
									<tr><td><input type="submit" name="submit" value="Reserve"></td><td><div class="dishes"><a target="blank" href="index.php#food">See The Menu <img height="30px" src="img/icons/black-dishes.png"></a></div></td></tr>
								</table>
							</div>
						</form>
					</div>

					<div class="reservations">
						<p>Your Reservations</p>

						<?php 		// visa upp alla reserveringar som den inloggade användaren har
							$sql= "SELECT * FROM rtable WHERE user_uid = '{$_SESSION['user_uid']}' ORDER BY rtable_id DESC";
							$sql = mysqli_query($conn,$sql);
							$numrows = mysqli_num_rows ($sql); 
							if($numrows > 0){ // finns det data att visa, visa det
								
								while($row = mysqli_fetch_assoc($sql)){		// sålänge det finns data at visa så gör den det
									$rtable_id = $row['rtable_id'];
									$user_name = $row['user_name'];
									$user_tel = $row['user_tel'];
									$user_time = $row['user_time'];
									$user_date = $row['user_date'];
									$user_people = $row['user_people'];
									echo "  <form method='post' action='login.php?del=" . $rtable_id . "'> 
												<table>
													<tr>
														<th>Name</th>
														<td>" . $user_name . "</td>
													</tr>
													<tr>
														<th>Phone Number</th>
														<td>" . $user_tel . "</td>
													</tr>
													<tr>
														<th>Time</th>
														<td>" . $user_time . "</td>
													</tr>
													<tr>
														<th>Date</th>
														<td>" . $user_date . "</td>
													</tr>
													<tr>
														<th>Guests</th>
														<td>" . $user_people . "</td>
													</tr>
												</table><br>
												<input type='submit' name='dbutton' value='Delete Reservation'>
											</form> 
										<br><hr>";
								} 
							}
							else{			// finns det ingen data så visar den det här
								echo "<br><br><br><h3>You have no reservations</h3>";
							}
						?>
					</div>
					<?php include_once 'footer.php'; ?>


			<?php } else { ?>		<!-- är man inte inloggad ser du en box där man kan logga in -->

				<div id="box-login">	
					<img src="img/p-logo.png" draggable="false"><hr><br>
					<form action="includes/login.inc.php" method="POST">	<!-- skickas till login filen som kollar att man finns med i databasen och att det inte syns på url sina inloggningsuppgifter -->
						<?php
							if (isset($_GET['login'])) {
				
								$signupCheck = $_GET['login'];

								if ($signupCheck == "dexist") {
									echo "<div class='error'>The username does not exist</div>";

								} elseif ($signupCheck == "empty") {
									echo "<div class='error'>And the Password?</div>";

								} elseif ($signupCheck == "uid") {
									echo "<div class='error'>Incorrect Password</div>";

								}
							}

							if (isset($_GET['uid'])) {
								$uid = $_GET['uid'];
								echo "
									<label>Username</label>
									<input type='text' maxlength='25' name='uid' placeholder='Username' autofocus required value='". $uid. "' ><br>";
							}else{
								echo "
									<label>Username</label>
									<input type='text'  maxlength='25' name='uid' placeholder='Username' autofocus required ><br><br>";
							}
						?>

						<label>Password</label>
						<input type="password" name="pwd" placeholder="Password"><br><br><br>
						<button id="submit" type="submit" name="submit">Login</button>
					</form>
				</div>

			<?php } 

		} else { ?>

				<div id="no_one">Admin can not view this page</div>

			<?php	}  ?>

		<script>
			document.getElementById("myreservations").style.color = "#559E54";
		</script>

		<script>		/* select */
			var x, i, j, selElmnt, a, b, c;
			/*look for any elements with the class "custom-select":*/
			x = document.getElementsByClassName("custom-select");
			for (i = 0; i < x.length; i++) {
			  selElmnt = x[i].getElementsByTagName("select")[0];
			  /*for each element, create a new DIV that will act as the selected item:*/
			  a = document.createElement("DIV");
			  a.setAttribute("class", "select-selected");
			  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
			  x[i].appendChild(a);
			  /*for each element, create a new DIV that will contain the option list:*/
			  b = document.createElement("DIV");
			  b.setAttribute("class", "select-items select-hide");
			  for (j = 0; j < selElmnt.length; j++) {
			    /*for each option in the original select element,
			    create a new DIV that will act as an option item:*/
			    c = document.createElement("DIV");
			    c.innerHTML = selElmnt.options[j].innerHTML;
			    c.addEventListener("click", function(e) {
			        /*when an item is clicked, update the original select box,
			        and the selected item:*/
			        var y, i, k, s, h;
			        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
			        h = this.parentNode.previousSibling;
			        for (i = 0; i < s.length; i++) {
			          if (s.options[i].innerHTML == this.innerHTML) {
			            s.selectedIndex = i;
			            h.innerHTML = this.innerHTML;
			            y = this.parentNode.getElementsByClassName("same-as-selected");
			            for (k = 0; k < y.length; k++) {
			              y[k].removeAttribute("class");
			            }
			            this.setAttribute("class", "same-as-selected");
			            break;
			          }
			        }
			        h.click();
			    });
			    b.appendChild(c);
			  }
			  x[i].appendChild(b);
			  a.addEventListener("click", function(e) {
			      /*when the select box is clicked, close any other select boxes,
			      and open/close the current select box:*/
			      e.stopPropagation();
			      closeAllSelect(this);
			      this.nextSibling.classList.toggle("select-hide");
			      this.classList.toggle("select-arrow-active");
			    });
			}
			function closeAllSelect(elmnt) {
			  /*a function that will close all select boxes in the document,
			  except the current select box:*/
			  var x, y, i, arrNo = [];
			  x = document.getElementsByClassName("select-items");
			  y = document.getElementsByClassName("select-selected");
			  for (i = 0; i < y.length; i++) {
			    if (elmnt == y[i]) {
			      arrNo.push(i)
			    } else {
			      y[i].classList.remove("select-arrow-active");
			    }
			  }
			  for (i = 0; i < x.length; i++) {
			    if (arrNo.indexOf(i)) {
			      x[i].classList.add("select-hide");
			    }
			  }
			}
			/*if the user clicks anywhere outside the select box,
			then close all select boxes:*/
			document.addEventListener("click", closeAllSelect);
		</script>
	</body>
</html>

