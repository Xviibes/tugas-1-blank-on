<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $html = "
    <h1>Contact App</h1>
    <div>
        <a href='" . route('admin.contacts.index') . "'>Semua contacts</>
        <a href='" . route('admin.contacts.create') . "'>Tambahkan contacts</>
        <a href='" . route('admin.contacts.show', 1) . "'>Tampilkan contacts</>
    </div>
    ";
    return $html;
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/contacts', function() {
        return "<h1>Daftar Kontak</h1>";
    })->name('contacts.index');
    
    Route::get('/contacts/create', function() {
        return "<h1>Tambah Kontak Baru</h1>";
    })->name('contacts.create');
    
    Route::get('/contacts/{id}', function($id) {
        return "Ini Kontak ke-" . $id;
    })->whereNumber('id')->name('contacts.show');
    
    Route::get('/companies/{name?}', function($name=null) {
        if($name) {
            return "Nama Perusahaan: " . $name;
        } else {
            return "Nama Perusahaan Kosong";
        }
    })->whereAlphaNumeric('name')->name('companies');
});