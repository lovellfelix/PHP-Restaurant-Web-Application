<?php 


// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';
include ('includes/header.html');

// Print any error messages, if they exist:
if (!empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}

// Display the form:
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
<h2>Login</h2>
<form id="contacts-form" action="login.php" method="post">
	<div class="field"><label>Email Address:</label><input type="text" name="email" value=""/></div>
	<div class="field"><label>Password:</label><input type="password" name="pass" value=""/></div>
	<p></p>
<div class="alignright"><input type="submit" name="submit" value="Login!" /></a></div>
	<!--<p>Email Address: <input type="text" name="email" size="20" maxlength="80" /> </p>
	<p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
	<div><input type="submit" name="submit" value="Login" /></div>-->
	<input type="hidden" name="submitted" value="TRUE" />
</form>
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
<?php // Include the footer:
include ('includes/footer.html');
?>
