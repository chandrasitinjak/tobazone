@extends('admin.layouts.app') 
@section('title') {{ "Member" }}
@endsection

@section('content')

	<style type="text/css">
		body {
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
		}
		
		/* Table */
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;

		}
		.demo-table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.demo-table th, 
		.demo-table td {
			border-bottom: 1px solid #e1edff;
			border-left: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.demo-table th, 
		.demo-table td:last-child {
			border-right: 1px solid #e1edff;
		}
		.demo-table td:first-child {
			border-top: 1px solid #e1edff;
		}
		.demo-table td:last-child{
			border-bottom: 0;
		}
		caption {
			caption-side: top;
			margin-bottom: 10px;
		}
		
		/* Table Header */
		.demo-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}
		
		/* Table Body */
		.demo-table tbody td {
			color: #353535;
		}
		
		.demo-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.demo-table tbody tr:hover th,
		.demo-table tbody tr:hover td {
			background-color: #a2ffff;
			border-color: #0ff7ff;
			transition: all .2s;
		}
	</style>
</head>
<body>
	<div class="responsive">
		<h5 class="mt-5">Daftar Request Koperasi Aktif di Tobazone</h5>
	<table class="demo-table responsive">
		<thead>
			<tr>
				<th scope="col">Nama Koperasi</th>
				<th scope="col">Jenis Koperasi</th>
				<th scope="col">Nama Pendiri</th>
				<th scope="col">Alamat Koperasi</th>
				<th scope="col">Tahun Berdiri Koperasi</th>
				<th scope="col">Email Koperasi</th>
				<th scope="col">No Izin Koperasi</th>
				<th scope="col">Logo Koperasi</th>
				<th scope="col">Bukti Bayar</th>
				<th scope="col">Aksi</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td data-header="Nama Koperasi" class="title">Maju Jaya</td>
				<td data-header="Jenis Koperasi">Koperasi Simpan Pinjam</td>
				<td data-header="Nama Pendiri">Suciman</td>
				<td data-header="Alamat Koperasi">Balige</td>
				<td data-header="Tahun Berdiri Koperasi">Minggu, 3 Mei 2020</td>
				<td data-header="Email Koperasi">majujaya@gmail.com</td>
				<td data-header="No Izin Koperasi">114432323</td>
				<td data-header="Logo Koperasi"><img src=""></td>
				<td data-header="Bukti Bayar"><img src=""></td>
                <td><a class="btn btn-primary" href="#" role="button">Terima</a></td>
                <br>
                <td><a class="btn btn-danger" href="#" role="button">Tolak</a></td>
			</tr>
			<tr>
				<td data-header="Nama Koperasi" class="title">Mumbang Lonong</td>
				<td data-header="Jenis Koperasi">Koperasi Serba Usaha</td>
				<td data-header="Nama Pendiri" >Andika Simangunsong</td>
				<td data-header="Alamat Koperasi">Di Jonggol</td>
				<td data-header="Tahun Berdiri Koperasi" >Kamis, 16 Mei 2019</td>
				<td data-header="Email Koperasi">mumbanglonong@gmail.com</td>
				<td data-header="No Izin Koperasi">0987679765434567</td>
				<td data-header="Logo Koperasi">Logo Koperasi Tidak Ada</td>
				<td data-header="Bukti Bayar"><img src=""></td>
				<td><a class="btn btn-primary" href="#" role="button">Terima</a></td>
                <br>
                <td><a class="btn btn-danger" href="#" role="button">Tolak</a></td>
			</tr>
			<tr>
				<td data-header="Nama Koperasi" class="title">Mumbang Lonong</td>
				<td data-header="Jenis Koperasi">Koperasi Serba Usaha</td>
				<td data-header="Nama Pendiri">Andika Simangunsong</td>
				<td data-header="Alamat Koperasi">Di Jonggol</td>
				<td data-header="Tahun Berdiri Koperasi">Kamis, 16 Mei 2019</td>
				<td data-header="Email Koperasi">mumbanglonong@gmail.com</td>
				<td data-header="No Izin Koperasi">0987679765434567</td>
				<td data-header="Logo Koperasi"><img src=""></td>
				<td data-header="Bukti Bayar"><img src=""></td>
				<td><a class="btn btn-primary" href="#" role="button">Terima</a></td>
                <br>
                <td><a class="btn btn-danger" href="#" role="button">Tolak</a></td>
			</tr>
			<div>
				<input type="search" class="form-control ds-input" id="search-input" placeholder="Cari" aria-label="Search for..." style="position: right; vertical-align: 5px;">
			</div>
		</div>
			
		</tbody>
	</table>

@endsection