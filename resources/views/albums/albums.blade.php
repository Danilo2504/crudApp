@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <header class="relative flex items-center justify-center mb-20">
        <h1 class="text-4xl text-slate-200 font-bold text-center leading-10">Albums</h1>
        <button type="button"
            class="absolute top-0 right-0 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg
                class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>Album</button>
    </header>
    @if (session('success'))
    <div id="success-message"
        class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
        role="alert">
        {{ session('success') }}
        <button type="button" id="dismiss-button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif
    <div class="flex flex-col md:items-center relative gap-y-14">
        @forelse($albums as $album)
        <div id="album-{{ $album->id }}"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full dark:border-gray-700 dark:bg-gray-800">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none"
                alt="{{ $album->name }}" src="{{ $album->image_url }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal w-full">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$album->name}}
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $album->description }}</p>
                <div class="flex flex-row gap-x-4 justify-end mt-4">
                    <button type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg inline-flex items-center text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 me-2" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>View
                        Photos (0)</button>
                    <a type="button" href="{{ route('albums.edit', $album) }}"
                        class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg inline-flex items-center text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                            <path d="M13.5 6.5l4 4" />
                        </svg>Edit</a>
                    <form method="POST" action="{{ route('albums.destroy', $album) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg inline-flex items-center text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 me-2" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p>No albums found.</p>
        @endforelse
    </div>
</div>
@endsection

@section('scripts')
<script text="text/javascript">
    $(document).ready(function () {
        const dismissButton = $('#dismiss-button');
        dismissButton.on('click', function () {
            $('#success-message').hide();
        });
    });
</script>
@endsection