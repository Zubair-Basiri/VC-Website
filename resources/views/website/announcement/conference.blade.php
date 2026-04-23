@extends('website.master')

@section('title', 'International Conferences')

@section('header')
    @include('website.header')
@endsection

@section('content')

    {{-- Breadcrumb --}}
    <div class="custom-breadcrumns border-bottom" style="margin-top: 1.5rem">
        <div class="container">
            <a href="{{ url('/') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">International Conferences</span>
        </div>
    </div>

    <div class="container pt-4 mb-5">
        @if($conferences->count() > 0)
            @foreach($conferences as $conference)
                <div class="conference-item mb-5">
                    {{-- General Title --}}
                    <div class="text-center mb-4">
                        <h2 class="section-title-underline">
                            <span><strong>International Conferences</strong></span>
                        </h2>
                        <p class="lead mt-3">
                            {!! Purifier::clean($conference->genDescription) ?? 'We organize international conferences to bring together researchers, academicians, and professionals from around the world to share knowledge and foster collaboration.' !!}
                        </p>
                    </div>

                    {{-- Image --}}
                    <div class="col-lg-12 mb-4 mb-lg-0" data-aos="fade-right">
                        @if($conference->image)
                            <img src="{{ asset('storage/' . $conference->image) }}" alt="Conference Image" class="img-fluid rounded shadow">
                        @else
                            <p class="text-muted">No images available for this conference.</p>
                        @endif
                    </div>

                    {{-- Author Guideline --}}
                    <div class="row mt-5" data-aos="fade-up">
                        <div class="col-12">
                            <h4 class="section-title-underline mb-4">
                                <span><strong>Author Guideline</strong></span>
                            </h4>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">English</h5>
                                    <p class="card-text">Download author guideline in English.</p>
                                    <a href="{{ $conference->enLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">View Guideline</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">پښتو</h5>
                                    <p class="card-text">د لیکوالانو لارښود په پښتو ژبه ترلاسه کړئ.</p>
                                    <a href="{{ $conference->psLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">لارښود وګورئ</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">دری</h5>
                                    <p class="card-text">راهنمای نویسندگان را به زبان دری دریافت کنید.</p>
                                    <a href="{{ $conference->daLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">مشاهده راهنما</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">العربية</h5>
                                    <p class="card-text">احصل على دليل المؤلف باللغة العربية.</p>
                                    <a href="{{ $conference->arLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">عرض الدليل</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Submission Button --}}
                    <div class="text-center mt-4" data-aos="fade-up">
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#submissionModal">
                            Submission for Abstract/Conference Paper
                        </button>
                    </div>

                    {{-- Call for Papers! --}}
                    <div class="row mt-5" data-aos="fade-up">
                        <div class="col-12">
                            <h4 class="section-title-underline mb-4">
                                <span><strong>Call for Papers!</strong></span>
                            </h4>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">English</h5>
                                    <p class="card-text">Download Call for Papers in English.</p>
                                    <a href="{{ $conference->posterEnLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">View Guideline</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">پښتو</h5>
                                    <p class="card-text">د مقالو غوښتنه لارښود په پښتو ژبه ترلاسه کړئ.</p>
                                    <a href="{{ $conference->posterPsLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">لارښود وګورئ</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">دری</h5>
                                    <p class="card-text">راهنمای دعوت به ارائه مقاله را به زبان دری دریافت کنید.</p>
                                    <a href="{{ $conference->posterDaLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">مشاهده راهنما</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">العربية</h5>
                                    <p class="card-text">احصل على دليل دعوة لتقديم الأوراق باللغة العربية.</p>
                                    <a href="{{ $conference->posterArLink ?? '#' }}" class="btn btn-sm btn-outline-primary" target="_blank">عرض الدليل</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Posters --}}
                    <div class="row mb-5 align-items-center">
                        @php
                            $posters = is_array($conference->posterImage) ? $conference->posterImage : json_decode($conference->posterImage, true);
                        @endphp
                        @if(!empty($posters))
                            @foreach($posters as $poster)
                                <div class="col-lg-12 mb-4 mb-lg-0 d-flex justify-content-center" data-aos="fade-up">
                                    <img src="{{ asset('storage/' . $poster) }}" alt="Poster Image" class="rounded shadow" style="padding-bottom: 10px; width: 1000px; height: 1200px; object-fit: cover;">
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p class="text-muted">No poster images available for this conference.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <hr class="my-5">
            @endforeach

            {{-- Pagination Links --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $conferences->links() }}
            </div>

        @else
            <div class="text-center py-5">
                <h3 class="text-muted">No Conference Data Available</h3>
                <p>Please check back later for updates on upcoming international conferences.</p>
            </div>
        @endif
    </div>

    {{-- MODAL (unchanged structure, only design will be applied via CSS) --}}
    <div class="modal fade" id="submissionModal" tabindex="-1" aria-labelledby="submissionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="submissionModalLabel" style="color:#fff;">Submit Your Work</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="submissionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="abstract-tab" data-bs-toggle="tab" data-bs-target="#abstract" type="button" role="tab">Submission for Abstract</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="paper-tab" data-bs-toggle="tab" data-bs-target="#paper" type="button" role="tab">Submission for Conference Paper</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="submissionTabContent">
                        {{-- Abstract Form --}}
                        <div class="tab-pane fade show active" id="abstract" role="tabpanel">
                            <form id="abstractForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="abstract">

                                {{-- 1. Abstract Details --}}
                                <h5 class="mt-3">1. Abstract Details</h5>
                                <div class="mb-3">
                                    <label class="form-label">Abstract Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" required maxlength="255">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Conference Main Themes <span class="text-danger">*</span></label>
                                    <select name="conference_track" class="form-control" required>
                                        <option value="">Select a theme</option>
                                        <option value="Maqasid al-Shariah and Sustainable Development">
                                            Maqasid al-Shariah and Sustainable Development
                                        </option>
                                        <option value="Economic Development Based on the Objectives of Maqasid al-Shariah">
                                            Economic Development Based on the Objectives of Maqasid al-Shariah
                                        </option>
                                        <option value="Coordination of Public Policies with Maqasid al-Shariah">
                                            Coordination of Public Policies with Maqasid al-Shariah
                                        </option>
                                        <option value="Shariah-Based Solutions for Social Justice and Peace">
                                            Shariah-Based Solutions for Social Justice and Peace
                                        </option>
                                        <option value="Balancing International Interactions and Shariah">
                                            Balancing International Interactions and Shariah
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Subject Area<span class="text-danger">*</span></label>
                                    <select name="subject_area" class="form-control" required>
                                        <option value="">Select area</option>
                                        <option value="Islamic Economics and Models of Prosperity">
                                            Islamic Economics and Models of Prosperity
                                        </option>
                                        <option value="Role of Maqasid al-Shariah in Social Justice">
                                            Role of Maqasid al-Shariah in Social Justice
                                        </option>
                                        <option value="The Role of Modern Education in Preserving the Maqasid al-Shariah">
                                            The Role of Modern Education in Preserving the Maqasid al-Shariah
                                        </option>
                                        <option value="Education, Human Capital Development, and Islamic Values">
                                            Education, Human Capital Development, and Islamic Values
                                        </option>
                                        <option value="Environmental Sustainability from Maqasid al-Shariah's Perspective">
                                            Environmental Sustainability from Maqasid al-Shariah's Perspective
                                        </option>
                                        <option value="Islamic Finance and Equitable Economic Growth">
                                            Islamic Finance and Equitable Economic Growth
                                        </option>
                                        <option value="Cultural Identity and Islamic Civilization">
                                            Cultural Identity and Islamic Civilization
                                        </option>
                                        <option value="Public Health Policies and Human Well-being">
                                            Public Health Policies and Human Well-being
                                        </option>
                                        <option value="Infrastructure Development and Economic Stability">
                                            Infrastructure Development and Economic Stability
                                        </option>
                                        <option value="Human Rights, Islamic Ethics, and Social Responsibility">
                                            Human Rights, Islamic Ethics, and Social Responsibility
                                        </option>
                                        <option value="Technology, Innovation, and the Implementation of Islamic Ethics">
                                            Technology, Innovation, and the Implementation of Islamic Ethics
                                        </option>
                                        <option value="Economic and Academic Empowerment of Youth">
                                            Economic and Academic Empowerment of Youth
                                        </option>
                                        <option value="Crisis Management and Humanitarian Assistance from Maqasid al-Shariah's Perspective">
                                            Crisis Management and Humanitarian Assistance from Maqasid al-Shariah's Perspective
                                        </option>
                                        <option value="International Cooperation, Diplomacy, and Islamic Ethics">
                                            International Cooperation, Diplomacy, and Islamic Ethics
                                        </option>
                                        <option value="Ethics, Spirituality, and Maqasid al-Shariah">
                                            Ethics, Spirituality, and Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Policies in Achieving and Strengthening Maqasid al-Shariah">
                                            The Role of Policies in Achieving and Strengthening Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Afghanistan's Public Policies in Light of Maqasid al-Shariah">
                                            The Role of Afghanistan's Public Policies in Light of Maqasid al-Shariah
                                        </option>
                                        <option value="The Quality of Public Services in Light of Maqasid al-Shariah">
                                            The Quality of Public Services in Light of Maqasid al-Shariah
                                        </option>
                                        <option value="Development Strategies in the Light of Maqasid al-Shariah">
                                            Development Strategies in the Light of Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Religious Scholars in Promoting Maqasid al-Shariah">
                                            The Role of Religious Scholars in Promoting Maqasid al-Shariah
                                        </option>
                                        <option value="The Comparative Role of Digital and Traditional Media in Promoting the Objectives of Maqasid al-Shariah">
                                            The Comparative Role of Digital and Traditional Media in Promoting the Objectives of Maqasid al-Shariah
                                        </option>
                                        <option value="Conflict Resolution in Light of Maqasid al-Shariah">
                                            Conflict Resolution in Light of Maqasid al-Shariah
                                        </option>
                                        <option value="Maqasid al-Shariah and Peaceful Living">
                                            Maqasid al-Shariah and Peaceful Living
                                        </option>
                                        <option value="International Treaties and Maqasid al-Shariah">
                                            International Treaties and Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Qard Hasan (Benevolent Loan) in Poverty Reduction">
                                            The Role of Qard Hasan (Benevolent Loan) in Poverty Reduction
                                        </option>
                                        <option value="The Role of Zakat in Poverty Alleviation">
                                            The Role of Zakat in Poverty Alleviation
                                        </option>
                                        <option value="The Role of the Islamic Financial System in Achieving Maqasid al-Shariah">
                                            The Role of the Islamic Financial System in Achieving Maqasid al-Shariah
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Submission Type <span class="text-danger">*</span></label>
                                    <select name="submission_type" class="form-control" required>
                                        <option value="Oral">Oral Presentation</option>
                                        <option value="Poster">Poster Presentation</option>
                                        <option value="Virtual">Virtual Presentation</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Presentation Preference</label>
                                    <select name="presentation_preference" class="form-control">
                                        <option value="In-person">In‑person</option>
                                        <option value="Online">Online</option>
                                        <option value="Hybrid">Hybrid</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Keywords (comma separated) <span class="text-danger">*</span></label>
                                    <input type="text" name="keywords" class="form-control" placeholder="e.g., deep learning, NLP, transformers" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Abstract (max 300 words) <span class="text-danger">*</span></label>
                                    <textarea name="abstract_text" rows="5" class="form-control" maxlength="2000" required></textarea>
                                    <small class="text-muted">Word limit: 300 words (approx. 2000 characters).</small>
                                </div>

                                {{-- 2. Corresponding Author Information --}}
                                <h5 class="mt-4">2. Corresponding Author Information</h5>
                                <div class="mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="author_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="author_email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number (with country code) <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" placeholder="+93 7xx xxx xxx" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Affiliation (Institution/Organization) <span class="text-danger">*</span></label>
                                    <input type="text" name="affiliation" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                    <select name="country" class="form-control" required>
                                        <option value="">Select a country</option>
                                        @foreach($countries as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ORCID ID (optional)</label>
                                    <input type="text" name="orcid" class="form-control" placeholder="https://orcid.org/0000-0000-0000-0000">
                                </div>

                                {{-- 3. Co‑Authors (repeatable) --}}
                                <h5 class="mt-4">3. Co‑Authors <button type="button" class="btn btn-sm btn-secondary" id="addCoauthorBtn">+ Add Co‑author</button></h5>
                                <div id="coauthorsContainer">
                                    <div class="coauthor-row card p-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-6 mb-2"><input type="text" name="coauthors[0][name]" class="form-control" placeholder="Full Name"></div>
                                            <div class="col-md-6 mb-2"><input type="email" name="coauthors[0][email]" class="form-control" placeholder="Email"></div>
                                            <div class="col-md-6 mb-2"><input type="text" name="coauthors[0][affiliation]" class="form-control" placeholder="Affiliation"></div>
                                            <div class="col-md-6 mb-2">
                                                <select name="country" class="form-control">
                                                    <option value="">Select a country</option>
                                                    @foreach($countries as $code => $name)
                                                        <option value="{{ $code }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2"><input type="text" name="coauthors[0][orcid]" class="form-control" placeholder="ORCID ID (optional)"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 4. Additional Information --}}
                                <h5 class="mt-4">4. Additional Information</h5>
                                <div class="mb-3">
                                    <label class="form-label">Funding Information (optional)</label>
                                    <textarea name="funding" rows="2" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Conflict of Interest Statement</label>
                                    <textarea name="conflict_of_interest" rows="2" class="form-control" placeholder="If none, write 'None'"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ethics Approval Statement</label>
                                    <select name="ethics_approval" class="form-control">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes (explain below)</option>
                                    </select>
                                    <textarea name="ethics_details" rows="2" class="form-control mt-2" placeholder="If yes, provide details"></textarea>
                                </div>

                                {{-- 5. File Upload --}}
                                <h5 class="mt-4">5. File Upload</h5>
                                <div class="mb-3">
                                    <label class="form-label">Upload Abstract File (DOCX only, max 5MB) <span class="text-danger">*</span></label>
                                    <input type="file" name="abstract_file" class="form-control" accept=".docx" required>
                                </div>

                                {{-- 6. Declarations --}}
                                <h5 class="mt-4">6. Declarations</h5>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="originality" value="1" required>
                                    <label class="form-check-label">I confirm that the work is original and not published elsewhere.</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="author_approval" value="1" required>
                                    <label class="form-check-label">All authors have approved the submission.</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="consent_publish" value="1" required>
                                    <label class="form-check-label">I consent to publish the abstract in the conference proceedings.</label>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Send Abstract</button>
                            </form>
                        </div>

                        {{-- Conference Paper Form --}}
                        <div class="tab-pane fade" id="paper" role="tabpanel">
                            <form id="paperForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="paper">

                                {{-- 1. Abstract Details --}}
                                <h5 class="mt-3">1. Paper Details</h5>
                                <div class="mb-3">
                                    <label class="form-label">Paper Title <span class="text-danger">*</span></label>
                                    <input type="text" name="paper_title" class="form-control" required maxlength="255">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Conference Main Themes <span class="text-danger">*</span></label>
                                    <select name="conference_track" class="form-control" required>
                                        <option value="">Select a theme</option>
                                        <option value="Maqasid al-Shariah and Sustainable Development">
                                            Maqasid al-Shariah and Sustainable Development
                                        </option>
                                        <option value="Economic Development Based on the Objectives of Maqasid al-Shariah">
                                            Economic Development Based on the Objectives of Maqasid al-Shariah
                                        </option>
                                        <option value="Coordination of Public Policies with Maqasid al-Shariah">
                                            Coordination of Public Policies with Maqasid al-Shariah
                                        </option>
                                        <option value="Shariah-Based Solutions for Social Justice and Peace">
                                            Shariah-Based Solutions for Social Justice and Peace
                                        </option>
                                        <option value="Balancing International Interactions and Shariah">
                                            Balancing International Interactions and Shariah
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Subject Area<span class="text-danger">*</span></label>
                                    <select name="subject_area" class="form-control" required>
                                        <option value="">Select area</option>
                                        <option value="Islamic Economics and Models of Prosperity">
                                            Islamic Economics and Models of Prosperity
                                        </option>
                                        <option value="Role of Maqasid al-Shariah in Social Justice">
                                            Role of Maqasid al-Shariah in Social Justice
                                        </option>
                                        <option value="The Role of Modern Education in Preserving the Maqasid al-Shariah">
                                            The Role of Modern Education in Preserving the Maqasid al-Shariah
                                        </option>
                                        <option value="Education, Human Capital Development, and Islamic Values">
                                            Education, Human Capital Development, and Islamic Values
                                        </option>
                                        <option value="Environmental Sustainability from Maqasid al-Shariah's Perspective">
                                            Environmental Sustainability from Maqasid al-Shariah's Perspective
                                        </option>
                                        <option value="Islamic Finance and Equitable Economic Growth">
                                            Islamic Finance and Equitable Economic Growth
                                        </option>
                                        <option value="Cultural Identity and Islamic Civilization">
                                            Cultural Identity and Islamic Civilization
                                        </option>
                                        <option value="Public Health Policies and Human Well-being">
                                            Public Health Policies and Human Well-being
                                        </option>
                                        <option value="Infrastructure Development and Economic Stability">
                                            Infrastructure Development and Economic Stability
                                        </option>
                                        <option value="Human Rights, Islamic Ethics, and Social Responsibility">
                                            Human Rights, Islamic Ethics, and Social Responsibility
                                        </option>
                                        <option value="Technology, Innovation, and the Implementation of Islamic Ethics">
                                            Technology, Innovation, and the Implementation of Islamic Ethics
                                        </option>
                                        <option value="Economic and Academic Empowerment of Youth">
                                            Economic and Academic Empowerment of Youth
                                        </option>
                                        <option value="Crisis Management and Humanitarian Assistance from Maqasid al-Shariah's Perspective">
                                            Crisis Management and Humanitarian Assistance from Maqasid al-Shariah's Perspective
                                        </option>
                                        <option value="International Cooperation, Diplomacy, and Islamic Ethics">
                                            International Cooperation, Diplomacy, and Islamic Ethics
                                        </option>
                                        <option value="Ethics, Spirituality, and Maqasid al-Shariah">
                                            Ethics, Spirituality, and Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Policies in Achieving and Strengthening Maqasid al-Shariah">
                                            The Role of Policies in Achieving and Strengthening Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Afghanistan's Public Policies in Light of Maqasid al-Shariah">
                                            The Role of Afghanistan's Public Policies in Light of Maqasid al-Shariah
                                        </option>
                                        <option value="The Quality of Public Services in Light of Maqasid al-Shariah">
                                            The Quality of Public Services in Light of Maqasid al-Shariah
                                        </option>
                                        <option value="Development Strategies in the Light of Maqasid al-Shariah">
                                            Development Strategies in the Light of Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Religious Scholars in Promoting Maqasid al-Shariah">
                                            The Role of Religious Scholars in Promoting Maqasid al-Shariah
                                        </option>
                                        <option value="The Comparative Role of Digital and Traditional Media in Promoting the Objectives of Maqasid al-Shariah">
                                            The Comparative Role of Digital and Traditional Media in Promoting the Objectives of Maqasid al-Shariah
                                        </option>
                                        <option value="Conflict Resolution in Light of Maqasid al-Shariah">
                                            Conflict Resolution in Light of Maqasid al-Shariah
                                        </option>
                                        <option value="Maqasid al-Shariah and Peaceful Living">
                                            Maqasid al-Shariah and Peaceful Living
                                        </option>
                                        <option value="International Treaties and Maqasid al-Shariah">
                                            International Treaties and Maqasid al-Shariah
                                        </option>
                                        <option value="The Role of Qard Hasan (Benevolent Loan) in Poverty Reduction">
                                            The Role of Qard Hasan (Benevolent Loan) in Poverty Reduction
                                        </option>
                                        <option value="The Role of Zakat in Poverty Alleviation">
                                            The Role of Zakat in Poverty Alleviation
                                        </option>
                                        <option value="The Role of the Islamic Financial System in Achieving Maqasid al-Shariah">
                                            The Role of the Islamic Financial System in Achieving Maqasid al-Shariah
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Paper Type <span class="text-danger">*</span></label>
                                    <select name="paper_type" class="form-control" required>
                                        <option value="Full Paper">Full Paper</option>
                                        <option value="Short Paper">Short Paper</option>
                                        <option value="Review Paper">Review Paper</option>
                                        <option value="Case Study">Case Study</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Presentation Preference</label>
                                    <select name="presentation_preference" class="form-control">
                                        <option value="In-person">In‑person</option>
                                        <option value="Online">Online</option>
                                        <option value="Hybrid">Hybrid</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Keywords (comma separated) <span class="text-danger">*</span></label>
                                    <input type="text" name="keywords" class="form-control" placeholder="e.g., deep learning, NLP, transformers" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Abstract (max 300 words) <span class="text-danger">*</span></label>
                                    <textarea name="abstract_text" rows="5" class="form-control" maxlength="2000" required></textarea>
                                    <small class="text-muted">Word limit: 300 words (approx. 2000 characters).</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Number of Pages <span class="text-danger">*</span></label>
                                    <input type="number" name="num_pages" class="form-control" min="1" max="50" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Number of Figures/Tables (optional)</label>
                                    <input type="number" name="num_figures_tables" class="form-control" min="0">
                                </div>

                                {{-- 2. Corresponding Author Information --}}
                                <h5 class="mt-4">2. Corresponding Author Information</h5>
                                <div class="mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="author_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="author_email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number (with country code) <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" placeholder="+93 7xx xxx xxx" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Affiliation (Institution/Organization) <span class="text-danger">*</span></label>
                                    <input type="text" name="affiliation" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Country <span class="text-danger">*</span></label>
                                    <select name="country" class="form-control" required>
                                        <option value="">Select a country</option>
                                        @foreach($countries as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ORCID ID (optional)</label>
                                    <input type="text" name="orcid" class="form-control" placeholder="https://orcid.org/0000-0000-0000-0000">
                                </div>

                                {{-- 3. Co‑Authors (repeatable) --}}
                                <h5 class="mt-4">3. Co‑Authors <button type="button" class="btn btn-sm btn-secondary" id="addCoauthorPaperBtn">+ Add Co‑author</button></h5>
                                <div id="coauthorsPaperContainer">
                                    <div class="coauthor-row-paper card p-3 mb-2">
                                        <div class="row">
                                            <div class="col-md-6 mb-2"><input type="text" name="coauthors[0][name]" class="form-control" placeholder="Full Name"></div>
                                            <div class="col-md-6 mb-2"><input type="email" name="coauthors[0][email]" class="form-control" placeholder="Email"></div>
                                            <div class="col-md-6 mb-2"><input type="text" name="coauthors[0][affiliation]" class="form-control" placeholder="Affiliation"></div>
                                            <div class="col-md-6 mb-2">
                                                <select name="country" class="form-control">
                                                    <option value="">Select a country</option>
                                                    @foreach($countries as $code => $name)
                                                        <option value="{{ $code }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2"><input type="text" name="coauthors[0][orcid]" class="form-control" placeholder="ORCID ID (optional)"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 4. File Uploads --}}
                                <h5 class="mt-4">4. File Uploads</h5>
                                <div class="mb-3">
                                    <label class="form-label">Upload Manuscript (PDF) <span class="text-danger">*</span></label>
                                    <input type="file" name="manuscript_file" class="form-control" accept=".pdf" required>
                                    <small class="text-muted">Max 10 MB</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Source File (DOCX or LaTeX ZIP) <span class="text-danger">*</span></label>
                                    <input type="file" name="source_file" class="form-control" accept=".docx,.zip,.rar" required>
                                    <small class="text-muted">DOCX or ZIP (LaTeX) – max 20 MB</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Supplementary Files (optional)</label>
                                    <input type="file" name="supplementary_files[]" class="form-control" accept=".pdf,.jpg,.png,.zip" multiple>
                                    <small class="text-muted">You can select multiple files (figures, datasets, etc.) – max 50 MB total</small>
                                </div>

                                {{-- 5. Formatting & Compliance --}}
                                <h5 class="mt-4">5. Formatting & Compliance</h5>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="template_compliance" value="1" required>
                                    <label class="form-check-label">I confirm that the paper follows the conference template.</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="blind_review" value="1">
                                    <label class="form-check-label">A blind review version has been submitted (author names removed).</label>
                                </div>

                                {{-- 6. Additional Information --}}
                                <h5 class="mt-4">6. Additional Information</h5>
                                <div class="mb-3">
                                    <label class="form-label">Funding Information (optional)</label>
                                    <textarea name="funding" rows="2" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Conflict of Interest Statement</label>
                                    <textarea name="conflict_of_interest" rows="2" class="form-control" placeholder="If none, write 'None'"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ethics Approval Statement</label>
                                    <select name="ethics_approval" class="form-control">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes (explain below)</option>
                                    </select>
                                    <textarea name="ethics_details" rows="2" class="form-control mt-2" placeholder="If yes, provide details"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Cover Letter / Comments to Organizer (optional)</label>
                                    <textarea name="cover_letter" rows="3" class="form-control"></textarea>
                                </div>

                                {{-- 7. Copyright & Declarations --}}
                                <h5 class="mt-4">7. Copyright & Declarations</h5>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="originality" value="1" required>
                                    <label class="form-check-label">I confirm that the work is original and not plagiarized.</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="author_approval" value="1" required>
                                    <label class="form-check-label">All authors have approved the submission.</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="copyright_agreement" value="1" required>
                                    <label class="form-check-label">I agree to the copyright terms (transfer or license as per conference policy).</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="consent_publish" value="1" required>
                                    <label class="form-check-label">I consent to publish the paper in the conference proceedings.</label>
                                </div>

                                {{-- 8. Final Actions --}}
                                <div class="mt-4">
                                    <button type="button" class="btn btn-secondary" id="previewPaperBtn">Preview Submission</button>
                                    <button type="submit" class="btn btn-primary">Submit Paper</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="modal fade" id="previewModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header"><h5>Submission Preview</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                                    <div class="modal-body" id="previewModalBody"></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript for AJAX submission --}}
    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#abstractForm, #paperForm').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('conference.submit.abstract') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response.message);
                        $('#submissionModal').modal('hide');
                        form[0].reset();
                    },
                    error: function(xhr) {
                        let errorMsg = xhr.responseJSON?.message || 'Something went wrong.';
                        alert(errorMsg);
                    }
                });
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        let coauthorIndex = 1;
        $('#addCoauthorBtn').click(function(){
            let newRow = `
                <div class="coauthor-row card p-3 mb-2">
                    <div class="row">
                        <div class="col-md-6 mb-2"><input type="text" name="coauthors[${coauthorIndex}][name]" class="form-control" placeholder="Full Name"></div>
                        <div class="col-md-6 mb-2"><input type="email" name="coauthors[${coauthorIndex}][email]" class="form-control" placeholder="Email"></div>
                        <div class="col-md-6 mb-2"><input type="text" name="coauthors[${coauthorIndex}][affiliation]" class="form-control" placeholder="Affiliation"></div>
                        <div class="col-md-6 mb-2"><select name="coauthors[${coauthorIndex}][country]" class="form-control"><option value="">Country</option><option value="Afghanistan">Afghanistan</option></select></div>
                        <div class="col-md-6 mb-2"><input type="text" name="coauthors[${coauthorIndex}][orcid]" class="form-control" placeholder="ORCID ID (optional)"></div>
                        <div class="col-md-12 text-end"><button type="button" class="btn btn-sm btn-danger removeCoauthor">Remove</button></div>
                    </div>
                </div>`;
            $('#coauthorsContainer').append(newRow);
            coauthorIndex++;
        });
        $(document).on('click', '.removeCoauthor', function(){
            $(this).closest('.coauthor-row').remove();
        });
        // Co‑authors for paper form
