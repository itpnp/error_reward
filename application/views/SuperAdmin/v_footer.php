<!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/css/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/js/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/css/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/css/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.id.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validator.js"></script>
    <script type="text/javascript">

      $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script>
    $('#edit').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        data = data.split("@");
        $("#idSubCategory").val(data[0]);
        $("#subCategoryNameModal").val(data[1]);
        $("#chooseCategoryModal").val(data[2]);
        })
    </script>
    <script>
    $('#delete').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        $("#idSubCategoryDelete").val(data);
        })
    </script>
    <script>
    $('#editCategory').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        data = data.split("@");
        $("#idCategory").val(data[0]);
        $("#categoryNameModal").val(data[1]);
        })
    </script>
    <script>
    $('#deleteCategory').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        $("#idCategoryDelete").val(data);
        })
    </script>
    <script>
    $('#deleteUser').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        $("#idUserDelete").val(data);
        })
    </script>
    <script>
    $('#editUser').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        data = data.split("@");
        $("#idUser").val(data[0]);
        $("#usernameModal").val(data[2]);
        $("#nikModal").val(data[3]);
        })
    </script>
    <script>
    $('#editProfile').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        data = data.split("@");
        $("#idUserEdit").val(data[0]);
        $("#usernameModalEdit").val(data[2]);
        $("#nikModalEdit").val(data[3]);
        $("#privilegeModal").val(data[1]);
        })
    </script>
    <script>
    $('#editFine').on('show.bs.modal', function(e) {
        var $modal = $(this),
        data = e.relatedTarget.id;
        
        data = data.split("@");
        
        $("#idNominal").val(data[0]);
        $("#namaJabatan").val(data[1]);
        $("#idJabatan").val(data[2]);
        $("#tilang1").val(data[3]);
        $("#tilang2").val(data[4]);
        $("#tilang3").val(data[5]);
        $("#tilang4").val(data[6]);
        $("#tilang5").val(data[7]);
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          var date_input=$('input[name="tanggalTilang"]'); //our date input has the name "date"
          var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
          var options={
            language:'id',
            format: 'dd MM yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
          };
          date_input.datepicker(options);
      })
    </script>
  </body>
</html>