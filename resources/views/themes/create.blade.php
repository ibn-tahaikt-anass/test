<head>

<meta charset="utf-8">

<title>Formulaire</title>

<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta content="width=device-width , initial-scale=1.0" name="viewport">
<style>
/* styles.css */

body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

#form-container {
    width: 60%;
    text-align: center;
    margin: auto;
    border: 1px solid #ddd; /* Ajout d'une bordure */
    padding: 20px; /* Espacement intérieur */
    border-radius: 10px; /* Coins arrondis */
}

form {
    display: flex;
    flex-direction: column;

}

input[type="text"],
button {
    margin: 10px 0;
    padding: 12px; /* Augmentation de la taille du champ de texte et du bouton */
    border: 1px solid #ccc; /* Ajout d'une bordure autour des éléments */
}

button {
    background-color: #1ed8ca;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    border-radius: 5px;
}

button:hover {
    background-color: #39833;
}

</style>
</head>
<body>

 <div id="form">

 <form action="{{ route('themes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

 <label for="inputPassword">Ajouter un Album</label>

 <input type="text" id="inputPassword" name="nom_theme" placeholder="Nom du thème" required>

 <button href="{{ route('home') }}"type="submit">Ajouter</button>

 </form>

 </div>


</body>