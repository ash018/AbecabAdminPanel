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
                            <h1 class="page-header">All Drug Category</h1>
                        </div>
                    </div>
                    <?php ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    All Drug Category
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">

                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Drug Category Name</th>
                                                <th>Status</th>
                                                <th>Creation Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $c = 1;
                                            foreach ($allDrugCategory as $dCategory) {
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td class="center"><?php echo $c; ?></td>
                                                    <td class="center"><?php echo $dCategory['DrugCategoryName']; ?></td>
                                                    <td class="center"><?php if($dCategory['DrugCategoryIsActive'] == 1){echo 'Active';} else{echo 'Inactive';} ?></td>
                                                    <td class="center"><?php echo $dCategory['EntryDate']; ?></td>
                                                    <td class="center"><input type="button" class="btn btn-info editDCategoryData" data-toggle="modal" data-target="#myModal" data-node="<?php echo $dCategory['DrugCategoryId']; ?>" value="Edit"/></td>
                                                </tr>
                                                <?php
                                                $c++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" style="text-align: center">Edit Drug Type</h4>
                                                </div>
                                                <div id="editDcategoryModuleData" class="modal-body">

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
        </div>
        <?php echo $footer; ?>
        <script src="/PrescriptionManagementSoftware/assets/modulesupportjs/DrugManagement/drugCategory.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var baseUrl = "<?php echo base_url(); ?>";
                editDrugCategory(baseUrl);

            });
        </script>
    </body>

</html>