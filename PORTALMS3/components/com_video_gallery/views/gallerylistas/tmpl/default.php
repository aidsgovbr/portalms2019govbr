<?php
/**
 * @version     1.0.0
 * @package     com_video_gallery
 * @copyright   Copyright (C) 2014. Todos os direitos reservados.
 * @license     GNU General Public License versão 2 ou posterior; consulte o arquivo License. txt
 * @author      Fábio Nery Pinto <contato@fabionery.com.br> - http://www.fabionery.com.br
 */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canCreate = $user->authorise('core.create', 'com_video_gallery');
$canEdit = $user->authorise('core.edit', 'com_video_gallery');
$canCheckin = $user->authorise('core.manage', 'com_video_gallery');
$canChange = $user->authorise('core.edit.state', 'com_video_gallery');
$canDelete = $user->authorise('core.delete', 'com_video_gallery');
?>
<?php
if (empty($this->items)) {
    JError::raiseError(500, 'Nenhum vídeo encontrado na categoria escohida');
}
$all_items = array_chunk($this->items,2);
?>
<h1 class="borderHeading">
        <?php echo $this->items[0]->categoria; ?>
</h1>
<div id="phocagallery-categories-detail" class="tile-list-1">
    <?php foreach ($this->items as $i => $value) { ?>
        <div class="tileItem">
            <div class="span10 tileContent">
                <div class="tileImage">
                    <?php
                    switch ($value->tipo_video) {
                        case 'Youtube':
                        $link = explode("v=", $value->link);
                        // echo '<h4>'.$value->titulo  .'</h4>';
                        echo '<object width="363" height="300"><param name="movie" value="http://www.youtube.com/v/'.$link[1].'"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$link[1].'" type="application/x-shockwave-flash" allowfullscreen="true" width="363" height="300"></embed></object>';
                        // echo $value->descricao;
                        break;
                        case 'FLV':
                        $link = explode("v=", $value->link);
                        // echo '<h4>'.$value->titulo  .'</h4>';
                        echo "<div style=\"display: block; height: 305px;\">";
                        echo '<a class="tamanhoVideo" href="'.JURI::root().'/'.$link[$i].'" id="player110" style="display: block; width: 270px; height: 150px;" title=""><object width="363" height="300" id="player110_api" data="'.JURI::root().'/components/com_video_gallery/assets/swf/flowplayer-3.2.7.swf" type="application/x-shockwave-flash"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="quality" value="high"><param name="cachebusting" value="false"><param name="bgcolor" value="#000000"><param name="wmode" value="transparent"><param name="flashvars" value="config={&quot;clip&quot;:{&quot;autoPlay&quot;:false,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;'.JURI::root().'/'.$link[$i].'&quot;},&quot;playerId&quot;:&quot;player110&quot;,&quot;playlist&quot;:[{&quot;autoPlay&quot;:false,&quot;autoBuffering&quot;:true,&quot;url&quot;:&quot;'.JURI::root().'/'.$link[$i].'&quot;}]}"></object></a>';
                        echo "</div>";
                        // echo '<div>'.$value->descricao.'</div>';
                        break;

                        default:
                        break;
                    }
                    ?>
                </div>
                <h2 class="tileHeadline">
                    <?php echo $value->titulo; ?>
                </h2>
                <div class="description">
                   <?php echo $value->descricao; ?>              </div>
                            </div>
            <div class="span2 tileInfo">
                <ul>
                    <li><i class="icon-fixed-width icon-calendar"></i>
                        <?php echo JHtml::Date($value->created, "d/m/y") ?>
                    </li>
                    <li><i class="icon-fixed-width icon-time"></i>
                        <?php echo JHtml::Date($value->created, "h\hm") ?>
                    </li>
                </ul>
            </div>
        </div>
    <?php }  ?>
</div>
    <div class="pagination">
        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
        <p class="counter pull-right">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
    <?php endif; ?>

    <?php echo $this->pagination->getPagesLinks(); ?>
    </div>