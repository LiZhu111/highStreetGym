class Footer extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
      <footer>
      <p>&copy; 2023 High Street Gym. All rights reserved.</p>
      </footer>
      `;
    }
  }
  
customElements.define('footer-component', Footer);