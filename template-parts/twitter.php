

<?php 



$user = 'alqasimcom';  
$number = 3;  
$Consumer_key = 'i5uoDuak4vjDfPrCxFg9Dw'; 
$Consumer_secret = 'swdWEDVI0uil0ZUGm4M4pU3iCC6imXKU9ylZUEdpk';


$tweets = false;

 if ( $tweets  === false ) {

$connection = new TwitterOAuth($Consumer_key, $Consumer_secret);
	
$tweets = $connection->get('statuses/user_timeline', array('screen_name' => 'alqasimcom' , 'count' => $number));

		if ( $tweets !== false ) {
              set_transient( 'tweets', $tweets, 10800 );
       }


 }
 
 ?>


<div class="tweets">
	<ul>
 <?php 
 
 $number = $number-1; 
 
 for($i=0;$i<=$number;$i++){ ?>
  

                  
                      <li><?php echo make_clickable($tweets[$i]->text); ?></li>
                 
              
  <?php } ?>
</ul>

</div>



      