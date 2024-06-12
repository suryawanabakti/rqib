<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HapalanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasSiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Notifications\FeedbackNotification;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Surya\Sso\Authenticated;

Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/send-notification', function () {
    $user = User::where('email', 'super@super')->first();
    $user->notify(new FeedbackNotification(auth()->user()));
    try {
        \App\Events\FeedbackNotification::dispatch($user->id);
    } catch (Exception $e) {
    }
    return redirect('/dashboard')->with('success', 'Gagal memberikan notifikasi');
});

Route::get('/login-sso', function () {
    $user =  Authenticated::authenticate(request('token'), request('sso_token'), request('app_name'));
    Auth::login($user);
    // Kondisi Jika Ada cth:  if role === admin redirect :
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource("/admin/kelas", KelasController::class)->names("admin.kelas");
    Route::resource("/admin/matakuliah", MataKuliahController::class)->names("admin.matakuliah");
    Route::get('/admin/pendaftar', [PendaftarController::class, 'index'])->name('admin.pendaftar.index');

    Route::post('/admin/pendaftar/{pendaftar}/diterima', [PendaftarController::class, 'diterima'])->name('admin.pendaftar.diterima');

    Route::resource('/admin/penilaian/kelassiswa', KelasSiswaController::class)->names('admin.kelassiswa');
    Route::get('/admin/penilaian/cetak/{id}', [PenilaianController::class, 'cetak'])->name('admin.penilaian.cetak');
    Route::resource('/admin/penilaian', PenilaianController::class)->names('admin.penilaian');
    Route::get('/admin/penilaian/hapalan/{user}', [HapalanController::class, 'index'])->name('admin.penilaian.hapalan');

    Route::get('/admin/penilaian/hapalan/{kelasSiswa}', [HapalanController::class, 'index'])->name('admin.penilaian.hapalan.index');
    Route::get('/admin/penilaian/hapalan/{kelasSiswa}/export', [HapalanController::class, 'export'])->name('admin.penilaian.hapalan.export');
    Route::post('/admin/penilaian/hapalan', [HapalanController::class, 'store'])->name('admin.penilaian.hapalan.store');
    Route::delete('/admin/penilaian/hapalan/sabaqsabaqi/{tahfidzSabaqSabaqi}', [HapalanController::class, 'destroySabaqsabaqi'])->name('admin.penilaian.hapalan.destroySabaqsabaqi');
    Route::delete('/admin/penilaian/hapalan/simaan/{tahfidzSimaan}', [HapalanController::class, 'destroySimaan'])->name('admin.penilaian.hapalan.destroySimaan');
    Route::delete('/admin/penilaian/hapalan/ikhtibar/{tahfidzIkhtibar}', [HapalanController::class, 'destroyIkhtibar'])->name('admin.penilaian.hapalan.destroyIkhtibar');
    Route::delete('/admin/penilaian/hapalan/ikhtibar-bulanan/{tahfidzIkhtibarBulanan}', [HapalanController::class, 'destroyIkhtibarBulanan'])->name('admin.penilaian.hapalan.destroyIkhtibarBulanan');
    Route::delete('/admin/penilaian/hapalan/ikhtibar-semester/{tahfidzIkhtibarSemester}', [HapalanController::class, 'destroyIkhtibarSemester'])->name('admin.penilaian.hapalan.destroyIkhtibarSemester');

    Route::resource('users', UserController::class)->names("admin.users");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/get-data', [NotificationController::class, 'getData'])->name('notifications.get-data');
    Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/notifications/reads', [NotificationController::class, 'reads'])->name('notifications.reads');

    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
});

require __DIR__ . '/auth.php';
