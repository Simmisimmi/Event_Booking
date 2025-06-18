<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Bookings</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}
body{
align-items: center;
justify-content: center;
background: lightgray;
}
.tbd-btn-bookings{
width: auto; 
height:auto; 
border-radius:5px;
color:#fff;
align-items: center;
justify-content: center;
padding:10px 20px;
text-align: center;
display: inline-block;
background-color:rgb(24, 218, 50);
border:2px solid rgb(255, 255, 255); 
font-size:18px;
font-weight:600px;
text-decoration: none;
}

.tbd-btn-bookings:hover, .tbd-btn-bookings:focus{
color:#fff;
text-decoration: none;
background-color:#243463;
border:2px solid #243463;
}
</style>
</head>
<body>
<h2 style="text-align: center;">Welcome, <?= $username ?>!</h2>
<div style="text-align: center; margin-top: 15px;">
<form action="<?= base_url('front/logout') ?>" method="post">
<button type="submit" class="btn btn-danger">Logout</button>
</form>
</div>

<div class="container mt-5">
<div class="card">
<div class="card-body">
<h3 class="text-center" style="color: #243463;">Your Past Bookings</h3>
<div style="text-align: center; margin-top: 15px;">
<a href="<?= base_url('booking-form') ?>" class="tbd-btn-bookings">Book New Event</a>
</div>
</div>
</div>
<div class="table-responsive">
<table id="example" class="table table-striped" style="width:100%">
<thead>
<tr>
<th>Event Name</th>
<th>Event Date</th>
<th>Venue</th>
<th>Booking Time</th>
</tr>
</thead>
<tbody>
<?php if ($past_bookings && !empty($past_bookings)): ?>
<?php foreach ($past_bookings as $booking): ?>
<tr>
<td><?= $booking['name'] ?></td>
<td><?= date("d-m-Y", strtotime($booking['date'])) ?></td>
<td><?= $booking['venue'] ?></td>
<td><?= date("d-m-Y h:i A", strtotime($booking['booking_date'])) ?></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="7" class="text-center">No data available</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script>
$(document).ready(function() {
$('#example').DataTable({
"order": []
});
});

</script>
</body>
</html>
