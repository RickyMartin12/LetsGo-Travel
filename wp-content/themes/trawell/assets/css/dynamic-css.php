<?php 

/* Font styles */

$main_font = trawell_get_font_option( 'main_font' );
$h_font = trawell_get_font_option( 'h_font' );
$nav_font = trawell_get_font_option( 'nav_font' );
$font_size_p = number_format(absint( trawell_get_option( 'font_size_p' ) ) / 10,  1);
$font_size_h1 = number_format(absint( trawell_get_option( 'font_size_h1' ) ) / 10, 1);
$font_size_h2 = number_format(absint( trawell_get_option( 'font_size_h2' ) ) / 10, 1);
$font_size_h3 = number_format(absint( trawell_get_option( 'font_size_h3' ) ) / 10, 1);
$font_size_h4 = number_format(absint( trawell_get_option( 'font_size_h4' ) ) / 10, 1);
$font_size_h5 = number_format(absint( trawell_get_option( 'font_size_h5' ) ) / 10, 1);
$font_size_h6 = number_format(absint( trawell_get_option( 'font_size_h6' ) ) / 10, 1);
$font_size_small = number_format(absint( trawell_get_option( 'font_size_small' ) ) / 10, 1);
$font_size_nav = number_format(absint( trawell_get_option( 'font_size_nav' ) )/ 10, 1);
$font_size_section_title = number_format(absint( trawell_get_option( 'font_size_section_title' ) ) / 10, 1);
$font_size_widget_title = number_format(absint( trawell_get_option( 'font_size_widget_title' ) ) / 10, 1);
$font_size_cover = number_format(absint( trawell_get_option( 'font_size_cover' ) ) / 10, 1);

/* General styles */

$color_body_bg = esc_attr( trawell_get_option( 'color_bg' ) );
$color_content_h = esc_attr( trawell_get_option( 'color_content_h' ) );
$color_content_txt = esc_attr( trawell_get_option( 'color_content_txt' ) );
$color_content_acc = esc_attr( trawell_get_option( 'color_content_acc' ) );
$color_content_meta = esc_attr( trawell_get_option( 'color_content_meta' ) );

/* Top header styles */
$header_top_height = esc_attr( trawell_get_option( 'header_top_height' ) );
$color_header_top_bg = esc_attr( trawell_get_option( 'color_header_top_bg' ) );
$color_header_top_txt = esc_attr( trawell_get_option( 'color_header_top_txt' ) );
$color_header_top_acc = esc_attr( trawell_get_option( 'color_header_top_acc' ) );


/* Main header styles */

$color_header_main_bg = esc_attr( trawell_get_option( 'color_header_main_bg' ) );
$color_header_main_txt = esc_attr( trawell_get_option( 'color_header_main_txt' ) );
$color_header_main_acc = esc_attr( trawell_get_option( 'color_header_main_acc' ) );
$header_height = esc_attr( trawell_get_option( 'header_height' ) );
$cover_height = esc_attr( trawell_get_option( 'cover_height' ) );


/* Sidebar styles */
$color_sidebar_bg = esc_attr( trawell_get_option( 'color_sidebar_bg' ) );
$color_widget_bg = esc_attr( trawell_get_option( 'color_widget_bg' ) );
$color_widget_h = esc_attr( trawell_get_option( 'color_widget_h' ) );
$color_widget_txt = esc_attr( trawell_get_option( 'color_widget_txt' ) );
$color_widget_acc = esc_attr( trawell_get_option( 'color_widget_acc' ) );
$color_highlight_bg = esc_attr( trawell_get_option( 'color_highlight_bg' ) );
$color_highlight_txt = esc_attr( trawell_get_option( 'color_highlight_txt' ) );
$color_highlight_acc = esc_attr( trawell_get_option( 'color_highlight_acc' ) );

/* Footer styles */
$color_footer_bg = esc_attr( trawell_get_option( 'color_footer_bg' ) );
$color_footer_txt = esc_attr( trawell_get_option( 'color_footer_txt' ) );
$color_footer_acc = esc_attr( trawell_get_option( 'color_footer_acc' ) );

?>


/* Grid Width */

.row{
  margin-right: -7px;
  margin-left: -7px; 
}

/* Gutter */
.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
.col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
.col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
.col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
.col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
.col-xl-auto,.trawell-pre-footer .menu{
  padding-right: 7px;
  padding-left: 7px; 
}

