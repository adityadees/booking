<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
      <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } else if($this->session->flashdata('error')){?>
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
        </div>
      <?php }?>


      <?php if($_SESSION['user_role']=='customer'){?>        
        <div class="row same-height">
          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-warning">
                    <i class="icon-list font-large-2 white"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-warning white media-body">
                    <h5>Nomor Antrian Saat ini</h5>
                    <h5 class="text-bold-400 mb-0"><b><?php if(!isset($antrian_now[0]->max_num)){ echo "Belum ada antrian saat ini";} else {echo $antrian_now[0]->max_num; } ?></b></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 bg-gradient-x-primary white media-body text-center">
                    <?php if(count($antrian_anda) == 0){?>
                      <a href="" title="Ambil Nomor Antrian" data-toggle="modal" data-target="#default">
                        <i class="icon-plus font-large-2 white"></i>
                      </a>
                      <h5>Ambil Nomor Antrian</h5>
                    <?php } else { ?>
                      <i class="fa fa-thumb-tack"></i>
                      <h5>Nomor Antrian anda <b><?= $antrian_anda[0]->booking_antrian ?></b></h5>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#konfirmasi_batal" onclick="$('#batalkd').val('<?= $antrian_anda[0]->booking_kode ?>')" <?php if($antrian_anda[0]->booking_status=='proses') {echo "disabled";}?>>Batalkan</button>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-warning ">
                    <i class="icon-clock font-large-2 white"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-warning white media-body">
                    <h5>Perkiraan waktu</h5>
                    <h5 class="text-bold-400 mb-0">
                      <?php if(count($antrian_anda) == 0){?>
                        <p class="font-small-1">
                          Ambil nomor antrian terlebih dahulu
                        </p>
                      <?php } else {?>
                        <b>
                          <?php 
                          $arrmon = 0;
                          foreach($montir as $mon) :
                            $sts = '';
                            if($mon->montir_status == 'aktif'){            
                              if($mon->pickup_id == '' or $mon->pickup_id == null){
                                $sts = 'kosong';
                                $arrmon +=1;
                              }  else {
                                $sts = 'sibuk';
                              }                   
                            } else {
                              $sts = 'off';
                            } endforeach;
                            if($arrmon == 0){

                              if(!isset($antrian_now[0]->max_num))
                                { echo "Sekarang";} 
                              else {
                                echo date('H:i',strtotime($getpick[0]->pickup_est_selesai));
                              } 

                            } else {
                              echo "Sekarang";
                            }

                            ?>  
                          </b>
                        <?php } ?>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="row match-height">

          <?php if($_SESSION['user_role']=='admin'){?>        
            <div class="col-xl-8 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Waiting List</h4>
                  <p>Daftar antrian hari ini</p>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                      <thead>
                        <tr>
                          <th class="text-center">No. Antrian</th>
                          <th>Nama</th>
                          <th>Layanan</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($antrian_list as $ak) :?>
                          <tr>
                            <td class="text-truncate text-center"><?= $ak->booking_antrian ?></td>
                            <td class="text-truncate"><?= $ak->user_nama ?></td>
                            <td class="text-truncate"><?= $ak->booking_layanan ?></td>
                            <td class="text-truncate text-center">
                              <?php if($ak->booking_status == 'proses'){ ?>
                                <button class="btn btn-primary" title="Konfirmasi" data-toggle="modal" data-target="#konfirmasi_selesai" onclick="$('#kodebook').val('<?= $ak->booking_kode?>')"><i class="fa fa-print"></i></button>
                              <?php } else {?>
                                <button class="btn btn-primary" title="Konfirmasi" data-toggle="modal" data-target="#konfirmasi_antrian" onclick="get_antrian_list('<?= $ak->booking_kode ?>','<?= $ak->booking_layanan ?>','<?= $ak->user_nama ?>','<?= $ak->booking_plat ?>','<?= $ak->user_id ?>','<?= $ak->booking_kendala ?>')"><i class="fa fa-check-square-o"></i></button>
                                <button class="btn btn-danger" title="Batalkan"  data-toggle="modal" data-target="#konfirmasi_batal" onclick="$('#batalkd').val('<?= $ak->booking_kode?>')"><i class="fa fa-times"></i></button>
                              <?php } ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <?php } else {?>
            <div class="col-xl-8 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent</h4>
                  <p>Rekam jejak anda di bengkel Lan Service</p>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th>Plat Nomor</th>
                          <th>Layanan</th>
                          <th class="text-center">Biaya</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($recent as $rc) :?>
                          <tr>
                            <td class="text-truncate"><?= date('d-m-Y',strtotime($rc->booking_tanggal)) ?></td>
                            <td class="text-truncate"><?= $rc->booking_plat ?></td>
                            <td class="text-truncate"><?= $rc->booking_layanan ?></td>
                            <td class="text-truncate text-center"><?php if(isset($rc->transaksi_biaya)){echo "Rp ".number_format($rc->transaksi_biaya);} else {echo "-";} ?></td>
                            <td class="text-truncate"><span class="badge <?php if($rc->booking_status=='batal'){echo 'badge-danger';} else {echo 'badge-success';}?>"><?= ucfirst($rc->booking_status) ?></span></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <?php }?>

          <div class="col-xl-4 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Activity</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content px-1">
                <div id="recent-buyers" class="media-list height-300 position-relative">
                  <?php 
                  foreach($montir as $mn) :
                    $sts = '';
                    if($mn->montir_status == 'aktif'){            
                      if($mn->pickup_id == '' or $mn->pickup_id == null){
                        $sts = ['avatar-online','Kosong','badge-primary'];
                      }  else {
                        $sts = ['avatar-away','Sibuk','badge-warning'];
                      }                   
                    } else {
                      $sts = ['avatar-busy','Off','badge-danger'];
                    }
                    ?>
                    <a href="#" class="media border-0">
                      <div class="media-left pr-1">
                        <span class="avatar avatar-md <?= $sts[0] ?>">
                          <img class="media-object rounded-circle" src="<?= base_url('uploads/montir/'.$mn->montir_foto )?>" alt="Generic placeholder image">
                          <i></i>
                        </span>
                      </div>
                      <div class="media-body w-100">
                        <h6 class="list-group-item-heading">
                          <?= $mn->montir_nama ?> 
                          <span class="font-medium-4 float-right pt-1" title="Estimasi waktu pekerjaan akan selesai">
                            <?php if($mn->pickup_est_selesai == ''){echo "-";} else {echo date('H:i',strtotime($mn->pickup_est_selesai)); }?>
                          </span>
                        </h6>
                        <p class="list-group-item-text mb-0">
                          <span class="badge <?= $sts[2] ?>">
                            <?= $sts[1] ?>
                          </span>
                        </p>
                      </div>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade text-left" id="konfirmasi_antrian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">Konfirmasi Antrian</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form" action="<?= base_url('backendc/konfirmasi_antrian')?>" method="POST">
          <div class="modal-body">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="Kode">Kode Antrian</label>
                    <input type="text" id="list_kode" class="form-control" name="kode" readonly >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" id="list_nama" class="form-control" name="nama" readonly >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="Plat">Plat Nomor</label>
                    <input type="text" id="list_plat" class="form-control" name="plat" readonly >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="layanan">Layanan</label>
                    <input type="text" id="list_layanan" class="form-control" name="layanan" readonly >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <hr>
                  <p><b>Kendala :</b></p>
                  <p id="list_problem"></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="montir">Montir Handle</label>
                    <select class="form-control" name="montir">
                      <?php 
                      foreach($montir as $mon) :
                        $sts = '';
                        if($mon->montir_status == 'aktif'){            
                          if($mon->pickup_id == '' or $mon->pickup_id == null){
                            $sts = 'kosong';
                          }  else {
                            $sts = 'sibuk';
                          }                   
                        } else {
                          $sts = 'off';
                        }
                        if($sts == 'kosong'){
                          ?>
                          <option value="<?= $mon->montir_id ?>"><?= $mon->montir_nama?></option>
                        <?php } endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="est">Estimasi Pengerjaan (Menit)</label>
                      <input type="number" name="est" class="form-control" title="estimasi pengerjaan dalam satuan menit">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-x"></i> Cancel</button>
              <button class="btn btn-outline-primary" type="submit"><i class="fa fa-check-square-o"></i>  Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>




    <div class="modal fade text-left" id="konfirmasi_selesai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Konfirmasi Selesai</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form" action="<?= base_url('backendc/konfirmasi_selesai')?>" method="POST">
            <div class="modal-body">
              <div class="form-body">
                <div class="form-group">
                  <label for="kode">Kode</label>
                  <input type="text" id="kodebook" class="form-control" name="kode" readonly="">
                </div>

                <div class="form-group">
                  <label for="biaya">Biaya</label>
                  <input type="text" id="biaya" class="form-control" placeholder="Biaya" name="biaya"  data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Biaya Perbaikan / Pembelian">
                </div>

                <div class="form-group">
                  <label for="rincian">Rincian</label>
                  <textarea id="rincian" rows="5" class="form-control" name="rincian" placeholder="Rincian total biaya yang dikeluarkan"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-x"></i> Cancel</button>
              <button class="btn btn-outline-primary" type="submit"><i class="fa fa-check-square-o"></i>  Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Ambil Nomor Antrian</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form" action="<?= base_url('backendc/get_antrian')?>" method="POST">
            <div class="modal-body">
              <div class="form-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" value="<?= $_SESSION['user_nama']; ?>" readonly data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Nama">
                </div>

                <div class="form-group">
                  <label for="platnomor">Plat Nomor</label>
                  <input type="text" id="platnomor" class="form-control" placeholder="Plat Nomor" name="plat"  data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Plat Nomor">
                </div>

                <div class="form-group">
                  <label for="layanan">Layanan</label>
                  <select id="layanan" name="layanan" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Layanan">
                    <option value="service">Service</option>
                    <option value="sparepart">Perbaikan Sparepart</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="kendala">Kendala</label>
                  <textarea id="kendala" rows="5" class="form-control" name="kendala" placeholder="Ex: Perbaikan spak rem, ganti oli, service bulanan, motor sering mogok" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Masukan Kendala anda"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-x"></i> Cancel</button>
              <button class="btn btn-outline-primary" type="submit"><i class="fa fa-check-square-o"></i>  Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade text-left" id="konfirmasi_batal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form" action="<?= base_url('backendc/konfirmasi_batal')?>" method="POST">
            <div class="modal-body">
              <div class="form-body">

                <h5 class="text-center">Apakah anda yakin akan membatalkan antrian ini?</h5 class="text-center">
                  <p class="text-center text-warning"><i class="fa fa-warning font-large-2"></i></p>
                  <p class="text-danger text-center">Data antrian yang telah dibatalkan tidak dapat dikembalikan lagi</p>
                  <input type="hidden" id="batalkd" class="form-control" name="kode" readonly="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-x"></i> Batal</button>
                <button class="btn btn-outline-primary" type="submit"><i class="fa fa-check-square-o"></i>  Ya</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        function get_antrian_list(kode,layanan,nama,plat,id,problem){
          $('#list_kode').val(kode);
          $('#list_layanan').val(layanan);
          $('#list_nama').val(nama);
          $('#list_plat').val(plat);
          $('#list_problem').text(problem);
        }
      </script>