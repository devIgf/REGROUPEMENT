<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="/styles/ClientDashboard.css">
</head>
<body>
    <div class="container-top">
        <h3>
            @if (Auth::check())
            <p>Bienvenue, {{ Auth::user()->name }} !</p>
            @endif
        </h3>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="logout-button">Déconnexion</button>
        </form>
    </div>

    <div class="para">
        <u>
            <h4>Quel application souhaitez-vous utiliser aujourd'hui ?</h4>
        </u>
    </div>

    @php
        // Décoder les permissions depuis la base de données
        $buttonPermissions = json_decode(Auth::user()->button_permissions, true) ?? [];
    @endphp

    <div class="client-buttons">
        <a href="https://www.youtube.com/" target="_blank">
            <button class="client-button" {{ in_array('button1', $buttonPermissions) ? 'disabled' : '' }}>
                Intégration
            </button>
        </a>

        <a href="https://v5.voiranime.com/" target="_blank">
            <button class="client-button" {{ in_array('button2', $buttonPermissions) ? 'disabled' : '' }}>
                Récouvrement
            </button>
        </a>

        <a href="https://github.com/" target="_blank">
            <button class="client-button" {{ in_array('button3', $buttonPermissions) ? 'disabled' : '' }}>
                Déconnexion
            </button>
        </a>
    </div>

    <!-- Footer -->
    <footer style="background-color: #43c9d3; color: white; padding: 10px; margin-top: 90px;">
        <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px;">
            <!-- Logo -->
            <div style="flex: 1; text-align: center;">
                <img src="../public/asstes/img/log.png" alt="Logo" style="width: 100px;">
            </div>

            <!-- Mini texte -->
            <div style="flex: 1; text-align: center;">
                <p style="margin: 0;">Notre credo repose sur la mise en place de solutions optimales de gestion à nos clients et une assistance en temps réel.</p>
            </div>

            <!-- Réseaux sociaux -->
            <div style="flex: 1; text-align: center;">
                <a href="#" style="margin-right: 10px; color: white;">Facebook</a>
                <a href="#" style="margin-right: 10px; color: white;">Twitter</a>
                <a href="#" style="color: white;">Instagram</a>
            </div>
        </div>

        <!-- Copyright -->
        <span style="display: block; text-align: center; border-top: 1px solid white; padding-top: 10px;">
            &copy; 2024 <a href="https://igf-sn.com/">IGF-sn</a>. Tous droits réservés.
        </span>
    </footer>
</body>
</html>
