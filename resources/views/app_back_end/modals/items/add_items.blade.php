<div class="modal" id="addItemsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-plus-circle"></i> <span id="items-l"></span></p></b></div>
    <div class="row alert-m">
</div>
<form class="f-a">    
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-3">
            <label>Item Name</label>
                <select id="a-item-name" class="form-control a-item-name" name="item_name">
                <option></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="AB+">AB+</option>
                <option value="O">O</option>
                <option value="O+">O+</option>
                <option value="Platelet">Platelet</option>
                <option value="Cryoprecipitate">Cryoprecipitate</option>
                <option value="Cryosupernate">Cryosupernate</option>
                <option value="Fresh Frozen Plasma">Fresh Frozen Plasma</option>
                <option value="Platelet Concentrate">Platelet Concentrate</option>
                <option value="Pack RBC">Pack RBC</option></select>
                </select>
                <input type="hidden" id="add-hic-id-no" name="hic_id_no">
                <input type="hidden" id="add-item-status" value="Available" name="item_status">
                <input type="hidden" id="add-hic-name" class="form-control company-name" name="company_name" />
                <input type="hidden" id="add-hic-region" class="form-control hic-region" name="region" />
            <span id="add-item-name-text"></span>
        </div>
        <div class="col-md-3">
            <label>Category</label>
                <input class="form-control item-category" name="category" />
            <span id="add-category-text"></span>
        </div>
        <div class="col-md-3">
            <label>Stock Qty. / Bag</label>
                <input class="form-control stock-qty" name="qty_stock" />
            <span id="add-stock-qty-text"></span>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Unit Price / Bag</label>
                    <input type="text" class="form-control unit-price" name="unit_price" />
                <span id="add-unit-price-text"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Date of Purchase</label>
        </div>
    </div>

    <div class="row pur-date">
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Date of Expiry</label>
        </div>
    </div>

    <div class="row exp-date">
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
@include('reddrop_back.back_scripts.items.manage_items')

