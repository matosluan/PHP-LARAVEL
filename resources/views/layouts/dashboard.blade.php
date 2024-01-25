@extends ('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    @else
        <p>Você ainda n tem Eventos, <a href="/events/create">Criar Evento</a></p>
    @endif
</div>

@endsection
