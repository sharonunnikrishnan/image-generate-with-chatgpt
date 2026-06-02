<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create User
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">User List</h2>

                    <a href="{{ route('users.index') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                        All User
                    </a>
                </div>

                <div id="success-message" class="hidden mb-4 p-4 bg-green-100 text-green-700 rounded">
                </div>

                <div id="error-message" class="hidden mb-4 p-4 bg-red-100 text-red-700 rounded">
                </div>

                <form id="userForm" enctype="multipart/form-data">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Name
                            </label>
                            <input type="text" name="name" class="w-full border rounded-lg p-2">
                            <span class="text-red-500 text-sm error-name"></span>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Email
                            </label>
                            <input type="email" name="email" class="w-full border rounded-lg p-2">
                            <span class="text-red-500 text-sm error-email"></span>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Password
                            </label>
                            <input type="password" name="password" class="w-full border rounded-lg p-2">
                            <span class="text-red-500 text-sm error-password"></span>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Phone
                            </label>
                            <input type="text" name="phone" class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Gender
                            </label>

                            <div class="flex flex-wrap gap-6">

                                <label class="flex items-center">
                                    <input type="radio" name="gender" value="male" class="mr-2">
                                    Male
                                </label>

                                <label class="flex items-center">
                                    <input type="radio" name="gender" value="female" class="mr-2">
                                    Female
                                </label>

                                <label class="flex items-center">
                                    <input type="radio" name="gender" value="other" class="mr-2">
                                    Other
                                </label>

                            </div>
                            <span class="text-red-500 text-sm error-gender"></span>
                        </div>

                        <!-- Department -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Department
                            </label>
                            <input type="text" name="department" class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Joining Date -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Joining Date
                            </label>
                            <input type="date" name="joining_date" class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Role
                            </label>

                            <select name="role" class="w-full border rounded-lg p-2">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Status
                            </label>

                            <select name="status" class="w-full border rounded-lg p-2">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Photo -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Photo
                            </label>

                            <input type="file" name="photo" class="w-full border rounded-lg p-2">
                        </div>

                    </div>

                    <!-- Address -->
                    <div class="mt-6">
                        <label class="block mb-2 text-sm font-medium">
                            Address
                        </label>

                        <textarea name="address" rows="3" class="w-full border rounded-lg p-2"></textarea>
                    </div>

                    <!-- Skills -->
                    <div class="mt-6">
                        <label class="block mb-2 text-sm font-medium">
                            Skills
                        </label>

                        <div class="flex flex-wrap gap-4">

                            <label>
                                <input type="checkbox" name="skills[]" value="PHP">
                                PHP
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="Laravel">
                                Laravel
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="React">
                                React
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="MySQL">
                                MySQL
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="AWS">
                                AWS
                            </label>

                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                            Save User
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- <script>
        $('#userForm').submit(function(e) {

            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('users.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {

                    $('#error-message').addClass('hidden');

                    $('#success-message')
                        .removeClass('hidden')
                        .html(response.message);

                    $('#userForm')[0].reset();
                },

                error: function(xhr) {

                    let errors = xhr.responseJSON.errors;
                    let errorHtml = '';

                    $.each(errors, function(key, value) {
                        errorHtml += value[0] + '<br>';
                    });

                    $('#success-message').addClass('hidden');

                    $('#error-message')
                        .removeClass('hidden')
                        .html(errorHtml);
                }
            });

        });
    </script> --}}

    <script>
        $('#userForm').submit(function(e) {

            e.preventDefault();

            // Clear old errors
            $('[class*="error-"]').html('');

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('users.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {

                    $('#success-message')
                        .removeClass('hidden')
                        .html(response.message);

                    $('#userForm')[0].reset();
                },

                error: function(xhr) {

                    if (xhr.status == 422) {

                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function(key, value) {

                            $('.error-' + key).html(value[0]);

                        });

                    }

                }
            });

        });
    </script>

</x-app-layout>
