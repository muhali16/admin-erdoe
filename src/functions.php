<?php 
$conn = mysqli_connect("localhost", "root", "", "datawargaerdoe");

function query($query){
    global $conn;
    $resulted = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($resulted)){
        $rows[] = $row;
    }
    return $rows;
}

function add($data){
    global $conn;

    $nama = $data["nama"];
    $jenisKelamin = $data["jenisKelamin"];
    $tempatLahir = $data["tempatLahir"];
    $tanggalLahir = $data["tanggalLahir"];
    $usia = $data["usia"];
    $alamat = $data["alamat"];
    $statusKawin = $data["statusKawin"];
    $statusTinggal = $data["statusTinggal"];

    // query insert data
    $query = "INSERT INTO datawarga VALUES
                (NULL, '$nama', '$jenisKelamin', '$tempatLahir', '$tanggalLahir',
                    '$usia', '$alamat', '$statusKawin', '$statusTinggal' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function removeds($ID){
    global $conn;

    mysqli_query($conn, "DELETE FROM `datawarga` WHERE id = $ID");
    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
    $tempatLahir = htmlspecialchars($data["tempatLahir"]);
    $tanggalLahir = htmlspecialchars($data["tanggalLahir"]);
    $usia = htmlspecialchars($data["usia"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $statusKawin = htmlspecialchars($data["statusKawin"]);
    $statusTinggal = htmlspecialchars($data["statusTinggal"]);

    // query insert data
    $query = "UPDATE datawarga SET
                nama = '$nama', jenisKelamin = '$jenisKelamin', tempatLahir = '$tempatLahir', tanggalLahir = '$tanggalLahir',
                usia = '$usia', alamat = '$alamat', statusKawin = '$statusKawin', statusTinggal = '$statusTinggal' 
                WHERE id= $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($data){
    $qry = "SELECT * FROM datawarga
                WHERE
                    nama LIKE '%$data%' OR
                    jenisKelamin LIKE '%$data%' OR
                    tempatLahir LIKE '%$data%' OR
                    tanggalLahir LIKE '%$data%' OR
                    usia LIKE '%$data%' OR
                    alamat LIKE '%$data%' OR
                    statusKawin LIKE '%$data%' OR
                    statusTinggal LIKE '%$data%'
             ";
    
    return query($qry);
}
?>