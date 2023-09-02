@extends('home')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="my-5 text-center">LISTA DE JUEGOS</h2>

            <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#create">
                Nuevo Juego
            </button>

            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">NOMBRE</th>
                            <th class="text-center">PRECIO</th>
                            <th class="text-center">IMAGEN</th>
                            <th class="text-center">CATEGORIA</th>
                            <th class="text-center">PLATAFORMA</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($juegos as $juego)
                            <tr>
                                <td class="text-center">{{ $juego->nombre_juego }}</td>
                                <td class="text-center">{{ $juego->precio }}</td>
                                <td class="w-25">
                                    <div class="d-flex justify-content-center">
                                        <img class="img-fluid w-50"
                                            src="{{ asset('img/juegos/') . '/' . $juego->imagen_juego }}">
                                    </div>
                                </td>

                                <td class="text-center">{{ $juego->id_categoria }}</td>
                                <td class="text-center">{{ $juego->id_plataforma }}</td>
                                <td class="text-center">

                                    <button type="button" class="btn mb-5" data-toggle="modal"
                                        data-target="#edit{{ $juego->id }}">
                                        <i class="fa-regular fa-pen-to-square fa-2xl" style="color: #2c71e8;"></i>
                                    </button>

                                <td class="text-center">

                                    <button type="button" class="btn mb-5" onclick="eliminar(event)" data-toggle="modal"
                                        data-target="#delete{{ $juego->id }}">
                                        <i class="fa-regular fa-trash-can fa-2xl" style="color: #dc3232;"></i>
                                    </button>

                                </td>
                            </tr>
                            @include('juego.edit')
                            @include('juego.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('juego.create')

        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="sweetalert2.min.css">
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function eliminar(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Desea eliminar el juego:  '
                {{ $juego->nombre_juego }},
                text: "El juego se eliminará definitivamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = event.target.href;
                }
            });
        }
    </script>
@endsection
