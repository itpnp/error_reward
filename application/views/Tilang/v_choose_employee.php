
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PILIH PELAKU PELANGGARAN</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table" id="dataTables-example">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">NIK </th>
                            <th class="column-title">NAMA KARYAWAN</th>
                            <th class="column-title">BAGIAN </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                              $nomor=1;
                              foreach($dataKaryawan as $row)
                                {
                                  echo "<tr>
                                    <td class='warning'>".$row->nik."</td>
                                    <td class='warning'>".$row->employeeName."</td>
                                    <td class='warning'>".$row->department->departmentName."</td>
                                    <td class='warning'><a href = 'registerTicket/".$row->nik."'>PILIH</a></td>
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

        