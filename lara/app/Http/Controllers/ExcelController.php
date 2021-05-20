<?php

namespace App\Http\Controllers;

use App\Models\Export\UsersExport;
use App\Models\Import\UsersImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExcelController extends Controller
{
    private const EXPORT_FILE_NAME = 'users-collection.xlsx';

    public function import(Request $request): RedirectResponse
    {
        Excel::import(new UsersImport(), $request->file('file')->store('temp'));
        return back();
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new UsersExport(), self::EXPORT_FILE_NAME);
    }
}
