@extends('../layouts.app')
@section('titulo')
    Usuarios
@endsection
@section('contenido')
    <div class="md:flex justify-center ">
        <table class="border rounded-sm shadow-2xl">
            <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">Cedula</th>
                    <th scope="col" class="px-6 py-4">Nombre</th>
                    <th scope="col" class="px-6 py-4">telefono</th>
                    <th scope="col" class="px-6 py-4">email</th>
                    <th scope="col" class="px-6 py-4" colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                    <tr class="bg-gray-100 border-b">
                        <td class="px-6 py-4">{{ $item->cedula }}</td>
                        <td class="px-6 py-4">{{ $item->name }}</td>
                        <td class="px-6 py-4">{{ $item->telefono }}</td>
                        <td class="px-6 py-4">{{ $item->correo }}</td>
                        <td class="flex px-6 py-4">
                            <a href="/actualizar-User/{{ $item->id }}" class="btn p-2 bg-sky-600 rounded-2xl mx-2"><img
                                    class="w-4" src="{{ asset('img/editar.svg') }}" alt="" srcset=""></a>
                                    <form id="formEliminar" action="{{ route('eliminar-User', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full btn p-2 bg-red-600 rounded-2xl">
                                            <img class="w-4" src="{{ asset('img/basura.svg') }}">
                                        </button>
                                    </form>


                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
{{-- @section('scripts')
    <script>
        $('#formEliminar').on('submit', funtion(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endsection --}}
