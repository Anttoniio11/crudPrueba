<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>

  </head>
<body>
  
    <h1 class="text-center p-3">CRUD PRUEBA</h1>

    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none"></a>
          <div class="col-md-3 text-end">
              <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-primary me-2">Salir</button></a>
          </div>
      </header>
  </div>

    @if (session('Inorrecto'))
        <div class="alert alert-danger">{{session('Inorrecto')}}</div>
    @endif

    @if (session('Correcto'))
        <div class="alert alert-success">{{session('Correcto')}}</div>
    @endif

    <script>
      var res=function(){
        var not=confirm('¿Estas seguro de eliminar?');
        return not;
      }
    </script>

    <!-- Modal de registro datos -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('prueba.create')}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">id</label>
            <input type="text" class="form-control" id="exampleInputEmail1" 
              aria-describedby="emailHelp" name="txtid">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="exampleInputEmail1" 
              aria-describedby="emailHelp" name="txtdescripcion">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="exampleInputEmail1" 
              aria-describedby="emailHelp" name="txtfecha">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Añadir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <div class="p-5" table-responsive>

      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Añadir</button> 
      
        <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white">
              <tr>
                <th scope="col">id</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($datos as $item)
                    
                    <tr>
                        <th>{{$item->id}}</th>
                        <td>{{$item->Descripcion}}</td>
                        <td>{{$item->Fecha}}</td>
                        <td> 
                          <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$item->id}}" class="btn btn-warning btn-sm"> <i class="fa-solid fa-pen-to-square"></i> </a>
                          <a href="{{route('prueba.delete',$item->id)}}" onclick='return res()' class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i> </a>
                        </td>

                        

<!-- Modal de modificar datos -->
<div class="modal fade" id="modalEditar{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('prueba.update')}}" method="post">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">id</label>
            <input type="text" class="form-control" id="exampleInputEmail1" 
              aria-describedby="emailHelp" name="txtid" value="{{$item->id}}" readonly>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="exampleInputEmail1" 
              aria-describedby="emailHelp" name="txtdescripcion" value="{{$item->Descripcion}}">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="exampleInputEmail1" 
              aria-describedby="emailHelp" name="txtfecha" value="{{$item->Fecha}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Modificar</button>
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
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>