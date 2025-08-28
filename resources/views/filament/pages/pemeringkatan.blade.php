<x-filament::page>
    <div x-data="{ tab: 'utama' }" class="space-y-4">
        <!-- Tabs -->
        <div class="flex border-b border-gray-300">
            <button
                @click="tab = 'utama'"
                :class="tab === 'utama' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-500'"
                class="px-4 py-2 font-medium"
            >
                Utama
            </button>
            <button
                @click="tab = 'umum'"
                :class="tab === 'umum' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-500'"
                class="px-4 py-2 font-medium"
            >
                Umum
            </button>
        </div>

        <!-- Content -->
        <div x-show="tab === 'utama'">
            <table class="w-full table-auto border-collapse border border-gray-200 mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Peserta</th>
                        <th class="border px-4 py-2">Tingkat</th>
                        <th class="border px-4 py-2">Nilai Utama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getUtama() as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->peserta->nama }}</td>
                            <td class="border px-4 py-2">{{ $item->peserta->tingkat }}</td>
                            <td class="border px-4 py-2">{{ $item->total_utama }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div x-show="tab === 'umum'">
            <table class="w-full table-auto border-collapse border border-gray-200 mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Peserta</th>
                        <th class="border px-4 py-2">Tingkat</th>
                        <th class="border px-4 py-2">Nilai Umum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->getUmum() as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->peserta->nama }}</td>
                            <td class="border px-4 py-2">{{ $item->peserta->tingkat }}</td>
                            <td class="border px-4 py-2">{{ $item->total_umum }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament::page>
