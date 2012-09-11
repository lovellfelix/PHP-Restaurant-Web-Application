<?php 

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['employee_id'])) {
	require_once ('includes/login_functions.inc.php');
	$url = absolute_url('login.php');
	header("Location: $url");
	exit();		
}
$page_title = 'View the Current Users';
include ('includes/header.html');
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
                     	<div class="wrapper">
<h3>List of Employees</h3>';

require_once ('../mysqli_connect.php');

// Number of records to show per page:
$display = 5;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.

	$pages = $_GET['p'];

} else { // Need to determine.

 	// Count the number of records:
	$q = "SELECT COUNT(employee_id) FROM employees";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];

	// Calculate the number of pages...
	if ($records > $display) { // More than 1 page.
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}
	
} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}
		
// Make the query:
//$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC LIMIT $start, $display";		
$q = "SELECT CONCAT (last_name, ', ', first_name) AS name, email, pass, title, DATE_FORMAT(date_created,'%M %d, %Y') AS dr, employee_id FROM employees ORDER BY date_Created ASC LIMIT $start, $display";		

$r = @mysqli_query ($dbc, $q);

// Table header:
echo '<table align="center" cellspacing="2" cellpadding="10" width="100%">
<tr>

	<td align="left"><b>Name</b></td>
	<td align="left"><b>Email Address</b></td>
	<td align="left"><b>Position</b></td>
	<td align="left"><b>Date Registered</b></td>
	</tr>

';
echo '<p></p>';
// Fetch and print all the records....

$bg = '#eeeeee'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

	$bg = ($bg=='#eeeeee' ? '#F0950D' : '#eeeeee'); // Switch the background color.
	
	echo '<tr bgcolor="' . $bg . '">
	
		
		<td align="left"><a href="edit_employee.php?id=' . $row['employee_id'] . '">' . $row['name'] .' </td>
		<td align="left">' . $row['email'] . ' </td>
		<td align="left">' . $row['title'] . '</a></td>
		<td align="left"><small>' . $row['dr'] . '</small></td>
		<td align="left"><a href="edit_employee.php?id=' . $row['employee_id'] . '">Edit</td>';

	//<td align="right"><a href="view_message.php?id=' . $row['contactus_id'] . '">view </a></td>'
} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($dbc);

// Make the links to other pages, if necessary.
if ($pages > 1) {
	
	// Add some spacing and start a paragraph:
	echo '<br /><p>';
	
	// Determine what page the script is on:	
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="employees.php?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="employees.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="employees.php?s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
} // End of links section.
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
include ('includes/footer.html');
?>
