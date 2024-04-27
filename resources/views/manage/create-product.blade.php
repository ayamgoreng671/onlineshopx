<!DOCTYPE html class="scroll-smooth">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create - Products</title>
    <x-tailwind-cdn></x-tailwind-cdn>
</head>
<body class="flex items-center">
    <div class="mx-auto my-10 w-full">
        <form class="flex mx-auto my-4 max-w-5/6 sm:w-1/4 md:w-2/3 lg:w-3/4 xl:w-4/5 text-2xl lg:text-xl rounded-md border-2 border-amber-400 shadow-lg shadow-amber-600/75" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="flex flex-col justify-start items-center gap-y-6 w-full py-6">
                <h1 class="mt-6 flex text-3xl font-bold">Create Product</h1>
                <div class="hidden">
                    <input type="text" name="seller_id" value="">
                    <input type="text" name="slug" value="">
                </div>
                <div class="flex flex-col w-full mx-6 px-6">
                    <label class="font-medium" for="name">Nama Produk</label>
                    <input type="text" name="name" class="border-2 border-amber-600 text-xl font-normal rounded-xl p-2" placeholder="Product name's....">
                </div>
                <div class="flex flex-col w-full mx-6 px-6">
                    <label class="font-medium" for="photo">Foto Produk</label>
                    <input id="photoInput" type="file" accept="image/*" class="cursor-pointer" name="photo" placeholder="Product photo's....">
                </div>
                <img id="imagePreview" class="hidden w-full mx-6 px-6" src="#" alt="Image Preview">
                <div class="flex flex-col w-full mx-6 px-6">
                    <label class="font-medium" for="category">Jenis Produk</label>
                    <select name="cars" id="cars" class="border-2 border-amber-600 text-xl font-normal rounded-xl p-2">
                        <option value=""></option>
                    </select>
                </div>
                <div class="flex flex-col w-full mx-6 px-6">
                    <label class="font-medium" for="about">Tentang Produk</label>
                    <textarea name="about" class="border-2 border-amber-600 text-xl font-normal rounded-xl w-full h-48 p-2" placeholder="Product about...."></textarea>
                </div>
                <div class="flex flex-col w-full mx-6 px-6">
                    <label class="font-medium" for="price">Harga Produk</label>
                    <input type="number" name="price" class="border-2 border-amber-600 text-xl font-normal rounded-xl p-2" placeholder="Product price....">
                </div>
                <x-save-input class="flex justify-center"></x-save-input>
            </div>
        </form>
    </div>
    <x-preview-image></x-preview-image>
</body>
</html>
