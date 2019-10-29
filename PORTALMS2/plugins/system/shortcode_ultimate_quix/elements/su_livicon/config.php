<?php

	return [
		"name"   => "Live Icon",
		"slug"   => "bdt_livicon",
		"groups" => "Shortcode Ultimate",
		"form"   => [
			"general" => [
				[     
					"name"    => "event_type",
					"label"   => "Event Type",
					"type"    => "select",
					"options" => [
						"hover"   => "Show and hide on mouse hover",
						"click"   => "Show and hide on mouse click",
					],
					"value"   => "hover",
				],
				[
					"name"  => "animate",
					"label" => "Animation",
					"type"  => "switch",
					"value" => true,
				],
				[
					"name" => "loop",
					"help" => "Setting of Yes will cause the animation to animate the initial item again and again.",
					"type" => "switch",
				],
				[
					"name" => "parent",
					"type" => "switch",
				],
				[
					"name"  => "duration",
					"help"  => "You can set animation duration as (seconds) units from here.",
					"type"  => "slider",
					"min"   => "0.2",
					"max"   => "5",
					"step"  => "0.2",
					"value" => "0.6",
				],
				[
					"name"  => "iteration",
					"help"  => "If you need to show animation again & again so, please select from slider.",
					"type"  => "slider",
					"min"   => "1",
					"max"   => "5",
					"value" => "1",
				],
				[
					"name"  => "url",
					"help"  => "URL/Link of the author. Leave empty to disable link.",
					"label" => "URL",
				],
				[
					"name"    => "target",
					"type"    => "select",
					"options" => [
						"self"    => "Self",
						"blank"   => "Blank",
					],
					"value"   => "self",
				],
			],

			"Icon" => [
				[
					"name"    => "icon",
					"type"    => "select",
					"options" => array_combine(Su_Data::livicons(), Su_Data::livicons()),
					"value"   => "heart",
				],
				[
					"name"  => "size",
					"label" => "Icon Size",
					"type"  => "slider",
					"min"   => "4",
					"max"   => "256",
					"step"  => "2",
					"value" => "32",
				],
				[
					"name"  => "align",
					"label" => "Icon Align",
					"type"  => "select",
					"options"   => [
						"left"   => "Left",
						"right"  => "Right",
						"center"  => "Center",
					],
					"value" => "left",
				],
				[
					"name"  => "background_color",
					"label" => "Background",
					"type"  => "color",
					"value" => "#eeeeee",
				],
				[
					"name"  => "color",
					"label" => "Icon Color",
					"type"  => "color",
					"value" => "#666666",
				],
				[
					"name"  => "hover_color",
					"label" => "Hover Color",
					"type"  => "color",
					"value" => "#000000",
				],
				[
					"name" => "border",
					"type" => "switch",
				],
				[
					"name"    => "border_width",
					"label"   => "Border Width",
					"type"    => "slider",
					"depends" => [
						"border" => true,
					],
					"value" => "0",
				],
				[
					"name" => "border_style",
					"label" => "Border Style",
					"type" => "select",
					"options" => [
						"none"    => "None",
						"solid"   => "Solid",
						"dotted"  => "Dotted",
						"dashed"  => "Dashed",
						"double"  => "Double",
						"groove"  => "Groove",
						"ridge"   => "Ridge",
					],
					"depends" => [
						"border" => true,
					],
					"value"   => "solid",
				],
				[
					"name"    => "border_color",
					"label"   => "Border Color",
					"type"    => "color",
					"depends" => [
						"border" => true,
					],
					"value"   => "#444444",
				],
				[
					"name"  => "radius",
					"help"  => "You can set value as em, % etc if you need",
					"value" => "3px",
				],
				[
					"name"  => "padding",
					"type"  => "padding",
				],
				[
					"name"  => "margin",
					"type"  => "margin",
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
