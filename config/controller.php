<!-- fuungsi action untuk menampilkan, mengubah, mengedit dan menghapus data dari database -->
<?php
// fungsi untuk menampilkan data
function select($query)
{
    // memanggil koneksi database
    global $konek;
    // memasukkan query dan database yang akan digunakan
    $result = mysqli_query($konek, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fuction tambah untuk guru
function tambah_guru($post)
{
    global $konek;

    $nama = $post['nama'];
    $query = "INSERT INTO pm_alternatif VALUES (NULL, '$nama')";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

// fuction hapus untuk guru
function hapus_guru($id_alternatif)
{
    global $konek;

    $query = "DELETE FROM pm_alternatif WHERE id_alternatif = $id_alternatif";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

// fuction tambah untuk Kriteria
function tambah_kriteria($post)
{
    global $konek;

    $aspek = $post['aspek'];
    $faktor = $post['faktor'];
    $target = $post['target'];
    $type = $post['type'];
    $query = "INSERT INTO pm_faktor VALUES (NULL, '$aspek', '$faktor', '$target', '$type')";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

// fuction hapus untuk guru
function hapus_kriteria($id_faktor)
{
    global $konek;

    $query = "DELETE FROM pm_faktor WHERE id_faktor = $id_faktor";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}

// fuction tambah untuk Profile
function tambah_profile($post)
{
    global $konek;

    $nama = $post['nama'];
    $faktor = $post['faktor'];
    $value = $post['value'];
    $query = "INSERT INTO pm_sample VALUES (NULL, '$nama', '$faktor', '$value')";
    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}
?>