@media (min-width: 440px) {
  .container,
  .trawell-has-sidebar .trawell-main,
  .trawell-sidebar-none .trawell-main{
    max-width: 470px;
    padding-right: 20px;
    padding-left: 20px;
  }
  .row{
    margin-right: -10px;
    margin-left: -10px; 
  }

  .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
  .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
  .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
  .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
  .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
  .col-xl-auto,.trawell-pre-footer .menu{
    padding-right: 10px;
    padding-left: 10px; 
  }

}

@media (min-width: 730px) {
  .container,
  .trawell-has-sidebar .trawell-main,
  .trawell-sidebar-none .trawell-main{
    max-width: 860px;
    padding-right: 30px;
    padding-left: 30px;
  }
  .trawell-pre-footer .menu{
    padding-right: 30px;
    padding-left: 30px;    
  }
  .row{
    margin-right: -15px;
    margin-left: -15px; 
  }
  .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
  .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
  .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
  .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
  .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
  .col-xl-auto,.trawell-pre-footer .menu{
      padding-right: 15px;
      padding-left: 15px;     
  }
}

@media (min-width: 1024px) {
  .container,
  .trawell-has-sidebar .trawell-main,
  .trawell-sidebar-none .trawell-main{
    max-width: 100%;
  }

}

@media (min-width: 1100px) {
  .container,
  .trawell-pre-footer .menu,
  .trawell-has-sidebar .trawell-main,
  .trawell-sidebar-none .trawell-main,
  .page-template-template-blank .trawell-main{
    max-width: 1260px;
  }
  .trawell-pre-footer .menu{
    padding-right: 30px;
    padding-left: 30px;    
  }
}

.trawell-section.trawell-layout-c2 .trawell-item,
.trawell-section.trawell-layout-c3 .trawell-item,
.trawell-section.trawell-layout-c4 .trawell-item,
.trawell-section.trawell-layout-d2 .trawell-item,
.trawell-section.trawell-layout-d3 .trawell-item,
.trawell-section.trawell-layout-d4 .trawell-item,
.trawell-section.trawell-layout-b3 .trawell-item,
.trawell-related.trawell-layout-b1 .trawell-item {
    margin-bottom: 30px;
}

.entry-content p a:not(.trawell-button),
.entry-content li a,
.comment-content a,
.widget_text p a{
  color: <?php echo trawell_hex_to_rgba($color_content_acc, 0.7); ?>;
  -webkit-box-shadow:0 1px 0px <?php echo trawell_hex_to_rgba($color_content_acc, 0.7); ?>;
  box-shadow: 0 1px 0 <?php echo trawell_hex_to_rgba($color_content_acc, 0.7); ?>;
  -webkit-transition: all .15s ease-in-out;
     -moz-transition: all .15s ease-in-out;
      -ms-transition: all .15s ease-in-out;
       -o-transition: all .15s ease-in-out;
          transition: all .15s ease-in-out;
}
.entry-content p a:not(.mks_ico):not(.mks_button):not(.trawell-button):hover,
.entry-content li a:hover,
.comment-content a:hover,
.widget_text p a:hover{
  background: <?php echo trawell_hex_to_rgba($color_content_acc, 0.1); ?>;
  box-shadow: 0 1px 0 <?php echo trawell_hex_to_rgba($color_content_acc, 0.7); ?>;
}


/* Top bar */
.trawell-top-bar .container{
    height: <?php echo absint($header_top_height); ?>px;
}
.trawell-top-bar,
.trawell-top-bar .sub-menu{
  background: <?php echo esc_attr($color_header_top_bg); ?>;
  color: <?php echo esc_attr($color_header_top_txt); ?>;
}
.trawell-top-bar a{
  color: <?php echo esc_attr($color_header_top_txt); ?>;
}
.trawell-top-bar a:hover{
  color: <?php echo esc_attr($color_header_top_acc); ?>;  
}


