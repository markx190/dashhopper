<script>
    
    function listOfItems(event){
        event.preventDefault();
        $.ajax({
            url: '{{ url("/list-of-items") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicItemsDataTable, 1000);
            }
        });
    }

    function loadHicItemsDataTable(){
        $('.spinner-red-docs').hide();
        $('.docs-body').show();
        $('#hic-items-datatable').DataTable().destroy();
        table = $('#hic-items-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': "{{ url('/items-datatables') }}",
            },
            columnDefs: [
                { width: 30, targets: 4 },
                { width: 8, targets: 1 },
                { width: 6, targets: 2 },
                { width: 10, targets: 3 },
                // { width: 5, targets: 2, orderable: false }
            ],
            columns:[
            {
                data: 'item_name',
                name: 'item_name'
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'qty_stock',
                name: 'qty_stock'
            },
            {
                data: 'unit_price',
                name: 'unit_price'
            },
            {
                data: 'action',
                name: 'action'
            },
            
            ]
        });
    }

    function addItems(hicIdNo, itemsBtn, button){
        $('#addItemsModal').modal('show');
        
        if (itemsBtn == 'addItems'){
            $('#items-l').text('Add Items');
            $('.f-a').attr('id', 'add-items-form');
            $('.s-btn').html('<button id="add-items-btn" type="button" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>');

            // $('.item-name').html('<input id="add-item-name" type="text" class="form-control" name="item_name" /><input type="hidden" id="add-hic-id-no" name="hic_id_no">');
            $('.item-category').html('<input id="add-category" type="text" class="form-control" name="category"></input>');            
            $('.stock-qty').html('<input id="add-stock-qty" type="text" class="form-control" name="qty_stock"></input>');            
            $('.unit-price').html('<input id="add-unit-price" type="text" class="form-control add-unit-price" name="unit_price"></input>');            
            
            $('.pur-date').html('<div class="col-md-3"><label>Month</label><select id="a-pur-month" class="form-control a-pur-month" name="purchase_month"><option></option><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select><span id="add-pur-month-text"></span></div><div class="col-md-3"><label>Day</label><input type="number" class="form-control a-pur-day" name="purchase_day" /><span id="add-pur-day-text"></span></div><div class="col-md-3"><label>Year</label><select id="a-pur-year" class="form-control"><option></option><option value="">2016</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option></select><span id="add-pur-year-text"></span></div><div class="col-md-3 pur-from-props"><label>Purchased From</label><input class="form-control a-pur-from" type="text" name="purchase_from" /><span id="add-pur-from-text"></span></div>');
            $('.exp-date').html('<div class="col-md-3"><label>Month</label><select id="a-exp-month" class="form-control a-exp-month" name="exp_month"><option></option><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select><span id="add-exp-month-text"></span></div><div class="col-md-3"><label>Day</label><input type="number" class="form-control a-exp-day" name="exp_day" /><span id="add-exp-day-text"></span></div><div class="col-md-3"><label>Year</label><select id="a-exp-year" class="form-control"><option></option><option value="2018">2018</option><option value="2019">2019</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option></select><span id="add-exp-year-text"></span></div>');
            
            $('#add-hic-id-no').attr('value', button.getAttribute('data-hic-id-no'));
            $('#add-hic-name').attr('value', button.getAttribute('data-hic-name'));
            $('#add-hic-region').attr('value', button.getAttribute('data-hic-region'));

            $('.unit-price').bind('click', function(){
                inputAmount();
            });

        $('#add-items-btn').on('click', function(){

            $('#add-items-btn').attr('disabled', true);

            const addhicIdNo = $('#add-items-form input[name="hic_id_no"]');
            const add_hic_id_no = addhicIdNo.val();

            const addCompanyName = $('#add-items-form input[name="company_name"]');
            const add_company_name = addCompanyName.val();

            const addRegion = $('#add-items-form input[name="region"]');
            const add_region = addRegion.val();

            // const addItemName = $('#add-items-form input[name="item_name"]');
            // const add_item_name = addItemName.val();

            const add_item_name = $('.a-item-name').val();

            const addItemCategory = $('#add-items-form input[name="category"]');
            const add_item_category = addItemCategory.val();

            const addStockQty = $('#add-items-form input[name="qty_stock"]');
            const add_qty_stock = addStockQty.val();

            const addUnitPrice = $('#add-items-form input[name="unit_price"]');
            const add_unit_price = addUnitPrice.val();

            const addItemStatus = $('#add-items-form input[name="item_status"]');
            const add_item_status = addItemStatus.val();

            const add_pur_month = $('.a-pur-month').val();

            const addPurDay = $('#add-items-form input[name="purchase_day"]');
            const add_pur_day = addPurDay.val();
            var purDayLength = $(".a-pur-day").val().length;

            const add_pur_year = $('#a-pur-year').val();
             
            const addPurFrom = $('#add-items-form input[name="purchase_from"]');
            const add_pur_from = addPurFrom.val();

            const add_exp_month = $('.a-exp-month').val();
            
            const addExpDay = $('#add-items-form input[name="exp_day"]');
            const add_exp_day = addExpDay.val();

            const add_exp_year = $('#a-exp-year').val();

        if (!add_item_name){
            $('#add-item-name-text').text('Item name is required').css('color', '#D24D57');
            $('#add-items-btn').attr('disabled', true);
        } else {
            var a_item_name = add_item_name;
        }

        $('.a-item-name').bind('click', function(){
            $('#add-item-name-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_item_category){
            $('#add-category-text').text('Category is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else {
            var a_item_category = add_item_category;
        }

        $('.item-category').bind('click', function(){
            $('#add-category-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_qty_stock){
            $('#add-stock-qty-text').text('Stock qty. is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else {
            var a_qty_stock = add_qty_stock;
        }

        $('.stock-qty').bind('click', function(){
            $('#add-stock-qty-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_unit_price){
            $('#add-unit-price-text').text('Unit price is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else {
            var a_unit_price = add_unit_price;
        }

        $('.unit-price').bind('click', function(){
            $('#add-unit-price-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_pur_month){
            $('#add-pur-month-text').text('Month is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else {
            var a_pur_month = add_pur_month;
        }

        $('.a-pur-month').bind('click', function(){
            $('#add-pur-month-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_pur_day){
            $('#add-pur-day-text').text('Day is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else if (purDayLength > 3){
            $('#add-pur-day-text').text('Day is required').css('color', '#D24D57');                  
        } else {
            var a_pur_day = add_pur_day;
        }

        $('.a-pur-day').bind('click', function(){
            $('#add-pur-day-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_pur_year){
            $('#add-pur-year-text').text('Day is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);

        } else {
            var a_pur_year = add_pur_year;
        }

        $('#a-pur-year').bind('click', function(){
            $('#add-pur-year-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_pur_from){
            $('#add-pur-from-text').text('This is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else {
            var a_pur_from = add_pur_from;
        }

        $('.a-pur-from').bind('click', function(){
            $('#add-pur-from-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_exp_month){
            $('#add-exp-month-text').text('Month is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        } else {
            var a_exp_month = add_exp_month;
        }

        $('.a-exp-month').bind('click', function(){
            $('#add-exp-month-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_exp_day){
            $('#add-exp-day-text').text('Day is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);

        } else {
            var a_exp_day = add_exp_day;
        }

        $('.a-exp-day').bind('click', function(){
            $('#add-exp-day-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (!add_exp_year){
            $('#add-exp-year-text').text('Year is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);

        } else {
            var a_exp_year = add_exp_year;
        }

        $('#a-exp-year').bind('click', function(){
            $('#add-exp-year-text').text('');
            $('#add-items-btn').attr('disabled', false);
        });

        if (a_item_name && a_item_category && a_qty_stock && a_unit_price) {
            saveItems();
        }
         
        function saveItems(){
            $.ajax({
                url: "{{ url('/add-items') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                add_hic_id_no,
                add_company_name,
                add_item_name,
                add_region,
                add_item_category,
                add_qty_stock,
                add_unit_price,
                add_item_status,
                add_pur_month,
                add_pur_day,
                add_pur_year,
                add_pur_from,
                add_exp_month,
                add_exp_day,
                add_exp_year

                },
                cache: false,
                success:function(html){
            
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An Item was added.</div></div></div>'); 
                setTimeout(goTolistOfItems, 3000);
                
            }
        });
        }

        });
        
        }    
    }

    function editItems(itemId, itemsBtn, button){
        $('#editItemsModal').modal('show');
        
        if(itemsBtn !== 'AddItems'){
            
            $('.f-e').attr('id', 'edit-items-form');
            $('.edit-btn').html('<button id="edit-items-btn" type="button" name="Edit" class="btn btn-success btn-sm pull-right s-btn">Save</button>');
            
            $('.e-item-id-no').attr('value', button.getAttribute('data-item-id-no')); 
            $('.e-item-id').attr('value', button.getAttribute('data-item-id'));         
            $('#input-item-name').attr('value', button.getAttribute('data-item-name'));
            $('.e-item-category').attr('value', button.getAttribute('data-item-category'));
            $('.e-item-qty-stock').attr('value', button.getAttribute('data-item-qty-stock'));             
            $('.e-item-unit-price').attr('value', button.getAttribute('data-item-unit-price')); 
            
            const itemName = button.getAttribute('data-item-name');
            const purMonth = button.getAttribute('data-pur-month');
            const purDay = button.getAttribute('data-pur-day');
            const purYear = button.getAttribute('data-pur-year');
            const purFrom = button.getAttribute('data-pur-from');
            const expMonth = button.getAttribute('data-exp-month');
            const expDay = button.getAttribute('data-exp-day');
            const expYear = button.getAttribute('data-exp-year');
        
            $('#a-pur-day').attr('value', button.getAttribute('data-pur-day'));             
            
            $('.e-item-name').html('<select id="a-item-name" class="form-control edit-item-name" name="item_name"><option value="'+ itemName +'">'+ itemName +'</option><option></option><option value="A">A</option><option value="B">B</option><option value="AB">AB</option><option value="AB+">AB+</option><option value="O">0</option><option value="O+">O+</option><option value="Platelet">Platelet</option><option value="Cryoprecipitate">Cryoprecipitate</option><option value="Cryosupernate">Cryosupernate</option><option value="Fresh Frozen Plasma">Fresh Frozen Plasma</option><option value="Platelet Concentrate">Platelet Concentrate</option><option value="Pack RBC">Pack RBC</option></select>')
            $('.e-pur-date').html('<div class="col-md-3"><label>Month</label><select id="e-pur-month" class="form-control e-pur-month" name="purchase_month"><option value="'+ purMonth +'">'+ purMonth +'</option><option></option><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select><span id="edit-pur-month-text"></span></div><div class="col-md-3"><label>Day</label><input id="a-pur-day" type="number" class="form-control a-pur-day" value="'+ purDay +'" name="purchase_day" /><span id="edit-pur-day-text"></span></div><div class="col-md-3"><label>Year</label><select id="e-pur-year" class="form-control e-pur-year"><option value="'+ purYear +'">'+ purYear +'</option><option></option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option></select><span id="edit-pur-year-text"></span></div><div class="col-md-3 pur-from-props"><label>Purchased From</label><input class="form-control a-pur-from" type="text" value="'+ purFrom +'" name="purchased_from" /><span id="add-pur-from-text"></span></div>');
            $('.e-exp-date').html('<div class="col-md-3"><label>Month</label><select id="e-exp-month" class="form-control e-exp-month" name="exp_month"><option value="'+ expMonth + '">'+ expMonth +'</option><option></option><option value="January">January</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select><span id="edit-exp-month-text"></span></div><div class="col-md-3"><label>Day</label><input type="number" class="form-control a-exp-day" value="'+ expDay + '" name="exp_day" /><span id="edit-exp-day-text"></span></div><div class="col-md-3"><label>Year</label><select id="e-exp-year" class="form-control e-exp-year"><option value="'+ expYear +'">'+ expYear + '</option><option></option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option></select><span id="edit-exp-year-text"></span></div>');

            $('#edit-items-btn').on('click', function(){

            $('#edit-items-btn').attr('disabled', true);
            const eItemId = $('#edit-items-form input[name="id"]');
            const edit_item_id = eItemId.val();

            const eItemIdNo = $('#edit-items-form input[name="item_id_no"]');
            const edit_item_id_no = eItemIdNo.val();
    
            // const eItemName = $('#edit-items-form input[name="item_name"]');
            // const edit_item_name = eItemName.val();

            const edit_item_name = $('.e-item-name').val();

            const eItemCategory = $('#edit-items-form input[name="category"]');
            const edit_item_category = eItemCategory.val();

            const eQtyStock = $('#edit-items-form input[name="qty_stock"]');
            const edit_qty_stock = eQtyStock.val();

            const eUnitPrice = $('#edit-items-form input[name="unit_price"]');
            const edit_unit_price = eUnitPrice.val();  

            const edit_pur_month = $('.e-pur-month').val(); 

            const ePurDay = $('#edit-items-form input[name="purchase_day"]');
            const edit_pur_day = ePurDay.val(); 

            const edit_pur_year = $('.e-pur-year').val();
            
            const ePurFrom = $('#edit-items-form input[name="purchased_from"]');
            const edit_pur_from = ePurFrom.val();

            const edit_exp_month = $('.e-exp-month').val();

            const eExpDay = $('#edit-items-form input[name="exp_day"]');
            const edit_exp_day = eExpDay.val(); 
            
            const edit_exp_year = $('.e-exp-year').val();

            if (!edit_item_name){
                $('#edit-item-name-text').text('Item name is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_item_name = edit_item_name;
            }
                $('.e-item-name').bind('click', function(){
                $('#edit-item-name-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_item_category){
                $('#edit-category-text').text('Category is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_item_category = edit_item_category;
            }
                $('.e-item-category').bind('click', function(){
                $('#edit-category-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_qty_stock){
                $('#edit-qty-stock-text').text('Stock is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_qty_stock = edit_qty_stock;
            }
                $('.e-qty-stock').bind('click', function(){
                $('#edit-qty-stock-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_unit_price){
                $('#edit-unit-price-text').text('Unit Price is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_unit_price = edit_unit_price;
            }
                $('.e-unit-price').bind('click', function(){
                $('#edit-unit-price-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_exp_month){
                $('#edit-exp-month-text').text('Month is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_exp_month = edit_exp_month;
            }
                $('.e-exp-month').bind('click', function(){
                $('#edit-exp-month-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_exp_month){
                $('#edit-exp-month-text').text('Month is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_exp_month = edit_exp_month;
            }
                $('.e-exp-month').bind('click', function(){
                $('#edit-exp-month-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_exp_day){
                $('#edit-exp-day-text').text('Day is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_exp_day = edit_exp_day;
            }
                $('.e-exp-day').bind('click', function(){
                $('#edit-exp-day-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (!edit_exp_year){
                $('#edit-exp-year-text').text('Year is required').css('color', '#D24D57');
                $('#edit-items-btn').attr('disabled', true);
            } else {
                var e_exp_year = edit_exp_year;
            }
                $('.e-exp-year').bind('click', function(){
                $('#edit-exp-year-text').text('');
                $('#edit-items-btn').attr('disabled', false);
            });

            if (e_item_name && e_item_category && e_qty_stock && e_unit_price) {
                saveUpdatedItems();
            }

            function saveUpdatedItems(){

            $.ajax({
                url: "{{ url('/edit-items') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                edit_item_id_no,
                edit_item_id,
                edit_item_name,
                edit_item_category,
                edit_qty_stock,
                edit_unit_price,
                edit_pur_month,
                edit_pur_day,
                edit_pur_year,
                edit_pur_from,
                edit_exp_month,
                edit_exp_day,
                edit_exp_year

                },
                cache: false,
                success:function(html){
            
                $('.e-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An Item was updated.</div></div></div>'); 
                setTimeout(goTolistOfItems, 3000);
                
            }
        });

                }
            });
        }
    }

    function deleteItems(itemId, itemsBtn, button){
        $('#deleteItemsModal').modal('show');
        
        if(itemsBtn !== 'EditItems'){
            $('.f-d').attr('id', 'delete-items-form');
            $('.delete-btn').html('<button id="delete-items-btn" type="button" name="Delete" class="btn btn-success btn-sm pull-right s-btn">Delete</button>');
            
            $('.d-item-id').attr('value', button.getAttribute('data-item-id')); 
            document.querySelector("#d-item-name").innerText = button.getAttribute("data-item-name");
            
            $('#delete-items-btn').on('click', function(){
            $('#delete-items-btn').attr('disabled', true);
               
            const dItemId = $('#delete-items-form input[name="id"]');
            const delete_item_id = dItemId.val();

            if (delete_item_id) {
                saveDeletedItems();
            }

            function saveDeletedItems(){
            $.ajax({
                url: "{{ url('/delete-items') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                delete_item_id,
                },
                cache: false,
                success:function(html){
                $('.d-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An Item was deleted.</div></div></div>'); 
                setTimeout(goTolistOfItems, 3000);
                
            }
        });

                }
            });
        }
    }

    function goTolistOfItems(){
        $('#addItemsModal').modal('hide');
        $('#editItemsModal').modal('hide');
        $('#deleteItemsModal').modal('hide');
        $.ajax({
            url: '{{ url("/list-of-items") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicItemsDataTable, 1000);
            }

        });
    }

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

    function formatFarePerSeat(){
    $('#fare-per-seat').inputmaskNew("currency", {
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
