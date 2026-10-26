/**
 * Gharuda CRM - Performance Appraisal Page Script
 * File: assets/js/pages/performance-appraisal.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// Comprehensive Mock Database with 16 employees across 8 key departments & various progression stages & cycle frequencies
var employeeDatabase = {
    // ----------------- ENGINEERING -----------------
    "ARUN": {
        id: "EMP-0104",
        name: "Arun Kumar",
        email: "arun.k@gharuda.com",
        dept: "Engineering",
        role: "Senior Backend Engineer",
        tl: "Rajesh V (Tech Lead)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Payment Gateway Modernization, Microservices Migration, Kafka Data Pipeline",
        tools: "PHP, Node.js, Docker, Kubernetes, PostgreSQL, Redis, AWS",
        summary: "Over the past fiscal year, I successfully led the backend microservices refactoring, integrated payment webhooks, and ensured 99.98% platform reliability during high-traffic quarters.",
        achievements: "• Completed high-throughput API gateway migration 2 weeks ahead of schedule.\n• Reduced Redis memory footprint by 28% through key compression.\n• Mentored 2 junior engineers through onboarding.",
        rating: "4.5",
        certs: "Certified Kubernetes Administrator (CKA), AWS Cloud Solutions",
        
        tlApproved: true,
        tlRating: "4.6",
        tlHike: "15%",
        tlPromo: "Promoted to Tech Lead",
        tlFeedback: "Demonstrated exemplary technical ownership during the Q3-Q4 microservices migration. Code reviews were thorough and mentoring contributions accelerated team velocity.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Promoted to Tech Lead",
        hrComments: "Performance verified with project stakeholders. Proposed 15% increment aligns with annual merit budget and benchmark for L4 Engineering.",

        mgrApproved: true,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Outstanding contributions to backend microservices, Kafka pipelines, and zero downtime. Full promotion to Tech Lead approved with 15% merit increment."
    },
    "KARTHIK": {
        id: "EMP-0115",
        name: "Karthik V",
        email: "karthik.v@gharuda.com",
        dept: "Engineering",
        role: "Backend Tech Lead",
        tl: "Ramesh S (Engineering Director)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Core Architecture Scaling, Multi-tenant Database Sharding, Event Bus",
        tools: "Go, PostgreSQL, Redis, RabbitMQ, Terraform, AWS EKS",
        summary: "Architected multi-tenant database partitioning strategy supporting 10x traffic surge without database degradation. Led 8 senior backend developers.",
        achievements: "• Sharded PostgreSQL clusters, reducing p99 query latency from 240ms to 28ms.\n• Implemented robust event-driven architecture with zero message loss.\n• Authored 12 internal engineering RFCs and best practices guidelines.",
        rating: "4.7",
        certs: "AWS Solutions Architect Professional, CKA",
        
        tlApproved: true,
        tlRating: "4.7",
        tlHike: "16%",
        tlPromo: "Principal Systems Architect",
        tlFeedback: "Superb architectural rigor, proactive scalability solutions, and reliable tech team leadership.",

        hrApproved: true,
        hrRating: "4.7",
        hrHike: "16%",
        tlPromo: "Principal Systems Architect",
        hrComments: "Verified architectural contributions.",

        mgrApproved: false,
        mgrRating: "4.8",
        mgrHike: "16%",
        mgrReply: "Good! Stellar database scaling and mission-critical platform stability."
    },
    "SNEHA_P": {
        id: "EMP-0118",
        name: "Sneha Patel",
        email: "sneha.p@gharuda.com",
        dept: "Engineering",
        role: "Full Stack Engineer",
        tl: "Arun Kumar (Tech Lead)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "Employee Self-Service Portal, Realtime Notifications, GraphQL API",
        tools: "React, TypeScript, PHP 8, GraphQL, MySQL, Docker",
        summary: "Developed the dynamic Employee Self-Service dashboard and integrated bi-directional webhooks with zero frontend latency regression.",
        achievements: "• Delivered 14 full-stack feature releases ahead of sprint deadlines.\n• Refactored notification pipeline, eliminating duplicate push messages.\n• Maintained 98% unit test coverage on all API endpoints.",
        rating: "4.4",
        certs: "Meta Certified Frontend Developer",

        tlApproved: true,
        tlRating: "4.5",
        tlHike: "13%",
        tlPromo: "Senior Full Stack Engineer",
        tlFeedback: "Fast execution speed, pristine UI component architecture, and high adaptability across frontend and backend tasks.",

        hrApproved: true,
        hrRating: "4.5",
        hrHike: "13%",
        tlPromo: "Senior Full Stack Engineer",
        hrComments: "Verified performance.",

        mgrApproved: false,
        mgrRating: "4.6",
        mgrHike: "13%",
        mgrReply: "Good! Outstanding velocity on the employee portal and impeccable frontend quality."
    },
    "VIKRAM": {
        id: "EMP-0128",
        name: "Vikram Sundaram",
        email: "vikram.s@gharuda.com",
        dept: "Engineering",
        role: "Frontend Architect",
        tl: "Ramesh S (Engineering Director)",
        cycleType: "Annual",
        cyclePeriod: "FY 2026-27",
        projects: "Next-Gen Web Core, Micro-frontends Migration, Performance Tuning",
        tools: "Vue 3, React, Vite, Webpack 5, Web Vitals, Tailwind",
        summary: "Transitioned monolithic frontend into micro-frontend bundles, reducing initial bundle load times by 48% across all browser platforms.",
        achievements: "• Google Lighthouse Performance score raised from 62 to 96 across all web modules.\n• Created shared state management SDK used by 5 product squads.\n• Conducted 10 internal engineering masterclasses on modern web performance.",
        rating: "4.8",
        certs: "Google Mobile Web Specialist",

        tlApproved: true,
        tlRating: "4.9",
        tlHike: "17%",
        tlPromo: "Staff Frontend Architect",
        tlFeedback: "Exceptional frontend leadership, groundbreaking performance optimizations, and great architectural documentation.",

        hrApproved: true,
        hrRating: "4.9",
        hrHike: "17%",
        tlPromo: "Staff Frontend Architect",
        hrComments: "Strategic hire evaluation. Top tier engineering performer across all quarterly milestones.",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "17%",
        mgrReply: "Good! Exceptional architectural overhaul, tremendous frontend performance gains, and visionary technical leadership."
    },

    // ----------------- PRODUCT DESIGN -----------------
    "PRIYA": {
        id: "EMP-0108",
        name: "Priya Sharma",
        email: "priya.s@gharuda.com",
        dept: "Design",
        role: "Lead UI/UX Designer",
        tl: "Sneha Sen (Design Lead)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "HRMS Design System 2.0, Mobile App Redesign, Accessibility Audit",
        tools: "Figma, Adobe XD, Design Tokens, FigJam, Protopie",
        summary: "Redesigned complete HRMS suite with modern design tokens resulting in 96% positive client usability feedback and unified design language across 18 product modules.",
        achievements: "• Delivered complete Design System 2.0 with 150+ interactive UI components.\n• Achieved WCAG 2.1 AA accessibility compliance across all web screens.\n• Spearheaded cross-functional design sprints with front-end engineering.",
        rating: "4.8",
        certs: "NN/g UX Master Certification, Interaction Design Foundation UX",
        
        tlApproved: true,
        tlRating: "4.7",
        tlHike: "15%",
        tlPromo: "Principal Product Designer",
        tlFeedback: "Exceptional creativity, design systems architecture, and timely delivery of design tokens. Strong collaboration with frontend developers.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Principal Product Designer",
        hrComments: "Benchmarked against Senior Design Band. Exceptional portfolio and strong peer ratings.",

        mgrApproved: true,
        mgrRating: "4.9",
        mgrHike: "15%",
        mgrReply: "Good! Exceptional leadership on Design System 2.0 and outstanding user-centered aesthetic overhaul."
    },
    "MEERA": {
        id: "EMP-0132",
        name: "Meera Nambiar",
        email: "meera.n@gharuda.com",
        dept: "Design",
        role: "Senior UX Researcher",
        tl: "Priya Sharma (Design Lead)",
        cycleType: "Half-Yearly",
        cyclePeriod: "H1 (Apr-Sep '26)",
        projects: "User Journey Mapping, Enterprise Usability Benchmarking, Onboarding UX",
        tools: "Miro, Dovetail, UserTesting, Figma, Hotjar",
        summary: "Conducted 45 enterprise customer UX interviews and usability tests to optimize payroll and leave approval flows, reducing task completion time by 35%.",
        achievements: "• Synthesized user behavior patterns into actionable design insights.\n• Increased post-onboarding feature adoption by 27% in Q3.\n• Created comprehensive user personas for enterprise HR administrators.",
        rating: "4.5",
        certs: "Certified Usability Analyst (CUA - Human Factors International)",

        tlApproved: true,
        tlRating: "4.6",
        tlHike: "14%",
        tlPromo: "Staff UX Researcher",
        tlFeedback: "Outstanding qualitative user research insights that directly guided product roadmaps and reduced user friction.",

        hrApproved: true,
        hrRating: "4.6",
        hrHike: "14%",
        tlPromo: "Staff UX Researcher",
        hrComments: "",

        mgrApproved: true,
        mgrRating: "4.6",
        mgrHike: "14%",
        mgrReply: "Good! Thorough customer research and impactful user experience recommendations."
    },

    // ----------------- HUMAN RESOURCES -----------------
    "DEEPIKA": {
        id: "EMP-0102",
        name: "Deepika Rao",
        email: "deepika.r@gharuda.com",
        dept: "Human Resources",
        role: "Senior Talent Acquisition Lead",
        tl: "Ananya Roy (HRBP)",
        cycleType: "Annual",
        cyclePeriod: "FY 2026-27",
        projects: "Campus Hiring Drive 2025, Lateral Tech Hiring, ATS Optimization",
        tools: "LinkedIn Recruiter, Gharuda ATS, HackerEarth, Darwinbox",
        summary: "Closed 65+ critical technical roles across product engineering with a 91% candidate offer acceptance rate and slashed average time-to-hire by 14 days.",
        achievements: "• Achieved 120% of annual tech recruitment quotas across Bangalore and Chennai branches.\n• Reduced average cost-per-hire by 18% through organic campus sourcing.\n• Launched diversity hiring campaign increasing female engineering ratios by 12%.",
        rating: "4.8",
        certs: "SHRM-CP Certified, LinkedIn Certified Professional Recruiter",
        
        tlApproved: true,
        tlRating: "4.9",
        tlHike: "16.5%",
        tlPromo: "Promoted to Talent Partner",
        tlFeedback: "Exceeded all recruiting KPIs, managed executive candidate pipelines flawlessly, and built strong stakeholder relationships.",

        hrApproved: true,
        hrRating: "4.9",
        hrHike: "16.5%",
        tlPromo: "Promoted to Talent Partner",
        hrComments: "Top recruiter across company branches. Consistently high hiring manager satisfaction scores (4.9/5.0).",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "16.5%",
        mgrReply: "Good! Outstanding hiring targets achieved. Exceeded all FY25 onboarding quotas by 120%. Exemplary dedication and talent leadership."
    },
    "ANANYA": {
        id: "EMP-0105",
        name: "Ananya Roy",
        email: "ananya.r@gharuda.com",
        dept: "Human Resources",
        role: "Lead HR Business Partner",
        tl: "Vikram Malhotra (HR Director)",
        cycleType: "Half-Yearly",
        cyclePeriod: "H1 (Apr-Sep '26)",
        projects: "Annual Appraisal Cycle 2026, Employee Wellness Program, Retention Strategy",
        tools: "Gharuda HRMS, CultureAmp, Workday, Excel Advanced Modeling",
        summary: "Designed and rolled out company-wide performance framework, reducing employee voluntary turnover to historic low of 4.2% across engineering and sales.",
        achievements: "• Successfully aligned 600+ employee appraisal bands with industry compensation standards.\n• Launched mental health & wellness initiative with 88% positive survey score.\n• Streamlined HR grievance resolution turnaround time to under 24 hours.",
        rating: "4.7",
        certs: "SHRM-SCP (Senior Certified Professional), CIPD Level 7",

        tlApproved: true,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Director - HR Business Partnering",
        tlFeedback: "Exceptional HR leadership, compassionate employee relations, and meticulous policy execution.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Director - HR Business Partnering",
        hrComments: "Flawless compliance audit and outstanding strategic alignment with business goals.",

        mgrApproved: true,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Superb HR business partnering, high employee trust, and strong retention."
    },

    // ----------------- CLOUD & DEVOPS -----------------
    "SARAH": {
        id: "EMP-0120",
        name: "Sarah Mitchell",
        email: "sarah.m@gharuda.com",
        dept: "Cloud Ops",
        role: "Senior DevOps Engineer",
        tl: "Alex Turner (Cloud Manager)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "CI/CD Pipeline Revamp, Cloud Cost Optimization, Zero-Trust SecOps",
        tools: "Kubernetes, Helm, GitHub Actions, Terraform, Datadog, AWS",
        summary: "Spearheaded GitOps modernization with automated ephemeral staging environments. Slashed monthly cloud infrastructure spend by $14,200 via spot instances and automated rightsizing.",
        achievements: "• Reduced deployment build and release cycle from 45 minutes down to 8 minutes.\n• Achieved 99.99% infrastructure uptime across all production clusters.\n• Automated multi-region automated disaster recovery and backup simulations.",
        rating: "4.6",
        certs: "HashiCorp Certified Terraform Associate, AWS DevOps Engineer Pro",
        
        tlApproved: true,
        tlRating: "4.6",
        tlHike: "14%",
        tlPromo: "Lead Cloud Platform Engineer",
        tlFeedback: "Consistently resolves production bottlenecks and drives outstanding cloud cost efficiencies.",

        hrApproved: true,
        hrRating: "4.6",
        hrHike: "14%",
        tlPromo: "Lead Cloud Platform Engineer",
        hrComments: "Endorsed.",

        mgrApproved: true,
        mgrRating: "4.7",
        mgrHike: "14%",
        mgrReply: "Good! Substantial cloud savings and impeccable production reliability."
    },
    "ROHIT": {
        id: "EMP-0126",
        name: "Rohit Menon",
        email: "rohit.m@gharuda.com",
        dept: "Cloud Ops",
        role: "Site Reliability Engineer",
        tl: "Alex Turner (Cloud Manager)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Observability Platform, Chaos Engineering, Multi-Region Failover",
        tools: "Prometheus, Grafana, OpenTelemetry, Istio Service Mesh, AWS",
        summary: "Built centralized distributed tracing and automated alert routing, reducing Mean Time to Detection (MTTD) by 62%.",
        achievements: "• Implemented proactive canary deployments with automated rollback on error spikes.\n• Executed chaos testing drills uncovering 4 critical resiliency bugs before launch.\n• Maintained flawless zero-downtime during peak Black Friday server traffic.",
        rating: "4.7",
        certs: "CKA Certified Kubernetes Administrator, AWS SysOps Associate",

        tlApproved: true,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Senior SRE Lead",
        tlFeedback: "Outstanding production vigilance, deep observability expertise, and robust chaos engineering drills.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Senior SRE Lead",
        hrComments: "Strong peer commendations and verified technical excellence in critical infrastructure.",

        mgrApproved: true,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Stellar infrastructure stability and zero platform outages."
    },

    // ----------------- MARKETING -----------------
    "RAHUL": {
        id: "EMP-0112",
        name: "Rahul Verma",
        email: "rahul.v@gharuda.com",
        dept: "Marketing",
        role: "Performance Marketing Specialist",
        tl: "Priya S (Marketing Lead)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Q3-Q4 Growth Funnel Optimization, Enterprise Lead Gen Ads",
        tools: "Google Analytics 4, Meta Ads Manager, HubSpot, SEMrush",
        summary: "Boosted high-intent enterprise HRMS qualified inbound leads by 42% while decreasing cost-per-acquisition (CPA) by 22% through systematic landing page A/B testing.",
        achievements: "• Generated 1,400+ qualified demo bookings for the B2B enterprise sales team.\n• Ranked 18 high-volume HRMS keywords in Google Top 3 organic search results.\n• Executed high-converting webinar campaigns with 68% attendance rate.",
        rating: "4.5",
        certs: "Google Ads Search Certified, HubSpot Inbound Marketing",
        
        tlApproved: true,
        tlRating: "4.6",
        tlHike: "14%",
        tlPromo: "Lead Growth Marketing Specialist",
        tlFeedback: "Excellent data-driven mindset, rigorous analytics tracking, and consistent growth pipeline delivery.",

        hrApproved: true,
        hrRating: "4.7",
        hrHike: "14%",
        tlPromo: "Lead Growth Marketing Specialist",
        hrComments: "Strong ROI metrics verified with revenue operations. Merit increment approved within marketing band.",

        mgrApproved: false,
        mgrRating: "4.7",
        mgrHike: "14%",
        mgrReply: "Good! Outstanding growth numbers and impactful enterprise lead acquisition."
    },
    "POOJA": {
        id: "EMP-0130",
        name: "Pooja Hegde",
        email: "pooja.h@gharuda.com",
        dept: "Marketing",
        role: "Content & Brand Lead",
        tl: "Priya S (Marketing Lead)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "HRMS Thought Leadership Whitepapers, Product Launch Case Studies, Social Video",
        tools: "Canva, Notion, WordPress, Buffer, Grammarly Enterprise",
        summary: "Authored 24 in-depth HR trend reports and B2B customer success case studies, increasing website organic referral traffic by 65%.",
        achievements: "• Published 'Future of AI in HR 2026' report downloaded by 3,800+ HR leaders.\n• Managed brand redesign launch across LinkedIn and industry tech portals.\n• Spearheaded monthly customer newsletter reaching 28,000+ active subscribers.",
        rating: "4.6",
        certs: "HubSpot Content Marketing Certification",

        tlApproved: true,
        tlRating: "4.7",
        tlHike: "14.5%",
        tlPromo: "Senior Brand Marketing Manager",
        tlFeedback: "Creative storytelling, superb editorial leadership, and strong multi-channel content execution.",

        hrApproved: false,
        hrRating: "4.7",
        hrHike: "14.5%",
        tlPromo: "Senior Brand Marketing Manager",
        hrComments: "",

        mgrApproved: false,
        mgrRating: "4.7",
        mgrHike: "14.5%",
        mgrReply: "Good! High-impact content creation and exceptional brand storytelling."
    },

    // ----------------- IT OPERATIONS & CYBERSECURITY -----------------
    "DAVID": {
        id: "EMP-0125",
        name: "David Martinez",
        email: "david.m@gharuda.com",
        dept: "IT Operations",
        role: "IT Security Specialist",
        tl: "Daniel M (IT Head)",
        cycleType: "Half-Yearly",
        cyclePeriod: "H1 (Apr-Sep '26)",
        projects: "SOC2 Type II Audit, Endpoint Threat Detection, IAM Hardening",
        tools: "CrowdStrike, Okta SSO, Splunk, Tenable Nessus, AWS IAM",
        summary: "Led security controls implementation that successfully passed annual SOC2 Type II compliance audit with zero non-conformities. Hardened single sign-on across 45 internal SaaS tools.",
        achievements: "• Implemented phishing-resistant MFA across 100% of employee accounts.\n• Resolved 94% of reported security vulnerabilities within SLA of 48 hours.\n• Conducted monthly security drills and awareness training for 300+ staff.",
        rating: "4.6",
        certs: "CISSP Certified Information Systems Security Professional, CEH",
        
        tlApproved: true,
        tlRating: "4.7",
        tlHike: "15%",
        tlPromo: "Principal Security Architect",
        tlFeedback: "Flawless audit execution and outstanding zero-trust security posture improvements.",

        hrApproved: false,
        hrRating: "4.7",
        hrHike: "15%",
        tlPromo: "Principal Security Architect",
        hrComments: "",

        mgrApproved: false,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Flawless SOC2 audit clearance and exceptional company cybersecurity governance."
    },
    "SANJAY": {
        id: "EMP-0134",
        name: "Sanjay Gupta",
        email: "sanjay.g@gharuda.com",
        dept: "IT Operations",
        role: "Senior IT Systems Admin",
        tl: "Daniel M (IT Head)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Zero-Touch Laptop Provisioning, Office Network Upgrade, Helpdesk Automation",
        tools: "Jamf Pro, Microsoft Intune, Jira Service Management, Cisco Meraki",
        summary: "Automated new hire hardware staging and MDM enrolment, dropping onboarding laptop setup time from 3 hours to 15 minutes per employee.",
        achievements: "• Handled 1,800+ internal IT tickets with a 98.4% first-contact resolution rate.\n• Upgraded corporate office Wi-Fi 6 network ensuring seamless 1Gbps connectivity.\n• Maintained 100% hardware inventory accuracy across 4 office locations.",
        rating: "4.5",
        certs: "CompTIA Security+, Cisco CCNA, Jamf Certified Admin",

        tlApproved: true,
        tlRating: "4.6",
        tlHike: "13.5%",
        tlPromo: "Lead IT Operations Specialist",
        tlFeedback: "Highly responsive, customer-first service mindset, and efficient IT provisioning.",

        hrApproved: true,
        hrRating: "4.6",
        hrHike: "13.5%",
        tlPromo: "Lead IT Operations Specialist",
        hrComments: "Strong employee CSAT ratings and seamless IT support delivery across all teams.",

        mgrApproved: true,
        mgrRating: "4.7",
        mgrHike: "13.5%",
        mgrReply: "Good! Reliable IT systems administration and outstanding employee support turnaround."
    },

    // ----------------- BUSINESS & SALES -----------------
    "AMIT": {
        id: "EMP-0110",
        name: "Amit Patel",
        email: "amit.p@gharuda.com",
        dept: "Business",
        role: "Senior Enterprise Account Executive",
        tl: "Sanjay Gupta (VP Sales)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "BFSI Sector Penetration, Enterprise HRMS Expansion, Q4 Revenue Run",
        tools: "Salesforce CRM, Gong.io, LinkedIn Sales Nav, DocuSign",
        summary: "Closed ₹3.4 Crores in new Annual Recurring Revenue (ARR) across enterprise financial and manufacturing clients, achieving 134% of annual quota.",
        achievements: "• Secured 3 Tier-1 banking enterprise multi-year subscription contracts.\n• Maintained 96% client retention and upsell expansion rate across portfolio.\n• Awarded Top Sales Closer of the Year FY25.",
        rating: "4.9",
        certs: "MEDDIC Sales Certification, Enterprise SaaS Sales Master",
        
        tlApproved: true,
        tlRating: "4.9",
        tlHike: "18%",
        tlPromo: "Associate Vice President - Enterprise Sales",
        tlFeedback: "Phenomenal sales results, high client rapport, and tremendous revenue contribution to company ARR goals.",

        hrApproved: true,
        hrRating: "4.9",
        hrHike: "18%",
        tlPromo: "Associate Vice President - Enterprise Sales",
        hrComments: "Top quota achiever across company. Exceptional merit increase endorsed.",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "18%",
        mgrReply: "Good! Outstanding enterprise sales numbers. Achieved 134% of annual quota. Approved 18% hike and AVP promotion."
    },
    "MANOJ": {
        id: "EMP-0140",
        name: "Manoj Kumar",
        email: "manoj.k@gharuda.com",
        dept: "Sales & BD",
        role: "Enterprise Sales Director",
        tl: "Shankar Raman (Chief Commercial Officer)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Mid-Market & Enterprise HRMS Expansions, Multi-Year SaaS Contracts",
        tools: "Salesforce CRM, Gong.io, LinkedIn Sales Navigator, ZoomInfo",
        summary: "Closed ₹4.2 Crores in Annual Recurring Revenue (ARR) across 18 mid-market enterprise accounts, achieving 135% of annual sales quota.",
        achievements: "• Signed company's largest multi-year enterprise contract with a 2,500-seat workforce.\n• Expanded account retention and upsell rate to 118% net revenue retention.\n• Mentored 4 junior business development representatives on sales methodology.",
        rating: "4.9",
        certs: "Certified Enterprise Sales Leader (CESL)",

        tlApproved: true,
        tlRating: "5.0",
        tlHike: "18%",
        tlPromo: "VP of Enterprise Sales",
        tlFeedback: "Phenomenal sales numbers, impeccable enterprise client negotiation skills, and consistent revenue overachievement.",

        hrApproved: true,
        hrRating: "5.0",
        hrHike: "18%",
        tlPromo: "VP of Enterprise Sales",
        hrComments: "Highest revenue contributor in FY25-26. Top performance bracket confirmed.",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "18%",
        mgrReply: "Good! Outstanding revenue generation, exceptional enterprise leadership, and historic sales growth."
    },
    "DIVYA": {
        id: "EMP-0142",
        name: "Divya Krishnan",
        email: "divya.k@gharuda.com",
        dept: "Sales & BD",
        role: "Key Account Manager",
        tl: "Manoj Kumar (Sales Director)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Enterprise Client Success, Strategic Renewals, Upsell Expansion",
        tools: "Salesforce, Gainsight, HubSpot, Zendesk",
        summary: "Maintained a 99.2% annual contract renewal rate across 35 enterprise accounts while identifying ₹85 Lakhs in expansion add-on modules.",
        achievements: "• Zero customer churn across Tier-1 enterprise accounts in FY25.\n• Delivered Quarterly Business Reviews (QBRs) for 100% of assigned key accounts.\n• Coordinated with product team to deliver top 5 requested enterprise client features.",
        rating: "4.7",
        certs: "Gainsight Certified Customer Success Manager",

        tlApproved: false,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Senior Key Accounts Lead",
        tlFeedback: "Deep relationship building with enterprise clients, proactive renewal management, and solid upsell track record.",

        hrApproved: false,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Senior Key Accounts Lead",
        hrComments: "",

        mgrApproved: false,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Outstanding account retention and high enterprise client satisfaction."
    },

    // ----------------- FINANCE & ACCOUNTS -----------------
    "SURESH": {
        id: "EMP-0150",
        name: "Suresh Natarajan",
        email: "suresh.n@gharuda.com",
        dept: "Finance & Accounts",
        role: "Senior Financial Analyst",
        tl: "Kavitha R (Finance Director)",
        cycleType: "Annual",
        cyclePeriod: "FY 2026-27",
        projects: "Annual Budget Forecasting, SaaS Unit Economics, CapEx/OpEx Modeling",
        tools: "SAP ERP, Oracle NetSuite, Advanced Excel VBA, Tableau",
        summary: "Created automated SaaS unit economics and EBITDA cash flow models, providing real-time departmental budget variance tracking for C-level leadership.",
        achievements: "• Uncovered ₹22 Lakhs in vendor tax credit recovery during annual audit.\n• Reduced monthly financial books closure cycle from 9 days to 4 days.\n• Built dynamic headcount budgeting calculator integrated with HR recruitment plan.",
        rating: "4.6",
        certs: "Chartered Financial Analyst (CFA Level 2), CMA Certified",

        tlApproved: true,
        tlRating: "4.7",
        tlHike: "14%",
        tlPromo: "Finance Manager - FP&A",
        tlFeedback: "Meticulous financial forecasting, deep analytical rigor, and accurate monthly variance tracking.",

        hrApproved: true,
        hrRating: "4.7",
        hrHike: "14%",
        tlPromo: "Finance Manager - FP&A",
        hrComments: "Audit standards verified. Strong performance within finance operations band.",

        mgrApproved: false,
        mgrRating: "4.7",
        mgrHike: "14%",
        mgrReply: "Good! Excellent financial modeling, rigorous cash flow management, and timely audit clearance."
    },
    "LAVANYA": {
        id: "EMP-0152",
        name: "Lavanya S",
        email: "lavanya.s@gharuda.com",
        dept: "Finance & Accounts",
        role: "Payroll & Accounts Manager",
        tl: "Kavitha R (Finance Director)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "Automated Tax Filing & Form 16, Multi-State Statutory Compliance, Payroll Audit",
        tools: "Tally Prime, Quickbooks, Gharuda Payroll Engine, Income Tax Portal",
        summary: "Disbursed monthly payroll for 600+ full-time and contract staff across 4 states with 100% on-time accuracy and zero statutory compliance delays.",
        achievements: "• Automated TDS calculations and Form 16 generation for all employees.\n• Achieved 100% on-time PF, ESI, and Professional Tax government filings.\n• Resolved 99% of employee payroll queries within 4 business hours.",
        rating: "4.8",
        certs: "Certified Payroll Specialist (CPP), CA Inter",

        tlApproved: true,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Senior Manager - Payroll & Compliance",
        tlFeedback: "Zero payroll defects, impeccable compliance tracking, and outstanding payroll support to all staff.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Senior Manager - Payroll & Compliance",
        hrComments: "Essential stakeholder for HR compensation operations. Top rating endorsed.",

        mgrApproved: true,
        mgrRating: "4.9",
        mgrHike: "15%",
        mgrReply: "Good! Flawless payroll processing, 100% compliance adherence, and excellent employee support."
    }
};

var currentDeptFilter = "";
var currentFrequencyFilter = "ALL";
var currentPeriodFilter = "ALL";
var currentStatusFilter = "COMPLETED";
var currentEmpKey = "";
var activeEmpStage = 1;

// Clean reference departments matching team.php
var departmentList = [
    "Design",
    "iOS Dev",
    "Business",
    "Marketing",
    "Engineering",
    "Human Resources",
    "Cloud Ops",
    "IT Operations",
    "Finance & Accounts"
];

function setLedgerQuickStatus(status) {
    currentStatusFilter = status || 'ALL';
    
    var sel = document.getElementById('ledgerCardStatusFilter');
    if (sel && sel.value !== currentStatusFilter) {
        sel.value = currentStatusFilter;
    }

    var pills = {
        'ALL': 'pillStatusAll',
        'COMPLETED': 'pillStatusCompleted',
        'PENDING_MGR': 'pillStatusMgr',
        'PENDING_HR': 'pillStatusHr',
        'PENDING_TL': 'pillStatusTl'
    };

    Object.keys(pills).forEach(function(k) {
        var btn = document.getElementById(pills[k]);
        if (btn) {
            if (k === currentStatusFilter) {
                btn.classList.add('active');
                if (k === 'ALL') {
                    btn.className = 'btn btn-sm btn-dark fw-bold rounded-pill px-3 shadow-none active';
                } else if (k === 'COMPLETED') {
                    btn.className = 'btn btn-sm btn-success fw-bold rounded-pill px-3 shadow-none active text-white';
                } else if (k === 'PENDING_MGR') {
                    btn.className = 'btn btn-sm btn-warning text-dark fw-bold rounded-pill px-3 shadow-none active';
                } else if (k === 'PENDING_HR') {
                    btn.className = 'btn btn-sm btn-primary fw-bold rounded-pill px-3 shadow-none active';
                } else if (k === 'PENDING_TL') {
                    btn.className = 'btn btn-sm btn-secondary text-white fw-bold rounded-pill px-3 shadow-none active';
                }
            } else {
                btn.classList.remove('active');
                if (k === 'ALL') {
                    btn.className = 'btn btn-sm btn-outline-dark fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'COMPLETED') {
                    btn.className = 'btn btn-sm btn-outline-success fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'PENDING_MGR') {
                    btn.className = 'btn btn-sm btn-outline-warning text-dark fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'PENDING_HR') {
                    btn.className = 'btn btn-sm btn-outline-primary fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'PENDING_TL') {
                    btn.className = 'btn btn-sm btn-outline-secondary fw-bold rounded-pill px-3 shadow-none';
                }
            }
        }
    });

    renderMasterLedgerTable();
}

function refreshSelect2() {
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('#adminDeptFilterSelect, #empPortalDeptSelect, #adminActiveEmpSelect, #employeePortalProfileSelect, #globalFrequencyFilter, #globalPeriodFilter').each(function() {
            var $el = $(this);
            if (!$el.data('select2')) {
                $el.select2({ width: '100%' });
            } else {
                $el.trigger('change.select2');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    populateDepartmentDropdowns();
    populateEmployeeDropdowns('', '');
    loadEmployeeData('');
    setLedgerQuickStatus('COMPLETED');
    renderQuickEmpPills();

    // Bind Select2 change events
    if (typeof $ !== 'undefined') {
        $('#adminDeptFilterSelect').on('change select2:select', function() {
            onAdminDeptChange(this.value);
        });
        $('#empPortalDeptSelect').on('change select2:select', function() {
            onEmpPortalDeptChange(this.value);
        });
        $('#adminActiveEmpSelect').on('change select2:select', function() {
            if (this.value) loadEmployeeData(this.value);
        });
        $('#employeePortalProfileSelect').on('change select2:select', function() {
            if (this.value) loadEmployeeData(this.value);
        });
        $('#ledgerDeptFilterSelect').on('change select2:select', function() {
            onLedgerDeptFilterChange(this.value);
        });
        $('#globalFrequencyFilter').on('change select2:select', function() {
            onGlobalFrequencyChange(this.value);
        });
        $('#globalPeriodFilter').on('change select2:select', function() {
            onGlobalPeriodChange(this.value);
        });

        // Launch Appraisal Cycle Modal Select2 and Cascading Dropdowns
        $('#initiateCycleModal').on('shown.bs.modal', function () {
            var selectedDept = $('#modalCycleDept').val() || 'ALL';
            populateModalCycleEmployees(selectedDept);
            
            $('#modalCycleDept, #modalCycleEmployee, #modalCycleFrequency, #modalCyclePeriod').each(function() {
                var $el = $(this);
                if (!$el.data('select2')) {
                    $el.select2({
                        dropdownParent: $('#initiateCycleModal'),
                        width: '100%'
                    });
                }
            });
        });

        $('#modalCycleDept').on('change select2:select', function() {
            onModalCycleDeptChange(this.value);
        });
    }
});

// -------------------------------------------------------------
// LAUNCH CYCLE MODAL CASCADING EMPLOYEE POPULATION
// -------------------------------------------------------------
function populateModalCycleEmployees(dept) {
    var select = document.getElementById('modalCycleEmployee');
    if (!select) return;

    var filteredKeys = Object.keys(employeeDatabase).filter(function(key) {
        if (!dept || dept === '' || dept === 'ALL') return true;
        var d = (employeeDatabase[key].dept || '').toLowerCase();
        var s = dept.toLowerCase();
        if (s === 'design' && (d === 'design' || d === 'product design')) return true;
        if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) return true;
        if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) return true;
        return d === s;
    });

    var labelScope = (dept && dept !== 'ALL') ? ('All in ' + dept) : 'All Employees in Scope';
    var html = '<option value="ALL">-- ' + labelScope + ' (' + filteredKeys.length + ') --</option>';
    filteredKeys.forEach(function(k) {
        var emp = employeeDatabase[k];
        html += '<option value="' + k + '">' + emp.name + ' (' + emp.id + ' - ' + emp.role + ')</option>';
    });

    select.innerHTML = html;
    var badge = document.getElementById('modalCycleEmpCountBadge');
    if (badge) {
        badge.textContent = filteredKeys.length + ' Employees';
    }

    if (typeof $ !== 'undefined' && $(select).data('select2')) {
        $(select).trigger('change.select2');
    }
}

function onModalCycleDeptChange(dept) {
    populateModalCycleEmployees(dept);
}

// -------------------------------------------------------------
// MULTI-CADENCE FREQUENCY & PERIOD FILTER HANDLERS
// -------------------------------------------------------------
function onGlobalFrequencyChange(freq) {
    currentFrequencyFilter = freq || 'ALL';
    
    // Dynamically adjust Period dropdown options based on selected frequency
    var periodSelect = document.getElementById('globalPeriodFilter');
    if (periodSelect) {
        var optionsHtml = '<option value="ALL">All Review Periods</option>';
        if (freq === 'Monthly') {
            optionsHtml += '<option value="October 2026" selected>October 2026 (Monthly)</option>';
            optionsHtml += '<option value="September 2026">September 2026</option>';
            optionsHtml += '<option value="August 2026">August 2026</option>';
            optionsHtml += '<option value="November 2026">November 2026 (Upcoming)</option>';
        } else if (freq === 'Quarterly') {
            optionsHtml += '<option value="Q3 (Oct-Dec \'26)" selected>Q3 (Oct-Dec 2026) - Active</option>';
            optionsHtml += '<option value="Q2 (Jul-Sep \'26)">Q2 (Jul-Sep 2026)</option>';
            optionsHtml += '<option value="Q1 (Apr-Jun \'26)">Q1 (Apr-Jun 2026)</option>';
            optionsHtml += '<option value="Q4 (Jan-Mar \'27)">Q4 (Jan-Mar 2027)</option>';
        } else if (freq === 'Half-Yearly') {
            optionsHtml += '<option value="H1 (Apr-Sep \'26)" selected>H1 (Apr-Sep 2026)</option>';
            optionsHtml += '<option value="H2 (Oct-Mar \'27)">H2 (Oct-Mar 2027)</option>';
        } else if (freq === 'Annual') {
            optionsHtml += '<option value="FY 2026-27" selected>FY 2026-27 (Annual)</option>';
            optionsHtml += '<option value="FY 2025-26">FY 2025-26 (Archived)</option>';
        } else {
            optionsHtml += '<option value="Q3 (Oct-Dec \'26)">Q3 (Oct-Dec 2026)</option>';
            optionsHtml += '<option value="H1 (Apr-Sep \'26)">H1 (Apr-Sep 2026)</option>';
            optionsHtml += '<option value="October 2026">October 2026 (Monthly)</option>';
            optionsHtml += '<option value="FY 2026-27">FY 2026-27 (Annual)</option>';
        }
        periodSelect.innerHTML = optionsHtml;
        if (typeof $ !== 'undefined' && $.fn.select2) $(periodSelect).trigger('change.select2');
    }

    currentPeriodFilter = (freq === 'ALL') ? 'ALL' : (periodSelect ? periodSelect.value : 'ALL');
    renderMasterLedgerTable();
}

function onGlobalPeriodChange(period) {
    currentPeriodFilter = period || 'ALL';
    renderMasterLedgerTable();
}

function onModalCycleFreqChange(freq) {
    var periodSelect = document.getElementById('modalCyclePeriod');
    var titleInput = document.getElementById('modalCycleTitle');
    if (!periodSelect) return;

    var optionsHtml = '';
    if (freq === 'Monthly') {
        optionsHtml = '<option value="October 2026">October 2026</option><option value="November 2026">November 2026</option><option value="December 2026">December 2026</option>';
        if (titleInput) titleInput.value = 'October 2026 Monthly Performance Review';
    } else if (freq === 'Quarterly') {
        optionsHtml = '<option value="Q3 (Oct-Dec \'26)" selected>Q3 (Oct-Dec 2026)</option><option value="Q2 (Jul-Sep \'26)">Q2 (Jul-Sep 2026)</option><option value="Q1 (Apr-Jun \'26)">Q1 (Apr-Jun 2026)</option><option value="Q4 (Jan-Mar \'27)">Q4 (Jan-Mar 2027)</option>';
        if (titleInput) titleInput.value = 'Q3 2026-27 Quarterly Performance Appraisal Cycle';
    } else if (freq === 'Half-Yearly') {
        optionsHtml = '<option value="H1 (Apr-Sep \'26)" selected>H1 (Apr-Sep 2026)</option><option value="H2 (Oct-Mar \'27)">H2 (Oct-Mar 2027)</option>';
        if (titleInput) titleInput.value = 'H1 2026-27 Mid-Year Performance Evaluation';
    } else {
        optionsHtml = '<option value="FY 2026-27" selected>FY 2026-27 Annual</option>';
        if (titleInput) titleInput.value = 'FY 2026-27 Annual Merit Appraisal Cycle';
    }
    periodSelect.innerHTML = optionsHtml;
}

function handleLaunchCycleSubmit() {
    var freq = document.getElementById('modalCycleFrequency').value;
    var period = document.getElementById('modalCyclePeriod').value;
    var title = document.getElementById('modalCycleTitle').value;
    var dept = document.getElementById('modalCycleDept').value;
    var empKey = document.getElementById('modalCycleEmployee') ? document.getElementById('modalCycleEmployee').value : 'ALL';

    var targetDesc = (empKey !== 'ALL' && employeeDatabase[empKey]) 
        ? employeeDatabase[empKey].name 
        : (dept !== 'ALL' ? (dept + ' Department') : 'All Departments');

    showToastNotification('Appraisal Cycle Launched', title + ' has been published for ' + targetDesc + '. All employee portals are now open for Self-Review.');

    // If a specific employee was selected, switch to that employee
    if (empKey !== 'ALL' && employeeDatabase[empKey]) {
        loadEmployeeData(empKey);
    }

    // Sync global filter
    var freqSel = document.getElementById('globalFrequencyFilter');
    if (freqSel) {
        freqSel.value = freq;
        if (typeof $ !== 'undefined' && $.fn.select2) $(freqSel).trigger('change.select2');
    }
    onGlobalFrequencyChange(freq);

    var modalEl = document.getElementById('initiateCycleModal');
    if (modalEl) {
        var modalInstance = bootstrap.Modal.getInstance(modalEl);
        if (modalInstance) modalInstance.hide();
    }
}

function resetLedgerFilters() {
    currentFrequencyFilter = "ALL";
    currentPeriodFilter = "ALL";
    currentDeptFilter = "";
    currentStatusFilter = "COMPLETED";
    
    var searchInput = document.getElementById('ledgerSearchInput');
    if (searchInput) searchInput.value = "";

    var freqSel = document.getElementById('globalFrequencyFilter');
    if (freqSel) {
        freqSel.value = "ALL";
        if (typeof $ !== 'undefined' && $.fn.select2) $(freqSel).trigger('change.select2');
    }

    var deptSel = document.getElementById('adminDeptFilterSelect');
    if (deptSel) {
        deptSel.value = "";
        if (typeof $ !== 'undefined' && $.fn.select2) $(deptSel).trigger('change.select2');
    }

    setLedgerQuickStatus('COMPLETED');
    onAdminDeptChange('');
}

// -------------------------------------------------------------
// DEPARTMENT & EMPLOYEE POPULATION FUNCTIONS (Matching team.php)
// -------------------------------------------------------------
function populateDepartmentDropdowns() {
    var adminDeptSelect = document.getElementById('adminDeptFilterSelect');
    var empDeptSelect = document.getElementById('empPortalDeptSelect');
    var ledgerDeptSelect = document.getElementById('ledgerDeptFilterSelect');

    var optionsHtml = '<option value="">- All Departments -</option>';
    departmentList.forEach(function(deptName) {
        optionsHtml += '<option value="' + deptName + '">' + deptName + '</option>';
    });

    if (adminDeptSelect) adminDeptSelect.innerHTML = optionsHtml;
    if (empDeptSelect) empDeptSelect.innerHTML = optionsHtml;
    if (ledgerDeptSelect) {
        ledgerDeptSelect.innerHTML = '<option value="ALL">All Departments</option>' + departmentList.map(function(d) {
            return '<option value="' + d + '">' + d + '</option>';
        }).join('');
    }

    refreshSelect2();
}

function populateEmployeeDropdowns(selectedDept, targetKeyToSelect) {
    var adminEmpSelect = document.getElementById('adminActiveEmpSelect');
    var empPortalSelect = document.getElementById('employeePortalProfileSelect');

    var filteredKeys = Object.keys(employeeDatabase).filter(function(key) {
        if (!selectedDept || selectedDept === '' || selectedDept === 'ALL') return true;
        var d = (employeeDatabase[key].dept || '').toLowerCase();
        var s = selectedDept.toLowerCase();
        if (s === 'design' && (d === 'design' || d === 'product design')) return true;
        if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) return true;
        if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) return true;
        return d === s;
    });

    var optionsHtml = '<option value="">- Select Employee -</option>';
    filteredKeys.forEach(function(key) {
        var emp = employeeDatabase[key];
        optionsHtml += '<option value="' + key + '">' + emp.name + ' (' + emp.id + ' - ' + emp.role + ')</option>';
    });

    if (adminEmpSelect) {
        adminEmpSelect.innerHTML = optionsHtml;
    }
    if (empPortalSelect) {
        empPortalSelect.innerHTML = optionsHtml;
    }

    // Determine which employee to select - do NOT force first employee if target is empty
    var keyToSelect = '';
    if (targetKeyToSelect && filteredKeys.indexOf(targetKeyToSelect) !== -1) {
        keyToSelect = targetKeyToSelect;
    }

    if (adminEmpSelect) {
        adminEmpSelect.value = keyToSelect;
        if (typeof $ !== 'undefined' && $(adminEmpSelect).data('select2')) {
            $(adminEmpSelect).val(keyToSelect).trigger('change.select2');
        }
    }
    if (empPortalSelect) {
        empPortalSelect.value = keyToSelect;
        if (typeof $ !== 'undefined' && $(empPortalSelect).data('select2')) {
            $(empPortalSelect).val(keyToSelect).trigger('change.select2');
        }
    }

    // Update count badge
    var countBadge = document.getElementById('adminDeptCountBadge');
    if (countBadge) {
        countBadge.textContent = (selectedDept ? selectedDept + ': ' : '') + filteredKeys.length + ' Employees';
    }

    refreshSelect2();

    return keyToSelect;
}

// When Department is changed in Admin Portal or Global Filter
function onAdminDeptChange(dept) {
    currentDeptFilter = dept;
    
    // Sync other dropdowns
    var adminDeptSelect = document.getElementById('adminDeptFilterSelect');
    if (adminDeptSelect && adminDeptSelect.value !== dept) {
        adminDeptSelect.value = dept;
        if (typeof $ !== 'undefined' && $.fn.select2) $(adminDeptSelect).trigger('change.select2');
    }

    var empDeptSelect = document.getElementById('empPortalDeptSelect');
    if (empDeptSelect && empDeptSelect.value !== dept) {
        empDeptSelect.value = dept;
        if (typeof $ !== 'undefined' && $.fn.select2) $(empDeptSelect).trigger('change.select2');
    }

    var ledgerDeptSelect = document.getElementById('ledgerDeptFilterSelect');
    if (ledgerDeptSelect) ledgerDeptSelect.value = dept || 'ALL';

    var selectedKey = populateEmployeeDropdowns(dept, currentEmpKey);
    if (selectedKey) {
        loadEmployeeData(selectedKey);
    } else {
        loadEmployeeData('');
    }
    renderMasterLedgerTable();
}

// When Department is changed in Employee Portal
function onEmpPortalDeptChange(dept) {
    onAdminDeptChange(dept);
}

// When Department is changed in Master Company Ledger
function onLedgerDeptFilterChange(dept) {
    onAdminDeptChange((dept === 'ALL') ? '' : dept);
}

// Helper: Calculate stage status for any employee profile
function getEmployeeAppraisalStatus(data) {
    if (data.hrApproved) {
        return {
            text: "Completed",
            badgeClass: "bg-success text-white",
            subtleBadgeClass: "bg-success-subtle text-success border border-success",
            statusKey: "completed",
            stageStep: 5
        };
    } else if (data.mgrApproved) {
        return {
            text: "Pending HR Review",
            badgeClass: "text-white",
            badgeStyle: "background:#7c3aed;",
            subtleBadgeClass: "border",
            subtleStyle: "background:#f3e8ff; color:#7c3aed; border-color:#d8b4fe;",
            statusKey: "pending_hr",
            stageStep: 4
        };
    } else if (data.tlApproved) {
        return {
            text: "Pending Manager Decision",
            badgeClass: "bg-warning text-dark",
            subtleBadgeClass: "bg-warning-subtle text-warning border border-warning",
            statusKey: "pending_mgr",
            stageStep: 3
        };
    } else {
        return {
            text: "Pending TL Review",
            badgeClass: "bg-secondary text-white",
            subtleBadgeClass: "bg-secondary-subtle text-secondary border border-secondary",
            statusKey: "pending_tl",
            stageStep: 2
        };
    }
}

// 1. Switch Top-Level Portal (Employee vs Admin vs Overall Ledger)
function switchMainPortal(portal) {
    var btnEmp = document.getElementById('btnPortalEmployee');
    var btnAdmin = document.getElementById('btnPortalAdmin');
    var btnLedger = document.getElementById('btnPortalLedger');
    var secEmp = document.getElementById('portalEmployeeSection');
    var secAdmin = document.getElementById('portalAdminSection');
    var secLedger = document.getElementById('portalLedgerSection');

    if (btnEmp) btnEmp.classList.remove('active');
    if (btnAdmin) btnAdmin.classList.remove('active');
    if (btnLedger) btnLedger.classList.remove('active');

    if (secEmp) secEmp.classList.add('d-none');
    if (secAdmin) secAdmin.classList.add('d-none');
    if (secLedger) secLedger.classList.add('d-none');

    if (portal === 'employee') {
        if (btnEmp) btnEmp.classList.add('active');
        if (secEmp) secEmp.classList.remove('d-none');
    } else if (portal === 'admin') {
        if (btnAdmin) btnAdmin.classList.add('active');
        if (secAdmin) secAdmin.classList.remove('d-none');
        renderQuickEmpPills();
    } else if (portal === 'ledger') {
        if (btnLedger) btnLedger.classList.add('active');
        if (secLedger) secLedger.classList.remove('d-none');
        setLedgerQuickStatus('COMPLETED');
    }
}

// 1.1 Switch Employee Stage Panes (Stage 1 to Stage 5)
function switchEmpStage(stageNum) {
    activeEmpStage = stageNum;
    for (var i = 1; i <= 5; i++) {
        var stepEl = document.getElementById('empStep' + i);
        var paneEl = document.getElementById('empStagePane' + i);
        if (stepEl) {
            if (i === stageNum) {
                stepEl.classList.add('selected-step');
            } else {
                stepEl.classList.remove('selected-step');
            }
        }
        if (paneEl) {
            if (i === stageNum) {
                paneEl.classList.remove('d-none');
            } else {
                paneEl.classList.add('d-none');
            }
        }
    }

    var titles = {
        1: "Stage 1: Employee Self-Appraisal Form",
        2: "Stage 2: Team Lead (TL) Review & Rating Status",
        3: "Stage 3: Executive Manager Final Decision & Reply Status",
        4: "Stage 4: HR Department Policy & Increment Check Status",
        5: "Stage 5: Official Performance Appraisal Scorecard"
    };
    var subs = {
        1: "Fill and submit your self-appraisal details below. The approval progress is shown in the lifecycle stepper above.",
        2: "View the evaluation score, increment recommendation, and feedback from your Team Lead.",
        3: "View the Executive Manager's final rating and personalized recognition reply message.",
        4: "View HR policy verification, increment endorsement, and final approval.",
        5: "Official merit scorecard certificate awarded upon completion of all appraisal stages."
    };

    var titleEl = document.getElementById('empHubTitle');
    var subEl = document.getElementById('empHubSub');
    if (titleEl) titleEl.textContent = titles[stageNum] || titles[1];
    if (subEl) subEl.textContent = subs[stageNum] || subs[1];
}

// 2. Switch Admin Sub-Tabs (TL vs Manager vs HR vs All)
function switchAdminSubtab(tab) {
    var tabs = ['tl', 'hr', 'mgr', 'all'];
    tabs.forEach(function(t) {
        var btn = document.getElementById('subtabBtn' + capitalizeStr(t));
        var content = document.getElementById('adminSub' + capitalizeStr(t));
        if (btn) btn.classList.remove('active');
        if (content) content.classList.add('d-none');
    });

    var activeBtn = document.getElementById('subtabBtn' + capitalizeStr(tab));
    var activeContent = document.getElementById('adminSub' + capitalizeStr(tab));
    if (activeBtn) activeBtn.classList.add('active');
    if (activeContent) activeContent.classList.remove('d-none');

    if (tab === 'all') {
        renderMasterLedgerTable();
    }
}

function capitalizeStr(str) {
    if (str === 'tl') return 'TL';
    if (str === 'hr') return 'HR';
    if (str === 'mgr') return 'Mgr';
    if (str === 'all') return 'All';
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Reset Employee Self Form for new blank input
function resetEmpSelfForm() {
    currentEmpKey = '';
    
    // Header status in stepper
    var stepperName = document.getElementById('empStepperName');
    if (stepperName) stepperName.textContent = 'Fill New Self-Appraisal Form';
    var statusPill = document.getElementById('empPortalStatusPill');
    if (statusPill) {
        statusPill.textContent = 'Stage 1: Fill Form';
        statusPill.className = 'badge bg-success-subtle text-success border border-success px-3 py-1.5 fw-bold';
    }

    // Reset Form Fields
    var fIds = ['p1EmpId', 'p1EmpName', 'p1EmpEmail', 'p1EmpDept', 'p1EmpRole', 'p1EmpTL', 'p1EmpProjects', 'p1EmpTools', 'p1EmpSummary', 'p1EmpAchievements', 'p1EmpCerts'];
    fIds.forEach(function(id) {
        var el = document.getElementById(id);
        if (el) el.value = '';
    });
    var ratingEl = document.getElementById('p1EmpRating');
    if (ratingEl) ratingEl.value = '4.5';

    // Reset Stage Progress Stepper
    var step1 = document.getElementById('empStep1');
    if (step1) step1.className = 'journey-step-item active selected-step';
    var sub1 = document.getElementById('empSub1');
    if (sub1) sub1.textContent = 'Fill & Submit Form';

    for (var i = 2; i <= 5; i++) {
        var step = document.getElementById('empStep' + i);
        var sub = document.getElementById('empSub' + i);
        var conn = document.getElementById('empConn' + (i - 1));
        if (step) step.className = 'journey-step-item';
        if (sub) sub.textContent = (i === 2 ? 'Pending Submission' : 'Locked');
        if (conn) conn.classList.remove('active');
    }

    // Reset Stepper Panes to Stage 1
    switchEmpStage(1);

    // Sync admin dropdown if needed
    var adminSelect = document.getElementById('adminActiveEmpSelect');
    if (adminSelect && adminSelect.value !== '') {
        adminSelect.value = '';
        if (typeof $ !== 'undefined' && $(adminSelect).data('select2')) $(adminSelect).trigger('change.select2');
    }
}

// 3. Load Data for Selected Employee
function loadEmployeeData(key) {
    if (!key || key === '' || !employeeDatabase[key]) {
        resetEmpSelfForm();
        return;
    }

    currentEmpKey = key;
    var data = employeeDatabase[key];

    // Sync dropdowns
    var empSelect = document.getElementById('employeePortalProfileSelect');
    if (empSelect && empSelect.value !== key) {
        empSelect.value = key;
        if (typeof $ !== 'undefined' && $(empSelect).data('select2')) $(empSelect).trigger('change.select2');
    }
    var adminSelect = document.getElementById('adminActiveEmpSelect');
    if (adminSelect && adminSelect.value !== key) {
        adminSelect.value = key;
        if (typeof $ !== 'undefined' && $(adminSelect).data('select2')) $(adminSelect).trigger('change.select2');
    }

    // Admin Executive Header Preview Block
    var adminActiveBadge = document.getElementById('adminActiveEmpBadge');
    if (adminActiveBadge) adminActiveBadge.textContent = data.name;

    var adminAvatar = document.getElementById('adminActiveEmpAvatar');
    if (adminAvatar) adminAvatar.textContent = data.name.charAt(0).toUpperCase();

    var adminIdBadge = document.getElementById('adminActiveEmpIdBadge');
    if (adminIdBadge) adminIdBadge.textContent = data.id;

    var adminRoleMeta = document.getElementById('adminActiveEmpRoleMeta');
    if (adminRoleMeta) adminRoleMeta.textContent = data.role;

    var adminDeptMeta = document.getElementById('adminActiveEmpDeptMeta');
    if (adminDeptMeta) adminDeptMeta.textContent = data.dept;

    var statusObj = getEmployeeAppraisalStatus(data);
    var pipelineBadge = document.getElementById('adminEmpPipelineBadge');
    if (pipelineBadge) {
        pipelineBadge.textContent = 'Status: ' + statusObj.text;
        pipelineBadge.className = 'badge px-3 py-1.5 fw-bold ' + (statusObj.badgeClass || '');
        if (statusObj.badgeStyle) pipelineBadge.style = statusObj.badgeStyle;
        else pipelineBadge.style = '';
    }

    // Stage 1 Employee Portal Form
    document.getElementById('empStepperName').textContent = data.name + ' (' + data.id + ')';
    document.getElementById('p1EmpId').value = data.id;
    document.getElementById('p1EmpName').value = data.name;
    document.getElementById('p1EmpEmail').value = data.email;
    document.getElementById('p1EmpDept').value = data.dept;
    document.getElementById('p1EmpRole').value = data.role;
    document.getElementById('p1EmpTL').value = data.tl;
    document.getElementById('p1EmpProjects').value = data.projects || '';
    document.getElementById('p1EmpTools').value = data.tools || '';
    document.getElementById('p1EmpSummary').value = data.summary || '';
    document.getElementById('p1EmpAchievements').value = data.achievements || '';
    document.getElementById('p1EmpRating').value = data.rating || '4.5';
    document.getElementById('p1EmpCerts').value = data.certs || '';

    // Stage 2 Employee View Pane (TL)
    document.getElementById('empViewTlName').textContent = data.tl;
    document.getElementById('empViewTlRating').textContent = (data.tlRating || '4.6') + ' / 5.0';
    document.getElementById('empViewTlHike').textContent = data.tlHike || '15%';
    document.getElementById('empViewTlPromo').textContent = data.tlPromo || 'Promoted';
    document.getElementById('empViewTlFeedback').textContent = '"' + (data.tlFeedback || 'Exemplary performance.') + '"';

    // Stage 3 Employee View Pane (Manager)
    document.getElementById('empViewMgrRating').textContent = (data.mgrRating || '4.8') + ' / 5.0';
    document.getElementById('empViewMgrHike').textContent = (data.mgrHike || data.tlHike || '15%') + ' Merit Hike';
    document.getElementById('empViewMgrReply').textContent = '"' + (data.mgrReply || 'Good! Outstanding performance.') + '"';

    // Stage 4 Employee View Pane (HR)
    document.getElementById('empViewHrRating').textContent = (data.hrRating || '4.8') + ' / 5.0';
    document.getElementById('empViewHrHike').textContent = data.hrHike || '15%';
    document.getElementById('empViewHrPromo').textContent = data.hrPromo || 'Promoted';
    document.getElementById('empViewHrComments').textContent = '"' + (data.hrComments || 'Performance aligns with annual merit budget.') + '"';

    // Stage 5 Employee View Pane (Scorecard)
    var empFinalScore = data.hrApproved ? data.hrRating : (data.mgrApproved ? data.mgrRating : (data.tlApproved ? data.tlRating : data.rating));
    document.getElementById('empViewScEmpName').textContent = data.name;
    document.getElementById('empViewScEmpRole').textContent = data.role;
    document.getElementById('empViewScEmpDept').textContent = data.dept;
    document.getElementById('empViewScScore1').textContent = data.rating ? (data.rating + ' / 5.0') : '--';
    document.getElementById('empViewScScore2').textContent = data.tlApproved ? (data.tlRating + ' / 5.0') : '--';
    document.getElementById('empViewScScore3').textContent = data.mgrApproved ? (data.mgrRating + ' / 5.0') : '--';
    document.getElementById('empViewScScore4').textContent = data.hrApproved ? (data.hrRating + ' / 5.0') : '--';
    document.getElementById('empViewScReply').textContent = '"' + (data.mgrReply || 'Good! Outstanding performance.') + '"';
    document.getElementById('empViewScHike').textContent = (data.hrHike || data.mgrHike || '15%') + ' Annual Merit Hike';
    document.getElementById('empViewScPromo').textContent = data.hrApproved ? (data.hrPromo || data.tlPromo || 'Promoted') : 'Pending HR Final Approval';

    // -------------------------------------------------------------
    // ADMIN PORTAL FORM POPULATION FOR SELECTED EMPLOYEE
    // -------------------------------------------------------------

    // A. Team Lead (Stage 2) Admin Desk
    document.getElementById('admTlEmpName').textContent = data.name;
    document.getElementById('admTlEmpMeta').textContent = ' (' + data.role + ' - ' + data.dept + ')';
    document.getElementById('admTlEmpScore').textContent = 'Emp Self-Rating: ' + data.rating + ' / 5.0';
    document.getElementById('admTlEmpSummary').textContent = data.summary;
    document.getElementById('admTlEmpAch').textContent = data.achievements;
    document.getElementById('admTlEmpProjects').textContent = data.projects || 'N/A';
    document.getElementById('admTlEmpTools').textContent = data.tools || 'N/A';

    var tlRatingSel = document.getElementById('admTlRating');
    if (tlRatingSel) {
        if (data.tlRating) tlRatingSel.value = data.tlRating;
        else tlRatingSel.value = "4.6";
    }
    document.getElementById('admTlHike').value = data.tlHike || '15%';
    document.getElementById('admTlPromo').value = data.tlPromo || ('Promoted to Lead ' + data.role);
    document.getElementById('admTlFeedback').value = data.tlFeedback || ('Demonstrated strong technical ownership and achieved all key quarterly deliverables.');

    var tlBanner = document.getElementById('admTlStatusBanner');
    var tlBannerTitle = document.getElementById('admTlBannerTitle');
    var tlBannerSub = document.getElementById('admTlBannerSub');
    var tlBannerBadge = document.getElementById('admTlBannerBadge');
    var tlSubmitBtn = document.getElementById('admTlSubmitBtn');

    if (data.tlApproved) {
        tlBanner.className = 'alert alert-success d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border-success';
        tlBannerTitle.textContent = 'Team Lead Review Completed & Approved';
        tlBannerSub.textContent = 'Evaluated and forwarded to Manager by ' + data.tl + ' with rating ' + data.tlRating + '/5.0.';
        tlBannerBadge.className = 'badge bg-success text-white px-3 py-1.5 fw-bold';
        tlBannerBadge.textContent = 'TL Approved';
        tlSubmitBtn.innerHTML = '<i class="bi bi-check-all me-1"></i> Update & Re-Approve TL Evaluation';
    } else {
        tlBanner.className = 'alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        tlBannerTitle.textContent = 'Awaiting Team Lead Review & Rating';
        tlBannerSub.textContent = 'Please review employee self-score and assign official Team Lead ratings.';
        tlBannerBadge.className = 'badge bg-warning text-dark px-3 py-1.5 fw-bold';
        tlBannerBadge.textContent = 'Pending TL Action';
        tlSubmitBtn.innerHTML = '<i class="bi bi-check-circle me-1"></i> Accept & Approve as Team Lead (Forward to Manager) &rarr;';
    }

    // B. Executive Manager (Stage 3) Admin Desk
    document.getElementById('admMgrEmpName').textContent = data.name;
    document.getElementById('admMgrEmpMeta').textContent = ' (' + data.role + ' - ' + data.dept + ')';
    document.getElementById('admMgrEmpScore').textContent = data.rating + ' / 5.0';
    document.getElementById('admMgrEmpSummary').textContent = data.summary || 'N/A';
    document.getElementById('admMgrTLScore').textContent = data.tlApproved ? ('TL Score: ' + data.tlRating + ' / 5.0') : 'Pending TL';
    document.getElementById('admMgrTLFeedback').textContent = data.tlApproved ? data.tlFeedback : 'Awaiting TL review submission';

    var mgrRatingSel = document.getElementById('admMgrRating');
    if (mgrRatingSel) {
        if (data.mgrRating) mgrRatingSel.value = data.mgrRating;
        else mgrRatingSel.value = data.tlRating || "4.8";
    }
    document.getElementById('admMgrHike').value = data.mgrHike || data.tlHike || '15%';
    document.getElementById('admMgrReply').value = data.mgrReply || ('Good! Outstanding contributions and dedication. Approved ' + (data.mgrHike || '15%') + ' merit hike.');

    var mgrBanner = document.getElementById('admMgrStatusBanner');
    var mgrBannerTitle = document.getElementById('admMgrBannerTitle');
    var mgrBannerSub = document.getElementById('admMgrBannerSub');
    var mgrBannerBadge = document.getElementById('admMgrBannerBadge');
    var mgrSubmitBtn = document.getElementById('admMgrSubmitBtn');

    if (data.mgrApproved) {
        mgrBanner.className = 'alert alert-success d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border-success';
        mgrBannerTitle.textContent = 'Executive Manager Decision & Signoff Completed';
        mgrBannerSub.textContent = 'Evaluated and forwarded to HR Department for final verification.';
        mgrBannerBadge.className = 'badge bg-success text-white px-3 py-1.5 fw-bold';
        mgrBannerBadge.textContent = 'Manager Signed Off';
        mgrSubmitBtn.innerHTML = '<i class="bi bi-check-all me-1"></i> Update Manager Signoff & Reply';
    } else if (data.tlApproved) {
        mgrBanner.className = 'alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        mgrBannerTitle.textContent = 'Awaiting Executive Manager Signoff & Reply';
        mgrBannerSub.textContent = 'TL evaluation complete. Manager signoff required to advance to HR.';
        mgrBannerBadge.className = 'badge bg-warning text-dark px-3 py-1.5 fw-bold';
        mgrBannerBadge.textContent = 'Ready for Manager Signoff';
        mgrSubmitBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Accept & Signoff as Manager (Forward to HR) &rarr;';
    } else {
        mgrBanner.className = 'alert alert-secondary d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        mgrBannerTitle.textContent = 'Stage 2 (TL Review) Still Incomplete';
        mgrBannerSub.textContent = 'Team Lead must submit Stage 2 evaluation before Manager signoff.';
        mgrBannerBadge.className = 'badge bg-secondary text-white px-3 py-1.5 fw-bold';
        mgrBannerBadge.textContent = 'Waiting on TL';
        mgrSubmitBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Accept & Signoff as Manager (Forward to HR) &rarr;';
    }

    // C. HR Department (Stage 4) Admin Desk
    document.getElementById('admHrEmpName').textContent = data.name;
    document.getElementById('admHrEmpMeta').textContent = ' (' + data.role + ' - ' + data.dept + ')';
    document.getElementById('admHrEmpScore').textContent = data.rating + ' / 5.0';
    document.getElementById('admHrEmpSummary').textContent = data.summary || 'N/A';
    document.getElementById('admHrTLScore').textContent = data.tlApproved ? ('TL Score: ' + data.tlRating + ' / 5.0') : 'Pending TL';
    document.getElementById('admHrTLFeedback').textContent = data.tlApproved ? data.tlFeedback : 'Awaiting TL review';
    document.getElementById('admHrMgrScore').textContent = data.mgrApproved ? ('Mgr Score: ' + data.mgrRating + ' / 5.0') : 'Pending Manager';
    document.getElementById('admHrMgrReply').textContent = data.mgrApproved ? ('"' + data.mgrReply + '"') : 'Awaiting Manager Signoff';

    var hrRatingSel = document.getElementById('admHrRating');
    if (hrRatingSel) {
        if (data.hrRating) hrRatingSel.value = data.hrRating;
        else hrRatingSel.value = data.mgrRating || data.tlRating || "4.8";
    }
    document.getElementById('admHrHike').value = data.hrHike || data.mgrHike || data.tlHike || '15%';
    document.getElementById('admHrPromo').value = data.hrPromo || data.tlPromo || ('Promoted to Lead ' + data.role);
    document.getElementById('admHrComments').value = data.hrComments || ('Performance verified with project stakeholders. Proposed increment aligns with annual merit budget.');

    var hrBanner = document.getElementById('admHrStatusBanner');
    var hrBannerTitle = document.getElementById('admHrBannerTitle');
    var hrBannerSub = document.getElementById('admHrBannerSub');
    var hrBannerBadge = document.getElementById('admHrBannerBadge');
    var hrSubmitBtn = document.getElementById('admHrSubmitBtn');

    if (data.hrApproved) {
        hrBanner.className = 'alert alert-success d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border-success';
        hrBannerTitle.textContent = 'HR Department Verification & Final Approval Complete';
        hrBannerSub.textContent = 'Appraisal cycle completed! Official Scorecard Certificate is active.';
        hrBannerBadge.className = 'badge text-white px-3 py-1.5 fw-bold';
        hrBannerBadge.style = 'background:#7c3aed;';
        hrBannerBadge.textContent = 'HR Approved';
        hrSubmitBtn.innerHTML = '<i class="bi bi-check-all me-1"></i> Update & Re-Approve HR Verification';
    } else if (data.mgrApproved) {
        hrBanner.className = 'alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        hrBannerTitle.textContent = 'Awaiting HR Verification & Final Approval';
        hrBannerSub.textContent = 'Manager signoff complete. HR approval required to complete appraisal.';
        hrBannerBadge.className = 'badge bg-warning text-dark px-3 py-1.5 fw-bold';
        hrBannerBadge.style = '';
        hrBannerBadge.textContent = 'Ready for HR Approval';
        hrSubmitBtn.innerHTML = '<i class="bi bi-shield-check me-1"></i> Confirm Final Approval as HR (Complete Appraisal) &rarr;';
    } else {
        hrBanner.className = 'alert alert-secondary d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        hrBannerTitle.textContent = 'Prior Stages Pending (Waiting for Manager)';
        hrBannerSub.textContent = 'Manager must sign off before HR final approval.';
        hrBannerBadge.className = 'badge bg-secondary text-white px-3 py-1.5 fw-bold';
        hrBannerBadge.style = '';
        hrBannerBadge.textContent = 'Waiting on Manager';
        hrSubmitBtn.innerHTML = '<i class="bi bi-shield-check me-1"></i> Confirm Final Approval as HR (Complete Appraisal) &rarr;';
    }

    // D. Scorecard Modal
    var modalScFinal = document.getElementById('modalScFinalScore');
    if (modalScFinal) modalScFinal.textContent = 'Final Score: ' + empFinalScore + ' / 5.0';

    document.getElementById('modalScEmpName').textContent = data.name;
    document.getElementById('modalScEmpRole').textContent = data.role;
    document.getElementById('modalScEmpDept').textContent = data.dept;
    document.getElementById('modalScScore1').textContent = data.rating ? (data.rating + ' / 5.0') : '--';
    document.getElementById('modalScScore2').textContent = data.tlApproved ? (data.tlRating + ' / 5.0') : '--';
    document.getElementById('modalScScore3').textContent = data.mgrApproved ? (data.mgrRating + ' / 5.0') : '--';
    document.getElementById('modalScScore4').textContent = data.hrApproved ? (data.hrRating + ' / 5.0') : '--';
    document.getElementById('modalScManagerReply').textContent = '"' + (data.mgrReply || 'Good! Outstanding performance.') + '"';
    document.getElementById('modalScHike').textContent = (data.hrHike || data.mgrHike || data.tlHike || '15%') + ' Annual Merit Hike';
    document.getElementById('modalScPromo').textContent = data.hrApproved ? (data.hrPromo || data.tlPromo || 'Promoted') : 'Pending HR Final Approval';

    // Update Quick Select Pills Highlight
    renderQuickEmpPills();

    // Update 5-Step Progress Stepper in Employee Portal
    updateEmployeeStepper(data);
}

// 4. Update 5-Step Stepper in Employee Portal
function updateEmployeeStepper(data) {
    // Stage 1 (Self)
    document.getElementById('empStep1').className = 'journey-step-item completed-pass' + (activeEmpStage === 1 ? ' selected-step' : '');
    document.getElementById('empSub1').textContent = 'Submitted (' + data.rating + '/5.0)';

    // Stage 2 (TL)
    if (data.tlApproved) {
        document.getElementById('empConn1').classList.add('active');
        document.getElementById('empStep2').className = 'journey-step-item completed-pass' + (activeEmpStage === 2 ? ' selected-step' : '');
        document.getElementById('empSub2').textContent = 'Approved (' + data.tlRating + '/5.0)';
        document.getElementById('empStage2ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage2PendingBox').classList.add('d-none');
    } else {
        document.getElementById('empConn1').classList.remove('active');
        document.getElementById('empStep2').className = 'journey-step-item active' + (activeEmpStage === 2 ? ' selected-step' : '');
        document.getElementById('empSub2').textContent = 'In TL Review';
        document.getElementById('empStage2ApprovedBox').classList.add('d-none');
        document.getElementById('empStage2PendingBox').classList.remove('d-none');
    }

    // Stage 3 (Manager)
    if (data.mgrApproved) {
        document.getElementById('empConn2').classList.add('active');
        document.getElementById('empStep3').className = 'journey-step-item completed-pass' + (activeEmpStage === 3 ? ' selected-step' : '');
        document.getElementById('empSub3').textContent = 'Signed Off (' + data.mgrRating + '/5.0)';
        document.getElementById('empStage3ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage3PendingBox').classList.add('d-none');
    } else {
        document.getElementById('empConn2').classList.remove('active');
        document.getElementById('empStep3').className = ('journey-step-item' + (data.tlApproved ? ' active' : '')) + (activeEmpStage === 3 ? ' selected-step' : '');
        document.getElementById('empSub3').textContent = data.tlApproved ? 'In Manager Review' : 'Waiting for TL';
        document.getElementById('empStage3ApprovedBox').classList.add('d-none');
        document.getElementById('empStage3PendingBox').classList.remove('d-none');
    }

    // Stage 4 (HR)
    if (data.hrApproved) {
        document.getElementById('empConn3').classList.add('active');
        document.getElementById('empStep4').className = 'journey-step-item completed-pass' + (activeEmpStage === 4 ? ' selected-step' : '');
        document.getElementById('empSub4').textContent = 'Approved & Verified';
        document.getElementById('empStage4ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage4PendingBox').classList.add('d-none');

        // Stage 5 (Scorecard)
        document.getElementById('empConn4').classList.add('active');
        document.getElementById('empStep5').className = 'journey-step-item completed-pass' + (activeEmpStage === 5 ? ' selected-step' : '');
        document.getElementById('empSub5').textContent = 'Scorecard Ready';
        document.getElementById('empStage5ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage5LockedBox').classList.add('d-none');

        document.getElementById('empPortalStatusPill').textContent = 'Appraisal Completed';
        document.getElementById('empPortalStatusPill').className = 'badge bg-success px-3 py-1.5 fw-bold';
    } else {
        document.getElementById('empConn3').classList.remove('active');
        document.getElementById('empConn4').classList.remove('active');
        document.getElementById('empStep4').className = ('journey-step-item' + (data.mgrApproved ? ' active' : '')) + (activeEmpStage === 4 ? ' selected-step' : '');
        document.getElementById('empSub4').textContent = data.mgrApproved ? 'Pending HR Approval' : 'Waiting for Manager';
        document.getElementById('empStage4ApprovedBox').classList.add('d-none');
        document.getElementById('empStage4PendingBox').classList.remove('d-none');

        document.getElementById('empStep5').className = 'journey-step-item' + (activeEmpStage === 5 ? ' selected-step' : '');
        document.getElementById('empSub5').textContent = 'Locked';
        document.getElementById('empStage5ApprovedBox').classList.add('d-none');
        document.getElementById('empStage5LockedBox').classList.remove('d-none');

        document.getElementById('empPortalStatusPill').textContent = 'In Progress';
        document.getElementById('empPortalStatusPill').className = 'badge bg-success-subtle text-success border border-success px-3 py-1.5 fw-bold';
    }
}

// 5. Employee Submits Form in Employee Portal
function submitEmpSelfReview() {
    var empId = document.getElementById('p1EmpId').value.trim() || ('EMP-' + Math.floor(1000 + Math.random() * 9000));
    var empName = document.getElementById('p1EmpName').value.trim() || 'New Employee';
    var empEmail = document.getElementById('p1EmpEmail').value.trim() || (empName.toLowerCase().replace(/\s+/g, '.') + '@gharuda.com');
    var empDept = document.getElementById('p1EmpDept').value || 'Engineering';
    var empRole = document.getElementById('p1EmpRole').value.trim() || 'Software Engineer';
    var empTL = document.getElementById('p1EmpTL').value.trim() || 'Rajesh V (Tech Lead)';
    var projects = document.getElementById('p1EmpProjects').value.trim();
    var tools = document.getElementById('p1EmpTools').value.trim();
    var summary = document.getElementById('p1EmpSummary').value.trim();
    var achievements = document.getElementById('p1EmpAchievements').value.trim();
    var rating = document.getElementById('p1EmpRating').value;
    var certs = document.getElementById('p1EmpCerts').value.trim();

    var key = currentEmpKey;
    if (!key || !employeeDatabase[key]) {
        // Create new employee record
        key = empName.toUpperCase().replace(/[^A-Z0-9]/g, '_');
        employeeDatabase[key] = {
            id: empId,
            name: empName,
            email: empEmail,
            dept: empDept,
            role: empRole,
            tl: empTL,
            cycleType: currentFrequencyFilter !== 'ALL' ? currentFrequencyFilter : 'Quarterly',
            cyclePeriod: currentPeriodFilter !== 'ALL' ? currentPeriodFilter : "Q3 (Oct-Dec '26)",
            projects: projects,
            tools: tools,
            summary: summary,
            achievements: achievements,
            rating: rating,
            certs: certs,
            tlApproved: false,
            tlRating: "4.6",
            tlHike: "15%",
            tlPromo: "Promoted to Senior " + empRole,
            tlFeedback: "Strong performance and good deliverables in current cycle.",
            mgrApproved: false,
            mgrRating: "4.6",
            mgrHike: "15%",
            mgrReply: "Good job!",
            hrApproved: false,
            hrRating: "4.6",
            hrHike: "15%",
            hrComments: "HR verification in progress."
        };
        currentEmpKey = key;
        populateEmployeeDropdowns(currentDeptFilter, key);
    } else {
        var data = employeeDatabase[key];
        data.id = empId;
        data.name = empName;
        data.email = empEmail;
        data.dept = empDept;
        data.role = empRole;
        data.tl = empTL;
        data.summary = summary;
        data.achievements = achievements;
        data.rating = rating;
        data.projects = projects;
        data.tools = tools;
        data.certs = certs;
    }

    showToastNotification('Submitted to Team Lead', 'Your self-appraisal for ' + empName + ' has been submitted and forwarded to ' + empTL + ' for Stage 2 review.');
    loadEmployeeData(key);
    renderMasterLedgerTable();
}

// 6. Admin Approvals
function processAdminTLApproval() {
    var data = employeeDatabase[currentEmpKey];
    data.tlApproved = true;
    data.tlRating = document.getElementById('admTlRating').value;
    data.tlHike = document.getElementById('admTlHike').value;
    data.tlPromo = document.getElementById('admTlPromo').value;
    data.tlFeedback = document.getElementById('admTlFeedback').value;

    showToastNotification('TL Approved: ' + data.name, 'Stage 2 approved with ' + data.tlRating + ' rating by Team Lead. Forwarded to Manager Hub.');
    loadEmployeeData(currentEmpKey);
    renderMasterLedgerTable();
    switchAdminSubtab('mgr');
}

function processAdminManagerSignoff() {
    var data = employeeDatabase[currentEmpKey];
    data.mgrApproved = true;
    data.mgrRating = document.getElementById('admMgrRating').value;
    data.mgrHike = document.getElementById('admMgrHike').value;
    data.mgrReply = document.getElementById('admMgrReply').value;

    showToastNotification('Manager Signed Off: ' + data.name, 'Stage 3 signed off by Manager with reply. Forwarded to HR Approval Hub.');
    loadEmployeeData(currentEmpKey);
    renderMasterLedgerTable();
    switchAdminSubtab('hr');
}

function processAdminHRApproval() {
    var data = employeeDatabase[currentEmpKey];
    data.hrApproved = true;
    data.hrRating = document.getElementById('admHrRating').value;
    data.hrHike = document.getElementById('admHrHike').value;
    data.hrPromo = document.getElementById('admHrPromo').value;
    data.hrComments = document.getElementById('admHrComments').value;

    showToastNotification('HR Approval Complete: ' + data.name, 'Appraisal fully completed! Scorecard Certificate published.');
    loadEmployeeData(currentEmpKey);
    renderMasterLedgerTable();
    switchAdminSubtab('all');
}

function setAdminMgrPreset(text) {
    document.getElementById('admMgrReply').value = text;
}

// 7. Master Ledger Table Renderer & KPI Stats Calculation
function renderMasterLedgerTable() {
    var tbodies = [
        document.getElementById('masterLedgerTableBody'),
        document.querySelector('#adminSubAll #masterLedgerTableBody')
    ];

    var searchVal = (document.getElementById('ledgerSearchInput') ? document.getElementById('ledgerSearchInput').value.toLowerCase().trim() : '');

    var allKeys = Object.keys(employeeDatabase);

    // Compute Global Status Counts for Pill Badges
    var countAll = 0;
    var countCompleted = 0;
    var countHr = 0;
    var countMgr = 0;
    var countTl = 0;

    allKeys.forEach(function(key) {
        var emp = employeeDatabase[key];
        
        // Match Department / Frequency / Period if selected
        if (currentDeptFilter && currentDeptFilter !== 'ALL' && currentDeptFilter !== '') {
            var d = (emp.dept || '').toLowerCase();
            var s = currentDeptFilter.toLowerCase();
            var deptMatches = false;
            if (s === 'design' && (d === 'design' || d === 'product design')) deptMatches = true;
            else if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) deptMatches = true;
            else if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) deptMatches = true;
            else if (d === s) deptMatches = true;
            if (!deptMatches) return;
        }

        if (currentFrequencyFilter && currentFrequencyFilter !== 'ALL') {
            if (emp.cycleType !== currentFrequencyFilter) return;
        }

        if (currentPeriodFilter && currentPeriodFilter !== 'ALL') {
            if (emp.cyclePeriod !== currentPeriodFilter) return;
        }

        countAll++;
        if (emp.hrApproved) {
            countCompleted++;
        } else if (emp.mgrApproved) {
            countHr++;
        } else if (emp.tlApproved) {
            countMgr++;
        } else {
            countTl++;
        }
    });

    // Update pill badge count labels
    var elCountAll = document.getElementById('countPillAll');
    if (elCountAll) elCountAll.textContent = countAll;
    var elCountComp = document.getElementById('countPillCompleted');
    if (elCountComp) elCountComp.textContent = countCompleted;
    var elCountHr = document.getElementById('countPillHr');
    if (elCountHr) elCountHr.textContent = countHr;
    var elCountMgr = document.getElementById('countPillMgr');
    if (elCountMgr) elCountMgr.textContent = countMgr;
    var elCountTl = document.getElementById('countPillTl');
    if (elCountTl) elCountTl.textContent = countTl;

    // Filter Keys for Table Rendering
    var filteredKeys = allKeys.filter(function(key) {
        var emp = employeeDatabase[key];
        
        // Department Filter
        if (currentDeptFilter && currentDeptFilter !== 'ALL' && currentDeptFilter !== '') {
            var d = (emp.dept || '').toLowerCase();
            var s = currentDeptFilter.toLowerCase();
            var deptMatches = false;
            if (s === 'design' && (d === 'design' || d === 'product design')) deptMatches = true;
            else if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) deptMatches = true;
            else if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) deptMatches = true;
            else if (d === s) deptMatches = true;

            if (!deptMatches) return false;
        }

        // Frequency Filter
        if (currentFrequencyFilter && currentFrequencyFilter !== 'ALL') {
            if (emp.cycleType !== currentFrequencyFilter) return false;
        }

        // Period Filter
        if (currentPeriodFilter && currentPeriodFilter !== 'ALL') {
            if (emp.cyclePeriod !== currentPeriodFilter) return false;
        }

        // Status Filter
        if (currentStatusFilter && currentStatusFilter !== 'ALL') {
            if (currentStatusFilter === 'COMPLETED' && !emp.hrApproved) return false;
            if (currentStatusFilter === 'PENDING_HR' && (!emp.mgrApproved || emp.hrApproved)) return false;
            if (currentStatusFilter === 'PENDING_MGR' && (!emp.tlApproved || emp.mgrApproved)) return false;
            if (currentStatusFilter === 'PENDING_TL' && emp.tlApproved) return false;
        }

        // Search Filter
        if (searchVal) {
            var combined = (emp.name + ' ' + emp.id + ' ' + emp.email + ' ' + emp.role + ' ' + emp.dept + ' ' + (emp.mgrHike || emp.hrHike || '') + ' ' + (emp.tlPromo || '')).toLowerCase();
            if (combined.indexOf(searchVal) === -1) return false;
        }

        return true;
    });

    // Update KPI Metric Cards
    var totalScoreSum = 0;
    var completedSum = 0;

    filteredKeys.forEach(function(k) {
        var e = employeeDatabase[k];
        if (e.hrApproved) completedSum++;
        totalScoreSum += parseFloat(e.hrApproved ? e.hrRating : (e.mgrApproved ? e.mgrRating : (e.tlApproved ? e.tlRating : e.rating)));
    });

    var avgRating = filteredKeys.length > 0 ? (totalScoreSum / filteredKeys.length).toFixed(2) : '0.00';

    var kpiTotal = document.getElementById('ledgerKpiTotal');
    if (kpiTotal) kpiTotal.textContent = filteredKeys.length + ' Employees';

    var kpiCompleted = document.getElementById('ledgerKpiCompleted');
    if (kpiCompleted) kpiCompleted.textContent = completedSum + ' Completed';

    var kpiPending = document.getElementById('ledgerKpiPending');
    if (kpiPending) kpiPending.textContent = (filteredKeys.length - completedSum) + ' In Progress';

    var kpiAvg = document.getElementById('ledgerKpiAvgRating');
    if (kpiAvg) kpiAvg.textContent = avgRating + ' / 5.0';

    var totalBadge = document.getElementById('ledgerTotalCountBadge');
    if (totalBadge) totalBadge.textContent = filteredKeys.length + ' Records';

    var filteredCountText = document.getElementById('ledgerFilteredCountText');
    if (filteredCountText) filteredCountText.textContent = filteredKeys.length + ' Records';

    // Generate Table Rows
    var html = '';
    filteredKeys.forEach(function(key) {
        var emp = employeeDatabase[key];
        var st = getEmployeeAppraisalStatus(emp);
        var isCurrent = (key === currentEmpKey);

        var actionBtn = '';
        if (emp.hrApproved) {
            actionBtn = `
                <button class="btn btn-outline-success btn-sm fw-bold shadow-none text-nowrap" onclick="openScorecardForEmp('${key}')">
                    <i class="bi bi-award-fill me-1"></i>Scorecard
                </button>
                <button class="btn btn-light btn-sm text-dark border fw-semibold shadow-none text-nowrap" onclick="loadEmployeeData('${key}'); switchMainPortal('employee');" title="View Full Employee Form">
                    <i class="bi bi-eye"></i>
                </button>
            `;
        } else if (emp.mgrApproved) {
            actionBtn = `
                <button class="btn btn-sm text-white fw-bold shadow-none text-nowrap" style="background:#7c3aed;" onclick="reviewEmployeeAs('${key}', 'hr')">
                    <i class="bi bi-shield-check me-1"></i>Review as HR
                </button>
            `;
        } else if (emp.tlApproved) {
            actionBtn = `
                <button class="btn btn-warning btn-sm text-dark fw-bold shadow-none text-nowrap" onclick="reviewEmployeeAs('${key}', 'mgr')">
                    <i class="bi bi-pen me-1"></i>Signoff as Mgr
                </button>
            `;
        } else {
            actionBtn = `
                <button class="btn btn-success btn-sm fw-bold shadow-none text-nowrap" onclick="reviewEmployeeAs('${key}', 'tl')">
                    <i class="bi bi-person-check me-1"></i>Review as TL
                </button>
            `;
        }

        var avatarInitial = emp.name.charAt(0).toUpperCase();

        // Frequency Badge styling
        var cycleBadgeClass = 'badge-cycle-quarterly';
        var cycleLabel = emp.cycleType || 'Quarterly';
        if (cycleLabel === 'Monthly') cycleBadgeClass = 'badge-cycle-monthly';
        else if (cycleLabel === 'Half-Yearly') cycleBadgeClass = 'badge-cycle-halfyearly';
        else if (cycleLabel === 'Annual') cycleBadgeClass = 'badge-cycle-annual';

        var finalRating = emp.hrApproved ? emp.hrRating : (emp.mgrApproved ? emp.mgrRating : (emp.tlApproved ? emp.tlRating : emp.rating));
        var scoreNum = parseFloat(finalRating);
        var scoreBadgeClass = 'bg-success-subtle text-success border border-success';
        var scoreBadgeText = 'Outstanding';
        if (scoreNum >= 4.9) {
            scoreBadgeClass = 'bg-success text-white';
            scoreBadgeText = '★ Top 5%';
        } else if (scoreNum >= 4.7) {
            scoreBadgeClass = 'bg-success-subtle text-success border border-success';
            scoreBadgeText = 'Exceeded Goals';
        } else if (scoreNum >= 4.4) {
            scoreBadgeClass = 'bg-primary-subtle text-primary border border-primary';
            scoreBadgeText = 'Strong Performer';
        } else {
            scoreBadgeClass = 'bg-light text-dark border';
            scoreBadgeText = 'Met Expectations';
        }

        var hikeVal = emp.hrHike || emp.mgrHike || emp.tlHike || '15%';
        var promoVal = emp.tlPromo || ('Lead ' + emp.role);

        html += `
            <tr class="${isCurrent ? 'table-success-subtle' : ''}">
                <td class="ps-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="position-relative flex-shrink-0">
                            <div class="rounded-circle ${emp.hrApproved ? 'bg-success' : 'bg-secondary'} text-white fw-bold d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:13px;">
                                ${avatarInitial}
                            </div>
                            ${emp.hrApproved ? '<span class="position-absolute bottom-0 end-0 p-1 bg-success border border-light rounded-circle" title="Appraisal Completed"></span>' : ''}
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-1.5">
                                <strong class="text-dark">${emp.name}</strong>
                                ${emp.hrApproved ? '<i class="bi bi-patch-check-fill text-success" title="Appraisal Awarded"></i>' : ''}
                            </div>
                            <div class="text-muted small" style="font-size:11.5px;">${emp.id} &bull; ${emp.email}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-bold text-dark" style="font-size:13px;">${emp.role}</div>
                    <div class="text-muted small mt-0.5"><span class="badge bg-light text-dark border">${emp.dept}</span></div>
                </td>
                <td>
                    <span class="badge ${cycleBadgeClass} px-2 py-0.5 fw-bold small text-nowrap mb-0.5">${cycleLabel}</span>
                    <div class="text-muted small fw-semibold" style="font-size:11px;">${emp.cyclePeriod || 'Q3 (Oct-Dec \'26)'}</div>
                </td>
                <td>
                    ${emp.hrApproved ? `
                        <span class="badge bg-success text-white px-2.5 py-1 fw-bold text-nowrap">
                            <i class="bi bi-award-fill me-1"></i>Appraisal Awarded
                        </span>
                        <div class="text-success small fw-semibold mt-0.5" style="font-size:10.5px;">
                            <i class="bi bi-check2-circle me-1"></i>Scorecard Issued
                        </div>
                    ` : `
                        <span class="badge ${st.subtleBadgeClass} px-2.5 py-1 fw-bold text-nowrap" style="${st.subtleStyle || ''}">${st.text}</span>
                    `}
                </td>
                <td>
                    <div class="d-flex align-items-center gap-1 mb-0.5">
                        <strong class="text-dark fs-6">${finalRating} / 5.0</strong>
                        <span class="badge ${scoreBadgeClass} px-1.5 py-0.5 fw-bold" style="font-size:10.5px;">${scoreBadgeText}</span>
                    </div>
                    <div class="text-muted small text-nowrap" style="font-size:11px;">
                        <span class="text-primary fw-bold" title="Employee Self">Emp: ${emp.rating}</span> &rarr;
                        <span class="${emp.tlApproved ? 'text-success fw-bold' : 'text-muted'}" title="Team Lead">TL: ${emp.tlApproved ? emp.tlRating : '--'}</span> &rarr;
                        <span class="${emp.mgrApproved ? 'text-warning fw-bold' : 'text-muted'}" title="Manager">Mgr: ${emp.mgrApproved ? emp.mgrRating : '--'}</span> &rarr;
                        <span style="${emp.hrApproved ? 'color:#7c3aed;font-weight:bold;' : 'color:#94a3b8;'}" title="HR">HR: ${emp.hrApproved ? emp.hrRating : '--'}</span>
                    </div>
                </td>
                <td>
                    <span class="badge bg-success text-white px-2 py-1 fw-bold fs-6">+${hikeVal} Hike</span>
                    <div class="fw-bold text-dark small mt-0.5 text-truncate" style="font-size:11.5px; max-width:160px;" title="${promoVal}">
                        <i class="bi bi-arrow-up-right-circle-fill text-success me-1"></i>${promoVal}
                    </div>
                    <div class="text-muted small" style="font-size:10px;">Effective: 01 Nov 2026</div>
                </td>
                <td>
                    ${emp.mgrApproved ? `
                        <div class="p-2 rounded bg-light border text-dark small fst-italic" style="font-size:11px; max-width:210px; line-height:1.35;" title="${emp.mgrReply}">
                            "${emp.mgrReply.substring(0, 48)}${emp.mgrReply.length > 48 ? '...' : ''}"
                        </div>
                    ` : `
                        <span class="text-muted small fst-italic">Pending manager review</span>
                    `}
                </td>
                <td class="text-end pe-3">
                    <div class="d-flex gap-1 justify-content-end align-items-center">
                        ${actionBtn}
                    </div>
                </td>
            </tr>
        `;
    });

    if (filteredKeys.length === 0) {
        html = `<tr><td colspan="8" class="text-center py-4 text-muted"><i class="bi bi-inbox fs-4 d-block mb-1 text-muted"></i>No employee appraisal records found matching selected filter criteria.</td></tr>`;
    }

    tbodies.forEach(function(tb) {
        if (tb) tb.innerHTML = html;
    });
}

// Jump directly to review a specific employee in a specific desk
function reviewEmployeeAs(key, desk) {
    loadEmployeeData(key);
    switchMainPortal('admin');
    switchAdminSubtab(desk);
    showToastNotification('Loaded ' + employeeDatabase[key].name, 'Switched to ' + capitalizeStr(desk) + ' Desk for appraisal evaluation.');
}

// Open Scorecard Certificate Modal directly for any employee
function openScorecardForEmp(key) {
    loadEmployeeData(key);
    new bootstrap.Modal(document.getElementById('scorecardCertificateModal')).show();
}

function openScorecardIfReady() {
    var data = employeeDatabase[currentEmpKey];
    if (data && data.hrApproved) {
        openScorecardForEmp(currentEmpKey);
    } else {
        showToastNotification('Scorecard Locked', 'The official scorecard certificate will unlock once the HR Department approves and completes the appraisal.');
    }
}

function openScorecardModalFromEmp() {
    loadEmployeeData(currentEmpKey);
    new bootstrap.Modal(document.getElementById('scorecardCertificateModal')).show();
}

function renderQuickEmpPills() {
    // Optional helper if quick pills exist
}

function showToastNotification(title, message) {
    var toast = document.createElement('div');
    toast.className = 'position-fixed bottom-0 end-0 p-3';
    toast.style.zIndex = '9999';
    toast.innerHTML = `
        <div class="toast show border-0 shadow-lg rounded-3" role="alert">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">${title}</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body bg-white text-dark small">
                ${message}
            </div>
        </div>
    `;
    document.body.appendChild(toast);
    setTimeout(function() { toast.remove(); }, 4000);
}
