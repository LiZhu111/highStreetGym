class Header extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
        this.innerHTML = `
          <header>
            <nav id="hamnav">
              <h1><a href="../index.php">High Street Gym</a></h1>
              <!-- (B) THE HAMBURGER -->
              <label for="hamburger">&#9776;</label>
              <input type="checkbox" id="hamburger">
            <div id="hamitems">
              <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="./services.php">Services</a></li>
                <li><a href="./about_us.php">About us</a></li>
                <li><a href="./blog.php">Blog</a></li>
              </ul>
            </div>
            <div class="container">
            <button onclick="window.location.href='./login.php'">Customer login</button>
              <button onclick="window.location.href='./admin-login.php'">Admin login</button>
            </div>
          </nav>
        </header>
      `;
    }
  }
  
customElements.define('header-component', Header);