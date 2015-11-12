
<a href="/admin" class="btn btn-primary" style="display:{editEnabled};" >Modify Players</a>
<br><br>

<div class="row">
    {players}
    <div class="span4">
        <img src="/data/mugs/{mug}" title="{who}"/></br>
        <a href="/Player/display/{id}"><p class = "lead">{who}</p></a>
        <p>#{number}, {position}</p>
    </div>
    {/players}
</div>