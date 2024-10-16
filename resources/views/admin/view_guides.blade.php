<x-layout>
    <x-adminNavbar/>
    <div class="container mt-4">
        <div class="d-flex flex-wrap">
            @forelse($guides as $guide)
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">{{ $guide->name }}</p>
                        <p class="card-text">Joining Date: {{ $guide->joining_date }}</p>
                        <p class="card-text">Email: {{ $guide->email }}</p>
                        <div class="mt-auto text-center">
                        <a href="{{ route('admin.guide.delete', ['guide' => $guide]) }}" class="btn btn-danger">Delete Guide</a>
                    </div>
                    </div>
                </div>
            @empty
                <div>No guides available</div>
            @endforelse
            <div class="w-100 text-center my-4">
            <a href="{{ route('admin.guide.add') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </a>
            </div>
        </div>
    </div>
</x-layout>
