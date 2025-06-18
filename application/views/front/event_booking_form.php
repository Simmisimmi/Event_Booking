<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Booking Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

h2 {

color: #343a40;
}
h3 {
font-weight: 600;
font-weight bold;
font-family: 'Poppins', sans-serif;
color: #243463;
}
.card {
border-radius: 10px;
}

.card-body {
padding: 2rem;
}

.event-details {
margin-top: 20px;
padding: 1rem;
background-color: #f8f9fa;
border-radius: 5px;
}

.alert {
padding: 10px;
margin-top: 10px;
border-radius: 4px;
}

.alert-success { 
background-color: #d4edda; 
color: #155724; 
}

.alert-danger { 
background-color: #f8d7da; 
color: #721c24; 
}

.alert-info { 
background-color: #d1ecf1; 
color: #0c5460;
}

.container {
margin-top:2px;
margin-bottom:2px;
position: relative;
max-width: 620px;
width: 100%;
background: #fff;
padding:34px;
padding-top:5px;
border-radius: 6px;
box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}

.container{
border:1px solid #d5d5d5;
}

.tbd-btn-submit{
width: auto; 
height:auto; 
border-radius:5px;
color:#fff;
align-items: center;
justify-content: center;
padding:10px 20px;
text-align: center;
display: inline-block;
background-color:#243463;
border:2px solid #243463; 
font-size:18px;
font-weight:600px;
}

.tbd-btn-submit:hover, .tbd-btn-submit:focus{
background-color:#E31E24;
border:2px solid #E31E24;
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

<h3 class="text-center">Event Booking Form</h3>
<div id="message" class="alert"></div>

<form id="bookingForm" method="post">
<input type="hidden" name="user_id" value="<?= $user_id ?>">

<div class="mb-3">
<label for="event" class="form-label">Select Event</label>
<select class="form-control" id="event" name="event" onchange="showEventDetails()" required>
<option value="">Select an event</option>
<?php if ($events): ?>
<?php foreach ($events as $event) : ?>
<option value="<?= $event['id'] ?>"><?= $event['name'] ?></option>
<?php endforeach; ?>
<?php else: ?>
<option value="">No events available</option>
<?php endif; ?>
</select>
</div>

<div id="eventDetails" class="event-details" style="display:none;">
<h5>Event Details</h5>
<p id="eventDescription"></p>
</div>

<div id="message" class="alert" style="display: none;"></div>

<button type="submit" class="tbd-btn-submit">Submit</button>
<?php if ($bookings): ?>
<a href="mybookings" class="tbd-btn-bookings">View Bookings</a>
<?php endif; ?>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

var eventsData = <?php echo json_encode($events); ?>;

function showEventDetails() {
var eventSelect = document.getElementById('event');
var eventDetails = document.getElementById('eventDetails');

var selectedEventId = eventSelect.value;

if (selectedEventId) {

var selectedEvent = eventsData.find(event => event.id == selectedEventId);

if (selectedEvent) {
eventDetails.style.display = 'block';
eventDescription.innerHTML = `
<strong>Event Name:</strong> ${selectedEvent.name}<br>
<strong>Venue:</strong> ${selectedEvent.venue}<br>
<strong>Date:</strong> ${selectedEvent.date}<br>
`;
}
} else {
eventDetails.style.display = 'none';
}
}

$(document).ready(function () {
$("#bookingForm").on("submit", function (e) {
e.preventDefault();

$('#message')
.removeClass('alert-success alert-danger')
.addClass('alert alert-info')
.text('Submitting your booking...')
.fadeIn();

var formData = $(this).serialize();

$.ajax({
type: "POST",
url: "<?php echo base_url('Front/submit_booking'); ?>",
data: formData,
dataType: 'json',
success: function (response) {
if (response.success === true) {
$('#message')
.removeClass('alert-info alert-danger')
.addClass('alert-success')
.text(response.message)
.fadeIn();

$('#bookingForm')[0].reset();

setTimeout(function () {
$('#message').fadeOut();
}, 5000);
} else {
$('#message')
.removeClass('alert-info alert-success')
.addClass('alert-danger')
.text(response.message)
.fadeIn();
}
},
error: function () {
$('#message')
.removeClass('alert-info alert-success')
.addClass('alert-danger')
.text('Something went wrong. Please try again.')
.fadeIn();
}
});
});
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
