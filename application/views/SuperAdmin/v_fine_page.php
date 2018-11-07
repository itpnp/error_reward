
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Tarif Tilang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <?php if($this->session->flashdata('error')): ?>
                  <div class="x_content bs-example-popovers">
                  <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>Error !! </strong> <?php echo $this->session->flashdata('error'); ?>
                  </div>
                  </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('success')): ?>
                  <div class="x_content bs-example-popovers">
                  <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <strong>Success!! </strong> <?php echo $this->session->flashdata('success'); ?>
                  </div>
                  </div>
                  <?php endif; ?>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table" id="dataTables-example">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nomor</th>
                            <th class="column-title">Jabatan</th>
                            <th class="column-title">1X</th>
                            <th class="column-title">2X</th>
                            <th class="column-title">3X</th>
                            <th class="column-title">4X</th>
                            <th class="column-title">5X</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                              $nomor=1;
                              foreach($dataTarif as $row)
                                {
                                  echo "<tr>
                                    <td class='warning'>".$row->nominalId."</td>
                                    <td class='warning'>".$row->occupation->occupationName."</td>
                                    <td class='warning'>".$row->tilang1."</td>
                                    <td class='warning'>".$row->tilang2."</td>
                                    <td class='warning'>".$row->tilang3."</td>
                                    <td class='warning'>".$row->tilang4."</td>
                                    <td class='warning'>".$row->tilang5."</td>
                                    <td class='warning'><button class='btn btn-primary btn-xs'  id = '".$row->nominalId."@".$row->occupation->occupationName."@".$row->occupation->occupationId."@".$row->tilang1."@".$row->tilang2."@".$row->tilang3."@".$row->tilang4."@".$row->tilang5."' data-title='Edit' data-toggle='modal' data-target='#editFine' ><span class='glyphicon glyphicon-pencil'></span></button>
                                    </tr>";
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
        <!-- Modal -->
        <div id="editFine" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">EDIT DATA</h4>
              </div>
              <div class="modal-body">
                 <form id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/updateNominal" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tilang1">Jabatan<span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" id="namaJabatan" name="namaJabatan" class="form-control col-md-7 col-xs-12" readonly>
                        <input type="hidden" id="idJabatan" name="idJabatan" readonly>
                        <input type="hidden" id="idNominal" name="idNominal" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tilang1">Tilang 1 <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" id="tilang1" name="tilang1" class="form-control col-md-7 col-xs-12" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tilang2">Tilang 2 <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" id="tilang2" name="tilang2" class="form-control col-md-7 col-xs-12" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tilang3">Tilang 3 <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" id="tilang3" name="tilang3" class="form-control col-md-7 col-xs-12" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tilang4">Tilang 4 <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" id="tilang4" name="tilang4" class="form-control col-md-7 col-xs-12" required>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-12" for="tilang1">Tilang 5 <span class="required">*</span>
                      </label>
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" id="tilang5" name="tilang5" class="form-control col-md-7 col-xs-12" required>
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
        <div id="deleteNominal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">DELETE DATA</h4>
              </div>
              <div class="modal-body">
                 <form id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/deleteNominal" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name = "idNominalDelete" id= "idNominalDelete"/>
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

        