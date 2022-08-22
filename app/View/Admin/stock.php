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
                    <h1>Barang</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" data-toggle="modal" data-target="#modalStockAd" class="btn btn-add btn-icon btn-success"><i class="far fa-plus-square"></i> Tambah</button>
                                    <button type="button" href="#" class="btn btn-icon btn-outline-danger"><i class="far fa-file-pdf"></i> Cetak PDF</button>
                                    <button href="#" class="btn btn-icon btn-outline-success"><i class="far fa-file-excel"></i> Export Excel</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md">
                                            <thead>
                                                <tr>
                                                    <th style="max-width:3rem" class="text-center">Aksi</th>
                                                    <th>Kode</th>
                                                    <th>Nama</th>
                                                    <th>Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="max-width:3rem" class="text-center">
                                                        <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i></a>
                                                        <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i></a>
                                                        <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                    <td>Lorem</td>
                                                    <td>Lorem</td>
                                                    <td>XX</td>
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
<div class="modal fade" role="dialog" id="modalStockAd">
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
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" class="form-control" name="kode" required>
                        </div>
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" name="brand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" name="tipe" class="form-control">
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