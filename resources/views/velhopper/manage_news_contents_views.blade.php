<main class="hic-documents">
    <div class="container-fluid">
<br>
<div class="row">
    <div class="col-md-6" id="trips">
        <button class="btn btn-primary btn-sm" onclick="addContents(event)"><i class="fa fa-plus-circle"></i> Add Content</button>                         
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-list"></i>
        List of News Content
            </div>
        <div class="row docs-spinner">
    </div> 
<div class="card-body docs-body">
    <form id="search-items-form">
        <div class="row">          
    </div>
</form>
<div class="table-responsive">
    <table id="news-content-table" class="table-docs table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="font-size: 12px;">ID No.</th>
                <th style="font-size: 12px;">Article Name</th>
                <th style="font-size: 12px;">Position</th>
                <th style="font-size: 12px;">Type</th>
                <th style="font-size: 12px;">Status</th>
                <th style="font-size: 12px;">Action</th>
            </tr>
        </thead>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('fil_views.modals.add_news_content_modal') 
@include('fil_views.back_scripts.manage_news_contents')











