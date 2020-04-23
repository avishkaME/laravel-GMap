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

Route::get('/', function () {
    $config['center'] = 'Colombo, Sri Lanka';
    $config['zoom'] = '14';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = false;
    $config['geocodeCaching'] = true;

    GMaps::initialize($config);

    //Add a marker
    $marker['position'] = 'Air canada center, Toronto';
    $marker['infowindow_content'] = 'Air canada center';

    GMaps::add_marker($marker);

    $map = GMaps::create_map();

    return view('welcome')->with('map', $map);
});

Route::get('/directions', function () {
    $config['center'] = 'Colombo, Sri Lanka';
    $config['zoom'] = '14';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = false;
    $config['geocodeCaching'] = true;

    $config['directions'] = true;
    $config['directionsStart'] = 'Air canada center, Toronto';
    $config['directionsEnd'] = 'Yorkdale, Toronto';
    $config['directionsDivId'] = 'directionsDiv'; 

    GMaps::initialize($config);

    $map = GMaps::create_map();

    return view('welcome')->with('map', $map);
});
