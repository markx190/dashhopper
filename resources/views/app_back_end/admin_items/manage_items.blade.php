<main class="hic-documents">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active">Stock Monitoring</li>
        </ol>
<div class="row profile-img">
    
</div>
<div class="row add-docs-btn">  
    <div class="col-md-3">
        <label>
            <button type="button" class="btn btn-success btn-sm"
            data-hic-id-no="{{ Auth::user()->hic_id_no }}"
            data-hic-name="{{ Auth::user()->hic_name }}"
            data-hic-region="{{ Auth::user()->region }}"
            onclick="addItems('{{ Auth::user()->hic_id_no }}', 'addItems', this)"
            >
            <i class="fa fa-plus-circle"></i> Add Item</button>
        </label>
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-table mr-1"></i>
        List of Items
            </div>
                <div class="row docs-spinner">
                    </div> 
                        <div class="card-body docs-body">
                        <div class="table-responsive">
                            <table id="hic-items-datatable" class="table-docs table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Stock/Bag</th>
                                    <th>Unit Price/Bag</th>
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
@include('reddrop_back.modals.items.add_items')
@include('reddrop_back.modals.items.edit_items')
@include('reddrop_back.modals.items.delete_items')







