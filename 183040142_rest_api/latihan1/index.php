<?php 

// API mysqli untuk koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "universitas_pasundan");

// ambil semua data dari database
$result = $mysqli->query("SELECT * FROM mahasiswa");
$rows = $result->fetch_all();

// konversi ke format JSON
$data_json = json_encode($rows);

// tamppilkan data JSON
echo $data_json;

?>

<!DOCTYPE html>
<html>
<head>
    <title>REST API</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist
/css/bootstrap.min.css" integrity="sha384-
TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin=
"anonymous">
<body class="container">
<h3 class="my-3">Daftar Mahasiswa</h3>
    <table border="1" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NRP</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach(json_decode($data_json) as $data) { ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data[1]; ?></td>
                    <td><?= $data[2]; ?></td>
                    <td><?= $data[3]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>