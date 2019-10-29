<?php

$category = array_reduce( Su_Tools::get_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

$k2_category = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

  return [
    "slug"   => "bdt_timeline",
    "name"   => "Timeline",
    "groups" => ["Shortcode Ultimate", "content"],
    "form"   => [
      "general" => [
        [ 
          "name"        => "source_type",
          "type"        => "select",
          "label"       => "Source Type",
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
          "label" => "Item Limit",
          "type"  => "slider",
          "min"   => "-1",
          "max"   => "100",
          "value" => "20",
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
          "name"    => "order_by",
          "label"   => "Order Type",
          "type"    => "select",
          "options" => [
            "asc"     => "Ascending",
            "desc"    => "Decending",
          ],
          "value"   => "desc",
        ],
        [
          "name"  => "image",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "highlight_year",
          "label" => "Highlight Year",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "read_more",
          "label" => "Read More",
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
          "name"  => "date",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "time",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "title",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "link_title",
          "label"  => "Link Title",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name"  => "before_text",
          "label"  => "Before Text",
        ],
        [
          "name"  => "after_text",
          "label"  => "After Text",
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