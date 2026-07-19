<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UfExtract extends Component
{
    public string $serviceName;

    public string $ufValue;

    public string $currentDate;

    public string $statusText;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->serviceName = 'Servicio UF';
        $this->ufValue = '$38.500';
        $this->currentDate = now()->format('d/m/Y');
        $this->statusText = 'Servicio externo simulado';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.uf-extract');
    }
}
