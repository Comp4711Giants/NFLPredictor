<div class="row">	

	<div class="errors">{message}</div>
	<form action="/admin/confirm" method="post">

		{eid}
		{efirstname}
		{elastname}
		{enumber}
		{eposition}
		{emug}
                
                <label for="userfile">Photo</label>
                <input type="file" name="userfile" id="userfile" size="20" />

		<!-- TODO: ADD PLAYER PHOTO UPLOAD -->

		{esubmit}

	</form>

	<a href="/admin">Return to Edit Players</a><br>

</div>