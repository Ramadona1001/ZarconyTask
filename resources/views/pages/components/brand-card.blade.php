<div class="col-lg-3 mb-4">
    <div class="card text-default">
        <div class="card-body">
          <h5 class="card-title">Brand</h5>
          <h6 class="card-subtitle mb-2 text-muted fw-bold">{{ $brand->name }}</h6>
          <a href="{{ route('brands_products',['brand'=>$brand]) }}" class="card-link btn btn-secondary btn-sm">See Products</a>
          @if (auth()->user() != null)
            @if (auth()->user()->type == 'admin')
                <a href="{{ route('edit_brands',['brand'=>$brand]) }}" class="card-link btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('delete_brands',['brand'=>$brand]) }}" onclick="return confirm('Are You Sure?')" class="card-link btn btn-danger btn-sm">Delete</a>
            @endif
          @endif
        </div>
    </div>
</div>
