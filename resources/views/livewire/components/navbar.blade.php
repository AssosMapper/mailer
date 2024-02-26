<nav x-data="{ isOpen: false }" class="container p-6 lg:flex lg:justify-between lg:items-center">
    <div class="flex items-center justify-between">
        <a href="{{route('home')}}" class="font-bold dark:text-green-50 text-lg">
            <span class="font-bold text-green-500 text-xl">I</span>nterpelle <span
                class="font-bold text-green-500 text-xl">T</span>on <span
                class="font-bold text-green-500 text-xl">E</span>lu
        </a>

        <!-- Mobile menu button -->
        <div class="flex lg:hidden">
            <button x-cloak @click="isOpen = !isOpen" type="button"
                    class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                    aria-label="toggle menu">
                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/>
                </svg>

                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
         class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white shadow-md lg:bg-transparent lg:dark:bg-transparent lg:shadow-none dark:bg-gray-900 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
        <div class="flex flex-col space-y-4 lg:mt-0 lg:flex-row lg:-px-8 lg:space-y-0">
            <a class="text-gray-700 transition-colors duration-300 transform lg:mx-8 dark:text-gray-200 dark:hover:text-green-400 hover:text-green-500"
               href="{{route('home')}}">Home</a>
        </div>

        <a class="block px-5 py-2 mt-4 text-sm text-center text-white capitalize bg-green-600 rounded-lg lg:mt-0 hover:bg-green-500 lg:w-auto"
           href="{{route('letters.list')}}">
            Interpeller
        </a>
    </div>
    <div class="hidden">
        {{--        TODO:theme switcher --}}
    </div>
</nav>
