function filterUsers(role) {
    const rows = document.querySelectorAll('#users tbody tr');
    rows.forEach(row => {
        const userRole = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
        if (userRole === role || role === 'user' && userRole !== 'admin') {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}