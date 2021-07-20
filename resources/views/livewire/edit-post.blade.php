<div>
    <a class="btn btn-green" wire:click="$set('open',true)">
        <i class="fas fa-edit"></i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Post
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>Titulo del Post</x-jet-label>
                <x-jet-input wire:model="post.title" class="w-full" type="text" />
            </div>
            <div class="mb-4">
                <x-jet-label>Contenido del Post</x-jet-label>
                <textarea wire:model="post.content" class="form-control w-full" type="text" rows="6"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">Cancelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">Crear</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
