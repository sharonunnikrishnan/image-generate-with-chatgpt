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

                <form id="userForm" enctype="multipart/form-data" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Name
                            </label>
                            <input type="text" name="name" value="{{ $user->name }}"
                                class="w-full border rounded-lg p-2">
                            <span class="text-red-500 text-sm error-name"></span>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Email
                            </label>
                            <input type="text" name="email" value="{{ $user->email }}"
                                class="w-full border rounded-lg p-2">
                            <span class="text-red-500 text-sm error-email"></span>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Password
                            </label>
                            <input type="password" name="password" placeholder="Leave blank to keep existing password"
                                class="w-full border rounded-lg p-2">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Phone
                            </label>
                            <input type="text" name="phone" class="w-full border rounded-lg p-2"
                                value="{{ $user->phone }}">
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Gender
                            </label>

                            <div class="flex gap-6">

                                <label>
                                    <input type="radio" name="gender" value="male"
                                        {{ $user->gender == 'male' ? 'checked' : '' }}>
                                    Male
                                </label>

                                <label>
                                    <input type="radio" name="gender" value="female"
                                        {{ $user->gender == 'female' ? 'checked' : '' }}>
                                    Female
                                </label>

                                <label>
                                    <input type="radio" name="gender" value="other"
                                        {{ $user->gender == 'other' ? 'checked' : '' }}>
                                    Other
                                </label>

                            </div>
                        </div>

                        <!-- Department -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Department
                            </label>
                            <input type="text" name="department" class="w-full border rounded-lg p-2"
                                value="{{ $user->department }}">
                        </div>

                        <!-- Joining Date -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Joining Date
                            </label>
                            <input type="date" name="joining_date" class="w-full border rounded-lg p-2"
                                value="{{ $user->joining_date }}">
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Role
                            </label>

                            <select name="role" class="w-full border rounded-lg p-2">

                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                                    User
                                </option>

                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>

                            </select>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Status
                            </label>

                            <select name="status" class="w-full border rounded-lg p-2">

                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>
                        </div>

                        <!-- Photo -->
                        <div>
                            <label class="block mb-2 text-sm font-medium">
                                Photo
                            </label>

                            @if ($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}"
                                    class="w-24 h-24 rounded mb-3 object-cover">
                            @endif

                            <input type="file" name="photo" class="w-full border rounded-lg p-2">
                        </div>

                    </div>

                    <!-- Address -->
                    <div class="mt-6">
                        <label class="block mb-2 text-sm font-medium">
                            Address
                        </label>

                        <textarea name="address" rows="3" class="w-full border rounded-lg p-2">{{ $user->address }}</textarea>
                    </div>

                    <!-- Skills -->
                    <div class="mt-6">
                        <label class="block mb-2 text-sm font-medium">
                            Skills
                        </label>

                        @php
                            $skills = $user->skills ?? [];
                        @endphp

                        <div class="flex gap-4 flex-wrap">

                            <label>
                                <input type="checkbox" name="skills[]" value="PHP"
                                    {{ in_array('PHP', $skills) ? 'checked' : '' }}>
                                PHP
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="Laravel"
                                    {{ in_array('Laravel', $skills) ? 'checked' : '' }}>
                                Laravel
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="React"
                                    {{ in_array('React', $skills) ? 'checked' : '' }}>
                                React
                            </label>

                            <label>
                                <input type="checkbox" name="skills[]" value="MySQL"
                                    {{ in_array('MySQL', $skills) ? 'checked' : '' }}>
                                MySQL
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

    <script>
        document.getElementById('userForm').addEventListener('submit', async function(e) {

            e.preventDefault();

            // Clear old errors
            document.querySelectorAll('[class*="error-"]').forEach(el => {
                el.innerHTML = '';
            });

            let formData = new FormData(this);

            const response = await fetch(
                "{{ route('users.update', $user->id) }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

            const data = await response.json();

            if (data.errors) {

                for (let field in data.errors) {
                    document.querySelector('.error-' + field).innerHTML =
                        data.errors[field][0];
                }

                return;
            }

            document.getElementById('success-message').classList.remove('hidden');
            document.getElementById('success-message').innerHTML = data.message;

        });
    </script>

</x-app-layout>
