<?php # Script 17.6 - view_print.php
// This page displays the details for a particular print.
session_start(); // Start the session.

$row = FALSE; // Assume nothing!

if (isset($_GET['pid']) && is_numeric($_GET['pid']) ) { // Make sure there's a print ID!

	$pid = (int) $_GET['pid'];
	
	// Get the print info:
	require_once ('../mysqli_connect.php'); 
	$q = "SELECT CONCAT_WS(' ', first_name, middle_name, last_name) AS artist, print_name, price, description, size, image_name FROM artists, prints WHERE artists.artist_id = prints.artist_id AND prints.print_id = $pid";
	$r = mysqli_query ($dbc, $q);
	if (mysqli_num_rows($r) == 1) { // Good to go!
	
		// Fetch the information:
		$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
		
		// Start the HTML page:
		$page_title = $row['print_name'];
		include ('includes/header.html');
	
		// Display a header:
		echo '<div id="content">
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
                     	<div class="wrapper">';
		echo "
		<div align=\"center\">
	<b>{$row['print_name']}</b> by 
	{$row['artist']}<br />";
	
		// Print the size or a default message:
		echo (is_null($row['size'])) ? '(No size information available)' : $row['size'];

		echo "<br />\${$row['price']} 
	<a href=\"add_cart.php?pid=$pid\">Add to Cart</a>
	</div><br />";
	
		// Get the image information and display the image:
		if ($image = @getimagesize ("../uploads/$pid")) {
			echo "<div align=\"center\"><img src=\"show_image.php?image=$pid&name=" . urlencode($row['image_name']) . "\" $image[3] alt=\"{$row['print_name']}\" /></div>\n";	
		} else {
			echo "<div align=\"center\">No image available.</div>\n"; 
		}
		
		// Add the description or a default message:
		echo '<p align="center">' . ((is_null($row['description'])) ? '(No description available)' : $row['description']) . '</p>';
	
	} // End of the mysqli_num_rows() IF.
	
	mysqli_close($dbc);

}

if (!$row) { // Show an error message.
	$page_title = 'Error';
	include ('includes/header.html');
	echo '<div align="center">This page has been accessed in error!</div>';
}
echo '                        	<dl class="special fright">
                           	</div>
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
	
<!--Recent articles list ends -->	 
 </div>
      </div>
   </div>
';
// Complete the page:
include ('includes/footer.html');
?>
