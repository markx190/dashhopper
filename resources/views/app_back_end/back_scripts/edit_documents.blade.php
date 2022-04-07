<script>
    
    function editDocuments(hicId, docsBtn, button){
       
        $('#addDocumentsModal').modal('show');         
        var functionEdit = button.getAttribute("data-edit");

        if (functionEdit == 'EditContent'){
            $('.alert-m').html('<div style="margin-left: 22px; margin-top: 15px;" class="row edit-alert-m"></div>');
            $('#docs-l').text('Edit Documents');
            $('.f-a').attr('id', 'edit-documents-form');
            $('.s-btn').html('<button id="edit-docs-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Save</button>')
        
        // const editDocsName = button.getAttribute('data-docs-name');
        // const editPosition = button.getAttribute('data-position');
        const editType = button.getAttribute('data-content-type');
        console.log('docs type: ', editType);
        // const editPhotoSignatory = button.getAttribute('data-photo-signatory');
        const editStatus = button.getAttribute('data-content-status');
        console.log('docs status: ', editStatus);
        // const editContentSource = button.getAttribute('data-content-source');
        const accountType = button.getAttribute('data-account-type');
        
        if (accountType == 'Applicant'){
            $('.row-docs-name').html('<div class="col-md-6"><div class="form-group"><label><b>Name</b></label><input id="edit-docs-name" type="text" class="form-control" name="hic_docs_name"></input><input type="hidden" id="edit-hic-id-no" name="hic_id_no"><input type="hidden" id="edit-docs-id-no" name="docs_id_no"><span id="edit-docs-name-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Type</b></label><select style="margin-top: -1px;" id="edit-select-content-type" class="form-control edit-content-type" name="content_type"><option value="'+ editType +'">'+ editType +'</option><option></option><option value="College Diploma">College Diploma</option><option value="Transcript of Records">Transcript of Records</option><option value="Certificate of Employment">Certificate of Employment</option><option value="Updated Resume">Updated Resume</option></select><span id="edit-type-text"></span></div></div>');
        }

        if (accountType == 'Administrator'){
            $('.row-docs-name').html('<div class="col-md-6"><div class="form-group"><label><b>Name</b></label><input id="edit-docs-name" type="text" class="form-control" name="hic_docs_name" readonly></input><input type="hidden" id="edit-hic-id-no" name="hic_id_no"><input type="hidden" id="edit-docs-id-no" name="docs_id_no"><span id="edit-docs-name-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Type</b></label><select style="margin-top: -1px;" id="edit-select-content-type" class="form-control edit-content-type" name="content_type" disabled><option value="'+ editType +'">'+ editType +'</option><option></option><option value="College Diploma">College Diploma</option><option value="Transcript of Records">Transcript of Records</option><option value="Certificate of Employment">Certificate of Employment</option><option value="Updated Resume">Updated Resume</option></select><span id="edit-type-text"></span></div></div>');
        }
        // $('.row-contents').html('<div class="col-md-12"><div class="form-group"><label><b>Content</b></label><textarea id="edit-content" class="form-control edit-news-content" name="contents" rows="6"></textarea><span id="add-content-text"></span></div></div>');
        // $('.row-content-signatory').html('<div class="col-md-3"><div class="form-group"><label><b>Photo Signatory</b></label><input id="edit-signatory" type="text" class="form-control photo-signatory" name="photo_signatory"></input><span id="e-signatory-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Content Source</b></label><input id="e-content-source" type="text" class="form-control edit-content-source" name="content_source"></input><span id="edit-content-source-text"></span></div></div>');          
        // $('.row-docs-file').html('<div class="col-md-6 d-file"><label>File</label><input id="edit-docs-file" type="file" class="form-control" name="hic_documents"></input><span id="edit-docs-file-text"></span></div><div class="col-md-3"><div class="form-group"><label><b>Status</b></label><select style="margin-top: -9px;" id="edit-select-content-status" class="form-control edit-content-status" name="content_status"><option value="'+ editStatus +'">'+ editStatus +'</option><option value="For Approval">For Approval</option><option value="Approved">Approved</option></select><span id="edit-status-text"></span></div></div>');
        
        if (accountType == 'Administrator'){
            $('.row-docs-file').html('<div class="col-md-3"><div class="form-group"><label><b>Status</b></label><select style="margin-top: -9px;" id="edit-select-content-status" class="form-control edit-content-status" name="content_status"><option value="'+ editStatus +'">'+ editStatus +'</option><option></option><option value="For Verification">For Verification</option><option value="Verified">Verified</option><option value="For Approval">For Approval</option><option value="Received by the Agency">Received by the Agency</option></select><span id="edit-status-text"></span></div></div>');
        }

        if (accountType == 'Applicant'){
            $('.row-docs-file').html('<div class="col-md-6 d-file"><label>File</label><input id="edit-docs-file" type="file" class="form-control" name="hic_documents"></input><span id="edit-docs-file-text"></span></div></div>');
        }

        $('#edit-hic-id-no').attr('value', button.getAttribute('data-hic-id-no'));
        $('#edit-docs-id-no').attr('value', button.getAttribute('data-docs-id-no')); 
        const docsName = button.getAttribute("data-docs-name");
        console.log('docs name: ', docsName);

        $('#edit-docs-name').attr('value', docsName); 
        // $('.edit-news-content').attr('value', editNewsContent);
        // $('.edit-select-location').attr('value', editPosition);
        // $('.edit-content-type').attr('value', editType);
        // $('.edit-content-status').attr('value', editStatus);
        // $('.photo-signatory').attr('value', editPhotoSignatory);
        // $('.edit-content-source').attr('value', editContentSource);

        $('#edit-documents-form').on('submit', function(event){
        event.preventDefault();
        $('#edit-docs-btn').attr('disabled', true);

        const hicDocsName = $('#edit-documents-form input[name="hic_docs_name"]');
        const hic_docs_name = hicDocsName.val();
        
        const content_type = $('.edit-content-type').val();
        const content_status = $('.edit-content-status').val();
       

        if (!hic_docs_name){
            $('#edit-docs-name-text').text('Document name is required').css('color', '#D24D57');
            $('#edit-docs-btn').attr('disabled', true);
        }

        $('#edit-docs-name').bind('click', function(){
            $('#edit-docs-name-text').text('');
            $('#edit-docs-btn').attr('disabled', false);
        });

        // if (!position){
        //     $('#edit-location-text').text('Content location is required').css('color', '#D24D57');
        //     $('#edit-docs-btn').attr('disabled', true);
        // }

        // $('#edit-location').bind('click', function(){
        //     $('#edit-location-text').text('');
        //     $('#edit-docs-btn').attr('disabled', false);
        // });

        // $('#edit-docs-file').bind('click', function(){
        //     $('#edit-docs-file-text').text('');
        //     $('#edit-docs-btn').attr('disabled', false);
        // });
        
        if (hic_docs_name) {

        $.ajax({
        url: "{{ url('/rd-edit-documents') }}",
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
                $('#add-docs-file-text').text('An error was found while uploading the image. Check file type or maybe the file size exceeded.').css('color', '#D24D57');            
            } else {
                $('.edit-alert-m').html('<div class="row"><div class="col-md-12 edit-alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Document was updated</div></div></div>'); 
                setTimeout(goTolistOfDocuments, 3000);
                    }
                }
            });        
        }

        });
    }
}

