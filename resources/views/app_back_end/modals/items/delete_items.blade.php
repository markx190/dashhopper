<div class="modal" id="deleteItemsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-trash"></i> Delete Items</p></b></div>
    <div class="row d-alert-m">
</div>
<form class="f-d">    
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-3">
            <label>Are you sure you want to delete?</label>
                <h6 id="d-item-name" class="d-item-name"></h6>
            <input type="hidden" class="form-control d-item-id" name="id" />
        <span id="delete-item-name-text"></span>
    </div>
</div>
<div class="modal-footer">
    <div class="row delete-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('reddrop_back.back_scripts.items.manage_items')

