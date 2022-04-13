<script type="text/javascript">
    
    function viewListOfUsers(event){
        $.ajax({
            url: '{{ url("/manage-users") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/app_back_styles/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadUsersDataTable, 1000);
            }
        });   
    }
    
    var accountTypeVal = '';
    var positionVal = '';
    function filterClientUsers(event){
        event.preventDefault();
        accountTypeVal = $('.account-type').val();
        positionVal = $('.dash-position').val();
        // const toVal = $('.to-date').val();
        // console.log('to: ', toVal);
        $('#btnSearchUsers').attr('disabled', true);

        if (!accountTypeVal){
            $('#account-type-text').text('Please fill in this field').css('color', '#CF000F');
        }

        $('#account-type').bind('click', function(){
            $('#account-type-text').text('');
            $('#btnSearchUsers').attr('disabled', false);
        });

        loadUsersDataTable(accountTypeVal, positionVal);
    }

    function loadUsersDataTable(){        
        $('.spinner-red-users').hide();
        $('.card-body').show();
        $('.table').show();
        $('#users-datatable').DataTable().destroy();
        table = $('#users-datatable').DataTable({
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
                    "userAccountType": accountTypeVal,
                    "userPosition": positionVal,
                    "_token"	: "{{csrf_token()}}"
	    		}
            },
            columnDefs: [
                { width: 100, targets: 1, orderable: true },
                { width: 90, targets: 2, orderable: true },
                { width: 90, targets: 3, orderable: true },
                { width: 90, targets: 4, orderable: false },
                { className: 'dt-body-center', targets: 4 }
            ],
            columns:[
            {
                data: 'user_firstname',
                name: 'user_firstname'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'user_account_type',
                name: 'user_account_type'
            },
            {
                data: 'hic_position',
                name: 'hic_position'
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
                        setTimeout(goToListOfUsers, 1000);
                    }
                });
            } else {
                $('.edit-alert-m').html('<div class="row msg-alert"><div class="col-md-12 alert-margin"><div class="alert alert-danger"><div class="fa fa-spinner fa-spin"></div> There was an error updating the User</div></div></div>');
                setTimeout(goToListOfUsers, 1000);
            }

            });
        }
    }

var dUserId = '';
function deleteUserModal(button){
    $('#deleteUserModal').modal('show');
    document.querySelector("#d-user-name").innerText = button.getAttribute("data-function");
    // dUserId = button.getAttribute("data-e-hic-id");

    $('#delete-user-button').on('click', function(){
    const dUserId = button.getAttribute("data-e-hic-id");
    console.log('idx: ', dUserId);
    if (dUserId){
        callDeleteUser();
    }
    function callDeleteUser(){
        $.ajax({
            url: '{{ url("/delete-users") }}',
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            dUserId,
            },
            cache: false,
            success: function (html){
                $('.delete-alert-m').html('<div class="row delete-alert-m"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div>A User was deleted</div></div></div>');
                setTimeout(showListOfUsers, 1000);
            }
        });
       
        }
    });

}

function goToListOfUsers(){
    $('#deleteUserModal').modal('hide');
    $('#editUsersModal').modal('hide');
    $('.msg-alert').remove();
    $('.delete-alert-m').remove();
        $.ajax({
            url: '{{ url("/manage-users") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadUsersDataTable, 1000);
        }
    });   
}

function showListOfUsers(){
    $('#deleteUserModal').modal('hide');
    $('#editUsersModal').modal('hide');
    $('.msg-alert').remove();
    $('.delete-alert-m').remove();
        $.ajax({
            url: '{{ url("/manage-users") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadUsersDataTable, 1000);
        }
    });   
}

</script>