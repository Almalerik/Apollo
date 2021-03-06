
<header id="masthead" class="site-header row apollo-logo-left <?php apollo_get_header_css_class();?>" role="banner">

	<nav id="site-navigation" class="navbar navbar-default apollo-navbar-default" role="navigation">

		<div class="apollo-navbar-wrapper <?php echo apollo_get_option('header_wrapped') ? 'apollo-wrapper' : ''?>">

			<div class="navbar-header">

				<div class="site-branding">
				
					<div class="site-logo-wrapper">
						<a href="<?php echo esc_url( home_url( '/' ) );?>" rel="home">
							<img src="<?php echo apollo_get_logo();?>" alt="<?php echo get_bloginfo('title');?>" class="site-logo image-responsive">
						</a>
					</div>
						
					<div class="site-title-wrapper">
						<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php else : ?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
						<?php endif; ?>
		
						<?php $description = get_bloginfo( 'description', 'display' ); ?>
						<?php if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php	endif; ?>
					</div>

				</div>
				<!-- #site-branding -->

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'apollo' ); ?></span>
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>

			</div>
			<!-- #navbar-header -->
			
				<?php 
					if ( has_nav_menu( 'primary' ) ) :
						wp_nav_menu( array(
							'theme_location' 	=> 'primary', 
							'menu_id' 			=> 'primary-menu',
							'container'         => 'div',
							'container_id'      => 'navbar',
							'container_class'   => 'collapse navbar-collapse',
							'depth'             => 12,
							'menu_class'        => 'nav navbar-nav apollo-navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker()
						) );
					else:
						locate_template( 'template-parts/examples/nav-primary.php', true );
					endif;
				?>

			
			<div class="clearfix"></div>
		</div>
		<!-- #apollo-navbar-wrapper -->

	</nav>
	<!-- #site-navigation -->

</header>
<!-- #masthead -->