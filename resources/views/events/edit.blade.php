@extends ('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-mds-3">
    <h1 >Editando: {{ $event->title }}</h1>
    <form  style=" width: 50vw; margin-left : 25vw;" action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do evento: </label>
            <input type="file" class="form-control-file" width="20px" id="imagemais" name="image">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
        </div>
        <div class="form-group">
            <label for="title">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{ $event->city }}">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Privado?</label>
            <select name="private" id="private" class="form-control">
                @if($event->private == 0)
                    <option value="0">{{ $event->private == 0 ? "Não" : "Sim" }}</option>
                    <option value="1">{{ $event->private == 1 ? "Não" : "Sim" }}</option>
                @else    
                    <option value="0">{{ $event->private == 0 ? "Não" : "Sim" }}</option>
                    <option value="1">{{ $event->private == 1 ? "Não" : "Sim" }}</option>
                @endif
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $event->description }}</textarea>
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
        <input  style=" width: 10vw; margin-left : 20vw;" type="submit" class="btn btn-primary" value="ATUALIZAR">
    </form>
    
</div>

@endsection