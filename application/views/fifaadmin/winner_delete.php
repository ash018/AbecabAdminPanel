<?php
$winnerID = $winnerData[0]['ID'];
$winnerName = $winnerData[0]['WinnerName'];
$winnerSpeciality = $winnerData[0]['Speciality'];
$winnerDistrict = $winnerData[0]['District'];
$winnerQuizTime = $winnerData[0]['QuizTime'];
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Winner - <?php echo $winnerName; ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="editClinic" class="form-group" method="post" enctype="multipart/form-data" action="<?php echo base_url("fifaadmin/deleteWinner") ?>">

            <div class="form-group center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" id="winnerID" name="winnerID" value="<?php echo $winnerID; ?>" placeholder="Clinic Id" required="True">
                    </div>

                </div>
            </div>
            
            <div class="form-group center">
                <div class="row">
                    
                        <h3>Are You Sure Want to Delete?</h3>
                   

                </div>
            </div>

            


            <button type="submit" id="editClinic" class="btn btn-danger">DELETE</button>
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
