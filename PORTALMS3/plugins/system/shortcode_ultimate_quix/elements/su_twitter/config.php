<?php

  return [
    "slug"   => "bdt_twitter",
    "name"   => "Twitter",
    "groups" => ["Shortcode Ultimate", "content"],
    "form"   => [
      "general" => [
        [ 
          "name"    => "source",
          "label"   => "Twitter Source",
          "type"    => "select",
          "options" => [
            "user"    => "User",
            "search"  => "Search",
          ],
          "value"   => "user",
        ],
        [ 
          "name"  => "search",
          "label" => "Search Keyword",
        ],
        [ 
          "name"  => "profile_image",
          "label" => "Profile Image",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "date",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "limit",
          "type"  => "slider",
          "min"   => "3",
          "max"   => "15",
          "value" => "5",
        ],
        [ 
          "name"  => "arrows",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "pagination",
          "type"  => "switch",
        ],
        [ 
          "name"  => "autoplay",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "speed",
          "type"  => "slider",
          "min"   => "0.1",
          "max"   => "15",
          "step"  => "0.2",
          "value" => "0.6",
        ],
        [ 
          "name"  => "delay",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "10",
          "step"  => "0.2",
          "value" => "4",
        ],
        [ 
          "name"  => "loop",
          "type"  => "switch",
          "value" => true,
        ],
      ],

      "style" => [
        [ 
          "name"    => "transitionin",
          "type"    => "select",
          "value"   => "fadeIn",
          "options" => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
        ],
        [ 
          "name"    => "transitionout",
          "type"    => "select",
          "value"   => "fadeOut",
          "options" => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
        ],
        [ 
          "name"    => "font_size",
          "label"   => "Font Size",
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