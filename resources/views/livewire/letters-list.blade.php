<div class="container">
    <livewire:search-bar/>
    <div class="flex items-center justify-around flex-wrap">
        @foreach($letters as $letter)
            <div class="w-full max-w-sm px-4 py-3 bg-white hover:bg-gray-50 rounded-md shadow-md dark:bg-gray-800 dark:hover:bg-gray-800/50 transition-all ease-in-out duration-300">
                <div>
                    <h1 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{$letter->title}}</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{$letter->description}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{$letters->links()}}
    </div>
</div>


