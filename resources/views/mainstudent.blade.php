<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show success message if available
            @if(session('success'))
                alert("{{ session('success') }}");
            @endif
        });
    </script>
    <title>Main page student</title>
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
        
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
          <i class='bx bxl-c-plus-plus'></i>
          <span class="logo_name">Dahlia Report System</span>
        </div>
        <ul class="nav-links">
          <li>
            <a href="#" onclick="changeSection('add-complaint')">
              <i class='bx bx-grid-alt'></i>
              <span class="links_name">Add Complaint</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="changeSection('update-complaint')">
              <i class='bx bx-box'></i>
              <span class="links_name">Update Complaint</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="changeSection('edit-details')">
              <i class='bx bx-box'></i>
              <span class="links_name">Edit User Details</span>
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
          <div class="row justify-content-center mt-5">
            <div id="add-complaint" class="section" style="display: none;">
                <h2>Add Complaint</h2>
                <form action="{{ route('complaint.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div style="display: flex; flex-direction: row;">
                    <div style="margin-right: 20px;">
                        <label for="name">Name:</label><br>
                        <input type="text" name="name" id="name">
                    </div>
                    <div style="margin-right: 20px;">
                        <label for="phone">Phone Number: </label><br>
                        <input type="tel" name="phone" id="phone">
                    </div>
                    <div>
                        <label for="room-number">Room Number:</label><br>
                        <input type="text" name="room-number" id="room-number">
                    </div>
                </div><br>
                  <label for="complaint-type">Complaint Type:</label>
                  <select name="complaint-type" id="complaint-type">
                      <option value="water">Water</option>
                      <option value="electronic">Electronic</option>
                      <option value="furniture">Furniture</option>
                      <option value="wifi">Wifi</option>
                      <option value="other">Other</option>
                  </select><br><br>
                  <label for="complaint-description">Complaint Description (please provide as much detail as possible):</label><br>
                  <textarea name="complaint-description" id="complaint-description" rows="8" cols="80"></textarea><br><br>
                  <label for="file-upload">File Upload:</label>
                  <input type="file" name="file-upload" id="file-upload"><br><br>
                  <input type="submit" value="Submit" name="Submit">
              </form>
              
            </div>
            <div id="update-complaint" class="section" style="display: none;">
                <h2>Update Complaint</h2>
                <form action="/complaints/update" method="post" enctype="multipart/form-data">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"><br><br>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" name="phone" id="phone"><br><br>
                    <label for="room-number">Room Number:</label>
                    <input type="text" name="room-number" id="room-number"><br><br>
                    <label for="complaint-type">Complaint Type:</label>
                    <select name="complaint-type" id="complaint-type">
                        <option value="water">Water</option>
                        <option value="electronic">Electronic</option>
                        <option value="furniture">Furniture</option>
                        <option value="wifi">Wifi</option>
                        <option value="other">Other</option>
                    </select><br><br>
                    <label for="complaint-description">Complaint Description:</label>
                    <textarea name="complaint-description" id="complaint-description"></textarea><br><br>
                    <label for="file-upload">File Upload:</label>
                    <input type="file" name="file-upload" id="file-upload"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <div id="edit-details" class="section" style="display: none;">
                <h1>Edit User Details</h1>
                  {{-- <h2>Student Details</h2>
                  <p>Name: {{ $student->name }}</p>
                  <p>Email: {{ $student->email }}</p>
                  <p>Matric Number: {{ $student->matric }}</p>
                  <p>Phone Number: {{ $student->phone }}</p> --}}
              </div>
            </div>
            </div>
        </div>
    </div>

    
           
 </body>
 
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
  </script>
  
             
