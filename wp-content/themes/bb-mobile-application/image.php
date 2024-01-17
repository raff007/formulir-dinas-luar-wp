<?php
/**
 * The template for displaying image attachments.
 *
 * @package BB Mobile Application
 */

get_header(); ?>

<main role="main" id="maincontent" class="content-area">
    <div class="middle-align content_sidebar">
        <div class="container">
            <?php
            $bb_mobile_application_left_right = get_theme_mod( 'bb_mobile_application_theme_options','Right Sidebar');
            if($bb_mobile_application_left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
                    <div class="site-main col-lg-8 col-md-8" id="sitemain">
            			<?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header" role="banner">
                                    <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                                    
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>
                                    <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                        </nav>
                                    <?php } ?>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_mobile_application_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer  class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            <?php }else if($bb_mobile_application_left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="site-main col-lg-8 col-md-8" id="sitemain">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header" role="banner">
                                    <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>    
                                    <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                        </nav>
                                    <?php } ?>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_mobile_application_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
                </div>
            <?php }else if($bb_mobile_application_left_right == 'One Column'){ ?>
                <div class="site-main" id="sitemain">
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header" role="banner">
                                <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
            
                                <div class="entry-meta">
                                    <?php
                                        $metadata = wp_get_attachment_metadata();
                                        printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                            esc_attr( get_the_date( 'c' ) ),
                                            esc_html( get_the_date() ),
                                            esc_url( wp_get_attachment_url() ),
                                            absint($metadata['width']),
                                            absint($metadata['height']),
                                            esc_url( get_permalink( $post->post_parent ) ),
                                            esc_html(get_the_title( $post->post_parent ))
                                        );
            
                                        edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                    ?>
                                </div>    
                                <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                    <nav role="navigation" id="image-navigation" class="image-navigation">
                                        <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                        <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                    </nav>
                                <?php } ?>
                            </header>    
                            <div class="entry-content">
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php bb_mobile_application_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
                </div>
            <?php }else if($bb_mobile_application_left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="site-main col-lg-6 col-md-6" id="sitemain">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header" role="banner">
                                    <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>    
                                    <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                        </nav>
                                    <?php } ?>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_mobile_application_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($bb_mobile_application_left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="site-main col-lg-3 col-md-3" id="sitemain">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header" role="banner">
                                    <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>    
                                    <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                        </nav>
                                    <?php } ?>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_mobile_application_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($bb_mobile_application_left_right == 'Grid Layout'){ ?>
                <div class="row">
                    <div class="site-main col-lg-8 col-md-8" id="sitemain">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header" role="banner">
                                    <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>    
                                    <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                        </nav>
                                    <?php } ?>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_mobile_application_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div class="site-main col-lg-8 col-md-8" id="sitemain">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header" role="banner">
                                    <?php esc_html(get_the_title( '<h1 class="entry-title">', '</h1>' )); ?>
                
                                    <div class="entry-meta">
                                        <?php
                                            $metadata = wp_get_attachment_metadata();
                                            printf('Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s">%4$s &times; %5$s</a> in <a href="%6$s" rel="gallery">%7$s</a>',
                                                esc_attr( get_the_date( 'c' ) ),
                                                esc_html( get_the_date() ),
                                                esc_url( wp_get_attachment_url() ),
                                                absint($metadata['width']),
                                                absint($metadata['height']),
                                                esc_url( get_permalink( $post->post_parent ) ),
                                                esc_html(get_the_title( $post->post_parent ))
                                            );
                
                                            edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<span class="edit-link">', '</span>' );
                                        ?>
                                    </div>    
                                    <?php if( get_theme_mod( 'bb_mobile_application_blog_post_pagination',true) != '') { ?>    
                                        <nav role="navigation" id="image-navigation" class="image-navigation">
                                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'bb-mobile-application' ) ); ?></div>
                                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'bb-mobile-application' ) ); ?></div>
                                        </nav>
                                    <?php } ?>
                                </header>    
                                <div class="entry-content">
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_mobile_application_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-mobile-application' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-mobile-application' ), '<footer class="entry-meta" role="contentinfo"><span class="edit-link">', '</span></footer>' ); ?>
                            </article>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php get_sidebar();?></div>
                </div>
            <?php }?>
            <div class="clear"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>