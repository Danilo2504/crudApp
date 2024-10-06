@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
  <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <x-breadcrumb :pages="[
    ['label' => 'Create Album', 'url' => route('albums.store')],
    ]" />
    <h2 class="mb-4 text-2xl text-slate-200 font-bold">Create Album</h2>
    <form method="POST" action="{{ route('albums.store') }}">
      @csrf
      @method('POST')
      <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
        <div class="sm:col-span-2">
          <label for="album_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Album
            name</label>
          <input type="text" name="album_name" id="album_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            value="" placeholder="Type album name" required="true">
        </div>
        <div class="sm:col-span-2">
          <label for="description"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <textarea id="album_description" rows="8" name="album_description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Some album description here..."></textarea>
        </div>
        <div class="sm:col-span-2">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image_thumb_url">Upload
            file</label>
          <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="image_thumb_url" name="image_thumb_url" type="file" accept="image/png, image/jpeg, image/jpg">
          <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image_thumb_url_help">Accepted file types: JPG,
            JPEG,
            PNG
          </div>
        </div>
        <div class="sm:col-span-2 hidden" id="image-prev-container">
          <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="p-2 rounded-lg relative bg-gray-50 dark:bg-gray-700">
              <img id="image-preview" src="" alt="" class="max-w-full object-cover block align-middle">
              <button type="button" id="remove-image" role="button"
                class="absolute left-1 bottom-1 text-red-500 hover:text-red-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center space-x-4">
        <button type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save
          Album</button>
        <a href="{{ route('albums.index') }}"
          class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 inline-flex items-center">
          <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
              clip-rule="evenodd"></path>
          </svg>
          Discard Album
        </a>
      </div>
    </form>
  </div>
</section>
@endsection

@section('scripts')
<script text="text/javascript">
  $(document).ready(function () {
        const $imageInput = $('#image_thumb_url');
        const $imagePreview = $('#image-preview');
        const $imagePrevContainer = $('#image-prev-container');
        const $removeButton = $('#remove-image');

        $imageInput.change(function(){
          const file = event.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              $imagePreview.attr('src', e.target.result);
              $imagePrevContainer.removeClass('hidden');
            }
            reader.readAsDataURL(file);
          }
        })

        $removeButton.click(function(){
          $imageInput.val('');
          $imagePrevContainer.addClass('hidden');
          $imagePreview.attr('src', '');
        })
    });
</script>
@endsection