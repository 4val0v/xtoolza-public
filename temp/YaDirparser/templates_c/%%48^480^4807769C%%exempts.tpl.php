<?php /* Smarty version 2.6.18, created on 2007-11-13 16:52:38
         compiled from exempts.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="position: absolute; top: 0; right:10px;">
<a href="index.php">Главная</a>
</div>

<table align="center">
	<tr style="background-color:#e0e0e0;">
		<td>Слова</td>
		<td>Действия</td>
	</tr>
	<?php unset($this->_sections['grid']);
$this->_sections['grid']['name'] = 'grid';
$this->_sections['grid']['loop'] = is_array($_loop=$this->_tpl_vars['Data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['grid']['show'] = true;
$this->_sections['grid']['max'] = $this->_sections['grid']['loop'];
$this->_sections['grid']['step'] = 1;
$this->_sections['grid']['start'] = $this->_sections['grid']['step'] > 0 ? 0 : $this->_sections['grid']['loop']-1;
if ($this->_sections['grid']['show']) {
    $this->_sections['grid']['total'] = $this->_sections['grid']['loop'];
    if ($this->_sections['grid']['total'] == 0)
        $this->_sections['grid']['show'] = false;
} else
    $this->_sections['grid']['total'] = 0;
if ($this->_sections['grid']['show']):

            for ($this->_sections['grid']['index'] = $this->_sections['grid']['start'], $this->_sections['grid']['iteration'] = 1;
                 $this->_sections['grid']['iteration'] <= $this->_sections['grid']['total'];
                 $this->_sections['grid']['index'] += $this->_sections['grid']['step'], $this->_sections['grid']['iteration']++):
$this->_sections['grid']['rownum'] = $this->_sections['grid']['iteration'];
$this->_sections['grid']['index_prev'] = $this->_sections['grid']['index'] - $this->_sections['grid']['step'];
$this->_sections['grid']['index_next'] = $this->_sections['grid']['index'] + $this->_sections['grid']['step'];
$this->_sections['grid']['first']      = ($this->_sections['grid']['iteration'] == 1);
$this->_sections['grid']['last']       = ($this->_sections['grid']['iteration'] == $this->_sections['grid']['total']);
?>
		<tr align="center">
			<td><?php echo $this->_tpl_vars['Data'][$this->_sections['grid']['index']]['word']; ?>
</td>
			<td><a href="?delete=<?php echo $this->_tpl_vars['Data'][$this->_sections['grid']['index']]['Id']; ?>
">Delete</a></td>
		</tr>
	<?php endfor; endif; ?>
</table>
<form method="GET" name="form" id="form">
  <table align="center">
    <tr>
      <td colspan="2" align="center"><input name="word"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Add"></td>
    </tr>
  </table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>