<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function()
{

    Route::get('/', 'PagesController@index')->name('pages.index');
    Route::get('/blog', 'PagesController@blog')->name('pages.blog');
    Route::get('/blog-details/{slug}', 'PagesController@blogDetails')->name('pages.blog_details');
    Route::get('/programs', 'PagesController@programs')->name('pages.programs');
    Route::get('/live-show', 'PagesController@liveShow')->name('pages.live-show');
    Route::get('/testimonials', 'PagesController@testimonials')->name('pages.testimonials');
    Route::get('/about-us', 'PagesController@aboutUs')->name('pages.about-us');
    Route::get('/faq', 'PagesController@faq')->name('pages.faq');
    Route::get('/student-portal', 'PagesController@studentPortal')->name('pages.student-portal');
});


Route::group(['prefix'=>'admin', 'namespace' => 'Admin'], function() {
    //Admin Home page
    Route::get('/', 'AdminController@index')->name('admin.index')->middleware('auth:admin');
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('admin.login');
        Route::post('/login','LoginController@login');
        Route::get('/logout','LoginController@logout')->name('admin.logout')->middleware('auth:admin');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('admin.password.request')->middleware('guest:admin');

        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email')->middleware('guest:admin');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('admin.password.update')->middleware('guest:admin');;

    });

    Route::group(['prefix'=>'page-settings', 'middleware' => 'auth:admin', 'namespace' => 'PageSettings'], function() {
        // Hero Section
        Route::get('/hero-section', 'HeroController@heroIndex')->name('admin.hero_index');
        Route::get('/hero-add', 'HeroController@heroAdd')->name('admin.hero_add');
        Route::post('/hero-store', 'HeroController@heroStore')->name('admin.hero_store');
        Route::get('/hero-edit/{id}', 'HeroController@heroEdit')->name('admin.hero_edit');
        Route::put('/hero-update/{id}', 'HeroController@heroUpdate')->name('admin.hero_update');
        Route::post('/hero-delete/{id}', 'HeroController@heroDelete')->name('admin.hero_delete');
        Route::post('/hero-status-update/{id}', 'HeroController@heroStatusUpdate')->name('admin.hero_status_update');

        // About Dr T Section
        Route::get('/about-section', 'AboutController@aboutIndex')->name('admin.about_index');
        Route::get('/about-add', 'AboutController@aboutAdd')->name('admin.about_add');
        Route::post('/about-store', 'AboutController@aboutStore')->name('admin.about_store');
        Route::get('/about-edit/{id}', 'AboutController@aboutEdit')->name('admin.about_edit');
        Route::put('/about-update/{id}', 'AboutController@aboutUpdate')->name('admin.about_update');
        Route::post('/about-delete/{id}', 'AboutController@aboutDelete')->name('admin.about_delete');
        Route::post('/about-status-update/{id}', 'AboutController@aboutStatusUpdate')->name('admin.about_status_update');

        // As Seen On Section
        Route::get('/seen-on-section', 'AsSeenController@asSeenIndex')->name('admin.as_seen_index');
        Route::get('/seen-on-add', 'AsSeenController@asSeenAdd')->name('admin.as_seen_add');
        Route::post('/seen-on-store', 'AsSeenController@asSeenStore')->name('admin.as_seen_store');
        Route::get('/seen-on-edit/{id}', 'AsSeenController@asSeenEdit')->name('admin.as_seen_edit');
        Route::put('/seen-on-update/{id}', 'AsSeenController@asSeenUpdate')->name('admin.as_seen_update');
        Route::post('/seen-on-delete/{id}', 'AsSeenController@asSeenDelete')->name('admin.as_seen_delete');
        Route::post('/seen-on-update/{id}', 'AsSeenController@asSeenStatusUpdate')->name('admin.as_seen_status_update');

        // Meet Dr T Section
        Route::get('/meet-section', 'MeetController@meetIndex')->name('admin.meet_index');
        Route::get('/meet-add', 'MeetController@meetAdd')->name('admin.meet_add');
        Route::post('/meet-store', 'MeetController@meetStore')->name('admin.meet_store');
        Route::get('/meet-edit/{id}', 'MeetController@meetEdit')->name('admin.meet_edit');
        Route::put('/meet-update/{id}', 'MeetController@meetUpdate')->name('admin.meet_update');
        Route::post('/meet-delete/{id}', 'MeetController@meetDelete')->name('admin.meet_delete');
        Route::post('/meet-status-update/{id}', 'MeetController@meetStatusUpdate')->name('admin.meet_status_update');


        //Success Section
        Route::get('/success-section', 'SuccessController@successIndex')->name('admin.success_index');
        Route::get('/success-add', 'SuccessController@successAdd')->name('admin.success_add');
        Route::post('/success-store', 'SuccessController@successStore')->name('admin.success_store');
        Route::get('/success-edit/{id}', 'SuccessController@successEdit')->name('admin.success_edit');
        Route::put('/success-update/{id}', 'SuccessController@successUpdate')->name('admin.success_update');
        Route::post('/success-delete/{id}', 'SuccessController@successDelete')->name('admin.success_delete');
        Route::post('/success-status-update/{id}', 'SuccessController@successStatusUpdate')->name('admin.success_status_update');
        Route::post('/success-featured-update/{id}', 'SuccessController@successFeaturedUpdate')->name('admin.success_featured_update');



        // Our Programs Section
        Route::get('/programs-section', 'ProgramsController@programsIndex')->name('admin.programs_index');
        Route::get('/programs-add', 'ProgramsController@programsAdd')->name('admin.programs_add');
        Route::post('/programs-store', 'ProgramsController@programsStore')->name('admin.programs_store');
        Route::get('/programs-edit/{id}', 'ProgramsController@programsEdit')->name('admin.programs_edit');
        Route::put('/programs-update/{id}', 'ProgramsController@programsUpdate')->name('admin.programs_update');
        Route::post('/programs-delete/{id}', 'ProgramsController@programsDelete')->name('admin.programs_delete');
        Route::post('/programs-status-update/{id}', 'ProgramsController@prStatusUpdate')->name('admin.programs_status_update');


        // Social Media Section
        Route::get('/social-media-section', 'SocialMediaController@sMediaIndex')->name('admin.social_media_index');
        Route::post('/social-media-store/{id?}', 'SocialMediaController@sMediaStore')->name('admin.social_media_store');


        // Media Section
        Route::get('/media-section', 'MediaController@mediaIndex')->name('admin.media_index');
        Route::get('/media-add', 'MediaController@mediaAdd')->name('admin.media_add');
        Route::post('/media-store', 'MediaController@mediaStore')->name('admin.media_store');
        Route::get('/media-edit/{id}', 'MediaController@mediaEdit')->name('admin.media_edit');
        Route::put('/media-update/{id}', 'MediaController@mediaUpdate')->name('admin.media_update');
        Route::post('/media-delete/{id}', 'MediaController@mediaDelete')->name('admin.media_delete');
        Route::post('/media-status-update/{id}', 'MediaController@mediaStatusUpdate')->name('admin.media_status_update');

        // Blog Section
        Route::get('/blog-section', 'BlogController@blogIndex')->name('admin.blog_index');
        Route::get('/blog-add', 'BlogController@blogAdd')->name('admin.blog_add');
        Route::post('/blog-store', 'BlogController@blogStore')->name('admin.blog_store');
        Route::get('/blog-edit/{slug}', 'BlogController@blogEdit')->name('admin.blog_edit');
        Route::put('/blog-update/{slug}', 'BlogController@blogUpdate')->name('admin.blog_update');
        Route::post('/blog-delete/{id}', 'BlogController@blogDelete')->name('admin.blog_delete');
        Route::post('/blog-status-update/{id}', 'BlogController@blogStatusUpdate')->name('admin.blog_status_update');
        Route::post('/blog-featured-status-update/{id}', 'BlogController@blogFeaturedStatusUpdate')->name('admin.blog_featured_status_update');

        // Blog Category Section
        Route::get('/blog-category', 'BlogCategoryController@blogCategoryIndex')->name('admin.blog_category_index');
        Route::get('/blog-category-add', 'BlogCategoryController@blogCategoryAdd')->name('admin.blog_category_add');
        Route::post('/blog-category-store', 'BlogCategoryController@blogCategoryStore')->name('admin.blog_category_store');
        Route::get('/blog-category-edit/{id}', 'BlogCategoryController@blogCategoryEdit')->name('admin.blog_category_edit');
        Route::put('/blog-category-update/{id}', 'BlogCategoryController@blogCategoryUpdate')->name('admin.blog_category_update');
        Route::post('/blog-category-delete/{id}', 'BlogCategoryController@blogCategoryDelete')->name('admin.blog_category_delete');
        Route::post('/blog-category-status-update/{id}', 'BlogCategoryController@blogCategoryStatusUpdate')->name('admin.blog_category_status_update');

        // Faq page
        Route::get('/faq-section', 'FaqController@faqIndex')->name('admin.faq_index');
        Route::get('/faq-add', 'FaqController@faqAdd')->name('admin.faq_add');
        Route::post('/faq-store', 'FaqController@faqStore')->name('admin.faq_store');
        Route::get('/faq-edit/{id}', 'FaqController@faqEdit')->name('admin.faq_edit');
        Route::put('/faq-update/{id}', 'FaqController@faqUpdate')->name('admin.faq_update');
        Route::post('/faq-delete/{id}', 'FaqController@faqDelete')->name('admin.faq_delete');
        Route::post('/faq-status-update/{id}', 'Faqontroller@FaqStatusUpdate')->name('admin.faq_status_update');
        Route::post('/faq-featured-status-update/{id}', 'FaqController@faqFeaturedStatusUpdate')->name('admin.faq_featured_status_update');
        // Live page
        Route::get('/live-section', 'LiveController@liveIndex')->name('admin.live_index');
        Route::get('/live-add', 'LiveController@liveAdd')->name('admin.live_add');
        Route::post('/live-store', 'LiveController@liveStore')->name('admin.live_store');
        Route::get('/live-edit/{id}', 'LiveController@liveEdit')->name('admin.live_edit');
        Route::put('/live-update/{id}', 'LiveController@liveUpdate')->name('admin.live_update');
        Route::post('/live-delete/{id}', 'LiveController@liveDelete')->name('admin.live_delete');
        Route::post('/live-status-update/{id}', 'LiveController@liveStatusUpdate')->name('admin.live_status_update');

        // About section
        Route::get('/about-us-section', 'AboutUsController@aboutUsIndex')->name('admin.about_us_index');
        Route::get('/about-us-add', 'AboutUsController@aboutUsAdd')->name('admin.about_us_add');
        Route::post('/about-us-store', 'AboutUsController@aboutUsStore')->name('admin.about_us_store');
        Route::get('/about-us-edit/{id}', 'AboutUsController@aboutUsEdit')->name('admin.about_us_edit');
        Route::post('/about-us-update/{id}', 'AboutUsController@aboutUsUpdate')->name('admin.about_us_update');
        Route::post('/about-us-delete/{id}', 'AboutUsController@aboutUsDelete')->name('admin.about_us_delete');
        Route::post('/about-us-status-update/{id}', 'AboutUsController@aboutUsStatusUpdate')->name('admin.about_us_status_update');

        // Our Programs page 1st sectoin
        Route::get('/first-section', 'FirstSectionController@firstSectionIndex')->name('admin.first_section_index');
        Route::get('/first-section-add', 'FirstSectionController@firstSectionAdd')->name('admin.first_section_add');
        Route::post('/first-section-store', 'FirstSectionController@firstSectionStore')->name('admin.first_section_store');
        Route::get('/first-section-edit/{id}', 'FirstSectionController@firstSectionEdit')->name('admin.first_section_edit');
        Route::post('/first-section-update/{id}', 'FirstSectionController@firstSectionUpdate')->name('admin.first_section_update');
        Route::post('/first-section-delete/{id}', 'FirstSectionController@firstSectionDelete')->name('admin.first_section_delete');
        Route::post('/first-section-status-update/{id}', 'FirstSectionController@firstSectionStatusUpdate')->name('admin.first_section_status_update');

        //Piller section
        Route::get('/piller-section', 'PillerSectionController@pillerIndex')->name('admin.piller_section_index');
        Route::get('/piller-section-add', 'PillerSectionController@pillerAdd')->name('admin.piller_section_add');
        Route::post('/piller-section-store', 'PillerSectionController@pillerStore')->name('admin.piller_section_store');
        Route::get('/piller-section-edit/{id}', 'PillerSectionController@pillerEdit')->name('admin.piller_section_edit');
        Route::post('/piller-section-update/{id}', 'PillerSectionController@pillerUpdate')->name('admin.piller_section_update');
        Route::post('/piller-section-delete/{id}', 'PillerSectionController@pillerDelete')->name('admin.piller_section_delete');
        Route::post('/piller-section-status-update/{id}', 'PillerSectionController@pillerStatusUpdate')->name('admin.piller_section_status_update');

        //Proven section
        Route::get('/proven-section', 'ProvenSectionController@provenIndex')->name('admin.proven_section_index');
        Route::get('/proven-section-add', 'ProvenSectionController@provenAdd')->name('admin.proven_section_add');
        Route::post('/proven-section-store', 'ProvenSectionController@provenStore')->name('admin.proven_section_store');
        Route::get('/proven-section-edit/{id}', 'ProvenSectionController@provenEdit')->name('admin.proven_section_edit');
        Route::post('/proven-section-update/{id}', 'ProvenSectionController@provenUpdate')->name('admin.proven_section_update');
        Route::post('/proven-section-delete/{id}', 'ProvenSectionController@provenDelete')->name('admin.proven_section_delete');
        Route::post('/proven-section-status-update/{id}', 'ProvenSectionController@provenStatusUpdate')->name('admin.proven_section_status_update');

        //Program slider
        Route::get('/program-section', 'ProgramSliderController@programIndex')->name('admin.program_section_index');
        Route::get('/program-section-add', 'ProgramSliderController@programAdd')->name('admin.program_section_add');
        Route::post('/program-section-store', 'ProgramSliderController@programStore')->name('admin.program_section_store');
        Route::get('/program-section-edit/{id}', 'ProgramSliderController@programEdit')->name('admin.program_section_edit');
        Route::post('/program-section-update/{id}', 'ProgramSliderController@programUpdate')->name('admin.program_section_update');
        Route::post('/program-section-delete/{id}', 'ProgramSliderController@programDelete')->name('admin.program_section_delete');


        //Dream Section
        Route::get('/dream-section', 'DreamSectionController@dreamIndex')->name('admin.dream_section_index');
        Route::get('/dream-section-add', 'DreamSectionController@dreamAdd')->name('admin.dream_section_add');
        Route::post('/dream-section-store', 'DreamSectionController@dreamStore')->name('admin.dream_section_store');
        Route::get('/dream-section-edit/{id}', 'DreamSectionController@dreamEdit')->name('admin.dream_section_edit');
        Route::post('/dream-section-update/{id}', 'DreamSectionController@dreamUpdate')->name('admin.dream_section_update');
        Route::post('/dream-section-delete/{id}', 'DreamSectionController@dreamDelete')->name('admin.dream_section_delete');
        Route::post('/dream-section-status-update/{id}', 'DreamSectionController@dreamStatusUpdate')->name('admin.dream_section_status_update');

        //Imagine Media
        Route::get('/imagine-media-section','ImagineSectionController@imagineMediaIndex')->name('admin.imagine_media_section_index');
        Route::post('/imagine-media-section-store/{id?}','ImagineSectionController@imagineMediaStore')->name('admin.imagine_media_section_store');
        //Imagine Content
        Route::get('/imagine-content-section', 'ImagineSectionController@imagineContentIndex')->name('admin.imagine_content_section_index');
        Route::get('/imagine-content-section-add', 'ImagineSectionController@imagineContentAdd')->name('admin.imagine_content_section_add');
        Route::post('/imagine-content-section-store', 'ImagineSectionController@imagineContentStore')->name('admin.imagine_content_section_store');
        Route::get('/imagine-content-section-edit/{id}', 'ImagineSectionController@imagineContentEdit')->name('admin.imagine_content_section_edit');
        Route::post('/imagine-content-section-update/{id}', 'ImagineSectionController@imagineContentUpdate')->name('admin.imagine_content_section_update');
        Route::post('/imagine-content-section-delete/{id}', 'ImagineSectionController@imagineContentDelete')->name('admin.imagine_content_section_delete');
        Route::post('/imagine-content-section-status-update/{id}', 'ImagineSectionController@imagineContentStatusUpdate')->name('admin.imagine_content_section_status_update');

        //Diploma Section
        Route::get('/diploma-section', 'DiplomaSectionController@diplomaIndex')->name('admin.diploma_section_index');
        Route::get('/diploma-section-add', 'DiplomaSectionController@diplomaAdd')->name('admin.diploma_section_add');
        Route::post('/diploma-section-store', 'DiplomaSectionController@diplomaStore')->name('admin.diploma_section_store');
        Route::get('/diploma-section-edit/{id}', 'DiplomaSectionController@diplomatEdit')->name('admin.diploma_section_edit');
        Route::post('/diploma-section-update/{id}', 'DiplomaSectionController@diplomaUpdate')->name('admin.diploma_section_update');
        Route::post('/diploma-section-delete/{id}', 'DiplomaSectionController@diplomaDelete')->name('admin.diploma_section_delete');
        Route::post('/diploma-section-status-update/{id}', 'DiplomaSectionController@diplomaStatusUpdate')->name('admin.diploma_section_status_update');

        //End Section
        Route::get('/End-section','EndSectionController@endSectionIndex')->name('admin.End_section_index');
        Route::post('/End-section-store/{id?}','EndSectionController@endSectionStore')->name('admin.End_section_store');

        //Achieve Section
        Route::get('/achieve-section', 'AchieveSectionController@achieveIndex')->name('admin.achieve_section_index');
        Route::get('/achieve-section-add', 'AchieveSectionController@achieveAdd')->name('admin.achieve_section_add');
        Route::post('/achieve-section-store', 'AchieveSectionController@achieveStore')->name('admin.achieve_section_store');
        Route::get('/achieve-section-edit/{id}', 'AchieveSectionController@achieveEdit')->name('admin.achieve_section_edit');
        Route::post('/achieve-section-update/{id}', 'AchieveSectionController@achieveUpdate')->name('admin.achieve_section_update');
        Route::post('/achieve-section-delete/{id}', 'AchieveSectionController@achieveDelete')->name('admin.achieve_section_delete');
        Route::post('/achieve-section-status-update/{id}', 'AchieveSectionController@achieveStatusUpdate')->name('admin.achieve_section_status_update');


        //Pillar Content
        Route::get('/pillar-content-section','PillarController@pillarContentIndex')->name('admin.pillar_content_index');
        Route::post('/pillar-content-store/{id?}','PillarController@pillarContentStore')->name('admin.pillar_content_store');
        //Pillar Program
        Route::get('/pillar-program-section', 'PillarController@pillarProgramIndex')->name('admin.pillar_program_section_index');
        Route::get('/pillar-program-section-add', 'PillarController@pillarProgramAdd')->name('admin.pillar_program_section_add');
        Route::post('/pillar-program-section-store', 'PillarController@pillarProgramStore')->name('admin.pillar_program_section_store');
        Route::get('/pillar-program-section-edit/{id}', 'PillarController@pillarProgramEdit')->name('admin.pillar_program_section_edit');
        Route::post('/pillar-program-section-update/{id}', 'PillarController@pillarProgramUpdate')->name('admin.pillar_program_section_update');
        Route::post('/pillar-program-section-delete/{id}', 'PillarController@pillarProgramDelete')->name('admin.pillar_program_section_delete');
        Route::post('/pillar-program-status-update/{id}', 'PillarController@pillarStatusUpdate')->name('admin.pillar_program_status_update');

        //Bonus Section
        Route::get('/bonus-section', 'BonusSectionController@bonusIndex')->name('admin.bonus_section_index');
        Route::get('/bonus-section-add', 'BonusSectionController@bonusAdd')->name('admin.bonus_section_add');
        Route::post('/bonus-section-store', 'BonusSectionController@bonusStore')->name('admin.bonus_section_store');
        Route::get('/bonus-section-edit/{id}', 'BonusSectionController@bonusEdit')->name('admin.bonus_section_edit');
        Route::post('/bonus-section-update/{id}', 'BonusSectionController@bonusUpdate')->name('admin.bonus_section_update');
        Route::post('/bonus-section-delete/{id}', 'BonusSectionController@bonusDelete')->name('admin.bonus_section_delete');
        Route::post('/bonus-status-update/{id}', 'BonusSectionController@bonusStatusUpdate')->name('admin.bonus_status_update');

        //Payment Section
        Route::get('/payment-section', 'PaymentSectionController@paymentIndex')->name('admin.payment_section_index');
        Route::get('/payment-section-add', 'PaymentSectionController@paymentAdd')->name('admin.payment_section_add');
        Route::post('/payment-section-store', 'PaymentSectionController@paymentStore')->name('admin.payment_section_store');
        Route::get('/payment-section-edit/{id}', 'PaymentSectionController@paymentEdit')->name('admin.payment_section_edit');
        Route::post('/payment-section-update/{id}', 'PaymentSectionController@paymentUpdate')->name('admin.payment_section_update');
        Route::post('/payment-section-delete/{id}', 'PaymentSectionController@paymentDelete')->name('admin.payment_section_delete');
        Route::post('/payment-status-update/{id}', 'PaymentSectionController@paymentStatusUpdate')->name('admin.payment_status_update');

        //Discussion Section
        Route::get('/discussion-content-section','DiscussionSectionController@discussionContentIndex')->name('admin.discussion_content_section_index');
        Route::post('/discussion-content-section-store/{id?}','DiscussionSectionController@discussionContentStore')->name('admin.discussion_content_section_store');
        //Discussion Content Section
        Route::get('/discussion-section', 'DiscussionSectionController@discussionIndex')->name('admin.discussion_section_index');
        Route::get('/discussion-section-add', 'DiscussionSectionController@discussionAdd')->name('admin.discussion_section_add');
        Route::post('/discussion-section-store', 'DiscussionSectionController@discussionStore')->name('admin.discussion_section_store');
        Route::get('/discussion-section-edit/{id}', 'DiscussionSectionController@discussionEdit')->name('admin.discussion_section_edit');
        Route::post('/discussion-section-update/{id}', 'DiscussionSectionController@discussionUpdate')->name('admin.discussion_section_update');
        Route::post('/discussion-section-delete/{id}', 'DiscussionSectionController@discussionDelete')->name('admin.discussion_section_delete');

        //Investment Section
        Route::get('/investment-section', 'InvestmentSectionController@investmentIndex')->name('admin.investment_section_index');
        Route::get('/investment-section-add', 'InvestmentSectionController@investmentAdd')->name('admin.investment_section_add');
        Route::post('/investment-section-store', 'InvestmentSectionController@investmentStore')->name('admin.investment_section_store');
        Route::get('/investment-section-edit/{id}', 'InvestmentSectionController@investmentEdit')->name('admin.investment_section_edit');
        Route::post('/investment-section-update/{id}', 'InvestmentSectionController@investmentUpdate')->name('admin.investment_section_update');
        Route::post('/investment-section-delete/{id}', 'InvestmentSectionController@investmentDelete')->name('admin.investment_section_delete');
        Route::post('/investment-section-status-update/{id}', 'InvestmentSectionController@investmentStatusUpdate')->name('admin.investment_section_status_update');


    });
});


Route::group(['prefix'=>'student', 'middleware' => 'auth'], function() {
    // Student Portal
    Route::get('/', 'HomeController@index')->name('user.index');
    Route::get('/logout','Auth\LoginController@logout')->name('student.logout');
});

//PayPal
Route::post('paypal-pay', [PaymentController::class, 'pay'])->name('paypal.payment');
Route::get('paypal-success', [PaymentController::class, 'success'])->name('paypal.success');
Route::get('paypal-error', [PaymentController::class, 'error'])->name('paypal.error');


Auth::routes();
