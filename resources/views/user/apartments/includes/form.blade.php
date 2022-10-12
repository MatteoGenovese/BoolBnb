

<div class="form-group">
    <label for="title">Titolo</label>
    <input type="text" class="form-control" id="title"  placeholder="Inserisci il titolo" name="title" value="{{ old('title', $apartment->title) }}">
</div>

<div class="form-group">
    <label for="description">Titolo</label>
    <textarea name="description" id="description" class="form-control" placeholder="Inserisci la descrizione" rows="10">
        {{ old('description', $apartment->description) }}
    </textarea>
</div>

<div class="form-group">
    <label for="bathroom-no">Numero di bagni</label>
    <input type="number" class="form-control" id="bathroom-no"  placeholder="Inserisci il numero di bagni" name="bathroom_no" value="{{ old('bathroom_no', $apartment->bathroom_no) }}">
</div>

<div class="form-group">
    <label for="bed-no">Numero di letti</label>
    <input type="number" class="form-control" id="bed-no"  placeholder="Inserisci il numero di letti" name="bed_no" value="{{ old('bed_no', $apartment->bed_no) }}">
</div>

<div class="form-group">
    <label for="rooms-no">Numero di stanze</label>
    <input type="number" class="form-control" id="rooms-no"  placeholder="Inserisci il numero di stanze" name="room_no" value="{{ old('room_no', $apartment->room_no) }}">
</div>

<div class="form-group">
    <label for="square-meters">Metri quadri dell'abitazione</label>
    <input type="number" class="form-control" id="square-meters"  placeholder="Inserisci il numero di metri quadri dell'abitazione" name="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}">
</div>

<div class="form-group">
    <label for="address">Indirizzo</label>
    <input type="text" class="form-control" id="address"  placeholder="Inserisci l'indirizzo" name="address" value="{{ old('address', $apartment->address) }}">
</div>


<button type="submit">Invia</button>
