<?php

/**
 * BDThemes Shortcode Ultimate
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 * Special thanks to Vladimir Anokhin who permit us to make this plugin like his shortcode ultimate wordpress plugin.
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

if(file_exists(JPATH_SITE.'/plugins/system/directaliaspro/routers/com_content.php') && JPluginHelper::isEnabled('system', 'directaliaspro')) {
    require_once JPATH_SITE.'/plugins/system/directaliaspro/routers/com_content.php';
} else {
    require_once JPATH_SITE.'/components/com_content/router.php';
}
require_once (JPATH_SITE.'/components/com_content/helpers/route.php');

if (file_exists(JPATH_SITE.'/components/com_k2/helpers/route.php'))
    require_once (JPATH_SITE.'/components/com_k2/helpers/route.php');

/**
 * Word limiter
 * @param  [type]  $str      [description]
 * @param  integer $limit    [description]
 * @param  string  $end_char [description]
 * @return [type]            [description]
 */
function su_word_limit($str, $limit = 100, $end_char = '&#8230;') {
    if (JString::trim($str) == '')
        return $str;

    // always strip tags for text
    $str     = strip_tags($str);
    
    $find    = array("/\r|\n/u", "/\t/u", "/\s\s+/u");
    $replace = array(" ", " ", " ");
    $str     = preg_replace($find, $replace, $str);

    preg_match('/\s*(?:\S*\s*){'.(int)$limit.'}/u', $str, $matches);
    if (JString::strlen($matches[0]) == JString::strlen($str))
        $end_char = '';
    return JString::rtrim($matches[0]).$end_char;
}

/**
 * Character limiter
 * @param  [type]  $str      [description]
 * @param  integer $limit    [description]
 * @param  string  $end_char [description]
 * @return [type]            [description]
 */
function su_char_limit($str, $limit = 150, $end_char = '...') {
    if (JString::trim($str) == '')
        return $str;

    // always strip tags for text
    $str     = strip_tags(JString::trim($str));
    $find    = array("/\r|\n/u", "/\t/u", "/\s\s+/u");
    $replace = array(" ", " ", " ");
    $str     = preg_replace($find, $replace, $str);

    if (JString::strlen($str) > $limit)
    {
        $str = JString::substr($str, 0, $limit);
        return JString::rtrim($str).$end_char;
    }
    else
    {
        return $str;
    }
}

/**
 * CSS class generator from title 
 * @param  [type] $str [description]
 * @return [type]      [description]
 */
