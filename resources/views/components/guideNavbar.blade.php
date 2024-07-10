<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('public.home')}}">Club</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('guide.profile.edit')}}">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('guide.home', ['guide'=>$guide])}}">View Your Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:red" href="{{route('logout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>