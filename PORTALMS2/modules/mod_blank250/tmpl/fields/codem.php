<?php defined('_JEXEC') or die;

//GNU General Public License version 3 *** Copyright Bob Galway *** Blackdale.com *** Joomla mod_blank250

jimport('joomla.form.formfield');

class JFormFieldCodem extends JFormField
{
    protected $type = 'Codem';

    public function getInput()
    {
      $editw = "500";
      $edith = "350";
      $theme = "paraiso-light";
      if(!isset($params1)){$params1 = array("editw"=>"500","edith"=>"350","editor"=>"paraiso-light");}
      $id = explode("&id=", $_SERVER['QUERY_STRING']);
      $db = JFactory::getDBO();
      if (isset($id[1])) {
          $db->setQuery('SELECT * FROM `#__modules` WHERE `id`=' . $id[1]);
          $contents = $db->loadObjectList();
          $params1 = json_decode($contents[0]->params, true);
		  if(isset($params1["editw"])){
          $theme = $params1[str_replace("jform_params_", "", $this->id)];
          $editw = $params1["editw"];
          $edith = $params1["edith"];
		}
		
      }



        if ($theme == "a") {
            $theme = "none";
        } elseif ($theme == "1") {
            $theme = "3024-day";
        } elseif ($theme == "2") {
            $theme = "3024-night";
        } elseif ($theme == "3") {
            $theme = "abcdef";
        } elseif ($theme == "4") {
            $theme = "ambiance";
        } elseif ($theme == "5") {
            $theme = "ambiance-mobile";
        } elseif ($theme == "6") {
            $theme = "base16-dark";
        } elseif ($theme == "7") {
            $theme = "base16-light";
        } elseif ($theme == "8") {
            $theme = "bespin";
        } elseif ($theme == "9") {
            $theme = "blackboard";
        } elseif ($theme == "10") {
            $theme = "cobalt";
        } elseif ($theme == "11") {
            $theme = "colorforth";
        } elseif ($theme == "12") {
            $theme = "dracula";
        } elseif ($theme == "13") {
            $theme = "eclipse";
        } elseif ($theme == "14") {
            $theme = "elegant";
        } elseif ($theme == "15") {
            $theme = "hopscotch";
        } elseif ($theme == "16") {
            $theme = "icecoder";
        } elseif ($theme == "17") {
            $theme = "isotope";
        } elseif ($theme == "18") {
            $theme = "lesser-dark";
        } elseif ($theme == "19") {
            $theme = "liquibyte";
        } elseif ($theme == "20") {
            $theme = "material";
        } elseif ($theme == "21") {
            $theme = "mbo";
        } elseif ($theme == "22") {
            $theme = "mdn-like";
        } elseif ($theme == "23") {
            $theme = "midnight";
        } elseif ($theme == "24") {
            $theme = "monokai";
        } elseif ($theme == "25") {
            $theme = "neat";
        } elseif ($theme == "26") {
            $theme = "neo";
        } elseif ($theme == "27") {
            $theme = "night";
        } elseif ($theme == "28") {
            $theme = "paraiso-dark";
        } elseif ($theme == "29") {
            $theme = "paraiso-light";
        } elseif ($theme == "30") {
            $theme = "pastel-on-dark";
        } elseif ($theme == "31") {
            $theme = "seti";
        } elseif ($theme == "32") {
            $theme = "solarize";
        } elseif ($theme == "33") {
            $theme = "the-matrix";
        } elseif ($theme == "34") {
            $theme = "tomorrow-night-bright";
        } elseif ($theme == "35") {
            $theme = "tomorrow-night-eighties";
        } elseif ($theme == "36") {
            $theme = "ttcn";
        } elseif ($theme == "37") {
            $theme = "twilight";
        } elseif ($theme == "38") {
            $theme = "vibrant-ink";
        } elseif ($theme == "39") {
            $theme = "xq-dark";
        } elseif ($theme == "40") {
            $theme = "xq-light";
        } elseif ($theme == "41") {
            $theme = "yeti";
        } elseif ($theme == "42") {
            $theme = "zenburn";
        }

        $url = str_replace("administrator/", "", JURI::base());
        $doc = JFactory::getDocument();
        $app = JFactory::getApplication();
        if ($app->getTemplate() == "isis") {

            $doc->addStyleSheet($url . 'modules/mod_blank250/tmpl/fields/codem/params.min.css');
            $doc->addStyleDeclaration(".CodeMirror,textarea{height:" . $edith . "px;width:" . $editw . "px}");

            if ($theme != "none") {
                $doc->addStyleSheet($url . 'media/editors/codemirror/lib/codemirror.css');
                $doc->addStyleSheet($url . '/media/editors/codemirror/theme/' . $theme . '.css');
                $doc->addScript($url . 'media/editors/codemirror/lib/codemirror.js');
                $doc->addScript($url . 'media/editors/codemirror/mode/javascript/javascript.js');
                $doc->addScript($url . 'media/editors/codemirror/mode/xml/xml.js');
                $doc->addScript($url . 'media/editors/codemirror/mode/css/css.js');
                $doc->addScript($url . 'media/editors/codemirror/mode/clike/clike.js');
                $doc->addScript($url . 'media/editors/codemirror/mode/php/php.js');
                $doc->addScript($url . 'media/editors/codemirror/addon/selection/selection-pointer.js');
                $doc->addScript($url . 'media/editors/codemirror/addon/edit/matchbrackets.js');
                $doc->addScript($url . 'media/editors/codemirror/mode/htmlmixed/htmlmixed.js');

                $script1 = '
        jQuery(document).ready(function () {
            jQuery("#editw").on("change",function(){
                editw = jQuery(this).val();
               jQuery("#jform_params_editw").attr("value", editw);
            });
            jQuery("#edith").on("change",function(){
                edith = jQuery(this).val();
                jQuery("#jform_params_edith").attr("value", edith);
            });
            jQuery(document.body).on("shown shown.bs.tab ", function () { editor1.refresh(); });
            jQuery(document.body).on("shown shown.bs.tab ", function () { editor2.refresh(); });
            jQuery(document.body).on("shown shown.bs.tab ", function () { editor3.refresh(); });

            editx="' . $theme . '";
            var editor1 = CodeMirror.fromTextArea(document.getElementById("jform_params_codeeditor"), { lineNumbers: true,mode: "text/html", selectionPointer: true, theme:editx, });
            var editor2 = CodeMirror.fromTextArea(document.getElementById("jform_params_script"), {lineNumbers: true, mode: "text/html", selectionPointer: true, theme:editx, });
            var editor3 = CodeMirror.fromTextArea(document.getElementById("jform_params_phpcode"), {lineNumbers: true,matchBrackets:true,mode: "text/x-php",selectionPointer: true,theme:editx,indentUnit:4,indentWithTabs:true});
            var yyy =jQuery("#jform_params_graphics option").eq(0).text();
            if(yyy == "Oui"){
                jQuery("#wid").text("Largeur");
                jQuery("#hgt").text("Hauteur");
                jQuery("#thm").html("Th&#232;me");
            }
            if(yyy == "Ja"){
                jQuery("#wid").text("Breite");
                jQuery("#hgt").text("Hohe");
                jQuery("#thm").text("Thema");
            }
       });
        ';

                $doc->addScriptDeclaration($script1);
            }
            $string1 = '
        <div class="box1">
        <span>CodeMirror</span>
        <div id="line1"><span id="thm">Theme</span>
        <select id="' . $this->id . '" name="' . $this->name . '" >
            <option  value="none">none</option>
            <option  value="3024-day">3024-day</option>
            <option  value="3024-night">3024-night</option>
            <option  value="abcdef">abcdef</option>
            <option  value="ambiance">ambiance</option>
            <option  value="ambiance-mobile">ambiance-mobile</option>
            <option  value="base16-dark">base16-dark</option>
            <option  value="base16-light">base16-light</option>
            <option  value="bespin">bespin</option>
            <option  value="blackboard">blackboard</option>
            <option  value="cobalt">cobalt</option>
            <option  value="colorforth">colorforth</option>
            <option  value="dracula">dracula</option>
            <option  value="eclipse">eclipse</option>
            <option  value="elegant">elegant</option>
            <option  value="hopscotch">hopscotch</option>
            <option  value="icecoder">icecoder</option>
            <option  value="isotope">isotope</option>
            <option  value="lesser-dark">lesser-dark</option>
            <option  value="liquibyte">liquibyte</option>
            <option  value="material">material</option>
            <option  value="mbo">mbo</option>
            <option  value="mdn-like">mdn-like</option>
            <option  value="midnight">midnight</option>
            <option  value="monokai">monokai</option>
            <option  value="neat">neat</option>
            <option  value="neo">neo</option>
            <option  value="night">night</option>
            <option  value="paraiso-dark">paraiso-dark</option>
            <option  value="paraiso-light">paraiso-light</option>
            <option  value="pastel-on-dark">pastel-on-dark</option>
            <option  value="seti">seti</option>
            <option  value="solarize">solarize</option>
            <option  value="the-matrix">the-matrix</option>
            <option  value="tomorrow-night-bright">tomorrow-night-bright</option>
            <option  value="tomorrow-night-eighties">tomorrow-night-eighties</option>
            <option  value="ttcn">ttcn</option>
            <option  value="twilight">twilight</option>
            <option  value="vibrant-ink">vibrant-ink</option>
            <option  value="xq-dark">xq-dark</option>
            <option  value="xq-light">xq-light</option>
            <option  value="yeti">yeti</option>
            <option  value="zenburn">zenburn</option>
        </select>
        </div>
        <div><span id="wid">Width</span><h4 style="float:right;"> px</h4><input type="text" name="editw" id="editw" value="' . $editw . '" /></div>
        <div><span id="hgt">Height</span><h4 style="float:right;"> px</h4><input type="text" name="edith" id="edith" value="' . $edith . '" /></div>
        </div>';
            $string1 = str_replace($theme . '"', $theme . '" selected=\'selected\'', $string1);
            return $string1;
        } else {
            echo "<script>jQuery('#jform_params_editor-lbl').hide();</script>";
            return;
        }
    }
}
