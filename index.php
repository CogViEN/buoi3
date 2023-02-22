<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Đây là trang chủ</h1>
    <!-- Tạo kết nối với sql -->
    <?php
        $ket_noi = mysqli_connect("localhost",'root','','j2school');
        mysqli_set_charset($ket_noi,'utf8');
        $sql = "select * from tin_tuc";
        $ket_qua = mysqli_query($ket_noi,$sql);
    ?>
    <table border='1' width="100%">
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
        </tr> 
        <?php foreach($ket_qua as $bai_tin_tuc) : ?>
            <tr>
                <td><?php echo $bai_tin_tuc['ma'] ?></td>
                <td><a href="./show.php?ma=<?php echo $bai_tin_tuc['ma']?>"><?php echo $bai_tin_tuc['tieu_de'] ?></a></td>
                <td><img src="<?php echo $bai_tin_tuc['anh'] ?>" alt="" height="100"></td>
            </tr>
         <?php endforeach ?>
       
    </table>
    <?php mysqli_close($ket_noi); ?>
</body>
</html>