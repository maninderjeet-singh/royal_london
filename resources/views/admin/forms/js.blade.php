<script>
    let pageNo = 1;
    let per_page = 10;
    let ajaxReq = null;
    let categoryData = [];
    let selectedCatData,selectedSubCatData,selectedSubSubCatData;
    let productCategoryData = {category_id :'',sub_category_id:'',sub_sub_category_id :'',sub_sub_category_type_id:'' };
/***
 * On document load
 */
    $(()=>{

        productCategoryData = {category_id :"{{isset($product) ? $product->category_id:'' }}",sub_category_id:"{{isset($product) ? $product->sub_category_id:'' }}",sub_sub_category_id :"{{isset($product) ? $product->sub_sub_category_id:'' }}",sub_sub_category_type_id:"{{isset($product) ? $product->sub_sub_category_type_id:'' }}" };

        categoryData = $('#catData').data('alldata');
        // if(categoryData){
        //     $('.category-section .row').html('');
        //     // Category List
        //     categoryData.forEach(category => {
        //         $('.category-section .row').append(`
        //             <div class="col-lg-2 mb-4">
        //                 <div class="card bg-success category text-white shadow pointer" data-category=${category.id}>
        //                     <div class="card-body text-center">
        //                         ${category.name}
        //                     </div>
        //                 </div>
        //             </div>
        //         `);
        //         // HTML Category's sub-category List
        //         $('.category-section').last().after(`
        //             <div class="sub-category-section category-${category.id}" style="display:none">
        //                 <div class="row">

        //                 </div>
        //             </div>
        //         `);
                
        //         // Category's sub-category Section
        //         category.sub_category.forEach(subCategory => {
        //             $(`.category-${category.id} .row`).append(`
        //                 <div class="col-lg-2 mb-4">
        //                     <div class="card bg-warning sub-category text-white shadow pointer" data-subcategory=${subCategory.id}>
        //                         <div class="card-body text-center">
        //                             ${subCategory.name}
        //                         </div>
        //                     </div>
        //                 </div>
        //             `);

        //             // HTML Category's sub-category's sub-sub-category-section
        //             $('.sub-category-section').last().after(`
        //                 <div class="sub-sub-category-section sub-category-${subCategory.id}" style="display:none">
        //                     <div class="row">

        //                     </div>
        //                 </div>
        //             `);
                    
        //             //Category's sub-category's sub-sub-category list
        //             subCategory.sub_sub_category.forEach(subSubCategory => {
        //                 $(`.sub-category-${subCategory.id} .row`).append(`
        //                     <div class="col-lg-2 mb-4">
        //                         <div class="card bg-dark sub-sub-category text-white shadow pointer" data-subsubcategory=${subSubCategory.id}>
        //                             <div class="card-body text-center">
        //                                 ${subSubCategory.name}
        //                             </div>
        //                         </div>
        //                     </div>
        //                 `);

        //                 // HTML Category's sub-category's sub-sub-category's sub-sub-category-type-section
        //                 $('.sub-sub-category-section').last().after(`
        //                     <div class="sub-sub-category-type-section sub-sub-category-${subSubCategory.id}" style="display:none">
        //                         <div class="row">

        //                         </div>
        //                     </div>
        //                 `);

        //                 //Category's sub-category's sub-sub-category's sub-sub-category-type-section list
        //                 subSubCategory.sub_subcategory_type.forEach(subSubCategoryType => {
        //                     $(`.sub-sub-category-${subSubCategory.id} .row`).append(`
        //                         <div class="col-lg-2 mb-4">
        //                             <div class="card bg-danger sub-sub-category-type text-white shadow pointer" data-subsubcategorytype=${subSubCategoryType.id}>
        //                                 <div class="card-body text-center">
        //                                     ${subSubCategoryType.name}
        //                                 </div>
        //                             </div>
        //                         </div>
        //                     `);
        //                 });
        //             });
        //         });

        //     });

        // }


        // $(document).on('click','.category',function(){
        //     $('#resetCatSection').fadeIn();
        //     let category = $(this).data('category');
        //     $('.category-section').hide();
        //     $('.category-'+category).fadeIn();
        //     productCategoryData.category_id = category;
        //     $('.heading span').text('Select Sub Category');
        // })


        // $(document).on('click','.sub-category',function(){
        //     let subCategory = $(this).data('subcategory');
        //     $('.sub-category-section').hide();
        //     $('.sub-category-'+subCategory).fadeIn();
        //     productCategoryData.sub_category_id = subCategory;
        //     $('.heading span').text('Select Sub Sub Category');
        // })

        // $(document).on('click','.sub-sub-category',function(){
        //     let subSubCategory = $(this).data('subsubcategory');
        //     $('.sub-sub-category-section').hide();
        //     $('.sub-sub-category-'+subSubCategory).fadeIn();
        //     productCategoryData.sub_sub_category_id = subSubCategory;
        //     $('.heading span').text('Select Sub Sub Category Type');
        // })

        // $(document).on('click','.sub-sub-category-type',function(){
        //     let subSubCategoryType = $(this).data('subsubcategorytype');
        //     $('.sub-sub-category-type-section').hide();
        //     $('.prodcut-form-section').fadeIn();
            
        //     productCategoryData.sub_sub_category_type_id = subSubCategoryType;
        //     $('.heading span').text('Fill Product Form');
            
        // })


        // $('#resetCatSection').click(()=>{
        //     $('#resetCatSection').hide();
        //     $('.sub-category-section,.sub-sub-category-section,.sub-sub-category-type-section').hide();
        //     $('.category-section').fadeIn();
        //     productCategoryData = {category_id :'',sub_category_id:'',sub_sub_category_id :'',sub_sub_category_type_id:'' };
        //     $('.heading span').text('Select Category');
        // })

        $(document).on('change','#category_id',function(){
            let category = $(this).val();
            $('#sub_category_id').html(`<option value="">Select Sub Category</option>`);
            $('#sub_sub_category_id').html(`<option value="">Select Sub Sub Category</option>`);
            $('#sub_sub_category_type_id').html(`<option value="">Select Sub Sub Category Type</option>`);
            if(category != ''){
                selectedCatData = categoryData.filter(cat=>cat.id==category);
                selectedCatData = selectedCatData[0];
                selectedCatData.sub_category.forEach(subCategory=>{
                    if (productCategoryData.sub_category_id == subCategory.id ){
                        $('#sub_category_id').append(`
                            <option value="${subCategory.id}" selected>${subCategory.name}</option>
                        `)
                    }else{
                        $('#sub_category_id').append(`
                            <option value="${subCategory.id}">${subCategory.name}</option>
                        `)
                    }
                    
                })
            }
        })

        $(document).on('change','#sub_category_id',function(){
            let subCategory = $(this).val();
            $('#sub_sub_category_id').html(`<option value="">Select Sub Sub Category</option>`);
            $('#sub_sub_category_type_id').html(`<option value="">Select Sub Sub Category Type</option>`);
            if(subCategory != ''){
                selectedSubCatData = selectedCatData.sub_category.filter(subCat=>subCat.id==subCategory);
                selectedSubCatData = selectedSubCatData[0];
                selectedSubCatData.sub_sub_category.forEach(subSubCategory=>{
                    if (productCategoryData.sub_sub_category_id == subSubCategory.id ){
                        $('#sub_sub_category_id').append(`
                            <option value="${subSubCategory.id}" selected>${subSubCategory.name}</option>
                        `)
                    }else{
                        $('#sub_sub_category_id').append(`
                            <option value="${subSubCategory.id}">${subSubCategory.name}</option>
                        `)
                    }
                })
            }
        })

        $(document).on('change','#sub_sub_category_id',function(){
            let subSubCategory = $(this).val();
            $('#sub_sub_category_type_id').html(`<option value="">Select Sub Sub Category Type</option>`);
            if(subSubCategory != ''){
                selectedSubSubCatData = selectedSubCatData.sub_sub_category.filter(subCat=>subCat.id==subSubCategory);
                selectedSubSubCatData = selectedSubSubCatData[0];
                selectedSubSubCatData.sub_subcategory_type.forEach(subSubCategoryType=>{
                    if (productCategoryData.sub_sub_category_type_id == subSubCategoryType.id ){
                        $('#sub_sub_category_type_id').append(`
                            <option value="${subSubCategoryType.id}" selected>${subSubCategoryType.name}</option>
                        `)
                    }else{
                        $('#sub_sub_category_type_id').append(`
                            <option value="${subSubCategoryType.id}">${subSubCategoryType.name}</option>
                        `)
                    }
                })
            }
        })

        $('#category_id,#sub_category_id,#sub_sub_category_id').change();

    });




    // $('#per_page,#status_filter,#columnBy_filter,#orderBy_filter').change(function(){
    //     page = 1;
    //     showListData();
    // })


    // $('#search_filter').keyup(function(){
    //     if( $(this).val().length == 0 || $(this).val().length > 2 ){
    //         page = 1;
    //         showListData();   
    //     }
    // })

    $('#clear_filter').click(function(){
        page = 1;
        $('#filter-form')[0].reset();
        showListData();
    })

    $('#filter-form').submit(function(e){
        e.preventDefault();
        showListData();
    })

    $('#basic-form').submit(function(e){
        e.preventDefault();
    })

    

    $('#save-product').click(function(){
        $('.text-danger').text('');
        if(validateProductForm()){
            return false;
        }


        let url = "{{url('products')}}";
        let type = 'POST';
        // let data = {'namde':'test','d':'category'};
        let data = $('#basic-form').serialize();
        data += '&'+$('#info-form').serialize();
        //data += `&category_id=${productCategoryData.category_id}&sub_category_id=${productCategoryData.sub_category_id }&sub_sub_category_id=${productCategoryData.sub_sub_category_id }&sub_sub_category_type_id=${productCategoryData.sub_sub_category_type_id }`

        let productId = $(this).data('productsecretkey');
        if(productId){
            url = url+'/'+productId;
            type = 'PUT';
        }

        $.ajax({
            url:url,
            type:type,
            data:data,
            beforeSend:function(){
            $('.loading-box').show();
            },
            complete:function(){
            $('.loading-box').hide();
            },
            success:function(res){
                $('#materialModal').modal('hide');
                pageNo = 1;

                swalWithBootstrapButtons({
                    icon: 'success',
                    title: 'Great !',
                    text: res.message,
                    background: "#36b9cc ",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer:2000,
                    timerProgressBar:true,
                })
                $('.swal2-title').addClass('text-white');
                $('.swal2-content').addClass('text-white');
                
            },
            error: function(jqXHR, exception){
                let err = jqXHR.responseJSON ;
                if ( err.hasOwnProperty('message') ){
                    if(jqXHR.status == 422){
                        $.each(err.errors,(key,val) => {
                            $(`#error_${key}`).text(val);
                        })
                        $('html, body').animate({
                            scrollTop: $('.text-danger:visible:first').offset().top-100
                        }, 1000);

                        // $(".collapse").collapse('show');
                    }

                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: err.message,
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        onClose: function() {

                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');

                }else{
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: 'Something went wrong, please try again later.',
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onClose: function() {
                        // location.reload();
                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }
            },
        })
    })

   

    $(document).on('click','.delete-product',function(){
        swalWithBootstrapButtons({
            title: 'Are you sure,you want to delete product ?',
            showCancelButton: true,
            confirmButtonText: 'Yes, i am sure',
            cancelButtonText: 'No, cancel',
            reverseButtons: true,

        }).then((result) => {
            if (result.value) {
                deleteProduct($(this).data('productid'));
            }
        });
    })

    
    $(document).on('click','.change-status',function(){
        swalWithBootstrapButtons({
            title: 'Are you sure,you want to change status ?',
            showCancelButton: true,
            confirmButtonText: 'Yes, i am sure',
            cancelButtonText: 'No, cancel',
            reverseButtons: true,

        }).then((result) => {
            if (result.value) {
                changeStatus($(this).data('id'),$(this).data('status'));
            }
        });
    })

    

    changeStatus = (id,status)=>{
        let url = "{{url('change-product-status')}}";
        $.ajax({
            url:url+'/'+id,
            type:'post',
            data:{status},
            beforeSend:function(){
            $('.loading-box').show();
            },
            complete:function(){
            $('.loading-box').hide();
            },
            success:function(res){
                swalWithBootstrapButtons({
                    icon: 'success',
                    title: 'Great !',
                    text: res.message,
                    background: "#36b9cc ",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer:2000,
                    timerProgressBar:true,
                })
                $('.swal2-title').addClass('text-white');
                $('.swal2-content').addClass('text-white');
                showListData()
            },
            error: function(jqXHR, exception){
                let err = jqXHR.responseJSON ;
                if ( err.hasOwnProperty('message') ){
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: err.message,
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        onClose: function() {

                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }else{
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: 'Something went wrong, please try again later.',
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onClose: function() {
                        // location.reload();
                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }
            },
        })
    }

    deleteProduct = (id)=>{
        let url = "{{url('products')}}";
        $.ajax({
            url:url+'/'+id,
            type:'Delete',
            beforeSend:function(){
            $('.loading-box').show();
            },
            complete:function(){
            $('.loading-box').hide();
            },
            success:function(res){
                swalWithBootstrapButtons({
                    icon: 'success',
                    title: 'Great !',
                    text: res.message,
                    background: "#36b9cc ",
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer:2000,
                    timerProgressBar:true,
                })
                $('.swal2-title').addClass('text-white');
                $('.swal2-content').addClass('text-white');
                showListData()
            },
            error: function(jqXHR, exception){
                let err = jqXHR.responseJSON ;
                if ( err.hasOwnProperty('message') ){
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: err.message,
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        onClose: function() {

                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }else{
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: 'Something went wrong, please try again later.',
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onClose: function() {
                        // location.reload();
                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }
            },
        })
    }

    $(document).on('click', '.pagination a',function(event){
        event.preventDefault();
        $('pagination li').removeClass('active');
        $(this).parent('li').addClass('active');
        var myurl = $(this).attr('href');
        pageNo=$(this).attr('href').split('page=')[1];
        showListData();
    });

    showListData = ()=>{
        let data = $('#filter-form').serialize();
        if(ajaxReq != null){
            ajaxReq.abort()
            $('.loading-box').hide();

        }
        
        ajaxReq = $.ajax({
            url: '?page=' + pageNo,
            type: "get",
            datatype: "html",
            data:data,
            beforeSend:function(){
            $('.loading-box').show();
            },
            complete:function(){
            $('.loading-box').hide();
            },
            success:function(res){
                $("#dynamic-data").empty().html(res);
                //location.hash = page;
            },
            error: function(jqXHR, exception){
                if(jqXHR.statusText =="abort")
                    return false;
                    
                let err = jqXHR.responseJSON ;
                if ( err && err.hasOwnProperty('message') ){
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: err.message,
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        onClose: function() {

                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }else{
                    swalWithBootstrapButtons({
                        title: 'Error ! ',
                        text: 'Something went wrong, please try again later.',
                        background: "#e74a3b",
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onClose: function() {
                        // location.reload();
                        }
                    })
                    $('.swal2-title').addClass('text-white');
                    $('.swal2-content').addClass('text-white');
                }
            },
        });
    }

    const validateProductForm = ()=>{
        let error = false;
        let basicFormHasError = false
        if($('#name').val() == ''){
            $('#error_name').text('Please enter product name').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#type').val() == ''){
            $('#error_type').text('Please choose type').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#tax_type').val() == ''){
            $('#error_tax_type').text('Please choose tax type').fadeIn();
            error = true;
            basicFormHasError = true;
        }else{
            if($('#tax_type').val() == '2' && $('#tax').val() == ''){

                $('#error_tax').text('Please enter tax').fadeIn();
                error = true;
                basicFormHasError = true;
            }
        }

        if($('#category_id').val() == ''){
            $('#error_category_id').text('Please choose Category').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#sub_category_id').val() == ''){
            $('#error_sub_category_id').text('Please choose Sub Category').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#sub_sub_category_id').val() == ''){
            $('#error_sub_sub_category_id').text('Please choose Sub Sub Category').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#sub_sub_category_type_id').val() == ''){
            $('#error_sub_sub_category_type_id').text('Please choose Sub Sub Category Type.').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#brand_id').val() == ''){
            $('#error_brand_id').text('Please choose brand').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#material_id').val() == ''){
            $('#error_material_id').text('Please choose material').fadeIn();
            error = true;
            basicFormHasError = true;
        }

        if($('#weight').val() == ''){
            $('#error_weight').text('Please enter weight').fadeIn();
            error = true;
        }

        if($('#warranty').val() == ''){
            $('#error_warranty').text('Please enter warranty').fadeIn();
            error = true;
        }

        if($('#dimension_type').val() == ''){
            $('#error_dimension_type').text('Please enter dimension type').fadeIn();
            error = true;
        }

        if($('#dimension_value').val() == ''){
            $('#error_dimension_value').text('Please enter dimension value').fadeIn();
            error = true;
        }

        if($('#description').val() == ''){
            $('#error_description').text('Please enter description').fadeIn();
            error = true;
        }

        
        if(error && basicFormHasError){
            $("#basicDetail").collapse('show');
        }

        if(error && !basicFormHasError){
            $("#infoDetail").collapse('show');
        }

        // if (productCategoryData.category_id == '' || productCategoryData.sub_category_id == '' || productCategoryData.sub_sub_category_id == '' || productCategoryData.sub_sub_category_type_id == ''){
        //     error = true;
        // }
        return error;
    }
</script>