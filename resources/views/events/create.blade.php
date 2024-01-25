@extends ('layouts.main')

@section('title', 2024)

@section('content')

<div id="event-create-container" class="col-md-6 offset-mds-3">
    <h1 >Formulário de Evento</h1>
    <form  style=" width: 50vw; margin-left : 25vw;" action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Anexo: </label>
            <input type="file" class="form-control-file" width="20px" id="imagemais" name="image">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
        </div>
        <div class="form-group">
            <label for="title">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura</label>
            <div>
                <input type="checkbox" name="items[]" value="cadeiras">Cadeiras
            </div>
            <div>
                <input type="checkbox" name="items[]" value="palco">Palco
            </div>
            <div>
                <input type="checkbox" name="items[]" value="open food">Open Food
            </div>
            <div>
                <input type="checkbox" name="items[]" value="open bar">Open Bar
            </div>
            <div>
                <input type="checkbox" name="items[]" value="Fino">Fino
            </div>
            <div>
                <input type="checkbox" name="items[]" value="brindes">Brindes
            </div>
        </div>
        <br>
        <input  style=" width: 10vw; margin-left : 20vw;" type="submit" class="btn btn-primary" value="CRIAR">
    </form>
    
</div>

@endsection