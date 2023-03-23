@extends('plantilla')

@section('contenido')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de clientes</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearCliente">
                    Crear Nuevo Cliente
                </button>
                
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dtUsers">
                       <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Documento</th>
                                <th>Fecha Nacimiento</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th></th>
                            </tr>
                       </thead> 
                        <tbody>
                             @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->documento}}</td>
                                <td>{{$cliente->fechaNac}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <<td>
                                    <a href="{{url('Editar-Cliente/'.$cliente->id)}}">
                                        <button class="btn btn-success"><i 
                                        class="fas fa-pencil-alt"></i></button>    
                                    </a>
                                    <button class="btn btn-danger EliminarCliente" Cid="{{$cliente->id}}" 
                                    Cliente="{{$cliente->nombre}}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                       
                </table>            
            </div>
        </div>
    </section>
</div>

<!-- Crear cliente -->
<div class="modal fade" id="CrearCliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                @csrf
                <div class="modal-body">
                    <div class="box_body">
                        <div class="form-group">
                            <h2>Nombre:</h2>
                            <input type="text" class="form-control input-lg" 
                            name="nombre" required="">
                        </div>

                        <div class="form-group">
                            <h2>Documento:</h2>
                            <input type="text" class="form-control input-lg" 
                            name="documento" required="">
                        </div>
                        <div class="form-group">
                            <h2>Fecha Nacimiento:</h2>
                            <input type="date" class="form-control input-lg" 
                            name="fechaNac" required=" ">
                        </div>
                        <div class="form-group">
                            <h2>Dirección:</h2>
                            <input type="text" class="form-control input-lg" 
                            name="direccion" required="">
                        </div>
                        <div class="form-group">
                            <h2>Teléfono:</h2>
                            <input type="text" class="form-control input-lg" 
                            data-inputmask="'mask': '+(999) 999-9999'" data-mask
                            name="telefono" required="">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <button type="button" class="btn btn-danger">Cerrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Editar Cliente -->
    <?php
        $exp = explode("/", $_SERVER["REQUEST_URI"]);
    ?>
    @if($exp[3] == "Editar-Cliente")
    <div class="modal fade" id="EditarCliente">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ url('actualizar-Cliente/' .$cli->id) }}">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="box_body">
                            <div class="form-group">
                                <h2>Nombre:</h2>
                                <input type="text" class="form-control input-lg" 
                                name="nombre" required="" value="{{$cli->nombre}}">
                            </div>

                            <div class="form-group">
                                <h2>Documento:</h2>
                                <input type="text" class="form-control input-lg" 
                                name="documento" required=""  value="{{$cli->documento}}">
                            </div>
                            <div class="form-group">
                                <h2>Fecha Nacimiento:</h2>
                                <input type="date" class="form-control input-lg" 
                                name="fechaNac" required=" "  value="{{$cli->fechaNac}}">
                            </div>
                            <div class="form-group">
                                <h2>Dirección:</h2>
                                <input type="text" class="form-control input-lg" 
                                name="direccion" required=""  value="{{$cli->direccion}}">
                            </div>
                            <div class="form-group">
                                <h2>Teléfono:</h2>
                                <input type="text" class="form-control input-lg" 
                                data-inputmask="'mask': '+(999) 999-9999'" data-mask
                                name="telefono" required=""  value="{{$cli->telefono}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection