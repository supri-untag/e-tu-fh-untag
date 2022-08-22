<div id="app">
    <div class="main-wrapper">
        <?php
        use Supri\ETU\UNTAG\Helper\ViewHelper;
        ViewHelper::includeRender('Menu/admin');
        ?>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Sirkulasi</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" data-toggle="modal" data-target="#modalCirlAd" class="btn btn-add btn-icon btn-success"><i class="far fa-plus-square"></i> Tambah</button>
                                    <button type="button" href="#" class="btn btn-icon btn-outline-danger"><i class="far fa-file-pdf"></i> Cetak PDF</button>
                                    <button href="#" class="btn btn-icon btn-outline-success"><i class="far fa-file-excel"></i> Export Excel</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md">
                                            <thead>
                                            <tr>
                                                <th style="max-width:3rem" class="text-center">Aksi</th>
                                                <th style="word-wrap:break-word">Nama/Departemen</th>
                                                <th style="word-wrap:break-word" class="text-center">Nama Barang</th>
                                                <th style="word-wrap:break-word">Jumlah</th>
                                                <th style="word-wrap:break-word">Jenis</th>
                                                <th style="word-wrap:break-word">Tanggal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="max-width:3.5rem" class="text-center">
                                                    <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i></a>
                                                    <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                                                    <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <td class="text-break" style="width:20em"><a href="#">Supriyanto Supriyanto / Staff IT</a></td>
                                                <td class="text-break" style="width:16em">Lorem ipsum dolor sit amet.</td>
                                                <td class="text-break" style="width:6em">XX</td>
                                                <td class="text-break" style="width:6em">Masuk</td>
                                                <td class="text-break" style="width:10em">2022-06-01</td>
                                            </tr>
                                            <tr>
                                                <td style="max-width:3.5rem" class="text-center">
                                                    <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i></a>
                                                    <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                                                    <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                <td class="text-break" style="width:20em"><a href="#">Supriyanto Supriyanto / Staff IT</a></td>
                                                <td class="text-break" style="width:16em">Lorem ipsum dolor sit amet.</td>
                                                <td class="text-break" style="width:6em">XX</td>
                                                <td class="text-break" style="width:6em">Keluar</td>
                                                <td class="text-break" style="width:10em">2022-06-01</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2022 <div class="bullet"></div> Tim IT UNTAG Semarang <a href="/credits">Other</a>
            </div>
            <div class="footer-right">
                1.0.0
            </div>
        </footer>
    </div>
</div>
<div class="modal fade" role="dialog" id="modalCirlAd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama/Departemen</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>kode - Nama </label>
                            <input type="text" class="form-control" name="kode" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="bound" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control">
                                <option>Pilih tipe</option>
                                <option>Masuk</option>
                                <option>Keluar</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>