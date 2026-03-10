<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Units
Route::get('/units', [UnitController::class, 'index'])->name('units.index');
Route::get('/units/{slug}', [UnitController::class, 'show'])->name('units.show');

// Articles
Route::get('/lifestyle', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/lifestyle/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Facilities
Route::get('/facilities', function () {
    return view('facilities.index');
})->name('facilities.index');

// Static Pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Diagnostic: check actual PHP upload limits (remove after debugging)
Route::get('/debug/upload-limits', function () {
    return response()->json([
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size'       => ini_get('post_max_size'),
        'memory_limit'        => ini_get('memory_limit'),
        'max_execution_time'  => ini_get('max_execution_time'),
        'max_input_time'      => ini_get('max_input_time'),
        'max_file_uploads'    => ini_get('max_file_uploads'),
        'file_uploads'        => ini_get('file_uploads'),
        'upload_tmp_dir'      => ini_get('upload_tmp_dir'),
        'tmp_writable'        => is_writable(sys_get_temp_dir()),
        'storage_writable'    => is_writable(storage_path('app')),
        'php_sapi'            => php_sapi_name(),
        'gd_info'             => function_exists('gd_info') ? array_keys(array_filter(gd_info())) : 'GD not installed',
        'imagick'             => extension_loaded('imagick'),
        'r2_configured'       => !empty(env('CLOUDFLARE_R2_ACCESS_KEY_ID')),
        'livewire_tmp_disk'   => config('livewire.temporary_file_upload.disk'),
        'livewire_max_rule'   => config('livewire.temporary_file_upload.rules'),
    ]);
});
