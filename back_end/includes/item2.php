<div id="list-item-2" class="content-item">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="text-center">Manage Event</h4>
    </div>
    <h4>Event List</h4>
    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="search-input" class="form-control" placeholder="Search events...">
        <select id="sort-select" class="form-control">
            <option value="id">Sort by ID</option>
            <option value="name">Sort by Name</option>
            <option value="date">Sort by Date</option>
            <option value="location">Sort by Location</option>
        </select>
    </div>
    <?php
    // Sample data
    $events = [
        ['id' => 1, 'name' => 'Annual Meeting', 'date' => '2023-11-15', 'location' => 'New York'],
        ['id' => 2, 'name' => 'Tech Conference', 'date' => '2023-12-05', 'location' => 'San Francisco'],
        ['id' => 3, 'name' => 'Music Festival', 'date' => '2024-01-20', 'location' => 'Los Angeles'],
        ['id' => 4, 'name' => 'Cultural Festival', 'date' => '2024-02-10', 'location' => 'Chicago'],
        ['id' => 5, 'name' => 'Food Festival', 'date' => '2024-03-25', 'location' => 'Miami'],
        ['id' => 6, 'name' => 'Sports Event', 'date' => '2024-04-15', 'location' => 'Seattle'],
        ['id' => 7, 'name' => 'Entertainment Event', 'date' => '2024-05-05', 'location' => 'Boston'],
        ['id' => 8, 'name' => 'Entertainment Event', 'date' => '2024-05-05', 'location' => 'Boston'],
        ['id' => 9, 'name' => 'Entertainment Event', 'date' => '2024-05-05', 'location' => 'Boston'],
        ['id' => 10, 'name' => 'Entertainment Event', 'date' => '2024-05-05', 'location' => 'Boston'],
        ['id' => 11, 'name' => 'Entertainment Event', 'date' => '2024-05-05', 'location' => 'Boston'],
        ['id' => 12, 'name' => 'Entertainment Event', 'date' => '2024-05-05', 'location' => 'Boston'],
        // ... (add more events as needed)
    ];
    ?>
    <table class="table table-striped" id="events-table">
        <thead>
            <tr>
                <th>Event ID <span id="sort-id" class="sort-icon">&#9650;</span></th>
                <th>Event Name <span id="sort-name" class="sort-icon">&#9650;</span></th>
                <th>Date <span id="sort-date" class="sort-icon">&#9650;</span></th>
                <th>Location <span id="sort-location" class="sort-icon">&#9650;</span></th>
            </tr>
        </thead>
        <tbody>
            <!-- Event rows will be populated by JavaScript -->
        </tbody>
    </table>
    <div id="no-results-message" style="display: none;">No events found.</div>

    <nav>
        <ul class="pagination" id="pagination">
            <!-- Pagination links will be populated by JavaScript -->
        </ul>
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let events = <?php echo json_encode($events); ?>;
        const itemsPerPage = 10;
        let currentPage = 1;
        let searchQuery = '';
        let sortBy = 'id';
        let sortOrder = 'asc';

        function renderTable(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const filteredEvents = events.filter(event => 
                event.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.date.includes(searchQuery)
            );
            const sortedEvents = filteredEvents.sort((a, b) => {
                if (a[sortBy] < b[sortBy]) return sortOrder === 'asc' ? -1 : 1;
                if (a[sortBy] > b[sortBy]) return sortOrder === 'asc' ? 1 : -1;
                return 0;
            });
            const paginatedEvents = sortedEvents.slice(startIndex, startIndex + itemsPerPage);
            const tbody = document.querySelector('#events-table tbody');
            tbody.innerHTML = '';

            if (paginatedEvents.length === 0) {
                document.getElementById('no-results-message').style.display = 'block';
            } else {
                document.getElementById('no-results-message').style.display = 'none';
                paginatedEvents.forEach(event => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${event.id}</td>
                        <td>${event.name}</td>
                        <td>${event.date}</td>
                        <td>${event.location}</td>
                    `;
                    tbody.appendChild(row);
                });
            }
        }

        function renderPagination() {
            const filteredEvents = events.filter(event => 
                event.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.date.includes(searchQuery)
            );
            const totalPages = Math.ceil(filteredEvents.length / itemsPerPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            for (let page = 1; page <= totalPages; page++) {
                const li = document.createElement('li');
                li.className = 'page-item' + (page === currentPage ? ' active' : '');
                li.innerHTML = `<a class="page-link" href="#">${page}</a>`;
                li.addEventListener('click', function (e) {
                    e.preventDefault();
                    currentPage = page;
                    renderTable(currentPage);
                    renderPagination();
                });
                pagination.appendChild(li);
            }
        }

        document.getElementById('search-input').addEventListener('input', function (e) {
            searchQuery = e.target.value;
            currentPage = 1;
            renderTable(currentPage);
            renderPagination();
        });

        document.getElementById('sort-select').addEventListener('change', function (e) {
            sortBy = e.target.value;
            renderTable(currentPage);
        });

        document.querySelectorAll('.sort-icon').forEach(icon => {
            icon.addEventListener('click', function () {
                const sortField = this.id.replace('sort-', '');
                if (sortBy === sortField) {
                    sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
                } else {
                    sortBy = sortField;
                    sortOrder = 'asc';
                }
                document.querySelectorAll('.sort-icon').forEach(i => i.innerHTML = '&#9650;');
                this.innerHTML = sortOrder === 'asc' ? '&#9650;' : '&#9660;';
                renderTable(currentPage);
            });
        });

        renderTable(currentPage);
        renderPagination();
    });
</script>
