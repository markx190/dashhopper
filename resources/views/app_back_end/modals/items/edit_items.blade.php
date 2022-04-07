<div class="modal" id="editItemsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-edit"></i> Edit Items</p></b></div>
    <div class="row e-alert-m">
</div>
<form class="f-e">    
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-3">
            <label>Item Name</label>
                <select id="e-item-name" class="form-control e-item-name"></select>
                <input type="hidden" class="form-control e-item-id" name="id" />
                <input type="hidden" class="form-control e-item-id-no" name="item_id_no" />
            <span id="edit-item-name-text"></span>
        </div>
        <div class="col-md-3">
            <label>Category</label>
                <input class="form-control e-item-category" name="category" />
            <span id="edit-category-text"></span>
        </div>
        <div class="col-md-3">
            <label>Stock Qty. / Bag</label>
                <input class="form-control e-item-qty-stock" name="qty_stock" />
            <span id="edit-qty-stock-text"></span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Unit Price / Bag</label>
                    <input class="form-control e-item-unit-price" name="unit_price" />
                <span id="edit-unit-price-text"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Date of Purchase</label>
        </div>
    </div>

    <div class="row e-pur-date">
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Date of Expiry</label>
        </div>
    </div>

    <div class="row e-exp-date">
    </div>
   
</div>
<div class="modal-footer">
    <div class="row edit-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('reddrop_back.back_scripts.items.manage_items')

