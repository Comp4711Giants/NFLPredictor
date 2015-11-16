<div class="row">	

	<div class="errors">{message}</div>
	<form accept-charset="utf-8" action="/admin/confirm" method="post" enctype="multipart/form-data">

                <div style='display: none;'>
                	{eid}
                </div>
				{efirstname}
				{elastname}
				{enumber}
                <div class="hiddenValue">
                	{onumber}
                </div>
                {eposition}
                <div class="hiddenValue">
					{emug}
                </div>


            <input type="file" name="userfile" size="20" />

		{esubmit}
        <a href="/admin/edit/{id}" class="btn btn-primary">Cancel</a>

	</form>

	<a href="/admin">Return to Edit Players</a><br>

</div>