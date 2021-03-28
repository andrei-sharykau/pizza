<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header  class="h-18 bg-gray-600 text-white flex justify-between p-4">
            <div class="">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
            </div>
            <a class="flex flex-row justify-end" href="">
                <img class="h-10" src="{{ asset('img/pizza.jpg') }}" alt="">
                <div class="pt-2 px-4">0 Товаров</div>
            </a>
            </div>
        </header>
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 text-center">

                @foreach ($data as $d)

                <div class="bg-gray-200 m-2 p-4 grid grid-cols-1">
                    <p class="text-xl font-black">{{ $d->name }}</p>
                    <img class="h-100 pt-4 justify-self-center" src="{{ asset('/storage/' . $d->img) }}" alt="">
                    <p>{{ $d->description }}</p>
                    <p class="text-3xl py-4">{{ $d->price }} р.</p>
                    <div class="grid grid-cols-5 text-2xl justify-items-auto">
                        <button class="rounded bg-green-200">-</button>
                        <input class="mx-2" type="text" name="" id="" value="1">
                        <button class="rounded bg-green-200">+</button>
                        <button class="rounded text-xl bg-green-300 col-span-2 ml-2 px-4">Заказать</button>
                    </div>
                </div>

                @endforeach
            </div>  
        </div>
<!--         <footer>
            <div>Оформить заказ</div>
        </footer> -->
    </body>
</html>
