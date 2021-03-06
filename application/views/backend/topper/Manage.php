<!-- Column -->
<div class="page-wrapper">
<div class="container-fluid">
<div class="card">
            <div class="card-body">
                <h4 class="card-title">Add & Remove Topper</h4>
                <h6 class="card-subtitle">You can add or remove rows</h6>
                <div class="m-t-40">
                        <div class="d-flex">
                            <div class="mr-auto">
                                <div class="form-group">
                                    <a href="<?=base_url('topper/create')?>"  class="btn btn-primary btn-sm"><i class="icon wb-plus" aria-hidden="true"></i>Add New Topper
                                    </a>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <div class="form-group">
                                    <input id="demo-input-search2" type="text" placeholder="Search" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                    <thead>
                        <tr>
                            <th data-sort-initial="true" data-toggle="true">Id</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th data-sort-ignore="true" class="min-width">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach($topper_return->result() as $row){ ?>
                        <tr>
                            <td><?=$row->id?></td>
                            <td><?=$row->t_title?></td>
                            <td><?=$row->name?></td>
                            <td>
                                <a href="<?=base_url('topper/create/').$row->id?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="text-right">
                                    <ul class="pagination">
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>