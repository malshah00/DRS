<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    .sidebar{
      position: fixed;
      height: 100%;
      width: 240px;
      background: #0A2558;
      transition: all 0.5s ease;
    }
    .sidebar.active{
      width: 60px;
    }
    .sidebar .logo-details{
      height: 80px;
      display: flex;
      align-items: center;
    }
    .sidebar .logo-details i{
      font-size: 28px;
      font-weight: 500;
      color: #fff;
      min-width: 60px;
      text-align: center
    }
    .sidebar .logo-details .logo_name{
      color: #fff;
      font-size: 24px;
      font-weight: 500;
    }
    .sidebar .nav-links{
      margin-top: 10px;
    }
    .sidebar .nav-links li{
      position: relative;
      list-style: none;
      height: 50px;
    }
    .sidebar .nav-links li a{
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: all 0.4s ease;
    }
    .sidebar .nav-links li a.active{
      background: #081D45;
    }
    .sidebar .nav-links li a:hover{
      background: #081D45;
    }
    .sidebar .nav-links li i{
      min-width: 60px;
      text-align: center;
      font-size: 18px;
      color: #fff;
    }
    .sidebar .nav-links li a .links_name{
      color: #fff;
      font-size: 15px;
      font-weight: 400;
      white-space: nowrap;
    }
    .sidebar .nav-links .log_out{
      position: absolute;
      bottom: 0;
      width: 100%;
    }
    .main-content{
      margin-left: 240px;
      background: #f6f6f6;
      height: 100vh;
      transition: all 0.5s ease;
    }
    .main-content.active{
      margin-left: 60px;
    }
    .content{
      padding: 20px;
      font-size: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        text-align: center;
        padding: 8px;
        border: 4px solid #081D45;
    }

    th {
        background-color:#081D45;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
<script>
  $(document).ready(function() {
      // Show success message if available
      @if(session('success'))
          alert("{{ session('success') }}");
      @endif
  });
</script>

<body>
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Dahlia Report System</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="#" onclick="changeSection('update-complaint-status')">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Update Complaint Status</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="changeSection('register-staff')">
              <i class='bx bx-box'></i>
              <span class="links_name">Register New Staff</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="changeSection('view-staff')">
              <i class='bx bx-box'></i>
              <span class="links_name">View Staff List</span>
            </a>
          </li>
          <li class="log_out">
            <a href="#" onclick="confirmLogout()">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Log out</span>
            </a>
          </li>
        </ul>
    </div>
    <div class="main-content ">
        <div class="content">
            <div id="update-complaint-status" class="section" style="display: none;">
                <h2>Update Complaint Status</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Room Number</th>
                                <th>Complaint Type</th>
                                <th>Complaint Description</th>
                                <th>File Upload</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $com)
                                <tr>
                                    <td>{{$com['name']}}</td>
                                    <td>{{$com['phone']}}</td>
                                    <td>{{$com['room_number']}}</td>
                                    <td>{{$com['complaint_type']}}</td>
                                    <td>{{$com['complaint_description']}}</td>
                                    <td><a href="/uploads/{{$com['file_upload']}}">{{$com['file_upload']}}</a></td>
                                    <td><button type="button" class="btn btn-primary">Receive</button><button type="button" class="btn btn-warning">In Progess</button><button type="button" class="btn btn-success">Complete</button></td>
                                </tr>
                            @endforeach --}}
                          
                        </tbody>
                    </table>
                            <div id="form-popup" style="display: none;">
                              <h2>Confirmation for Further Action</h2>
                              <p>Please provide an update on the progress of this complaint:</p>
                              <form>
                                  <textarea id="update-text" rows="4" cols="50"></textarea><br><br>
                                  <button type="button" class="btn btn-primary" onclick="submitForm('submit')">Submit</button>
                                  <button type="button" class="btn btn-secondary" onclick="closeForm()">Cancel</button>
                              </form>
                          </div>
            </div>
            <div id="register-staff" class="section" style="display: none;">
                <div class="container">
                    <div class="row justify-content-center mt-5">
                      <div class="col-md-6">
                        <h2 class="text-center mb-4">Registration New Staff</h2>
                        <form method="POST" action="{{ route('staff.store') }}">
                          @csrf
                          <div class="form-group">
                            <label for="sname">Name:</label>
                            <input type="text" class="form-control" id="sname" name="sname" value="{{ old('sname') }}" required>
                            @if ($errors->has('sname'))
                              <span class="text-danger">{{ $errors->first('sname') }}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="staffemail">Staff Email:</label>
                            <input type="staffemail" class="form-control" id="staffemail" name="staffemail" value="{{ old('staffemail') }}" required>
                            @if ($errors->has('staffemail'))
                              <span class="text-danger">{{ $errors->first('staffemail') }}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="sphone">Phone Number:</label>
                            <input type="tel" class="form-control" id="sphone" name="sphone" value="{{ old('sphone') }}" required>
                            @if ($errors->has('sphone'))
                              <span class="text-danger">{{ $errors->first('sphone') }}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="expert">Expert:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="expert" id="water" value="water">
                                <label class="form-check-label" for="water">
                                    Water
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="expert" id="electronic" value="electronic">
                                <label class="form-check-label" for="electronic">
                                    Electronic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="expert" id="furniture" value="furniture">
                                <label class="form-check-label" for="furniture">
                                    Furniture
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="expert" id="wifi" value="wifi">
                                <label class="form-check-label" for="wifi">
                                    WiFi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="expert" id="other" value="other">
                                <label class="form-check-label" for="other">
                                    Other
                                </label>
                            </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Add New Staff</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <div id="view-staff" class="section" style="display:none;">
          <h1>Staff List</h1>
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Expert</th>
                  <th>Action</th>
                </tr>
              </thead>
              @foreach ($staff as $sta)
                <tr>
                  <td>{{$sta['sname']}}</td>
                  <td>{{$sta['staffemail']}}</td>
                  <td>{{$sta['sphone']}}</td>
                  <td>{{$sta['expert']}}</td>
                  <td><button>delete</button></td>
                </tr>
                @endforeach
            </table>

        </div>
      </div>
    </div>
 
 </body>
</html>

<script>
    function changeSection(section) {
            var sections = document.getElementsByClassName('section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(section).style.display = 'block';
        }

    function confirmLogout() {
      if (confirm('Are you sure you want to log out?')) {
        window.location.href = '/';
      }
    }
    function openForm() {
        // Get the form popup element
        var popup = document.getElementById("form-popup");
        // Set the display property to "block" to show the form popup
        popup.style.display = "block";
    }

    function closeForm() {
        // Get the form popup element
        var popup = document.getElementById("form-popup");
        // Set the display property to "none" to hide the form popup
        popup.style.display = "none";
    }

    function submitForm(action) {
        // Get the input value from the update text area
        var update = document.getElementById("update-text").value;
        // Do something with the input value and the selected action (yes, no, or submit)
        // ...
        // Close the form popup
        closeForm();
    }
  </script>