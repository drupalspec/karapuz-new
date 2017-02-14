<?php /* Smarty version 3.1.27, created on 2017-02-09 08:02:54
         compiled from "/mamp/karapuz-new/manager/templates/default/element/snippet/update.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:566976601589c060e6b8eb4_97977297%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccda228f41d0111613cc88c78059db341681a494' => 
    array (
      0 => '/mamp/karapuz-new/manager/templates/default/element/snippet/update.tpl',
      1 => 1483440292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '566976601589c060e6b8eb4_97977297',
  'variables' => 
  array (
    'onSnipFormPrerender' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_589c060e6c0ea9_44013450',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_589c060e6c0ea9_44013450')) {
function content_589c060e6c0ea9_44013450 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '566976601589c060e6b8eb4_97977297';
?>
<div id="modx-panel-snippet-div"></div>
<?php echo $_smarty_tpl->tpl_vars['onSnipFormPrerender']->value;

}
}
?>