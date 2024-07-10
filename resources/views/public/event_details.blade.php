<x-layout>
    <x-navbar/>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $event->category }}</h3>
                <h5 class="card-subtitle mb-2 text-muted">{{ $event->status }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text"><strong>Cost:</strong> {{ $event->cost }} $</p>
                
                @if ($joined)
                    <a href="{{ route('event.leave', ['event' => $event]) }}" class="btn btn-danger">Leave Event</a>
                @else
                    <a href="{{ route('event.join', ['event' => $event]) }}" class="btn btn-primary">Join Event</a>
                @endif

            </div>
        </div>
    </div>
</x-layout>

