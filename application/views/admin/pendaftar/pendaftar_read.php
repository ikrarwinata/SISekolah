<table class="table">
    <tr>
        <td>Nama</td>
        <td><?php echo $nama; ?></td>
    </tr>
    <tr>
        <td>Asal Sekolah</td>
        <td><?php echo $asal_sekolah; ?></td>
    </tr>
    <tr>
        <td>Tempat Lahir</td>
        <td><?php echo $tempat_lahir; ?></td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td><?php echo $tanggal_lahir; ?></td>
    </tr>
    <tr>
        <td>Nilai Ujian</td>
        <td><?php echo $nilai_ujian; ?></td>
    </tr>
    <tr>
        <td>Tanggal Pendaftaran</td>
        <td><?php echo date("d M Y H:i:s", $id); ?></td>
    </tr>
    <tr>
        <td>Hubungan Wali</td>
        <td><?php echo $hubungan_wali; ?></td>
    </tr>
    <tr>
        <td>Nama Orang Tua / Wali</td>
        <td><?php echo $nama_ortu; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan Orang Tua / Wali</td>
        <td><?php echo $pekerjaan_ortu; ?></td>
    </tr>
    <tr>
        <td>Alamat Orang Tua / Wali</td>
        <td><?php echo $alamat_ortu; ?></td>
    </tr>
    <tr>
        <td>Email Orang Tua / Wali</td>
        <td><a href="mailto:<?php echo $email_ortu ?>"><?php echo $email_ortu ?></a>
    </tr>
    <tr>
        <td>Hp Orang Tua / Wali</td>
        <td><?php echo $hp_ortu; ?></td>
    </tr>
    <tr>
        <td></td>
        <td><a href="<?php echo site_url('admin/Pendaftar') ?>" class="btn btn-default">Cancel</a></td>
    </tr>
</table>