let paperCoauthorIndex = 1;
$('#addCoauthorPaperBtn').click(function(){
    let newRow = `
        <div class="coauthor-row-paper card p-3 mb-2">
            <div class="row">
                <div class="col-md-6 mb-2"><input type="text" name="coauthors[${paperCoauthorIndex}][name]" class="form-control" placeholder="Full Name"></div>
                <div class="col-md-6 mb-2"><input type="email" name="coauthors[${paperCoauthorIndex}][email]" class="form-control" placeholder="Email"></div>
                <div class="col-md-6 mb-2"><input type="text" name="coauthors[${paperCoauthorIndex}][affiliation]" class="form-control" placeholder="Affiliation"></div>
                <div class="col-md-6 mb-2"><select name="coauthors[${paperCoauthorIndex}][country]" class="form-control"><option value="">Country</option><option value="Afghanistan">Afghanistan</option></select></div>
                <div class="col-md-6 mb-2"><input type="text" name="coauthors[${paperCoauthorIndex}][orcid]" class="form-control" placeholder="ORCID ID (optional)"></div>
                <div class="col-md-12 text-end"><button type="button" class="btn btn-sm btn-danger removePaperCoauthor">Remove</button></div>
            </div>
        </div>`;
    $('#coauthorsPaperContainer').append(newRow);
    paperCoauthorIndex++;
        });
        $(document).on('click', '.removePaperCoauthor', function(){
            $(this).closest('.coauthor-row-paper').remove();
        });

        // Preview button – show a modal with all form data (readonly)
        $('#previewPaperBtn').click(function(){
            let formData = $('#paperForm').serializeArray();
            let previewHtml = '<div class="row"><div class="col-12"><ul class="list-group">';
            $.each(formData, function(i, field){
                if (field.name !== '_token' && field.name !== 'type') {
                    previewHtml += `<li class="list-group-item"><strong>${field.name}:</strong> ${field.value}</li>`;
                }
            });
            previewHtml += '</ul></div></div>';
            $('#previewModalBody').html(previewHtml);
            $('#previewModal').modal('show');
        });
    });
    </script>
    @endpush
@endsection

@section('footer')
    @include('website.footer')
@endsection