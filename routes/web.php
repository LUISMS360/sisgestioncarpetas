<?php

use App\Http\Controllers\Pdfs\PdfActaController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Frontend\Admin\Carpetas\Acciones\CrearCarpeta;
use App\Livewire\Frontend\Admin\Carpetas\Acciones\EditarCarpeta;
use App\Livewire\Frontend\Admin\Carpetas\Pendientes as CarpetasPendientes;
use App\Livewire\Frontend\Admin\Carpetas\Gestionadas as CarpetasGestionadas;
use App\Livewire\Frontend\Admin\Dashboard as DashboardAdmin;
use App\Livewire\Frontend\Admin\Futs\Pendientes as FutsPendientesAdmin;
use App\Livewire\Frontend\Estudiantes\Dashboard as DashboardEstudiantes;
use App\Livewire\Frontend\Estudiantes\Tramites\Futs\Crear as CrearFut;
use App\Livewire\Frontend\Estudiantes\Tramites\Futs\Pendientes as FutsPendientes;
use App\Livewire\Frontend\Estudiantes\Tramites\Futs\Revisados as FutsRevisados;
use App\Livewire\Frontend\Profesores\Dashboard as DashboardProfesores;
use App\Livewire\Frontend\Estudiantes\Tramites\Carpetas\Gestionadas as CarpetasGestionadasEstudiante;
use App\Livewire\Frontend\Estudiantes\Tramites\Carpetas\Pendientes as CarpetasPendientesEstudiante;
use App\Livewire\Frontend\Profesores\Carpetas\Supervisadas as CarpetasSupervisadasProf;
use App\Livewire\Frontend\Profesores\Carpetas\Pendientes as CarpetasPendientesProf;
use App\Livewire\Frontend\Profesores\Carpetas\Acciones\Editar as EditarCarpetaProf;
use App\Livewire\Frontend\Admin\Notificaciones\Notificaciones as NotificacionesAdmin;
use App\Livewire\Frontend\Estudiantes\Notificaciones\Notificaciones as NotificacionesEstudiante;
use App\Livewire\Frontend\Profesores\Notificaciones\Notificaciones as NotificacionesProfesor;
use App\Livewire\Frontend\Admin\Profesores\Crear as CrearProfesor;
use App\Livewire\Frontend\Admin\Profesores\Profesores as Profesores;
use App\Http\Controllers\SesionController;

use Illuminate\Support\Facades\Route;


Route::get('/', [SesionController::class,'index'])->name('home');

Route::middleware('auth')->group(function () {

    //Ruta para administradores
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', DashboardAdmin::class)->name('admin.dashboard')->middleware('is_admin');
        Route::get('/acciones/crear-carpeta', CrearCarpeta::class)->name('admin.crear-carpeta')->middleware('is_admin');
        Route::get('/carpetas/pendientes', CarpetasPendientes::class)->name('admin.carpetas.pendientes')->middleware('is_admin');
        Route::get('/futs/pendientes', FutsPendientesAdmin::class)->name('admin.futs.pendientes')->middleware('is_admin');
        Route::get('/acciones/editar/carpeta/{id}',EditarCarpeta::class)->name('admin.editar-carpeta')->middleware('is_admin');
        Route::get('/carpetas/gestionadas',CarpetasGestionadas::class)->name('admin.carpetas-gestionadas')->middleware('is_admin');
        Route::get('/notificaciones',NotificacionesAdmin::class)->name('admin.notificaciones')->middleware('is_admin');
        Route::get('/profesores/crear-profesor',CrearProfesor::class)->name('admin.profesores.crear')->middleware('is_admin');
        Route::get('/profesores',Profesores::class)->name('admin.profesores')->middleware('is_admin');
        Route::get('/carpetas/gestionadas/generar-pdf/{id}',[PdfActaController::class,'generarPdf'])->name('generar.acta.pdf')->middleware('is_admin');
        Route::get('/carpetas/gestionadas/descargar-pdf/{id}',[PdfActaController::class,'descargarPdf'])->name('descargar.acta.pdf')->middleware('is_admin');
    });
    //Rutas para Estudiantes
    Route::prefix('estudiantes')->group(function () {
        Route::get('/dashboard', DashboardEstudiantes::class)->name('estudiante.dashboard')->middleware('is_estudiante');
        Route::get('/tramites/futs/crear-fut', CrearFut::class)->name('estudiante.crear-fut')->middleware('is_estudiante');
        Route::get('/tramites/futs/ver-futs-pendientes', FutsPendientes::class)->name('estudiante.futs-pendientes')->middleware('is_estudiante');
        Route::get('/tramites/futs/ver-futs-gestionados', FutsRevisados::class)->name('estudiante.futs-revisados')->middleware('is_estudiante');;
        Route::get('/tramites/carpetas/ver-carpetas-gestionadas', CarpetasGestionadasEstudiante::class)->name('estudiante.carpetas-gestionadas')->middleware('is_estudiante');
        Route::get('/tramites/carpetas/ver-carpetas-pendientes', CarpetasPendientesEstudiante::class)->name('estudiante.carpetas-pendientes')->middleware('is_estudiante');
        Route::get('/notificaciones',NotificacionesEstudiante::class)->name('estudiante.notificaciones')->middleware('is_estudiante');
    });

    //Rutas para Profesores
    Route::prefix('profesores')->group(function () {
        Route::get('/dashboard', DashboardProfesores::class)->name('profesor.dashboard')->middleware('is_profesor');
        Route::get('/carpetas/supervisadas',CarpetasSupervisadasProf::class)->name('profesor.carpetas.supervisadas')->middleware('is_profesor');
        Route::get('/carpetas/pendientes',CarpetasPendientesProf::class)->name('profesor.carpetas.pendientes')->middleware('is_profesor');
        Route::get('/carpetas/acciones/editar/carpeta/{id}',EditarCarpetaProf::class)->name('profesor.carpeta.editar')->middleware('is_profesor');
        Route::get('/notifiaciones',NotificacionesProfesor::class)->name('profesor.notificaciones')->middleware('is_profesor');
    });
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
