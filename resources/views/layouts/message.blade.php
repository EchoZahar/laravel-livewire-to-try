@if($errors->any())
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach($errors->all() as $error)
                <strong>Внимание !</strong> {{$error}}
            @endforeach
        </div>
    </div>
@endif

@if(session('success'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong> Успех !</strong> {{ session()->get('success') }}
        </div>
    </div>
@endif
