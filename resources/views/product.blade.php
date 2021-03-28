<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Новый товар
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                @if ($errors->any())
                    <div class="max-w-lg bg-red-300 rounded mb-4 p-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($product))
                   	@include('layouts.form-edit-product')
 				@else
 					@include('layouts.form-new-product')
 				@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>