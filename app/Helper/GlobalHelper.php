<?php

namespace App\Helper;

use App\Jobs\SendEmailJob;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class GlobalHelper
{

    public static function uploadAndSaveFile($files, $destinationDirectory, $fileName = null)
    {
        $urls = [];

        foreach ($files as $key => $file) {

            if ($file instanceof UploadedFile) {

                $ext = strtolower($file->getClientOriginalExtension());

                // Generate a unique filename if not provided
                $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . $key . time() . '.' . $ext;

                $destinationPath  = public_path($destinationDirectory);

                if (!File::isDirectory($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                if (in_array($ext, ['jpeg', 'png', 'jpg', 'webp', 'gif'])) {
                    $url = $destinationDirectory . '/' . $fileName;
                    $image = Image::make($file->getRealPath());
                    $image->save($destinationPath . '/' . $fileName, config('custom.image_quality'));
                } elseif (in_array($ext, ['pdf', 'docx', 'xls', 'csv', 'xlsx', 'txt', 'text', 'docx'])) {
                    $url = $destinationDirectory . '/' . $fileName;
                    $file->move($destinationPath, $fileName);
                } elseif ($ext === 'svg') {
                // Handle SVG differently, as it doesn't need image processing
                $url = $destinationDirectory . '/' . $fileName;
                $file->move($destinationPath, $fileName);
                } else {
                    $url = '';
                }

                $urls[$key] = $url;
            }
        }
        return $urls;
    }

    public static function sendEmail($to, $subject, $view, $data = [])
    {
        try {
            // Mail::send($view, $data, function ($message) use ($to, $subject) {
            //     $message->to($to)->subject($subject);
            // });
            // Dispatch the email sending job to the queue
            SendEmailJob::dispatch($to, $subject, $view, $data);
            return true; // Email job dispatched successfully
        } catch (\Exception $e) {
            info($e);
            // Log or handle any exceptions here
            return false; // Email job dispatching failed
        }
    }



}
