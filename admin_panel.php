<?php 

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['employee_id'])) {
	require_once ('includes/login_functions.inc.php');
	$url = absolute_url('login.php');
	header("Location: $url");
	exit();		
}

$page_title = 'Bel\'s Resturant Admin Panel!';
include ('includes/header.html'); ?>
<div id="content">
  <div class="container">
    <div class="inside">
      <div class="box alt">
       	  <div class="left-top-corner">
               	<div class="right-top-corner">
                  	<div class="border-top"></div>
            </div>
        </div>
               <div class="border-left">
               	<div class="border-right">
               	  <div class="inner">
                   	<ul class="items-list">
                        	<li>
                              <h3>Messages</h3>
                           <a href="messages.php" target=""><img alt=" " src="images/Mail_new.png" /><a href="messages.php"></a>
                           <p>View messages submitted with contact form<br /><br /><a href="messages.php" target=""><img src="images/Social_Reddit.png" width="48" height="48" longdesc="messages.php" />Inbox</a></p>
                       	   </li>
                        	<li>
                        	  <p>&nbsp;</p>
                        	  
                      	  </li>
                           <li>
                             <h3>Employees</h3>
                              <a href="employees.php" target=""><img src="images/user-256.png" width="158" height="106" align="left" /></a><a href="employees.php" target=""><img src="images/touch screen kiosk-48.png" width="52" height="58" align="left" /><img src="images/edit_profile.png" width="24" height="24" />View Employees</a><br /><br />
                             <a href="add_employee.php" target=""><img src="images/add_user.png" width="24" height="24" />Add Employees</a><br /><br />
                    <p><a href="employees.php" target=""><img src="images/delete_user.png" width="24" height="24" />Delete Employees</a>
                    </li>
                           <li>
                              <h3>Add Items to Menu</h3>
                              <img src="images/coffecup.png" width="130" height="102" align="left" />
                             <p><img src="images/Book_edit.png" width="48" height="41" longdesc="add_menu.php" /><a href="add_menu.php">Add items to menu</a></p><br />
                           <p><img src="images/insert_to_shopping_cart.png" width="32" height="32" longdesc="add_menu.php" /><a href="view_cart.php">View Submitted Orders</a></p>
                           <br />
                           </li>
                   	</ul>
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
   <!-- footer -->
 <?php                       	
// Print a customized message:


include ('includes/footer.html');
?>
