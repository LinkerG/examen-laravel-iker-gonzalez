<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include("components.header")
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="POST" style="display: flex; flex-direction: column;">
        @csrf
        <label for="name">
            Nombre
            <input type="text" name="name" id="name" value="{{ $casal->name }}">
        </label>
        <label for="f_ini">
            Fecha inicio
            <input type="date" name="f_ini" id="f_ini" value="{{ $casal->d_inici }}">
        </label>
        <label for="f_fin">
            Fecha final
            <input type="date" name="f_fin" id="f_fin" value="{{ $casal->d_final }}">
        </label>
        <label for="n_plazas">
            Num de plazas
            <input type="number" name="n_plazas" id="n_plazas" value="{{ $casal->n_plazas }}">
        </label>
        <label for="ciudad">
            Ciudad
            <select name="ciudad" id="ciudad">
                @foreach ($cities as $city)
                    @if ($city->id == $casal->city_id)
                        <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                    @else
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endif
                @endforeach
            </select>
        </label>
        <input type="submit" value="Añadir">
        <a href="/user/main"> < Volver</a>
    </form>
    @include("components.footer")
</body>
</html>