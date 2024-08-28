<x-filament-panels::page>
    @section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($this->getWidgets() as $widget)
            {{ $widget }}
        @endforeach
    </div>
</x-filament-panels::page>
