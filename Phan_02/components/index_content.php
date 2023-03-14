<main class="pt-3 pb-3">
    <div id="cau-1" class="container-fluid">
        <div class="card my-5">
            <div class="card-body pt-0">
                <span class="ten-tuyen">Tuyen so 1</span>
                <div class="ds-ga">
                    <!-- <div class="ga">
                        <label for="ga-1"><span>Ben Thanh</span></label>
                        <input type="radio" name="ga" id="ga-1" checked data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Tuyen <span class='badge text-bg-light'>1</span>" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip">
                    </div> -->
                    
                </div>
            </div>
            <div class="card-footer text-center">
                <div class="badge rounded-pill text-bg-secondary">
                    <i class="fa-solid fa-clock"></i>
                    <span class="thoi_gian">5:00 - 21:00</span>
                </div>
                <div class="badge rounded-pill text-bg-secondary">
                    <i class="fa-solid fa-arrows-left-right-to-line"></i>
                    <span class="chieu_dai">28km</span>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <?php
                foreach($lstRoute as $key=>$r){
            ?>
            <button type="button" data-time="<?php echo $r['thoi_gian_hoat_dong']?>" data-length="<?php echo $r['chieu_dai']?>" data-id="<?php echo $r['id_tuyen']?>"  class="btn lst_route <?php echo ($key==0?'btn-warning':'btn-primary')?>"><?php echo $r['ten_tuyen']?></button>
            <?php
                }
            ?>
        </div>
    </div>
</main>