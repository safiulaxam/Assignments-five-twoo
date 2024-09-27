  <!-- Sidebar Start -->
  <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Rent A Car</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('assets/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            
            <div class="ms-3">
                @if(auth()->check())
                    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                    <span>{{ auth()->user()->role }}</span>
                @else
                    <h6 class="mb-0">Guest</h6>
                    <span>Not Logged In</span>
                @endif
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route("rental") }}" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Rental</a>
            <a href="{{ route("cars") }}" class="nav-item nav-link"><i class="fa fa-car me-2"></i>Car</a>
            <a href="{{ route("users") }}" class="nav-item nav-link"><i class="fas fa-users me-2"></i>Users</a>
            
        </div>
    </nav>
</div>
<!-- Sidebar End -->