function su_title_class($str) {
    // Clean any unwanted character for class name make
    $str = str_replace(array(' ',),'-',$str);
    $str = str_replace(array(',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$str);
    return $str;
}

/**
 * CSV parser for making table
 * @param  [type] $file [description]
 * @return [type]       [description]
 */
function su_parse_csv($file) {
    $skip_char = $column = '';
    $csv_lines = file( $file );
    if ( is_array( $csv_lines ) ) {
        $cnt = count( $csv_lines );
        for ( $i = 0; $i < $cnt; $i++ ) {
            $line = $csv_lines[$i];
            $line = trim( $line );
            $first_char = true;
            $col_num = 0;
            $length = strlen( $line );
            for ( $b = 0; $b < $length; $b++ ) {
                if ( $skip_char != true ) {
                    $process = true;
                    if ( $first_char == true ) {
                        if ( $line[$b] == '"' ) {
                            $terminator = '";';
                            $process = false;
                        }
                        else
                            $terminator = ';';
                        $first_char = false;
                    }
                    if ( $line[$b] == '"' ) {
                        $next_char = $line[$b + 1];
                        if ( $next_char == '"' ) $skip_char = true;
                        elseif ( $next_char == ';' ) {
                            if ( $terminator == '";' ) {
                                $first_char = true;
                                $process = false;
                                $skip_char = true;
                            }
                        }
                    }
                    if ( $process == true ) {
                        if ( $line[$b] == ';' ) {
                            if ( $terminator == ';' ) {
                                $first_char = true;
                                $process = false;
                            }
                        }
                    }
                    if ( $process == true ) $column .= $line[$b];
                    if ( $b == ( $length - 1 ) ) $first_char = true;
                    if ( $first_char == true ) {
                        $values[$i][$col_num] = $column;
                        $column = '';
                        $col_num++;
                    }
                }
                else
                    $skip_char = false;
            }
        }
    }
    $return = '<table><thead><tr>';
    foreach ( $values[0] as $value ) $return .= '<th>' . $value . '</th>';
    $return .= '</tr></thead>';
    array_shift( $values );
    foreach ( $values as $rows ) {
        $return .= '<tr>';
        foreach ( $rows as $col ) {
            $return .= '<td>' . $col . '</td>';
        }
        $return .= '</tr>';
    }
    $return .= '</table>';
    return $return;
}

/**
 * Alert box for show internal error and warning
 * @param  [type]  $content      [description]
 * @param  string  $alert_type   [description]
 * @param  boolean $close_button [description]
 * @return [type]                [description]
 */
function su_alert_box($content, $alert_type = 'info', $close_button = false) {
    $close = ($close_button) ? '<button type="button" class="close" data-dismiss="alert">&times;</button>' : '';
    $dismissible = ($close_button) ? 'alert-dismissible' : '';
    return '<div class="alert alert-' . $alert_type . ' ' . $dismissible . ' " role="alert">' . $close . $content . '</div>';
}

/**
 * Module loader by check database settings
 * @param  [type] $module_id    [description]
 * @param  [type] $module_class [description]
 * @param  [type] $module_style [description]
 * @return [type]               [description]
 */
function su_load_module($module_id, $module_class, $module_style) {
    $db       = JFactory::getDBO();
    $document = JFactory::getDocument();
    $renderer = $document->loadRenderer('module');
    $params   = array('style' => $module_style);
    $contents = '';
    $module   = 0;

    //get module as an object
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__modules');
    $query->where( 'published = ' . 1 );
    $query->where('id=' . $db->q($module_id));
    $rows = $db->setQuery($query);

    
    try {

        $rows = $db->loadObjectList();
        foreach ($rows as $row) {
            //just to get rid of that stupid php warning
            $row->user = '';
            $params    = array('style' => $module_style);
            $contents  = $renderer->render($row, $params);
        }
        return $contents;

    } catch (RuntimeException $e) {
        return null;
    }

}

/**
 * Custom formatter function
 *
 * @param string  $content
 *
 * @return string Formatted content with clean shortcodes content
 */
function su_clean_shortcodes($content) {
    $p = su_cmpt();
    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}

/**
 * Strips a shortcode tag based on RegEx matches against post content.
 *
 * @since 3.2.2
 *
 * @param array $m RegEx matches against post content.
 * @return string|false The content stripped of the tag, otherwise false.
 */
function su_strip_shortcode_tag($m) {
    // allow [[foo]] syntax for escaping a tag
    if ( $m[1] == '[' && $m[6] == ']' ) {
        return substr($m[0], 1, -1);
    }

    return $m[1] . $m[6];
}

/**
 * Shortcode names prefix in compatibility mode
 *
 * @return string Special prefix
 */
function su_compatibility_mode_prefix() {
    $plugin = JPluginHelper::getPlugin('system', 'bdthemes_shortcodes');
    $params = new JRegistry($plugin->params);
    return $params->get('shortcode_pre');
}

/**
 * Shortcut for su_compatibility_mode_prefix()
 */
function su_cmpt() {
    return su_compatibility_mode_prefix();
}


/**
 * Extra CSS class helper
 *
 * @param array   $atts Shortcode attributes
 *
 * @return string
 */
function su_ecssc($atts) {
    return ( $atts['class'] ) ? ' ' . trim($atts['class']) : '';
}

function su_scroll_reveal($atts) {
    if ($atts['scroll_reveal']) {
        suAsset::addFile('js', 'scrollreveal.min.js');
        return ' data-sr="'.strip_tags($atts['scroll_reveal']).'"';
    }
} 

/**
 * all array css classes will output as proper space
 * @param  array $classes shortcode css class as array
 * @return proper string
 */
function su_acssc($classes) {
    $classes     = implode($classes, ' ');
    $abs_classes = trim(preg_replace('/\s\s+/', ' ', $classes));
    return $abs_classes;
}

/**
 * Retrieves images from a specific folder
 *
 * @param   \Joomla\Registry\Registry  &$params  module params
 * @param   string                     $folder   folder to get the images from
 *
 * @return array
 */
function su_dir_images($dir='images/headers/' ) {

    $dir = rtrim($dir, '/');
    $path = JPATH_SITE.'/'.$dir;

    if (is_dir($path)) {
        $return = array();
        $files = glob($path.'/'.'*.*');
        for ($i=0; $i<count($files); $i++) {
            $image = basename($files[$i]);
            $supported_file = array('gif','jpg','jpeg','png');
            $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if (in_array($ext, $supported_file)) {
                $return[] = $dir.'/'.$image;
            } else {
                continue;
            }
        }
    } else {
        return false;
    }
    return $return;
}
   
/**
 * Image url fixer
 * @param  [type] $image [description]
 * @return [type]        [description]
 */
function image_media($image) {
    $app = JFactory::getApplication();
    if ($app->isAdmin()) {
        if (strpos($image, 'http://') === false && strpos($image, 'https://') === false) {
            return str_replace('administrator/', '', JUri::root().$image) ;
        } else {
            return str_replace('administrator/', '', $image);
        }
    } else {
        if (strpos($image, 'http://') === false && strpos($image, 'https://') === false) {
            return JUri::root() . $image;
        } else {
            return $image;
        }
    }
}

/**
 * Shortcode Image Resizer function
 * @param  [type]  $url     [description]
 * @param  [type]  $width   [description]
 * @param  [type]  $height  [description]
 * @param  boolean $crop    [description]
 * @param  integer $quality [description]
 * @return [type]           [description]
 */
function su_image_resize($url, $width = NULL, $height = NULL, $crop = true, $quality=95) {

    //if gd library doesn't exists - output normal image without resizing.
    if (function_exists("gd_info") == false) {
        $image_array = array(
            'url'    => $url,
            'width'  => intval($width),
            'height' => intval($height),
            'type'   => ''
        );
        return $image_array;
    }

    $thumb_folder = 'cache/shortcodes/';
    if (!is_dir(JPATH_SITE .'/'. $thumb_folder)) {
        mkdir(JPATH_SITE .'/'. $thumb_folder, 0777);
    }

    $fileExtension = strrchr($url, ".");
    $thumb_width   = intval($width);
    $thumb_height  = intval($height);

    if ($url!=null) {
        $url = JPATH_SITE .'/'.$url;
    } else {
        $image_array = array(
            'url'    => $url,
            'width'  => intval($width),
            'height' => intval($height),
            'type'   => ''
        );
        return $image_array;
    }

    $imageData = getimagesize($url);
    $owidth    = $imageData[0];
    $oheight   = $imageData[1];

    if ( $imageData['mime'] == 'image/jpeg' || $imageData['mime'] == 'image/pjpeg' || $imageData['mime'] == 'image/jpg') {
        $image = @imagecreatefromjpeg($url);
    } elseif ($imageData['mime'] == 'image/gif') {
        $image = @imagecreatefromgif($url);
    } elseif ($imageData['mime'] == 'image/png') {
        $image = @imagecreatefrompng($url);
    } else {
        $image = null;
    }

    // check if the proper image resource was created
    if (!$image) {
        $image_array = array(
            'url'    => $url,
            'width'  => $thumb_width,
            'height' => $thumb_height,
            'type'   => $fileExtension
        );
        return $image_array;
    }


    $original_aspect = $owidth / $oheight;
    $thumb_aspect    = $thumb_width / $thumb_height;

    if ($crop) {
        $thumb_path = basename($url, $fileExtension) . '-' . $width . 'x' . $height .'-'.md5($url) . $fileExtension; // $file is set to "index";
        $thumb_path = JPATH_SITE . '/' . $thumb_folder . $thumb_path;
        if ($original_aspect >= $thumb_aspect) {
            // If image is wider than thumbnail (in aspect ratio sense)
            $new_height = $thumb_height;
            $new_width  = $owidth / ($oheight / $thumb_height);
        } else {
            // If the thumbnail is wider than the image
            $new_width  = $thumb_width;
            $new_height = $oheight / ($owidth / $thumb_width);
        }
        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        $color = imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 255, 255, 255, 127));
        imagefill($thumb, 0, 0, $color);
        imagesavealpha($thumb, true);
        // Resize and crop
        imagecopyresampled($thumb, $image, 0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                0, 0, $new_width, $new_height, $owidth, $oheight);
    } else {
        $new_width  = $thumb_width;
        $new_height = (int) ( 1 / $original_aspect * $new_width);
        $thumb_path = basename($url, $fileExtension) . '-' . $new_width . 'x' . $new_height . $fileExtension; // $file is set to "index";
        $thumb_path = JPATH_SITE . '/' . $thumb_folder . $thumb_path;
        $thumb      = imagecreatetruecolor($new_width, $new_height);
        $color      = imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 255, 255, 255, 127));
        imagefill($thumb, 0, 0, $color);
        imagesavealpha($thumb, true);
        // Resize and crop
        imagecopyresampled($thumb, $image, 0, // Center the image horizontally
                0, // Center the image vertically
                0, 0, $new_width, $new_height, $owidth, $oheight);
    }
    if ($imageData['mime'] == 'image/jpeg' || $imageData['mime'] == 'image/pjpeg' || $imageData['mime'] == 'image/jpg') {
        imagejpeg($thumb, $thumb_path, $quality);
    } elseif ($imageData['mime'] == 'image/gif') {
        imagegif($thumb, $thumb_path, $quality);
    } else {
        imagepng($thumb, $thumb_path, 9);
    }
    $thumb_url = $thumb_folder . basename($thumb_path, $fileExtension) . $fileExtension; // $file is set to "index";

    $image_array = array(
        'url'    => $thumb_url,
        'width'  => $thumb_width,
        'height' => $thumb_height,
        'type'   => $fileExtension
    );

    return $image_array;
}


