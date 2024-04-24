@extends('admin.layouts.admin')
@section('content_name')
    Product View
@endsection

@section('content')
<div class="p-4">
    <div class="border border-black min-h-full">
        <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-6 xl:gap-8">
                    <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                        <img class="w-full aspect-square object-cover"
                            src="{{ asset('images/products/'.$product->image) }}"
                            alt="user photo">
                    </div>

                    <div class="mt-6 sm:mt-8 lg:mt-0">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            {{ $product->name }}
                        </h1>
                        <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                            <p
                                class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                                {{ $product->price }}
                            </p>
                        </div>

                        <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                        <div class="grid grid-cols-2 max-w-[200px]">
                            <p>Category :</p>
                            <p>{{ $product->category_id }}</p>
                        </div>
                        <div class="grid grid-cols-2 max-w-[200px]">
                            <p>Brand :</p>
                            <p>{{ $product->brand }}</p>
                        </div>

                        <div class="my-6 text-gray-500 dark:text-gray-400">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection 