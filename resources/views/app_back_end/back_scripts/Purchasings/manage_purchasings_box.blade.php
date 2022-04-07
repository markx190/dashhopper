<script>

    function viewOrders(buyingIdNo){ 
        alert('view-list');
        $.ajax({
        url: '{{ url("/purchasings-by-company") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.box-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadHicOrdersDataTable, 1000);            
            }
        });
    }

    function searchPurchasedItems(event){
        event.preventDefault();
        loadHicOrdersDataTable();
    }

    function loadHicOrdersDataTable(buyingIdNo){
        $('.spinner-red-docs').hide();
        $('.docs-body').show();
        $('#hic-orders-datatable').DataTable().destroy();
        table = $('#hic-orders-datatable').DataTable({
            "searching": false,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': "{{ url('/purchase-datatables-by-company') }}/" + buyingIdNo,
                "data"  : {
                    "hicItemName": $('.select-item').val(),
                    "hicRegion": $('.select-region').val(),
                    "_token"	: "{{ csrf_token() }}"
	    		}
            },
            columnDefs: [
                { width: 100, targets: 6, orderable: false },
                { width: 130, targets: 0 },
                { width: 120, targets: 1 },
                { width: 60, targets: 2 },
                { width: 5, targets: 3 },
                { width: 1, targets: 4 },
                { width: 1, targets: 5 },
                { className: 'dt-body-right', targets: 2 },
                { className: 'dt-body-center', targets: 3 },
                { className: 'dt-body-right', targets: 4 },
                { className: 'dt-body-center', targets: 5 }
            ],
            columns:[
            {
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'item_name',
                name: 'item_name'
            },
            {
                data: 'unit_price',
                name: 'unit_price'
            },
            {
                data: 'quantity',
                name: 'quantity'
            },
            {
                data: 'total_amount',
                name: 'total_amount'
            },
            {
                data: 'pur_status',
                name: 'pur_status'
            },
            {
                data: 'action',
                name: 'action'
            },
            
            ]
        });   
    }

    function editPurchase(pId, editPurBtn, button){
        $('#editPurchaseModal').modal('show');

        $('#e-purchase-l').text('Edit Purchase');
        $('.edit-p').attr('id', 'edit-purchase-form');
        $('.edit-p-btn').html('<button id="edit-purchase-btn" type="button" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>');
        
        $('.edit-p-id').attr('value', button.getAttribute('data-pur-id'));
        $('.edit-p-quantity').attr('value', button.getAttribute('data-item-quantity'));

        document.querySelector("#edit-p-item-name").innerText = button.getAttribute("data-item-name");
        document.querySelector("#edit-p-category").innerText = button.getAttribute("data-item-category");
        document.querySelector("#edit-p-company-name").innerText = button.getAttribute("data-item-company-name");
        document.querySelector("#edit-p-region").innerText = button.getAttribute("data-item-region");
        document.querySelector("#edit-p-unit-price").innerText = button.getAttribute("data-item-unit-price");
        
        $('#edit-p-quantity').on('keyup', function(){
            var editAmountVal = button.getAttribute('data-item-unit-price') * this.value;
            $('#edit-p-item-amount').attr('value', editAmountVal);
        });

        $('#edit-purchase-btn').on('click', function(){
            $('#edit-purchase-btn').attr('disabled', true);
            
            const ePurItemId = $('#edit-purchase-form input[name="id"]');
            const e_pur_item_id = ePurItemId.val();

            const pPurQuantity = $('#edit-purchase-form input[name="quantity"]');
            const e_pur_qty = pPurQuantity.val();

            const itemQty = $('.edit-p-quantity').val();
        
            if (itemQty === '1'){
                var e_pur_total_amount = button.getAttribute('data-item-unit-price');
        
            } else {
                const ePurTotalAmount = $('#edit-purchase-form input[name="total_amount"]');
                var e_pur_total_amount = ePurTotalAmount.val();
            }

            if (!e_pur_qty){
                $('#edit-quantity-text').text('Quantity is required').css('color', '#D24D57');
                $('#edit-purchase-btn').attr('disabled', true);
            } else {
                var edit_quantity = e_pur_qty;
            }

            $('#edit-p-quantity').bind('click', function(){
                $('#edit-quantity-text').text('');    
                $('#edit-purchase-btn').attr('disabled', false);
            });

            if(e_pur_qty){
                saveUpdatedPurchase();
            }

            function saveUpdatedPurchase(){
            $.ajax({
            url: '{{ url("/edit-purchase") }}',
            method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
            },
            e_pur_item_id,
            e_pur_qty,
            e_pur_total_amount
            },
            cache: false,
            dataType: 'JSON',
                success:function(response){
                const itemName = response;
                $('.edit-alert-p').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> You have change quantity of '+ itemName +'</div></div></div>'); 
                setTimeout(viewListOfPurchase, 2000);
                
                }
            });
            } 
        });
    }
    
    // function deletePurchase(pId, deleteBtn, button){
    //     $('#deletePurchaseModal').modal('show');
       
    // }
    

    // function viewListOfPurchase(buyingIdNo){ 
    //     $('#editPurchaseModal').modal('hide');
    //     $.ajax({
    //     url: '{{ url("/purchasings-by-company") }}',
    //     method: 'GET',
    //     cache: false,
    //     success: function(html){
    //         $('.main-d').html(html);
    //         $('.docs-body').hide();
    //         $('.box-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
    //         setTimeout(loadHicOrdersDataTable, 1000);            
    //         }
    //     });
    // }

</script>    
