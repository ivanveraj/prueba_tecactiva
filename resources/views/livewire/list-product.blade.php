<div>
    @push('css')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    @endpush
    <div class="flex justify-center mb-4">
        @livewire('create-product')
    </div>
    <x-table>
        @if ($products->count())
            <table class="min-w-full" id="Productos">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Fecha publicacion
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4">
                                {{ $product->id_product }}
                            </td>
                            <td class="px-6 py-4">
                                <a class="ml-4 cursor-pointer text-orange-600" wire:click="$emit('clic')">
                                    {{ $product->nombre_product }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->descripcion }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->precio }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->estado == 1)
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-green-600 rounded-full">Publicado</span>
                                @else
                                    <span
                                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full">No
                                        publicado</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->fecha_publicacion }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a class="ml-4"
                                    wire:click="$emit('deleteProduct',{{ $product->id_product }})">
                                    <i class="cursor-pointer fas fa-trash"> Eliminar</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No existe ningun producto
            </div>
        @endif
    </x-table>
    @push('js')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <script>
            $(document).ready(function() {
                $('#Productos').DataTable();
            });

            Livewire.on('clic', prodId => {
                Swal.fire('Clic....')
            })

            Livewire.on('deleteProduct', prodId => {
                Swal.fire({
                    title: '¿Estas seguro de eliminar el producto?',
                    text: "...",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, lo quiero eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('list-product', 'delete', prodId)
                        Swal.fire(
                            'Eliminado!',
                            'El producto fue eliminado correctamente',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
