@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-sm-12">
            <livewire:users.user-data />
        </div>
        <div class="col-md-5 col-sm-12">
            <livewire:users.contacts-list />
        </div>
    </div>
</div>
@endsection
