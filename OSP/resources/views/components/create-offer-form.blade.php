@props(['allOffers'])

<?php
//get the labels for the filters we want and the options for the filter values
$propertiess = [];
$properties = ['type', 'species', 'strain', 'sex', 'vital_status', 'organisation', 'expiration_date', 'euthanasia_method'];

// Initialize the filters array with the desired order
foreach ($properties as $propertyName) {
    $propertiess[$propertyName] = [];
}

// Loop through the offers and add the values to the filters array
foreach ($allOffers as $key => $value) {
    $offer = [$value->toArray()];

    foreach ($offer as $key => $value) {
        foreach ($value as $propertyName => $propertyValue) {
            if (in_array($propertyName, $properties)) {
                if (!array_key_exists($propertyName, $properties)) {
                    $properties[$propertyName] = [];
                }
                // Check if the value is an array and it has a 'name' key
                if (is_array($propertyValue) && isset($propertyValue['name'])) {
                    $propertyValue = $propertyValue['name']; // Use the 'name' as the value
                }
                if (!in_array($propertyValue, $properties[$propertyName])) {
                    array_push($properties[$propertyName], $propertyValue);
                }
            }
        }
    }
}

?>

<div
    class=" w-full  col-span-4 bg-white rounded-2xl shadow dark:border dark:bg-gray-800 dark:border-gray-700 px-10 mx-25">
    <div class="p-10 space-y-4 md:space-y-6 sm:p-8">


        <!--
                        1. The form includes fields for email and password confirmation.
                        2. Each field is wrapped in a div, with a label and an input element.
                        3. The 'required' attribute is used to ensure that the user fills in all fields.
                        -->
        <form action="/create-offer" method="post" class="flex flex-col space-y-5 md:space-y-6">

            {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
            @csrf

            <div class="flex 0">
                {{-- left part --}}
                <div class="flex flex-col flex-grow">

                    {{-- type --}}
                    <div class="mb-5">
                        <label for="type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select required name="type" id="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Choose offer or request">
                            <option value=""></option>
                            @foreach ($properties['type'] as $type)
                                <option value="{{ $type }}">{{ ucwords($type) }}</option>
                            @endforeach
                        </select>
                        @error('type')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Species --}}
                    <div class="mb-5">
                        <label for="species"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Species</label>
                        <select required name="species" id="species"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""></option>
                            @foreach ($properties['species'] as $species)
                                <option value="{{ $species }}">{{ ucwords($species) }}</option>
                            @endforeach
                        </select>
                        @error('species')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- strain --}}
                    <div class="mb-5">
                        <label for="strain"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Strain</label>
                        <select required name="strain" id="strain"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""></option>
                            @foreach ($properties['strain'] as $strain)
                                <option value="{{ $strain }}">{{ ucwords($strain) }}</option>
                            @endforeach
                        </select>
                        @error('strain')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- genetics --}}
                    <div class="mb-5">
                        <label for="genetics"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genetics</label>
                        <input required type="genetics" name="genetics" id="genetics"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="e.g. Clec4g-iCre wt/wt" required="" value="{{ old('genetics') }}">
                        {{-- this will set the default value of the input equal to the valueit had before --}}

                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                        @error('genetics')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- middle part --}}
                <div class="flex flex-col flex-grow pl-10">
                    {{-- sex --}}
                    <div class="mb-5">
                        <label for="sex"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
                        <select required name="sex" id="sex"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""></option>
                            @foreach ($properties['sex'] as $sex)
                                <option value="{{ $sex }}">{{ ucwords($sex) }}</option>
                            @endforeach
                        </select>
                        @error('sex')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- date of birth --}}
                    <div class="mb-5">
                        <label for="dob" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date
                            Of Birth</label>
                        <input type="date" name="dob" id="dob"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('dob')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- vital status --}}
                    <div class="mb-5">
                        <label for="vital_status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vital Status</label>
                        <select required name="vital_status" id="vital_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""></option>
                            @foreach ($properties['vital_status'] as $vital_status)
                                <option value="{{ $vital_status }}">{{ ucwords($vital_status) }}</option>
                            @endforeach
                        </select>
                        @error('vital_status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- remoevd organs --}}
                    <div class="mb-5">
                        <label for="removed_organs"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Removed Organs</label>
                        <input required type="text" name="removed_organs" id="removed_organs"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="which organs have already been removed?" required autocomplete="off"
                            value="{{ old('removed_organs') }}"> {{-- this will set the default value of the input equal to the valueit had before --}}

                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                        @error('removed_organs')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>




                </div>

                {{-- right part --}}
                <div class="flex flex-col flex-grow pl-10">
                    {{-- amount --}}
                    <div class="mb-5">
                        <label for="amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of
                            animals</label>
                        <input required type="number" name="amount" id="amount" min="1" max="1000"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="How many animals?" required autocomplete="off"
                            value="{{ old('removed_organs') }}"> {{-- this will set the default value of the input equal to the valueit had before --}}

                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                        @error('amount')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- euthanasia_method --}}
                    <div class="mb-5">
                        <label for="euthanasia_method"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Euthanasia
                            Method</label>
                        <select required name="euthanasia_method" id="euthanasia_method"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""></option>
                            @foreach ($properties['euthanasia_method'] as $euthanasia_method)
                                <option value="{{ $euthanasia_method }}">{{ ucwords($euthanasia_method) }}</option>
                            @endforeach
                        </select>
                        @error('euthanasia_method')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- expiration date --}}
                    <div class="mb-5">
                        <label for="expiration"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Until when is the
                            offer valid?</label>
                        <input type="date" name="expiration" id="expiration"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('expiration')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- organisation --}}
                    <div class="mb-5">
                        <label for="organisation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Organisation</label>
                        <input required type="text" name="organisation" id="organisation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Which organisation are you from?" required autocomplete="off"
                            value="{{ old('removed_organs') }}"> {{-- this will set the default value of the input equal to the valueit had before --}}

                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                        @error('organisation')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- location --}}
                    <div class="mb-5">
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input required type="text" name="location" id="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Where are the animals currently?" required autocomplete="off"
                            value="{{ old('removed_organs') }}"> {{-- this will set the default value of the input equal to the valueit had before --}}

                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                        @error('location')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                    placeholder="Give a detailed description of the animals and the offer..." required></textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>



            {{-- submit button --}}
            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-4 ">Submit
                your offer</button>




        </form>

    </div>
</div>

</div>
