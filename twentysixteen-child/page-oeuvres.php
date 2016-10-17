<?php
/*
Template Name: page-oeuvres
*/
?>

<?php get_header() ?>

<!-- ici s'insère le contenu principal de la page -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="technoromanticism-content">

		<h1>Oeuvres</h1>
		<hr>

		<?php
		$args = array( 'post_type' => 'oeuvres', 'posts_per_page' => 10 );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();

		echo "<div class='oeuvre-box'>";

			if(get_field('image'))
			{
				echo "<a href='". get_post_permalink() ."'><div class='oeuvre-thumbnail'>";
				echo "<img src=' ". get_field('image') ." '>";
				echo "</div></a>";
			}
				
			echo '<h2><a href=" '. get_post_permalink() .' ">';
			echo the_title();
			echo '</a></h2>';

			if(get_field('date_oeuvre'))
			{
				echo '<div class="oeuvre-box-date"><p>' . get_field('date_oeuvre') . '</p></div>';
			}

			if(get_field('lieu_&_date'))
			{
				//echo '<div class="oeuvre-box-date"><p>' . get_field('lieu_&_date') . '</p></div>';
			}

			if(get_field('resume'))
			{
				//echo '<div class="oeuvre-box-resume"><p>' . get_field('resume') . '</p></div>';
			}

		echo "</div>";

		endwhile;
		?>

		</div>
	</main><!-- .site-main -->
</div>

<?php get_footer() ?>