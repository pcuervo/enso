<?php 	
	session_start();
	get_header(); 
	
?>
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
				<a href="#intro" class="full block">
					INICIO 
				</a>
				<a href="#nosotros" class="full block">
					NOSOTROS 
				</a>						
				<a href="#paneles" class="full block">
					PANELES
				</a>						
				<a href="#calentadores" class="full block">
					BOILERS
				</a>					
				<a href="#albercas" class="full block">
					ALBERCAS 
				</a>		
				<a href="#ahorro" class="full block">
					AHORRA 
				</a>				
				<a href="#blog" class="full block">
					NOTICIAS 
				</a>						
				<a href="#contacto" class="full block">
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
		<a href="#nosotros" class="goDown scrollTo"></a>
	</div>

	<div class="width clearfix">
		<div id="nosotros" class="section">
			<?php
			$nosotros = get_page_by_title( 'nosotros' );
			$nosotrosId = $nosotros->ID;
			$nosotrosContent = $nosotros->post_content;
			$nosotrosTitle = $nosotros->post_title;
			?>

			<h2 class="text-center" >
				<?php echo $nosotrosTitle; ?>
			</h2>
			<hr>

			<p class="columna c-8 medium-10 small-12 center">
				<?php
					echo $nosotrosContent;
				?>
			</p>
		</div><!-- nosotros -->
	</div>

	<div class="section cover">
		<div id="paneles-bg"></div>
	</div>
	<div class="width clearfix">
		<div id="paneles" class="section">
			<h2>PANELES SOLARES</h2>
			<hr>
			<video class="video columna xmall-12 medium-10 large-8 center block" controls poster="<?php echo THEMEPATH; ?>images/paneles-poster.png">
				<source src="<?php echo THEMEPATH; ?>vid/enso_paneles.mp4" type="video/mp4">
			</video>
			
			<?php
			$panelesArgs = array(
				'category_name' 	=> 'paneles',
				'posts_per_page' 	=> 2
			); 
			$panelesQuery = new WP_Query($panelesArgs);

			if( $panelesQuery->have_posts() ) : while( $panelesQuery->have_posts() ) : $panelesQuery->the_post(); ?>

				<div class="columna xmall-12 medium-6 servicios">
					
					<div class="columna xmall-4 medium-3 center">
						<?php the_post_thumbnail( "medium" ); ?>
					</div>

					<h3 class="text-center" >
						<?php the_title(); ?>
					</h3>
					<hr>
					<div class="columna c-8 medium-10 small-12 center">
						<?php the_content(); ?>
					</div>
					<div class="columna medium-2 center">
						<a class="block text-center flecha" href="#">
							<i class="fa fa-arrow-circle-down"></i>
						</a>
					</div>
				</div>

			<?php endwhile; endif; wp_reset_query(); ?>	

		</div><!-- paneles -->
	</div>
	
	<div class="section cover">
		<div id="calentadores-bg"></div>
	</div>
	<div class="width clearfix">
		<div id="calentadores" class="section">
			<h2>BOILERS SOLARES</h2>
			<hr>
			<video class="video columna xmall-12 medium-10 large-8 center block" controls poster="<?php echo THEMEPATH; ?>images/boiler-poster.png">
				<source src="<?php echo THEMEPATH; ?>vid/enso_calentadores.mp4" type="video/mp4">
			</video>
			<?php
			$boilersArgs = array(
				'category_name' 	=> 'boilers',
				'posts_per_page' 	=> 2
			); 
			$boilersQuery = new WP_Query($boilersArgs);

			if( $boilersQuery->have_posts() ) : while( $boilersQuery->have_posts() ) : $boilersQuery->the_post(); ?>

				<div class="columna xmall-12 medium-6 servicios">
					
					<div class="columna xmall-4 medium-3 center">
						<?php the_post_thumbnail( "medium" ); ?>
					</div>

					<h3 class="text-center" >
						<?php the_title(); ?>
					</h3>
					<hr>
					<div class="columna c-8 medium-10 small-12 center">
						<?php the_content(); ?>
					</div>
					<div class="columna medium-2 center">
						<a class="block text-center flecha" href="#">
							<i class="fa fa-arrow-circle-down"></i>
						</a>
					</div>
				</div>

			<?php endwhile; endif; wp_reset_query(); ?>	

		</div><!-- calentadores -->
	</div>

	<div class="section cover">
		<div id="albercas-bg"></div>
	</div>
	<div class="width clearfix">
		<div id="albercas" class="section">
			<h2>ALBERCAS</h2>
			<hr>
			<?php
			$fotoAlbercas = get_page_by_title( 'Fotos Albercas', OBJECT, 'post' );
			$fotoAlbercasId = $fotoAlbercas->ID;

			$albercasArgs = array(
				'category_name' 	=> 'albercas',
				'post__not_in' => array($fotoAlbercasId),
				'posts_per_page' 	=> 2
			); 
			$albercasQuery = new WP_Query($albercasArgs);

			if( $albercasQuery->have_posts() ) : while( $albercasQuery->have_posts() ) : $albercasQuery->the_post(); ?>
				
				<div class="columna xmall-12 medium-6 servicios">
					
					<div class="columna xmall-4 medium-3 center">
						<?php the_post_thumbnail( "medium" ); ?>
					</div>

					<h3 class="text-center" >
						<?php the_title(); ?>
					</h3>
					<hr>
					<div class="columna c-8 medium-10 small-12 center">
						<?php the_content(); ?>
					</div>
					<div class="columna medium-2 center">
						<a class="block text-center flecha" href="#">
							<i class="fa fa-arrow-circle-down"></i>
						</a>
					</div>
				</div>

			<?php endwhile; endif; wp_reset_query();	

			$attachmentsArgs = array(
	            'post_type' => 'attachment',
	            'posts_per_page' => -1,
	            'post_parent' => $fotoAlbercasId
	        );
	        $attachments = get_posts($attachmentsArgs);

	        if ( $attachments ) { ?>
	        	<div class="columna full clearfix gallery">

	        	<?php foreach ( $attachments as $attachment ) {
	            	$imgUrl = wp_get_attachment_image_src($attachment->ID, 'full'); ?>    	
					<img class="columna medium-6 block" src="<?php echo $imgUrl[0]; ?>">
					
				<?php } ?> 
	        	</div>
	        <?php } ?>

			
		</div><!-- albercas -->
	</div>

	<div class="clear"></div>

	<div class="section cover">
		<div id="ahorro-bg"></div>
	</div>
	<div class="width clearix">
		<div id="ahorro" class="section">

			<div class="result">
			<?php  
			if(isset($_SESSION['msg'])) {
				foreach ($_SESSION['msg'] as $message) 
				    echo "<span>$message</span>";
				session_destroy();
			
				if(isset($_SESSION['uploaded'])){
					if($_SESSION['uploaded']){
					?>
						<p>¡Gracias por enviar tu información!</p>
						<p>En breve nos pondrémos en contacto contigo.</p>
					<?php
					}
				}
			?>
			<?php
			}
			?>
			</div>

			<h2>CALCULA TU AHORRO</h2>
			<hr>
			<p>Calcula el ahorro que podrías tener con un sistema de energía solar. Consulta tu consumo diario en tu recibo de luz.</p>
			<div class="columna full center cleafix">
				<form action="<?php echo THEMEPATH; ?>subida.php" name="projectplanner" method="post" class="contacto" id="projectplanner" enctype="multipart/form-data">
					<div class="floating-placeholder">
						<input id="name" name="name" type="text">
						<label for="name">Nombre / Compañía</label>
					</div>
					<div class="floating-placeholder">
						<input id="phone" name="phone" type="text">
						<label for="phone">Teléfono</label>
					</div>
					<div class="floating-placeholder">
						<input id="email" name="email" type="text">
						<label for="email">Email</label>
					</div>
					<div class="floating-placeholder">
						<input id="city" name="city" type="text">
						<label for="city">Ciudad</label>
					</div>
					<div class="floating-placeholder">
						<input id="consumo" name="consumo" type="text">
						<label for="consumo">Consumo diario kW/h</label>
					</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="<? echo $max;?>" />
					<label class="instruccion-upload" for="userfile">Tamaño máximo: 1.00MB</label>
					<laber class="instruccion-upload" for="userfile">Formatos permitidos: JPEG, PNG y PDF.</label>
					<input class="columna xsmall-12 medium-4 center block" type="file" name="filename" id="filename">
					<input class="columna xsmall-12 medium-4 center send-btn block" type="submit" name="upload" value="ENVIAR" >
				</form>
			</div>
		</div><!-- ahorro -->
	</div>

	<div class="section cover">
		<div id="noticias-bg"></div>
	</div>	
	<div class="width clearfix">
		<div id="blog" class="section">
			<h2>NOTICIAS</h2>
			<hr>
		<?php
		$noticiasArgs = array(
			'category_name' 	=> 'noticias',
			'posts_per_page' 	=> 6
		);
		$noticiasQuery = new WP_Query($noticiasArgs);

		if( $noticiasQuery->have_posts() ) : while( $noticiasQuery->have_posts() ) : $noticiasQuery->the_post(); ?>

			<div class="post columna xlarge-4 large-4 medium-6 small-12 xmall-12">

				<a href="e/noticias/#blog"><?php the_post_thumbnail( 'medium' ); ?></a>

				<div class="caja info">
					<h3 class="text-center"><a href="e/noticias/#blog"><?php the_title(); ?></a></h3>
					<hr>
				</div><!-- caja -->

			</div><!-- tercio -->

		<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div><!-- blog -->

	<div class="section cover">
		<div id="contacto-bg"></div>
	</div>		
	<div class="width clearfix">
		<div id="contacto" class="section">
			<h2>CONTACTO</h2>
			<hr class="no-margin-bottom">

			<div class="columna xmall-12 medium-6 servicios">
			  	<address>
			  		<?php
					$contacto = get_page_by_title( 'contacto' );
					$contactoId = $contacto->ID;
					$tel = get_post_meta($contactoId, '_telefono_meta', true);
					$dir1 = get_post_meta($contactoId, '_direccion1_meta', true);
					$dir2 = get_post_meta($contactoId, '_direccion2_meta', true);
					$facebook = get_post_meta($contactoId, '_facebook_meta', true);
					$twitter = get_post_meta($contactoId, '_twitter_meta', true);
					$correo = get_post_meta($contactoId, '_correo_meta', true);
					?>
					
			  		Teléfono: &nbsp; <a href="tel:<?php echo $tel ?>"><?php echo $tel; ?></a><br><br>
			  		<?php echo $dir1; ?><br>
			  		<?php echo $dir2; ?>
			  	</address>
			</div>
			<div class="columna xmall-12 medium-6 servicios">
			  	<div class="socialCont">
					<div class="columna full text-center">
						<a target="_blank" href="<?php echo $facebook; ?>" class="columna medium-4">
							<i class="fa fa-facebook"></i>
						</a>
						<a target="_blank" href="<?php echo $twitter; ?>" class="columna medium-4">
							<i class="fa fa-twitter"></i>
						</a>
						<a href="mailto:<?php echo $correo; ?>" class="columna medium-4">
							<i class="fa fa-envelope"></i>
						</a>
					</div>
				</div>
			</div>
			
		</div><!-- ubicacion -->
	</div>

	<div id="map" class="section">
		<div id="mapa"></div>
	</div><!-- map -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>