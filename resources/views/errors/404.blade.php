@extends('layouts.app')

@section('title', 'Page Not Found | DAOZ360')
@section('description', 'The requested page could not be found on DAOZ360. Return to the homepage or contact our team.')
@section('canonical', 'https://daoz360.ai/')

@section('content')
  <section class="section" style="padding: 112px 0;" aria-labelledby="error-404-heading">
    <div class="container" style="max-width: 640px; text-align: center;">
      <div class="section-eyebrow" style="margin: 0 auto 16px;">404 — Page Not Found</div>
      <h1 id="error-404-heading" class="section-title" style="margin-bottom: 16px;">
        We couldn’t find that page.
      </h1>
      <p class="section-subtitle" style="margin: 0 auto 32px;">
        The link you followed may be outdated or the page may have moved. Explore our social media management platform or reach out to our team directly.
      </p>
      <div style="display: flex; flex-wrap: wrap; gap: 14px; justify-content: center;">
        <a href="{{ url('/') }}" class="btn-primary" style="text-decoration: none;">
          <span>Return to Home</span>
        </a>
        <a href="{{ url('/pricing') }}" class="btn-secondary" style="text-decoration: none;">
          <span>View Pricing</span>
        </a>
        <a href="{{ url('/contact') }}" class="btn-secondary" style="text-decoration: none;">
          <span>Contact Us</span>
        </a>
      </div>
    </div>
  </section>
@endsection
