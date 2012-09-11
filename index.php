<?php 

session_start(); // Start the session.

$page_title = 'Welcome to Bel Resturant Web site!';
include ('includes/header.html');
?>

<!--<h1 id="mainhead">test</h1>
<p></p>

<h2>test</h2>
<p></p>-->

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
                   	  <div class="wrapper">
                        	<dl class="special fright">
                           	<dt>Special</dt>
                              <dd><img src="images/food/food1.jpg" alt="" width="97" height="67" /><span>12.95</span></dd>
                              <dd><img src="images/food/food2.jpg" alt="" width="97" height="67" /><span>12.95</span></dd>
                           </dl>
                        <h3><small>Welcome to BEL Resturant!</small></h3>
                        <p>Bel Resturant is the largest casual dining chain in the world, with locations throughout the U.S. and many countries worldwide. We take pride in having a friendly, welcoming, neighborhood environment for both <br>
                        our staff and guests that makes everyone enjoy their bels experience.<p>If you're looking for a fabulous career with a great social environment, apply to become part of the Bel's family. Hand-cut steaks, award winning ribs, fresh-baked bread and made from scratch side items are the standard at Texas Roadhouse. </p>
                        <p>All of our food is created from scratch with only the highest quality-freshest ingredients. We combine large portions and great value to give you Legendary Food at a reasonable price.
                          But we're not just about steaks. With great ribs, chicken dishes, fish, salads and lots more, we can satisfy almost any appetite. </p>
                        <p><a href="index.php"><img src="images/small_index_pic.png" width="209" height="175" align="left" /></a>We guess that's why you all voted us #1 in both Menu Variety and Value in the 2004 Restaurant & Institution Magazine's Choice in Chains Guest Survey.
                          Legendary Service for every guest and Legendary Fun with our employees, are also main ingredients in our recipe for success. </p>
                        <p>At Bells Resturant, our team has an incredible sense of pride in everything we do. We want our guests to have such a good time they'll want to come back again tomorrow.</p>
                        <p>&nbsp;	</p>                                               
                        <p><a href="home.html">Home</a>, <a href="about.php">About us</a>, <a href="menu.php">Menu</a>, <a href="contact.php">Contact us</a>, <a href="sitemap.html">Site Map</a>.
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
<!--Recent articles list start-->		
<?php


echo '
<!--Recent articles list ends -->	 
 </div>
      </div>
   </div>
   <!-- footer -->';


include ('includes/footer.html');
?>