function deleteDocuments(hicId, docsBtn, button){
        $('#addDocumentsModal').modal('show'); 
        var functionDelete = button.getAttribute("data-delete");
        
        if (functionDelete == 'DeleteContent'){
           $('#docs-l').text(' Delete Document');
           $('.f-a').attr('id', 'delete-documents-form');
           $('.s-btn').html('<button id="delete-docs-btn" type="submit" name="Submit" class="btn btn-danger btn-sm pull-right s-btn">Delete</button>')

        const viewId = button.getAttribute('data-docs-id');   
        const viewPosition = button.getAttribute('data-position');
        const viewType = button.getAttribute('data-content-type');
        const viewPhotoSignatory = button.getAttribute('data-photo-signatory');
        const viewContentStatus = button.getAttribute('data-content-status');
        const viewContentSource = button.getAttribute('data-content-source');
        const viewPhoto = button.getAttribute('data-photo');
       
        $('.row-docs-name').html('<div class="col-md-9"><b>Are you sure you want to delete this content?</b></div><div class="col-md-6"><div class="form-group"><label><b>Title</b></label><h6 style="margin-top: -11px;" id="view-content-title"></h6><input type="hidden" class="form-control delete-id" name="id" /></div></div> <div class="col-md-3"><div class="form-group"><label><b>Type</b></label><h6 style="margin-top: -11px;" id="view-content-type"></h6></div></div>');
        // $('.row-contents').html('');
        // $('.row-content-signatory').html('<div class="col-md-3"><div class="form-group"><label><b>Photo Signatory</b></label><h6 style="margin-top: -11px;" id="view-photo-signatory"></h6></div></div> <div class="col-md-3"><div class="form-group"><label><b>Content Source</b></label><h6 style="margin-top: -11px;" id="view-content-source"></h6></div></div>');          
        $('.row-docs-file').html('<div class="col-md-3"><div class="form-group"><label><b>Status</b></label><h6 style="margin-top: -11px;" id="view-content-status"></h6></div></div>');
        
        const docsName = button.getAttribute("data-docs-name");
        const viewNewsContent = button.getAttribute('data-contents');

        $('#view-content-title').text(docsName);
        $('#view-position').text(viewPosition);
        $('#view-content-type').text(viewType);
        $('#view-content').text(viewNewsContent);
        $('#view-content-status').text(viewContentStatus);
        $('#view-photo-signatory').text(viewPhotoSignatory);
        $('#view-content-source').text(viewContentSource);
        
        // document.querySelector("#delete-docs-name").innerText = button.getAttribute("data-docs-name");
        // $('#delete-docs-id').attr('value', button.getAttribute('data-docs-id')); 
        
        $('#delete-documents-form').on('submit', function(event){
        event.preventDefault();
        $('#delete-docs-btn').attr('disabled', true);
        
        $('.delete-id').attr('value', viewId);

        const docsId = $('#delete-documents-form input[name="id"]');
        const docs_id = docsId.val();
    
        if (docs_id) {

        $.ajax({
        url: "{{ url('/rd-delete-documents') }}",
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
                $('#add-docs-file-text').text('An error was found while uploading the image. Check file type or maybe the file size exceeded.').css('color', '#D24D57');            
            } else {
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Document was deleted</div></div></div>'); 
                setTimeout(goTolistOfDocuments, 3000);
            }
        }
        });
        }
        
        });
    }
}

