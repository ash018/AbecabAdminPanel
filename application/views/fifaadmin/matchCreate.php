<!DOCTYPE html>
<html lang="en">

    <?php
       // var_dump($leftMenu);
        echo $Header;
    ?>
    <body>

        <div id="wrapper">
            <?php echo $leftMenu; ?>
            <!-- Navigation -->


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Match Create</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Enter Match Information 
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="<?php echo base_url("Fifaadmin/saveMatch"); ?>" method="post">
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Match Name</label>
                                                <input class="form-control" placeholder="Match Name" name="MatchName" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Round Select</label>
                                                <select id="round" name="Round" multiple class="form-control">
                                                    <?php  foreach ($allRound as $row) { ?>
                                                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Match Date</label>
                                                <input type="date" class="form-control" placeholder="Match Date" id="MatchDate" name="MatchDate">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Match Time</label>
                                                <input type="time" class="form-control" placeholder="Contact No" id="MatchTime" name="MatchTime">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Team A Select</label>
                                                <select id="round" name="TeamIdA" class="form-control">
                                                    <?php  foreach ($allTeam as $row) { ?>
                                                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Team B Select</label>
                                                <select id="round" name="TeamIdB" class="form-control">
                                                    <?php  foreach ($allTeam as $row) { ?>
                                                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" id="saveDoctor" class="btn btn-primary">Save</button>

                                        </div>
                                        
                                    </form>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
           
        </div>
        <?php echo $footer; ?>
        
        <script src="/fifaadmin/assets/modulesupportjs/doctorManager.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var baseUrl = "<?php echo base_url(); ?>";
                checkDoctorId(baseUrl);
                checkContactNoId(baseUrl);
                
            });
            
        </script>
    </body>

</html>
