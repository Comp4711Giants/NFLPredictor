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
    		<th colspan="10">AFC North</th>
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
	    {afcNorthTeams}
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
	    {/afcNorthTeams}<tr>
    		<th colspan="10">AFC East</th>
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
	    {afcEastTeams}
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
	    {/afcEastTeams}
	    <tr>
    		<th colspan="10">AFC South</th>
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
	    {afcSouthTeams}
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
	    {/afcSouthTeams}
	    <tr>
    		<th colspan="10">AFC West</th>
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
	    {afcWestTeams}
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
	    {/afcWestTeams}
	    <tr>
    		<th colspan="10">NFC North</th>
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
	    {nfcNorthTeams}
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
	    {/nfcNorthTeams}<tr>
    		<th colspan="10">NFC East</th>
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
	    {nfcEastTeams}
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
	    {/nfcEastTeams}
	    <tr>
    		<th colspan="10">NFC South</th>
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
	    {nfcSouthTeams}
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
	    {/nfcSouthTeams}
	    <tr>
    		<th colspan="10">NFC West</th>
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
	    {nfcWestTeams}
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
	    {/nfcWestTeams}
	</table>
</div>