@foreach($dropDowns as $book)
<li class="drop-down-notif">
    <form id="read-form">
    <a class="item-notif" style="cursor: pointer;" 
        onclick="readCustomerBooking('{{ $book->trans_id_no }}', 'Read', this)"
        
        data-bookings-id-no="{{ $book->trans_id_no }}"
        data-bookings-name="{{ $book->firstname }} {{ $book->lastname }}"
        data-bookings-service-route="{{ $book->service_route }}"
        data-bookings-status="{{ $book->trans_status }}"
        data-bookings-contact-no="{{ $book->client_contact_no }}"
        data-bookings-trans-amount="{{ $book->trans_amount }}"
        data-date-of-travel="{{ $book->book_month }} {{ $book->book_day }}, {{ $book->book_year }} - {{ $book->book_hour }} {{ $book->day_format }}"
        data-pickup-location="{{ $book->pickup_location }}"
        
        >
        <i class="fa fa-check-circle check" aria-hidden="true"> </i> {{ $book->firstname }} {{ $book->lastname }} hires you. 
        <br><span id="diff">{{$book->created_at->diffForHumans()}}</span>
    </a>
    </form>
</li>

@endforeach

<script type="text/javascript">

    function readCustomerBooking(transId, readStatus, a){
        $.ajax({
            url: "{{ url('/read-customer-booking') }}/" + transId,
            method: 'POST',
            dataType: 'JSON',
            cache: false,
            data: { 
		    _token: function() {
                return "{{csrf_token()}}"
            },
            transId,
            readStatus
        },
        success: function(response){
            const transIdNo = response.trans_id_no;
            openCustomerBooking(transIdNo, a);
            }
        });
    }
    
    $('.item-notif').on('click', function(){
        $('body').removeClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('fa-bars fa-times');        
        $('.mobile-nav-overly').fadeOut();
    });

    function openCustomerBooking(transId, a){
        $('#customerBookingModal').modal('show');
        
        $('#d-bookings-id-no').attr('value', a.getAttribute('data-bookings-id-no')); 
        // $('#d-accept-status').attr('value', a.getAttribute('data-bookings-status'));
        document.querySelector("#d-bookings-name").innerText = a.getAttribute("data-bookings-name");
        document.querySelector("#d-bookings-trans-amount").innerText = a.getAttribute("data-bookings-trans-amount"); 
        document.querySelector("#d-bookings-contact-no").innerText = a.getAttribute("data-bookings-contact-no");        
        document.querySelector("#d-bookings-service-route").innerText = a.getAttribute("data-bookings-service-route");
        document.querySelector("#cus-id-no").innerText = a.getAttribute("data-bookings-id-no");
        document.querySelector("#d-date-of-travel").innerText = a.getAttribute("data-date-of-travel"); 
        document.querySelector("#d-pickup-location").innerText = a.getAttribute("data-pickup-location"); 
                
    }

    function submitAcceptBooking(event){
        event.preventDefault();

        const editTransIdNoVal = $('#cb-edit-form input[name="trans_id_no"]');
        const c_TransIdNo = editTransIdNoVal.val();

        const editTransStatusVal = $('#cb-edit-form input[name="trans_status"]');
        const c_TransStatus = editTransStatusVal.val();
    
        if (c_TransStatus && c_TransIdNo){
            saveAcceptBooking();
        }

        function saveAcceptBooking(){
        $.ajax({
            url: "{{ url('/save-accepted-booking') }}",
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            c_TransIdNo,
            c_TransStatus
            },
            cache: false,
            dataType: 'JSON',
            success: function (response){
                if (response == 'Saved') {
                    $('.edit-bookings-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> You have accepted the Booking. You can call the passenger.</div></div>');
                    setTimeout(showListOfBookings, 3000);
                } else {
                    $('.edit-bookings-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> There was an error in your Booking</div></div>');
                    setTimeout(showListOfBookings, 3000);
                }
            }

            });
        }

        function showListOfBookings(){
        $('#customerBookingModal').modal('hide');
        $('.alert-margin').hide();
        $.ajax({
        url: '{{ url("/list-of-bookings") }}',    
        method: 'GET',
        cache: false,
        success: function (html){
            $('.booking-space').html(html);
            }
        });
        }
    }

    $('.item-notif').hover(function(){
    $(this).css('color', '#D24D57');
    }, function(){
    $(this).css('color', '#212529');
    });

</script>






