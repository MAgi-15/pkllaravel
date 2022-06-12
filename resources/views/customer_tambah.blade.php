<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-center">
                CRUD Data Customer - <strong>TAMBAH DATA</strong> - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
            </div>
            <div class="card-body">
                <a href="/customer" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="post" action="/customer/simpan">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama depan ..">

                        @if($errors->has('nama_depan'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label>Nama Belakang</label>
                        <textarea name="nama_belakang" class="form-control" placeholder="Nama belakang .."></textarea>

                        @if($errors->has('nama_belakang'))
                        <div class="text-danger">
                            {{ $errors->first('nama')}}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <textarea name="no_hp" class="form-control" placeholder="No Hp .."></textarea>

                        @if($errors->has('no_hp'))
                        <div class="text-danger">
                            {{ $errors->first('no_hp')}}
                        </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>