@extends('layouts.app')

@section('body_class', 'contact-page')

@section('content')
<style>
    .info-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      height: 100%;
    }

    .info-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 26px rgba(0, 0, 0, 0.09);
    }

    .side-panel {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
      padding: 1.75rem;
    }

    .side-panel + .side-panel {
      margin-top: 1.5rem;
    }

    .side-panel h3 {
      font-size: 1.05rem;
      margin-bottom: 0.85rem;
    }

    .form-wrapper {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      height: 100%;
    }

    .form-check-label a {
      color: var(--accent-color);
    }

    .form-feedback {
      display: none;
      font-size: 0.92rem;
      padding: 0.9rem 1rem;
      border-radius: 8px;
      margin-top: 1rem;
    }

    .form-feedback.is-success {
      display: block;
      background: rgba(25, 135, 84, 0.1);
      color: #146c43;
      border: 1px solid rgba(25, 135, 84, 0.25);
    }

    .form-feedback.is-error {
      display: block;
      background: rgba(220, 53, 69, 0.08);
      color: #b02a37;
      border: 1px solid rgba(220, 53, 69, 0.25);
    }

    .invalid-feedback {
      display: none;
      font-size: 0.82rem;
      color: #dc3545;
      margin-top: 0.25rem;
    }

    .is-invalid ~ .invalid-feedback,
    .form-check .is-invalid ~ .invalid-feedback {
      display: block;
    }

    .is-invalid {
      border-color: #dc3545 !important;
    }

    .response-box {
      border-left: 4px solid var(--accent-color, #F4C542);
      background: rgba(244, 197, 66, 0.08);
      border-radius: 8px;
      padding: 1.25rem 1.4rem;
    }

    .resource-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
      padding: 1.6rem 1.4rem;
      height: 100%;
      text-align: center;
      text-decoration: none;
      display: block;
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      color: inherit;
    }

    .resource-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 26px rgba(0, 0, 0, 0.09);
      color: inherit;
    }

    .resource-card .icon-box i {
      font-size: 1.9rem;
    }

    .resource-card h3 {
      font-size: 1rem;
      margin: 0.85rem 0 0;
    }

    .faq-section .accordion-button {
      font-weight: 600;
    }

    .faq-section .accordion-button:not(.collapsed) {
      color: var(--heading-color);
      background-color: rgba(244, 197, 66, 0.12);
    }

    .opportunity-cta,
    .community-cta {
      background: #111111;
      color: #fff;
      border-radius: 14px;
      padding: 2.5rem;
    }

    .opportunity-cta h2,
    .opportunity-cta h3,
    .community-cta h2 {
      color: #fff;
    }

    .opportunity-cta p,
    .community-cta p {
      color: rgba(255, 255, 255, 0.8);
    }

    .btn-accent {
      display: inline-block;
      background: var(--accent-color, #F4C542);
      color: #111111;
      font-weight: 600;
      padding: 0.7rem 1.6rem;
      border-radius: 50px;
      border: none;
      text-decoration: none;
      transition: opacity 0.2s ease;
    }

    .btn-accent:hover {
      opacity: 0.88;
      color: #111111;
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">Contact</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>Contact FutureEngineers.pk</h1>
        <p>Have a question, want to share an opportunity, or need help finding the right career resource? Get in touch with the FutureEngineers.pk team.</p>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Contact Info Cards -->
        <div class="row gy-4 mb-5">
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="info-card p-4 text-center">
              <div class="icon-box mb-2">
                <i class="bi bi-envelope"></i>
              </div>
              <h3 class="h5">Email</h3>
              <p class="mb-0"><a href="mailto:Futureengineers.pk@gmail.com">Futureengineers.pk@gmail.com</a></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <div class="info-card p-4 text-center">
              <div class="icon-box mb-2">
                <i class="bi bi-telephone"></i>
              </div>
              <h3 class="h5">Phone</h3>
              <p class="mb-0"><a href="tel:+923268462395">+92 326 8462395</a></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="info-card p-4 text-center">
              <div class="icon-box mb-2">
                <i class="bi bi-geo-alt"></i>
              </div>
              <h3 class="h5">Location</h3>
              <p class="mb-0">Pakistan</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <div class="info-card p-4 text-center">
              <div class="icon-box mb-2">
                <i class="bi bi-people"></i>
              </div>
              <h3 class="h5">Community</h3>
              <p class="mb-0">Connect with the FutureEngineers.pk community</p>
            </div>
          </div>
        </div>

        <!-- Form + Side Panel -->
        <div class="row gy-4">

          <!-- Contact Form -->
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <div class="form-wrapper" id="contact-form">
              <h2 class="h4 mb-1">Send Us a Message</h2>
              <p class="text-muted mb-4">Fill in the form below and our team will get back to you.</p>

              <form id="contactForm" action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form" novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="name" class="form-label">Full Name*</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-person"></i></span>
                      <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your full name" value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="email" class="form-label">Email Address*</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-6 form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-phone"></i></span>
                      <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Optional" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="inquiry_type" class="form-label">Inquiry Type*</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-list"></i></span>
                      <select id="inquiry_type" name="inquiry_type" class="form-control @error('inquiry_type') is-invalid @enderror" required>
                        <option value="">Select inquiry type*</option>
                        @foreach(['General Inquiry', 'Job / Internship Opportunity', 'Scholarship Opportunity', 'Course / Certification', 'CV / Career Resource', 'Partnership', 'Technical Issue', 'Other'] as $type)
                          <option value="{{ $type }}" @selected(old('inquiry_type') === $type)>{{ $type }}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('inquiry_type')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-12 form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                      <input type="text" id="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Briefly summarize your message" value="{{ old('subject') }}">
                    </div>
                    @error('subject')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label for="message" class="form-label">Message*</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="6" placeholder="Write your message" required>{{ old('message') }}</textarea>
                  </div>
                  @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <div class="form-check">
                    <input class="form-check-input @error('consent') is-invalid @enderror" type="checkbox" id="consent" name="consent" required>
                    <label class="form-check-label" for="consent">
                      I agree that FutureEngineers.pk may use the information above to respond to my inquiry.*
                    </label>
                    @error('consent')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                @if(session('contact_success'))
                  <div class="mt-4">
                    <div class="form-feedback is-success" role="status">{{ session('contact_success') }}</div>
                  </div>
                @endif

                <div class="mt-4">
                  <button type="submit" class="btn-accent">Send Message</button>
                </div>

              </form>
            </div>
          </div>

          <!-- Side Panel -->
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">

            <div class="side-panel">
              <h3><i class="bi bi-clock me-2"></i>Response Time</h3>
              <div class="response-box">
                <p class="mb-0">Please allow 1&ndash;2 business days for general inquiries. Opportunity submissions may require additional review. This is a general expectation, not a guaranteed response time.</p>
              </div>
            </div>

            <div class="side-panel opportunity-cta">
              <h3 class="h5">Want to Share an Opportunity?</h3>
              <p class="mb-3">Employers, universities and organizations can eventually use FutureEngineers.pk to share relevant jobs, internships, scholarships, courses and career opportunities with engineering students.</p>
              <a href="#contact-form" class="btn-accent">Submit an Opportunity</a>
            </div>

            <div class="side-panel">
              <h3><i class="bi bi-info-circle me-2"></i>Before You Reach Out</h3>
              <p class="mb-0 text-muted">For fastest response, please select the correct inquiry type above and include as much relevant detail as possible in your message.</p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /Contact Section -->

    <!-- Student Support Section -->
    <section id="student-support" class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center mb-5">
          <h2>Looking for a Career Opportunity?</h2>
          <p class="text-muted">Explore the resources already available on FutureEngineers.pk before reaching out.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('jobs') }}" class="resource-card">
              <div class="icon-box"><i class="bi bi-briefcase"></i></div>
              <h3>Jobs &amp; Internships</h3>
            </a>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="150">
            <a href="{{ route('scholarships') }}" class="resource-card">
              <div class="icon-box"><i class="bi bi-mortarboard"></i></div>
              <h3>Scholarships</h3>
            </a>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('courses') }}" class="resource-card">
              <div class="icon-box"><i class="bi bi-journal-bookmark"></i></div>
              <h3>Courses &amp; Certifications</h3>
            </a>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="250">
            <a href="{{ route('cv-templates.index') }}" class="resource-card">
              <div class="icon-box"><i class="bi bi-file-earmark-text"></i></div>
              <h3>CV Templates</h3>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 mx-auto" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ route('articles.index') }}" class="resource-card">
              <div class="icon-box"><i class="bi bi-newspaper"></i></div>
              <h3>Industry News &amp; Trends</h3>
            </a>
          </div>
        </div>
      </div>
    </section><!-- /Student Support Section -->

    <!-- FAQ Section -->
    <section id="faq" class="faq-section section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center mb-5">
          <h2>Frequently Asked Questions</h2>
          <p class="text-muted">Quick answers to common questions about contacting and using FutureEngineers.pk.</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="accordion" id="contactFaqAccordion">

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
                    How can I find engineering jobs and internships?
                  </button>
                </h3>
                <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#contactFaqAccordion">
                  <div class="accordion-body">
                    Visit the <a href="{{ route('jobs') }}">Jobs &amp; Internships</a> page to browse current listings for engineering students and graduates in Pakistan.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                    Can organizations submit opportunities?
                  </button>
                </h3>
                <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#contactFaqAccordion">
                  <div class="accordion-body">
                    Yes. Employers, universities and organizations can reach out using the contact form and selecting the relevant inquiry type. A dedicated submission system is planned for the future.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                    Where can I find engineering scholarships?
                  </button>
                </h3>
                <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#contactFaqAccordion">
                  <div class="accordion-body">
                    Check the <a href="{{ route('scholarships') }}">Scholarships</a> page for opportunities relevant to engineering students and graduates.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">
                    Where can I find CV templates?
                  </button>
                </h3>
                <div id="faqFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#contactFaqAccordion">
                  <div class="accordion-body">
                    The <a href="{{ route('cv-templates.index') }}">CV Templates</a> page offers resources to help you build a strong engineering resume.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">
                    Are all opportunities verified?
                  </button>
                </h3>
                <div id="faqFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#contactFaqAccordion">
                  <div class="accordion-body">
                    FutureEngineers.pk aggregates opportunities from various sources. Always verify details directly with the official organization or provider before applying or sharing personal information.
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- /FAQ Section -->

    <!-- Community CTA -->
    <section id="community" class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="community-cta text-center">
          <h2>Stay Connected With FutureEngineers.pk</h2>
          <p class="mb-4">Follow the latest engineering opportunities, scholarships, courses and industry updates as the platform grows.</p>
          <a href="{{ route('jobs') }}" class="btn-accent">Explore Opportunities</a>
        </div>
      </div>
    </section><!-- /Community CTA -->
@endsection
