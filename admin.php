<?php
	include_once 'header.php';
    include 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pomodoro - Admin</title>
		<meta charset="utf-8">
        <link rel="shortcut icon" href="img/ico-p-logo.png">
		<link rel="stylesheet" type="text/css" href="admin.css">
		<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">	<!-- font for the hole web -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">	<!-- font for the placeholder -->
		<link href="https://fonts.googleapis.com/css?family=Righteous|Russo+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">	<!-- font for the reservation -->
        <link href="https://fonts.googleapis.com/css?family=Merienda:700" rel="stylesheet"> 	<!-- font for the new web -->
	</head>
	<body>
		<?php if (isset($_SESSION['user_aid'])) { ?>

			<div id="pomodoro"> <?php echo "Welcome Mr. {$_SESSION['user_name']}"; ?></div>

			<?php

				if( isset($_GET['delt']) ){		// tar bort table
					$rtable_id = $_GET['delt'];
					$did = "DELETE FROM rtable WHERE rtable_id='$rtable_id'";		// radera inneållet i databasen
					$res = mysqli_query($conn, $did) or die ("Failed".mysqli_error($conn));
					header("Location: admin.php");
				}

				if( isset($_GET['delu']) ){		// tar bort user
					$user_uid = $_GET['delu'];
					$duser = "DELETE FROM users WHERE user_uid='$user_uid'";		// radera inneållet i databasen
					$res = mysqli_query($conn, $duser) or die ("Failed".mysqli_error($conn));
					$druser = "DELETE FROM rtable WHERE user_uid='$user_uid'";		// radera inneållet i databasen
					$des = mysqli_query($conn, $druser) or die ("Failed".mysqli_error($conn));
					header("Location: admin.php");
				}

				$show_tables = "SELECT * FROM rtable ORDER BY rtable_id DESC";		// ----------------- visa alla reserverad bord ----------------
				$show_tables = mysqli_query($conn, $show_tables);
				$numrowst = mysqli_num_rows ($show_tables); 

				$reg_table = "SELECT COUNT(rtable_id) AS total FROM rtable";
				$ress = mysqli_query($conn, $reg_table);
				$valuess = mysqli_fetch_assoc($ress);
				$numm =  $valuess['total'];

				if($numrowst > 0){ // finns det data att visa, visa det
					echo "<div class='table_type'>
						<table>
							<caption>Reserved tables: " . $numm . "</caption>
							<thead> 
								<tr>
									<th>Reserved date</th>
									<th>User id</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Time</th>
									<th>Date</th>
									<th>People</th>
									<th></th>
									<th></th>
								</tr>
                        	</thead>";

					while($row = mysqli_fetch_assoc($show_tables)){		// sålänge det finns data at visa så gör den det
						$rtable_id = $row['rtable_id'];
						$reserved_date = $row['reserved_date'];
						$user_uid = $row['user_uid'];
						$user_name = $row['user_name'];
						$user_tel = $row['user_tel'];
						$user_time = $row['user_time'];
						$user_date = $row['user_date'];
						$user_people = $row['user_people'];
						echo "
						<form method='post' action='admin.php?delt=" . $rtable_id . "'>
							<tbody>
								<tr>
									<td>" . $reserved_date . "</td>
									<td>" . $user_uid . "</td>
									<td>" . $user_name . "</td>
									<td>" . $user_tel . "</td>
									<td>" . $user_time . "</td>
									<td>" . $user_date . "</td>
									<td>" . $user_people . "</td>
									<td><button id='edit'> Edit </button></td>
									<td><button id='delete'> Delete </button></td>
								</tr>
                        	</tbody>
                        </form>";
					}
					echo "</table></div><br><br>";

				} else{			// finns det ingen data så visar den det här
					echo "<br><br><br><h2>No one has reserved any table</h2><br><br><br><br><br><br><br>";
				}

				$show_users = "SELECT * FROM users WHERE user_uid != 'admin' ORDER BY user_id DESC";		// ----------------- visa alla som är registrerade ----------------
				$show_users = mysqli_query($conn, $show_users);
				$numrows = mysqli_num_rows ($show_users); 

				$reg_user = "SELECT COUNT(user_id) AS total FROM users WHERE user_uid != 'admin'";
				$res = mysqli_query($conn, $reg_user);
				$values = mysqli_fetch_assoc($res);
				$num =  $values['total'];

				if($numrows > 0){ // finns det data att visa, visa det
					echo "<div class='users'>
							<table>
								<caption>Registered users: " . $num . "</caption>
								<thead> 
									<tr>
										<th>Regisrered date</th>
										<th>User id</th>
										<th>Name</th>
										<th>User tel</th>
										<th></th>
									</tr>
	                        	</thead>";

					while($row = mysqli_fetch_assoc($show_users)){		// sålänge det finns data at visa så gör den det
						$signup_date = $row['signup_date'];
						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
						$user_tel = $row['user_tel'];
						$user_uid = $row['user_uid'];
						$user_pwd = $row['user_pwd'];
						echo "
						<form method='post' action='admin.php?delu=" . $user_uid . "'>
							<tbody>
								<tr>
									<td>" . $signup_date . "</td>
									<td>" . $user_uid . "</td>
									<td>" . $user_name . "</td>
									<td>" . $user_tel . "</td>
									<td><input type='submit' id='delete' name='dbutton' value='Delete'></td>
								</tr>
                        	</tbody>
                        </form>";
					}
					echo "</table></div><br><br><br>";

				} else{			// finns det ingen data så visar den det här
					echo "<br><br><br><h2>There is no one registrered</h2><br><br><br><br><br><br>";
				}

			?>

		<?php } else { ?>

			<div id="no_one">You have no right to view this page <br> Please login as a normal user<br> \(o_o)/</div>

		<?php } ?>

		<script> document.getElementById("admin").style.color = "#559E54"; </script>
	</body>
</html>