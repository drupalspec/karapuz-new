<?php /* Smarty version 3.1.27, created on 2017-02-15 06:25:44
         compiled from "/mamp/karapuz-new/manager/templates/default/welcome.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:131185296658a3d848688764_49892151%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b24a563de6d9a91a01638ff499c6a7104ef437b' => 
    array (
      0 => '/mamp/karapuz-new/manager/templates/default/welcome.tpl',
      1 => 1487132512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131185296658a3d848688764_49892151',
  'variables' => 
  array (
    'dashboard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58a3d8486936b3_70861534',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58a3d8486936b3_70861534')) {
function content_58a3d8486936b3_70861534 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '131185296658a3d848688764_49892151';
?>
<div id="modx-panel-welcome-div"></div>

<div id="modx-dashboard" class="dashboard">
<?php echo $_smarty_tpl->tpl_vars['dashboard']->value;?>

</div><?php }
}
?>