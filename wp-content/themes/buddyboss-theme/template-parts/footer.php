<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

<style>
    @font-face {
    font-family: 'League Gothic Italic';
    font-style: italic;
    font-weight: 400;
    src: local('League Gothic Italic'), local('LeagueGothic-Italic'),
        url(/fonts/league-gothic-italic_4e405f19862259aeb3371976d224e0e3.woff) format('woff'),
        url(/fonts/league-gothic-italic_4e405f19862259aeb3371976d224e0e3.ttf) format('truetype');
    }
    

    a
    {
        text-decoration: none!important;
    }
    .footer-desc > p
    {
        font-family: 'League Gothic Italic', arial!important;
        font-size: 32px;
            color: #fff;
                text-transform: uppercase !important;
    }
    .explore_text_travel
    {
        font-family: 'League Gothic Italic', arial!important;
        font-size: 32px;
            color: #fff;
            /*text-align: center;*/
            text-transform: uppercase !important;
    }
    @media (min-width: 800px) {
        .bb-footer.style-2 .footer-desc {
            margin: 0 auto;
            display: block;
            margin-right: -77px;
        }
    }
    .list-unstyled > li
    {
        margin-bottom: 5px;
    }
    .list-unstyled
    {
        margin: 0px;
    }
    .list-unstyled > li > a
    {
        color: #fff;
        font-size: 16px;
        font-family: 'Montserrat';
        font-weight:bold;
        text-transform: uppercase !important;
    }
    .list-unstyled > li > a:hover
    {
        color: #ddd;   
    }
    
</style>
<?php
$footer_widgets = buddyboss_theme_get_option( 'footer_widgets' );
$footer_widgets_columns = buddyboss_theme_get_option( 'footer_widget_columns' );
$footer_copyright = buddyboss_theme_get_option( 'footer_copyright' );
$copyright_text = buddyboss_theme_get_option( 'copyright_text' );
			$footer_menu = buddyboss_theme_get_option( 'footer_menu' );
			$footer_secondary_menu = buddyboss_theme_get_option( 'footer_secondary_menu' );
			$footer_socials = buddyboss_theme_get_option( 'boss_footer_social_links' );
			$footer_description = buddyboss_theme_get_option( 'footer_description' );
			$footer_tagline = buddyboss_theme_get_option( 'footer_tagline' );

?>



<?php if ( ( $footer_copyright ) && (!is_singular('lesson')) && (!is_singular('llms_quiz')) &&  (!is_singular('llms_assignment')) &&  (!is_singular('llms_my_certificate')) ) { ?>
	<footer class="footer-bottom bb-footer style-<?php echo buddyboss_theme_get_option( 'footer_style' ); ?>">
	    <div class="container">
	    <div class="row">
            <div class="col-md-4">
              <?php
              if( buddyboss_theme_get_option( 'footer_style' ) == '2' ) {
					$logo_id = buddyboss_theme_get_option( 'footer_logo', 'id' );
					$logo = ( $logo_id ) ? wp_get_attachment_image( $logo_id, 'full' ) : get_bloginfo( 'name' );
					?>
					<div class="footer-logo-wrap col-md-4">
						<a class="footer-loto" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php echo $logo; ?>
						</a><?php

						if( !empty( $footer_tagline ) ) {
							echo '<span class="footer-tagline">' . $footer_tagline . '</span>';
						} ?>
					</div><?php
				}
				?>
            </div>
            <div class="col-md-4 footer-bottom-center push-center text-center">
              <p class="explore_text_travel">Explore</p>
              <ul class="list-unstyled">
          <li>
            <a href="#!">Home</a>
          </li>
          <li>
            <a href="#!">About</a>
          </li>
          <li>
            <a href="#!">Go Hiking</a>
          </li>
          <li>
            <a href="#!">Our Coaches</a>
          </li>
          <li>
            <a href="#!">Blog</a>
          </li>
          <li>
            <a href="#!">Contact Us</a>
          </li>
        </ul>
            </div>
            <?php
            $container_set = false;
			if( !empty( $footer_socials ) || !empty( $footer_description ) ) {
				echo '<div class="push-right col-md-4">';
				
				    if ( !empty( $footer_description ) ) {
						echo '<div class="footer-desc">' . wpautop( do_shortcode( $footer_description ) ) . '</div>';
					}

					foreach ( $footer_socials as $network => $url ) {
						if ( ! empty( $url ) ) {
							if ( ! $container_set ) {
								echo '<ul class="footer-socials">';
								$container_set = true;
							}
							if ( 'email' === $network ) {
								echo '<li><a href="mailto:' . sanitize_email( $url ) . '" target="_top"><i class="bb-icon-rounded-' . $network . '"></i></a></li>';
							} else {
								echo '<li><a href="' . esc_url( $url ) . '" target="_blank"><i class="bb-icon-rounded-' . $network . '"></i></a></li>';
                            }
						}
					}
					
					if( $container_set ){
						echo '</ul>';
					}

					

				echo '</div>';
			}
			?>
          </div>
          </div>
	</footer>
<?php } ?>
