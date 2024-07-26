document.addEventListener('DOMContentLoaded', function() {
    var toggleSwitch = document.getElementById('toggleSwitch');
    toggleSwitch.addEventListener('click', function() {
        if (this.checked) {
            // If on Page 1, go to addbook
            window.location.href = 'removebook.php';
        } else {
            // If on Page 2, go back to removebook
            window.location.href = 'addbook.php';
        }
    });
});





