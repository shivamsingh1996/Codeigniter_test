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
                                    <li class="nav-item"> <a class="nav-link <?php if(isset($error)){echo 'active'; } ?>" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Assign Category</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane <?php if(!isset($error)){echo 'active'; } ?>" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <form action="<?=base_url('content/create/').$update_id?>" method="post">
                                            <div class="form-body">
                                            <?php if(isset($flash)){ echo $flash; }?>
                                            <div class="row p-t-20">
                                                <div class="col-md-6">
                                                    <div class="form-group <?php if(!empty(form_error('name'))){ echo 'has-danger'; }?>">
                                                        <label class="control-label">Title</label>
                                                        <input type="text"  name="c_title" class="form-control form-control-danger" placeholder="Title" value="<?=$c_title;?>">
                                                        <?=form_error('c_title','<div class="form-control-feedback">', '</div>')?>
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
                                    <?php if(isset($update_id)) { ?>
                                    <div class="p-20">
                                            <form action="<?=base_url('content/assign_category/').$update_id?>" method="post">
                                            <div class="form-body">
                                            <?php if(isset($flash)){ echo $flash; }?>
                                            <div class="row p-t-20">
                                                <div class="col-md-7">
                                                    <div class="form-group <?php if(!empty(form_error('name'))){ echo 'has-danger'; }?>">
                                                        <select class="form-control form-control-danger" name="parent_id" id="parent_id">
                                                        <option value="">Select Category</option>
                                                        <?php foreach($p_category->result() as $row) { ?>
                                                            <option value="<?=$row->id?>"><?=$row->category?></option>
                                                        <?php } ?>    
                                                        </select>
                                                    </div>    
                                                </div>
                                                <div class="col-md-7 hideDiv" id="subcategory_id"> 
                                                    <div class="form-group <?php if(!empty(form_error('name'))){ echo 'has-danger'; }?>">
                                                        <select class="form-control form-control-danger" name="subcategory_id" id="subcategory_div">
                                                        
                                                        </select>
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
                                    <?php }else{ ?>
                                            <div class="alert alert-warning" style="padding:15px;">
                                            <i class="icon-info-sign"></i>&nbsp;Please save the Content information before assigning to Category.
                                            </div>
                                    <?php } ?>
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
<script>
    $("#parent_id").change(function(){
        $.ajax({
            url:"<?=base_url('content/subcategory')?>",
            method:"POST",
            data:{"id":$(this).val()},
            success: function(result){
                if(result.length > 0){
                    $("#subcategory_id").removeClass('hideDiv');
                    $('#subcategory_div').html(result)
                }
                else
                {
                    $("#subcategory_id").addClass('hideDiv');
                }
            }
        })
    });
</script>