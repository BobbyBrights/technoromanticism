<?php
/*
Template Name: Liste Membres
*/
?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<style type="text/css">
		.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
	    	background: none;
	    	border: 1px solid #D3D3D3;
	    	color: #555555;
	    	font-weight: normal;
		}
		.pays {
    		position: absolute;
    		right: 15px;
    		text-align: right;
		}
		#accordion h3, #accordion h4, #accordion p {
			font-family: "Source Sans Pro",Helvetica,sans-serif;
		}


	</style>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="entry-content">

				<?php // Test password
				if ( post_password_required() ) {
 					echo get_the_password_form();
 				} else { ?>
 

					<?php $query = new WP_Query( 'posts_per_page=-1' );  ?>
					<?php query_posts($query); ?>
					<?php query_posts('orderby=cat&order=ASC'); ?>

					<?php if (have_posts()) : ?>

						<h4 class="title">Liste des membres</h4>

					 	<?php $categorie_en_cours = null ?>

					  	<div id="accordion">

					  	<?php while (have_posts()) : the_post(); ?>

						  <?php	
						  	$category = get_the_category();
							$new_categorie = $category[0]->cat_name;
						  	if($new_categorie != $categorie_en_cours){
						  		//echo '<h2>' . $new_categorie . '</h2>';
						  		$categorie_en_cours = $new_categorie;
						  	}
						  ?>

					      	<h3 class="post-title"><?php the_title(); ?><span class="pays"><?php echo $new_categorie; ?></span></h3>
					      	<div>
								<p>
									<?php   

										if(get_field('adresse'))
										{
											echo get_field('adresse') . '</br>';
										}
										if(get_field('code_postal'))
										{
											echo get_field('code_postal') . ' ';
										}
										if(get_field('ville'))
										{
											echo get_field('ville') . '</br>';
										}
										if(get_field('pays'))
										{
											echo get_field('pays') . '</br>';
										}
										if(get_field('telephone'))
										{
											echo get_field('telephone') . '</br>';
										}
										if(get_field('email'))
										{
											echo get_field('email') . '</br>';
										}
										if(get_field('autres_infos'))
										{
											echo '</br>' . get_field('autres_infos') . '</br>';
										}
									?>
								</p>
							</div>

					  	<?php endwhile; ?>

		  				</div>

					<?php else : ?>
					 	<p class="nothing">Il n'y a pas de Post à afficher !</p>

					<?php endif; ?>

				<?php } // Fin test password?>

			</div><!-- #entry-content -->
		</div><!-- #content -->
	</div><!-- #primary -->

	 <script>
	$(function() {
	$( "#accordion" ).accordion({ collapsible: true, activate: false, active : 'none'});
	});
	</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>