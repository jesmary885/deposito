<div>
    <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="open">
        <i class="fas fa-plus-square"></i> Crear venta
    </button>

    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;"
            wire:click.self="$set('isopen', false)">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-300"> {{__('messages.registro_ventas')}}</h5>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-sm ml-2 m-0 p-0 text-gray-300 font-semibold"><i class="fas fa-info-circle"></i> {{__('messages.Complete_todos_los_campos_y_presiona_Guardar')}}</h2> 
                        <hr>
                        <hr class="m-2 p-2">

                            <div class="form-group">
                                <label for="formGroupExampleInput">{{__('messages.nombre')}}</label>
                                <input type="text" wire:model="name" class="form-control" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">{{__('messages.descripcion')}}</label>
                                <input type="text" wire:model="description" class="form-control" id="formGroupExampleInput2">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">{{__('messages.precio')}}</label>
                                <input type="text" wire:model="price" class="form-control" id="formGroupExampleInput2">
                            </div>
                             <div class="form-group">
                                <label for="formGroupExampleInput2">{{__('messages.estado')}}</label>
                                <select id="estado" wire:model.lazy="estado" class="form-control" name="estado">
                                    <option value="" selected></option>
                                    <option value="Habilitado">Habilitado</option>
                                    <option value="Deshabilitado">Deshabilitado</option>
                                </select>
                        
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">{{__('messages.categoria')}}</label>
                                  <select wire:model="category_id" class="form-control">
                                    <option value="" selected>Seleccione la categoría</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="close">{{__('messages.Cerrar')}}</button>
                        <button type="button" class="btn btn-primary" wire:click="save">{{__('messages.Guardar')}}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
