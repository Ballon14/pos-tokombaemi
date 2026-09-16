<?php

namespace App\Http\Controllers;

use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Ifsnop\Mysqldump\Mysqldump;
use Exception;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function backup()
    {
        try {
            $database = config('database.connections.mysql.database');
            $username = config('database.connections.mysql.username');
            $password = config('database.connections.mysql.password');
            $host = config('database.connections.mysql.host');

            // Generate filename
            $filename = 'backup_tokombaemi_' . date('Ymd_His') . '.sql';
            $path = storage_path('app/' . $filename);

            // Dump database
            $dump = new Mysqldump("mysql:host={$host};dbname={$database}", $username, $password);
            $dump->start($path);

            app(ActivityLogger::class)->log('settings.backup', 'Melakukan backup seluruh database.');

            return response()->download($path)->deleteFileAfterSend(true);
        } catch (Exception $e) {
            return redirect()->route('settings.index')->with('error', 'Gagal membackup database: ' . $e->getMessage());
        }
    }

    public function restore(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file|mimetypes:text/plain,application/sql,text/x-sql|max:51200', // 50MB max
        ], [
            'backup_file.required' => 'File backup harus diunggah.',
            'backup_file.mimetypes' => 'File harus berupa file .sql',
        ]);

        try {
            $file = $request->file('backup_file');
            $sql = file_get_contents($file->getRealPath());

            // Matikan pengecekan foreign key sementara agar proses restore lancar
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::unprepared($sql);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            app(ActivityLogger::class)->log('settings.restore', 'Melakukan restore seluruh database.');

            return redirect()->route('settings.index')->with('success', 'Database berhasil dipulihkan.');
        } catch (Exception $e) {
            // Pastikan foreign key nyala kembali jika gagal
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route('settings.index')->with('error', 'Gagal memulihkan database: ' . $e->getMessage());
        }
    }
}
