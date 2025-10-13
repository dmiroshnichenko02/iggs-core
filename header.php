<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iggs-landing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<style type="text/tailwindcss">
		@theme {
			--color-white: #ffffff;
			--color-black: #000000;
			--color-black-60: rgba(0, 0, 0, 0.6);
			--color-black-56: rgba(0, 0, 0, 0.56);
			--color-black-50: rgba(0, 0, 0, 0.50);
			--color-light-gradient: linear-gradient(180deg, #0065CA 0%, #37B6FF 100%);
			--color-pink: #FF538F;
			--color-dark-blue: #041421;
			--color-dark-blue-90: rgba(4, 20, 33, 0.90);

			--font-archivo: 'Archivo', sans-serif;

			--text-base: 1rem;
			--leading-base: 1.375rem;
			--text-h2: 4rem;
			--leading-h2: 4rem;
			--text-h3: 2.5rem;
			--leading-h3: 2.5rem;
			--text-h4: 2.25rem;
			--leading-h4: 2.25rem;
			--text-h5: 1.625rem;
			--leading-h5: 1.625rem;
			--text-h6: 1.25rem;
			--leading-h6: 1.25rem;
			--text-high: 1.5rem;
			--leading-high: 1.5rem;
			--text-label: 0.875rem;
			--leading-label: 0.875rem;
			--text-medium: 1.125rem;
			--leading-medium: 1.125rem;
			--text-small: 0.75rem;
			--leading-small: 0.75rem;

		}
		@layer utilities {
			.container {
				max-width: 81rem;
			}
		}
	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'iggs-landing' ); ?></a>

	<header id="masthead" class="site-header absolute top-0 left-0 w-full z-[999] transition-all duration-500 bg-transparent">
	<div class="flex justify-between items-center py-4 container mx-auto">
		<div class="logotype">
			<?php the_custom_logo(); ?>
		</div>

		<nav class="nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'flex gap-4 text-white font-archivo font-normal text-base leading-base uppercase',
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<?php
		$link = get_field('reg_button', 'options');
		if ($link):
			$link_url = $link['link'];
			$link_title = $link['title'];
			?>
			<a class="px-[37px] py-4 text-black bg-white font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white" href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?></a>
		<?php	
		endif;
		?>
		</div>
	</header>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const header = document.querySelector('#masthead');
			let stickyApplied = false;

			function handleScroll() {
				const headerHeight = header.offsetHeight;
				const offset = headerHeight + 50;
				if (window.scrollY > offset) {
					if (!stickyApplied) {
						header.classList.add('fixed', 'top-0', 'bg-dark-blue-90');
						header.classList.remove('absolute', 'bg-transparent');
						stickyApplied = true;
					}
				} else {
					if (stickyApplied) {
						header.classList.remove('fixed', 'top-0', 'bg-dark-blue-90');
						header.classList.add('absolute', 'bg-transparent');
						stickyApplied = false;
					}
				}
			}
			window.addEventListener('scroll', handleScroll);
		});
	</script>