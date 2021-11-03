<div>
    {{-- In work, do what you enjoy. --}}
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <h6>you dial list</h6>
                </div>
                <div class="col-md-3 text-right">
                    dial count <span
                        class="{{ $dials->count() > 0 ? 'text-success' : 'text-danger' }}">{{ $dials->count() }}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">

                @foreach($dials as $dial)
                    <div class="row">
                        <div class="col-md-3">
                            Dial ID: {{ $dial->id }}
                        </div>
                        <div class="col-md-2">
                            <span class="{{ $dial->status === 'new_deal' ? 'text-primary' : 'text-success' }}">
                                {{ $dial->status }}
                            </span>
                        </div>
                        <div class="col-md-2">
                            {{ number_format($dial->total_price, 2) . ' RUB' }}
                        </div>

                        <div class="col-md-5 text-right">

                            @if($dial->status != 'refuse')
                                <form action="{{ route('dial.refuse', $dial->id) }}" method="post">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <a class="btn btn-outline-secondary">dial detail</a>
                                    <button type="submit" class="btn btn-outline-secondary">refuse</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
