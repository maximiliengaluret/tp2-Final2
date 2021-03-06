<?php

get_header();



// The Query
$args = array(
"category_name" => "nouvelle",
"posts_per_page" => 3,
"orderby" => "date",
"order" => "DESC"
);

$query1 = new WP_Query( $args );


$args2 = array(
"category_name" => "evenements",
"posts_per_page" => 3,
"orderby" => "date",
"order" => "DESC"
);

$query2 = new WP_Query( $args2 );

?>

<!-- EVENEMENTS -->

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

<?php
         while ( have_posts() ) :
             the_post();
the_post_thumbnail('full');
endwhile; // End of the loop.
?>

<h1 class='titreNouvelle'>Les Nouvelles</h1>


<!-- FIN EVENEMENTS -->

<?php
// The Loop
echo'<div class="wrap">';
while ( $query1->have_posts() ) {

$query1->the_post();

echo'<div class="flex">';
echo '<h4>' . get_the_title() . '</h4>';
the_post_thumbnail('thumbnail');
echo'</div>';

}
echo'</div>';

?>

<?php
/* Restore original Post Data
* NB: Because we are using new WP_Query we aren't stomping on the
* original $wp_query and it does not need to be reset with
* wp_reset_query(). We just need to set the post data back up with
* wp_reset_postdata().
*/
wp_reset_postdata();
/* The 2nd Query (without global var) */



?>
<h1>Les Événements</h1>
<?php
// The Loop
while ( $query2->have_posts() ) {
    $query2->the_post();

    echo'<div class="conteneur">';
    
    echo'<div class="image">';
    the_post_thumbnail('thumbnail');
    echo'</div>';
    echo'<div class="texte">';
        echo '<a href="'.get_post_permalink().'">' . get_the_title() . '</a>';
        echo '<p>'.   get_the_excerpt().'</p>';
        echo'</div>';
    echo'</div>';
    
}
/* Restore original Post Data
* NB: Because we are using new WP_Query we aren't stomping on the
* original $wp_query and it does not need to be reset with
* wp_reset_query(). We just need to set the post data back up with
* wp_reset_postdata().
*/
wp_reset_postdata();


?>

<h1>Boucle en SCSS</h1>
<div class="tuiles">
  <div class="tuile"></div>
  <div class="tuile"></div>
  <div class="tuile"></div>
</div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();