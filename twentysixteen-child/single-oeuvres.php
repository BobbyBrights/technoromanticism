<?php

get_header();

//echo "<p>" . get_permalink() . "<p>";

// get id of page
$id = get_the_ID();

$args = array(
'p' => $id,
'post_type' => 'any');
$my_posts = new WP_Query($args);

//$args = array( 'post_type' => 'oeuvres', 'posts_per_page' => 1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();

	echo "<div class='post-oeuvre'>";

		echo "<div class='post-oeuvre-box'>";

			if(get_field('image'))
			{
				echo "<div class='oeuvre-thumbnail'>";
				echo "<img src=' ". get_field('image') ." '>";
				echo "</div>";
			}

			echo "<div class='post-oeuvre-resume'>";

				$title = get_the_title();
				echo "<h2>" . $title . "</h2>";

				if(get_field('lieu_&_date'))
				{
					echo '<p>' . get_field('lieu_&_date') . '</p>';
				}

				if(get_field('resume'))
				{
					echo '<p>' . get_field('resume') . '</p>';
				}
			echo '</div>';

			//the_ID();
			// echo '<div class="entry-content">';
			// the_content();
			// echo '</div>';

		echo '</div>';

		echo '<div class="post-oeuvre-content">';

			if(get_field('texte_oeuvre'))
			{
				echo '<p>' . get_field('texte_oeuvre') . '</p>';
			}

		echo '</div>';

	echo '</div>';

endwhile;

get_footer();

?>