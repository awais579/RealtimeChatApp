<?php
session_start();
if(!isset($_SESSION['unique_id'])){
  header("location : login.php");
}
?>

<?php include_once "header.php" ?>

<body>
  <div class="wrapper">
    <section class="user">
      <header>
        <?php
        include_once "php/config.php";
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="content">
          <img src="php/images/<?= "{$row['image']}" ?>" alt="" />
          <div class="details">
            <span><?= "{$row['fname']} {$row['lname']}" ?></span>
            <p><?= "{$row['status']}" ?></p>
          </div>
        </div>
        <a href="#" class="logout">Logout</a>
      </header>
      <div class="search">
        <span>Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search" />
        <button>
          <i class="fa-solid fa-search"></i>
        </button>
      </div>

      <div class="users-list">


      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
</body>

</html>