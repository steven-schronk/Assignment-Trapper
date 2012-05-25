<?php
/** Adminer - Compact database management
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/error_reporting(6135);$_e=(!ereg('^(unsafe_raw)?$',ini_get("filter.default"))||ini_get("filter.default_flags"));if($_e){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$b){$je=filter_input_array(constant("INPUT$b"),FILTER_UNSAFE_RAW);if($je){$$b=$je;}}}if(isset($_GET["file"])){header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
base64_decode("AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERAAAAAAETMzEQAAAAATERExAAAAABMRETEAAAAAExERMQAAAAATERExAAAAABMRETEAAAAAEzMzMREREQATERExEhEhABEzMxEhEREAAREREhERIRAAAAARIRESEAAAAAESEiEQAAAAABEREQAAAAAAAAAAD//9UAwP/VAIB/AACAf/AAgH+kAIB/gACAfwAAgH8AAIABAACAAf8AgAH/AMAA/wD+AP8A/wAIAf+B1QD//9UA");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:1em 0 0;}form{margin:0;}table{margin:1em 20px 0 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}thead td,thead th{background:#ddf;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:.8em .5em 0 0;border:1px solid #999;}p{margin:.8em 20px 0 0;}img{vertical-align:middle;border:0;}td img{max-width:200px;max-height:200px;}code{background:#eee;}tr:hover td,tr:hover th{background:#ddf;}pre{margin:1em 0 0;}.version{color:#777;font-size:67%;}.js .hidden,.nojs .jsonly{display:none;}.nowrap td,.nowrap th,td.nowrap{white-space:pre;}.wrap td{white-space:normal;}.error{color:red;background:#fee;}.error b{background:#fff;font-weight:normal;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:1em 20px 0 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.time{color:silver;font-size:70%;}.function{text-align:right;}.number{text-align:right;}.datetime{text-align:right;}.type{width:15ex;width:auto\\9;}.options select{width:20ex;width:auto\\9;}.active{font-weight:bold;}.sqlarea{width:98%;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#loader{position:fixed;top:0;left:18em;z-index:1;}#h1{color:#777;text-decoration:none;font-style:italic;}#version{font-size:67%;color:red;}#schema{margin-left:60px;position:relative;}#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}.rtl h2{margin:0 -18px 20px 0;}.rtl p,.rtl table,.rtl .error,.rtl .message{margin:1em 0 0 20px;}.rtl #content{margin:2em 21em 0 0;padding:10px 0 20px 20px;}.rtl #breadcrumb{left:auto;right:21em;margin:0 -18px 0 0;}.rtl #lang,.rtl #menu{left:auto;right:0;}@media print{#lang,#menu{display:none;}#content{margin-left:1em;}#breadcrumb{left:1em;}.nowrap td,.nowrap th,td.nowrap{white-space:normal;}}';}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");?>
function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function cookie(assign,days){var date=new Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date;}
function verifyVersion(){cookie('adminer_version=0',1);var script=document.createElement('script');script.src=location.protocol+'//www.adminer.org/version.php';document.body.appendChild(script);}
function selectValue(select){var selected=select.options[select.selectedIndex];return((selected.attributes.value||{}).specified?selected.value:selected.text);}
function formCheck(el,name){var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;}}}
function formUncheck(id){document.getElementById(id).checked=false;}
function formChecked(el,name){var checked=0;var elems=el.form.elements;for(var i=0;i<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}
return checked;}
function tableClick(event){var el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^(table|a|input|textarea)$/i.test(el.tagName)){return;}
el=el.parentNode;}
el=el.firstChild.firstChild;el.click&&el.click();el.onclick&&el.onclick();}
function setHtml(id,html){var el=document.getElementById(id);if(el){if(html==undefined){el.parentNode.innerHTML='&nbsp;';}else{el.innerHTML=html.replace(/<noscript>.*<\/noscript>/i,'');}}}
function nodePosition(el){var pos=0;while(el=el.previousSibling){pos++;}
return pos;}
function pageClick(href,page,event){if(!isNaN(page)&&page){href+=(page!=1?'&page='+(page-1):'');if(!ajaxSend(href)){location.href=href;}}}
function selectAddRow(field){field.onchange=function(){};var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[\d+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[\d+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);}
function textareaKeydown(target,event){if(!event.shiftKey&&!event.altKey&&!event.ctrlKey&&!event.metaKey){if(event.keyCode==9){if(target.setSelectionRange){var start=target.selectionStart;var scrolled=target.scrollTop;target.value=target.value.substr(0,start)+'\t'+target.value.substr(target.selectionEnd);target.setSelectionRange(start+1,start+1);target.scrollTop=scrolled;return false;}else if(target.createTextRange){document.selection.createRange().text='\t';return false;}}
if(event.keyCode==27){var els=target.form.elements;for(var i=1;i<els.length;i++){if(els[i-1]==target){els[i].focus();break;}}
return false;}}
return true;}
function bodyKeydown(event){var target=event.target||event.srcElement;if(event.ctrlKey&&(event.keyCode==13||event.keyCode==10)&&!event.altKey&&!event.metaKey&&/select|textarea/i.test(target.tagName)){target.blur();if((!target.form.onsubmit||target.form.onsubmit()!==false)&&!ajaxForm(target.form)){target.form.submit();}
return false;}}
function editingKeydown(event){if((event.keyCode==40||event.keyCode==38)&&event.ctrlKey&&!event.altKey&&!event.metaKey){var target=event.target||event.srcElement;var sibling=(event.keyCode==40?'nextSibling':'previousSibling');var el=target.parentNode.parentNode[sibling];if(el&&(/^tr$/i.test(el.tagName)||(el=el[sibling]))&&/^tr$/i.test(el.tagName)&&(el=el.childNodes[nodePosition(target.parentNode)])&&(el=el.childNodes[nodePosition(target)])){el.focus();}
return false;}
return true;}
function functionChange(select){var input=select.form[select.name.replace(/^function/,'fields')];if(selectValue(select)){if(input.origMaxLength===undefined){input.origMaxLength=input.maxLength;}
input.removeAttribute('maxlength');}else if(input.origMaxLength>=0){input.maxLength=input.origMaxLength;}}
function ajax(url,callback,data){var xmlhttp=(window.XMLHttpRequest?new XMLHttpRequest():(window.ActiveXObject?new ActiveXObject('Microsoft.XMLHTTP'):false));if(xmlhttp){xmlhttp.open((data?'POST':'GET'),url);if(data){xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}
xmlhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==4){callback(xmlhttp);}};xmlhttp.send(data);}
return xmlhttp;}
function ajaxSetHtml(url){return ajax(url,function(xmlhttp){if(xmlhttp.status){var data=eval('('+xmlhttp.responseText+')');for(var key in data){setHtml(key,data[key]);}}});}
function replaceFavicon(href){var favicon=document.getElementById('favicon');favicon.href=href;favicon.parentNode.appendChild(favicon);}
var ajaxState=0;function ajaxSend(url,data,popState){if(!history.pushState){return false;}
var currentState=++ajaxState;onblur=function(){replaceFavicon(location.pathname+'?file=loader.gif&amp;version=3.2.2');};setHtml('loader','<img src="'+location.pathname+'?file=loader.gif&amp;version=3.2.2" alt="">');return ajax(url,function(xmlhttp){if(currentState==ajaxState){var title=xmlhttp.getResponseHeader('X-AJAX-Title');if(title){document.title=decodeURIComponent(title);}
var redirect=xmlhttp.getResponseHeader('X-AJAX-Redirect');if(redirect){return ajaxSend(redirect,'',popState);}
onblur=function(){};replaceFavicon(location.pathname+'?file=favicon.ico&amp;version=3.2.2');if(!xmlhttp.status){setHtml('loader','');}else{if(!popState){if(data||url!=location.href){history.pushState(data,'',url);}
scrollTo(0,0);}
setHtml('content',xmlhttp.responseText);var content=document.getElementById('content');var scripts=content.getElementsByTagName('script');var length=scripts.length;for(var i=0;i<length;i++){var script=document.createElement('script');script.text=scripts[i].text;content.appendChild(script);}
var as=document.getElementById('menu').getElementsByTagName('a');var href=location.href.replace(/(&(sql=|dump=|(select|table)=[^&]*)).*/,'$1');for(var i=0;i<as.length;i++){if(href==as[i].href){as[i].className='active';}else if(as[i].className=='active'){as[i].className='';}}
var dump=document.getElementById('dump');if(dump){var match=/&(select|table)=([^&]+)/.exec(href);dump.href=dump.href.replace(/[^=]+$/,'')+(match?match[2]:'');}
if(window.jush){jush.highlight_tag('code',0);}}}},data);}
onpopstate=function(event){if(ajaxState||event.state){ajaxSend(location.href,(event.state&&confirm(areYouSure)?event.state:''),1);}else{ajaxState++;}}
function ajaxForm(form,data){if(/&(database|scheme|create|view|sql|user|dump|call)=/.test(location.href)&&!/\./.test(data)){return false;}
var params=[];for(var i=0;i<form.elements.length;i++){var el=form.elements[i];if(/file/i.test(el.type)&&el.value){return false;}else if(el.name&&(!/checkbox|radio|submit|file/i.test(el.type)||el.checked)){params.push(encodeURIComponent(el.name)+'='+encodeURIComponent(/select/i.test(el.tagName)?selectValue(el):el.value));}}
if(data){params.push(data);}
if(form.method=='post'){return ajaxSend((/\?/.test(form.action)?form.action:location.href),params.join('&'));}
return ajaxSend((form.action||location.href).replace(/\?.*/,'')+'?'+params.join('&'));}
function selectDblClick(td,event,text){td.ondblclick=function(){};var pos=event.rangeOffset;var value=(td.firstChild.alt?td.firstChild.alt:(td.textContent?td.textContent:td.innerText));var input=document.createElement(text?'textarea':'input');input.style.width=Math.max(td.clientWidth-14,20)+'px';if(text){var rows=1;value.replace(/\n/g,function(){rows++;});input.rows=rows;}
if(value=='\u00A0'||td.getElementsByTagName('i').length){value='';}
if(document.selection){var range=document.selection.createRange();range.moveToPoint(event.clientX,event.clientY);var range2=range.duplicate();range2.moveToElementText(td);range2.setEndPoint('EndToEnd',range);pos=range2.text.length;}
td.innerHTML='';td.appendChild(input);input.focus();if(text==2){return ajax(location.href+'&'+encodeURIComponent(td.id)+'=',function(xmlhttp){if(xmlhttp.status){input.value=xmlhttp.responseText;input.name=td.id;}});}
input.value=value;input.name=td.id;input.selectionStart=pos;input.selectionEnd=pos;if(document.selection){var range=document.selection.createRange();range.moveEnd('character',-input.value.length+pos);range.select();}}
function bodyClick(event,db,ns){if(event.button||event.ctrlKey||event.shiftKey||event.altKey||event.metaKey){return;}
if(event.getPreventDefault?event.getPreventDefault():event.returnValue===false){return false;}
var el=event.target||event.srcElement;if(/^a$/i.test(el.parentNode.tagName)){el=el.parentNode;}
if(/^a$/i.test(el.tagName)&&!/^:|#|&download=/i.test(el.getAttribute('href'))&&/[&?]username=/.test(el.href)){var match=/&db=([^&]*)/.exec(el.href);var match2=/&ns=([^&]*)/.exec(el.href);return!(db==(match?match[1]:'')&&ns==(match2?match2[1]:'')&&ajaxSend(el.href));}
if(/^input$/i.test(el.tagName)&&/image|submit/.test(el.type)){return!ajaxForm(el.form,(el.name?encodeURIComponent(el.name)+(el.type=='image'?'.x':'')+'=1':''));}
return true;}
function eventStop(event){if(event.stopPropagation){event.stopPropagation();}else{event.cancelBubble=true;}}
var jushRoot=location.protocol + '//www.adminer.org/static/';function bodyLoad(version){if(history.state!==undefined){onpopstate(history);}
if(jushRoot){var script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank" rel="noreferrer"';jush.urls.sql_sqlset=jush.urls.sql[0]=jush.urls.sqlset[0]=jush.urls.sqlstatus[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';var pgsql='http://www.postgresql.org/docs/'+version+'/static/';jush.urls.pgsql_pgsqlset=jush.urls.pgsql[0]=pgsql+'$key';jush.urls.pgsqlset[0]=pgsql+'runtime-config-$key.html#GUC-$1';jush.style(jushRoot+'jush.css');if(window.jushLinks){jush.custom_links=jushLinks;}
jush.highlight_tag('code',0);}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}}
function formField(form,name){for(var i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}
function typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}
function loginDriver(driver){var trs=driver.parentNode.parentNode.parentNode.rows;for(var i=1;i<trs.length;i++){trs[i].className=(/sqlite/.test(driver.value)?'hidden':'');}}
var added='.',rowCount;function delimiterEqual(val,a,b){return(val==a+'_'+b||val==a+b||val==a+b.charAt(0).toUpperCase()+b.substr(1));}
function idfEscape(s){return s.replace(/`/,'``');}
function editingNameChange(field){var name=field.name.substr(0,field.name.length-7);var type=formField(field.form,name+'[type]');var opts=type.options;var candidate;var val=field.value;for(var i=opts.length;i--;){var match=/(.+)`(.+)/.exec(opts[i].value);if(!match){if(candidate&&i==opts.length-2&&val==opts[candidate].value.replace(/.+`/,'')&&name=='fields[1]'){return;}
break;}
var table=match[1];var column=match[2];var tables=[table,table.replace(/s$/,''),table.replace(/es$/,'')];for(var j=0;j<tables.length;j++){table=tables[j];if(val==column||val==table||delimiterEqual(val,table,column)||delimiterEqual(val,column,table)){if(candidate){return;}
candidate=i;break;}}}
if(candidate){type.selectedIndex=candidate;type.onchange();}}
function editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}
var match=/(\d+)(\.\d+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var input=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}
if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}
tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}
added+='0';rowCount++;return true;}
function editingRemoveRow(button){var field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
var lastType='';function editingTypeChange(type){var name=type.name.substr(0,type.name.length-6);var text=selectValue(type);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}
if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}
if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}
if(el.name==name+'[on_delete]'){el.className=(/`/.test(text)?'':'hidden');}}}
function editingLengthFocus(field){var td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var edit=document.getElementById('enum-edit');var val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}
function editingLengthBlur(edit){var field=edit.parentNode.firstChild;var val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}
function columnShow(checked,column){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}
function partitionByChange(el){var partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}
function partitionNameChange(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreignAddRow(field){field.onchange=function(){};var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);}
function indexesAddRow(field){field.onchange=function(){};var row=field.parentNode.parentNode.cloneNode(true);var spans=row.getElementsByTagName('span');for(var i=0;i<spans.length-1;i++){row.removeChild(spans[i]);}
var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[\d+/,'$&1');selects[i].selectedIndex=0;}
var input=row.getElementsByTagName('input')[0];input.name=input.name.replace(/indexes\[\d+/,'$&1');input.value='';field.parentNode.parentNode.parentNode.appendChild(row);}
function indexesAddColumn(field){field.onchange=function(){};var column=field.parentNode.cloneNode(true);var select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[\d+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[\d+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);select=field.form[field.name.replace(/\].*/,'][type]')];if(!select.selectedIndex){select.selectedIndex=3;}}
var that,x,y,em,tablePos;function schemaMousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schemaMousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var lineSet={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var isTop=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';isTop=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!lineSet[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-\d+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(isTop){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(isTop?-1:1)*shift)/em+'em';}
lineSet[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schemaMouseup(ev,db){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var s='';for(var key in tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}
s=encodeURIComponent(s.substr(1));var link=document.getElementById('schema-link');link.href=link.href.replace(/[^=]+$/,'')+s;cookie('adminer_schema-'+db+'='+s,30);}}<?php
}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7");break;case"cross.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=");break;case"up.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=");break;case"down.gif":echo
base64_decode("R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=");break;case"arrow.gif":echo
base64_decode("R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=");break;case"loader.gif":echo
base64_decode("R0lGODlhEAAQAPIAAP///wAAAMLCwkJCQgAAAGJiYoKCgpKSkiH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAADMwi63P4wyklrE2MIOggZnAdOmGYJRbExwroUmcG2LmDEwnHQLVsYOd2mBzkYDAdKa+dIAAAh+QQJCgAAACwAAAAAEAAQAAADNAi63P5OjCEgG4QMu7DmikRxQlFUYDEZIGBMRVsaqHwctXXf7WEYB4Ag1xjihkMZsiUkKhIAIfkECQoAAAAsAAAAABAAEAAAAzYIujIjK8pByJDMlFYvBoVjHA70GU7xSUJhmKtwHPAKzLO9HMaoKwJZ7Rf8AYPDDzKpZBqfvwQAIfkECQoAAAAsAAAAABAAEAAAAzMIumIlK8oyhpHsnFZfhYumCYUhDAQxRIdhHBGqRoKw0R8DYlJd8z0fMDgsGo/IpHI5TAAAIfkECQoAAAAsAAAAABAAEAAAAzIIunInK0rnZBTwGPNMgQwmdsNgXGJUlIWEuR5oWUIpz8pAEAMe6TwfwyYsGo/IpFKSAAAh+QQJCgAAACwAAAAAEAAQAAADMwi6IMKQORfjdOe82p4wGccc4CEuQradylesojEMBgsUc2G7sDX3lQGBMLAJibufbSlKAAAh+QQJCgAAACwAAAAAEAAQAAADMgi63P7wCRHZnFVdmgHu2nFwlWCI3WGc3TSWhUFGxTAUkGCbtgENBMJAEJsxgMLWzpEAACH5BAkKAAAALAAAAAAQABAAAAMyCLrc/jDKSatlQtScKdceCAjDII7HcQ4EMTCpyrCuUBjCYRgHVtqlAiB1YhiCnlsRkAAAOwAAAAAAAAAAAA==");break;}}exit;}function
connection(){global$g;return$g;}function
idf_unescape($Ba){$bb=substr($Ba,-1);return
str_replace($bb.$bb,$bb,substr($Ba,1,-1));}function
escape_string($b){return
substr(q($b),1,-1);}function
remove_slashes($Ya){if(get_magic_quotes_gpc()){while(list($c,$b)=each($Ya)){foreach($b
as$_a=>$s){unset($Ya[$c][$_a]);if(is_array($s)){$Ya[$c][stripslashes($_a)]=$s;$Ya[]=&$Ya[$c][stripslashes($_a)];}else{$Ya[$c][stripslashes($_a)]=($_e?$s:stripslashes($s));}}}}}function
bracket_escape($Ba,$uf=false){static$de=array(':'=>':1',']'=>':2','['=>':3');return
strtr($Ba,($uf?array_flip($de):$de));}function
h($T){return
htmlspecialchars($T,ENT_QUOTES);}function
nbsp($T){return(trim($T)!=""?h($T):"&nbsp;");}function
nl_br($T){return
str_replace("\n","<br>",$T);}function
checkbox($f,$o,$Ja,$Qd="",$Ld=""){static$D=0;$D++;$e="<input type='checkbox'".($f?" name='$f' value='".h($o)."'":" class='jsonly'").($Ja?" checked":"").($Ld?" onclick=\"$Ld\"":"")." id='checkbox-$D'>";return($Qd!=""?"<label for='checkbox-$D'>$e".h($Qd)."</label>":$e);}function
optionlist($Hc,$Af=null,$re=false){$e="";foreach($Hc
as$_a=>$s){$ve=array($_a=>$s);if(is_array($s)){$e.='<optgroup label="'.h($_a).'">';$ve=$s;}foreach($ve
as$c=>$b){$e.='<option'.($re||is_string($c)?' value="'.h($c).'"':'').(($re||is_string($c)?(string)$c:$b)===$Af?' selected':'').'>'.h($b);}if(is_array($s)){$e.='</optgroup>';}}return$e;}function
html_select($f,$Hc,$o="",$pb=true){if($pb){return"<select name='".h($f)."'".(is_string($pb)?" onchange=\"$pb\"":"").">".optionlist($Hc,$o)."</select>";}$e="";foreach($Hc
as$c=>$b){$e.="<label><input type='radio' name='".h($f)."' value='".h($c)."'".($c==$o?" checked":"").">".h($b)."</label>";}return$e;}function
confirm($Ec="",$kf=false){return" onclick=\"".($kf?"eventStop(event); ":"")."return confirm('".'Are you sure?'.($Ec?" (' + $Ec + ')":"")."');\"";}function
js_escape($T){return
addcslashes($T,"\r\n'\\/");}function
ini_bool($lf){$b=ini_get($lf);return(eregi('^(on|true|yes)$',$b)||(int)$b);}function
sid(){static$e;if(!isset($e)){$e=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));}return$e;}function
q($T){global$g;return$g->quote($T);}function
get_vals($j,$ea=0){global$g;$e=array();$k=$g->query($j);if(is_object($k)){while($a=$k->fetch_row()){$e[]=$a[$ea];}}return$e;}function
get_key_vals($j,$J=null){global$g;if(!is_object($J)){$J=$g;}$e=array();$k=$J->query($j);if(is_object($k)){while($a=$k->fetch_row()){$e[$a[0]]=$a[1];}}return$e;}function
get_rows($j,$J=null,$q="<p class='error'>"){global$g;if(!is_object($J)){$J=$g;}$e=array();$k=$J->query($j);if(is_object($k)){while($a=$k->fetch_assoc()){$e[]=$a;}}elseif(!$k&&$g->error&&$q&&defined("PAGE_HEADER")){echo$q.error()."\n";}return$e;}function
unique_array($a,$z){foreach($z
as$t){if(ereg("PRIMARY|UNIQUE",$t["type"])){$e=array();foreach($t["columns"]as$c){if(!isset($a[$c])){continue
2;}$e[$c]=$a[$c];}return$e;}}$e=array();foreach($a
as$c=>$b){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$c)){$e[$c]=$b;}}return$e;}function
where($x){global$r;$e=array();foreach((array)$x["where"]as$c=>$b){$e[]=idf_escape(bracket_escape($c,1)).(ereg('\\.',$b)||$r=="mssql"?" LIKE ".exact_value(addcslashes($b,"%_")):" = ".exact_value($b));}foreach((array)$x["null"]as$c){$e[]=idf_escape($c)." IS NULL";}return
implode(" AND ",$e);}function
where_check($b){parse_str($b,$Pd);remove_slashes(array(&$Pd));return
where($Pd);}function
where_link($h,$ea,$o,$Xe="="){return"&where%5B$h%5D%5Bcol%5D=".urlencode($ea)."&where%5B$h%5D%5Bop%5D=".urlencode((isset($o)?$Xe:"IS NULL"))."&where%5B$h%5D%5Bval%5D=".urlencode($o);}function
cookie($f,$o){global$Wb;$ic=array($f,(ereg("\n",$o)?"":$o),time()+2592000,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$Wb);if(version_compare(PHP_VERSION,'5.2.0')>=0){$ic[]=true;}return
call_user_func_array('setcookie',$ic);}function
restart_session(){if(!ini_bool("session.use_cookies")){session_start();}}function&get_session($c){return$_SESSION[$c][DRIVER][SERVER][$_GET["username"]];}function
set_session($c,$b){$_SESSION[$c][DRIVER][SERVER][$_GET["username"]]=$b;}function
auth_url($qb,$I,$X){global$ra;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($ra))."|username|".session_name()),$m);return"$m[1]?".(sid()?SID."&":"").($qb!="server"||$I!=""?urlencode($qb)."=".urlencode($I)."&":"")."username=".urlencode($X).($m[2]?"&$m[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($O,$ga=null){if(isset($ga)){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',(isset($O)?$O:$_SERVER["REQUEST_URI"]))][]=$ga;}if(isset($O)){if($O==""){$O=".";}header((is_ajax()?"X-AJAX-Redirect":"Location").": $O");exit;}}function
query_redirect($j,$O,$ga,$Lc=true,$Oe=true,$Ne=false){global$g,$q,$n;if($Oe){$Ne=!$g->query($j);}$qd="";if($j){$qd=$n->messageQuery("$j;");}if($Ne){$q=error().$qd;return
false;}if($Lc){redirect($O,$ga.$qd);}return
true;}function
queries($j=null){global$g;static$te=array();if(!isset($j)){return
implode(";\n",$te);}$te[]=(ereg(';$',$j)?"DELIMITER ;;\n$j;\nDELIMITER ":$j);return$g->query($j);}function
apply_queries($j,$la,$if='table'){foreach($la
as$l){if(!queries("$j ".$if($l))){return
false;}}return
true;}function
queries_redirect($O,$ga,$Lc){return
query_redirect(queries(),$O,$ga,$Lc,false,!$Lc);}function
remove_from_uri($Ia=""){return
substr(preg_replace("~(?<=[?&])($Ia".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($K,$Qe){return" ".($K==$Qe?$K+1:'<a href="'.h(remove_from_uri("page").($K?"&page=$K":"")).'">'.($K+1)."</a>");}function
get_file($c,$pd=false){$wa=$_FILES[$c];if(!$wa||$wa["error"]){return$wa["error"];}$e=file_get_contents($pd&&ereg('\\.gz$',$wa["name"])?"compress.zlib://$wa[tmp_name]":($pd&&ereg('\\.bz2$',$wa["name"])?"compress.bzip2://$wa[tmp_name]":$wa["tmp_name"]));if($pd){$jb=substr($e,0,3);if(function_exists("iconv")&&ereg("^\xFE\xFF|^\xFF\xFE",$jb,$Kf)){$e=iconv("utf-16","utf-8",$e);}elseif($jb=="\xEF\xBB\xBF"){$e=substr($e,3);}}return$e;}function
upload_error($q){$le=($q==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):null);return($q?'Unable to upload a file.'.($le?" ".sprintf('Maximum allowed file size is %sB.',$le):""):'File does not exist.');}function
odd($e=' class="odd"'){static$h=0;if(!$e){$h=-1;}return($h++%
2?$e:'');}function
json_row($c,$b=null){static$ma=true;if($ma){echo"{";}if($c!=""){echo($ma?"":",")."\n\t\"".addcslashes($c,"\r\n\"\\").'": '.(isset($b)?'"'.addcslashes($b,"\r\n\"\\").'"':'undefined');$ma=false;}else{echo"\n}\n";$ma=true;}}function
is_utf8($b){return(preg_match('~~u',$b)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$b));}function
repeat_pattern($U,$xa){return
str_repeat("$U{0,65535}",$xa/65535)."$U{0,".($xa
%
65535)."}";}function
shorten_utf8($T,$xa=80,$nf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$xa).")($)?)u",$T,$m)){preg_match("(^(".repeat_pattern("[\t\r\n -~]",$xa).")($)?)",$T,$m);}return
h($m[1]).$nf.(isset($m[2])?"":"<i>...</i>");}function
friendly_url($b){return
preg_replace('~[^a-z0-9_]~i','-',$b);}function
hidden_fields($Ya,$xf=array()){while(list($c,$b)=each($Ya)){if(is_array($b)){foreach($b
as$_a=>$s){$Ya[$c."[$_a]"]=$s;}}elseif(!in_array($c,$xf)){echo'<input type="hidden" name="'.h($c).'" value="'.h($b).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
column_foreign_keys($l){global$n;$e=array();foreach($n->foreignKeys($l)as$F){foreach($F["source"]as$b){$e[$b][]=$F;}}return$e;}function
enum_input($N,$Ca,$d,$o,$Bb=null){global$n;preg_match_all("~'((?:[^']|'')*)'~",$d["length"],$fa);$e=(isset($Bb)?"<label><input type='$N'$Ca value='$Bb'".((is_array($o)?in_array($Bb,$o):$o===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($fa[1]as$h=>$b){$b=stripcslashes(str_replace("''","'",$b));$Ja=(is_int($o)?$o==$h+1:(is_array($o)?in_array($h+1,$o):$o===$b));$e.=" <label><input type='$N'$Ca value='".($h+1)."'".($Ja?' checked':'').'>'.h($n->editVal($b,$d)).'</label>';}return$e;}function
input($d,$o,$_){global$ba,$n,$r;$f=h(bracket_escape($d["field"]));echo"<td class='function'>";$Ad=($r=="mssql"&&$d["auto_increment"]);if($Ad&&!$_POST["save"]){$_=null;}$W=(isset($_GET["select"])||$Ad?array("orig"=>'original'):array())+$n->editFunctions($d);$Ca=" name='fields[$f]'";if($d["type"]=="enum"){echo
nbsp($W[""])."<td>".$n->editInput($_GET["edit"],$d,$Ca,$o);}else{$ma=0;foreach($W
as$c=>$b){if($c===""||!$b){break;}$ma++;}$pb=($ma?" onchange=\"var f = this.form['function[".js_escape($f)."]']; if ($ma > f.selectedIndex) f.selectedIndex = $ma;\"":"");$Ca.=$pb;echo(count($W)>1?html_select("function[$f]",$W,!isset($_)||in_array($_,$W)||isset($W[$_])?$_:"","functionChange(this);"):nbsp(reset($W))).'<td>';$Fd=$n->editInput($_GET["edit"],$d,$Ca,$o);if($Fd!=""){echo$Fd;}elseif($d["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$d["length"],$fa);foreach($fa[1]as$h=>$b){$b=stripcslashes(str_replace("''","'",$b));$Ja=(is_int($o)?($o>>$h)&1:in_array($b,explode(",",$o),true));echo" <label><input type='checkbox' name='fields[$f][$h]' value='".(1<<$h)."'".($Ja?' checked':'')."$pb>".h($n->editVal($b,$d)).'</label>';}}elseif(ereg('blob|bytea|raw|file',$d["type"])&&ini_bool("file_uploads")){echo"<input type='file' name='fields-$f'$pb>";}elseif(ereg('text|lob',$d["type"])){echo"<textarea ".($r!="sqlite"||ereg("\n",$o)?"cols='50' rows='12'":"cols='30' rows='1' style='height: 1.2em;'")."$Ca>".h($o).'</textarea>';}else{$gd=(!ereg('int',$d["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$d["length"],$m)?((ereg("binary",$d["type"])?2:1)*$m[1]+($m[3]?1:0)+($m[2]&&!$d["unsigned"]?1:0)):($ba[$d["type"]]?$ba[$d["type"]]+($d["unsigned"]?0:1):0));echo"<input value='".h($o)."'".($gd?" maxlength='$gd'":"").(ereg('char|binary',$d["type"])&&$gd>20?" size='40'":"")."$Ca>";}}}function
process_input($d){global$n;$Ba=bracket_escape($d["field"]);$_=$_POST["function"][$Ba];$o=$_POST["fields"][$Ba];if($d["type"]=="enum"){if($o==-1){return
false;}if($o==""){return"NULL";}return+$o;}if($d["auto_increment"]&&$o==""){return
null;}if($_=="orig"){return
false;}if($_=="NULL"){return"NULL";}if($d["type"]=="set"){return
array_sum((array)$o);}if(ereg('blob|bytea|raw|file',$d["type"])&&ini_bool("file_uploads")){$wa=get_file("fields-$Ba");if(!is_string($wa)){return
false;}return
q($wa);}return$n->processInput($d,$o,$_);}function
search_tables(){global$n,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$Z=false;foreach(table_status()as$l=>$H){$f=$n->tableName($H);if(isset($H["Engine"])&&$f!=""&&(!$_POST["tables"]||in_array($l,$_POST["tables"]))){$k=$g->query("SELECT".limit("1 FROM ".table($l)," WHERE ".implode(" AND ",$n->selectSearchProcess(fields($l),array())),1));if($k->fetch_row()){if(!$Z){echo"<ul>\n";$Z=true;}echo"<li><a href='".h(ME."select=".urlencode($l)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$f</a>\n";}}}echo($Z?"</ul>":"<p class='message'>".'No tables.')."\n";}function
dump_headers($Kc,$hd=false){global$n;$e=$n->dumpHeaders($Kc,$hd);$Aa=$_POST["output"];if($Aa!="text"){header("Content-Disposition: attachment; filename=".($Kc!=""?friendly_url($Kc):"dump").".$e".($Aa!="file"&&!ereg('[^0-9a-z]',$Aa)?".$Aa":""));}session_write_close();return$e;}function
dump_csv($a){foreach($a
as$c=>$b){if(preg_match("~[\"\n,;\t]~",$b)||$b===""){$a[$c]='"'.str_replace('"','""',$b).'"';}}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$a)."\r\n";}function
apply_sql_function($_,$ea){return($_?($_=="unixepoch"?"DATETIME($ea, '$_')":($_=="count distinct"?"COUNT(DISTINCT ":strtoupper("$_("))."$ea)"):$ea);}function
password_file(){$Dc=ini_get("upload_tmp_dir");if(!$Dc){if(function_exists('sys_get_temp_dir')){$Dc=sys_get_temp_dir();}else{$gb=@tempnam("","");if(!$gb){return
false;}$Dc=dirname($gb);unlink($gb);}}$gb="$Dc/adminer.key";$e=@file_get_contents($gb);if($e){return$e;}$ya=@fopen($gb,"w");if($ya){$e=md5(uniqid(mt_rand(),true));fwrite($ya,$e);fclose($ya);}return$e;}function
is_mail($We){$be='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Yb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$U="$be+(\\.$be+)*@($Yb?\\.)+$Yb";return
preg_match("(^$U(,\\s*$U)*\$)i",$We);}function
is_url($T){$Yb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($Yb?\\.)+$Yb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$T,$m)?strtolower($m[1]):"");}function
print_fieldset($D,$Pe,$Ue=false){echo"<fieldset><legend><a href='#fieldset-$D' onclick=\"return !toggle('fieldset-$D');\">$Pe</a></legend><div id='fieldset-$D'".($Ue?"":" class='hidden'").">\n";}function
bold($Te){return($Te?" class='active'":"");}global$n,$g,$ra,$id,$ib,$q,$W,$zb,$Wb,$Eb,$r,$Re,$Hf,$Ma,$Gc,$B,$Gf,$ba,$Db,$bc;if(!isset($_SERVER["REQUEST_URI"])){$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"].($_SERVER["QUERY_STRING"]!=""?"?$_SERVER[QUERY_STRING]":"");}$Wb=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_name("adminer_sid");$ic=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$Wb);if(version_compare(PHP_VERSION,'5.2.0')>=0){$ic[]=true;}call_user_func_array('session_set_cookie_params',$ic);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE));if(function_exists("set_magic_quotes_runtime")){set_magic_quotes_runtime(false);}@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'en';}function
lang($tf,$wb){$cc=($wb==1||(!$wb&&'en'=='fr')?0:('en'=='sl'&&(!$wb||$wb>2)?1:0)+((!$wb||$wb>=5)&&ereg('cs|sk|ru|sl|pl','en')?2:1));return
sprintf($tf[$cc],$wb);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$error;function
__construct(){}function
dsn($rf,$X,$ja,$Ze='auth_error'){set_exception_handler($Ze);parent::__construct($rf,$X,$ja);restore_exception_handler();$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($j,$Vb=false){$k=parent::query($j);if(!$k){$_f=$this->errorInfo();$this->error=$_f[2];return
false;}$this->store_result($k);return$k;}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result($k=null){if(!$k){$k=$this->_result;}if($k->columnCount()){$k->num_rows=$k->rowCount();return$k;}$this->affected_rows=$k->rowCount();return
true;}function
next_result(){return$this->_result->nextRowset();}function
result($j,$d=0){$k=$this->query($j);if(!$k){return
false;}$a=$k->fetch();return$a[$d];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$a=(object)$this->getColumnMeta($this->_offset++);$a->orgtable=$a->table;$a->orgname=$a->name;$a->charsetnr=(in_array("blob",$a->flags)?63:0);return$a;}}}$ra=array();$ra=array("server"=>"MySQL")+$ra;if(!defined("DRIVER")){$df=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($I,$X,$ja){mysqli_report(MYSQLI_REPORT_OFF);list($bf,$Fc)=explode(":",$I,2);$e=@$this->real_connect(($I!=""?$bf:ini_get("mysqli.default_host")),("$I$X"!=""?$X:ini_get("mysqli.default_user")),("$I$X$ja"!=""?$ja:ini_get("mysqli.default_pw")),null,(is_numeric($Fc)?$Fc:ini_get("mysqli.default_port")),(!is_numeric($Fc)?$Fc:null));if($e){if(method_exists($this,'set_charset')){$this->set_charset("utf8");}else{$this->query("SET NAMES utf8");}}return$e;}function
result($j,$d=0){$k=$this->query($j);if(!$k){return
false;}$a=$k->fetch_array();return$a[$d];}function
quote($T){return"'".$this->escape_string($T)."'";}}}elseif(extension_loaded("mysql")){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$error,$_link,$_result;function
connect($I,$X,$ja){$this->_link=@mysql_connect(($I!=""?$I:ini_get("mysql.default_host")),("$I$X"!=""?$X:ini_get("mysql.default_user")),("$I$X$ja"!=""?$ja:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset')){mysql_set_charset("utf8",$this->_link);}else{$this->query("SET NAMES utf8");}}else{$this->error=mysql_error();}return(bool)$this->_link;}function
quote($T){return"'".mysql_real_escape_string($T,$this->_link)."'";}function
select_db($jc){return
mysql_select_db($jc,$this->_link);}function
query($j,$Vb=false){$k=@($Vb?mysql_unbuffered_query($j,$this->_link):mysql_query($j,$this->_link));if(!$k){$this->error=mysql_error($this->_link);return
false;}if($k===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($k);}function
multi_query($j){return$this->_result=$this->query($j);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($j,$d=0){$k=$this->query($j);if(!$k||!$k->num_rows){return
false;}return
mysql_result($k->_result,0,$d);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($k){$this->_result=$k;$this->num_rows=mysql_num_rows($k);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$e=mysql_fetch_field($this->_result,$this->_offset++);$e->orgtable=$e->table;$e->orgname=$e->name;$e->charsetnr=($e->blob?63:0);return$e;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($I,$X,$ja){$this->dsn("mysql:host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$I)),$X,$ja);$this->query("SET NAMES utf8");return
true;}function
select_db($jc){return$this->query("USE ".idf_escape($jc));}function
query($j,$Vb=false){$this->setAttribute(1000,!$Vb);return
parent::query($j,$Vb);}}}function
idf_escape($Ba){return"`".str_replace("`","``",$Ba)."`";}function
table($Ba){return
idf_escape($Ba);}function
connect(){global$n;$g=new
Min_DB;$Vc=$n->credentials();if($g->connect($Vc[0],$Vc[1],$Vc[2])){$g->query("SET sql_quote_show_create = 1");return$g;}return$g->error;}function
get_databases($mf=true){global$g;$e=&get_session("dbs");if(!isset($e)){if($mf){restart_session();ob_flush();flush();}$e=get_vals($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");}return$e;}function
limit($j,$x,$R,$ia=0,$hc=" "){return" $j$x".(isset($R)?$hc."LIMIT $R".($ia?" OFFSET $ia":""):"");}function
limit1($j,$x){return
limit($j,$x,1);}function
db_collation($v,$S){global$g;$e=null;$da=$g->result("SHOW CREATE DATABASE ".idf_escape($v),1);if(preg_match('~ COLLATE ([^ ]+)~',$da,$m)){$e=$m[1];}elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$da,$m)){$e=$S[$m[1]][-1];}return$e;}function
engines(){$e=array();foreach(get_rows("SHOW ENGINES")as$a){if(ereg("YES|DEFAULT",$a["Support"])){$e[]=$a["Engine"];}}return$e;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals("SHOW".($g->server_info>=5?" FULL":"")." TABLES");}function
count_tables($A){$e=array();foreach($A
as$v){$e[$v]=count(get_vals("SHOW TABLES IN ".idf_escape($v)));}return$e;}function
table_status($f=""){$e=array();foreach(get_rows("SHOW TABLE STATUS".($f!=""?" LIKE ".q(addcslashes($f,"%_")):""))as$a){if($a["Engine"]=="InnoDB"){$a["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["Comment"]);}if(!isset($a["Rows"])){$a["Comment"]="";}if($f!=""){return$a;}$e[$a["Name"]]=$a;}return$e;}function
is_view($H){return!isset($H["Rows"]);}function
fk_support($H){return($H["Engine"]=="InnoDB");}function
fields($l){$e=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($l))as$a){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$a["Type"],$m);$e[$a["Field"]]=array("field"=>$a["Field"],"full_type"=>$a["Type"],"type"=>$m[1],"length"=>$m[2],"unsigned"=>ltrim($m[3].$m[4]),"default"=>($a["Default"]!=""||ereg("char",$m[1])?$a["Default"]:null),"null"=>($a["Null"]=="YES"),"auto_increment"=>($a["Extra"]=="auto_increment"),"on_update"=>(eregi('^on update (.+)',$a["Extra"],$m)?$m[1]:""),"collation"=>$a["Collation"],"privileges"=>array_flip(explode(",",$a["Privileges"])),"comment"=>$a["Comment"],"primary"=>($a["Key"]=="PRI"),);}return$e;}function
indexes($l,$J=null){global$g;if(!is_object($J)){$J=$g;}$e=array();foreach(get_rows("SHOW INDEX FROM ".table($l),$J)as$a){$e[$a["Key_name"]]["type"]=($a["Key_name"]=="PRIMARY"?"PRIMARY":($a["Index_type"]=="FULLTEXT"?"FULLTEXT":($a["Non_unique"]?"INDEX":"UNIQUE")));$e[$a["Key_name"]]["columns"][]=$a["Column_name"];$e[$a["Key_name"]]["lengths"][]=$a["Sub_part"];}return$e;}function
foreign_keys($l){global$g,$Ma;static$U='`(?:[^`]|``)+`';$e=array();$ke=$g->result("SHOW CREATE TABLE ".table($l),1);if($ke){preg_match_all("~CONSTRAINT ($U) FOREIGN KEY \\(((?:$U,? ?)+)\\) REFERENCES ($U)(?:\\.($U))? \\(((?:$U,? ?)+)\\)(?: ON DELETE (".implode("|",$Ma)."))?(?: ON UPDATE (".implode("|",$Ma)."))?~",$ke,$fa,PREG_SET_ORDER);foreach($fa
as$m){preg_match_all("~$U~",$m[2],$ua);preg_match_all("~$U~",$m[5],$qa);$e[idf_unescape($m[1])]=array("db"=>idf_unescape($m[4]!=""?$m[3]:$m[4]),"table"=>idf_unescape($m[4]!=""?$m[4]:$m[3]),"source"=>array_map('idf_unescape',$ua[0]),"target"=>array_map('idf_unescape',$qa[0]),"on_delete"=>$m[6],"on_update"=>$m[7],);}}return$e;}function
view($f){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($f),1)));}function
collations(){$e=array();foreach(get_rows("SHOW COLLATION")as$a){if($a["Default"]){$e[$a["Charset"]][-1]=$a["Collation"];}else{$e[$a["Charset"]][]=$a["Collation"];}}ksort($e);foreach($e
as$c=>$b){asort($e[$c]);}return$e;}function
information_schema($v){global$g;return($g->server_info>=5&&$v=="information_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
exact_value($b){return
q($b)." COLLATE utf8_bin";}function
create_database($v,$nb){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($v).($nb?" COLLATE ".q($nb):""));}function
drop_databases($A){set_session("dbs",null);return
apply_queries("DROP DATABASE",$A,'idf_escape');}function
rename_database($f,$nb){if(create_database($f,$nb)){$xb=array();foreach(tables_list()as$l=>$N){$xb[]=table($l)." TO ".idf_escape($f).".".table($l);}if(!$xb||queries("RENAME TABLE ".implode(", ",$xb))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$Sc=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$t){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$t["columns"],true)){$Sc="";break;}if($t["type"]=="PRIMARY"){$Sc=" UNIQUE";}}}return" AUTO_INCREMENT$Sc";}function
alter_table($l,$f,$p,$Nc,$cb,$fc,$nb,$Oc,$Zb){$ha=array();foreach($p
as$d){$ha[]=($d[1]?($l!=""?($d[0]!=""?"CHANGE ".idf_escape($d[0]):"ADD"):" ")." ".implode($d[1]).($l!=""?" $d[2]":""):"DROP ".idf_escape($d[0]));}$ha=array_merge($ha,$Nc);$Ab="COMMENT=".q($cb).($fc?" ENGINE=".q($fc):"").($nb?" COLLATE ".q($nb):"").($Oc!=""?" AUTO_INCREMENT=$Oc":"").$Zb;if($l==""){return
queries("CREATE TABLE ".table($f)." (\n".implode(",\n",$ha)."\n) $Ab");}if($l!=$f){$ha[]="RENAME TO ".table($f);}$ha[]=$Ab;return
queries("ALTER TABLE ".table($l)."\n".implode(",\n",$ha));}function
alter_indexes($l,$ha){foreach($ha
as$c=>$b){$ha[$c]=($b[2]?"\nDROP INDEX ":"\nADD $b[0] ".($b[0]=="PRIMARY"?"KEY ":"")).$b[1];}return
queries("ALTER TABLE ".table($l).implode(",",$ha));}function
truncate_tables($la){return
apply_queries("TRUNCATE TABLE",$la);}function
drop_views($Ga){return
queries("DROP VIEW ".implode(", ",array_map('table',$Ga)));}function
drop_tables($la){return
queries("DROP TABLE ".implode(", ",array_map('table',$la)));}function
move_tables($la,$Ga,$qa){$xb=array();foreach(array_merge($la,$Ga)as$l){$xb[]=table($l)." TO ".idf_escape($qa).".".table($l);}return
queries("RENAME TABLE ".implode(", ",$xb));}function
copy_tables($la,$Ga,$qa){foreach($la
as$l){$f=($qa==DB?table("copy_$l"):idf_escape($qa).".".table($l));if(!queries("DROP TABLE IF EXISTS $f")||!queries("CREATE TABLE $f LIKE ".table($l))||!queries("INSERT INTO $f SELECT * FROM ".table($l))){return
false;}}foreach($Ga
as$l){$f=($qa==DB?table("copy_$l"):idf_escape($qa).".".table($l));$_b=view($l);if(!queries("DROP VIEW IF EXISTS $f")||!queries("CREATE VIEW $f AS $_b[select]")){return
false;}}return
true;}function
trigger($f){$E=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($f));return
reset($E);}function
triggers($l){$e=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($l,"%_")))as$a){$e[$a["Trigger"]]=array($a["Timing"],$a["Event"]);}return$e;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Type"=>array("FOR EACH ROW"),);}function
routine($f,$N){global$g,$ib,$Eb,$ba;$vf=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$qe="((".implode("|",array_merge(array_keys($ba),$vf)).")(?:\\s*\\(((?:[^'\")]*|$ib)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$U="\\s*(".($N=="FUNCTION"?"":implode("|",$Eb)).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$qe";$da=$g->result("SHOW CREATE $N ".idf_escape($f),2);preg_match("~\\(((?:$U\\s*,?)*)\\)".($N=="FUNCTION"?"\\s*RETURNS\\s+$qe":"")."\\s*(.*)~is",$da,$m);$p=array();preg_match_all("~$U\\s*,?~is",$m[1],$fa,PREG_SET_ORDER);foreach($fa
as$Ia){$f=str_replace("``","`",$Ia[2]).$Ia[3];$p[]=array("field"=>$f,"type"=>strtolower($Ia[5]),"length"=>preg_replace_callback("~$ib~s",'normalize_enum',$Ia[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Ia[8] $Ia[7]"))),"full_type"=>$Ia[4],"inout"=>strtoupper($Ia[1]),"collation"=>strtolower($Ia[9]),);}if($N!="FUNCTION"){return
array("fields"=>$p,"definition"=>$m[11]);}return
array("fields"=>$p,"returns"=>array("type"=>$m[12],"length"=>$m[13],"unsigned"=>$m[15],"collation"=>$m[16]),"definition"=>$m[17],);}function
routines(){return
get_rows("SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
begin(){return
queries("BEGIN");}function
insert_into($l,$u){return
queries("INSERT INTO ".table($l)." (".implode(", ",array_keys($u)).")\nVALUES (".implode(", ",$u).")");}function
insert_update($l,$u,$Ic){foreach($u
as$c=>$b){$u[$c]="$c = $b";}$La=implode(", ",$u);return
queries("INSERT INTO ".table($l)." SET $La ON DUPLICATE KEY UPDATE $La");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$j){return$g->query("EXPLAIN $j");}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Sa){return
true;}function
create_sql($l,$Oc){global$g;$e=$g->result("SHOW CREATE TABLE ".table($l),1);if(!$Oc){$e=preg_replace('~ AUTO_INCREMENT=\\d+~','',$e);}return$e;}function
truncate_sql($l){return"TRUNCATE ".table($l);}function
use_sql($jc){return"USE ".idf_escape($jc);}function
trigger_sql($l,$G){$e="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($l,"%_")),null,"-- ")as$a){$e.="\n".($G=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($a["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($a["Trigger"])." $a[Timing] $a[Event] ON ".table($a["Table"])." FOR EACH ROW\n$a[Statement];;\n";}return$e;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
support($ff){global$g;return!ereg("scheme|sequence|type".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|view|routine|trigger":""):""),$ff);}$r="sql";$ba=array();$Gc=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),)as$c=>$b){$ba+=$b;$Gc[$c]=array_keys($b);}$Db=array("unsigned","zerofill","unsigned zerofill");$ge=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","");$W=array("char_length","date","from_unixtime","hex","lower","round","sec_to_time","time_to_sec","upper");$zb=array("avg","count","count distinct","group_concat","max","min","sum");$id=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1/hex","date|time"=>"now",),array("int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$bc="3.2.2";class
Adminer{var$operators;function
name(){return"Adminer";}function
credentials(){return
array(SERVER,$_GET["username"],get_session("pwds"));}function
permanentLogin(){return
password_file();}function
database(){return
DB;}function
headers(){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}function
head(){return
true;}function
loginForm(){global$ra;echo'<table cellspacing="0">
<tr><th>System<td>',html_select("driver",$ra,DRIVER,"loginDriver(this);"),'<tr><th>Server<td><input name="server" value="',h(SERVER),'">
<tr><th>Username<td><input id="username" name="username" value="',h($_GET["username"]);?>">
<tr><th>Password<td><input type="password" name="password">
</table>
<script type="text/javascript">
var username = document.getElementById('username');
username.focus();
username.form['driver'].onchange();
</script>
<?php

echo"<p><input type='submit' value='".'Login'."'>\n",checkbox("permanent",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($Df,$ja){return
true;}function
tableName($Jc){return
h($Jc["Name"]);}function
fieldName($d,$Fa=0){return'<span title="'.h($d["full_type"]).'">'.h($d["field"]).'</span>';}function
selectLinks($Jc,$u=""){echo'<p class="tabs">';$za=array("select"=>'Select data',"table"=>'Show structure');if(is_view($Jc)){$za["view"]='Alter view';}else{$za["create"]='Alter table';}if(isset($u)){$za["edit"]='New item';}foreach($za
as$c=>$b){echo" <a href='".h(ME)."$c=".urlencode($Jc["Name"]).($c=="edit"?$u:"")."'".bold(isset($_GET[$c])).">$b</a>";}echo"\n";}function
foreignKeys($l){return
foreign_keys($l);}function
backwardKeys($l,$If){return
array();}function
backwardKeysPrint($Ff,$a){}function
selectQuery($j){global$r;return"<p><a href='".h(remove_from_uri("page"))."&amp;page=last' title='".'Last page'."'>&gt;&gt;</a> <code class='jush-$r'>".h(str_replace("\n"," ",$j))."</code> <a href='".h(ME)."sql=".urlencode($j)."'>".'Edit'."</a></p>\n";}function
rowDescription($l){return"";}function
rowDescriptions($E,$wf){return$E;}function
selectVal($b,$y,$d){$e=($b!="<i>NULL</i>"&&ereg("char|binary",$d["type"])&&!ereg("var",$d["type"])?"<code>$b</code>":$b);if(ereg('blob|bytea|raw|file',$d["type"])&&!is_utf8($b)){$e=lang(array('%d byte','%d bytes'),strlen(html_entity_decode($b,ENT_QUOTES)));}return($y?"<a href='$y'>$e</a>":$e);}function
editVal($b,$d){return(ereg("binary",$d["type"])?reset(unpack("H*",$b)):$b);}function
selectColumnsPrint($C,$w){global$W,$zb;print_fieldset("select",'Select',$C);$h=0;$Vd=array('Functions'=>$W,'Aggregation'=>$zb);foreach($C
as$c=>$b){$b=$_GET["columns"][$c];echo"<div>".html_select("columns[$h][fun]",array(-1=>"")+$Vd,$b["fun"]),"(<select name='columns[$h][col]'><option>".optionlist($w,$b["col"],true)."</select>)</div>\n";$h++;}echo"<div>".html_select("columns[$h][fun]",array(-1=>"")+$Vd,"","this.nextSibling.nextSibling.onchange();"),"(<select name='columns[$h][col]' onchange='selectAddRow(this);'><option>".optionlist($w,null,true)."</select>)</div>\n","</div></fieldset>\n";}function
selectSearchPrint($x,$w,$z){print_fieldset("search",'Search',$x);foreach($z
as$h=>$t){if($t["type"]=="FULLTEXT"){echo"(<i>".implode("</i>, <i>",array_map('h',$t["columns"]))."</i>) AGAINST"," <input name='fulltext[$h]' value='".h($_GET["fulltext"][$h])."'>",checkbox("boolean[$h]",1,isset($_GET["boolean"][$h]),"BOOL"),"<br>\n";}}$h=0;foreach((array)$_GET["where"]as$b){if("$b[col]$b[val]"!=""&&in_array($b["op"],$this->operators)){echo"<div><select name='where[$h][col]'><option value=''>(".'anywhere'.")".optionlist($w,$b["col"],true)."</select>",html_select("where[$h][op]",$this->operators,$b["op"]),"<input name='where[$h][val]' value='".h($b["val"])."'></div>\n";$h++;}}echo"<div><select name='where[$h][col]' onchange='selectAddRow(this);'><option value=''>(".'anywhere'.")".optionlist($w,null,true)."</select>",html_select("where[$h][op]",$this->operators,"="),"<input name='where[$h][val]'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($Fa,$w,$z){print_fieldset("sort",'Sort',$Fa);$h=0;foreach((array)$_GET["order"]as$c=>$b){if(isset($w[$b])){echo"<div><select name='order[$h]'><option>".optionlist($w,$b,true)."</select>",checkbox("desc[$h]",1,isset($_GET["desc"][$c]),'descending')."</div>\n";$h++;}}echo"<div><select name='order[$h]' onchange='selectAddRow(this);'><option>".optionlist($w,null,true)."</select>","<label><input type='checkbox' name='desc[$h]' value='1'>".'descending'."</label></div>\n";echo"</div></fieldset>\n";}function
selectLimitPrint($R){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input name='limit' size='3' value='".h($R)."'>","</div></fieldset>\n";}function
selectLengthPrint($kb){if(isset($kb)){echo"<fieldset><legend>".'Text length'."</legend><div>",'<input name="text_length" size="3" value="'.h($kb).'">',"</div></fieldset>\n";}}function
selectActionPrint(){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectEmailPrint($Ef,$w){}function
selectColumnsProcess($w,$z){global$W,$zb;$C=array();$ca=array();foreach((array)$_GET["columns"]as$c=>$b){if($b["fun"]=="count"||(isset($w[$b["col"]])&&(!$b["fun"]||in_array($b["fun"],$W)||in_array($b["fun"],$zb)))){$C[$c]=apply_sql_function($b["fun"],(isset($w[$b["col"]])?idf_escape($b["col"]):"*"));if(!in_array($b["fun"],$zb)){$ca[]=$C[$c];}}}return
array($C,$ca);}function
selectSearchProcess($p,$z){global$r;$e=array();foreach($z
as$h=>$t){if($t["type"]=="FULLTEXT"&&$_GET["fulltext"][$h]!=""){$e[]="MATCH (".implode(", ",array_map('idf_escape',$t["columns"])).") AGAINST (".q($_GET["fulltext"][$h]).(isset($_GET["boolean"][$h])?" IN BOOLEAN MODE":"").")";}}foreach((array)$_GET["where"]as$b){if("$b[col]$b[val]"!=""&&in_array($b["op"],$this->operators)){$ub=" $b[op]";if(ereg('IN$',$b["op"])){$vb=process_length($b["val"]);$ub.=" (".($vb!=""?$vb:"NULL").")";}elseif(!$b["op"]){$ub.=$b["val"];}elseif($b["op"]=="LIKE %%"){$ub=" LIKE ".$this->processInput($p[$b["col"]],"%$b[val]%");}elseif(!ereg('NULL$',$b["op"])){$ub.=" ".$this->processInput($p[$b["col"]],$b["val"]);}if($b["col"]!=""){$e[]=idf_escape($b["col"]).$ub;}else{$Wa=array();foreach($p
as$f=>$d){if(is_numeric($b["val"])||!ereg('int|float|double|decimal',$d["type"])){$f=idf_escape($f);$Wa[]=($r=="sql"&&ereg('char|text|enum|set',$d["type"])&&!ereg('^utf8',$d["collation"])?"CONVERT($f USING utf8)":$f);}}$e[]=($Wa?"(".implode("$ub OR ",$Wa)."$ub)":"0");}}}return$e;}function
selectOrderProcess($p,$z){$e=array();foreach((array)$_GET["order"]as$c=>$b){if(isset($p[$b])||preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$b)){$e[]=(isset($p[$b])?idf_escape($b):$b).(isset($_GET["desc"][$c])?" DESC":"");}}return$e;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"30");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($x,$wf){return
false;}function
messageQuery($j){global$r;static$Ec=0;restart_session();$D="sql-".($Ec++);$Oa=&get_session("queries");if(strlen($j)>1e6){$j=ereg_replace('[\x80-\xFF]+$','',substr($j,0,1e6))."\n...";}$Oa[$_GET["db"]][]=$j;return" <a href='#$D' onclick=\"return !toggle('$D');\">".'SQL command'."</a><div id='$D' class='hidden'><pre><code class='jush-$r'>".shorten_utf8($j,1000).'</code></pre><p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($Oa[$_GET["db"]])-1)).'">'.'Edit'.'</a></div>';}function
editFunctions($d){global$id;$e=($d["null"]?"NULL/":"");foreach($id
as$c=>$W){if(!$c||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($W
as$U=>$b){if(!$U||ereg($U,$d["type"])){$e.="/$b";}}if($c&&!ereg('set|blob|bytea|raw|file',$d["type"])){$e.="/=";}}}return
explode("/",$e);}function
editInput($l,$d,$Ca,$o){if($d["type"]=="enum"){return(isset($_GET["select"])?"<label><input type='radio'$Ca value='-1' checked><i>".'original'."</i></label> ":"").($d["null"]?"<label><input type='radio'$Ca value=''".(isset($o)||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ca,$d,$o,0);}return"";}function
processInput($d,$o,$_=""){if($_=="="){return$o;}$f=$d["field"];$e=($d["type"]=="bit"&&ereg('^[0-9]+$',$o)?$o:q($o));if(ereg('^(now|getdate|uuid)$',$_)){$e="$_()";}elseif(ereg('^current_(date|timestamp)$',$_)){$e=$_;}elseif(ereg('^([+-]|\\|\\|)$',$_)){$e=idf_escape($f)." $_ $e";}elseif(ereg('^[+-] interval$',$_)){$e=idf_escape($f)." $_ ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+$~i",$o)?$o:$e);}elseif(ereg('^(addtime|subtime|concat)$',$_)){$e="$_(".idf_escape($f).", $e)";}elseif(ereg('^(md5|sha1|password|encrypt|hex)$',$_)){$e="$_($e)";}if(ereg("binary",$d["type"])){$e="unhex($e)";}return$e;}function
dumpOutput(){$e=array('text'=>'open','file'=>'save');if(function_exists('gzencode')){$e['gz']='gzip';}if(function_exists('bzcompress')){$e['bz2']='bzip2';}return$e;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpTable($l,$G,$Mc=false){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($G){dump_csv(array_keys(fields($l)));}}elseif($G){$da=create_sql($l,$_POST["auto_increment"]);if($da){if($G=="DROP+CREATE"){echo"DROP ".($Mc?"VIEW":"TABLE")." IF EXISTS ".table($l).";\n";}if($Mc){$da=preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$da);}echo($G!="CREATE+ALTER"?$da:($Mc?substr_replace($da," OR REPLACE",6,0):substr_replace($da," IF NOT EXISTS",12,0))).";\n\n";}if($G=="CREATE+ALTER"&&!$Mc){$j="SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ".q($l)." ORDER BY ORDINAL_POSITION";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";$p=array();$tb="";foreach(get_rows($j)as$a){$Na=$a["COLUMN_DEFAULT"];$a["default"]=(isset($Na)?q($Na):"NULL");$a["after"]=q($tb);$a["alter"]=escape_string(idf_escape($a["COLUMN_NAME"])." $a[COLUMN_TYPE]".($a["COLLATION_NAME"]?" COLLATE $a[COLLATION_NAME]":"").(isset($Na)?" DEFAULT ".($Na=="CURRENT_TIMESTAMP"?$Na:$a["default"]):"").($a["IS_NULLABLE"]=="YES"?"":" NOT NULL").($a["EXTRA"]?" $a[EXTRA]":"").($a["COLUMN_COMMENT"]?" COMMENT ".q($a["COLUMN_COMMENT"]):"").($tb?" AFTER ".idf_escape($tb):" FIRST"));echo", ADD $a[alter]";$p[]=$a;$tb=$a["COLUMN_NAME"];}echo"';
	DECLARE columns CURSOR FOR $j;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";foreach($p
as$a){echo"
				WHEN ".q($a["COLUMN_NAME"])." THEN
					SET add_columns = REPLACE(add_columns, ', ADD $a[alter]', '');
					IF NOT (_column_default <=> $a[default]) OR _is_nullable != '$a[IS_NULLABLE]' OR _collation_name != '$a[COLLATION_NAME]' OR _column_type != ".q($a["COLUMN_TYPE"])." OR _extra != '$a[EXTRA]' OR _column_comment != ".q($a["COLUMN_COMMENT"])." OR after != $a[after] THEN
						SET @alter_table = CONCAT(@alter_table, ', MODIFY $a[alter]');
					END IF;";}echo"
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE ".table($l)."', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";}}}function
dumpData($l,$G,$j){global$g,$r;$Cd=($r=="sqlite"?0:1048576);if($G){if($_POST["format"]=="sql"&&$G=="TRUNCATE+INSERT"){echo
truncate_sql($l).";\n";}if($_POST["format"]=="sql"){$p=fields($l);}$k=$g->query($j,1);if($k){$Lb="";$Ra="";while($a=$k->fetch_assoc()){if($_POST["format"]!="sql"){if($G=="table"){dump_csv(array_keys($a));$G="INSERT";}dump_csv($a);}else{if(!$Lb){$Lb="INSERT INTO ".table($l)." (".implode(", ",array_map('idf_escape',array_keys($a))).") VALUES";}foreach($a
as$c=>$b){$a[$c]=(isset($b)?(ereg('int|float|double|decimal',$p[$c]["type"])?$b:q($b)):"NULL");}$V=implode(",\t",$a);if($G=="INSERT+UPDATE"){$u=array();foreach($a
as$c=>$b){$u[]=idf_escape($c)." = $b";}echo"$Lb ($V) ON DUPLICATE KEY UPDATE ".implode(", ",$u).";\n";}else{$V=($Cd?"\n":" ")."($V)";if(!$Ra){$Ra=$Lb.$V;}elseif(strlen($Ra)+2+strlen($V)<$Cd){$Ra.=",$V";}else{$Ra.=";\n";echo$Ra;$Ra=$Lb.$V;}}}}if($_POST["format"]=="sql"&&$G!="INSERT+UPDATE"&&$Ra){$Ra.=";\n";echo$Ra;}}elseif($_POST["format"]=="sql"){echo"-- ".str_replace("\n"," ",$g->error)."\n";}}}function
dumpHeaders($Kc,$hd=false){$Aa=$_POST["output"];$rb=($_POST["format"]=="sql"?"sql":($hd?"tar":"csv"));header("Content-Type: ".($Aa=="bz2"?"application/x-bzip":($Aa=="gz"?"application/x-gzip":($rb=="tar"?"application/x-tar":($rb=="sql"||$Aa!="file"?"text/plain":"text/csv")."; charset=utf-8"))));if($Aa=="bz2"){ob_start('bzcompress',1e6);}if($Aa=="gz"){ob_start('gzencode',1e6);}return$rb;}function
homepage(){echo'<p>'.($_GET["ns"]==""?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":"");return
true;}function
navigation($Ib){global$bc,$g,$B,$r,$ra;echo'<h1>
<a href="http://www.adminer.org/" id="h1">',$this->name(),'</a>
<span class="version">',$bc,'</span>
<a href="http://www.adminer.org/#download" id="version">',(version_compare($bc,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Ib=="auth"){$ma=true;foreach((array)$_SESSION["pwds"]as$qb=>$Ye){foreach($Ye
as$I=>$Se){foreach($Se
as$X=>$ja){if(isset($ja)){if($ma){echo"<p onclick='eventStop(event);'>\n";$ma=false;}echo"<a href='".h(auth_url($qb,$I,$X))."'>($ra[$qb]) ".h($X.($I!=""?"@$I":""))."</a><br>\n";}}}}}else{$A=get_databases();echo'<form action="" method="post">
<p class="logout">
';if(DB==""||!$Ib){echo"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])).">".'SQL command'."</a>\n";if(support("dump")){echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Dump'."</a>\n";}}echo'<input type="submit" name="logout" value="Logout" onclick="eventStop(event);">
<input type="hidden" name="token" value="',$B,'">
</p>
</form>
<form action="">
<p>
';hidden_fields_get();echo($A?html_select("db",array(""=>"(".'database'.")")+$A,DB,"this.form.submit();"):'<input name="db" value="'.h(DB).'">'),'<input type="submit" value="Use"',($A?" class='hidden'":""),' onclick="eventStop(event);">
';if($Ib!="db"&&DB!=""&&$g->select_db(DB)){if($_GET["ns"]!==""&&!$Ib){echo'<p><a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create new table'."</a>\n";$la=tables_list();if(!$la){echo"<p class='message'>".'No tables.'."\n";}else{$this->tablesPrint($la);$za=array();foreach($la
as$l=>$N){$za[]=preg_quote($l,'/');}echo"<script type='text/javascript'>\n","var jushLinks = { $r: [ '".js_escape(ME)."table=\$&', /\\b(".implode("|",$za).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$b){echo"jushLinks.$b = jushLinks.$r;\n";}echo"</script>\n";}}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':""))),"</p></form>\n";}}function
tablesPrint($la){echo"<p id='tables'>\n";foreach($la
as$l=>$N){echo'<a href="'.h(ME).'select='.urlencode($l).'"'.bold($_GET["select"]==$l).">".'select'."</a> ",'<a href="'.h(ME).'table='.urlencode($l).'"'.bold($_GET["table"]==$l).">".$this->tableName(array("Name"=>$l))."</a><br>\n";}}}$n=(function_exists('adminer_object')?adminer_object():new
Adminer);if(!isset($n->operators)){$n->operators=$ge;}function
page_header($fe,$q="",$Rb=array(),$De=""){global$Re,$n,$g,$ra;header("Content-Type: text/html; charset=utf-8");$n->headers();$Bd=$fe.($De!=""?": ".h($De):"");$Id=strip_tags($Bd.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$n->name());if(is_ajax()){header("X-AJAX-Title: ".rawurlencode($Id));}else{echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$Id,'</title>
<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=3.2.2",'" id="favicon">
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=3.2.2",'">
<script type="text/javascript">
var areYouSure = \'Resend POST data?\';
</script>
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=3.2.2",'"></script>
';if($n->head()&&file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}echo'
<body class="ltr nojs" onclick="return bodyClick(event, \'',js_escape(DB),'\', \'',js_escape($_GET["ns"]),'\');" onkeydown="bodyKeydown(event);" onload="bodyLoad(\'',(is_object($g)?substr($g->server_info,0,3):""),'\');',(isset($_COOKIE["adminer_version"])?"":" verifyVersion();");?>">
<script type="text/javascript">
document.body.className = document.body.className.replace(/(^|\s)nojs(\s|$)/, '$1js$2');
</script>

<div id="content">
<?php
}if(isset($Rb)){$y=substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.($y?h($y):".").'">'.$ra[DRIVER].'</a> &raquo; ';$y=substr(preg_replace('~(db|ns)=[^&]*&~','',ME),0,-1);$I=(SERVER!=""?h(SERVER):'Server');if($Rb===false){echo"$I\n";}else{echo"<a href='".($y?h($y):".")."'>$I</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Rb))){echo'<a href="'.h($y."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';}if(is_array($Rb)){if($_GET["ns"]!=""){echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';}foreach($Rb
as$c=>$b){$Pb=(is_array($b)?$b[1]:$b);if($Pb!=""){echo'<a href="'.h(ME."$c=").urlencode(is_array($b)?$b[0]:$b).'">'.h($Pb).'</a> &raquo; ';}}}echo"$fe\n";}}echo"<span id='loader'></span>\n","<h2>$Bd</h2>\n";restart_session();$_d=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Jd=$_SESSION["messages"][$_d];if($Jd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Jd)."</div>\n";unset($_SESSION["messages"][$_d]);}$A=&get_session("dbs");if(DB!=""&&$A&&!in_array(DB,$A,true)){$A=null;}if($q){echo"<div class='error'>$q</div>\n";}define("PAGE_HEADER",1);}function
page_footer($Ib=""){global$n;if(!is_ajax()){echo'</div>

<div id="menu">
';$n->navigation($Ib);echo'</div>
';}}function
int32($M){while($M>=2147483648){$M-=4294967296;}while($M<=-2147483649){$M+=4294967296;}return(int)$M;}function
long2str($s,$rd){$V='';foreach($s
as$b){$V.=pack('V',$b);}if($rd){return
substr($V,0,end($s));}return$V;}function
str2long($V,$rd){$s=array_values(unpack('V*',str_pad($V,4*ceil(strlen($V)/4),"\0")));if($rd){$s[]=strlen($V);}return$s;}function
xxtea_mx($oa,$na,$va,$_a){return
int32((($oa>>5&0x7FFFFFF)^$na<<2)+(($na>>3&0x1FFFFFFF)^$oa<<4))^int32(($va^$na)+($_a^$oa));}function
encrypt_string($Nb,$c){if($Nb==""){return"";}$c=array_values(unpack("V*",pack("H*",md5($c))));$s=str2long($Nb,true);$M=count($s)-1;$oa=$s[$M];$na=$s[0];$L=floor(6+52/($M+1));$va=0;while($L-->0){$va=int32($va+0x9E3779B9);$Qb=$va>>2&3;for($pa=0;$pa<$M;$pa++){$na=$s[$pa+1];$sb=xxtea_mx($oa,$na,$va,$c[$pa&3^$Qb]);$oa=int32($s[$pa]+$sb);$s[$pa]=$oa;}$na=$s[0];$sb=xxtea_mx($oa,$na,$va,$c[$pa&3^$Qb]);$oa=int32($s[$M]+$sb);$s[$M]=$oa;}return
long2str($s,false);}function
decrypt_string($Nb,$c){if($Nb==""){return"";}$c=array_values(unpack("V*",pack("H*",md5($c))));$s=str2long($Nb,false);$M=count($s)-1;$oa=$s[$M];$na=$s[0];$L=floor(6+52/($M+1));$va=int32($L*0x9E3779B9);while($va){$Qb=$va>>2&3;for($pa=$M;$pa>0;$pa--){$oa=$s[$pa-1];$sb=xxtea_mx($oa,$na,$va,$c[$pa&3^$Qb]);$na=int32($s[$pa]-$sb);$s[$pa]=$na;}$oa=$s[$M];$sb=xxtea_mx($oa,$na,$va,$c[$pa&3^$Qb]);$na=int32($s[0]-$sb);$s[0]=$na;$va=int32($va-0x9E3779B9);}return
long2str($s,true);}$g='';$B=$_SESSION["token"];if(!$_SESSION["token"]){$_SESSION["token"]=rand(1,1e6);}$fb=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$b){list($c)=explode(":",$b);$fb[$c]=$b;}}if(isset($_POST["server"])){session_regenerate_id();$_SESSION["pwds"][$_POST["driver"]][$_POST["server"]][$_POST["username"]]=$_POST["password"];if($_POST["permanent"]){$c=base64_encode($_POST["driver"])."-".base64_encode($_POST["server"])."-".base64_encode($_POST["username"]);$_c=$n->permanentLogin();$fb[$c]="$c:".base64_encode($_c?encrypt_string($_POST["password"],$_c):"");cookie("adminer_permanent",implode(" ",$fb));}if(count($_POST)==($_POST["permanent"]?5:4)||DRIVER!=$_POST["driver"]||SERVER!=$_POST["server"]||$_GET["username"]!==$_POST["username"]){redirect(auth_url($_POST["driver"],$_POST["server"],$_POST["username"]));}}elseif($_POST["logout"]){if($B&&$_POST["token"]!=$B){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","dbs","queries")as$c){set_session($c,null);}$c=base64_encode(DRIVER)."-".base64_encode(SERVER)."-".base64_encode($_GET["username"]);if($fb[$c]){unset($fb[$c]);cookie("adminer_permanent",implode(" ",$fb));}redirect(substr(preg_replace('~(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.');}}elseif($fb&&!$_SESSION["pwds"]){session_regenerate_id();$_c=$n->permanentLogin();foreach($fb
as$c=>$b){list(,$Cf)=explode(":",$b);list($qb,$I,$X)=array_map('base64_decode',explode("-",$c));$_SESSION["pwds"][$qb][$I][$X]=decrypt_string(base64_decode($Cf),$_c);}}function
auth_error($wd=null){global$g,$n,$B;$Cc=session_name();$q="";if(!$_COOKIE[$Cc]&&$_GET[$Cc]&&ini_bool("session.use_only_cookies")){$q='Session support must be enabled.';}elseif(isset($_GET["username"])){if(($_COOKIE[$Cc]||$_GET[$Cc])&&!$B){$q='Session expired, please login again.';}else{$ja=&get_session("pwds");if(isset($ja)){$q=h($wd?$wd->getMessage():(is_string($g)?$g:'Invalid credentials.'));$ja=null;}}}page_header('Login',$q,null);echo"<form action='' method='post' onclick='eventStop(event);'>\n";$n->loginForm();echo"<div>";hidden_fields($_POST,array("driver","server","username","password","permanent"));echo"</div>\n","</form>\n";page_footer("auth");}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$df)),false);page_footer("auth");exit;}$g=connect();}if(is_string($g)||!$n->login($_GET["username"],get_session("pwds"))){auth_error();exit;}$B=$_SESSION["token"];if(isset($_POST["server"])&&$_POST["token"]){$_POST["token"]=$B;}$q=($_POST?($_POST["token"]==$B?"":'Invalid CSRF token. Send the form again.'):($_SERVER["REQUEST_METHOD"]!="POST"?"":sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.','"post_max_size"')));function
connect_error(){global$g,$B,$q,$ra;$A=array();if(DB!=""){page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$q){queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));}page_header('Select database',$q,false);echo"<p><a href='".h(ME)."database='>".'Create new database'."</a>\n";foreach(array('privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$c=>$b){if(support($c)){echo"<a href='".h(ME)."$c='>$b</a>\n";}}echo"<p>".sprintf('%s version: %s through PHP extension %s',$ra[DRIVER],"<b>$g->server_info</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";if($_GET["refresh"]){set_session("dbs",null);}$A=get_databases();if($A){$gf=support("scheme");$S=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' onclick='tableClick(event);'>\n","<thead><tr><td>&nbsp;<th>".'Database'."<td>".'Collation'."<td>".'Tables'."</thead>\n";foreach($A
as$v){$sd=h(ME)."db=".urlencode($v);echo"<tr".odd()."><td>".checkbox("db[]",$v,in_array($v,(array)$_POST["db"])),"<th><a href='$sd'>".h($v)."</a>","<td><a href='$sd".($gf?"&amp;ns=":"")."&amp;database='>".nbsp(db_collation($v,$S))."</a>","<td align='right'><a href='$sd&amp;schema=' id='tables-".h($v)."'>?</a>","\n";}echo"</table>\n","<p><input type='submit' name='drop' value='".'Drop'."'".confirm("formChecked(this, /db/)",1).">\n";echo"<input type='hidden' name='token' value='$B'>\n","<a href='".h(ME)."refresh=1' onclick='eventStop(event);'>".'Refresh'."</a>\n","</form>\n";}}page_footer("db");if($A){echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=connect');</script>\n";}}if(isset($_GET["status"])){$_GET["variables"]=$_GET["status"];}if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect")){if(DB!=""){set_session("dbs",null);}connect_error();exit;}function
select($k,$J=null,$ze=""){$za=array();$z=array();$w=array();$Ke=array();$ba=array();odd('');for($h=0;$a=$k->fetch_row();$h++){if(!$h){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($aa=0;$aa<count($a);$aa++){$d=$k->fetch_field();$sa=$d->orgtable;$Mb=$d->orgname;if($sa!=""){if(!isset($z[$sa])){$z[$sa]=array();foreach(indexes($sa,$J)as$t){if($t["type"]=="PRIMARY"){$z[$sa]=array_flip($t["columns"]);break;}}$w[$sa]=$z[$sa];}if(isset($w[$sa][$Mb])){unset($w[$sa][$Mb]);$z[$sa][$Mb]=$aa;$za[$aa]=$sa;}}if($d->charsetnr==63){$Ke[$aa]=true;}$ba[$aa]=$d->type;$f=h($d->name);echo"<th".($sa!=""||$d->name!=$Mb?" title='".h(($sa!=""?"$sa.":"").$Mb)."'":"").">".($ze?"<a href='$ze".strtolower($f)."' target='_blank' rel='noreferrer'>$f</a>":$f);}echo"</thead>\n";}echo"<tr".odd().">";foreach($a
as$c=>$b){if(!isset($b)){$b="<i>NULL</i>";}else{if($Ke[$c]&&!is_utf8($b)){$b="<i>".lang(array('%d byte','%d bytes'),strlen($b))."</i>";}elseif(!strlen($b)){$b="&nbsp;";}else{$b=h($b);if($ba[$c]==254){$b="<code>$b</code>";}}if(isset($za[$c])&&!$w[$za[$c]]){$y="edit=".urlencode($za[$c]);foreach($z[$za[$c]]as$sc=>$aa){$y.="&where".urlencode("[".bracket_escape($sc)."]")."=".urlencode($a[$aa]);}$b="<a href='".h(ME.$y)."'>$b</a>";}}echo"<td>$b";}}echo($h?"</table>":"<p class='message'>".'No rows.')."\n";}function
referencable_primary($Bf){$e=array();foreach(table_status()as$ta=>$l){if($ta!=$Bf&&fk_support($l)){foreach(fields($ta)as$d){if($d["primary"]){if($e[$ta]){unset($e[$ta]);break;}$e[$ta]=$d;}}}}return$e;}function
textarea($f,$o,$E=10,$Wa=80){echo"<textarea name='$f' rows='$E' cols='$Wa' class='sqlarea' spellcheck='false' wrap='off' onkeydown='return textareaKeydown(this, event);'>";if(is_array($o)){foreach($o
as$b){echo
h($b)."\n\n\n";}}else{echo
h($o);}echo"</textarea>";}function
format_time($jb,$Ob){return" <span class='time'>(".sprintf('%.3f s',max(0,$Ob[0]-$jb[0]+$Ob[1]-$jb[1])).")</span>";}function
edit_type($c,$d,$S,$P=array()){global$Gc,$ba,$Db,$Ma;echo'<td><select name="',$c,'[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">',optionlist((!$d["type"]||isset($ba[$d["type"]])?array():array($d["type"]))+$Gc+($P?array('Foreign keys'=>$P):array()),$d["type"]),'</select>
<td><input name="',$c,'[length]" value="',h($d["length"]),'" size="3" onfocus="editingLengthFocus(this);"><td class="options">',"<select name='$c"."[collation]'".(ereg('(char|text|enum|set)$',$d["type"])?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($S,$d["collation"]).'</select>',($Db?"<select name='$c"."[unsigned]'".(!$d["type"]||ereg('(int|float|double|decimal)$',$d["type"])?"":" class='hidden'").'><option>'.optionlist($Db,$d["unsigned"]).'</select>':''),($P?"<select name='$c"."[on_delete]'".(ereg("`",$d["type"])?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist($Ma,$d["on_delete"])."</select> ":" ");}function
process_length($xa){global$ib;return(preg_match("~^\\s*(?:$ib)(?:\\s*,\\s*(?:$ib))*\\s*\$~",$xa)&&preg_match_all("~$ib~",$xa,$fa)?implode(",",$fa[0]):preg_replace('~[^0-9,+-]~','',$xa));}function
process_type($d,$Sb="COLLATE"){global$Db;return" $d[type]".($d["length"]!=""?"(".process_length($d["length"]).")":"").(ereg('int|float|double|decimal',$d["type"])&&in_array($d["unsigned"],$Db)?" $d[unsigned]":"").(ereg('char|text|enum|set',$d["type"])&&$d["collation"]?" $Sb ".q($d["collation"]):"");}function
process_field($d,$uc){return
array(idf_escape($d["field"]),process_type($uc),($d["null"]?" NULL":" NOT NULL"),(isset($d["default"])?" DEFAULT ".($d["type"]=="timestamp"&&eregi("^CURRENT_TIMESTAMP$",$d["default"])?$d["default"]:q($d["default"])):""),($d["on_update"]?" ON UPDATE $d[on_update]":""),(support("comment")&&$d["comment"]!=""?" COMMENT ".q($d["comment"]):""),($d["auto_increment"]?auto_increment():null),);}function
type_class($N){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$c=>$b){if(ereg("$c|$b",$N)){return" class='$c'";}}}function
edit_fields($p,$S,$N="TABLE",$pe=0,$P=array(),$ob=false){global$Eb;foreach($p
as$d){if($d["comment"]!=""){$ob=true;break;}}echo'<thead><tr class="wrap">
';if($N=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th>',($N=="TABLE"?'Column name':'Parameter name'),'<td>Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>Length
<td>Options
';if($N=="TABLE"){echo'<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="Auto Increment">AI</acronym>
<td class="hidden">Default values
',(support("comment")?"<td".($ob?"":" class='hidden'").">".'Comment':"");}echo'<td>',"<input type='image' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.2.2' alt='+' title='".'Add next'."'>",'<script type="text/javascript">row_count = ',count($p),';</script>
</thead>
<tbody onkeydown="return editingKeydown(event);">
';foreach($p
as$h=>$d){$h++;$Tc=$d[($_POST?"orig":"field")];$we=(isset($_POST["add"][$h-1])||(isset($d["field"])&&!$_POST["drop_col"][$h]))&&(support("drop_col")||$Tc=="");echo'<tr',($we?"":" style='display: none;'"),'>
',($N=="PROCEDURE"?"<td>".html_select("fields[$h][inout]",$Eb,$d["inout"]):""),'<th>';if($we){echo'<input name="fields[',$h,'][field]" value="',h($d["field"]),'" onchange="',($d["field"]!=""||count($p)>1?"":"editingAddRow(this, $pe); "),'editingNameChange(this);" maxlength="64">';}echo'<input type="hidden" name="fields[',$h,'][orig]" value="',h($Tc),'">
';edit_type("fields[$h]",$d,$S,$P);if($N=="TABLE"){echo'<td>',checkbox("fields[$h][null]",1,$d["null"]),'<td><input type="radio" name="auto_increment_col" value="',$h,'"';if($d["auto_increment"]){echo' checked';}?> onclick="var field = this.form['fields[' + this.value + '][field]']; if (!field.value) { field.value = 'id'; field.onchange(); }">
<td class="hidden"><?php echo
checkbox("fields[$h][has_default]",1,$d["has_default"]),'<input name="fields[',$h,'][default]" value="',h($d["default"]),'" onchange="this.previousSibling.checked = true;">
',(support("comment")?"<td".($ob?"":" class='hidden'")."><input name='fields[$h][comment]' value='".h($d["comment"])."' maxlength='255'>":"");}echo"<td>",(support("move_col")?"<input type='image' name='add[$h]' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.2.2' alt='+' title='".'Add next'."' onclick='return !editingAddRow(this, $pe, 1);'>&nbsp;"."<input type='image' name='up[$h]' src='".h(preg_replace("~\\?.*~","",ME))."?file=up.gif&amp;version=3.2.2' alt='^' title='".'Move up'."'>&nbsp;"."<input type='image' name='down[$h]' src='".h(preg_replace("~\\?.*~","",ME))."?file=down.gif&amp;version=3.2.2' alt='v' title='".'Move down'."'>&nbsp;":""),($Tc==""||support("drop_col")?"<input type='image' name='drop_col[$h]' src='".h(preg_replace("~\\?.*~","",ME))."?file=cross.gif&amp;version=3.2.2' alt='x' title='".'Remove'."' onclick='return !editingRemoveRow(this);'>":""),"\n";}return$ob;}function
process_fields(&$p){ksort($p);$ia=0;if($_POST["up"]){$bb=0;foreach($p
as$c=>$d){if(key($_POST["up"])==$c){unset($p[$c]);array_splice($p,$bb,0,array($d));break;}if(isset($d["field"])){$bb=$ia;}$ia++;}}if($_POST["down"]){$Z=false;foreach($p
as$c=>$d){if(isset($d["field"])&&$Z){unset($p[key($_POST["down"])]);array_splice($p,$ia,0,array($Z));break;}if(key($_POST["down"])==$c){$Z=$d;}$ia++;}}$p=array_values($p);if($_POST["add"]){array_splice($p,key($_POST["add"]),0,array(array()));}}function
normalize_enum($m){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($m[0][0].$m[0][0],$m[0][0],substr($m[0],1,-1))),'\\'))."'";}function
grant($Q,$Y,$w,$mb){if(!$Y){return
true;}if($Y==array("ALL PRIVILEGES","GRANT OPTION")){return($Q=="GRANT"?queries("$Q ALL PRIVILEGES$mb WITH GRANT OPTION"):queries("$Q ALL PRIVILEGES$mb")&&queries("$Q GRANT OPTION$mb"));}return
queries("$Q ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$w, ",$Y).$w).$mb);}function
drop_create($oe,$da,$O,$ne,$cf,$hf,$f){if($_POST["drop"]){return
query_redirect($oe,$O,$ne,true,!$_POST["dropped"]);}$Ka=$f!=""&&($_POST["dropped"]||queries($oe));$jf=queries($da);if(!queries_redirect($O,($f!=""?$cf:$hf),$jf)&&$Ka){redirect(null,$ne);}return$Ka;}function
tar_file($gb,$Wc){$e=pack("a100a8a8a8a12a12",$gb,644,0,0,decoct(strlen($Wc)),decoct(time()));$ie=8*32;for($h=0;$h<strlen($e);$h++){$ie+=ord($e{$h});}$e.=sprintf("%06o",$ie)."\0 ";return$e.str_repeat("\0",512-strlen($e)).$Wc.str_repeat("\0",511-(strlen($Wc)+511)%
512);}session_cache_limiter("");if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false){session_write_close();}$Ma=array("RESTRICT","CASCADE","SET NULL","NO ACTION");$ib="'(?:''|[^'\\\\]|\\\\.)*+'";$Eb=array("IN","OUT","INOUT");if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"]){$_GET["edit"]=$_GET["select"];}if(isset($_GET["callf"])){$_GET["call"]=$_GET["callf"];}if(isset($_GET["function"])){$_GET["procedure"]=$_GET["function"];}if(isset($_GET["download"])){$i=$_GET["download"];header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$i-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));echo$g->result("SELECT".limit(idf_escape($_GET["field"])." FROM ".table($i)," WHERE ".where($_GET),1));exit;}elseif(isset($_GET["table"])){$i=$_GET["table"];$p=fields($i);if(!$p){$q=error();}$H=($p?table_status($i):array());page_header(($p&&is_view($H)?'View':'Table').": ".h($i),$q);$n->selectLinks($H);$cb=$H["Comment"];if($cb!=""){echo"<p>".'Comment'.": ".h($cb)."\n";}if($p){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($p
as$d){echo"<tr".odd()."><th>".h($d["field"]),"<td>".h($d["full_type"]).($d["null"]?" <i>NULL</i>":"").($d["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(support("comment")?"<td>".nbsp($d["comment"]):""),"\n";}echo"</table>\n";if(!is_view($H)){echo"<h3>".'Indexes'."</h3>\n";$z=indexes($i);if($z){echo"<table cellspacing='0'>\n";foreach($z
as$f=>$t){ksort($t["columns"]);$hb=array();foreach($t["columns"]as$c=>$b){$hb[]="<i>".h($b)."</i>".($t["lengths"][$c]?"(".$t["lengths"][$c].")":"");}echo"<tr title='".h($f)."'><th>$t[type]<td>".implode(", ",$hb)."\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'indexes='.urlencode($i).'">'.'Alter indexes'."</a>\n";if(fk_support($H)){echo"<h3>".'Foreign keys'."</h3>\n";$P=foreign_keys($i);if($P){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'.($r!="sqlite"?"<td>&nbsp;":"")."</thead>\n";foreach($P
as$f=>$F){$y=($F["db"]!=""?"<b>".h($F["db"])."</b>.":"").h($F["table"]);echo"<tr>","<th><i>".implode("</i>, <i>",array_map('h',$F["source"]))."</i>","<td><a href='".h($F["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($F["db"]),ME):ME)."table=".urlencode($F["table"])."'>$y</a>","(<i>".implode("</i>, <i>",array_map('h',$F["target"]))."</i>)","<td>$F[on_delete]\n","<td>$F[on_update]\n";if($r!="sqlite"){echo'<td><a href="'.h(ME.'foreign='.urlencode($i).'&name='.urlencode($f)).'">'.'Alter'.'</a>';}}echo"</table>\n";}if($r!="sqlite"){echo'<p><a href="'.h(ME).'foreign='.urlencode($i).'">'.'Add foreign key'."</a>\n";}}if(support("trigger")){echo"<h3>".'Triggers'."</h3>\n";$vc=triggers($i);if($vc){echo"<table cellspacing='0'>\n";foreach($vc
as$c=>$b){echo"<tr valign='top'><td>$b[0]<td>$b[1]<th>".h($c)."<td><a href='".h(ME.'trigger='.urlencode($i).'&name='.urlencode($c))."'>".'Alter'."</a>\n";}echo"</table>\n";}echo'<p><a href="'.h(ME).'trigger='.urlencode($i).'">'.'Add trigger'."</a>\n";}}}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),DB);$Za=array();$xe=array();$f="adminer_schema";$Ae=($_GET["schema"]?$_GET["schema"]:$_COOKIE[($_COOKIE["$f-".DB]?"$f-".DB:$f)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$Ae,$fa,PREG_SET_ORDER);foreach($fa
as$h=>$m){$Za[$m[1]]=array($m[2],$m[3]);$xe[]="\n\t'".js_escape($m[1])."': [ $m[2], $m[3] ]";}$Fb=0;$Je=-1;$Sa=array();$Ie=array();$Le=array();foreach(table_status()as$a){if(!isset($a["Engine"])){continue;}$cc=0;$Sa[$a["Name"]]["fields"]=array();foreach(fields($a["Name"])as$f=>$d){$cc+=1.25;$d["pos"]=$cc;$Sa[$a["Name"]]["fields"][$f]=$d;}$Sa[$a["Name"]]["pos"]=($Za[$a["Name"]]?$Za[$a["Name"]]:array($Fb,0));foreach($n->foreignKeys($a["Name"])as$b){if(!$b["db"]){$ka=$Je;if($Za[$a["Name"]][1]||$Za[$b["table"]][1]){$ka=min(floatval($Za[$a["Name"]][1]),floatval($Za[$b["table"]][1]))-1;}else{$Je-=.1;}while($Le[(string)$ka]){$ka-=.0001;}$Sa[$a["Name"]]["references"][$b["table"]][(string)$ka]=array($b["source"],$b["target"]);$Ie[$b["table"]][$a["Name"]][(string)$ka]=$b["target"];$Le[(string)$ka]=true;}}$Fb=max($Fb,$Sa[$a["Name"]]["pos"][0]+2.5+$cc);}echo'<div id="schema" style="height: ',$Fb,'em;">
<script type="text/javascript">
tablePos = {',implode(",",$xe)."\n",'};
em = document.getElementById(\'schema\').offsetHeight / ',$Fb,';
document.onmousemove = schemaMousemove;
document.onmouseup = function (ev) {
	schemaMouseup(ev, \'',js_escape(DB),'\');
};
</script>
';foreach($Sa
as$f=>$l){echo"<div class='table' style='top: ".$l["pos"][0]."em; left: ".$l["pos"][1]."em;' onmousedown='schemaMousedown(this, event);'>",'<a href="'.h(ME).'table='.urlencode($f).'"><b>'.h($f)."</b></a><br>\n";foreach($l["fields"]as$d){$b='<span'.type_class($d["type"]).' title="'.h($d["full_type"].($d["null"]?" NULL":'')).'">'.h($d["field"]).'</span>';echo($d["primary"]?"<i>$b</i>":$b)."<br>\n";}foreach((array)$l["references"]as$Kb=>$gc){foreach($gc
as$ka=>$tc){$Tb=$ka-$Za[$f][1];$h=0;foreach($tc[0]as$ua){echo"<div class='references' title='".h($Kb)."' id='refs$ka-".($h++)."' style='left: $Tb"."em; top: ".$l["fields"][$ua]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$Tb)."em;'></div></div>\n";}}}foreach((array)$Ie[$f]as$Kb=>$gc){foreach($gc
as$ka=>$w){$Tb=$ka-$Za[$f][1];$h=0;foreach($w
as$qa){echo"<div class='references' title='".h($Kb)."' id='refd$ka-".($h++)."' style='left: $Tb"."em; top: ".$l["fields"][$qa]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME))."?file=arrow.gif) no-repeat right center;&amp;version=3.2.2'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$Tb)."em;'></div></div>\n";}}}echo"</div>\n";}foreach($Sa
as$f=>$l){foreach((array)$l["references"]as$Kb=>$gc){foreach($gc
as$ka=>$tc){$rc=$Fb;$Yc=-10;foreach($tc[0]as$c=>$ua){$Be=$l["pos"][0]+$l["fields"][$ua]["pos"];$Ce=$Sa[$Kb]["pos"][0]+$Sa[$Kb]["fields"][$tc[1][$c]]["pos"];$rc=min($rc,$Be,$Ce);$Yc=max($Yc,$Be,$Ce);}echo"<div class='references' id='refl$ka' style='left: $ka"."em; top: $rc"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Yc-$rc)."em;'></div></div>\n";}}}echo'</div>
<p><a href="',h(ME."schema=".urlencode($Ae)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$i=$_GET["dump"];if($_POST){$Fe="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$c){$Fe.="&$c=".urlencode($_POST[$c]);}cookie("adminer_export",substr($Fe,1));$rb=dump_headers(($i!=""?$i:DB),(DB==""||count((array)$_POST["tables"]+(array)$_POST["data"])>1));$ab=($_POST["format"]=="sql");if($ab){echo"-- Adminer $bc ".$ra[DRIVER]." dump

".($r!="sql"?"":"SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = ".q($g->result("SELECT @@time_zone")).";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

");}$G=$_POST["db_style"];$A=array(DB);if(DB==""){$A=$_POST["databases"];if(is_string($A)){$A=explode("\n",rtrim(str_replace("\r","",$A),"\n"));}}foreach((array)$A
as$v){if($g->select_db($v)){if($ab&&ereg('CREATE',$G)&&($da=$g->result("SHOW CREATE DATABASE ".idf_escape($v),1))){if($G=="DROP+CREATE"){echo"DROP DATABASE IF EXISTS ".idf_escape($v).";\n";}echo($G=="CREATE+ALTER"?preg_replace('~^CREATE DATABASE ~','\\0IF NOT EXISTS ',$da):$da).";\n";}if($ab){if($G){echo
use_sql($v).";\n\n";}if(in_array("CREATE+ALTER",array($G,$_POST["table_style"]))){echo"SET @adminer_alter = '';\n\n";}$Xa="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Da){foreach(get_rows("SHOW $Da STATUS WHERE Db = ".q($v),null,"-- ")as$a){$Xa.=($G!='DROP+CREATE'?"DROP $Da IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$g->result("SHOW CREATE $Da ".idf_escape($a["Name"]),2).";;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$a){$Xa.=($G!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($a["Name"]).";;\n":"").$g->result("SHOW CREATE EVENT ".idf_escape($a["Name"]),3).";;\n\n";}}if($Xa){echo"DELIMITER ;;\n\n$Xa"."DELIMITER ;\n\n";}}if($_POST["table_style"]||$_POST["data_style"]){$Ga=array();foreach(table_status()as$a){$l=(DB==""||in_array($a["Name"],(array)$_POST["tables"]));$me=(DB==""||in_array($a["Name"],(array)$_POST["data"]));if($l||$me){if(!is_view($a)){if($rb=="tar"){ob_start();}$n->dumpTable($a["Name"],($l?$_POST["table_style"]:""));if($me){$n->dumpData($a["Name"],$_POST["data_style"],"SELECT * FROM ".table($a["Name"]));}if($ab&&$_POST["triggers"]&&$l&&($vc=trigger_sql($a["Name"],$_POST["table_style"]))){echo"\nDELIMITER ;;\n$vc\nDELIMITER ;\n";}if($rb=="tar"){echo
tar_file((DB!=""?"":"$v/")."$a[Name].csv",ob_get_clean());}elseif($ab){echo"\n";}}elseif($ab){$Ga[]=$a["Name"];}}}foreach($Ga
as$_b){$n->dumpTable($_b,$_POST["table_style"],true);}if($rb=="tar"){echo
pack("x512");}}if($G=="CREATE+ALTER"&&$ab){$j="SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";echo"DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $j;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";foreach(get_rows($j)as$a){$cb=q($a["ENGINE"]=="InnoDB"?preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$a["TABLE_COMMENT"]):$a["TABLE_COMMENT"]);echo"
				WHEN ".q($a["TABLE_NAME"])." THEN
					".(isset($a["ENGINE"])?"IF _engine != '$a[ENGINE]' OR _table_collation != '$a[TABLE_COLLATION]' OR _table_comment != $cb THEN
						ALTER TABLE ".idf_escape($a["TABLE_NAME"])." ENGINE=$a[ENGINE] COLLATE=$a[TABLE_COLLATION] COMMENT=$cb;
					END IF":"BEGIN END").";";}echo"
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";}if(in_array("CREATE+ALTER",array($G,$_POST["table_style"]))&&$ab){echo"SELECT @adminer_alter;\n";}}}if($ab){echo"-- ".$g->result("SELECT NOW()")."\n";}exit;}page_header('Export',"",($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),DB);echo'
<form action="" method="post">
<table cellspacing="0">
';$Xd=array('','USE','DROP+CREATE','CREATE');$Dd=array('','DROP+CREATE','CREATE');$ee=array('','TRUNCATE+INSERT','INSERT');if($r=="sql"){$Xd[]='CREATE+ALTER';$Dd[]='CREATE+ALTER';$ee[]='INSERT+UPDATE';}parse_str($_COOKIE["adminer_export"],$a);if(!$a){$a=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");}if(!isset($a["events"])){$a["routines"]=$a["events"]=($_GET["dump"]=="");$a["auto_increment"]=$a["triggers"]=$a["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$n->dumpOutput(),$a["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$n->dumpFormat(),$a["format"],0)."\n";echo($r=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Xd,$a["db_style"]).(support("routine")?checkbox("routines",1,$a["routines"],'Routines'):"").(support("event")?checkbox("events",1,$a["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Dd,$a["table_style"]).checkbox("auto_increment",1,$a["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$a["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$ee,$a["data_style"]),'</table>
<p><input type="submit" value="Export">

<table cellspacing="0">
';$od=array();if(DB!=""){$Ja=($i!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$Ja onclick='formCheck(this, /^tables\\[/);'>".'Tables'."</label>","<th style='text-align: right;'><label>".'Data'."<input type='checkbox' id='check-data'$Ja onclick='formCheck(this, /^data\\[/);'></label>","</thead>\n";$Ga="";foreach(table_status()as$a){$f=$a["Name"];$ec=ereg_replace("_.*","",$f);$Ja=($i==""||$i==(substr($i,-1)=="%"?"$ec%":$f));$hb="<tr><td>".checkbox("tables[]",$f,$Ja,$f,"formUncheck('check-tables');");if(is_view($a)){$Ga.="$hb\n";}else{echo"$hb<td align='right'><label>".($a["Engine"]=="InnoDB"&&$a["Rows"]?"~ ":"").$a["Rows"].checkbox("data[]",$f,$Ja,"","formUncheck('check-data');")."</label>\n";}$od[$ec]++;}echo$Ga;}else{echo"<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'".($i==""?" checked":"")." onclick='formCheck(this, /^databases\\[/);'>".'Database'."</label></thead>\n";$A=get_databases();if($A){foreach($A
as$v){if(!information_schema($v)){$ec=ereg_replace("_.*","",$v);echo"<tr><td>".checkbox("databases[]",$v,$i==""||$i=="$ec%",$v,"formUncheck('check-databases');")."</label>\n";$od[$ec]++;}}}else{echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}}echo'</table>
</form>
';$ma=true;foreach($od
as$c=>$b){if($c!=""&&$b>1){echo($ma?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$c%")."'>".h($c)."</a>";$ma=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');$k=$g->query("SELECT User, Host FROM mysql.user ORDER BY Host, User");if(!$k){echo'<form action=""><p>
';hidden_fields_get();echo'Username: <input name="user">
Server: <input name="host" value="localhost">
<input type="hidden" name="grant" value="">
<input type="submit" value="Edit">
</form>
';$k=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");}echo"<table cellspacing='0'>\n","<thead><tr><th>&nbsp;<th>".'Username'."<th>".'Server'."</thead>\n";while($a=$k->fetch_assoc()){echo'<tr'.odd().'><td><a href="'.h(ME.'user='.urlencode($a["User"]).'&host='.urlencode($a["Host"])).'">'.'edit'.'</a><td>'.h($a["User"])."<td>".h($a["Host"])."\n";}echo"</table>\n",'<p><a href="'.h(ME).'user=">'.'Create user'."</a>";}elseif(isset($_GET["sql"])){if(!$q&&$_POST["export"]){dump_headers("sql");$n->dumpTable("","");$n->dumpData("","table",$_POST["query"]);exit;}restart_session();$af=&get_session("queries");$Oa=&$af[DB];if(!$q&&$_POST["clear"]){$Oa=array();redirect(remove_from_uri("history"));}page_header('SQL command',$q);if(!$q&&$_POST){$ya=false;$j=$_POST["query"];if($_POST["webfile"]){$ya=@fopen((file_exists("adminer.sql")?"adminer.sql":(file_exists("adminer.sql.gz")?"compress.zlib://adminer.sql.gz":"compress.bzip2://adminer.sql.bz2")),"rb");$j=($ya?fread($ya,1e6):false);}elseif($_FILES&&$_FILES["sql_file"]["error"]!=4){$j=get_file("sql_file",true);}if(is_string($j)){if(function_exists('memory_get_usage')){@ini_set("memory_limit",2*strlen($j)+memory_get_usage()+8e6);}if($j!=""&&strlen($j)<1e6){$L=$j.(ereg(';$',$j)?"":";");if(!$Oa||end($Oa)!=$L){$Oa[]=$L;}}$Xb="(?:\\s|/\\*.*\\*/|(?:#|-- )[^\n]*\n|--\n)";if(!ini_bool("session.use_cookies")){session_write_close();}$Xc=";";$ia=0;$Bb=true;$J=connect();if(is_object($J)&&DB!=""){$J->select_db(DB);}$lb=0;$wc=array();$of='[\'`"]'.($r=="pgsql"?'|\\$[^$]*\\$':($r=="mssql"||$r=="sqlite"?'|\\[':'')).'|/\\*|-- |#';$pf=explode(" ",microtime());parse_str($_COOKIE["adminer_export"],$Hb);$ud=$n->dumpFormat();unset($ud["sql"]);while($j!=""){if(!$ia&&$r=="sql"&&preg_match("~^$Xb*DELIMITER\\s+(.+)~i",$j,$m)){$Xc=$m[1];$j=substr($j,strlen($m[0]));}else{preg_match('('.preg_quote($Xc)."|$of|\$)",$j,$m,PREG_OFFSET_CAPTURE,$ia);$Z=$m[0][0];$ia=$m[0][1]+strlen($Z);if(!$Z&&$ya&&!feof($ya)){$j.=fread($ya,1e5);}else{if(!$Z&&rtrim($j)==""){break;}if($Z&&$Z!=$Xc){while(preg_match('('.($Z=='/*'?'\\*/':($Z=='['?']':(ereg('^-- |^#',$Z)?"\n":preg_quote($Z)."|\\\\."))).'|$)s',$j,$m,PREG_OFFSET_CAPTURE,$ia)){$V=$m[0][0];$ia=$m[0][1]+strlen($V);if(!$V&&$ya&&!feof($ya)){$j.=fread($ya,1e6);}elseif($V[0]!="\\"){break;}}}else{$Bb=false;$L=substr($j,0,$m[0][1]);$lb++;$hb="<pre id='sql-$lb'><code class='jush-$r'>".shorten_utf8(trim($L),1000)."</code></pre>\n";if(!$_POST["only_errors"]){echo$hb;ob_flush();flush();}$jb=explode(" ",microtime());if($g->multi_query($L)){if(is_object($J)&&preg_match("~^$Xb*USE\\b~isU",$L)){$J->query($L);}do{$k=$g->store_result();$Ob=explode(" ",microtime());$td=format_time($jb,$Ob).(strlen($L)<1000?" <a href='".h(ME)."sql=".urlencode(trim($L))."'>".'Edit'."</a>":"");if(!is_object($k)){if(preg_match("~^$Xb*(CREATE|DROP|ALTER)$Xb+(DATABASE|SCHEMA)\\b~isU",$L)){restart_session();set_session("dbs",null);session_write_close();}if(!$_POST["only_errors"]){echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$g->affected_rows)."$td\n";}}else{select($k,$J);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n","<p>".($k->num_rows?lang(array('%d row','%d rows'),$k->num_rows):"").$td;$D="export-$lb";$vd=", <a href='#$D' onclick=\"return !toggle('$D');\">".'Export'."</a><span id='$D' class='hidden'>: ".html_select("output",$n->dumpOutput(),$Hb["output"])." ".html_select("format",$ud,$Hb["format"])."<input type='hidden' name='query' value='".h($L)."'>"." <input type='submit' name='export' value='".'Export'."' onclick='eventStop(event);'><input type='hidden' name='token' value='$B'></span>";if($J&&preg_match("~^($Xb|\\()*SELECT\\b~isU",$L)&&($yf=explain($J,$L))){$D="explain-$lb";echo", <a href='#$D' onclick=\"return !toggle('$D');\">EXPLAIN</a>$vd\n","<div id='$D' class='hidden'>\n";select($yf,$J,($r=="sql"?"http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/explain-output.html#":""));echo"</div>\n";}else{echo"$vd\n";}echo"</form>\n";}}$jb=$Ob;}while($g->next_result());}elseif($g->error){echo($_POST["only_errors"]?$hb:""),"<p class='error'>".'Error in query'.": ".error()."\n";$wc[]=" <a href='#sql-$lb'>$lb</a>";if($_POST["error_stops"]){break;}}$j=substr($j,$ia);$ia=0;}}}}if($Bb){echo"<p class='message'>".'No commands to execute.'."\n";}elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$lb-count($wc)).format_time($pf,explode(" ",microtime()))."\n";}elseif($wc&&$lb>1){echo"<p class='error'>".'Error in query'.": ".implode("",$wc)."\n";}}else{echo"<p class='error'>".upload_error($j)."\n";}}echo'
<form action="" method="post" enctype="multipart/form-data">
<p>';$L=$_GET["sql"];if($_POST){$L=$_POST["query"];}elseif($_GET["history"]=="all"){$L=$Oa;}elseif($_GET["history"]!=""){$L=$Oa[$_GET["history"]];}textarea("query",$L,20);echo($_POST?"":"<script type='text/javascript'>document.getElementsByTagName('textarea')[0].focus();</script>\n"),"<p>".(ini_bool("file_uploads")?'File upload'.': <input type="file" name="sql_file"'.($_FILES&&$_FILES["sql_file"]["error"]!=4?'':' onchange="this.form[\'only_errors\'].checked = true;"').'> (&lt; '.ini_get("upload_max_filesize").'B)':'File uploads are disabled.'),'<p>
<input type="submit" value="Execute" title="Ctrl+Enter">
<input type="hidden" name="token" value="',$B,'">
',checkbox("error_stops",1,$_POST["error_stops"],'Stop on error')."\n",checkbox("only_errors",1,$_POST["only_errors"],'Show only errors')."\n";print_fieldset("webfile",'From server',$_POST["webfile"]);$Uc=array();foreach(array("gz"=>"zlib","bz2"=>"bz2")as$c=>$b){if(extension_loaded($b)){$Uc[]=".$c";}}echo
sprintf('Webserver file %s',"<code>adminer.sql".($Uc?"[".implode("|",$Uc)."]":"")."</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n";if($Oa){print_fieldset("history",'History',$_GET["history"]!="");foreach($Oa
as$c=>$b){echo'<a href="'.h(ME."sql=&history=$c").'">'.'Edit'."</a> <code class='jush-$r'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$b)))),80,"</code>")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'
</form>
';}elseif(isset($_GET["edit"])){$i=$_GET["edit"];$x=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0]):""):where($_GET));$La=(isset($_GET["select"])?$_POST["edit"]:$x);$p=fields($i);foreach($p
as$f=>$d){if(!isset($d["privileges"][$La?"update":"insert"])||$n->fieldName($d)==""){unset($p[$f]);}}if($_POST&&!$q&&!isset($_GET["select"])){$O=$_POST["referer"];if($_POST["insert"]){$O=($La?null:$_SERVER["REQUEST_URI"]);}elseif(!ereg('^.+&select=.+$',$O)){$O=ME."select=".urlencode($i);}if(isset($_POST["delete"])){query_redirect("DELETE".limit1("FROM ".table($i)," WHERE $x"),$O,'Item has been deleted.');}else{$u=array();foreach($p
as$f=>$d){$b=process_input($d);if($b!==false&&$b!==null){$u[idf_escape($f)]=($La?"\n".idf_escape($f)." = $b":$b);}}if($La){if(!$u){redirect($O);}query_redirect("UPDATE".limit1(table($i)." SET".implode(",",$u),"\nWHERE $x"),$O,'Item has been updated.');}else{$k=insert_into($i,$u);$yd=($k?last_id():0);queries_redirect($O,sprintf('Item%s has been inserted.',($yd?" $yd":"")),$k);}}}$ta=$n->tableName(table_status($i));page_header(($La?'Edit':'Insert'),$q,array("select"=>array($i,$ta)),$ta);$a=null;if($_POST["save"]){$a=(array)$_POST["fields"];}elseif($x){$C=array();foreach($p
as$f=>$d){if(isset($d["privileges"]["select"])){$C[]=($_POST["clone"]&&$d["auto_increment"]?"'' AS ":(ereg("enum|set",$d["type"])?"1*".idf_escape($f)." AS ":"")).idf_escape($f);}}$a=array();if($C){$E=get_rows("SELECT".limit(implode(", ",$C)." FROM ".table($i)," WHERE $x",(isset($_GET["select"])?2:1)));$a=(isset($_GET["select"])&&count($E)!=1?null:reset($E));}}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';if($p){echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($p
as$f=>$d){echo"<tr><th>".$n->fieldName($d);$Na=$_GET["set"][bracket_escape($f)];$o=(isset($a)?($a[$f]!=""&&ereg("enum|set",$d["type"])?+$a[$f]:$a[$f]):(!$La&&$d["auto_increment"]?"":(isset($_GET["select"])?false:(isset($Na)?$Na:$d["default"]))));if(!$_POST["save"]&&is_string($o)){$o=$n->editVal($o,$d);}$_=($_POST["save"]?(string)$_POST["function"][$f]:($x&&$d["on_update"]=="CURRENT_TIMESTAMP"?"now":($o===false?null:(isset($o)?'':'NULL'))));if($d["type"]=="timestamp"&&$o=="CURRENT_TIMESTAMP"){$o="";$_="now";}input($d,$o,$_);echo"\n";}echo"</table>\n";}echo'<p>
';if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo'<input type="submit" name="insert" value="'.($La?'Save and continue edit':'Save and insert next')."\">\n";}}echo($La?"<input type='submit' name='delete' value='".'Delete'."' onclick=\"return confirm('".'Are you sure?'."');\">\n":($_POST||!$p?"":"<script type='text/javascript'>document.getElementById('form').getElementsByTagName('td')[1].firstChild.focus();</script>\n"));if(isset($_GET["select"])){hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));}echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["create"])){$i=$_GET["create"];$xd=array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST');$Gd=referencable_primary($i);$P=array();foreach($Gd
as$ta=>$d){$P[str_replace("`","``",$ta)."`".str_replace("`","``",$d["field"])]=$ta;}$xc=array();$Ac=array();if($i!=""){$xc=fields($i);$Ac=table_status($i);}if($_POST&&!$_POST["fields"]){$_POST["fields"]=array();}if($_POST&&!$q&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){if($_POST["drop"]){query_redirect("DROP TABLE ".table($i),substr(ME,0,-1),'Table has been dropped.');}else{$p=array();$Nc=array();ksort($_POST["fields"]);$Qc=reset($xc);$tb="FIRST";foreach($_POST["fields"]as$c=>$d){$F=$P[$d["type"]];$uc=(isset($F)?$Gd[$F]:$d);if($d["field"]!=""){if(!$d["has_default"]){$d["default"]=null;}$Na=eregi_replace(" *on update CURRENT_TIMESTAMP","",$d["default"]);if($Na!=$d["default"]){$d["on_update"]="CURRENT_TIMESTAMP";$d["default"]=$Na;}if($c==$_POST["auto_increment_col"]){$d["auto_increment"]=true;}$Wd=process_field($d,$uc);if($Wd!=process_field($Qc,$Qc)){$p[]=array($d["orig"],$Wd,$tb);}if(isset($F)){$Nc[idf_escape($d["field"])]=($i!=""?"ADD":" ")." FOREIGN KEY (".idf_escape($d["field"]).") REFERENCES ".table($P[$d["type"]])." (".idf_escape($uc["field"]).")".(in_array($d["on_delete"],$Ma)?" ON DELETE $d[on_delete]":"");}$tb="AFTER ".idf_escape($d["field"]);}elseif($d["orig"]!=""){$p[]=array($d["orig"]);}if($d["orig"]!=""){$Qc=next($xc);}}$Zb="";if(in_array($_POST["partition_by"],$xd)){$Rc=array();if($_POST["partition_by"]=='RANGE'||$_POST["partition_by"]=='LIST'){foreach(array_filter($_POST["partition_names"])as$c=>$b){$o=$_POST["partition_values"][$c];$Rc[]="\nPARTITION ".idf_escape($b)." VALUES ".($_POST["partition_by"]=='RANGE'?"LESS THAN":"IN").($o!=""?" ($o)":" MAXVALUE");}}$Zb.="\nPARTITION BY $_POST[partition_by]($_POST[partition])".($Rc?" (".implode(",",$Rc)."\n)":($_POST["partitions"]?" PARTITIONS ".(+$_POST["partitions"]):""));}elseif($i!=""&&support("partitioning")){$Zb.="\nREMOVE PARTITIONING";}$ga='Table has been altered.';if($i==""){cookie("adminer_engine",$_POST["Engine"]);$ga='Table has been created.';}queries_redirect(ME."table=".urlencode($_POST["name"]),$ga,alter_table($i,$_POST["name"],$p,$Nc,$_POST["Comment"],($_POST["Engine"]&&$_POST["Engine"]!=$Ac["Engine"]?$_POST["Engine"]:""),($_POST["Collation"]&&$_POST["Collation"]!=$Ac["Collation"]?$_POST["Collation"]:""),($_POST["Auto_increment"]!=""?+$_POST["Auto_increment"]:""),$Zb));}}page_header(($i!=""?'Alter table':'Create table'),$q,array("table"=>$i),$i);$a=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($ba["int"])?"int":(isset($ba["integer"])?"integer":"")))),"partition_names"=>array(""),);if($_POST){$a=$_POST;if($a["auto_increment_col"]){$a["fields"][$a["auto_increment_col"]]["auto_increment"]=true;}process_fields($a["fields"]);}elseif($i!=""){$a=$Ac;$a["name"]=$i;$a["fields"]=array();if(!$_GET["auto_increment"]){$a["Auto_increment"]="";}foreach($xc
as$d){$d["has_default"]=isset($d["default"]);if($d["on_update"]){$d["default"].=" ON UPDATE $d[on_update]";}$a["fields"][]=$d;}if(support("partitioning")){$Gb="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($i);$k=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $Gb ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($a["partition_by"],$a["partitions"],$a["partition"])=$k->fetch_row();$a["partition_names"]=array();$a["partition_values"]=array();foreach(get_rows("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $Gb AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION")as$Yd){$a["partition_names"][]=$Yd["PARTITION_NAME"];$a["partition_values"][]=$Yd["PARTITION_DESCRIPTION"];}$a["partition_names"][]="";}}$S=collations();$Pc=floor(extension_loaded("suhosin")?(min(ini_get("suhosin.request.max_vars"),ini_get("suhosin.post.max_vars"))-13)/10:0);if($Pc&&count($a["fields"])>$Pc){echo"<p class='error'>".h(sprintf('Maximum number of allowed fields exceeded. Please increase %s and %s.','suhosin.post.max_vars','suhosin.request.max_vars'))."\n";}$nd=engines();foreach($nd
as$fc){if(!strcasecmp($fc,$a["Engine"])){$a["Engine"]=$fc;break;}}echo'
<form action="" method="post" id="form">
<p>
Table name: <input name="name" maxlength="64" value="',h($a["name"]),'">
';if($i==""&&!$_POST){?><script type='text/javascript'>document.getElementById('form')['name'].focus();</script><?php }echo($nd?html_select("Engine",array(""=>"(".'engine'.")")+$nd,$a["Engine"]):""),' ',($S&&!ereg("sqlite|mssql",$r)?html_select("Collation",array(""=>"(".'collation'.")")+$S,$a["Collation"]):""),' <input type="submit" value="Save">
<table cellspacing="0" id="edit-fields" class="nowrap">
';$ob=edit_fields($a["fields"],$S,"TABLE",$Pc,$P,$a["Comment"]!="");echo'</table>
<p>
Auto Increment: <input name="Auto_increment" size="6" value="',h($a["Auto_increment"]),'">
<label class="jsonly"><input type="checkbox" onclick="columnShow(this.checked, 5);">Default values</label>
',(support("comment")?checkbox("","",$ob,'Comment',"columnShow(this.checked, 6); toggle('Comment'); if (this.checked) this.form['Comment'].focus();").' <input id="Comment" name="Comment" value="'.h($a["Comment"]).'" maxlength="60"'.($ob?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="Save">
';if($_GET["create"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$B,'">
';if(support("partitioning")){$ce=ereg('RANGE|LIST',$a["partition_by"]);print_fieldset("partition",'Partition by',$a["partition_by"]);echo'<p>
',html_select("partition_by",array(-1=>"")+$xd,$a["partition_by"],"partitionByChange(this);"),'(<input name="partition" value="',h($a["partition"]),'">)
Partitions: <input name="partitions" size="2" value="',h($a["partitions"]),'"',($ce||!$a["partition_by"]?" class='hidden'":""),'>
<table cellspacing="0" id="partition-table"',($ce?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($a["partition_names"]as$c=>$b){echo'<tr>','<td><input name="partition_names[]" value="'.h($b).'"'.($c==count($a["partition_names"])-1?' onchange="partitionNameChange(this);"':'').'>','<td><input name="partition_values[]" value="'.h($a["partition_values"][$c]).'">';}echo'</table>
</div></fieldset>
';}echo'</form>
';}elseif(isset($_GET["indexes"])){$i=$_GET["indexes"];$qc=array("PRIMARY","UNIQUE","INDEX");$H=table_status($i);if(eregi("MyISAM|M?aria",$H["Engine"])){$qc[]="FULLTEXT";}$z=indexes($i);if($r=="sqlite"){unset($qc[0]);unset($z[""]);}if($_POST&&!$q&&!$_POST["add"]){$ha=array();foreach($_POST["indexes"]as$t){if(in_array($t["type"],$qc)){$w=array();$Jb=array();$u=array();ksort($t["columns"]);foreach($t["columns"]as$c=>$ea){if($ea!=""){$xa=$t["lengths"][$c];$u[]=idf_escape($ea).($xa?"(".(+$xa).")":"");$w[]=$ea;$Jb[]=($xa?$xa:null);}}if($w){foreach($z
as$f=>$eb){ksort($eb["columns"]);ksort($eb["lengths"]);if($t["type"]==$eb["type"]&&array_values($eb["columns"])===$w&&(!$eb["lengths"]||array_values($eb["lengths"])===$Jb)){unset($z[$f]);continue
2;}}$ha[]=array($t["type"],"(".implode(", ",$u).")");}}}foreach($z
as$f=>$eb){$ha[]=array($eb["type"],idf_escape($f),"DROP");}if(!$ha){redirect(ME."table=".urlencode($i));}queries_redirect(ME."table=".urlencode($i),'Indexes have been altered.',alter_indexes($i,$ha));}page_header('Indexes',$q,array("table"=>$i),$i);$p=array_keys(fields($i));$a=array("indexes"=>$z);if($_POST){$a=$_POST;if($_POST["add"]){foreach($a["indexes"]as$c=>$t){if($t["columns"][count($t["columns"])]!=""){$a["indexes"][$c]["columns"][]="";}}$t=end($a["indexes"]);if($t["type"]||array_filter($t["columns"],'strlen')||array_filter($t["lengths"],'strlen')){$a["indexes"][]=array("columns"=>array(1=>""));}}}else{foreach($a["indexes"]as$c=>$t){$a["indexes"][$c]["columns"][]="";}$a["indexes"][]=array("columns"=>array(1=>""));}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr><th>Index Type<th>Column (length)</thead>
';$aa=1;foreach($a["indexes"]as$t){echo"<tr><td>".html_select("indexes[$aa][type]",array(-1=>"")+$qc,$t["type"],($aa==count($a["indexes"])?"indexesAddRow(this);":1))."<td>";ksort($t["columns"]);$h=1;foreach($t["columns"]as$c=>$ea){echo"<span>".html_select("indexes[$aa][columns][$h]",array(-1=>"")+$p,$ea,($h==count($t["columns"])?"indexesAddColumn(this);":1)),"<input name='indexes[$aa][lengths][$h]' size='2' value='".h($t["lengths"][$c])."'> </span>";$h++;}$aa++;}echo'</table>
<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add next"></noscript>
<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["database"])){if($_POST&&!$q&&!isset($_POST["add_x"])){restart_session();if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$_POST["name"]){if(DB!=""){$_GET["db"]=$_POST["name"];queries_redirect(preg_replace('~db=[^&]*&~','',ME)."db=".urlencode($_POST["name"]),'Database has been renamed.',rename_database($_POST["name"],$_POST["collation"]));}else{$A=explode("\n",str_replace("\r","",$_POST["name"]));$ae=true;$bb="";foreach($A
as$v){if(count($A)==1||$v!=""){if(!create_database($v,$_POST["collation"])){$ae=false;}$bb=$v;}}queries_redirect(ME."db=".urlencode($bb),'Database has been created.',$ae);}}else{if(!$_POST["collation"]){redirect(substr(ME,0,-1));}query_redirect("ALTER DATABASE ".idf_escape($_POST["name"]).(eregi('^[a-z0-9_]+$',$_POST["collation"])?" COLLATE $_POST[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$q,array(),DB);$S=collations();$f=DB;$Sb=null;if($_POST){$f=$_POST["name"];$Sb=$_POST["collation"];}elseif(DB!=""){$Sb=db_collation(DB,$S);}elseif($r=="sql"){foreach(get_vals("SHOW GRANTS")as$Q){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$Q,$m)&&$m[1]){$f=stripcslashes(idf_unescape("`$m[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($f,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($f).'</textarea><br>':'<input id="name" name="name" value="'.h($f).'" maxlength="64">')."\n".($S?html_select("collation",array(""=>"(".'collation'.")")+$S,$Sb):"");?>
<script type='text/javascript'>document.getElementById('name').focus();</script>
<input type="submit" value="Save">
<?php
if(DB!=""){echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";}elseif(!$_POST["add_x"]&&$_GET["db"]==""){echo"<input type='image' name='add' src='".h(preg_replace("~\\?.*~","",ME))."?file=plus.gif&amp;version=3.2.2' alt='+' title='".'Add next'."'>\n";}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["call"])){$Ea=$_GET["call"];page_header('Call'.": ".h($Ea),$q);$Da=routine($Ea,(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$vb=array();$Xa=array();foreach($Da["fields"]as$h=>$d){if(substr($d["inout"],-3)=="OUT"){$Xa[$h]="@".idf_escape($d["field"])." AS ".idf_escape($d["field"]);}if(!$d["inout"]||substr($d["inout"],0,2)=="IN"){$vb[]=$h;}}if(!$q&&$_POST){$Td=array();foreach($Da["fields"]as$c=>$d){if(in_array($c,$vb)){$b=process_input($d);if($b===false){$b="''";}if(isset($Xa[$c])){$g->query("SET @".idf_escape($d["field"])." = $b");}}$Td[]=(isset($Xa[$c])?"@".idf_escape($d["field"]):$b);}$j=(isset($_GET["callf"])?"SELECT":"CALL")." ".idf_escape($Ea)."(".implode(", ",$Td).")";echo"<p><code class='jush-$r'>".h($j)."</code> <a href='".h(ME)."sql=".urlencode($j)."'>".'Edit'."</a>\n";if(!$g->multi_query($j)){echo"<p class='error'>".error()."\n";}else{do{$k=$g->store_result();if(is_object($k)){select($k);}else{echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$g->affected_rows)."\n";}}while($g->next_result());if($Xa){select($g->query("SELECT ".implode(", ",$Xa)));}}}echo'
<form action="" method="post">
';if($vb){echo"<table cellspacing='0'>\n";foreach($vb
as$c){$d=$Da["fields"][$c];$f=$d["field"];echo"<tr><th>".$n->fieldName($d);$o=$_POST["fields"][$f];if($o!=""){if($d["type"]=="enum"){$o=+$o;}if($d["type"]=="set"){$o=array_sum($o);}}input($d,$o,(string)$_POST["function"][$f]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["foreign"])){$i=$_GET["foreign"];if($_POST&&!$q&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){if($_POST["drop"]){query_redirect("ALTER TABLE ".table($i)."\nDROP ".($r=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($_GET["name"]),ME."table=".urlencode($i),'Foreign key has been dropped.');}else{$ua=array_filter($_POST["source"],'strlen');ksort($ua);$qa=array();foreach($ua
as$c=>$b){$qa[$c]=$_POST["target"][$c];}query_redirect("ALTER TABLE ".table($i).($_GET["name"]!=""?"\nDROP FOREIGN KEY ".idf_escape($_GET["name"]).",":"")."\nADD FOREIGN KEY (".implode(", ",array_map('idf_escape',$ua)).") REFERENCES ".table($_POST["table"])." (".implode(", ",array_map('idf_escape',$qa)).")".(in_array($_POST["on_delete"],$Ma)?" ON DELETE $_POST[on_delete]":"").(in_array($_POST["on_update"],$Ma)?" ON UPDATE $_POST[on_update]":""),ME."table=".urlencode($i),($_GET["name"]!=""?'Foreign key has been altered.':'Foreign key has been created.'));$q='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$q";}}page_header('Foreign key',$q,array("table"=>$i),$i);$a=array("table"=>$i,"source"=>array(""));if($_POST){$a=$_POST;ksort($a["source"]);if($_POST["add"]){$a["source"][]="";}elseif($_POST["change"]||$_POST["change-js"]){$a["target"]=array();}}elseif($_GET["name"]!=""){$P=foreign_keys($i);$a=$P[$_GET["name"]];$a["source"][]="";}$ua=array_keys(fields($i));$qa=($i===$a["table"]?$ua:array_keys(fields($a["table"])));$Nd=array();foreach(table_status()as$f=>$H){if(fk_support($H)){$Nd[]=$f;}}echo'
<form action="" method="post">
<p>
';if($a["db"]==""){echo'Target table:
',html_select("table",$Nd,$a["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th>Source<th>Target</thead>
';$aa=0;foreach($a["source"]as$c=>$b){echo"<tr>","<td>".html_select("source[".(+$c)."]",array(-1=>"")+$ua,$b,($aa==count($a["source"])-1?"foreignAddRow(this);":1)),"<td>".html_select("target[".(+$c)."]",$qa,$a["target"][$c]);$aa++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+$Ma,$a["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+$Ma,$a["on_update"]),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["view"])){$i=$_GET["view"];$Ka=false;if($_POST&&!$q){$Ka=drop_create("DROP VIEW ".table($i),"CREATE VIEW ".table($_POST["name"])." AS\n$_POST[select]",($_POST["drop"]?substr(ME,0,-1):ME."table=".urlencode($_POST["name"])),'View has been dropped.','View has been altered.','View has been created.',$i);}page_header(($i!=""?'Alter view':'Create view'),$q,array("table"=>$i),$i);$a=array();if($_POST){$a=$_POST;}elseif($i!=""){$a=view($i);$a["name"]=$i;}echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($a["name"]),'" maxlength="64">
<p>';textarea("select",$a["select"]);echo'<p>
';if($Ka){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="submit" value="Save">
';if($_GET["view"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["event"])){$Ua=$_GET["event"];$Md=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$jd=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");if($_POST&&!$q){if($_POST["drop"]){query_redirect("DROP EVENT ".idf_escape($Ua),substr(ME,0,-1),'Event has been dropped.');}elseif(in_array($_POST["INTERVAL_FIELD"],$Md)&&isset($jd[$_POST["STATUS"]])){$Od="\nON SCHEDULE ".($_POST["INTERVAL_VALUE"]?"EVERY ".q($_POST["INTERVAL_VALUE"])." $_POST[INTERVAL_FIELD]".($_POST["STARTS"]?" STARTS ".q($_POST["STARTS"]):"").($_POST["ENDS"]?" ENDS ".q($_POST["ENDS"]):""):"AT ".q($_POST["STARTS"]))." ON COMPLETION".($_POST["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($Ua!=""?'Event has been altered.':'Event has been created.'),queries(($Ua!=""?"ALTER EVENT ".idf_escape($Ua).$Od.($Ua!=$_POST["EVENT_NAME"]?"\nRENAME TO ".idf_escape($_POST["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($_POST["EVENT_NAME"]).$Od)."\n".$jd[$_POST["STATUS"]]." COMMENT ".q($_POST["EVENT_COMMENT"]).rtrim(" DO\n$_POST[EVENT_DEFINITION]",";").";"));}}page_header(($Ua!=""?'Alter event'.": ".h($Ua):'Create event'),$q);$a=array();if($_POST){$a=$_POST;}elseif($Ua!=""){$E=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($Ua));$a=reset($E);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($a["EVENT_NAME"]),'" maxlength="64">
<tr><th>Start<td><input name="STARTS" value="',h("$a[EXECUTE_AT]$a[STARTS]"),'">
<tr><th>End<td><input name="ENDS" value="',h($a["ENDS"]),'">
<tr><th>Every<td><input name="INTERVAL_VALUE" value="',h($a["INTERVAL_VALUE"]),'" size="6"> ',html_select("INTERVAL_FIELD",$Md,$a["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$jd,$a["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($a["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$a["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$a["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($Ua!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["procedure"])){$Ea=$_GET["procedure"];$Da=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$Ka=false;if($_POST&&!$q&&!$_POST["add"]&&!$_POST["drop_col"]&&!$_POST["up"]&&!$_POST["down"]){$u=array();$p=(array)$_POST["fields"];ksort($p);foreach($p
as$d){if($d["field"]!=""){$u[]=(in_array($d["inout"],$Eb)?"$d[inout] ":"").idf_escape($d["field"]).process_type($d,"CHARACTER SET");}}$Ka=drop_create("DROP $Da ".idf_escape($Ea),"CREATE $Da ".idf_escape($_POST["name"])." (".implode(", ",$u).")".(isset($_GET["function"])?" RETURNS".process_type($_POST["returns"],"CHARACTER SET"):"").rtrim("\n$_POST[definition]",";").";",substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$Ea);}page_header(($Ea!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($Ea):(isset($_GET["function"])?'Create function':'Create procedure')),$q);$S=get_vals("SHOW CHARACTER SET");sort($S);$a=array("fields"=>array());if($_POST){$a=$_POST;$a["fields"]=(array)$a["fields"];process_fields($a["fields"]);}elseif($Ea!=""){$a=routine($Ea,$Da);$a["name"]=$Ea;}echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($a["name"]),'" maxlength="64">
<table cellspacing="0" class="nowrap">
';edit_fields($a["fields"],$S,$Da);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$a["returns"],$S);}echo'</table>
<p>';textarea("definition",$a["definition"]);echo'<p>
<input type="submit" value="Save">
';if($Ea!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}if($Ka){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["type"])){$zc=$_GET["type"];if($_POST&&!$q){$y=substr(ME,0,-1);if($_POST["drop"]){query_redirect("DROP TYPE ".idf_escape($zc),$y,'Type has been dropped.');}else{query_redirect("CREATE TYPE ".idf_escape($_POST["name"])." $_POST[as]",$y,'Type has been created.');}}page_header($zc!=""?'Alter type'.": ".h($zc):'Create type',$q);$a["as"]="AS ";if($_POST){$a=$_POST;}echo'
<form action="" method="post">
<p>
';if($zc!=""){echo"<input type='submit' name='drop' value='".'Drop'."'".confirm().">\n";}else{echo"<input name='name' value='".h($a['name'])."'>\n";textarea("as",$a["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["trigger"])){$i=$_GET["trigger"];$yc=trigger_options();$Sd=array("INSERT","UPDATE","DELETE");$Ka=false;if($_POST&&!$q&&in_array($_POST["Timing"],$yc["Timing"])&&in_array($_POST["Event"],$Sd)&&in_array($_POST["Type"],$yc["Type"])){$Rd=" $_POST[Timing] $_POST[Event]";$mb=" ON ".table($i);$Ka=drop_create("DROP TRIGGER ".idf_escape($_GET["name"]).($r=="pgsql"?$mb:""),"CREATE TRIGGER ".idf_escape($_POST["Trigger"]).($r=="mssql"?$mb.$Rd:$Rd.$mb).rtrim(" $_POST[Type]\n$_POST[Statement]",";").";",ME."table=".urlencode($i),'Trigger has been dropped.','Trigger has been altered.','Trigger has been created.',$_GET["name"]);}page_header(($_GET["name"]!=""?'Alter trigger'.": ".h($_GET["name"]):'Create trigger'),$q,array("table"=>$i));$a=array("Trigger"=>$i."_bi");if($_POST){$a=$_POST;}elseif($_GET["name"]!=""){$a=trigger($_GET["name"]);}echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Time<td>',html_select("Timing",$yc["Timing"],$a["Timing"],"if (/^".h(preg_quote($i,"/"))."_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '".h(js_escape($i))."_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();"),'<tr><th>Event<td>',html_select("Event",$Sd,$a["Event"],"this.form['Timing'].onchange();"),'<tr><th>Type<td>',html_select("Type",$yc["Type"],$a["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($a["Trigger"]),'" maxlength="64">
<p>';textarea("Statement",$a["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($_GET["name"]!=""){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}if($Ka){echo'<input type="hidden" name="dropped" value="1">';}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["user"])){$Zc=$_GET["user"];$Y=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$a){foreach(explode(",",($a["Privilege"]=="Grant option"?"":$a["Context"]))as$Bc){$Y[$Bc][$a["Privilege"]]=$a["Comment"];}}$Y["Server Admin"]+=$Y["File access on server"];$Y["Databases"]["Create routine"]=$Y["Procedures"]["Create routine"];unset($Y["Procedures"]["Create routine"]);$Y["Columns"]=array();foreach(array("Select","Insert","Update","References")as$b){$Y["Columns"][$b]=$Y["Tables"][$b];}unset($Y["Server Admin"]["Usage"]);foreach($Y["Tables"]as$c=>$b){unset($Y["Databases"][$c]);}$dc=array();if($_POST){foreach($_POST["objects"]as$c=>$b){$dc[$b]=(array)$dc[$b]+(array)$_POST["grants"][$c];}}$Ta=array();$kc="";if(isset($_GET["host"])&&($k=$g->query("SHOW GRANTS FOR ".q($Zc)."@".q($_GET["host"])))){while($a=$k->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$a[0],$m)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$m[1],$fa,PREG_SET_ORDER)){foreach($fa
as$b){if($b[1]!="USAGE"){$Ta["$m[2]$b[2]"][$b[1]]=true;}if(ereg(' WITH GRANT OPTION',$a[0])){$Ta["$m[2]$b[2]"]["GRANT OPTION"]=true;}}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$a[0],$m)){$kc=$m[1];}}}if($_POST&&!$q){$Cb=(isset($_GET["host"])?q($Zc)."@".q($_GET["host"]):"''");$Va=q($_POST["user"])."@".q($_POST["host"]);$kd=q($_POST["pass"]);if($_POST["drop"]){query_redirect("DROP USER $Cb",ME."privileges=",'User has been dropped.');}else{if($Cb!=$Va){$q=!queries(($g->server_info<5?"GRANT USAGE ON *.* TO":"CREATE USER")." $Va IDENTIFIED BY".($_POST["hashed"]?" PASSWORD":"")." $kd");}elseif($_POST["pass"]!=$kc||!$_POST["hashed"]){queries("SET PASSWORD FOR $Va = ".($_POST["hashed"]?$kd:"PASSWORD($kd)"));}if(!$q){$ac=array();foreach($dc
as$Qa=>$Q){if(isset($_GET["grant"])){$Q=array_filter($Q);}$Q=array_keys($Q);if(isset($_GET["grant"])){$ac=array_diff(array_keys(array_filter($dc[$Qa],'strlen')),$Q);}elseif($Cb==$Va){$Zd=array_keys((array)$Ta[$Qa]);$ac=array_diff($Zd,$Q);$Q=array_diff($Q,$Zd);unset($Ta[$Qa]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Qa,$m)&&(!grant("REVOKE",$ac,$m[2]," ON $m[1] FROM $Va")||!grant("GRANT",$Q,$m[2]," ON $m[1] TO $Va"))){$q=true;break;}}}if(!$q&&isset($_GET["host"])){if($Cb!=$Va){queries("DROP USER $Cb");}elseif(!isset($_GET["grant"])){foreach($Ta
as$Qa=>$ac){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Qa,$m)){grant("REVOKE",array_keys($ac),$m[2]," ON $m[1] FROM $Va");}}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$q);if($Cb!=$Va){$g->query("DROP USER $Va");}}}page_header((isset($_GET["host"])?'Username'.": ".h("$Zc@$_GET[host]"):'Create user'),$q,array("privileges"=>array('','Privileges')));if($_POST){$a=$_POST;$Ta=$dc;}else{$a=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$a["pass"]=$kc;if($kc!=""){$a["hashed"]=true;}$Ta[""]=true;}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Username<td><input name="user" maxlength="16" value="',h($a["user"]),'">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($a["host"]),'">
<tr><th>Password<td><input id="pass" name="pass" value="',h($a["pass"]),'">
';if(!$a["hashed"]){echo'<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';}echo
checkbox("hashed",1,$a["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/".substr($g->server_info,0,3)."/en/grant.html#priv_level' target='_blank' rel='noreferrer'>".'Privileges'."</a>";$h=0;foreach($Ta
as$Qa=>$Q){echo'<th>'.($Qa!="*.*"?"<input name='objects[$h]' value='".h($Qa)."' size='10'>":"<input type='hidden' name='objects[$h]' value='*.*' size='10'>*.*");$h++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Bc=>$Pb){foreach((array)$Y[$Bc]as$Ub=>$cb){echo"<tr".odd()."><td".($Pb?">$Pb<td":" colspan='2'").' lang="en" title="'.h($cb).'">'.h($Ub);$h=0;foreach($Ta
as$Qa=>$Q){$f="'grants[$h][".h(strtoupper($Ub))."]'";$o=$Q[strtoupper($Ub)];if($Bc=="Server Admin"&&$Qa!=(isset($Ta["*.*"])?"*.*":"")){echo"<td>&nbsp;";}elseif(isset($_GET["grant"])){echo"<td><select name=$f><option><option value='1'".($o?" selected":"").">".'Grant'."<option value='0'".($o=="0"?" selected":"").">".'Revoke'."</select>";}else{echo"<td align='center'><input type='checkbox' name=$f value='1'".($o?" checked":"").($Ub=="All privileges"?" id='grants-$h-all'":($Ub=="Grant option"?"":" onclick=\"if (this.checked) formUncheck('grants-$h-all');\"")).">";}$h++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop"',confirm(),'>';}echo'<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["processlist"])){if($_POST&&!$q){$ld=0;foreach((array)$_POST["kill"]as$b){if(queries("KILL ".(+$b))){$ld++;}}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$ld),$ld||!$_POST["kill"]);}page_header('Process list',$q);echo'
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);" class="nowrap">
';$h=-1;foreach(get_rows("SHOW FULL PROCESSLIST")as$h=>$a){if(!$h){echo"<thead><tr lang='en'><th>&nbsp;<th>".implode("<th>",array_keys($a))."</thead>\n";}echo"<tr".odd()."><td>".checkbox("kill[]",$a["Id"],0);foreach($a
as$c=>$b){echo"<td>".($c=="Info"&&$b!=""?"<code class='jush-$r'>".shorten_utf8($b,100,"</code>").' <a href="'.h(ME.($a["db"]!=""?"db=".urlencode($a["db"])."&":"")."sql=".urlencode($b)).'">'.'Edit'.'</a>':nbsp($b));}echo"\n";}echo'</table>
<p>',($h+1)."/".sprintf('%d in total',$g->result("SELECT @@max_connections")),'<p>
<input type="submit" value="Kill">
<input type="hidden" name="token" value="',$B,'">
</form>
';}elseif(isset($_GET["select"])){$i=$_GET["select"];$H=table_status($i);$z=indexes($i);$p=fields($i);$P=column_foreign_keys($i);if($H["Oid"]=="t"){$z[]=array("type"=>"PRIMARY","columns"=>array("oid"));}$Kd=array();$w=array();$kb=null;foreach($p
as$c=>$d){$f=$n->fieldName($d);if(isset($d["privileges"]["select"])&&$f!=""){$w[$c]=html_entity_decode(strip_tags($f));if(ereg('text|lob',$d["type"])){$kb=$n->selectLengthProcess();}}$Kd+=$d["privileges"];}list($C,$ca)=$n->selectColumnsProcess($w,$z);$x=$n->selectSearchProcess($p,$z);$Fa=$n->selectOrderProcess($p,$z);$R=$n->selectLimitProcess();$Gb=($C?implode(", ",$C):($H["Oid"]=="t"?"oid, ":"")."*")."\nFROM ".table($i);$md=($ca&&count($ca)<count($C)?"\nGROUP BY ".implode(", ",$ca):"").($Fa?"\nORDER BY ".implode(", ",$Fa):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Pa=>$a){echo$g->result("SELECT".limit(idf_escape(key($a))." FROM ".table($i)," WHERE ".where_check($Pa).($x?" AND ".implode(" AND ",$x):"").($Fa?" ORDER BY ".implode(", ",$Fa):""),1));}exit;}if($_POST&&!$q){$zd="(".implode(") OR (",array_map('where_check',(array)$_POST["check"])).")";$Ic=$nc=null;foreach($z
as$t){if($t["type"]=="PRIMARY"){$Ic=array_flip($t["columns"]);$nc=($C?$Ic:array());break;}}foreach($C
as$c=>$b){$b=$_GET["columns"][$c];if(!$b["fun"]){unset($nc[$b["col"]]);}}if($_POST["export"]){dump_headers($i);$n->dumpTable($i,"");if(!is_array($_POST["check"])||$nc===array()){$yb=$x;if(is_array($_POST["check"])){$yb[]="($zd)";}$j="SELECT $Gb".($yb?"\nWHERE ".implode(" AND ",$yb):"").$md;}else{$Hd=array();foreach($_POST["check"]as$b){$Hd[]="(SELECT".limit($Gb,"\nWHERE ".($x?implode(" AND ",$x)." AND ":"").where_check($b).$md,1).")";}$j=implode(" UNION ALL ",$Hd);}$n->dumpData($i,"table",$j);exit;}if(!$n->selectEmailProcess($x,$P)){if($_POST["save"]||$_POST["delete"]){$k=true;$db=0;$j=table($i);$u=array();if(!$_POST["delete"]){foreach($w
as$f=>$b){$b=process_input($p[$f]);if($b!==null){if($_POST["clone"]){$u[idf_escape($f)]=($b!==false?$b:idf_escape($f));}elseif($b!==false){$u[]=idf_escape($f)." = $b";}}}$j.=($_POST["clone"]?" (".implode(", ",array_keys($u)).")\nSELECT ".implode(", ",$u)."\nFROM ".table($i):" SET\n".implode(",\n",$u));}if($_POST["delete"]||$u){$oc="UPDATE";if($_POST["delete"]){$oc="DELETE";$j="FROM $j";}if($_POST["clone"]){$oc="INSERT";$j="INTO $j";}if($_POST["all"]||($nc===array()&&$_POST["check"])||count($ca)<count($C)){$k=queries($oc." $j".($_POST["all"]?($x?"\nWHERE ".implode(" AND ",$x):""):"\nWHERE $zd"));$db=$g->affected_rows;}else{foreach((array)$_POST["check"]as$b){$k=queries($oc.limit1($j,"\nWHERE ".where_check($b)));if(!$k){break;}$db+=$g->affected_rows;}}}queries_redirect(remove_from_uri("page"),lang(array('%d item has been affected.','%d items have been affected.'),$db),$k);}elseif(!$_POST["import"]){if(!$_POST["val"]){$q='Double click on a value to modify it.';}else{$k=true;$db=0;foreach($_POST["val"]as$Pa=>$a){$u=array();foreach($a
as$c=>$b){$c=bracket_escape($c,1);$u[]=idf_escape($c)." = ".(ereg('char|text',$p[$c]["type"])||$b!=""?$n->processInput($p[$c],$b):"NULL");}$j=table($i)." SET ".implode(", ",$u);$yb=" WHERE ".where_check($Pa).($x?" AND ".implode(" AND ",$x):"");$k=queries("UPDATE".(count($ca)<count($C)?" $j$yb":limit1($j,$yb)));if(!$k){break;}$db+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$db),$k);}}elseif(is_string($wa=get_file("csv_file",true))){$k=true;$Wa=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$wa,$fa);$db=count($fa[0]);begin();$hc=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));foreach($fa[0]as$c=>$b){preg_match_all("~((\"[^\"]*\")+|[^$hc]*)$hc~",$b.$hc,$bd);if(!$c&&!array_diff($bd[1],$Wa)){$Wa=$bd[1];$db--;}else{$u=array();foreach($bd[1]as$h=>$sc){$u[idf_escape($Wa[$h])]=($sc==""&&$p[$Wa[$h]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$sc))));}$k=insert_update($i,$u,$Ic);if(!$k){break;}}}if($k){queries("COMMIT");}queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$db),$k);queries("ROLLBACK");}else{$q=upload_error($wa);}}}$ta=$n->tableName($H);page_header('Select'.": $ta",$q);session_write_close();$u=null;if(isset($Kd["insert"])){$u="";foreach((array)$_GET["where"]as$b){if(count($P[$b["col"]])==1&&($b["op"]=="="||(!$b["op"]&&!ereg('[_%]',$b["val"])))){$u.="&set".urlencode("[".bracket_escape($b["col"])."]")."=".urlencode($b["val"]);}}}$n->selectLinks($H,$u);if(!$w){echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";}else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($i).'">',"</div>\n";$n->selectColumnsPrint($C,$w);$n->selectSearchPrint($x,$w,$z);$n->selectOrderPrint($Fa,$w,$z);$n->selectLimitPrint($R);$n->selectLengthPrint($kb);$n->selectActionPrint($kb);echo"</form>\n";$K=$_GET["page"];if($K=="last"){$Ha=$g->result("SELECT COUNT(*) FROM ".table($i).($x?" WHERE ".implode(" AND ",$x):""));$K=floor(max(0,$Ha-1)/$R);}$j="SELECT".limit((+$R&&$ca&&count($ca)<count($C)&&$r=="sql"?"SQL_CALC_FOUND_ROWS ":"").$Gb,($x?"\nWHERE ".implode(" AND ",$x):"").$md,($R!=""?+$R:null),($K?$R*$K:0),"\n");echo$n->selectQuery($j);$k=$g->query($j);if(!$k){echo"<p class='error'>".error()."\n";}else{if($r=="mssql"){$k->seek($R*$K);}$mc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$E=array();while($a=$k->fetch_assoc()){$E[]=$a;}if($_GET["page"]!="last"){$Ha=(+$R&&$ca&&count($ca)<count($C)?($r=="sql"?$g->result(" SELECT FOUND_ROWS()"):$g->result("SELECT COUNT(*) FROM ($j) x")):count($E));}if(!$E){echo"<p class='message'>".'No rows.'."\n";}else{$ad=$n->backwardKeys($i,$ta);echo"<table cellspacing='0' class='nowrap' onclick='tableClick(event);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$ca&&$C?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'edit'."</a>");$cd=array();$W=array();reset($C);$Ee=1;foreach($E[0]as$c=>$b){if($H["Oid"]!="t"||$c!="oid"){$b=$_GET["columns"][key($C)];$d=$p[$C?$b["col"]:$c];$f=($d?$n->fieldName($d,$Ee):"*");if($f!=""){$Ee++;$cd[$c]=$f;$ea=idf_escape($c);echo'<th><a href="'.h(remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($c).($Fa[0]==$ea||$Fa[0]==$c||(!$Fa&&$ca[0]==$ea)?'&desc%5B0%5D=1':'')).'">'.apply_sql_function($b["fun"],$f)."</a>";}$W[$c]=$b["fun"];next($C);}}$Jb=array();if($_GET["modify"]){foreach($E
as$a){foreach($a
as$c=>$b){$Jb[$c]=max($Jb[$c],min(40,strlen(utf8_decode($b))));}}}echo($ad?"<th>".'Relations':"")."</thead>\n";foreach($n->rowDescriptions($E,$P)as$M=>$a){$dd=unique_array($E[$M],$z);$Pa="";foreach($dd
as$c=>$b){$Pa.="&".(isset($b)?urlencode("where[".bracket_escape($c)."]")."=".urlencode($b):"null%5B%5D=".urlencode($c));}echo"<tr".odd().">".(!$ca&&$C?"":"<td>".checkbox("check[]",substr($Pa,1),in_array(substr($Pa,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").(count($ca)<count($C)||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($i).$Pa)."'>".'edit'."</a>"));foreach($a
as$c=>$b){if(isset($cd[$c])){$d=$p[$c];if($b!=""&&(!isset($mc[$c])||$mc[$c]!="")){$mc[$c]=(is_mail($b)?$cd[$c]:"");}$y="";$b=$n->editVal($b,$d);if(!isset($b)){$b="<i>NULL</i>";}else{if(ereg('blob|bytea|raw|file',$d["type"])&&$b!=""){$y=h(ME.'download='.urlencode($i).'&field='.urlencode($c).$Pa);}if($b===""){$b="&nbsp;";}elseif($kb!=""&&ereg('text|blob',$d["type"])&&is_utf8($b)){$b=shorten_utf8($b,max(0,+$kb));}else{$b=h($b);}if(!$y){foreach((array)$P[$c]as$F){if(count($P[$c])==1||end($F["source"])==$c){$y="";foreach($F["source"]as$h=>$ua){$y.=where_link($h,$F["target"][$h],$E[$M][$ua]);}$y=h(($F["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($F["db"]),ME):ME).'select='.urlencode($F["table"]).$y);if(count($F["source"])==1){break;}}}}if($c=="COUNT(*)"){$y=h(ME."select=".urlencode($i));$h=0;foreach((array)$_GET["where"]as$s){if(!array_key_exists($s["col"],$dd)){$y.=h(where_link($h++,$s["col"],$s["val"],$s["op"]));}}foreach($dd
as$_a=>$s){$y.=h(where_link($h++,$_a,$s));}}}if(!$y){if(is_mail($b)){$y="mailto:$b";}if($He=is_url($a[$c])){$y=($He=="http"&&$Wb?$a[$c]:"$He://www.adminer.org/redirect/?url=".urlencode($a[$c]));}}$D=h("val[$Pa][".bracket_escape($c)."]");$o=$_POST["val"][$Pa][bracket_escape($c)];$Ge=h(isset($o)?$o:$a[$c]);$Ve=strpos($b,"<i>...</i>");$Me=is_utf8($b)&&$E[$M][$c]==$a[$c]&&!$W[$c];$ye=ereg('text|lob',$d["type"]);echo(($_GET["modify"]&&$Me)||isset($o)?"<td>".($ye?"<textarea name='$D' cols='30' rows='".(substr_count($a[$c],"\n")+1)."'>$Ge</textarea>":"<input name='$D' value='$Ge' size='$Jb[$c]'>"):"<td id='$D' ondblclick=\"".($Me?"selectDblClick(this, event".($Ve?", 2":($ye?", 1":"")).")":"alert('".h('Use edit link to modify this value.')."')").";\">".$n->selectVal($b,$y,$d));}}if($ad){echo"<td>";}$n->backwardKeysPrint($ad,$E[$M]);echo"</tr>\n";}echo"</table>\n";}parse_str($_COOKIE["adminer_export"],$Hb);if($E||$K){$fd=true;if($_GET["page"]!="last"&&+$R&&count($ca)>=count($C)&&($Ha>=$R||$K)){$Ha=$H["Rows"];if(!isset($Ha)||$x||($H["Engine"]=="InnoDB"&&$Ha<max(1e4,2*($K+1)*$R))){ob_flush();flush();$Ha=$g->result("SELECT COUNT(*) FROM ".table($i).($x?" WHERE ".implode(" AND ",$x):""));}else{$fd=false;}}echo"<p class='pages'>";if(+$R&&$Ha>$R){$ed=floor(($Ha-1)/$R);echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Page'."', '".($K+1)."'), event); return false;\">".'Page'."</a>:",pagination(0,$K).($K>5?" ...":"");for($h=max(1,$K-4);$h<min($ed,$K+5);$h++){echo
pagination($h,$K);}echo($K+5<$ed?" ...":"").($fd?pagination($ed,$K):' <a href="'.h(remove_from_uri()."&page=last").'">'.'last'."</a>");}echo" (".($fd?"":"~ ").lang(array('%d row','%d rows'),$Ha).") ".checkbox("all",1,0,'whole result')."\n";if(!information_schema(DB)){?>
<fieldset><legend>Edit</legend><div>
<input type="submit" value="Save" title="Double click on a value to modify it." class="jsonly">
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure? (' + (this.form['all'].checked ? <?php echo$Ha,' : formChecked(this, /check/)) + \')\');">
</div></fieldset>
';}print_fieldset("export",'Export');$Aa=$n->dumpOutput();echo($Aa?html_select("output",$Aa,$Hb["output"])." ":""),html_select("format",$n->dumpFormat(),$Hb["format"])," <input type='submit' name='export' value='".'Export'."' onclick='eventStop(event);'>\n","</div></fieldset>\n";}print_fieldset("import",'Import',!$E);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$Hb["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","<input type='hidden' name='token' value='$B'>\n","</div></fieldset>\n";$n->selectEmailPrint(array_filter($mc,'strlen'),$w);echo"</form>\n";}}}elseif(isset($_GET["variables"])){$Ab=isset($_GET["status"]);page_header($Ab?'Status':'Variables');$he=($Ab?show_status():show_variables());if(!$he){echo"<p class='message'>".'No rows.'."\n";}else{echo"<table cellspacing='0'>\n";foreach($he
as$c=>$b){echo"<tr>","<th><code class='jush-".$r.($Ab?"status":"set")."'>".h($c)."</code>","<td>".nbsp($b);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$pc=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$a){$D=js_escape($a["Name"]);json_row("Comment-$D",nbsp($a["Comment"]));if(!is_view($a)){foreach(array("Engine","Collation")as$c){json_row("$c-$D",nbsp($a[$c]));}foreach($pc+array("Auto_increment"=>0,"Rows"=>0)as$c=>$b){if($a[$c]!=""){$b=number_format($a[$c],0,'.',',');json_row("$c-$D",($c=="Rows"&&$a["Engine"]=="InnoDB"&&$b?"~ $b":$b));if(isset($pc[$c])){$pc[$c]+=($a["Engine"]!="InnoDB"||$c!="Data_free"?$a[$c]:0);}}elseif(array_key_exists($c,$a)){json_row("$c-$D");}}}}foreach($pc
as$c=>$b){json_row("sum-$c",number_format($b,0,'.',','));}json_row("");}else{foreach(count_tables(get_databases())as$v=>$b){json_row("tables-".js_escape($v),$b);}json_row("");}exit;}else{$ue=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($ue&&!$q&&!$_POST["search"]){$k=true;$ga="";if($r=="sql"&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"])){queries("SET foreign_key_checks = 0");}if($_POST["truncate"]){if($_POST["tables"]){$k=truncate_tables($_POST["tables"]);}$ga='Tables have been truncated.';}elseif($_POST["move"]){$k=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$ga='Tables have been moved.';}elseif($_POST["copy"]){$k=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$ga='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"]){$k=drop_views($_POST["views"]);}if($k&&$_POST["tables"]){$k=drop_tables($_POST["tables"]);}$ga='Tables have been dropped.';}elseif($_POST["tables"]&&($k=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"]))))){while($a=$k->fetch_assoc()){$ga.="<b>".h($a["Table"])."</b>: ".h($a["Msg_text"])."<br>";}}queries_redirect(substr(ME,0,-1),$ga,$k);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$q,true);if($n->homepage()){if($_GET["ns"]!==""){echo'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n","<h3>".'Tables and views'."</h3>\n";$lc=tables_list();if(!$lc){echo"<p class='message'>".'No tables.'."\n";}else{echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' name='search' value='".'Search'."'>\n";if($_POST["search"]&&$_POST["query"]!=""){search_tables();}echo"<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);"><th>'.'Table'.'<td>'.'Engine'.'<td>'.'Collation'.'<td>'.'Data Length'.'<td>'.'Index Length'.'<td>'.'Data Free'.'<td>'.'Auto Increment'.'<td>'.'Rows'.(support("comment")?'<td>'.'Comment':'')."</thead>\n";foreach($lc
as$f=>$N){$_b=(isset($N)&&!eregi("table",$N));echo'<tr'.odd().'><td>'.checkbox(($_b?"views[]":"tables[]"),$f,in_array($f,$ue,true),"","formUncheck('check-all');"),'<th><a href="'.h(ME).'table='.urlencode($f).'">'.h($f).'</a>';if($_b){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($f).'">'.'View'.'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($f).'">?</a>';}else{foreach(array("Engine"=>"","Collation"=>"","Data_length"=>"create","Index_length"=>"indexes","Data_free"=>"edit","Auto_increment"=>"auto_increment=1&create","Rows"=>"select")as$c=>$y){echo($y?"<td align='right'><a href='".h(ME."$y=").urlencode($f)."' id='$c-".h($f)."'>?</a>":"<td id='$c-".h($f)."'>&nbsp;");}}echo(support("comment")?"<td id='Comment-".h($f)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".sprintf('%d in total',count($lc)),"<td>".nbsp($r=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$c){echo"<td align='right' id='sum-$c'>&nbsp;";}echo"</table>\n";if(!information_schema(DB)){echo"<p>".($r=="sql"?"<input type='submit' value='".'Analyze'."'> <input type='submit' name='optimize' value='".'Optimize'."'> <input type='submit' name='check' value='".'Check'."'> <input type='submit' name='repair' value='".'Repair'."'> ":"")."<input type='submit' name='truncate' value='".'Truncate'."'".confirm("formChecked(this, /tables/)")."> <input type='submit' name='drop' value='".'Drop'."'".confirm("formChecked(this, /tables|views/)",1).">\n";$A=(support("scheme")?schemas():get_databases());if(count($A)!=1&&$r!="sqlite"){$v=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($A?html_select("target",$A,$v):'<input name="target" value="'.h($v).'">')," <input type='submit' name='move' value='".'Move'."' onclick='eventStop(event);'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."' onclick='eventStop(event);'>":""),"\n";}echo"<input type='hidden' name='token' value='$B'>\n";}echo"</form>\n";}echo'<p><a href="'.h(ME).'create=">'.'Create table'."</a>\n";if(support("view")){echo'<a href="'.h(ME).'view=">'.'Create view'."</a>\n";}if(support("routine")){echo"<h3>".'Routines'."</h3>\n";$se=routines();if($se){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td>&nbsp;</thead>\n";odd('');foreach($se
as$a){echo'<tr'.odd().'>','<th><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'callf=':'call=').urlencode($a["ROUTINE_NAME"]).'">'.h($a["ROUTINE_NAME"]).'</a>','<td>'.h($a["ROUTINE_TYPE"]),'<td>'.h($a["DTD_IDENTIFIER"]),'<td><a href="'.h(ME).($a["ROUTINE_TYPE"]=="FUNCTION"?'function=':'procedure=').urlencode($a["ROUTINE_NAME"]).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p><a href="'.h(ME).'procedure=">'.'Create procedure'.'</a> <a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("type")){echo"<h3>".'User types'."</h3>\n";$ba=types();if($ba){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($ba
as$b){echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($b)."'>".h($b)."</a>\n";}echo"</table>\n";}echo"<p><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3>".'Events'."</h3>\n";$E=get_rows("SHOW EVENTS");if($E){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."</thead>\n";foreach($E
as$a){echo"<tr>",'<th><a href="'.h(ME).'event='.urlencode($a["Name"]).'">'.h($a["Name"])."</a>","<td>".($a["Execute at"]?'At given time'."<td>".$a["Execute at"]:'Every'." ".$a["Interval value"]." ".$a["Interval field"]."<td>$a[Starts]"),"<td>$a[Ends]";}echo"</table>\n";}echo'<p><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($lc){echo"<script type='text/javascript'>ajaxSetHtml('".js_escape(ME)."script=db');</script>\n";}}}}page_footer();