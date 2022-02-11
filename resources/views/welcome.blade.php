<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/studiantes.png')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 ">
            <div class="w-full md:w-3/4 lg:w-1/2 mt-20">
                <h1 class="text-white font-fold text-4xl">Aspira a más</h1>
                <p class="text-white text-lg mt-2">Aprender te mantiene a la vanguardia. Consigue las habilidades más
                    demandadas para potenciar tu crecimiento.</p>
                <!-- component -->
               @livewire('search')
            </div>
        </div>
    </section>

    <!--content-->
    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-col-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover"
                    src="{{ asset('img/home/imagen1.jpg') }}">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos</h1>
                </header>
                <p class="text-sm text-center text-gray-500">
                    Encuentra una gran variedad de cursos en esta plataforma.
                </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover"
                    src="{{ asset('img/home/imagen3.jpg') }}">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manuales y guías</h1>
                </header>
                <p class="text-sm text-center text-gray-500">
                    Hemos resumido la documentación oficial de las normas ISO para ayudarte en tu proceso de aprendizaje.
                </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover"
                    src="{{ asset('img/home/imagen2.jpg') }}">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog</h1>
                </header>
                <p class="text-sm text-center text-gray-500">
                    Artículos de interés relacionados a los temas de aprendizaje para potenciar tus habilidades.
                </p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-40 w-full object-cover"
                     src="{{ asset('img/home/imagen4.jpg') }}">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Portal E-learning</h1>
                </header>
                <p class="text-sm text-center text-gray-500">
                    Si deseas crear tu propia plataforma educativa, contáctanos y nosotros la desarrollamos.
                </p>
            </article>

        </div>
    </section>
    <!--content-->

    <!--banner-->
    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">Aprende mucho más</h1>
        {{-- <p class="text-center text-white">lorem ipsumLorem Ipsum is simply dummy text of the printing and typesetting
            industry.</p> --}}
        <div class="m-6 mx-auto space-y-3 w-72">
            <a href="{{route('courses.index')}}"
               class="block w-full px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-pink-500 rounded shadow ripple hover:shadow-lg hover:bg-pink-600 focus:outline-none">
               Catálogo de Cursos
            </a>
        </div>
    </section>
    <!--banner-->

    <!--Last courses -->
    <section class="mt-24">
        <h1 class="text-center text-3xl text-gray-600">Nuevos Cursos</h1>
        {{-- <p class="text-center text-gray-500 text-sm">Lorem Ipsum is simply dummy text of the printing and
            typesetting industry</p> --}}
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 grid grid-cols-1 sm:grid-col-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach($courses as $course)
            <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
    <!--last courses-->
</x-app-layout>
