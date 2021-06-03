<?php
/**
 * банеры для footer
 */

defined( 'ABSPATH' ) || exit;

class BanersFooterWidget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
			'footerbaners', 
			'Банер', 
			array( 'description' => 'Банеры для footer' ) 
		);
	}
 

	public function widget( $args, $footerparam ) {
		?>
        <div class="row">
            <div class="col-md-6">
                <div class="school6-baners-footer">
		            <a href="<?php echo esc_url($footerparam['url']);?>">
			            <img src="<?php echo esc_url($footerparam['img']);?>" alt="">
		            </a>
	            </div>
            </div>
            <div class="col-md-6">
                <div class="school6-baners-footer">
		            <a href="<?php echo esc_url($footerparam['url1']);?>">
			            <img src="<?php echo esc_url($footerparam['img1']);?>" alt="">
		            </a>
	            </div>
            </div>
        </div>
        <?php
	}
 
	
	public function form( $footerparam ) {
		        
        if ( isset( $footerparam[ 'img' ] ) ) {
			$img = $footerparam[ 'img' ];
		}

        if ( isset( $footerparam[ 'url' ] ) ) {
			$url = $footerparam[ 'url' ];
		}

        if ( isset( $footerparam[ 'img1' ] ) ) {
			$img1 = $footerparam[ 'img1' ];
		}

        if ( isset( $footerparam[ 'url1' ] ) ) {
			$url1 = $footerparam[ 'url1' ];
		}
		?>

        <p>Первый банер</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Ссылка на изображение (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="url" value="<?php echo esc_attr( $img ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Ссылка с банера (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="url" value="<?php echo esc_attr( $url ); ?>" />
		</p>
        <p>Второй банер</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img1' ); ?>">Ссылка на изображение (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img1' ); ?>" name="<?php echo $this->get_field_name( 'img1' ); ?>" type="url" value="<?php echo esc_attr( $img1 ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'url1' ); ?>">Ссылка с банера (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'url1' ); ?>" name="<?php echo $this->get_field_name( 'url1' ); ?>" type="url" value="<?php echo esc_attr( $url1 ); ?>" />
		</p>
		<?php 
	}
 
	
	public function update( $new_instance, $old_instance ) {
		$footerparam = array();	
        $footerparam['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $footerparam['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
        $footerparam['img1'] = ( ! empty( $new_instance['img1'] ) ) ? strip_tags( $new_instance['img1'] ) : '';
        $footerparam['url1'] = ( ! empty( $new_instance['url1'] ) ) ? strip_tags( $new_instance['url1'] ) : '';
		return $footerparam;
	}
}

function school6_baners_widget_load() {
	register_widget( 'BanersFooterWidget' );
}
add_action( 'widgets_init', 'school6_baners_widget_load' );
?>