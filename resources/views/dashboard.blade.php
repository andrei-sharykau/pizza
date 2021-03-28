<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Товары
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-grey-200">
                    <a class="bg-green-400 hover:bg-green-500 ml-4 p-2 rounded flex max-w-max" href="{{ route('add-product') }}">
                        <svg class="h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <p class="pl-2">добавить товар</p>
                    </a>    
                </div>

                @foreach($data as $d)
                <div class="mt-4 px-4 flex justify-left items-center hover:bg-gray-100">
                    <img class="h-16 px-2" src="{{ asset('/storage/' . $d->img) }}" alt="">
                    <div class="px-2 font-semibold truncate min-w-min">
                        {{ $d->name }}
                    </div>
                    <div class="flex-grow px-4 truncate sm:overflow-hidden">
                        {{ $d->description }}
                    </div>
                    <div class="font-semibold truncate min-w-min">
                        {{ $d->price }} р.
                    </div>
                    <a class="bg-green-200 hover:bg-green-300 ml-4 p-2 rounded" href="{{ route('edit', ['product'=>$d->id]) }}">
                        <svg  class="h-6 text-grey-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                    </a>
                    <a class="bg-red-400 hover:bg-red-500 ml-4 p-2 rounded" href="del-product/{{ $d->id }}">
                        <svg class="h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </a>
                </div>
                @endforeach
                <div class="py-2"></div>
            </div>
        </div>
    </div>
</x-app-layout>
