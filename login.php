<?php include_once"header.php"?>
  <body>
    <div class="wrapper">
      <section class="form login">
        <header>Realtime Chat App</header>
        <form action="#">
          <div class="error-txt">This is an error message !</div>
          <div class="name-details">
            <div class="field">
              <label for="">Email Address</label>
              <input type="text" name="email" placeholder="Enter your email.." />
            </div>
            <div class="field eye">
              <label for="">Password</label>
              <input type="password" name="password" placeholder="Password" />
              <i class="fa-solid fa-eye"></i>
            </div>
            <div class="field button">
              <input type="submit" value="Continue to Chat" />
            </div>
          </div>
        </form>
        <div class="link">Not signed up yet ? <a href="index.php">Signup Now</a></div>
      </section>
    </div>
    
    <script src="javascript/password-show-hide.js"></script>
    <script src="javascript/login.js"></script>
  </body>
</html>
