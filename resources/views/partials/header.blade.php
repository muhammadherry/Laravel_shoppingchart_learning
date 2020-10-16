<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('product.index')}}">Navbar</a>
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        
        <a href="{{route('product.shoppingcart')}}" class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Keranjang
            <span class="badge ">{{Session::has('cart')? Session::get('cart')->totalQty:''}}</span>
        </a>
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::check())
                <a class="dropdown-item" href="{{route('user.profile')}}">User Profile </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('user.logout')}}">LogOut</a>
            @else
                <a class="dropdown-item" href="{{route('user.signup')}}">User SignUp </a>
                <a class="dropdown-item" href="{{route('user.signin')}}">User SignIn </a>
            @endif
            </div>
        </li>
    </ul>
    </form>
  </div>
</nav>