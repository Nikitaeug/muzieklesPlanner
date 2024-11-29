<x-app-layout>
    <body class="bg-gray-50 font-sans leading-normal tracking-normal">
        <main class="flex flex-col items-center justify-center py-20">
            <h1 class="text-5xl font-bold text-center mb-4 text-gray-800">Admin Registration</h1>
            <p class="text-lg text-gray-700 mb-8 text-center">Register a new user with roles and attributes.</p>

            <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
                <form method="POST" action="{{ route('admin.register') }}" class="flex flex-col space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" type="email" name="email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Role')" />
                        <select id="role" name="role" required class="block mt-1 w-full" onchange="showAttributes()">
                            <option value="">Select a role</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                            <option value="guardian">Guardian</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Role-specific Attributes -->
                    <div id="role-attributes" class="hidden">
                        <!-- Teacher Attributes -->
                        <div id="teacher-attributes" class="mt-4 hidden">
                            <x-input-label for="specialization" :value="__('Specialization')" />
                            <x-text-input id="specialization" type="text" name="specialization" />
                            <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
                            
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" type="text" name="phone_number" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />

                            <x-input-label for="availability" :value="__('Availability')" />
                            <x-text-input id="availability" type="text" name="availability" />
                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                        </div>

                        <!-- Student Attributes -->
                        <div id="student-attributes" class="mt-4 hidden">
                            <x-input-label for="guardian_id" :value="__('Select Guardian (optional)')" />
                            <select id="guardian_id" name="guardian_id" class="block mt-1 w-full">
                                <option value="">Select a guardian</option>
                                @foreach($guardians as $guardian)
                                    <option value="{{ $guardian->id }}">{{ $guardian->user->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('guardian_id')" class="mt-2" />
                        </div>

                        <!-- Guardian Attributes -->
                        <div id="guardian-attributes" class="mt-4 hidden">
                            <x-input-label for="guardian_phone_number" :value="__('Phone Number')" />
                            <x-text-input id="guardian_phone_number" type="text" name="guardian_phone_number" />
                            <x-input-error :messages="$errors->get('guardian_phone_number')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <x-primary-button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600 transition duration-300">
                        {{ __('Register') }}
                    </x-primary-button>
                </form>
            </div>
        </main>

        <script>
            function showAttributes() {
                const role = document.getElementById('role').value;
                const attributesDiv = document.getElementById('role-attributes');
                const teacherAttributes = document.getElementById('teacher-attributes');
                const studentAttributes = document.getElementById('student-attributes');
                const guardianAttributes = document.getElementById('guardian-attributes');

                attributesDiv.classList.remove('hidden');
                teacherAttributes.classList.add('hidden');
                studentAttributes.classList.add('hidden');
                guardianAttributes.classList.add('hidden');

                if (role === 'teacher') {
                    teacherAttributes.classList.remove('hidden');
                } else if (role === 'student') {
                    studentAttributes.classList.remove('hidden');
                } else if (role === 'guardian') {
                    guardianAttributes.classList.remove('hidden');
                }
            }
        </script>
    </body>
</x-app-layout> 