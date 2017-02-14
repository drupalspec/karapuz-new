<?php /* Smarty version 3.1.27, created on 2017-02-04 14:34:49
         compiled from "/mamp/karapuz-new/manager/templates/default/workspaces/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3229218265895ca69eec326_64463634%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29d0928ade24369bc5737afcb326464c6bfd219a' => 
    array (
      0 => '/mamp/karapuz-new/manager/templates/default/workspaces/index.tpl',
      1 => 1483440292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3229218265895ca69eec326_64463634',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5895ca69efb4a3_04436787',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5895ca69efb4a3_04436787')) {
function content_5895ca69efb4a3_04436787 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3229218265895ca69eec326_64463634';
echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? '' : $tmp);?>

<div id="modx-panel-workspace-div"></div>
<?php }
}
?>