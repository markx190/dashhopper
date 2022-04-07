<div class="modal" id="addItemsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-flask"></i> <span id="items-l"></span></p></b></div>
    <div class="row alert-m">
</div>
<form class="f-a" enctype="multipart/form-data" method="post">    
{{ csrf_field() }}
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-3">
            <label>Item Name</label>
            <input class="form-control item-name"/>
            <span id="add-item-name-text"></span>
        </div>
        <div class="col-md-3">
            <label>Category</label>
            <input class="form-control item-category"/>
        </div>
        <div class="col-md-3">
            <label>Stock Qty.</label>
            <input class="form-control stock-qty"/>
        </div>
        <div class="col-md-3">
            <label>Unit Price</label>
            <input class="form-control unit-price"/>
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

