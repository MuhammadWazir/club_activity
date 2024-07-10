<x-layout>
    <x-navbar/>
    <div class="container mt-4">
        <div class="d-flex flex-wrap">
            @forelse($guides as $guide)
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">{{ $guide->name }}</p>
                        <p class="card-text">Joining Date: {{ $guide->joining_date }}</p>
                        <p class="card-text">Email: {{ $guide->email }}</p>
                    </div>
                </div>
            @empty
                <div>No guides available</div>
            @endforelse
        </div>
    </div>
</x-layout>
