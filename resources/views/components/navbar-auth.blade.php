@guest
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
    @endif

    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Cart
            <span class="cart_no">{{ count((array) session('cart')) }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('cart') }}">My Cart</a>
        </div>
    </li>


    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Orders
        </a>
        @php
            $order_status = ['pending','paid','canceled'];
        @endphp
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @foreach ($order_status as $status)
                <a class="dropdown-item" href="{{ route('orders',['status'=>$status]) }}">{{ ucfirst($status) }}</a>
            @endforeach
            <a class="dropdown-item" href="{{ route('orders') }}">All Orders</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('create_brands') }}">New Brand</a>
            <a class="dropdown-item" href="{{ route('create_products') }}">New Product</a>


            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest
