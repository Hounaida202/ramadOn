<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Statistiques - RamadanRecipes</title>
    <style>
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23064e3b' fill-opacity='0.07'%3E%3Cpath d='M30 0l2.5 7.7h8.1l-6.5 4.7 2.5 7.7-6.6-4.8-6.5 4.8 2.5-7.7-6.5-4.7h8.1z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .stat-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
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
                <a href="{{route('add_pub')}}" class="text-amber-200 hover:text-amber-400">Ajouter Pub</a>
                <a href="{{route('add_recipe')}}" class="text-amber-200 hover:text-amber-400">Ajouter recette</a>
                <a href="{{route('recettes')}}" class="text-amber-200 hover:text-amber-400">Recettes</a>
                <a href="{{route('statistics')}}" class="text-amber-200 hover:text-amber-400 font-bold">Statistiques</a>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Titre de la section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-emerald-800">Statistiques de la plateforme</h1>
            <p class="text-emerald-600 mt-2">Résumé des activités sur RamadanRecipes</p>
        </div>

        <!-- Cartes de statistiques -->
        <div class="flex flex-col md:flex-row justify-center gap-6 mb-10">
            <!-- Carte des publications -->
            <div class="stat-card bg-white rounded-lg shadow-md overflow-hidden p-6 flex flex-col items-center text-center max-w-xs w-full">
                <div class="rounded-full bg-amber-100 p-4 mb-4">
                    <i class="fas fa-bullhorn text-3xl text-amber-600"></i>
                </div>
                <h3 class="font-bold text-lg text-emerald-800 mb-2">Publications</h3>
                <p class="text-4xl font-bold text-amber-500 mb-2">{{ $totalPublications }}</p>
                <p class="text-gray-600">Le nombre total des publications est {{ $totalPublications }}</p>
            </div>

            <!-- Carte des recettes -->
            <div class="stat-card bg-white rounded-lg shadow-md overflow-hidden p-6 flex flex-col items-center text-center max-w-xs w-full">
                <div class="rounded-full bg-emerald-100 p-4 mb-4">
                    <i class="fas fa-utensils text-3xl text-emerald-600"></i>
                </div>
                <h3 class="font-bold text-lg text-emerald-800 mb-2">Recettes</h3>
                <p class="text-4xl font-bold text-emerald-500 mb-2">{{ $totalRecipes }}</p>
                <p class="text-gray-600">Le nombre total des recettes est {{ $totalRecipes }}</p>
            </div>
        </div>

        <!-- Section supplémentaire : Activité récente -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-10">
            <h2 class="text-xl font-bold text-emerald-800 mb-4">Résumé des activités</h2>
            <div class="text-center py-6">
                <p class="text-lg text-gray-700">
                    Notre communauté compte actuellement <span class="font-bold text-emerald-600">{{ $totalPublications }}</span> publications
                    dont <span class="font-bold text-amber-600">{{ $totalRecipes }}</span> recettes.
                </p>
                <p class="text-lg text-gray-700 mt-2">
                    Merci à tous nos contributeurs pour enrichir la plateforme pendant ce mois béni du Ramadan.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer simple -->
    <footer class="bg-emerald-800 text-white py-4 mt-10">
        <div class="container mx-auto px-4 text-center">
            <p>© 2025 RamadanRecipes - Partagez vos recettes du mois sacré</p>
        </div>
    </footer>
</body>
</html>