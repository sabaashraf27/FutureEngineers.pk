@extends('layouts.app')

@section('body_class', 'about-page')

@section('content')
<style>
    /* ---------- Shared section spacing ---------- */
    .about-page .section-heading {
      margin-bottom: 32px;
    }

    .about-page .section-heading h2 {
      font-size: 26px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 8px;
    }

    .about-page .section-heading p {
      font-size: 15px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 25%);
      max-width: 680px;
    }

    /* ---------- Mission section ---------- */
    .mission-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 22px;
    }

    .mission-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 26px 22px;
      text-align: left;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .mission-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
    }

    .mission-card .icon-circle {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 16px;
    }

    .mission-card .icon-circle i {
      font-size: 22px;
      color: var(--accent-color, #0d6efd);
    }

    .mission-card h3 {
      font-size: 16.5px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 8px;
    }

    .mission-card p {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 20%);
      margin: 0;
    }

    /* ---------- Why FutureEngineers.pk ---------- */
    .why-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 22px;
    }

    .why-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 28px 22px;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .why-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
    }

    .why-card .icon-circle {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
    }

    .why-card .icon-circle i {
      font-size: 24px;
      color: var(--accent-color, #0d6efd);
    }

    .why-card h3 {
      font-size: 16.5px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 8px;
    }

    .why-card p {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 20%);
      margin: 0;
    }

    /* ---------- What We Provide ---------- */
    .resource-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 22px;
    }

    .resource-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 26px 22px;
      display: flex;
      flex-direction: column;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .resource-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
    }

    .resource-card .icon-circle {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 14px;
    }

    .resource-card .icon-circle i {
      font-size: 21px;
      color: var(--accent-color, #0d6efd);
    }

    .resource-card h3 {
      font-size: 16px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 8px;
    }

    .resource-card p {
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 20%);
      margin-bottom: 14px;
      flex-grow: 1;
    }

    .resource-card .explore-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 13.5px;
      font-weight: 600;
      color: var(--accent-color, #0d6efd);
      text-decoration: none;
    }

    .resource-card .explore-link:hover {
      text-decoration: underline;
    }

    /* ---------- How It Works ---------- */
    .steps-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 26px;
    }

    .step-card {
      position: relative;
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 30px 24px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
    }

    .step-card .step-num {
      font-size: 32px;
      font-weight: 800;
      color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 55%);
      margin-bottom: 10px;
      line-height: 1;
    }

    .step-card h3 {
      font-size: 17px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 8px;
    }

    .step-card p {
      font-size: 14px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 20%);
      margin: 0;
    }

    /* ---------- Target Audience ---------- */
    .audience-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 22px;
    }

    .audience-card {
      background-color: var(--surface-color, #fff);
      border: 1px solid color-mix(in srgb, var(--default-color, #212529), transparent 92%);
      border-radius: 12px;
      padding: 26px 20px;
      text-align: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .audience-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 22px rgba(0, 0, 0, 0.08);
    }

    .audience-card .icon-circle {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 88%);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 14px;
    }

    .audience-card .icon-circle i {
      font-size: 20px;
      color: var(--accent-color, #0d6efd);
    }

    .audience-card h3 {
      font-size: 15.5px;
      font-weight: 700;
      color: var(--heading-color, #222);
      margin-bottom: 8px;
    }

    .audience-card p {
      font-size: 13.5px;
      color: color-mix(in srgb, var(--default-color, #212529), transparent 20%);
      margin: 0;
    }

    /* ---------- Trust / Transparency ---------- */
    .trust-notice {
      background-color: color-mix(in srgb, var(--accent-color, #0d6efd), transparent 92%);
      border-left: 4px solid var(--accent-color, #0d6efd);
      border-radius: 8px;
      padding: 22px 26px;
      display: flex;
      gap: 16px;
      align-items: flex-start;
    }

    .trust-notice i.trust-icon {
      font-size: 26px;
      color: var(--accent-color, #0d6efd);
      margin-top: 2px;
    }

    .trust-notice p {
      font-size: 14.5px;
      color: var(--default-color, #212529);
      margin: 0 0 8px;
    }

    .trust-notice .trust-quote {
      font-style: italic;
      font-weight: 600;
      color: var(--heading-color, #222);
      margin: 0;
    }

    /* ---------- Community CTA ---------- */
    .community-cta-section {
      background: linear-gradient(135deg, var(--accent-color, #0d6efd), color-mix(in srgb, var(--accent-color, #0d6efd), black 15%));
      border-radius: 14px;
      padding: 46px 30px;
      text-align: center;
      color: var(--contrast-color, #fff);
    }

    .community-cta-section h2 {
      color: var(--contrast-color, #fff);
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .community-cta-section p {
      font-size: 15px;
      opacity: 0.92;
      max-width: 560px;
      margin: 0 auto 22px;
    }

    .community-cta-section .btn-join-community {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background-color: var(--contrast-color, #fff);
      color: var(--accent-color, #0d6efd) !important;
      font-weight: 700;
      font-size: 15px;
      padding: 12px 28px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.25s;
    }

    .community-cta-section .btn-join-community:hover {
      filter: brightness(0.95);
    }

    @media (max-width: 991px) {
      .mission-grid,
      .why-grid,
      .audience-grid { grid-template-columns: repeat(2, 1fr); }
      .steps-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 575px) {
      .mission-grid,
      .why-grid,
      .audience-grid { grid-template-columns: 1fr; }
    }
</style>

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item active current">About</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <h1>About FutureEngineers.pk</h1>
        <p>FutureEngineers.pk is a career and learning platform designed to help engineering students and graduates discover opportunities, develop practical skills and prepare for the professional world.</p>
      </div>
    </div><!-- End Page Title -->

    <!-- About / Introduction Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <span class="section-badge"><i class="bi bi-info-circle"></i> Who We Are</span>

        <div class="row align-items-center gy-4 mt-2">
          <div class="col-lg-5">
            <img src="{{ asset('assets/img/about/about-wide-1.webp') }}" class="img-fluid rounded-3" alt="Engineering students collaborating on a project, representing the FutureEngineers.pk community" loading="lazy">
          </div>
          <div class="col-lg-7">
            <h2 class="about-title">Empowering the Next Generation of Engineers</h2>
            <p class="about-description">Future Engineers Pakistan is a career development platform helping students and fresh graduates become job-ready through professional CV &amp; LinkedIn services, job and internship opportunities, scholarships, career guidance, and industry connections. 🚀</p>
            <p class="about-text">We connect young talent with the skills, opportunities, and networks they need to build successful careers.</p>
            <p class="about-text">The platform currently brings together <a href="{{ route('jobs') }}">Jobs &amp; Internships</a>, <a href="{{ route('scholarships') }}">Scholarships</a>, <a href="{{ route('courses') }}">Courses &amp; Certifications</a>, <a href="{{ route('cv-templates.index') }}">CV Templates</a> and <a href="{{ route('articles.index') }}">Industry News &amp; Trends</a>, all organized specifically for engineering disciplines.</p>
            <p class="about-text">Whether you're a first-year student exploring internships, a final-year student applying for your first job, or a graduate sharpening your skills with a new certification, FutureEngineers.pk is built to save you time and point you toward relevant opportunities.</p>
          </div>
        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Our Mission Section -->
    <section id="mission" class="section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-heading">
          <span class="section-badge"><i class="bi bi-flag"></i> Our Mission</span>
          <h2>Making career resources easier to find</h2>
          <p>Our goal is to make career information and useful learning resources easier to discover for engineering students and graduates across Pakistan.</p>
        </div>

        <div class="mission-grid" data-aos="fade-up" data-aos-delay="150">
          <div class="mission-card">
            <div class="icon-circle"><i class="bi bi-briefcase"></i></div>
            <h3>Career Opportunities</h3>
            <p>Surfacing relevant jobs, internships and scholarships for engineering students and graduates.</p>
          </div>
          <div class="mission-card">
            <div class="icon-circle"><i class="bi bi-mortarboard"></i></div>
            <h3>Skills Development</h3>
            <p>Pointing students toward practical courses and certifications that build in-demand technical skills.</p>
          </div>
          <div class="mission-card">
            <div class="icon-circle"><i class="bi bi-file-earmark-text"></i></div>
            <h3>Career Resources</h3>
            <p>Providing CV templates and preparation guidance suited to different engineering disciplines and career stages.</p>
          </div>
          <div class="mission-card">
            <div class="icon-circle"><i class="bi bi-graph-up"></i></div>
            <h3>Industry Awareness</h3>
            <p>Helping students stay informed about engineering, technology and industry trends shaping the job market.</p>
          </div>
        </div>

      </div>
    </section><!-- /Our Mission Section -->

    <!-- Why FutureEngineers.pk Section -->
    <section id="why-us" class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-heading">
          <span class="section-badge"><i class="bi bi-patch-question"></i> Why FutureEngineers.pk?</span>
          <h2>Built with engineering students in mind</h2>
          <p>A few reasons students and graduates use the platform to guide their career preparation.</p>
        </div>

        <div class="why-grid" data-aos="fade-up" data-aos-delay="150">
          <div class="why-card">
            <div class="icon-circle"><i class="bi bi-collection"></i></div>
            <h3>Opportunities in One Place</h3>
            <p>Jobs, internships and scholarships organized together instead of scattered across many sites.</p>
          </div>
          <div class="why-card">
            <div class="icon-circle"><i class="bi bi-lightbulb"></i></div>
            <h3>Practical Learning Resources</h3>
            <p>Courses and certifications selected for their relevance to real engineering skills and projects.</p>
          </div>
          <div class="why-card">
            <div class="icon-circle"><i class="bi bi-gear"></i></div>
            <h3>Engineering-Focused Content</h3>
            <p>Content organized around engineering disciplines, not generic career advice.</p>
          </div>
          <div class="why-card">
            <div class="icon-circle"><i class="bi bi-file-earmark-check"></i></div>
            <h3>Career Preparation</h3>
            <p>CV templates and guidance to help you present your skills and projects with confidence.</p>
          </div>
        </div>

      </div>
    </section><!-- /Why FutureEngineers.pk Section -->

    <!-- What We Provide Section -->
    <section id="what-we-provide" class="section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-heading">
          <span class="section-badge"><i class="bi bi-grid"></i> What We Provide</span>
          <h2>Explore the platform's main resources</h2>
          <p>Five core resource areas, each organized specifically for engineering students and graduates.</p>
        </div>

        <div class="resource-grid" data-aos="fade-up" data-aos-delay="150">
          <div class="resource-card">
            <div class="icon-circle"><i class="bi bi-briefcase"></i></div>
            <h3>Jobs &amp; Internships</h3>
            <p>Engineering job and internship listings across disciplines and experience levels.</p>
            <a href="{{ route('jobs') }}" class="explore-link">Explore <i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="resource-card">
            <div class="icon-circle"><i class="bi bi-mortarboard"></i></div>
            <h3>Scholarships</h3>
            <p>Need-based, merit-based and international scholarships for engineering students.</p>
            <a href="{{ route('scholarships') }}" class="explore-link">Explore <i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="resource-card">
            <div class="icon-circle"><i class="bi bi-easel"></i></div>
            <h3>Courses &amp; Certifications</h3>
            <p>Practical courses covering engineering software, programming, automation and more.</p>
            <a href="{{ route('courses') }}" class="explore-link">Explore <i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="resource-card">
            <div class="icon-circle"><i class="bi bi-file-earmark-text"></i></div>
            <h3>CV Templates</h3>
            <p>Engineering-focused CV templates for students, fresh graduates and professionals.</p>
            <a href="{{ route('cv-templates.index') }}" class="explore-link">Explore <i class="bi bi-arrow-right"></i></a>
          </div>
          <div class="resource-card">
            <div class="icon-circle"><i class="bi bi-graph-up"></i></div>
            <h3>Industry News &amp; Trends</h3>
            <p>Engineering and technology news and trends relevant to career decisions.</p>
            <a href="{{ route('articles.index') }}" class="explore-link">Explore <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

      </div>
    </section><!-- /What We Provide Section -->

    <!-- How It Works Section -->
    <section id="how-it-works" class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-heading">
          <span class="section-badge"><i class="bi bi-signpost-split"></i> How It Works</span>
          <h2>Three simple steps</h2>
          <p>A straightforward path from exploring opportunities to being ready to apply.</p>
        </div>

        <div class="steps-grid" data-aos="fade-up" data-aos-delay="150">
          <div class="step-card">
            <div class="step-num">01</div>
            <h3>Discover</h3>
            <p>Find jobs, internships, scholarships and learning opportunities relevant to your field.</p>
          </div>
          <div class="step-card">
            <div class="step-num">02</div>
            <h3>Develop</h3>
            <p>Build practical skills through courses, certifications and career resources.</p>
          </div>
          <div class="step-card">
            <div class="step-num">03</div>
            <h3>Prepare</h3>
            <p>Improve your CV, understand industry trends and prepare for professional opportunities.</p>
          </div>
        </div>

      </div>
    </section><!-- /How It Works Section -->

    <!-- Target Audience Section -->
    <section id="audience" class="section light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="section-heading">
          <span class="section-badge"><i class="bi bi-people"></i> Who It's For</span>
          <h2>Built for Engineers at Every Stage</h2>
          <p>Wherever you are in your engineering journey, there's something here to help.</p>
        </div>

        <div class="audience-grid" data-aos="fade-up" data-aos-delay="150">
          <div class="audience-card">
            <div class="icon-circle"><i class="bi bi-mortarboard"></i></div>
            <h3>Engineering Students</h3>
            <p>Explore internships, scholarships and courses to build skills alongside coursework.</p>
          </div>
          <div class="audience-card">
            <div class="icon-circle"><i class="bi bi-person-check"></i></div>
            <h3>Fresh Graduates</h3>
            <p>Find entry-level roles, build a strong CV and prepare for your first professional job.</p>
          </div>
          <div class="audience-card">
            <div class="icon-circle"><i class="bi bi-briefcase"></i></div>
            <h3>Early-Career Engineers</h3>
            <p>Sharpen skills with certifications and stay aware of industry trends as you grow.</p>
          </div>
          <div class="audience-card">
            <div class="icon-circle"><i class="bi bi-person-workspace"></i></div>
            <h3>Professionals</h3>
            <p>Keep up with industry news and explore continued learning opportunities.</p>
          </div>
        </div>

      </div>
    </section><!-- /Target Audience Section -->

    <!-- Trust / Transparency Section -->
    <section id="trust" class="section pt-0">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="trust-notice">
          <i class="bi bi-shield-check trust-icon"></i>
          <div>
            <p>FutureEngineers.pk is designed as a centralized career-resource platform. As the platform grows to aggregate opportunities from different organizations, some listings may originate from third parties.</p>
            <p class="trust-quote">Opportunity and resource details should always be verified through the official organization or provider before applying.</p>
          </div>
        </div>
      </div>
    </section><!-- /Trust Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Team</h2>
        <div><span>Meet The</span> <span class="description-title">Team</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('assets/img/person/person-m-7.webp') }}" class="img-fluid" alt="Portrait placeholder for the FutureEngineers.pk Founder" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Team Member</h4>
                <span>Founder</span>
                <p>Leads the platform's direction and partnerships with universities and employers.</p>
                <div class="social">
                  <a href="https://www.linkedin.com/company/futureengineers-pk/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('assets/img/person/person-f-8.webp') }}" class="img-fluid" alt="Portrait placeholder for the FutureEngineers.pk Content and Careers Lead" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Team Member</h4>
                <span>Content &amp; Careers Lead</span>
                <p>Reviews and curates every job, scholarship and course listing published on the site.</p>
                <div class="social">
                  <a href="https://www.linkedin.com/company/futureengineers-pk/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('assets/img/person/person-m-6.webp') }}" class="img-fluid" alt="Portrait placeholder for the FutureEngineers.pk Web and Platform lead" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Team Member</h4>
                <span>Web &amp; Platform</span>
                <p>Builds and maintains the FutureEngineers.pk website and its tools.</p>
                <div class="social">
                  <a href="https://www.linkedin.com/company/futureengineers-pk/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('assets/img/person/person-f-4.webp') }}" class="img-fluid" alt="Portrait placeholder for the FutureEngineers.pk Community and Outreach lead" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Team Member</h4>
                <span>Community &amp; Outreach</span>
                <p>Connects with university career offices and student societies across Pakistan.</p>
                <div class="social">
                  <a href="https://www.linkedin.com/company/futureengineers-pk/" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->

    <!-- Community CTA Section -->
    <section id="community" class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="community-cta-section">
          <h2>Join the FutureEngineers.pk Community</h2>
          <p>Stay connected with career opportunities, scholarships, learning resources and engineering industry updates.</p>
          <a href="https://chat.whatsapp.com/E6kjTG90j5VDZ4G5TMfj6V" target="_blank" rel="noopener" class="btn-join-community"><i class="bi bi-people"></i> Join Community</a>
        </div>
      </div>
    </section><!-- /Community CTA Section -->
@endsection
