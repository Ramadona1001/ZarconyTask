@if ($errors->any())
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-danger">
            <div class="body text-danger">
                <h4 class="card-title">Please fix errors</h4>
                @foreach ($errors->all() as $error)
                    <p class="card-text">{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
