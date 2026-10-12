@extends('layouts.app')

@section('body_class', 'terms-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Terms of Service</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Terms of Service</h1>
        <p>Last updated: August 2026</p>
      </div>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container" style="max-width: 860px;">

        <p>These Terms of Service ("Terms") govern your use of the FutureEngineers.pk website (the "Site"), operated by FutureEngineers.pk. By using the Site, you agree to these Terms.</p>

        <h2>1. About This Site</h2>
        <p>FutureEngineers.pk is a career-development platform for engineering students and fresh graduates in Pakistan. We share job and internship listings, scholarship information, courses and certifications, CV templates, and career-related articles.</p>

        <h2>2. Informational Purpose</h2>
        <p>Content on this Site &mdash; including job listings, scholarship details, course information and articles &mdash; is provided for general informational and educational purposes. Where we link to third-party organisations (employers, scholarship providers, training institutes, universities), we do so as a convenience. We are not responsible for the accuracy, availability, or outcome of applications submitted to third parties, and we recommend always verifying details directly on the official source before applying.</p>

        <h2>3. No Guarantee of Outcomes</h2>
        <p>Use of this Site, including downloading CV templates or reading career guidance content, does not guarantee any job offer, internship placement, scholarship award, or other outcome.</p>

        <h2>4. User Conduct</h2>
        <p>When contacting us or joining our community channels (including our WhatsApp community), you agree to communicate respectfully and not to use the Site or our community to post spam, misleading information, or content that is unlawful, abusive, or infringes on others' rights.</p>

        <h2>5. Intellectual Property</h2>
        <p>The FutureEngineers.pk name, logo, and original content (including articles and CV templates we create) belong to FutureEngineers.pk. You may use our CV templates for personal job-search purposes. Please do not redistribute or resell our original content without permission.</p>

        <h2>6. Third-Party Links</h2>
        <p>This Site contains links to third-party websites (employers, scholarship providers, course platforms, and others). We do not control and are not responsible for the content, policies, or practices of these third-party sites.</p>

        <h2>7. Changes to These Terms</h2>
        <p>We may update these Terms from time to time. Continued use of the Site after changes are posted means you accept the updated Terms.</p>

        <h2>8. Contact</h2>
        <p>Questions about these Terms can be sent to <a href="mailto:Futureengineers.pk@gmail.com">Futureengineers.pk@gmail.com</a>.</p>

      </div>
    </section>
@endsection
