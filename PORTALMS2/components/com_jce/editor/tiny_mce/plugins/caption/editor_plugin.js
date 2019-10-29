/*  
 * Captions                 2.1.2
 * @package                 JCE
 * @url                     http://www.joomlacontenteditor.net
 * @copyright               Copyright (C) 2006 - 2013 Ryan Demmer. All rights reserved
 * @license                 GNU/GPL Version 2 - http://www.gnu.org/licenses/gpl-2.0.html
 * @date                    01 August 2013
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * NOTE : Javascript files have been compressed for speed and can be uncompressed using http://jsbeautifier.org/
 */
(function(){var each=tinymce.each;tinymce.create('tinymce.plugins.CaptionPlugin',{init:function(ed,url){var t=this;t.ed=ed;function isCaption(n){return n&&ed.dom.getParent(n,'.jce_caption, .wf_caption');};ed.onInit.add(function(){if(!ed.settings.compress.css)
ed.dom.loadCSS(url+"/css/content.css");});ed.onSetContent.add(function(ed){var dom=ed.dom;each(dom.select('.jce_caption, .wf_caption',ed.getBody()),function(n){dom.addClass(n,'mceItemCaption');});});ed.onPreProcess.add(function(ed,o){var dom=ed.dom;if(o.set){each(dom.select('.jce_caption, .wf_caption',o.node),function(n){dom.addClass(n,'mceItemCaption');});}
if(o.get){each(dom.select('.mceCaption',o.node),function(n){dom.removeClass(n,'mceItemCaption');});}
dom.setStyle(dom.select('.jce_caption, .wf_caption',o.node),'display','inline-table');});ed.addCommand('mceCaption',function(){var se=ed.selection,n=se.getNode();ed.windowManager.open({file:ed.getParam('site_url')+'index.php?option=com_jce&view=editor&layout=plugin&plugin=caption',width:530+ed.getLang('caption.delta_width',0),height:540+ed.getLang('caption.delta_height',0),inline:1,popup_css:false},{plugin_url:url});});ed.addCommand('mceCaptionDelete',function(){var c,m,f,a,se=ed.selection,n=se.getNode();c=ed.dom.getParent(n,'.mceItemCaption');if(c){tinymce.each(ed.dom.select('img',c),function(o){tinymce.each(['top','right','bottom','left'],function(s){m=ed.dom.getStyle(c,'margin-'+s);ed.dom.setStyle(o,'margin-'+s,m);});f=ed.dom.getStyle(c,'float');if(f){ed.dom.setStyle(o,'float',f);}
a=ed.dom.getStyle(c,'text-align');if(a){ed.dom.setStyle(o,'float',a);}});ed.dom.remove(ed.dom.select('span, div',c));ed.dom.remove(c,true);}});ed.addButton('caption_add',{title:'caption.desc',cmd:'mceCaption',image:url+'/img/caption_add.png'});ed.addButton('caption_delete',{title:'caption.delete',cmd:'mceCaptionDelete',image:url+'/img/caption_delete.png'});ed.onNodeChange.add(function(ed,cm,n,co){var s=isCaption(n);if(s&&n.nodeName=='SPAN'&&/mceItemCaption/.test(n.className)){ed.selection.select(n.lastChild);ed.seleciton.collapse();}
if(s&&n.nodeName=='IMG'){ed.selection.select(n);}
cm.setDisabled('formatselect',s);cm.setDisabled('blockquote',s);cm.setActive('caption_delete',s);cm.setActive('caption_add',s);cm.setDisabled('caption_add',!s);cm.setDisabled('caption_delete',!s);if(!s&&n.nodeName=='IMG'){cm.setDisabled('caption_add',false);}
if(s){if(tinymce.isIE&&document.documentMode>=9){if(n.nodeName=='IMG'){ed.selection.select(n);}}}});},getInfo:function(){return{longname:'Caption',author:'Ryan Demmer',authorurl:'http://www.joomlacontenteditor.net',infourl:'http://www.joomlacontenteditor.net',version:'2.1.2'};}});tinymce.PluginManager.add('caption',tinymce.plugins.CaptionPlugin);})();