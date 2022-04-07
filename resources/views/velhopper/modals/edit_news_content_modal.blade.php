<div class="modal" id="addNewsContentsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-folder"></i> <span id="docs-l"></span></p></b></div>
    <div class="row alert-m">
</div>
<form class="f-a" enctype="multipart/form-data" method="post">    
{{ csrf_field() }}
<div class="modal-body div-docs">
    <div class="row row-docs-name">
        </div>
        <div class="row row-docs-file">
    </div>
</div>
<div class="modal-footer">
    <div class="row s-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('reddrop_back.back_scripts.manage_users')