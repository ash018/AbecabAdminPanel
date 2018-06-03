function editMatch(url){
    
    $(".editMatch").on('click',function(){
        $("#modalTitle").html("");
        $("#modalTitle").html("Edit Match Info");
        var matchId = $(this).attr("data-node");
        console.log("hello"+matchId);
        $("#editMatchData").empty();
        $.ajax({
                url: url+"Fifaadmin/editMatchInfo",
                type: "get",
                data: {matchId : matchId},
                cache: false,
                success: function(data){
                    console.log('Return Data' + data);
                    $("#editMatchData").append(data);
                }
            });
    });
}

function scoreUpdate(url){
    $(".updateScore").on('click',function(){
        $("#modalTitle").html("");
        $("#modalTitle").html("Update Match Score");
        var matchId = $(this).attr("data-node");
        console.log("hello"+matchId);
        $("#editMatchData").empty();
        $.ajax({
                url: url+"Fifaadmin/editScore",
                type: "get",
                data: {matchId : matchId},
                cache: false,
                success: function(data){
                    console.log('Return Data' + data);
                    $("#editMatchData").append(data);
                }
            });
    });
    
}

