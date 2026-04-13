<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_hewan");

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// proses input
if(isset($_POST['submit'])){
    $nama = htmlspecialchars($_POST['nama']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $umur = (int) $_POST['umur'];

    mysqli_query($conn, "INSERT INTO hewan (nama_hewan, jenis, umur) VALUES ('$nama','$jenis','$umur')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas 5 - Data Hewan</title>

    <style>
        body {
            font-family: Arial;
            background-color: #2c3e50;
            padding: 20px;
        }

        .container {
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
        }

        input {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
        }

        button {
            padding: 10px;
            background: #631c3a;
            color: white;
            border: none;
            width: 100%;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th {
            background: #27ae81;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Form Input Hewan</h2>

<form method="POST">
    Nama Hewan:
    <input type="text" name="nama" required>

    Jenis Hewan:
    <input type="text" name="jenis" required>

    Umur:
    <input type="number" name="umur" required>

    <button type="submit" name="submit">Simpan</button>
</form>

<hr>

<h3>Data Hewan</h3>

<table>
<tr>
    <th>No</th>
    <th>Nama Hewan</th>
    <th>Jenis</th>
    <th>Umur</th>
</tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM hewan");
$no = 1;

if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>".$no++."</td>
                <td>".$row['nama_hewan']."</td>
                <td>".$row['jenis']."</td>
                <td>".$row['umur']."</td>
              </tr>";
    }
}else{
    echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
}
?>

</table>

</div>

</body>
</html>