<script type="text/javascript">

function submitBookPassenger(){

    var pFirstName = $('.p-first-name').val();
    var pLastName = $('.p-last-name').val();
    var pAge = $('.p-age').val();
    var pContactNo = $('.p-contact-no').val();
    var pAddress = $('.p-address').val();

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
        var inputGender = $('#male:input[name="user_gender"]');
		gender = inputGender.val();

    } else if (checkFemale == true){
		var inputGender = $('#female:input[name="user_gender"]');
		gender = inputGender.val();
		
	} else {
	    $('#p-gender-text').text('Gender is required').css('color', '#D24D57');
	}

    $('.c-male').on('click', function(){
        var inputGender = $('#male:input[name="user_gender"]');
		gender = inputGender.val();
        $('#p-gender-text').text('');
    });

    $('.c-female').on('click', function(){
        var inputGender = $('#female:input[name="user_gender"]');
		gender = inputGender.val();
        $('#p-gender-text').text('');
    });

}
</script>