<!doctype html>
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
                CRUD Data Customer - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
            </div>
            <div class="card-body">
                <a href="/customer/tambah" class="btn btn-primary">Input Customer Baru</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>No HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $p)
                        <tr>
                            <td>{{ $p->nama_depan }}</td>
                            <td>{{ $p->nama_belakang }}</td>
                            <td>{{ $p->no_hp }}</td>
                            <td>
                                <a href="/customer/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                <a href="/customer/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>