

<div class="form-group col-12">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name"  placeholder="Inserisci il titolo" name="name" value="{{ old('name', $apartment->name) }}">
</div>

<div class="form-group col-12">
    <label for="duration">Durata</label>
    <input type="text" class="form-control" id="duration"  placeholder="Inserisci il titolo" duration="duration" value="{{ old('duration', $apartment->duration) }}">
</div>

<div class="form-group col-12">
    <label for="price">Prezzo</label>
    <input type="text" class="form-control" id="price"  placeholder="Inserisci il titolo" price="price" value="{{ old('price', $apartment->price) }}">
</div>









<button type="submit" class="btn btn-success mt-4">Invia</button>
