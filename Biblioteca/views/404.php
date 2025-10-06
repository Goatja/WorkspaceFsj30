<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <!-- Incluye los scripts de Tailwind CSS y Flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <style>
        /* Animación personalizada para el texto */
        @keyframes bounce-in {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            70% {
                opacity: 1;
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        .animate-bounce-in {
            animation: bounce-in 1.2s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        /* Animación de entrada para el SVG */
        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0);
            }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 flex items-center justify-center min-h-screen p-4">

<main class="text-center">
    <div class="mb-8">
        <!-- SVG de la animación flotante -->
        <svg class="mx-auto w-48 h-48 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>
    <h1 class="mb-4 text-7xl font-extrabold text-blue-600 dark:text-blue-500 animate-bounce-in">404</h1>
    <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white animate-fade-in-up">¡Ups! Algo falta.</p>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400 animate-fade-in-up delay-200">
        Lo sentimos, no pudimos encontrar esa página. Puedes encontrar muchas cosas para explorar en la página de inicio.
    </p>
    <a href="index.php" class="inline-flex text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-900 transition-transform duration-300 transform hover:scale-105">
        Volver a la página de inicio
    </a>
</main>

<script>
    // Pequeño script para añadir clases de animación de forma progresiva
    document.addEventListener("DOMContentLoaded", function() {
        // Para el texto que se desvanece y sube
        const fadeIns = document.querySelectorAll('.animate-fade-in-up');
        fadeIns.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('fade-in-up-start');
            }, index * 200);
        });

        // Para añadir la animación de entrada al h1
        document.querySelector('h1').classList.add('animate-bounce-in');
    });

    // Definición de animaciones para Tailwind JIT
    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    'fade-in-up': 'fade-in-up 0.6s ease-out forwards',
                },
                keyframes: {
                    'fade-in-up': {
                        '0%': {
                            opacity: '0',
                            transform: 'translateY(10px)',
                        },
                        '100%': {
                            opacity: '1',
                            transform: 'translateY(0)',
                        },
                    },
                },
            }
        }
    }
</script>

</body>
</html>