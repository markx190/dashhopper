<form id="add-skills-form">
<div class="row skill-form">
	<div class="col-md-3">
		<label for="title">Title:</label>
    <input id="title" type="text" class="form-control" name="title">
    <span id="skill-title-text">
</div>
<div class="col-md-3">
	<label for="industry">Category:</label>
        <input id="industry" type="text" class="form-control" name="industry">
    <span id="skill-industry-text">
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="description">Description:</label>                          
            <input id="description" type="text" class="form-control" name="description">
            <span id="skill-description-text">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button id="skill-submit-btn" type="button" class="btn btn-primary pull-right" id="submit-button" onclick="submitSkills(event)">Submit</button>                      
	    </div>
    </div>
</form> 

<script>

    function submitSkills(event){
        event.preventDefault();
        $('#skill-submit-btn').attr('disabled', true);  

        $('#title').bind('keypress', function(){
        $('#skill-title-text').text('');
        $('#skill-submit-btn').attr('disabled', false);              
        });

        $('#industry').bind('keypress', function(){
        $('#skill-industry-text').text('');
        $('#skill-submit-btn').attr('disabled', false);              
        });

        $('#description').bind('keypress', function(){
        $('#skill-description-text').text('');
        $('#skill-submit-btn').attr('disabled', false);              
        });

        const inputTitle = $('#add-skills-form input[name="title"]');
        const title = inputTitle.val();

        const inputIndustry = $('#add-skills-form input[name="industry"]');
        const industry = inputIndustry.val();

        const inputDescription = $('#add-skills-form input[name="description"]');
        const description = inputDescription.val();

        if(!title){
            $('#skill-title-text').text('Title is required').css('color', '#D24D57');
        }

        if(!industry){
            $('#skill-industry-text').text('Category is required').css('color', '#D24D57');
        }

        if(!description){
            $('#skill-description-text').text('Description is required').css('color', '#D24D57');
        }
        
        if (title && description){
            saveSkills();
        }

        function saveSkills(){
        $.ajax({
            url: '{{ url("/admin-add-skills") }}',
            data: { 
                _token: function() {
                    return "{{csrf_token()}}"
            },
            title,
            industry,
            description
            },
            method: 'POST',
            cache: false,
            success: function (html){
                $('.skill-well').after('<div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> New Service was created</div>');
                // setTimeout(window.location.href = '/admin_dashboard', 3000):
                setTimeout(showListOfSkills, 3000);
                }
            });
        }

        function showListOfSkills(){
            $.ajax({
            url: '{{ url("/list-of-skills") }}',    
            method: 'GET',
            cache: false,
            success: function (html){
                $('.skill-space').html(html);
                $('.alert-success').hide();
            }
            });
        }
    }


</script>