/**
 * Portfolio image slider function
 * @param  [type] $atts  [description]
 * @param  [type] $slide [description]
 * @return [type]        [description]
 */
function su_portfolio_image($atts, $slide) {

    $thumb_resize_check = ($atts['thumb_resize'] === 'yes' and $atts['layout'] != 'masonry') ? true : false;
    $thumb_url          = su_image_resize($slide['image'], $atts['thumb_width'], $atts['thumb_height'], $thumb_resize_check, 95);
    $textImg            = ($atts['include_article_image'] === 'yes') ? su_all_images(@$slide['fulltext']) : null;
    $return             = '';

    if ($textImg != null and $atts['layout'] != 'masonry') {
        $return .='
            <div class="cbp-slider-inline">
                <div class="cbp-slider-wrapper">
                    <div class="cbp-slider-item cbp-slider-item--active">
                        <img src="'.image_media($thumb_url['url']).'" alt="'.$slide['title'].'">
                    </div>';
                    foreach ($textImg as $img) {
                        $img = su_image_resize($img, $atts['thumb_width'], $atts['thumb_height'], $thumb_resize_check, 95);
                        $return .= '<div class="cbp-slider-item"><img src="'.image_media($img['url']).'" alt="'.$slide['title'].'"></div>';
                    }
            $return .='</div>
            <div class="cbp-slider-controls">
                <div class="cbp-slider-prev"></div>
                <div class="cbp-slider-next"></div>
            </div>
        </div>';
    }
    else {
        if (isset($thumb_url['url'])) {
            $return .= '<img src="'. image_media($thumb_url['url']) .'" alt="'. $slide['title'] .'">';
        } else {
            $return .= '<img src="'. image_media(BDT_SU_IMG.'no-image.svg') .'" alt="'. $slide['title'] .'">';
        }
    }
    return $return;
}

/**
 * Shortcode Ultimate tools class 
 * This class help 
 */
class Su_Tools {

    public static function select($args) {
        $args = su_parse_args($args, array(
            'id'       => '',
            'name'     => '',
            'class'    => '',
            'multiple' => '',
            'size'     => '',
            'disabled' => '',
            'selected' => '',
            'none'     => '',
            'options'  => array(),
            'style'    => '',
            'format'   => 'keyval', // keyval/idtext
            'noselect' => '' // return options without <select> tag
        ));
        $options = array();
        if (!is_array($args['options']))
            $args['options'] = array();
        if ($args['id'])
            $args['id'] = ' id="' . $args['id'] . '"';
        if ($args['name'])
            $args['name'] = ' name="' . $args['name'] . '"';
        if ($args['class'])
            $args['class'] = ' class="' . $args['class'] . '"';
        if ($args['style'])
            $args['style'] = ' style="' . esc_attr($args['style']) . '"';
        if ($args['multiple'])
            $args['multiple'] = ' multiple="multiple"';
        if ($args['disabled'])
            $args['disabled'] = ' disabled="disabled"';
        if ($args['size'])
            $args['size'] = ' size="' . $args['size'] . '"';
        if ($args['none'] && $args['format'] === 'keyval')
            $args['options'][0] = $args['none'];
        if ($args['none'] && $args['format'] === 'idtext')
            array_unshift($args['options'], array('id' => '0', 'text' => $args['none']));
        if ($args['format'] === 'keyval')
            foreach ($args['options'] as $id => $text) {
                $options[] = '<option value="' . (string) $id . '">' . (string) $text . '</option>';
            } elseif ($args['format'] === 'idtext')
            foreach ($args['options'] as $option) {
                if (isset($option['id']) && isset($option['text']))
                    $options[] = '<option value="' . (string) $option['id'] . '">' . (string) $option['text'] . '</option>';
            }
        $options = implode('', $options);
        $options = str_replace('value="' . $args['selected'] . '"', 'value="' . $args['selected'] . '" selected="selected"', $options);
        return ( $args['noselect'] ) ? $options : '<select' . $args['id'] . $args['name'] . $args['class'] . $args['multiple'] . $args['size'] . $args['disabled'] . $args['style'] . '>' . $options . '</select>';
    }

    /**
     * [get_categories description]
     * @return [type] [description]
     */
    public static function get_categories() {
        $cats = array();
        foreach ((array) get_terms('category', array('hide_empty' => false)) as $cat)
            $cats[$cat->slug] = $cat->name;
        return $cats;
    }

    /**
     * [get_types description]
     * @return [type] [description]
     */
    public static function get_types() {
        $types = array();
        foreach ((array) get_post_types('', 'objects') as $cpt => $cpt_data)
            $types[$cpt] = $cpt_data->label;
        return $types;
    }

    /**
     * [get_users description]
     * @return [type] [description]
     */
    public static function get_users() {
        $users = array();
        foreach ((array) get_users() as $user)
            $users[$user->ID] = $user->data->display_name;
        return $users;
    }

    /**
     * [get_taxonomies description]
     * @return [type] [description]
     */
    public static function get_taxonomies() {
        $taxes = array();
        foreach ((array) get_taxonomies('', 'objects') as $tax)
            $taxes[$tax->name] = $tax->label;
        return $taxes;
    }

    /**
     * [indentRows description]
     * @param  [type]  $rows [description]
     * @param  integer $root [description]
     * @param  integer $tree [description]
     * @return [type]        [description]
     */
    public static function indentRows($rows, $root = 0, $tree = 1) {
        $children = array();
        if (count($rows)) {
            foreach ($rows as $v) {
                $pt = $v->parent;
                $list = @$children[$pt] ? $children[$pt] : array();
                array_push($list, $v);
                $children[$pt] = $list;
            }
        }
        $categories = JHTML::_('menu.treerecurse', $root, '', array(), $children, 9999, 0, $tree);
        return $categories;
    }

