<?php
/**
 * Getting Started Help Notic
 **/
function music_blog_general_admin_notice(){

      $pro_msg = esc_html__('PRO Version Details & Documentation', 'music-blog');
       //<a href="%4$s" target="new" class="button">%5$s</a>
       $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info" >
              <h3>%1$s</h3>
              <p>%2$s</p><p>
              <a class="music-blog-btn-get-started button button-primary button-hero music-blog-button-padding" href="#" data-name="" data-slug="">%3$s</a>
              <a href="%6$s" class="button">%7$s</a>
              <a href="?music_blog_notice_dismissed" style="text-decoration: none; float: right;" >%8$s</a>
              </p></div>',
              esc_html__('Get Most out of the theme','music-blog'),
              esc_html__('Congratulations! You have successfully activate Music Blog theme. Go to Appearance->Customize->Global Settings. you will find all options in one panel.','music-blog'),
              esc_html__('Getting Started with Demos...', 'music-blog'),
              esc_url('https://www.smarterthemes.com/'),
              $pro_msg,
              esc_url(admin_url()."customize.php"),
              esc_html__('Go to Customizer', 'music-blog'),
              esc_html__('Dismiss Notice', 'music-blog'));
       echo wp_kses_post($msg);
}

if ( isset( $_GET['music_blog_notice_dismissed'] ) ){
          //set notice value false
          update_option('music_blog_help_notice', 'notice_music_blog_dismissed');
}

$music_blog_help_notice = get_option('music_blog_help_notice', '');

if (($music_blog_help_notice != 'notice_music_blog_dismissed' || $music_blog_help_notice === '') ){
          add_action('admin_notices', 'music_blog_general_admin_notice');
}