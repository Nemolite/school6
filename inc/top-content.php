<?php
/**
 * Основные блоки
 */
?>
<!-- Объявление-->
<div class="widget-title-wrapper">
	<h3 class="widget-title">Объявление</h3>    
</div>
<div class="ad_info">
    <?php 
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
        $args_info = array(   
            'post_type'    => 'top_section_info',    
	        'posts_per_page' => 1,   
	
        );
        $query_info = new WP_Query( $args_info ); 
        if( $query_info->have_posts() ){
	        while( $query_info->have_posts() ){
		        $query_info->the_post();
    ?>

    <?php the_content(); ?>   
 				
    <?php
	    }
	        wp_reset_postdata(); 	
    } 
    ?>
</div>

<!-- Фотоальбом-->
<div class="widget-title-wrapper">
	<h3 class="widget-title">Фотоальбом</h3>    
</div>
<div class="photo_albom">
<?php echo do_shortcode('[metaslider id="24391"]'); ?>
</div>


<!-- Заголовок новстей-->
<div class="widget-title-wrapper">
	<h3 class="widget-title">Новости</h3>
</div>
