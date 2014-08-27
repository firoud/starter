<?php 

// Changing the number of posts per page, by post type || taxonomy


function fa_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display only 1 post for the original blog archive
        $query->set( 'posts_per_page', 1 );
        return;
    }

    if ( is_post_type_archive( 'movie' ) ) {
        // Display 50 posts for a custom post type called 'movie'
        $query->set( 'posts_per_page', 50 );
        return;
    }
	

    if ( is_tax( 'movie_cat' ) ) {
        // Display 12 posts for a custom taxonomy called 'movie_cat'
        $query->set( 'posts_per_page', 12 );
        return;
    }	
}
add_action( 'pre_get_posts', 'fa_posts_per_page', 1 );





//attach our function to the wp_pagenavi filter


add_filter( 'wp_pagenavi', 'fa_wp_pagenavi', 10, 2 );
  
//customize the PageNavi HTML before it is output
function fa_wp_pagenavi($html) {
    $out = '';
  
    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
    $out = str_replace("<span","<li><span",$out);  
    $out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);
  
	return '<ul class="pagination pagination-centered">'.$out.'</ul>';
}

?>