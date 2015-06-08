<?php
/*
Plugin Name: RobJ Quotes Plugin
Version: 0.1-alpha
Description: A plugin for display RobJ quotes
Author: D
Plugin URI: http://wordpress.org/extend/plugins/hello-robj/
Text Domain: hello-robj
Domain Path: /languages
*/

function hello_robj_quotes() {
    $quotes = array(
        "When you are rich enough, humans are fungible.",
        "I do not stand on the shoulders of others; I have a helicopter.",
        "My helicopters have helicopters.",
        "Peasant!",
        "My maids are 1 percenters."
    );

    return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

function hello_robj() {
    $quote = hello_robj_quotes();
    echo "<blockquote id='robj'>$quote -- RobJ</blockquote>";
}

add_action( 'admin_notices', 'hello_robj' );

function robj_css() {
    echo '
    <style type=\'text/css\'>
    blockquote#robj {
      background: #f9f9f9;
      border-left: 10px solid #ccc;
      margin: 1.5em 10px;
      padding: 0.5em 10px;
      quotes: "\201C""\201D""\2018""\2019";
    }

    blockquote#robj:before {
      color: #ccc;
      content: open-quote;
      font-size: 4em;
      line-height: 0.1em;
      margin-right: 0.25em;
      vertical-align: -0.4em;
    }

    blockquote#robj p {
      display: inline;
    }
    </style>
    ';
}

function hello_robj_helicopter() {
    return '<img src="http://robjanney.com/wp-content/uploads/2015/06/Full-size_replica_of_the_Airwolf.jpg" alt="GET A SCREEN PEASANT"></img>';
}

add_shortcode( 'helicopter', 'hello_robj_helicopter' );

add_action( 'admin_notices', 'robj_css' );
