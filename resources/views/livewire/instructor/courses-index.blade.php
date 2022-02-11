<div class="flex flex-col items-center py-8">
    <div class="container">
        <x-table-responsive>

            <div class="flex px-6 py-4">
                <input wire:keydown="limpiar_page" wire:model="search" type="text" class="w-full shadow-sm form-input"
                    id="search" placeholder="Buscar ...">
                <a href="{{ route('instructor.courses.create') }}" class="ml-4 btn btn-primary">Nuevo</a>
            </div>
            @if ($courses->count())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Matriculados
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Calificación
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Estatus
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            @isset($course->image)
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ Storage::url($course->image->url) }}"
                                                    alt="{{ $course->title }}">
                                            @else
                                                <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80"
                                                    alt="Curso" class="w-full h-full rounded-full">
                                            @endisset
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $course->title }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $course->category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                                    <div class="text-sm text-gray-500">Alumnos matriculados</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center text-sm text-gray-900">
                                        ({{ $course->rating }})
                                        <ul class="flex ml-2 text-sm">
                                            <li class="mr-1">
                                                <i
                                                    class="fas fa-star text-{{ $course->rating >= 1 ? 'yellow-400' : 'gray' }} "></i>
                                            </li>
                                            <li class="mr-1">
                                                <i
                                                    class="fas fa-star text-{{ $course->rating >= 2 ? 'yellow-400' : 'gray' }} "></i>
                                            </li>
                                            <li class="mr-1">
                                                <i
                                                    class="fas fa-star text-{{ $course->rating >= 3 ? 'yellow-400' : 'gray' }} "></i>
                                            </li>
                                            <li class="mr-1">
                                                <i
                                                    class="fas fa-star text-{{ $course->rating >= 4 ? 'yellow-400' : 'gray' }} "></i>
                                            </li>
                                            <li class="mr-1">
                                                <i
                                                    class="fas fa-star text-{{ $course->rating >= 5 ? 'yellow-400' : 'gray' }} "></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-sm text-gray-500">Valoración del curso</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($course->status)
                                        @case(1)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                                Borrador
                                            </span>
                                        @break
                                        @case(2)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                                Revisión
                                            </span>
                                        @break
                                        @case(3)
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Publicado
                                            </span>
                                        @break

                                        @default

                                    @endswitch
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{ route('instructor.courses.edit', $course) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-4">
                    {{ $courses->links() }}
                </div>
            @else
                <div class="card-body">
                    <p>No hay usuarios registrados con estos parametros ...</p>
                </div>
            @endif

        </x-table-responsive>
    </div>
</div>
