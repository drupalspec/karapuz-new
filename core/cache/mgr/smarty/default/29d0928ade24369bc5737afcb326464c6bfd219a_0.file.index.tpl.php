<?php /* Smarty version 3.1.27, created on 2017-02-15 08:54:19
         compiled from "/mamp/karapuz-new/manager/templates/default/workspaces/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:128770039258a3fb1b360494_32514306%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29d0928ade24369bc5737afcb326464c6bfd219a' => 
    array (
      0 => '/mamp/karapuz-new/manager/templates/default/workspaces/index.tpl',
      1 => 1487132512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128770039258a3fb1b360494_32514306',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58a3fb1b37e546_87300960',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58a3fb1b37e546_87300960')) {
function content_58a3fb1b37e546_87300960 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '128770039258a3fb1b360494_32514306';
echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? '' : $tmp);?>

<div id="modx-panel-workspace-div"></div>
<?php }
}
?>