<div>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div class="mr-2 w-full h-576">
         

                <div class="justify-center">
                <img class=" w-full object-cover shadow-md object-center rounded-md h-96" src="/storage/logo/Category_vpn.webp" alt="">
                </div>

                <div class="mt-4">
                    <p>Descripción</p>

                    <div class="mt-2">
                        <h1>{{$marketplace_select->description}}</h1>
                    </div>


                </div>

            </div>

            <div>
                <div class=" bg-transparent rounded shadow-inner p-3 mb-2">
                    <div class="mb-2">
                        <h1>{{$marketplace_select->name}}</h1>
                    </div>

                    <div class="flex">
                        
                        <div class="flex mt-1">
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-gray-400"></i></p>
                        </div>

                        <p class="mt-2">
                            (12) referencias
                        </p>
                    </div>


                    
                    <p class="mt-2">{{__('messages.precio')}} : $ {{$marketplace_select->price}} </p>
                    

                    <hr class="m-2">

                 <div>
                    <p>Información sobre el vendedor</p>

                    <p class="mt-2">{{__('messages.username')}} : {{$marketplace_select->user->username}}</p>

                    <div>
                        <div class="flex">
                            <div class="bg-red-100 w-12 h-3 mt-2"></div>
                            <div class="ml-1 bg-yellow-100 w-12 h-3 mt-2"></div>
                            <div class="ml-1 bg-green-600 w-12 h-3 mt-2"></div>
                            <div class="ml-2">
                                (58) Referencias
                            </div>

                         

                        </div>

                        <div class="flex">
                            <div>

                            </div>
                            <div>
                                
                            </div>

                        </div>

                    </div>
                    
                 </div>

                    

                    <div class=" mt-6 flex">

                        <div class="mr-2 ">

                        <a class="btn btn-primary btn-sm font-semibold" href="{{route('chat.convers',['user'=>$marketplace_select->user->id])}}">Contactar con el vendedor</a>

                        </div>
                        <div>

                        <a class="btn btn-primary btn-sm font-semibold" href="{{route('chat.convers',['user'=>$marketplace_select->user->id])}}">Comprar ahora</a>

                        </div>


                    </div>
                </div>
            </div>
            




        </div>
    </div>
</div>
