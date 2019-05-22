<style>
.form-control-feedback{
    color:#ef5350;
}
</style>
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
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
                                            <form action="<?=base_url('category/create/').$update_id?>" method="post">
                                            <div class="form-body">
                                            <?php if(isset($flash)){ echo $flash; }?>
                                            <div class="row p-t-20">
                                                <div class="col-md-7">
                                                    <div class="form-group <?php if(!empty(form_error('parent_id'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Category</label>
                                                        <select class="form-control form-control-danger" name="parent_id">
                                                        <option value="0">Select Category</option>
                                                        <?php foreach($p_category->result() as $row) { ?>
                                                            <option value="<?=$row->id?>"><?=$row->category?></option>
                                                        <?php } ?>    
                                                        </select>
                                                        <?=form_error('parent_id','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group <?php if(!empty(form_error('category'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Subcategory</label>
                                                        <input type="text"  name="category" class="form-control form-control-danger" placeholder="Subcategory" value="<?=$category;?>">
                                                        <?=form_error('category','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <!--/span-->
                                                <!--/span-->
                                            </div>
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
</div>