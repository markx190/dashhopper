<script>

function listOfNavlinks(event){
    event.preventDefault();
        $.ajax({
        url: '{{ url("/navbars-table") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadNavlinksDataTable, 1000);
        }
    });
}

function loadNavlinksDataTable(){
    $('.spinner-red-docs').hide();
    $('.docs-body').show();
    $('#navbar-table').DataTable().destroy();
        table = $('#navbar-table').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': '{{ url("/navbars-datatable") }}',
                "data" : {
                    // "onlineFrom": fromVal,
                    // "onlineTo": toVal,
                    // "_token"	: "{{ csrf_token() }}"
	    		}
            },
            columnDefs: [
                { className: 'dt-body-center', targets: 5 },
                { targets: 5, orderable: false },
                { width: 80, targets: 0 },
                { width: 180, targets: 1 },
            ],
            
            columns:[
            {
                data: 'position_number',
                name: 'position_number'
            },
            {
                data: 'label_name',
                name: 'label_name'
            },
            {
                data: 'navbar_type',
                name: 'navbar_type'
            },
            {
                data: 'navlink_status',
                name: 'navlink_status'
            },
            {
                data: 'created_by',
                name: 'created_by'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });   
}

function addNavlink(button){
    $('#addNavlinkModal').modal('show');        
    
    $('.submitNavlink').bind('click', function(){
        const navLabelName = $('.label-name').val();
        console.log('label name: ', navLabelName);
        
        const positionNumber = $('.link-position').val();
        const navbarType = $('.navbar-type').val();

        if (!navLabelName){
            $('#a-navlink-text').text('* Navlink label name is required').css('color', '#D24D57');
            $('#submit-link-btn').attr('disabled', true);
        }

        $('.label-name').bind('click', function(){
            $('#a-navlink-text').text('');
            $('#submit-link-btn').attr('disabled', false);
        });

        if (!positionNumber){
            $('#a-position-text').text('* Navlink position is required').css('color', '#D24D57');
            $('#submit-link-btn').attr('disabled', true);
        }

        $('.link-position').bind('click', function(){
            $('#a-position-text').text('');
            $('#submit-link-btn').attr('disabled', false);
        });

        if (!navbarType){
            $('#a-navbar-type-text').text('* Navlink type is required').css('color', '#D24D57');
            $('#submit-link-btn').attr('disabled', true);
        }

        $('.navbar-type').bind('click', function(){
            $('#a-navbar-type-text').text('');
            $('#submit-link-btn').attr('disabled', false);
        });

        if (navLabelName && positionNumber && navbarType) {
            saveNavLink();
        }
         
        function saveNavLink(){
            $.ajax({
                url: "{{ url('/add-navlink') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                navLabelName,
                positionNumber,
                navbarType,
              
                },
                cache: false,
                success:function(html){
            
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Navlink was successfully created.</div></div></div>'); 
                setTimeout(goToListOfNavbar, 3000);
                
            }
        });
        }

    });
}

