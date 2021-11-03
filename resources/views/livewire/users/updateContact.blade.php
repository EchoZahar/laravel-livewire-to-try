<div wire:ignore.self class="modal fade" id="updateContact" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Обновить</h5>
                <button wire:click.prevent="closeModalPopover()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="user_id">
                        <label>select contact</label>
                        <select wire:model="contact" class="form-control">
                            @foreach($types as $type)
                                <option value="{{ $type }}" @if($type === $contact) selected @endif>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('contact') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>input value</label>
                        <input type="text" class="form-control" wire:model="value" placeholder="Enter data">
                        @error('value') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="closeModalPopover()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update({{ $contact_id }})" class="btn btn-primary" data-dismiss="modal">update</button>
            </div>
        </div>
    </div>
</div>