    /**
     * [getOptions description]
     * @return [type] [description]
     */
    public static function getOptions() {
        $options   = array();
        $published = array(1);
        $extension = 'com_content';
        // Let's get the id for the current item, either category or content item.
        $jinput    = JFactory::getApplication()->input;
        // Load the category options for a given extension.
        
        $db        = JFactory::getDbo();
        $query     = $db->getQuery(true)
                ->select('a.id, a.title, a.level, a.published, a.parent_id as parent, a.parent_id')
                ->from('#__categories AS a')
                ->join('LEFT', $db->quoteName('#__categories') . 'AS b ON a.lft > b.lft AND a.rgt < b.rgt');

        $query->where('(a.extension = '.$db->quote($extension).')');

        // Filter on the published state

        $query->where('a.published IN (' . implode(',', $published) . ')');

        $query->order('a.lft ASC');
        $db->setQuery($query);
        $row = $db->loadObject();
        // Get the options.

        try {
            $options = self::indentRows($db->loadObjectList(),1);
        } catch (RuntimeException $e) {
            //JError::raiseWarning(500, $e->getMessage);
        }

        $db->disconnect();
        // Merge any additional options in the XML definition.
        return $options;
    }
    
    /**
     * [get_category description]
     * @return [type] [description]
     */
    public static function get_category() {
        return self::getOptions();
    }

    /**
     * [get_terms description]
     * @param  string $tax [description]
     * @param  string $key [description]
     * @return [type]      [description]
     */
    public static function get_terms($tax = 'category', $key = 'id') {
        $terms = array();
        if ($key === 'id') {
            foreach (self::get_category($tax, array('hide_empty' => false)) as $term) {
                 $prefix = "";
                for($i = 1; $i < $term->level; $i++){
                    $prefix .= "- ";
                }
                $terms[$term->id] = $term->treename;
            }
        } elseif ($key === 'slug') {
            foreach ((array) get_terms($tax, array('hide_empty' => false)) as $term) {
                $prefix = "";
                for($i = 1; $i < $term->level; $i++){
                    $prefix .= "- ";
                }
                $terms[$term->slug] = $prefix . $term->name;
            }
        }
        return $terms;
    }

    /**
     * [get_k2_Options description]
     * @return [type] [description]
     */
    public static function get_k2_Options() {
        if (!JComponentHelper::isEnabled('com_k2', true)) {
            return array();
        } else {
            $options   = array();
            $published = array(1);
            
            // Load the category options for a given extension.
            
            $db        = JFactory::getDbo();
            $query     = $db->getQuery(true)
                    ->select('a.id, a.name, a.parent, a.published, a.name as title, a.parent as parent_id')
                    ->from('#__k2_categories AS a');

            // Filter on the published state

            $query->where('a.published IN (' . implode(',', $published) . ')');

            $query->order('a.ordering ASC');
                    
            $db->setQuery($query);
            // Get the options.

            try {
                $options = self::indentRows($db->loadObjectList(),0);
            } catch (RuntimeException $e) {
                //JError::raiseWarning(500, $e->getMessage);
                $options = null;
            }

            // Merge any additional options in the XML definition.
            return $options; 
        }
    }

    /**
     * [get_k2_category description]
     * @return [type] [description]
     */
    public static function get_k2_category() {
        return self::get_k2_Options();
    }

    /**
     * [get_k2_terms description]
     * @param  string $tax [description]
     * @param  string $key [description]
     * @return [type]      [description]
     */
    public static function get_k2_terms($tax = 'k2-category', $key = 'id') {
        $terms = array();
        if ($key === 'id') {
            foreach (self::get_k2_category($tax, array('hide_empty' => false)) as $term) {
                $terms[$term->id] =  $term->treename;
            }
        } elseif ($key === 'slug') {
            foreach ((array) get_k2_terms($tax, array('hide_empty' => false)) as $term) {
                
                $terms[$term->slug] = $term->treename;
            }
        }
        return $terms;
    }

    /**
     * K2 article item extractor
     * @param  [type]  $categoryId  [description]
     * @param  [type]  $orderbyType [description]
     * @param  [type]  $orderby     [description]
     * @param  integer $limit       [description]
     * @param  integer $offset      [description]
     * @return [type]               [description]
     */
    public static function get_k2_Articles($categoryId, $orderbyType, $orderby, $limit = 20, $offset = 0) {

        // Get the current user for authorisation checks
        $user = JFactory::getUser();

        $published = array(1);
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);


        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('#__k2_items AS a');

        // Join over the language
        $query->select('l.title AS language_title')
                ->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');

        // Join over the users for the checked out user.
        $query->select('uc.name AS editor')
                ->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // Join over the asset groups.
        $query->select('ag.title AS access_level')
                ->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

        // Join over the categories.
        $query->select('c.alias AS categoryalias,c.name AS category_title, c.alias AS category_alias')
                ->join('LEFT', '#__k2_categories AS c ON c.id = a.catid');

        // Join over the users for the author.
        $query->select('ua.name AS author_name')
                ->join('LEFT', '#__users AS ua ON ua.id = a.created_by');

        if (JLanguageAssociations::isEnabled()) {
            $query->select('COUNT(asso2.id)>1 as association')
                    ->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context=' . $db->quote('com_content.item'))
                    ->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key')
                    ->group('a.id');
        }
        // Filter on the published state

        $query->where('a.published IN (' . implode(',', $published) . ')');
        $query->where('a.trash = 0');


        // Define null and now dates
        $nullDate = $db->quote($db->getNullDate());
        $nowDate  = $db->quote(JFactory::getDate()->toSql());