/* Menu main */
.trawell-header,
.trawell-header .sub-menu{
  background: <?php echo esc_attr($color_header_main_bg); ?>;    
}
.trawell-header,
.trawell-header a,
.trawell-action-close span,
.trawell-top-bar{
  font-family: <?php echo wp_kses_post($nav_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($nav_font['font-weight']); ?>;
  <?php if ( isset( $nav_font['font-style'] ) && !empty( $nav_font['font-style'] ) ):?>
    font-style: <?php echo esc_attr($nav_font['font-style']); ?>;
  <?php endif; ?>
}
.trawell-header,
.trawell-header a,
.trawell-action-close span{
  color: <?php echo esc_attr($color_header_main_txt); ?>;   
}
.menu-main{
  font-size: <?php echo esc_attr($font_size_nav); ?>rem;  
}

.menu-main .current-menu-item > a,
.menu-main .current-menu-ancestor > a,
.trawell-header li:hover > a,
.trawell-header-indent #trawell-header ul > li:hover > a,
.trawell-header-indent #trawell-header .trawell-actions .trawell-soc-menu > li:hover > a,
.active .o-exit-1,
.trawell-actions > li:hover > a, 
.trawell-actions > li:hover > span,
.trawell-header-indent #trawell-header .trawell-actions>li>span:hover,
.trawell-header a:hover{
  color: <?php echo esc_attr($color_header_main_acc); ?>;     
}
.trawell-header .container{
  height: <?php echo esc_attr($header_height); ?>px;  
}
.trawell-header-indent .trawell-cover{
  margin-top: -<?php echo esc_attr($header_height); ?>px; 
}
.trawell-actions button{
  background: <?php echo esc_attr($color_header_main_acc); ?>; 
}
.trawell-actions button:hover{
  background: <?php echo trawell_hex_to_hsla($color_header_main_acc, -15); ?>;
}

/* Cover */
.trawell-cover,
.trawell-cover-item{
  height: 400px;
}
@media (min-width: 730px) {
.trawell-cover,
.trawell-cover-item{
  height: 500px;
}  
}
@media (min-width: 1024px) {
 .trawell-cover,
 .trawell-cover-item{
  height: <?php echo esc_attr($cover_height - $header_height); ?>px;  
}

.trawell-header-indent .trawell-cover,
.trawell-header-indent .trawell-cover-item{
  height: <?php echo esc_attr($cover_height); ?>px;  
}



}




/* Typography  */
body,
.type--body-font,
.widget_categories .count,
.tagcloud a,
.trawell-button,
input[type="submit"],
.trawell-pagination a,
.mks_read_more a,
button,
.trawell-button-hollow,
.comment-reply-link,
.page-numbers.current,
.entry-content .trawell-paginated > span,
.widget .mks_autor_link_wrap a,
.entry-category{  
  font-family: <?php echo wp_kses_post($main_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($main_font['font-weight']); ?>;
  <?php if ( isset( $main_font['font-style'] ) && !empty( $main_font['font-style'] ) ):?>
    font-style: <?php echo esc_attr($main_font['font-style']); ?>;
  <?php endif; ?>

}

body{
  color: <?php echo esc_attr($color_content_txt); ?>;
  font-size: <?php echo esc_attr($font_size_p); ?>rem;
}

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6,
.entry-meta-author,
.comment-author.vcard,
.widget li a,
.prev-next-nav a,
blockquote, blockquote p,
.trawell-header .site-title a{
  font-family: <?php echo wp_kses_post($h_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($h_font['font-weight']); ?>;
  <?php if ( isset( $h_font['font-style'] ) && !empty( $h_font['font-style'] ) ):?>
  font-style: <?php echo esc_attr($h_font['font-style']); ?>;
  <?php endif; ?>
}
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6,
.entry-meta-author,
.comment-author.vcard{
  color:  <?php echo esc_attr($color_content_h); ?>;  
}

.entry-meta-author,
.comment-author.vcard{
  color: <?php echo esc_attr($color_content_txt); ?>;
}
a,
blockquote, blockquote p{
   color: <?php echo esc_attr($color_content_acc); ?>;
}

h1, .h1 {
  font-size: <?php echo esc_attr($font_size_h1); ?>rem;
}

h2, .h2 {
  font-size: <?php echo esc_attr($font_size_h2); ?>rem;
}

h3, .h3 {
  font-size:<?php echo esc_attr($font_size_h3); ?>rem;
}

h4, .h4,
.mks_author_widget h3 {
  font-size: <?php echo esc_attr($font_size_h4); ?>rem;
}

h5, .h5,
.comment-author.vcard {
  font-size: <?php echo esc_attr($font_size_h5); ?>rem;
}

h6, .h6 {
  font-size: <?php echo esc_attr($font_size_h6); ?>rem;
}
blockquote{
  font-size: <?php echo esc_attr($font_size_p+0.2); ?>rem; 
}
.section-title{
  font-size: <?php echo esc_attr($font_size_section_title); ?>rem;  
}

.trawell-item .entry-meta a,
.trawell-item .entry-meta,
.trawell-post-single .entry-meta,
.comment-metadata a,
.widget .post-date,
.widget .recentcomments,
.widget .rss-date,
.comment-metadata,
.comment-metadata a,
.mks-map-entry-meta a{
  color: <?php echo trawell_hex_to_rgba($color_content_meta, 1)?>;
}

.trawell-item .entry-meta span:before,
.trawell-post-single .entry-meta span:before{
  background: <?php echo trawell_hex_to_rgba($color_content_meta, 0.25)?>;
}

.excerpt-small,
.comment-content,
.widget a,
.widget{
  font-size: <?php echo esc_attr($font_size_small); ?>rem;
  line-height: 1.5;
}

.widget-title{
  font-size: <?php echo esc_attr($font_size_widget_title); ?>rem;  
}

.widget a,
.trawell-breadcrumbs a:hover,
.color-text a + a:before{
  color: <?php echo esc_attr($color_content_txt); ?>;
}

.display-1,
.trawell-cover .archive-title{
  font-size: <?php echo esc_attr($font_size_cover); ?>rem;
}
.display-2{
  color: <?php echo esc_attr($color_content_acc); ?>;
}
.trawell-msg{
  background: <?php echo esc_attr($color_content_acc); ?>;  
}
.trawell-msg a{
  color: <?php echo trawell_hex_to_hsla($color_content_acc, 50)?>;
}
.trawell-msg a:hover{
  color: <?php echo trawell_hex_to_hsla($color_content_acc, 85)?>;  
}

.entry-meta a,
.widget-mini a,
.comment-respond .section-title+small a,
.entry-title a,
.fn a,
.color-text span{
  color: <?php echo esc_attr($color_content_txt); ?>;
}
.widget-mini a:hover,
.entry-meta a:hover,
.trawell-sidebar a:hover,
.trawell-item .entry-title a:hover,
.mks-map-entry-header .entry-title a:hover,
.fn a:hover,
blockquote,
.trawell-main .entry-tags a,
.tagcloud a,
.comment-respond .section-title+small a:hover,
.mks-map-entry-meta a:hover,
.color-text a{
  color: <?php echo esc_attr($color_content_acc); ?>;
}
.color-text a:hover{
  color: <?php echo trawell_hex_to_hsla($color_content_acc, -15); ?>;  
}
body,
.section-title span,
.comment-respond .section-title+small{
  background: <?php echo esc_attr($color_body_bg); ?>; 
}

.section-title:after,
.widget-mini:after,
.trawell-responsive-item:before{
  background: <?php echo trawell_hex_to_rgba($color_content_txt, 0.1)?>;
}

blockquote:after,
.double-bounce1, .double-bounce2{
  background: <?php echo trawell_hex_to_rgba($color_content_acc, 0.6)?>;
}

.trawell-sidebar {
  background: <?php echo esc_attr($color_sidebar_bg); ?>;
  -webkit-box-shadow:
    <?php for($i = 330;  $i < 3480; $i += 350){
        echo esc_attr($i . "px 0 0 " . $color_sidebar_bg);
        echo ($i + 350 < 3480) ? ',' : '';
    } ?>;
    box-shadow:
    <?php for($i = 330;  $i < 3480; $i += 350){
        echo esc_attr($i . "px 0 0 " . $color_sidebar_bg);
        echo ($i + 350 < 3480) ? ',' : '';
    } ?>;
}
.trawell-sidebar-left .trawell-sidebar {
  -webkit-box-shadow:
    <?php for($i = -330;  $i > -3480; $i -= 350){
        echo esc_attr($i . "px 0 0 " . $color_sidebar_bg);
	    echo ($i - 350 > -3480) ? ',' : '';
    } ?>;
  box-shadow:
    <?php for($i = -330;  $i > -3480; $i -= 350){
        echo esc_attr($i . "px 0 0 " . $color_sidebar_bg);
        echo ($i - 350 > -3480) ? ',' : '';
    } ?>;
}
.trawell-sidebar{
  background: <?php echo esc_attr($color_sidebar_bg); ?>;  
}

.trawell-sidebar .widget{
  background: <?php echo esc_attr($color_widget_bg); ?>;
}

.trawell-sidebar .widget,
.trawell-sidebar .widget a{
  color: <?php echo esc_attr($color_widget_txt); ?>;
}

.trawell-sidebar .widget .widget-title{
  color: <?php echo esc_attr($color_widget_h); ?>;
}

.trawell-sidebar .widget a:hover{
  color: <?php echo esc_attr($color_widget_acc); ?>;  
}
.trawell-action-close span,
.trawell-action-close i{
  color: <?php echo esc_attr($color_widget_h); ?>; 
}

.trawell-sidebar .widget_text p a{
  -webkit-box-shadow:0 1px 0 <?php echo trawell_hex_to_rgba($color_highlight_txt, 0.7)?>;
  box-shadow: 0 1px 0 <?php echo trawell_hex_to_rgba($color_highlight_txt, 0.7)?>;
}
.trawell-sidebar .widget_text p a:hover{
  background: <?php echo trawell_hex_to_rgba($color_highlight_acc, 0.1)?>;
  box-shadow: 0 1px 0 <?php echo trawell_hex_to_rgba($color_highlight_acc, 0.7)?>;
}
.widget.trawell-highlight .trawell-button{
  background: <?php echo esc_attr($color_widget_acc); ?>;
}
.widget .trawell-button:hover{
  background: <?php echo trawell_hex_to_hsla($color_widget_acc, -15); ?>;
}

.trawell-sidebar .widget.trawell-highlight{
  background: <?php echo esc_attr($color_highlight_bg); ?>;
}

.widget.trawell-highlight,
.widget.trawell-highlight a,
.widget.trawell-highlight .widget-title{
  color: <?php echo esc_attr($color_highlight_txt); ?>;
}
.widget.trawell-highlight a:hover{
  color: <?php echo esc_attr($color_highlight_acc); ?>;  
}

.widget_text.trawell-highlight p a{
  -webkit-box-shadow:0 1px 0 <?php echo trawell_hex_to_rgba($color_highlight_txt, 0.7)?>;
  box-shadow: 0 1px 0 <?php echo trawell_hex_to_rgba($color_highlight_txt, 0.7)?>;
}
.widget_text.trawell-highlight p a:hover{
  background: <?php echo trawell_hex_to_rgba($color_highlight_acc, 0.1)?>;
  box-shadow: 0 1px 0 <?php echo trawell_hex_to_rgba($color_highlight_acc, 0.7)?>;
}
.widget.trawell-highlight .trawell-button{
  background: <?php echo trawell_hex_to_hsla($color_highlight_bg, -15); ?>;
}
.widget.trawell-highlight .trawell-button:hover{
  background: <?php echo trawell_hex_to_hsla($color_highlight_bg, -20); ?>;
}
.widget.trawell-highlight input[type=text]{
  border:none;
}
.widget.trawell-highlight.widget_tag_cloud a{
  border-color: <?php echo trawell_hex_to_rgba($color_highlight_txt, 0.5)?>;
}

.widget.trawell-highlight .post-date,
.widget.trawell-highlight .recentcomments,
.widget.trawell-highlight .rss-date,
.widget.trawell-highlight .comment-metadata,
.widget.trawell-highlight .comment-metadata a,
.widget.trawell-highlight .trawell-item .entry-meta,
.widget.trawell-highlight .trawell-item .entry-meta a{
  color:<?php echo trawell_hex_to_rgba($color_highlight_txt, 0.7)?>;
}
.widget.trawell-highlight .trawell-item .entry-meta a:hover{
  color:<?php echo trawell_hex_to_rgba($color_highlight_txt, 1)?>;  
}
.widget.trawell-highlight .trawell-item .entry-meta span+span:before{
  background:<?php echo trawell_hex_to_rgba($color_highlight_txt, 0.25)?>; 
}
input[type=number], 
input[type=text], 
input[type=email], 
input[type=url], 
input[type=tel], 
input[type=password], 
input[type=date], 
input[type=search], 
select, 
textarea{
  border-color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.1)?>;
  color: <?php echo esc_attr($color_content_txt); ?>;  
}
select{
  background: <?php echo esc_attr($color_body_bg); ?>;   
}
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.8); ?>;
}
::-moz-placeholder { 
  color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.8); ?>;
}
:-ms-input-placeholder { 
  color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.8); ?>;
}
:-moz-placeholder { 
  color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.8); ?>;
}
/* Footer  */
.trawell-pre-footer{
  background: <?php echo trawell_hex_to_hsla($color_footer_bg, 9); ?>;
  color: <?php echo esc_attr($color_footer_txt); ?>; 
}
.trawell-pre-footer .widget_meks_instagram{
  border-top:10px solid <?php echo trawell_hex_to_hsla($color_footer_bg, 9); ?>;
}
.trawell-footer{
  background: <?php echo esc_attr($color_footer_bg); ?>; 
  color: <?php echo esc_attr($color_footer_txt); ?>;
}
.trawell-footer .widget-title{
  color: <?php echo esc_attr($color_footer_txt); ?>;  
}
.trawell-footer .widget a,
.trawell-pre-footer a{
   color: <?php echo esc_attr($color_footer_txt); ?>;
}
.trawell-footer .widget a:hover{
   color: <?php echo esc_attr($color_footer_acc); ?>; 
}

