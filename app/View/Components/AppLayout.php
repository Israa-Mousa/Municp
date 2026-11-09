<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Blog;
use App\Models\Careers;
use App\Models\Institutions;
use App\Models\Services;
use App\Models\Projects;
use App\Models\Tenders;
use App\Models\Tourisms;

class AppLayout extends Component
{
    public $title;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function __construct($title = '')
    {
        $this->title = $title;
    }
    public function render()
    {
        $blogs = Blog::where('status', 'active')->latest()->take(6)->get();
        $services = Services::mainServices();
        $projects = Projects::all();
        $tourisms = Tourisms::all();
        $careers = Careers::all()->where('status', 1);
        $tenders = Tenders::all()->where('status', 1);
        $institutions = Institutions::all();
        // var_dump($institution);
        // die();
        return view(
            'layouts.app',
            [
                'blogs' => $blogs,
                'services' => $services,
                'projects' => $projects,
                'tourisms' => $tourisms,
                'careers' => $careers,
                'institutions' => $institutions,
                'tenders' => $tenders
            ]
        );
    }
}
