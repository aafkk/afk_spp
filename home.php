<h1 class="h3 mb-3"><strong>Profile -</strong> Dashboard</h1>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table class="table">
					<?php
					if (isset($_SESSION['user']['level'])) {
					?>
						<tr>
							<td width="200">Nama User</td>
							<td width="1">:</td>
							<td><?php echo $_SESSION['user']['nama_petugas']; ?></td>
						</tr>
						<tr>
							<td width="200">Level User</td>
							<td width="1">:</td>
							<td><?php echo $_SESSION['user']['level']; ?></td>
						</tr>
					<?php
					} else {
					?>
						<tr>
							<td width="200">Nama User</td>
							<td width="1">:</td>
							<td><?php echo $_SESSION['user']['nama']; ?></td>
						</tr>
						<tr>
							<td width="200">Role</td>
							<td width="1">:</td>
							<td>Siswa</td>
						</tr>


					<?php
					}
					?>
					<tr>
						<td width="200">Tanggal Login</td>
						<td width="1">:</td>
						<td><?php echo date('d-m-Y H:i:s'); ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="w-100">
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Jumlah siswa</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="users"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">
								<?php
								$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM siswa");
								$data = mysqli_fetch_array($query);
								echo $data['total'];
								?>
							</h1>

						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Total Pembayaran Tahun ini</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="dollar-sign"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">
								<?php
								$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pembayaran WHERE tahun_dibayar='2023'");
								$data = mysqli_fetch_array($query);
								echo $data['total'];
								?>
							</h1>

						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Total kelas</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="book-open"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">
								<?php
								$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kelas");
								$data = mysqli_fetch_array($query);
								echo $data['total'];
								?>
							</h1>

						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Jumlah Petugas</h5>
								</div>

								<div class="col-auto">
									<div class="stat text-primary">
										<i class="align-middle" data-feather="user"></i>
									</div>
								</div>
							</div>
							<h1 class="mt-1 mb-3">
								<?php
								$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM petugas");
								$data = mysqli_fetch_array($query);
								echo $data['total'];
								?>
							</h1>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>