<x-layout>
    <x-adminNavbar/>
    <div class="d-flex flex-wrap justify-content-center">
        @forelse($events as $event)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->category }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $event->status }}</h6>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text">{{ $event->cost }} $</p>
                    <div class="mt-auto text-center">
                        <a href="{{ route('admin.show.event', ['event' => $event]) }}" class="btn btn-primary">View Event</a>
                    </div>
                </div>
            </div>
        @empty
            <div>No events available</div>
        @endforelse
        <div class="w-100 text-center my-4">
            <a href="{{ route('admin.event.add') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </a>
        </div>
    </div>
</x-layout>
