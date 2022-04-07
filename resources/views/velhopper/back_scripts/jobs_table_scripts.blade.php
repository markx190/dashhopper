<script>

function viewListOfJobs(event){
    event.preventDefault();
        $.ajax({
        url: '{{ url("/manage-jobs") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadJobsDataTable, 1000);
        }
    });
}

function loadJobsDataTable(){
    $('.spinner-red-docs').hide();
    $('.docs-body').show();
    $('#jobs-table').DataTable().destroy();
        table = $('#jobs-table').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': '{{ url("/jobs-datatables") }}',
                "data" : {
                    // "onlineFrom": fromVal,
                    // "onlineTo": toVal,
                    // "_token"	: "{{ csrf_token() }}"
	    		}
            },
            columnDefs: [
                { className: 'dt-body-center', targets: 3 },
                { targets: 3, orderable: false },
                { width: 80, targets: 0 },
                { width: 180, targets: 1 },
                { width: 140, targets: 2 },
                { width: 90, targets: 3 }
            ],
            
            columns:[
            {
                data: 'position_id_no',
                name: 'position_id_no'
            },
            {
                data: 'position_name',
                name: 'position_name'
            },
            {
                data: 'position_type',
                name: 'position_type'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });   
}

function addJob(){

    $('#addJobModal').modal('show');
    $('.submitJob').on('click', function(){

        const jobName = $('.job-name').val();
        const positionType = $('.position-type').val();
        
        if (!jobName){
            $('#a-jobname-text').text('* Job name is required').css('color', '#D24D57');
            $('#submit-job-btn').attr('disabled', true);
        }

        $('.job-name').bind('click', function(){
            $('#a-jobname-text').text('');
            $('#submit-job-btn').attr('disabled', false);
        });

        if (!positionType){
            $('#a-position-type-text').text('* Position Type is required').css('color', '#D24D57');
            $('#submit-job-btn').attr('disabled', true);
        }

        $('.position-type').bind('click', function(){
            $('#a-position-type-text').text('');
            $('#submit-job-btn').attr('disabled', false);
        });

        if(jobName && positionType){
            saveJob();
        }
    
    function saveJob(){
            $.ajax({
                url: "{{ url('/add-job') }}",
                method: 'POST',
                data: { 
                    _token: function() {
                    return "{{ csrf_token() }}"
                },
                jobName,
                positionType,
              
                },
                cache: false,
                success:function(html){
            
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Job was successfully created.</div></div></div>'); 
                setTimeout(goToListOfJobs, 3000);
                }
            });
        }
    });
}

var jobId = '';
function editJob(button){

    $('#editJobModal').modal('show');
    $('#e-job-name').attr('value', button.getAttribute('data-jobs-position-name'));
    console.log(button.getAttribute('data-jobs-position-name'));
    jobId = button.getAttribute('data-jobs-id');
    console.log(jobId);
    var positionVal = button.getAttribute('data-jobs-position-type');
    console.log(positionVal);
    
    $('.edit-position-type').html('<select id="positionType" class="form-control new-position-type" name="position_type"><option value="'+ positionVal +'">'+ positionVal +'</option><option></option><option value="Administrative">Administrative</option><option value="Clinical">Clinical</option><option value="Nursing">Nursing</option></select>');

    $('.editJob').on('click', function(){

    const eJobName = $('.edit-job-name').val();
    const ePositionType = $('.edit-position-type').val();
    console.log('ePositionType: ', ePositionType);
    
    if (!eJobName){
        $('#e-jobname-text').text('* Job name is required').css('color', '#D24D57');
        $('#edit-job-btn').attr('disabled', true);
    }

    $('.edit-job-name').bind('click', function(){
        $('#e-jobname-text').text('');
        $('#edit-job-btn').attr('disabled', false);
    });

    if (!ePositionType){
        $('#e-position-type-text').text('* Position Type is required').css('color', '#D24D57');
        $('#edit-job-btn').attr('disabled', true);
    }

    $('.edit-position-type').bind('click', function(){
        alert('ann');
        $('#e-position-type-text').text('');
        $('#edit-job-btn').attr('disabled', false);
    });

    if(jobId && eJobName && ePositionType){
        saveUpdatedJob();
    }

    function saveUpdatedJob(){
        console.log('id: ', jobId);
        $.ajax({
            url: "{{ url('/edit-job') }}",
                method: 'POST',
                data: { 
                _token: function() {
                return "{{ csrf_token() }}"
            },
            jobId,
            eJobName,
            ePositionType,
          
            },
            cache: false,
            success:function(html){
                $('.edit-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Job was successfully updated.</div></div></div>'); 
                setTimeout(goToListOfJobs, 3000);
                }
            });
        }
    });
}

var dJobId = '';
function deleteJob(button){

    $('#deleteJobModal').modal('show');
    $('#position-name-label').text(button.getAttribute('data-jobs-position-name'));
    dJobId = button.getAttribute('data-jobs-id');
    
    $('.deleteJob').on('click', function(){
    
    if(dJobId){
        saveDeletedJob();
    }

    function saveDeletedJob(){
        $.ajax({
            url: "{{ url('/delete-job') }}",
                method: 'POST',
                data: { 
                _token: function() {
                return "{{ csrf_token() }}"
            },
            dJobId
            },
            cache: false,
            success:function(html){
                $('.delete-alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Job was Deleted.</div></div></div>'); 
                setTimeout(goToListOfJobs, 3000);
                }
            });
        }
    });
}

function goToListOfJobs(){
    $('#addJobModal').modal('hide');
    $('#editJobModal').modal('hide');
    $('#deleteJobModal').modal('hide');

        $.ajax({
        url: '{{ url("/manage-jobs") }}',
        method: 'GET',
        cache: false,
        success: function(html){
            $('.main-d').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadJobsDataTable, 1000);
        }
    });
}


</script>