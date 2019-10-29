<?php

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * BDThemes Shortcode Ultimate 
 *
 * @package     Shortcode Ultimate Joomla 3.0
 * @subpackage  BDThemes Schortcodes
 * @copyright Copyright (C) 2011-2014 BDThemes Ltd. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @author BDThemes
 * @author url http://bdthemes.com
 *
 */

JHtml::_('bootstrap.framework');

?>

<style type="text/css">
    body {
        font-family: sans-serif;
        margin: 0px;
        padding: 1em !important;
    }
    .content_wrappwer {
        margin-bottom: 1em;
    }
    #su-cheatsheet-print-head{
        margin-bottom: 15px;
        background: #f5f5f5;
        padding: 12px 20px;
        box-sizing: border-box;
        position: relative;
    }
    #su-cheatsheet-print-head h1{
        text-align: left;
        font-size: 20px;
        text-transform: uppercase;
    }
    #su-cheatsheet-print-head label {
        display: inline-block;
    }
    #su-cheatsheet-print-head .su-search {
        position: absolute;
        right: 20px;
        top: 20px;
    }
    #su-cheatsheet-print-head .su-search input {
        padding: 7px;
        border: 1px solid #ddd;
    }
    .shortcode_example{
        display: none;
    }
    #su-cheatsheet-screen ul{
        margin: 0;
    }
    #su-cheatsheet-screen li{
        margin-bottom: 0;
        border-bottom: 1px solid #E8E8E8;
        list-style: none;
    }
    #su-cheatsheet-screen .title{
        font-weight: bold;
        background: #F7F7F7;
        color: #4E4E4E;
        margin: 0;
        padding: 12px;
        font-size: 14px;
        cursor: pointer;
    }
    #su-cheatsheet-screen .title:hover {
        background:#f4f4f4;
        color: #000;
    }
    #su-cheatsheet-screen .title .su-shortcode-icon{
        margin-right: 10px;
        padding-right: 10px;
        border-right: 1px solid #e8e8e8;   
    }
    #su-cheatsheet-screen .title .su-shortcode-icon i{
        width: 1.28571429em;
        text-align: center;
    }
    #su-cheatsheet-screen table {
        width: 100%;
        margin: 0;
        border: solid 1px #ddd;
        background: #fff;
    }
    #su-cheatsheet-screen table thead {
        background: #f5f5f5;
    }
    #su-cheatsheet-screen table thead tr th,
    #su-cheatsheet-screen table thead tr td {
        padding: 0.8rem 1rem 0.8rem;
        color: #222;
        font-weight: bold;
    }
    #su-cheatsheet-screen table tfoot {
        background: #f5f5f5;
    }
    #su-cheatsheet-screen table tfoot tr th,
    #su-cheatsheet-screen table tfoot tr td {
        padding: 0.8rem 1rem 0.8rem;
        color: #222;
        font-weight: bold;
    }
    #su-cheatsheet-screen table tr th,
    #su-cheatsheet-screen table tr td {
        padding: 1em;
        color: #222;
        text-align: left;
    }
    #su-cheatsheet-screen table tr.even,
    #su-cheatsheet-screen table tr.alt,
    #su-cheatsheet-screen table tr:nth-of-type(even) {
        background: #f9f9f9;
    }
    #su-cheatsheet-screen table thead tr th,
    #su-cheatsheet-screen table tfoot tr th,
    #su-cheatsheet-screen table tfoot tr td,
    #su-cheatsheet-screen table tbody tr th,
    #su-cheatsheet-screen table tbody tr td,
    #su-cheatsheet-screen table tr td {
        display: table-cell;
        vertical-align: top;
    }

    #su-cheatsheet-screen table .su-shortcode-icon {
        display: inline-block;
        width: 24px;
        opacity: 0.5;
        filter: alpha(opacity=50);
    }
    #su-cheatsheet-screen table .su-shortcode-desc {
        font-size: 0.8em;
        color: #777;
        margin: 5px 0 0 0;
        font-style: normal;
    }

    #su-cheatsheet-screen table .su-shortcode-attribute {
        margin-top: 1.5em;
        color: #666;
    }
    #su-cheatsheet-screen table .su-shortcode-attribute:first-child { margin-top: 0; }
    #su-cheatsheet-screen table .su-shortcode-attribute p { 
        font-size: .9em; 
        line-height: 1.3em;
        background-color: #f5f5f5;
        padding: 5px 10px;
        margin: 0;
    }
    #su-cheatsheet-screen table .su-shortcode-attribute p:first-child { margin-top: 5px !important;}
    #su-cheatsheet-screen table .su-shortcode-attribute p:nth-child(odd) {
        background-color: #fff;
    }
    #su-cheatsheet-screen table .su-shortcode-attribute .su-atts-name {
        font-weight: bold;
        margin-bottom: 8px;
    }
    #su-cheatsheet-screen table .su-shortcode-attribute .su-atts-name,
    #su-cheatsheet-screen table .su-shortcode-attribute em {
        color: #000;
        font-style: normal;
    }
    #su-cheatsheet-screen table .su-shortcode-attribute .su-atts-name em {
        color: #666;
        font-weight: normal;
        font-style: normal;
    }
    #su-cheatsheet-screen table .code,#su-cheatsheet-screen table code {
        display: block;
        white-space: pre-wrap;
        font-family: monospace;
        max-width: 310px;
    }

    body.su-print-cheatsheet #su-cheatsheet-print { display: none; }


    .su-shortcode-attribute .su-atts-name pre {
        background: #FFECB2;
        padding: 0px 5px;
        font-size: 13px;
        font-weight: normal;
        margin: 0;
        display: inline-block;
    }

    code, kbd {
        padding: 10px;
        margin: 0 1px 10px;
        background: #eaeaea;
        background: rgba(0,0,0,.07);
        font-size: 13px;
    }
    .su-shortcode-note {
        background: rgba(52, 152, 219, 0.1);
        border: 2px solid rgba(52, 152, 219, 0.6);
        padding: 15px;
        margin: 10px 0;
        color: #000;
        font-size: 13px;
    }

