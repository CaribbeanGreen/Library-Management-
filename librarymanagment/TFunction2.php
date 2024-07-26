document.addEventListener('DOMContentLoaded', function() {
    var toggleSwitch = document.getElementById('toggleSwitch');
    toggleSwitch.addEventListener('click', function() {
        if (this.checked) {
            // If on Page 1, go to addshelf
            window.location.href = 'addshelf.php';
        } else {
            // If on Page 2, go back to showshelf
            window.location.href = 'showshelf.php';
        }
    });
});