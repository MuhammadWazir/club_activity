<x-layout>
    <x-adminNavbar/>
    <div class="container mt-4">
        <div class="d-flex flex-wrap">
            @forelse($members as $member)
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">{{ $member->name }}</p>
                        <p class="card-text">Joining Date: {{ $member->joining_date }}</p>
                        <p class="card-text">Email: {{ $member->email }}</p>
                        <p class="card-text">Birth Date: {{ $member->date_of_birth }}</p>
                        <div class="mt-auto text-center">
                            <a href="{{ route('admin.show.member.events', ['member' => $member]) }}" class="btn btn-primary m-1">Joined Events</a>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{ route('admin.members.delete', ['member' => $member]) }}" class="btn btn-danger m-1">Delete Memeber</a>
                        </div>
                    </div>
                </div>
            @empty
                <div>No members available</div>
            @endforelse
        </div>
    </div>
</x-layout>
