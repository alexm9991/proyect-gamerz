<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">AGREGAR VIDEOJUEGO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">NOMBRE DEL JUEGO</label>
                        <input type="text" class="form-control" name="nombre_juego" id=""
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PRECIO</label>
                        <input type="number" class="form-control" name="precio" id=""
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">IMAGEN DEL JUEGO</label>
                        <input type="file" name="imagen_juego" accept="image/*" multiple="false" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CATEGORIA</label>

                        <select type="form-select" name="id_categoria" maxlength="255" class="form-control"
                            placeholder="Titulo" value="" required>
                            <option selected>Seleccione una Opcion</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id_categoria }}">{{ $categoria->id_categoria }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">PLATAFORMA</label>

                        <select type="form-select" name="id_plataforma" maxlength="255" class="form-control"
                            placeholder="Titulo" value="" required>
                            <option selected>Seleccione una Opcion</option>
                            @foreach ($plataformas as $plataforma)
                                <option value="{{ $plataforma->id_plataforma }}">{{ $plataforma->id_plataforma }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
