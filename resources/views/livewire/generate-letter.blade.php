<div class="container" x-data="{
        progress: 0
    }">
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <form wire:submit.prevent="saveUserData">
            @if($step === 1)
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="firstName">First name</label>
                        <input placeholder="John" id="firstName"
                               type="text"
                               wire:model="askUserDataForm.firstName"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="lastName">Last name</label>
                        <input placeholder="Doe" id="lastName"
                               type="text"
                               wire:model="askUserDataForm.lastName"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="phone">Phone</label>
                        <input placeholder="06 56 98 78 52" id="phone"
                               type="text"
                               wire:model="askUserDataForm.phone"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="email">Email</label>
                        <input placeholder="john.doe@example.com" id="email"
                               type="email"
                               wire:model="askUserDataForm.email"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button

                    type="button"
                        wire:click="nextStep"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Suivant
                    </button>
                </div>

            @elseif($step === 2)
                <div class="relative">
                    <label class="text-gray-700 dark:text-gray-200" for="address">Address</label>
                    <div class="flex  mt-2  items-center justify-between w-full">
                        <input id="address"
                               type="text"
                               autocomplete="false"
                               wire:change.debounce.500="handleAddressChange($event.target.value)"
                               class="block flex-1 w-full px-4 py-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        <button class="bg-green-500 px-4 py-2 rounded-md ml-1" disabled>Touver</button>
                    </div>
                    @if(count($addresses)>0)
                        <div class="absolute top-[110%] left-0 w-full bg-white dark:bg-gray-800 dark:text-green-50 z-10 rounded-md border  dark:border-gray-600">
                            @foreach($addresses as $address)
                                <p wire:click="selectAddress('{{$address['properties']['id']}}')" class="cursor-pointer hover:bg-gray-700 p-2 dark:text-green-50">{{$address['properties']['label']}}</p>
                            @endforeach
                        </div>
                        @endif
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" wire:click="previousStep"
                            class="px-8 mr-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Précédent
                    </button>
                    <button type="button" wire:click="nextStep"
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Suivant
                    </button>
                </div>
            @elseif($step === 3)
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="departement">Departement</label>
                        <input
                               placeholder="94"
                               id="departement"
                               type="number"
                               wire:model="askUserDataForm.departmentNumber"
                               wire:change="handleDepartmentChange"
                               class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="Ton élu">Ton élu</label>
                        <select
                                id="Ton élu"
                                type="text"
                                wire:model="askUserDataForm.eluId"
                                wire:change="handleEluChange($event.target.value)"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                            <option selected>Choisis ton élu</option>
                            @foreach($elus as $elu)
                                <option value="{{ $elu->id }}">{{ $elu->full_name }} {{$elu->constituency}}e circonscription</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" wire:click="previousStep"
                            class="px-8 mr-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Précédent
                    </button>
                    <button
                        type="button"
                        wire:click="nextStep"
                        class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Suivant
                    </button>
                </div>
            @elseif($step === 4)
                <h4 class="font-semibold text-3xl text-center block mb-4 dark:text-green-50">Récapitulons</h4>
                <div>
                    <p class="dark:text-green-50">Tu as choisi la lettre: {{$letter->title}}</p>
                    @if($personality)
                        <p class="dark:text-green-50">Ton élu est: {{$personality->full_name}} de la {{$personality->constituency}}e circonscription du département {{$askUserDataForm->departmentNumber}}</p>
                    @endif
                </div>
                <div class="flex justify-end mt-6">
                    <button type="button" wire:click="previousStep"
                            class="px-8 mr-4 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Précédent
                    </button>
                    <button type="submit"
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                        Valider
                    </button>
                </div>
            @elseif($step === 5)
                <a class="bg-green-500 text-green-50 rounded-md px-4 py-2" download href="{{asset($letterPath)}}">Télécharge ta lettre</a>
            @endif
        </form>
    </section>

    <div class="relative w-full h-2 overflow-hidden  rounded-full mt-12">
        <span :style="'width:' + {{ 100 / $totalSteps * $step }} + '%'"
              class="absolute w-24 h-full duration-300 bg-green-500 ease"></span>
    </div>
</div>
