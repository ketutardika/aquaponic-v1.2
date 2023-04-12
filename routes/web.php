<?php

namespace App\Http\Controllers;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
//group route with prefix "admin"
//group route with middleware "auth"
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return redirect('dashboard');
    });
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('farms', FarmsController::class);
    Route::resource('farm-section', FarmSectionController::class);
    Route::resource('farm-block', FarmBlockController::class);
    Route::resource('sensor-type', SensorTypeController::class);
    Route::resource('sensor-device', SensorDeviceController::class);
    Route::resource('sensor-device-auto', SensorDeviceAutoController::class);
    Route::resource('crops', CropController::class);
    Route::resource('fishs', FishController::class);
    Route::resource('tasklist', TasklistController::class);
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    Route::get('/data/{unique_id}/{type}',[CropController::class, 'data']);
    Route::get('/crops/{id}/records',[CropController::class, 'record_index'])->name('crops.record_index');
    Route::get('/crops/{id}/new-record',[CropController::class, 'record_create'])->name('crops.record_create');
    Route::POST('/crops/{id}/record_store',[CropController::class, 'record_store'])->name('crops.record_store');
    Route::Delete('/crops/{id}/record_delete/{ids}',[CropController::class, 'record_delete'])->name('crops.record_delete');
    Route::get('/crops/{id}/record_show/',[CropController::class, 'record_show'])->name('crops.record_show');
    Route::get('/crops/{id}/record_show_pivot/',[CropController::class, 'record_show_pivot'])->name('crops.record_show_pivot');
    Route::get('/crops/{id}/record_show_pivot_chart/',[CropController::class, 'record_show_pivot_chart'])->name('crops.record_show_pivot_chart');
    Route::get('/crops/{id}/record_show/export-data',[CropController::class, 'record_export'])->name('crops.record_export');
    Route::get('/crops/datalog/export/{id}',[CropController::class, 'exportExcel'])->name('crops.record_export_excel');


    Route::get('/fishs/{id}/records',[FishRecordController::class, 'index'])->name('fishs.record_index');
    Route::get('/fishs/{id}/new-record',[FishRecordController::class, 'create'])->name('fishs.record_create');
    Route::POST('/fishs/{id}/record_store',[FishRecordController::class, 'store'])->name('fishs.record_store');
    Route::Delete('/fishs/{id}/record_delete/{ids}',[FishRecordController::class, 'destroy'])->name('fishs.record_delete');
    Route::get('/fishs/{id}/record_show/',[FishRecordController::class, 'show'])->name('fishs.record_show');
    Route::get('/fishs/{id}/record_show/export-data',[FishRecordController::class, 'record_export'])->name('fishs.record_export');

    Route::get('/dashboard/task/{id}',[DashboardController::class, 'taskcomplete'])->name('dashboard.update-tasklist');

    Route::get('data-live/{unique_id}/{type}', [SensorDeviceController::class, 'data'])->name('sensors.data');

    Route::get('/sensor-device-auto/{id}/{status}',[SensorDeviceAutoController::class, 'updateValue'])->name('sensorauto.update_value');
});


Route::group(['prefix' => 'email'], function(){
    Route::get('inbox', function () { return view('pages.email.inbox'); });
    Route::get('read', function () { return view('pages.email.read'); });
    Route::get('compose', function () { return view('pages.email.compose'); });
});

Route::group(['prefix' => 'apps'], function(){
    Route::get('chat', function () { return view('pages.apps.chat'); });
    Route::get('calendar', function () { return view('pages.apps.calendar'); });
});