function editNavlink(button){
    $('#editNavlinkModal').modal('show');        
    
    var eNavIdVal = button.getAttribute('data-navbar-id');
    var eNavLabelVal = button.getAttribute('data-navbar-label-name');
    var ePositionNumVal = button.getAttribute('data-navbar-position-number');
    var eNavTypeVal = button.getAttribute('data-navbar-type');
    var eNavStatusVal = button.getAttribute('data-navbar-status');

    $('.edit-nav-link').html('<div class="col-md-3"><div class="form-group"><label><b>Navlink Name</b></label><input id="e-label-name" type="text" class="form-control edit-label-name" value="'+ eNavLabelVal +'" name="label_name"></input><span id="e-label-name-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Position Number</b></label><select style="margin-top: -1px;" id="e-nav-position" class="form-control edit-nav-position" name="position_number"><option value="'+ ePositionNumVal +'">'+ ePositionNumVal +'</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option></select><span id="e-nav-position-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Navlink Type</b></label><select style="margin-top: -1px;" id="e-nav-type" class="form-control edit-nav-type" name="navbar_type"><option value="'+ eNavTypeVal +'">'+ eNavTypeVal +'</option><option value="Navlink List">Navlink List</option><option value="Dropdown List">Dropdown List</option></select><span id="e-navtype-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Navlink Status</b></label><select style="margin-top: -1px;" id="e-nav-status" class="form-control edit-nav-status" name="navlink_status"><option value="'+ eNavStatusVal +'">'+ eNavStatusVal +'</option><option value="For Approval">For Approval</option><option value="Approved">Approved</option></select><span id="e-nav-status-text"></span></div></div>')  

    $('.submitEditNavlink').bind('click', function(){
        
        const eNavId = eNavIdVal;
        const eNavLabelName = $('.edit-label-name').val();
        const ePositionNumber = $('.edit-nav-position').val();
        const eNavbarType = $('.edit-nav-type').val();
        const eNavStatus = $('.edit-nav-status').val();

        if (!eNavLabelName){
            $('#e-label-name-text').text('* Navlink label name is required').css('color', '#D24D57');
            $('#edit-link-btn').attr('disabled', true);
        }

        $('.edit-label-name').bind('click', function(){
            $('#e-label-name-text').text('');
            $('#edit-link-btn').attr('disabled', false);
        });

        if (!ePositionNumber){
            $('#e-nav-position-text').text('* Navlink position is required').css('color', '#D24D57');
            $('#edit-link-btn').attr('disabled', true);
        }

        $('.edit-nav-position').bind('click', function(){
            $('#e-nav-position-text').text('');
            $('#edit-link-btn').attr('disabled', false);
        });

        if (!eNavbarType){
            $('#e-nav-type-text').text('* Navlink type is required').css('color', '#D24D57');
            $('#edit-link-btn').attr('disabled', true);
        }

        $('.edit-nav-type').bind('click', function(){
            $('#e-nav-type-text').text('');
            $('#edit-link-btn').attr('disabled', false);
        });

        if (!eNavStatus){
            $('#e-nav-status-text').text('* Navlink status is required').css('color', '#D24D57');
            $('#edit-link-btn').attr('disabled', true);
        }

        $('.edit-nav-status').bind('click', function(){
            $('#e-nav-status-text').text('');
            $('#edit-link-btn').attr('disabled', false);
        });

        if (eNavLabelName && ePositionNumber && eNavbarType && eNavStatus) {
            saveEditNavLink();
        }
         
        function saveEditNavLink(){
            $.ajax({
                url: "{{ url('/edit-navlink') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                eNavId,
                eNavLabelName,
                ePositionNumber,
                eNavbarType,
                eNavStatus
              
                },
                cache: false,
                success:function(html){
            
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Navlink was successfully updated.</div></div></div>'); 
                setTimeout(goToListOfNavbar, 3000);
                
                }
            });
        }
    });
}

function deleteNavlink(button){
    $('#deleteNavlinkModal').modal('show');        
    
    var dNavIdVal = button.getAttribute('data-navbar-id');
    var dNavLabelVal = button.getAttribute('data-navbar-label-name');
    var dPositionNumVal = button.getAttribute('data-navbar-position-number');
    var dNavTypeVal = button.getAttribute('data-navbar-type');
    var dNavStatusVal = button.getAttribute('data-navbar-status');

    $('#d-navlink-text').text(dNavLabelVal);
    $('#d-position-text').text(dPositionNumVal);
    $('#d-navbar-type-text').text(dNavTypeVal);
    $('#d-navbar-status-text').text(dNavStatusVal);

    $('.submitDeleteNavlink').bind('click', function(){
        
        const dNavId = dNavIdVal;
        
        if (dNavId) {
            deleteNavLink();
        }
         
        function deleteNavLink(){
            $.ajax({
                url: "{{ url('/delete-navlink') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                dNavId
                },
                cache: false,
                dataType: 'JSON',
                success:function(response){
                if (response == 'Deleted'){
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Navlink was deleted.</div></div></div>'); 
                setTimeout(goToListOfNavbar, 3000);
                }
            }
        });
        }

    });
}

function goToListOfNavbar(){
    $('#addNavlinkModal').modal('hide');   
    $('#editNavlinkModal').modal('hide');  
    $('#deleteNavlinkModal').modal('hide');  

        $.ajax({
        url: '{{ url("/navbars-table") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadNavlinksDataTable, 1000);
        }
    });
}

</script>