<script>
    var id_tuyen = 1;
    var old_up = $('#ddl_galen').val();
    var old_down = $('#ddl_gaxuong').val();
    var tongga = 0;
    function loadStation() {
        
        $.ajax({
            url: 'api/getStation.php',
            method: 'GET',
            data: {
                id: id_tuyen
            }
        }).done(function(res) {
            var lst_html = JSON.parse(res);
            tongga = lst_html.length;
            var dsga = '';
            for(var i=0; i<lst_html.length; i++){
                dsga += '<option data-or="'+lst_html[i].stt+'" value="'+lst_html[i].id_ga+'">'+lst_html[i].ten_ga+'</option>';
            }
            $('#ddl_galen').html(dsga);
            $('#ddl_gaxuong').html(dsga);
            $('#ddl_gaxuong').val(lst_html[1].id_ga);
            old_up = $('#ddl_galen').val();
            old_down = $('#ddl_gaxuong').val();
            updateTien();
        });
    }
    function tinhTien(up,down,min_gia,gia,soluong){
        var soga = Math.abs(up - down) + 1;
        var money = 0;
        if(soga <= Math.ceil(tongga/2)){
            money = min_gia * soluong;
        }else{
            money = min_gia * 1 + (soga - Math.ceil(tongga/2)) * gia * soluong;
        }
        return money;
    }        
    function updateTien(){
        var tien = tinhTien($("#ddl_galen>option:selected").attr('data-or'),$("#ddl_gaxuong>option:selected").attr('data-or'),$("#ddl_tuyen>option:selected").attr('data-min'),$("#ddl_tuyen>option:selected").attr('data-gia'),$("#soluong").val());

        $('#thanhtien').html(tien + " vnd");
        $('#thanhtien_in').val(tien);
    }
    loadStation();
    $('#ddl_tuyen').change(function() {
        id_tuyen = $(this).val();
        loadStation();
        updateTien();
    })
    $('#soluong').change(function() {
        updateTien();
    })
    $('#soluong').keypress(function() {
        updateTien();
    })
    $('#ddl_galen,#ddl_gaxuong').change(function() {
        var up = $('#ddl_galen').val();
        var down = $('#ddl_gaxuong').val();
        if(up==down){
            alert("KHONG DUOC CHON TRUNG");
            $('#ddl_galen').val(old_up);
            $('#ddl_gaxuong').val(old_down);
        }else{
            old_up = $('#ddl_galen').val();
            old_down = $('#ddl_gaxuong').val();
            updateTien();
        }
    })
    $('#frm_datve').submit(function(e){
        var phone = $('#sdt').val();
        if($('#sdt').val().trim() == ''||$('#soluong').val().trim() == ''){
            alert("KHONG DUOC DE TRONG");
            e.preventDefault();
            return;
        }
        if(!phone.match(/^((0)||(84)||(\+84))\d{9}$/g)){
            alert("sai dinh dang so");
            e.preventDefault();
            return;
        }
    })
</script>