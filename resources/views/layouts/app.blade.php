<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-DH07MX72G7"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-DH07MX72G7');
            </script>
        <!-- Google tag (gtag.js) -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Punto Sur Pastelería') }}</title>
        <meta name="description" content="{{__('Descubre Punto Sur Pastelería en Fuengirola, Málaga. Deléitate con nuestras tartas y dulces elaborados con ingredientes de alta calidad y llenos de sabor. ¡Visítanos en la Costa del Sol!')}}" lang="es">

        <meta name="keywords" content="{{__('pastelería Fuengirola, tartas Málaga, tarta de queso, tarta de zanahoria, tarta banoffee, tarta brownie, pastelería Costa del Sol, tartas de chocolate, empanadas Fuengirola, tartaleta de coco Málaga, Punto Sur Pastelería')}}">



        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/img/puntosur.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=albert-sans:200,300,500,700|battambang:100,300,400,700,900" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
    #loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f3f3f3;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        gap: 2rem;
    }
    #loader-wrapper svg{
        fill:#6C4852;
    }

    #loader {
        width: 50%;
        height: 5px;
        background-color: #e0e0e0;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
    }

    #progress-bar {
        height: 100%;
        width: 0;
        background-color: #24e3a4;
        border-radius: 15px;
        transition: width 0.3s;
    }

    #loader-percentage {
        font-size: 24px;
        color: #6C4852;
    }

    #body-content{
        display:none;
        opacity: 0;
        transition: opacity 1s;
    }
    #body-content.fade-in {
        opacity: 1;
    }
</style>
    <body>
        <div id="loader-wrapper">
            <div class="w-40">
                <x-application-logo/>
            </div>
            <div id="loader">
                <div id="progress-bar"></div>
            </div>
            <div id="loader-percentage">0%</div>
        </div>
        <div id="body-content">
            <!-- Toast -->
            <div
                x-data="toast"
                x-show="visible"
                x-transition
                x-cloak
                @notify.window="show($event.detail.message)"
                class="toast z-20 fixed w-full max-w-[350px] bottom-0 mb-8 right-0 mr-8 py-4 px-4 rounded-3xl"
            >
                <div class="flex justify-between w-full items-center z-10">
                    <div class="font-semibold" x-text="message"></div>
                    <button
                        @click="close"
                        class="w-[30px] h-[30px] flex items-center justify-center rounded-full hover:bg-black/10 transition-colors"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
                <!-- Progress -->
                <div>
                    <div
                        class="progress absolute left-0 bottom-0 right-0 h-full rounded-3xl"
                        :style="{'width': `${percent}%`}"
                    ></div>
                </div>
            </div>
            <!--/ Toast -->
            @include('layouts.navigation')
            <main class="w-full mx-auto">
                {{ $slot }}
            </main>
            
            @include('layouts.footer')
            
        </div>
    </body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let percentage = 0;
        const progressBar = document.getElementById('progress-bar');
        const interval = setInterval(function() {
            if (percentage < 100) {
                percentage += 1;
                document.getElementById('loader-percentage').innerText = percentage + '%';
                progressBar.style.width = percentage + '%';
            } else {
                clearInterval(interval);
                document.getElementById('loader-wrapper').style.display = 'none';
                const content = document.getElementById('body-content');
                content.style.display = 'block';
                setTimeout(function() {
                    content.classList.add('fade-in');
                }, 10);
            }
        });
    });
</script>