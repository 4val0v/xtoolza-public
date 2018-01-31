<?php /* Smarty version 2.6.18, created on 2007-11-13 16:18:38
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="position: absolute; top: 0; right:10px;">
<a href="exempts.php">Слова-исключения</a>
</div>

<form method="GET" name="form" id="form">
  <table align="center">
    <tr>
      <td colspan="2" align="center"><span style="color:red"><?php echo $this->_tpl_vars['error']; ?>
</span></td>
    </tr>
  	<tr>
      <td>Фраза для запроса</td>
  	  <td><input type="text" name="phrase" value="<?php echo $this->_tpl_vars['phrase']; ?>
"/></td>
  	</tr>  	
  	<tr>
  	  <td>Количество результатов</td>
  	  <td><input type="text" name="count" value="<?php echo $this->_tpl_vars['count']; ?>
"/></td>
  	</tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Search"></td>
    </tr>
  </table>
  <?php if ($this->_tpl_vars['link'] != ''): ?>
  <div align="center">
  	<a href="<?php echo $this->_tpl_vars['link']; ?>
" target="_blank">Скачать</a>
  </div>
  <?php endif; ?>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>