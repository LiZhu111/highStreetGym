class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
      <header>
      <nav id="hamnav">
      <h1><a href="./profile.php">Admin Portal</a></h1>
        <div id="hamitems">
            <?php
              $id = $_SESSION['user_id'];
              $query = mysqli_query($conn, "SELECT*FROM users WHERE user_id=$id");

              while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['username'];
                $res_Email = $result['email'];
              }
            ?>
        <ul>
          <li><a href="./profile.php">Profile</a></li>
          <li><a href="./classes.php">Classes</a></li>
          <li><a href="./users.php">Users</a></li>
          <li><a href="./trainers.php">Trainers</a></li>
          <li><a href="./customers.php">Customers</a></li>
          <li><a href="./admin-blog.php">Blogs</a></li>
        </ul>    
      </div>
      <div><a href="../model/admin-logout.php"><button class="btn">Log Out</button></a></div>
    </nav>
    </header>
      `;
    }
  }
  
customElements.define('admin_header-component', Header);