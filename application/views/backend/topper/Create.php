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
                                <h4 class="card-title">Create Topper</h4>
                                <h6 class="card-subtitle">Use tabs to navigate</h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link <?php if(!isset($error)){echo 'active'; } ?>" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Information</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link <?php if(!isset($error)){echo 'active'; } ?>" data-toggle="tab" href="#ok" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Topper</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane <?php if(!isset($error)){echo 'active'; } ?>" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <form action="<?=base_url('topper/create/').$update_id?>" method="post">
                                            <div class="form-body">
                                            <?php if(isset($flash)){ echo $flash; }?>
                                            <div class="row p-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group <?php if(!empty(form_error('name'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Name</label>
                                                        <input type="text"  name="name" class="form-control form-control-danger" placeholder="name" value="<?=$name;?>">
                                                        <?=form_error('name','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?php if(!empty(form_error('year'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Year</label>
                                                        <input type="text"  name="year" class="form-control form-control-danger" placeholder="year" value="<?=$year;?>">
                                                        <?=form_error('year','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?php if(!empty(form_error('rank'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Rank</label>
                                                        <input type="text"  name="rank" class="form-control form-control-danger" placeholder="rank" value="<?=$rank;?>">
                                                        <?=form_error('rank','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group <?php if(!empty(form_error('t_title'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Title</label>
                                                        <input type="text"  name="t_title" class="form-control form-control-danger" placeholder="title" value="<?=$t_title;?>">
                                                        <?=form_error('t_title','<div class="form-control-feedback">', '</div>')?>
                                                    </div>    
                                                </div>
                                                <!--/span-->
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group <?php if(!empty(form_error('content'))){echo 'has-danger';}?>">
                                                        <label class="control-label">Content</label>
                                                        <textarea class="form-control form-control-danger" rows="5" name="content" id="editor1"><?=$content?></textarea>
                                                        <?=form_error('content','<div class="form-control-feedback">', '</div>')?>
                                                    </div>
                                                </div>
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

 <script>
        CKEDITOR.replace( 'editor1', {
            filebrowserBrowseUrl: '<?=base_url()?>public/backend/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '<?=base_url()?>public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
</script>