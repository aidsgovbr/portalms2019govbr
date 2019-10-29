<?php

$category = array_reduce( Su_Tools::get_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

$k2_category = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

  return [
    "name"   => "Device Slider",
    "slug"   => "bdt_device_slider",
    "groups" => ["Shortcode Ultimate", "content"],
    "form"   => [
      "general" => [
        [ 
          "name"        => "source_type",
          "type"        => "select",
          "label"       => "Source Type",
          "options"     => [
            "media"       => "Media Library",
            "directory"   => "Directory Path",
            "category"    => "Joomla Category",
            "k2-category" => "K2 Category",
          ],
        ],
        [ 
          "name"        => "j_category",
          "type"        => "select",
          "label"       => "Select Category",
          "multiple"    => true,
          "depends"     => [
            "source_type" => "category",
          ],
          "options"     => $category,
        ],
        [ 
          "name"        => "k2_category",
          "type"        => "select",
          "label"       => "Select Category",
          "depends"     => [
            "source_type" => "k2-category",
          ],
          "multiple"    => true,
          "options"     => $k2_category,
        ],
        [ 
          "name"        => "dir_path",
          "label"       => "Directory Path",
          "depends"     => [
            "source_type" => "directory",
          ],
          "value"       => "images/gallery",
        ],
        [ 
          "name"        => "med_library",
          "label"       => "Image URL",
          "depends"     => [
            "source_type" => "media",
          ],
          "help"       => "Type image url. Use comma for saperating multiple image",
        ],
        [
          "name"  => "limit",
          "help"  => "Maximum number of item that you want to display",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "20",
          "value" => "5",
        ],
        [
          "name"     => "device",
          "help"     => "Select your device which you want to show as slider",
          "type"     => "select",
          "options"  => [
            "imac"     => "Mac Desktop",
            "macbook"  => "MacBook",
            "ipad"     => "IPad",
            "iphone"   => "IPhone",
            "galaxys6" => "Galaxy S6",
          ],
          "value"    => "imac",
        ],
        [
          "name" => "lightbox",
          "type" => "switch",
        ],
        [
          "name" => "arrows",
          "label" => "Arrow",
          "type" => "switch",
        ],
        [
          "name" => "pagination",
          "type" => "switch",
        ],
        [
          "name"  => "autoplay",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "autoheight",
          "label" => "Auto Height",
          "type"  => "switch",
        ],
        [
          "name"  => "hoverpause",
          "help"  => "If you select Yes then when you hover on the slide then it will be paused",
          "label" => "Paused on Hover",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "lazyload",
          "help"  => "If you select yes then your images will be load after scrolling.",
          "label" => "Lazy Load",
          "type"  => "switch",
        ],
        [
          "name"  => "loop",
          "help"  => "Setting of Yes will cause the player to play the initial item again and again",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "speed",
          "help"  => "Specify time (in second) that will be taken to complete animation effect",
          "type"  => "slider",
          "min"   => "0.1",
          "max"   => "15",
          "step"  => "0.2",
          "value" => "0.6",
        ],
        [
          "name"  => "delay",
          "help"  => "After mentioned time (in second) animation will start",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "10",
          "value" => "4",
        ],
      ],

      "Animation" => [
        [
          "name"                => "animation",
          "label"               => "Page Loading Animation",
          "type"                => "select",
          "options"             => [
            "fadeInLeft"  => "Left To Right",
            "fadeInRight" => "Right To Left",
            "fadeInUp"    => "Bottom To Top",
            "fadeInDown"  => "Top To Bottom",
            "fadeIn"      => "Fade In",
            "zoomIn"      => "Zoom In",
            0             => "No Animation",
          ],
          "value"               => "fadeIn",
        ],
      ],
    ],
  ];
    
    