<div class="row">
    <table>
	    <tr>
	        <th>Picture</th>
	        <th>Name</th>
	        <th>Number</th>
	        <th>Position</th>
	    </tr>
	    {players}
	    <tr>
	        <td><img src="/data/mugs/{mug}" title="{who}"/></td>
	        <td><a href="/Player/display/{id}"><p class = "lead">{who}</p></a></td>
	        <td>#{number}</td>
	        <td>{position}</td>
	    </tr>
	    {/players}
	</table>
    {links}
</div>