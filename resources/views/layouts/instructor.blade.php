<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Jonathan Vargas - vojohn95@gmail.com">
    <title>{{ config('app.name', 'TallCademy') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/node-waves@0.7.6/dist/waves.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>



<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Content -->
        <div class="container py-8">
            <div class="container grid grid-cols-5 gap-6 py-8 mb-4">
                <aside>
                    <h1>Edición del curso</h1>
                    <ul>
                        <li class="pl-2 mb-1 leading-7 border-l-4 border-indigo-400"><a
                                href="{{ route('instructor.courses.edit', $course) }}">Información del curso</a>
                        </li>
                        <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent"><a
                                href="{{ route('instructor.courses.curriculum', $course) }}">Lecciones curso</a></li>
                        <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent"><a
                                href="{{ route('instructor.courses.goals', $course) }}">Meta
                                del curso</a></li>
                        <li class="pl-2 mb-1 leading-7 border-l-4 border-transparent"><a
                                href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a></li>
                    </ul>

                    {{-- @switch($course->status)
                        @case(1)
                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit">Solicitar revisión</button>
                            </form>

                            @break
                        @case(2)

                            <div class="text-gray-500 card">
                                <div class="card-body">
                                    Este curso se encuentra en revisión
                                </div>
                            </div>
                            @break


                        @case(3)
                            <div class="text-gray-500 card">
                                <div class="card-body">
                                    Este curso se encuentra publicado
                                </div>
                            </div>
                            @break
                        @default

                    @endswitch --}}



                </aside>

                <main class="col-span-4 card">
                    <div class="text-gray-600 card-body">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@11"])
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    @isset($js)
        {{ $js }}
    @endisset

</body>

@include('layouts.footer')

</html>
