document.addEventListener('DOMContentLoaded', function () {
    const alertBtns = document.querySelectorAll('.alertBtn');
    alertBtns.forEach((btn) => {
        btn.addEventListener('click', function () {
            const alertDiv = btn.closest('.alertForm');
            if (alertDiv) {
                alertDiv.classList.add('hidden');
            }
        });
    });
});