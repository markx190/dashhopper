<script type="text/javascript">
    
    function viewListOfBusUnits(event){
        $.ajax({
            url: '{{ url("/manage_bus_units") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadBusUnitsDataTable, 1000);
            }
        });   
    }
    
    var busTypeVal = '';
    function filterBusUnits(event){
        event.preventDefault();

        busTypeVal = $('.bus-type').val();
        $('#btnSearchBus').attr('disabled', true);

        if (!busTypeVal){
            $('#bus-type-text').text('Please fill this field').css('color', '#CF000F');
        }

        $('.bus-type').bind('click', function(){
            $('#bus-type-text').text('');
            $('#btnSearchBus').attr('disabled', false);
        });

        loadBusUnitsDataTable(busTypeVal);
    }

    function loadBusUnitsDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#bus-units-datatable').DataTable().destroy();
        table = $('#bus-units-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                'url': "{{ url('/bus_units_datatables') }}",
                "data"  : {
                    "busTypeVal": busTypeVal,
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 40, targets: 0, orderable: true },
                { width: 40, targets: 1, orderable: true },
                { width: 100, targets: 2, orderable: true },
                { width: 40, targets: 3, orderable: false },
                { width: 120, targets: 4, orderable: false },
                { className: 'dt-body-center', targets: 3 },
                { className: 'dt-body-center', targets: 4 }

            ],
            columns:[
            {
                data: 'bus_number',
                name: 'bus_number'
            },
            {
                data: 'bus_type',
                name: 'bus_type'
            },
            {
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'no_of_seats',
                name: 'no_of_seats'
            },
            {
                data: 'action',
                name: 'action'
            },
        ]
    });
}

function showAddBusUnitsModal(button){
    $('#addBusUnitsModal').modal('show');  
    $('.add-bus-pad').hide();      
    $('#add-bus-btn').attr('disabled', true); 
        $('.a-bus-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.add-bus-pad').show();
        $('#add-bus-btn').attr('disabled', false);
    }  

    $('.add-bus-btn').html('<button id="add-bus-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn"><i class="fa fa-save"></i> Submit</button>')
    $('.add-bus-units-form').on('submit', function(event){
        event.preventDefault();

        $('#add-bus-btn').attr('disabled', true);

        const checkWifi = $('#add-wifi:input:checkbox').is(':checked');
        var withWifi = '';
        if (checkWifi == true){
            var inputWifi = $('#add-wifi:input[name="with_wifi"]');
            withWifi = inputWifi.val();
        }

        const checkCr = $('#add-cr:input:checkbox').is(':checked');
        console.log('check cr: ', checkCr);
        var withCr = '';
        if (checkCr == true){
            const inputCr = $('#add-cr:input[name="with_cr"]');
            withCr = inputCr.val();
        }

        const companyName = $('.add-bus-units-form input[name="company_name"]');
        const company_name = companyName.val();

        const busNumber = $('.add-bus-units-form input[name="bus_number"]');
        const bus_number = busNumber.val();

        const noOfSeats = $('.add-bus-units-form input[name="no_of_seats"]');
        const no_of_seats = noOfSeats.val();

        const bus_type = $('.select-bus-type').val();

        const busAvatar = $('.add-bus-units-form input[name="bus_avatar"]');
        const bus_avatar = busAvatar.val();

        const createdBy = $('.add-bus-units-form input[name="created_by"]');
        const created_by = createdBy.val();

    if (!company_name){
        $('#a-company-name-text').text('Company Name is Required').css('color', '#D24D57');
        $('#add-bus-btn').attr('disabled', true);
    }

    $('#add-company-name').bind('click', function(){
        $('#a-company-name-text').text('');
        $('#add-bus-btn').attr('disabled', false);
    });

    if (!bus_number){
        $('#a-bus-number-text').text('Bus number is required').css('color', '#D24D57');
        $('#add-bus-btn').attr('disabled', true);
    }

    $('#add-bus-number').bind('click', function(){
        $('#a-bus-number-text').text('');
        $('#add-bus-btn').attr('disabled', false);
    });

    if (!no_of_seats){
        $('#a-no-of-seats-text').text('No. of seats is required').css('color', '#D24D57');
        $('#add-bus-btn').attr('disabled', true);
    }

    $('#add-no-of-seats').bind('click', function(){
        $('#a-no-of-seats-text').text('');
        $('#add-bus-btn').attr('disabled', false);
    });

    if (!bus_type){
        $('#a-bus-type-text').text('Bus type is required').css('color', '#D24D57');
        $('#add-bus-btn').attr('disabled', true);
    }

    $('#add-bus-type').bind('click', function(){
        $('#a-bus-type-text').text('');
        $('#add-bus-btn').attr('disabled', false);
    });

    if (!bus_avatar){
        $('#a-bus-avatar-text').text('Bus Avatar is required').css('color', '#D24D57');
        $('#add-bus-btn').attr('disabled', true);
    }

    $('#add-bus-avatar').bind('click', function(){
        $('#a-bus-avatar-text').text('');
        $('#add-bus-btn').attr('disabled', false);
    });
    
    if (company_name && bus_number && bus_type) {
        $.ajax({
            url: "{{ url('/add_bus_units') }}",
            method:"POST",
            data:new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                if (data.errorStatus == 0){
                    $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> New item was added successfully</div></div></div>'); 
                    setTimeout(goToListofBusUnits, 3000);
                } else {
                    $('#a-bus-avatar-text').text('There was a problem uploading your photo, Please check file size').css('color', '#D24D57');
                    }
                }
            });
        }
    });
}

