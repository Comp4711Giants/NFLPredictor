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
    		<th colspan="10">AFC</th>
    	</tr>
	    <tr>
	        <th>ID</th>
	        <th>City</th>
	        <th>Name</th>
	        <th>Conference</th>
	        <th>Division</th>
	        <th>Wins</th>
	        <th>Losses</th>
	        <th>Points For</th>
	        <th>Points Against</th>
	        <th>Net Points</th>
	    </tr>
	    {afcTeams}
	    <tr>
	        <td>{id}</td>
	        <td>{city}</td>
	        <td>{name}</td>
	        <td>{conference}</td>
	        <td>{division}</td>
	        <td>{wins}</td>
	        <td>{losses}</td>
	        <td>{points_for}</td>
	        <td>{points_against}</td>
	        <td>{net_points}</td>
	    </tr>
	    {/afcTeams}
	    <tr>
    		<th colspan="10">NFC</th>
    	</tr>
	    <tr>
	        <th>ID</th>
	        <th>City</th>
	        <th>Name</th>
	        <th>Conference</th>
	        <th>Division</th>
	        <th>Wins</th>
	        <th>Losses</th>
	        <th>Points For</th>
	        <th>Points Against</th>
	        <th>Net Points</th>
	    </tr>
	    {nfcTeams}
	    <tr>
	        <td>{id}</td>
	        <td>{city}</td>
	        <td>{name}</td>
	        <td>{conference}</td>
	        <td>{division}</td>
	        <td>{wins}</td>
	        <td>{losses}</td>
	        <td>{points_for}</td>
	        <td>{points_against}</td>
	        <td>{net_points}</td>
	    </tr>
	    {/nfcTeams}
	</table>
</div>