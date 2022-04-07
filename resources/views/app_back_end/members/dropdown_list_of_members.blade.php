<label><span id="notif-label"><b>Notifications</b></span></label>
    @foreach($dropDowns as $notif)
    <li class="drop-down-notif list" style="width: 30em;">
        <form id="read-form">
            <a class="member-notif" style="cursor: pointer; text-decoration: none;" 
                onclick="seenHospitalsRegistrations('{{ $notif->hic_id_no }}', 'Seen', this)"
                data-notif-id-no="{{ $notif->hic_id_no }}"
                data-notif-name="{{ $notif->hic_name }}"
            >
                <h6 id="hic-name-l"><i class="fa fa-check-circle check" aria-hidden="true"></i> {{ $notif->hic_name }} joined
                {{$notif->created_at->diffForHumans()}}                                                               
                </h6>
            </a>
        </form>
    </li>
@endforeach

<script>

    $('#hic-name-l').hover(function(){
        $(this).css('color', '#D24D57');
    }, function(){
        $(this).css('color', '#212529');
    });

    function seenHospitalsRegistrations(hicId, seenStatus, a){
        $.ajax({
            url: "{{ url('/seen-members-registrations') }}/" + hicId,
            method: 'POST',
            dataType: 'JSON',
            cache: false,
            data: { 
		    _token: function() {
                return "{{csrf_token()}}"
            },
            hicId,
            seenStatus
        },
        success: function(response){
            const hicIdNo = response.hic_id_no;
            openMembersRegistrations(hicIdNo, a);
            }
        });
    }

    function openMembersRegistrations(hicIdNo, a){
        $('#membersRegModal').modal('show');
        $('#new-hic-id-no').attr('value', a.getAttribute('data-notif-id-no'));
        $('#new-hic-name').attr('value', a.getAttribute('data-notif-name')); 
        document.querySelector("#new-hic-member").innerText = a.getAttribute("data-notif-name");
    }

    function submitAcceptedMembers(event){
        event.preventDefault();
        const hicName = $('#accept-members-form input[name="hic_name"]');
        const hic_name = hicName.val();
        const acceptIdNo = $('#accept-members-form input[name="hic_id_no"]');
        const accept_id_no = acceptIdNo.val();

        const acceptHicStatus = $('#accept-members-form input[name="hic_user_status"]');
        const accept_status = acceptHicStatus.val();
    
        if (accept_id_no && accept_status){
            saveAcceptedMembers();
        }

        function saveAcceptedMembers(){
        $.ajax({
            url: "{{ url('/save-accepted-members') }}",
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            accept_id_no,
            accept_status
            },
            cache: false,
            dataType: 'JSON',
            success: function (response){
                if (response == 'Saved') {
                    $('.alert-a').html('<div class="col-md-12 accept-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> ' + hic_name + ' was accepted</div></div>');
                    setTimeout(manageUsers, 3000);
                } else {
                    $('.alert-a').html('<div class="col-md-12 accept-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> An error was found upon saving.</div></div>');
                    setTimeout(manageUsers, 3000);
                }
            }

            });
        }
    }

    function manageUsers(event){
        $('.accept-margin').remove();
        $('#membersRegModal').modal('hide');
        $.ajax({
            url: '{{ url("/manage-users") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.area-chart').hide();
                $('.bar-chart').hide();
                $('.mb-space').html(html);
                $('.card-body').hide();
                $('.table').hide();
                $('.users-spinner').html('<div class="row spinner-red-users"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicUsersDataTable, 1000);
            }
        });   
    }

</script>
