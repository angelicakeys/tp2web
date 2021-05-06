<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">
	


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			<h1 class="page-title">Cours </h1> 
				<?php
				/* the_archive_title( '<h1 class="page-title">', '</h1>' ); */
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			$chaine_bouton_radio = '';
			//global $tProprieté;
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);
				//print_r($tPropriété);
				if ($tPropriété['typeCours'] != $precedent): 
					if ("XXXXXX" != $precedent)	: ?>
						</section>
						<?php if (in_array($precedent, ['Web', 'Jeu'])) : ?>
							<section class="ctrl-carrousel">
								<?php echo $chaine_bouton_radio;
								$chaine_bouton_radio = '';
								 ?>		
							</section>
						<?php endif; ?>
					<?php endif; ?>	
					<h2><?php echo $tPropriété['typeCours'] ?></h2>
					
					<section  <?php echo class_bloc($tPropriété['typeCours']); ?>>
				<?php endif ?>	

				<?php if (in_array($tPropriété['typeCours'], ["Web", "Jeu"]) ) : 
						get_template_part( 'template-parts/content', 'cours-carrousel' ); 
						$chaine_bouton_radio .= '<input class="rad-carrousel"  type="radio" name="rad-'.$tPropriété['typeCours'].'">';
						elseif($tPropriété['typeCours']== 'Projets'): 
						get_template_part( 'template-parts/content', 'galerie' ); 
						
						else :		
						get_template_part( 'template-parts/content', 'cours-article' ); 
				endif;	
				$precedent = $tPropriété['typeCours'];
			endwhile;?>
			</section> <!-- fin section cours -->

			<!-- section formulaire d'une catégorie nouvelle -->
			<section class="admin-rapid">
			<h3>ajouter une article de catégorie "Nouvelles" </h3>
			<input type="text" name="title" placeholder="Titre">
			<textarea name="content" placeholder="Contenu"></textarea>
			<button id='bout-rapide'> Créer une Nouvelle </button>
			</section>
			<!-- section Nouvelles -->
			<section class="nouvelles">
			<button id="bout_nouvelles">Dernières Nouvelles</button>
			<section> </section>
			</section>

		<?php endif; ?>


	

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriété)
{
	/*
	$titre = get_the_title(); 
	// 582-1W1 Mise en page Web (75h)
	$sigle = substr($titre, 0, 7);
	$nbHeure = substr($titre,-4,3);
	$titrePartiel =substr($titre,8,-6);
	$session = substr($titre, 4,1);
	// $contenu = get_the_content();
	// $resume = substr($contenu, 0, 200);
	$typeCours = get_field('type_de_cours');
*/

	$tPropriété['titre'] = get_the_title(); 
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	$tPropriété['nbHeure'] = substr($tPropriété['titre'],-4,3);
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
	$tPropriété['session'] = substr($tPropriété['titre'], 4,1);
	$tPropriété['typeCours'] = get_field('type_de_cours');
}


	function class_bloc ($type){
		if (in_array($type, ["Web", "Jeu"]) ){
			return ('class="carrousel-2"'); 
		} elseif($type == 'Projets'){
				return ('class="galerie"');
			}
			else{
				return ('class="bloc"');
			}
		}