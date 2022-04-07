@foreach($bookings as $booking)
<div class="row">
<div class="col-md-3">
    <label for="bookings-name">{{ $booking->firstname }} {{ $booking->lastname }}</label>                                
</div>
<div class="col-md-3">
    <label for="bookings-service-route">{{ $booking->service_route }}</label>                          
</div>
<div class="col-md-2">
    <label for="bookings-client-no">{{ $booking->client_contact_no }}</label>                          
</div>
<div class="col-md-2">
    <label for="bookings-status">{{ $booking->trans_status }}</label>                          
</div>
<div class="col-md-2">
    <label for="delete">
        <button type="button" id="editBookingsButton" class="btn btn-primary fa fa-pencil" 
            onclick="editBookingsModal('{{ $booking->trans_id_no }}', this)" 
            data-bookings-id-no="{{ $booking->trans_id_no }}"
            data-bookings-name="{{ $booking->firstname }} {{ $booking->lastname }}"
            data-bookings-service-route="{{ $booking->service_route }}"
            data-bookings-status="{{ $booking->trans_status }}"
            data-bookings-contact-no="{{ $booking->client_contact_no }}"
            data-bookings-trans-amount="{{ $booking->trans_amount }}"
        > 
        </button>
            <button type="button" id="deleteBookingsButton" class="btn btn-danger fa fa-trash"
            onclick="deleteBookingsModal('{{ $booking->id }}', this)"
            data-bookings-id="{{ $booking->id }}"
            data-bookings-name="{{ $booking->firstname }} {{ $booking->lastname }}" disabled
        >
        </button>
        </label>                          
    </div>
</div>

<div class="modal" id="bookingsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="edit-bookings-icon"> <b><p id="header-label"><i class="fa fa-edit"></i> Update Transaction Status</p></b></div>
<form id="bookings-edit-form">    
{{ csrf_field() }}
<div class="modal-body bt-industry">
    <div class="row skills-form-modal">
        <div class="col-md-3">
            <label>Transaction ID No.</label>
                <input id="edit-bookings-id-no" type="text" class="form-control edit-input" name="trans_id_no" readonly>            
            <span id="edit-bookings-id-no-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label>Passenger Name</label>
            <h3 id="display-bookings-name" style="font-size: 16px; font-weight: bold" class="display-service-type"></h3>
        </div>
        <div class="col-md-3">
            <label>Route</label>
            <h3 id="display-bookings-service-route" style="font-size: 16px; font-weight: bold" class="display-service-route"></h3>
        </div>
        <div class="col-md-3">
            <label>Contact Number</label>
                <h3 id="display-bookings-contact-no" style="font-size: 16px; font-weight: bold" class="display-service-route"></h3>
        </div>
        <div class="col-md-3">
            <label>Fare Amount</label>
                <h3 id="display-bookings-trans-amount" style="font-size: 16px; font-weight: bold" class="display-service-route"></h3>
        </div>
        <div class="col-md-3">
            <label>User Status</label>
               <select id="edit-bookings-status" class="form-control" name="trans_status">    
                    <option value=""></option>
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
               </select>        
            <span id="edit-bookings-status-text" class="span-edit-text"><span>
        </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="edit-trans-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitEditBookings(event)">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>

<div class="modal" id="deleteBookingsModal" role="dialog">
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
    function editBookingsModal(userIdNo, button){
        $('#bookingsModal').modal('show');
        
        $('#edit-bookings-id-no').attr('value', button.getAttribute('data-bookings-id-no')); 
        $('#edit-bookings-status').attr('value', button.getAttribute('data-bookings-status'));
        document.querySelector("#display-bookings-name").innerText = button.getAttribute("data-bookings-name");
        document.querySelector("#display-bookings-trans-amount").innerText = button.getAttribute("data-bookings-trans-amount"); 
        document.querySelector("#display-bookings-contact-no").innerText = button.getAttribute("data-bookings-contact-no");        
        document.querySelector("#display-bookings-service-route").innerText = button.getAttribute("data-bookings-service-route");
    }

    function submitEditBookings(event){
        $('#edit-bookings-btn').attr('disabled', true);
        $('#edit-bookings-status').bind('click', function(){
            $('#edit-bookings-status-text').text('');
            $('#edit-bookings-btn').attr('disabled', false);
        });

        const editTransIdNoVal = $('#bookings-edit-form input[name="trans_id_no"]');
        const e_TransIdNo = editTransIdNoVal.val();

        const editTransStatusVal = $('#edit-bookings-status').val();
        const e_TransStatus = editTransStatusVal;
    
        if (!e_TransStatus){
            $('#edit-bookings-status-text').text('Transaction Status is required').css('color', '#D24D57');
        }

        if (e_TransStatus){
            saveEditBookings();
        }

        function saveEditBookings(){
        $.ajax({
            url: "{{ url('/save-edited-bookings') }}",
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
                $('.edit-bookings-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Transaction was updated</div></div>');
                // setTimeout(linkToDashboard, 3000);
                setTimeout(showListOfBookings, 3000);
                }
            });
        }
    }

    function showListOfBookings(){
        $('#bookingsModal').modal('hide');
        $('#deleteBookingsModal').modal('hide');
        $.ajax({
        url: '{{ url("/list-of-bookings") }}',    
        method: 'GET',
        cache: false,
        success: function (html){
            $('.booking-space').html(html);
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
                $('.delete-icon').after('<div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> This user was deleted</div>');
                // setTimeout(linkToDashboard, 3000);
                setTimeout(showListOfUsers, 3000);
                }
            });
        }
    }
    
</script>



