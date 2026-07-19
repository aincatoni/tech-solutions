<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <p class="text-muted mb-1">{{ $serviceName }}</p>
                <h2 class="h4 mb-1">Valor UF: {{ $ufValue }}</h2>
                <p class="mb-0 text-secondary">{{ $statusText }}</p>
            </div>

            <div class="text-md-end">
                <span class="badge bg-secondary">{{ $currentDate }}</span>
            </div>
        </div>
    </div>
</div>
