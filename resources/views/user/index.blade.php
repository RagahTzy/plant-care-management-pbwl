@extends('layouts.dashboard')

@section('title', 'Manajemen User - Admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Manajemen User</h2>
            <p class="text-sm text-gray-400 mt-2">Kelola akses, role, dan data pengguna sistem.</p>
        </div>
        <button class="bg-botanical-accent/20 hover:bg-botanical-accent/30 text-botanical-accent border border-botanical-accent/50 px-4 py-2.5 rounded-lg text-sm font-medium transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New User
        </button>
    </div>

    <div class="flex gap-4 mb-6">
        <div class="relative flex-1 max-w-md">
            <input type="text" placeholder="Cari nama atau email user..." class="w-full bg-botanical-800 text-sm text-gray-300 rounded-lg pl-10 pr-4 py-2.5 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700">
            <svg class="w-4 h-4 absolute left-3.5 top-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <select class="bg-botanical-800 text-sm text-gray-300 rounded-lg px-4 py-2.5 focus:outline-none border border-botanical-700 appearance-none">
            <option>Semua Role</option>
            <option>Admin</option>
            <option>User</option>
        </select>
    </div>

    <div class="bg-botanical-800 rounded-2xl border border-botanical-700/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs text-gray-400 uppercase tracking-wider border-b border-botanical-700 bg-botanical-900/30">
                        <th class="px-6 py-5 font-medium">Pengguna</th>
                        <th class="px-6 py-5 font-medium">Role</th>
                        <th class="px-6 py-5 font-medium">Tanaman Diampu</th>
                        <th class="px-6 py-5 font-medium">Tanggal Bergabung</th>
                        <th class="px-6 py-5 font-medium">Status</th>
                        <th class="px-6 py-5 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-botanical-700">
                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?img=11" alt="Avatar" class="w-10 h-10 rounded-full border border-botanical-700">
                                <div>
                                    <p class="text-white font-medium">Eleanor Thorne</p>
                                    <p class="text-xs text-gray-500">eleanor@conservator.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-botanical-accent text-xs font-medium bg-botanical-accent/10 px-2.5 py-1 rounded border border-botanical-accent/20">Admin</span>
                        </td>
                        <td class="px-6 py-4 text-gray-400">-</td>
                        <td class="px-6 py-4 text-gray-400">Oct 12, 2023</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_5px_#10b981]"></span> Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-500 hover:text-white transition p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://i.pravatar.cc/150?img=33" alt="Avatar" class="w-10 h-10 rounded-full border border-botanical-700">
                                <div>
                                    <p class="text-white font-medium">Julian Sterling</p>
                                    <p class="text-xs text-gray-500">j.sterling@mail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-300">User</td>
                        <td class="px-6 py-4 text-gray-300">
                            <div class="flex items-center gap-2">
                                <span class="text-white font-medium">12</span> <span class="text-xs text-gray-500">Tanaman</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-400">Jan 05, 2024</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_5px_#10b981]"></span> Active
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-500 hover:text-white transition p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-botanical-700/30 transition group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full border border-botanical-700 bg-botanical-900 flex items-center justify-center text-gray-400 font-medium text-sm">
                                    AC
                                </div>
                                <div>
                                    <p class="text-gray-400 font-medium">Arthur Chen</p>
                                    <p class="text-xs text-gray-500">arthur.c@mail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500">User</td>
                        <td class="px-6 py-4 text-gray-500">
                            <div class="flex items-center gap-2">
                                <span>3</span> <span class="text-xs">Tanaman</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Nov 20, 2023</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs text-gray-500">
                                <span class="w-1.5 h-1.5 rounded-full bg-gray-600"></span> Inactive
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-600 hover:text-white transition p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-botanical-700 flex items-center justify-between text-sm text-gray-400">
            <div>
                Showing 1-3 of 42 users
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">&lsaquo;</button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-botanical-700 text-botanical-accent">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">3</button>
                <span class="px-2">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded hover:bg-botanical-700 transition">&rsaquo;</button>
            </div>
        </div>
    </div>
</div>
@endsection