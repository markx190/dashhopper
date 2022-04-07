<div class="modal" id="addPurchaseModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-plus-circle"></i> <span id="purchase-l"></span></p></b></div>
    <div class="row alert-p">
</div>
<form class="f-p">    
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-3">
            <label><b>Item Name</b></label>
                <h6 id="p-item-name" class="purchase"></h6>
                    <input id="p-hic-id-no" type="hidden" name="hic_id_no" />
                    <input id="p-item-id-no" type="hidden" name="item_id_no" />
                    <input class="p-item-name" type="hidden" name="item_name" />
                <input class="p-item-status" type="hidden" value="Unpaid" name="pur_status" />
            <input class="p-buying-id-no" type="hidden" name="buying_id_no" />
        <input class="p-buying-company" type="hidden" name="buying_company" />
    <span id="p-item-name-text"></span>
</div>
<div class="col-md-3">
    <label><b>Category</b></label>
        <h6 id="p-item-category" class="purchase"></h6>
        <input class="form-control p-item-category" type="hidden" name="category" />
    <span id="p-category-text"></span>
</div>
<div class="col-md-3">
    <label><b>Company Name</b></label>
        <h6 id="p-company-name" class="purchase"></h6>
        <input class="form-control p-company-name" type="hidden" name="company_name" />
    <span id="p-comapany-name-text"></span>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label><b>Region</b></label>
            <h6 id="p-item-region" class="purchase"></h6>
                <input class="form-control p-item-region" type="hidden" name="region" />
            <span id="p-item-region-text"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label><b>Unit Price / Bag</b></label>
            <h6 id="p-item-unit-price" class="purchase"></h6>
        <input class="form-control p-item-unit-price" type="hidden" name="unit_price" />
    <span id="p-unit-price-text"></span>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label><b>Quantity</b></label>
            <input id="p-item-quantity" class="form-control p-quantity purchase" value="1" type="number" name="quantity" />
        <span id="p-quantity-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label><b>Amount</b></label>
            <input id="p-item-amount" class="form-control p-item-amount purchase" type="text" name="total_amount" readonly />
            <span id="p-amount-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row p-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('reddrop_back.back_scripts.Purchasings.purchasings')

