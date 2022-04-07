<div class="container">
	<header class="section-header">
        <h2 style="text-align: center; font-size: 22px;">Update your profile picture<br>
        <br>
    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:145px; height:132px; image-align:center; border-radius:50%"></h2>
</header>
<hr>
<i class="ion-ios-upload-outline" style="color: #003171;"></i><b> Upload Photo </b> (Accepted image type: jpg, jpeg, png. Should not exceed 300kb.)
<br />
@include('partials._messages_update_profile_picture')
<form id="form-upload" enctype="multipart/form-data" method="POST">
{{ csrf_field() }}
<div class="row">
	<div class="col-md-6">
		<input id="inputFile" type="file" name="avatar" class="form-control">
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<input id="uploadBtn" type="submit" name="upload" value="Save" class="btn btn-primary pull-right">
		    </form>
		</div>	
	<div>
</div>

<script>
$(document).ready(function(){
    $('#form-upload').on('submit', function(event){
		event.preventDefault();
        
        const inputFile = $('#form-upload input[name="avatar"]').val();
        if (!inputFile){
            $('#inputFile').after('<span id="inputText" style="color:#FF0000">Sorry, you need to choose a file / image</span>');
			$('#uploadBtn').attr('disabled', true);
        }

		$('input').bind('click', function(){
            $('#uploadBtn').attr('disabled', false);
			$('#inputText').text('');
            $('#uploadError').text('');
            $('#fileError').text('');
		});

        if (inputFile){

        $.ajax({
        url:"{{ url('/upload-avatar') }}",
        method:"POST",
        data:new FormData(this),
        contentType: false,
        cache: false,
        dataType: 'JSON',
        processData: false,
        success:function(data)
            {
                console.log(data.errorStatus);
                if (data.errorStatus == 1){
                    $('#inputFile').after('<span id="fileError" style="color: red;">An error was found while uploading the image (check: file type or maybe the file size exceeded.)</span>');
                    $('#uploadBtn').attr('disabled', true);
                } else if (data.errorStatus == 0){
                    goToPreferences();
                }
                
            }
        })
    }
	});

    function goToPreferences(){
        window.location.href = '/preferences';
    }

});
</script>
