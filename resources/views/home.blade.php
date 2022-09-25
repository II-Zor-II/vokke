@extends('layouts.app')

@section('content')


<div class="container bg-light">
    <div class="text-center position-fixed container hidden" id="add-success-alert">
        <div class="flex border-2 border-success bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700 w-50 d-inline-block" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="text-center">
                <span class="font-medium text-center">Successfully Saved.</span>
            </div>
        </div>
    </div>
    <div class="text-center position-fixed container hidden" id="update-success-alert">
        <div class="flex border-2 border-success bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700 w-50 d-inline-block" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="text-center">
                <span class="font-medium text-center">Successfully Updated.</span>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="mt-10 sm:mt-0">
            <div class="grid grid-cols-3">
                <div>
                    <div class="errors container p-5 mr-2 mt-5 hidden">
                        <ul id="errors-left" class="p-4 bg-red-100 border border-red-400 text-red-700 list-disc">
                        </ul>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Add Kangaroo</h3>
                    </div>
                    <form action="#" method="POST" id="kangaroo-form">
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
                                            <option>Not friendly</option>
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
                            <div class="0 px-4 py-3 text-right sm:px-6">
                                <button id="add-kangaroo-button" type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                <button id="update-kangaroo-button" type="submit" class="hidden inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="errors container p-5 mr-2 mt-5 hidden">
                    <ul id="errors-right" class="p-4 bg-red-100 border border-red-400 text-red-700 list-disc">
                    </ul>
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
