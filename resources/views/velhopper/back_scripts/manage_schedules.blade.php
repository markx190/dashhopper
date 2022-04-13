<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>
<script type="text/javascript">

    function viewListOfSchedules(event){
        $.ajax({
            url: '{{ url("/manage_schedules") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadSchedulesDataTable, 1000);
            }
        });   
    }
    
    var busTypeVal = '';
    function filterSchedules(event){
        event.preventDefault();

       busTypeVal = $('.select-bus-type').val();
        $('#btnSearchSchedules').attr('disabled', true);

        if (!busTypeVal){
            $('#bus-type-text').text('Please fill this field').css('color', '#CF000F');
        }

        $('.select-bus-type').bind('click', function(){
            $('#bus-type-text').text('');
            $('#btnSearchSchedules').attr('disabled', false);
        });

        loadSchedulesDataTable(positionVal);
    }

    function loadSchedulesDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#schedules-datatable').DataTable().destroy();
        table = $('#schedules-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                'url': "{{ url('/schedules_datatables') }}",
                "data"  : {
                    "busTypeVal": busTypeVal,
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 80, targets: 0, orderable: true },
                { width: 100, targets: 1, orderable: true },
                { width: 100, targets: 2, orderable: true },
                { width: 100, targets: 3, orderable: false },
                { width: 100, targets: 4, orderable: false },
                { className: 'dt-body-center', targets: 4 }
            ],
            columns:[
            {
                data: 'bus_number',
                name: 'bus_number'
            },
            {
                data: 'origin_address',
                name: 'origin_address'
            },
            {
                data: 'travel_date',
                name: 'travel_date'
            },
            {
                data: 'driver_name',
                name: 'driver_name'
            },
            {
                data: 'action',
                name: 'action'
            },
        ]
    });
}

