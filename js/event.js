

{/* <script> */}
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
// </script>

{/* <script> */}
    const eventPriceDiv  = document.getElementById('eventPriceDiv');
    eventPriceDiv.style.display = 'none';
    document.getElementById('event-is-free').addEventListener('change', function() {
        const eventIsFree = document.getElementById('event-is-free');
        // alert(eventIsFree.value);
        if(eventIsFree.value == "0"){
            eventPriceDiv.style.display = 'block';
        }else{
            eventPriceDiv.style.display = 'none';
        }
    });
// </script>
// <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#events-table').addEventListener('click', function (e) {
            if (e.target && e.target.matches('button.btn-edit')) {
                const row = e.target.closest('tr');
                const eventId = row.querySelector('td:first-child').textContent;
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'update_event.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
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
                                    title: 'Event Updated Successfully'
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
                                    title: 'Event not Updated'
                                });
                            }
                        }
                    xhr.send('id=' + eventId);
                    }
            }
            if (e.target && e.target.matches('button.btn-danger')) {
                const row = e.target.closest('tr');
                const eventId = row.querySelector('td:first-child').textContent;

                Swal.fire({
                    title: 'Are you sure?',
                    // text: "You won't be able to revert this!",
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
                    xhr.onreadystatechange = function () {
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
            }
    });
    });
        