        // Filter by start and end dates.
        if ((!$user->authorise('core.edit.state', 'com_content')) && (!$user->authorise('core.edit', 'com_content')))
        {
            $query->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')')
                ->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');
        }

        if (is_array($categoryId)) {
            JArrayHelper::toInteger($categoryId);
            $categoryId = implode(',', $categoryId);
            $query->where('a.catid IN (' . $categoryId . ')');
        }
        if ($orderbyType == '') {

        } else {
            $query->order($orderby);
        }
        $query->setLimit($limit,$offset);
        $db->setQuery($query);

        try {
            return  $db->loadObjectList();
        } catch (RuntimeException $e) {
            return  null;
        }
    }

    /**
     * K2 category extractor
     * @param  [type] $categoryId  [description]
     * @param  [type] $orderbyType [description]
     * @param  [type] $orderby     [description]
     * @param  [type] $by          [description]
     * @return [type]              [description]
     */
    public static function get_k2cats_slides($categoryId, $orderbyType, $orderby, $by){
        $options   = '';
        $published = array(1);
        $db        = JFactory::getDbo();
        $qc        =   $db->getQuery(true);
        $qc->select('c.alias AS categoryalias,c.name AS category_title, c.alias AS category_alias, count(a.catid) as count')
            ->from('#__k2_categories AS c ')
            ->join('LEFT', '#__k2_items AS a ON c.id = a.catid')
                ->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language')
                ->join('LEFT', '#__users AS uc ON uc.id=a.checked_out')
                ->join('LEFT', '#__users AS ua ON ua.id = a.created_by')
                ->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');
            if (JLanguageAssociations::isEnabled()) {
                 $qc->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context=' . $db->quote('com_content.item'))
                ->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key');
            }
        $qc->where('c.id IN (' . $categoryId . ')')
            ->where('a.published IN (' . implode(',', $published) . ')')
            ->where('a.trash = 0')
            ->group("a.catid");
 
            if ($orderbyType == '') {
            } else {
                $qc->order($orderby);
            }
        $db->setQuery($qc);

        try {
            return  $db->loadObjectList();
        } catch (RuntimeException $e) {
            return  null;
        }
    }

    /**
     * [get_k2_ArticlesNoShowMore description]
     * @param  [type]  $categoryId  [description]
     * @param  [type]  $orderbyType [description]
     * @param  [type]  $orderby     [description]
     * @param  integer $limit       [description]
     * @param  integer $offset      [description]
     * @return [type]               [description]
     */
    public static function get_k2_ArticlesNoShowMore($categoryId, $orderbyType, $orderby, $limit = 20, $offset = 0) {

        // Get the current user for authorisation checks
        $user = JFactory::getUser();

        $options   = '';
        $published = array(1);
        $db        = JFactory::getDbo();
        $query     = $db->getQuery(true);


        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('#__k2_items AS a');

        // Join over the language
        $query->select('l.title AS language_title')
                ->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');

        // Join over the users for the checked out user.
        $query->select('uc.name AS editor')
                ->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // Join over the asset groups.
        $query->select('ag.title AS access_level')
                ->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

        // Join over the categories.
        $query->select('c.alias AS categoryalias,c.name AS category_title, c.alias AS category_alias')
                ->join('LEFT', '#__k2_categories AS c ON c.id = a.catid');

        // Join over the users for the author.
        $query->select('ua.name AS author_name')
                ->join('LEFT', '#__users AS ua ON ua.id = a.created_by');

        if (JLanguageAssociations::isEnabled()) {
            $query->select('COUNT(asso2.id)>1 as association')
                    ->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context=' . $db->quote('com_content.item'))
                    ->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key')
                    ->group('a.id');
        }
        // Filter on the published state

        $query->where('a.published IN (' . implode(',', $published) . ')');
        $query->where('a.trash = 0');

        // Define null and now dates
        $nullDate = $db->quote($db->getNullDate());
        $nowDate  = $db->quote(JFactory::getDate()->toSql());

        // Filter by start and end dates.
        if ((!$user->authorise('core.edit.state', 'com_content')) && (!$user->authorise('core.edit', 'com_content')))
        {
            $query->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')')
                ->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');
        }


        /*** order and limit ***/
        if ($orderbyType != '') { 
            $query->order($orderby);
        }
        $query->setLimit($limit,$offset);
        
        
        if (is_array($categoryId)) {

            JArrayHelper::toInteger($categoryId);

            foreach ($categoryId as $cid) {
                $query1 = clone $query;
                $query1->where('a.catid = '.$cid);
                $query1->setLimit($limit,$offset);
                 
                $db->setQuery($query1);
                $articles[$cid] = $db->loadObjectList();
                if(count($articles[$cid]) == 0){
                    unset($articles[$cid]);
                }
            }
            // sort category by article count
            uasort($articles, 'su_cmp');
            
            $total      = $limit;
            $num_cat    = count($articles);
            $avg        = $total/$num_cat;
            $resutl_art = array();
            foreach ($articles as $arts) {
                 $tmp = floor($avg);
                if(count($arts) < $avg){
                  $resutl_art =  array_merge($resutl_art, $arts);
                  $tmp = count($arts);
                }else{
                  $resutl_art =  array_merge($resutl_art, array_splice($arts, 0, $avg));
                }
                $total = $total - $tmp;
                if($num_cat > 1) $avg = $total/(--$num_cat);
            }
            foreach ($resutl_art as $art){
                $aid[] = $art->id;
            }
 
            $query->where('a.id in ('.implode(',', $aid).')');
        }
       
        $db->setQuery($query);

        try {
            return  $db->loadObjectList();
        } catch (RuntimeException $e) {
            return  null;
        }
    }

    /**
     * [getArticles description]
     * @param  [type]  $categoryId  [description]
     * @param  [type]  $orderbyType [description]
     * @param  [type]  $orderby     [description]
     * @param  integer $limit       [description]
     * @param  integer $offset      [description]
     * @return [type]               [description]
     */
    public static function getArticles($categoryId, $orderbyType, $orderby, $limit = 20, $offset = 0) {

        // Get the current user for authorisation checks
        $user = JFactory::getUser();

        $published = '';
        $db        = JFactory::getDbo();
        $query     = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('#__content AS a');

        // Join over the language
        $query->select('l.title AS language_title')
                ->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');

        // Join over the users for the checked out user.
        $query->select('uc.name AS editor')
                ->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // Join over the asset groups.
        $query->select('ag.title AS access_level')
                ->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

        // Join over the categories.
        $query->select('c.title AS category_title, c.alias AS category_alias')
                ->join('LEFT', '#__categories AS c ON c.id = a.catid');

        // Join over the users for the author.
        $query->select('ua.name AS author_name')
                ->join('LEFT', '#__users AS ua ON ua.id = a.created_by');

        if (JLanguageAssociations::isEnabled()) {
            $query->select('COUNT(asso2.id)>1 as association')
                    ->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context=' . $db->quote('com_content.item'))
                    ->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key')
                    ->group('a.id');
        }

        // Filter by published state
        if (is_numeric($published)) {
            $query->where('a.state = ' . (int) $published);
        } elseif ($published === '') {
            $query->where('(a.state = 0 OR a.state = 1)');
        }


        // Filter by a single or group of categories.
        $baselevel = 1;


        // Define null and now dates
        $nullDate = $db->quote($db->getNullDate());
        $nowDate  = $db->quote(JFactory::getDate()->toSql());

        // Filter by start and end dates.
        if ((!$user->authorise('core.edit.state', 'com_content')) && (!$user->authorise('core.edit', 'com_content')))
        {
            $query->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')')
                ->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');
        }


        if (is_numeric($categoryId)) {
            $cat_tbl   = JTable::getInstance('Category', 'JTable');
            $cat_tbl->load($categoryId);
            $rgt       = $cat_tbl->rgt;
            $lft       = $cat_tbl->lft;
            $baselevel = (int) $cat_tbl->level;
            $query->where('c.lft >= ' . (int) $lft)
                    ->where('c.rgt <= ' . (int) $rgt);
        } elseif (is_array($categoryId)) {
            JArrayHelper::toInteger($categoryId);
            $categoryId = implode(',', $categoryId);
            $query->where('a.catid IN (' . $categoryId . ')');
        }
        if ($orderbyType == '') {

        } else {
            $query->order($orderby);
        }

        $query->setLimit($limit,$offset);
        $db->setQuery($query);

        try {
            return  $db->loadObjectList();
        } catch (RuntimeException $e) {
            return  null;
        }
    }

    /**
     * [getArticlesCats_slides description]
     * @param  [type] $categoryId  [description]
     * @param  [type] $orderbyType [description]
     * @param  [type] $orderby     [description]
     * @param  [type] $by          [description]
     * @return [type]              [description]
     */
    public static function getArticlesCats_slides($categoryId, $orderbyType, $orderby,$by) {
        $db = JFactory::getDbo();
        $qc =   $db->getQuery(true);
        $qc->select('c.title AS category_title, c.alias AS category_alias, count(c.id) as count')
            ->from('#__categories AS c')
            ->join('LEFT', '#__content AS a ON a.catid = c.id')
            ->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language')
            ->join('LEFT', '#__users AS uc ON uc.id=a.checked_out')
            ->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access')
            ->join('LEFT', '#__users AS ua ON ua.id = a.created_by');
                
        if (JLanguageAssociations::isEnabled()) {
            $qc->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context=' . $db->quote('com_content.item'))
                ->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key');
        }
        $qc->where('c.id    IN (' . $categoryId . ')');
               
        if ($orderbyType == '') {
        } else {
            $qc->order($orderby);
        }
        $qc ->group("c.id");
        $db->setQuery($qc);


        try {
            return $db->loadObjectList();
        } catch (RuntimeException $e) {
            return null;
        }
    }

    /**
     * [getArticlesNoShowMore description]
     * @param  [type]  $categoryId  [description]
     * @param  [type]  $orderbyType [description]
     * @param  [type]  $orderby     [description]
     * @param  integer $limit       [description]
     * @param  integer $offset      [description]
     * @return [type]               [description]
     */
    public static function getArticlesNoShowMore($categoryId, $orderbyType, $orderby, $limit = 20, $offset = 0) {

        // Get the current user for authorisation checks
        $user = JFactory::getUser();
        
        $published = '';
        $db        = JFactory::getDbo();
        $query     = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select('a.*');
        $query->from('#__content AS a');

        // Join over the language
        $query->select('l.title AS language_title')
                ->join('LEFT', $db->quoteName('#__languages') . ' AS l ON l.lang_code = a.language');

        // Join over the users for the checked out user.
        $query->select('uc.name AS editor')
                ->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');

        // Join over the asset groups.
        $query->select('ag.title AS access_level')
                ->join('LEFT', '#__viewlevels AS ag ON ag.id = a.access');

        // Join over the categories.
        $query->select('c.title AS category_title, c.alias AS category_alias')
                ->join('LEFT', '#__categories AS c ON c.id = a.catid');

        // Join over the users for the author.
        $query->select('ua.name AS author_name')
                ->join('LEFT', '#__users AS ua ON ua.id = a.created_by');

        if (JLanguageAssociations::isEnabled()) {
            $query->select('COUNT(asso2.id)>1 as association')
                    ->join('LEFT', '#__associations AS asso ON asso.id = a.id AND asso.context=' . $db->quote('com_content.item'))
                    ->join('LEFT', '#__associations AS asso2 ON asso2.key = asso.key')
                    ->group('a.id');
        }

        // Filter by published state
        if (is_numeric($published)) {
            $query->where('a.state = ' . (int) $published);
        } elseif ($published === '') {
            $query->where('(a.state = 0 OR a.state = 1)');
        }

        // Define null and now dates
        $nullDate = $db->quote($db->getNullDate());
        $nowDate  = $db->quote(JFactory::getDate()->toSql());

        // Filter by start and end dates.
        if ((!$user->authorise('core.edit.state', 'com_content')) && (!$user->authorise('core.edit', 'com_content')))
        {
            $query->where('(a.publish_up = ' . $nullDate . ' OR a.publish_up <= ' . $nowDate . ')')
                ->where('(a.publish_down = ' . $nullDate . ' OR a.publish_down >= ' . $nowDate . ')');
        }

        //limit and order
        if ($orderbyType == '') {

        } else {
            $query->order($orderby);
        }
        $query->setLimit($limit,$offset);
        // Filter by a single or group of categories.
        $baselevel = 1;
         if (is_numeric($categoryId)) {
            $cat_tbl   = JTable::getInstance('Category', 'JTable');
            $cat_tbl->load($categoryId);
            $rgt       = $cat_tbl->rgt;
            $lft       = $cat_tbl->lft;
            $baselevel = (int) $cat_tbl->level;
            $query->where('c.lft >= ' . (int) $lft)
                    ->where('c.rgt <= ' . (int) $rgt);
            
        } elseif (is_array($categoryId)) {
            JArrayHelper::toInteger($categoryId);
            foreach ($categoryId as $cid){
                $query1 = clone $query;
                $query1->where('a.catid = '.$cid);
                $query1->setLimit($limit,$offset);
                $db->setQuery($query1);
                $articles[$cid] = $db->loadObjectList();
                if(count($articles[$cid]) == 0){
                    unset($articles[$cid]);
                } 
            }
           
            // sort category by article count
            uasort($articles, 'su_cmp'); 
              
            $total = $limit;
            $aid = [];
            $num_cat = count($articles);
            
            $avg = ($num_cat)? $total/$num_cat : 0;
            
            $resutl_art = array();
            foreach ($articles as $arts){
                 $tmp = floor($avg);
                if(count($arts) < $avg){
                  $resutl_art =  array_merge($resutl_art, $arts);
                  $tmp = count($arts);
                } else {
                  $resutl_art =  array_merge($resutl_art, array_splice($arts, 0, $avg));
                }
                $total = $total - $tmp;
                if($num_cat > 1) $avg = $total/(--$num_cat);
            }
            foreach ($resutl_art as $art){
                $aid[] = $art->id;
            }

            $query->where('a.id in ('.implode(',', $aid).')');
        } 

        $db->setQuery($query);

        try {
            return $db->loadObjectList();
        } catch (RuntimeException $e) {
            return null;
        }
    }

    /**
     * [get_slides description]
     * @param  [type] $args [description]
     * @return [type]       [description]
     */
    public static function get_slides($args) {
        $args = su_parse_args($args, array(
            'source'   => 'none',
            'limit'    => 20,
            'offset'   => 0,
            'gallery'  => null,
            'type'     => '',
            'order'    => '',
            'order_by' => 'desc',
            'link'     => 'attachment'
        ));

        // Prepare empty array for slides
        $slides = array();
        // Loop through source types
        foreach (array('media', 'directory', 'posts', 'category', 'k2-category') as $type)
            if (strpos(trim($args['source']), $type . ':') === 0) {
                $args['source'] = array(
                    'type' => $type,
                    'val'  => (string) trim(str_replace(array($type . ':', ' '), '', $args['source']), ',')
                );
                break;
            }
        // Source is not parsed correctly, return empty array
        if (!is_array($args['source'])) {
            return $slides;
        }
        // if(is_numeric($args['source']['val'])) {
        //     return null;
        // }

        // Source: media
        if ($args['source']['type'] === 'media') {
            $images = (array) explode(',', $args['source']['val']);
            foreach ($images as $post) {

                $slide = array(
                    'image' => $post,
                    'link'  => $post,
                    'url'   => $post,
                    'title' => '',
                    'text'  => $post
                );
                if ($args['link'] === 'image') {
                    $slide['link'] = $slide['image'];
                }
                $slides[] = $slide;
            }
            return $slides;
        }
        //end media



        // Source: directory
        if ($args['source']['type'] === 'directory') {
            $images = su_dir_images($args['source']['val']);
            if ($images != false) {
                foreach ($images as $post) {
                    $real_title = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename($post));
                    $slide = array(
                        'image' => $post,
                        'link'  => $post,
                        'url'   => $post,
                        'title' => $real_title,
                        'text'  => $real_title
                    );
                    if ($args['link'] === 'image') {
                        $slide['link'] = $slide['image'];
                    }
                    $slides[] = $slide;
                }
                return $slides;
            }
            return null;
        }
        //end directory

        // Source: category
        elseif ($args['source']['type'] === 'category') {
            $catid = (array) explode(',', $args['source']['val']);

            $order = $args['order'];    //  title/created/ordering/hits
            $order_by = $args['order_by'];     // asc/desc
            if ($order == '') {
                $orderby = '';
            } else if ($order == 'title') {
                $orderby = 'a.title ' . $order_by . ' ';
            } else if ($order == 'created') {
                $orderby = 'a.created ' . $order_by . ' ';
            } else if ($order == 'modified') {
                $orderby = 'a.modified ' . $order_by . ' ';
            } else if ($order == 'publish_up') {
                $orderby = 'a.publish_up ' . $order_by . ' ';
            } else if ($order == 'ordering') {
                $orderby = 'a.ordering ' . $order_by . ' ';
            } else if ($order == 'hits') {
                $orderby = 'a.hits ' . $order_by . ' ';
            } else {
                $orderby = '';
            }

            if (@$args['show_more']==='yes' || $args['offset'] > 0){
                $results = self::getArticles($catid, $order, $orderby, $args['limit'], $args['offset']);
            }else{
                $results = self::getArticlesNoShowMore($catid, $order, $orderby, $args['limit'], $args['offset']);
            }
        }
        // Source: k2-category
        elseif ($args['source']['type'] === 'k2-category') {
            $catid = (array) explode(',', $args['source']['val']);

            $order = $args['order'];  //    title/created/ordering/hits
            $order_by = $args['order_by']; // asc/desc
            
            if ($order == 'title') {
                $orderby = 'a.title ' . $order_by . ' ';
            } else if ($order == 'created') {
                $orderby = 'a.created ' . $order_by . ' ';
            } else if ($order == 'modified') {
                $orderby = 'a.modified ' . $order_by . ' ';
            } else if ($order == 'publish_up') {
                $orderby = 'a.publish_up ' . $order_by . ' ';
            } else if ($order == 'ordering') {
                $orderby = 'a.ordering ' . $order_by . ' ';
            } else if ($order == 'hits') {
                $orderby = 'a.hits ' . $order_by . ' ';
            } else {
                $orderby = 'a.title ' . $order_by . ' ';
            }
            if (@$args['show_more']==='yes' || $args['offset'] > 0){
                $results = self::get_k2_Articles($catid, $order, $orderby, $args['limit'], $args['offset']);
            }else{
                $results = self::get_k2_ArticlesNoShowMore($catid, $order, $orderby, $args['limit'], $args['offset']);

            }
        }

        // Loop through posts
        if (is_array($results))
            foreach ($results as $post) {
                // Get post thumbnail ID
                if ($args['source']['type'] === 'k2-category') {
                    $k2_img = JPATH_SITE . '/media/k2/items/cache/' . md5("Image" . $post->id) . '_XL.jpg';
                    if (file_exists($k2_img)) {
                        $thumb = 'media/k2/items/cache/' . md5("Image" . $post->id) . '_XL.jpg';
                    } else {
                        $thumb = null;
                    }
                    $link = K2HelperRoute::getItemRoute($post->id . ':' . urlencode($post->alias), $post->catid . ':' . urlencode($post->categoryalias));
                } elseif( $args['source']['type'] === 'category') {
                    $thumb   = get_post_image($post);
                    $slug    = $post->id . ':' . $post->alias;
                    $catslug = $post->catid . ':' . $post->category_alias;
                    $link    = JRoute::_(ContentHelperRoute::getArticleRoute($slug, $catslug));
                } elseif( $args['source']['type'] === 'directory')  {
                    $thumb = $post->id;
                    $link = $slide['image'];
                } elseif( $args['source']['type'] === 'media')  {
                    $thumb = $post->id;
                    $link = $slide['image'];
                } else {
                    $thumb = null;
                }

                // post array
                $slide = array(
                    'id'          => ($post->id),
                    'alias'       => ($post->alias),
                    'created_by'  => ($post->created_by),
                    'category'    => ($post->category_title),
                    'title'       => ($post->title),
                    'introtext'   => ($post->introtext),
                    'fulltext'    => ($post->fulltext),
                    'image'       => $thumb,
                    'link'        => $link,
                    'created'     => ($post->created),
                    'hits'        => ($post->hits)
                );
                $slides[] = $slide;
            }
        // Return slides

        return $slides;
    }
 
    /**
     * [do_attr description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public static function do_attr($value) {
        return su_do_shortcode(str_replace(array('{', '}'), array('[', ']'), $value));
    }

    /**
     * [icon description]
     * @param  string $src [description]
     * @return [type]      [description]
     */
    public static function icon($src = 'file') {
        return ( strpos($src, '/') !== false ) ? '<img src="' . $src . '" alt="" />' : '<i class="fa fa-' . $src . '"></i>';
    }

    /**
     * [get_icon description]
     * @param  [type] $args [description]
     * @return [type]       [description]
     */
    public static function get_icon($args) {
        // Check for icon param
        if (!$args)
            return;
        // Line icon
        if (strpos($args, 'licon:') !== false) {
            // Query font-awesome stylesheet
            suAsset::addFile('css', 'linea.css');
            // Return icon
            return '<i class="li li-' . trim(str_replace('licon:', '', $args)) . '"></i>';
        }
        // Font Awesome icon
        elseif (strpos($args, 'icon:') !== false) {            
            // Return icon
            return '<i class="fa fa-' . trim(str_replace('icon:', '', $args)) . '"></i>';
        }
        // Image icon
        elseif (strpos($args, '/') !== false) {
            // Return icon
            return '<img src="' . $args . '" alt="" />';
        }
        // Icon is not detected
        return false;
    }

    /**
     * [icons description]
     * @return [type] [description]
     */
    public static function icons() {
        $icons = array();
        if (is_callable(array('Su_Data', 'icons')))
            foreach ((array) Su_Data::icons() as $icon) {
                $icons[] = '<i class="fa fa-' . $icon . '" title="' . $icon . '"></i>';
            }
        return implode('', $icons);
    }

    /**
     * [line_icons description]
     * @return [type] [description]
     */
    public static function line_icons() {
        $icons = array();
        if (is_callable(array('Su_Data', 'icons')))
            foreach ((array) Su_Data::line_icons() as $icon) {
                $icons[] = '<i class="li li-' . $icon . '" title="' . $icon . '"></i>';
            }
        return implode('', $icons);
    }

    public static function access_check() {
        return current_user_can('edit_posts');
    }
    
    /**
     * get slides cat
     * @param type $args
     * @return array
     */
    public static function getSlidesCats($args) {
        $args = su_parse_args($args, array(
            'source'   => 'none',
            'limit'    => 20,
            'offset'   => 0,
            'gallery'  => null,
            'type'     => '',
            'order'    => '',
            'order_by' => 'desc',
            'link'     => 'attachment'
        ));

        // Prepare empty array for slides
        $slides = array();
        // Loop through source types
        foreach (array('media', 'directory', 'posts', 'category', 'k2-category') as $type)
            if (strpos(trim($args['source']), $type . ':') === 0) {
                $args['source'] = array(
                    'type' => $type,
                    'val'  => (string) trim(str_replace(array($type . ':', ' '), '', $args['source']), ',')
                );
                break;
            }
        // Source is not parsed correctly, return empty array
        if (!is_array($args['source']))
            return $slides;
        // Source: category
        if ($args['source']['type'] === 'category') {
            $catid = $args['source']['val'];

            $order = $args['order'];    //  title/created/ordering/hits
            $order_by = $args['order_by'];     // asc/desc
            if ($order == '') {
                $orderby = '';
            } else if ($order == 'title') {
                $orderby = 'a.title ' . $order_by . ' ';
            } else if ($order == 'created') {
                $orderby = 'a.created ' . $order_by . ' ';
            } else if ($order == 'modified') {
                $orderby = 'a.modified ' . $order_by . ' ';
            } else if ($order == 'publish_up') {
                $orderby = 'a.publish_up ' . $order_by . ' ';
            } else if ($order == 'ordering') {
                $orderby = 'a.ordering ' . $order_by . ' ';
            } else if ($order == 'hits') {
                $orderby = 'a.hits ' . $order_by . ' ';
            } else {
                $orderby = '';
            }
            if (@$args['show_more']==='yes' || $args['offset'] > 0){
               return  Su_Tools::getArticlesCats_slides($catid, $order, $orderby,$order_by);
            }else{
                return null;
            }
        }
        // Source: k2-category
        elseif ($args['source']['type'] === 'k2-category') {
            $catid = $args['source']['val']; //(array) explode(',', $args['source']['val']);

            $order = $args['order'];  //    title/created/ordering/hits
            $order_by = $args['order_by']; // asc/desc

            if ($order == 'title') {
                $orderby = 'a.title ' . $order_by . ' ';
            } else if ($order == 'created') {
                $orderby = 'a.created ' . $order_by . ' ';
            } else if ($order == 'modified') {
                $orderby = 'a.modified ' . $order_by . ' ';
            } else if ($order == 'publish_up') {
                $orderby = 'a.publish_up ' . $order_by . ' ';
            } else if ($order == 'ordering') {
                $orderby = 'a.ordering ' . $order_by . ' ';
            } else if ($order == 'hits') {
                $orderby = 'a.hits ' . $order_by . ' ';
            } else {
                $orderby = 'a.title ' . $order_by . ' ';
            }
            if (@$args['show_more']==='yes' || $args['offset'] > 0){
              return  Su_Tools::get_k2cats_slides($catid, $order, $orderby,$order_by);
            } else {
                 return null;
            }
        }
    }
}

