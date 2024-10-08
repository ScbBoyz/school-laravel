<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Halaman Tambah Student
                </h2>
                <div class="text-sm text-gray-500">Halaman untuk menambahkan Data Student</div>
            </div>
            <div>
                <a href="{{ route('student.index') }}"
                    class="bg-blue-950 text-white rounded-md py-2 px-4 text-sm">Kembali</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        @if ($errors->any())
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Terjadi Kesalahan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('student.store') }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <div class="mt-5">
                                <label for="nip"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nip</label>
                                <input type="text" name="nip"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="Masukkan Nip" required autocomplete="off"/>
                            </div>
                            <div class="mt-5">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="Masukkan Name" required autocomplete="off"/>
                            </div>
                            <div class="mt-5">
                                <label for="class_number" class="block mb-2 text-sm font-medium text-gray-900">Class Number</label>
                                <select class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="class_id" name="class_id" required>
                                    <option value="">Select Class Number</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                            {{ $class->class_number }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="text" name="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="Masukkan Phone" required autocomplete="off"/>
                            </div>
                            <div class="mt-5">
                                <label for="gender"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                <input type="text" name="gender"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="Masukkan Gender" required autocomplete="off"/>
                            </div>
                        </div>
                        <button type="submit"
                            class="mt-4 text-white bg-blue-950 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
