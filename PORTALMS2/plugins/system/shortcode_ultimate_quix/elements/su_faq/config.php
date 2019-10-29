<?php

  $category = array_reduce( Su_Tools::get_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

  $k2_category = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

  return [
    "name"   => "Faq",
    "slug"   => "bdt_faq",
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
          "type"  => "slider",
          "min"   => "5",
          "max"   => "100",
          "value" => "12",
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
      ],

      "style" => [
        [ 
          "name"         => "loading_animation",
          "label"        => "Loading Animation",
          "type"         => "select",
          "options"      => [
            "default"      => "Default",
            "fadeIn"       => "Fade In",
            "lazyLoading"  => "LazyLoading",
            "fadeInToTop"  => "Fade In To Top",
            "sequentially" => "Sequentially",
            "bottomToTop"  => "Bottom To Top",
          ],
          "value"        => "default",
        ],
        [ 
          "name"         => "filter",
          "type"         => "switch",
          "value"        => true,
        ],
        [ 
          "name"         => "filter_animation",
          "label"        => "Filter Animation",
          "type"         => "select",
          "options"      => [
            "fadeOut"      => "Fade Out",
            "quicksand"    => "Quicksand",
            "boxShadow"    => "Box Shadow",
            "bounceLeft"   => "Bounce Left",
            "bounceTop"    => "Bounce Top",
            "bounceBottom" => "Bounce Bottom",
            "moveLeft"     => "Move Left",
            "slideLeft"    => "Slide Left",
            "fadeOutTop"   => "Fade Out Top",
            "sequentially" => "Sequentially",
            "skew"         => "Skew",
            "slideDelay"   => "Slide Delay",
            "3dflip"       => "3d Flip",
            "rotateSides"  => "Rotate Sides",
            "flipOutDelay" => "Flip Out Delay",
            "flipOut"      => "Flip Out",
            "unfold"       => "Unfold",
            "foldLeft"     => "Fold Left",
            "scaleDown"    => "Scale Down",
            "scaleSides"   => "Scale Sides",
            "frontRow"     => "Front Row",
            "flipBottom"   => "Flip Bottom",
            "rotateRoom"   => "Rotate Room",
          ],
          "value"        => "rotateSides",
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