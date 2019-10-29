<?php
  return [
    "slug"   => "bdt_flyout",
    "name"   => "Flyout",
    "groups" => ["Shortcode Ultimate", "content"],
    "form"   => [
      "general" => [
        [ 
          "name"    => "dimension",
          "type"    => "select",
          "options" => [
            "234x60"  => "Dimension 234x60",
            "468x60"  => "Dimension 468x60",
            "728x90"  => "Dimension 728x90",
            "120x240" => "Dimension 120x240",
            "120x600" => "Dimension 120x600",
            "160x600" => "Dimension 160x600",
            "300x600" => "Dimension 300x600",
            "88x31"   => "Dimension 88x31",
            "300x250" => "Dimension 300x250",
            "336x280" => "Dimension 336x280",
            "125x125" => "Dimension 125x125",
            "200x200" => "Dimension 200x200",
            "250x250" => "Dimension 250x250",
          ],
          "value"   => "250x250",
        ],
        [ 
          "name"          => "position",
          "type"          => "select",
          "options"       => [
            "top-left"      => "Top-Left",
            "top-middle"    => "Top-Middle",
            "top-right"     => "Top-Right",
            "bottom-left"   => "Bottom-Left",
            "bottom-middle" => "Bottom-Middle",
            "bottom-right"  => "Bottom-Right",
            "center"        => "Center",
          ],
          "value"         => "bottom-right",
        ],
        [ 
          "name"          => "offset",
          "value"         => "0px, 0px",
        ],
        [ 
          "name"  => "show_close",
          "label" => "Show Close Button",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "adblock_notice",
          "label" => "Notice",
          "type"  => "switch",
        ],
        [ 
          "name"  => "content",
          "type"  => "editor",
          "value" => "Flyout content",
        ],
      ],

      "style" => [
        [ 
          "name"        => "style",
          "type"        => "select",
          "options"     => [
            "shadow"      => "shadow",
            "border"      => "border",
            "transparent" => "transparent",
          ],
          "value"       => "shadow",
        ],
        [ 
          "name"    => "transition_in",
          "label"   => "Transition In",
          "type"    => "select",
          "options" => array_combine( Su_Data::animations_in(), Su_Data::animations_in() ),
          "value"   => "fadeIn",
        ],
        [ 
          "name"    => "transition_out",
          "label"   => "Transition Out",
          "type"    => "select",
          "options" => array_combine( Su_Data::animations_out(), Su_Data::animations_out() ),
          "value"   => "fadeOut",
        ],
        [ 
          "name"     => "close_style",
          "label"    => "Close Button Style",
          "type"     => "select",
          "options"  => [
            "circle-1" => "Circle-1",
            "circle-2" => "Circle-2",
            "labeled"  => "Labeled",
            "text"     => "Text",
          ],
          "value"    => "circle-1",
        ],
      ],
    ],
  ];