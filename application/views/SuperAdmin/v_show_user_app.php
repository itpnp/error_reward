
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_title">
                    <h2>Data Karyawan</h2>
                    <div class="clearfix"></div>
                  </div>
                    <?php if($this->session->flashdata('error')): ?>
                    <div class="x_content bs-example-popovers">
                      <div class="alert alert-danger alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Error !! </strong> <?php echo $this->session->flashdata('error'); ?>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')): ?>
                    <div class="x_content bs-example-popovers">
                      <div class="alert alert-success alert-dismissible fade in" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <strong>Success!! </strong> <?php echo $this->session->flashdata('success'); ?>
                      </div>
                    </div>
                    <?php endif; ?>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table" id="dataTables-example">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">NIK </th>
                            <th class="column-title">NAMA KARYAWAN</th>
                            <th class="column-title">USERNAME </th>
                            <th class="column-title">AKSES </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $nomor=1;
                              foreach($dataPengguna as $row)
                                {
                                  if($row->privilege != $privilege){
                                  echo "<tr>
                                    <td class='warning'>".$row->employee->nik."</td>
                                    <td class='warning'>".$row->employee->employeeName."</td>
                                    <td class='warning'>".$row->username."</td>
                                    <td class='warning'>".$row->privilege."</td>
                                    <td class='warning'><button class='btn btn-primary btn-xs'  id = '".$row->accessId."@".$row->privilege."@".$row->username."@".$row->employee->nik."' data-title='Edit' data-toggle='modal' data-target='#editUser' ><span class='glyphicon glyphicon-pencil'></span></button> |  <button class='btn btn-danger btn-xs' id = '".$row->accessId."' data-title='Edit' data-toggle='modal' data-target='#deleteUser' ><span class='glyphicon glyphicon-trash'></span></button></td>
                                    </tr>";
                                  }
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
    <div id="editUser" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EDIT DATA</h4>
          </div>
          <div class="modal-body">
             <form class="form-horizontal form-label-left" novalidate id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/updateUserApp" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name = "idUser" id= "idUser"/>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nik">NIK <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="nikModal" name="nik" class="form-control col-md-7 col-xs-12" readonly required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="subCategoryName">Hak Akses<span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <select class="form-control col-md-7 col-xs-12" name="chooseUserAppModal" id="chooseUserAppModal" required>
                    <option value="">-- Pilih Hak Akses --</option>
                      <option value="HR/IS">HR/IS</option>
                      <option value="KABAG">KABAG</option>
                      <option value="REWARD">REWARD</option>
                      <option value="SISTEM">SISTEM</option>
                      <option value="SSEKRETARIAT">SEKRETARIAT</option>
                      <option value="SUPER ADMIN">SUPER ADMIN</option>
                   </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="Username">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="usernameModal" name="username" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="pass">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="password" id="PassModal" name="password" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>
                  <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="confirmPass">Confirm Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="password" id="confirmPassModal" name="confirmPass" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div id="deleteUser" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">DELETE DATA</h4>
          </div>
          <div class="modal-body">
             <form id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/deleteUserApp" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name = "idUserDelete" id= "idUserDelete"/>
                <p>Yakin ingin menghapus ?</p>
                <div class="form-group">
                  <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-6">
                    <button type="submit" class="btn btn-success">YA</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>


        