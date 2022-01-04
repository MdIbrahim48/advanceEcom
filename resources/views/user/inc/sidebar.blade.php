

<div class="card" style="width: 18rem;">
    <img class="card-img-top"style="border-radius: 50%" src="{{ asset( Auth::user()->image) }}" height="100%" width="100%" alt="Card image cap">
    <ul class="list-group list-group-flush">
        <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-block btn-primary">Home</a>
        <a href="{{ route('user-image') }}" class="btn btn-sm btn-block btn-primary">Update Image</a>
        <a href="{{ route('user-password') }}" class="btn btn-sm btn-block btn-primary">Update Password</a>
        <a href="{{ route('logout') }}" class="btn btn-sm btn-block btn-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </ul>
</div>
