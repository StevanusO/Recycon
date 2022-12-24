<nav class="navbar navbar-expand-lg navigation-bar" style="background-color: antiquewhite;">
    <div class="container-fluid">
      <img src="<?php echo e(asset('asset/logo_black_mini.png')); ?>" alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('display_product')); ?>">Show Product</a>
          </li>
        </ul>
        <a href="<?php echo e(route('display_login_form_view')); ?>"><button class="btn btn-outline-success me-3" type="submit">Login</button></a>
        <a href="<?php echo e(route('display_regist_form_view')); ?>"><button class="btn btn-success" type="submit">Register</button></a>
      </div>
    </div>
  </nav><?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/Navbar/navbar_guest.blade.php ENDPATH**/ ?>