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
        
        .comment-section {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .comment-section.open {
            max-height: 300px;
            overflow-y: auto;
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
                <a href="{{route('statistics')}}" class="text-amber-200 hover:text-amber-400">statistique</a>

            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Titre de la section -->
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-emerald-800">Temoignages</h1>
            <p class="text-emerald-600"></p>
        </div>

        <!-- Grille de recettes - 3 cartes par ligne -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Carte avec commentaires -->
            @foreach($publications as $pub)

            <div class="recipe-card bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{$pub->image}}" alt="Recette" class="w-full h-48 object-cover"/>
                <div class="p-4">
                   <div class="flex justify-between items-start mb-2"> 
                         <span class="text-sm">35 min</span> 
                   </div>
                   <h3 class="font-bold text-lg text-emerald-800 mb-2">{{$pub->titre}}</h3>
                   <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{$pub->description}}</p>
                   <div class="flex justify-between items-center mb-3">
                        <div class="flex items-center">
                            <img src="https://www.babelio.com/users/QUIZ_Inconnu-ou-inconnue-mais-tres-connus_2299.jpeg" alt="Avatar" class="w-6 h-6 rounded-full mr-2"/>
                            <span class="text-xs text-gray-500">anonyme</span>
                        </div>
                        <div class="flex space-x-2">
                           
                            <button class="comment-toggle text-emerald-600 hover:text-emerald-800" data-pub-id="{{$pub->id}}">
                                <i class="far fa-comment"></i>
                            </button>
                        </div>
                   </div>
                   
                   <!-- Section commentaires -->
                   <div id="comment-section-{{$pub->id}}" class="comment-section border-t pt-3">
                        <!-- Affichage des commentaires existants -->
                        <div class="comments-container mb-3 max-h-24 overflow-y-auto">
                            @if(isset($pub->comments) && count($pub->comments) > 0)
                            @foreach($pub->comments as $comment)                                <div class="comment mb-2 pb-2 border-b border-gray-100">
                                    <div class="flex items-start">
                                        <img src="https://www.babelio.com/users/QUIZ_Inconnu-ou-inconnue-mais-tres-connus_2299.jpeg" alt="Avatar" class="w-5 h-5 rounded-full mr-2 mt-1"/>
                                        <div>
                                            <p class="text-xs font-medium text-gray-700">Anonyme</p>
                                            <p class="text-xs text-gray-600">{{$comment->contenu}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p class="text-xs text-gray-500 italic">Aucun commentaire pour l'instant</p>
                            @endif
                        </div>
                        
                        <!-- Formulaire pour ajouter un commentaire -->
                        <form action="{{route('add_comment')}}" method="POST" class="flex items-center">
                            @csrf
                            <input type="hidden" name="publication_id" value="{{$pub->id}}">
                            <input type="text" name="content" placeholder="Ajouter un commentaire..." 
                                class="w-full text-sm border border-gray-200 rounded-l-lg py-1 px-2 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                            <button type="submit" class="bg-emerald-600 text-white py-1 px-3 rounded-r-lg hover:bg-emerald-700">
                                <i class="fas fa-paper-plane text-xs"></i>
                            </button>
                        </form>
                   </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination simple -->
        <div class="mt-10 flex justify-center">
            <div class="flex space-x-2">
                {{$publications->links()}}
            </div>
        </div>
    </div>

    <!-- Footer simple -->
    <footer class="bg-emerald-800 text-white py-4 mt-10">
        <div class="container mx-auto px-4 text-center">
            <p>© 2025 RamadanRecipes - Partagez vos recettes du mois sacré</p>
        </div>
    </footer>

    <!-- Script pour la section commentaires -->
    <script>
        // Animation des cartes
        document.querySelectorAll('.recipe-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.querySelector('img').style.transform = 'scale(1.05)';
                this.querySelector('img').style.transition = 'transform 0.5s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.querySelector('img').style.transform = 'scale(1)';
            });
        });
        
        // Toggle des commentaires
        document.querySelectorAll('.comment-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const pubId = this.getAttribute('data-pub-id');
                const commentSection = document.getElementById(`comment-section-${pubId}`);
                commentSection.classList.toggle('open');
                
                // Changer l'icône
                const icon = this.querySelector('i');
                if (commentSection.classList.contains('open')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                }
            });
        });
    </script>
</body>
</html>