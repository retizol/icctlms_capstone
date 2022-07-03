<?php
  include_once 'header.php';
  include_once 'navbarsession.php';
?>
  <br>
  <style>
    .my-custom-row {
      background-color: #f8f9fa;
      height: 800px;
      width: 1500px;
    }
  </style>
  <div class="container" style="padding-top: 60px;">
    <div class="row my-custom-row align-items-start">
      <div class="col-2"><br>
        <div class="p-3 border bg-White">
          <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Your Groups
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </div>
          <nav class="navbar navbar-white bg-white">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Posts</a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Folders</a>
            </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Members</a>
            </div>
        </div>
      </div><br>
      <div class="col-md-8 offset-md-"><br>
        <div class="p-3 border bg-white">
          2
          <br>
          H &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Subject
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-7 offset-md-2">
          <div class="p-3 border bg-white">
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
            Space for now<br>
          </div>
        </div>
        <div class="col-md-3 offset-md-">
          <div class="p-3 border bg-white">
            Calendar<br>
            <h5>Date today</h5>
          </div>
          <div class="p-3 border bg-white">
            Event<br>
            <select class="form-select" aria-label="Default select example">
              <option selected>Schedule Event</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <br>
            <a href="#">View Full Calendar</a>
          </div><br>
          <div class="p-3 border bg-white">
            <div class="d-grid gap-2 col-6 mx-auto">
              <a href="#" class="btn btn-info" type="button">Invite</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php
  include_once 'footer.php';
 ?>
