<?php include_once"header.php"?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" enctype="multipart/form-data">
        <div class="error-txt"></div>
        <div class="name-details">
          <div class="field">
            <label for="">First Name</label>
            <input type="text" name="fname" placeholder="First Name" required />
          </div>
          <div class="field">
            <label for="">Last Name</label>
            <input type="text" name="lname" placeholder="Last Name" required />
          </div>
          <div class="field">
            <label for="">Email Address</label>
            <input type="text" name="email" placeholder="Enter your email.." required />
          </div>
          <div class="field eye">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password" required />
            <i class="fa-solid fa-eye"></i>
          </div>
          <div class="field">
            <label for="">Select Image</label>
            <input type="file" name="image"  required />
          </div>
          <div class="field button">
            <input type="submit" value="Continue to Chat" />
          </div>
        </div>
      </form>
      <div class="link">Already signed up ? <a href="login.php">Login Now</a></div>
    </section>
  </div>

  <script src="javascript/password-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
  
</body>

</html>