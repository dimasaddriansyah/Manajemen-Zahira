<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="/buatprint/css/app.css">
</head>
<body>
	<div class="col-12 mt-3">
		<div class="card">
			<h1>Zahira Shop</h1>
			<table class="table">
				<tr>
					<td>No Transaksi</td>
					<td>:</td>
					<td>{{ $transaksi_barang->id }}</td>
				</tr>
				<tr>
					<td>Tanggal Pembelian</td>
					<td>:</td>
					<td>{{ $transaksi_barang->created_at }}</td>
				</tr>
				<tr>
					<td>Nama Pembeli</td>
					<td>:</td>
					<td>{{ $transaksi_barang->nama_pembeli }}</td>
				</tr>
			</table>
			<h5>----------------------------------------------------------------------------------------------------</h5>
			<div class="card-body">
			  <table class="table table-bordered">
				<thead class="thead-dark">
						<tr>
							<th>No|</th>
							<th>Nama Barang	|</th>
							<th>Jumlah Beli	|</th>
							<th>Harga Satuan	|</th>
							<th>Jumlah Harga	|</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transaksi_detail as $key => $transaksi_detail)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$transaksi_detail->barang->name}}</td>
								<td>{{ $transaksi_detail->jumlah_beli }}pcs</td>
								<td>@currency($transaksi_detail->barang->harga)</td>
								<td>@currency($transaksi_detail->jumlah_harga)</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="3"></td>
							<td><strong></strong> Total Harga</td>
							<td>@currency($transaksi_barang->jumlah_harga)</td>
						</tr>
						<tr>
							<td colspan="3"></td>
							<td><strong></strong>Uang Bayar</td>
							<td>@currency($transaksi_barang->uang_bayar)</td>
						</tr>
						<tr>
							<td colspan="3"></td>
							<td><strong></strong>Kembali</td>
							<td>@currency($transaksi_barang->uang_bayar - $transaksi_barang->jumlah_harga)</td>
						</tr>
					</tbody>
				</table>
			<h5>----------------------------------------------------------------------------------------------------</h5>
			<h5>Terima Kasih :)</h5>
			<h5>Kasir : Dimas Addriansyah Pamungkas</h5>

			</div>
		</div>
	</div>
	<script src="/buatprint/js/app.js"></script>
</body>
</html>