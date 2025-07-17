<header class="d-flex flex-wrap align-items-center justify-content-between py-3 px-4 bg-primary position-relative">
  <!-- Left side: brand title -->
  <a href="#" class="text-white text-decoration-none fs-4 fw-bold">
    Brand Logo
  </a>

  <!-- Right side: search + buttons -->
  <div class="d-flex align-items-center gap-3">
    <form class="d-flex" role="search" aria-label="Site Search">
      <input 
        class="form-control form-control-sm rounded-pill me-3" 
        type="search" 
        placeholder="Search..." 
        aria-label="Search">
    </form>

    <button type="button" class="btn btn-outline-light btn-sm px-4">
      Login
    </button>

    <button type="button" class="btn btn-warning btn-sm px-4">
      Sign-up
    </button>
  </div>

  <!-- Alert box (hidden by default) -->
 <div id="messageModal" class="message-modal position-fixed top-0 end-0 m-3 p-3 rounded shadow-sm" style="display: none;">
  <div class="d-flex align-items-center">
    <div id="messageIcon" class="me-2">
      <!-- Icon injected by JS -->
    </div>
    <div id="messageText" class="text-white fw-semibold"></div>
    <button type="button" class="btn-close btn-close-white ms-auto" aria-label="Close" onclick="hideMessageModal()"></button>
  </div>
</div>


</header>
