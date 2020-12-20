<?php

namespace App\Http\Livewire;


trait SweetAlertDispatcher
{

    public function dispatchSwal($title, $message, $icon)
    {

        $this->dispatchBrowserEvent('swal', [
            'title'    => $title,
            'text'     => $message,
            'timer'    => 3000,
            'icon'     => $icon,
            'toast'    => false,
            'position' => 'center'
        ]);
    }
}
