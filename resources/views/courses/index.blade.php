<x-app-layout>

    <section class="bg-cover" style="background-image: url({{asset('img/cursos/cursos.jpeg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 ">
            <div class="w-full md:w-3/4 lg:w-1/2 mt-15">
                <h1 class="text-white font-fold text-4xl">Los mejores cursos</h1>
                <p class="text-white text-lg mt-2">Que te ayudarán a potenciar tus conocimientos</p>
                <!-- component -->
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('course-index')

</x-app-layout>
