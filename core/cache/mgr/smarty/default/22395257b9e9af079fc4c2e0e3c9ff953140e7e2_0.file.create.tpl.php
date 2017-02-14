<?php /* Smarty version 3.1.27, created on 2017-02-09 07:51:32
         compiled from "/mamp/karapuz-new/manager/templates/default/element/chunk/create.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:330845421589c0364a0cc99_83571830%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22395257b9e9af079fc4c2e0e3c9ff953140e7e2' => 
    array (
      0 => '/mamp/karapuz-new/manager/templates/default/element/chunk/create.tpl',
      1 => 1483440292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '330845421589c0364a0cc99_83571830',
  'variables' => 
  array (
    'onChunkFormPrerender' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_589c0364a153c7_77772479',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_589c0364a153c7_77772479')) {
function content_589c0364a153c7_77772479 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '330845421589c0364a0cc99_83571830';
?>
<div id="modx-panel-chunk-div"></div>
<?php echo $_smarty_tpl->tpl_vars['onChunkFormPrerender']->value;

}
}
?>