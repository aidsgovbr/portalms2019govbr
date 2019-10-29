<?php
/**
 * @version   1.0
 * @author    Randy Carey  http://iCueProject.com
 * @copyright Copyright (C) 2013-2014 Randy Carey, iCue Project
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

// no direct access
defined('_JEXEC') or die('Restricted index access');

class plgSystemForm_xml_override extends JPlugin {

    public function onAfterRoute() {
	   	$app = JFactory::getApplication();

        if ($app->isAdmin()){
            $com_str = $this->params->get('admin_com_name');
			if($com_str==''){return;}
            $com_array = explode(',',$com_str);
			$option =$app->input->get('option');
			if(in_array($option,$com_array)){
                $os = $this->params->get('slash_dir');

                $slash = ($os < 2) ? '\\' : '/';

				jimport( 'joomla.form.form' );
                $fpath = JPATH_ADMINISTRATOR.'/templates/system/forms/'.$option;
                $fpath = str_replace("\\",'/',$fpath);
                //$fpath = str_replace("C:",'',$fpath);

				if($os >= 0){ // linus or unsure
                    JForm::addFormPath(JPATH_SITE.'/administrator/components/'.$option.'/models/forms');
                }
                if($os <=0){ // windows or unsure
                    JForm::addFormPath(JPATH_SITE.'\\administrator/components/'.$option.'/models/forms');
                }
                // add the overriding path to be on top of stack
                JForm::addFormPath(JPATH_ADMINISTRATOR.'/templates/system/forms/'.$option);

			}
        }
		elseif ($app->isSite()){
			$com_str = $this->params->get('site_com_name');
			if($com_str==''){return;}
			$com_array = explode(',',$com_str);
			$option =$app->input->get('option');
			if(in_array($option,$com_array)){
				jimport( 'joomla.form.form' );
				JForm::addFormPath(JPATH_SITE.'/components/'.$option.'/models/forms');
				JForm::addFormPath(JPATH_SITE.'/templates/system/forms/'.$option);
			}
        }
   }



}