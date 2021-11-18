<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::component('bsText', 'components.form.text', ['label', 'name', 'value' => null, 'attributes' => []]);
        \Form::component('bsNumber', 'components.form.number', ['label', 'name', 'value' => null, 'attributes' => []]);
        \Form::component('bsTextArea', 'components.form.textarea', ['label', 'name', 'value' => null, 'attributes' => []]);
        \Form::component('bsSelect', 'components.form.select', ['label', 'name', 'options' => [], 'value' => null, 'attributes' => []]);
    }
}
