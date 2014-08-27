<?php

// print an excerpt by specifying a maximium number of characters


function fa_trim_words( $str, $length = 140, $ellipsis = '...' ) {
	
	$output = wp_strip_all_tags($str);
	$length++;

	if ( mb_strlen( $output ) > $length ) {
		$subex = mb_substr( $output, 0, $length - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo $ellipsis;
	} else {
		echo $output;
	}
}



// get youtube video id


function get_yt_video_id($url){
	
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
		return $match[1];
     }
	  
	else {
		return '';	  
	}	
	
}


// get youtube video image

function youtube_video_image( $video_id , $attr =  array( 'width' => 120 , 'height' => 90 , 'alt' => )){
	
	echo '<img src="http://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg" alt="" />';
}


?>