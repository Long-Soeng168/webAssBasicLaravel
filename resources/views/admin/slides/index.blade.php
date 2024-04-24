@extends('admin.layouts.admin')
@section('content_name')
    Slides
@endsection

@section('content')
<div class="p-4">
  <div class=" pb-2 mb-2 flex justify-between items-center">
    <div class="w-full md:w-1/2">
        <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-500 text-gray-900 text-sm focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
            </div>
        </form>
    </div>
    <a href="{{ url('admin/slides/create') }}" class="px-8 py-2 bg-black text-white">Add Slide</a>
  </div>

  <div class="border border-black min-h-full">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
      <div class="mx-auto max-w-screen-xl ">
          <!-- Start coding here -->
          <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            
              <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">No</th>
                              <th scope="col" class="px-4 py-3">name</th>
                              <th scope="col" class="px-4 py-3">Image</th>
                              <th scope="col" class="px-4 py-3 text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($slides as $slide)
                            <tr class="border-b dark:border-gray-700">
                              <td class="px-4 py-3">{{ $loop->iteration }}</td>
                              <td class="px-4 py-3">{{ $slide->name }}</td>
                              <td class="px-4 py-3">
                                <img class="w-10 aspect-square object-contain" src="{{ asset('images/slides/'. $slide->image) }}" alt="user photo">
                              </td>
                              <td class="px-4 py-3">
                                <div class="flex gap-2 h-full items-center justify-center">
                                  {{-- <a href="#" class="text-green-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                  </a> --}}
                                  <a href="{{ url('admin/slides/'.$slide->id.'/edit') }}" class="text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-pen-line"><path d="m18 5-3-3H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2"/><path d="M8 18h1"/><path d="M18.4 9.6a2 2 0 1 1 3 3L17 17l-4 1 1-4Z"/></svg>
                                  </a>
                                  <a href="{{ url('admin/slides/'.$slide->id.'/delete') }}" class="text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                                  </a>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                          
                          
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </section>
  </div>
</div>
@endsection