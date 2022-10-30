<div class="col-lg-3 mb-4">
    <div class="card text-default">
        <div class="card-body">
          <h5 class="card-title">Product</h5>
          <h6 class="card-subtitle mb-2 text-muted fw-bold">{{ $product->name }}</h6>
          <h6 class="card-subtitle mb-2 text-muted fw-bold">{{ $product->details }}</h6>
          <a href="{{ route('show_products',['product'=>$product]) }}" class="card-link btn btn-secondary btn-sm">See details</a>
          @if (auth()->user() != null)
            @if (auth()->user()->type == 'admin')
                <a href="{{ route('edit_products',['product'=>$product]) }}" class="card-link btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('delete_products',['product'=>$product]) }}" onclick="return confirm('Are You Sure?')" class="card-link btn btn-danger btn-sm">Delete</a>
            @endif
          @endif
        </div>
    </div>
</div>
