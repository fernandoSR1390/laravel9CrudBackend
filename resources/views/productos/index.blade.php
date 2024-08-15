
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CRUD Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Lista de Productos</h1>
                        <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
                    </div>
                    <hr />

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-3">
                            {{ $message }}
                        </div>
                    @endif
                    <hr />

                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>
                                        <a href="{{ route('productos.show', $producto->id) }}" type="button" class="btn btn-info">Ver</a>
                                        <a href="{{ route('productos.edit', $producto->id) }}" type="button" class="btn btn-secondary">Editar</a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

