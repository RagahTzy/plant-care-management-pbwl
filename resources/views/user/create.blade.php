@extends('layouts.dashboard')

@section('title', 'Tambah User - Admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 pb-12">
    
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.users.index') }}" class="w-10 h-10 flex items-center justify-center rounded-full bg-botanical-800 border border-botanical-700 text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </a>
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Tambah User Baru</h2>
            <p class="text-sm text-gray-400 mt-1">Buat akun akses baru untuk sistem.</p>
        </div>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
            <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Informasi Akun</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 md:col-span-2">
                    <label class="text-sm font-medium text-gray-300">Nama Lengkap <span class="text-red-400">*</span></label>
                    <input name="name" type="text" value="{{ old('name') }}" required class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Alamat Email <span class="text-red-400">*</span></label>
                    <input name="email" type="email" value="{{ old('email') }}" required class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Nomor Telepon</label>
                    <input name="phone" type="text" placeholder="+62 8..." value="{{ old('phone') }}" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Role Sistem <span class="text-red-400">*</span></label>
                    <select name="role" required class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User (Pengguna Biasa)</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Pengelola)</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
            <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Keamanan</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Password <span class="text-red-400">*</span></label>
                    <input name="password" type="password" required class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Konfirmasi Password <span class="text-red-400">*</span></label>
                    <input name="password_confirmation" type="password" required class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:text-white transition">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.3)] transition">
                Simpan User
            </button>
        </div>
    </form>
</div>
@endsection
