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
                                    <form role="form" action="<?php echo base_url("Fifaadmin/bulkWinnerSubmit"); ?>" name="upload_excel" method="post" enctype="multipart/form-data">

                                    <div class="col-lg-12">        


                                        <div class="form-group">
                                            <label>Select File</label>
                                            
                                            <input class="form-control" type="file" name="file" id="file" class="input-large">
                                            
                                        </div>

                                        <!-- Button -->
                                        <div class="form-group">
                                            <label>Import data</label>
                                            
                                            <input type="submit" id="submit" name="submit" value="Upload" class="btn btn-primary">
                                            
                                        </div>

                                    </div>

                                    </form>
                                </div>
                                <?php
                                    
                                ?>
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
