<h3>Calculate Probability of Victory</h3>

{ddlOpposingTeam}
<button id="submitButton">Submit</button>

<div id="predictionResult"></div>
<label id="predictionExplanation"></label>

<script>
$("#submitButton").click(function(){
    var value = $("#ddlOpposingTeam").val();
    //$("#text").text(value);
    
    $.ajax({url: "Team/getProbabilityOfVictory/" + value, success: function(result){
        //$("#predictionResult").text("The result is" + result);
        $("#predictionResult").html(result);
        $("#predictionExplanation").html("Formula: 70% * (overall average) + 20% * (last 5 games average) + 10% * (average of last 5 games against this opponent)");
        
    }});
});

</script>