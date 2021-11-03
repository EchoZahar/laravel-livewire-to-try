<div class="mt-1">
    @if($user)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h6>user data</h6>
                    </div>
                    <div class="col-md-3 text-right">
                        <button class="btn btn-outline-success">edit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">show user data</h5>
                <div class="card-text">
                </div>
            </div>
        </div>
        @livewire('users.dials-list')
    @endif
</div>
