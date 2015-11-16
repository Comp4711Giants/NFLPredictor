<form class="form-inline" action="/roster/{page_number}" method="post">
<table id="sort-setting-table">
<tr class="no-height">
<td class="no-height">
	{lblType} | {lblGallery} {radGallery} | {lblTable} {radTable}
</td>
<td class="no-height">
	{lblSort} | {lblName} {radName} | {lblJersey} {radJersey} | {lblPosition} {radPosition}
</td>
<td class="no-height">
	<input type="submit" class="btn btn-primary" value="Submit"></input>
</td>
<td class="no-height edit-players-cell" align="right">
	<a href="/admin" class="btn btn-primary" style="font-weight: normal; display:{editEnabled};">Edit Players</a>
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
	    </tr>
	    {players}
	    <tr>
	        <td align="center"><img src="/data/mugs/{mug}" title="{who}"/></td>
	        <td><a href="/Player/display/{id}"><p class = "lead">{who}</p></a></td>
	        <td>#{number}</td>
	        <td>{position}</td>
	    </tr>
	    {/players}
	</table>
    {links}
</div>