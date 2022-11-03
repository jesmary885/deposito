<div>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div class="mr-2 w-full h-576">
                <div class="mb-4">
                    <h1>{{$marketplace_select->name}}</h1>
                </div>

                <div class=" justify-center ">
                <img class=" w-full object-cover object-center rounded h-40" src="/storage/logo/Category_vpn.png" alt="">
                </div>

            </div>

            <div class=" pt-10">
                <div class=" bg-transparent  rounded shadow-inner p-3 mb-2">
                    <h2>{{$marketplace_select->description}}</h2>
                    <p>{{__('messages.precio')}} : {{$marketplace_select->price}}</p>
                    <div class="flex">
                        <p class="mt-2">{{__('messages.vendedor')}} : {{$marketplace_select->user->name}}</p>
                        <div class="flex mt-1 ml-2">
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-yellow-400"></i></p>
                            <p class="text-gray-700 text-lg mx-1"> <i class="fas fa-star text-md text-gray-400"></i></p>
                        </div>
                    </div>

                    <div class=" mt-6">
                        <div>

                        <a class="btn btn-primary btn-sm font-semibold" href="{{route('chat.convers',['user'=>$marketplace_select->user->id])}}">Comprar ahora</a>

                        </div>


                    </div>
                </div>
            </div>
            




        </div>
    </div>
</div>
