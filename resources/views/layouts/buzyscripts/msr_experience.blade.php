<script>
    $('#goToMsrExperience').on('click', function(e){
        e.preventDefault();
        $.ajax({
            url: '/msr_experience',
            method: 'get',
            cache: false,
            success: function(html){
                $('#preferences').hide();
                $('#preferences').after('<section id="msrExperiencePage"></section>');
                $('#msrExperiencePage').html(html);
                $('#show-list-exp').after('<p id="showList-Exp" class="expLoading"></p>');
                setTimeout(showExperiences, 3000);
            }
        });
        
        function showExperiences(){
            $('#showList-Exp').hide();
            $('show-list-exp').addClass('margin_List');
            $.ajax({
                url: '/show_experiences',
                method: 'get',
                cache: false,
                success: function(html){
                    // $('#preferences').hide();
                    // $('#preferences').after('<section id="msrExperiencePage"></section>');
                    $('#show-list-exp').html(html);
                }
            });
        }
    });
    
    function submitExperience(event){
        event.preventDefault();
        $('#submit-button').attr('disabled', true);
        $('input').bind('click', function(){
            $('#submit-button').attr('disabled', false);
            $('.inputError').text('');
        });
        
        const inputAffil = $('#exp-form input[name="affiliation"]');
        const affil = inputAffil.val();
        
        if (!affil){
            $('#affil').after('<span id="affilError" class="inputError" style="color: red;">Affiliation is required</span>');
        } 

        const inputJobTitle = $('#exp-form input[name="job_title"]');
        const jobTitle = inputJobTitle.val();
        
        if (!jobTitle){
            $('#job_title').after('<span id="jobTitle" class="inputError" style="color: red;">Job Title is required</span>');
        } else {
            $('#job_title').text('');
        }

        const inputYearFrom = $('#exp-form input[name="year_from"]');
        const yearFrom = inputYearFrom.val();
        
        if (!yearFrom){
            $('#year_from').after('<span id="yearFrom" class="inputError" style="color: red;">Year From: is required</span>');
        } else {
            $('#year_from').text('');
        }

        const inputYearTo = $('#exp-form input[name="year_to"]');
        const yearTo = inputYearTo.val();
        
        if (!yearTo){
            $('#year_to').after('<span id="yearTo" class="inputError" style="color: red;">Year To: is required</span>');
        } else {
            $('#year_to').text('');
        }

        const inputCompanyName = $('#exp-form input[name="company_name"]');
        const companyName = inputCompanyName.val();
        
        if (!companyName){
            $('#company_name').after('<span id="companyName" class="inputError" style="color: red;">Company Name is required</span>');
        } else {
            $('#company_name').text('');
        }

        const inputProductHandled = $('#exp-form input[name="product_handled"]');
        const productHandled = inputProductHandled.val();
        
        if (!productHandled){
            $('#product_handled').after('<span id="productHandled" class="inputError" style="color: red;">Product Handled is required</span>');
        } else {
            $('#product_handled').text('');
        }

        const inputProductCategory = $('#exp-form input[name="product_category"]');
        const productCategory = inputProductCategory.val();
        
        if (!productCategory){
            $('#product_category').after('<span id="productCategory" class="inputError" style="color: red;">Product Category is required</span>');
        } else {
            $('#product_category').text('');
        }

        if (affil && jobTitle && yearFrom && yearTo && companyName && productHandled && productCategory){
            storeExperiences();
        }
    
        function storeExperiences(){
	        $.ajax({
                url: '{{ url("/store_experiences") }}',
                data: { 
		            _token: function() {
                        return "{{csrf_token()}}"
                },
                affil,
		        jobTitle,
		        yearFrom,
                yearTo,
		        companyName,
		        productHandled,
                productCategory,
	            },
                method: 'POST',
	            cache: false,
	            success: function (html){
	            submitExperiences();
                }
	        });

        function submitExperiences(){
            $('#showList-Exp').hide();
            $('show-list-exp').addClass('margin_List');
            $.ajax({
                url: '/show_experiences',
                method: 'get',
                cache: false,
                success: function(html){
                    // $('#preferences').hide();
                    // $('#preferences').after('<section id="msrExperiencePage"></section>');
                    $('#show-list-exp').html(html);
                }
            });
        }
    }
}

function editExp(event){
    const expId = $('#editButton').attr('exp-id');
    console.log('id ', expId);
}

</script>