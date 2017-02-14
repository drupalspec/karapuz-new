<?php /* Smarty version 3.1.27, created on 2017-02-04 14:26:15
         compiled from "/mamp/karapuz-new/manager/templates/default/welcome.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3552551405895c86732aec2_15407393%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b24a563de6d9a91a01638ff499c6a7104ef437b' => 
    array (
      0 => '/mamp/karapuz-new/manager/templates/default/welcome.tpl',
      1 => 1483440292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3552551405895c86732aec2_15407393',
  'variables' => 
  array (
    'dashboard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5895c867335536_90634464',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5895c867335536_90634464')) {
function content_5895c867335536_90634464 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3552551405895c86732aec2_15407393';
?>
<div id="modx-panel-welcome-div"></div>

<div id="modx-dashboard" class="dashboard">
<?php echo $_smarty_tpl->tpl_vars['dashboard']->value;?>

</div><?php }
}
?>