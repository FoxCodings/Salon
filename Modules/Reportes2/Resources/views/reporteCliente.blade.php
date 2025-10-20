<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table style="text-transform: uppercase;">
    <thead>
        <tr>
          <th>Servicio</th>
          <th>Empleado</th>
          <th>Costo</th>
          <th>Fecha</th>


        </tr>
    </thead>
    <tbody>
      @foreach($alumno_cursos as $cosas)
      <tr>
        <td>{{$cosas->servicio }}</td>
        <td>{{$cosas->empleado }}</td>
        <td>{{$cosas->costo_servicio }}</td>
        <td>{{$cosas->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td>Total</td>
        <td>${{$total }}</td>
        <td></td>

      </tr>
    </tfoot>
</table>
