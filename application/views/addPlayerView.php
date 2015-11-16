<div class="row">	

	<div class="errors">{message}</div>
	<form accept-charset="utf-8" action="/admin/confirm" method="post" enctype="multipart/form-data">

		{fid}
		{ffirstname}
		{flastname}
		{fnumber}
		{fposition}
        <div class="hiddenValue">
			{emug}
        </div>
		<input type="file" name="userfile" size="20" />

		{fsubmit}
		<a href="/admin/cancelForm" class="btn btn-primary">Cancel</a>

	</form>

	<a href="/admin">Return to Edit Players</a><br>

</div>