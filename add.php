<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสินค้า | ระบบจัดการข้อมูลสินค้า</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #1a1a1a;
            color: #f0f0f0;
            padding-bottom: 60px; /* For footer space */
        }
        .navbar {
            background: linear-gradient(135deg, #c20000, #800000);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin-bottom: 30px;
            background-color: #252525;
            color: #f0f0f0;
        }
        .card-header {
            background: linear-gradient(135deg, #c20000, #800000);
            color: white;
            font-weight: 500;
            padding: 15px 20px;
            border: none;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #c20000, #800000);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #e60000, #a00000);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn-danger {
            background: #333;
            border: none;
            color: white;
        }
        .btn-danger:hover {
            background: #444;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn-warning {
            background: #555;
            border: none;
            color: white;
        }
        .btn-warning:hover {
            background: #666;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn-outline-light {
            border: 2px solid white;
            background: transparent;
            color: white;
        }
        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateY(-2px);
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #444;
            background-color: #333;
            color: #f0f0f0;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(194, 0, 0, 0.25);
            border-color: #c20000;
            background-color: #333;
            color: #f0f0f0;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .col-form-label {
            color: #f0f0f0;
        }
        option {
            background-color: #333;
            color: #f0f0f0;
        }
        footer {
            background: linear-gradient(135deg, #c20000, #800000);
            color: white;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.3);
        }
        .developer-credit {
            margin-top: 20px;
            color: #aaa;
            text-align: center;
        }
        .alert {
            border-radius: 8px;
            animation: fadeIn 0.5s;
            background-color: #333;
            border: 1px solid #c20000;
            color: #f0f0f0;
        }
        .alert-success {
            background-color: rgba(40, 167, 69, 0.2);
            border-color: #28a745;
            color: #f0f0f0;
        }
        .alert-danger {
            background-color: rgba(194, 0, 0, 0.2);
            border-color: #c20000;
            color: #f0f0f0;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }
        .invalid-feedback {
            color: #ff6b6b;
        }
        /* Neon effect for header icon */
        .navbar i, .card-header i {
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.7);
        }
        /* Cool hover effect for buttons */
        .btn {
            position: relative;
            overflow: hidden;
        }
        .btn:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        .btn:hover:after {
            animation: ripple 1s ease-out;
        }
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fs-4 fw-bold">
                <i class="fas fa-shopping-cart me-2"></i>
                ระบบจัดการข้อมูลสินค้า
            </div>
            <div>
                <a href="login1.php" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-sign-in-alt me-1"></i> เข้าสู่ระบบ
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header fs-5">
                <i class="fas fa-mouse me-2"></i>
                เพิ่มข้อมูลสินค้า
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <label for="id" class="col-sm-3 col-md-2 col-form-label">รหัสสินค้า</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="id" name="id" required>
                            <div class="invalid-feedback">
                                กรุณากรอกรหัสสินค้า
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="product_name" class="col-sm-3 col-md-2 col-form-label">ชื่อสินค้า</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อสินค้า
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="brand" class="col-sm-3 col-md-2 col-form-label">แบรนด์</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="brand" name="brand" required>
                            <div class="invalid-feedback">
                                กรุณากรอกแบรนด์
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="type" class="col-sm-3 col-md-2 col-form-label">ประเภท</label>
                        <div class="col-sm-9 col-md-4">
                            <select name="type" id="type" class="form-select" required>
                                <option value="" selected disabled>เลือกประเภท</option>
                                <option value="Wired">Wired</option>
                                <option value="Wireless">Wireless</option>
                                <option value="Bluetooth">Bluetooth</option>
                                <option value="Gaming">Gaming</option>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกประเภท
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="color" class="col-sm-3 col-md-2 col-form-label">สี</label>
                        <div class="col-sm-9 col-md-4">
                            <select name="color" id="color" class="form-select" required>
                                <option value="" selected disabled>เลือกสี</option>
                                <option value="ขาว">ขาว</option>
                                <option value="ชมพู">ชมพู</option>
                                <option value="ดำ">ดำ</option>
                                <option value="แดง">แดง</option>
                                <option value="น้ำเงิน">น้ำเงิน</option>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกสี
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="price" class="col-sm-3 col-md-2 col-form-label">ราคา
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-light border-dark"><i class="fas fa-tag"></i></span>
                                <input type="number" class="form-control" id="price" name="price" min="1" max="10000" required>
                            </div>
                            <div class="invalid-feedback">
                                กรุณากรอกราคา (1-10000)
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="stock" class="col-sm-3 col-md-2 col-form-label">จำนวนสินค้า</label>
                        <div class="col-sm-9 col-md-4">
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-light border-dark"><i class="fas fa-boxes"></i></span>
                                <input type="number" class="form-control" id="stock" name="stock" min="0" required>
                            </div>
                            <div class="invalid-feedback">
                                กรุณากรอกจำนวนสินค้า
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> บันทึกข้อมูล
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-trash-alt me-1"></i> ยกเลิก
                        </button>
                        <a href="show.php" class="btn btn-warning">
                            <i class="fas fa-table me-1"></i> แสดงข้อมูล
                        </a>
                    </div>
                </form>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Include database connection
                    include("conn.php");
                    
                    // Get form data and sanitize inputs
                    $id = mysqli_real_escape_string($conn, $_POST['id']);
                    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
                    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
                    $type = mysqli_real_escape_string($conn, $_POST['type']);
                    $color = mysqli_real_escape_string($conn, $_POST['color']);
                    $price = mysqli_real_escape_string($conn, $_POST['price']);
                    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
                    
                    // Insert data into database
                    $sql = "INSERT INTO mouse (id, product_name, brand, type, color, price, stock) 
                            VALUES ('$id', '$product_name', '$brand', '$type', '$color', '$price', '$stock')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo '<div class="alert alert-success mt-3 animate__animated animate__fadeIn">
                                <i class="fas fa-check-circle me-2"></i> บันทึกข้อมูลเรียบร้อยแล้ว
                              </div>';
                    } else {
                        echo '<div class="alert alert-danger mt-3 animate__animated animate__fadeIn">
                                <i class="fas fa-exclamation-circle me-2"></i> เกิดข้อผิดพลาด: ' . $conn->error . '
                              </div>';
                    }
                    
                    // Close connection
                    $conn->close();
                }
                ?>
            </div>
        </div>
        
        <!-- Developer Credit -->
        <div class="developer-credit">
            <small>
                <i class="fas fa-code me-1"></i> <b>พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ  หมู่เรียน 66/96</b>
            </small>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small><i class="fas fa-copyright me-1"></i> ระบบจัดการข้อมูลสินค้า 2025</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Form validation
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>