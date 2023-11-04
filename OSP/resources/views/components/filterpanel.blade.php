{{-- offers --}}
@props(['allOffers','offers', 'selections'])


<?php
$offers = $offers->toArray();
//get the labels for the filters we want and the options for the filter values
$filters = [];
$filterNames = ['type', 'species', 'strain', 'sex', 'vital_status', 'organisation', 'expiration_date', 'euthanasia_method'];

// Initialize the filters array with the desired order
foreach ($filterNames as $filterName) {
    $filters[$filterName] = [];
}

// Loop through the offers and add the values to the filters array
foreach ($allOffers as $key => $value) {
    $offer = [$value->toArray()];
    
    foreach ($offer as $key => $value) {
        
        foreach ($value as $propertyName => $propertyValue) {
            if (in_array($propertyName, $filterNames)) {
            if (!array_key_exists($propertyName, $filters)) {
                $filters[$propertyName] = [];
            }
            // Check if the value is an array and it has a 'name' key
            if (is_array($propertyValue) && isset($propertyValue['name'])) {
                $propertyValue = $propertyValue['name']; // Use the 'name' as the value
            }
            if (!in_array($propertyValue, $filters[$propertyName])) {
                array_push($filters[$propertyName], $propertyValue);
            }
        }
        }
    }
}

?>


<div class="flex flex-col text-left items-start justify-start "> 

    <h2 class=" text-left mb-5 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">FILTERS</h2>
    @foreach ($filters as $filter => $options)
        @if  ($filter == 'expiration_date')
            <div x-data="{ show: false }"
                class="flex flex-col rounded-xl hover:border-t hover:border-blue-700 w-full py-2 mb-5  bg-gray-100"
                >

                {{-- label --}}
                <span class="flex justify-between">
                    <button class="flex font-bold text-left text-blue-700  px-3 py-1 flex-grow w-full items-center"
                        @click="show = !show"> Expiration
                        <span class="ml-auto mr-5 flex items-center">
                            <!-- Expand icon, show/hide based on section open state. -->
                            <svg x-show="!show" class="h-5 w-5 text-blue-700" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                            <!-- Collapse icon, show/hide based on section open state. -->
                            <svg x-show="show" class="h-5 w-5 text-blue-700" style="display:none" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </span>

                {{-- options --}}
                <div x-show="show" style="display:none; display:flex; flex-direction:column ">
                    <a @click="show = !show"
                        class="inline-block w-full p-2 py-1 mx-3 my-1 hover:text-blue-700 hover:font-bold hover:cursor-pointer"
                        href="/">All</a>

                    <a @click="show = !show"
                        class="inline-block w-full p-2 py-1 mx-3 my-1 hover:text-blue-700 hover:font-bold hover:cursor-pointer"
                        href="/expiration/available">Available</a>
                    <a @click="show = !show"
                        class="inline-block w-full p-2 py-1 mx-3 my-1 hover:text-blue-700 hover:font-bold hover:cursor-pointer"
                        href="/expiration/expired">Expired</a>
                </div>
            </div>

        @else
            <!-- 
            This code is part of a dropdown filter panel. 

            1. A SVG icon is displayed based on the state of the 'show' variable.
            2. The 'show' variable is toggled when the button is clicked.
            3. When 'show' is true, a div containing filter options is displayed. The div has a maximum height and is scrollable.
            4. Each filter option is represented by an anchor tag, generated inside a foreach loop.
            5. The anchor tag's href attribute is dynamically generated to include the current filter and option as query parameters.
            6. The displayed text of the option is capitalized using the 'ucwords' function.
            7. The text color of the selected filter option is changed to blue.
            -->

            <div x-data="{ show: false }"
                class="flex flex-col rounded-xl hover:border-t hover:border-blue-700 w-full py-2 mb-5  bg-gray-100"
                >

                {{-- label --}}
                <span class="flex justify-between">
                    <button class="flex font-bold text-left text-blue-700  px-3 py-1 flex-grow w-full items-center"
                        @click="show = !show"> {{ ucwords(str_replace('_', ' ', $filter)) }}
                        <span class="ml-auto mr-5 flex items-center">
                            <!-- Expand icon, show/hide based on section open state. -->
                            <svg x-show="!show" class="h-5 w-5 text-blue-700" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                            <!-- Collapse icon, show/hide based on section open state. -->
                            <svg x-show="show" class="h-5 w-5 text-blue-700" style="display:none"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </span>

                {{-- options --}}
                <div x-show="show" class=" overflow-x-hidden whitespace-wrap overflow-auto max-h-52" style="display:none; display:flex; flex-direction:column ">
                    {{-- <a @click="show = !show"
                        class="inline-block w-full p-2 py-1 mx-3 my-1 hover:text-blue-700 hover:font-bold hover:cursor-pointer"
                        href="/">All</a> --}}
                  
                    @foreach ($options as $option)
                    <a @click="show = !show"
                            class="inline-block w-full p-2 py-1 mx-3 my-1 hover:text-blue-700 hover:font-bold hover:cursor-pointer {{request($filter) == $option ? 'text-blue-700' : '' }}"
                            href="/?{{$filter}}={{$option}}&{{http_build_query(request()->except($filter, 'page'))}}">{{ ucwords($option) }}</a>
                            
                    @endforeach

                </div>
            </div>
        @endif
    @endforeach
</div>





{{-- @foreach ($filters as $filter => $options)
    
    @if ($filter == 'is_living')
        <div class="flex flex-col items-start justify-start my-4 w-full">
            <label for="Living?" class="font-bold text-blue-700 mb-1">Alive?</label>
            <select id="Living?" class="form-select rounded-lg border border-blue-100 w-full py-1 ">
                <option value="">All</option>
                <option value="0">Dead</option>
                <option value="1">Alive</option>
            </select>
        </div>

    @elseif ($filter == 'expiration_date')
    <div class="flex flex-col items-start justify-start my-4 w-full">
            <label for="{{$filter}}" class="font-bold text-blue-700 mb-1">Expiration</label>
            <select id="{{$filter}}" class="form-select rounded-lg border border-blue-100 w-full py-1">
                <option value="">All</option>
                <option value="0">Expired</option>
                <option value="1">Available</option>
            </select>
        </div>
    @elseif ($filter == 'killing_method')
    <div class="flex flex-col items-start justify-start my-4 w-full">
            <label for="{{$filter}}" class="font-bold text-blue-700 mb-1">Killing method</label>
            <select id="{{$filter}}" class="form-select rounded-lg border border-blue-100 w-full py-1">
                <option value="0">All</option>
                @foreach ($options as $option)
                    <option value={{$option}}>{{ucwords($option)}}</option>
                @endforeach
            </select>
        </div>
    @elseif ($filter == 'sex')
    <div class="flex flex-col items-start justify-start my-4 w-full">
            <label for="{{$filter}}" class="font-bold text-blue-700 mb-1">Sex</label>
            <select id="{{$filter}}" class="form-select rounded-lg border border-blue-100 w-full py-1">
                <option value="">All</option>
                <option value="0">Female</option>
                <option value="1">Male</option>
            </select>
        </div>
    @else
    <div class="flex flex-col items-start justify-start my-4 w-full">
            <label for="{{$filter}}" class="font-bold text-blue-700 mb-1">{{ucwords($filter)}}</label>
            <select id="{{$filter}}" class="form-select rounded-lg border border-blue-100 w-full py-1">
                <option value="0">All</option>
                @foreach ($options as $option)
                    <option value={{$option}}>{{ucwords($option)}}</option>
                @endforeach
            </select>
        </div> 
    @endif

@endforeach
   --}}
