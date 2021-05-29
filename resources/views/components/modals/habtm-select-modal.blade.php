<div class="modal">
    <div class="modal-card no-padding">
        <div class="modal-card-title">
            <h4>Select {{ $resource }}</h4>
        </div>

        <div class="modal-card-subtitle">
            <input
                type="text"
                wire:model="search"
                placeholder="Search for {{ $resource }}"
            >
        </div>


        <div class="modal-card-content">
            <div wire:loading.flex class="modal-card-content-cover w-100">
                <x-rambo::loading />
            </div>

            <div class="habtm-picker-grid">
                @include('rambo::components.habtm.panel', [
                    'items' => $unselectedItems,
                ])

                <div class="habtm-picker-grid-seperator">
                    <i wire:loading.remove class="fas fa-exchange-alt"></i>
                </div>

                @include('rambo::components.habtm.panel', [
                    'items' => $selectedItems,
                ])
            </div>
        </div>

        <div class="modal-card-footer">
            <a wire:click.prevent="closeModal" class="button-link">
                Close
            </a>
        </div>
    </div>
</div>
