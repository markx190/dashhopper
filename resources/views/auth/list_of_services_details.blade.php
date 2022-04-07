<div class="row add-service-space">
    <div class="col-md-3">
	    <i class="fa fa-plus icon-margin-plus"></i><b><a id="goToServiceDetails" class="add-links" style="cursor: pointer;" style="text-decoration: none;"> Add New Service</a></b>
    </div>	
</div>

@foreach($serviceDetails as $sDetail)
<div class="row service-list-row">
    <div class="col-md-3">
        <label for="service-name">{{ $sDetail->service_name }}</label>                                
</div>
<div class="col-md-2">
    <label for="service-type">{{ $sDetail->service_type }}</label>                          
</div>
<div class="col-md-3">
    <label for="service-label">{{ $sDetail->service_label }}</label>                          
</div>
<div class="col-md-2">
    <label for="service-image"><img id="service-image" src="/uploads/avatars/{{ $sDetail->service_avatar }}" style="width:95px; height:85px; image-align:center;"></h2></label>                          
</div>
<div class="col-md-2">
    <label for="delete">
        <button type="button" id="editButton" class="btn btn-primary fa fa-pencil" 
            onclick="editServiceDataPage('{{ $sDetail->sd_id_no }}', this)" disabled
        > 
        </button>
            <button type="button" id="deleteButton" class="btn btn-danger fa fa-trash"
            onclick="deleteServiceModal('{{ $sDetail->id }}', this)"
            data-id="{{ $sDetail->id }}"
            data-label-service-type="{{ $sDetail->service_type }}"
            data-view-service-avatar="/uploads/avatars/{{ $sDetail->service_avatar }}"
            >
            </button>
        </label>                          
    </div>
</div>


<div class="modal" id="deleteServiceModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content pull-right">
    <div class="delete-icon"> <b><p id="header-label"><i class="fa fa-trash"></i> Delete Service</p></b></div>
<form id="sd-delete-form" enctype="multipart/form-data" method="POST">    
    {{ csrf_field() }}
        <div class="modal-body bt-industry">
            <!-- <p id="modal-label"></p> -->
                <div class="row m-label-margin">
                    <div class="col-md-12">
                        <label>Are you sure you want to delete this Service?</label>
                        <h3 id="delete-label-service-type" style="font-size: 16px; font-weight: bold" class="delete-service-type"></h3>
                        <input id="delete-sd-id" type="hidden" class="form-control edit-input" name="id">
                    <img id="delete-sd-service-avatar" style="width:85px; height:70px; image-align:center;" />            
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button id="deleteBtn" type="button" name="upload" class="btn btn-danger btn-sm pull-right" onclick="deleteServiceItem(event)">Delete</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endforeach
<br />
<script type="text/javascript">

$('#goToServiceDetails').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url: "{{ url('/bt-create-services-details-page') }}",
        method: 'GET',
        cache: false,
        success: function(html){
            $('.service-space').html(html);
        }
    })
}); 

function editServiceDataPage(sdIdNo, button){
    $.ajax({
        url: "{{ url('/bt-edit-services-details-page') }}/" + sdIdNo,
        method: 'GET',
        cache: false,
        success: function(html){
            $('.service-space').html(html);
        } 
    });
}

    
function deleteServiceModal(serviceId, button){
    $('#deleteServiceModal').modal('show'); 
    $('#delete-sd-id').attr('value', button.getAttribute('data-id'));
    $('#delete-sd-service-name').attr('value', button.getAttribute('data-sd-service-name'));
    $('#delete-sd-service-avatar').attr('src', button.getAttribute('data-view-service-avatar'));
    document.querySelector("#delete-label-service-type").innerText = button.getAttribute("data-label-service-type");
}

function deleteServiceItem(event){
    event.preventDefault();
    const getServiceId = $('#sd-delete-form input[name="id"]');
    const serviceId = getServiceId.val();
   
    if (serviceId){
        deleteItem();
    }

function deleteItem(){
    $.ajax({
        url: "{{ url('/bt-delete-services-details') }}",
        method: 'POST',
        cache: false,
        dataType: 'JSON',
        data: { 
		    _token: function() {
                return "{{csrf_token()}}"
            },
        serviceId
        },
        success: function (response){
            if (response.error == 1){
                $('.delete-icon').after('<div class="col-md-12 alert-margin"><div class="alert alert-success"><div class="fa fa-spinner fa-spin"></div> Service was deleted</div>');             
                setTimeout(hideDeleteService, 3000);

                function hideDeleteService(html){
                $('#deleteServiceModal').modal('hide');
                $.ajax({
                    url: "{{ url('/list-of-services-details') }}",
                    method: 'get',
                    cache: false,
                    success: function(html){
                    // $('#service-details').after('<section id="listOfServiceDetails"></section>');
                    $('.skill-space').html(html);
                    }
                })
            }

            function goToPreferences(){
                window.location.href = '/preferences';
            }
               
                }
            }
        });
    }
}

$('.add-links').hover(function(){
    $(this).css('color', '#D24D57');
    }, function(){
    $(this).css('color', '#444444');
});

$('#edit-fare-amount').bind('click', function(){
    inputAmount();
});

$('#edit-fare-per-seat').bind('click', function(){
    formatFarePerSeat();
});

function inputAmount(){
    $('#edit-fare-amount').inputmaskNew("currency", {
        'placeholder': "",
        'prefix': '',
        'digitsOptional': !0,
        'greedy': !1,
        'radixPoint': ".",
        'radixFocus': !0,
        'decimalProtect': !0,
        'autoGroup': !0,
        'rightAlign': false,
        'allowMinus': false,
        'allowPlus': false,
        'max': 999999999999.99
        });
    }

    function formatFarePerSeat(){
    $('#edit-fare-per-seat').inputmaskNew("currency", {
        'placeholder': "",
        'prefix': '',
        'digitsOptional': !0,
        'greedy': !1,
        'radixPoint': ".",
        'radixFocus': !0,
        'decimalProtect': !0,
        'autoGroup': !0,
        'rightAlign': false,
        'allowMinus': false,
        'allowPlus': false,
        'max': 999999999999.99
        });
    }

</script>

 
            

