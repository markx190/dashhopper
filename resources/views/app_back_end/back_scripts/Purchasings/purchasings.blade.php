<script>
    
    function viewPurchasings(event){
        event.preventDefault();
        $.ajax({
            url: '{{ url("/purchasings-table") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicPurchasingsDataTable, 1000);
            }
        });
    }

    function searchItems(event){
        event.preventDefault();
        loadHicPurchasingsDataTable();
    }

    function loadHicPurchasingsDataTable(){
        $('.spinner-red-docs').hide();
        $('.docs-body').show();
        $('#hic-purchasings-datatable').DataTable().destroy();
        table = $('#hic-purchasings-datatable').DataTable({
            "searching": false,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': "{{ url('/purchasings-datatables') }}",
                "data"  : {
                    "hicItemName": $('.select-item').val(),
                    "hicRegion": $('.select-region').val(),
                    "_token"	: "{{ csrf_token() }}"
	    		}
            },
            columnDefs: [
                { width: 1, targets: 5, orderable: false },
                { className: 'dt-body-center', targets: 5 },
                { className: 'dt-body-center', targets: 4 },
                { className: 'dt-body-right', targets: 3 },
                { width: 120, targets: 1 },
                { width: 100, targets: 2 },
                { width: 80, targets: 3 },
                { width: 40, targets: 4 },
                { width: 100, targets: 0 }
            ],
            columns:[
            {
                data: 'item_name',
                name: 'item_name'
            },
            {
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'region',
                name: 'region'
            },
            {
                data: 'unit_price',
                name: 'unit_price'
            },
            
            {
                data: 'item_status',
                name: 'item_status'
            },
            {
                data: 'action',
                name: 'action'
            },
            
            ]
        });
        
    }

    function addPurchase(pItemId, AddPurchase, button){
        $('#addPurchaseModal').modal('show');

        $('#purchase-l').text('Purchase Blood Group');
        $('.f-p').attr('id', 'add-purchase-form');
        $('.p-btn').html('<button id="add-purchase-btn" type="button" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>');
        
        $('#p-hic-id-no').attr('value', button.getAttribute('data-hic-id-no'));
        $('#p-item-id-no').attr('value', button.getAttribute('data-item-id-no'));
        $('.p-item-name').attr('value', button.getAttribute('data-item-name'));
        $('.p-item-category').attr('value', button.getAttribute('data-item-category'));             
        $('.p-company-name').attr('value', button.getAttribute('data-item-company-name'));
        $('.p-buying-company').attr('value', button.getAttribute('data-buying-company'));
        $('.p-buying-id-no').attr('value', button.getAttribute('data-buying-id-no'));

        $('.p-item-region').attr('value', button.getAttribute('data-item-region'));
        $('.p-item-unit-price').attr('value', button.getAttribute('data-item-unit-price'));             

        document.querySelector("#p-item-name").innerText = button.getAttribute("data-item-name");
        document.querySelector("#p-item-category").innerText = button.getAttribute("data-item-category");
        document.querySelector("#p-company-name").innerText = button.getAttribute("data-item-company-name");
        document.querySelector("#p-item-region").innerText = button.getAttribute("data-item-region");
        document.querySelector("#p-item-unit-price").innerText = button.getAttribute("data-item-unit-price");
        
        // if (itemQty === 1){
        // $('#p-item-amount').attr('value', button.getAttribute('data-item-unit-price'));
        // }

        $('#p-item-quantity').on('keyup', function(){
            var itemVal = button.getAttribute('data-item-unit-price') * this.value;
            $('#p-item-amount').attr('value', itemVal);
        });

        $('#add-purchase-btn').on('click', function(){
            $('#add-purchase-btn').attr('disabled', true);
            
            const pHicIdNo = $('#add-purchase-form input[name="hic_id_no"]');
            const p_hic_id_no = pHicIdNo.val();

            const pItemIdNo = $('#add-purchase-form input[name="item_id_no"]');
            const p_item_id_no = pItemIdNo.val();

            const pItemName = $('#add-purchase-form input[name="item_name"]');
            const p_item_name = pItemName.val();

            const pItemCategory = $('#add-purchase-form input[name="category"]');
            const p_item_category = pItemCategory.val();

            const pCompanyName = $('#add-purchase-form input[name="company_name"]');
            const p_company_name = pCompanyName.val();

            const pBuyingCompany = $('#add-purchase-form input[name="buying_company"]');
            const p_buying_company = pBuyingCompany.val();

            const pBuyingIdNo = $('#add-purchase-form input[name="buying_id_no"]');
            const p_buying_id_no = pBuyingIdNo.val();

            const pItemRegion = $('#add-purchase-form input[name="region"]');
            const p_item_region = pItemRegion.val();

            const pUnitPrice = $('#add-purchase-form input[name="unit_price"]');
            const p_unit_price = pUnitPrice.val();

            const itemQty = $('#p-item-quantity').val();
        
            if (itemQty === '1'){
                var p_total_amount = button.getAttribute('data-item-unit-price');
        
            } else {

            const pTotalAmount = $('#add-purchase-form input[name="total_amount"]');
            var p_total_amount = pTotalAmount.val();
            
            }

            // const pTotalAmount = $('#add-purchase-form input[name="total_amount"]');
            // const p_total_amount = pTotalAmount.val();

            const pQuantity = $('#add-purchase-form input[name="quantity"]');
            const p_item_quantity = pQuantity.val();

            const pItemStatus = $('#add-purchase-form input[name="pur_status"]');
            const p_item_status = pItemStatus.val();

            if (!p_item_quantity){
                $('#p-quantity-text').text('Quantity is required').css('color', '#D24D57');
                $('#add-purchase-btn').attr('disabled', true);
            } else {
                var add_p_quantity = p_item_quantity;
            }

            $('#p-item-quantity').bind('click', function(){
                $('#p-quantity-text').text('');    
                $('#add-purchase-btn').attr('disabled', false);
            });

            if(add_p_quantity){
                savePurchase();
            }

            function savePurchase(){
            $.ajax({
            url: '{{ url("/add-purchase") }}',
            method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
            },
            p_hic_id_no,
            p_item_id_no,
            p_item_name,
            p_item_category,
            p_company_name,
            p_buying_company,
            p_buying_id_no,
            p_item_quantity,
            p_item_region,
            p_unit_price,
            p_total_amount,
            p_item_status,
            },
            cache: false,
            dataType: 'JSON',
                success:function(response){
                const itemName = response;
                $('.alert-p').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> You have purchased '+ itemName +'</div></div></div>'); 
                setTimeout(goToListOfPurchasings, 2000);
                
            }
        });

        }
            
        });
        
    }
    
