<?php
/*
Template Name: Carte fullscreen
*/
?>

<?php
/**
 * Template affichage de la carte fullscreen
 *
 */

//get_header(); ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="wp-content/themes/aph/js/map.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<style type="text/css">
		html {
			margin: 0 !important;
	    	height: 100%;
		}
		body {
			margin: 0 !important;
			height: 100%;
		}
		.acf-map {
			height: 100%;
			margin: 0 !important;

		}
		.fiche-carte span {
			font-style: bold;
		}
		h5 {
	    	font-size: 16px;
	    	margin-top: 0;
	    	margin-bottom: 15px;
	    	color: #7f7f7f;
		}
		.btn-map {
			position:absolute;
			z-index:1;
			top: 4px;
			right: 110px;
		}
	</style>

</head>

<body>
	
	<?php $query = new WP_Query( 'posts_per_page=-1' );  ?>
		<?php query_posts($query); ?>

			<span class="btn-map"><a href="http://heveaph.org/"><img src="wp-content/themes/aph/images/close.png" alt="close btn"></a></span>

			<?php // Test password
			if ( post_password_required() ) {
 				echo get_the_password_form();
 			} else { ?>

			<?php if (have_posts()) : ?>
		    
				<div class="acf-map">

					<?php while (have_posts()) : the_post(); ?>

					<?php $location = get_field('localisation'); ?>

					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
						<div class="fiche-carte">
							<?php   
								if(get_field('prenom'))
								{
									echo '<h5>' . get_field('prenom') . ' ';
								}
								if(get_field('nom'))
								{
									echo get_field('nom') . '</h5>';
								}
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
						</div>
					</div>

					<?php endwhile; ?>

    			</div>

			<?php else : ?>
		  		<p class="nothing">Aucun article à afficher !</p>
			<?php endif; ?>

			<?php } // Fin test password?>

</body>
</html>
