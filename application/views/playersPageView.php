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
	<a href="/Player/editSessionSet" class="btn btn-primary" style="font-weight: normal; display:{editEnabled};">Edit Players</a>
</td>
</tr>
</table>
</form>

<div class="row">
    {players}
    <div class="span4">
        <img src="/data/mugs/{mug}" title="{who}"/></br>
        <a href="/Player/display/{id}"><p class = "lead">{who}</p></a>
        <p>#{number}, {position}</p>
    </div>
    {/players}
</div>
{links}