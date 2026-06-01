<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!--contents-->
                <div class="p-8">
                    <div class="max-w-7xl mx-auto sm:p-6 lg:p-8">

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                            <!-- Box 1 -->
                            <div class="bg-white rounded-lg shadow-md border p-6 h-40 flex flex-col justify-between">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    Generate Image
                                </h3>

                                <a href="/admin/generate"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                                    Generate Image
                                </a>
                            </div>

                            <!-- Box 2 -->
                            <div class="bg-white rounded-lg shadow-md border p-6 h-40">
                            </div>

                            <!-- Box 3 -->
                            <div class="bg-white rounded-lg shadow-md border p-6 h-40">
                            </div>

                            <!-- Box 4 -->
                            <div class="bg-white rounded-lg shadow-md border p-6 h-40">
                            </div>

                        </div>

                    </div>
                </div>
                <!--contents-->
            </div>
        </div>
    </div>
</x-app-layout>
