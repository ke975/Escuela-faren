<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Zone
 */

get_header(); ?>



</div>
	<div id="primary" >
	   
		<main id="main" class="site-main row container" role="main">
			<h1 class="text-center text-primary">
				Bienvenido a Learning Online 
			</h1>
 		<img src="https://static.tildacdn.com/tild3237-3534-4061-b333-313832613261/-/resize/504x/8851.jpg" class="img-fluid col-md-6" width="100%" height="100%" alt="...">
			
			<p class="col-md-6 text-primary">
				una plataforma de Estudio que se preocupa por el crescimiento intelectual de aquellas personas que no han tenido la oportunidad de terminar sus estudios por causa de la distancia de los centros educativos.
			</p>
			
				<h1 class="text-center text-primary mt-5">
				Metodologia 
			</h1>
 		<img src="https://www.ottimositoweb.it/wp-content/uploads/2020/07/Web-design1.png" class="img-fluid col-md-6 mb-5" width="100%" height="100%" alt="...">
			
			<p class="col-md-6 text-primary mb-5">
			Recibe Tus clases en vivo con nuestros Profesores y mide tu progreso con nuestras Clases Practicas
			</p>
			
			
	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
