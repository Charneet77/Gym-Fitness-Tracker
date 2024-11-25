// Go back button functionality
function goBack() {
    window.history.back();
}

// BMI Calculator
document.getElementById('bmiForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const height = parseFloat(document.getElementById('height').value) / 100; // Convert cm to meters
    const weight = parseFloat(document.getElementById('weight').value);

    if (height > 0 && weight > 0) {
        const bmi = (weight / (height * height)).toFixed(2);
        let category = '';

        if (bmi < 18.5) {
            category = 'Underweight';
        } else if (bmi < 24.9) {
            category = 'Normal weight';
        } else if (bmi < 29.9) {
            category = 'Overweight';
        } else {
            category = 'Obesity';
        }

        document.getElementById('bmiResult').innerHTML = `
            <p>Your BMI is <strong>${bmi}</strong>.</p>
            <p>Category: <strong>${category}</strong></p>
        `;
    } else {
        document.getElementById('bmiResult').innerHTML = '<p>Please enter valid values for height and weight.</p>';
    }
});
