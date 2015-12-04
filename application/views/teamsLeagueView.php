<form class="form-inline" action="/teams" method="post">
<table id="sort-setting-table">
<tr class="no-height">
<td class="first no-height">
	{lblLayout} | {lblLeague} {radLeague} | {lblConference} {radConference} | {lblDivision} {radDivision}
</td>
<td class="no-height">
	{lblSort} | {lblCity} {radCity} | {lblTeam} {radTeam} | {lblStanding} {radStanding}
</td>
<td class="no-height">
	<input type="submit" class="btn btn-primary" value="Submit"></input>
</td>
</tr>
</table>
</form>

<div class="row">
    <table class="table-page-table">
	    <tr>
	        <th>ID</th>
	        <th>Name</th>
	        <th>City</th>
	        <th>Conference</th>
	        <th>Division</th>
	        <th>Net Points</th>
	    </tr>
	    {teams}
	    <tr>
	        <td>{id}</td>
	        <td>{name}</td>
	        <td>{city}</td>
	        <td>{conference}</td>
	        <td>{division}</td>
	        <td>{net_points}</td>
	    </tr>

	    {/teams}
	</table>
    {links}
</div>