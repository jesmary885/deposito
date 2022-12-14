<div x-data="{status: @entangle('status')}">
    <button type="submit" class="btn btn-primary btn-sm float-right" wire:click="open">
        Comprar
    </button>
    @if ($isopen)
        <div class="modal d-block" tabindex="-1" role="dialog" style="overflow-y: auto; display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title py-0 text-lg text-gray-300"> {{__('messages.registro_ventas')}}</h5>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-sm ml-2 m-0 p-0 text-gray-300 font-semibold"><i class="fas fa-info-circle"></i> {{__('messages.Complete_todos_los_campos_y_presiona_Guardar')}}</h2> 
                
                        <hr class="m-2 p-2">

                        <div class="flex justify-end">
                            <div class="mt-1">
                                <div class="mr-2 flex justify-between">
                                    <p class="text-gray-300 text-md font-semibold mt-1 mr-2">Cantidad: </p>
                                    <button type="button" class="mr-1 btn btn-secondary"
                                        disabled
                                        x-bind:disabled="$wire.qty <= 1"
                                        wire:loading.attr="disabled"
                                        wire:target="decrement"
                                        wire:click="decrement">
                                        -
                                    </button>
                                        <input wire:model="qty" autofocus type="number" min="1" max="{{$quantity}}" class="inputNumber mr-1 text-center text-sm appearance-none block text-gray-700 border border-gray-200 rounded p-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="{{$qty}}">
                                        <button type="button" class="btn btn-secondary" 
                                            x-bind:disabled="$wire.qty >= $wire.quantity"
                                            wire:loading.attr="disabled"
                                            wire:target="increment"
                                            wire:click="increment">
                                            +
                                    </button>
                                </div>
                            </div>
                        </div>

                      
                            <div class="form-group w-full mr-2 h-full">
                                <label for="formGroupExampleInput2">Estado de su compra</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="1" wire:model="status">
                                    <label for="customRadio1" class="custom-control-label">Ya he recibido y pagado el producto</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-danger" type="radio" id="customRadio2" value="2" name="customRadio" wire:model="status">
                                    <label for="customRadio2" class="custom-control-label">No he pagado ni recibido el producto</label>
                                </div>

                                <x-input-error for="status" />

                            </div>
                            
                            <div class="flex justify-between mt-3" :class="{'hidden': (status == '2')}">
                                <div class="form-group w-full mr-2 mt-4">
                                    <label for="formGroupExampleInput2">M??todo de pago ha utilizar</label>
                                        <select wire:model="metodo_id" class="form-control w-full">
                                            <option value="" selected>Seleccione una opci??n</option>
                                                @foreach ($metodos as $metodo)
                                                    <option value="{{$metodo->id}}">{{$metodo->name}}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="mt-4">

                            <div class="grid grid-cols-2" :class="{'hidden': (status == '2')}">
                                <div>
                                    <div class="form-group w-full mr-2 h-full">
                                        <label for="formGroupExampleInput2">Tus puntos hacia el vendedor</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio5" name="customRadio1" value="1" wire:model.defer="ptos_vendedor">
                                            <label for="customRadio5" class="custom-control-label"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio6" value="2" name="customRadio1" wire:model.defer="ptos_vendedor">
                                            <label for="customRadio6" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio7" value="3" name="customRadio1" wire:model.defer="ptos_vendedor">
                                            <label for="customRadio7" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio8" value="4" name="customRadio1" wire:model.defer="ptos_vendedor">
                                            <label for="customRadio8" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio9" value="5" name="customRadio1" wire:model.defer="ptos_vendedor">
                                            <label for="customRadio9" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>
                                    </div>
                                </div>


                                <div :class="{'hidden': (status == '2')}">
                                    <div class="form-group w-full mr-2 h-full">
                                        <label for="formGroupExampleInput2">Tus puntos hacia el producto</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio10" name="customRadio2" value="1" wire:model.defer="ptos_producto">
                                            <label for="customRadio10" class="custom-control-label"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio11" value="2" name="customRadio2" wire:model.defer="ptos_producto">
                                            <label for="customRadio11" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio12" value="3" name="customRadio2" wire:model.defer="ptos_producto">
                                            <label for="customRadio12" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio13" value="4" name="customRadio2" wire:model.defer="ptos_producto">
                                            <label for="customRadio13" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" id="customRadio14" value="5" name="customRadio2" wire:model.defer="ptos_producto">
                                            <label for="customRadio14" class="custom-control-label flex"><p class="text-gray-700 text-md"> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i> <i class="fas fa-star text-md text-yellow-400"></i></p></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
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
