function goBack() {
    window.history.back();
}

function viewPerformanceDetails() {
    alert("Redirecting to detailed performance report...");
    // You can add logic to load or redirect to the detailed performance page
    window.location.href = "#performanceDetails";
}

function viewFinancialDetails() {
    alert("Redirecting to detailed financial report...");
    // You can add logic to load or redirect to the detailed financial page
    window.location.href = "#financialDetails";
}

function exportData(type) {
    alert(`Exporting ${type} data...`);
    // Here you can add logic to trigger data export (e.g., to a CSV or Excel file)
    // Example: using a library to export the data
}
