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
                    <h1>Permintaan</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-icon btn-outline-danger"><i class="far fa-file-pdf"></i> Cetak PDF</button>
                                    <button type="button" class="btn btn-icon btn-outline-success"><i class="far fa-file-excel"></i> Export Excel</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md">
                                            <thead>
                                            <tr>
                                                <th style="max-width:4rem" class="text-center">Aksi</th>
                                                <th>User</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="max-width:4rem" class="text-center">
                                                    <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i></a>
                                                    <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i></a>
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