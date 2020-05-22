
<br/>
<h1>Change Password:</h1>
<form action='accountPage.php' method='POST'>
	<table>
		<tbody>
			<tr>
				<td>Current Password: </td><td><input type='text' name='curPass' /></td>
			</tr>
			<tr>
				<td>New Password: </td><td><input type='text' name='newPass' /></td>
			</tr>
			<tr>
				<td></td><td><input type='submit' value='Change Password' name='changePass' /></td>
			</tr>
		</tbody>
	</table>
</form>
<?=template_footer()?>