new Su_Tools;

/**
 * Shortcut for Su_Tools::decode_shortcode()
 */
function su_scattr($value) {
    return Su_Tools::do_attr($value);
}

/**
 * Shortcut for Su_Tools::get_icon()
 */
function su_get_icon($args) {
    return Su_Tools::get_icon($args);
}

/**
 * Comparison function
 * @param  [type] $a [description]
 * @param  [type] $b [description]
 * @return [type]    [description]
 */
function su_cmp($a, $b) {
    if (count($a) == count($b)) {
        return 0;
    }
    return (count($a) < count($b)) ? -1 : 1;
}

/**
 * [su_k2_check description]
 * @return [type] [description]
 */
function su_k2_check() {
    $db = JFactory::getDbo();
    $db->setQuery("SELECT enabled FROM #__extensions WHERE name = 'com_k2'");
    $is_enabled = $db->loadResult();
    if ($is_enabled) {
        return true;
    } else {
        return false;
    }
}

/**
 * Sp Page Builder Helper function
 * @param  string $category out of joomla category array
 * @return array           [description]
 */
function su_sp_category($category = 'joomla') {
    if ($category == 'k2') {
        if (su_k2_check()) {
            $output = array_reduce( Su_Tools::get_k2_category(), function ( $id, $category ) {
            $id[$category->id] = $category->title; return $id; }, [ ] );
        } else {
            $output = array();
        }
    } else {
        $output = array_reduce( Su_Tools::get_category(), function ( $id, $category ) { $id[$category->id] = $category->title; return $id; }, [ ] );
    }
    return $output;
}