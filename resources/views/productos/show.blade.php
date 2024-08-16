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
                    <div class="card">
                        <div class="card-header">
                            Detalles del Producto:
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto" class="img-fluid mb-3" width="200">
                            @endif
                            <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                            <p class="card-text"><strong>Precio:</strong> Bs. {{ $producto->precio }}</p>
                            <p class="card-text"><strong>Cantidad:</strong> {{ $producto->cantidad }}</p>

                            <!-- Mostrar la categoría del producto -->
                            <p class="card-text"><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>

                            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
