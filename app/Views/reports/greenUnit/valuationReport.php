<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valuation Report</title>
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
    <div class="container" style="width: 30cm;">
        <div>
            <span class="print-icon" onclick="handlePrint()">
                <i class="fas fa-print"></i>
            </span>
        </div>
        <div style="padding: 2.5cm 0px">
            <!-- Header Section -->
            <div class="header">
                <!-- Logo Section -->
                <div class="logo">
                    <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo">
                    <div style="width: 24.2cm; margin:auto; text-align:center">
                        <h1>
                            <strong>NATIONAL UNION OF COFFEE AGRIBUSINESSES AND FARM ENTERPRISES</strong>
                        </h1>
                        <h6>The Coffee Farmers’ Organisation</h6>
                    </div>
                </div>
            </div>
            <h5 style="text-align: center;"><strong>Valuation Schedule</strong></h5>
            <div style="text-align: right;">
                <label><strong>Date:</strong> <?= $summary["date"] ?></label>
            </div>
            <div>
                <label><strong>Supplier:</strong><?= $summary["supplier"] ?></label>
            </div>
            <div>
                <label><strong>GRN:</strong> <?= $summary["grn"] ?></label>
            </div>
            <div>
                <label><strong>Delivery Date:</strong> </label>
            </div>
            <br>

            <table class="table table-sm table-bordered" style="width: 27.2cm; margin:auto; font-size: 15px; border: 1px solid balck">
                <thead>
                    <tr>
                        <th>Grade/Screen</th>
                        <th>Actual Yield<br>(%)</th>
                        <th>QTY (KG)</th>
                        <th>Price (US$)/Kilo</th>
                        <th>Price (Cts/lb)</th>
                        <th>Price (Ugx/kg)</th>
                        <th>Amount (US$)</th>
                        <th>Amount (UGX.)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalValQty = 0;
                    $totalValUsd = 0;
                    $totalValUgx = 0;
                    // Get total Qty
                    for ($i = 0; $i < count($items); $i++) {
                        $qty = $items[$i]["qty"];
                        $totalValQty += $qty;
                    }
                    for ($x = 0; $x < count($items); $x++) {
                        $qty = $items[$x]["qty"];
                        $px = $items[$x]["price"];
                        $ugxAmt = $qty * $px;
                        $fx = 3700;
                        $usPx = $px / $fx;
                        $usAmt = $usPx * $qty;
                        $yied = $qty * 100 / $totalValQty;
                        $pxCtsLb = $usPx * 100 * 2.204623;
                        // Aggregate
                        $totalValUsd += $usAmt;
                        $totalValUgx += $ugxAmt;
                    ?>
                        <tr>
                            <td><?= $items[$x]["grade_name"] ?></td>
                            <td style="text-align: center;"><?= number_format($yied, 1) ?></td>
                            <td style="text-align: right;"><?= number_format($qty, 1) ?></td>
                            <td style="text-align: right;"><?= number_format($usPx, 4) ?></td>
                            <td style="text-align: right;"><?= number_format($pxCtsLb, 0) ?></td>
                            <td style="text-align: right;"><?= number_format($px, 0) ?></td>
                            <td style="text-align: right;"><?= number_format($usAmt, 2) ?></td>
                            <td style="text-align: right;"><?= number_format($ugxAmt, 0) ?></td>
                        </tr>
                    <?php
                    } ?>

                    <tr>
                        <th colspan="2">Actual Total Value Before costs</th>
                        <th style="text-align: right;"><?= number_format($totalValQty, 1) ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th style="text-align: right;"><?= number_format($totalValUsd, 2) ?></th>
                        <th style="text-align: right;"><?= number_format($totalValUgx, 0) ?></th>
                    </tr>
                    <tr>
                        <td colspan="6">Less 1% Sustainability Contribution Fund</td>
                        <td style="text-align: right;"><?= number_format(0, 0) ?></td>
                        <td style="text-align: right;"><?= number_format(0, 0) ?></td>
                    </tr>
                    <tr>
                        <td colspan="6">FAQ Processing Invoice IN-........</td>
                        <td style="text-align: right;"><?= number_format(0, 0) ?></td>
                        <td style="text-align: right;"><?= number_format(0, 0) ?></td>
                    </tr>
                    <tr>
                        <th colspan="6">Subtotal Costs</th>
                        <td style="text-align: right;"><?= number_format(0, 0) ?></td>
                        <th style="text-align: right;"><?= number_format(0, 0) ?></th>
                    </tr>
                    <tr>
                        <th colspan="6">Total Value After Costs</th>
                        <th style="text-align: right;"><?= number_format($totalValUsd, 2) ?></th>
                        <th style="text-align: right;"><?= number_format($totalValUgx, 0) ?></th>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Signature Table -->

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
    <style>
        table,
        tr,
        td,
        th {
            border: solid black 1px;
            border-collapse: collapse;

        }
    </style>
</body>

</html>