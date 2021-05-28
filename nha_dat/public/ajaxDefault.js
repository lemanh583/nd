// thêm tỉnh
$('.addProvince').click(function(){
    let url = $(this).attr('url');
    let data = $('.province').val();
    let token = $("input[name='_token']").val();
    if(data ===""){
        alert('Ô còn trống');
    }else{
        $.ajax({
            type: 'post',
            url: url,
            data:{name: data,_token: token},
            success: function(response){
                alert(response.message);
                $('.province').val('');
                window.location.reload();
            },
            error: function(){
                console.log("lỗi");
            }
        });
    }
    
});

//sửa tỉnh //loai
$('.suadf').click(function(){
    let url = $(this).attr('url');
    let value = $(this).attr('value');
    let data = $("input[name='"+value+"']").val();
    if(confirm("Bạn có chắc muốn sửa")){
        if(data === ""){
            alert('Không được để trống');
        }else{
            $.ajax({
                type:'get',
                url: url,
                data: {name:data},
                success: function(response){
                   alert(response.message);
                   window.location.reload();
                },
                error: function(){
                    console.log("lỗi");
                }
            });
        } 
    } 
});

//xoá tỉnh // loai
$('.xoadf').click(function(){
    let url = $(this).attr('url'); 
    console.log(url);
    if(confirm("Bạn có chắc muốn xoá?")){
        $.ajax({
            type:'get',
            url: url,
            success: function(response){
                console.log(response.message);
                window.location.reload();
            },
            error: function(){
                console.log("lỗi");
            }
        });
    }   
   
});

//hiển huyện từ tỉnh
$('.pro').change(function(){
   let id = $(this).val();
   let url = $(this).attr('url');
   let updateDistrict = $(this).attr('update');
   let deleteDistrict = $(this).attr('delete');
   $.ajax({
       type: 'get',
       url: url,
       data: {id: id},
       success: function(response){
            let arr = response.districts;
            $('.bodytable').empty();
            $.each(arr,function(index,value){
              
                $('.bodytable').append(`<tr>
                <td><input type="text" class="form-control " id="${value.id_dis}" value="${value.name}"></td>
                <td>
                    <button class="btn btn-success up" url="${updateDistrict}" value="${value.id_dis}" onclick = "updateDistrict(this)">Sửa</button>
                    <button class="btn btn-warning de" url="${deleteDistrict}" value="${value.id_dis}" onclick = "deleteDistrict(this)">Xoá</button>
                </td>
              </tr>`);
            });
       },
       error: function(){
           console.log("lỗi");
       }
   })
});

//thêm huyên
$('.addDistrict').click(function(){
    let url = $(this).attr('url');
    let id = $('.pro').val();
    let name = $('#district').val(); 
    if(name ===""){
        alert('Ô còn trống');
    }else{
        $.ajax({
            type: "get",
            url: url,
            data: {id: id,name: name},
            success: function(response){
                alert(response.message);
                window.location.reload();
            },
            error: function(){
                alert('Chưa chọn tỉnh');
            }
        });
    }
});

// sửa huyện
// $(document).ready(function(){
//     $('.de').click(function(){
   
//         console.log('áihi');
//         // let url = $(this).attr('url');
//         // console.log(url);
//     });
// });

// xoá huyện
function deleteDistrict(e){
    let url = e.getAttribute('url');
    let id = e.getAttribute('value');
    if(confirm("Bạn có chắc muốn xoá?\nĐiều này sẽ xoá hết dữ liệu của xã?")){
        $.ajax({
            type: 'get',
            url: url,
            data:{id: id},
            success: function(response){
                alert(response.message);
                window.location.reload();           
             },
            error: function(){
                console.log("lỗi");
            }
        });
    }
}

// sửa huyện
function updateDistrict(e){
    let url = e.getAttribute('url');
    let id = e.getAttribute('value');
    let name = $('#'+id).val();
   if(confirm('Bạn có chắc muốn sửa?')){
       if(name === ""){
           alert('không được bỏ trống');
       }else{
        $.ajax({
            type: 'get',
            url: url,
            data:{id: id,name: name},
            success: function(response){
               alert(response.message);
            },
            error: function(){
                console.log("lỗi");
            }
        });
       }
    
   }    
    
}

// hiện xã từ huyện
$('#districts').change(function(){
    let id = $(this).val();
    let url = $(this).attr('url');
    let updateVillages = $(this).attr('update');
    let deleteVillages = $(this).attr('delete');
    $.ajax({
        type: 'get',
        url: url,
        data: {id: id},
        success: function(response){
             let arr = response.villages;
             $('.bodytable').empty();
             $.each(arr,function(index,value){
               
                 $('.bodytable').append(`<tr>
                 <td><input type="text" class="form-control " id="${value.id_vil}" value="${value.name}"></td>
                 <td>
                     <button class="btn btn-success up" url="${updateVillages}" value="${value.id_vil}" onclick = "updateVillages(this)">Sửa</button>
                    <button class="btn btn-warning de" url="${deleteVillages}" value="${value.id_vil}" onclick = "deleteVillages(this)">Xoá</button>
                 </td>
               </tr>`);
             });
        },
        error: function(){
            console.log("lỗi");
        }
    })
 });

 $('.addVillages').click(function(){
    let url = $(this).attr('url');
    let id = $('#districts').val();
    let name = $('#village').val(); 
    if(name ===""){
        alert('Ô còn trống');
    }else{
        $.ajax({
            type: "get",
            url: url,
            data: {id: id,name: name},
            success: function(response){
                alert(response.message);
                window.location.reload();
            },
            error: function(){
                alert('Chưa chọn huyện');
            }
        });
    }
});



function updateVillages(e){
    let url = e.getAttribute('url');
    let id = e.getAttribute('value');
    let name = $('#'+id).val();
   if(confirm('Bạn có chắc muốn sửa?')){
       if(name === ""){
           alert('không được bỏ trống');
       }else{
        $.ajax({
            type: 'get',
            url: url,
            data:{id: id,name: name},
            success: function(response){
               alert(response.message);
            },
            error: function(){
                console.log("lỗi");
            }
        });
       }
    
   }    
    
}


function deleteVillages(e){
    let url = e.getAttribute('url');
    let id = e.getAttribute('value');
    if(confirm("Bạn có chắc muốn xoá?")){
        $.ajax({
            type: 'get',
            url: url,
            data:{id: id},
            success: function(response){
                alert(response.message);
                window.location.reload();           
             },
            error: function(){
                console.log("lỗi");
            }
        });
    }
}


$('.addType').click(function(){
    let url = $(this).attr('url');
    let data = $('.type').val();
    let token = $("input[name='_token']").val();
    if(data ===""){
        alert('Ô còn trống');
    }else{
        $.ajax({
            type: 'post',
            url: url,
            data:{name: data,_token: token},
            success: function(response){
                alert(response.message);
                $('.type').val('');
                window.location.reload();
            },
            error: function(){
                console.log("lỗi");
            }
        });
    }
    
});


$('.addCategory').click(function(){
    let url = $(this).attr('url');
    let data = $('.category').val();
    let token = $("input[name='_token']").val();
    if(data ===""){
        alert('Ô còn trống');
    }else{
        $.ajax({
            type: 'post',
            url: url,
            data:{name: data,_token: token},
            success: function(response){
                alert(response.message);
                // console.log(response);
                $('.category').val('');
                window.location.reload();
            },
            error: function(xhr){
                console.log(xhr.responseText);
                console.log("lỗi");
            }
        });
    }
    
});