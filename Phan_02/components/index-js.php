<script>
    var id_tuyen = 1;

    function loadStation() {
        $('.ten-tuyen').html($('.btn-warning').html());
        $('.thoi_gian').html($('.btn-warning').attr('data-time'));
        $('.chieu_dai').html($('.btn-warning').attr('data-length') + " km");

        $.ajax({
            url: 'api/getStationByRoute.php',
            method: 'GET',
            data: {
                id: id_tuyen
            }
        }).done(function(res) {
            var lst_html = JSON.parse(res);
            var dsga = '';
            var thVe = '';
            for (var i = 0; i < lst_html.length; i++) {
                if (i != 0 && lst_html[i].id_ga != lst_html[i - 1].id_ga) {
                    dsga += '<div class="ga"><label for="ga-' + lst_html[i - 1].id_ga + '"><span>' + lst_html[i - 1].ten_ga + '</span></label><input type="radio" name="ga" id="ga-' + lst_html[i - 1].id_ga + '" '+(lst_html[i-1].stt==1?'checked':'')+' data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Tuyen ' + thVe + '" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"></div>';
                    thVe = '';
                }
                thVe += '<span class=\'badge text-bg-light\'>' + lst_html[i].tuyen_thuoc_ve + '</span>';
                if (i == lst_html.length - 1) {
                    dsga += '<div class="ga"><label for="ga-' + lst_html[i].id_ga + '"><span>' + lst_html[i].ten_ga + '</span></label><input type="radio" name="ga" id="ga-' + lst_html[i].id_ga + '"  data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Tuyen ' + thVe + '" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"></div>';
                    thVe = '';
                }
            }
            $('.ds-ga').html(dsga);
            tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        });
    }

    loadStation();
    $('.lst_route').click(function() {
        $('.lst_route').removeClass('btn-warning');
        $('.lst_route').addClass('btn-primary');
        $(this).addClass('btn-warning');
        id_tuyen = $(this).attr('data-id');
        loadStation();
    })
</script>