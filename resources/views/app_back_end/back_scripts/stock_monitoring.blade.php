<script>
    
    function listOfItems(event){
        alert('stock');
        event.preventDefault();
        $.ajax({
            url: '{{ url("/list-of-items") }}',
            method: 'GET',
            cache: false,
            success: function(html){
                $('.main-d').html(html);
                $('.docs-body').hide();
                $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
                setTimeout(loadHicItemsDataTable, 1000);
            }

        });
    }

    function loadHicItemsDataTable(){
        $('.spinner-red-docs').hide();
        $('.docs-body').show();
        $('#hic-items-datatable').DataTable().destroy();
        table = $('#hic-items-datatable').DataTable({
            "searching": true,
            "processing": false,
            "serverSide": false,
            "paginate": true,
            "responsive": false,
            "paging": true,
            "pageLength": 5,
            "ajax": {
                'url': "{{ url('/items-datatables') }}",
            },
            // columnDefs: [
            //     { width: 55, targets: 0 },
            //     { width: 300, targets: 1 },
            //     { width: 5, targets: 2, orderable: false }
            // ],
            columns:[
            {
                data: 'item_name',
                name: 'item_name'
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'stock_qty',
                name: 'stock_qty'
            },
            {
                data: 'unit_price',
                name: 'unit_price'
            },
            {
                data: 'action',
                name: 'action'
            },
            
            ]
        });
    }

    // function addDocuments(hicIdNo, docsBtn, button){
    //     $('#addDocumentsModal').modal('show');
        
    //     if (docsBtn == 'addDocs'){
    //         $('#docs-l').text('Upload Documents');
    //         $('.f-a').attr('id', 'add-documents-form');
    //         $('.s-btn').html('<button id="add-docs-btn" type="submit" name="Submit" class="btn btn-success btn-sm pull-right s-btn">Upload</button>')

    //         $('.row-docs-name').html('<div class="col-md-3"><div class="form-group"><label>Document Name</label><input id="add-docs-name" type="text" class="form-control" name="hic_docs_name"></input><input type="hidden" id="add-hic-id-no" name="hic_id_no"><span id="add-docs-name-text"></span></div></div>');
    //         $('.row-docs-file').html('<div class="col-md-6 d-file"><label>File</label><input id="add-docs-file" type="file" class="form-control" name="hic_documents"></input><span id="add-docs-file-text"></span></div>');
            
    //         $('#add-hic-id-no').attr('value', button.getAttribute('data-hic-id-no'));         
            
    //     $('#add-documents-form').on('submit', function(event){
    //         event.preventDefault();
    //         $('#add-docs-btn').attr('disabled', true);

    //         const hicIdNo = $('#add-documents-form input[name="hic_id_no"]');
    //         const hic_id_no = hicIdNo.val();

    //         const hicDocsName = $('#add-documents-form input[name="hic_docs_name"]');
    //         const hic_docs_name = hicDocsName.val();

    //         const hicDocuments = $('#add-documents-form input[name="hic_documents"]');
    //         const hic_documents = hicDocuments.val();

    //     if (!hic_docs_name){
    //         $('#add-docs-name-text').text('Document name is required').css('color', '#D24D57');
    //         $('#add-docs-btn').attr('disabled', true);
    //     }

    //     $('#add-docs-name').bind('click', function(){
    //         $('#add-docs-name-text').text('');
    //         $('#add-docs-btn').attr('disabled', false);
    //     });

    //     if (!hic_documents){
    //         $('#add-docs-file-text').text('File is required').css('color', '#D24D57');
    //         $('#add-docs-btn').attr('disabled', true);
    //     }

    //     $('#add-docs-file').bind('click', function(){
    //         $('#add-docs-file-text').text('');
    //         $('#add-docs-btn').attr('disabled', false);
    //     });
        
    //     if (hic_docs_name && hic_documents) {
    //     $.ajax({
    //     url: "{{ url('/rd-add-documents') }}",
    //     method:"POST",
    //     data:new FormData(this),
    //     contentType: false,
    //     cache: false,
    //     dataType: 'JSON',
    //     processData: false,
    //     success:function(data)
    //     {
    //         console.log(data.errorStatus);
    //         if (data.errorStatus == 1){
    //             $('#add-docs-file-text').text('An error was found while uploading the image. Check file type or maybe the file size exceeded.').css('color', '#D24D57');            
    //         } else {
    //             $('.alert-m').html('<div class="row"><div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Document was uploaded</div></div></div>'); 
    //             setTimeout(goTolistOfDocuments, 3000);
    //         }
    //     }
    //     });

    //     }
    //     });
    //     }    
    // }

    // function goTolistOfDocuments(){
    //     $('#addDocumentsModal').modal('hide');
    //     $.ajax({
    //     url: "{{ url('/list-of-documents') }}",
    //     method: 'GET',
    //     cache: false,
    //     success: function(html){
    //         $('.main-profile').html(html);
    //             $('.docs-body').hide();
    //             $('.docs-spinner').html('<div class="row spinner-red-docs"><div class="col-md-12"><img class="displayed" src="/reddrop_back/dist/assets/img/ajax-loader-circle.gif" /></div>');  
    //             setTimeout(loadHicDocumentsDataTable, 3000);
    //         }
    //     });
    // }

</script>
