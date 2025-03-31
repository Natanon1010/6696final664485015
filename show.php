<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("conn.php");
    ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #1a1a1a;
            margin: 0;
            padding: 20px;
            color: #f0f0f0;
        }
        .container-custom {
            background-color: #252525;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(220, 20, 20, 0.2);
            padding: 30px;
            margin-bottom: 60px;
        }
        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #c20000;
            padding-bottom: 15px;
        }
        .page-header h1 {
            margin-left: 15px;
            color: #f0f0f0;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .page-header i {
            color: #c20000;
            text-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
        }
        .table-container {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #aaa;
            font-style: italic;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .btn-success {
            background: linear-gradient(135deg, #c20000, #800000);
            border: none;
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #e60000, #a00000);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn-danger {
            background: #333;
            border: 1px solid #c20000;
            color: white;
        }
        .btn-danger:hover {
            background: #c20000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn-primary {
            background: #333;
            border: 1px solid #666;
            color: white;
        }
        .btn-primary:hover {
            background: #444;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
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
        table.dataTable {
            border-collapse: collapse !important;
            color: #f0f0f0;
        }
        .table {
            --bs-table-bg: transparent;
            --bs-table-striped-bg: #1e1e1e;
            --bs-table-striped-color: #f0f0f0;
            --bs-table-border-color: #444;
            color: #f0f0f0;
        }
        table.dataTable thead th {
            background: linear-gradient(135deg, #c20000, #800000);
            color: white;
            border-bottom: none;
            padding: 12px 10px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 5px;
            color: #f0f0f0 !important;
            border: 1px solid #444;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: linear-gradient(135deg, #c20000, #800000);
            color: white !important;
            border: 1px solid #c20000;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #333;
            color: white !important;
            border: 1px solid #c20000;
        }
        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter, 
        .dataTables_wrapper .dataTables_info, 
        .dataTables_wrapper .dataTables_processing, 
        .dataTables_wrapper .dataTables_paginate {
            color: #f0f0f0;
        }
        .dataTables_wrapper .dataTables_filter input {
            background-color: #333;
            border: 1px solid #444;
            color: #f0f0f0;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .dataTables_wrapper .dataTables_length select {
            background-color: #333;
            border: 1px solid #444;
            color: #f0f0f0;
            border-radius: 5px;
            padding: 5px 10px;
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
        .user-info {
            background-color: #333;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #c20000;
        }
        .user-info h4 {
            color: #f0f0f0;
            margin-bottom: 10px;
        }
        .user-info p {
            color: #ccc;
            margin-bottom: 0;
        }
        .developer-credit {
            margin-top: 30px;
            color: #aaa;
            text-align: center;
            padding: 15px;
            border-top: 1px solid #444;
        }
        /* Cool badge for price */
        .price-badge {
            background: linear-gradient(135deg, #c20000, #800000);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
        }
        /* Stock indicator */
        .stock-high {
            color: #4CAF50;
        }
        .stock-medium {
            color: #FF9800;
        }
        .stock-low {
            color: #F44336;
        }
        /* Glowing effect for table hover */
        table.dataTable tbody tr:hover {
            background-color: rgba(194, 0, 0, 0.1) !important;
            box-shadow: 0 0 10px rgba(194, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูล Mouse | ระบบจัดการข้อมูลสินค้า</title>
</head>

<body>
    <div class="container container-custom">
        <?php
        if (isset($_GET['action_even']) && $_GET['action_even'] == 'delete') {
            $id = $_GET['id'];
            $sql = "SELECT * FROM mouse WHERE id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM mouse WHERE id =$id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'><i class='fas fa-check-circle me-2'></i>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle me-2'></i>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle me-2'></i>ไม่พบข้อมูล กรุณาตรวจสอบ</div>";
            }
        }
        ?>
        
        <div class="page-header">
            <i class="fas fa-mouse fa-3x"></i>
            <h1>ข้อมูล Mouse</h1>
        </div>
      
        <div class="user-info">
            <div class="row">
                <div class="col-md-8">
                    <h4><i class="fas fa-info-circle me-2"></i>ข้อมูลสินค้า</h4>
                    <p>
                        <strong><i class="fas fa-barcode me-1"></i> รหัสสินค้า:</strong> <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : "ไม่พบข้อมูล"; ?> | 
                        <strong><i class="fas fa-tag me-1"></i> ชื่อสินค้า:</strong> <?php echo isset($_SESSION["product_name"]) ? $_SESSION["product_name"] : "ไม่พบข้อมูล"; ?> | 
                        <strong><i class="fas fa-copyright me-1"></i> แบรนด์:</strong> <?php echo isset($_SESSION["brand"]) ? $_SESSION["brand"] : "ไม่พบข้อมูล"; ?>
                    </p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="add.php" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i>เพิ่มข้อมูลสินค้า</a>
                </div>
            </div>
        </div>
   
        <div class="table-container">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag me-1"></i> รหัสสินค้า</th>
                        <th><i class="fas fa-keyboard me-1"></i> ชื่อสินค้า</th>
                        <th><i class="fas fa-copyright me-1"></i> แบรนด์</th>
                        <th><i class="fas fa-sitemap me-1"></i> ประเภท</th>
                        <th><i class="fas fa-palette me-1"></i> สี</th>
                        <th><i class="fas fa-tags me-1"></i> ราคา</th>
                        <th><i class="fas fa-boxes me-1"></i> จำนวนสินค้า</th>
                        <th><i class="fas fa-cogs me-1"></i> จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM mouse";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Set stock class based on quantity
                        $stockClass = '';
                        $stockIcon = '';
                        if ($row["stock"] > 20) {
                            $stockClass = 'stock-high';
                            $stockIcon = '<i class="fas fa-check-circle me-1"></i>';
                        } elseif ($row["stock"] > 5) {
                            $stockClass = 'stock-medium';
                            $stockIcon = '<i class="fas fa-exclamation-circle me-1"></i>';
                        } else {
                            $stockClass = 'stock-low';
                            $stockIcon = '<i class="fas fa-exclamation-triangle me-1"></i>';
                        }
                        
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>" . $row["brand"] . "</td>";
                        echo "<td>" . $row["type"] . "</td>";
                        echo "<td>" . $row["color"] . "</td>";
                        echo "<td><span class='price-badge'>" . number_format($row["price"], 2) . " ฿</span></td>";
                        echo "<td class='" . $stockClass . "'>" . $stockIcon . $row["stock"] . "</td>";
                        echo '<td>
                            <a type="button" href="show.php?action_even=delete&id=' . $row['id'] . '" 
                            title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['id'] . ' ' . $row['product_name'] .
                            ' ' . $row['brand'] . '?\')" class="btn btn-danger btn-sm me-2"> 
                            <i class="fas fa-trash-alt"></i> ลบ </a>  
                            
                            <a type="button" href="edit.php?action_even=edit&id=' . $row['id'] . '" 
                            title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' .
                            $row['id'] . ' ' . $row['product_name'] . ' ' . $row['brand'] . '?\')" class="btn btn-primary btn-sm"> 
                            <i class="fas fa-edit"></i> แก้ไข </a> 
                        </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

        <div class="developer-credit">
            <p><i class="fas fa-code me-2"></i><b>พัฒนาโดย 664485015 นายณฐนนท์ ชุมเพ็ญ หมู่เรียน 66/96</b></p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "(กรองจากทั้งหมด _MAX_ รายการ)",
                    "search": "ค้นหา:",
                    "paginate": {
                        "first": "หน้าแรก",
                        "last": "หน้าสุดท้าย",
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    }
                }
            });
        });
    </script>
</body>
</html>