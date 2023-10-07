<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BASICO CON LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/df2e302838.js" crossorigin="anonymous"></script>
</head>

<body>

    <H1 class="text-center p-3">HOLA, ROHDE , LO LOGRASTES</H1>

    @if(session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}></div>
    @endif

    @if(session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}></div>
    @endif

    <script>
        let res = function name(params) {
            let not = confirm("¿estas seguro de eliminar el producto?");
            return not;
        }
    </script>
    <!-- Modal de Registro de datos -->
    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir producto
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crudnuevo.create")}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Codigo del
                                producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="txtcodigo">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre del
                                producto</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="txtnombre">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtprecio">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="txtcantidad">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="p-5 table-responsive">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir producto</button>
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">PRECIO</th>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">ESTATUS</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($datos as $item)
                <tr>
                    <!-- <th scope="row">{{$item->id_producto}}</th> -->
                    <td>{{$item->id_producto}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>${{$item->precio}}</td>
                    <td>{{$item->cantidad}}</td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id_producto}}"
                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{route("crudnuevo.delete", $item->id_producto)}}" onclick="return res()" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>


                    <!-- Modal de modificar datos -->
                    <div class="modal fade" id="modalEditar{{$item->id_producto}}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Datos del producto
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route("crudnuevo.update")}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Codigo del
                                                producto</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtcodigo"
                                                value="{{$item->id_producto}}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nombre del
                                                producto</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtprecio" value="{{$item->precio}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="txtcantidad"
                                                value="{{$item->cantidad}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Mofificar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>