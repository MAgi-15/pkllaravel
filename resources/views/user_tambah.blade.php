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
                CRUD Data Customer - <strong>TAMBAH USER</strong> - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <a href="/customer" class="btn btn-primary">Kembali</a>
                    <br />
                    <br />

                    <form method="post" action="/user/simpan">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama">

                            @if($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name')}}
                            </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <textarea name="email" class="form-control" placeholder="Email"></textarea>

                            @if($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email')}}
                            </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <textarea name="password" class="form-control" placeholder="Password"></textarea>

                            @if($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password')}}
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