<?php
/*
Plugin Name: Word Cound
Plugin URL: http://masummollaalhaz.com/plugins/
Description: Count word from any Wordpress Post
Version: 1.0.0
Author: Md Masum Molla Alhaz
Author URL: https://masum.pepocoder.com
License: GPLv2 or later
Text Domain: word-count
Domain Path: /languages/
*/

/*
function wordcount_activation_hook(){

}
register_activation_hook( __FILE__, "wordcount_activation_hook" );

function wordcount_deactivation_hook(){
    
}
register_deactivation_hook( __FILE__, "wordcount_deactivation_hook" )
*/

function wordcount_load_textdomain(){
    load_plugin_textdomain( 'wordcount_load_textdomain', false, dirname(__FILE__."/languages") );
}
add_action("plugins_loaded", 'wordcount_load_textdomain');


function wordcount_count_words($content){
    $stripped_content = strip_tags($content);
    $wordn = str_word_count($stripped_content);
    $label = __('Total Number of Words', 'word-count');

    $label = apply_filters("wordcount_heading", '$label');
    $tag = apply_filters( 'wordcount_tag', 'h2');
    $content = sprintf('<%s>%s: %s</%s>', $tag,$label,$wordn,$tag);
    return $content;
}
add_filter( 'the_content', 'wordcount_count_words' );

function wordcount_reading_time($content){
    $stripped_content = strip_tags($content);
    $wordn = str_word_count($stripped_content);
    // $wordn = 900;
    $reading_minute = ceil($wordn / 200);
    $reading_seconds = ceil($wordn % 200 / (200 / 60));
    $is_visible = apply_filters( 'wordcount_display_readingtime', 1 );
    if($is_visible){
        $label = __('Total Reading Time', 'word-count');
        $label = apply_filters("wordcount_readingtime_heading", '$label');
        $tag = apply_filters( 'wordcount_readingtime__tag', 'h4');
        $content = sprintf('<%s>%s: %s minutes %s seconds</%s>', $tag,$label,$reading_minute,$reading_seconds,$tag);
    }

    return $content;
}
add_filter( 'the_content', 'wordcount_reading_time' );

/*
// Theme - functions.php
// Header
function twenty_wordcount_heading($heading){
	$heading = "Total words";
	return $heading;
}
add_filter( 'wordcount_heading', 'twenty_wordcount_heading' );

// Tag
function twenty_wordcount_tag($tag){
	return "h5";
}
add_filter( 'wordcount_tag', 'twenty_wordcount_tag');
*/


?>