<?php 

    $statusAnggota = ['active', 'pending', 'block'];

?>

<?php foreach( $statusAnggota as $a ) : ?>

    <?php if( old('s_anggota') == $a ) : ?>
        <option selected><?= $a; ?></option>
    <?php elseif( isset($anggota['s_anggota']) && $anggota['s_anggota'] == $a ) : ?>
        <option selected><?= $a; ?></option>
    <?php else : ?>
        <option><?= $a; ?></option>
    <?php endif; ?>

<?php endforeach; ?>