.trawell-footer .trawell-button,
.trawell-footer [type=submit],
.trawell-footer button{
  background: <?php echo $color_footer_acc; ?>;  
  color: <?php echo esc_attr($color_footer_bg); ?>;
}
.trawell-footer .trawell-button:hover,
.trawell-footer [type=submit]:hover,
.trawell-footer button:hover{
  background: <?php echo trawell_hex_to_hsla($color_footer_acc, -15); ?>;  
  color: <?php echo esc_attr($color_footer_bg); ?>;
}

.trawell-footer .widget.widget_tag_cloud a{
  border-color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.3)?>;
}

.trawell-footer .comment-metadata a, 
.trawell-footer .widget .post-date, 
.trawell-footer .widget .recentcomments, 
.trawell-footer .widget .rss-date, 
.trawell-footer .comment-metadata, 
.trawell-footer .comment-metadata a{
  color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.7)?>;
}

.trawell-footer input[type=number], 
.trawell-footer input[type=text], 
.trawell-footer input[type=email], 
.trawell-footer input[type=url], 
.trawell-footer input[type=tel], 
.trawell-footer input[type=password], 
.trawell-footer input[type=date], 
.trawell-footer input[type=search], 
.trawell-footer select, 
.trawell-footer textarea{
  border-color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.1)?>;
  color: <?php echo esc_attr($color_footer_txt); ?>;  
}
.trawell-footer ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.8); ?>;
}
.trawell-footer ::-moz-placeholder { 
  color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.8); ?>;
}
.trawell-footer :-ms-input-placeholder { 
  color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.8); ?>;
}
.trawell-footer :-moz-placeholder { 
  color: <?php echo trawell_hex_to_rgba($color_footer_txt, 0.8); ?>;
}

