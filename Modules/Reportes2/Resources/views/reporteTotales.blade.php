<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table style="text-transform: uppercase;">
  <tfoot>
  <tr>
    <td>Fecha</td>
    <td>{{ $fecha_1 }}</td>
    <td>{{ $fecha_2 }}</td>
  </tr>


</tfoot>
    <thead>
        <tr>
          <th>Servicio</th>
          <th>Cliente</th>
          <th>Empleado</th>
          <th>Costo</th>
          <th>Comision</th>
          <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
      @foreach($alumno_cursos as $cosas)
      <tr>
        <td>{{$cosas->servicio }}</td>
        <td>{{$cosas->cliente }}</td>
        <td>{{$cosas->empleado }}</td>
        <td>{{$cosas->costo_servicio }}</td>
        <td>{{$cosas->comision }}</td>
        <td>{{$cosas->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td>Totales</td>
        <td>${{$total }}</td>
        <td>${{$total_comision}}</td>

      </tr>
    </tfoot>
</table>
