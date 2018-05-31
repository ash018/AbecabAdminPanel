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
                        <h1 class="page-header"> Match List </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Match in 2018 FIFA World Cup 
                            </div>
                            

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Match Name</th>
                                            <th>Round</th>
                                            <th>Match Time</th>
                                            <th>Match Status</th>
                                            <th colspan="2" style="text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $x = 1;// MatchID,MatchName, MatchTime, WinningTeam,  RoundName
                                        foreach ($allMatch as $row) {
                                                ?>
                                            
                                                <tr>
                                                    <td><?php echo $x; ?> </td>
                                                    <td><?php echo $row['MatchName']; ?></td>
                                                    <td><?php echo $row['RoundName']; ?></td>
                                                    <td><?php echo $row['MatchTime']; ?></td>
                                                    <td><?php if($row['WinningTeam'] != ''){ echo 'Match Finish';} else {echo 'Pending';} ?></td>
                                                    <td>
                                                    <button id="<?php echo $row['MatchID'];?>" class="btn btn-info btn-adn   updateScore"  data-toggle="modal"
                                                            data-target="#myModal" data-node="<?php echo $row['MatchID']; ?>">Score Update
                                                    </button>

                                                    <button id="<?php echo $row['MatchID']; ?>" class="btn btn-info btn-adn  editMatch"  data-toggle="modal"
                                                            data-target="#myModal" data-node="<?php echo $row['MatchID']; ?>">Edit
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
                                                <h4 class="modal-title" style="text-align: center">Edit Match Info</h4>
                                            </div>
                                            <div id="editMatchData" class="modal-body">

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="well">

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
        <!--<script src="/fifaadmin/assets/modulesupportjs/clinicManager.js"></script>-->
        <script src="/fifaadmin/assets/modulesupportjs/fifaadmin.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var baseUrl = "<?php echo base_url(); ?>";
                editMatch(baseUrl);
                editClinic(baseUrl);
                deleteClinic(baseUrl);
            });
        </script>

    </body>

</html>

