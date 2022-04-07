@foreach($users as $user)
<div class="row">
<div class="col-md-3">
    <label for="user-name">{{ $user->firstname }} {{ $user->lastname }}</label>                                
</div>
<div class="col-md-3">
    <label for="user-skills">{{ $user->skills }}</label>                          
</div>
<div class="col-md-2">
    <label for="user-mobile-no">{{ $user->mobile_no }}</label>                          
</div>
<div class="col-md-2">
    <label for="user-status">{{ $user->user_status }}</label>                          
</div>
<div class="col-md-2">
    <label for="delete">
        <button type="button" id="editUsersButton" class="btn btn-primary fa fa-pencil" 
            onclick="editUsersModal('{{ $user->user_id_no }}', this)" 
            data-user-id-no="{{ $user->user_id_no }}"
            data-user-name="{{ $user->firstname }} {{ $user->lastname }}"
            data-user-skills="{{ $user->skills }}"
            data-user-status="{{ $user->status }}"
            data-user-mobile-no="{{ $user->mobile_no }}"
        > 
        </button>
            <button type="button" id="deleteUsersButton" class="btn btn-danger fa fa-trash"
            onclick="deleteUsersModal('{{ $user->id }}', this)"
            data-user-id="{{ $user->id }}"
            data-user-name="{{ $user->firstname }} {{ $user->lastname }}"
        >
        </button>
        </label>                          
    </div>
</div>

<div class="modal" id="usersModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="edit-users-icon"> <b><p id="header-label"><i class="fa fa-edit"></i> Update User Status</p></b></div>
<form id="user-edit-form">    
{{ csrf_field() }}
<div class="modal-body bt-industry">
    <div class="row skills-form-modal">
        <div class="col-md-3">
            <label>User ID No.</label>
                <input id="edit-user-id-no" type="text" class="form-control edit-input" name="user_id_no" readonly>            
            <span id="edit-user-id-no-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label>Name</label>
            <h3 id="display-user-name" style="font-size: 16px; font-weight: bold" class="delete-service-type"></h3>
        </div>
        <div class="col-md-3">
            <label>User Status</label>
               <select id="edit-user-status" class="form-control" name="user_status">    
                    <option value="New Applicant">New Applicant</option>
                    <option value="Verified">Verified</option>
                    <option value="Suspended">Suspended</option>
               </select>        
            <span id="edit-user-status-text" class="span-edit-text"><span>
        </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="edit-users-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitEditUsers(event)">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>

<div class="modal" id="deleteUsersModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content pull-right">
    <div class="delete-icon"> <b><p id="header-label"><i class="fa fa-trash"></i> Delete User</p></b></div>
<form id="user-delete-form">    
    {{ csrf_field() }}
        <div class="modal-body bt-industry">
        <!-- <p id="modal-label"></p> -->
        <div class="row m-label-margin">
            <div class="col-md-12">
                <label>Are you sure you want to delete this User?</label>
                    <h3 id="delete-user-name" style="font-size: 16px; font-weight: bold" class="delete-user"></h3>
                    <input id="delete-user-id" type="hidden" class="form-control edit-input" name="id">            
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button id="delete-user-btn" type="button" name="delete" class="btn btn-danger btn-sm pull-right" onclick="submitDeleteUser(event)">Delete</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>

@endforeach

<script type="text/javascript">
    function editUsersModal(userIdNo, button){
        $('#usersModal').modal('show');
        
        $('#edit-user-id-no').attr('value', button.getAttribute('data-user-id-no')); 
        $('#edit-user-status').attr('value', button.getAttribute('data-user-status'));
        document.querySelector("#display-user-name").innerText = button.getAttribute("data-user-name");
    }

    function submitEditUsers(event){
        $('#edit-users-btn').attr('disabled', true);

        $('#edit-user-status').bind('click', function(){
            $('#edit-user-status-text').text('');
            $('#edit-users-btn').attr('disabled', false);
        });

        
        const editUsersIdNoVal = $('#user-edit-form input[name="user_id_no"]');
        const e_UserIdNo = editUsersIdNoVal.val();
        console.log('user id no: ', e_UserIdNo);

        const editUsersStatusVal = $('#edit-user-status').val();
        const e_UserStatus = editUsersStatusVal;
        
        if (!e_UserStatus){
            $('#edit-user-status-text').text('User Status is required').css('color', '#D24D57');
        }

        if (e_UserStatus){
            saveEditUsers();
        }

        function saveEditUsers(){
        $.ajax({
            url: "{{ url('/save-edited-users') }}",
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            e_UserIdNo,
            e_UserStatus
            },
            cache: false,
            success: function (html){
                $('.edit-users-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> User was updated</div>');
                // setTimeout(linkToDashboard, 3000);
                setTimeout(showListOfUsers, 3000);
                }
            });
        }
    }

    function showListOfUsers(){
        $('#usersModal').modal('hide');
        $('#deleteUsersModal').modal('hide');
        $.ajax({
        url: '{{ url("/list-of-users") }}',    
        method: 'GET',
        cache: false,
        success: function (html){
            $('.skill-space').html(html);
            // $('.alert-success').hide();
                }
            });
        }

    function deleteUsersModal(skillsIdNo, button){
        $('#deleteUsersModal').modal('show'); 
        $('#delete-user-id').attr('value', button.getAttribute('data-user-id'));
        document.querySelector("#delete-user-name").innerText = button.getAttribute("data-user-name");
    }

    function submitDeleteUser(event){

        const userIdVal = $('#user-delete-form input[name="id"]');
        const userId = userIdVal.val();

        if (userId){
            deleteUser();
        }

        function deleteUser(event){
            $.ajax({
                url: "{{ url('/delete-users') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{csrf_token()}}"
                },
                userId
                },
                cache: false,
                success: function (html){
                    $('.delete-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> This user was deleted</div></div>');
                    // setTimeout(linkToDashboard, 3000);
                    setTimeout(showListOfUsers, 3000);
                }
            });
        }
    }
    
</script>



