<div>
    <x-jet-secondary-button wire:click="$set('open',true)">
        Crear producto
    </x-jet-secondary-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title" class="text-center">
            Crear nuevo producto
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="nombre_product"></x-jet-input>
                <x-jet-input-error for="nombre_product" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripcion"></x-jet-label>
                <textarea
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    rows="4" wire:model="descripcion"></textarea>
                <x-jet-input-error for="descripcion" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Precio"></x-jet-label>
                <x-jet-input type="number" class="w-full" wire:model="precio"></x-jet-input>
                <x-jet-input-error for="precio" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Estado"></x-jet-label>
                <x-jet-input type="number" class="w-full" wire:model="estado" placeholder="1 o 2"></x-jet-input>
                <x-jet-input-error for="estado" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-secondary-button wire:click="save">
                Guardar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
