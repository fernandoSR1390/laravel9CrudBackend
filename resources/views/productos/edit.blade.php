<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CRUD Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="form-container">
                        <h1>Editar Producto</h1>
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="number" name="precio" class="form-control" step="0.01" value="{{ $producto->precio }}" required>
                                @error('precio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" value="{{ $producto->cantidad }}" required>
                                @error('cantidad')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen del Producto</label>
                                <input type="file" name="imagen" class="form-control-file" id="imagen">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto" class="img-thumbnail mt-2" width="150">
                                @endif
                            </div>
                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