.entry-category span{
  background: <?php echo esc_attr($color_content_txt); ?>;
}
.entry-category span{
  color: <?php echo esc_attr($color_body_bg); ?>;  
}
.bypostauthor .fn:after{
  color: <?php echo esc_attr($color_content_txt); ?>;  
}

.trawell-share a,
.entry-tags a, 
.trawell-entry .entry-content .entry-tags a{
  border-color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;
}
.comment-respond .section-title small a:before{
  background: <?php echo trawell_hex_to_rgba($color_content_txt, 0.3); ?>;  
}

/* Category Colors */
.cat-1,
.entry-category a,
.widget_categories .count,
.trawell-category-placeholder,
.trawell-cover-color,
.trawell-item.cat-item:after{
    background-color: <?php echo esc_attr($color_content_acc); ?>;
}


/* Hovers */
.entry-category a:hover{
  background: <?php echo trawell_hex_to_hsla($color_content_acc, -15); ?>;
}
.trawell-button:hover, 
input[type="submit"]:hover,
.trawell-pagination a:hover,
.mks_read_more a:hover,
.trawell-sidebar .mks_read_more a:hover{
  background: <?php echo trawell_hex_to_hsla($color_content_acc, -15); ?>;
  color: <?php echo esc_attr($color_body_bg); ?>;
}
.trawell-button-hollow:hover,
.trawell-main .entry-tags a:hover,
.tagcloud a:hover,
.trawell-entry .entry-content .entry-tags a:hover,
.reply a:hover,
.entry-content .trawell-paginated a:not(.trawell-button):hover,
.entry-content .trawell-paginated > span,
.widget .mks_autor_link_wrap a:hover{
  background: transparent;
  border-color: <?php echo esc_attr($color_content_acc); ?>;
  color: <?php echo esc_attr($color_content_acc); ?>;
}
.trawell-cover .trawell-button-hollow:hover{
  border-color: transparent;
  box-shadow: inset 0 0 0px 1px #FFF;
}

