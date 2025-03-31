<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- เพิ่ม Font Awesome สำหรับไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-red: #d9001d;
            --dark-red: #990000;
            --black: #151515;
            --light-gray: #f1f1f1;
        }
        
        body {
            font-family: "Kanit", sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--black);
            color: white;
        }
        
        .header {
            background-color: var(--primary-red);
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }
        
        .header::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            width: 30%;
            height: 5px;
            background-color: var(--black);
        }
        
        .header h1 {
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .header h1 i {
            margin-right: 15px;
        }
        
        .content-container {
            max-width: 800px;
            margin: 30px auto;
            background-color: rgba(30, 30, 30, 0.9);
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0px 0px 20px rgba(255, 0, 0, 0.2);
            border-left: 4px solid var(--primary-red);
        }
        
        .btn-custom {
            background-color: var(--primary-red);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .btn-custom:hover {
            background-color: var(--dark-red);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .btn-custom i {
            margin-right: 8px;
        }
        
        .alert {
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            position: relative;
        }
        
        .alert-success {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            border-left: 4px solid #28a745;
        }
        
        .alert-success::before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            margin-right: 10px;
            color: #28a745;
        }
        
        .footer {
            text-align: center;
            padding: 15px;
            background-color: var(--black);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 0, 0, 0.3);
            margin-top: 30px;
        }
        
        .footer i {
            color: var(--primary-red);
            margin: 0 5px;
        }
    </style>

    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="header">
        <h1><i class="fas fa-edit"></i> แก้ไขข้อมูลสินค้า</h1>
    </div>
    
    <div class="content-container">
        <?php
        //เริ่มเก็บข้อมูล
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $brand = $_POST['brand'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $stock= $_POST['stock'];

        //เขียนคำสั่ง SQL
        $sql = "UPDATE mouse SET product_name='$product_name',brand='$brand',type='$type',color='$color',price='$price',stock='$stock' WHERE id=$id ";

        // รับคำสั่ง sql
        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success">
            <i class="fas fa-check-circle"></i> ยินดีด้วยครับคุณได้ทำการแก้ไขข้อมูล เรียบร้อย !!!  </div>';

            echo '<a type="button" href="show.php" class="btn btn-custom"><i class="fas fa-arrow-left"></i> กลับหน้าแสดงข้อมูล</a>';
        } else {
            echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> มีข้อผิดพลาด: ' . $sql . '<br>' . $conn->error . '</div>';
        }
        // ปิดการเชื่อมต่อ
        $conn->close();
        ?>
    </div>
    
    <div class="footer">
        พัฒนาโดย <i class="fas fa-code"></i> พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ หมู่เรียน 66/96 <i class="fas fa-user-graduate"></i> หมู่เรียน 66/96
    </div>

    <!-- JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>