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
												<th>No</th>
												<th>Jenis</th>
												<th>Harga</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; foreach($rincian as $pb): $no++;?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $pb->rincian_nama?></td>
													<td><?= $pb->rincian_harga?></td>
													<td class="text-center">
														<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
														<button class="btn btn-danger"><i class="fa fa-trash"></i></button>
													</td>
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