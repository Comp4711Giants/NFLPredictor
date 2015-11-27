<h3>Calculate Probability of Victory</h3>

{ddlOpposingTeam}
<button id="submitButton">Submit</button>

<label id="text"></label>
<div id="predictionResult"></div>

<script>
$("#submitButton").click(function(){
    var value = $("#ddlOpposingTeam").val();
    //$("#text").text(value);
    
    $.ajax({url: "Team/getProbabilityOfVictory/" + value, success: function(result){
        //$("#predictionResult").text("The result is" + result);
        $("#predictionResult").html(result);
    }});
});

</script>