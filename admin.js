// Check if user is authenticated
function checkAuthentication() {
    fetch('admin_get_feedback.php')
        .then(response => {
            if (response.status === 403 || response.redirected) {
                window.location.href = 'admin_login.html';
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                window.location.href = 'admin_login.html';
            } else {
                loadDashboard(data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Load dashboard with initial data
function loadDashboard(data) {
    // Display admin username
    document.getElementById('admin-username').textContent = `Welcome, ${data.admin_username}!`;

    // Display statistics
    updateStatistics(data.stats);

    // Display feedback table
    displayFeedback(data.feedback);
}

// Update statistics cards
function updateStatistics(stats) {
    document.getElementById('total-feedback').textContent = stats.total_feedback;
    document.getElementById('avg-rating').textContent = stats.avg_rating.toFixed(2);
    document.getElementById('median-rating').textContent = stats.median_rating;
    document.getElementById('five-star-count').textContent = stats.five_star_count;
}

// Display feedback in table
function displayFeedback(feedback) {
    const tbody = document.getElementById('feedback-tbody');
    tbody.innerHTML = '';

    if (feedback.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6" class="no-data">No feedback available</td></tr>';
        return;
    }

    feedback.forEach(item => {
        const row = document.createElement('tr');
        const submittedDate = new Date(item.submitted_at).toLocaleString();
        const ratingBadge = `<span class="rating-badge rating-${item.rating}">${item.rating} ⭐</span>`;

        row.innerHTML = `
            <td>${item.id}</td>
            <td>${escapeHtml(item.name)}</td>
            <td>${escapeHtml(item.email)}</td>
            <td>${ratingBadge}</td>
            <td>${escapeHtml(item.feedback || 'No comment')}</td>
            <td>${submittedDate}</td>
        `;
        tbody.appendChild(row);
    });
}

// Escape HTML to prevent XSS
function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, m => map[m]);
}

// Apply filters
function applyFilters() {
    const rating = document.getElementById('filter-rating').value;
    const dateFrom = document.getElementById('filter-date-from').value;
    const dateTo = document.getElementById('filter-date-to').value;

    let url = 'admin_get_feedback.php?';
    if (rating) url += `rating=${rating}&`;
    if (dateFrom) url += `date_from=${dateFrom}&`;
    if (dateTo) url += `date_to=${dateTo}&`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert('Error fetching data');
            } else {
                updateStatistics(data.stats);
                displayFeedback(data.feedback);
            }
        })
        .catch(error => console.error('Error:', error));
}

// Reset filters
function resetFilters() {
    document.getElementById('filter-rating').value = '';
    document.getElementById('filter-date-from').value = '';
    document.getElementById('filter-date-to').value = '';
    applyFilters();
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    checkAuthentication();

    document.getElementById('apply-filters').addEventListener('click', applyFilters);
    document.getElementById('reset-filters').addEventListener('click', resetFilters);

    // Set today's date as default max for date filter
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('filter-date-to').max = today;
});