function showAddTripsModal(button){
    $('#addTripsModal').modal('show');  
    $('.add-trip-pad').hide();      
    $('#add-trip-btn').attr('disabled', true); 
        $('.a-trip-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.add-trip-pad').show();
        $('#add-trip-btn').attr('disabled', false);
    }  

    $('#add-t-bus-id-no').attr('value', button.getAttribute('data-bus_id_no'));
    $('#add-t-bus-number').attr('value', button.getAttribute('data-bus_number')); 
    $('#add-t-no-of-seats').attr('value', button.getAttribute('data-no_of_seats'));
    $('#add-t-bus-type').attr('value', button.getAttribute('data-bus_type'));
    $('#add-t-bus-avatar').attr('value', button.getAttribute('data-bus_avatar'));

    var withTripWifi = button.getAttribute('data-with_wifi'); 
    var withTripCr = button.getAttribute('data-with_cr'); 

    if (withTripWifi == 'Yes'){
        $('.trip-wifi').html('<div class="col-md-3"><label>Wifi</label><input type="checkbox" class="form-control" value="Yes" name="with_wifi" checked><span id="t-wifi-text"></span></div>');
    } else {
        $('.trip-wifi').html('<div class="col-md-3"><label>Wifi</label><input type="checkbox" class="form-control" value="Yes" name="with_wifi"><span id="t-wifi-text"></span></div>');
    }

    if (withTripCr == 'Yes'){
        $('.trip-cr').html('<div class="col-md-6"><label>Comfort Room</label><input type="checkbox" class="form-control" value="Yes" name="with_cr" checked><span id="t-cr-text"></span></div>');
    } else {
        $('.trip-cr').html('<div class="col-md-6"><label>Comfort Room</label><input type="checkbox" class="form-control" value="Yes" name="with_cr"><span id="t-cr-text"></span></div>');
    }
    
    $('.add-trip-btn').html('<button id="add-trip-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>')
    $('.add-trips-form').on('submit', function(event){
        event.preventDefault();

        $('#add-trip-btn').attr('disabled', true);

        const tripBusIdNo = $('.add-trips-form input[name="bus_id_no"]');
        const trip_bus_id_no = tripBusIdNo.val();

        const tripCompanyName = $('.add-trips-form input[name="company_name"]');
        const trip_company_name = tripCompanyName.val();

        const tripBusNumber = $('.add-trips-form input[name="bus_number"]');
        const trip_bus_number = tripBusNumber.val();

        const tripNoOfSeats = $('.add-trips-form input[name="no_of_seats"]');
        const trip_no_of_seats = tripNoOfSeats.val();

        const tripBusType = $('.add-trips-form input[name="bus_type"]');
        const trip_bus_type = tripBusType.val();

        const tripBusAvatar = $('.add-trips-form input[name="bus_avatar"]');
        const trip_bus_avatar = tripBusAvatar.val();

        const tripFareAmount = $('.add-trips-form input[name="fare_amount"]');
        const trip_fare_amount = tripFareAmount.val();

        const tripOriginAddress = $('.add-trips-form input[name="origin_address"]');
        const trip_origin_address = tripOriginAddress.val();

        const tripDestinationAddress = $('.add-trips-form input[name="destination_address"]');
        const trip_destination_address = tripDestinationAddress.val();

        const tripDate = $('.add-trips-form input[name="travel_date"]');
        const trip_date = tripDate.val();

        const tripTime = $('.add-trips-form input[name="travel_time"]');
        const trip_time = tripTime.val();

        const trip_time_ap = $('.add-time-ap').val();

        const trip_drivers_name = $('.select-drivers-name').val();
        const trip_conductors_name = $('.select-conductors-name').val();

        if (!trip_fare_amount){
            $('#t-fare-amount-text').text('Fare Amount is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('#add-t-fare-amount').bind('click', function(){
            $('#t-fare-amount-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_origin_address){
            $('#t-origin-address-text').text('Origin Address is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('#add-t-origin-address').bind('click', function(){
            $('#t-origin-address-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_destination_address){
            $('#t-destination-address-text').text('Destination Address is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('#add-t-destination-address').bind('click', function(){
            $('#t-destination-address-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_date){
            $('#t-trip-date-text').text('Trip Date is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('#add-t-travel-date').bind('click', function(){
            $('#t-trip-date-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_time){
            $('#t-trip-time-text').text('Trip Time is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('#add-t-travel-time').bind('click', function(){
            $('#t-trip-time-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_time_ap){
            $('#t-time-ap-text').text('This field is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('#add-t-time-ap').bind('click', function(){
            $('#t-time-ap-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_drivers_name){
            $('#t-drivers-name-text').text('Driver Name is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('.select-drivers-name').bind('click', function(){
            $('#t-drivers-name-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (!trip_conductors_name){
            $('#t-conductors-name-text').text('Conductor Name is Required').css('color', '#D24D57');
            $('#add-trip-btn').attr('disabled', true);
        }

        $('.select-conductors-name').bind('click', function(){
            $('#t-conductors-name-text').text('');
            $('#add-trip-btn').attr('disabled', false);
        });

        if (trip_company_name) {
            $.ajax({
                url: "{{ url('/add_trips') }}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                dataType: 'JSON',
                processData: false,
                success:function(data){
                if (data.errorStatus == 0){
                    $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Trip schedule was successfully created</div></div></div>'); 
                    setTimeout(goToListofBusUnits, 3000);
                } else {
                    $('#t-fare-amount-text').text('There was a with Trip Creation').css('color', '#D24D57');
                    }
                }
            });
        }
    });
}

function goToListofBusUnits(event){
    $('#addBusUnitsModal').modal('hide');
    $('#addTripsModal').modal('hide');
    $.ajax({
        url: '{{ url("/manage_bus_units") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadBusUnitsDataTable, 1000);
        }
    });   
}

function showEditBusUnitsModal(button){
    $('#editBusUnitsModal').modal('show');  
    
    $('.edit-bus-pad').hide();      
    $('#edit-bus-btn').attr('disabled', true); 
        $('.e-bus-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.edit-bus-pad').show();
        $('#edit-bus-btn').attr('disabled', false);
    }

    $('#edit-bus-id').attr('value', button.getAttribute('data-hic_id'));
    $('#edit-company-name').attr('value', button.getAttribute('data-company_name'));
    $('#edit-bus-number').attr('value', button.getAttribute('data-bus_number'));   
    $('#edit-bus-type').html('<select class="form-control select-edit-bus-type" name="bus_type"><option>'+ button.getAttribute('data-bus_type') +'</option><option value="Ordinary">Ordinary</option><option value="Economy">Economy</option><option value="Semi Deluxe">Semi Deluxe</option><option value="Deluxe">Deluxe</option></select>'); 
    $('#edit-no-of-seats').attr('value', button.getAttribute('data-no_of_seats'));   
    var withWifiVal = button.getAttribute('data-with_wifi'); 
    var withCr = button.getAttribute('data-with_cr'); 

    var editBusAvatar = button.getAttribute('data-bus_avatar');
        $('#e-bus-avatar').attr('src', '/uploads/documents/'+ editBusAvatar +'');

    if (withWifiVal == 'Yes'){
        $('.edit-wifi').html('<div class="col-md-3"><label>Wifi</label><input type="checkbox" class="form-control" value="Yes" name="with_wifi" checked><span id="e-with-wifi-text"></span></div>');
    } else {
        $('.edit-wifi').html('<div class="col-md-3"><label>Wifi</label><input type="checkbox" class="form-control" value="Yes" name="with_wifi"><span id="e-with-wifi-text"></span></div>');
    }

    if (withCr == 'Yes'){
        $('.edit-cr').html('<div class="col-md-6"><label>Comfort Room</label><input type="checkbox" class="form-control" value="Yes" name="with_cr" checked><span id="e-with-cr-text"></span></div>');
    } else {
        $('.edit-cr').html('<div class="col-md-6"><label>Comfort Room</label><input type="checkbox" class="form-control" value="Yes" name="with_cr"><span id="e-with-cr-text"></span></div>');
    }
    // withWifiVal == 'Yes' ? $('#e-with-wifi').html('<input type="checkbox" class="form-control" value="Yes" name="with_wifi" checked>') : $('#e-with-wifi').html('<input type="checkbox" class="form-control" name="withi_wifi">');

    $('.e-bus-btn').html('<button id="edit-bus-btn" type="submit" name="Update" class="btn btn-success btn-sm pull-right s-btn"><i class="fa fa-save"></i> Submit</button>')
    $('.edit-bus-units-form').on('submit', function(event){
        event.preventDefault();
        $('#edit-bus-btn').attr('disabled', true);
        
        const eBusId = $('.edit-bus-units-form input[name="id"]');
        const eBus_id = eBusId.val();

        const eCompanyName = $('.edit-bus-units-form input[name="company_name"]');
        const eCompany_name = eCompanyName.val();

        const eBusNumber = $('.edit-bus-units-form input[name="bus_number"]');
        const eBus_number = eBusNumber.val();

        const eNoOfSeats = $('.edit-bus-units-form input[name="no_of_seats"]');
        const eNo_of_seats = eNoOfSeats.val();

        const eBusType = $('.select-e-bus-type').val();
        const eBus_type = eBusType;

    if (!eCompany_name){
        $('#e-company-name-text').text('Company Name is Required').css('color', '#D24D57');
        $('#edit-bus-btn').attr('disabled', true);
    }

    $('#edit-company-name').bind('click', function(){
        $('#e-company-name-text').text('');
        $('#edit-bus-btn').attr('disabled', false);
    });

    if (!eBus_number){
        $('#e-bus-number-text').text('Bus number is required').css('color', '#D24D57');
        $('#edit-bus-btn').attr('disabled', true);
    }

    $('#edit-bus-number').bind('click', function(){
        $('#e-bus-number-text').text('');
        $('#edit-bus-btn').attr('disabled', false);
    });

    if (!eNo_of_seats){
        $('#e-no-of-seats-text').text('No. of seats is required').css('color', '#D24D57');
        $('#edit-bus-btn').attr('disabled', true);
    }

    $('#edit-no-of-seats').bind('click', function(){
        $('#e-no-of-seats-text').text('');
        $('#edit-bus-btn').attr('disabled', false);
    });

    if (!eBus_type){
        $('#e-bus-type-text').text('Bus type is required').css('color', '#D24D57');
        $('#edit-bus-btn').attr('disabled', true);
    }

    $('#edit-bus-type').bind('click', function(){
        $('#e-bus-type-text').text('');
        $('#edit-bus-btn').attr('disabled', false);
    });


    if (eCompany_name && eBus_number && eBus_type) {
        var editForm = $('#edit-form')[0];
        $.ajax({
            url: "{{ url('/edit_bus_units') }}",
            method:"POST",
            data: new FormData(editForm),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                if (data.errorStatus == 0){
                    $('.edit-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An item was successfully updated</div></div></div>'); 
                    setTimeout(goToListofUpdatedBusUnits, 3000);
                } else {
                    $('#e-bus-avatar-text').text('There was a problem uploading your photo, Please check file size').css('color', '#D24D57');
                    }
                }
            });
        }
    });
}

function goToListofUpdatedBusUnits(event){
    $('#editBusUnitsModal').modal('hide');
    $('#deleteBusUnitsModal').modal('hide');
    $.ajax({
        url: '{{ url("/manage_bus_units") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadUpdatedBusUnitsDataTable, 1000);
        }
    });   
}

function loadUpdatedBusUnitsDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#bus-units-datatable').DataTable().destroy();
        table = $('#bus-units-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                'url': "{{ url('/bus_units_datatables') }}",
                "data"  : {
                    "busTypeval": busTypeVal,
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 40, targets: 0, orderable: true },
                { width: 40, targets: 1, orderable: true },
                { width: 150, targets: 2, orderable: true },
                { width: 40, targets: 3, orderable: false },
                { width: 80, targets: 4, orderable: false },
                { className: 'dt-body-center', targets: 3 },
                { className: 'dt-body-center', targets: 4 }

            ],
            columns:[
            {
                data: 'bus_number',
                name: 'bus_number'
            },
            {
                data: 'bus_type',
                name: 'bus_type'
            },
            {
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'no_of_seats',
                name: 'no_of_seats'
            },
            {
                data: 'action',
                name: 'action'
            },
        ]
    });
}

var dBusId = '';
function showDeleteBusUnitsModal(button){
    $('#deleteBusUnitsModal').modal('show');

    $('.delete-bus-pad').hide();      
    $('#delete-bus-btn').attr('disabled', true); 
        $('.d-bus-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.delete-bus-pad').show();
        $('#delete-bus-btn').attr('disabled', false);
    }  
    
    dBusId = button.getAttribute('data-hic_id');
    var dCompanyName = button.getAttribute('data-company_name');
    var dTerminal = button.getAttribute('data-site_terminal');
    var dBusNumber = button.getAttribute('data-bus_number');
    var dBusType = button.getAttribute('data-bus_type');
    var dNoOfSeats = button.getAttribute('data-no_of_seats');
    var dWithWifi = button.getAttribute('data-with_wifi');
    var dWithCr = button.getAttribute('data-with_cr');
    var dBusAvatar = button.getAttribute('data-bus_avatar');
    
    $('#company-name-label').text(dCompanyName);
    $('#site-terminal-label').text(dTerminal);
    $('#bus-number-label').text(dBusNumber);
    $('#bus-type-label').text(dBusType);
    $('#no-of-seats-label').text(dNoOfSeats);
    $('#with-wifi-label').text(dWithWifi);
    $('#with-cr-label').text(dWithCr);
    $('#d-bus-avatar').attr('src', '/uploads/documents/'+ dBusAvatar +'');

    $('.d-bus-btn').html('<button id="delete-bus-btn" type="submit" name="Delete" class="btn btn-danger btn-sm pull-right s-btn"><i class="fa fa-delete"></i> Delete</button>')
    $('.delete-bus-units-form').on('submit', function(event){
        event.preventDefault();

        $('#delete-bus-btn').attr('disabled', true);
        $('#delete-bus-id').html('<input id="bus-id" type="hidden" value="'+ dBusId +'" name="id" />');
       
    if (dBusId) {
        var deleteForm = $('#delete-form')[0];
        $.ajax({
            url: "{{ url('/delete_bus_units') }}",
            method:"POST",
            data: new FormData(deleteForm),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                    $('.delete-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An item was deleted</div></div></div>'); 
                    setTimeout(goToListofUpdatedBusUnits, 3000);
                } 
            });
        }
    });
}

// var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

// function convertDate(date_str) {
//     temp_date = date_str.split("-");
//     return months[Number(temp_date[1]) - 1] +" " + temp_date[2] + "," + temp_date[0];
// }
// console.log(convertDate("2022-03-11"));

</script>