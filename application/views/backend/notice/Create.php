<style>
.form-control-feedback{
    color:#ef5350;
}
.hideDiv
{
    display:none;
}
</style>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Create Package</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Information</a></li>
                        <li class="breadcrumb-item">Images</li>
                        <li class="breadcrumb-item active">Form Layout</li>
                    </ol>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Package</h4>
                                <h6 class="card-subtitle">Use tabs to navigate</h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link <?php if(!isset($error)){echo 'active'; } ?>" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Information</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane <?php if(!isset($error)){echo 'active'; } ?>" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <form action="<?=base_url('notice/create/').$update_id?>" method="post">
                                            <div class="form-body">
                                            <?php if(isset($flash)){ echo $flash; }?>
                                            <div class="row p-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group <?php if(!empty(form_error('notice'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Notice</label>
                                                        <input type="text"  name="notice" class="form-control form-control-danger" placeholder="Notice" value="<?=$notice;?>">
                                                        <?=form_error('notice','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <!--/span-->
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" name="submit" value="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <button type="button" class="btn btn-inverse">Cancel</button>
                                            </div>
                                        </form>

                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20  <?php if(isset($error)){echo 'active'; } ?>" id="profile" role="tabpanel">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
</div>
