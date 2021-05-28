// ajax hiển thị dữ liệu sửa user

$('.sua').click(function(){
    let url = $(this).attr('url');
    $.ajax({
        type: 'get',
        url: url,
        success: function(response){
            $("input[name='id']").val(response.user.id);
            $("input[name='nameUp']").val(response.user.name);
            $("input[name='emailUp']").val(response.user.email);
            $("input[name='phoneUp']").val(response.user.phone_number);
            if(response.user.id_role === 2){
                $('#flexRadioDefault2').prop('checked',true);
                $('#flexRadioDefault1').prop('checked',false);
            }else{
                $('#flexRadioDefault1').prop('checked',true);
                $('#flexRadioDefault2').prop('checked',false);  
            }
        }
    })
});

// ajax hiển thị dữ liệu khi chọn tỉnh

$('#provinces').change(function(){
    let idpro = $(this).val();
    let url = $(this).attr('url');
    // console.log(url);
    $.ajax({
        type: 'get',
        url: url,
        data: {name: idpro},
        success: function(response){
            // console.log(response.villages);
            let arr = response.districts;
            // let mang = response.villages;
            $("#districts").empty();
            $("#districts").append(`<option>Chọn huyện</option>`);
            $.each(arr, function(index,value){
                $("#districts").append(`<option value='${value.id_dis}'>${value.name}</option>`);
            }); 

            // $.each(mang, function(index,value){
            //     $("#villages").append(`<option value='${value.id_dis}'>${value.name}</option>`);
            // }); 

        },
        error: function(){
            console.log('Lỗi');
        }
    })
});

// ajax hiển thị dữ liệu khi chọn huyện

$('#districts').change(function(){
    let id = $(this).val();
    let url = $(this).attr('url');
    // console.log(url);
    $.ajax({
        type: 'get',
        url: url,
        data: {name: id},
        success: function(response){
            // console.log(response.villages);
            let arr = response.villages;
            $("#villages").empty();
            $("#villages").append(`<option>Chọn xã</option>`);
            $.each(arr, function(index,value){
                $("#villages").append(`<option value='${value.id_vil}'>${value.name}</option>`);
            }); 
        },
        error: function(){
            console.log('Lỗi');
        }
    })
});

// ajax xoá bảng detail
$('.xoact').click(function(){
    let url = $(this).attr('url');
    // console.log(url);
    if(confirm('Bạn có chắc muốn xoá bài viết này')){
        $.ajax({
            type: 'get',
            url: url,
            success: function(response){
                // console.log(response);
                alert(response.message);
                window.location.reload();
            },
            error: function(){
                console.log("lỗi");
            }
        });
    }
    
});

// ajax xoá ảnh
$('.xoaimg').click(function(){
    let url = $(this).attr('url-data');
    if(confirm('Bạn có muốn xoá ảnh này')){
    $.ajax({
        type: 'get',
        url: url,
        success: function(response){
            alert(response.message);
            window.location.reload();
        },
        error:function(){
            console.log("lỗi");
        }
    });
}
});

// xử lý tìm kiếm
$('.searchSelect').change(function(){ 
  let url = $(this).val();
  $('.searchbtn').attr('action',url);

});
    



// $('.searchbtn').click(function(){
//     let input = $('#searchip').val();
//     let url = $(this).attr('url');
//     console.log(url);
//     $.ajax({
//         type: 'get',
//         url: url,
//         data:{name: input},
//         success: function(response){
//             console.log(response.users.data);
//             var arr = response.users.data;
//             console.log(arr);
//            $.each(arr,function(index,value){
//                 // console.log(value['id']);
//                 $('#if2').html(value['name']);
//                 $('#if3').html(value['email']);
//                 $('#if4').html(value['phone_number']);
//                 $('#if5').html(value['phone']);



//             //    $.each(this,function(index,value){
//             //         // console.log(value);
//             //         $('.if').html(value);
//             //    });
               
//            });
                
        

//         }
//     })

// });

    

