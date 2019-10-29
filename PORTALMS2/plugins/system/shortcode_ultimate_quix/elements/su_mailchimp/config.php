<?php

  $plugin     = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
  $params     = new JRegistry($plugin->params);

  $mailchimp_api = ( $params->get('mailchimp_key') ) ? $params->get('mailchimp_key') : '';
  $mail_lists    = array();

  if ( ! empty ( $mailchimp_api ) ) {
      if ( ! class_exists( 'MCAPI' ) ) {
          include_once( dirname(__FILE__) . '/MCAPI.class.php' );
      }
      $api_key = $mailchimp_api;
      $mcapi   = new MCAPI( $api_key );
      $lists   = $mcapi->lists();
  }

  if ( isset( $lists['data'] ) && is_array( $lists['data'] ) ) {
      foreach ( $lists['data'] as $key => $value ) {
          $mail_lists[$value['id']] = $value['name'];
      }
  }

  return [
    "name"   => "Mailchimp",
    "slug"   => "bdt_Mailchimp",
    "groups" => "Shortcode Ultimate",
    "form"   => [
      "general" => [
        [ 
          "name"        => "email_list",
          "label"        => "E-Mail List",
          "type"        => "select",
          "options"     => $mail_lists,
        ],
        [
          "name" => "before_text",
          "label" => "Before Text",
        ],
        [
          "name" => "after_text",
          "label" => "After Text",
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
    
    