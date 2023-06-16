<!DOCTYPE html>
<html>
<head>
  <title>Vertical Divided Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family:  Arial, Helvetica, sans-serif;
    
     
    }

    .container {
      display: flex;
      height: 100vh;
      border: 2px solid #ddd; 
      border-radius: 20px; 
      
      
    }

    .left {
      flex: 1;
      display: flex;    

    }

    .left img {
      max-width: 100%;
      max-height: 100%;
    }

    .right {
      flex: 3;
      display: flex;
      flex-direction: column;
      background-image: url("https://th.bing.com/th/id/OIP.GbMboU-krQvdIrfKgWpzXgHaFj?pid=ImgDet&rs=1");
      align-items: center;
      justify-content: center;
      border-color: rgb(41, 216, 201);
       border-right: 2px solid #e99c55;
      padding: 5px;
      font-family:  Arial, Helvetica, sans-serif;
      
      
      
    }

    .logo {
      width: 600px;
      margin-bottom: 100px;
      align-self: center;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 5px;
      background-color:hsl(236, 90%, 59%);
      
    }

    .form-group label {
      margin-bottom: 5px;
      font-weight: bold;
      font-size: 35px;
      background-color:burlywood
      
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      padding: 15px;
      border: 5px solid #c59467;
      border-radius: 12px;
      font-size: 10px;
    }

    .form-group select {
      appearance:none;
    }

    .submit-btn {
      padding: 20px 30px;
      background-color: #4caf50;
      color: #070606;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }

    
  </style>
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="https://images.pexels.com/photos/2128249/pexels-photo-2128249.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Random Image" height="100%">
    </div>
    <div class="right">
      <img class="logo" src="https://2.bp.blogspot.com/-30TMsXwATU8/WxJCSVj6lyI/AAAAAAAANwY/KNISl5l0A98eX8UPT_ylvttWS7sqIqmwQCLcBGAs/s1600/kiet%2Blogo.png" alt="Logo" height="200px" width="500px">
      <form id="registration Form" action="insert.php" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"  pattern="[A-Za-z]+(\s[A-Za-z]+)?(\s[A-Za-z]+)?" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="tel" id="phone" name="phone" pattern="[1-9][0-9]{9}" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="stay">Where Do You Stay:</label>
          <select id="stay" name="stay" required>
            <option value="">Select</option>
            <option value="In Hostel">In Hostel</option>
            <option value="Day Scholar">Day Scholar</option>
          </select>
        </div>
       <button type="submit" class="btn btn-primary" name="submit" value="Submit">Register</button>
      </form>
    </div>
  </div>
</body>
</html>