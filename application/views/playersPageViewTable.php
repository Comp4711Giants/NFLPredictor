<a href="/Player/removeEditSessionSet" class="btn btn-danger" style="fdisplay:{editEnabled};">Leave Edit Mode</a>
<form class="form-inline" action="/roster/{page_number}" method="post">
<table id="sort-setting-table">
<tr class="no-height">
<td class="first no-height">
	{lblType} | {lblGallery} {radGallery} | {lblTable} {radTable}
</td>
<td class="no-height">
	{lblSort} | {lblName} {radName} | {lblJersey} {radJersey} | {lblPosition} {radPosition}
</td>
<td class="no-height">
	<input type="submit" class="btn btn-primary" value="Submit"></input>
</td>
<td class="no-height edit-players-cell" align="right">
	<a href="/Player/editSessionSet" class="btn btn-primary" style="display:{hide};">Edit Players</a>
	<a href="/admin/add" class="last btn btn-primary" style="display:{editEnabled};">Add a New Player</a>
</td>
</tr>
</table>
</form>

<div class="row">
    <table class="table-page-table">
	    <tr>
	        <th>Picture</th>
	        <th>Name</th>
	        <th>Number</th>
	        <th>Position</th>
	        <th style="display:{editEnabled};">Admin</th>

	    </tr>
	    {players}
	    <tr>
	        <td align="center"><img src="/data/mugs/{mug}" title="{who}"/></td>
	        <td><a href="/Player/display/{id}"><p class = "lead">{who}</p></a></td>
	        <td>#{number}</td>
	        <td>{position}</td>
	        <td style="display:{editEnabled};">
				<a href = '/admin/edit/{id}'>Edit</a><br>
        		<a href = '/admin/delete/{id}'>Delete</a> 
			</td>
	    </tr>

	    {/players}
	</table>
    {links}
</div>