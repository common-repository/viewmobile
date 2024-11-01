<?php
/*
Plugin Name: viewMobile
Plugin URI: http://www.handypark.de/webmaster/blogs/wp-viewmobile.html
Description: For Users with mobile phones, viewMobile shows a Theme, which is optimized for mobile devices -- viewMobile gibt f&uuml;r User mit Handys ein Theme aus, das f&uuml;r die Darstellung auf mobilen Endger&auml;ten optimiert ist || <a href="plugins.php?page=vm-options"><b>Options</b></a>
Version: 1.2.1
Author: Janis von Bleichert
Author URI: http://www.handypark.de
*/

function vm_ismobile(){

$is_mobile=FALSE;
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$user_agents_default = "Android, AvantGo, Blackberry, Blazer, Cellphone, Danger, DoCoMo, EPOC, EudoraWeb, Handspring, HTC, Kyocera, LG, MMEF20, MMP, MOT-V, Mot, Motorola, NetFront, Newt, Nokia, Opera Mini, Palm, Palm, PalmOS, PlayStation Portable, ProxiNet, Proxinet, SHARP-TQ-GX10, Samsung, Small, Smartphone, SonyEricsson, SonyEricsson, Symbian, SymbianOS, TS21i-10, UP.Browser, UP.Link, WAP, webOS, Windows CE, hiptop, iPhone, iPod, portalmmm, Elaine/3.0, OPWV";

if(get_option('vm_user_agents')==false){
add_option('vm_user_agents',$user_agents_default);
}
$user_agents=get_option('vm_user_agents');
$user_agents = explode(',',$user_agents);

foreach($user_agents AS $agent){
if(eregi(trim($agent),$user_agent)){
$is_mobile=TRUE;
}
}
return $is_mobile;
}


function vm_template(){
if(get_option('vm_theme')==false OR get_option('vm_theme')=="default"){
return "default";
}else{
return get_option('vm_theme');
}
}


function vm_template_root(){
return dirname(__FILE__)."/themes";
}


function vm_template_root_uri(){
return WP_PLUGIN_URL. "/viewmobile/themes";
}

function vm_admin_menu(){
if (function_exists('add_submenu_page') ) {
add_submenu_page('plugins.php', __('viewMobile'), __('viewMobile'),'manage_options' , 'vm-options','vm_options');
}
}


function vm_image_edit($content){
if (get_option('vm_image_edit')=="2"){
//Resize Images
preg_match_all("@<img.*?src\s*=\s*['\"](.*?)['\"].*?>@i",$content,$image);
$file_uri=WP_PLUGIN_URL. "/viewmobile/resize.php";
$i=0;
foreach($image[1] AS $img){
if (substr($img,0,7)!="http://"){
$img=get_settings('siteurl').$img;
}
$content=str_replace($image[0][$i],"<img src='".$file_uri."?image=".$img."' border='0'>",$content);
$i++;
}
}elseif(get_option('vm_image_edit')=="3"){
//Strip Images
preg_match_all("@<img.*?src\s*=\s*['\"](.*?)['\"].*?>@i",$content,$image);
foreach($image[0] AS $img){
$content=str_replace($img,"",$content);
}
}else{
$content=$content;
}
return $content;
}

function vm_options(){
if ( isset($_POST['submit']) ) {
if ( function_exists('current_user_can') && !current_user_can('manage_options') ){
die(__('Cheatin&#8217; uh?'));
}
if(get_option('vm_theme')==false){
add_option('vm_theme',$_POST['vm_theme']);
}else{
update_option('vm_theme',$_POST['vm_theme']);
}
if(!get_option('vm_image_edit')){
add_option('vm_image_edit',$_POST['vm_image_edit']);
}else{
update_option('vm_image_edit',$_POST['vm_image_edit']);
}
update_option('vm_user_agents', $_POST['vm_user_agents']);
}

if ( !empty($_POST)) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>
<div class="wrap">
<h2>viewMobile Options</h2>
<form action="" method="post">
<h3>User Agents</h3>
<p><textarea name="vm_user_agents" cols="80" rows="5"><?php echo get_option('vm_user_agents'); ?></textarea> </p>
<h3>Theme</h3>
<p><select name="vm_theme" style="width:400px;">
<?php
$dir=opendir( vm_template_root());
while ($file=readdir($dir)){
if ($file!='.' && $file!='..'){
echo "<option value='$file' ";
if ($file==get_option('vm_theme') OR (get_option('vm_theme')==false AND $file=='default')) echo "selected";
echo ">$file</option>";
}
}
closedir($dir);
?>
</select></p>
<h3>Images</h3>
<p><select name="vm_image_edit" style="width:400px;">
<option value="1"<? if(get_option('vm_image_edit')=="1" || get_option('vm_image_edit')==false) echo " selected" ?>>do nothing (default) / Bilder in Ruhe lassen (Standard)</option>
<option value="2"<? if(get_option('vm_image_edit')=="2") echo " selected" ?>>resize Images / Bilder verkleinern</option>
<option value="3"<? if(get_option('vm_image_edit')=="3") echo " selected" ?>>strip Images / Bilder entfernen</option>
</select></p>
<p class="submit"><input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" /></p>
</form>
</div>
<?
}


if (vm_ismobile()){
add_filter('theme_root','vm_template_root');
add_filter('theme_root_uri','vm_template_root_uri');
add_filter('stylesheet','vm_template');
add_filter('the_content','vm_image_edit');
add_filter('template','vm_template');
add_filter('option_template','vm_template');
add_filter('option_stylesheet','vm_template');
}

add_action('admin_menu','vm_admin_menu');

?>
