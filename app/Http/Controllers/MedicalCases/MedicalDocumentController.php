<?php

namespace App\Http\Controllers\MedicalCases;

use App\Enums\MedicalCase\MedicalDocumentVerificationStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\MedicalCase;
use App\Models\MedicalDocument;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MedicalDocumentController extends Controller
{

    /**
     * Store a new document for a medical case
     *
     * @throws AuthorizationException
     */
    public function store(Request $request, MedicalCase $medicalCase)
    {
        $this->authorize('create', [MedicalDocument::class, $medicalCase]);

        $validator = Validator::make($request->all(), [
            'document' => 'required|file|max:20480|mimes:pdf,jpg,jpeg,png',
            'is_public' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('document');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('medical-documents', 'public');

        $document = new MedicalDocument([
            'medical_case_id' => $medicalCase->id,
            'document_type' => $request->document_type,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $file->getSize(),
            'file_mime' => $file->getMimeType(),
            'verification_status' => MedicalDocumentVerificationStatusEnum::Pending,
            'is_public' => $request->input('is_public', false),
        ]);

        $document->save();

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    /**
     * Remove a document from storage
     *
     * @throws AuthorizationException
*/
    public function destroy(MedicalDocument $document) : RedirectResponse
    {
        $this->authorize('delete', $document);

        // Delete the file from storage
        if (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }
}
