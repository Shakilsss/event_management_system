<?php
    require_once '../vendor/autoload.php';
    use App\classes\GetEvents;

$getEvents = new GetEvents();
$events = $getEvents->getEvents();
?>

<style>
    .page-item.active .page-link {
    z-index: 3;
    color: white;
    background-color: #529962;
    border-color: #28a745;
}
.page-link{
     color: #28a745;
}
</style>
<div id="list-item-2" class="content-item" style="color:#28a745">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="text-center">Manage Event</h4>
    </div>
    <h4>Event List</h4>
    <div class="d-flex  mb-3">
        <div class="d-flex  col-md-9" style="margin-left: -15px;">
            <input type="text" id="search-input" class="form-control w-25" placeholder="Search events...">
            <select id="sort-select" class="form-control w-25 ml-4" >
                <option value="id">Sort by ID</option>
                <option value="name">Sort by Name</option>
                <option value="date">Sort by Date</option>
                <option value="location">Sort by Location</option>
            </select>
        </div>
        <div class="col-md-3">
            <button id="download-csv" class="btn btn-success">Download CSV</button>
            <button id="add-event" class="btn btn-success">+ Add Event</button>
        </div>
    </div>

    <table class="table table-striped table-sm" id="events-table">
        <thead style="color:#28a745">
            <tr>
                <th>ID<span id="sort-id" class="sort-icon">&#9650;</span></th>
                <th>Event Name<span id="sort-event_name" class="sort-icon">&#9650;</span></th>
                <th>Description</th>
                <th>Start Date<span id="sort-start_date" class="sort-icon">&#9650;</span></th>
                <th>End Date</th>
                <th>Location<span id="sort-location" class="sort-icon">&#9650;</span></th>
                <th>Organizer</th>
                <!-- <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Event Image</th> -->
                <th>Capacity</th>
                <th>Is Free</th>
                <th>Price</th>
            </tr>
        </thead>
        
        <tbody style="color:#28a745">
        </tbody>
    </table>
    <div id="no-results-message" style="display: none; text-align:center;font-weight:bold">No events found.</div>

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
                event.event_name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.start_date.includes(searchQuery)
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
                let sl = 1;
                paginatedEvents.forEach(event => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${sl++}</td>
                    <td>${event.event_name}</td>
                    <td>${event.description}</td>
                    <td>${event.start_date}</td>
                    <td>${event.end_date}</td>
                    <td>${event.location}</td>
                    <td>${event.organizer}</td>
                    <td>${event.capacity}</td>
                    <td>${event.is_free}</td>
                    <td>${event.price}</td>
                    `;
                    tbody.appendChild(row);
                });
            }
        }
        // // <td>${event.contact_email}</td>
        // // <td>${event.contact_phone}</td>
        // <td>${event.event_image}</td>

        function renderPagination() {
            const filteredEvents = events.filter(event => 
                event.event_name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.start_date.includes(searchQuery)
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

<script>
    document.getElementById('download-csv').addEventListener('click', function () {
        let csvContent = "data:text/csv;charset=utf-8,";
        csvContent += "Event ID,Event Name,Date,Location\n";
        events.forEach(event => {
            csvContent += `${event.id},${event.name},${event.date},${event.location}\n`;
        });

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement('a');
        link.setAttribute('href', encodedUri);
        link.setAttribute('download', 'events.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });
</script>
