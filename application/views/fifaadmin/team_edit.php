<?php
//var_dump($clinicData[0]);
//exit();

$teamID = $teamData[0]['ID'];
$teamName = $teamData[0]['Name'];


?>
<div class="panel panel-default">
    <div class="panel-heading">
        Team - <?php echo $teamName; ?>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="editClinic" class="form-group" method="post" enctype="multipart/form-data" action="<?php echo base_url("fifaadmin/updateTeam") ?>">

            <div class="form-group center">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <input type="hidden" class="form-control" id="teamID" name="teamID" value="<?php echo $teamID; ?>" placeholder="Clinic Id" required="True">
                    </div>

                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Team Name</label>
                        <input type="text" class="form-control" id="teamName" name="teamName" value="<?php echo $teamName; ?>" placeholder="Name" required="True">
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
        //var prevDoctorContactNo = "<?php //echo $DoctorContactNo; ?>";
        checkClinicEditId(baseUrl,prevClinicId);
        //checkDoctorEditId(baseUrl,prevClinicId);
        //checkContactNoEditId(baseUrl,prevDoctorContactNo);
//        checkDoctorId(baseUrl);
    });
</script>


<!--
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Selects Doctor</label>
                        <select class="form-control" id="DoctorId" name="DoctorId"  required="True">
                            <option value="0" //<?php
//if ($doctorId == 0) {
//                                echo 'selected="selected"';
//                            } 
?> >Select</option>
                            //<?php //foreach ($allDoctor as $doctor) { ?>
                                <option value="//<?php //echo $doctor['DoctorId']; ?>" <?php
//if ($doctorId != 0 && $doctorId == $doctor['DoctorId']) {
//                                echo 'selected="selected"';
//                            } 
?>><?php //echo $doctor['DoctorName'];  ?></option>
                            //<?php //}  ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" <?php //if ($isAdmin != '' && $isAdmin == 1) {echo 'checked="True"';
//} 
?> id="IsAdmin" name="IsAdmin">Is Admin
                </label>
            </div>

            <button type="submit" id="editUser" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>