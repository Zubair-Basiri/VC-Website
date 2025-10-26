<?php

use App\Filament\Pages\Dashboard;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\AnnouncementController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Website\DepartmentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ResourceController;
use App\Http\Controllers\Dashboard\About\AboutUsController;
use App\Http\Controllers\Dashboard\About\MissionController;
use App\Http\Controllers\Dashboard\About\VisionController;
use App\Http\Controllers\Dashboard\About\ObjectivesController;
use App\Http\Controllers\Dashboard\About\PolicyController;
use App\Http\Controllers\Dashboard\About\PriorityController;
use App\Http\Controllers\Dashboard\About\StrategicPlanController;
use App\Http\Controllers\Dashboard\About\StaffController;
use App\Http\Controllers\Dashboard\Department\AcademicJournalController;
use App\Http\Controllers\Dashboard\Department\LaboratoryController;
use App\Http\Controllers\Dashboard\Department\LibraryController;
use App\Http\Controllers\Dashboard\Department\ResearchController;
use App\Http\Controllers\Dashboard\Announcement\AnnouncementsController;
use App\Http\Controllers\Dashboard\Announcement\ConferenceController;
use App\Http\Controllers\Dashboard\Announcement\GrantController;
use App\Http\Controllers\Dashboard\Announcement\SeminarController;
use App\Http\Controllers\Dashboard\Announcement\WorkshopController;
use App\Http\Controllers\Dashboard\Other\AchievementController;
use App\Http\Controllers\Dashboard\Other\CarouselController;
use App\Http\Controllers\Dashboard\Other\GalleryController;
use App\Http\Controllers\Dashboard\Other\TestimonialController;
use App\Http\Controllers\Dashboard\Other\VideoController;
use App\Http\Controllers\Dashboard\Resource\AcademicPaperController;
use App\Http\Controllers\Dashboard\Resource\DigitalLibraryController;
use App\Http\Controllers\Dashboard\Resource\ForumController;
use App\Http\Controllers\Dashboard\Resource\PlanController;
use App\Http\Controllers\Dashboard\Resource\ReportController;
use App\Http\Controllers\Dashboard\Resource\StaffPublicationController;
use App\Http\Controllers\Dashboard\Resource\StatisticController;
use App\Http\Controllers\Dashboard\Resource\FreeDatabasesController;
use App\Models\Achievement;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Website Routes

//General routes
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/galleryCollection', [HomeController::class,'galleryCollection'])->name('galleryCollection');
Route::get('/news', [HomeController::class,'news'])->name('news');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/loginForm', [AuthController::class,'loginForm'])->name('loginForm');


//About routes
Route::get('/aboutUs',[AboutController::class,'aboutUs'])->name('aboutUs');
Route::get('/ourVision',[AboutController::class,'ourVision'])->name('ourVision');
Route::get('/ourMission',[AboutController::class,'ourMission'])->name('ourMission');
Route::get('/policies',[AboutController::class,'policies'])->name('policies');
Route::get('/objective',[AboutController::class,'objective'])->name('objective');
Route::get('/strategicPlans',[AboutController::class,'strategicPlans'])->name('strategicPlans');
Route::get('/forum',[AboutController::class,'forum'])->name('forum');
Route::get('/administrativStaff',[AboutController::class,'administrativeStaff'])->name('administrativeStaff');
Route::get('/priority',[AboutController::class,'priority'])->name('priority');

//Announcement routes
Route::get('/conferences',[AnnouncementController::class,'conferences'])->name('conferences');
Route::get('/seminars',[AnnouncementController::class,'seminars'])->name('seminars');
Route::get('/workshops',[AnnouncementController::class,'workshops'])->name('workshops');
Route::get('/grants',[AnnouncementController::class,'grants'])->name('grants');

//Department routes
Route::get('/academicJournals',[DepartmentController::class,'academicJournals'])->name('academicJournals');
Route::get('/lab',[DepartmentController::class,'lab'])->name('lab');
Route::get('/lib',[DepartmentController::class,'lib'])->name('lib');
Route::get('/rc',[DepartmentController::class,'rc'])->name('rc');

