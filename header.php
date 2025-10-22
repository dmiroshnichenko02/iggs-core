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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
	
	<style type="text/tailwindcss">
		@theme {
			--color-white: #ffffff;
			--color-black: #000000;
			--color-black-60: rgba(0, 0, 0, 0.6);
			--color-black-56: rgba(0, 0, 0, 0.56);
			--color-black-50: rgba(0, 0, 0, 0.50);
			--color-black-20: rgba(0, 0, 0, 0.20);
			--color-light-gradient: linear-gradient(180deg, #0065CA 0%, #37B6FF 100%);
			--color-pink: #FF538F;
			--color-dark-blue: #041421;
			--color-dark-blue-90: rgba(4, 20, 33, 0.90);

			--font-archivo: 'Archivo', sans-serif;

			--text-base: 1rem;
			--leading-base: 1.375rem;
			--text-h2: 4rem;
			--leading-h2: 4rem;
			--text-h2-m: 1.875rem;
			--leading-h2-m: 1.875rem;
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

			@media(max-width: 1340px) {
				.container {
					max-width: 100%;
					padding-left:25px;
					padding-right:25px;
				}
			}

			@media(max-width: 768px) {
				.container {
					max-width: 100%;
					padding-left:15px;
					padding-right:15px;
				}
			}
		}
	</style>
	<?php wp_head(); ?>
	<style>
		html, body {
			overflow-x: hidden !important;
			width: 100vw !important;
			max-width: 100vw !important;
		}
		
		#page.site {
			overflow-x: hidden;
		}
		html {
			scroll-behavior: smooth !important;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'iggs-landing' ); ?></a>

	<header id="masthead" class="site-header overflow-hidden absolute top-0 left-0 w-full z-[999] transition-all duration-500 bg-transparent border-transparent border-b border-solid">
		<div class="flex justify-end gap-[21px] lg:gap-[0px] lg:justify-between items-center py-3 lg:py-4 container mx-auto relative">
			<div class="logotype w-[111px] h-[45px] object-cover mr-auto lg:mr-0 lg:w-auto lg:h-auto">
				<?php the_custom_logo(); ?>
			</div>
			<style>
				.header-nav li {
					position: relative;
				}
				.header-nav li::after {
					position: absolute;
					content: "";
					width: 0%;
					height: 2px;
					background: #fff;
					bottom: -2px;
					left: 0px;
					transition: all 0.3s ease-in-out;
				}
				.header-nav li:hover::after {
					width: 100%;
				}
				.burger {
					position: relative;
					width: 32px;
					height: 32px;
					cursor: pointer;
					display: none;
					justify-content: center;
					align-items: center;
					z-index: 1100;
					background: none;
					border: none;
				}
				@media (max-width: 1024px) {
					.burger {
						display: flex;
					}
				}
				.burger svg.burger-icon rect,
				.burger svg.close-icon line {
					transition: fill 0.25s, stroke 0.25s;
				}
				.burger svg.burger-icon rect {
					fill: #fff !important;
				}
				.burger svg.close-icon line {
					stroke: #fff !important;
				}
				.burger.active svg.close-icon line {
					stroke: #041421 !important;
				}
			</style>
			<nav class="nav desk">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'flex gap-4 header-nav text-white font-archivo font-normal text-base leading-base uppercase',
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
				<a class="px-4 lg:px-[37px] py-[10px] lg:py-4 text-black bg-white font-archivo font-normal text-label leading-label transition duration-300 hover:bg-dark-blue hover:text-white" href="#form-reg"><?php echo esc_html($link_title); ?></a>
			<?php	
			endif;
			?>

			<button class="burger mr-4 lg:hidden" id="burger-btn" aria-label="Toggle menu" type="button">
				<span class="sr-only">Toggle menu</span>
				<!-- Burger SVG -->
				<svg class="burger-icon" width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block;">
					<rect width="25" height="2" y="0" rx="1"/>
					<rect width="25" height="2" y="6.5" rx="1"/>
					<rect width="25" height="2" y="13" rx="1"/>
				</svg>
				<svg class="close-icon" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:none;">
					<line x1="5" y1="5" x2="20" y2="20" stroke-width="2" stroke-linecap="round"/>
					<line x1="5" y1="20" x2="20" y2="5" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</button>
		</div>
		<!-- Mobile nav -->
			<nav class="nav mobile">
				<style>
					.mobile-menu-overlay {
						position: fixed;
						top: 0;
						left: 0;
						width: 100vw;
						height: 100vh;
						background: #fff;
						z-index: 1099;
						transition: transform 0.35s cubic-bezier(.4,0,.2,1);
						transform: translateX(100%);
						overflow-y: auto;
						display: flex;
						flex-direction: column;
						justify-content: center;
						align-items: center;
					}
					.mobile-menu-overlay.open {
						transform: translateX(0%);
					}
					@media (min-width: 1025px) {
						.mobile {
							display: none !important;
						}
					}
				</style>
				<div class="mobile-menu-overlay" id="mobile-menu">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'mobile-menu-ul',
								'menu_class'     => 'flex flex-col space-y-8 text-black text-[18px] leading-[18px] font-archivo font-semibold items-center justify-center uppercase',
								'container'      => false,
								'fallback_cb'    => false,
							)
						);
					?>
				</div>
			</nav>
	</header>

	<style>
		@media (max-width: 1024px) {
			#masthead {
				position: fixed !important;
				top: 0 !important;
				background-color: #041421 !important;
				border-color: transparent !important;
			}
			.desk {
				display: none;
			}
			.mobile {
				display: block;
			}
		}
	</style>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const header = document.querySelector('#masthead');
			let stickyApplied = false;

			const burger = document.getElementById('burger-btn');
			const mobileMenu = document.getElementById('mobile-menu');
			const body = document.body;

			const burgerIcon = burger ? burger.querySelector('.burger-icon') : null;
			const closeIcon = burger ? burger.querySelector('.close-icon') : null;

			function setCloseIconColor(isOpen) {
				if (closeIcon) {
					const lines = closeIcon.querySelectorAll('line');
					if (isOpen) {
						lines.forEach(l => l.setAttribute('stroke', '#041421'));
					} else {
						lines.forEach(l => l.setAttribute('stroke', '#fff'));
					}
				}
			}

			function openMobileMenu() {
				mobileMenu.classList.add('open');
				burger.classList.add('active');
				body.style.overflow = 'hidden';
				// SVG toggle
				if (burgerIcon && closeIcon) {
					burgerIcon.style.display = 'none';
					closeIcon.style.display = 'block';
					setCloseIconColor(true);
				}
			}

			function closeMobileMenu() {
				mobileMenu.classList.remove('open');
				burger.classList.remove('active');
				body.style.overflow = '';
				if (burgerIcon && closeIcon) {
					burgerIcon.style.display = 'block';
					closeIcon.style.display = 'none';
					setCloseIconColor(false);
				}
			}

			if (burger && mobileMenu) {
				burger.addEventListener('click', function(e) {
					if (mobileMenu.classList.contains('open')) {
						closeMobileMenu();
					} else {
						openMobileMenu();
					}
				});

				document.addEventListener('keydown', function (e) {
					if ((e.key === "Escape" || e.key === "Esc") && mobileMenu.classList.contains('open')) {
						closeMobileMenu();
					}
				});
				mobileMenu.addEventListener('click', function(e) {
					if (e.target === mobileMenu) {
						closeMobileMenu();
					}
				});
			}

			function handleScroll() {
				const headerHeight = header.offsetHeight;
				const offset = headerHeight + 1;
				if (window.scrollY > offset) {
					if (!stickyApplied) {
						header.classList.add('fixed', 'top-0', 'bg-dark-blue-90', 'border-black-20');
						header.classList.remove('absolute', 'bg-transparent', 'border-transparent');
						stickyApplied = true;
					}
				} else {
					if (stickyApplied) {
						header.classList.remove('fixed', 'top-0', 'bg-dark-blue-90', 'border-black-20');
						header.classList.add('absolute', 'bg-transparent', 'border-transparent');
						stickyApplied = false;
					}
				}
			}

			function enableStickyScript() {
				window.addEventListener('scroll', handleScroll);
				handleScroll();
			}

			function disableStickyScript() {
				window.removeEventListener('scroll', handleScroll);
				header.classList.remove('fixed', 'absolute', 'top-0', 'bg-dark-blue-90', 'bg-transparent', 'border-black-20', 'border-transparent');
				header.classList.add('sticky', 'top-0', 'bg-dark-blue');
			}

			function checkScreen() {
				if (window.innerWidth > 1024) {
					header.classList.remove('sticky', 'bg-dark-blue');
					enableStickyScript();

					if (mobileMenu && burger) {
						closeMobileMenu();
					}
				} else {
					disableStickyScript();
					if (mobileMenu && burger && !mobileMenu.classList.contains('open')) {
						body.style.overflow = '';
						if(burgerIcon && closeIcon) {
							burgerIcon.style.display = 'block';
							closeIcon.style.display = 'none';
							setCloseIconColor(false);
						}
					}
				}
			}

			checkScreen();
			window.addEventListener('resize', checkScreen);

			document.body.addEventListener('click', function(e) {
				const link = e.target.closest('a[href^="#"]:not([href="#"])');
				if (link) {
					const href = link.getAttribute('href');
					const target = document.querySelector(href);
					if (target) {
						e.preventDefault();
						target.scrollIntoView({
							behavior: 'smooth'
						});
					}
				}
			});
		});
	</script>