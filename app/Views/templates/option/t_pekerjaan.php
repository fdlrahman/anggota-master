<?php 
    $pekerjaan = ['Guru', 'Dosen', 'Petani', 'Nelayan', 'Dokter', 'Insinyur', 'Akuntan', 'Advokat', 'Paramedis', 'Apoteker', 'Arsitek', 'Pedagang', 'Pengrajin', 'Pengusaha', 'Pegawai/Karyawan', 'Lainnya'];
?>

<?php foreach( $pekerjaan as $p ) : ?>

    <?php if( old('profesi') == $p ) : ?>
        <option selected><?= $p; ?></option>
    <?php elseif( isset($anggota['profesi']) && $anggota['profesi'] == $p ) : ?>
        <option selected><?= $p; ?></option>
    <?php else : ?>
        <option><?= $p; ?></option>
    <?php endif; ?>

<?php endforeach; ?>