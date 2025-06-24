<?php
session_start();
if (!isset($_SESSION['super_admin'])) {
    header("Location: super_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="super_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="dashboard-container">
    <h2>Super Admin Dashboard Report</h2>
    <a href="logout.php" class="logout">Logout</a>

    <!-- 📊 Combined Pie Chart -->
    <div class="chart-box">
        <h3 style="text-align:center;">📊 Donor / Recipient / Camp Report</h3>
        <canvas id="combinedChart"></canvas>
        <button onclick="downloadChart('combinedChart')">Download</button>
    </div>

    <!-- 🩸 Bar Chart for Blood Group Stock -->
    <div class="chart-box" style="margin-top: 50px; width: 100%;">
        <h3 style="text-align:center;">🩸 Blood Group Stock Report</h3>
        <canvas id="stockBarChart"></canvas>
        <button onclick="downloadChart('stockBarChart')">Download</button>
    </div>
</div>

<script>
async function fetchChartData() {
    try {
        const response = await fetch("chart-data.php");
        const data = await response.json();

        if (data.error) {
            alert("Error: " + data.error);
            return;
        }

        //combined pie chart
        createCombinedPieChart('combinedChart',
            ['Donors', 'Recipients', 'Camps'],
            [data.donors || 0, data.recipients || 0, data.camps || 0],
            [
                'rgba(255, 99, 132, 0.6)',   // Donors - pink
                'rgba(54, 162, 235, 0.6)',   // Recipients - blue
                'rgba(255, 206, 86, 0.6)'    // Camps - yellow
            ]
        );

    } catch (error) {
        console.error("Fetch error:", error);
        alert("Unable to fetch pie chart data.");
    }
}

async function fetchStockBarData() {
    try {
        const response = await fetch("stock-bar-data.php");
        const data = await response.json();

        if (data.error) {
            alert("Error loading blood stock data.");
            return;
        }

        const labels = Object.keys(data);
        const values = Object.values(data);

        const ctx = document.getElementById("stockBarChart").getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Available Donors',
                    data: values,
                    backgroundColor: 'rgba(255, 51, 51, 0.6)',
                    borderColor: '#d10000',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

    } catch (error) {
        console.error("Stock fetch error:", error);
    }
}

function createCombinedPieChart(id, labels, data, colors) {
    const ctx = document.getElementById(id).getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: colors,
                borderColor: ['#fff'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

function downloadChart(chartId) {
    const canvas = document.getElementById(chartId);
    const url = canvas.toDataURL('image/png');
    const link = document.createElement('a');
    link.href = url;
    link.download = `${chartId}.png`;
    link.click();
}

// Load data
fetchChartData();
fetchStockBarData();
</script>
</body>
</html>