//    function goToListOfPurchasings(){
//         $('#addPurchaseModal').modal('hide');
//         $.ajax({
//             url: '{{ url("/purchasings-table") }}',
//             method: 'GET',
//             cache: false,
//             success: function(html){
//                 $('.main-d').html(html);
//                 $('.docs-body').hide();
//                 $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
//                 setTimeout(loadHicPurchasingsDataTable, 1000);
//             }
//         });
//     }
 
    function inputAmount(){
    $('.unit-price').inputmaskNew("currency", {
        'placeholder': "",
        'prefix': '',
        'digitsOptional': !0,
        'greedy': !1,
        'radixPoint': ".",
        'radixFocus': !0,
        'decimalProtect': !0,
        'autoGroup': !0,
        'rightAlign': false,
        'allowMinus': false,
        'allowPlus': false,
        'max': 999999999999.99
        });
    }

    function pricePerQuantity(){
    $('#p-item-amount').inputmaskNew("currency", {
        'placeholder': "",
        'prefix': '',
        'digitsOptional': !0,
        'greedy': !1,
        'radixPoint': ".",
        'radixFocus': !0,
        'decimalProtect': !0,
        'autoGroup': !0,
        'rightAlign': false,
        'allowMinus': false,
        'allowPlus': false,
        'max': 999999999999.99
        });
    }

</script>
