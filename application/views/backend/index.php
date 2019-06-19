<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">

      <div class="row ">
        <div class="col-md-4 col-sm-12">
          <div class="card">
            <div class="card-content">
              <div class="media align-items-stretch">
                <div class="p-2 text-center bg-warning">
                  <i class="icon-list font-large-2 white"></i>
                </div>
                <div class="p-2 bg-gradient-x-warning white media-body">
                  <h5>Nomor Antrian Saat ini</h5>
                  <h5 class="text-bold-400 mb-0"><b><?= $antrian_now[0]->booking_antrian ?></b></h5>
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
                  <a href="" title="Ambil Nomor Antrian" data-toggle="modal" data-target="#default">
                    <i class="icon-plus font-large-2 white"></i>
                  </a>
                  <h5>Ambil Nomor Antrian</h5>
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
                  <h5>Perkiraan waktu giliran anda</h5>
                  <h5 class="text-bold-400 mb-0"><b>4</b></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row match-height">
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
                      <th>Biaya</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-truncate">PO-10521</td>
                      <td class="text-truncate"><a href="#">INV-001001</a></td>
                      <td class="text-truncate">Elizabeth W.</td>
                      <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                      <td class="text-truncate">$ 1200.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">PO-532521</td>
                      <td class="text-truncate"><a href="#">INV-01112</a></td>
                      <td class="text-truncate">Doris R.</td>
                      <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                      <td class="text-truncate">$ 5685.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">PO-05521</td>
                      <td class="text-truncate"><a href="#">INV-001012</a></td>
                      <td class="text-truncate">Andrew D.</td>
                      <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                      <td class="text-truncate">$ 152.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">PO-32521</td>
                      <td class="text-truncate"><a href="#">INV-008101</a></td>
                      <td class="text-truncate">Walter R.</td>
                      <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                      <td class="text-truncate">$ 685.00</td>
                    </tr>
                    <tr>
                      <td class="text-truncate">PO-15521</td>
                      <td class="text-truncate"><a href="#">INV-001401</a></td>
                      <td class="text-truncate">Megan S.</td>
                      <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                      <td class="text-truncate">$ 1450.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Recent Buyers</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="card-content px-1">
              <div id="recent-buyers" class="media-list height-300 position-relative">

                <a href="#" class="media border-0">
                  <div class="media-left pr-1">
                    <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="<?= base_url()?>assets/frontend/app-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                      <i></i>
                    </span>
                  </div>
                  <div class="media-body w-100">
                    <h6 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right pt-1">$1,021</span></h6>
                    <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span class="badge badge-warning ml-1">Decor</span></p>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
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
      <form class="form" action="" method="POST">
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