Route::group(['prefix' => 'ui-components'], function(){
    Route::get('accordion', function () { return view('pages.ui-components.accordion'); });
    Route::get('alerts', function () { return view('pages.ui-components.alerts'); });
    Route::get('badges', function () { return view('pages.ui-components.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.ui-components.breadcrumbs'); });
    Route::get('buttons', function () { return view('pages.ui-components.buttons'); });
    Route::get('button-group', function () { return view('pages.ui-components.button-group'); });
    Route::get('cards', function () { return view('pages.ui-components.cards'); });
    Route::get('carousel', function () { return view('pages.ui-components.carousel'); });
    Route::get('collapse', function () { return view('pages.ui-components.collapse'); });
    Route::get('dropdowns', function () { return view('pages.ui-components.dropdowns'); });
    Route::get('list-group', function () { return view('pages.ui-components.list-group'); });
    Route::get('media-object', function () { return view('pages.ui-components.media-object'); });
    Route::get('modal', function () { return view('pages.ui-components.modal'); });
    Route::get('navs', function () { return view('pages.ui-components.navs'); });
    Route::get('navbar', function () { return view('pages.ui-components.navbar'); });
    Route::get('pagination', function () { return view('pages.ui-components.pagination'); });
    Route::get('popovers', function () { return view('pages.ui-components.popovers'); });
    Route::get('progress', function () { return view('pages.ui-components.progress'); });
    Route::get('scrollbar', function () { return view('pages.ui-components.scrollbar'); });
    Route::get('scrollspy', function () { return view('pages.ui-components.scrollspy'); });
    Route::get('spinners', function () { return view('pages.ui-components.spinners'); });
    Route::get('tabs', function () { return view('pages.ui-components.tabs'); });
    Route::get('tooltips', function () { return view('pages.ui-components.tooltips'); });
});

Route::group(['prefix' => 'advanced-ui'], function(){
    Route::get('cropper', function () { return view('pages.advanced-ui.cropper'); });
    Route::get('owl-carousel', function () { return view('pages.advanced-ui.owl-carousel'); });
    Route::get('sortablejs', function () { return view('pages.advanced-ui.sortablejs'); });
    Route::get('sweet-alert', function () { return view('pages.advanced-ui.sweet-alert'); });
});

Route::group(['prefix' => 'forms'], function(){
    Route::get('basic-elements', function () { return view('pages.forms.basic-elements'); });
    Route::get('advanced-elements', function () { return view('pages.forms.advanced-elements'); });
    Route::get('editors', function () { return view('pages.forms.editors'); });
    Route::get('wizard', function () { return view('pages.forms.wizard'); });
});

Route::group(['prefix' => 'charts'], function(){
    Route::get('apex', function () { return view('pages.charts.apex'); });
    Route::get('chartjs', function () { return view('pages.charts.chartjs'); });
    Route::get('flot', function () { return view('pages.charts.flot'); });
    Route::get('morrisjs', function () { return view('pages.charts.morrisjs'); });
    Route::get('peity', function () { return view('pages.charts.peity'); });
    Route::get('sparkline', function () { return view('pages.charts.sparkline'); });
});

Route::group(['prefix' => 'tables'], function(){
    Route::get('basic-tables', function () { return view('pages.tables.basic-tables'); });
    Route::get('data-table', function () { return view('pages.tables.data-table'); });
});

Route::group(['prefix' => 'icons'], function(){
    Route::get('feather-icons', function () { return view('pages.icons.feather-icons'); });
    Route::get('flag-icons', function () { return view('pages.icons.flag-icons'); });
    Route::get('mdi-icons', function () { return view('pages.icons.mdi-icons'); });
});

Route::group(['prefix' => 'general'], function(){
    Route::get('blank-page', function () { return view('pages.general.blank-page'); });
    Route::get('faq', function () { return view('pages.general.faq'); });
    Route::get('invoice', function () { return view('pages.general.invoice'); });
    Route::get('profile', function () { return view('pages.general.profile'); });
    Route::get('pricing', function () { return view('pages.general.pricing'); });
    Route::get('timeline', function () { return view('pages.general.timeline'); });
});

Route::group(['prefix' => 'auth'], function(){
    Route::get('login', function () { return view('pages.auth.login'); });
    Route::get('register', function () { return view('pages.auth.register'); });
});

Route::group(['prefix' => 'error'], function(){
    Route::get('404', function () { return view('pages.error.404'); });
    Route::get('500', function () { return view('pages.error.500'); });
});

Route::get('/clear-cache', function() {    
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return redirect()->route('dashboard.index')->with(['success' => 'Cache has been CLEAR successfully']);
})->name('clear-cache');
Route::get('/reset-database', function() {
    Artisan::call('migrate:fresh --seed');
    return redirect()->route('dashboard.index')->with(['success' => 'Database has been RESET successfully']);
})->name('reset-database');
