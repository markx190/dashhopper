<script type="text/javascript">
    
    function manageNewsContents(event){
        // event.preventDefault();
        $.ajax({
            url: '{{ url("/manage-contents") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadContentsDataTable, 1000);
            }
        });
    }

    function loadContentsDataTable(){
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

    function addDocuments(hicIdNo, docsBtn, button){
        $('#addDocumentsModal').modal('show');
        
        if (docsBtn == 'addDocs'){
            $('#docs-l').text('Add Document');
            $('.f-a').attr('id', 'add-documents-form');
            $('.s-btn').html('<button id="add-docs-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Submit</button>')

            $('.row-docs-name').html('<div class="col-md-6"><div class="form-group"><label><b>Name</b></label><input id="add-docs-name" type="text" class="form-control" name="hic_docs_name"></input><input type="hidden" id="add-hic-id-no" name="hic_id_no"><input type="hidden" value="For Approval" id="add-content-status" name="content_status"><span id="add-docs-name-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Type</b></label><select style="margin-top: -10px;" id="select-content-type" class="form-control add-content-type" name="content_type"><option></option><option value="College Diploma">College Diploma</option><option value="Transcript of Records">Transcript of Records</option><option value="Certificat of Employment">Certificate of Employment</option><option value="Updated Resume">Updated Resume</option></select><span id="add-type-text"></span></div></div>');
            // $('.row-contents').html('<div class="col-md-12"><div class="form-group"><label><b>Content</b></label><textarea id="add-content" class="form-control add-news-content" name="contents" rows="6"></textarea><span id="add-content-text"></span></div></div>');
            // $('.row-content-signatory').html('<div class="col-md-3"><div class="form-group"><label><b>Photo Signatory</b></label><input id="a-photo-signatory" type="text" class="form-control add-photo-signatory" name="photo_signatory"></input><span id="add-photo-signatory-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Content Source</b></label><input id="a-content-source" type="text" class="form-control add-content-source" name="content_source"></input><span id="add-content-source-text"></span></div></div>');          
            $('.row-docs-file').html('<div class="col-md-6 d-file"><label><b>File</b></label><input id="add-docs-file" type="file" class="form-control" name="hic_documents"></input><span id="add-docs-file-text"></span></div>');
            
            $('#add-hic-id-no').attr('value', button.getAttribute('data-hic-id-no'));         
            
        $('#add-documents-form').on('submit', function(event){
            event.preventDefault();
            $('#add-docs-btn').attr('disabled', true);

            const hicIdNo = $('#add-documents-form input[name="hic_id_no"]');
            const hic_id_no = hicIdNo.val();

            const hicDocsName = $('#add-documents-form input[name="hic_docs_name"]');
            const hic_docs_name = hicDocsName.val();

            // const location = $('.add-select-location').val();
            const content_type = $('.add-content-type').val();
            // const newsContent = $('.add-news-content').val();
            // const photoSignatory = $('.add-photo-signatory').val();
            // const contentSource = $('.add-content-source').val();

            const hicDocuments = $('#add-documents-form input[name="hic_documents"]');
            const hic_documents = hicDocuments.val();
            console.log(hic_documents);

        if (!hic_docs_name){
            $('#add-docs-name-text').text('Document name is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        }

        $('#add-docs-name').bind('click', function(){
            $('#add-docs-name-text').text('');
            $('#add-docs-btn').attr('disabled', false);
        });
 
        // if (!location){
        //     $('#add-location-text').text('News position is required').css('color', '#D24D57');
        //     $('#add-docs-btn').attr('disabled', true);
        // }

        // $('.add-select-location').bind('click', function(){
        //     $('#add-location-text').text('');
        //     $('#add-docs-btn').attr('disabled', false);
        // });

        if (!content_type){
            $('#add-type-text').text('Document type is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        }

        $('.add-content-type').bind('click', function(){
            $('#add-type-text').text('');
            $('#add-docs-btn').attr('disabled', false);
        });
        
        if (!hic_documents){
            $('#add-docs-file-text').text('File is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        }

        $('#add-docs-file').bind('click', function(){
            $('#add-docs-file-text').text('');
            $('#add-docs-btn').attr('disabled', false);
        });

        // if (!photoSignatory){
        //     $('#add-photo-signatory-text').text('Photo signatory is required').css('color', '#D24D57');
        //     $('#add-docs-btn').attr('disabled', true);
        // }

        // $('.add-photo-signatory').bind('click', function(){
        //     $('#add-photo-signatory-text').text('');
        //     $('#add-docs-btn').attr('disabled', false);
        // });

        // if (!contentSource){
        //     $('#add-content-source-text').text('Content source is required').css('color', '#D24D57');
        //     $('#add-docs-btn').attr('disabled', true);
        // }

        // $('.add-content-source').bind('click', function(){
        //     $('#add-content-source-text').text('');
        //     $('#add-docs-btn').attr('disabled', false);
        // });
        
    if (hic_docs_name && content_type && hic_documents) {
        $.ajax({
        url: "{{ url('/rd-add-documents') }}",
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
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Document has been successfully created</div></div></div>'); 
                setTimeout(goTolistOfContents, 3000);
            }
        }
                });
            }
        });
    }    
}

function goTolistOfContents(){
    $('.alert-margin').remove();
    $('#addDocumentsModal').modal('hide');
    $.ajax({
    url: "{{ url('/list-of-documents') }}",
    method: 'GET',
    cache: false,
    success: function(html){
        $('.main-profile').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadContentsDataTable, 3000);
        }
    });
}

</script>
