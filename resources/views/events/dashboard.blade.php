@extends ('layouts.main')

@section('title', '2024')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Evento</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>
                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"> <ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/events/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"> <ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Você ainda não tem Eventos, <a href="/events/create">Criar Evento</a></p>
    @endif
</div>

@endsection
