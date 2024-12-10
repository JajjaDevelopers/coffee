<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALES Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .signature-section {
            margin-top: 20px;
        }
        .signature-line {
            margin: 15px 0;
        }
    </style>
</head>
<body>
<div class="header">
    <div style="display: flex; align-items: center; gap: 15px;">
        <!-- Logo Section -->
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" style="height: 80px; width: auto;">
        <!-- <img src="" width="170px" height="80px"> -->
        
        <!-- Text Section -->
        <div>
            <h1>National Union of Coffee Agribusinesses and Farm Enterprises</h1>
            <h2>The Coffee Farmers’ Organisation</h2>
        </div>
    </div>
</div>

    <h3>SALES Report No. <span>_______________</span></h3>

    <table>
        <thead>
            <tr>
                <th>GRADE</th>
                <th>QTY (KGS)</th>
                <th>UNIT PRICE (UGX)</th>
                <th>AMOUNT (UGX)</th>
            </tr>
        </thead>
        <tbody>
            <!-- Add rows dynamically here -->
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <p><strong>Buyer:</strong> ______________________________</p>
    <p><strong>Date:</strong> ______________________________</p>

    <div class="signature-section">
        <p><strong>Prepared By:</strong> ______________________________________________</p>
        <p><strong>Verified By:</strong> ______________________________________________</p>
        <p><strong>Approved By:</strong> ______________________________________________</p>
        <p><strong>Finance By:</strong> ______________________________________________</p>
        <p>Date: ____________________</p>
    </div>
</body>
</html>
