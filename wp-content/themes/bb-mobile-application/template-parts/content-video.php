<?php
/**
 * The template part for displaying services
 *
 * @package BB Mobile Application
 * @subpackage bb_mobile_application
 * @since BB Mobile Application 1.0
 */
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;
  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>  
  <div class="page-box">
    <?php if(get_theme_mod('bb_mobile_application_blog_post_description_option') != 'Full Content'){ ?>
      <div class="box-image">
        <?php
          if ( ! is_single() ) {
            // If not a single post, highlight the video file.
            if ( ! empty( $video ) ) {
              foreach ( $video as $video_html ) {
                echo '<div class="entry-video">';
                  echo $video_html;
                echo '</div>';
              }
            };
          }; 
        ?>
      </div>
    <?php }?>
    <div class="new-text"<?php if(has_post_thumbnail()) { ?><?php } ?>>
      <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'bb_mobile_application_date_hide',true) != '' || get_theme_mod( 'bb_mobile_application_author_hide',true) != '' || get_theme_mod( 'bb_mobile_application_comment_hide',true) != '' || get_theme_mod( 'bb_mobile_application_time_hide',true) != '') { ?>
    <div class="metabox">
      <?php if( get_theme_mod( 'bb_mobile_application_date_hide',true) != '') { ?>
        <span class="entry-date me-1"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span class="ms-1"><?php echo esc_html( get_theme_mod('bb_mobile_application_metabox_separator_blog_post','|') ); ?></span>
      <?php } ?>
      <?php if( get_theme_mod( 'bb_mobile_application_author_hide',true) != '') { ?>
        <span class="entry-author mx-1"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
        </span><span class="ms-1"><?php echo esc_html( get_theme_mod('bb_mobile_application_metabox_separator_blog_post','|') ); ?></span>
      <?php } ?>
      <?php if( get_theme_mod( 'bb_mobile_application_comment_hide',true) != '') { ?>
        <span class="entry-comments mx-1"> <i class="fas fa-comments"></i><?php comments_number( __('0 Comment', 'bb-mobile-application'), __('0 Comments', 'bb-mobile-application'), __('% Comments', 'bb-mobile-application') ); ?></span><span class="ms-1"><?php echo esc_html( get_theme_mod('bb_mobile_application_metabox_separator_blog_post','|') ); ?></span>
      <?php } ?>
      <?php if( get_theme_mod( 'bb_mobile_application_time_hide',true) != '') { ?>
        <span class="entry-time mx-1"><i class="fas fa-clock"></i> <?php echo esc_html( get_the_time() ); ?></span>
      <?php }?>
    </div>
      <?php }?>
      <?php if(get_theme_mod('bb_mobile_application_blog_post_description_option') == 'Full Content'){ ?>
        <div class="entry-content">
          <?php the_content(); ?> 
        </div>
      <?php }
      if(get_theme_mod('bb_mobile_application_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <div class="entry-content"><p><?php $bb_mobile_application_excerpt = get_the_excerpt(); echo esc_html( bb_mobile_application_string_limit_words( $bb_mobile_application_excerpt, esc_attr(get_theme_mod('bb_mobile_application_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('bb_mobile_application_post_suffix_option','...') ); ?></p></div>
        <?php }?>
      <?php }?>
      <?php if( get_theme_mod('bb_mobile_application_button_text','Read More') != ''){ ?>
        <a href="<?php the_permalink(); ?>" class="read-more-box" title="<?php esc_attr_e('Read More','bb-mobile-application'); ?>"><?php echo esc_html(get_theme_mod('bb_mobile_application_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('bb_mobile_application_button_text','Read More'));?></span></a> 
      <?php }?>
    </div>
    <div class="clearfix"></div>
  </div>
</article>