<script type="text/javascript">
    
    function viewListOfEmployees(event){
        $.ajax({
            url: '{{ url("/manage_employees") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadEmployeesDataTable, 1000);
            }
        });   
    }
    
    var positionVal = '';
    function filterEmployees(event){
        event.preventDefault();

        positionVal = $('.e-position').val();
        $('#btnSearchEmployees').attr('disabled', true);

        if (!positionVal){
            $('#bus-type-text').text('Please fill this field').css('color', '#CF000F');
        }

        $('.e-position').bind('click', function(){
            $('#position-text').text('');
            $('#btnSearchEmployees').attr('disabled', false);
        });

        loadEmployeesDataTable(positionVal);
    }

    function loadEmployeesDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#employees-datatable').DataTable().destroy();
        table = $('#employees-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                'url': "{{ url('/employees_datatables') }}",
                "data"  : {
                    "positionVal": positionVal,
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 40, targets: 0, orderable: true },
                { width: 150, targets: 1, orderable: true },
                { width: 90, targets: 2, orderable: true },
                { width: 40, targets: 3, orderable: false },
                { width: 80, targets: 4, orderable: false },
                { className: 'dt-body-center', targets: 3 },
                { className: 'dt-body-center', targets: 4 }
            ],
            columns:[
            {
                data: 'employee_id_no',
                name: 'employee_id_no'
            },
            {
                data: 'firstname',
                name: 'firstname'
            },
            {
                data: 'position',
                name: 'position'
            },
            {
                data: 'contact_number',
                name: 'contact_number'
            },
            {
                data: 'action',
                name: 'action'
            },
        ]
    });
}

