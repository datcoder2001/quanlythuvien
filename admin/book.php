<?php session_start();
require_once 'ketnoi.php';
$sp = $conn->query("SELECT * FROM sach");
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản phẩm</title>
  <link rel="stylesheet" href="resource/style/dashboard.css">
  <link rel="stylesheet" href="resource/style/manage.css">
  <link rel="stylesheet" href="resource/style/form.css">
</head>

<body>
  <?php include 'header.php' ?>
  <main>
    <form action="addHoaDon.php" method="post">
      <div class="products">
        <?php while ($row = $sp->fetch_assoc()) : ?>
          <div class="product">
            <img src="<?php echo "img/" . ($row['hinhanh'] == '' ? 'placeholder.png' : $row['hinhanh']) ?>" alt="<?php $row['tensach'] ?>" width="80" height="80">
            <span>
              <span class="fw-bold"><?php echo $row['ten'] ?></span> <br />
              <span class="price"><?php echo number_format($row['don_gia'], 0) ?></span>
            </span>
            <input type="number" name='<?php echo $row['id'] ?>' min="0" />
          </div>
        <?php endwhile ?>
      </div>
      <input type="submit" name='addBill' value="Tạo hóa đơn" class="ms-auto me-auto d-block">
    </form>
  </main>
  <?php include 'component/script.html' ?>
</body>

</html>