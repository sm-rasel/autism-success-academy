<?php

namespace App\Http\Controllers;
use App\Models\{AchieveSection,
    BonusSection,
    DiplomaSection,
    DiscussionContent,
    DiscussionSection,
    DreamSection,
    EndSection,
    FirstSection,
    HeroSection,
    AboutSection,
    AsSeenSection,
    ImagineContent,
    ImagineMedia,
    InvestmentSection,
    MeetSection,
    PaymentSection,
    PillarContent,
    PillarProgram,
    PillerSection,
    ProgramSection,
    ProgramSlider,
    ProvenSection,
    SuccessSection,
    BlogSection,
    MediaSection,
    SocialMediaSection,
    FaqSection,
    LiveSection,
    AboutUs};

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $hero       = HeroSection::where('status', 1)->first();
        $about      = AboutSection::where('status', 1)->first();
        $as_seen    = AsSeenSection::where('status', 1)->orderBy('order', 'asc')->get();
        $meet       = MeetSection::where('status', 1)->first();
        $programs   = ProgramSection::where('status', 1)->orderBy('order', 'asc')->get();
        $successes  = SuccessSection::where('is_featured', 1)->where('status', 1)->orderBy('order', 'asc')->take(3)->get();
        $blogs      = BlogSection::with('blogCategory:id,category_name')->where('status', 1)->where('is_featured', 1)->orderBy('id', 'asc')->take(3)->get();
        $social     = SocialMediaSection::first();

        return view('website.home')->with([
            'hero'      => $hero,
            'about'     => $about,
            'as_seen'   => $as_seen,
            'meet'      => $meet,
            'programs'  => $programs,
            'successes' => $successes,
            'blogs'     => $blogs,
            'social'    => $social
        ]);
    }

    public function blog()
    {
        $blogs      = BlogSection::with('blogCategory:id,category_name')->where('status', 1)->orderBy('id', 'asc')->take(3)->get();
        $nextBlog   = BlogSection::skip(3)->select('title','slug')->orderBy('id', 'asc')->first();
        $social     = SocialMediaSection::first();
        return view('website.blog')->with(['blogs' => $blogs, 'nextBlog' => $nextBlog, 'social' => $social]);
    }

    public function blogDetails($slug)
    {
        $blog       = BlogSection::where('slug', $slug)->first();
        $nextBlog   = BlogSection::where('id','>', $blog->id)->select('title','slug')->first();
        $social     = SocialMediaSection::first();
        return view('website.blog_details')->with([
            'blog'      => $blog,
            'nextBlog'  => $nextBlog,
            'social'    => $social
        ]);
    }

    public function programs()
    {
        $social             = SocialMediaSection::first();
        $faqs               = FaqSection::where('status', 1)->where('is_featured', 1)->orderBy('order', 'asc')->get();
        $programs           = ProgramSection::where('status', 1)->orderBy('order', 'asc')->get();
        $successes_upper    = SuccessSection::where('program_upper', 1)->where('status', 1)->orderBy('order', 'asc')->take(3)->get();
        $successes_second   = SuccessSection::where('program_second', 1)->where('status', 1)->orderBy('order', 'asc')->take(3)->get();
        $successes_third    = SuccessSection::where('program_third', 1)->where('status', 1)->orderBy('order', 'asc')->take(3)->get();
        $successes_bottom   = SuccessSection::where('program_bottom', 1)->where('status', 1)->orderBy('order', 'asc')->take(3)->get();
        $meet               = MeetSection::where('status', 1)->first();
        $first              = FirstSection::where('status', 1)->first();
        $pillars            = PillerSection::where('status', 1)->orderBy('id', 'asc')->get();
        $proven             = ProvenSection::where('status', 1)->first();
        $programes          = ProgramSlider::where('status', 1)->orderBy('id', 'asc')->get();
        $dream              = DreamSection::where('status', 1)->first();
        $imagine_m          = ImagineMedia::where('status', 1)->first();
        $imagines           = ImagineContent::where('status', 1)->orderBy('id', 'asc')->get();
        $diplomas           = DiplomaSection::where('status', 1)->orderBy('id', 'asc')->get();
        $end                = EndSection::where('status', 1)->first();
        $achieves           = AchieveSection::where('status', 1)->orderBy('id', 'asc')->get();
        $pillar_c           = PillarContent::first();
        $pillar_p           = PillarProgram::where('status', 1)->orderBy('id', 'asc')->get();
        $bonuses            = BonusSection::where('status', 1)->orderBy('id', 'asc')->get();
        $payments           = PaymentSection::where('status', 1)->orderBy('id', 'asc')->get();
        $discussion_c       = DiscussionContent::first();
        $discussions        = DiscussionSection::where('status', 1)->orderBy('order', 'asc')->get();
        $investments        = InvestmentSection::where('status', 1)->orderBy('order', 'asc')->get();
        return view('website.programs')->with([
            'first'             => $first,
            'social'            => $social,
            'programs'          => $programs,
            'faqs'              => $faqs,
            'meet'              => $meet,
            'successes_upper'   => $successes_upper,
            'successes_second'  => $successes_second,
            'successes_third'   => $successes_third,
            'successes_bottom'  => $successes_bottom,
            'pillars'           => $pillars,
            'proven'            => $proven,
            'programes'         => $programes,
            'dream'             => $dream,
            'imagine_m'         => $imagine_m,
            'imagines'          => $imagines,
            'diplomas'          => $diplomas,
            'end'               => $end,
            'achieves'          => $achieves,
            'pillar_c'          => $pillar_c,
            'pillar_p'          => $pillar_p,
            'bonuses'           => $bonuses,
            'payments'          => $payments,
            'discussion_c'      => $discussion_c,
            'discussions'       => $discussions,
            'investments'       => $investments
        ]);
    }

    public function liveShow()
    {
        $lives      = LiveSection::where('status', 1)->orderBy('id', 'asc')->get();
        $social     = SocialMediaSection::first();
        return view('website.live_show')->with([
            'lives'     => $lives,
            'social'    => $social
        ]);
    }

    public function testimonials()
    {
        $social     = SocialMediaSection::first();
        $medias     = MediaSection::where('status', 1)->orderBy('order', 'asc')->take(2)->get();
        $successes  = SuccessSection::where('status', 1)->orderBy('order', 'asc')->get();
        return view('website.media')->with([
            'medias'    => $medias,
            'social'    => $social,
            'successes' => $successes
        ]);
    }

    public function aboutUs()
    {
        $about_us   = AboutUs::where('status', 1)->orderBy('order', 'asc')->get();
        $social     = SocialMediaSection::first();
        return view('website.about_us')->with([
            'social'    => $social,
            'about_us'  => $about_us
        ]);
    }

    public function faq()
    {
        $social     = SocialMediaSection::first();
        $faqs       = FaqSection::where('status', 1)->orderBy('order', 'asc')->get();
        return view('website.faq')->with([
            'faqs'      => $faqs,
            'social'    => $social
        ]);
    }

    public function studentPortal()
    {
        $social = SocialMediaSection::first();
        return view('website.student_portal')->with([
            'loginRoute'            => 'login',
            'forgotPasswordRoute'   => 'password.request',
            'social'    => $social
        ]);
    }
}
