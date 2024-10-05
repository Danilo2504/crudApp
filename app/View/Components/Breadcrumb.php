<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
  public $pages;

  public function __construct($pages)
  {
    $currentUrl = url()->current();
    $breadcrumbCurrentPage = collect($pages)->firstWhere('url', $currentUrl);

    $breadCrumb = array_filter($pages, function ($page) use ($currentUrl) {
      return $page['url'] !== $currentUrl;
    });

    $breadCrumb = array_values($breadCrumb);

    if ($breadcrumbCurrentPage) {
      $breadCrumb[] = $breadcrumbCurrentPage;
    }

    $this->pages = $breadCrumb;
  }

  public function render(): View
  {
    return view('components.breadcrumb');
  }
}
