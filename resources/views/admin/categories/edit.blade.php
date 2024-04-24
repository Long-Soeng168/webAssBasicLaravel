@extends('admin.layouts.admin')
@section('content_name')
    Edit Category
@endsection

@section('content')
<div class="p-4">
  <div class="border border-black min-h-full">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="mx-auto max-w-screen-xl ">
          <form action="{{ url('admin/categories/' . $category->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input value="{{ $category->name }}" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                </div>
                <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
                  <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 p-[7px] dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image_help" id="image" type="file">
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_help">Recommend Size 16x9 (MAX: 2MB).</p>
                </div>
                  
            </div>
            <div class="flex justify-end gap-2">
              <a href="{{ url()->previous() }}" class="px-8 py-2 border-2 border-black hover:bg-black text-black hover:text-white">Back</a>
              <button class="px-8 py-2 bg-black hover:bg-white hover:text-black border-2 border-black text-white">Update category</button>
            </div>
        </form>
      </div>
    </section>
  </div>
</div>
@endsection