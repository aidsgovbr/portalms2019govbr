<?php
  return [
    "name" => "Progress Bar",
    "slug" => "bdt_progress_bar",
    "groups" => "Shortcode Ultimate",
    "form" => [
      "general" => [
        [
          "name"  => "percent",
          "label" => "Progress in Percent",
          "type"  => "slider",
          "max"   => "100",
          "value" => "75",
        ],
        [
          "name"  => "show_percent",
          "label" => "Show Percent",
          "type"  => "switch",
          "value" => true,
        ],
        [
          "name" => "text",
        ],
        [
          "name"  => "duration",
          "type"  => "slider",
          "min"   => "0.5",
          "max"   => "10",
          "step"  => "0.5",
          "value" => "1.5",
        ],
        [
          "name"  => "delay",
          "type"  => "slider",
          "min"   => "0.1",
          "max"   => "5",
          "step"  => "0.1",
          "value" => "0.3",
        ],
      ],

      "styles" => [
        [
          "name"    => "style",
          "type"    => "select",
          "options" => [
            "1"       => "Default ",
            "2"       => "Fancy",
            "3"       => "Thin",
            "4"       => "Striped",
            "5"       => "Animation",
          ],
          "value"   => "1",
        ],
        [
          "name"  => "text_color",
          "label" => "Text Color",
          "type"  => "color",
          "value" => "#FFFFFF",
        ],
        [
          "name"  => "bar_color",
          "help"  => "You can set progress bar background color from here",
          "label" => "Bar Color",
          "type"  => "color",
          "value" => "#f0f0f0",
        ],
        [
          "name"  => "fill_color",
          "help"  => "You can set progress bar fill color from here",
          "label" => "Fill Color",
          "type"  => "color",
          "value" => "#4fc1e9",
        ],
        [
          "name"    => "progress_animation",
          "label"    => "Progress Animation",
          "type"    => "select",
          "options" => array_combine(Su_Data::easings(), Su_Data::easings()),
          "value"   => "easeInExpo",
        ],
        [
          "name"  => "margin",
          "help"  => "This value will be apply on progress bar bottom margin.",
          "label" => "Progress Bar Margin",
          "type"  => "slider",
          "value" => "35",
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