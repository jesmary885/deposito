<div x-data="{jumper_2: @entangle('jumper_2'),points_user: @entangle('points_user'), is_high: @entangle('is_high'),is_basic: @entangle('is_basic'), calc_link: @entangle('calc_link')}">
    <div class="card">
        <div class="card-header row flex justify-between">
            <div class="flex-grow-1">
                <input wire:model="search" placeholder="" class="form-control">
            </div>

            <div class="ml-2 mr-2 mt-1">
                @livewire('jumpers.ssidkr.ssidkr-create')
            </div>

            <div class="mt-1">
                @livewire('jumpers.ssidkr.ssidkr-create-high')
            </div>
        </div>

        @if ($jumper_complete != 0 && $jumper != "" && $calc_link == 1)
            <div class="card-body mt-0">

                <div class="flex flex-row justify-center">
                    <div>
                        <span class="text-blue-400 text-lg ml-4 mb-2" id="jumper_copy">{{$jumper_complete}}</span>
                    </div>
        @endif
                    <div :class="{'hidden': (jumper_2 == '')}"> {{--falta ocultarlo tambien cuando calc_link sea igual a 0--}}
                        <div :class="{'hidden': (calc_link == 0)}">
                            <button class="btn btn-sm btn-outline-secondary ml-2 mb-3 " title="{{__('messages.copiar_portapapeles')}}" id="button_copy"><i class="	far fa-clipboard"></i></button>    
                        </div>
                        
                    </div>
        @if ($jumper_complete != 0 && $jumper != "")

                </div>
            <table class="table table-striped table-responsive-md table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">{{__('messages.Tipo')}}</th>
                            <th class="text-center">PSID</th>
                            <th class="text-center">{{$jumper->jumperType->name}}</th>
                            <th class="text-center">{{__('messages.Subido')}}</th>
                            <th class="text-center" :class="{'hidden': (is_high == 'no')}">PID</th>
                            <th colspan="2" class="text-center">{{__('messages.Puntuación')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{$jumper->jumperType->name}}</td>
                            <td class="text-center">{{$jumper->psid}}</td>
                            <td class="text-center" :class="{'hidden': (is_high == 'no')}"> {{$calculo_high}}</td>
                            <td class="text-center" :class="{'hidden': (is_basic == 'no')}">{{$jumper->basic}}</td>
                            <td class="text-center">{{$jumper->created_at->format('d/m/Y')}}</td>
                            <td class="text-center" :class="{'hidden': (is_high == 'no')}"> 
                                <div class=" row flex justify-between">
                                    <div class="flex-grow-1">
                                        <input type="text" wire:model="pid_new" class="form-control" id="formGroupExampleInput" placeholder="{{__('messages.ingrese_pdi')}}">
                                    </div>
                                    <div>
                                        <button
                                            class="btn btn-md btn-outline-secondary" 
                                            wire:click="calculo_high('{{$jumper->id}}')">
                                            <i class="font-semibold fas fa-sync"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                                
                            <td width="10px">
                                <button
                                    class="py-2 px-3 text-md font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                                    x-bind:disabled="points_user == 'si'"
                                    wire:click="positivo('{{$jumper->id}}')"
                                    title="Positivo">
                                    <i class="font-semibold far fa-thumbs-up">{{$jumper->positive_points}}</i>
                                </button>
                            </td>
                            <td width="10px">
                            <button
                                    class="py-2 px-3 text-md font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" 
                                    x-bind:disabled="points_user == 'si'"
                                    wire:click="negativo('{{$jumper->id}}')"
                                    title="Negativo">
                                    <i class="font-semibold far fa-thumbs-down">{{$jumper->negative_points}}</i>
                            </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="grid md:grid-cols-3 gap-4 mt-4 card container">
                    <aside class="md:col-span-1">
                        <div class=" mt-8 ">
                            <textarea wire:model="comentario" class="form-control" id="formGroupExampleInput" name="comentario" cols="80" rows="2" placeholder="{{__('messages.comparte_experiencia')}}"></textarea>
                        </div>

                        <div class="mt-2 mb-2">
                        <button
                            class="btn btn-primary" 
                            wire:click="comentar('{{$jumper->id}}')"
                            title="{{__('messages.Guardar')}}">
                            {{__('messages.Guardar')}}
                        </button>

                        </div>
                    </aside>

                    <div class="md:col-span-2 mt-8">
                        <div class="card container ml-2">
                            @if ($comments->count())
                                @foreach ($comments as $comment)
                                    <div class="flex justify-between card-body">
                                        <div class="">
                                            <p class="text-gray-200 text-lg font-semibold">{{$comment->user->name}}</p>
                                            <p class="text-gray-200 text-sm ">{{$comment->created_at->format('d/m/Y')}}</p>
                                        </div>
                                        <div class="flex-1 ml-4 text-justify">
                                            <p class="text-white font-semibold">{{$comment->comment}}</p>
                                        </div>
                                        
                                    </div>

                                    <hr class="m-2">
                                @endforeach

                                <div class="m-2">
                                    {{$comments->links()}}
                                </div>
                            @else
                                <div class="card-body">
                                    <strong>{{__('messages.sin_comentarios')}}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
               
            </div>
        @endif

    </div>
    <script>
        
            var boton = document.getElementById("button_copy");
            boton.addEventListener("click", copiarAlPortapapeles, false);
            function copiarAlPortapapeles() {
                var jumper_copy = document.getElementById("jumper_copy");
                var inputFalso = document.createElement("input");
                inputFalso.setAttribute("value", jumper_copy.innerHTML);
                document.body.appendChild(inputFalso);
                inputFalso.select();
                document.execCommand("copy");
                document.body.removeChild(inputFalso);
            }
        
        
    </script>
</div>



