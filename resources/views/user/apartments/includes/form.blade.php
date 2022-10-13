<div class="form-group col-12">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" id="title"  placeholder="Inserisci il titolo" name="title" value="{{ old('title', $apartment->title) }}">

    @error('title')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>







<div class="row d-flex">

    <div class="col-7 col-sm-8 col-lg-10 ">
        <div class="form-group mt-4 ">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control" placeholder="Inserisci la descrizione" rows="13" style=" resize: none; ">
                {{ old('description', $apartment->description) }}
            </textarea>
        </div>
        @error('description')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="col-5 col-sm-4 col-lg-2 mt-4">
        <label for="services">Servizi</label>
        @forelse ($services as $service)
        <div class="form-check form-switch">

            @if ($errors->any())
                <input name="services[]" class="form-check-input"
                value="{{ $service->id }}" type="checkbox" role="switch" id="services"
                {{ in_array($service->id, old('services', [])) ? 'checked' : ''}}>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            @else
                <input name="services[]" class="form-check-input"
                value="{{ $service->id }}" type="checkbox" role="switch" id="services"
                @isset($apartment) {{ $apartment->services->contains($service) ? 'checked' : '' }} @endisset>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            @endif
        </div>
        @empty

        @endforelse
    </div>
</div>



<div class="row">

    <div class="col-6 col-md-3">
        <div class="form-group mt-4">
            <label for="bathroom-no">Numero di bagni</label>
            <input type="number" class="form-control" id="bathroom-no"  placeholder="Inserisci il numero di bagni" name="bathroom_no" value="{{ old('bathroom_no', $apartment->bathroom_no) }}">
        </div>
        @error('bathroom_no')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="col-6 col-md-3">

        <div class="form-group mt-4">
            <label for="bed-no">Numero di letti</label>
            <input type="number" class="form-control" id="bed-no"  placeholder="Inserisci il numero di letti" name="bed_no" value="{{ old('bed_no', $apartment->bed_no) }}">
        </div>
            @error('bed_no')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group mt-4">
            <label for="rooms-no">Numero di stanze</label>
            <input type="number" class="form-control" id="rooms-no"  placeholder="Inserisci il numero di stanze" name="room_no" value="{{ old('room_no', $apartment->room_no) }}">
        </div>

            @error('room_no')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group mt-4">
            <label for="square-meters">Metri quadri</label>
            <input type="number" class="form-control" id="square-meters"  placeholder="Inserisci il numero di metri quadri dell'abitazione" name="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}">
        </div>
        @error('square_meters')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

</div>

<div class="row">

    <div class="col-6 col-md-9">
        <div class="form-group mt-4">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address"  placeholder="Inserisci l'indirizzo" name="address" value="{{ old('address', $apartment->address) }}">
        </div>
        @error('address')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group mt-4">
            <label for="upload">Inserisci una foto</label>

            <input type="file" class="form-control" id="upload"  placeholder="Inserisci una foto" name="file_name" >

            {{-- value="{{ old('file_name', $apartment->file_name) }}" --}}
        </div>
        @error('file_name')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>







<button type="submit" class="btn btn-success mt-4">Invia</button>
