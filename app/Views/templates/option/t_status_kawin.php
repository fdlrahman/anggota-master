<?php 
    $kawin = ['Belum Menikah', 'Menikah', 'Duda/Janda'];
?>

<?php foreach( $kawin as $k ) : ?>

    <?php if( old('s_kawin') == $k ) : ?>
        <option selected><?= $k; ?></option>
    <?php elseif( isset($anggota['s_kawin']) && $anggota['s_kawin'] == $k ) : ?>
        <option selected><?= $k; ?></option>
    <?php else : ?>
        <option><?= $k; ?></option>
    <?php endif; ?>

<?php endforeach; ?>