<div class="app-content content">
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">
			<section id="configuration">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Perbaikan</h4>
								<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a  class="btn btn-primary text-white"  data-toggle="modal" data-target="#modalAdd">Tambah Data</a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<p>
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
									</p>

									<p class="card-text">Daftar jenis perbaikan</p>
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
													<button class="btn btn-primary" onclick="get_edit('<?= $pb->rincian_id ?>','<?= $pb->rincian_nama ?>', '<?= $pb->rincian_harga ?>');" data-toggle="modal" data-target="#modalEdit"><i class="fa fa-pencil"></i></button>
													<button class="btn btn-danger"  onclick="$('#del-id').val('<?= $pb->rincian_id ?>')" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i></button>
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



<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel34">Tambah Jenis Perbaikan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url()?>BackendC/save_perbaikan" method="POST">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Nama: </label>
								<input type="text" placeholder="Nama" name="nama" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Harga: </label>
								<input type="text" placeholder="Harga" name="harga" class="form-control">
							</div>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
					<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade text-left" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel34">Edit Jenis Perbaikan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url()?>BackendC/edit_perbaikan" method="POST">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Nama: </label>
								<input type="text" placeholder="Nama" name="nama" id="edit-nama" class="form-control">
								<input type="hidden" placeholder="Nama" name="id" id="edit-id" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Harga: </label>
								<input type="text" placeholder="Harga" name="harga" id="edit-harga" class="form-control">
							</div>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
					<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade text-left" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel34">Hapus Data</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url()?>BackendC/delete_perbaikan" method="POST">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12 text-center">
							<i class="fa fa-exclamation-triangle fa-4x text-warning"></i>
							<br>
							<br>
							<b class="text-danger">Apakah anda yakin ingin menghapus data ini ? </b>
							<input type="hidden" placeholder="Nama" name="id" id="del-id" class="form-control">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
					<input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>




<script type="text/javascript">
	function get_edit(id,nama,harga){
		$('#edit-id').val(id);
		$('#edit-nama').val(nama);
		$('#edit-harga').val(harga);
	}
</script>