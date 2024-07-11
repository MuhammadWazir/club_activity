<x-layout>
    <x-adminNavbar/>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $event->category }}</h3>
                <h5 class="card-subtitle mb-2 text-muted">{{ $event->status }}</h5>
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text"><strong>Cost:</strong> {{ $event->cost }} $</p>
                <a href="{{route('admin.event.edit', ['event'=>$event])}}" class="btn btn-primary">Edit Event</a>
                <a href="{{route('admin.event.delete', ['event'=>$event])}}" class="btn btn-danger">Delete Event</a>
                <a href="{{route('admin.event.members', ['event'=>$event])}}" class="btn btn-danger">View Members</a>
            </div>
        </div>
    </div>
</x-layout>

