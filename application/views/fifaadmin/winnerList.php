<!DOCTYPE html>
<html lang="en">

    <?php
       // var_dump($leftMenu);
        echo $Header;
    ?>
<body>

        <div id="wrapper">

            <?php echo $leftMenu;?>

            <!-- Navigation -->


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <?php
                        $notify = $this->session->userdata('notifyuser');

                        if (sizeof($notify) > 0 && $notify != '') {
                            if ($notify['type'] == 1) {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $notify['message']; ?>
                                </div>
                                <?php
                            }
                            if ($notify['type'] == 0) {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php echo $notify['message']; ?>
                                </div>
                                <?php
                            }
                            $this->session->unset_userdata('notifyuser');
                        }
                        ?>
                        <h1 class="page-header"> Winner Info </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Winner Information 2018 Abecab Quiz
                            </div>


                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Winner Name</th>
                                            <th>Specialty</th>
                                            <th>District</th>
                                            <th>Quiz Time</th>
                                            <th colspan="2" style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x = 1;
                                        foreach ($allWinner as $row) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $x; ?> </td>
                                                    <td><?php echo $row['WinnerName']; ?></td>
                                                    <td><?php echo $row['Speciality']; ?></td>
                                                    <td><?php echo $row['District']; ?></td>
                                                    <td><?php echo $row['QuizTime']; ?></td>
                                                    <td>
                                                        <button id="<?php echo $row['ID']; ?>" class="btn btn-info btn-adn  editClinicGetData" style="margin-left: 30%" data-toggle="modal"
                                                                data-target="#myModal" data-node="<?php echo $row['ID']; ?>">Edit
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button id="<?php echo $row['ID']; ?>" class="btn btn-danger btn-adn  deleteClinicGetData" style="margin-left: 30%" data-toggle="modal"
                                                                data-target="#myModal2" data-node="<?php echo $row['ID']; ?>">DELETE
                                                        </button>
                                                    </td>

                                                </tr>
                                                <?php $x++;
                                            }?>
                                    </tbody>
                                </table>

                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="text-align: center">Edit Winner Info</h4>
                                            </div>
                                            <div id="editClinicModuleData" class="modal-body">

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                
                                <div class="modal fade" id="myModal2" role="dialog">
                                    <div class="modal-dialog">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="text-align: center">Delete Winner Info</h4>
                                            </div>
                                            <div id="deleteClinicModuleData" class="modal-body">

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>

        </div>

        <!-- /#page-wrapper -->

        <?php echo $footer; ?>
        <script src="<?php echo base_url();?>assets/modulesupportjs/clinicManager.js"></script>
        <script type="text/javascript">
                $(document).ready(function () {
                    var baseUrl = "<?php echo base_url(); ?>";
                    $(".btn-info").on('click',function(){
                    var winnerID = $(this).attr("data-node");
                    console.log("hello"+winnerID);
                    $("#editClinicModuleData").empty();
                $.ajax({
                    url: baseUrl+"fifaadmin/getWinner",
                    type: "get",
                    data: "winnerID="+winnerID,
                    cache: false,
                    success: function(data){
                        console.log('Return Data' + data);
                        $("#editClinicModuleData").append(data);
    //                    if(data == 0){
    //                        $("#divUserId").attr('style','display : block');
    //                        $("#saveUser").prop("disabled",true);
    //                    }
                    }
                });
            });
                    //deleteClinic(baseUrl);
        });
        
        
        $(document).ready(function () {
                    var baseUrl = "<?php echo base_url(); ?>";
                    $(".btn-danger").on('click',function(){
                    var winnerID = $(this).attr("data-node");
                    console.log("hello"+winnerID);
                    $("#deleteClinicModuleData").empty();
                $.ajax({
                    url: baseUrl+"fifaadmin/getWinnerDelete",
                    type: "get",
                    data: "winnerID="+winnerID,
                    cache: false,
                    success: function(data){
                        console.log('Return Data' + data);
                        $("#deleteClinicModuleData").append(data);
    //                    if(data == 0){
    //                        $("#divUserId").attr('style','display : block');
    //                        $("#saveUser").prop("disabled",true);
    //                    }
                    }
                });
            });
                    //deleteClinic(baseUrl);
        });
        
        </script>

    </body>

</html>
