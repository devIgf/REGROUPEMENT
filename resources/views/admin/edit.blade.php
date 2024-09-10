<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="/styles/edit.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>

<a href="{{ route('admin.dashboard') }}">
   <button>
    Accueil
   </button>
</a>

@foreach($clients as $user)
<form action="{{ route('admin.updateButtonPermissions', $user->id) }}" method="POST">
    @csrf
    @php
        // Charger les permissions du client (le $user que l'admin modifie)
        $buttonPermissions = json_decode($user->button_permissions, true) ?? [];
    @endphp

    <div>
        <label>
            <input type="checkbox" name="button_permissions[]" value="button1"
            {{ in_array('button1', $buttonPermissions) ? 'checked' : '' }}>
            <span>Button 1</span>
        </label>
    </div>

    <div>
        <label>
            <input type="checkbox" name="button_permissions[]" value="button2"
            {{ in_array('button2', $buttonPermissions) ? 'checked' : '' }}>
            <span>Button 2</span>
        </label>
    </div>

    <div>
        <label>
            <input type="checkbox" name="button_permissions[]" value="button3"
            {{ in_array('button3', $buttonPermissions) ? 'checked' : '' }}>
            <span>Button 3</span>
        </label>
    </div>

    <button type="submit">Enregistrer</button>
</form>

@endforeach

</body>
</html>
