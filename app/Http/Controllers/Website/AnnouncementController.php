<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\Seminar;
use App\Models\Workshop;
use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    public function conferences()
    {
        $conferences = Conference::latest()->limit(30)->paginate(10);
        $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
        return view('website.announcement.conference', compact('conferences', 'countries'));
    }

    public function seminars(){
        $seminars = Seminar::latest()->take(10)->get();
        return view('website.announcement.seminar', compact('seminars'));
    }

    public function workshops(){
        $workshops = Workshop::latest()->take(10)->get();
        return view('website.announcement.workshop', compact('workshops'));
    }

    public function grants(){
        $grants = Grant::latest()->take(10)->get();
        return view('website.announcement.grants', compact('grants'));
    }

    //Submit Abstract
    public function submitAbstract(Request $request)
    {
        // 1. Validation rules
        $rules = [
            'type'                  => 'required|in:abstract',
            'title'                 => 'required|string|max:255',
            'conference_track'      => 'required|string|max:255',
            'subject_area'          => 'required|string|max:255',
            'submission_type'       => 'required|string|in:Oral,Poster,Virtual',
            'presentation_preference' => 'nullable|string|max:255',
            'keywords'              => 'required|string|max:500',
            'abstract_text'         => 'required|string|max:2000',
            'author_name'           => 'required|string|max:255',
            'author_email'          => 'required|email|max:255',
            'phone'                 => 'required|string|max:30',
            'affiliation'           => 'required|string|max:255',
            'department'            => 'nullable|string|max:255',
            'country'               => 'required|string|max:100',
            'orcid'                 => 'nullable|url|max:255',
            'coauthors'             => 'nullable|array',
            'coauthors.*.name'      => 'nullable|string|max:255',
            'coauthors.*.email'     => 'nullable|email|max:255',
            'coauthors.*.affiliation' => 'nullable|string|max:255',
            'coauthors.*.country'   => 'nullable|string|max:100',
            'coauthors.*.orcid'     => 'nullable|url|max:255',
            'funding'               => 'nullable|string|max:1000',
            'conflict_of_interest'  => 'nullable|string|max:1000',
            'ethics_approval'       => 'nullable|string|in:No,Yes',
            'ethics_details'        => 'nullable|string|max:500',
            'abstract_file'         => 'required|file|mimes:docx|max:5120', // 5MB
            'originality'           => 'required|accepted',
            'author_approval'       => 'required|accepted',
            'consent_publish'       => 'required|accepted',
        ];

        $validated = $request->validate($rules);

        // 2. Prepare email content (HTML)
        $emailBody = "<h2>Abstract Submission</h2>";
        $emailBody .= "<h3>Abstract Details</h3>";
        $emailBody .= "<strong>Title:</strong> " . e($validated['title']) . "<br>";
        $emailBody .= "<strong>Conference Track:</strong> " . e($validated['conference_track']) . "<br>";
        $emailBody .= "<strong>Subject Area:</strong> " . e($validated['subject_area']) . "<br>";
        $emailBody .= "<strong>Submission Type:</strong> " . e($validated['submission_type']) . "<br>";
        $emailBody .= "<strong>Presentation Preference:</strong> " . e($validated['presentation_preference'] ?? 'Not specified') . "<br>";
        $emailBody .= "<strong>Keywords:</strong> " . e($validated['keywords']) . "<br>";
        $emailBody .= "<strong>Abstract:</strong><br>" . nl2br(e($validated['abstract_text'])) . "<br><br>";

        $emailBody .= "<h3>Corresponding Author</h3>";
        $emailBody .= "<strong>Name:</strong> " . e($validated['author_name']) . "<br>";
        $emailBody .= "<strong>Email:</strong> " . e($validated['author_email']) . "<br>";
        $emailBody .= "<strong>Phone:</strong> " . e($validated['phone']) . "<br>";
        $emailBody .= "<strong>Affiliation:</strong> " . e($validated['affiliation']) . "<br>";
        $emailBody .= "<strong>Department:</strong> " . e($validated['department'] ?? '') . "<br>";
        $emailBody .= "<strong>Country:</strong> " . e($validated['country']) . "<br>";
        $emailBody .= "<strong>ORCID:</strong> " . e($validated['orcid'] ?? '') . "<br><br>";

        if (!empty($validated['coauthors'])) {
            $emailBody .= "<h3>Co‑authors</h3>";
            foreach ($validated['coauthors'] as $i => $ca) {
                $emailBody .= "<strong>#" . ($i+1) . ":</strong> " . e($ca['name'] ?? '') . " | " . e($ca['email'] ?? '') . " | " . e($ca['affiliation'] ?? '') . " | " . e($ca['country'] ?? '') . " | ORCID: " . e($ca['orcid'] ?? '') . "<br>";
            }
        }

        $emailBody .= "<h3>Additional Info</h3>";
        $emailBody .= "<strong>Funding:</strong> " . nl2br(e($validated['funding'] ?? '')) . "<br>";
        $emailBody .= "<strong>Conflict of Interest:</strong> " . nl2br(e($validated['conflict_of_interest'] ?? '')) . "<br>";
        $emailBody .= "<strong>Ethics Approval:</strong> " . e($validated['ethics_approval'] ?? 'No') . "<br>";
        if ($validated['ethics_approval'] == 'Yes') {
            $emailBody .= "<strong>Ethics Details:</strong> " . nl2br(e($validated['ethics_details'] ?? '')) . "<br>";
        }

        $emailBody .= "<h3>Declarations</h3>";
        $emailBody .= "Originality: Yes<br>Author Approval: Yes<br>Consent to Publish: Yes<br>";

        // 3. Recipients (your two email addresses)
        $toEmails = ['vcresearchkdru@gmail.com', 'vicechancellor@kdru.edu.af', 'pashtoonr@outlook.com'];
        $subject = "Abstract Submission: " . $validated['title'];

        try {
            Mail::send([], [], function ($message) use ($toEmails, $subject, $emailBody, $request) {
                $message->from(config('mail.from.address'), config('mail.from.name'))
                        ->replyTo($request->author_email, $request->author_name)
                        ->to($toEmails)
                        ->subject($subject)
                        ->html($emailBody);
                // Attach the uploaded file
                if ($request->hasFile('abstract_file')) {
                    $file = $request->file('abstract_file');
                    $message->attach($file->getRealPath(), [
                        'as'   => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType(),
                    ]);
                }
            });
            Log::info("Abstract submission email sent for {$validated['title']}");
            return response()->json(['message' => 'Abstract submitted successfully.']);
        } catch (\Exception $e) {
            Log::error("Mail error: " . $e->getMessage());
            return response()->json(['message' => 'Failed to send email. Please try again later.'], 500);
        }
    }

    //Submit Coference Paper
    public function submitPaper(Request $request)
    {
        $rules = [
            'type'                     => 'required|in:paper',
            'paper_title'              => 'required|string|max:255',
            'conference_track'         => 'required|string|max:255',
            'subject_area'             => 'required|string|max:255',
            'paper_type'               => 'required|string|in:Full Paper,Short Paper,Review Paper,Case Study',
            'presentation_preference'  => 'nullable|string|max:255',
            'keywords'                 => 'required|string|max:500',
            'abstract_text'            => 'required|string|max:2000',
            'num_pages'                => 'required|integer|min:1|max:50',
            'num_figures_tables'       => 'nullable|integer|min:0',
            'author_name'              => 'required|string|max:255',
            'author_email'             => 'required|email|max:255',
            'phone'                    => 'required|string|max:30',
            'affiliation'              => 'required|string|max:255',
            'department'               => 'nullable|string|max:255',
            'country'                  => 'required|string|max:100',
            'orcid'                    => 'nullable|url|max:255',
            'coauthors'                => 'nullable|array',
            'coauthors.*.name'         => 'nullable|string|max:255',
            'coauthors.*.email'        => 'nullable|email|max:255',
            'coauthors.*.affiliation'  => 'nullable|string|max:255',
            'coauthors.*.country'      => 'nullable|string|max:100',
            'coauthors.*.orcid'        => 'nullable|url|max:255',
            'manuscript_file'          => 'required|file|mimes:pdf|max:5120', // 5 MB
            'source_file'              => 'required|file|mimes:docx,zip,rar|max:5120', // 5 MB
            'supplementary_files'      => 'nullable|array|max:5',
            'supplementary_files.*'    => 'file|mimes:pdf,jpg,jpeg,png,zip|max:5120', // 5 MB each
            'template_compliance'      => 'required|accepted',
            'blind_review'             => 'nullable|accepted',
            'funding'                  => 'nullable|string|max:1000',
            'conflict_of_interest'     => 'nullable|string|max:1000',
            'ethics_approval'          => 'nullable|string|in:No,Yes',
            'ethics_details'           => 'nullable|string|max:500',
            'cover_letter'             => 'nullable|string|max:2000',
            'originality'              => 'required|accepted',
            'author_approval'          => 'required|accepted',
            'copyright_agreement'      => 'required|accepted',
            'consent_publish'          => 'required|accepted',
        ];

        $validated = $request->validate($rules);

        // Build email body (similar to abstract but with paper fields)
        $emailBody = "<h2>Full Paper Submission</h2>";
        $emailBody .= "<h3>Paper Details</h3>";
        $emailBody .= "<strong>Title:</strong> " . e($validated['paper_title']) . "<br>";
        $emailBody .= "<strong>Track:</strong> " . e($validated['conference_track']) . "<br>";
        $emailBody .= "<strong>Subject Area:</strong> " . e($validated['subject_area']) . "<br>";
        $emailBody .= "<strong>Paper Type:</strong> " . e($validated['paper_type']) . "<br>";
        $emailBody .= "<strong>Presentation Preference:</strong> " . e($validated['presentation_preference'] ?? 'Not specified') . "<br>";
        $emailBody .= "<strong>Keywords:</strong> " . e($validated['keywords']) . "<br>";
        $emailBody .= "<strong>Abstract:</strong><br>" . nl2br(e($validated['abstract_text'])) . "<br>";
        $emailBody .= "<strong>Number of Pages:</strong> " . e($validated['num_pages']) . "<br>";
        $emailBody .= "<strong>Figures/Tables:</strong> " . e($validated['num_figures_tables'] ?? '0') . "<br><br>";

        $emailBody .= "<h3>Corresponding Author</h3>";
        $emailBody .= "<strong>Name:</strong> " . e($validated['author_name']) . "<br>";
        $emailBody .= "<strong>Email:</strong> " . e($validated['author_email']) . "<br>";
        $emailBody .= "<strong>Phone:</strong> " . e($validated['phone']) . "<br>";
        $emailBody .= "<strong>Affiliation:</strong> " . e($validated['affiliation']) . "<br>";
        $emailBody .= "<strong>Department:</strong> " . e($validated['department'] ?? '') . "<br>";
        $emailBody .= "<strong>Country:</strong> " . e($validated['country']) . "<br>";
        $emailBody .= "<strong>ORCID:</strong> " . e($validated['orcid'] ?? '') . "<br><br>";

        if (!empty($validated['coauthors'])) {
            $emailBody .= "<h3>Co‑authors</h3>";
            foreach ($validated['coauthors'] as $i => $ca) {
                $emailBody .= "<strong>#" . ($i+1) . ":</strong> " . e($ca['name'] ?? '') . " | " . e($ca['email'] ?? '') . " | " . e($ca['affiliation'] ?? '') . " | " . e($ca['country'] ?? '') . " | ORCID: " . e($ca['orcid'] ?? '') . "<br>";
            }
        }

        $emailBody .= "<h3>Additional Info</h3>";
        $emailBody .= "<strong>Funding:</strong> " . nl2br(e($validated['funding'] ?? '')) . "<br>";
        $emailBody .= "<strong>Conflict of Interest:</strong> " . nl2br(e($validated['conflict_of_interest'] ?? '')) . "<br>";
        $emailBody .= "<strong>Ethics Approval:</strong> " . e($validated['ethics_approval'] ?? 'No') . "<br>";
        if ($validated['ethics_approval'] == 'Yes') {
            $emailBody .= "<strong>Ethics Details:</strong> " . nl2br(e($validated['ethics_details'] ?? '')) . "<br>";
        }
        $emailBody .= "<strong>Cover Letter:</strong> " . nl2br(e($validated['cover_letter'] ?? '')) . "<br>";

        $emailBody .= "<h3>Compliance & Declarations</h3>";
        $emailBody .= "Template Compliance: Yes<br>";
        $emailBody .= "Blind Review Version: " . (isset($validated['blind_review']) ? 'Yes' : 'No') . "<br>";
        $emailBody .= "Originality: Yes<br>Author Approval: Yes<br>Copyright Agreement: Yes<br>Consent to Publish: Yes<br>";

        // Recipients
        $toEmails = ['vcresearchkdru@gmail.com', 'vicechancellor@kdru.edu.af', 'huzaifbasiri888@gmail.com'];
        $subject = "Full Paper Submission: " . $validated['paper_title'];

        try {
            Mail::send([], [], function ($message) use ($toEmails, $subject, $emailBody, $request) {
                $message->from(config('mail.from.address'), config('mail.from.name'))
                        ->replyTo($request->author_email, $request->author_name)
                        ->to($toEmails)
                        ->subject($subject)
                        ->html($emailBody);
                // Attach manuscript
                $message->attach($request->file('manuscript_file')->getRealPath(), [
                    'as' => $request->file('manuscript_file')->getClientOriginalName(),
                    'mime' => 'application/pdf',
                ]);
                // Attach source file
                $message->attach($request->file('source_file')->getRealPath(), [
                    'as' => $request->file('source_file')->getClientOriginalName(),
                    'mime' => $request->file('source_file')->getMimeType(),
                ]);
                // Attach supplementary files if any
                if ($request->hasFile('supplementary_files')) {
                    foreach ($request->file('supplementary_files') as $file) {
                        $message->attach($file->getRealPath(), [
                            'as' => $file->getClientOriginalName(),
                            'mime' => $file->getMimeType(),
                        ]);
                    }
                }
            });
            Log::info("Paper submission email sent for {$validated['paper_title']}");
            return response()->json(['message' => 'Paper submitted successfully.']);
        } catch (\Exception $e) {
            Log::error("Paper mail error: " . $e->getMessage());
            return response()->json(['message' => 'Failed to send email. Please try again later.'], 500);
        }
    }
}
