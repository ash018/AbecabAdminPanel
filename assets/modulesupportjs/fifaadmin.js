function editMatch(url){
    
    $(".editMatch").on('click',function(){
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
//                    if(data == 0){
//                        $("#divUserId").attr('style','display : block');
//                        $("#saveUser").prop("disabled",true);
//                    }
                }
            });
    });
}

