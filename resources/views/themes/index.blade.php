<!-- themes/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des thèmes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
          body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 20px;
}

h1 {
    text-align: center;
}

table {
    width: 50%;
    border-collapse: collapse;
    margin-left:350px
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}


a, button {
    text-decoration: none;
   
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    
}

  /* Réinitialiser les styles par défaut */
  a {
        text-decoration: none; /* Supprimer le soulignement du lien */
    }

    i {
        display: inline-block; /* Afficher les icônes en tant que bloc en ligne */
        font-size: 20px; /* Ajuster la taille de l'icône */
        color: black; /* Couleur par défaut pour les icônes */
        margin: 0 5px; /* Espacement autour de l'icône */
    }

    i:hover {
        color: red; /* Changer la couleur lorsqu'on survole l'icône */
    }
    </style>
</head>
<body>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Liste des thèmes</h1>
    <div class="table-container">
    <table>
        <thead>
            <tr>

                <th>Nom du thème</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($themes as $theme)
        <tr>
            <td>{{ $theme->nom_theme }}</td>
            <td>
                <div>
                    <a href="{{ route('themes.edit', $theme->id) }}">
                        <!-- Icône pour la mise à jour -->
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce thème ?')) document.getElementById('delete-theme-{{ $theme->id }}').submit();">
                        <!-- Icône pour la suppression -->
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <form id="delete-theme-{{ $theme->id }}" action="{{ route('themes.destroy', $theme->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>


    </table>
    </div>
</body>
</html>
