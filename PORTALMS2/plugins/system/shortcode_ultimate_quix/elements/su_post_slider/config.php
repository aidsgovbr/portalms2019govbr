<?php

  $category = array_reduce( Su_Tools::get_category(), function ( $id, $category ) {
  $id[$category->id] = $category->title; return $id; }, [ ] );

  $k2_category = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
  $id[$category->id] = $category->title; return $id; }, [ ] );

  return [
    "slug"   => "bdt_post_slider",
    "name"   => "Post Slider",
    "groups" => ["Shortcode Ultimate", "content"],
    "form"   => [
      "general" => [
        [ 
          "name"        => "source_type",
          "type"        => "select",
          "label"       => "Source Type",
          "value"       => "category",
          "options"     => [
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
          "name"  => "limit",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "100",
          "step"  => "1",
          "value" => "5",
        ],
        [
          "name"    => "order",
          "type"    => "select",
          "value"   => "created",
          "options" => [
            "created"  => "Created Date",
            "title"    => "Title",
            "hits"     => "Hits",
            "ordering" => "Ordering",
          ],
        ],
        [
          "name"    => "order_by",
          "label"   => "Order Type",
          "type"    => "select",
          "value"   => "desc",
          "options" => [
            "asc"  => "Ascending",
            "desc" => "Decending",
          ],
        ],
        [
          "name"  => "title",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "title_link",
          "label" => "Title Link",
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
          "label" => "Intro Text Limit",
          "value" => "200",
        ],
        [
          "name"  => "category",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "date",
          "type"  => "switch",
          "value" => true,
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
        ],
        [
          "name"  => "hoverpause",
          "type"  => "switch",
        ],
        [
          "name"  => "lazyload",
          "type"  => "switch",
        ],
        [
          "name"  => "loop",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "delay",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "10",
          "step"  => "0.5",
          "value" => "4",
        ],
        [ 
          "name"  => "speed",
          "type"  => "slider",
          "min"   => "0.1",
          "max"   => "15",
          "step"  => "0.2",
          "value" => "0.35",
        ],
      ],

      "style" => [
        [ 
            "name"    => "style",
            "type"    => "select",
            "value"   => "light",
            "options" => [
            "light"   => "Light",
            "dark"    => "Dark",
          ],
        ],
      ],

      "Animation" => [
        [
          "name"    => "animation",
          "label"   => "Page Loading Animation",
          "type"    => "select",
          "options" => [
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