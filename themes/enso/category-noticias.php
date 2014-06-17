<?php get_header(); ?>
<!-- Insert content here -->
	<header class="full">
		<div class="width clearfix">
			<div class="nav_logo left">
				<a href="/">
					<img src="<?php echo THEMEPATH; ?>images/logo_small.png" alt="">
				</a>
			</div>

			<div class="nav_icon right">
				<a href="#">
					<img src="<?php echo THEMEPATH; ?>images/menu.svg" alt="">
				</a>
			</div>

			<div class="nav_close right hide">
				<a href="#">
					<img src="<?php echo THEMEPATH; ?>images/close.svg" alt="">
				</a>
			</div>

			<nav class="main_nav_menu hide">
				<a href="http://ensoenergia.com#intro" class="full block">
					INICIO 
				</a>
				<a href="http://ensoenergia.com#nosotros" class="full block">
					NOSOTROS 
				</a>						
				<a href="http://ensoenergia.com#paneles" class="full block">
					PANELES
				</a>						
				<a href="http://ensoenergia.com#calentadores" class="full block">
					BOILERS
				</a>					
				<a href="http://ensoenergia.com#albercas" class="full block">
					ALBERCAS 
				</a>		
				<a href="http://ensoenergia.com#ahorro" class="full block">
					AHORRA 
				</a>				
				<a href="http://ensoenergia.com#blog" class="full block">
					NOTICIAS 
				</a>						
				<a href="http://ensoenergia.com#contacto" class="full block">
					CONTACTO
				</a>			
			</nav>

		</div>

	</header>

	<div id="intro" class="section">
		<div class="logo">
			<div class="img">
				<img src="<?php echo THEMEPATH; ?>images/logo2.png" alt="">
			</div>
			<p>ENERGIA SOLAR</p>
			<br />
		</div>
		<a href="#blog" class="goDown scrollTo"></a>
	</div>

	<div class="width clearfix">
		<div id="blog" class="section">
			<h2>NOTICIAS</h2>
			<hr>
		<?php
		if( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<div class="post columna xlarge-4 large-4 medium-6 small-12 xmall-12">

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>

				<div class="caja info">
					<h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<hr>
					<p><?php the_excerpt(); ?>
					
				</div><!-- caja -->

			</div><!-- tercio -->

		<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div><!-- blog -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>