function viewDocument(hicId, docsBtn, button){
    $('#addDocumentsModal').modal('show'); 
    var functionView = button.getAttribute("data-view");

    if (functionView == 'ViewContent'){
        $('#docs-l').text('View Content');
        $('.s-btn').html('');

        const viewPosition = button.getAttribute('data-position');
        const viewType = button.getAttribute('data-content-type');
        const viewPhotoSignatory = button.getAttribute('data-photo-signatory');
        const viewContentStatus = button.getAttribute('data-content-status');
        const viewContentSource = button.getAttribute('data-content-source');
        const viewPhoto = button.getAttribute('data-photo');
       
        $('.row-docs-name').html('<div class="col-md-6"><div class="form-group"><label><b>Title</b></label><h6 style="margin-top: -11px;" id="view-content-title"></h6></div></div> <div class="col-md-3"><div class="form-group"><label><b>Content Position</b></label><h6 style="margin-top: -11px;" id="view-position"></h6></div></div> <div class="col-md-3"><div class="form-group"><label><b>Type</b></label><h6 style="margin-top: -11px;" id="view-content-type"></h6></div></div>');
        $('.row-contents').html('<div class="col-md-12"><div class="form-group"><label>Content</label><p style="margin-top: -11px;" id="view-content"></p></div></div>');
        $('.row-content-signatory').html('<div class="col-md-3"><div class="form-group"><label><b>Photo Signatory</b></label><h6 style="margin-top: -11px;" id="view-photo-signatory"></h6></div></div> <div class="col-md-3"><div class="form-group"><label><b>Content Source</b></label><h6 style="margin-top: -11px;" id="view-content-source"></h6></div></div>');          
        $('.row-docs-file').html('<div class="col-md-6 d-file"><label><b>Photo</b></label><h6 style="margin-top: -11px;"><img src="/uploads/documents/'+ viewPhoto +'" width="190px" height="190px" /></h6></div><div class="col-md-3"><div class="form-group"><label><b>Status</b></label><h6 style="margin-top: -11px;" id="view-content-status"></h6></div></div>');
        
        const docsName = button.getAttribute("data-docs-name");
        const viewNewsContent = button.getAttribute('data-contents');

        $('#view-content-title').text(docsName);
        $('#view-position').text(viewPosition);
        $('#view-content-type').text(viewType);
        $('#view-content').text(viewNewsContent);
        $('#view-content-status').text(viewContentStatus);
        $('#view-photo-signatory').text(viewPhotoSignatory);
        $('#view-content-source').text(viewContentSource);
    }
}

function goTolistOfDocuments(){
    $('#addDocumentsModal').modal('hide');
    $('.alert-margin').remove();
    $('.edit-alert-margin').remove();

    $.ajax({
    url: "{{ url('/list-of-documents') }}",
    method: 'GET',
    cache: false,
    success: function(html){
        $('.main-profile').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadApplicantDocumentsDataTable, 3000);
        }
    });
}

function loadApplicantDocumentsDataTable(){
        $('.spinner-red-docs').hide();
        $('.docs-body').show();
        $('#contents-datatable').DataTable().destroy();
        table = $('#contents-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': "{{ url('/contents-datatables') }}",
            },
            columnDefs: [
                { className: 'dt-body-center', targets: 3 },
                { targets: 3, orderable: false },
                { width: 250, targets: 0 },
                { width: 150, targets: 2 },
            ],
            columns:[
            {
                data: 'hic_docs_name',
                name: 'hic_docs_name'
            },
            {
                data: 'content_type',
                name: 'content_type'
            },
            {
                data: 'content_status',
                name: 'content_status'
            },
            {
                data: 'action',
                name: 'action'
        
            },
            
            ]
        });
    }

</script>

