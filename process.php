<?php
    $tieu_de = $_POST['tieu_de'];
    $noi_dung = $_POST['noi_dung'];
    $anh = $_POST['link_anh'];

    $ket_noi = mysqli_connect('localhost','root','','j2school');
    mysqli_set_charset($ket_noi,'utf8');
    $sql = "insert into tin_tuc(tieu_de,noi_dung,anh) values
            ('$tieu_de','$noi_dung','$anh')";
    // die($sql);
    mysqli_query($ket_noi, $sql);
    mysqli_close($ket_noi);
    echo '<a href="./index.php"> Về trang chủ </a>';