/* Buttons */
.trawell-button,
input[type="submit"],
.trawell-pagination a,
.mks_read_more a,
.trawell-sidebar .mks_read_more a,
button{
  background: <?php echo esc_attr($color_content_acc); ?>;
  color: <?php echo esc_attr($color_body_bg); ?>;
}
.trawell-button-hollow,
.comment-reply-link,
.page-numbers.current,
.entry-content .trawell-paginated > span,
.widget .mks_autor_link_wrap a{
  color: <?php echo esc_attr($color_content_acc); ?>;
}
.trawell-button-hollow,
.comment-reply-link,
.page-numbers.current,
.widget .mks_autor_link_wrap a{
    border:1px solid <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;
    background: transparent;
}
.trawell-cover .trawell-button{
  color: #FFF;
}
.trawell-cover .trawell-button-hollow{
  background: transparent;
  box-shadow: inset 0 0 0px 1px rgba(255,255,255,0.5);
}


.no-left-padding {
  padding-left: 0;
}
.color-text a,
.color-text a:hover{
  background:transparent;
}
.mks_tab_nav_item.active{
  border-bottom:1px solid <?php echo esc_attr($color_body_bg); ?>;
}
.mks_tabs.vertical .mks_tab_nav_item.active{
  border-right:1px solid <?php echo esc_attr($color_body_bg); ?>;
}



