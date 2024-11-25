<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reports</title>
<link rel="stylesheet" href="CSS/reports.css">
</head>
<body>
    <div class="reports-container">
        <!-- Header -->
        <header>
            <h1>Reports</h1>
            <button class="back-button" onclick="goBack()">Back</button>
        </header>

        <!-- Performance Report -->
        <section class="performance-report">
            <h2>Performance Report</h2>
            <div class="report-summary">
                <p><strong>Total Members:</strong> 150</p>
                <p><strong>Active Members:</strong> 120</p>
                <p><strong>Attendance Rate:</strong> 85%</p>
                <p><strong>Workouts Completed:</strong> 1345</p>
            </div>
            <button onclick="viewPerformanceDetails()">View Detailed Report</button>
        </section>

        <!-- Financial Report -->
        <section class="financial-report">
            <h2>Financial Report</h2>
            <div class="report-summary">
                <p><strong>Total Revenue:</strong> $12,000</p>
                <p><strong>Subscription Fees:</strong> $8,500</p>
                <p><strong>Other Income:</strong> $3,500</p>
            </div>
            <button onclick="viewFinancialDetails()">View Detailed Report</button>
        </section>

        <!-- Export Options -->
        <section class="export-options">
            <h2>Export Data</h2>
            <button onclick="exportData('performance')">Export Performance Data</button>
            <button onclick="exportData('financial')">Export Financial Data</button>
        </section>
    </div>

    <script src="JS/reports.js"></script>
</body>
</html>
