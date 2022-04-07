
<script>
    
    function listOfDocuments(event){
        event.preventDefault();
        $.ajax({
            url: '{{ url("/list-of-documents") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-profile').html(html);
                $('.docs-body').hide();
                $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicDocumentsDataTable, 1000);
            }
        });
    }

    function loadHicDocumentsDataTable(){
        $('.spinner-red-docs').hide();
        $('.docs-body').show();
        $('#hic-docs-datatable').DataTable().destroy();
        table = $('#hic-docs-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': "{{ url('/documents-datatables') }}",
            },
            columnDefs: [
                { className: 'dt-body-center', targets: 5 },
                { targets: 5, orderable: false }
            ],
            columns:[
            {
                data: 'docs_id_no',
                name: 'docs_id_no'
            },
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
                data: 'created_by',
                name: 'created_by'
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

            $('.row-docs-name').html('<div class="col-md-6"><div class="form-group"><label><b>Title</b></label><input id="add-docs-name" type="text" class="form-control" name="hic_docs_name"></input><input type="hidden" id="add-hic-id-no" name="hic_id_no"><input type="hidden" value="For Approval" id="add-content-status" name="content_status"><span id="add-docs-name-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Page Location</b></label><select style="margin-top: -11px;" id="select-location" class="form-control add-select-location" name="position"><option></option><option value="Banner 1">Banner 1</option><option value="Banner 2">Banner 2</option><option value="Banner 3">Banner 3</option><option value="Banner 4">Banner 4</option><option value="Banner 5">Banner 5</option><option value="Headline">Headline</option><option value="Local News Right 1">Local News Right 1</option><option value="Local News Right 2">Local News Right 2</option><option value="Local News Right 3">Local News Right 3</option><option value="Top News National">Top News National</option><option value="Lotto">Lotto</option><option value="Related Stories 1">Related Stories 1</option><option value="Related Stories 2">Related Stories 2</option><option value="Related Stories 3">Related Stories 3</option><option value="Articles 1">Articles 1</option><option value="Articles 2">Articles 2</option><option value="Articles 3">Articles 3</option><option value="Technology Business News 1">Technology Business News 1</option><option value="Technology Business News 2">Technology Business News 2</option><option value="Technology Business News 3">Technology Business News 3</option><option value="Technology Business News 4">Technology Business News 4</option><option value="Technology Business News 5">Technology Business News 5</option><option value="Announcements">Announcements</option><option value="Sports">Sports</option><option value="Entertainment">Entertainment</option></select><span id="add-location-text"></span></div></div><div class="col-md-3"><div class="form-group"><label><b>Type</b></label><select style="margin-top: -10px;" id="select-content-type" class="form-control add-content-type" name="content_type"><option></option><option value="Nav Links">Nav Links</option><option value="Banner">Banner</option><option value="Content">Content</option><option value="Labels">Labels</option><option value="Footer Labels">Footer Labels</option></select><span id="add-type-text"></span></div></div>');
            $('.row-contents').html('<div class="col-md-12"><div class="form-group"><label>Content</label><textarea id="add-content" class="form-control add-news-content" name="contents" rows="6"></textarea><span id="add-content-text"></span></div></div>');
            $('.row-content-signatory').html('<div class="col-md-3"><div class="form-group"><label><b>Photo Signatory</b></label><input id="a-photo-signatory" type="text" class="form-control add-photo-signatory" name="photo_signatory"></input><span id="add-photo-signatory-text"></span></div></div> <div class="col-md-3"><div class="form-group"><label><b>Content Source</b></label><input id="a-content-source" type="text" class="form-control add-content-source" name="content_source"></input><span id="add-content-source-text"></span></div></div>');          
            $('.row-docs-file').html('<div class="col-md-6 d-file"><label><b>File</b></label><input id="add-docs-file" type="file" class="form-control" name="hic_documents"></input><span id="add-docs-file-text"></span></div>');
            $('#add-hic-id-no').attr('value', button.getAttribute('data-hic-id-no'));         
            
        $('#add-documents-form').on('submit', function(event){
            event.preventDefault();
            $('#add-docs-btn').attr('disabled', true);

            const hicIdNo = $('#add-documents-form input[name="hic_id_no"]');
            const hic_id_no = hicIdNo.val();

            const hicDocsName = $('#add-documents-form input[name="hic_docs_name"]');
            const hic_docs_name = hicDocsName.val();

            const location = $('.add-select-location').val();
            const contentType = $('.add-content-type').val();
            const newsContent = $('.add-news-content').val();
            const photoSignatory = $('.add-photo-signatory').val();
            const contentSource = $('.add-content-source').val();

            const hicDocuments = $('#add-documents-form input[name="hic_documents"]');
            const hic_documents = hicDocuments.val();

        if (!hic_docs_name){
            $('#add-docs-name-text').text('Document name is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        }

        $('#add-docs-name').bind('click', function(){
            $('#add-docs-name-text').text('');
            $('#add-docs-btn').attr('disabled', false);
        });
 
        if (!location){
            $('#add-location-text').text('News position is required').css('color', '#D24D57');
            $('#add-docs-btn').attr('disabled', true);
        }

        $('.add-select-location').bind('click', function(){
            $('#add-location-text').text('');
            $('#add-docs-btn').attr('disabled', false);
        });

        if (!contentType){
            $('#add-type-text').text('Content type is required').css('color', '#D24D57');
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
        
        if (hic_docs_name && hic_documents && location) {
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
                $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> New content has been successfully created</div></div></div>'); 
                setTimeout(goTolistOfDocuments, 3000);
            }
                }
            });
            }
        });
    }    
}

function goTolistOfDocuments(){
    $('#addDocumentsModal').modal('hide');
    $('.alert-margin').hide();
    $('.edit-alert-margin').hide();

    $.ajax({
    url: "{{ url('/list-of-documents') }}",
    method: 'GET',
    cache: false,
    success: function(html){
        $('.main-profile').html(html);
            $('.docs-body').hide();
            $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
            setTimeout(loadHicDocumentsDataTable, 3000);
        }
    });
}

</script>
