
<a href="/admin/add" class="btn btn-primary">Add a New Player</a>
<br><br>

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
		<td><img src="./data/mugs/{mug}"></td>
		<td>{firstname}</td>
		<td>{lastname}</td>
		<td>{number}</td>
		<td>{position}</td>
		<td>
			<a href = '/admin/edit/{id}'>Edit</a><br>
        	<a href = '/admin/delete/{id}'>Delete</a> 
		</td>
	</tr>
	<tr></tr>

	{/players}

</table>
