<?php
$settings = array(
				'layout' => 'two-col-left',
				'portfolio_layout' => 'one-col'
				);

$settings = woo_get_dynamic_values( $settings );

$layout = $settings['layout'];
// Cater for custom portfolio gallery layout option.
if ( is_tax( 'portfolio-gallery' ) || is_post_type_archive( 'portfolio' ) ) {
	if ( '' != $settings['portfolio_layout'] ) { $layout = $settings['portfolio_layout']; }
}

if ( 'one-col' != $layout ) {
	if ( woo_active_sidebar( 'primary' ) ) {
		woo_sidebar_before();
?>
<aside id="sidebar">
	<?php woo_sidebar_inside_before(); ?>
	<div class="widget">
		<h3>Hotels in London</h3>
		<ul>
		<?php
		$args = array(
			'post_type' => 'hotels',
			'tax_query' => array(
				array(
					'taxonomy' => 'hotel-location',
					'field'    => 'slug',
					'terms'    => 'london',
				),
			),
		);
		$query = new WP_Query( $args );
		while($query->have_posts()):$query->the_post();
		?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
		</ul>
	</div>
	<div class="widget">
		<h3>Links</h3>
		<ul>
			<li><a href="<?php echo get_post_type_archive_link('hotels'); ?>">See all hotels</a></li>
			<li><a href="<?php echo get_term_link('new-york', 'hotel-location'); ?>">See New York Hotels</a></li>
		</ul>
	</div>

	<?php 
	woo_sidebar( 'warlei' );
	woo_sidebar_inside_after();
	?>
</aside>
<?php
		woo_sidebar_after();
	}
}
?>