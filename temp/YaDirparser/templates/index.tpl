{include file="header.tpl"}
<div style="position: absolute; top: 0; right:10px;">
<a href="exempts.php">Слова-исключения</a>
</div>

<form method="GET" name="form" id="form">
  <table align="center">
    <tr>
      <td colspan="2" align="center"><span style="color:red">{$error}</span></td>
    </tr>
  	<tr>
      <td>Фраза для запроса</td>
  	  <td><input type="text" name="phrase" value="{$phrase}"/></td>
  	</tr>  	
  	<tr>
  	  <td>Количество результатов</td>
  	  <td><input type="text" name="count" value="{$count}"/></td>
  	</tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Search"></td>
    </tr>
  </table>
  {if $link!= ''}
  <div align="center">
  	<a href="{$link}" target="_blank">Скачать</a>
  </div>
  {/if}
</form>
{include file="footer.tpl"}
