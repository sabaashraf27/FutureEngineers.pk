@extends('layouts.app')

@section('body_class', 'privacy-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Privacy Policy</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Privacy Policy</h1>
        <p>Last updated: August 2026</p>
      </div>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container" style="max-width: 860px;">

        <p>This Privacy Policy explains how FutureEngineers.pk ("we", "us") collects, uses, and protects your information when you use this website (the "Site").</p>

        <h2>1. Information We Collect</h2>
        <p>We collect information you provide directly to us, such as:</p>
        <ul>
          <li>Your name and email address, when you submit our contact form or subscribe to our newsletter</li>
          <li>Any message content you send us through the contact form</li>
          <li>Your WhatsApp number, only if you choose to join our WhatsApp community</li>
        </ul>
        <p>We do not currently collect payment information, as the Site does not process payments.</p>

        <h2>2. How We Use Your Information</h2>
        <p>We use the information you provide to:</p>
        <ul>
          <li>Respond to your enquiries</li>
          <li>Send newsletter updates about jobs, internships, scholarships, and courses, if you subscribe</li>
          <li>Improve the content and usefulness of the Site</li>
        </ul>
        <p>We do not sell your personal information to third parties.</p>

        <h2>3. Third-Party Links</h2>
        <p>Our Site links to external websites for job applications, scholarship applications, and course enrollment (for example, official employer sites, HEC, USEFP, or course-provider platforms). Once you leave our Site, that third party's own privacy policy applies to any information you provide to them.</p>

        <h2>4. Cookies</h2>
        <p>This Site may use basic cookies or similar technologies to support standard website functionality (such as remembering your filter preferences while browsing job or scholarship listings). These do not currently include third-party advertising trackers.</p>

        <h2>5. Data Security</h2>
        <p>We take reasonable steps to protect the information you share with us. However, no method of transmission over the internet is completely secure, and we cannot guarantee absolute security.</p>

        <h2>6. Your Choices</h2>
        <p>You can unsubscribe from our newsletter at any time using the link in any newsletter email, or by contacting us directly. You can also ask us to delete any personal information you've shared with us.</p>

        <h2>7. Children's Privacy</h2>
        <p>This Site is intended for engineering students, fresh graduates, and professionals. It is not directed at children under 13.</p>

        <h2>8. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page.</p>

        <h2>9. Contact Us</h2>
        <p>If you have questions about this Privacy Policy or how your data is handled, contact us at <a href="mailto:Futureengineers.pk@gmail.com">Futureengineers.pk@gmail.com</a> or <a href="tel:+923268462395">+92 326 8462395</a>.</p>

      </div>
    </section>
@endsection
