
<!DOCTYPE html>
<?php include_once 'header.php'; ?>
<html>  <!-- första sidan med lite kort information om restaurangen -->
	<head>
		<title>Pomodoro - Home</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/ico-p-logo.png">
		<link rel="stylesheet" type="text/css" href="index-top.css">
		<link rel="stylesheet" type="text/css" href="index-menu.css">
		<link rel="stylesheet" type="text/css" href="index-reserve.css">
		<link rel="stylesheet" type="text/css" href="index-awards.css">
		<link rel="stylesheet" type="text/css" href="index-contact.css">
		<link rel="stylesheet" type="text/css" href="index.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">	<!-- font for the reservation -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
	    <div class="fullscreen-bg">
			<video autoplay muted loop id="myVideo" poster="restaurang-bg-iphone" class="bg-video">
			    <source id="top" src="img/restaurang.mp4" type="video/mp4">
			    <source src="img/restaurang.webm" type="video/webm">
			    <source src="img/restaurang.ogv" type="video/ogv">
			</video>
		</div>
		<div class="top">
			<img src="img/p-logo1b.png" draggable="false"><br>
			<div id="welcome">WELCOME TO POMODORO</div><br>
			<div class="not">Amore a Prima Vista</div>
		</div>


		<a id="toTop" href="#top" style="right: 40px;"><img src="img/to-top-arrow.png"></a>


		<div class="bg">
			<div id="food" class="blancou"></div>
			<div class="container"><h1>Discover Our Menu</h1></div>
			<button class="accordion accordion1">STARTERS</button>
			<div class="panel panel1">
                    <table>
	                    <?php
	                        $dbServername = "localhost";
	                        $dbUsername = "root";
	                        $dbPassword = "";
	                        $dbName = "restaurang";
	                        $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	                        $starter = mysqli_query($conn, 'SELECT * FROM starter ORDER BY name ASC');    
	                        $numrows = mysqli_num_rows ($starter); 
	                        if($numrows >0){        
	                            
	                            while($row = mysqli_fetch_assoc($starter)){     
	                                $id = $row['id'];
	                                $name = $row['name'];
	                                $description = $row['description'];
	                                $price = $row['price'];
	                                echo (" <tr>
			                                    <td><p class='dish-name'>" . $name . " </p>
			                                    <p class='dish-recipes'> " . $description . " </p></td>
			                                    <td><p class='dish-price'> " . $price . " &euro;</p></td>
		                                    </tr>");
	                            } 
	                        }
	                        else{           
	                            echo "\(o_o)/ <br><br> NOTHING IN STARTER";
	                        }
	                    ?>   
                    </table>  
			</div>
			<button class="accordion accordion2">MAIN DISHES</button>
			<div class="panel panel2">
                    <table>
	                    <?php
	                        $main_dishes = mysqli_query($conn, 'SELECT * FROM main_dishes ORDER BY name ASC');    
	                        $numrows = mysqli_num_rows ($main_dishes); 
	                        if($numrows >0){  
	                            
	                            while($row = mysqli_fetch_assoc($main_dishes)){    
	                                $id = $row['id'];
	                                $name = $row['name'];
	                                $description = $row['description'];
	                                $price = $row['price'];
	                                echo (" <tr>
	                                    		<td><p class='dish-name'>" . $name . " </p>
	                                    		<p class='dish-recipes'> " . $description . " </p>
			                                    <td><p class='dish-price'> " . $price . " &euro;</p></td>
		                                    </tr>");
	                            } 
	                        }
	                        else{         
	                            echo "\(o_o)/ <br><br> NOTHING IN MAIN DISHES";
	                        }
	                    ?>
                    </table>  
			</div>
			<button class="accordion accordion3">DESSERT</button>
			<div class="panel panel3">
                <table>
                    <?php
                        $dessert = mysqli_query($conn, 'SELECT * FROM dessert ORDER BY name ASC');  
                        $numrows = mysqli_num_rows ($dessert); 
                        if($numrows >0){     
                            
                            while($row = mysqli_fetch_assoc($dessert)){ 
                                $id = $row['id'];
                                $name = $row['name'];
                                $description = $row['description'];
	                                $price = $row['price'];
	                                echo (" <tr>
	                                    		<td><p class='dish-name'>" . $name . " </p>
	                                    		<p class='dish-recipes'> " . $description . " </p>
			                                    <td><p class='dish-price'> " . $price . " &euro;</p></td>
		                                    </tr>");
                            } 
                        }
                        else{    
                            echo "\(o_o)/ <br><br> NOTHING IN DESSERT";
                        }
                    ?>
                </table> 
			</div>
			<button class="accordion accordion4">DRINKS</button>
			<div class="panel panel4">
                <div class="bar">
                    <p id="drink-name">FINEST WINE SELECTION</p>
                    <p id="drink-recipes">Pomodoro wine</p>  
                    <p id="drink-recipes">Elvio cogno ‘bricco pernice’ barolo</p>
                    <p id="drink-recipes">Bérêche et fils ‘brut réserve’ </p>
                    <p id="drink-recipes">Tenuta delle terre nere etna rosso </p>
                    <p id="drink-recipes1">Marco porello roero arneis</p>
                        
                    <p id="drink-name">SOFT DRINKS</p>
                    <p id="drink-recipes">Coca-cola</p>  
                    <p id="drink-recipes">Fanta</p>
                    <p id="drink-recipes">Sprite</p>
                    <p id="drink-recipes">Mineral water</p>
                    <p id="drink-recipes1">Fruit juice</p>

                    <p id="drink-name">COCKTAILS</p>
                    <p id="drink-recipes">Monaco</p>  
                    <p id="drink-recipes">Mimosa</p>
                    <p id="drink-recipes">Margarita</p>
                    <p id="drink-recipes">Pomodoro special</p>
                    <p id="drink-recipes">Sangria</p>
                </div>
			</div>
			<div class="blanco"></div>
		</div>


	<?php if ((!isset($_SESSION['user_uid'])) && (!isset($_SESSION['user_aid']))) { ?>
		<div id="book" class="under">
			<div class="book">
				<form method="post" action="includes/reserve.inc.php">
					<div id="order">	<!-- Första sidan -->
						<table>
							<caption>Reserve a Table</caption>											
							<tr><td>
								<div class="by">If you have a profile, please log in <a href="login.php">here</a> to make a reservation.</div>
							</td></tr>
							<tr><td>
								<div class="custom-select" style="margin-top: -10px;">
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
							<tr><td>
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
							<tr><td>
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
							<tr><td>
								<?php
									if (isset($_GET['signup'])) {
										$signupCheck = $_GET['signup'];
										if ($signupCheck == "errorname") {
											echo "<input type='text' maxlength='25' name='name' placeholder='Use Latin Letters Only Without Space' required style='border-color: rgba(255, 59, 48, 0.9);'>";
										} else {
											echo "<input type='text' maxlength='25' name='name' placeholder='Your Name' required>";
										}
									} else {
										echo "<input type='text' maxlength='25' name='name' placeholder='Your Name' required>";
									}
								?>
							</td></tr>
							<tr><td>
								<?php
									if (isset($_GET['signup'])) {
										$signupCheck = $_GET['signup'];
										if ($signupCheck == "errortel") {
											echo "<input type='text' maxlength='15' name='tel' placeholder='Use Numbers Only' required style='border-color: rgba(255, 59, 48, 0.9);'>";
										} else {
											echo "<input type='text' maxlength='15' name='tel' placeholder='Your Phone Number' required>";
										}
									} else {
										echo "<input type='text' maxlength='15' name='tel' placeholder='Your Phone Number' required>";
									}
								?>
							</td></tr>
							<tr><td style="margin-top: -20px; position: absolute; font-size: 11px; font-family: 'Montserrat', sans-serif;">Your phone number will <b>only</b> be used to send you a comfirmation order.</td></tr>

							<?php if ((isset($_SESSION['user_uid']))) { ?>
									<tr><td><input type="button" id="print-block" disabled value="Continue"></td></tr>
							<?php }  else { ?>
								<tr><td><input type="button" id="print" value="Continue"></td></tr>
							<?php } ?>
						</table>
					</div>	<!-- Slut på första sidan -->

					<div id="printed" class="secondpage">	<!-- Början på andra sidan -->
						<table>
							<caption>Reserve a Table</caption>
							<tr><td><span>Create a Profile</span></td></tr>
							<tr><td><div class="by">By creating a profile you will be able to edit your reservation.<br>If you already have a profile, please log in <a href="login.php">here</a>.</div></td></tr><tr><td></td></tr>
							<tr><td><label>Username</label></td></tr>
							<tr><td>
								<?php
									if (isset($_GET['signup'])) {
										$signupCheck = $_GET['signup'];
										if ($signupCheck == "erroruid") {
											echo "<input type='text' maxlength='20' name='uid' placeholder='Username Already In Use' required style='border-color: rgba(255, 59, 48, 0.9);'>";
										} else {
											echo "<input type='text' maxlength='20' name='uid' placeholder='Your Username' required>";
										}
									} else {
										echo "<input type='text' maxlength='20' name='uid' placeholder='Your Username' required>";
									}
								?>
							</td></tr>

							<tr><td><label>Password</label></td></tr>
							<tr><td>
								<?php
									if (isset($_GET['signup'])) {
										$signupCheck = $_GET['signup'];
										if ($signupCheck == "errorpassword") {
											echo "<input type='password' maxlength='20' name='pwd' placeholder='Passwords Does Not Match' required style='border-color: rgba(255, 59, 48, 0.9);'>";
										} else {
											echo "<input type='password' maxlength='20' name='pwd' placeholder='Your Password' required>";
										}
									} else {
										echo "<input type='password' maxlength='20' name='pwd' placeholder='Your Password' required>";
									}
								?>
							</td></tr>

							<tr><td><label>Confirm Password</label></td></tr>
							<tr><td>
								<?php
									if (isset($_GET['signup'])) {
										$signupCheck = $_GET['signup'];
										if ($signupCheck == "errorpassword") {
											echo "<input type='password' maxlength='20' name='cpwd' placeholder='Passwords Does Not Match' required style='border-color: rgba(255, 59, 48, 0.9);'>";
										} else {
											echo "<input type='password' maxlength='20' name='cpwd' placeholder='Your Password' required>";
										}
									} else {
										echo "<input type='password' maxlength='20' name='cpwd' placeholder='Your Password' required>";
									}
								?>
							</td></tr>

							<tr style='color: red; font-size: 10px; font-family: "Montserrat", sans-serif;'><td>Don't reuse your bank password, we did <b>not</b> spend a lot on security for this website</td></tr>
							<tr><td><input type="button" id="back" value="Back">	<!-- Knapp för att gå tillbaka -->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" name='submit' value="Reserve"></td></tr>
						</table>
					</div>	<!-- Slut på andra sidan -->
				</form>
			</div>
		</div>
	<?php } ?>


		<div id="reviews" class="underunder">
				<div class="reviews_from">Reviews from our guests</div>
				<div class="line"></div>
				<div class="notas">
					<div class="container">
						<p><div class="head"><b>Njeri Kennedy.</b>&nbsp;&nbsp;&nbsp; CEO at Apple Inc. <span>&nbsp;&nbsp;&nbsp; - September 2, 2018</span></div></p>
						<p>Salads, sandwiches, fries, fairly varied menu, great friendly service on a side street in a semi-residential area. This isn't a spot someone would likely just run across but the locals know it and like it. Tight parking lot if there are many cars there.</p>
					</div>
					<div class="container">
						<p><div class="head"><b>Dawud Manaf.</b>&nbsp;&nbsp;&nbsp; CEO at OnePlus Inc. <span>&nbsp;&nbsp;&nbsp; - June 13, 2018</span></div></p>
						<p>A great neighborhood restaurant with all your favorites.</p>
					</div>
					<div class="container">
						<p><div class="head"><b>Simon Abraha.</b>&nbsp;&nbsp;&nbsp; CEO at International Tomatoes. <span>&nbsp;&nbsp;&nbsp; - June 1, 2018</span></div></p>
						<p>The menu hasn't changed much over the years- the staff are still friendly, and the food is still good. Regarding ambiance, the place is long overdue for a remodel- formerly a nice to place to eat, it has become an old diner. If you're not looking for a nice atmosphere for dining, but want good food at an ok price, it's worth a stop here.</p>
					</div>
					<div class="container">
						<p><div class="head"><b>Nam Nguyen.</b>&nbsp;&nbsp;&nbsp; CEO at Google Inc. <span>&nbsp;&nbsp;&nbsp; - May 26, 2018</span></div></p>
						<p>This was my first time at this restaurant. It is locally owned and operated. The food was very good and the service was excellent. Definitely will be going back.</p>
					</div>
				</div>
		</div>


		<div class="awards">
			<table>
				<tr><td colspan="3"><div class="aw">Recomended by</div></td></tr>
				<tr>
					<td><a href="https://www.tripadvisor.com/" target="blank"><img height="80" src="img/icons/tripadvisor.png"></a></td>
					<td><a href="https://www.opentable.com/" target="blank"><img height="80" src="img/icons/OpenTable.png"></a></td>
					<td><a href="https://guida.michelin.it/" target="blank"><img height="80" src="img/icons/michelin.png"></a></td>
				</tr>
				<tr>
					<td><a href="https://www.relaischateaux.com/it/" target="blank"><img height="80" src="img/icons/relais-chateaux.png"></a></td>
					<td><a href="https://www.slowfood.com/" target="blank"><img height="80" src="img/icons/slow-food.png"></a></td>
					<td><a href="https://www.winespectator.com/" target="blank"><img height="80" src="img/icons/wine-spectator.png"></a></td>
				</tr>
			</table>
		</div>


		<div class="contact">
			<div id="contact" class="visit">Visit us at Pomodoro Restaurang</div> 
			<div class="find">Corso Alcide de Gasperi <br>Castellammare di Stabia <br> Italy</div>
			<div id="map"></div>
			<script>		// hämtar en google maps in i sidan
				function myMap() {
					var myCenter = new google.maps.LatLng(40.70919657564947,14.481545141757806);
					var mapCanvas = document.getElementById("map");
					var mapOptions = {center: myCenter, zoom: 10, 
					};
					var map = new google.maps.Map(mapCanvas, mapOptions);
					var marker = new google.maps.Marker({position:myCenter});
					marker.setMap(map);
				}
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKt_ctY0OEqmrV5iIFHZoQ5cuzDi1rjjY&callback=myMap"></script>
		</div>
		
		<?php include_once 'footer.php'; ?>

		<script>
			document.getElementById("home").style.color = "#559E54";
				if (document.body.scrollTop > 0) {
					document.getElementById("home").style.color = "black";}

			if (window.screen.width <= 700) {
			    document.getElementById("toTop").style.display = "none";
			    document.getElementById("toTopp").style.display = "none";
			}

			window.onscroll = function() {hej()};
			function hej() {
			    if (document.body.scrollTop > 730) {	// to top icon
			        document.getElementById("toTop").style.display = "block";
			        document.getElementById("toTopp").style.display = "block";
			    } else {
			        document.getElementById("toTop").style.display = "none";
			        document.getElementById("toTopp").style.display = "none";
			    }


			    if (document.body.scrollTop > 100 && document.body.scrollTop < 630) {			
			    	document.getElementById("home").style.color = "#559E54";
					document.getElementById("menu").style.color = "black";
			        document.getElementById("reserve").style.color = "black";
			    } 

			    if (document.body.scrollTop > 630 && document.body.scrollTop < 1250) {	// change navbar li color	
			        document.getElementById("home").style.color = "black";
					document.getElementById("menu").style.color = "#559E54";
			        document.getElementById("reserve").style.color = "black";
			    }

			    if (document.body.scrollTop > 1250 && document.body.scrollTop < 2000) {
			        document.getElementById("home").style.color = "black";
			        document.getElementById("menu").style.color = "black";
			        document.getElementById("reserve").style.color = "#559E54";
			    }

			    if (document.body.scrollTop > 2000) {
			        document.getElementById("home").style.color = "black";
			        document.getElementById("menu").style.color = "black";
			        document.getElementById("reserve").style.color = "black";
			    }
			}
		</script>

		<script>
			document.getElementById("welcome").style.transitionDuration = "1s";
			document.getElementById("welcome").style.transitionDelay = "0.2s";
			document.getElementById("welcome").style.fontSize = "8vh";

			if(document.body.scrollTop < 30) {

			} else {
			    document.getElementById("change").style.transitionDuration = "0.5s";
				document.getElementById("change").style.transitionTimingFunction = "ease";
				document.getElementById("change").className = "irakk";
			}

		    $(document).ready(function(){
		      // Add smooth scrolling to all links
		      $("a").on('click', function(event) {

		        // Make sure this.hash has a value before overriding default behavior
		        if (this.hash !== "") {
		          // Prevent default anchor click behavior
		          event.preventDefault();

		          // Store hash
		          var hash = this.hash;

		          // Using jQuery's animate() method to add smooth page scroll
		          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
		          $('html, body').animate({
		            scrollTop: $(hash).offset().top
		          }, 1000, function(){
		       
		            // Add hash (#) to URL when done scrolling (default click behavior)
		            window.location.hash = hash;
		          });
		        }
		      });
		    });
		</script>

		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight){
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    } 
			  });
			}
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

		<script>
		    document.getElementById("printed").style.display = 'none';	// Gömer andra sidan
		    document.getElementById("print").addEventListener("click", function(){	// Säger vad som händer när man trycker på knappen 
		        document.getElementById("order").style.display = 'none';	// Gömmer första sidan
		        document.getElementById("printed").style.display = 'block'; 	
		    });

		    document.getElementById("back").addEventListener("click", function(){	// Säger vad som händer när man trycker på tillbaka knappen
		        document.getElementById("order").style.display = 'block';
		        document.getElementById("printed").style.display = 'none';
		    });

		</script>
	</body>
</html>