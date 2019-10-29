<?php

$category = array_reduce( Su_Tools::get_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

$k2_category = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
    $id[$category->id] = $category->title; return $id; }, [ ] );

  return [
    "name"     => "Photo Gallery",
    "slug"     => "bdt_photo_gallery",
    "groups"   => ["Shortcode Ultimate", "content"],
    "form"     => [
      "general"  => [
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
          "name"     => "limit",
          "help"     => "Maximum number of item that you want to display",
          "type"     => "slider",
          "min"      => "1",
          "max"      => "100",
          "value"    => "20",
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
      
      "styles"   => [
        [
          "name"     => "style",
          "type"     => "select",
          "options"  => [
            "1"        => "Style 1",
            "2"        => "Style 2",
            "3"        => "Style 3",
            "4"        => "Style 4",
          ],
          "value"    => "1",
        ],
        [
          "name"     => "width",
          "label"    => "Gallery Width",
          "type"     => "slider",
          "min"      => "10",
          "max"      => "1600",
          "step"     => "10",
          "value"    => "250",
        ],
        [
          "name"     => "height",
          "label"    => "Gallery Height",
          "type"     => "slider",
          "min"      => "10",
          "max"      => "1600",
          "step"     => "10",
          "value"    => "160",
        ],
        [
          "name"     => "thumb_resize",
          "help"     => "If you select yes then the image will be croped.",
          "label"    => "Thumb Resize",
          "type"     => "switch",
        ],
        [
          "name"     => "horizontal_gap",
          "label"    => "Horizontal Gap",
          "type"     => "slider",
          "max"      => "50",
          "value"    => "10",
        ],
        [
          "name"     => "vertical_gap",
          "label"    => "Vertical Gap",
          "type"     => "slider",
          "max"      => "50",
          "value"    => "10",
        ],
      ],

      "responsive" => [
        [
          "name"     => "large",
          "help"     => "Which item you need to show your large device on responsive mode.",
          "label"    => "Large Device Item",
          "type"     => "slider",
          "min"      => "1",
          "max"      => "10",
          "value"    => "4",
        ],
        [
          "name"     => "medium",
          "help"     => "Which item you need to show your medium device on responsive mode.",
          "label"    => "Medium Device Item",
          "type"     => "slider",
          "min"      => "1",
          "max"      => "5",
          "value"    => "3",
        ],
        [
          "name"     => "small",
          "help"     => "Which item you need to show your small device on responsive mode.",
          "label"    => "Small Device Item",
          "type"     => "slider",
          "min"      => "1",
          "max"      => "5",
          "value"    => "1",
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