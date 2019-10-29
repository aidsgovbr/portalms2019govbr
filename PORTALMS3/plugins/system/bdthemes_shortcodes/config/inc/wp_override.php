<?php

/**
 * BDThemes Shortcode Ultimate 
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

/*
 * get intro image from an article, if indtro image is not exist, return first image from article
 * @params Object article object
 * @return indtro image url
 */
function get_post_thumbnail_id($post){
	$images = $post->images;
	if($images) {
		$images = json_decode($images);
		if($images->image_intro){
			return $images->image_intro;
		};
	}
	return getFirstImageFromHTML($post->introtext);
}
/*
 * get fulltex image from an article, if not exist, return intro image, if both do not exist, return first image from article
 * @params Object article object
 * @return indtro image url
 */
function get_post_image($post, $internal = false) {
	if (isset($post->images)) {
		$images = $post->images;
		if($images) {
			$images = json_decode($images);
			if($images->image_fulltext){
				return $images->image_fulltext;
			}
			elseif($images->image_intro) {
			  return $images->image_intro;
			};
		}
	} elseif($internal) {
		return getFirstImageFromHTML($post->introtext);
	} else {
		return false;
	}
}

function su_all_images($post) {

	$images = array();
	preg_match_all('/(img|src)\=(\"|\')[^\"\'\>]+/i', $post, $media);
	unset($post);
	$post=preg_replace('/(img|src)(\"|\'|\=\"|\=\')(.*)/i',"$3",$media[0]);
	foreach($post as $url)
	{
		$info = pathinfo($url);
		if (isset($info['extension'])) {
			if (($info['extension'] == 'jpg') || ($info['extension'] == 'jpeg') || ($info['extension'] == 'gif') || ($info['extension'] == 'png'))
			array_push($images, $url);
		} else {
			return false;
		}
	}

	return $images;
}



/*
 * get first image from html string and return
 * @params String $html - html string that want to get image
 * @return String $img - first image found
 */
function getFirstImageFromHTML($html){
    $image = NULL;
    $pos = strpos($html, "<img");
    if($pos){
		$img   = substr($html, $pos, 300);
		$img   = explode("src=", $img);
		$img   = str_replace("'",'"',$img[1]);
		$img   = explode('"',$img);
		$image = $img[1];
	}
        return $image;
}

function su_parse_args( $args, $defaults = '' ) {
	if ( is_object( $args ) )
	    $r = get_object_vars( $args );
	elseif ( is_array( $args ) )
	    $r =& $args;

	if ( is_array( $defaults ) )
	    return array_merge( $defaults, $r );
	return $r;
}

function esc_attr($attr){
	return $attr;
}

function su_get_option($arg) {
  return $arg;
}
function stripslashes_deep($value) {
	if ( is_array($value) ) {
		$value = array_map('stripslashes_deep', $value);
	} elseif ( is_object($value) ) {
		$vars = get_object_vars( $value );
		foreach ($vars as $key=>$data) {
			$value->{$key} = stripslashes_deep( $data );
		}
	} elseif ( is_string( $value ) ) {
		$value = stripslashes($value);
	}

	return $value;
}
function sanitize_key( $key ) {
	$raw_key = $key;
	$key     = strtolower( $key );
	$key     = preg_replace( '/[^a-z0-9_\-]/', '', $key );

	return $key;
}
function sanitize_text_field($attr) {
	return $attr;
}

function su_strip_all_tags($string, $remove_breaks = false) {
	$string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
	$string = strip_tags($string);

	if ($remove_breaks)
		$string = preg_replace('/[\r\n\t ]+/', ' ', $string);

	return trim( $string );
}