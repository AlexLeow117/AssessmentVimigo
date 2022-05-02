<?php
/**
 * Adds Armonia_Category_Collection_Widget widget.
 */
class Armonia_Category_Collection_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'armonia_category_collection_widget',
            esc_html__( 'Armonia : Category Collection', 'armonia' ),
            array( 'description' => __( 'A collection of post categories.', 'armonia' ) )
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
        $posts_categories = isset( $instance['posts_categories'] ) ? $instance['posts_categories'] : '';
        $categories_title = isset( $instance['categories_title'] ) ? $instance['categories_title'] : true;
        $categories_count = isset( $instance['categories_count'] ) ? $instance['categories_count'] : true;

        echo wp_kses_post( $before_widget );
            if ( ! empty( $widget_title ) ) {
                echo wp_kses_post( $before_title ) . esc_html( $widget_title ) . wp_kses_post( $after_title );
            }
    ?>
            <div class="categories-wrap layout-one">
                <?php
                if( $posts_categories != '[]' ) {
                    $postCategories = get_categories( array( 'slug' => explode( ",", $posts_categories ) ) );
                } else {
                    $postCategories = get_categories();
                }
                    foreach( $postCategories as $singleCat ) :
                        $cat_name = $singleCat->name;
                        $cat_count = $singleCat->count;
                        $cat_slug = $singleCat->slug;
                        $singlecat_id = $singleCat->cat_ID;
                        $widget_post = new WP_Query( 
                            array( 
                                'category_name'    => esc_html( $cat_slug ),
                                'posts_per_page' => 1,
                                'meta_query' => array(
                                    array(
                                     'key' => '_thumbnail_id',
                                     'compare' => 'EXISTS'
                                    ),
                                )
                            )
                        );
                        if( $widget_post->have_posts() ) :
                            while( $widget_post->have_posts() ) : $widget_post->the_post();
                                $thumbnail_url = get_the_post_thumbnail_url();
                            endwhile;
                        endif;
                ?>
                        <div class="bmm-post-thumb category-item cat-<?php echo esc_attr( $singlecat_id ); ?>">
                            <?php if( $thumbnail_url ) : ?>
                                <img src="<?php echo esc_url( $thumbnail_url ); ?>">
                            <?php endif; ?>
                            <a class="cat-meta-wrap" href="<?php echo esc_url( get_term_link( $singlecat_id ) ); ?>">
                                <div class="cat-meta bmm-post-title">
                                    <?php
                                        if( $categories_title ) {
                                            echo '<span class="category-name">'.esc_html( $cat_name ).'</span>';
                                        }

                                        if( $categories_count ) {
                                            echo '<span class="category-count">' .absint( $cat_count ). '</span>';
                                        }
                                    ?>
                                </div>
                            </a>
                        </div>
                <?php
                    endforeach;
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
        $postCategories = get_categories();
        foreach( $postCategories as $category ) :
            $categories_options[$category->slug] = $category->name. ' (' .$category->count. ') ';
        endforeach;
        return array(
                array(
                    'name'      => 'widget_title',
                    'type'      => 'text',
                    'title'     => esc_html__( 'Widget Title', 'armonia' ),
                    'description'=> esc_html__( 'Add the widget title here', 'armonia' ),
                    'default'   => esc_html__( 'Category Collection', 'armonia' )
                ),
                array(
                    'name'      => 'posts_categories',
                    'type'      => 'multicheckbox',
                    'title'     => esc_html__( 'Post Categories', 'armonia' ),
                    'description'=> esc_html__( 'Choose the categories to display', 'armonia' ),
                    'options'   => $categories_options
                ),
                array(
                    'name'      => 'categories_title',
                    'type'      => 'checkbox',
                    'title'     => esc_html__( 'Show categories title', 'armonia' ),
                    'default'   => true
                ),
                array(
                    'name'      => 'categories_count',
                    'type'      => 'checkbox',
                    'title'     => esc_html__( 'Show categories count', 'armonia' ),
                    'default'   => true
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
 
} // class Armonia_Category_Collection_Widget