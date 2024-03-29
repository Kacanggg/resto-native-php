<?php
if ($id != "") {
    $sel = $dbo->select("petugas where idpetugas=" . $id);
    foreach ($sel as $row) {
        $idpetugas = $row['idpetugas'];
        $nama_petugas = $row['nama_petugas'];
        $alamat = $row['alamat'];
        $no_hp = $row['no_hp'];
        $username = $row['username'];
        $role = $row['role'];
    }
}
if (isset($_POST['simpan'])) {
    extract($_POST);
    $password1 = isset($_POST['password']) ? $_POST['password'] : "";
    if ($password1 == "") {
        $up = $dbo->update("petugas", "nama_petugas='$nama_petugas', alamat='$alamat', no_hp='$no_hp', username='$username', role='$role'", "idpetugas=$idpetugas");
    } else {
        $pass = password_hash($password1, PASSWORD_DEFAULT);
        $up = $dbo->update("petugas", "nama_petugas='$nama_petugas', alamat='$alamat', no_hp='$no_hp', username='$username', role='$role', password='$pass'", "idpetugas=$idpetugas");
    }
    if ($up) {
        echo "<script>alert('Update Berhasil');location.href='?hal=petugas';</script>";
    }
}
?>
<div class="judul">
    <a href="?hal=petugas"><i class="fa fa-list"></i> Lihat Data</a>
    <div class="keterangan">Edit petugas</div>
</div>
<div class="data-input">
    <form action="?hal=edit_petugas" method="post">
        <table>
            <input type="hidden" name="idpetugas" value="<?= $idpetugas ?>">
            <tr>
                <td>Nama Petugas</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_petugas" placeholder="Nama Petugas" value="<?= $nama_petugas ?>"
                        required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <input type="text" name="alamat" value="<?= $alamat ?>" required>
                </td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>
                    <input type="text" name="no_hp" value="<?= $no_hp ?>" required>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <input type="text" name="username" value="<?= $username ?>" required>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <input type="password" name="password" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td>
                    <select name="role" id="">
                        <option value="">Pilih Role</option>
                        <option <?= $role == 'kasir' ? 'selected' : '' ?> value="kasir">Kasir</option>
                        <option <?= $role == 'dapur' ? 'selected' : '' ?> value="dapur">Dapur</option>
                        <option <?= $role == 'manager' ? 'selected' : '' ?> value="manager">Manager</option>
                        <option <?= $role == 'owner' ? 'selected' : '' ?> value="owner">Owner</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn-add" type="submit" name="simpan" value="simpan"><i
                            class="fa fa-save"></i>Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</div>