</style>

<div class="content_wrappwer" id="result">
    <div id="su-cheatsheet-screen">
        <div>
            <div id="su-cheatsheet-print-head">
                <h1>Shortcodes Ultimate: Cheatsheet</h1>
                <div class="su-search">
                    <input id="search" value="" placeholder="Search Shortcode" size="30" autofocus />
                </div>
            </div>

        </div>
        <ul>
            <?php
            foreach ((array) Su_Data::shortcodes() as $name => $shortcode) {
                $visible = isset($shortcode['visible']) ? $shortcode['visible'] : true;
                if ($visible == FALSE) {
                    continue;
                }
                $ex_code = '[' . $name . ' ';

                $icon = ( isset($shortcode['icon']) ) ? $shortcode['icon'] : 'puzzle-piece';
                $shortcode['name'] = ( isset($shortcode['name']) ) ? $shortcode['name'] : $name;
                $attrs = @$shortcode["atts"];
                $content = @$shortcode["content"];
                ?>
                <li>
                    <p class="title"><span class="su-shortcode-icon"><?php echo Su_Tools::icon($icon) ?></span><?php echo $shortcode['name'] ?> 
                        <span style="display: none"><?php echo strtolower($shortcode['name']) ?></span></p>
                    <div class="shortcode_example">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 18%">Shortcode</th>
                                    <th style="width: 49%">Attributes</th>
                                    <th style="width: 33%">Example code</th>
                                </tr>
                            </thead>
                            <tbody>                        
                                <tr>
                                    <td><span class="su-shortcode-icon"><?php echo Su_Tools::icon($icon) ?></span><?php echo $shortcode['name'] ?>
                                        <br><em class="su-shortcode-desc"><?php echo $shortcode['desc'] ?></em>
                                    </td>
                                    <td>
                                        <?php
                                        foreach ($attrs as $attr_key => $attr) {
                                            getAttr($attr, $attr_key, $ex_code);
                                            if (isset($attr["child"])) {
                                                foreach ($attr["child"] as $child_key => $child_attr) {
                                                    getAttr($child_attr, $child_key, $ex_code);
                                                }
                                            }
                                        }
                                        $ex_code = substr($ex_code, 0, -1);
                                        $ex_code .= ']';
                                        if (isset($shortcode["content"])):
                                            ?>
                                            <div class="su-shortcode-attribute">
                                                <div class="su-atts-name">Content - <pre>content</pre>
                                                </div>
                                                <p><em>Possible values:</em>Any Content Value!</p>
                                                <p><em>Default value:</em> <?php
                                                    $content = str_replace("__content_slide", "content_slide", $shortcode["content"]);
                                                    $ct = str_replace("%prefix_", "", $content);
                                                    echo $ct;
                                                    $ex_code.= $ct . '[/' . $name . ']';
                                                    ?> </p>
                                            </div>
                                        <?php endif;
                                        ?>
                                    </td>
                                    <td class="code"><code><?php echo $ex_code ?></code>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>  
</div>

<?php

function getAttr($attr, $attr_key, &$ex_code) {
    ?>
    <div class="su-shortcode-attribute">
        <div class="su-atts-name"><?php echo $attr["name"] ?> - <pre><?php echo $attr_key ?></pre>
        </div>
        <p>                                
            <em>Possible values:</em>
            <?php
            switch (@$attr["type"]):
                case "select":
                    $df = null;
                    if (isset($attr["values"])):
                        foreach ($attr["values"] as $temp) {
                            $df = $temp;
                            echo $temp . ', ';
                        }

                    endif;
                    if (isset($attr["default"]) && trim($attr["default"]) != ""):
                        ?>
                    <p><em>Default value:</em>
                        <?php
                        if (isset($attr["values"][$attr["default"]])) {
                            echo $attr["values"][$attr["default"]];
                        } else {
                            echo $attr["default"];
                        }

                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>                                
                    <?php
                     else:
                        $ex_code .= $attr_key . '="'.$df.'" ';
                endif;
                break;
            case "number":
            case "slider":
                echo $attr["min"] . ' - ' . $attr['max'];
                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>                                
                    <?php
                     else:                
                        $ex_code .= $attr_key . '="'.$attr["min"].'" ';                
                endif;

                break;
            case "bool":
                echo 'yes, no';

                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>                                
                    <?php
                     else:                   
                        $ex_code .= $attr_key . '="yes" ';                
                endif;
                break;
            case "icon":
                echo 'icon: music, icon: envelope â€¦ full list';
                 if (isset($attr["default"]) && trim($attr["default"]) != ""):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>                                
                    <?php
                     else:
                    $ex_code .= $attr_key . '="" '; 
                endif;
                               
                break;
            case "border":
                echo 'CSS supported border!';

                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        if (strpos($attr["default"], '0px') === 0) {
                            $default = str_replace('0', '1', $attr["default"]);
                        } else {
                            $default = str_replace('0', '1px', $attr["default"]);
                        }
                        $ex_code .= $attr_key . '="' . $default . '" ';
                        ?>
                    </p>                                
                    <?php
                endif;
                break;
            case "shadow":
                echo 'CSS supporte shadow!';
                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="0px 1px 2px #eee" ';
                        ?>
                    </p>                                
                    <?php
                     else:
                
                        $ex_code .= $attr_key . '="2px 1px 2px #333" ';
                
                endif;
                break;
            case "color":
                echo '#RGB and rgba() colors';
                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>                                
                    <?php
                     else:                
                    $ex_code .= $attr_key . '="#333333" ';
                
                endif;
                break;
            case "article_source":
                echo 'Images from media manager or article or K2 category item.';
                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="" ';
                        ?>
                    </p>                                
                    <?php else:                
                    $ex_code .= $attr_key . '="category: 2" ';                
                endif;
                break;
            case "upload":
                echo 'Url From Meida!';
                if (isset($attr["default"])):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>                                
                    <?php
                    else:                
                    $ex_code .= $attr_key . '="" ';
                
                endif;
                break;
            default:
                ?>
                Any Custom Value!

                <?php
                if (isset($attr["default"]) && trim($attr["default"]) != ""):
                    ?>
                    <p><em>Default value:</em>
                        <?php
                        echo $attr["default"];
                        $ex_code .= $attr_key . '="' . $attr["default"] . '" ';
                        ?>
                    </p>    
                    <?php
                else:
                    $ex_code .= $attr_key . '="" ';
                 
                endif;
                ?>
            <?php
        endswitch;
        ?>
    </p>

    </div>

    <?php
}

?>

<script>
    jQuery(document).ready(function () {
        jQuery('li .title').click(function (e) {
            e.preventDefault(); // disable text selection
            jQuery('.shortcode_example').slideUp(500);
            var container = jQuery(this).parent().find('.shortcode_example');
            if (container.hasClass('active')) {
                container.removeClass('active')
                return;
            }
            jQuery('.shortcode_example').removeClass('active');
            container.slideToggle(500).addClass('active');
            return false; // disable text selection
        });
        jQuery('#search').keyup(function (e) {
            var s = jQuery(this).val().trim();
            if (s === '') {
                jQuery('#result li').show();
                return true;
            }
            jQuery('#result ul .title:not(:contains(' + s.toLocaleLowerCase() + '))').parent().hide();
            jQuery('#result ul .title:contains(' + s.toLocaleLowerCase() + ')').parent().show();
            return true;
        });

    }); // end document ready
</script>