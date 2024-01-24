@extends ('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dasboard-title-container">
    <h1>Meus Fretes</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    @else
        <p>Você ainda n tem Fretes, <a href="/events/create">Criar Frete</a></p>
    @endif
</div>

@endsection
