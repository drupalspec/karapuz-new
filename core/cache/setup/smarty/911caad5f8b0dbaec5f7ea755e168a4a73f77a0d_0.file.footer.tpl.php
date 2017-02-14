<?php /* Smarty version 3.1.27, created on 2017-02-04 14:25:57
         compiled from "/mamp/karapuz-new/setup/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:453198055895c8558e90b6_17491358%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '911caad5f8b0dbaec5f7ea755e168a4a73f77a0d' => 
    array (
      0 => '/mamp/karapuz-new/setup/templates/footer.tpl',
      1 => 1483440292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '453198055895c8558e90b6_17491358',
  'variables' => 
  array (
    '_lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5895c85590ba23_82141054',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5895c85590ba23_82141054')) {
function content_5895c85590ba23_82141054 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/mamp/karapuz-new/core/model/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '453198055895c8558e90b6_17491358';
?>
        </div>
        <!-- end content -->
        <div class="clear">&nbsp;</div>
    </div>
</div>

<!-- start footer -->
<div id="footer">
    <div id="footer-inner">
    <div class="container_12">
        <p><?php ob_start();
echo date('Y');
$_tmp1=ob_get_clean();
echo smarty_modifier_replace($_smarty_tpl->tpl_vars['_lang']->value['modx_footer1'],'[[+current_year]]',$_tmp1);?>
</p>
        <p><?php echo $_smarty_tpl->tpl_vars['_lang']->value['modx_footer2'];?>
</p>
    </div>
    </div>
</div>

<div class="post_body">

</div>
<!-- end footer -->
</body>
</html><?php }
}
?>