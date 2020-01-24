<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Comprobante de pago {{$venta->factura or ''}}</title>
    
    <style>
    	.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  /*width: 21cm;  */
  /*height: 29.7cm; */
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url('/images/factura/dimension.png');
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  
  /*float: left;*/
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 99%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="images/2.jpg">
      </div>
      <h1>Comprobante de pago N: {{$venta->factura or ''}}</h1>
      <div id="company" class="clearfix">
        <div>THE SPARTANS GYM</div>
        <div>José Mejía y 11 de Noviembre Cuarto piso del edificio María José<br /> MACHACHI</div>
        <div>Tel: 0991143427</div>
        <div><a href="">gymspartamachachi@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>RUC</span>{{$venta->cliente->identificacion}}</div>
        <div><span>CLIENTE</span> {{$venta->cliente->nombre }} {{$venta->cliente->apellido }}</div>
        <div><span>DIRECCIÓN</span> {{$venta->cliente->direccion ?? 'MACHACHI'}}</div>
        <div><span>TÉLEFONO</span> {{$venta->cliente->telefono }} </div>
        <div><span>FECHA</span> {{$venta->created_at}}</div>
        
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">#</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th>CANTIDAD</th>
            <th>PRECIO ÚNITARIO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        	@php($contador=0)
        	@foreach($venta->items as $item)
        	@php($contador++)
	          <tr>
	            <td class="service">{{$contador}}</td>
	            <td class="desc">
                @if($item->producto)
	            	  {{$item->producto->nombre}}
                @endif

                @if($item->pago)
                  Mes: {{$item->pago->fecha}}
                @endif
	            </td>
	            
	            <td class="qty">{{$item->cantidad}}</td>
	            <td class="unit">{{$item->precio}}</td>
	            <td class="total">{{$item->precio*$item->cantidad}}</td>
	          </tr>
          	@endforeach


        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" class="grand total">
              
              TOTAL:

            </td>
            <td class="grand total">
              {{ $venta->total }} <br>
             
              <br>
            </td>
          </tr>
        </tfoot>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">
        	@if($venta->estado)
        		Comprobante de pago entregada
        	@else
          Comprobante de pago anulada
        	@endif
        </div>
      </div>
    </main>

    <footer>
      {{ url('/') }}
    </footer>
  </body>
</html>