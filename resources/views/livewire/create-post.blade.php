<div>
    <x-jet-danger-button wire:click="$set('open',true)">Create New Post</x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo Post
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>Titulo del Post</x-jet-label>
                <x-jet-input class="w-full" type="text" wire:model.defer="title"/>
            </div>
            <div class="mb-4">
                <x-jet-label>Contenido del Post</x-jet-label>
                <textarea class="form-control w-full" type="text" rows="6" wire:model.defer="content"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save">Crear</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
