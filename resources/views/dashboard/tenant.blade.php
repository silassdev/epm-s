<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tenant Portal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Alert / Announcement -->
            <div class="bg-blue-50 border border-blue-200 text-blue-800 rounded-lg p-4 flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span><strong>Notice:</strong> Power maintenance scheduled for tomorrow 10 AM - 2 PM.</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- My Rent -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">My Rent</h3>
                        <div class="mb-4">
                            <p class="text-gray-500 text-sm">Next Due Date</p>
                            <p class="text-2xl font-bold">12th August, 2026</p>
                        </div>
                        <button class="w-full bg-green-600 text-white font-semibold py-2 px-4 rounded hover:bg-green-700 transition">
                            Pay Rent Now
                        </button>
                    </div>
                </div>

                <!-- Fix Requests -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Maintenance & Fix Requests</h3>
                        <p class="text-gray-500 mb-4">Report plumbing, electrical, or structural faults to the manager.</p>
                        <button class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
                            Log a Request
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
