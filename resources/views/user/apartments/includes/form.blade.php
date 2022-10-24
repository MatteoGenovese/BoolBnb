<div class="col-2 text-danger">
    *Campi obbligatori
</div>

<div class="form-group col-12 position-relative">
    <label for="title">Titolo *</label>
    <input type="text" class="form-control" id="title"  placeholder="Inserisci il titolo" name="title" value="{{ old('title', $apartment->title) }}">
    <div class="invalid-tooltip mt-1">
        Il titolo deve contenere tra i 10 ed i 100 caratteri
     </div>
    @error('title')
        <div class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>

<div class="row d-flex">

    <div class="col-7 col-sm-8 col-lg-10 ">
        <div class="form-group mt-4 position-relative">
            <label for="description">Descrizione *</label>
            <textarea name="description" id="description" class="form-control" placeholder="Inserisci la descrizione" rows="13" style=" resize: none; ">{{ old('description', $apartment->description) }}</textarea>
            <div class="invalid-tooltip mt-1">
                La descrizione deve contenere tra i 10 ed i 100 caratteri
             </div>
        </div>
        @error('description')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="col-5 col-sm-4 col-lg-2 mt-4">
        <label for="services">Servizi *</label>
        @forelse ($services as $service)
        <div class="form-check form-switch">

            @if ($errors->any())
                <input name="services[]" class="form-check-input  services-check"
                value="{{ $service->id }}" type="checkbox" role="switch" id="services"
                {{ in_array($service->id, old('services', [])) ? 'checked' : ''}}>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            @else
                <input name="services[]" class="form-check-input  services-check"
                value="{{ $service->id }}" type="checkbox" role="switch" id="services"
                @isset($apartment) {{ $apartment->services->contains($service) ? 'checked' : '' }} @endisset>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            @endif
        </div>
        @empty

        @endforelse
        <div class="position-relative">
            <input type="text" id="tagsCheck" class="d-none">
            <div class="invalid-tooltip mt-1">
                Inserisci almeno un servizio
            </div>
        </div>
        @error('services')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>



<div class="row">

    <div class="col-6 col-md-3">
        <div class="form-group mt-4 position-relative">
            <label for="bathroom-no">Numero di bagni *</label>
            <input type="number" class="form-control" id="bathroom-no"  placeholder="Inserisci il numero di bagni" name="bathroom_no" value="{{ old('bathroom_no', $apartment->bathroom_no) }}">
            <div class="invalid-tooltip mt-1">
               L'abitazione dovrà avere tra 1 e 10 bagni.
             </div>
        </div>
        @error('bathroom_no')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>

    <div class="col-6 col-md-3">

        <div class="form-group mt-4 position-relative">
            <label for="bed-no">Numero di letti *</label>
            <input type="number" class="form-control" id="bed-no"  placeholder="Inserisci il numero di letti" name="bed_no" value="{{ old('bed_no', $apartment->bed_no) }}">
            <div class="invalid-tooltip mt-1">
                L'abitazione dovrà avere tra 1 e 10 posti letto.
            </div>
        </div>
            @error('bed_no')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group mt-4 position-relative">
            <label for="rooms-no">Numero di stanze *</label>
            <input type="number" class="form-control" id="rooms-no"  placeholder="Inserisci il numero di stanze" name="room_no" value="{{ old('room_no', $apartment->room_no) }}">
            <div class="invalid-tooltip mt-1">
                L'abitazione dovrà avere tra 1 e 20 stanze.
            </div>
        </div>

            @error('room_no')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group mt-4 position-relative">
            <label for="square-meters">Metri quadri *</label>
            <input type="number" class="form-control" id="square-meters"  placeholder="Inserisci il numero di metri quadri dell'abitazione" name="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}">
            <div class="invalid-tooltip mt-1">
                Minimo 10 metri quadri.
            </div>
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
        <div class="form-group mt-4 position-relative">
            <label for="address">Indirizzo *</label>
            <input type="text" list="addresses" class="form-control" id="address"  placeholder="Indirizzo, Città, Provincia..." name="address" value="{{ old('address', $apartment->address) }}">
            <div class="invalid-tooltip mt-1">
               Inserisci un indirizzo valido dalla lista.
            </div>
            <ul class="list-group" id="addresses" >
            </ul>
        </div>
        @error('address')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group mt-4 position-relative">
            <label for="upload">Foto {{ $isRequired }}</label>

            <input type="file" class="form-control" id="upload" placeholder="Inserisci una foto" name="file_name">
            <div class="invalid-tooltip mt-1">
               Inserisci una foto. Dimensione massima 5MB. Formati accettati: JPEG, JPG, PNG.
             </div>
        </div>
        @error('file_name')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
    </div>
</div>
<label class="d-none" for="lat">lat</label>
<input type="text" class="d-none" name="latitude" id="lat" value="{{ old("latitude", $apartment->latitude) }}">
<label class="d-none" for="lon">lon</label>
<input type="text" class="d-none" name="longitude" id="lon" value="{{ old("longitude", $apartment->longitude) }}">

<div class="row mt-4">

    <div class="col-2">
        <div class="form-check form-switch">
            <label for="available-check">Disponibile</label>
            @if ($errors->any())
                <input type="checkbox" name="is_available" id="available-check" class="form-check-input" value="1" {{ old("is_available") == true ? "checked" : " " }}>
            @else
                <input type="checkbox" name="is_available" id="available-check" class="form-check-input" value="1" {{ $apartment->is_available == 1 ? "checked" : " " }}>
            @endif

        </div>
    </div>


    <div class="col-2 offset-8 text-end">
        <button type="submit" class="btn btn-success mx-3" id="submit-button">Invia</button>
    </div>
</div>
