<html lang="en">

    <?php
    echo $Header;
    ?>

    <body>
        <div id="wrapper">
            <?php echo $leftMenu; ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <br/>
                            
                            <h1 class="page-header">Access Control List </h1>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    ACL
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">

                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Menu Name</th>
                                                <?php foreach($roles as $r){?>
                                                <th><?php echo $r['RoleName'];?></th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach ($urls as $u){?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo $u['AccessUrlName'];?></td>
                                                <?php foreach($roles as $r){?>
                                                <td class="center"><input type="checkbox" class="btn btn-info" data-toggle="modal" data-url="<?php echo $u['AccessUrlId'];?>" data-role="<?php echo $r['RoleId'];?>" /></td>
                                                <?php }?>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
<!--                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                             Modal content
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" style="text-align: center">Edit Drug Type</h4>
                                                </div>
                                                <div id="editDtypeModuleData" class="modal-body">

                                                </div>

                                            </div>

                                        </div>
                                    </div>-->

                                </div>

                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>

            </div>

        </div>
        <?php echo $footer; ?>
        <script src="/PrescriptionManagementSoftware/assets/modulesupportjs/aclAjax.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var baseUrl = "<?php //echo base_url(); ?>";
                //editDrugType(baseUrl);

            });
        </script>
    </body>

</html>