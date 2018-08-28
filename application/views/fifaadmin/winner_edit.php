<?php
$winnerID = $winnerData[0]['ID'];
$winnerName = $winnerData[0]['WinnerName'];
$winnerSpeciality = $winnerData[0]['Speciality'];
$winnerDistrict = $winnerData[0]['District'];
$winnerQuizTime = $winnerData[0]['QuizTime'];
$winnerImage = $winnerData[0]['WinnerImage'];
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Winner - <?php echo $winnerName; ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
<!--        <form id="editClinic" class="form-group" method="post" action="<?php echo base_url("fifaadmin/updateWinner") ?>">-->
        <?php echo form_open_multipart('fifaadmin/updateWinner');?>

            <div class="form-group center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" id="winnerID" name="winnerID" value="<?php echo $winnerID; ?>" placeholder="Clinic Id" required="True">
                    </div>

                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Winner Name</label>
                        <input type="text" class="form-control" id="winnerName" name="winnerName" value="<?php echo $winnerName; ?>" placeholder="Name" required="True">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Winner Specialty</label>
                        <input type="text" class="form-control" id="winnerSpeciality" name="winnerSpeciality" value="<?php echo $winnerSpeciality; ?>" placeholder="Name" required="True">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Winner District</label>
                        <input type="text" class="form-control" id="winnerDistrict" name="winnerDistrict" value="<?php echo $winnerDistrict; ?>" placeholder="Name" required="True">
                    </div>
                </div>
            </div>
        
       
            
            <div class="form-group">
                <label>Winner Image</label>
                <input class="form-control" type="file" name="file" id="file" class="input-large">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Winner Quiz Time</label>
                        <input type="text" class="form-control" id="winnerQuizTime" name="winnerQuizTime" value="<?php echo $winnerQuizTime; ?>" placeholder="Name" required="True">
                    </div>
                </div>
            </div>


            <button type="submit" id="editClinic" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php //echo $footer;?>
<script src="/fifaadmin/assets/modulesupportjs/clinicManager.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var baseUrl = "<?php echo base_url(); ?>";
        var prevClinicId =  "<?php echo $ClinicRegistrationNo; ?>";
        checkClinicEditId(baseUrl,prevClinicId);

    });
</script>
