<main class="pt-3 pb-3">
    <div id="cau-2" class="container-fluid">
        <div class="container w-75 m-auto">
            <form id="frm_datve" method="post">
                <div class="mb-3 row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label"><span class="fw-bold">Tuyen</span></label>
                            <select class="form-select form-select-lg" name="ddl_tuyen" id="ddl_tuyen">
                                <?php
                                    foreach($lstRoute as $key=>$r){
                                ?>
                                <option data-min="<?php echo $r['gia_min']?>" data-gia="<?php echo $r['gia_ve']?>" value="<?php echo $r['id_tuyen']?>"><?php echo $r['ten_tuyen']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label"><span class="fw-bold">Ga len</span></label>
                            <select class="form-select form-select-lg" name="ddl_galen" id="ddl_galen">
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label"><span class="fw-bold">Ga xuong</span></label>
                            <select class="form-select form-select-lg" name="ddl_gaxuong" id="ddl_gaxuong">
                                
                                <!-- <option value="">Jakarta</option> -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label"><span class="fw-bold">So luong</span></label>
                            <input type="number" class="form-control" value="1000" name="soluong" id="soluong" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="" class="form-label"><span class="fw-bold">So dien thoai</span></label>
                            <input type="text" class="form-control" name="sdt" id="sdt" aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <span class="fw-bold">Thanh tien: </span>
                            <br>
                            <span id="thanhtien">45.000 d</span>
                            <input type="hidden" name="thanhtien_in" id="thanhtien_in">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="btn_datVe" id="btn_datVe" class="btn w-50 btn-primary"><span class="fw-bold">Dat ve</span></button>
                    </div>
                </div>
            </form>
        </div>
        <?php
            if(isset($rs)){
                if($rs == true){
                    echo '<h2 class="text-danger">Thanh Cong</h2>';
                }else{
                    echo '<h2 class="text-danger">Chua duoc</h2>';
                }
            }
        ?>
    </div>
</main>