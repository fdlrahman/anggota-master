<?php 
    $pendidikan = ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3', 'Lainnya'];
?>

<?php foreach( $pendidikan as $p ) : ?>

    <?php if( old('p_terakhir') == $p ) : ?>
        <option selected><?= $p; ?></option>
    <?php elseif( isset($anggota['p_terakhir']) && $anggota['p_terakhir'] == $p ) : ?>
        <option selected><?= $p; ?></option>
    <?php else : ?>
        <option><?= $p; ?></option>
    <?php endif; ?>

<?php endforeach; ?>