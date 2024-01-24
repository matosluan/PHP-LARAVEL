@extends ('layouts.main')

@section('title', 2024)

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Buscar</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">            
    </form>        
</div>
<div id="events-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Fretes</h2>
        <p class="subtitle">Aqui ta os frete disponivel meu nobre</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/bolso.png" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">Entrega: {{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5> 
                <a href="events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar Fretes com {{ $search }} <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há Fretes disponíveis</p>
        @endif
    </div>
</div>
@endsection
