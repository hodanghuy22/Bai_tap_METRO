<script>
    var phone = '';

    function loadStation() {
        
        $.ajax({
            url: 'api/getTicket.php',
            method: 'GET',
            data: {
                phone: phone
            }
        }).done(function(res) {
            var lst = JSON.parse(res);
            var ds = '';
            for(var i=0; i<lst.length; i++){
                ds += '<tr><td>'+lst[i].id_ticket+'</td><td>'+lst[i].ngay_dat+'</td><td>'+lst[i].ten_tuyen+'</td><td>'+lst[i].ga_len+'</td><td>'+lst[i].ga_xuong+'</td><td>'+lst[i].soluong+'</td><td>'+lst[i].thanhtien+'</td></tr>';
            }
            $(".tb_search").html(ds);
            if(lst.length==0){
                alert("KHONG CO DU LIEU");
            }
        });
    }
    loadStation();
    $('#btn_search').click(function() {
        phone = $('#txt_search').val();
        if($('#txt_search').val().trim()==''){
            alert("Khong duoc de trong");
            return;
        }
        if(!phone.match(/^((0)||(84)||(\+84))\d{9}$/g)){
            alert("sai dinh dang so");
            return;
        }
        loadStation();
    })
</script>