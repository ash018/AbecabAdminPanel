<?php
$matchId = $matchInfo[0]['ID'];
$matchName = $matchInfo[0]['Name'];
$matchDate = $matchInfo[0]['MatchTime'];
$matchTime = $matchInfo[0]['MatchTime'];
$matchRound = $matchInfo[0]['RoundTableID'];
$matchWinner = $matchInfo[0]['MatchPartyIDWinner'];

$matchTeamA = $matchTeam[0]['PartyID'];
$matchTeamB = $matchTeam[1]['PartyID'];

?>
<div class="panel panel-default">
    <div class="panel-heading">
        Match - <?php echo $matchName; ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="editClinic" class="form-group" method="post" enctype="multipart/form-data" action="<?php echo base_url("fifaadmin/updateMatch") ?>">

            <div class="form-group center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" id="teamID" name="teamID" value="<?php echo $matchId; ?>" required="True">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Match Name</label>
                        <input type="text" class="form-control" id="teamName" name="teamName" value="<?php echo $matchName; ?>" placeholder="match Name" required="True">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Round Select</label>
                <select id="round" name="Round" multiple class="form-control">
                    <?php foreach ($allRound as $row) { ?>
                    <option <?php if($row['ID'] == $matchRound){echo 'selected="selected"';}?> value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Match Date</label>
                <input type="date" class="form-control" placeholder="Match Date" value="<?php echo $matchDate;?>" id="MatchDate" name="MatchDate">
            </div>

            <div class="form-group">
                <label>Match Time</label>
                <input type="time" class="form-control" placeholder="Contact No" value="<?php echo $matchDate;?>" id="MatchTime" name="MatchTime">
            </div>

            <div class="form-group">
                <label>Team A Select</label>
                <select id="round" name="TeamIdA" multiple class="form-control">
                    <?php foreach ($allTeam as $row) { ?>
                        <option <?php if($row['ID'] == $matchTeamA){echo 'selected="selected"';}?> value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Team B Select</label>
                <select id="round" name="TeamIdB" multiple class="form-control">
                    <?php foreach ($allTeam as $row) { ?>
                        <option <?php if($row['ID'] == $matchTeamB){echo 'selected="selected"';}?> value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" id="editClinic" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php //echo $footer; ?>
<script src="/fifaadmin/assets/modulesupportjs/clinicManager.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var baseUrl = "<?php echo base_url(); ?>";
        var prevClinicId = "<?php echo $ClinicRegistrationNo; ?>";
        checkClinicEditId(baseUrl, prevClinicId);

    });
</script>

