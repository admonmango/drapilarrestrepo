<?php
/**
 * Template for displaying instructor of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/instructor.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.3.0
 */

defined( 'ABSPATH' ) || exit();

$course = LP_Global::course();
/**
 * @var LP_User $instructor .
 */
$instructor    = $course->get_instructor();
$instructor_id = $instructor->get_id();
?>

<style>
	.course-tab-panels {
    max-width: 1200px;
    margin: 0 auto;
}
	.course-author ul{
		margin: 0;
    padding: 0;
    align-items: initial;
    display: flex;
    flex-wrap: wrap;

	}
	.course-author li{
		list-style: none;
		display: flex;
		margin-right: 50px;
		flex-direction: column;
		align-items: center;
		margin-top:0;
	}
	.course-author img{
		max-width: 300px;
		object-fit: cover;
		height: 360px;
		margin-bottom: 20px;
	}
	.course-author a {
		padding: 4px 8px;
    background-color: #28bca4;
 color:white;
    font-size: 23px;
    line-height: 3px;
    border-radius: 5px;
    font-weight: 500;
	}
	@media(max-width: 585px){
		.course-author ul{
			justify-content: center;
		}
		.course-author li{
			margin-right:0;
			margin-bottom: 50px;
		}
	}
	
	li.course-nav.course-nav-tab-reviews {
    display: none !important;
}
	ul.learn-press-nav-tabs.course-nav-tabs {
    justify-content: center;
}
</style>




<p class="warning">Para descargar las recetas de nuestros aliados debes adquirir el programa.</p>
<div class="course-author">
	<ul>
		<li>
			<img src="https://drapilarrestrepo.com/wp-content/uploads/2022/12/recetario-Ugali.png" alt="">
			<div>
				<?php
					if ( is_user_logged_in() )
					{
						echo '<a href="/wp-content/uploads/2022/12/recetario_Ugali_banquiva.pdf" target="_blank">¡Descargar!</a>';
					}
					else
					{
						echo '<a class="gray_btn" href="">No Disponible</a>';
					}
				?>
			</div>
		</li>
		<li>
			<img src="/wp-content/uploads/2023/01/Bodai.png" alt="">
			<div>
				<?php
					if ( is_user_logged_in() )
					{
						echo '<a href="/wp-content/uploads/2023/01/Ama-lo-que-te-hace-bien-Pilar-Restrepo.pdf" target="_blank">¡Descargar!</a>';
					}
					else
					{
						echo '<a class="gray_btn" href="">No Disponible</a>';
					}
				?>
			</div>
		</li>
	</ul>
</div>