/* Woocommerce styles */
<?php if ( trawell_is_woocommerce_active() ): ?>

.pulse {
    -webkit-box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo esc_attr($color_header_main_acc); ?>;
    box-shadow: 0 0 0 0 #f0f0f0, 0 0 0 0 <?php echo esc_attr($color_header_main_acc); ?>;
}
.trawell-cart-count {
    background-color: <?php echo esc_attr($color_header_main_acc); ?>;
    color: <?php echo esc_attr($color_header_main_bg); ?>;
}

.woocommerce ul.products li.product .button, 
.woocommerce ul.products li.product .added_to_cart{
  background: <?php echo esc_attr($color_content_acc); ?>;
  color: <?php echo esc_attr($color_body_bg); ?>;
}
.woocommerce ul.products li.product .button:hover{
  background: <?php echo trawell_hex_to_hsla($color_content_acc, -15); ?>;
}
.woocommerce ul.products .woocommerce-loop-product__link{
  color: <?php echo esc_attr($color_content_txt); ?>;
}
.woocommerce ul.products .woocommerce-loop-product__link:hover{
  color: <?php echo esc_attr($color_content_acc); ?>;  
}
.woocommerce ul.products li.product .woocommerce-loop-category__title, 
.woocommerce ul.products li.product .woocommerce-loop-product__title,
.woocommerce ul.products li.product h3{
  font-size: <?php echo esc_attr($font_size_h6); ?>rem;
}
.woocommerce div.product form.cart .button,
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
  background: <?php echo esc_attr($color_content_acc); ?>;
  color:<?php echo esc_attr($color_body_bg); ?>;
  font-family: <?php echo wp_kses_post($main_font['font-family']); ?>;
  font-weight: <?php echo esc_attr($main_font['font-weight']); ?>;
  <?php if ( isset( $main_font['font-style'] ) && !empty( $main_font['font-style'] ) ):?>
    font-style: <?php echo esc_attr($main_font['font-style']); ?>;
  <?php endif; ?> 
}
.woocommerce .button.wc-backward{
  box-shadow:none;
  background: <?php echo trawell_hex_to_hsla($color_content_acc, -15); ?>;
  color: <?php echo esc_attr($color_body_bg); ?>;  
}

.woocommerce div.product form.cart .button:hover,
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,
.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
body .woocommerce a.button.wc-backward:not(.trawell-button):hover{
  background: <?php echo trawell_hex_to_hsla($color_content_acc, -15); ?>;
  color: <?php echo esc_attr($color_body_bg); ?>; 
  box-shadow:none; 
}
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button, 
.woocommerce ul.products li.product .added_to_cart{
  color: <?php echo esc_attr($color_body_bg); ?>;  
}
.woocommerce .woocommerce-breadcrumb a:hover{
  color: <?php echo esc_attr($color_content_acc); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
    border-bottom: 3px solid <?php echo esc_attr($color_content_acc); ?>;
}
.woocommerce .woocommerce-breadcrumb,
.woocommerce .woocommerce-breadcrumb a{
  color: <?php echo esc_attr($color_content_txt); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
  border-bottom: 3px solid <?php echo esc_attr($color_content_acc); ?>;
}

body.woocommerce .trawell-entry ul.products li.product, body.woocommerce-page ul.products li.product{
  box-shadow:inset 0px 0px 0px 1px <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;
}
body.woocommerce .woocommerce-breadcrumb,
.woocommerce table.shop_table tr.order-total th {
  border-bottom:1px solid <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;
}

