<div style="display: grid; place-items: center; height: 100vh;">
    <form action="{{ route('login') }}" method="GET">
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<form action="{{ route('register') }}" method="GET">
    <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>