<script>
    
    function viewUsers(event){
        alert('users');
        $.ajax({
            url: '{{ url("/manage-users") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-profile').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicUsersDataTable, 1000);
            }
        });   
    }

    function searchUsers(event){
        event.preventDefault();
        loadHicUsersDataTable();
    }

    function loadHicUsersDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#hic-users-datatable').DataTable().destroy();
        table = $('#hic-users-datatable').DataTable({
            
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 10,
            "ajax": {
                'url': "{{ url('/users-datatables') }}",
                "data"  : {
                    "hicType": $(".select-hic").val(),
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 20, targets: 6, orderable: false },
                { width: 3, targets: 3, orderable: false },
                { width: 3, targets: 1, orderable: false },
            ],
            columns:[
            {
                data: 'hic_name',
                name: 'hic_name'
            },
            {
                data: 'hic_type',
                name: 'hic_type'
            },
            {
                data: 'user_firstname',
                name: 'user_firstname',
            },
            {
                data: 'hic_contact_no',
                name: 'hic_contact_no'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'hic_user_status',
                name: 'hic_user_status',
                orderable: true
            },
            {
                data: 'action',
                name: 'action'
            },
            ]
    
        });
    }

    function editUser(userId, editUserBtn, button){
        $('#editUsersModal').modal('show');
        
        if (editUserBtn !== 'Set'){
            $('#users-l').text('Edit User');
            $('.u-btn').html('<button id="edit-user-btn" type="button" name="Save" class="btn btn-success btn-sm pull-right s-btn"><i class="fa fa-save"></i> Save</button>')
            $('.f-user').attr('id', 'edit-user-form');

            $('.row-user-name').html('<div class="col-md-3"><div class="form-group"><label>Company</label><h6 id="e-hic-name"></h6><input type="hidden" id="e-hic-id" name="id"><span id="e-hic-name-text"></span></div></div><div class="col-md-3"><div class="form-group"><label>Member since</label><h6 id="e-hic-created-at"></h6></div></div>');
            $('.row-user-status-l').html('<div class="col-md-3"><div class="form-group"><label>Status</label></div></div>');
            $('.row-user-status').html('<div class="col-md-8 radio-s"><div class="form-group"><input id="e-radio-new" type="radio" class="radio" value="New Account" name="hic_user_status"> New Account <input id="e-radio-pending" class="radio" type="radio" value="Pending" name="hic_user_status"> Pending <input id="e-radio-verified" class="radio" type="radio" value="Verified" name="hic_user_status"> Verified <span id="e-user-status-text"></span></div></div>');
            
            document.querySelector("#e-hic-name").innerText = button.getAttribute("data-hic-name");
            document.querySelector("#e-hic-created-at").innerText = button.getAttribute("data-hic-created-at");
            document.querySelector("#e-hic-id").innerText = button.getAttribute("data-hic-id");
            $('#e-hic-id').attr('value', button.getAttribute("data-hic-id"));
            const userStatus = button.getAttribute("data-hic-user-status");
            console.log('s: ', userStatus);

            if (userStatus == 'New Account'){
                $('#e-radio-new').prop('checked', true);
            } else if (userStatus == 'Pending'){
                $('#e-radio-pending').prop('checked', true);
            } else if (userStatus == 'Verified') {
                $('#e-radio-verified').prop('checked', true);
            }
            
            const hicId = $('#edit-user-form input[name="id"]');
            const eHicId = hicId.val();
            
            var getUserStatus = $('#e-radio-new:input[name="hic_user_status"]').val();
            var getUserStatus = $('#e-radio-pending:input[name="hic_user_status"]').val();                   
            var getUserStatus = $('#e-radio-verified:input[name="hic_user_status"]').val();
            
            $('#edit-user-btn').on('click', function(){
            
            const eNewAcc = $('#e-radio-new:input:radio').is(':checked');
            const ePending = $('#e-radio-pending:input:radio').is(':checked');
            const eVerified = $('#e-radio-verified:input:radio').is(':checked');
            
            if (eNewAcc == true){
                var getUserStatus = $('#e-radio-new:input[name="hic_user_status"]').val();
            } else if (ePending == true){
                var getUserStatus = $('#e-radio-pending:input[name="hic_user_status"]').val();  
            } else if (eVerified == true){                 
                var getUserStatus = $('#e-radio-verified:input[name="hic_user_status"]').val();
            }

            if (getUserStatus){
                $.ajax({
                    url: '{{ url("/edit-users") }}',
                    method: 'POST',
                    data: { 
                        _token: function() {
                        return "{{csrf_token()}}"
                    },
                    eHicId,
                    getUserStatus,
                    },
                    cache: false,
                    success: function (html){
                        $('.edit-alert-m').html('<div class="row msg-alert"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> User was Updated</div></div></div>');
                        setTimeout(callDtAjax, 1000);
                    }
                });
            } else {
                $('.edit-alert-m').html('<div class="row msg-alert"><div class="col-md-12 alert-margin"><div class="alert alert-danger"><div class="fa fa-spinner fa-spin"></div> There was an error updating the User</div></div></div>');
                setTimeout(callDtAjax, 1000);
            }

            });
        }
    }

function deleteUser(userId, deleteUserBtn, button){

$('#editUsersModal').modal('show');

if (deleteUserBtn !== 'Edit'){
    $('#users-l').text('Delete User');
    $('.u-btn').html('<button id="delete-user-btn" type="button" name="Delete" class="btn btn-danger btn-sm pull-right s-btn"><i class="fa fa-trash"></i> Delete</button>')
    $('.f-user').attr('id', 'delete-user-form');

    $('.row-user-name').html('<div class="col-md-3"><div class="form-group"><label>Company</label><h6 id="d-hic-name"></h6><input type="hidden" id="d-hic-id" name="id"><span id="d-hic-name-text"></span></div></div></div>');
    
    document.querySelector("#d-hic-id").innerText = button.getAttribute("data-hic-id");
    document.querySelector("#d-hic-name").innerText = button.getAttribute("data-hic-name");

    $('#d-hic-id').attr('value', button.getAttribute("data-hic-id"));

    const d_hic_id = $('#delete-user-form input[name="id"]');
    const dHicId = d_hic_id.val();

    $('#delete-user-btn').on('click', function(){
    
    if (dHicId){
        $.ajax({
            url: '{{ url("/delete-users") }}',
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            dHicId,
            },
            cache: false,
            success: function (html){
                $('.edit-alert-m').html('<div class="row msg-alert"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> User was deleted</div></div></div>');
                setTimeout(callDtAjax, 1000);
            }
        });
    } else {
        $('.edit-alert-m').html('<div class="row msg-alert"><div class="col-md-12 alert-margin"><div class="alert alert-danger"><div class="fa fa-spinner fa-spin"></div> There was an error deleting the User</div></div></div>');
        setTimeout(callDtAjax, 1000);
    }

    });
}
}

    function callDtAjax(){
        $('.msg-alert').remove();
        $('#editUsersModal').modal('hide');
        manageUsers();
    }

</script>