<?php
/*
Template Name: home-page
*/

get_header(); ?>

<?php if( have_rows('slider_home_page') ): ?>
	<div class="flexslider">
		<ul class="slides">
			<?php while( have_rows('slider_home_page') ): the_row(); 
				// vars
				$image 			= get_sub_field('image');
				$infos 			= get_sub_field('infos');
				$img_url 		= $image['url'];
				$id_oeuvre 		= get_sub_field('oeuvre');
				$link_oeuvre 	= get_post_permalink($id_oeuvre);
				?>
				<li>
					<!-- <img src="<?php //echo $image['url']; ?>" alt="<?php //echo $image['alt'] ?>" /> -->
					<div class="image-slide" style="background-image: url('<?php echo $img_url; ?>');"></div>
					<div class="infos_slide"><a href="<?php echo $link_oeuvre; ?>"><?php echo $infos; ?></a></div> 
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php endif; ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			/*
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			*/

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<div class="oeuvres-galerie">
	<div class="technoromanticism-content">

	<?php

		$tab_oeuvres = get_field('oeuvres_home');
		if($tab_oeuvres)
		{
			foreach($tab_oeuvres as $post)
			{
			/*
			echo '<pre>';
			    print_r( $post);
			echo '</pre>';
			*/

			$id 			= $post['oeuvre'];
			$link 			= get_post_permalink($id);
			$lieu_date 		= get_field('lieu_&_date', $id);
			$resume			= get_field('resume', $id);
			$img 			= get_field('image', $id);
			$title 			= get_the_title( $id );
			$date_oeuvre 	= get_field('date_oeuvre', $id);

			echo "<div class='oeuvre-box'>";

				if($img)
				{
					echo "<a href='". $link ."'><div class='oeuvre-thumbnail'>";
					echo "<img src=' ". $img ." '>";
					echo "<div class='resume'><p>" . $resume . "</p></div>";
					echo "</div></a>";
				}

				echo "<h2>" . mb_strimwidth($title, 0, 25, "...") . "</h2>";
				echo "<div class='oeuvre-box-date'><p>" . $date_oeuvre  . "</p></div>";
				//echo $lieu_date  . '<br>';
				//echo $resume  . '<br>';

			echo "</div>";
			}
		}

	/*
		$posts = get_posts(array(
			'posts_per_page'	=> -1,
			'post_type'			=> 'oeuvres'
		));

		if( $posts ){
			foreach( $posts as $post ){
				setup_postdata( $post );
				the_title();
				echo "<br>";
			}
			wp_reset_postdata();
		}
	*/

	?>

	</div><!-- .technoromanticism-content -->
</div><!-- .oeuvres-galerie -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
