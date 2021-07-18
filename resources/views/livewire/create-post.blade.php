<div>
    <x-jet-danger-button wire:click="$set('open',true)">Create New Post</x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo Post
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">!Cargando Imagen!</strong>
                <span class="block sm:inline">Espere mientras carga la Imagen.</span>
              </div>
            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="Imagen Seleccionada">
            @endif
            <div class="mb-4">
                <x-jet-label>Titulo del Post</x-jet-label>
                <x-jet-input class="w-full" type="text" wire:model="title" />
                <x-jet-input-error for="title" />
            </div>
            <div class="mb-4">
                <x-jet-label>Contenido del Post</x-jet-label>
                <textarea class="form-control w-full" type="text" rows="6" wire:model.defer="content"></textarea>
                <x-jet-input-error for="content"/>
            </div>
            <div>
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">Crear</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
