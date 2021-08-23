<?php 
    $jenisKelamin = ['Pria', 'Wanita'];
?>

<?php foreach( $jenisKelamin as $j ) : ?>

    <?php if( old('j_kelamin') == $j ) : ?>
        <option selected><?= $j; ?></option>
    <?php elseif( isset($anggota['j_kelamin']) && $anggota['j_kelamin'] == $j ) : ?>
        <option selected><?= $j; ?></option>
    <?php else : ?>
        <option><?= $j; ?></option>
    <?php endif; ?>

<?php endforeach; ?>