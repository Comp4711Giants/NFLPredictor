<div class="row">	

	<div class="errors">{message}</div>
	<form accept-charset="utf-8" action="/admin/confirm" method="post" enctype="multipart/form-data">

                <div style='display: none;'>
                {eid}
                </div>
		{efirstname}
		{elastname}
		{enumber}
                <div style='display: none;'>
                {onumber}
                </div>
                {eposition}
                </div>
                <div style='display: none;'>
		{emug}
                </div>

		<!-- TODO: ADD PLAYER PHOTO UPLOAD -->
                

            <input type="file" name="userfile" size="20" />

		{esubmit}

	</form>

	<a href="/admin">Return to Edit Players</a><br>

</div>