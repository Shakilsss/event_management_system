<?php
    require_once '../vendor/autoload.php';
    use App\classes\Events;

$getEvents = new Events();
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
        <div class="d-flex  col-md-8" style="margin-left: -15px;">
            <input type="text" id="search-input" class="form-control w-50" placeholder="Search events...">
            <select id="sort-select" class="form-control w-50 ml-4" >
                <option value="id">Sort by ID</option>
                <option value="name">Sort by Name</option>
                <option value="date">Sort by Date</option>
                <option value="location">Sort by Location</option>
            </select>
        </div>
        <div class="col-md-4">
            <button id="download-csv" class="btn btn-info btn-sm"><i class='fa fa-download'></i> Download CSV</button>
            <button id="add-event" class="btn btn-primary btn-sm"><i class='fa fa-plus'></i> Add Event</button>
        <!-- Add Event Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel"><b>Event Info</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-event-form" method="POST">
                            <div class="form-group d-flex">
                                <div class='col-3' style='margin-left:-15px'>
                                <label for="event-name">Event Name</label>
                                <input type="text" class="form-control" name="event_name" id="event-name" required>
                            
                                </div>
                               <div class='col-3' style='margin-left:-15px'>
                                 <label for="event-start-date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="event-start-date" required>
                               </div>

                                <div class='col-3' style='margin-left:-15px'>
                                    <label for="event-end-date">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="event-end-date" required>
                                </div>   
                                
                                <div class='col-3' style='margin-left:-15px'>
                                    <label for="event_time">Event Time</label>
                                    <input type="time" class="form-control" name="event_time" id="event-end-time" required>
                                </div>                        
                            </div>



                            <div class="form-group d-flex" style='margin-left:-15px'>

                                <div class='col-3'>
                                    <label for="event-location">Location</label>
                                    <input type="text" class="form-control" name="location" id="event-location" required>
                               </div>
                              <div class='col-3'>
                                    <label for="event-organizer">Organizer</label>
                                    <input type="text" class="form-control" name="organizer" id="event-organizer" required>
                                </div>
                                <div class="col-3">
                                    <label for="event-capacity">Capacity</label>
                                    <input type="number" class="form-control" name="capacity" id="event-capacity" required>
                                </div>

                           </div>

                            <div class="form-group d-flex" >
                                <div class='col-12' style="margin-left:-15px">
                                    <label for="event-description">Description</label>
                                    <textarea class="form-control" name="description" id="event-description" required></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success btn-sm"  id="submit_button" style="display:block-inline">Sumbit</button>
                            <button type="submit" class="btn btn-success btn-sm" id="update_button" style="display:none" onclick="updateEvent()">update</button>
                            <button type="submit" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </form>
                    <script>
                        document.getElementById('add-event-form').addEventListener('submit', function (e) {
                            e.preventDefault();
                            const formData = new FormData(this);
                            var xhr = new XMLHttpRequest();
                            // console.log(formData);
                            
                            xhr.open('POST', 'add_event_check.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function(e) {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    if (xhr.responseText == 'true') {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 1500,
                                            timerProgressBar: true,
                                            // didOpen: (toast) => {
                                            //     toast.onmouseenter = Swal.stopTimer;
                                            //     toast.onmouseleave = Swal.resumeTimer;
                                            // }
                                        });
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Event added successfully'
                                        }).then(function() {
                                                window.location.reload();
                                        });
                                    } else {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        });
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Event not saved'
                                        });
                                    }
                                }
                            };
                            var encodedData = new URLSearchParams(formData).toString();
                            var encodedData = new URLSearchParams(formData).toString();
                            xhr.send(encodedData);
                        });
                    </script>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="showEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel"><b>Event Details</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-event-form" method="POST">
                            <div class="form-group d-flex">
                                <div class='col-3' style='margin-left:-15px'>
                                <label for="event-name">Event Name</label>
                                <input readonly  type="text" class="form-control" name="event_name" id="evnt-name" >
                            
                                </div>
                               <div class='col-3' style='margin-left:-15px'>
                                 <label for="evnt-start-date">Start Date</label>
                                <input readonly type="date" class="form-control" name="start_date" id="evnt-start-date" >
                               </div>

                                <div class='col-3' style='margin-left:-15px'>
                                    <label for="evnt-end-date">End Date</label>
                                    <input readonly type="date" class="form-control" name="end_date" id="evnt-end-date" >
                                </div>   
                                
                                <div class='col-3' style='margin-left:-15px'>
                                    <label for="evnt_time">evnt Time</label>
                                    <input readonly type="time" class="form-control" name="evnt_time" id="evnt-end-time" >
                                </div>                        
                            </div>



                            <div class="form-group d-flex" style='margin-left:-15px'>

                                <div class='col-3'>
                                    <label for="evnt-location">Location</label>
                                    <input readonly type="text" class="form-control" name="location" id="evnt-location" >
                               </div>
                              <div class='col-3'>
                                    <label for="evnt-organizer">Organizer</label>
                                    <input readonly type="text" class="form-control" name="organizer" id="evnt-organizer" >
                                </div>
                                <div class="col-3">
                                    <label for="evnt-capacity">Capacity</label>
                                    <input readonly type="number" class="form-control" name="capacity" id="evnt-capacity" >
                                </div>

                           </div>

                            <div class="form-group d-flex" >
                                <div class='col-12' style='margin-left:-15px'>
                                    <label for="evnt-description">Description</label>
                                    <textarea readonly class="form-control" name="description" id="evnt-description" ></textarea>
                                </div>

                            </div>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('add-event').addEventListener('click', function () {
                 $('#add-event-form').trigger('reset');
                $('#addEventModal').modal('show');
            });
        </script>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-sm " id="events-table">
        <thead style="color:#28a745">
            <tr>
                <th>ID<span id="sort-id" class="sort-icon">&#9650;</span></th>
                <th>Event Name<span id="sort-event_name" class="sort-icon">&#9650;</span></th>
                <th>Description</th>
                <th>Start Date<span id="sort-start_date" class="sort-icon">&#9650;</span></th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody style="color:#28a745">
        </tbody>
    </table>
    <div id="no-results-message" style="display: none; text-align:center;font-weight:bold">No events found.</div>
    </div>
    <nav>
        <ul class="pagination" id="pagination">
            <!-- Pagination links will be populated by JavaScript -->
        </ul>
    </nav>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        events = <?php echo json_encode($events); ?>;
        const itemsPerPage = 10;
        let currentPage = 1;
        let searchQuery = '';
        let sortBy = 'id';
        let sortOrder = 'asc';

        function renderTable(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const filteredEvents = events.filter(event => 
                event.event_name.toLowerCase().includes(searchQuery.toLowerCase()) ||
                event.description.toLowerCase().includes(searchQuery.toLowerCase()) ||
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
                    <td>${new Date(event.start_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                    <td>${new Date(event.end_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                    <td>
                    <button class="btn btn-info btn-sm" title="View" onclick="showEvent(${event.id})"><i class='fa fa-eye'></i> </button>
                    <button class="btn btn-primary btn-sm" title="Edit" onclick="editEvent(${event.id})"><i class='fa fa-edit'></i></button>
                    <button class="btn btn-danger btn-sm" title="Delete" onclick="deleteEvent(${event.id})"><i class='fa fa-trash' ></i></button>
                    </td>
                    `;
                    tbody.appendChild(row);
                });
            }
        }


        function renderPagination() {
            const filteredEvents = events.filter(event => 
            event.event_name.toLowerCase().includes(searchQuery.toLowerCase()) ||
            event.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
            event.start_date.includes(searchQuery)
            );
            const totalPages = Math.ceil(filteredEvents.length / itemsPerPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            if (totalPages > 0) {
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
        csvContent += "Sl. no,Event Name,Start Date,End Date ,Location\n";
        let sl =1;
        events.forEach(event => {
            csvContent += `${sl++},${event.event_name},${event.start_date},${event.start_date},${event.location}\n`;
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


<script>
    // document.addEventListener('DOMContentLoaded', function () {
        // deleteEvent        
        function deleteEvent(eventId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'delete_event.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        if (xhr.responseText == 'true') {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            });
                            Toast.fire({
                                icon: 'success',
                                title: 'Event deleted successfully'
                            }).then(function() {
                                window.location.reload();
                            });
                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            Toast.fire({
                                icon: 'error',
                                title: 'Event not deleted'
                            });
                        }
                    }
                };
                xhr.send('id=' + eventId);
            }
        });
        };


        function editEvent(eventId) {
            $('#update_button').show();
            $('#submit_button').hide();

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'get_event.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var event = JSON.parse(xhr.responseText);
                    // console.log(event);
                    
                    if (event) {
                        document.getElementById('event-name').value = event.event_name;
                        document.getElementById('event-description').value = event.description;
                        document.getElementById('event-start-date').value = event.start_date;
                        document.getElementById('event-end-date').value = event.end_date;
                        document.getElementById('event-end-time').value = event.event_time;
                        document.getElementById('event-location').value = event.location;
                        document.getElementById('event-organizer').value = event.organizer;
                        document.getElementById('event-capacity').value = event.capacity;
                        $('#addEventModal').modal('show');
                    }
                }
            };
            xhr.send('id=' + eventId);
        }


        function showEvent(eventId) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'get_event.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var event = JSON.parse(xhr.responseText);
                    // console.log(event);
                    
                    if (event) {
                        document.getElementById('evnt-name').value = event.event_name;
                        document.getElementById('evnt-description').value = event.description;
                        document.getElementById('evnt-start-date').value = event.start_date;
                        document.getElementById('evnt-end-date').value = event.end_date;
                        document.getElementById('evnt-end-time').value = event.event_time;
                        document.getElementById('evnt-location').value = event.location;
                        document.getElementById('evnt-organizer').value = event.organizer;
                        document.getElementById('evnt-capacity').value = event.capacity;
                        $('#showEventModal').modal('show');
                    }
                }
            };
            xhr.send('id=' + eventId);
        }



        
</script>

</body>
</html>