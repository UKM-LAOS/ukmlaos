@extends('layouts.course.back')

@section('content')
    <div class="mt-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Pengaturan Profil</h2>

        <div class="bg-white dark:bg-gray-800/60 rounded-lg shadow">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Avatar Upload Section -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-4">Foto Profil</h3>

                    <div class="flex items-center">
                        <div class="mr-4">
                            <div class="avatar">
                                <div class="h-20 w-20 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                    <img id="avatar-preview" class="h-full w-full object-cover"
                                        src="{{ Auth::user()?->avatar_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&background=16a34a&color=fff&bold=true&font-family=Poppins&size=128' }}"
                                        alt="Avatar">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="avatar"
                                class="cursor-pointer px-4 py-2 text-sm rounded-md text-white bg-green-500 hover:bg-[#16A34A] transition-all duration-300 focus:outline-none">
                                Pilih Foto
                            </label>
                            <input id="avatar" name="avatar" type="file" accept="image/*" class="sr-only"
                                onchange="previewImage()">
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                JPG, PNG, atau GIF (Maks. 2MB)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Personal Information Section -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                value="{{ ucwords(auth()->user()->name) ?? '' }}">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <input type="email" name="email" id="email"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                value="{{ auth()->user()->email ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- Occupation Section -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <label for="occupation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Pekerjaan
                        </label>
                        <input type="text" name="occupation" id="occupation"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            value="{{ auth()->user()->occupation ?? '' }}">
                    </div>
                </div>

                <!-- Password Section -->
                <div class="p-6">
                    <h3 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-4">Ubah Password</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        Biarkan kosong jika Anda tidak ingin mengubah password Anda.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="current_password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Password Saat Ini
                            </label>
                            <input type="password" name="current_password" id="current_password"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="new_password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Password Baru
                            </label>
                            <input type="password" name="new_password" id="new_password"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <div>
                        <label for="new_password_confirmation"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Konfirmasi Password Baru
                        </label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 bg-gray-100 dark:bg-gray-700/50 text-gray-900 dark:text-white focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex justify-end">
                        <button type="button" onclick="window.history.back()"
                            class="mr-3 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-green-500 hover:bg-[#16A34A] transition-all duration-300 focus:outline-none">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function previewImage() {
            const input = document.getElementById('avatar');
            const preview = document.getElementById('avatar-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
