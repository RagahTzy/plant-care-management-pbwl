@extends('layouts.dashboard')

@section('title', 'Laporan Pertumbuhan - Admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <div class="mb-8">
        <h2 class="text-3xl text-white font-serif font-light tracking-wide">Laporan Pertumbuhan</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
            <div class="flex justify-between items-start mb-2">
                <span class="text-gray-400 text-sm">Total Checkups</span>
                <span class="bg-botanical-accent/20 text-botanical-accent text-xs px-2 py-1 rounded">+24</span>
            </div>
            <div class="flex items-baseline gap-3">
                <h3 class="text-4xl text-white font-light">347</h3>
                <span class="text-botanical-accent text-xs bg-botanical-accent/10 px-2 py-0.5 rounded-full">+12 this month</span>
            </div>
        </div>

        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
            <div class="flex justify-between items-start mb-2">
                <span class="text-gray-400 text-sm">Average Growth</span>
                <span class="bg-botanical-accent/20 text-botanical-accent text-xs px-2 py-1 rounded">Optimal</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-4xl text-white font-light">3.5</h3>
                <span class="text-gray-400 text-sm">cm/month</span>
            </div>
        </div>

        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
            <div class="flex justify-between items-start mb-2">
                <span class="text-gray-400 text-sm">Plants Perawatan</span>
            </div>
            <div class="flex items-baseline gap-2">
                <h3 class="text-4xl text-white font-light">26</h3>
            </div>
        </div>
    </div>

    <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
        <div class="flex gap-6 border-b border-botanical-700 mb-6 pb-2">
            <button class="text-botanical-accent border-b-2 border-botanical-accent pb-2 -mb-[9px] text-sm font-medium">Growth Data</button>
            <button class="text-gray-500 hover:text-gray-300 pb-2 text-sm font-medium">Needs Attention</button>
        </div>
        <div class="h-48 flex items-end justify-between px-2 gap-2 opacity-70">
            @for ($i = 0; $i < 12; $i++)
                <div class="w-full bg-botanical-700 rounded-t-sm relative group" style="height: {{ rand(30, 90) }}%">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-2 h-2 rounded-full bg-botanical-accent hidden group-hover:block"></div>
                </div>
            @endfor
        </div>
        <div class="flex justify-between text-xs text-gray-500 mt-4 px-2">
            <span>Sep</span>
            <span>Oct</span>
            <span>Nov</span>
            <span>Dec</span>
            <span>Jan</span>
            <span>Feb</span>
        </div>
    </div>

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden mt-8">
        <div class="p-6 border-b border-botanical-700 flex justify-between items-center">
            <h3 class="text-white font-medium">Recently Checked Up Plants</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs text-gray-500 uppercase tracking-wider border-b border-botanical-700 bg-botanical-900/30">
                        <th class="px-6 py-4 font-medium">Plant Name & Specimen</th>
                        <th class="px-6 py-4 font-medium">Species</th>
                        <th class="px-6 py-4 font-medium">Owner</th>
                        <th class="px-6 py-4 font-medium">Checkup Date</th>
                        <th class="px-6 py-4 font-medium">Growth</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-botanical-700">
                    <tr class="hover:bg-botanical-700/30 transition">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-botanical-900 flex items-center justify-center text-xl">🌿</div>
                            <div>
                                <p class="text-white font-medium">Monstera Deliciosa</p>
                                <p class="text-xs text-gray-500">ID: #MN-092-A</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-400">Araceae</td>
                        <td class="px-6 py-4 text-gray-300 flex items-center gap-2">
                            <img src="https://i.pravatar.cc/150?img=33" class="w-5 h-5 rounded-full"> Dr. E. Thorne
                        </td>
                        <td class="px-6 py-4 text-gray-400">Oct 25, 2023</td>
                        <td class="px-6 py-4 text-botanical-accent">↑ 4.2 cm</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Healthy
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-botanical-700/30 transition">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded bg-botanical-900 flex items-center justify-center text-xl">🪴</div>
                            <div>
                                <p class="text-white font-medium">Calathea Orbifolia</p>
                                <p class="text-xs text-gray-500">ID: #CL-214-B</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-400">Marantaceae</td>
                        <td class="px-6 py-4 text-gray-300 flex items-center gap-2">
                            <img src="https://i.pravatar.cc/150?img=12" class="w-5 h-5 rounded-full"> J. Sterling
                        </td>
                        <td class="px-6 py-4 text-gray-400">Feb 20, 2024</td>
                        <td class="px-6 py-4 text-botanical-accent">↑ 3.1 cm</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs bg-red-500/10 text-red-400 border border-red-500/20">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Needs Attention
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
