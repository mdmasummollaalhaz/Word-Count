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
    $content = printf('<h2>%s: %s</h2>', $label,$wordn);
    return $content;
}
add_filter( 'the_content', 'wordcount_count_words' );





?>