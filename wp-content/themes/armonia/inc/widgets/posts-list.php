<?php
/**
 * Adds Armonia_Posts_List_Widget widget.
 */
class Armonia_Posts_List_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'armonia_posts_list_widget',
            esc_html__( 'Armonia : Posts List', 'armonia' ),
            array( 'description' => __( 'A collection of posts from specific category displayed in list layout.', 'armonia' ) )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $widget_title = isset( $instance['widget_title'] ) ? $instance['widget_title'] : '';
        $posts_category = isset( $instance['posts_category'] ) ? $instance['posts_category'] : '';
        $posts_count = isset( $instance['posts_count'] ) ? $instance['posts_count'] : 3;
        $posts_cat = isset( $instance['posts_cat'] ) ? $instance['posts_cat'] : '';
        $posts_excerpt = isset( $instance['posts_excerpt'] ) ? $instance['posts_excerpt'] : '';
        
        echo wp_kses_post( $before_widget );
            if ( ! empty( $widget_title ) ) {
                echo wp_kses_post( $before_title ) . esc_html( $widget_title ) . wp_kses_post( $after_title );
            }
    ?>
            <div class="posts-wrap posts-list-wrap feature-post-block">
                <?php
                    $post = new WP_Query( 
                        array( 
                            'category_name'    => esc_html( $posts_category ),
                            'posts_per_page' => absint( $posts_count ),
                            'meta_query' => array(
                                array(
                                    'key' => '_thumbnail_id',
                                    'compare' => 'EXISTS'
                                ),
                            )
                        )
                    );
                    if( $post->have_posts() ) :
                        while( $post->have_posts() ) : $post->the_post();
                            $thumbnail_url = get_the_post_thumbnail_url();
                            $categories = get_the_category();
                    ?>
                            <div class="post-item post-card -tiny format-standard">
                                <div class="post_thumb_image bmm-post-thumb card__cover">
                                    <?php if( $thumbnail_url ) : ?>
                                        <img src="<?php echo esc_url( $thumbnail_url ); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="post-content-wrap card__content">
                                    <?php
                                        if( $posts_cat ) {
                                            echo '<h5 class="card__content-category">';
                                                foreach( $categories as $cat ) {
                                                    echo '<span class="bmm-post-cat bmm-cat-' .esc_attr( $cat->cat_ID ). '"><a href="' .esc_url( get_term_link( $cat->cat_ID ) ). '">' .esc_html( $cat->name ). '</a></span>';
                                                }
                                            echo '</h5>';
                                        }

                                        echo '<div class="bmm-post-title card__content-title"><a href="' .esc_url( get_the_permalink() ). '">';
                                            the_title();
                                        echo '</a></div>';

                                        

                                        if( $posts_excerpt ) {
                                            echo '<div class="post-content card__content-info">' .esc_html( get_the_excerpt() ). '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                ?>
            </div>
    <?php
        echo wp_kses_post( $after_widget );
    }

    /**
     * Widgets fields
     * 
     */
    function widget_fields() {
        $categories = get_categories();
        $categories_options[''] = esc_html__( 'Select category', 'armonia' );
        foreach( $categories as $category ) :
            $categories_options[$category->slug] = $category->name. ' (' .$category->count. ') ';
        endforeach;
        return array(
                array(
                    'name'      => 'widget_title',
                    'type'      => 'text',
                    'title'     => esc_html__( 'Widget Title', 'armonia' ),
                    'description'=> esc_html__( 'Add the widget title here', 'armonia' ),
                    'default'   => esc_html__( 'Posts List', 'armonia' )
                ),
                array(
                    'name'      => 'posts_category',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Categories', 'armonia' ),
                    'description'=> esc_html__( 'Choose the category to display list of posts', 'armonia' ),
                    'options'   => $categories_options
                ),
                array(
                    'name'      => 'posts_count',
                    'type'      => 'number',
                    'title'     => esc_html__( 'Number of posts to show', 'armonia' ),
                    'default'   => 3
                ),
                array(
                    'name'      => 'posts_cat',
                    'type'      => 'checkbox',
                    'title'     => esc_html__( 'Show post categories', 'armonia' ),
                    'default'   => true
                ),
                array(
                    'name'      => 'posts_excerpt',
                    'type'      => 'checkbox',
                    'title'     => esc_html__( 'Show post excerpt content', 'armonia' ),
                    'default'   => false
                )
            );
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();
        foreach( $widget_fields as $widget_field ) :
            if ( isset( $instance[ $widget_field['name'] ] ) ) {
                $field_value = $instance[ $widget_field['name'] ];
            } else if( isset( $widget_field['default'] ) ) {
                $field_value = $widget_field['default'];
            } else {
                $field_value = '';
            }
            armonia_widget_fields( $this, $widget_field, $field_value );
        endforeach;
    }
 
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        if( ! is_array( $widget_fields ) ) {
            return $instance;
        }
        foreach( $widget_fields as $widget_field ) :
            $instance[$widget_field['name']] = armonia_sanitize_widget_fields( $widget_field, $new_instance );
        endforeach;

        return $instance;
    }
 
} // class Armonia_Posts_List_Widget