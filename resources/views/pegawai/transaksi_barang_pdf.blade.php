<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Print Struct</title>
	<link rel="stylesheet" href="{/buatprint/css/app.css}">
</head>
<body>
	<div class="col-12 mt-3">
		<div class="card">
			<h2>Zahira Shop</h2>
			<h5>Jalan Raya Kertasmaya Indramayu</h5>
			<table class="table">
				<tr>
					<td>Nama Kasir</td>
					<td>:</td>
					<td>{{ Auth::guard('pegawai')->user()->name }}</td>
				</tr>
				<tr>
					<td>No Transaksi</td>
					<td>:</td>
					<td>TR - {{ $transaksi->id }}</td>
				</tr>
				<tr>
					<td>Tanggal Pembelian</td>
					<td>:</td>
					<td>{{ $transaksi->created_at }}</td>
				</tr>
				<tr>
					<td>Nama Pembeli</td>
					<td>:</td>
					<td>{{ $transaksi->nama_pembeli }}</td>
				</tr>
			</table>
			<h5>----------------------------------------------------------------------------------------------------</h5>
			<div>
			  <table>
				<thead>
						<tr>
							<td>No</td>
							<td>Nama Barang</td>
							<td>Harga Satuan</td>
							<td>Jumlah Harga</td>
						</tr>
					</thead>
					<tbody>
						@foreach($transaksi_detail as $key => $transaksi_detail)
							<tr>
								<td style="width: 30px">{{$key+1}}</td>
								<td style="width: 100px">{{$transaksi_detail->barang->nama_barang}}</td>
								<td style="width: 160px">{{ $transaksi_detail->jumlah_beli }} x @currency($transaksi_detail->barang->harga_jual)</td>
								<td>@currency($transaksi_detail->jumlah_harga)</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="2"></td>
							<td style="font-size: 14px;"><p>Total Harga</p></td>
							<td style="font-size: 14px;">@currency($transaksi->jumlah_harga)</td>
						<tr>
							<td colspan="2"></td>
							<td style="font-size: 14px;">Uang Bayar</td>
							<td style="font-size: 14px;">@currency($transaksi->uang_bayar)</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td style="font-size: 14px;">Kembali</td>
							<td style="font-size: 14px;">@currency($transaksi->uang_bayar - $transaksi->jumlah_harga)</td>
						</tr>
					</tbody>
				</table>
            <h5>----------------------------------------------------------------------------------------------------</h5>
            <table>
                <h5>Terima Kasih Sudah Berbelanja Di Toko Kami, Silahkan Datang Lagi !</h5>
            </table>
			</div>
		</div>
	</div>
	<script src="/buatprint/js/app.js"></script>
</body>
</html>
