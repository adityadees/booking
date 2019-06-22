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
                                        <li>Jl. Ilir Bar. I, Kota Palembang, Sumatera Selatan 30137</li>
                                        <li>(+62) 823-7137-3347</li>
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
                        </div>
                        <div class="col-md-6">
                            <ul class="px-0 list-unstyled">
                                <li class="lead text-bold-800">Rincian Perbaikan</li>
                                <li class="">
                                    <?= $data['transaksi_keterangan'];?>
                                </li>
                            </ul>
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