<x-layout>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('guide.events.all', ['guide'=>$guide])}}">Club</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="{{route('guide.events.all', ['guide'=>$guide])}}">All Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('guide.events', ['guide'=>$guide])}}">Your Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('guide.profile.edit', ['guide'=>$guide])}}">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:red" href="{{route('logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="d-flex flex-wrap">
        @forelse($events as $event)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->category }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $event->status }}</h6>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text">{{ $event->cost }} $</p>
                </div>
            </div>
        @empty
            <div>No events available</div>
        @endforelse
    </div>
</x-layout>
