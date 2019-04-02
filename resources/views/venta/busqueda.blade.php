@if(count($ventas) > 0)
    <div class="col-sm-12">
        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;"id="tabla_productos">
            <tr class="info">
                <th>ID Venta</th>
                <th>Sucursal</th>
                <th>Fecha de venta</th>
                <th>No de Productos</th>
                <th>Total</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </tr>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->numero_venta }}</td>
                    <td>{{ $venta->sucursal }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <?php 
                        $cant = 0;
                        foreach ($venta->Productos as $producto) {
                            $cant += $producto->pivot->cantidad;
                        }
                        echo '<td align="center">'.$cant.'</td>';
                    ?>
                    <td>{{ $venta->total }}</td>
                    <td>{{ $venta->saldo }}</td>
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm" href="{{ route('pago.show', ['venta' => $venta, 'id' => $venta->id]) }}">
                            <i class="fa fa-eye"></i> Ver
                        </a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">Total de ventas</td>
                <td id="total" style="font-weight: bold;"></td>
                <td colspan="2"></td>
            </tr>
        </table>
    </div>
@else
    <div class="col-sm-12">
        <h4>No hay Ventas disponibles.</h4>
    </div>
@endif
<script type="text/javascript">
    
    $(document).ready(function() {
        var tabla = $('#tabla_productos tr');
        var total_ventas = 0;
        for (var i = 1; i < tabla.length- 1; i++) {
            total_ventas += parseInt(tabla[i].cells[4].innerHTML);
        }
        $('#total').text(total_ventas);
    });
</script>