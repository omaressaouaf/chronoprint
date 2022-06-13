<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        return view("vendor.voyager.backups", [
            "backups" => collect(Storage::files(config("backup.backup.name")))
                ->map(function ($backupPath) {
                    return [
                        "path" => $backupPath,
                        "filename" => basename($backupPath),
                        "size" => formatFileSize(Storage::size($backupPath)),
                        "generated_at" => new Carbon(Storage::lastModified($backupPath))
                    ];
                })
                ->reverse()
        ]);
    }

    public function store()
    {
        Artisan::queue("backup:run");

        return back()->with([
            'message'    => __("The backup is being generated. when it's done an email will be sent to :email", [
                "email" => env("MAIL_FROM_ADDRESS")
            ]),
            'alert-type' => 'success',
        ]);
    }

    public function destroy($filename)
    {
        Storage::delete(config('backup.backup.name') . '/' . $filename);

        return back()->with([
            'message'    => __("File deleted successfully"),
            'alert-type' => 'success',
        ]);
    }

    public function download($filename)
    {
        return Storage::download(config('backup.backup.name') . '/' . $filename);
    }

    public function cleanup()
    {
        Artisan::queue("backup:clean");

        return back()->with([
            'message'    => __("Old backups are being deleted. when it's done an email will be sent to :email", [
                "email" => env("MAIL_FROM_ADDRESS")
            ]),
            'alert-type' => 'success',
        ]);;
    }
}
