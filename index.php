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
        require_once 'connect.php';
        // phan trang
        $trang = 1;
        if(isset($_GET['trang'])){
            $trang = $_GET['trang'];    
        }

        $tim_kiem = "";
        if(isset($_GET['tim_kiem'])){
            $tim_kiem = $_GET['tim_kiem']; 
        }

        $sql_so_bai_dang = "select count(*) from tin_tuc
        where tieu_de
        like '%$tim_kiem%'";

        $mang_so_bai_dang = mysqli_query($ket_noi,$sql_so_bai_dang);
        $ket_qua_so_bai_dang = mysqli_fetch_array($mang_so_bai_dang);
        $so_tin_tuc = $ket_qua_so_bai_dang['count(*)'];
        $so_tin_tuc_tren_1_trang = 1;
        $so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang);
        $bo_qua = $so_tin_tuc_tren_1_trang * ($trang - 1);

        // tim kiem
        

        
        $sql = "select * from tin_tuc 
        where tieu_de
        like '%$tim_kiem%'
        limit $so_tin_tuc_tren_1_trang offset $bo_qua";

        
        $ket_qua = mysqli_query($ket_noi,$sql);
    ?>
    <a href="./form_insert.php">Viết bài</a>
    <table border='1' width="100%">
        <caption>
            <form action="">
                <input type="search" name="tim_kiem" value="<?php echo $tim_kiem?>"
                >
            </form>
        </caption>
        <tr>
            <th>Mã</th>
            <th>Tiêu đề</th>
            <th>Ảnh</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr> 
        <?php foreach($ket_qua as $bai_tin_tuc) : ?>
            <tr>
                <td><?php echo $bai_tin_tuc['ma'] ?></td>
                <td><a href="./show.php?ma=<?php echo $bai_tin_tuc['ma']?>"><?php echo $bai_tin_tuc['tieu_de'] ?></a></td>
                <td><img src="<?php echo $bai_tin_tuc['anh'] ?>" alt="" height="100"></td>
                <td>
                    <a href="form_update.php?ma=<?php echo $bai_tin_tuc['ma']?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?ma=<?php echo $bai_tin_tuc['ma']?>">Xóa</a>
                </td>
            </tr>
         <?php endforeach ?>
    </table>
    <!-- in ra trang kế tiếp -->
    <?php for($i = 1; $i <= $so_trang; $i++){ ?>
        <a href="?trang=<?php echo $i ?> & tim_kiem=<?php echo $tim_kiem?>">
            <?php echo $i ?>
        </a>
    <?php }?>

    <?php mysqli_close($ket_noi); ?>
</body>
</html>