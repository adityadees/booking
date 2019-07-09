 <body onload="myFunction()">
    <div class="content-body">
        <section class="card">
            <div id="invoice-template" class="card-body">
                <div id="invoice-company-details">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 text-center text-md-left">
                            <div class="media">
                                <img src="<?= base_url();?>images/logo/thumbnail.png" width="180px" height="100px" alt="company logo" class=""/>
                                <div class="media-body">
                                    <ul class="ml-2 px-0 list-unstyled">
                                        <li class="text-bold-800">LAN SERVICE</li>
                                        <li>Jl. A. Yani Simpang 3 16 Ulu, Sumatera Selatan 30265</li>
                                        <li>(+62) 811-7872-822</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 text-center text-md-right">
                            <h2>INVOICE</h2>
                            <p>#<?= $data['booking_kode']; ?></p>
                            <p class="pb-3"><span class="text-muted">Tanggal Layanan :</span> <?= date('d/m/Y',strtotime($data['booking_tanggal']));?></p>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama :</label>
                                <?= $data['user_nama']; ?>
                                <br>
                                <label>Tel :</label>
                                <?= $data['user_tel']; ?>
                                <br>
                                <label>Alamat :</label>
                                <?= $data['user_alamat']; ?>
                            </div>
                            <ul class="px-0 list-unstyled">
                                <li>Total Biaya</li>
                                <li class="lead text-bold-800">Rp. <?= number_format($data['transaksi_biaya']);?></li>
                            </ul>


                            <ul class="px-0 list-unstyled">
                                <li class="lead text-bold-800">Keterangan</li>
                                <li class="">
                                    <?= $data['transaksi_keterangan'];?>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <table width="100%" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rincian</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $ttl = 0;
                                    $x = explode(',', $data['transaksi_rincian']);
                                    foreach ($x as $key)  : 
                                        foreach ($rincian as $keyz => $va) : 
                                            if($va->rincian_id == $key){
                                                $ttl += $va->rincian_harga;
                                                ?>
                                                <tr>
                                                    <td><?= $va->rincian_nama ?></td>
                                                    <td><?= "Rp. ".number_format($va->rincian_harga) ?></td>
                                                </tr>
                                                <?php
                                            }
                                        endforeach; 
                                    endforeach; 
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right"><b>Total</b></td>
                                        <td><?= "Rp. ".number_format($ttl); ?></td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script>
  function myFunction() {
    window.print();
}
</script>