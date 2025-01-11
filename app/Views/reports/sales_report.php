<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALES Report</title>
    <!-- Include Azia Admin Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/azia-admin/1.0.0/css/azia.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 80px;
            width: auto;
        }

        .print-icon {
            font-size: 1.5rem;
            cursor: pointer;
        }

        h1,
        h2 {
            font-size: 1.2rem;
            margin: 0;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        @media print {
            .print-icon {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <!-- Logo Section -->
            <div class="logo">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo">
                <div>
                    <h1>National Union of Coffee Agribusinesses and Farm Enterprises</h1>
                    <h2>The Coffee Farmers’ Organisation</h2>
                </div>
            </div>
            <!-- Print Icon -->
            <div>
                <span class="print-icon" onclick="handlePrint()">
                    <i class="fas fa-print"></i>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p style="text-align: end;">Date: <?= $data['salesDate'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h5><strong>Buyer:</strong> <?= $data['buyerName'] ?></h5>
            </div>
        </div>
        <br>
        <!-- Sales Report Table -->
        <table class="table table-bordered">
            <thead class='thead-light'>
                <tr>
                    <th colspan="6" class="text-center">SALES REPORT NO.<?= $data['reportNo'] ?></th>
                </tr>
                <tr>
                    <th>CODE</th>
                    <th>GRADE</th>
                    <th>QTY</th>
                    <th>UNIT</th>
                    <th>UNIT PRICE (<?= $data['currency'] ?>)</th>
                    <th>AMOUNT (<?= $data['currency'] ?>)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['items'] as $item) : ?>
                    <tr>
                        <td><?= $item['code'] ?></td>
                        <td><?= $item['gradeName'] ?></td>
                        <td style="text-align: end;"><?= number_format($item['qty'], 2) ?></td>
                        <td><?= $item['unit'] ?></td>
                        <td style="text-align: end;"><?= number_format($item['price'], 2) ?></td>
                        <td style="text-align: end;"><?= number_format($item['amount']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right font-weight-bold">Total</td>
                    <td class="font-weight-bold" style="text-align: end;"><?= number_format($data['salesTotal'], 2) ?></td>
                </tr>
            </tfoot>
        </table>

        <!-- Signature Table -->
        <br>
        <p>For Finance: .....................................................................................</p>
        <br>
        <p>For Buyer: .......................................................................................</p>
        <br><br>
        <div class="row">
            <div class="col-sm-4 text-center">
                <h6><strong>Prepared By:</strong></h6>
                <h6><?= $data['preparedBy'] ?></h6>
                <h6>
                    <small><?= $data['time_prepared'] ?></small>
                </h6>
            </div>
            <div class="col-sm-4 text-center">
                <h6><strong>Verified By:</strong></h6>
                <h6><?= $data['preparedBy'] ?></h6>
                <h6><small><?= $data['time_prepared'] ?></small></h6>
            </div>
            <div class="col-sm-4 text-center">
                <h6><strong>Approved By:</strong></h6>
                <h6><?= $data['preparedBy'] ?></h6>
                <h6><small><?= $data['time_prepared'] ?><small></h6>
            </div>
        </div>
        <!-- <table class="table table-bordered mt-4">
            <thead class="thead-light">
                <tr>
                    <th>Action by</th>
                    <th>Date Performed</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Buyer:</strong> <?= "" // $data['buyerName'] 
                                                ?></td>
                    <td><?= "" // $data["salesDate"] 
                        ?></td>
                </tr>
                <tr>
                    <td><strong>Prepared By:</strong> <?= "" // $data['preparedBy'] 
                                                        ?></td>
                    <td><?= "" // $data['time_prepared'] 
                        ?></td>
                </tr>
                <tr>
                    <td><strong>Verified By:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Approved By:</strong> <?= "" // $data['preparedBy'] 
                                                        ?></td>
                    <td><?= "" //$data['time_prepared'] 
                        ?></td>
                </tr>
                <tr>
                    <td><strong>Finance By:</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table> -->
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        function handlePrint() {
            const printIcon = document.querySelector('.print-icon');
            printIcon.style.display = 'none';
            window.print();
            setTimeout(() => {
                printIcon.style.display = 'inline-block';
            }, 1000);
        }
    </script>
</body>

</html>