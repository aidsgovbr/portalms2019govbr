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
var CaptionDialog={settings:{},init:function(){var ed=tinyMCEPopup.editor,n=ed.selection.getNode(),w,h,el,self=this;tinyMCEPopup.resizeToInnerSize();tinyMCEPopup.restoreSelection();el=ed.dom.getParent(n,'.mceItemCaption');if(n.nodeName!='IMG'){n=ed.dom.select('img',el)[0];}
$('#insert').click(function(e){self.insert();e.preventDefault();});$('button#help').click(function(e){$.Plugin.help('caption');e.preventDefault();});$.Plugin.init({selectChange:function(){self.updateCaption();}});TinyMCE_Utils.fillClassList('classlist');TinyMCE_Utils.fillClassList('text_classlist');var iw=parseFloat(n.width);var ih=parseFloat(n.height);w=(iw>=100)?100:iw;h=(w/iw)*ih;if(h>100){h=100;w=(h/ih)*iw;}
$('#caption_image').attr({'src':n.src,'width':w,'height':h});$('#caption_text').css('max-width',w||120);if(el!=null){$('#insert').button('option','label',tinyMCEPopup.getLang('update','Update',true));ed.dom.removeClass(el,'mceVisualAid');tinymce.each(['top','right','bottom','left'],function(o){$('#padding_'+o).val(self.getAttrib(el,'padding-'+o));$('#margin_'+o).val(self.getAttrib(el,'margin-'+o));});$('#border_width').val(function(){var v=self.getAttrib(el,'border-width');if($('option[value="'+v+'"]',this).length==0){$(this).append(new Option(v,v));}
return v;});$('#border_style').val(this.getAttrib(el,'border-style'));$('#border_color').val(this.getAttrib(el,'border-color')).change();if(!$('#border').is(':checked')){$.each(['border_width','border_style','border_color'],function(i,k){$('#'+k).val(self.settings.defaults[k]).change();});}
$('#align').val(this.getAttrib(el,'align'));$('#bgcolor').val(this.getAttrib(el,'background-color')).change();tinymce.each(ed.dom.select('div,span',el),function(c){ed.dom.removeClass(c,'mceVisualAid');if(c.nextSibling&&c.nextSibling.nodeName=='IMG'){$('#text_position').val('top');}
$('#text_align').val(ed.dom.getStyle(c,'text-align'));tinymce.each(['top','right','bottom','left'],function(o){$('#text_padding_'+o).val(self.getAttrib(c,'padding-'+o));});tinymce.each(['top','right','bottom','left'],function(o){$('#text_margin_'+o).val(self.getAttrib(c,'margin-'+o));});$('#text_color').val(self.getAttrib(c,'color')).change();$('#text_bgcolor').val(self.getAttrib(c,'background-color')).change();$('#text').val(c.innerHTML||'');$('#text_classes, #text_classlist').val(ed.dom.getAttrib(c,'class'));});var cls=ed.dom.getAttrib(el,'class');cls=tinymce.trim(cls.replace(/((jce|wf)_caption|mceItemCaption)/gi,' '));$('#classes, #classlist').val(cls);}else{$.each(this.settings.defaults,function(k,v){switch(k){case'padding':case'margin':case'text_padding':case'text_margin':$.each(['top','right','bottom','left'],function(i,s){if(k=='margin'){v=self.getAttrib(n,'margin-'+s);}
$('#'+k+'_'+s).val(v).change();});break;default:$n=$('#'+k);if($n.is(':checkbox')){$n.prop('checked',!!v);}else{$n.val(v).change();}
break;}});$('#align').val(this.getAttrib(n,'align'));$('#text').val(ed.dom.getAttrib(n,'title')||ed.dom.getAttrib(n,'alt')||tinyMCEPopup.getLang('caption_dlg.text','Caption Text'));}
this.setBorder();tinymce.each(['margin','padding','text_padding','text_margin'],function(k){self.setSpacing(k,true);});this.updateText();this.updateCaption();},insert:function(){tinyMCEPopup.restoreSelection();var ed=tinyMCEPopup.editor,el,s=ed.selection,n=s.getNode(),c,w,txt,v,p;var ce={style:ed.dom.serializeStyle(ed.dom.parseStyle($('#caption').get(0).style.cssText)),'class':$('#classes').val()};if(n.nodeName=='IMG'){w=ed.dom.getAttrib(n,'width')||n.width;var styles=ed.dom.parseStyle(n.style.cssText);tinymce.each(['margin','float','padding'],function(k){if(styles[k])
styles[k]='';});styles=ed.dom.serializeStyle(styles);if(!styles){n.removeAttribute('style');}else{ed.dom.setAttrib(n,'style',styles);}
tinymce.each(['margin','padding','float'],function(k){v=ed.dom.getStyle(n,k,true);if(v==''||v==null||v=='undefined'){v=(k=='float')?'none':'auto';ed.dom.setStyle(n,k,v);}});n=ed.dom.getParent(n,'A')||n;}
el=ed.dom.getParent(n,'.mceItemCaption');var ct={style:ed.dom.serializeStyle(ed.dom.parseStyle($('#caption_text').get(0).style.cssText)),'class':$('#text_classes').val()};txt=$('#text').val();ed.undoManager.add();if(el!=null){if(el.nodeName=='DIV'){var span=ed.dom.create('span');ed.dom.replace(span,el,true);el=span;}
ed.dom.setAttribs(el,ce);c=ed.dom.select('span, div',el)[0];if(!c){if(txt){c=ed.dom.create('span',ct,txt);}}else{if(c.nodeName=='DIV'){var span=ed.dom.create('span');ed.dom.replace(span,c,true);c=span;}
if(txt){ed.dom.setAttribs(c,ct);ed.dom.setHTML(c,txt);}else{ed.dom.remove(c);c=null;}}}else{el=ed.dom.create('span',ce);p=n.parentNode||ed.getBody();p.insertBefore(el,n);ed.dom.add(el,n);if(txt){c=ed.dom.create('span',ct,txt);}}
if(c){ed.dom.setStyles(c,{'display':'block'});c.removeAttribute('_mce_style');c.removeAttribute('data-mce-style');if(c){if($('#text_position').val()=='top'){el.insertBefore(c,n);}else{ed.dom.insertAfter(c,n);}}
if(w){ed.dom.setStyle(c,'max-width',w+'px');}}
ed.dom.removeClass(el,'jce_caption');ed.dom.addClass(el,'wf_caption');ed.dom.addClass(el,'mceItemCaption');ed.dom.setStyles(el,{'display':'inline-table'});el.style.width='';tinyMCEPopup.close();},updateText:function(v){if(!v){v=$('#text').val();}
if(/<\w+([^>]*)>/.test(v)){$('#caption_text').html(v);}else{$('#caption_text').text(v);}},updateCaption:function(){var ed=tinyMCEPopup,st,k,v,br,$c=$('#caption'),$ct=$('#caption_text'),m=0,p=0;$('#caption_image').attr('style',$('#style').val());if($('#text').val()){if($('#text_position').val()=='top'){$ct.insertBefore('#caption_image');}else{$ct.insertAfter('#caption_image');}
$ct.css('text-align',$('#text_align').val());tinymce.each(['top','right','bottom','left'],function(o){v=$('#text_padding_'+o).val();p+=v;$ct.css('padding-'+o,/[^a-z]/i.test(v)?v+'px':v);});if(p==0){$ct.css('padding','');}
$.each(['top','right','bottom','left'],function(i,o){v=$('#text_margin_'+o).val();m+=v;$ct.css('margin-'+o,/[^a-z]/i.test(v)?v+'px':v);});if(m==0){$ct.css('margin','');}
$ct.css('color',$('#text_color').val());$ct.css('background-color',$('#text_bgcolor').val());$ct.html($('#text').val());}
$c.css('background-color',$('#bgcolor').val());$c.css('float','');$c.css('vertical-align','');v=$('#align').val();k=/(left|right)/.test(v)?'float':'vertical-align';$c.css(k,v);$.each(['width','color','style'],function(i,k){v='';if($('#border').is(':checked')){v=$('#border_'+k).val();}
if(v=='inherit'){v='';}
if(k=='width'){v=/[^a-z]/i.test(v)?v+'px':v;}
$c.css('border-'+k,v);});p=0;$.each(['top','right','bottom','left'],function(i,k){v=$('#padding_'+k).val();p+=v;$c.css('padding-'+k,/[^a-z]/i.test(v)?v+'px':v);});if(p==0){$c.css('padding','');}
m=0;$.each(['top','right','bottom','left'],function(i,k){v=$('#margin_'+k).val();m+=v;$c.css('margin-'+k,/[^a-z]/i.test(v)?v+'px':v);});if(m==0){$ct.css('margin','');}},getAttrib:function(e,at){var ed=tinyMCEPopup.editor,v,v2;switch(at){case'width':case'height':return ed.dom.getAttrib(e,at)||ed.dom.getStyle(e,at)||'';break;case'align':if(v=ed.dom.getAttrib(e,'align')){return v;}
if(v=ed.dom.getAttrib(e,'text-align')){return v;}
if(v=ed.dom.getStyle(e,'float')){return v;}
if(v=ed.dom.getStyle(e,'vertical-align')){return v;}
break;case'margin-top':case'margin-bottom':case'padding-top':case'padding-bottom':if(v=ed.dom.getStyle(e,at)){return parseInt(v.replace(/[^-\d]+/g,''));}
if(v=ed.dom.getAttrib(e,'vspace')){return parseInt(v.replace(/[^-\d]+/g,''));}
break;case'margin-left':case'margin-right':case'padding-left':case'padding-right':if(v=ed.dom.getStyle(e,at)){return parseInt(v.replace(/[^-\d]+/g,''));}
if(v=ed.dom.getAttrib(e,'hspace')){return parseInt(v.replace(/[^\d]+/g,''));}
break;case'border-width':case'border-style':v='';tinymce.each(['top','right','bottom','left'],function(n){s=at.replace(/-/,'-'+n+'-');sv=ed.dom.getStyle(e,s);if(sv!==''||(sv!=v&&v!=='')){v='';}
if(sv){v=sv;}});if(v!==''){$('#border').prop('checked',true);}
if((at=='border-width'||at=='border-style')&&v===''){v='inherit';}
if(at=='border-color'){v=$.String.toHex(v);}
if(at=='border-width'){if(/[0-9][a-z]/.test(v)){v=parseFloat(v);}}
return v;break;case'color':case'border-color':case'background-color':v=ed.dom.getStyle(e,at);return $.String.toHex(v);break;}},setSpacing:function(k,init){var x=0,s=false;var v=$('#'+k+'_top').val();var $elms=$('#'+k+'_right, #'+k+'_bottom, #'+k+'_left');if(init){$elms.each(function(){if($(this).val()===v){x++;}});s=(x==$elms.length);$elms.prop('disabled',s).prev('label').toggleClass('disabled',s);$('#'+k+'_check').prop('checked',s);}else{s=$('#'+k+'_check').is(':checked');$elms.each(function(){if(s){if(v===''){$('#'+k+'_right, #'+k+'_bottom, #'+k+'_left').each(function(){if(v===''&&$(this).val()!==''){v=$(this).val();}});}
$(this).val(v);}
$(this).prop('disabled',s).prev('label').toggleClass('disabled',s);});$('#'+k+'_top').val(v);this.updateCaption();}},setBorder:function(){var s=$('#border').is(':checked');$('#border~:input, #border~span, #border~label').attr('disabled',!s).toggleClass('disabled',!s);this.updateCaption();},setClasses:function(n,v){var $tmp=$('<span/>').addClass($('#'+n).val()).addClass(v);$('#'+n).val($tmp.attr('class'));},openHelp:function(){$.Plugin.help('caption');}};tinyMCEPopup.onInit.add(CaptionDialog.init,CaptionDialog);