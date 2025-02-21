<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Recettes du Ramadan</title>
    <style>
        .recipe-card {
            transition: transform 0.3s ease;
        }
        
        .recipe-card:hover {
            transform: translateY(-5px);
        }
        
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23064e3b' fill-opacity='0.07'%3E%3Cpath d='M30 0l2.5 7.7h8.1l-6.5 4.7 2.5 7.7-6.6-4.8-6.5 4.8 2.5-7.7-6.5-4.7h8.1z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-pattern min-h-screen">
    <!-- Navbar simple -->
    <nav class="bg-emerald-800 text-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo et nom du site -->
            <div class="flex items-center">
                <i class="fas fa-moon text-amber-300 mr-2"></i>
                <span class="text-xl font-bold text-amber-400">RamadanRecipes</span>
            </div>
            
            <!-- Menu de navigation simple -->
            <div class="flex items-center space-x-6">
                <a href="{{route('publishing')}}" class="text-amber-200 hover:text-amber-400">Accueil</a>
                <a href="{{route('add_pub')}}" class="text-amber-200 hover:text-amber-400">Ajouter Pub</a>
                <a href="{{route('add_recipe')}}" class="text-amber-200 hover:text-amber-400">Ajouter recette</a>
                <a href="{{route('recettes')}}" class="text-amber-200 hover:text-amber-400">statistique</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Titre de la section -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-emerald-800">Recettes du Ramadan</h1>
            <p class="text-emerald-600">Découvrez des plats traditionnels pour le mois sacré</p>
        </div>

        <!-- Filtres simples -->
        <div class="mb-6 flex flex-wrap justify-center gap-2">
    <a href="{{ route('recettes') }}" class="px-4 py-2 {{ request('category') == null ? 'bg-emerald-800 text-white' : 'bg-white text-emerald-800' }} rounded-lg hover:bg-emerald-700">Tous</a>

    <a href="{{ route('recettes', ['category' => 'Entrées']) }}" class="px-4 py-2 {{ request('category') == 'Entrées' ? 'bg-emerald-800 text-white' : 'bg-white text-emerald-800' }} rounded-lg hover:bg-emerald-100">Entrées</a>

    <a href="{{ route('recettes', ['category' => 'Plats']) }}" class="px-4 py-2 {{ request('category') == 'Plats' ? 'bg-emerald-800 text-white' : 'bg-white text-emerald-800' }} rounded-lg hover:bg-emerald-100">Plats</a>

    <a href="{{ route('recettes', ['category' => 'Desserts']) }}" class="px-4 py-2 {{ request('category') == 'Desserts' ? 'bg-emerald-800 text-white' : 'bg-white text-emerald-800' }} rounded-lg hover:bg-emerald-100">Desserts</a>

    <a href="{{ route('recettes', ['category' => 'Boissons']) }}" class="px-4 py-2 {{ request('category') == 'Boissons' ? 'bg-emerald-800 text-white' : 'bg-white text-emerald-800' }} rounded-lg hover:bg-emerald-100">Boissons</a>
</div>

        <!-- Grille de recettes - 3 cartes par ligne -->
        <!-- Grille de recettes - cartes horizontales -->
<div class="grid grid-cols-1 gap-6">
    @foreach($recettes as $recette)
    <div class="recipe-card bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">
        <!-- Image à gauche -->
        <div class="md:w-1/3 flex-shrink-0">
            <img src="{{$recette->image}}" alt="Recette" class="w-full h-full object-cover"/>
        </div>
        
        <!-- Contenu à droite -->
        <div class="p-5 md:w-2/3 flex flex-col">
            <div class="flex justify-between items-start mb-3">
                <span class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded">{{$recette->categorie}}</span>
                <div class="flex items-center text-amber-500">
                    <i class="fas fa-clock mr-1"></i>
                    <span class="text-sm">35 min</span>
                </div>
            </div>
            
            <h3 class="font-bold text-xl text-emerald-800 mb-3">{{$recette->titre}}</h3>
            
            <p class="text-gray-600 text-sm mb-4 flex-grow">{{$recette->description}}</p>
            
            <div class="flex justify-between items-center mt-auto">
                <div class="flex items-center">
                    <img src="/api/placeholder/32/32" alt="Avatar" class="w-6 h-6 rounded-full mr-2"/>
                    <span class="text-xs text-gray-500">Fatima K.</span>
                </div>
                <button class="text-emerald-600 hover:text-emerald-800">
                    <i class="far fa-bookmark"></i>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

        <!-- Pagination simple -->
        <div class="mt-10 flex justify-center">
            <div class="flex space-x-2">
            {{$recettes->links()}} </div>
        </div>
    </div>

    <!-- Footer simple -->
    <footer class="bg-emerald-800 text-white py-4 mt-10">
        <div class="container mx-auto px-4 text-center">
            <p>© 2025 RamadanRecipes - Partagez vos recettes du mois sacré</p>
        </div>
    </footer>

    <!-- Script simple -->
    <script>
        // Simple hover effect enhancement
        document.querySelectorAll('.recipe-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.querySelector('img').style.transform = 'scale(1.05)';
                this.querySelector('img').style.transition = 'transform 0.5s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.querySelector('img').style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>