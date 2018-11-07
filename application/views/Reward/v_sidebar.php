            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url()?>index.php/reward/chooseEmployee"><i class="fa fa-home"></i> REGISTRASI REWARD</a>
                  </li>
                  <li><a href="<?php echo base_url()?>index.php/reward/dataReward"><i class="fa fa-home"></i> DATA  REWARD</a>
                  </li>
                  <li><a href="<?php echo base_url()?>index.php/reward/reportPage"><i class="fa fa-home"></i> REPORT</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>assets/images/img.jpg" alt=""><?php if($nama!=null) echo $nama ;?> 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a>
                      <button class='btn btn-primary btn-xs'  id = "<?php if($akses!=null) echo $akses;?>@<?php if($privilege!=null) echo $privilege;?>@<?php if($username!=null) echo $username;?>@<?php if($nik!=null) echo $nik;?>" data-title='Edit' data-toggle='modal' data-target='#editProfile' >SETTING </button>
                      </a>
                    </li>
                    <li><a href="<?php echo base_url()?>index.php/login/logout"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation-->

        <div id="editProfile" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EDIT DATA</h4>
          </div>
          <div class="modal-body">
             <form class="form-horizontal form-label-left" novalidate id="demo-form2" role="form" method="post" action="<?php echo base_url()?>index.php/reward/updateProfileApp" data-parsley-validate class="form-horizontal form-label-left">
                <input type="hidden" name = "idUserEdit" id= "idUserEdit"/>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="nik">NIK <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="nikModalEdit" name="nikEdit" class="form-control col-md-7 col-xs-12" readonly required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="subCategoryName">Hak Akses<span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="privilegeModal" name="privilegeModal" class="form-control col-md-7 col-xs-12" readonly required>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="Username">Username <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="text" id="usernameModalEdit" name="usernameEdit" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="pass">Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="password" id="PassModal" name="passwordEdit" class="form-control col-md-7 col-xs-12" required>
                  </div>
                </div>
                  <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12" for="confirmPass">Confirm Password <span class="required">*</span>
                  </label>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <input type="password" id="confirmPassModalEdit" name="confirmPassEdit" data-validate-linked="passwordEdit" class="form-control col-md-7 col-xs-12" required="required">
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