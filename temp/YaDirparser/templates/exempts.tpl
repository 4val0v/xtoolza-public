{include file="header.tpl"}
<div style="position: absolute; top: 0; right:10px;">
<a href="index.php">Главная</a>
</div>

<table align="center">
	<tr style="background-color:#e0e0e0;">
		<td>Слова</td>
		<td>Действия</td>
	</tr>
	{section name=grid loop=$Data}
		<tr align="center">
			<td>{$Data[grid].word}</td>
			<td><a href="?delete={$Data[grid].Id}">Delete</a></td>
		</tr>
	{/section}
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
{include file="footer.tpl"}