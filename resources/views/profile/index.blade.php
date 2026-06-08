@extends('layouts.dashboard')

@section('title', 'Profil Pengguna - Plant Care')

@section('content')
<div class="max-w-5xl mx-auto space-y-6 pb-12">
    
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-3xl text-white font-serif font-light tracking-wide">Pengaturan Profil</h2>
            <p class="text-sm text-gray-400 mt-1">Kelola informasi personal dan keamanan akun Anda.</p>
        </div>
        @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-2 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 text-center">
                <div class="relative inline-block mb-4 group">
                    <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-botanical-900 mx-auto bg-botanical-700 relative">
                        @if($user->avatar)
                            <img id="avatar-preview" src="{{ Storage::disk('supabase')->url($user->avatar) }}" alt="Profile Picture" class="w-full h-full object-cover">
                        @else
                            <img id="avatar-preview" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=10b981&color=fff&size=150" alt="Profile Picture" class="w-full h-full object-cover">
                        @endif
                        
                        <label for="avatar-input" class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </label>
                    </div>
                </div>
                
                <h3 class="text-xl text-white font-medium">{{ $user->name }}</h3>
                <p class="text-sm text-gray-400 mb-4">{{ $user->email }}</p>
                
                <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-medium bg-botanical-accent/10 text-botanical-accent border border-botanical-accent/20">
                    {{ $user->role === 'admin' ? 'Administrator' : 'Pengguna' }}
                </span>
            </div>

            <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50">
                <ul class="space-y-4 text-sm">
                    <li class="flex justify-between items-center">
                        <span class="text-gray-400">Bergabung sejak</span>
                        <span class="text-white">{{ $user->created_at->translatedFormat('j M Y') }}</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-400">Total Tanaman</span>
                        <span class="text-white">{{ $stats['total_tanaman'] }}</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span class="text-gray-400">Laporan Dikirim</span>
                        <span class="text-white">{{ $stats['total_laporan'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')
                
                <input type="file" name="avatar" id="avatar-input" class="hidden" onchange="previewAvatar(this)">

                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
                    <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Informasi Personal</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-sm font-medium text-gray-300">Nama Lengkap</label>
                            <input name="name" type="text" value="{{ old('name', $user->name) }}" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300">Alamat Email</label>
                            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 transition">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300">Nomor Telepon</label>
                            <input name="phone" type="text" placeholder="+62 812 3456 7890" value="{{ old('phone', $user->phone) }}" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition">
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                    </div>
                </div>

                <div class="bg-botanical-800 rounded-2xl p-6 border border-botanical-700/50 space-y-6">
                    <h3 class="text-lg text-white font-medium border-b border-botanical-700 pb-3">Ubah Password</h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-300">Password Saat Ini</label>
                            <input name="current_password" type="password" placeholder="••••••••" class="w-full md:w-2/3 bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition">
                            <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-300">Password Baru</label>
                                <input name="password" type="password" placeholder="••••••••" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition">
                                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
                            </div>
                            
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-300">Konfirmasi Password Baru</label>
                                <input name="password_confirmation" type="password" placeholder="••••••••" class="w-full bg-botanical-900 text-sm text-white rounded-lg px-4 py-3 focus:outline-none focus:ring-1 focus:ring-botanical-accent border border-botanical-700 placeholder-gray-600 transition">
                                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <button type="submit" class="px-6 py-2.5 rounded-lg text-sm font-medium bg-botanical-accent text-botanical-900 hover:bg-emerald-300 shadow-[0_0_15px_rgba(110,231,183,0.3)] transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar-preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
