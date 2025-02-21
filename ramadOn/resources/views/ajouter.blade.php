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
        <style>
        :root {
            --primary-gold: #D4AF37;
            --secondary-gold: #FFD700;
            --dark-green: #0A2F1F;
        }

        
        .bg-pattern {
            background-color: var(--dark-green);
            background-image: url('data:image/svg+xml,<svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg"><path d="M25 0l25 25-25 25L0 25z" fill="%23D4AF37" fill-opacity="0.05"/></svg>');
        }

        .hero-gradient {
            background: linear-gradient(45deg, rgba(10, 47, 31, 0.95) 0%, rgba(10, 47, 31, 0.8) 100%);
        }

        .text-gold {
            color: var(--primary-gold);
        }

        .border-gold {
            border-color: var(--primary-gold);
        }

        .bg-gold {
            background-color: var(--primary-gold);
        }

        .form-input:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.2);
        }

        .step-container {
            position: relative;
        }

        .step-number {
            position: absolute;
            left: -40px;
            top: 0;
            width: 30px;
            height: 30px;
            background-color: var(--primary-gold);
            color: var(--dark-green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .success-notification {
            transform: translateX(100%);
            transition: transform 0.5s ease-out;
        }

        .success-notification.show {
            transform: translateX(0);
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
                <a href="{{route('add_recipe')}}" class="text-amber-200 hover:text-amber-400">Ajouter recette</a>
                <a href="{{route('recettes')}}" class="text-amber-200 hover:text-amber-400">Recettes</a>
                <a href="{{route('statistics')}}" class="text-amber-200 hover:text-amber-400">statistique</a>

            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
     <div class="pt-24 pb-16">
    <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div
                    class="bg-white bg-opacity-5 rounded-xl p-8 border border-gold border-opacity-30 animate__animated animate__fadeIn">
                    <h1 class="text-4xl font-bold text-gold mb-8 text-center">Ajouter une Recette</h1>

                    <form action="{{ route('add_pub') }}" method="POST" enctype="multipart/form-data"
                        id="publicationForm">
                        @csrf

                        <!-- Title Field -->
                        <div class="mb-6">
                            <label for="title_pub" class="block text-gold font-semibold mb-2">Titre</label>
                            <input type="text" name="title_pub" id="title_pub" required
                                class="w-full bg-white bg-opacity-10 text-white border border-gold border-opacity-30 rounded-lg px-4 py-3 focus:outline-none form-input"
                                placeholder="Entrez le titre de votre publication">
                            <span id="titleError" class="text-red-400 text-sm hidden">Le titre est requis</span>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-6">
                            <label for="description" class="block text-gold font-semibold mb-2">Description</label>
                            <textarea name="description" id="description" rows="5" required
                                class="w-full bg-white bg-opacity-10 text-white border border-gold border-opacity-30 rounded-lg px-4 py-3 focus:outline-none form-input"
                                placeholder="Partagez votre expérience ou votre recette..."></textarea>
                            <span id="descriptionError" class="text-red-400 text-sm hidden">La description est
                                requise</span>
                        </div>

                        <!-- Image URL Field -->
                        <div class="mb-6">
                            <label for="image_url" class="block text-gold font-semibold mb-2">URL de l'image
                                (optionnelle)</label>
                            <input type="text" name="image_url" id="image_url"
                                class="w-full bg-white bg-opacity-10 text-white border border-gold border-opacity-30 rounded-lg px-4 py-3 focus:outline-none form-input"
                                placeholder="Entrez l'URL de l'image">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center mt-8">
                            <button type="submit" id="submitBtn"
                                class="bg-gold text-dark-green px-8 py-4 rounded-full font-bold hover:bg-opacity-90 transition transform hover:scale-105 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Publier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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