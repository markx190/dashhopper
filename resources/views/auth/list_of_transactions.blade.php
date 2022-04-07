@foreach($transactions as $trans)
<div class="row">
<div class="col-md-3">
    <label for="trans-name">{{ $trans->firstname }} {{ $trans->lastname }}</label>                                
</div>
<div class="col-md-3">
    <label for="trans-service-route">{{ $trans->service_route }}</label>                          
</div>
<div class="col-md-2">
    <label for="trans-client-no">{{ $trans->client_contact_no }}</label>                          
</div>
<div class="col-md-2">
    <label for="trans-status">{{ $trans->trans_status }}</label>                          
</div>
<div class="col-md-2">
    <label for="delete">
        <button type="button" id="editTransButton" class="btn btn-primary fa fa-pencil" 
            onclick="editTransModal('{{ $trans->trans_id_no }}', this)" 
            data-trans-id-no="{{ $trans->trans_id_no }}"
            data-trans-name="{{ $trans->firstname }} {{ $trans->lastname }}"
            data-trans-service-route="{{ $trans->service_route }}"
            data-trans-status="{{ $trans->trans_status }}"
            data-trans-contact-no="{{ $trans->client_contact_no }}"
        > 
        </button>
            <button type="button" id="deleteTransButton" class="btn btn-danger fa fa-trash"
            onclick="deleteTransModal('{{ $trans->id }}', this)"
            data-trans-id="{{ $trans->id }}"
            data-trans-name="{{ $trans->firstname }} {{ $trans->lastname }}" disabled
        >
        </button>
        </label>                          
    </div>
</div>

<div class="modal" id="transModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="edit-trans-icon"> <b><p id="header-label"><i class="fa fa-edit"></i> Update Transaction Status</p></b></div>
<form id="trans-edit-form">    
{{ csrf_field() }}
<div class="modal-body bt-industry">
    <div class="row skills-form-modal">
        <div class="col-md-3">
            <label>Transaction ID No.</label>
                <input id="edit-trans-id-no" type="text" class="form-control edit-input" name="trans_id_no" readonly>            
            <span id="edit-trans-id-no-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label>Passenger Name</label>
            <h3 id="display-trans-name" style="font-size: 16px; font-weight: bold" class="delete-service-type"></h3>
        </div>
        <div class="col-md-3">
            <label>Route</label>
            <h3 id="display-trans-service-route" style="font-size: 16px; font-weight: bold" class="delete-service-route"></h3>
        </div>
        <div class="col-md-3">
            <label>User Status</label>
               <select id="edit-trans-status" class="form-control" name="trans_status">    
                    <option value="Unpaid">Unpaid</option>
                    <option value="Paid">Paid</option>
                    <option value="Suspended">Suspended</option>
               </select>        
            <span id="edit-trans-status-text" class="span-edit-text"><span>
        </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="edit-trans-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitEditTrans(event)">Save</button>
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
    function editTransModal(userIdNo, button){
        $('#transModal').modal('show');
        
        $('#edit-trans-id-no').attr('value', button.getAttribute('data-trans-id-no')); 
        $('#edit-trans-status').attr('value', button.getAttribute('data-trans-status'));
        document.querySelector("#display-trans-name").innerText = button.getAttribute("data-trans-name");
        document.querySelector("#display-trans-service-route").innerText = button.getAttribute("data-trans-service-route");

    }

    function submitEditTrans(event){
        $('#edit-trans-btn').attr('disabled', true);

        $('#edit-trans-status').bind('click', function(){
            $('#edit-trans-status-text').text('');
            $('#edit-trans-btn').attr('disabled', false);
        });

        const editTransIdNoVal = $('#trans-edit-form input[name="trans_id_no"]');
        const e_TransIdNo = editTransIdNoVal.val();

        console.log('trans id: ', e_TransIdNo);

        const editTransStatusVal = $('#edit-trans-status').val();
        const e_TransStatus = editTransStatusVal;

        console.log('trans status: ', e_TransStatus);
        
        if (!e_TransStatus){
            $('#edit-trans-status-text').text('Transaction Status is required').css('color', '#D24D57');
        }

        if (e_TransStatus){
            saveEditTrans();
        }

        function saveEditTrans(){
        $.ajax({
            url: "{{ url('/save-edited-transactions') }}",
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            e_TransIdNo,
            e_TransStatus
            },
            cache: false,
            success: function (html){
                $('.edit-trans-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Transaction was updated</div></div>');
                // setTimeout(linkToDashboard, 3000);
                setTimeout(showListOfTransactions, 3000);
                }
            });
        }
    }

    function showListOfTransactions(){
        $('#transModal').modal('hide');
        $('#deleteTransModal').modal('hide');
        $.ajax({
        url: '{{ url("/list-of-transactions") }}',    
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
                    $('.delete-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> This user was deleted</div>');
                    // setTimeout(linkToDashboard, 3000);
                    setTimeout(showListOfUsers, 3000);
                }
            });
        }
    }
    
</script>



