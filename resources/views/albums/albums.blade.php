@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <header class="relative flex items-center justify-center">
        <h1 class="text-4xl text-slate-200 font-bold text-center leading-10">Albums</h1>
        <button type="button"
            class="absolute top-0 right-0 me-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg
                class="w-3.5 h-3.5 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>Album</button>
    </header>

    <div class="mt-20 px-4 flex flex-col md:items-center gap-y-14">
        @forelse($albums as $album)
        <div
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full dark:border-gray-700 dark:bg-gray-800">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none"
                src="{{ $album->image_url }}" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal w-full">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $album->name }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $album->description }}</p>
                <div class="flex flex-row gap-x-4 justify-end mt-4">
                    <button type="button"
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">View
                        Photos (0)</button>
                    <button type="button"
                        class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Edit</button>
                    <button type="button"
                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                </div>
            </div>
        </div>
        @empty
        <p>No albums found.</p>
        @endforelse
    </div>

    @endsection