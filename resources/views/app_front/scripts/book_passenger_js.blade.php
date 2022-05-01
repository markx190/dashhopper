<script type="text/javascript">

function submitBookPassenger(){
    var pTravelIdNo = $('.p-travel-id-no').val();
    var pBusNo = $('.p-bus-number').val();
    var pSeatNo = $('.p-seat-no').val();
    var pBusIdNo = $('.p-bus-id-no').val();
    var pBusType = $('.p-bus-type').val();
    var pCompanyName = $('.p-company-name').val();
    var pFirstName = $('.p-first-name').val();
    var pMiddleName = $('.p-middle-name').val();
    var pLastName = $('.p-last-name').val();
    var pAge = $('.p-age').val();
    var pContactNo = $('.p-contact-no').val();
    var pAddress = $('.p-address').val();
    var pOriginAddress = $('.p-origin-address').val();
    var pDestinationAddress = $('.p-destination-address').val();
    var pSiteTerminal = $('.p-site-terminal').val();
    var pFareAmount = $('.p-fare-amount').val();
    var pTravelDate = $('.p-travel-date').val();
    var pTravelTime = $('.p-travel-time').val();
    var pTimeAp = $('.p-time-ap').val();

    const checkMale = $('#male:input:radio').is(':checked');
	const checkFemale = $('#female:input:radio').is(':checked');
    
    if (!pFirstName){
        $('#p-first-name-text').text('Firstname is Required').css('color', '#D24D57');
        $('#book-passenger-btn').attr('disabled', true);
    }

    $('.p-first-name').bind('click', function(){
        $('#p-first-name-text').text('');
        $('#book-passenger-btn').attr('disabled', false);
    });

    if (!pLastName){
        $('#p-last-name-text').text('Lastname is Required').css('color', '#D24D57');
        $('#book-passenger-btn').attr('disabled', true);
    }

    $('.p-last-name').bind('click', function(){
        $('#p-last-name-text').text('');
        $('#book-passenger-btn').attr('disabled', false);
    });

    if (!pAge){
        $('#p-age-text').text('Age is Required').css('color', '#D24D57');
        $('#book-passenger-btn').attr('disabled', true);
    }

    $('.p-age').bind('click', function(){
        $('#p-age-text').text('');
        $('#book-passenger-btn').attr('disabled', false);
    });

    if (!pContactNo){
        $('#p-contact-no-text').text('Contact Number is Required').css('color', '#D24D57');
        $('#book-passenger-btn').attr('disabled', true);
    }

    $('.p-contact-no').bind('click', function(){
        $('#p-contact-no-text').text('');
        $('#book-passenger-btn').attr('disabled', false);
    });

    if (!pAddress){
        $('#p-address-text').text('Address is Required').css('color', '#D24D57');
        $('#book-passenger-btn').attr('disabled', true);
    }

    $('.p-address').bind('click', function(){
        $('#p-address-text').text('');
        $('#book-passenger-btn').attr('disabled', false);
    });

    var gender = '';
    if (checkMale == true){
        var inputGender = $('#male:input[name="gender"]');
		gender = inputGender.val();

    } else if (checkFemale == true){
		var inputGender = $('#female:input[name="gender"]');
		gender = inputGender.val();
		
	} else {
	    $('#p-gender-text').text('Gender is required').css('color', '#D24D57');
	}

    $('.c-male').on('click', function(){
        var inputGender = $('#male:input[name="gender"]');
		gender = inputGender.val();
        $('#p-gender-text').text('');
    });

    $('.c-female').on('click', function(){
        var inputGender = $('#female:input[name="gender"]');
		gender = inputGender.val();
        $('#p-gender-text').text('');
    });

    if(pFirstName && pLastName && pAge && pContactNo && pAddress){
        callAddPassenger();
    }
    var refNumber = '';
    function callAddPassenger(){
        $.ajax({
            url: "{{ url('/add_passenger') }}",
                method: 'POST',
                data: { 
                _token: function() {
                return "{{ csrf_token() }}"
            },
            pTravelIdNo,
            pBusNo,
            pSeatNo,
            pBusIdNo,
            pBusType,
            pCompanyName,
            pFirstName,
            pMiddleName,
            pLastName,
            pAge,
            gender,
            pContactNo,
            pAddress,
            pOriginAddress,
            pDestinationAddress,
            pSiteTerminal,
            pFareAmount,
            pTravelDate,
            pTravelTime,
            pTimeAp
            },
            cache: false,
            dateType: 'JSON',
            success:function(response){
                refNumber = response;
                $('.book-confirm').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Thank you, your booking has been processed</div></div></div>'); 
                setTimeout(redirectToHome, 3000);
            }
        });
    }
    function redirectToHome(){
        window.location.href = "/complete_your_booking/"+ refNumber;
    }
}
</script>