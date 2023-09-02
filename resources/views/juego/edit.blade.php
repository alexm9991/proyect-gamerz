<div class="modal fade" id="edit{{ $juego->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR VIDEOJUEGO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.update', $juego->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">NOMBRE DEL JUEGO</label>
                        <input type="text" class="form-control" name="nombre_juego" aria-describedby="helpId"
                            value="{{ $juego->nombre_juego }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">PRECIO</label>
                        <input type="number" class="form-control" name="precio" aria-describedby="helpId"
                            value="{{ $juego->precio }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">IMAGEN DEL JUEGO</label>

                        <div class="d-flex justify-content-center">
                            <img class="img-fluid w-50 mb-3" src="{{ asset('img/juegos/' . $juego->imagen_juego) }}">
                        </div>

                        <input id="{{ $juego->id }}" type="file" name="imagen_juego" accept="image/*"
                            multiple="false" value="{{ $juego->imagen_juego }}" required>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">CATEGORIA</label>

                        <select type="form-select" name="id_categoria" maxlength="255" class="form-control" required>

                            <option>{{ $juego->id_categoria }}</option>

                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}">{{ $categoria->id_categoria }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">PLATAFORMA</label>

                        <select type="form-select" name="id_plataforma" maxlength="255" class="form-control" required>
                            <option >{{ $juego->id_plataforma }}</option>

                            @foreach ($plataformas as $plataforma)
                                <option value="{{ $plataforma->id_plataforma }}">{{ $plataforma->id_plataforma }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
