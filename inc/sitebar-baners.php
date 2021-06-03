<?php
/**
 * Банеры для сайтбара
 */

defined( 'ABSPATH' ) || exit;

class BanersSitebarWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'sitebaners', 
			'Банер', // заголовок виджета
			array( 'description' => 'Банеры для сайтбара' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $param ) {
		?>
        <div class="school6-banners-block">
            <div class="school6-banners-block-img">
            <a href="<?php echo esc_url($param['url']);?>" 
                title="A Paradise for Holiday">
                <img width="130" height="90" 
                src="<?php echo esc_url($param['img']);?>" 
                class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" 
                alt="<?php echo __( $param['title'], 'school6');?>" 
                loading="lazy" 
                title="<?php echo __( $param['title'], 'school6');?>" 
                >
            </a>

            </div>
            <div class="school6-banners-block-text">
                <h3 class="school6-banners-block-title">
			        <a href="<?php echo esc_url($param['url']);?>" 
                        title="<?php echo __( $param['title'], 'school6');?>">
                        <?php echo __( $param['title'], 'school6');?>
                    </a>
		        </h3> 
            </div>

        </div>
       
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $param ) {
		if ( isset( $param[ 'title' ] ) ) {
			$title = $param[ 'title' ];
		}
        
        if ( isset( $param[ 'img' ] ) ) {
			$img = $param[ 'img' ];
		}

        if ( isset( $param[ 'url' ] ) ) {
			$url = $param[ 'url' ];
		}
		?>

        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Ссылка на изображение 130x90 (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="url" value="<?php echo esc_attr( $img ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Ссылка с банера (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="url" value="<?php echo esc_attr( $url ); ?>" />
		</p>		
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$param = array();
		$param['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
        $param['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $param['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $param;
	}
}
 
/*
 * регистрация виджета
 */
function school6_baners_sitebar_widget_load() {
	register_widget( 'BanersSitebarWidget' );
}
add_action( 'widgets_init', 'school6_baners_sitebar_widget_load' );



?>
