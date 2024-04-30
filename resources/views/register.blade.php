<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Introduce tu nombre" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Introduce tu apellido" name="surname">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="email" class="form-control" placeholder="Introduce tu email" name="mail">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Introduce tu direccion" name="adress">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="date">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="birthDate">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="gender">Genero</label>
                    <select class="form-select" name="gender" id="gender">
                        <option value="male">Hombre</option>
                        <option value="female">Mujer</option>
                        <option value="">No binarie</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="password" class="form-control" placeholder="Introduce tu contraseña" name="passwd">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="password" class="form-control" placeholder="Introduce tu contraseña de nuevo" name="passwdAgain">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Registrarse">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('login')}}">Ya tienes cuenta? Click aquí</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
