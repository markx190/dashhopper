<style>
.btn-group-xs > .btn, .btn-xs {
  padding: .25rem .4rem;
  font-size: .875rem;
  line-height: .5;
  border-radius: .2rem;
}
</style>
<main class="hic-documents">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active">Manage News Contents</li>
        </ol>
<!-- <div class="row profile-img">
    <div class="col-md-12">
        <img id="rd-profile-pic" src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:125px; height:120px; image-align:center; border-radius:50%"></h2>                    
    </div> 
</div> -->
<div class="row add-docs-btn">  
    <div class="col-md-3">
        <label>
            <button type="button" class="btn btn-success btn-sm"
            onclick="addDocuments('{{ Auth::user()->hic_id_no }}', 'addDocs', this)"
            data-hic-id-no="{{ Auth::user()->hic_id_no }}"
            >
            <i class="fa fa-plus-circle"></i> Add Contents</button>
        </label>
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-table mr-1"></i>
        News Contents Submitted
            </div>
                <div class="row docs-spinner">
                    </div> 
                        <div class="card-body docs-body">
                        <div class="table-responsive">
                            <table id="hic-docs-datatable" class="table-docs table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th style="font-size: 12px;">ID No.</th>
                                    <th style="font-size: 12px;">Content</th>
                                    <th style="font-size: 12px;">Type</th>
                                    <th style="font-size: 12px;">Status</th>
                                    <th style="font-size: 12px;">Created By</th>
                                    <th style="font-size: 12px; width: 10em;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('reddrop_back.modals.add_documents')
@include('reddrop_back.modals.edit_documents')
@include('reddrop_back.modals.view_documents')







