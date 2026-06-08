<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

Artisan::command('test:supabase', function () {
    try {
        $filename = 'test-file.txt';
        $content = 'Halo dari Laravel!';

        $this->info("Mencoba upload ke Supabase...");
        
        // Menggunakan putStream atau getDriver untuk mendapatkan error yang lebih mentah jika memungkinkan
        Storage::disk('supabase')->put($filename, $content);

        if (Storage::disk('supabase')->exists($filename)) {
            $this->info("✅ Berhasil! File tersimpan di Supabase.");
            $this->info("URL: " . Storage::disk('supabase')->url($filename));
        } else {
            $this->error("❌ Gagal! File tidak ditemukan di storage.");
        }
    } catch (\Throwable $e) {
        $this->error("❌ Terjadi Error: " . $e->getMessage());
        
        // Cek apakah ada exception sebelumnya (inner exception)
        if ($e->getPrevious()) {
            $this->error("Detail: " . $e->getPrevious()->getMessage());
        }
        
        $this->line("");
        $this->info("--- Tips Debugging ---");
        $this->line("1. Cek SUPABASE_S3_ENDPOINT: Harus berakhiran /storage/v1/s3");
        $this->line("2. Cek SUPABASE_S3_BUCKET: Pastikan nama bucket sama persis di dashboard");
        $this->line("3. Cek SUPABASE_S3_ACCESS_KEY & SECRET: Gunakan key dari 'Project Settings > Storage'");
        $this->line("-----------------------");
    }
});