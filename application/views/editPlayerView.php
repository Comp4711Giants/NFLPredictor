<table cols="" border="0">
	<tr>
		<th>Photo</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Jersey Number</th>
		<th>Position</th>
		<th>Admin</th>
	</tr>

	{players}

	<tr>
		<td><img src="./playerImg/{mug}"></td>
		<td>{firstname}</td>
		<td>{lastname}</td>
		<td>{number}</td>
		<td>{position}</td>
		<td><a href = '/admin/edit'>Edit</a></td>
	</tr>
	<tr></tr>

	{/players}

</table>
<a href = './admin/add'>Switch to Add Player</a>