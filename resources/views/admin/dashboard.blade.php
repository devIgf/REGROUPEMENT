<link rel="stylesheet" href="/styles/adminDashboard.css">
<div class="header">
    <h3>
        @if (Auth::check())
        <p>Bienvenue, {{ Auth::user()->name }} !</p>
        {{-- <p>Email : {{ Auth::user()->email }}</p> --}}
        {{-- <p>Rôle : {{ Auth::user()->role }}</p> --}}
        @endif
    </h3>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</div>



@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>
                    <!-- Example of action buttons -->
                    <button>
                        <a href="{{route('admin.edit', $client->id)}}">Edit</a>
                    </button>
                    <form action="{{ route('admin.delete', $client->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
