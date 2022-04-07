<div class="modal" id="deleteDocumentsModal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content pull-right">
    <div class="edit-documents"> <b><p id="header-label"><i class="fa fa-folder"></i> Delete Documents</p></b></div>
<form id="edit-documents-form" enctype="multipart/form-data" method="post">    

<div class="modal-body bt-industry">
<div class="row">
    <div class="col-md-3">
        <label><b>Name</b></label>
        <input id="upload-docs-name" type="text" class="form-control" name="hic_docs_name">
    <span id="upload-docs-name-text"></span>
</div>
<div class="col-md-8 open-avatar">
    <div class="form-group">
        <label><b>Upload Documents</b></label>
            <input id="upload-hic-id-no" type="hidden" name="hic_id_no" class="form-control">
                <input id="upload-hic-docs" type="file" name="hic_documents" class="form-control edit-file">
            <span id="upload-hic-docs-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="edit-docs-btn" type="submit" name="submit" class="btn btn-success btn-sm pull-right">Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </form>
</div>


@include('reddrop_back.back_scripts.edit_documents')

