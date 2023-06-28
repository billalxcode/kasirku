@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>
        {{ session('success') }}
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session('error'))
<div class="alert alert-error alert-dismissible fade show" role="alert">
    <p>
        {{ session('error') }}
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif