<x-filament::page>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
        @foreach ($this->getWidgets() as $widget)
            {{ $widget }}
        @endforeach
    </div>
</x-filament::page>