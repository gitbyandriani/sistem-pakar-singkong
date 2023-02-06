<?php 
// Koneksi Database

$conn = mysqli_connect('localhost', 'root', '', 'spk_ubikayu');

function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function mengembalikannilai($db){
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
function tambahpenyakit($dtpenyakit){
    global $conn;
    $id_penyakit = htmlspecialchars($dtpenyakit['id_penyakit']);
    $kd_penyakit = htmlspecialchars($dtpenyakit['kd_penyakit']);
    $nm_penyakit = htmlspecialchars($dtpenyakit['nm_penyakit']);
    $penjelasan = htmlspecialchars($dtpenyakit['penjelasan']);
    $ifyes = htmlspecialchars($dtpenyakit['ifyes']);
    $ifno = htmlspecialchars($dtpenyakit['ifno']);
    
    $query = "INSERT INTO tb_penyakit VALUES ('$id_penyakit', '$kd_penyakit', '$nm_penyakit' , '$penjelasan', '$ifyes', '$ifno' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahpengendalian($dtpengendalian){
    global $conn;
    $id_pengendalian = htmlspecialchars($dtpengendalian['id_pengendalian']);
    $kd_pengendalian = htmlspecialchars($dtpengendalian['kd_pengendalian']);
    $penyakit = htmlspecialchars($dtpengendalian['penyakit']);
    $pengendalian = htmlspecialchars($dtpengendalian['pengendalian']);
    
    $query = "INSERT INTO tb_pengendalian VALUES ('$id_pengendalian', '$kd_pengendalian', '$penyakit', '$pengendalian' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahgejala($datagejala){
    global $conn;
    $idkd = htmlspecialchars($datagejala['id']);
    $id_gejala = htmlspecialchars($datagejala['id_gejala']);
    $kd_gejala = htmlspecialchars($datagejala['kd_gejala']);
    $pertanyaan = htmlspecialchars($datagejala['pertanyaan']);
    $ifyes = htmlspecialchars($datagejala['ifyes']);
    $ifno = htmlspecialchars($datagejala['ifno']);
    
    $query = "INSERT INTO gejala VALUES ('$id_gejala', '$kd_gejala', '$pertanyaan', '$ifyes', '$ifno' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_penyakit($id_penyakit) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_penyakit WHERE id_penyakit = $id_penyakit");

    return mysqli_affected_rows($conn);
}
function hapus_pengendalian($id_pengendalian) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pengendalian WHERE id_pengendalian = $id_pengendalian");

    return mysqli_affected_rows($conn);
}
function hapus_gejala($id_gejala) {
    global $conn;
    mysqli_query($conn, "DELETE FROM gejala WHERE id_gejala = $id_gejala");

    return mysqli_affected_rows($conn);
}
function hapus_admin($id_admin) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = $id_admin");

    return mysqli_affected_rows($conn);
}

function ubahpenyakit($ubah_penyakit){
    global $conn;
    $id_penyakit = htmlspecialchars($ubah_penyakit['id_penyakit']);
    $kd_penyakit = htmlspecialchars($ubah_penyakit['kd_penyakit']);
    $nm_penyakit = htmlspecialchars($ubah_penyakit['nm_penyakit']);
    $penjelasan = htmlspecialchars($ubah_penyakit['penjelasan']);
    
    $query = "UPDATE tb_penyakit SET
            kd_penyakit = '$kd_penyakit',
            nm_penyakit = '$nm_penyakit',
            penjelasan = '$penjelasan'  
            WHERE id_penyakit = $id_penyakit
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahpengendalian($ubah_pengendalian){
    global $conn;
    $id_pengendalian = htmlspecialchars($ubah_pengendalian['id_pengendalian']);
    $kd_pengendalian = htmlspecialchars($ubah_pengendalian['kd_pengendalian']);
    $pengendalian= htmlspecialchars($ubah_pengendalian['pengendalian']);
    
    $query = "UPDATE tb_pengendalian SET
            kd_pengendalian = '$kd_pengendalian',
            pengendalian = '$pengendalian'  
            WHERE id_pengendalian = $id_pengendalian
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahgejala($ubah_gejala){
    global $conn;
    $idkd = htmlspecialchars($datagejala['id']);
    $id_gejala = htmlspecialchars($ubah_gejala['id_gejala']);
    $kd_gejala = htmlspecialchars($ubah_gejala['kd_gejala']);
    $pertanyaan = htmlspecialchars($ubah_gejala['pertanyaan']);
    $ifyes = htmlspecialchars($ifyes['ifyes']);
    $ifno = htmlspecialchars($ifyes['ifno']);
    
    $query = "UPDATE gejala SET
            kd_gejala = '$kd_gejala',
            gejala = '$gejala'  
            WHERE id_gejala = $id_gejala
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


