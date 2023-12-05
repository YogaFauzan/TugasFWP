@extends('utama')

@section('data_barang')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">TOKO BERKAH DJAYA</h4>
                <p class="card-description">
                    Input Barang
                </p>
                <form class="forms-sample" action="/proses_barang" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputKodeBarang">Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" placeholder="Masukkan Kode Barang">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNamaBarang">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJenisVarian">Jenis Varian</label>
                        <input type="text" class="form-control" name="jenis_varian" placeholder="Jenis Varian">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQty">Quantity</label>
                        <input type="text" class="form-control" name="qty" placeholder="Qty">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputHargaJual">Harga Jual</label>
                        <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Proses</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
