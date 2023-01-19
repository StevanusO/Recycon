<nav class="navbar navbar-expand-lg navigation-bar" style="background-color: antiquewhite">
    <div class="container-fluid">
        <img src="<?php echo e(asset('asset/logo_black_mini.png')); ?>" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse my-1" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo e(route('display_home_page')); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('display_product')); ?>">Show Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('display_cart')); ?>">My Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('display_transaction_history')); ?>">Transaction History</a>
                </li>
            </ul>

            
            <form role="search" class="d-flex me-5 w-50" action="<?php echo e(route('search_logic')); ?>" method="GET">
                
                <input type="search" class="form-control me-1" placeholder="Search product..." aria-label="Search"
                    name="itemName">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            
            <div class="dropdown me-3 my-1 nav-item">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Profile
                </button>
                <ul class="dropdown-menu">
                    <li class="drop-down-item">
                        <p class="fw-bold text-center"><?php echo e(Auth::user()->username); ?></p>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('display_edit_profile')); ?>">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo e(route('display_change_password')); ?>">Change Password</a></li>
                </ul>
            </div>
            <div class="nav-item me-4">
                <a href="<?php echo e(route('logout_logic')); ?>" class="btn btn-outline-danger">
                    Logout
                </a>

            </div>

        </div>
    </div>
</nav>
<?php /**PATH C:\Users\steva\Desktop\Recycon\Recycon-CV\resources\views/Navbar/navbar_user.blade.php ENDPATH**/ ?>