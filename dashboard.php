<!doctype html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/dashboard.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container">

    <h1>Stock Dashboard</h1>

    <div class="update-timer">
        Next update in: <span id="countdown">10</span>s
    </div>

    <div class="chart-card">
        <canvas id="chart"></canvas>
    </div>

    <div class="table-card">
        <table id="tbl">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Stock</th>
                    <th>Ordered</th>
                    <th>Left</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

</div>

<script src="../js/dashboard.js"></script>
</body>
</html>
