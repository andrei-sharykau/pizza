<form class="grid grid-cols-1 gap-4 max-w-lg" action="{{ route('add-product') }}" method="POST" enctype="multipart/form-data">
    	@csrf
    	<input style="box-shadow: none;" class="focus:border-green-500" type="text" name="name" placeholder="Название">
    	<div class="border border-gray-500 focus:border-green-500 grid grid-cols-1 gap-2 p-2">
         	<label class="text-gray-500" for="file">Изображение:</label>
         	<input type="file" name="img">
    	</div>
    	<textarea style="box-shadow: none;" class="h-40 focus:border-green-500" name="description" placeholder="Описание товара"></textarea>
    	<input style="box-shadow: none;" class="focus:outline focus:border-green-500" type="text" name="price" placeholder="Цена">
    	<button type="submit" class="bg-green-300 hover:bg-green-500 rounded p-4">Добавить</button>
</form>