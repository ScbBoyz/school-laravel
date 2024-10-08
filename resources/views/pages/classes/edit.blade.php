<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Halaman Edit Classes
                </h2>
                <div class="text-sm text-gray-500">Halaman untuk mengedit Data Classes</div>
            </div>
            <div>
                <a href="{{ route('classes.index') }}" class="bg-blue-950 text-white rounded-md py-2 px-4 text-sm">Kembali</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('classes.update', $class->id) }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        @method('PUT')
                        <div class="mt-5">
                            <label for="class_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class Number</label>
                            <input type="text" name="class_number"
                                value="{{ old('class_number', $class->class_number) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Masukkan Class Number" required autocomplete="off"/>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="bg-blue-950 text-white rounded-md py-2 px-4 text-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