//Resources routes
Route::get('/forums',[ResourceController::class,'forums'])->name('forums');
Route::get('/plans',[ResourceController::class,'plans'])->name('plans');
Route::get('/reports',[ResourceController::class,'reports'])->name('reports');
Route::get('/statistics',[ResourceController::class,'statistics'])->name('statistics');
Route::get('/theses',[ResourceController::class,'thesis'])->name('theses');
Route::get('/monographs',[ResourceController::class,'monographs'])->name('monographs');
Route::get('/digitalLibraries',[ResourceController::class,'digitalLibraries'])->name('digitalLibraries');
Route::get('/staffPublications',[ResourceController::class,'staffPublications'])->name('staffPublications');
Route::get('/facultyLogo',[ResourceController::class,'facultyLogo'])->name('facultyLogo');
Route::get('/showLecturer/{faculty}',[ResourceController::class,'showLecturer'])->name('showLecturer');
Route::get('/showPublication/{lecturer}',[ResourceController::class,'showPublication'])->name('showPublication');
Route::get('/databases',[ResourceController::class,'databases'])->name('databases');


Route::middleware(['auth'])->group(function () {

//Dashboard routes

    //User routes
    Route::get('/userList',[AuthController::class,'userList'])->name('dashboard.userList');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/registerForm', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::delete('/users/{id}', [AuthController::class, 'destroy'])->name('users.destroy');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //Contact Message routes
    Route::get('/messages', [DashboardController::class,'showMessage'])->name('messages');
    Route::post('/submitMessage', [DashboardController::class,'submitMessage'])->name('submitMessage');
    Route::delete('/messages/{id}', [DashboardController::class,'destroyMessage'])->name('messages.destroy');

    //Home routes
    Route::get('/dashHome',[DashboardController::class,'dashHome'])->name('dashHome');
    Route::get('/registration', [DashboardController::class, 'registration'])->name('registration');

//About routes

    // About Us
    Route::resource('about', AboutUsController::class);
    //mission
    Route::resource('mission', MissionController::class);
    //vision
    Route::resource('vision', VisionController::class);
    //Objectives
    Route::resource('objectives', ObjectivesController::class);
    //Policy
    Route::resource('policy', PolicyController::class);
    //Priorities
    Route::resource('priorities', PriorityController::class);
    //Strategic Plan
    Route::resource('strategicPlan', StrategicPlanController::class);
    //Administrative Staffs
    Route::resource('staff', StaffController::class);

//Academic Journals

    //department
    Route::resource('academic', AcademicJournalController::class);
    //laboratory
    Route::resource('laboratory', LaboratoryController::class);
    //Library
    Route::resource('library', LibraryController::class);
    //Research
    Route::resource('research', ResearchController::class);

//Announcement routes

    //Announcement
    Route::resource('announcement', AnnouncementsController::class);
    //Conference
    Route::resource('conference', ConferenceController::class);
    //Grants
    Route::resource('grant', GrantController::class);
    //Seminar
    Route::resource('seminar', SeminarController::class);
    //Workshop
    Route::resource('workshop', WorkshopController::class);

//Resource routes

    //Forum
    Route::resource('forum', ForumController::class);
    //Plans
    Route::resource('plan', PlanController::class);
    //Reports
    Route::resource('report', ReportController::class);
    //Statistics
    Route::resource('statistic', StatisticController::class);
    //Academic Paper
    Route::resource('paper', AcademicPaperController::class);
    //Digital Library
    Route::resource('digital', DigitalLibraryController::class);
    //Staff Publication
    Route::resource('publication', StaffPublicationController::class);
    //Free Database
    Route::resource('database', FreeDatabasesController::class);
    //Faculty Logo
    Route::get('/showLogo',[StaffPublicationController::class,'showLogo'])->name('showLogo');
    Route::get('/addLogo',[StaffPublicationController::class,'addLogo'])->name('addLogo');
    Route::post('/storeLogo',[StaffPublicationController::class,'storeLogo'])->name('storeLogo');
    Route::get('/editLogo/{logo}', [StaffPublicationController::class, 'editLogo'])->name('editLogo');
    Route::put('/updateLogo/{logo}', [StaffPublicationController::class, 'updateLogo'])->name('updateLogo');
    Route::delete('/deleteLogo',[StaffPublicationController::class,'deleteLogo'])->name('deleteLogo');

//Other routes

    //Carousel
    Route::resource('carousel', CarouselController::class);
    //Gallery
    Route::resource('gallery', GalleryController::class);
    //Testimonial
    Route::resource('testimonial', TestimonialController::class);
    //Achievement
    Route::resource('achievement', AchievementController::class);

    //Video
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::post('/video', [VideoController::class, 'store'])->name('video.store');

});