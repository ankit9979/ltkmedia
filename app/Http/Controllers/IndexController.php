<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    /**
     * View Page
     * @param Request $reuest
     * @return View
     */
    public function index(Request $request)
    {
        $getResults = [];
        $files      = Storage::disk('public')->allFiles('textfiles');

        if(request()->has('get_file'))
        {
            $file  = request()->get('get_file');

            request()->session()->forget('txtFiles');

            $this->extractFile($file);

            $getResults = request()->session()->get('txtFiles');

            if(!empty($getResults))
            {
                $getResults = array_reverse($getResults);
            }
        }

        return view('index', ['getResults' => $getResults , 'files' => $files]);
    }

    /**
     * Extract File By Given Path/Recursive Function
     * @param String $file
     */
    public function extractFile($file)
    {
        $filePath = 'public/textfiles/'.$file;

        if(!Storage::exists($filePath))
        {
            return false;
        }

        $getFile = Storage::get($filePath);

        $extract = explode("\r\n", $getFile);

        if(!empty($extract))
        {
            $getContent = array_filter(array_map('trim', $extract));

            $txtFiles         = [];
            $txtFiles[$file]  = 0;

            foreach($getContent as $key => $getSingleLine)
            {
                if((int) $getSingleLine != 0)
                {
                    $txtFiles[$file] += (int) $getSingleLine;
                }
                else
                {
                    $txtFiles[$file] += $this->extractFile($getSingleLine);
                }
            }

            if(request()->has('get_file'))
            {
                request()->session()->push('txtFiles', $txtFiles);
            }

            return $txtFiles[$file];
        }
    }
}
