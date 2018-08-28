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
                        <h1 class="page-header">Winner</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Enter Winner Name
                            </div>
                            <div class="panel-body">
                                <div class="row">
<!--                                    <form role="form" action="<?php echo base_url("Fifaadmin/submitWinner"); ?>" method="post">-->
                                    <?php echo form_open_multipart('Fifaadmin/submitWinner');?>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label>Winner Name</label>
                                                <input class="form-control" placeholder="Winner Name" name="WinnerName" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Winner Specialty</label>
                                                <input class="form-control" placeholder="Winner Specialty" name="WinnerSpeciality" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Winner District</label>
                                                <input class="form-control" placeholder="Winner District" name="WinnerDistrict" required="required">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Winner Image</label>
                                                <input class="form-control" type="file" name="file" id="file" class="input-large">
                                            </div>


                                            <div class="form-group">
                                              <label for="exampleSelect1">Quiz Time</label>
                                                <select class="form-control" id="exampleSelect1" name="QuizTime">
                                                  <?php $i=14;
                                                      for ($i = 14; $i < 31; $i++) {
                                                      echo '<option>2018-06-' . $i . '</option>';
                                                  }
                                                  for ($i = 1; $i < 10; $i++) {
                                                      echo '<option>2018-07-0' . $i . '</option>';
                                                  }
                                                  for ($i = 10; $i < 16; $i++) {
                                                      echo '<option>2018-07-' . $i . '</option>';
                                                  }
                                                  ?>

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
            <!-- /#page-wrapper -->

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
