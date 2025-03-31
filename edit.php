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
            --primary-red: #e60000;
            --dark-red: #b30000;
            --black: #1a1a1a;
            --dark-gray: #333333;
            --light-gray: #f5f5f5;
        }
        
        body {
            font-family: "Kanit", sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--black);
            color: white;
            background-image: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)), url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/svgs/solid/computer-mouse.svg');
            background-repeat: repeat;
            background-size: 100px;
            background-position: center;
            background-attachment: fixed;
            background-blend-mode: overlay;
        }
        
        .page-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background-color: var(--primary-red);
            padding: 25px;
            border-radius: 5px 5px 0 0;
            margin-top: 30px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 25%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 30% 100%);
        }
        
        .header h1 {
            margin: 0;
            font-weight: 800;
            display: flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
        }
        
        .header h1 i {
            margin-right: 12px;
            font-size: 1.8rem;
        }
        
        .form-container {
            background-color: rgba(26, 26, 26, 0.95);
            padding: 30px;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-top: 4px solid var(--primary-red);
            margin-bottom: 30px;
        }
        
        .row {
            margin-bottom: 20px !important;
        }
        
        label.col-form-label {
            font-weight: 500;
            color: #ffffff;
            font-size: 1rem;
            display: flex;
            align-items: center;
        }
        
        label.col-form-label i {
            margin-right: 8px;
            color: var(--primary-red);
        }
        
        .form-control, .form-select {
            background-color: #2d2d2d;
            border: 1px solid #444;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            background-color: #333;
            border-color: var(--primary-red);
            box-shadow: 0 0 0 0.25rem rgba(230, 0, 0, 0.25);
            color: white;
        }
        
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }
        
        .form-id {
            font-weight: bold;
            background-color: #333;
            padding: 10px 15px;
            border-radius: 4px;
            border-left: 3px solid var(--primary-red);
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-primary {
            background-color: var(--primary-red);
            border-color: var(--primary-red);
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--dark-red);
            border-color: var(--dark-red);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        
        .btn-danger {
            background-color: #333;
            border-color: #333;
        }
        
        .btn-danger:hover, .btn-danger:focus {
            background-color: #444;
            border-color: #444;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        
        .footer {
            text-align: center;
            padding: 15px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-top: 20px;
            background-color: rgba(26, 26, 26, 0.5);
            border-radius: 5px;
            border-left: 3px solid var(--primary-red);
            border-right: 3px solid var(--primary-red);
        }
        
        .footer i {
            color: var(--primary-red);
            margin: 0 5px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .page-container {
                padding: 10px;
            }
            
            .header {
                padding: 15px;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .form-container {
                padding: 15px;
            }
            
            .col-form-label {
                text-align: left;
                margin-bottom: 5px;
            }
        }
    </style>

    <title>แก้ไขข้อมูลสินค้า</title>
</head>

<body>
    <?php
    if(isset($_GET['action_even'])=='edit'){
        $id=$_GET['id'];
        $sql="SELECT * FROM mouse WHERE id=$id";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            $row=$result->fetch_assoc();
        }else{
            echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
        }
        //$conn->close();
    }
    ?>
    
    <div class="page-container">
        <div class="header">
            <h1><i class="fas fa-edit"></i> แก้ไขข้อมูลสินค้า</h1>
        </div>
        
        <div class="form-container">
            <form action="edit_1.php" method="POST">
                <input type="hidden" name="id" value="<?php echo$row['id']; ?>">
                
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-key"></i> รหัสสินค้า</label>
                    <div class="col-sm-5 col-md-4">
                        <div class="form-id"><?php echo$row['id']; ?></div>
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-shopping-bag"></i> ชื่อสินค้า</label>
                    <div class="col-sm-7 col-md-6">
                        <input type="text" name="product_name" class="form-control" maxlength="50" value="<?php echo$row['product_name']; ?>" required>
                    </div>
                </div>

              
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-tag"></i> แบรนด์</label>
                    <div class="col-sm-7 col-md-6">
                        <input type="text" name="brand" class="form-control" maxlength="50" value="<?php echo$row['brand']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-mouse"></i> ประเภท</label>
                    <div class="col-sm-7 col-md-6">
                        <select name="type" class="form-select">
                            <option>กรุณาระบุประเภท</option>
                            <option value="Wired"<?php if ($row['type']=='Wired'){ echo "selected";} ?>>Wired</option>
                        </select> 
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-palette"></i> สี</label>
                    <div class="col-sm-7 col-md-6">
                        <select name="color" class="form-select">
                            <option>กรุณาระบุสี</option>
                            <option value="ขาว"<?php if ($row['color']=='ขาว'){ echo "selected";} ?>>ขาว</option>
                            <option value="ชมพู"<?php if ($row['color']=='ชมพู'){ echo "selected";} ?>>ชมพู</option>
                            <option value="ดำ"<?php if ($row['color']=='ดำ'){ echo "selected";} ?>>ดำ</option>
                        </select> 
                    </div>
                </div>
               
                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-tag"></i> ราคา</label>
                    <div class="col-sm-5 col-md-4">
                        <input type="text" name="price" class="form-control" maxlength="50" value="<?php echo$row['price']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-md-2 col-form-label"><i class="fas fa-boxes"></i> จำนวนสินค้า</label>
                    <div class="col-sm-5 col-md-4">
                        <input type="text" name="stock" class="form-control" maxlength="50" value="<?php echo$row['stock']; ?>" required>
                    </div>
                </div>
               
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก</button>
                </div>
            </form>
        </div>
        
        <div class="footer">
            <i class="fas fa-code"></i> พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ <i class="fas fa-user-graduate"></i> หมู่เรียน 66/96
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
