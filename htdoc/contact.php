<?php # Script 8.5 - register.php #2
// The user is redirected here from login.php.

session_start(); // Start the session.

$page_title = 'Welcome to Bel\'s Resturant| Contact Us';
include ('includes/header.html');

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	require_once ('../mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

	// Check for message:
	if (empty($_POST['message'])) {
		$errors[] = 'You forgot to enter your your message.';
	} else {
		$m = mysqli_real_escape_string($dbc, trim($_POST['message']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO contactus (first_name, last_name, email, message, date_created) VALUES ('$fn', '$ln', '$e', '$m', NOW() )";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
echo '  <div id="content">
      <div class="container">
         <div class="inside">
            <!-- box begin -->
            <div class="box alt">
            	<div class="left-top-corner">
               	<div class="right-top-corner">
                  	<div class="border-top"></div>
                  </div>
               </div>
               <div class="border-left">
               	<div class="border-right">
                  	<div class="inner">
                     	<div class="wrapper">
                        	<dl class="special fright">
                           	<dt>Special</dt>
                              <dd><img alt="" src="images/1page-img1.jpg" /><span>12.95</span></dd>
                              <dd><img alt="" src="images/1page-img2.jpg" /><span>12.95</span></dd>
                           </dl>
					<h1>Thank you!</h1>
					<p></p>
				<p>Your message was sent. You will recieved a response within the next 48hrs!</p><p><br /></p> 
				</div>
                  </div>
               </div>
               <div class="left-bot-corner">
               	<div class="right-bot-corner">
                  	<div class="border-bot"></div>
                  </div>
               </div>
            </div>
            </div>
      </div>
   </div>
                        	';

		
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		
include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.
?>
<!-- content -->
   <div id="content">
      <div class="container">
         <div class="inside">
            <!-- box begin -->
            <div class="box alt">
            	<div class="left-top-corner">
               	<div class="right-top-corner">
                  	<div class="border-top"></div>
                  </div>
               </div>
               <div class="border-left">
               	<div class="border-right">
                  	<div class="inner">
                    <h2>Contact Us</h2>
                    <br></b><strong>Our Mailing address</strong></b></br>
					<br>3410 Taft Blvd</br>
					Wichita Falls, Texas 76308<br><a>940-397-4000</a></br>
					<p></p><br>
                        <form id="contacts-form" action="contact.php" method="post">
                           <fieldset>
                              <div class="field"><label>First Name:</label><input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"/></div>
							  <div class="field"><label>Last Name:</label><input type="text" name="last_name"value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/></div>
                              <div class="field"><label>E-mail:</label><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/></div>
                              <div class="field"><label>Message:</label><textarea cols="" rows="" name="message" value="<?php if (isset($_POST['message'])) echo $_POST['message']; ?>"></textarea></div>
							  <div class="alignright"><input type="submit" name="submit" value="Send Your Message!" /></a></div>
							<input type="hidden" name="submitted" value="TRUE" /> 
							</form>
							</div>
                  </div>
               </div>
               <div class="left-bot-corner">
               	<div class="right-bot-corner">
                  	<div class="border-bot"></div>
                  </div>
               </div>
            </div>
            <!-- box end -->
         </div>
      </div>
   </div>
<?php
include ('includes/footer.html');
?>
