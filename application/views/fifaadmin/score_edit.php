<?php 
$matchId = $matchInfo[0]['ID'];
$matchName = $matchInfo[0]['Name'];
$mDatenTime =  explode(" ", $matchInfo[0]['MatchTime']);
$matchDate = $mDatenTime[0];

$mpIdA = $mpInfo[0]['MPId'];
$mpIdB = $mpInfo[1]['MPId'];
$mpNameA = $mpInfo[0]['PartyName'];
$mpNameB = $mpInfo[1]['PartyName'];
$mpScoreA = $mpInfo[0]['MPScore'];
$mpScoreB = $mpInfo[1]['MPScore'];

$matchPartyIdA = $mpInfo[0]['PartyId'];
$matchPartyIdB = $mpInfo[1]['PartyId'];


?>

<div class="panel panel-default">
    <div class="panel-heading">
        Match - <?php echo $matchName; ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="editClinic" class="form-group" method="post" enctype="multipart/form-data" action="<?php echo base_url("fifaadmin/updateScore") ?>">

            <div class="form-group center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" id="MatchId" name="MatchId" value="<?php echo $matchId; ?>" required="True">
                        <input type="hidden" class="form-control" id="MPIdA" name="MPIdA" value="<?php echo $mpIdA; ?>" required="True">
                        <input type="hidden" class="form-control" id="MPIdB" name="MPIdB" value="<?php echo $mpIdB; ?>" required="True">
                        <input type="hidden" class="form-control" id="PartyIdA" name="PartyIdA" value="<?php echo $matchPartyIdA; ?>" required="True">
                        <input type="hidden" class="form-control" id="PartyIdB" name="PartyIdB" value="<?php echo $matchPartyIdB; ?>" required="True">
                        
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label><h4><?php echo $mpNameA;?></h4></label>
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label><h4><?php echo $mpNameB;?></h4></label>
                        
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label>Score</label>
                        <input id="scoreA" type="number" name="TeamScoreA" value="<?php echo $mpScoreA;?>"/>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label>Score</label>
                        <input id="scoreA" type="number" name="TeamScoreB" value="<?php echo $mpScoreB;?>"/>
                        
                    </div>
                </div>
            </div>
            
            <br/>
            <br/>
            <div class="form-group">
                <div class="row">
                <button  type="submit" id="editClinic" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>