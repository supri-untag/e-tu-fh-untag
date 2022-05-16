<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Pendaftaran</h4></div>
                        <div class="card-body">
                            <form method="POST" id="registers">
                                <div class="form-group">
                                    <label for="name">Nama lengkap</label>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Nama...">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Bagian Tugas</label>
                                    <input id="departement" type="text" class="form-control" name="departement" placeholder="Bagian Tugas..">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="email@contohemail.com">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Sandi</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" placeholder="Sandi...">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Sandi Konfirmasi</label>
                                        <input id="password2" type="password" class="form-control" name="password-confirm" placeholder="Ulangi sandi..">
                                    </div>
                                </div>
                                <div class="alert alert-secondary text-danger mt-0">
                                    <b>Note!</b> Sandi menggunakan Kominasi angka, huruf dan simbol sebanyak 8 karakter
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" disabled>
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Tim IT Fakultas Hukum UNTAG Semarang
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>