body .woocommerce .woocommerce-error,
body .woocommerce .woocommerce-info, 
body .woocommerce .woocommerce-message{
   background-color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;
   color: <?php echo esc_attr($color_content_txt); ?>;
}
body .woocommerce-checkout #payment ul.payment_methods, 
body .woocommerce table.shop_table,
body .woocommerce table.shop_table td, 
body .woocommerce-cart .cart-collaterals .cart_totals tr td, 
body .woocommerce-cart .cart-collaterals .cart_totals tr th, 
body .woocommerce table.shop_table tbody th, 
body .woocommerce table.shop_table tfoot td, 
body .woocommerce table.shop_table tfoot th, 
body .woocommerce .order_details, 
body .woocommerce .cart-collaterals 
body .cross-sells, .woocommerce-page .cart-collaterals .cross-sells, 
body .woocommerce .cart-collaterals .cart_totals, 
body .woocommerce-page .cart-collaterals .cart_totals, 
body .woocommerce .cart-collaterals h2, 
body .woocommerce .cart-collaterals h2, 
body .woocommerce ul.order_details, 
body .woocommerce .shop_table.order_details tfoot th, 
body .woocommerce .shop_table.customer_details th, 
body .woocommerce-checkout #payment ul.payment_methods, 
body .woocommerce .col2-set.addresses .col-1, 
body .woocommerce .col2-set.addresses .col-2, 
body .select2-container .select2-choice,
body.woocommerce-cart table.cart td.actions .coupon .input-text,
body .woocommerce table.shop_table tbody:first-child tr:first-child th, 
body .woocommerce table.shop_table tbody:first-child tr:first-child td,
body .select2-container--default .select2-selection--single, 
body .select2-dropdown,
body .woocommerce ul.products,
body .woocommerce-pagination,
body .woocommerce nav.woocommerce-pagination ul li a, 
body .woocommerce nav.woocommerce-pagination ul li span,
body .product_meta,
body .woocommerce nav.woocommerce-pagination ul li a, 
body .woocommerce nav.woocommerce-pagination ul li span{
   border-color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;
}
body .select2-dropdown{
  background: <?php echo esc_attr($color_body_bg); ?>;
}
.select2-container--default .select2-results__option[aria-selected=true], 
.select2-container--default .select2-results__option[data-selected=true]{
  background-color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.3); ?>; 
}
body.woocommerce div.product .woocommerce-tabs ul.tabs li a,
body.woocommerce-cart .cart-collaterals .cart_totals table th{
  color: <?php echo esc_attr($color_content_txt); ?>; 
}
body.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover{
  color: <?php echo esc_attr($color_content_acc); ?>; 
}
.woocommerce nav.woocommerce-pagination ul li a,
.woocommerce nav.woocommerce-pagination ul li span{
  border-color: <?php echo trawell_hex_to_rgba($color_content_txt, 0.1); ?>;   
}
.woocommerce nav.woocommerce-pagination ul li a:hover{
  border-color: <?php echo trawell_hex_to_rgba($color_content_acc, 1); ?>;  
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
  background: <?php echo esc_attr($color_content_acc); ?>;
}
}
<?php endif; ?>

<?php

/* Apply uppercase options */

$uppercase = trawell_get_option( 'uppercase');



if ( !empty( $uppercase ) ) {
  foreach ( $uppercase as $el_class => $active ) {
      echo $active ? wp_kses_post($el_class).'{text-transform: uppercase;}' : wp_kses_post($el_class).'{text-transform: none;}';
  }
}

?>

<?php 
/* Category colors */

$category_colors = get_option('trawell_cat_colors');

if(!empty( $category_colors )){
  foreach( $category_colors as $cat_id => $color){
    echo '.entry-category a.cat-'.$cat_id.'{background-color:'.$color.';}';
    echo '.entry-category a.cat-'.$cat_id.':hover{background-color:'.trawell_hex_to_hsla($color, -15).';}';
    echo '.trawell-item.cat-item-'.$cat_id.':after{ background: '.$color.';}';
    echo 'body.category-'.$cat_id.' .trawell-cover{ border-bottom: 8px solid '.$color.';}';
    echo '.trawell-category-placeholder.cat-'.$cat_id.'{ background: '.$color.';}';
    echo '.widget_categories .cat-item-'.$cat_id.' .count{ background: '.$color.';}';
    echo '.widget_categories .cat-item-'.$cat_id.' a:hover{ color: '.$color.';}';   
    echo '.color-text a.cat-'.$cat_id.'{ background:transparent; color: '.$color.';}';
    echo '.color-text a.cat-'.$cat_id.':hover{ background:transparent; color: '.trawell_hex_to_hsla($color, -15).';}';
    echo '.mks-map-entry-category a.cat-'.$cat_id.'{ background:transparent; color: '.$color.';}';
    echo '.mks-map-entry-category a.cat-'.$cat_id.':hover{ background:transparent; color: '.trawell_hex_to_hsla($color, -15).';}';
  }
}

/* Additional CSS (if user adds his custom css inside theme options) */
$additional_css = trim( preg_replace( '/\s+/', ' ', trawell_get_option( 'additional_css' ) ) );
if ( !empty( $additional_css ) ) {
  echo $additional_css;
}

?>