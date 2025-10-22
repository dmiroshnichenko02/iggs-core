<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iggs-landing
 */

?>

	<footer id="colophon" class="site-footer bg-[#111617] py-[52px]">
		<div class="container mx-auto">
				<img class="mx-auto mb-[47px]" src="<?php echo get_field('footer_logo', 'option'); ?>" alt="footer logo">
				<nav class="nav">
					<style>
						.footer-nav li {
							position: relative;
						}
						.footer-nav li::after {
							position: absolute;
							content: "";
							width: 0%;
							height: 2px;
							background: #fff;
							bottom: -2px;
							left: 0px;
							transition: all 0.3s ease-in-out;
						}
						.footer-nav li:hover::after {
							width: 100%;
						}
					</style>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'flex flex-col lg:flex-row items-center  footer-nav gap-4 text-white font-archivo font-normal text-base leading-base uppercase justify-center',
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>
		</div>
		<div class="w-[calc(100%-30px)] mx-auto lg:w-full bg-[rgba(217,217,217,0.2)] h-[1px] my-[46px]"></div>
		<?php if (!empty(get_field('contact_repeater', 'option')) && is_array(get_field('contact_repeater', 'option'))): ?>
                 <style>
                    .info-text {
                        color: white;
                        font-family: "Archivo";
                        font-size: 18px;
                        line-height: 18px;
                        font-weight: 400;
                    }
					.info-text:hover {
						color: rgba(255,255,255,0.7);
					}
                </style>
                <div class="flex flex-col lg:flex-row items-center justify-center gap-6">
                    <?php foreach (get_field('contact_repeater', 'option') as $item): ?>
                        <div class="flex items-center gap-[10px] group">
                            <?php if (!empty($item['icon'])): ?>
                                <img src="<?= esc_url($item['icon']) ?>" alt="" class="w-6 h-6 object-contain">
                            <?php endif; ?>
                            <?php if (!empty($item['text'])): ?>
                                <div class="info-text text-white text-label leading-label font-archivo font-normal transition-colors duration-200">
                                    <?php echo $item['text']; ?>
                                </div>
                    		<?php endif; ?>
                    	</div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>