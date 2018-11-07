



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Welcome Home, <?php if($nama!=null) echo $nama ;?> </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
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
            </div>
          </div>
        </div>
        <!-- /page content -->

        