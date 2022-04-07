<main class="hic-documents">
    <div class="container-fluid">
    <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active">Hi, {{ Auth::user()->user_firstname }} {{ Auth::user()->user_lastname }}  You can manage your documents</li>
        </ol>
<div class="row add-docs-btn">  
    <div class="col-md-3">
        <label>
            <button type="button" class="btn btn-success btn-sm"
            onclick="addDocuments('{{ Auth::user()->hic_id_no }}', 'addDocs', this)"
            data-hic-id-no="{{ Auth::user()->hic_id_no }}"
            >
            <i class="fa fa-plus-circle"></i> Add New Document</button>
        </label>
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-list"></i>
        List of Documents
            </div>
        <div class="row docs-spinner">
    </div> 
<div class="card-body docs-body">
    <form id="search-items-form">
        <div class="row">          
    </div>
</form>
<div class="table-responsive">
    <table id="contents-datatable" class="table-docs table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Document Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .btn-group-xs > .btn, .btn-xs {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }
    .content-th {
        font-size: 13px;
        font-family: "Montserrat", sans-serif;
    }
</style>
@include('reddrop_back.modals.add_documents')
@include('reddrop_back.modals.edit_documents')
@include('reddrop_back.modals.view_documents')
@include('reddrop_back.modals.delete_documents')
@include('fil_views.back_scripts.manage_contents_scripts')










