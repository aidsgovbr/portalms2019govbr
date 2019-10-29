 <?php

  $category = array_reduce( Su_Tools::get_category(), function ( $id, $category ) {
      $id[$category->id] = $category->title; return $id; }, [ ] );

  $k2_category = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
      $id[$category->id] = $category->title; return $id; }, [ ] );


  return [
    "slug"   => "bdt_carousel",
    "name"   => "Carousel",
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
            "directory"   => "Directory Path",
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
          "label"       => "Type Directory Path",
          "depends"     => [
            "source_type" => "directory",
          ],
          "value"       => "images/gallery",
        ],
        [ 
          "name"  => "limit",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "100",
          "value" => "5",
        ],
        [ 
          "name"  => "items",
          "label" => "Item Display",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "10",
          "value" => "5",
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
          "name"  => "image",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "image_height",
          "label" => "Image Height",
          "type"  => "slider",
          "min"   => "10",
          "max"   => "640",
          "value" => "320",
        ],
        [ 
          "name"  => "image_width",
          "label" => "Image Width",
          "type"  => "slider",
          "min"   => "10",
          "max"   => "640",
          "value" => "360",
        ],
        [ 
          "name"  => "thumb_resize",
          "label" => "Thumb Resize",
          "type"  => "switch",
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
          "name"  => "title_limit",
          "label" => "Title Limit",
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
          "value" => "60",
        ],
        [ 
          "name"  => "category",
          "label" => "Joomla Category",
          "type"  => "switch",
        ],
        [ 
          "name"  => "date",
          "type"  => "switch",
        ],
        [ 
          "name"  => "arrows",
          "label" => "Arrow",
          "type"  => "switch",
        ],
        [ 
          "name"  => "pagination",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "autoplay",
          "type"  => "switch",
          "value" => true,
        ],
        [ 
          "name"  => "hoverpause",
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
        ],
        [
          "name"  => "delay",
          "help"  => "After mentioned time (in second) animation will start",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "10",
          "step"  => ".5",
          "value" => "4",
        ],
        [
          "name"  => "speed",
          "help"  => "Specify time (in second) that will be taken to complete animation effect",
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
          "options" => [
            "1"       => "Style 1",
            "2"       => "Style 2",
            "3"       => "Style 3",
            "4"       => "Style 4",
          ], 
          "value"   => "1",
        ],
        [ 
          "name"  => "color",
          "type"  => "color",
          "value" => "#ffffff",
        ],
        [ 
          "name"  => "background",
          "type"  => "color",
          "value" => "#2D89EF",
        ],
        [ 
          "name"  => "title_color",
          "label" => "Title Color",
          "type"  => "color",
          "value" => "#2D89EF",
        ],
        [ 
          "name"  => "margin",
          "type"  => "slider",
          "max"   => "80",
          "value" => "10",
        ],
        [ 
          "name"         => "arrow_position",
          "label"        => "Arrow Position",
          "type"         => "select",
          "options"      => [
            "default"      => "Default",
            "top-left"     => "Top-Left",
            "top-right"    => "Top-Right",
            "bottom-left"  => "Bottom-Left",
            "bottom-right" => "Bottom-Right",
          ], 
          "value"        => "default",
        ],
      ],

      "Responsive" => [
        [ 
          "name"  => "medium",
          "label" => "Medium Device Item",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "5",
          "value" => "3",
        ],
        [ 
          "name"  => "small",
          "label" => "Small Device Item",
          "type"  => "slider",
          "min"   => "1",
          "max"   => "5",
          "value" => "1",
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