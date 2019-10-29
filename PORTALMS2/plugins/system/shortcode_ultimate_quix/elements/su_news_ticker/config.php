<?php
  return [
    "slug"   => "bdt_news_ticker",
    "name"   => "News Ticker",
    "groups" => ["Shortcode Ultimate", "content"],
    "form"   => [
      "general" => [
        [ 
          "name"  => "source",
          "value" => "category: 11",
        ],
        [ 
          "name"  => "limit",
          "type"  => "slider",
          "min"   => "5",
          "max"   => "100",
          "value" => "12",
        ],
        [ 
          "name"  => "show_label",
          "label"  => "Show Label",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "label",
          "value" => "LATEST NEWS",
        ],
        [ 
          "name"  => "navigation",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "intro_text",
          "label" => "Intro Text",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "intro_text_limit",
          "label" => "Text Limit",
          "help"  => "you can set limit of intro text as number of character. If you leave empty then show full intro text.",
          "value" => "60",
        ],
        [ 
          "name"     => "order",
          "type"     => "select",
          "options"  => [
            "created"  => "Created Date",
            "title"    => "Title",
            "hits"     => "Hits",
            "ordering" => "Ordering",
          ],
          "value"    => "created",
        ],
        [ 
          "name"     => "order_by",
          "label"    => "Order Type",
          "type"     => "select",
          "options"  => [
            "asc"      => "Ascending",
            "desc"     => "Decending",
          ],
          "value"    => "desc",
        ],
        [ 
          "name"     => "autoplay",
          "type"     => "switch",
          "value"    => true,
        ],
        [ 
          "name"  => "delay",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "10",
          "value" => "4",
        ],
        [ 
          "name"    => "target",
          "type"    => "select",
          "options" => [
            "self"    => "Self",
            "blank"   => "Blank",
          ],
          "value"   => "fade",
        ],
      ],

      "style" => [
        [ 
          "name"    => "transition",
          "type"    => "select",
          "options" => [
            "fade"    => "Fade",
            "slide-h" => "Horizontal Slide",
            "slide-v" => "Vertical Slide",
          ],
          "value"   => "fade",
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