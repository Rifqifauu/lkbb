<x-filament::page>
    <div 
        x-data="{ mainTab: 'utama', aspekTab: '{{ array_key_first($this->getAspek()) }}' }" 
        class="space-y-6"
    >
        <!-- Main Tabs -->
        <div class="flex border-b border-gray-300 dark:border-gray-700 space-x-2">
            <button 
                @click="mainTab='utama'" 
                :class="mainTab==='utama' 
                    ? 'border-b-2 border-primary-500 text-primary-600 dark:text-primary-400' 
                    : 'text-gray-600 dark:text-gray-300'" 
                class="px-4 py-2 font-medium"
            >
                Ranking Utama
            </button>
            <button 
                @click="mainTab='umum'" 
                :class="mainTab==='umum' 
                    ? 'border-b-2 border-primary-500 text-primary-600 dark:text-primary-400' 
                    : 'text-gray-600 dark:text-gray-300'" 
                class="px-4 py-2 font-medium"
            >
                Ranking Umum
            </button>
            <button 
                @click="mainTab='aspek'" 
                :class="mainTab==='aspek' 
                    ? 'border-b-2 border-primary-500 text-primary-600 dark:text-primary-400' 
                    : 'text-gray-600 dark:text-gray-300'" 
                class="px-4 py-2 font-medium"
            >
                Juara Per Aspek
            </button>
        </div>

        <!-- Ranking Utama -->
        <div x-show="mainTab==='utama'" class="mt-4">
            <h2 class="font-bold text-lg mb-2 text-gray-800 dark:text-gray-200">Ranking Utama</h2>
            <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="border px-4 py-2 dark:border-gray-700">No</th>
                        <th class="border px-4 py-2 dark:border-gray-700">Nama Peserta</th>
                        <th class="border px-4 py-2 dark:border-gray-700">Tingkat</th>
                        <th class="border px-4 py-2 dark:border-gray-700">Total Nilai Utama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getUtama() as $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $item->peserta->nama }}</td>
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $item->peserta->tingkat }}</td>
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $item->total_utama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Ranking Umum -->
        <div x-show="mainTab==='umum'" class="mt-4">
            <h2 class="font-bold text-lg mb-2 text-gray-800 dark:text-gray-200">Ranking Umum</h2>
            <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="border px-4 py-2 dark:border-gray-700">No</th>
                        <th class="border px-4 py-2 dark:border-gray-700">Nama Peserta</th>
                        <th class="border px-4 py-2 dark:border-gray-700">Tingkat</th>
                        <th class="border px-4 py-2 dark:border-gray-700">Total Nilai Umum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getUmum() as $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $item->peserta->nama }}</td>
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $item->peserta->tingkat }}</td>
                            <td class="border px-4 py-2 dark:border-gray-700">{{ $item->total_umum }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Juara Per Aspek -->
        <div x-show="mainTab==='aspek'" class="mt-4">
            <h2 class="font-bold text-lg mb-2 text-gray-800 dark:text-gray-200">Juara Per Aspek</h2>

            <!-- Sub-tabs per aspek -->
            <div class="flex border-b border-gray-200 dark:border-gray-700 space-x-2">
                @foreach ($this->getAspek() as $key => $label)
                    <button 
                        @click="aspekTab='{{ $key }}'" 
                        :class="aspekTab==='{{ $key }}' 
                            ? 'border-b-2 border-green-500 text-green-600 dark:text-green-400' 
                            : 'text-gray-600 dark:text-gray-300'" 
                        class="px-3 py-1 font-medium text-sm"
                    >
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <!-- Tabel tiap aspek -->
            @foreach ($this->getAspek() as $key => $label)
                <div x-show="aspekTab==='{{ $key }}'" class="mt-4">
                    <table class="w-full table-auto border-collapse border border-gray-200 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-800">
                                <th class="border px-4 py-2 dark:border-gray-700">Juara</th>
                                <th class="border px-4 py-2 dark:border-gray-700">Nama Peserta</th>
                                <th class="border px-4 py-2 dark:border-gray-700">Tingkat</th>
                                <th class="border px-4 py-2 dark:border-gray-700">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->getJuaraPerAspek()[$label] as $index => $item)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                    <td class="border px-4 py-2 dark:border-gray-700">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-700">{{ $item->peserta->nama }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-700">{{ $item->peserta->tingkat }}</td>
                                    <td class="border px-4 py-2 dark:border-gray-700">{{ $item->$key }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</x-filament::page>
