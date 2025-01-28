<div id="list-item-1" >
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="text-center">Welcome to Our Event Management System</h1>
    </div>
    <div class="content-item">
        <h4>Lorem if</h4>
    </div>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++): ?>
        <div class="col-md-3 mb-4">
            <div class="card" style="background: #28a745a1  ">
            <!-- <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image"> -->
            <div class="card-body">
                <h5 class="card-title">Event <?php echo $i; ?></h5>
                <p class="card-text">Description for event <?php echo $i; ?>.</p>
                <a href="#" class="btn btn-sm btn-primary">View Details</a>
            </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>