<div class="row">
    <div class="col-md-3">
        <label for="add-icon"><i class="fa fa-plus"></i> <b><a style="cursor: pointer;" onclick="addSkills(event)">Add New </a></b></label>                                
    </div>
</div>
@foreach($skills as $skill)
<div class="row">
<div class="col-md-3">
    <label for="title">{{ $skill->title }}</label>                                
</div>
<div class="col-md-2">
    <label for="industry">{{ $skill->industry }}</label>                          
</div>
<div class="col-md-5">
    <label for="description">{{ $skill->description }}</label>                          
</div>
<div class="col-md-2">
    <label for="delete">
        <button type="button" id="editButton" class="btn btn-primary fa fa-pencil" 
            onclick="editSkillsModal('{{ $skill->skills_id_no }}', this)" 
            data-skills-no="{{ $skill->skills_id_no }}"
            data-skills-title="{{ $skill->title }}"
            data-skills-industry="{{ $skill->industry }}"
            data-skills-description="{{ $skill->description }}"
        > 
        </button>
            <button type="button" id="deleteSkillsButton" class="btn btn-danger fa fa-trash"
            onclick="deleteSkillsModal('{{ $skill->id }}', this)"
            data-skill-id="{{ $skill->id }}"
            data-skill-title="{{ $skill->title }}"
        >
        </button>
        </label>                          
    </div>
</div>

<div class="modal" id="skillsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="edit-skills-icon"> <b><p id="header-label"><i class="fa fa-edit"></i> Update Service</p></b></div>
<form id="skill-edit-form">    
{{ csrf_field() }}
<div class="modal-body bt-industry">
    <div class="row skills-form-modal">
        <div class="col-md-3">
            <label>Service No.</label>
                <input id="edit-skill-no" type="text" class="form-control edit-input" name="skills_id_no" readonly>            
            <span id="edit-skill-no-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label>Title</label>
                <input id="edit-title" type="text" class="form-control edit-input" name="title">            
            <span id="edit-title-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label>Category</label>
                <input id="edit-industry" type="text" class="form-control edit-input" name="industry">            
            <span id="edit-industry-text" class="span-edit-text"><span>
        </div>
        <div class="col-md-3">
            <label>Description</label>
                <input id="edit-description" type="text" class="form-control edit-input" name="description">                        
            <span id="edit-description-text" class="span-edit-text"><span>
        </div>

            </div>
        </div>
        <div class="modal-footer">
            <button id="edit-skills-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitEditSkills(event)">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>

<div class="modal" id="deleteSkillsModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content pull-right">
    <div class="delete-icon"> <b><p id="header-label"><i class="fa fa-trash"></i> Delete Service</p></b></div>
<form id="skill-delete-form">    
    {{ csrf_field() }}
        <div class="modal-body bt-industry">
        <!-- <p id="modal-label"></p> -->
        <div class="row m-label-margin">
            <div class="col-md-12">
                <label>Are you sure you want to delete this Service?</label>
                    <h3 id="delete-skill-title" style="font-size: 16px; font-weight: bold" class="delete-service-type"></h3>
                    <input id="delete-skill-id" type="hidden" class="form-control edit-input" name="id">            
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button id="delete-skill-btn" type="button" name="delete" class="btn btn-danger btn-sm pull-right" onclick="submitDeleteService(event)">Delete</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</form>

@endforeach

<script type="text/javascript">
    function editSkillsModal(skillsIdNo, button){
        $('#skillsModal').modal('show');
        
        $('#edit-skill-no').attr('value', button.getAttribute('data-skills-no')); 
        $('#edit-title').attr('value', button.getAttribute('data-skills-title'));        
        $('#edit-industry').attr('value', button.getAttribute('data-skills-industry'));
        $('#edit-description').attr('value', button.getAttribute('data-skills-description')); 
    }

    function submitEditSkills(event){
        $('#edit-skills-btn').attr('disabled', true);

        $('#edit-title').bind('keypress', function(){
            $('#edit-title-text').text('');
            $('#edit-skills-btn').attr('disabled', false);
        });

        $('#edit-industry').bind('keypress', function(){
            $('#edit-industry-text').text('');
            $('#edit-skills-btn').attr('disabled', false);
        });

        $('#edit-description').bind('keypress', function(){
            $('#edit-description-text').text('');
            $('#edit-skills-btn').attr('disabled', false);
        });
        
        const editSkillsIdNoVal = $('#skill-edit-form input[name="skills_id_no"]');
        const e_SkillsIdNo = editSkillsIdNoVal.val();
    
        const editTitleVal = $('#skill-edit-form input[name="title"]');
        const e_Title = editTitleVal.val();

        const editIndustry = $('#skill-edit-form input[name="industry"]');
        const e_Industry = editIndustry.val();

        const editDescriptionVal = $('#skill-edit-form input[name="description"]');
        const e_Description = editDescriptionVal.val();

        if (!e_Title){
            $('#edit-title-text').text('Title is required').css('color', '#D24D57');
        }

        if (!e_Industry){
            $('#edit-industry-text').text('Industry is required').css('color', '#D24D57');
        }

        if (!e_Description){
            $('#edit-description-text').text('Description is required').css('color', '#D24D57');
        }

        if (e_Title && e_Industry && e_Description){
            saveEditSkills();
        }

        function saveEditSkills(){
        $.ajax({
            url: "{{ url('/save-edited-skills') }}",
            method: 'POST',
            data: { 
                _token: function() {
                return "{{csrf_token()}}"
            },
            e_SkillsIdNo,
            e_Title,
            e_Industry,
            e_Description
            },
            cache: false,
            success: function (html){
                $('.edit-skills-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Service was updated</div></div>');
                // setTimeout(linkToDashboard, 3000);
                setTimeout(showListOfSkills, 3000);
                }
            });
        }
    }

    function showListOfSkills(){
        $('#skillsModal').modal('hide');
        $('#deleteSkillsModal').modal('hide');
        $.ajax({
        url: '{{ url("/list-of-skills") }}',    
        method: 'GET',
        cache: false,
        success: function (html){
            $('.skill-space').html(html);
            // $('.alert-success').hide();
                }
            });
        }

    function deleteSkillsModal(skillsIdNo, button){
        $('#deleteSkillsModal').modal('show'); 
        $('#delete-skill-id').attr('value', button.getAttribute('data-skill-id'));
        document.querySelector("#delete-skill-title").innerText = button.getAttribute("data-skill-title");
        
    }

    function submitDeleteService(event){

        const skillIdVal = $('#skill-delete-form input[name="id"]');
        const skillId = skillIdVal.val();

        if (skillId){
            deleteService();
        }

        function deleteService(event){
            $.ajax({
                url: "{{ url('/delete-skill-service') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{csrf_token()}}"
                },
                skillId
                },
                cache: false,
                success: function (html){
                    $('.delete-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> This service was deleted</div></div>');
                    // setTimeout(linkToDashboard, 3000);
                    setTimeout(showListOfSkills, 3000);
                }
            });
        }
    }
    
</script>



