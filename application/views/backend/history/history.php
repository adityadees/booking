<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">
			<section id="configuration">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Riwayat Transaksi</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><a data-action="close"><i class="ft-x"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<p class="card-text">Data riwayat transaksi</p>
									<table class="table table-striped table-bordered zero-configuration">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Plat Nomor</th>
												<th>Layanan</th>
												<th class="text-center">Biaya</th>
												<th class="text-center">Status</th>
												<th>Tanggal</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($history as $hs):?>
												<tr>
													<td class="text-truncate"><a href="<?= base_url('d/riwayat/'.$hs->booking_kode)?>"><?= $hs->booking_kode ?></a></td>
													<td class="text-truncate"><?= $hs->booking_plat ?></td>
													<td class="text-truncate"><?= $hs->booking_layanan ?></td>
													<td class="text-truncate text-center"><?php if(isset($hs->transaksi_biaya)){echo "Rp ".number_format($hs->transaksi_biaya);} else {echo "-";} ?></td>
													<td class="text-truncate"><?= date('d-m-Y',strtotime($hs->booking_tanggal)) ?></td>
													<td class="text-truncate text-center"><span class="badge <?php if($hs->booking_status=='batal'){echo 'badge-danger';} else {echo 'badge-success';}?>"><?= ucfirst($hs->booking_status) ?></span></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>