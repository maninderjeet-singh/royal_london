<script>
    let pageNo = 1;
    let per_page = 10;
    let ajaxReq = null;

    $('#per_page,#status_filter,#columnBy_filter,#orderBy_filter').change(function(){
        page = 1;
        showListData();
    })


    $('#search_filter').keyup(function(){
        if( $(this).val().length == 0 || $(this).val().length > 2 ){
            page = 1;
            showListData();   
        }
    })

    $('#clear_filter').click(function(){
        page = 1;
        $('#filter-form')[0].reset();
        showListData();
    })
    $('#filter-form, #company-form').submit(function(e){
        e.preventDefault();
    })

    

    $('#savecompany').click(function(){
        $('.text-danger').text('');
        let company = $('#company').val();
        let category = $('#company_id').val();
        let url = "{{url('companys')}}";
        let type = 'POST';
        let data = {'name':company,'company_id':category};
        let companyId = $(this).data('companySecretKey');
        if(companyId){
            data = {'name':company,'_method':'PUT','id':companyId,'company_id':category};
            url = url+'/'+companyId;
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
                $('#companyModal').modal('hide');
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

                showListData();
                
            },
            error: function(jqXHR, exception){
                let err = jqXHR.responseJSON ;
                if ( err.hasOwnProperty('message') ){
                    if(jqXHR.status == 422){
                        $.each(err.errors,(key,val) => {
                            $(`.${key}_error`).text(val);
                        })
                        $('html, body').animate({
                            scrollTop: $('.text-danger:visible:first').offset().top-100
                        }, 1000);
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

    $(document).on('click','.edit-company',function(){
        let companyId = $(this).data('companyid');
        let companyName = $(this).data('companyname');

        $('#company').val(companyName);
        $('#savecompany').data('companySecretKey',companyId);

        $('#companyModal').modal('show');
    })

    $(document).on('click','.delete-company',function(){
        swalWithBootstrapButtons({
            title: 'Are you sure,you want to delete company ?',
            showCancelButton: true,
            confirmButtonText: 'Yes, i am sure',
            cancelButtonText: 'No, cancel',
            reverseButtons: true,

        }).then((result) => {
            if (result.value) {
                deletecompany($(this).data('companyid'));
            }
        });
    })

    
    $(document).on('click','.company-status',function(){
        swalWithBootstrapButtons({
            title: 'Are you sure,you want to change status ?',
            showCancelButton: true,
            confirmButtonText: 'Yes, i am sure',
            cancelButtonText: 'No, cancel',
            reverseButtons: true,

        }).then((result) => {
            if (result.value) {
                changecompanyStatus($(this).data('companyid'),$(this).data('status'));
            }
        });
    })

    $("#companyModal").on('hide.bs.modal', function () {
        $('#company').val('');
        $('.text-danger').text('');
        $('#savecompany').data('companySecretKey','');
    });

    

    changecompanyStatus = (id,status)=>{
        let url = "{{url('change-company-status')}}";
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

    deletecompany = (id)=>{
        let url = "{{url('companys')}}";
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
</script>