<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso:') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-2 mb-2' . ($errors->has('title') ? ' border-red-600' : '')]) !!}
    @error('title')
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror

    {!! Form::label('slug', 'Slug del curso:') !!}
    {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-2 mb-2' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}
    @error('slug')
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror
    {!! Form::label('subtitle', 'Subtitulo del curso:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-2 mb-2' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}
    @error('subtitle')
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror
    {!! Form::label('description', 'Descripción del curso:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-2 mb-2' . ($errors->has('description') ? ' border-red-600' : '')]) !!}
    @error('description')
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror

    <div class="grid grid-cols-3 gap-4 mt-2">
        <div>
            {!! Form::label('category_id', 'Categoria') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-input  block w-full mt-2 mb-2']) !!}
        </div>
        <div>
            {!! Form::label('level_id', 'Niveles') !!}
            {!! Form::select('level_id', $levels, null, ['class' => 'form-input  block w-full mt-2 mb-2']) !!}
        </div>
        <div>
            {!! Form::label('price_id', 'Precio') !!}
            {!! Form::select('price_id', $prices, null, ['class' => 'form-input  block w-full mt-2 mb-2']) !!}
        </div>
    </div>

    <h1 class="mt-8 mb-2 text-2xl font-bold">Imagen del curso</h1>
    <div class="grid grid-cols-2 gap-4">
        <figure>
            @isset($course->image->url)
                <img class="object-cover object-center w-full h-64" src="{{ Storage::url($course->image->url) }}"
                    id="picture" alt="">
            @else
                <img class="object-cover object-center w-full h-64"
                    src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80"
                    id="picture" alt="">
            @endisset
        </figure>
        <div>
            @isset($course)
                <p class="mb-4">{{ $course->description }}</p>
            @endisset
            {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
            @error('file')
                <p class="text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>

</div>
