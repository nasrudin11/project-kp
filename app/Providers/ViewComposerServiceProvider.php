<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Pasar;
use App\Models\Kecamatan;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // View Composer untuk sidebar
        View::composer('partials.sidebar', function ($view) {
            $dataPasar = Pasar::all();
            $dataKecamatan = Kecamatan::all();

            $view->with('dataPasar', $dataPasar)
                 ->with('dataKecamatan', $dataKecamatan);
        });

        // View Composer untuk navbar
        View::composer('partials.navbar', function ($view) {
            $dataPasar = Pasar::all();
            $dataKecamatan = Kecamatan::all();

            $view->with('dataPasar', $dataPasar)
            ->with('dataKecamatan', $dataKecamatan);
        });
    }

    public function register()
    {
        // Tidak perlu kode tambahan disini
    }
}
