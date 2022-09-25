@extends('layouts.app')

@section('content')
<div class="container bg-light">
    <div class="row justify-content-center">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Add Kangaroo</h3>
                    </div>
                    <form action="#" method="POST">
                        <div class="overflow-hidden shadow sm:rounded-md bg-info rounded mb-3">
                            <div class="bg-info px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6 ">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700 mr-2">Name</label>
                                        <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="nickname" class="block text-sm font-medium text-gray-700 mr-2">Nickname</label>
                                        <input type="text" name="nickname" id="nickname" autocomplete="family-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="gender" class="block text-sm font-medium text-gray-700 mr-2">Gender</label>
                                        <select id="gender" name="gender" autocomplete="on" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="friendliness" class="block text-sm font-medium text-gray-700 mr-2">Friendliness</label>
                                        <select id="friendliness" name="friendliness" autocomplete="on" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option>Friendly</option>
                                            <option>Not Friendly</option>
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="weight" class="block text-sm font-medium text-gray-700 mr-2">Weight (kg) </label>
                                        <input type="number" step="0.01" name="weight" id="weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="height" class="block text-sm font-medium text-gray-700 mr-2">Height (ft) </label>
                                        <input type="number" step="0.01" name="height" id="height" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="birthday" class="block text-sm font-medium text-gray-700 mr-2">Birthday</label>
                                        <input type="date" name="birthday" id="birthday" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button id="add-kangaroo-button" type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- show users kangaroo list-->
        <div class="user-kangaroo-container dx-viewport">
            <div id="user-kangaroo-grid"></div>
        </div>
    </div>
</div>
@endsection
