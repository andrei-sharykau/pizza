<h2 class="pb-4 font-semibold">{{ $product->name }}</h2>
<form class="grid grid-cols-1 gap-4 max-w-lg" action="{{ route('update', ['update'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
    	@csrf
    	<input style="box-shadow: none;" class="focus:border-green-500" type="text" name="name" placeholder="Название" value={{ $product->name }}>
    	<div class="border border-gray-500 focus:border-green-500 grid grid-cols-2 gap-2 p-2">
    		<img class='h-32 px-2' src="{{ asset('/storage/' . $product->img) }}" alt="">
    		<div>
         		<label class="text-gray-500" for="file">Изображение:</label>
         		<input type="file" name="img">
         	</div>
    	</div>
    	<textarea style="box-shadow: none;" class="h-40 focus:border-green-500" name="description" placeholder="Описание товара">{{ $product->description}}</textarea>
    	<input style="box-shadow: none;" class="focus:outline focus:border-green-500" type="text" name="price" placeholder="Цена" value={{ $product->price}}>
    	<button type="submit" class="bg-green-300 hover:bg-green-500 rounded p-4">Сохранить</button>
</form>