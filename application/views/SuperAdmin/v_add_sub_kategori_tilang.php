<!-- page content -->
<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><small>TAMBAH KATEGORI BARU</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/saveSubKategori" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subCategoryName">Kategori<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="chooseCategory" id="chooseCategory" required>
                <option value="0-0">-- Pilih Kategori --</option>
                <?php 
                foreach($dataKategori as $row){
                 echo '<option value="'.$row->categoryId.'">'.$row->categoryName.'</option>';
                }
               ?>
               </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subCategoryName">Nama Sub Kategori <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="categoryName" name="subCategoryName" class="form-control col-md-7 col-xs-12" required>
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
    </div> <!-- END OF DIV CLASS X_PANEL-->
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><small>DATA KATEGORI</small></h2>
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
                  <th class="column-title">ID KATEGORI </th>
                  <th class="column-title">KATEGORI</th>
                  <th class="column-title">SUB KATEGORI</th>
                  <th class="column-title">ACTION </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($dataSubKategori as $row)
                {
                echo "<tr>
                  <td class='warning'>".$row->subCategoryId."</td>
                  <td class='warning'>".$row->ticketCategory->categoryName."</td>
                  <td class='warning'>".$row->subCategoryName."</td>
                  <td class='warning'><button class='btn btn-primary btn-xs' id = '".$row->subCategoryId."@".$row->subCategoryName."@".$row->ticketCategory->categoryId."' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button> |  <button class='btn btn-danger btn-xs' id = '".$row->subCategoryId."' data-title='Edit' data-toggle='modal' data-target='#delete' ><span class='glyphicon glyphicon-trash'></span></button>
                 
                  </td>
                </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div> <!-- END OF DIV CLASS ROW-->
</div>

<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT DATA</h4>
      </div>
      <div class="modal-body">
         <form id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/updateSubCategory" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name = "idSubCategory" id= "idSubCategory"/>
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="subCategoryName">Kategori<span class="required">*</span>
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="chooseCategoryModal" id="chooseCategoryModal" required>
                <option value="0-0">-- Pilih Kategori --</option>
                <?php 
                foreach($dataKategori as $row){
                 echo '<option value="'.$row->categoryId.'">'.$row->categoryName.'</option>';
                }
               ?>
               </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-12" for="subCategoryName">Nama Sub Kategori <span class="required">*</span>
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="subCategoryNameModal" name="subCategoryName" class="form-control col-md-7 col-xs-12" required>
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
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DELETE DATA</h4>
      </div>
      <div class="modal-body">
         <form id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/programmer/deleteSubCategory" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name = "idSubCategoryDelete" id= "idSubCategoryDelete"/>
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

<!-- /page content -->
        