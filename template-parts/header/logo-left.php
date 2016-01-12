
<header id="masthead" class="site-header row apollo-logo-left" role="banner">

	<nav id="site-navigation" class="navbar navbar-default apollo-navbar-default" role="navigation">

		<div class="apollo-navbar-wrapper">

			<div class="navbar-header">

				<div class="site-branding">
					<?php if ( apollo_get_option( 'logo' ) ):?>
					<div class="site-logo-wrapper">
						<a href="<?php echo esc_url( home_url( '/' ) );?>" rel="home">
							<img src="" alt="<?php echo get_bloginfo('title');?>" class="site-logo image-responsive">
						</a>
					</div>
					<?php endif;?>
						
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

		</div>
		<!-- #apollo-navbar-wrapper -->

	</nav>
	<!-- #site-navigation -->

</header>
<!-- #masthead -->