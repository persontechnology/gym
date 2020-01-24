<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use gym\Categoria;


Route::get('/', function () {
    return view('welcome',['cat'=>Categoria::all()]);
    // Artisan::call('cache:clear');
    // Artisan::call('config:clear');
    // Artisan::call('config:cache');
	// Artisan::call('storage:link');
	// Artisan::call('key:generate');
	// Artisan::call('migrate:fresh --seed');
});

Route::get('/productos-categoria-informacion/{id}', function ($id) {
    return view('categorias.productos',['cat'=>Categoria::find($id)]);
})->name('infoCategoriaProductos');


Route::get('/catalogo-productos','Consultas@catalogoProducto')->name('CatalogoProducto');
Route::get('/catalogo-Maquina','Consultas@CatalogoMaquina')->name('CatalogoMaquina');


Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');



Auth::routes(['verify' => true]);

Route::middleware(['verified', 'auth'])->group(function () {

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clientes-index', 'Clientes@index')->name('clientes');
Route::get('/clientes-nuevo', 'Clientes@nuevo')->name('nuevoCliente');
Route::post('/clientes-guardar', 'Clientes@guardar')->name('registrarCliente');
Route::get('/clientes-editar/{id}', 'Clientes@editar')->name('editarCliente');
Route::post('/clientes-actualizar', 'Clientes@actualizar')->name('actualizarCliente');
Route::get('/clientes-eliminar/{id}', 'Clientes@eliminar')->name('eliminarCliente');



// maquinAS

Route::get('/maquinas-index', 'Maquinas@index')->name('maquinas');
Route::get('/maquinas-nuevo', 'Maquinas@nuevo')->name('nuevoMaquina');
Route::post('/maquinas-guardar', 'Maquinas@guardar')->name('registrarMaquina');
Route::get('/maquinas-editar/{id}', 'Maquinas@editar')->name('editarMaquina');
Route::post('/maquinas-actualizar', 'Maquinas@actualizar')->name('actualizarMaquina');
Route::get('/maquinas-eliminar/{id}', 'Maquinas@eliminar')->name('eliminarMaquina');


// productos



Route::get('/productos-index', 'Productos@index')->name('productos');
Route::get('/productos-nuevo', 'Productos@nuevo')->name('nuevoProducto');
Route::post('/productos-guardar', 'Productos@guardar')->name('registrarProducto');
Route::get('/productos-editar/{id}', 'Productos@editar')->name('editarProducto');
Route::post('/productos-actualizar', 'Productos@actualizar')->name('actualizarProducto');
Route::get('/productos-eliminar/{id}', 'Productos@eliminar')->name('eliminarProducto');

// factura
Route::get('/factura-index', 'Facturas@index')->name('facturas');
Route::get('/facturas-nuevo', 'Facturas@nuevo')->name('nuevoFactura');
Route::post('/facturas-finalizar', 'Facturas@finalizar')->name('finalizarFactura');
Route::get('/facturas-imprimir/{id}', 'Facturas@imprimir')->name('imprimirFacturaVenta');
Route::get('/facturas-eliminar/{id}', 'Facturas@eliminar')->name('eliminarFactura');

Route::get('/facturas-obtener-pagos', 'Facturas@obtenerPagos')->name('obtenerPagos');


// inventario productos
Route::get('/inventario/{id}', 'Inventarios@index')->name('inventario');
Route::post('/inventarios-crear-de-producto', 'Inventarios@crear')->name('crearInventarioProducto');
Route::get('/inventarios-crear-de-producto-eliminar/{id}', 'Inventarios@eliminar')->name('eliminarInventario');

// invenatruo maquinas

Route::get('/inventario-maquina/{id}', 'Inventarios@indexMaquina')->name('inventarioMaquinas');
Route::post('/inventarios-crear-de-maquinas', 'Inventarios@crearMaquinas')->name('crearInventarioMaquinas');
Route::get('/inventarios-crear-de-maquina-eliminar/{id}', 'Inventarios@eliminarMaquinas')->name('eliminarInventarioMaquinas');



// asistencias
Route::get('/asistencias', 'Asistencias@index')->name('asistencias');
Route::get('/asistencias-nuevo', 'Asistencias@nuevo')->name('asistenciasNuevo');
Route::get('/asistencias-cambiar', 'Asistencias@cambiar')->name('cambiarAsis');
Route::get('/asistencias-eliminar/{id}', 'Asistencias@eliminar')->name('eliminarAsistencia');
Route::get('/asistencias-listado/{id}', 'Asistencias@listado')->name('listadoAsistencia');


// pagos
Route::get('/pagos-index/{id}', 'Pagos@index')->name('pagos');
Route::post('/pagos-crear', 'Pagos@crear')->name('registrarPago');
Route::get('/pagos-eliminar/{id}', 'Pagos@eliminar')->name('eliminarPago');
Route::get('/pagos-imprimir/{id}', 'Pagos@imprimir')->name('imprimirPago');



// consultas de cliente


Route::get('/igresar-a-mi-asistecia/', 'Consultas@miAsistencia')->name('miasistenciaConsulta');
Route::post('/mi-asistecia-generar', 'Consultas@generarAsisetncia')->name('generarMiAsistencia');
Route::get('/mi-asistencia-lista/{id}', 'Consultas@miasistenciaLista')->name('miasistenciaLista');




Route::get('/salir-de-mi-asistecia', function() {
    Session::forget('cedulaok');
    return redirect()->route('miasistenciaConsulta');
});


// consultas de mi pagos
Route::get('/igresar-a-mi-pagos', 'Consultas@miPagos')->name('mipagosConsulta');
Route::post('/mi-pagos-generar', 'Consultas@generarMiPagos')->name('generarMiPagos');
Route::get('/mi-pagos-lista/{id}', 'Consultas@mipagosLista')->name('mipagosLista');


Route::get('/salir-de-mi-asistecia', function() {
    Session::forget('cedulaok');
    return redirect()->route('mipagosConsulta');
})->name('salirPagos');


// consultas mi dietas
Route::get('/igresar-a-mi-dietas', 'Consultas@miDietas')->name('midietaConsulta');
Route::post('/mi-dietas-generar', 'Consultas@generarMiDietas')->name('generarMiDietas');

Route::get('/mi-dietas-generar-datos/{id}', 'Consultas@miDietaGenerarLista')->name('miDietaGenerarLista');

Route::get('/dietas-cliente-historial/{idCliente}/{idDieta}', 'Consultas@generarDietaCliente')->name('generarDietaCliente');


// dietas


Route::get('/dietas-index', 'Dietas@index')->name('dietas');
Route::get('/dietas-nuevo', 'Dietas@nuevo')->name('nuevoDieta');
Route::post('/dietas-guardar', 'Dietas@guardar')->name('guardarDieta');
Route::get('/dietas-editar/{id}', 'Dietas@editar')->name('dietasEditar');
Route::post('/dietas-actualizar', 'Dietas@actualizar')->name('actualizarDieta');
Route::get('/dietas-eliminar/{id}', 'Dietas@eliminar')->name('dietasEliminar');
Route::get('/dietas-historial/{id}', 'Dietas@historial')->name('historialDieta');
Route::get('/dietas-eliminar-historial/{id}', 'Dietas@dietasEliminarHistorial')->name('dietasEliminarHistorial');
Route::get('/dietas-cliente-historial/{id}', 'Dietas@dietasClienteHistorial')->name('dietasClienteHistorial');



// categorias
Route::get('/categorias-index', 'Categorias@index')->name('categorias');
Route::get('/categorias-nuevo', 'Categorias@nuevo')->name('categoriasNuevo');
Route::post('/categorias-guardar', 'Categorias@guardar')->name('registrarCategoria');
Route::get('/categorias-editar/{id}', 'Categorias@editar')->name('editarCategoria');
Route::post('/categorias-actualizar', 'Categorias@actualizar')->name('actualizarCategoria');
Route::get('/categorias-eliminar/{id}', 'Categorias@eliminar')->name('eliminarCategoria');


// rutinas
Route::get('/rutinas', 'Rutinas@index')->name('rutinas');
Route::get('/rutinas-nuevo', 'Rutinas@nuevo')->name('nuevoRutina');
Route::post('/rutinas-guardar', 'Rutinas@guardar')->name('guardarRutina');
Route::get('/rutinas-editar/{id}', 'Rutinas@editar')->name('rutinaEditar');
Route::post('/rutinas-actualizar', 'Rutinas@actualizar')->name('actualizarRutina');
Route::get('/rutinas-eliminar/{id}', 'Rutinas@eliminar')->name('eliminarRutina');



// Reservas
Route::get('/reservas/{rutina}', 'Reservas@index')->name('reservas');
Route::get('/reservas-eliminar/{id}', 'Reservas@eliminar')->name('eliminarReserva');


});


// app movil


Route::namespace('Movil')->group(function () {
    //Ingresar desde el telefono
    Route::get('/login-app/{emnail}/{password}', 'Login@ingresar')->name('ingresarApp');  


    // consultas de  aistencia por id de usuario
    Route::get('/app-mis-asistenicas/{user}', 'Consultas@misAsistencias')->name('misAsistencias');  
    Route::get('/app-mis-dietas/{user}', 'Consultas@misDietas')->name('misDietas');  
    Route::get('/app-mis-pagos/{user}', 'Consultas@misPagos')->name('misPagos');  
    Route::get('/app-mis-rutinas/{user}', 'Consultas@misRutinas')->name('misRutinas');  
    Route::get('/app-mis-rutinas-disponibles/{user}', 'Consultas@rutinasDisponibles')->name('rutinasDisponibles');  
    Route::get('/app-mis-rutinas-reservar/{rutina}/{user}', 'Consultas@reservarRutina')->name('reservarRutina');  
    Route::get('/app-mis-catalogo', 'Consultas@catalogo')->name('catalogo');  
    
    
});



