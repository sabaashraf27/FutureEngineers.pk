<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\CvTemplate;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class FutureEngineersSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
    [
        'name' => 'Mechanical Engineering',
        'type' => 'job'
    ],
    [
        'name' => 'Mechanical Engineering',
        'type' => 'internship'
    ],
    [
        'name' => 'Civil Engineering',
        'type' => 'job'
    ],
    [
        'name' => 'Software Engineering',
        'type' => 'internship'
    ],
    [
        'name' => 'Electrical Engineering',
        'type' => 'job'
    ],
    [
        'name' => 'Industrial Engineering',
        'type' => 'internship'
    ],
    [
        'name' => 'Structural Engineering',
        'type' => 'job'
    ],
    [
        'name' => 'Environmental Engineering',
        'type' => 'internship'
    ],
    [
        'name' => 'Government / Need-Based',
        'type' => 'scholarship'
    ],
    [
        'name' => 'Need-Based / Government',
        'type' => 'scholarship'
    ],
    [
        'name' => 'International / Postgraduate',
        'type' => 'scholarship'
    ],
    [
        'name' => 'Merit-Based',
        'type' => 'scholarship'
    ],
    [
        'name' => 'Women / Merit + Need',
        'type' => 'scholarship'
    ],
    [
        'name' => 'Government / Postgraduate',
        'type' => 'scholarship'
    ],
    [
        'name' => 'Engineering Software',
        'type' => 'course'
    ],
    [
        'name' => 'Project Management',
        'type' => 'course'
    ],
    [
        'name' => 'Data & AI',
        'type' => 'course'
    ],
    [
        'name' => 'Automation',
        'type' => 'course'
    ],
    [
        'name' => 'Quality & Safety',
        'type' => 'course'
    ],
    [
        'name' => 'Energy',
        'type' => 'course'
    ],
    [
        'name' => 'Soft Skills',
        'type' => 'course'
    ]
];

        $categoryIds = [];
        foreach ($categories as $category) {
            $record = Category::updateOrCreate(
                ['name' => $category['name'], 'type' => $category['type']],
                []
            );
            $categoryIds[$category['name'] . '|' . $category['type']] = $record->id;
        }

        $listings = [
    [
        'title' => 'Junior Mechanical Engineer',
        'slug' => 'junior-mechanical-engineer',
        'description' => 'ABC Engineering is looking for a motivated Junior Mechanical Engineer to join its engineering team. The successful candidate will assist senior engineers with engineering projects, technical documentation, design activities and project coordination.',
        'category' => 'Mechanical Engineering',
        'type' => 'job',
        'company_name' => 'ABC Engineering Pvt. Ltd.',
        'location' => 'Lahore, Pakistan',
        'deadline' => '2026-09-30',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'Full Time',
            'posted' => 'Posted 2 days ago',
            'description' => 'ABC Engineering is looking for a motivated Junior Mechanical Engineer to join its engineering team. The successful candidate will assist senior engineers with engineering projects, technical documentation, design activities and project coordination.',
            'responsibilities' => [
                'Assist senior engineers with engineering projects.',
                'Prepare technical drawings and documentation.',
                'Support project planning and coordination.',
                'Conduct basic engineering calculations and analysis.',
                'Maintain project records and reports.'
            ],
            'requirements' => [
                'Bachelor\'s degree in Mechanical Engineering.',
                'Fresh graduates are encouraged to apply.',
                'Basic knowledge of engineering software.',
                'Good communication and teamwork skills.',
                'Strong problem-solving abilities.'
            ],
            'skills' => [
                'AutoCAD',
                'SolidWorks',
                'MS Office',
                'Engineering Design',
                'Problem Solving'
            ],
            'application' => 'Interested candidates can apply by submitting their updated CV and relevant documents through the application link below.'
        ]
    ],
    [
        'title' => 'Mechanical Engineering Internship',
        'slug' => 'mechanical-engineering-internship',
        'description' => 'XYZ Engineering Solutions is offering an internship for engineering students who want to gain practical industry experience and develop their technical skills.',
        'category' => 'Mechanical Engineering',
        'type' => 'internship',
        'company_name' => 'XYZ Engineering Solutions',
        'location' => 'Islamabad, Pakistan',
        'deadline' => '2026-09-25',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'On-site',
            'posted' => 'Posted 1 day ago',
            'description' => 'XYZ Engineering Solutions is offering an internship for engineering students who want to gain practical industry experience and develop their technical skills.',
            'responsibilities' => [
                'Assist engineering teams with daily tasks.',
                'Support technical documentation.',
                'Participate in engineering projects.',
                'Assist with research and analysis.'
            ],
            'requirements' => [
                'Currently enrolled in a Mechanical Engineering degree.',
                'Basic engineering knowledge.',
                'Good communication skills.',
                'Willingness to learn.'
            ],
            'skills' => [
                'AutoCAD',
                'MS Office',
                'Technical Documentation',
                'Teamwork'
            ],
            'application' => 'Students interested in this internship can apply using the application link below.'
        ]
    ],
    [
        'title' => 'Civil Site Engineer',
        'slug' => 'civil-site-engineer',
        'description' => 'BuildRight Construction is hiring a Civil Site Engineer to supervise ongoing residential and commercial construction projects.',
        'category' => 'Civil Engineering',
        'type' => 'job',
        'company_name' => 'BuildRight Construction',
        'location' => 'Karachi, Pakistan',
        'deadline' => '2026-09-20',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'Full Time',
            'posted' => 'Posted 3 days ago',
            'description' => 'BuildRight Construction is hiring a Civil Site Engineer to supervise ongoing residential and commercial construction projects.',
            'responsibilities' => [
                'Supervise construction activities.',
                'Monitor project progress.',
                'Coordinate with contractors.',
                'Prepare site reports.'
            ],
            'requirements' => [
                'Bachelor\'s degree in Civil Engineering.',
                'Knowledge of construction processes.',
                'Strong communication skills.',
                'Ability to work on construction sites.'
            ],
            'skills' => [
                'AutoCAD',
                'Site Management',
                'Construction Planning',
                'Project Management'
            ],
            'application' => 'Qualified candidates can submit their CV through the application link.'
        ]
    ],
    [
        'title' => 'Software Engineering Internship',
        'slug' => 'software-engineering-internship',
        'description' => 'CodeCraft Technologies offers a remote internship for engineering students interested in building real-world software products.',
        'category' => 'Software Engineering',
        'type' => 'internship',
        'company_name' => 'CodeCraft Technologies',
        'location' => 'Remote, Pakistan',
        'deadline' => '2026-09-15',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'Remote',
            'posted' => 'Posted 4 days ago',
            'description' => 'CodeCraft Technologies offers a remote internship for engineering students interested in building real-world software products.',
            'responsibilities' => [
                'Assist developers with software projects.',
                'Write and test basic code.',
                'Participate in development meetings.',
                'Help maintain project documentation.'
            ],
            'requirements' => [
                'Engineering or Computer Science student.',
                'Basic programming knowledge.',
                'Problem-solving skills.',
                'Ability to work remotely.'
            ],
            'skills' => [
                'HTML',
                'CSS',
                'JavaScript',
                'Git',
                'Problem Solving'
            ],
            'application' => 'Interested students can apply online through the application button.'
        ]
    ],
    [
        'title' => 'Electrical Engineer',
        'slug' => 'electrical-engineer',
        'description' => 'Power Grid Solutions is seeking an electrical engineer to support power distribution and grid maintenance projects across the region.',
        'category' => 'Electrical Engineering',
        'type' => 'job',
        'company_name' => 'Power Grid Solutions',
        'location' => 'Faisalabad, Pakistan',
        'deadline' => '2026-09-30',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'Full Time',
            'posted' => 'Posted 5 days ago',
            'description' => 'Power Grid Solutions is seeking an electrical engineer to support power distribution and grid maintenance projects across the region.',
            'responsibilities' => [
                'Support power distribution and grid maintenance activities.',
                'Assist with electrical system inspections and fault diagnosis.',
                'Prepare technical reports and maintenance logs.',
                'Coordinate with field teams on scheduled upgrades.'
            ],
            'requirements' => [
                'BSc in Electrical Engineering or related field.',
                'Understanding of power distribution systems.',
                'Willingness to work on-site as needed.',
                'Strong analytical and problem-solving skills.'
            ],
            'skills' => [
                'Power Systems',
                'AutoCAD Electrical',
                'Fault Diagnosis',
                'Technical Reporting'
            ],
            'application' => 'Interested candidates can apply using the application button below.'
        ]
    ],
    [
        'title' => 'Industrial Engineering Internship',
        'slug' => 'industrial-engineering-internship',
        'description' => 'A hands-on internship for engineering students to learn process optimisation on a live manufacturing floor.',
        'category' => 'Industrial Engineering',
        'type' => 'internship',
        'company_name' => 'NovaField Foods Manufacturing',
        'location' => 'Lahore, Pakistan',
        'deadline' => '2026-10-15',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'Hybrid',
            'posted' => 'Posted 1 week ago',
            'description' => 'A hands-on internship for engineering students to learn process optimisation on a live manufacturing floor.',
            'responsibilities' => [
                'Observe and document production line workflows.',
                'Assist with process-improvement data collection.',
                'Support quality-control checks alongside the production team.',
                'Prepare summary reports for supervisors.'
            ],
            'requirements' => [
                'Currently enrolled in an Industrial or Mechanical Engineering degree.',
                'Interest in manufacturing and process optimisation.',
                'Comfortable working on a factory floor part of the week.',
                'Good attention to detail.'
            ],
            'skills' => [
                'Process Optimisation',
                'Data Collection',
                'Quality Control',
                'MS Excel'
            ],
            'application' => 'Interested students can apply using the application button below.'
        ]
    ],
    [
        'title' => 'Structural Engineer',
        'slug' => 'structural-engineer',
        'description' => 'Horizon Infrastructure is looking for a structural engineer to work on major infrastructure and bridge projects.',
        'category' => 'Structural Engineering',
        'type' => 'job',
        'company_name' => 'Horizon Infrastructure',
        'location' => 'Rawalpindi, Pakistan',
        'deadline' => '2026-10-20',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'Part Time',
            'posted' => 'Posted 6 days ago',
            'description' => 'Horizon Infrastructure is looking for a structural engineer to work on major infrastructure and bridge projects.',
            'responsibilities' => [
                'Assist with structural analysis and design calculations.',
                'Review drawings for compliance with design standards.',
                'Coordinate with site teams on construction queries.',
                'Support preparation of structural reports.'
            ],
            'requirements' => [
                'BSc in Civil or Structural Engineering.',
                'Familiarity with structural design software.',
                'Ability to work part-time with flexible hours.',
                'Strong attention to detail.'
            ],
            'skills' => [
                'Structural Analysis',
                'AutoCAD',
                'STAAD Pro',
                'Technical Reporting'
            ],
            'application' => 'Interested candidates can apply using the application button below.'
        ]
    ],
    [
        'title' => 'Environmental Engineering Internship',
        'slug' => 'environmental-engineering-internship',
        'description' => 'GreenTech Consultants offers an internship for students interested in environmental impact and sustainability assessments.',
        'category' => 'Environmental Engineering',
        'type' => 'internship',
        'company_name' => 'GreenTech Consultants',
        'location' => 'Multan, Pakistan',
        'deadline' => '2026-11-10',
        'apply_link' => '#',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'employment' => 'On-site',
            'posted' => 'Posted 3 days ago',
            'description' => 'GreenTech Consultants offers an internship for students interested in environmental impact and sustainability assessments.',
            'responsibilities' => [
                'Assist with environmental impact assessment fieldwork.',
                'Support data collection and basic sustainability reporting.',
                'Help prepare client-facing summary documents.',
                'Participate in site visits with senior consultants.'
            ],
            'requirements' => [
                'Currently enrolled in Environmental, Civil, or Chemical Engineering.',
                'Interest in sustainability and environmental compliance.',
                'Willingness to participate in occasional site visits.',
                'Good written communication skills.'
            ],
            'skills' => [
                'Environmental Assessment',
                'Data Collection',
                'Report Writing',
                'MS Office'
            ],
            'application' => 'Interested students can apply using the application button below.'
        ]
    ],
    [
        'title' => 'PEEF Scholarship – Punjab Educational Endowment Fund',
        'slug' => 'peef-scholarship-punjab-educational-endowment-fund',
        'description' => 'The Punjab Educational Endowment Fund (PEEF) Scholarship provides provincial financial assistance for talented, low-income students enrolled in engineering degree programs at HEC-recognized universities in Punjab. The program aims to reduce financial barriers so deserving students can complete their engineering education without interruption.',
        'category' => 'Government / Need-Based',
        'type' => 'scholarship',
        'company_name' => 'Punjab Educational Endowment Fund',
        'location' => 'Punjab, Pakistan',
        'deadline' => null,
        'apply_link' => 'https://peef.com.pk',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'Punjab Educational Endowment Fund',
            'level' => 'Undergraduate',
            'status' => 'Open',
            'funding' => 'Need-Based • Tuition + Stipend',
            'eligibility' => [
                'Domicile of Punjab province.',
                'Enrolled in an HEC-recognized engineering degree program.',
                'Household income below the PEEF-defined threshold.',
                'Minimum academic performance as specified by PEEF.',
                'Not currently receiving another need-based scholarship for the same program.'
            ],
            'benefits' => [
                'Coverage of tuition fees at the enrolled institution.',
                'Monthly stipend to support living expenses.',
                'Renewable each academic year subject to satisfactory academic standing.',
                'No service bond or repayment obligation.'
            ],
            'requirements' => [
                'Academic transcripts and mark sheets.',
                'CNIC / B-Form of the applicant.',
                'Proof of household income.',
                'Domicile certificate (Punjab).',
                'Recent passport-size photograph.',
                'University admission or enrollment letter.'
            ],
            'applicationProcess' => [
                'Review the PEEF eligibility criteria for your program.',
                'Prepare all required documents in advance.',
                'Complete the official PEEF online application form.',
                'Upload scanned copies of supporting documents.',
                'Submit the application before the stated deadline.',
                'Track application status through the PEEF portal.'
            ],
            'importantNotes' => [
                'Verify the current deadline on the official PEEF website.',
                'Requirements may vary by academic year.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'https://peef.com.pk',
            'deadline_text' => 'Rolling — check official PEEF website for current phase deadlines'
        ]
    ],
    [
        'title' => 'Ehsaas Undergraduate Scholarship Program',
        'slug' => 'ehsaas-undergraduate-scholarship-program',
        'description' => 'The Ehsaas Undergraduate Scholarship Program is a nationwide, need-based scholarship supporting undergraduate students, including engineering majors, from financially disadvantaged backgrounds. It is one of the largest need-based scholarship initiatives in Pakistan, designed to widen access to higher education.',
        'category' => 'Need-Based / Government',
        'type' => 'scholarship',
        'company_name' => 'Government of Pakistan – Ehsaas Program',
        'location' => 'Nationwide, Pakistan',
        'deadline' => null,
        'apply_link' => 'https://ehsaas.hec.gov.pk',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'Government of Pakistan – Ehsaas Program',
            'level' => 'Undergraduate',
            'status' => 'Closing Soon',
            'funding' => 'Need-Based • Full Tuition + Living Costs',
            'eligibility' => [
                'Pakistani national enrolled in an undergraduate program.',
                'Belongs to a financially disadvantaged household.',
                'Enrolled at an HEC-recognized public or private university.',
                'Meets the minimum merit criteria set by the Ehsaas Program.',
                'Has not availed a duplicate need-based scholarship for the same degree.'
            ],
            'benefits' => [
                'Full tuition fee coverage.',
                'Support toward living and accommodation costs.',
                'Renewable annually based on continued eligibility.',
                'Priority consideration for female applicants.'
            ],
            'requirements' => [
                'Academic transcripts.',
                'CNIC / B-Form.',
                'Proof of household income or poverty scorecard (if applicable).',
                'University admission or enrollment letter.',
                'Recommendation letter from the institution.',
                'Recent passport-size photograph.'
            ],
            'applicationProcess' => [
                'Check eligibility on the official Ehsaas portal.',
                'Gather income and academic documentation.',
                'Fill out the Ehsaas scholarship application form online.',
                'Upload required supporting documents.',
                'Submit before the closing date.',
                'Await verification and award notification.'
            ],
            'importantNotes' => [
                'Verify the current deadline on the official Ehsaas Program website.',
                'Requirements may vary by academic year.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'https://ehsaas.hec.gov.pk',
            'deadline_text' => 'Applications currently closed — check HEC/Ehsaas portal for next cycle'
        ]
    ],
    [
        'title' => 'Commonwealth Scholarship for Master\'s Study',
        'slug' => 'commonwealth-scholarship-for-master-s-study',
        'description' => 'The Commonwealth Scholarship offers a fully funded Master\'s opportunity for students from Commonwealth countries, including strong pathways for engineering and technology disciplines. The scholarship supports high-achieving students who intend to contribute to development in their home country.',
        'category' => 'International / Postgraduate',
        'type' => 'scholarship',
        'company_name' => 'Commonwealth Scholarship Commission (UK)',
        'location' => 'United Kingdom',
        'deadline' => null,
        'apply_link' => 'https://cscuk.fcdo.gov.uk',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'Commonwealth Scholarship Commission (UK)',
            'level' => 'Master\'s',
            'status' => 'Upcoming',
            'funding' => 'Fully Funded',
            'eligibility' => [
                'Citizen of a Commonwealth country, including Pakistan.',
                'Holds a first degree with strong academic standing.',
                'Applying for an eligible Master\'s program in the UK.',
                'Unable to afford to study in the UK without financial support.',
                'Committed to returning to contribute to development after study.'
            ],
            'benefits' => [
                'Full tuition fees at the host UK university.',
                'Return economy airfare.',
                'Monthly living stipend.',
                'Additional grants for study-related travel and expenses.'
            ],
            'requirements' => [
                'Academic transcripts and degree certificates.',
                'Valid passport.',
                'Two academic or professional reference letters.',
                'Statement of purpose / personal statement.',
                'Proof of English language proficiency.',
                'University offer letter (where applicable).'
            ],
            'applicationProcess' => [
                'Review eligibility on the Commonwealth Scholarship Commission website.',
                'Choose an eligible Master\'s program and university.',
                'Prepare academic and reference documents.',
                'Complete the official online application.',
                'Submit before the deadline.',
                'Attend an interview or assessment if shortlisted.'
            ],
            'importantNotes' => [
                'Verify the current deadline on the official Commonwealth Scholarship website.',
                'Requirements may vary by academic year.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'https://cscuk.fcdo.gov.uk',
            'deadline_text' => 'Annual cycle — check Commonwealth Scholarship Commission website for current deadline'
        ]
    ],
    [
        'title' => 'Fulbright Scholarship for Graduate Study',
        'slug' => 'fulbright-scholarship-for-graduate-study',
        'description' => 'The Fulbright Scholarship is a prestigious, fully funded opportunity for Pakistani students to pursue graduate degrees in the United States, open to select engineering and technology fields. It is administered in Pakistan by USEFP and is among the most competitive scholarships available to Pakistani graduates.',
        'category' => 'International / Postgraduate',
        'type' => 'scholarship',
        'company_name' => 'United States Educational Foundation in Pakistan (USEFP)',
        'location' => 'United States',
        'deadline' => null,
        'apply_link' => 'https://www.usefp.org',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'United States Educational Foundation in Pakistan (USEFP)',
            'level' => 'Master\'s / PhD',
            'status' => 'Upcoming',
            'funding' => 'Fully Funded',
            'eligibility' => [
                'Pakistani citizen residing in Pakistan.',
                'Holds a four-year bachelor\'s degree with strong academic record.',
                'Meets minimum test score requirements (e.g. GRE, TOEFL/IELTS).',
                'Demonstrates leadership potential and community involvement.',
                'Intends to return to Pakistan after completing the program.'
            ],
            'benefits' => [
                'Full tuition and fees at the host US university.',
                'Monthly living stipend.',
                'Health insurance coverage.',
                'Round-trip international airfare.'
            ],
            'requirements' => [
                'Academic transcripts and degree certificates.',
                'Valid passport (CNIC also required for verification).',
                'Standardized test scores (GRE / TOEFL or IELTS).',
                'Statement of purpose and study objectives.',
                'Letters of recommendation.',
                'Completed USEFP application form.'
            ],
            'applicationProcess' => [
                'Review Fulbright eligibility and field priorities on the USEFP website.',
                'Prepare required standardized test scores.',
                'Draft the statement of purpose and study objectives.',
                'Complete the online USEFP application.',
                'Submit all supporting documents before the deadline.',
                'Attend the USEFP interview if shortlisted.'
            ],
            'importantNotes' => [
                'Verify the current deadline on the official USEFP website.',
                'Requirements may vary by academic year.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'https://www.usefp.org',
            'deadline_text' => 'Annual cycle (typically opens in fall) — check USEFP website for current deadline'
        ]
    ],
    [
        'title' => 'Erasmus Mundus Joint Master\'s Degree',
        'slug' => 'erasmus-mundus-joint-master-s-degree',
        'description' => 'The Erasmus Mundus Joint Master\'s Degree offers fully funded joint Master\'s programs delivered across multiple European universities, with dedicated tracks in engineering, computer science and applied sciences. Students typically study at two or more partner universities across different countries during the program.',
        'category' => 'International / Postgraduate',
        'type' => 'scholarship',
        'company_name' => 'European Union – Erasmus+ Programme',
        'location' => 'Multiple EU Countries',
        'deadline' => null,
        'apply_link' => 'https://erasmus-plus.ec.europa.eu/opportunities/opportunities-for-individuals/students/erasmus-mundus-joint-masters',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'European Union – Erasmus+ Programme',
            'level' => 'Master\'s',
            'status' => 'Closed',
            'funding' => 'Fully Funded',
            'eligibility' => [
                'Holds a recognized bachelor\'s degree in a relevant field.',
                'Meets the specific joint program\'s academic requirements.',
                'Meets English or other language proficiency requirements.',
                'Open to applicants worldwide, including Pakistani students.',
                'Willing to study across two or more partner countries.'
            ],
            'benefits' => [
                'Full tuition fee coverage across all partner universities.',
                'Monthly living allowance for the duration of the program.',
                'Travel and installation allowance.',
                'Access to a wide academic and professional network across Europe.'
            ],
            'requirements' => [
                'Academic transcripts and degree certificates.',
                'Valid passport.',
                'Language proficiency certificate (e.g. IELTS/TOEFL).',
                'Statement of purpose.',
                'Letters of recommendation.',
                'CV / resume.'
            ],
            'applicationProcess' => [
                'Identify an eligible Erasmus Mundus Joint Master\'s program.',
                'Review the specific consortium\'s eligibility criteria.',
                'Prepare academic and language documents.',
                'Submit the application through the program\'s official portal.',
                'Wait for consortium selection results.',
                'Complete enrollment formalities if selected.'
            ],
            'importantNotes' => [
                'Deadlines vary by consortium and academic year — always confirm on the official portal before applying.',
                'Verify current intake deadlines on the official Erasmus+ website.',
                'Requirements may vary by academic year and consortium.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'https://erasmus-plus.ec.europa.eu/opportunities/opportunities-for-individuals/students/erasmus-mundus-joint-masters',
            'deadline_text' => 'Annual cycle — check the Erasmus Mundus catalogue for current deadlines'
        ]
    ],
    [
        'title' => 'University Merit Scholarship – Engineering Faculty',
        'slug' => 'university-merit-scholarship-engineering-faculty',
        'description' => 'The University Merit Scholarship offers tuition fee waivers to top-scoring engineering applicants at partner universities, based on entry test results and overall academic merit. It rewards high-achieving students at the point of admission across multiple partner institutions.',
        'category' => 'Merit-Based',
        'type' => 'scholarship',
        'company_name' => 'Partner Universities (Multiple)',
        'location' => 'Pakistan',
        'deadline' => null,
        'apply_link' => 'contact.html',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'Partner Universities (Multiple)',
            'level' => 'Undergraduate',
            'status' => 'Open',
            'funding' => 'Merit-Based • Tuition Waiver',
            'eligibility' => [
                'Secured admission to an eligible engineering program.',
                'Ranks among the top merit positions in the entry test / admission list.',
                'Maintains satisfactory academic standing to retain the waiver.',
                'Enrolled full-time at a partner university.'
            ],
            'benefits' => [
                'Partial to full tuition fee waiver, depending on merit tier.',
                'Renewable each semester based on continued academic performance.',
                'No separate application in many cases — automatically considered at admission.'
            ],
            'requirements' => [
                'Academic transcripts (matric / intermediate or equivalent).',
                'Entry test result / merit list position.',
                'CNIC / B-Form.',
                'University admission letter.',
                'Recent passport-size photograph.'
            ],
            'applicationProcess' => [
                'Apply for admission to the engineering program of choice.',
                'Take the university\'s entry test, where applicable.',
                'Check the published merit list for scholarship eligibility.',
                'Submit any additional scholarship confirmation form required by the university.',
                'Maintain the required GPA each semester to retain the waiver.'
            ],
            'importantNotes' => [
                'Verify current merit thresholds on the specific university\'s website.',
                'Requirements may vary by academic year and institution.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official university portals.'
            ],
            'websiteUrl' => 'contact.html',
            'deadline_text' => 'Varies by university — contact your institution\'s financial aid office'
        ]
    ],
    [
        'title' => 'Women in Engineering Scholarship',
        'slug' => 'women-in-engineering-scholarship',
        'description' => 'The Women in Engineering Scholarship encourages greater female representation in engineering by offering partial tuition support to women enrolled in accredited engineering programs. The initiative supports academically capable women who face financial constraints in pursuing an engineering degree.',
        'category' => 'Women / Merit + Need',
        'type' => 'scholarship',
        'company_name' => 'FutureEngineers.pk Partner Initiative',
        'location' => 'Nationwide, Pakistan',
        'deadline' => null,
        'apply_link' => 'contact.html',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'FutureEngineers.pk Partner Initiative',
            'level' => 'Undergraduate',
            'status' => 'Open',
            'funding' => 'Merit + Need • Partial Tuition',
            'eligibility' => [
                'Female student enrolled in an accredited engineering program.',
                'Demonstrates financial need alongside academic merit.',
                'Maintains satisfactory academic performance to retain funding.',
                'Enrolled full-time at a recognized institution in Pakistan.'
            ],
            'benefits' => [
                'Partial tuition fee support.',
                'Renewable each academic year subject to eligibility review.',
                'Access to mentorship and networking opportunities with partner organizations.'
            ],
            'requirements' => [
                'Academic transcripts.',
                'CNIC / B-Form.',
                'Proof of household income.',
                'University admission or enrollment letter.',
                'Personal statement.',
                'Recent passport-size photograph.'
            ],
            'applicationProcess' => [
                'Review the eligibility criteria for the current cycle.',
                'Prepare academic, financial and identity documents.',
                'Complete the official application form.',
                'Write and submit the required personal statement.',
                'Submit before the deadline.',
                'Attend an interview if shortlisted.'
            ],
            'importantNotes' => [
                'Verify the current deadline on the official provider website.',
                'Requirements may vary by academic year.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'contact.html',
            'deadline_text' => 'Varies by provider — see individual scholarship program websites'
        ]
    ],
    [
        'title' => 'HEC Indigenous PhD Fellowship',
        'slug' => 'hec-indigenous-phd-fellowship',
        'description' => 'The HEC Indigenous PhD Fellowship is a research fellowship supporting PhD scholars, including those in engineering and applied sciences, with a monthly stipend and tuition support at local universities. The program aims to strengthen research capacity within Pakistan by funding doctoral study at home institutions.',
        'category' => 'Government / Postgraduate',
        'type' => 'scholarship',
        'company_name' => 'Higher Education Commission (HEC) Pakistan',
        'location' => 'Pakistan',
        'deadline' => null,
        'apply_link' => 'https://hec.gov.pk',
        'thumbnail' => null,
        'status' => 'active',
        'details' => [
            'provider' => 'Higher Education Commission (HEC) Pakistan',
            'level' => 'PhD',
            'status' => 'Closing Soon',
            'funding' => 'Government • Stipend + Tuition',
            'eligibility' => [
                'Pakistani national admitted to a PhD program at an HEC-recognized university.',
                'Meets the university\'s admission requirements for the PhD program.',
                'Not currently receiving another HEC or government-funded fellowship.',
                'Committed to completing the PhD within the fellowship\'s funded duration.'
            ],
            'benefits' => [
                'Monthly stipend for the duration of the PhD program.',
                'Tuition fee support at the host university.',
                'Research support allowance, where applicable.',
                'Renewable annually subject to satisfactory research progress.'
            ],
            'requirements' => [
                'Academic transcripts (Master\'s / MS/MPhil, as applicable).',
                'CNIC.',
                'PhD admission letter from an HEC-recognized university.',
                'Research proposal / synopsis.',
                'Letters of recommendation from academic supervisors.',
                'Recent passport-size photograph.'
            ],
            'applicationProcess' => [
                'Secure PhD admission at an HEC-recognized university.',
                'Review the HEC Indigenous Fellowship eligibility criteria.',
                'Prepare academic, research and identity documents.',
                'Submit the fellowship application through the official HEC portal.',
                'Submit before the deadline.',
                'Await HEC review and fellowship award notification.'
            ],
            'importantNotes' => [
                'Verify the current deadline on the official HEC website.',
                'Requirements may vary by academic year.',
                'FutureEngineers.pk does not guarantee scholarship acceptance.',
                'Never pay unofficial application fees.',
                'Always use official scholarship portals.'
            ],
            'websiteUrl' => 'https://hec.gov.pk',
            'deadline_text' => 'Annual cycle — check the HEC website for current deadline'
        ]
    ],
    [
        'title' => 'AutoCAD & Civil 3D Certification Course',
        'slug' => 'autocad-civil-3d-certification-course',
        'description' => 'Hands-on training in 2D drafting and 3D civil design workflows used across construction and infrastructure projects.',
        'category' => 'Engineering Software',
        'type' => 'course',
        'company_name' => 'CAD & Design Training Institute',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-3.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'CAD & Design Training Institute',
            'level' => 'Beginner',
            'duration' => '6 Weeks',
            'mode' => 'Self-Paced',
            'certificate' => true,
            'learningOutcomes' => [
                'Create and edit 2D engineering drawings in AutoCAD.',
                'Work with layers, blocks and annotation standards.',
                'Build basic terrain and corridor models in Civil 3D.',
                'Prepare drawing sheets for construction documentation.',
                'Apply drafting conventions used in civil engineering practice.'
            ],
            'curriculum' => [
                'Introduction to AutoCAD Interface & Tools',
                '2D Drafting Fundamentals',
                'Layers, Blocks & Annotation Standards',
                'Introduction to Civil 3D',
                'Terrain & Corridor Modeling',
                'Preparing Construction Drawing Sheets'
            ],
            'audience' => [
                'Civil engineering students who want practical CAD skills.',
                'Fresh graduates preparing for drafting or design roles.',
                'Working engineers looking to formalize AutoCAD/Civil 3D skills.'
            ],
            'requirements' => [
                'A computer capable of running AutoCAD/Civil 3D software.',
                'Basic familiarity with engineering drawings is helpful but not required.'
            ],
            'skills' => [
                'AutoCAD',
                'Civil 3D',
                '2D Drafting',
                'Terrain Modeling',
                'Construction Documentation'
            ],
            'short_description' => 'Hands-on training in 2D drafting and 3D civil design workflows used across construction and infrastructure projects.',
            'overview' => 'This course introduces students to AutoCAD drafting fundamentals and Civil 3D workflows used in real-world construction and infrastructure design. Learners work through drafting exercises, terrain modeling and civil design tasks that mirror common tasks in engineering firms across Pakistan.'
        ]
    ],
    [
        'title' => 'Project Management Essentials for Engineers',
        'slug' => 'project-management-essentials-for-engineers',
        'description' => 'Covers scheduling, budgeting, risk management and team coordination fundamentals tailored to engineering projects.',
        'category' => 'Project Management',
        'type' => 'course',
        'company_name' => 'Open Learning Platform',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-4.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Open Learning Platform',
            'level' => 'Beginner',
            'duration' => '4 Weeks',
            'mode' => 'Instructor-Led',
            'certificate' => true,
            'learningOutcomes' => [
                'Understand the engineering project lifecycle.',
                'Build simple project schedules and timelines.',
                'Apply basic budgeting and cost-tracking practices.',
                'Identify and manage common project risks.',
                'Coordinate effectively with cross-functional project teams.'
            ],
            'curriculum' => [
                'Foundations of Project Management',
                'Project Scheduling & Timelines',
                'Budgeting & Cost Management',
                'Risk Identification & Mitigation',
                'Team Coordination & Communication'
            ],
            'audience' => [
                'Engineering students preparing to lead or join project teams.',
                'Junior engineers moving into coordination or supervisory roles.',
                'Anyone wanting a practical introduction to project management.'
            ],
            'requirements' => [
                'No formal prerequisites. Basic computer literacy recommended.'
            ],
            'skills' => [
                'Project Scheduling',
                'Risk Management',
                'Budgeting',
                'Team Coordination'
            ],
            'short_description' => 'Covers scheduling, budgeting, risk management and team coordination fundamentals tailored to engineering projects.',
            'overview' => 'This course introduces core project management concepts through the lens of engineering projects. Learners explore how to plan schedules, manage budgets, assess risk and coordinate teams so projects stay on track from initiation through delivery.'
        ]
    ],
    [
        'title' => 'Python for Engineers & Data Analysis',
        'slug' => 'python-for-engineers-data-analysis',
        'description' => 'Project-based introduction to Python programming, data handling and visualization for engineering applications.',
        'category' => 'Data & AI',
        'type' => 'course',
        'company_name' => 'Global Online Learning Partner',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-1.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Global Online Learning Partner',
            'level' => 'Beginner',
            'duration' => '8 Weeks',
            'mode' => 'Self-Paced, Online',
            'certificate' => true,
            'learningOutcomes' => [
                'Python programming fundamentals.',
                'Data handling with common Python libraries.',
                'Data visualization for engineering datasets.',
                'Applying Python to engineering data analysis tasks.',
                'Basic automation workflows using Python.'
            ],
            'curriculum' => [
                'Introduction to Python',
                'Python Fundamentals & Syntax',
                'Data Handling & Cleaning',
                'Data Visualization',
                'Engineering Applications & Case Studies'
            ],
            'audience' => [
                'Engineering students with little or no programming background.',
                'Graduates wanting to add data analysis skills to their profile.',
                'Anyone curious about applying Python to engineering problems.'
            ],
            'requirements' => [
                'No formal prerequisites. Basic computer literacy recommended.'
            ],
            'skills' => [
                'Python',
                'Data Analysis',
                'Data Visualization',
                'Engineering Automation'
            ],
            'short_description' => 'Project-based introduction to Python programming, data handling and visualization for engineering applications.',
            'overview' => 'A practical, project-based course teaching engineering students Python fundamentals, data handling and visualization for real-world analysis and automation tasks. Learners build small engineering-focused projects to practice each concept as they go.'
        ]
    ],
    [
        'title' => 'PLC Programming & Industrial Automation',
        'slug' => 'plc-programming-industrial-automation',
        'description' => 'Introduces ladder logic, PLC hardware and industrial control systems used in manufacturing and process automation.',
        'category' => 'Automation',
        'type' => 'course',
        'company_name' => 'Self-Paced Learning Platform',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-5.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Self-Paced Learning Platform',
            'level' => 'Intermediate',
            'duration' => '10 Weeks',
            'mode' => 'Hybrid',
            'certificate' => true,
            'learningOutcomes' => [
                'Understand PLC hardware and how industrial control systems work.',
                'Write and troubleshoot ladder logic programs.',
                'Design basic automated control sequences.',
                'Apply automation concepts to manufacturing scenarios.',
                'Read and interpret industrial control diagrams.'
            ],
            'curriculum' => [
                'Introduction to Industrial Automation',
                'PLC Hardware Fundamentals',
                'Ladder Logic Programming',
                'Control System Design',
                'Manufacturing Automation Case Studies',
                'Troubleshooting & Testing'
            ],
            'audience' => [
                'Electrical and mechatronics engineering students.',
                'Engineers moving into manufacturing or process automation roles.',
                'Technicians wanting formal PLC programming knowledge.'
            ],
            'requirements' => [
                'Basic understanding of electrical circuits recommended.',
                'No prior PLC experience required.'
            ],
            'skills' => [
                'PLC Programming',
                'Ladder Logic',
                'Industrial Automation',
                'Control Systems'
            ],
            'short_description' => 'Introduces ladder logic, PLC hardware and industrial control systems used in manufacturing and process automation.',
            'overview' => 'This course introduces Programmable Logic Controller (PLC) programming and industrial automation concepts used in manufacturing and process industries. Learners work with ladder logic, PLC hardware fundamentals and control system design through hybrid online and hands-on sessions.'
        ]
    ],
    [
        'title' => 'ETABS & SAP2000 Structural Analysis & Design',
        'slug' => 'etabs-sap2000-structural-analysis-design',
        'description' => 'Advanced structural modeling, analysis and design workflows for civil and structural engineering students.',
        'category' => 'Engineering Software',
        'type' => 'course',
        'company_name' => 'Training Institute',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-6.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Training Institute',
            'level' => 'Advanced',
            'duration' => '6 Weeks',
            'mode' => 'Self-Paced',
            'certificate' => true,
            'learningOutcomes' => [
                'Build structural models in ETABS and SAP2000.',
                'Apply loading conditions and analyze structural response.',
                'Interpret analysis results for design decisions.',
                'Design structural elements based on analysis outputs.',
                'Prepare structural design documentation.'
            ],
            'curriculum' => [
                'Introduction to ETABS & SAP2000',
                'Structural Modeling Techniques',
                'Load Application & Analysis',
                'Interpreting Analysis Results',
                'Structural Element Design',
                'Design Documentation & Reporting'
            ],
            'audience' => [
                'Civil and structural engineering students with prior structural analysis coursework.',
                'Graduates preparing for structural design roles.',
                'Engineers wanting to formalize ETABS/SAP2000 skills.'
            ],
            'requirements' => [
                'Prior coursework in structural analysis recommended.',
                'Familiarity with basic structural engineering concepts.'
            ],
            'skills' => [
                'ETABS',
                'SAP2000',
                'Structural Analysis',
                'Structural Design'
            ],
            'short_description' => 'Advanced structural modeling, analysis and design workflows for civil and structural engineering students.',
            'overview' => 'This advanced course covers structural modeling, analysis and design workflows using ETABS and SAP2000. Learners work through building and structural models to practice analysis techniques used in civil and structural engineering practice.'
        ]
    ],
    [
        'title' => 'Six Sigma Yellow Belt Certification',
        'slug' => 'six-sigma-yellow-belt-certification',
        'description' => 'Introduces process improvement, quality control fundamentals and Six Sigma methodology for engineering teams.',
        'category' => 'Quality & Safety',
        'type' => 'course',
        'company_name' => 'Tech Skills Institute',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-7.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Tech Skills Institute',
            'level' => 'Beginner',
            'duration' => '3 Weeks',
            'mode' => 'Online',
            'certificate' => true,
            'learningOutcomes' => [
                'Understand core Six Sigma principles and terminology.',
                'Apply basic process improvement techniques.',
                'Use simple quality control tools and metrics.',
                'Identify sources of process variation and waste.',
                'Support Six Sigma projects within an engineering team.'
            ],
            'curriculum' => [
                'Introduction to Six Sigma & Quality Management',
                'Process Mapping & Analysis',
                'Quality Control Tools & Metrics',
                'Identifying & Reducing Process Variation',
                'Yellow Belt Certification Review'
            ],
            'audience' => [
                'Engineering students interested in quality and process improvement.',
                'Junior engineers working in manufacturing or operations.',
                'Anyone wanting an introductory Six Sigma credential.'
            ],
            'requirements' => [
                'No formal prerequisites. Basic computer literacy recommended.'
            ],
            'skills' => [
                'Six Sigma',
                'Process Improvement',
                'Quality Control',
                'Root Cause Analysis'
            ],
            'short_description' => 'Introduces process improvement, quality control fundamentals and Six Sigma methodology for engineering teams.',
            'overview' => 'This course introduces process improvement, quality control fundamentals and the Six Sigma methodology for engineering teams. Learners explore how Six Sigma tools are used to identify inefficiencies and improve quality in engineering and manufacturing processes.'
        ]
    ],
    [
        'title' => 'Renewable Energy Systems',
        'slug' => 'renewable-energy-systems',
        'description' => 'Covers solar, wind and hybrid renewable energy system design principles relevant to Pakistan\'s energy sector.',
        'category' => 'Energy',
        'type' => 'course',
        'company_name' => 'Open Learning Platform',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-9.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Open Learning Platform',
            'level' => 'Intermediate',
            'duration' => '7 Weeks',
            'mode' => 'Online',
            'certificate' => true,
            'learningOutcomes' => [
                'Understand core solar and wind energy system components.',
                'Explore basic system sizing and design considerations.',
                'Compare solar, wind and hybrid system configurations.',
                'Evaluate renewable energy applications for Pakistan\'s context.',
                'Identify factors that affect renewable system performance.'
            ],
            'curriculum' => [
                'Introduction to Renewable Energy',
                'Solar Energy System Design',
                'Wind Energy System Design',
                'Hybrid Renewable Systems',
                'Renewable Energy Applications in Pakistan',
                'System Sizing & Performance Considerations'
            ],
            'audience' => [
                'Electrical and energy engineering students.',
                'Engineers interested in transitioning into the renewable energy sector.',
                'Anyone exploring renewable energy system fundamentals.'
            ],
            'requirements' => [
                'Basic understanding of electrical engineering concepts recommended.'
            ],
            'skills' => [
                'Solar Energy Systems',
                'Wind Energy Systems',
                'Renewable System Design',
                'Energy Sector Analysis'
            ],
            'short_description' => 'Covers solar, wind and hybrid renewable energy system design principles relevant to Pakistan\'s energy sector.',
            'overview' => 'This course covers solar, wind and hybrid renewable energy system design principles relevant to Pakistan\'s energy sector. Learners explore system components, sizing considerations and design trade-offs for renewable energy installations.'
        ]
    ],
    [
        'title' => 'Technical Communication & Report Writing',
        'slug' => 'technical-communication-report-writing',
        'description' => 'Builds clear technical writing, documentation and presentation skills essential for engineering workplaces.',
        'category' => 'Soft Skills',
        'type' => 'course',
        'company_name' => 'Certified IT Training Partner',
        'location' => null,
        'deadline' => null,
        'apply_link' => null,
        'thumbnail' => 'assets/img/blog/blog-post-10.webp',
        'status' => 'active',
        'details' => [
            'provider' => 'Certified IT Training Partner',
            'level' => 'Beginner',
            'duration' => '2 Weeks',
            'mode' => 'Self-Paced',
            'certificate' => false,
            'learningOutcomes' => [
                'Structure clear and concise technical reports.',
                'Communicate technical information to non-technical audiences.',
                'Apply professional formatting and documentation standards.',
                'Prepare presentations that summarize technical work effectively.',
                'Edit and proofread technical documents for clarity.'
            ],
            'curriculum' => [
                'Foundations of Technical Communication',
                'Structuring Technical Reports',
                'Writing for Different Audiences',
                'Documentation Standards & Formatting',
                'Presenting Technical Work'
            ],
            'audience' => [
                'Engineering students preparing for internships or job applications.',
                'Junior engineers who regularly write reports or documentation.',
                'Anyone wanting to strengthen workplace communication skills.'
            ],
            'requirements' => [
                'No formal prerequisites. Basic computer literacy recommended.'
            ],
            'skills' => [
                'Technical Writing',
                'Report Structuring',
                'Documentation',
                'Presentation Skills'
            ],
            'short_description' => 'Builds clear technical writing, documentation and presentation skills essential for engineering workplaces.',
            'overview' => 'This course builds clear technical writing, documentation and presentation skills essential for engineering workplaces. Learners practice structuring reports, communicating technical information clearly and preparing documentation suited to engineering teams and stakeholders.'
        ]
    ]
];

        foreach ($listings as $item) {
            $categoryKey = $item['category'] . '|' . $item['type'];
            $item['category_id'] = $categoryIds[$categoryKey] ?? null;
            unset($item['category']);
            Listing::updateOrCreate(['slug' => $item['slug']], $item);
        }

        $articles = [
    [
        'title' => 'AI and Automation Are Reshaping How Engineers Work',
        'slug' => 'ai-and-automation-are-reshaping-how-engineers-work',
        'content' => 'A look at how AI-assisted tools and automation are influencing design, analysis, monitoring and decision-making across engineering disciplines — and what it may mean for the next generation of engineers.',
        'thumbnail' => 'assets/img/blog/blog-post-1.webp',
        'source_link' => '#',
        'publish_at' => '2026-08-03'
    ],
    [
        'title' => 'Renewable Energy Trends Opening New Roles for Power Engineers',
        'slug' => 'renewable-energy-trends-opening-new-roles-for-power-engineers',
        'content' => 'Solar, wind and grid-modernisation projects are creating fresh demand for electrical and power engineers with renewable energy experience.',
        'thumbnail' => 'assets/img/blog/blog-post-2.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-30'
    ],
    [
        'title' => 'Emerging Engineering Careers to Watch',
        'slug' => 'emerging-engineering-careers-to-watch',
        'content' => 'From sustainability roles to systems integration, a look at engineering career paths gaining traction among employers.',
        'thumbnail' => 'assets/img/blog/blog-post-3.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-28'
    ],
    [
        'title' => 'Digital Transformation Is Reshaping Manufacturing Floors',
        'slug' => 'digital-transformation-is-reshaping-manufacturing-floors',
        'content' => 'Connected machinery and real-time production data are changing day-to-day work and the skills manufacturers are hiring for.',
        'thumbnail' => 'assets/img/blog/blog-post-4.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-26'
    ],
    [
        'title' => 'Smart Infrastructure Is Becoming Standard on Major Builds',
        'slug' => 'smart-infrastructure-is-becoming-standard-on-major-builds',
        'content' => 'Sensor networks, BIM coordination and automated site monitoring are moving from pilot projects to standard practice on large civil builds.',
        'thumbnail' => 'assets/img/blog/blog-post-5.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-22'
    ],
    [
        'title' => 'Skills Employers Are Actually Looking for in Engineering Graduates',
        'slug' => 'skills-employers-are-actually-looking-for-in-engineering-graduates',
        'content' => 'Beyond core technical knowledge, employers are increasingly prioritising data literacy, tool fluency and cross-discipline collaboration.',
        'thumbnail' => 'assets/img/blog/blog-post-6.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-18'
    ],
    [
        'title' => 'Industry 4.0: What Smart Factories Mean for Engineers',
        'slug' => 'industry-4-0-what-smart-factories-mean-for-engineers',
        'content' => 'A look at how connected sensors, robotics and real-time analytics are changing the role of manufacturing engineers.',
        'thumbnail' => 'assets/img/blog/blog-post-1.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-14'
    ],
    [
        'title' => 'Engineering Education Is Adapting for Future Skills',
        'slug' => 'engineering-education-is-adapting-for-future-skills',
        'content' => 'Universities are updating curricula to include data, sustainability and systems thinking alongside core engineering fundamentals.',
        'thumbnail' => 'assets/img/blog/blog-post-2.webp',
        'source_link' => '#',
        'publish_at' => '2026-07-10'
    ]
];
        foreach ($articles as $article) {
            Article::updateOrCreate(['slug' => $article['slug']], $article);
        }

        $cvTemplates = [
    [
        'title' => 'Modern Engineering Graduate CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Fresh_Graduate_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-1.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'fresh-graduate',
            'templateType' => 'Fresh Graduate CV',
            'suitableFor' => 'Fresh Graduates & Final-Year Students',
            'field' => 'All Engineering Fields',
            'level' => 'Entry Level',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Featured',
                    'cls' => 'badge-featured',
                    'icon' => 'bi-star-fill'
                ]
            ],
            'description' => 'A clean, single-column layout that puts projects, technical skills and academic achievements front and center — ideal for a first engineering job application.',
            'longDescription' => 'The Modern Engineering Graduate CV uses a single-column layout designed to guide a recruiter\'s eye straight to what matters most for a first job search: your academic projects, technical skills and coursework. Clear section headings and generous white space keep the document easy to scan, while a compact header keeps contact details visible without taking up valuable space. It works well whether you are applying broadly across engineering disciplines or targeting a specific field, since the structure adapts around whatever projects and coursework you plug in.',
            'audience' => [
                'Engineering students',
                'Fresh graduates',
                'Final-year students building their first CV',
                'Entry-level job applicants'
            ],
            'features' => [
                [
                    'icon' => 'bi-layout-text-window',
                    'label' => 'Single-Page Layout'
                ],
                [
                    'icon' => 'bi-mortarboard',
                    'label' => 'Education-Focused Structure'
                ],
                [
                    'icon' => 'bi-kanban',
                    'label' => 'Project Showcase'
                ],
                [
                    'icon' => 'bi-cpu',
                    'label' => 'Technical Skills Section'
                ],
                [
                    'icon' => 'bi-type',
                    'label' => 'Clean Typography'
                ],
                [
                    'icon' => 'bi-file-earmark-text',
                    'label' => 'PDF / DOCX Export'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Education',
                'Technical Skills',
                'Engineering Projects',
                'Internship / Work Experience',
                'Certifications',
                'Achievements',
                'Languages'
            ],
            'tips' => [
                'Lead with your strongest academic projects, not just your degree.',
                'Quantify project outcomes where possible (e.g. efficiency gains, accuracy improvements).',
                'Keep the whole CV to one page as a fresh graduate.',
                'List technical skills relevant to the roles you are targeting.',
                'Proofread carefully — small errors stand out in an entry-level CV.'
            ]
        ]
    ],
    [
        'title' => 'ATS-Friendly Engineering CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Fresh_Graduate_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-2.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'fresh-graduate',
            'templateType' => 'Fresh Graduate CV',
            'suitableFor' => 'Fresh Graduates, All Fields',
            'field' => 'All Fields',
            'level' => 'Entry Level',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'ATS Friendly',
                    'cls' => 'badge-ats',
                    'icon' => 'bi-check2-circle'
                ],
                [
                    'label' => 'Popular',
                    'cls' => 'badge-popular',
                    'icon' => 'bi-fire'
                ]
            ],
            'description' => 'A simple, applicant-tracking-system-friendly structure with clear section headings so your CV passes automated screening.',
            'longDescription' => 'The ATS-Friendly Engineering CV is built around a straightforward, single-column layout with clear, standard section headings, simple bullet points and no tables, columns or graphics that could confuse an applicant tracking system. It\'s organized to move logically through technical skills, education, projects and experience so that both automated parsers and human recruiters can find what they need quickly. This format prioritizes substance over decoration, which is exactly what most ATS-driven hiring pipelines reward.',
            'audience' => [
                'Fresh graduates applying through online portals',
                'Engineering students',
                'Anyone applying to large companies with automated screening',
                'Job seekers wanting a safe, universally readable format'
            ],
            'features' => [
                [
                    'icon' => 'bi-check2-circle',
                    'label' => 'ATS-Friendly Structure'
                ],
                [
                    'icon' => 'bi-list-check',
                    'label' => 'Clear Section Headings'
                ],
                [
                    'icon' => 'bi-cpu',
                    'label' => 'Technical Skills Section'
                ],
                [
                    'icon' => 'bi-mortarboard',
                    'label' => 'Education Section'
                ],
                [
                    'icon' => 'bi-type',
                    'label' => 'Clean, Parser-Safe Typography'
                ],
                [
                    'icon' => 'bi-file-earmark-text',
                    'label' => 'One-Page Layout'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Technical Skills',
                'Education',
                'Engineering Projects',
                'Internship / Work Experience',
                'Certifications',
                'Achievements'
            ],
            'tips' => [
                'Avoid tables, columns and graphics that ATS software can misread.',
                'Use standard section titles like "Experience" and "Education".',
                'Mirror keywords from the job description in your skills section.',
                'Save and submit as both PDF and DOCX when a portal allows it.',
                'Keep formatting consistent — one font, simple bullet points.'
            ]
        ]
    ],
    [
        'title' => 'Mechanical Engineer CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Experienced_Professional_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-3.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'fresh-graduate experienced',
            'templateType' => 'Fresh Graduate CV',
            'suitableFor' => 'Fresh Graduates & Early-Career Engineers',
            'field' => 'Mechanical Engineering',
            'level' => 'Entry – Mid Level',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Editable',
                    'cls' => 'badge-editable',
                    'icon' => 'bi-pencil-square'
                ]
            ],
            'description' => 'Highlights CAD projects, design coursework and workshop or internship experience relevant to mechanical roles.',
            'longDescription' => 'The Mechanical Engineer CV template is structured to showcase hands-on technical work: CAD and design projects, manufacturing or workshop exposure, and relevant coursework in thermodynamics, materials or mechanics. A dedicated projects section lets you describe the tools used (SolidWorks, AutoCAD, ANSYS, etc.) and the problem each project solved, which is exactly what mechanical engineering recruiters look for from early-career candidates.',
            'audience' => [
                'Mechanical engineering students',
                'Fresh graduates in mechanical engineering',
                'Early-career mechanical engineers',
                'Design and manufacturing internship applicants'
            ],
            'features' => [
                [
                    'icon' => 'bi-kanban',
                    'label' => 'CAD Project Showcase'
                ],
                [
                    'icon' => 'bi-tools',
                    'label' => 'Workshop/Lab Experience Section'
                ],
                [
                    'icon' => 'bi-mortarboard',
                    'label' => 'Design Coursework Highlights'
                ],
                [
                    'icon' => 'bi-cpu',
                    'label' => 'Technical Skills Section'
                ],
                [
                    'icon' => 'bi-pencil-square',
                    'label' => 'Editable Layout'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Education',
                'Technical Skills',
                'CAD & Design Projects',
                'Workshop / Internship Experience',
                'Certifications',
                'Achievements'
            ],
            'tips' => [
                'Name the CAD or simulation software you used for each project.',
                'Describe the mechanical problem each project solved, not just the tool used.',
                'Include workshop, lab or manufacturing exposure even if unpaid.',
                'List relevant coursework if you lack full-time experience.',
                'Keep descriptions results-focused rather than task-focused.'
            ]
        ]
    ],
    [
        'title' => 'Civil Engineer CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Experienced_Professional_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-4.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'fresh-graduate experienced',
            'templateType' => 'Fresh Graduate CV',
            'suitableFor' => 'Fresh Graduates & Early-Career Engineers',
            'field' => 'Civil Engineering',
            'level' => 'Entry – Mid Level',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Popular',
                    'cls' => 'badge-popular',
                    'icon' => 'bi-fire'
                ]
            ],
            'description' => 'A project-portfolio-style layout for showcasing site experience, surveying work and structural design coursework.',
            'longDescription' => 'The Civil Engineer CV is laid out like a compact project portfolio, giving site experience, surveying work and structural design coursework their own clear space rather than burying them in a generic experience section. It\'s designed for candidates who need to demonstrate practical, field-based exposure alongside academic training — a combination that matters heavily in civil engineering hiring, even at entry level.',
            'audience' => [
                'Civil engineering students',
                'Fresh graduates in civil engineering',
                'Site engineering internship applicants',
                'Early-career structural and site engineers'
            ],
            'features' => [
                [
                    'icon' => 'bi-kanban',
                    'label' => 'Project Portfolio Layout'
                ],
                [
                    'icon' => 'bi-geo-alt',
                    'label' => 'Site Experience Section'
                ],
                [
                    'icon' => 'bi-rulers',
                    'label' => 'Surveying & Design Highlights'
                ],
                [
                    'icon' => 'bi-cpu',
                    'label' => 'Technical Skills Section'
                ],
                [
                    'icon' => 'bi-file-earmark-text',
                    'label' => 'PDF / DOCX Export'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Education',
                'Technical Skills',
                'Site / Field Experience',
                'Design & Surveying Projects',
                'Certifications',
                'Achievements'
            ],
            'tips' => [
                'Highlight any site visits, surveying work or field training explicitly.',
                'Mention structural or design software you\'re familiar with (AutoCAD, STAAD.Pro, ETABS).',
                'Include measurable project details like project scale or duration.',
                'List relevant certifications such as safety training if you have them.',
                'Keep language precise and technical rather than generic.'
            ]
        ]
    ],
    [
        'title' => 'Electrical Engineer CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Experienced_Professional_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-5.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'fresh-graduate experienced',
            'templateType' => 'Fresh Graduate CV',
            'suitableFor' => 'Fresh Graduates & Early-Career Engineers',
            'field' => 'Electrical Engineering',
            'level' => 'Entry – Mid Level',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Editable',
                    'cls' => 'badge-editable',
                    'icon' => 'bi-pencil-square'
                ]
            ],
            'description' => 'Structured to highlight circuit design, power systems coursework and lab or internship experience.',
            'longDescription' => 'The Electrical Engineer CV template is built to bring circuit design work, power systems coursework and lab experience to the front of the document. It balances a compact skills section (covering areas like circuit analysis, power systems, embedded systems or control systems) with a project section where you can describe specific builds, simulations or lab assignments in enough technical detail to stand out.',
            'audience' => [
                'Electrical engineering students',
                'Fresh graduates in electrical engineering',
                'Lab and internship applicants',
                'Early-career power systems or embedded engineers'
            ],
            'features' => [
                [
                    'icon' => 'bi-lightning-charge',
                    'label' => 'Circuit & Systems Project Showcase'
                ],
                [
                    'icon' => 'bi-cpu',
                    'label' => 'Technical Skills Section'
                ],
                [
                    'icon' => 'bi-flask',
                    'label' => 'Lab Experience Highlights'
                ],
                [
                    'icon' => 'bi-mortarboard',
                    'label' => 'Power Systems Coursework Section'
                ],
                [
                    'icon' => 'bi-pencil-square',
                    'label' => 'Editable Layout'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Education',
                'Technical Skills',
                'Circuit / Systems Projects',
                'Lab or Internship Experience',
                'Certifications',
                'Achievements'
            ],
            'tips' => [
                'Specify simulation tools used (MATLAB, Proteus, PSpice, etc.).',
                'Describe the function of each circuit or systems project, not just its name.',
                'Include any lab coursework relevant to power or embedded systems.',
                'Highlight programming skills if applying for embedded or controls roles.',
                'Keep the CV to one page unless you have significant work history.'
            ]
        ]
    ],
    [
        'title' => 'Software Engineer CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Experienced_Professional_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-1.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'fresh-graduate experienced',
            'templateType' => 'Fresh Graduate CV',
            'suitableFor' => 'Students, Fresh Graduates & Professionals',
            'field' => 'Software Engineering',
            'level' => 'Entry – Experienced',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'ATS Friendly',
                    'cls' => 'badge-ats',
                    'icon' => 'bi-check2-circle'
                ],
                [
                    'label' => 'Popular',
                    'cls' => 'badge-popular',
                    'icon' => 'bi-fire'
                ]
            ],
            'description' => 'Built around a tech-stack summary, GitHub/portfolio links and project highlights for software roles.',
            'longDescription' => 'The Software Engineer CV is organized around a tech-stack summary at the top, followed by project highlights that link directly to GitHub or portfolio work. This format works equally well for students building their first repositories, fresh graduates job-hunting, and experienced developers who want their stack and shipped projects to speak for themselves. Its ATS-friendly formatting also keeps it readable by automated recruiting pipelines common at tech companies.',
            'audience' => [
                'Computer/software engineering students',
                'Fresh graduate developers',
                'Experienced software engineers',
                'Candidates with a GitHub or portfolio presence'
            ],
            'features' => [
                [
                    'icon' => 'bi-code-slash',
                    'label' => 'Tech-Stack Summary'
                ],
                [
                    'icon' => 'bi-github',
                    'label' => 'Portfolio/GitHub Links'
                ],
                [
                    'icon' => 'bi-kanban',
                    'label' => 'Project Showcase'
                ],
                [
                    'icon' => 'bi-check2-circle',
                    'label' => 'ATS-Friendly Structure'
                ],
                [
                    'icon' => 'bi-layers',
                    'label' => 'Scales from Entry to Experienced'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Technical Skills / Tech Stack',
                'Projects',
                'Work / Internship Experience',
                'Education',
                'Certifications',
                'Portfolio / GitHub Links'
            ],
            'tips' => [
                'Link directly to your GitHub, portfolio or live projects.',
                'List your tech stack clearly near the top of the CV.',
                'Describe project impact (users, performance, problems solved), not just tools used.',
                'Keep formatting simple and text-based for ATS compatibility.',
                'Tailor the tech stack summary to match the job description.'
            ]
        ]
    ],
    [
        'title' => 'Engineering Internship CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Internship_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-2.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'internship student',
            'templateType' => 'Internship CV',
            'suitableFor' => 'Current Students Seeking Internships',
            'field' => 'All Fields',
            'level' => 'Student',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Student',
                    'cls' => 'badge-student',
                    'icon' => 'bi-mortarboard'
                ]
            ],
            'description' => 'A concise one-page layout emphasizing coursework, academic projects and extracurricular involvement for internship applications.',
            'longDescription' => 'The Engineering Internship CV is designed for students who don\'t yet have full-time work experience but do have coursework, academic projects and extracurricular involvement worth showcasing. The layout keeps everything to one page and gives extracurriculars, societies and competitions their own visible space, since these often carry real weight in internship applications when formal experience is limited.',
            'audience' => [
                'Engineering students seeking internships',
                'First and second-year students',
                'Society and competition participants',
                'Students without prior work experience'
            ],
            'features' => [
                [
                    'icon' => 'bi-mortarboard',
                    'label' => 'Coursework Highlights'
                ],
                [
                    'icon' => 'bi-kanban',
                    'label' => 'Academic Project Showcase'
                ],
                [
                    'icon' => 'bi-people',
                    'label' => 'Extracurricular Involvement Section'
                ],
                [
                    'icon' => 'bi-file-earmark-text',
                    'label' => 'One-Page Layout'
                ],
                [
                    'icon' => 'bi-type',
                    'label' => 'Clean Typography'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Objective / Summary',
                'Education',
                'Relevant Coursework',
                'Academic Projects',
                'Extracurricular Activities',
                'Technical Skills',
                'Certifications'
            ],
            'tips' => [
                'Include relevant coursework if you lack formal work experience.',
                'List society memberships, competitions or hackathons you\'ve joined.',
                'Keep the CV to a single page.',
                'Add a short objective statement explaining what internship you\'re seeking.',
                'Ask a mentor or senior student to review before submitting.'
            ]
        ]
    ],
    [
        'title' => 'Experienced Engineer Professional CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Experienced_Professional_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-3.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'experienced',
            'templateType' => 'Experienced Engineer CV',
            'suitableFor' => 'Mid-Level & Senior Engineers',
            'field' => 'All Fields',
            'level' => 'Mid – Experienced',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Professional',
                    'cls' => 'badge-professional',
                    'icon' => 'bi-briefcase'
                ]
            ],
            'description' => 'A two-column, achievement-focused layout for engineers with several years of experience and career progression to showcase.',
            'longDescription' => 'The Experienced Engineer Professional CV uses a two-column, achievement-focused layout built for engineers who have several years of experience and clear career progression to demonstrate. Rather than listing responsibilities, it\'s structured to foreground measurable achievements, leadership scope and career growth across roles — the details that matter most once you\'re past entry-level applications.',
            'audience' => [
                'Mid-level engineers',
                'Senior engineers',
                'Engineers with team or project leadership experience',
                'Professionals changing companies or industries'
            ],
            'features' => [
                [
                    'icon' => 'bi-graph-up-arrow',
                    'label' => 'Achievement-Focused Layout'
                ],
                [
                    'icon' => 'bi-diagram-3',
                    'label' => 'Career Progression Timeline'
                ],
                [
                    'icon' => 'bi-people-fill',
                    'label' => 'Leadership & Team Scope Section'
                ],
                [
                    'icon' => 'bi-layout-split',
                    'label' => 'Two-Column Layout'
                ],
                [
                    'icon' => 'bi-briefcase',
                    'label' => 'Professional Formatting'
                ]
            ],
            'sections' => [
                'Contact Information',
                'Professional Summary',
                'Core Competencies',
                'Professional Experience',
                'Key Achievements',
                'Education',
                'Certifications',
                'Leadership & Projects'
            ],
            'tips' => [
                'Lead each role with quantified achievements, not job duties.',
                'Show career progression clearly (titles, promotions, scope growth).',
                'Mention team size or budget managed where relevant.',
                'Keep the CV to two pages maximum.',
                'Tailor core competencies to the seniority level of the role.'
            ]
        ]
    ],
    [
        'title' => 'Academic & Research CV',
        'file_path' => 'assets/cv-templates/FutureEngineers_Academic_Research_CV_Template.pdf',
        'thumbnail' => 'assets/img/blog/blog-post-square-4.webp',
        'downloads_count' => 0,
        'details' => [
            'category' => 'academic',
            'templateType' => 'Academic CV',
            'suitableFor' => 'Scholarship & Graduate School Applicants',
            'field' => 'All Fields',
            'level' => 'Student',
            'format' => 'PDF / DOCX',
            'badges' => [
                [
                    'label' => 'Editable',
                    'cls' => 'badge-editable',
                    'icon' => 'bi-pencil-square'
                ]
            ],
            'description' => 'Built for students applying to research positions, scholarships or graduate programs, with dedicated sections for publications and coursework.',
            'longDescription' => 'The Academic & Research CV is structured around what scholarship committees and graduate admissions panels actually look for: research interests, research experience, publications and conference participation, alongside academic achievements and coursework. It differs from a standard industry CV by giving research output and academic credentials the most prominent placement, which matters for applicants pursuing further study or funded research positions.',
            'audience' => [
                'Scholarship applicants',
                'Graduate school applicants',
                'Research assistants',
                'Students pursuing academic or research careers'
            ],
            'features' => [
                [
                    'icon' => 'bi-journal-text',
                    'label' => 'Publications Section'
                ],
                [
                    'icon' => 'bi-search',
                    'label' => 'Research Interests & Experience'
                ],
                [
                    'icon' => 'bi-mic',
                    'label' => 'Conference Participation Highlights'
                ],
                [
                    'icon' => 'bi-award',
                    'label' => 'Academic Achievements Section'
                ],
                [
                    'icon' => 'bi-pencil-square',
                    'label' => 'Editable Layout'
                ]
            ],
            'sections' => [
                'Education',
                'Research Interests',
                'Research Experience',
                'Publications',
                'Projects',
                'Conference Participation',
                'Academic Achievements',
                'Technical Skills'
            ],
            'tips' => [
                'List research interests clearly near the top of the CV.',
                'Cite publications or papers consistently in one citation style.',
                'Include conference presentations even if not yet published.',
                'Highlight GPA and academic honors if strong.',
                'Tailor research interests to match the program or scholarship you\'re applying to.'
            ]
        ]
    ]
];
        foreach ($cvTemplates as $template) {
            CvTemplate::updateOrCreate(['title' => $template['title']], $template);
        }
    }
}
