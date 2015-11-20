<h3>Calculate Probability of Victory</h3>

<form action="Team/getProbabilityOfVictory" method="post">
{ddlOpposingTeam}
<button onclick="postResult()">Submit</button>
</form>

<div id="predictionResult" name="predictionResult"></div>

<script>
    
function postResult() {
    document.getElementById("predictionResult").innerHTML = "Hello World";
}

</script>