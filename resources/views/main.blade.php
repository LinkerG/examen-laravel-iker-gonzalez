<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @include('components.header')
    <div style="display: flex; align-items: center; justify-content: space-around">
        <h2>Gestio de casals</h2>
        <a href="/user/addCasal">Añadir</a>
    </div>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Numero de plazas</th>
            <th>Ciudad</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($casals as $casal)
            <?php
            $nombreCiudad;
            foreach ($cities as $city) {
                if($city->id == $casal->city_id){
                    $nombreCiudad = $city->name; 
                }
            }
            ?>
            <tr>
                <td>{{ $casal->name }}</td>
                <td>{{ $casal->d_inici }}</td>
                <td>{{ $casal->d_final }}</td>
                <td>{{ $casal->n_plazas }}</td>
                <td>{{ $nombreCiudad }}</td>
                <td><a href="/user/editarCasal/{{ $casal->id }}">Editar</a></td>
                <td><a href="/user/eliminarCasal/{{ $casal->id }}">Eliminar</a></td>
            </tr>
        @endforeach
    </table>
    
    @include('components.footer')
</body>
</html>
<style>
    table{
        border-collapse: collapse
    }
    td, th{
        border: 1px solid black
    }
</style>