function showAddEmployeesModal(button){
    $('#addEmployeesModal').modal('show');  
    $('.add-employee-pad').hide();      
    $('#add-employee-btn').attr('disabled', true); 
        $('.a-employee-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.add-employee-pad').show();
        $('#add-employee-btn').attr('disabled', false);
    }  

    $('.add-employee-btn').html('<button id="add-bus-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>')
    $('.add-employees-form').on('submit', function(event){
        event.preventDefault();
        
        $('#add-employee-btn').attr('disabled', true);

        const companyName = $('.add-employees-form input[name="company_name"]');
        const company_name = companyName.val();

        const siteTerminal = $('.add-employees-form input[name="site_terminal"]');
        const site_terminal = siteTerminal.val();

        const employeeIdNo = $('.add-employees-form input[name="employee_id_no"]');
        const employee_id_no = employeeIdNo.val();

        const employeeFirstname = $('.add-employees-form input[name="firstname"]');
        const employee_firstname = employeeFirstname.val();

        const employeeLastname = $('.add-employees-form input[name="lastname"]');
        const employee_lastname = employeeLastname.val();

        const employee_position = $('.select-e-position').val();
        
        const contactNumber = $('.add-employees-form input[name="contact_number"]');
        const contact_number = contactNumber.val();

        const employeeAvatar = $('.add-employees-form input[name="employee_avatar"]');
        const employee_avatar = employeeAvatar.val();

        const createdBy = $('.add-employees-form input[name="created_by"]');
        const created_by = createdBy.val();

    if (!company_name){
        $('#a-company-name-text').text('Company Name is Required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-company-name').bind('click', function(){
        $('#a-company-name-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!site_terminal){
        $('#a-site_terminal-text').text('Site Terminal is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-site-terminal').bind('click', function(){
        $('#a-site-terminal-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!employee_firstname){
        $('#a-employee-firstname-text').text('Firstname is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-employee-firstname').bind('click', function(){
        $('#a-employee-firstname-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!employee_lastname){
        $('#a-employee-lastname-text').text('Lastname is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-employee-lastname').bind('click', function(){
        $('#a-employee-lastname-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!employee_id_no){
        $('#a-employee-id-no-text').text('Emplyee ID No. is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-employee-id-no').bind('click', function(){
        $('#a-employee-id-no-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!contact_number){
        $('#a-contact-no-text').text('Contact Number is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-employee-contact-no').bind('click', function(){
        $('#a-contact-no-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!employee_position){
        $('#a-employee-position-text').text('Position is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-employee-position').bind('click', function(){
        $('#a-employee-position-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });

    if (!employee_avatar){
        $('#a-employee-avatar-text').text('Employee Avatar is required').css('color', '#D24D57');
        $('#add-employee-btn').attr('disabled', true);
    }

    $('#add-employee-avatar').bind('click', function(){
        $('#a-employee-avatar-text').text('');
        $('#add-employee-btn').attr('disabled', false);
    });
    
    if (company_name) {
        $.ajax({
            url: "{{ url('/add_employees') }}",
            method:"POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                if (data.errorStatus == 0){
                    $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> A new Employee was added successfully</div></div></div>'); 
                    setTimeout(goToListofEmployees, 3000);
                } else {
                    $('#a-employee-avatar-text').text('There was a problem uploading your photo, Please check file size').css('color', '#D24D57');
                    }
                }
            });
        }
    });
}

function goToListofEmployees(event){
    $('#addEmployeesModal').modal('hide');
    $.ajax({
        url: '{{ url("/manage_employees") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadEmployeesDataTable, 1000);
        }
    });   
}

function showEditEmployeesModal(button){
    $('#editEmployeesModal').modal('show');  
    
    $('.edit-employee-pad').hide();      
    $('#edit-employee-btn').attr('disabled', true); 
        $('.e-employee-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.edit-employee-pad').show();
        $('#edit-employee-btn').attr('disabled', false);
    }

    $('#edit-employee-id').attr('value', button.getAttribute('data-employee_id'));
    $('#edit-company-name').attr('value', button.getAttribute('data-company_name'));
    $('#edit-site-terminal').attr('value', button.getAttribute('data-site_terminal')); 
    $('#edit-employee-position').html('<select class="form-control select-edit-e-position" name="position"><option>'+ button.getAttribute('data-employee_position') +'</option><option value="Terminal Officer">Terminal Officer</option><option value="Bus Dispatcher">Bus Dispatcher</option><option value="Driver">Driver</option><option value="Conductor">Conductor</option></select>'); 
    $('#edit-employee-firstname').attr('value', button.getAttribute('data-firstname'));   
    $('#edit-employee-lastname').attr('value', button.getAttribute('data-lastname'));   
    $('#edit-employee-id-no').attr('value', button.getAttribute('data-employee_id_no'));   
    $('#edit-employee-contact-no').attr('value', button.getAttribute('data-contact_number'));   

    var editEmployeeAvatar = button.getAttribute('data-employee_avatar');
        $('#e-employee-avatar').attr('src', '/uploads/avatars/'+ editEmployeeAvatar +'');

    $('.e-employee-btn').html('<button id="edit-employee-btn" type="submit" name="Update" class="btn btn-success btn-sm pull-right s-btn">Submit</button>')
    $('.edit-employees-form').on('submit', function(event){
       
        event.preventDefault();
        $('#edit-employee-btn').attr('disabled', true);
        
        const eEmployeeId = $('.edit-employees-form input[name="id"]');
        const eEmployee_id = eEmployeeId.val();

        const eCompanyName = $('.edit-employees-form input[name="company_name"]');
        const eCompany_name = eCompanyName.val();

        const eSiteTerminal = $('.edit-employees-form input[name="site_terminal"]');
        const eSite_terminal = eSiteTerminal.val();

        const eFirstName = $('.edit-employees-form input[name="firstname"]');
        const eFirst_name = eFirstName.val();

        const eLastName = $('.edit-employees-form input[name="lastname"]');
        const eLast_name = eLastName.val();

        const eEmployeeIdNo = $('.edit-employees-form input[name="employee_id_no"]');
        const eEmployee_id_no = eEmployeeIdNo.val();

        const eEmployeePosition = $('.select-edit-e-position').val();
        const eEmployee_position = eEmployeePosition;

    if (!eCompany_name){
        $('#e-company-name-text').text('Company Name is Required').css('color', '#D24D57');
        $('#edit-employee-btn').attr('disabled', true);
    }

    $('#edit-company-name').bind('click', function(){
        $('#e-company-name-text').text('');
        $('#edit-employee-btn').attr('disabled', false);
    });

    if (!eSite_terminal){
        $('#e-site-terminal-text').text('Site Terminal is required').css('color', '#D24D57');
        $('#edit-employee-btn').attr('disabled', true);
    }

    $('#edit-site-terminal').bind('click', function(){
        $('#e-site-terminal-text').text('');
        $('#edit-employee-btn').attr('disabled', false);
    });

    if (!eFirst_name){
        $('#e-employee-firstname-text').text('Firstname is required').css('color', '#D24D57');
        $('#edit-employee-btn').attr('disabled', true);
    }

    $('#edit-employee-firstname').bind('click', function(){
        $('#e-employee-firstname-text').text('');
        $('#edit-employee-btn').attr('disabled', false);
    });

    if (!eLast_name){
        $('#e-employee-lastname-text').text('Lastname is required').css('color', '#D24D57');
        $('#edit-employee-btn').attr('disabled', true);
    }

    $('#edit-employee-lastname').bind('click', function(){
        $('#e-employee-lastname-text').text('');
        $('#edit-employee-btn').attr('disabled', false);
    });

    if (!eEmployee_id_no){
        $('#e-employee-id-no-text').text('Employee ID No. is required').css('color', '#D24D57');
        $('#edit-employee-btn').attr('disabled', true);
    }

    $('#edit-employee-id-no').bind('click', function(){
        $('#e-employee-id-no-text').text('');
        $('#edit-employee-btn').attr('disabled', false);
    });

    if (eCompany_name) {
        var editEmployeeForm = $('#edit-employees-form')[0];
        $.ajax({
            url: "{{ url('/edit_employees') }}",
            method:"POST",
            data: new FormData(editEmployeeForm),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                if (data.errorStatus == 0){
                    $('.edit-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Employee Information was successfully updated</div></div></div>'); 
                    setTimeout(goToListofUpdatedEmployees, 3000);
                } else {
                    $('#e-employee-avatar-text').text('There was a problem uploading your photo, Please check file size').css('color', '#D24D57');
                    }
                }
            });
        }
    });
}

function goToListofUpdatedEmployees(event){
    $('#editEmployeesModal').modal('hide');
    $('#deleteEmployeesModal').modal('hide');
    $.ajax({
        url: '{{ url("/manage_employees") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadUpdatedEmployeesDataTable, 1000);
        }
    });   
}

function loadUpdatedEmployeesDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#employees-datatable').DataTable().destroy();
        table = $('#employees-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                'url': "{{ url('/employees_datatables') }}",
                "data"  : {
                    "positionVal": positionVal,
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 40, targets: 0, orderable: true },
                { width: 150, targets: 1, orderable: true },
                { width: 90, targets: 2, orderable: true },
                { width: 40, targets: 3, orderable: false },
                { width: 80, targets: 4, orderable: false },
                { className: 'dt-body-center', targets: 3 },
                { className: 'dt-body-center', targets: 4 }
            ],
            columns:[
            {
                data: 'employee_id_no',
                name: 'employee_id_no'
            },
            {
                data: 'firstname',
                name: 'firstname'
            },
            {
                data: 'position',
                name: 'position'
            },
            {
                data: 'contact_number',
                name: 'contact_number'
            },
            {
                data: 'action',
                name: 'action'
            },
        ]
    });
}

var dEmployeeId = '';
function showDeleteEmployeesModal(button){
    $('#deleteEmployeesModal').modal('show');

    $('.delete-employee-pad').hide();      
    $('#delete-employee-btn').attr('disabled', true); 
        $('.d-employee-space').html('<div class="spinner-dash" style="text-align: center;"><img class="displayed" src="/bookhivez/images/ajax-loader-circle.gif" /></div>');  
        setTimeout(hideSpinner, 1000); 

    function hideSpinner(){
        $('.spinner-dash').hide();
        $('.delete-employee-pad').show();
        $('#delete-employee-btn').attr('disabled', false);
    }  
    
    dEmployeeId = button.getAttribute('data-employee_id');
    var dCompanyName = button.getAttribute('data-company_name');
    var dTerminal = button.getAttribute('data-site_terminal');
    var dEmployeeIdNo = button.getAttribute('data-employee_id_no');
    var dEmployeeFirstname = button.getAttribute('data-firstname');
    var dEmployeeLastname = button.getAttribute('data-lastname');
    var dEmployeeContactNo = button.getAttribute('data-contact_number');
    var dEmployeePosition = button.getAttribute('data-employee_position');
    var dEmployeeAvatar = button.getAttribute('data-employee_avatar');
    
    $('#company-name-label').text(dCompanyName);
    $('#site-terminal-label').text(dTerminal);
    $('#emloyee-id-no-label').text(dEmployeeIdNo);
    $('#employee-firstname-label').text(dEmployeeFirstname +' '+ dEmployeeLastname);
    $('#employee-contact-no-label').text(dEmployeeContactNo);
    $('#employee-position-label').text(dEmployeePosition);
    
    $('#d-employee-avatar').attr('src', '/uploads/avatars/'+ dEmployeeAvatar +'');

    $('.d-employee-btn').html('<button id="delete-employee-btn" type="submit" name="Delete" class="btn btn-danger btn-sm pull-right s-btn"><i class="fa fa-delete"></i> Delete</button>')
    $('.delete-employees-form').on('submit', function(event){
        event.preventDefault();

        $('#delete-employee-btn').attr('disabled', true);
        $('#delete-employee-id').html('<input id="bus-id" type="hidden" value="'+ dEmployeeId +'" name="id" />');
       
    if (dEmployeeId) {
        var deleteEmployeeForm = $('#delete-employees-form')[0];
        $.ajax({
            url: "{{ url('/delete_employees') }}",
            method:"POST",
            data: new FormData(deleteEmployeeForm),
            contentType: false,
            cache: false,
            dataType: 'JSON',
            processData: false,
            success:function(data){
                    $('.delete-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An Employee was deleted</div></div></div>'); 
                    setTimeout(goToListofUpdatedEmployees, 3000);
                } 
            });
        }
    });
}

</script>