function showEditTripsModal(button){
    $('#editTripsModal').modal('show');  
    
    $('.edit-trip-pad').hide();      
    $('#edit-trip-btn').attr('disabled', true); 
        $('.e-trip-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.edit-trip-pad').show();
        $('#edit-trip-btn').attr('disabled', false);
    }

    getTripsDrivers();
    getTripsConductors();

    var fetchDriverName = button.getAttribute('data-driver_name');
    var fetchConductorName = button.getAttribute('data-conductor_name');

    function getTripsDrivers(){
        $.ajax({
            url: '/trip_drivers',
            method: 'GET',
            dataType: 'JSON',
            success: function (response){
                // $('#skillFilter').attr('disabled', false);
                const drivers = response;
                var trip_Drivers = {drivers}
                console.log(trip_Drivers);
                var dropDownField = trip_Drivers;
                var html = '<option value="'+ fetchDriverName +'">'+ fetchDriverName +'</option><option value=""></option>';
                if (typeof(dropDownField) === "object" && Object.keys(dropDownField).length) {
                    $.each(dropDownField.drivers, function(key, data) {
                        html += `<option value="${data.firstname +' '+ data.lastname}">${data.firstname +' '+ data.lastname}</option>`;
                    });
                }
                $('#tDrivers').html(html); 
            }
        });
    }

    function getTripsConductors(){
        $.ajax({
            url: '/trip_conductors',
            method: 'GET',
            dataType: 'JSON',
            success: function (response){
                // $('#skillFilter').attr('disabled', false);
                const conductors = response;
                var trip_Conductors = {conductors}
                var dropDownC = trip_Conductors;
                var html = '<option value="'+ fetchConductorName +'">'+ fetchConductorName +'</option><option value=""></option>';
                if (typeof(dropDownC) === "object" && Object.keys(dropDownC).length) {
                    $.each(dropDownC.conductors, function(key, data) {
                        html += `<option value="${data.firstname +' '+ data.lastname}">${data.firstname +' '+ data.lastname}</option>`;
                    });
                }
                $('#tConductors').html(html); 
            }
        });
    }

    $('#edit-trip-id').attr('value', button.getAttribute('data-s_id'));
    $('#edit-t-company-name').attr('value', button.getAttribute('data-company_name'));
    $('#edit-t-site-terminal').attr('value', button.getAttribute('data-site_terminal'));
    $('#edit-t-bus-number').attr('value', button.getAttribute('data-bus_number'));   
    $('#edit-trip-bus-type').html('<select class="form-control select-edit-t-bus-type" name="bus_type"><option value="'+ button.getAttribute('data-bus_type') +'">'+ button.getAttribute('data-bus_type') +'</option><option></option><option value="Ordinary">Ordinary</option><option value="Economy">Economy</option><option value="Semi Deluxe">Semi Deluxe</option><option value="Deluxe">Deluxe</option></select>'); 
    $('#edit-t-no-of-seats').attr('value', button.getAttribute('data-no_of_seats')); 
    $('#edit-t-fare-amount').attr('value', button.getAttribute('data-fare_amount'));  
    $('#edit-t-origin-address').attr('value', button.getAttribute('data-origin_address'));  
    $('#edit-t-destination-address').attr('value', button.getAttribute('data-destination_address'));  
    $('#edit-t-travel-date').attr('value', button.getAttribute('data-travel_date'));  
    $('#edit-t-travel-time').attr('value', button.getAttribute('data-travel_time'));   
    $('#edit-t-time-ap').html('<select class="form-control select-edit-t-time-ap" name="time_ap"><option>'+ button.getAttribute('data-time_ap') +'</option><option></option><option value="AM">AM</option><option value="PM">PM</option></select>');  
    
    $('#edit-t-drivers-name').attr('value', button.getAttribute('data-driver_name'));  
    $('#edit-t-conductors-name').attr('value', button.getAttribute('data-conductor_name'));  
    
    $('#edit-trip-driver-name').html('<select class="form-control select-edit-t-time-ap" name="time_ap"><option>'+ button.getAttribute('data-driver_name') +'</option><option></option><option value="">PM</option></select>');
    
    var editWithWifiVal = button.getAttribute('data-with_wifi'); 
    console.log('wifi: ', editWithWifiVal);
    var editTripWithCrVal = button.getAttribute('data-with_cr'); 
    console.log('Cr: ', editTripWithCrVal);
    
    var editTripBusAvatar = button.getAttribute('data-bus_avatar');
        $('#e-trip-bus-avatar').attr('src', '/uploads/documents/'+ editTripBusAvatar +'');

    if (editWithWifiVal == 'Yes'){
        $('.edit-trip-wifi').html('<div class="col-md-3"><label><b>Wifi</b></label><input type="checkbox" class="form-control" value="Yes" name="with_wifi" checked><span id="e-with-wifi-text"></span></div>');
    } else {
        $('.edit-trip-wifi').html('<div class="col-md-3"><label><b>Wifi</b></label><input type="checkbox" class="form-control" value="Yes" name="with_wifi"><span id="e-with-wifi-text"></span></div>');
    }

    if (editTripWithCrVal == 'Yes'){
        $('.edit-trip-cr').html('<div class="col-md-6"><label><b>CR</b></label><input type="checkbox" class="form-control" value="Yes" name="with_cr" checked><span id="e-with-cr-text"></span></div>');
    } else {
        $('.edit-trip-cr').html('<div class="col-md-6"><label><b>CR</b></label><input type="checkbox" class="form-control" value="Yes" name="with_cr"><span id="e-with-cr-text"></span></div>');
    }
    // withWifiVal == 'Yes' ? $('#e-with-wifi').html('<input type="checkbox" class="form-control" value="Yes" name="with_wifi" checked>') : $('#e-with-wifi').html('<input type="checkbox" class="form-control" name="withi_wifi">');

    $('.edit-trip-btn').html('<button id="edit-trip-btn" type="submit" name="Update" class="btn btn-success btn-sm pull-right s-btn"><i class="fa fa-save"></i> Save</button>')
    $('.edit-trips-form').on('submit', function(event){
        event.preventDefault();
        $('#edit-trip-btn').attr('disabled', true);
        
        const eTripBusId = $('.edit-trips-form input[name="id"]');
        const eTripBus_id = eTripBusId.val();

        const eTripCompanyName = $('.edit-trips-form input[name="company_name"]');
        const eTripCompany_name = eTripCompanyName.val();

        const eTripSiteTerminal = $('.edit-trips-form input[name="site_terminal"]');
        const eTripSite_terminal = eTripSiteTerminal.val();

        const eTripBusNumber = $('.edit-trips-form input[name="bus_number"]');
        const eTripBus_number = eTripBusNumber.val();

        const eTripNoOfSeats = $('.edit-trips-form input[name="no_of_seats"]');
        const eTripNo_of_seats = eTripNoOfSeats.val();
        
        const eTripWithWifi = $('.edit-trips-form input[name="with_wifi"]');
        const eTripWith_wifi = eTripWithWifi;

        const eTripWithCr = $('.edit-trips-form input[name="with_cr"]');
        const eTripWith_cr = eTripWithCr;

        const eTripBusType = $('#edit-trip-bus-type').val();
        const eTripBus_type = eTripBusType;

        const eTripFareAmount = $('.edit-trips-form input[name="fare_amount"]');
        const eTripFare_amount = eTripFareAmount.val();

        const eTripOrigin = $('.edit-trips-form input[name="origin_address"]');
        const eTripOrigin_address = eTripOrigin.val();

        const eTripDestination= $('.edit-trips-form input[name="destination_address"]');
        const eTripDestination_address = eTripDestination.val();

        const eTripTravelDate = $('.edit-trips-form input[name="travel_date"]');
        const eTripTravel_date = eTripTravelDate.val();

        const eTripTravelTime = $('.edit-trips-form input[name="travel_time"]');
        const eTripTravel_time = eTripTravelTime.val();

        const eTripTravelAp = $('.edit-trips-form input[name="travel_time"]');
        const eTripTravel_ap = eTripTravelAp.val();

        const eTripDriverName = $('.select-trip-drivers').val();
        const eTripDriver_name = eTripDriverName;

        const eTripConductorName = $('.select-trip-conductors').val();
        const eTripConductor_name = eTripConductorName;

    if (!eTripCompany_name){
        $('#edit-t-company-name-text').text('Company Name is Required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-company-name').bind('click', function(){
        $('#edit -company-name-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripSite_terminal){
        $('#edit-t-site-terminal-text').text('Company Name is Required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-site-terminal').bind('click', function(){
        $('#edit-t-site-terminal-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripBus_number){
        $('#edit-t-bus-number-text').text('Bus number is required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-bus-number').bind('click', function(){
        $('#edit-t-bus-number-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripNo_of_seats){
        $('#edit-t-no-of-seats-text').text('No. of seats is required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-no-of-seats').bind('click', function(){
        $('#edit-t-no-of-seats-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripBus_type){
        $('#edit-t-bus-type-text').text('Bus type is required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('.select-edit-t-bus-type').bind('click', function(){
        $('#edit-t-bus-type-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripFare_amount){
        $('#edit-t-fare-amount-text').text('Fare amount is required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-fare-amount').bind('click', function(){
        $('#edit-t-fare-amount-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripOrigin_address){
        $('#edit-t-origin-address-text').text('Origin address is required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-origin-address').bind('click', function(){
        $('#edit-t-origin-address-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (!eTripDestination_address){
        $('#edit-t-destination-address-text').text('Destination address is required').css('color', '#D24D57');
        $('#edit-trip-btn').attr('disabled', true);
    }

    $('#edit-t-destination-address').bind('click', function(){
        $('#edit-t-destination-address-text').text('');
        $('#edit-trip-btn').attr('disabled', false);
    });

    if (eTripCompany_name && eTripBus_number && eTripBus_type) {
        var editTripForm = $('.edit-trips-form')[0];
        $.ajax({
            url: "{{ url('/edit_schedules') }}",
            method:"POST",
            data: new FormData(editTripForm),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                if (data.errorStatus == 0){
                    $('.edit-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Trip was successfully updated</div></div></div>'); 
                    setTimeout(goToListofUpdatedSchedules, 3000);
                } else {
                    $('#edit-t-conductor-name-text').text('There was a problem uploading your photo, Please check file size').css('color', '#D24D57');
                    }
                }
            });
        }
    });
}

function goToListofUpdatedSchedules(event){
    $('#editTripsModal').modal('hide');
    $('#deleteTripsModal').modal('hide');
    $.ajax({
        url: '{{ url("/manage_schedules") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadUpdatedSchedulesDataTable, 1000);
        }
    });   
}

function loadUpdatedSchedulesDataTable(){        
    $('.spinner-red-users').hide();
    $('.card-body').show();
    $('.table').show();
    $('#schedules-datatable').DataTable().destroy();
    table = $('#schedules-datatable').DataTable({
        "searching": true,
        "processing": false,
        "serverSide": false,
        "paginate": true,
        "responsive": false,
        "paging": true,
        "pageLength": 10,
        "ajax": {
            'url': "{{ url('/schedules_datatables') }}",
            "data"  : {
                "busTypeVal": busTypeVal,
                "_token"	: "{{csrf_token()}}"
            }
        },
        columnDefs: [
            { width: 80, targets: 0, orderable: true },
            { width: 100, targets: 1, orderable: true },
            { width: 100, targets: 2, orderable: true },
            { width: 100, targets: 3, orderable: false },
            { width: 100, targets: 4, orderable: false },
            { className: 'dt-body-center', targets: 4 }
        ],
        columns:[
        {
            data: 'bus_number',
            name: 'bus_number'
        },
        {
            data: 'origin_address',
            name: 'origin_address'
        },
        {
            data: 'travel_date',
            name: 'travel_date'
        },
        {
            data: 'driver_name',
            name: 'driver_name'
        },
        {
            data: 'action',
            name: 'action'
        },
        ]
    });
}

var dTripId = '';
function showDeleteTripsModal(button){
    $('#deleteTripsModal').modal('show');
    $('.delete-trips-pad').hide();      
    $('#delete-trips-btn').attr('disabled', true); 
        $('.d-trips-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.delete-trips-pad').show();
        $('#delete-trips-btn').attr('disabled', false);
    }  
    
    dTripId = button.getAttribute('data-s_id');
    var dTripCompanyName = button.getAttribute('data-company_name');
    var dTripTerminal = button.getAttribute('data-site_terminal');
    var dTripBusNumber = button.getAttribute('data-bus_number');
    var dTripBusType = button.getAttribute('data-bus_type');
    var dTripSeatNumber = button.getAttribute('data-no_of_seats');
    var dTripFareAmount = button.getAttribute('data-fare_amount');
    var dTripOriginAddress = button.getAttribute('data-origin_address');
    var dTripDestinationAddress = button.getAttribute('data-destination_address');
    var dTripDate = button.getAttribute('data-travel_date');
    var dTripTime = button.getAttribute('data-travel_time');
    var dTripTimeAp = button.getAttribute('data-time_ap');
    var dTripDriver = button.getAttribute('data-driver_name');
    var dTripConductor = button.getAttribute('data-conductor_name');
    
    var deleteTripWithWifiVal = button.getAttribute('data-with_wifi'); 
    var deleteTripWithCrVal = button.getAttribute('data-with_cr'); 

    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function convertTripDate(date_str) {
    temp_date = date_str.split("-");
    return months[Number(temp_date[1]) - 1] +" " + temp_date[2] + ", " + temp_date[0];
    }

    var displayTripDate = convertTripDate(dTripDate);

    $('.delete-schedules-id').attr('value', dTripId);
    $('#delete-company-name-label').text(dTripCompanyName);
    $('#delete-site-terminal-label').text(dTripTerminal);
    $('#delete-bus-number-label').text(dTripBusNumber);
    $('#delete-bus-type-label').text(dTripBusType);
    $('#delete-no-of-seats-label').text(dTripSeatNumber);
    $('#delete-fare-amount-label').text(dTripFareAmount);
    $('#delete-origin-address-label').text(dTripOriginAddress);
    $('#delete-destination-address-label').text(dTripDestinationAddress);
    $('#delete-travel-date-label').text(displayTripDate);
    $('#delete-travel-time-label').text(dTripTime +' '+ dTripTimeAp);
    $('#delete-travel-driver-label').text(dTripDriver);
    $('#delete-travel-conductor-label').text(dTripConductor);

    if (deleteTripWithWifiVal == 'Yes'){
        $('.delete-trip-wifi').html('<div class="col-md-3"><label><b>Wifi</b></label><input type="checkbox" class="form-control" value="Yes" name="with_wifi" checked><span id="d-with-wifi-text"></span></div>');
    } else {
        $('.delete-trip-wifi').html('<div class="col-md-3"><label><b>Wifi</b></label><input type="checkbox" class="form-control" value="Yes" name="with_wifi"><span id="d-with-wifi-text"></span></div>');
    }

    if (deleteTripWithCrVal == 'Yes'){
        $('.delete-trip-cr').html('<div class="col-md-6"><label><b>CR</b></label><input type="checkbox" class="form-control" value="Yes" name="with_cr" checked><span id="e-with-cr-text"></span></div>');
    } else {
        $('.delete-trip-cr').html('<div class="col-md-6"><label><b>CR</b></label><input type="checkbox" class="form-control" value="Yes" name="with_cr"><span id="e-with-cr-text"></span></div>');
    }
    
    $('.d-schedules-btn').html('<button id="delete-schedules-btn" type="submit" name="Delete" class="btn btn-danger btn-sm pull-right s-btn"><i class="fa fa-trash"></i> Delete</button>')
    $('.delete-schedules-form').on('submit', function(event){
        event.preventDefault();

        $('#delete-schedules-btn').attr('disabled', true);
       
    if (dTripId) {
        var deleteTripsForm = $('.delete-schedules-form')[0];
        $.ajax({
            url: "{{ url('/delete_schedules') }}",
            method:"POST",
            data: new FormData(deleteTripsForm),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                $('.delete-trip-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Trip was deleted successfully</div></div></div>'); 
                    setTimeout(goToListofUpdatedSchedules, 3000);
                } 
            });
        }
    });
}

</script>