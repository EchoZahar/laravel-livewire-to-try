<div class="mt-1">
{{--    @if($isModalOpen)--}}
        @include('livewire.users.createContact', ['types' => $types])
{{--    @endif--}}
    @include('livewire.users.updateContact', ['types' => $types])
    <div class="card">
        <div class="card-header">
            @include('layouts.message')
            <div class="row">
                <div class="col-md-9">
                    <h6>user contact list</h6>
                </div>
                <div class="col-md-3 text-right">
                    <button class="btn btn-outline-success"
{{--                            wire:click="create()"--}}
                            data-toggle="modal"
                            data-target="#createModal">+
                    </button>
                </div>

            </div>
        </div>
        @if($contacts)
        <div class="card-body">
            <h5 class="card-title">contacts</h5>
            <div class="card-text">
                @foreach($contacts as $contact)
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <span class="text-success">{{ $contact->contact }}</span>: <br>
                            <span class="text-primary">{{ $contact->value }}</span>
                        </div>
                        <div class="col-md-7 col-sm-12 text-right">
                            <button class="btn btn-outline-primary"
                                    data-toggle="modal"
                                    data-target="#updateContact"
                                    wire:click="edit({{ $contact->id }})"
                            >edit</button>
                            <button wire:click="delete({{ $contact->id }})"
                                class="btn btn-outline-danger">delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($trashedContact)
            <h5 class="card-title mt-2">deleted contacts</h5>
            <div class="card-text">
                @foreach($trashedContact as $old)
                    <div class="row">
                        <div class="col-md-8">{{ $old->contact }}: {{ $old->value }}</div>
                        <div class="col-md-4"><button class="btn btn-outline-success">recover</button></div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
        @endif
    </div>
    <script>
        window.livewire.on('store', () => { $('#createModal').modal('toggle') });
    </script>
</div>
