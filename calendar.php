<?php
  include_once 'header.php';
  include_once 'navbarsession.php';
?>
<link rel="stylesheet" href="css/style.css">
  <div id="container" style="padding-top: 80px;">
    <div id="header">
      <div id="monthDisplay"></div>
      <div>
        <button id="backButton">Back</button>
        <button id="nextButton">Next</button>
      </div>
    </div>

    <div id="weekdays">
      <div>Sunday</div>
      <div>Monday</div>
      <div>Tuesday</div>
      <div>Wednesday</div>
      <div>Thursday</div>
      <div>Friday</div>
      <div>Saturday</div>
    </div>

    <div id="calendar"></div>
  </div>

  <div id="newEventModal">
    <h2>New Event</h2>

    <input id="eventTitleInput" placeholder="Event Title" />

    <button id="saveButton">Save</button>
    <button id="cancelButton">Cancel</button>
  </div>

  <div id="deleteEventModal">
    <h2>Event</h2>

    <p id="eventText"></p>

    <button id="deleteButton">Delete</button>
    <button id="closeButton">Close</button>
  </div>

  <div id="modalBackDrop"></div>

  <script src="js/script.js"></script>
  <?php
    include_once 'footer.php';

  ?>
