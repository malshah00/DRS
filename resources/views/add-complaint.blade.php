<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="main-content active">
        <div class="content">
            <h2>Add Complaint</h2>
            <form action="#" method="post" enctype="multipart/form-data">
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
    </div>
    
</body>
</html>
