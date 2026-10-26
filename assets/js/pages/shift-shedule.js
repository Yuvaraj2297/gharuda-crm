/**
 * Gharuda CRM - Shift Shedule Page Script
 * File: assets/js/pages/shift-shedule.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// ------------------------------------------------------------------
// Shift master (Enable shifts only are assignable — same records as
// shift.php; kept as its own array here so the page needs no
// server-side data, same convention as the rest of the project).
// ------------------------------------------------------------------
window.shiftScheduleShifts = [
    { id: 1, shift_name: 'General Shift', shift_code: 'GEN', start_time: '09:30', end_time: '18:30', status: 'Enable' },
    { id: 2, shift_name: 'Morning Shift', shift_code: 'MOR', start_time: '06:00', end_time: '14:00', status: 'Enable' },
    { id: 3, shift_name: 'Evening Shift', shift_code: 'EVE', start_time: '14:00', end_time: '22:00', status: 'Enable' },
    { id: 4, shift_name: 'Night Shift', shift_code: 'NGT', start_time: '22:00', end_time: '06:00', status: 'Enable' },
    { id: 5, shift_name: 'Weekend Support Shift', shift_code: 'WKD', start_time: '10:00', end_time: '19:00', status: 'Disable' },
];

// ------------------------------------------------------------------
// Employee model for this page:
// id, emp_id, name, role, sub_role, branch, avatar, gender,
// shifts -> { Sun..Sat: shift id from window.shiftScheduleShifts | null }
// gender is derived from MALE_NAMES further below.
// ------------------------------------------------------------------
window.shiftScheduleMonthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

window.shiftScheduleEmployees = [
    { id: 1,  emp_id: 41, name: 'Vijai',            role: 'Developer',      sub_role: 'OpenSource',     branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: 1, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 2,  emp_id: 40, name: 'Anbarasan',        role: 'Developer',      sub_role: 'OpenSource',     branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: 1, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 3,  emp_id: 39, name: 'Shailni Raj',      role: 'Branch Manager', sub_role: 'Branch Manager',branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: 1, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 4,  emp_id: 36, name: 'venkatesanB',      role: 'Developer',      sub_role: 'Windows',        branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: 1, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 5,  emp_id: 35, name: 'Bhuvaneswari',     role: 'Marketing',      sub_role: 'Marketing Executive',branch: 'Gharuda Infotech',  avatar: 'profile-1.jpg', shifts: {Sun: 2, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: 2 } },
    { id: 6,  emp_id: 34, name: 'Karthik Raja',     role: 'Developer',      sub_role: 'Backend',        branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: 1, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 7,  emp_id: 33, name: 'Priya Sharma',     role: 'Designer',       sub_role: 'UI/UX',          branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 8,  emp_id: 32, name: 'Mohammed Farhan',  role: 'Developer',      sub_role: 'Frontend',       branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 9,  emp_id: 31, name: 'Deepa Nair',       role: 'HR',             sub_role: 'Recruiter',      branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 10, emp_id: 30, name: 'Suresh Kumar',     role: 'Developer',      sub_role: 'DevOps',         branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 11, emp_id: 29, name: 'Lakshmi Devi',     role: 'Finance',        sub_role: 'Accountant',     branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 12, emp_id: 28, name: 'Arun Prakash',     role: 'Developer',      sub_role: 'Mobile',         branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 13, emp_id: 27, name: 'Nithya Selvi',     role: 'Marketing',      sub_role: 'Content Writer', branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 14, emp_id: 26, name: 'Rajesh Verma',     role: 'Developer',      sub_role: 'Full Stack',     branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 15, emp_id: 25, name: 'Divya Prakash',    role: 'HR',             sub_role: 'HR Manager',     branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 16, emp_id: 24, name: 'Vignesh T',        role: 'Developer',      sub_role: 'QA',             branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 17, emp_id: 23, name: 'Meena Kumari',     role: 'Admin',          sub_role: 'Office Admin',   branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 18, emp_id: 22, name: 'Senthil Nathan',   role: 'Developer',      sub_role: 'ML Engineer',    branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: 3 } },
    { id: 19, emp_id: 21, name: 'Harini R',         role: 'Designer',       sub_role: 'Graphic Design', branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 20, emp_id: 20, name: 'Kiran Patel',      role: 'Developer',      sub_role: 'Cloud',          branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 21, emp_id: 19, name: 'Swathi Reddy',     role: 'Marketing',      sub_role: 'Digital Marketing',branch: 'Gharuda Infotech',   avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 22, emp_id: 18, name: 'Mohan Raj',        role: 'Developer',      sub_role: 'Java',           branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 23, emp_id: 17, name: 'Anitha J',         role: 'Finance',        sub_role: 'Payroll Officer',branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 24, emp_id: 16, name: 'Prabhu K',         role: 'Developer',      sub_role: 'Python',         branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: 2 } },
    { id: 25, emp_id: 15, name: 'Revathi M',        role: 'HR',             sub_role: 'Payroll',        branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 26, emp_id: 14, name: 'Thirunavukkarasu',role: 'Developer',      sub_role: 'React',          branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 27, emp_id: 13, name: 'Kavitha B',        role: 'Admin',          sub_role: 'Facilities',     branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 28, emp_id: 12, name: 'Yuvaraj S',        role: 'Developer',      sub_role: 'Node.js',        branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 29, emp_id: 11, name: 'Sabari Ganesh',    role: 'Designer',       sub_role: 'Motion Design',  branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 30, emp_id: 10, name: 'Geetha Lakshmi',  role: 'Finance',        sub_role: 'Auditor',        branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 31, emp_id: 9,  name: 'Ravi Shankar',     role: 'Developer',      sub_role: 'Angular',        branch: 'Gharuda IT Park',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: 3 } },
    { id: 32, emp_id: 8,  name: 'Pooja Verma',      role: 'Marketing',      sub_role: 'SEO Specialist', branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 33, emp_id: 7,  name: 'Manikandan R',     role: 'Developer',      sub_role: 'Flutter',        branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 34, emp_id: 6,  name: 'Sunitha Devi',     role: 'HR',             sub_role: 'Training',       branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 35, emp_id: 5,  name: 'Balaji Venkat',    role: 'Developer',      sub_role: 'C++',            branch: 'Gharuda IT Park',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 36, emp_id: 4,  name: 'Aparna Rajan',     role: 'Designer',       sub_role: 'Product Design',branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 37, emp_id: 3,  name: 'Gokul Krishna',   role: 'Developer',      sub_role: 'Spring Boot',    branch: 'Gharuda IT Park',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 38, emp_id: 2,  name: 'Nandhini K',       role: 'Finance',        sub_role: 'Billing',        branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 39, emp_id: 1,  name: 'Dinesh Babu',      role: 'Developer',      sub_role: 'Django',         branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 40, emp_id: 50, name: 'Aishwarya R',      role: 'Developer',      sub_role: 'Vue.js',         branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 41, emp_id: 51, name: 'Saravanan M',      role: 'Developer',      sub_role: 'Go',             branch: 'Gharuda IT Park',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: 3 } },
    { id: 42, emp_id: 52, name: 'Fathima Begum',    role: 'HR',             sub_role: 'Onboarding',     branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 43, emp_id: 53, name: 'Prasanna Kumar',   role: 'Developer',      sub_role: 'Rust',           branch: 'Gharuda IT Park',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 44, emp_id: 54, name: 'Kanimozhi S',      role: 'Marketing',      sub_role: 'Social Media',  branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 45, emp_id: 55, name: 'Tharun S',         role: 'Developer',      sub_role: 'Kotlin',         branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: 1 } },
    { id: 46, emp_id: 56, name: 'Malathi Priya',    role: 'Finance',        sub_role: 'Billing',        branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 47, emp_id: 57, name: 'Karthikeyan P',    role: 'Developer',      sub_role: 'TypeScript',    branch: 'Gharuda IT Park',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: 2 } },
    { id: 48, emp_id: 58, name: 'Renuka Devi',      role: 'Admin',          sub_role: 'Receptionist',   branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 49, emp_id: 59, name: 'Aakash Singh',     role: 'Developer',      sub_role: 'iOS',            branch: 'Gharuda IT Park',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 50, emp_id: 60, name: 'Janani S',         role: 'Designer',       sub_role: 'Brand Design',  branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 51, emp_id: 61, name: 'Sanjay Raghavan',  role: 'Developer',      sub_role: 'Go',             branch: 'Gharuda IT Park',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 52, emp_id: 62, name: 'Preethi Sundar',   role: 'Developer',      sub_role: 'React',          branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 53, emp_id: 63, name: 'Naveen Kumar',     role: 'Developer',      sub_role: 'Backend',        branch: 'Gharuda IT Park',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 54, emp_id: 64, name: 'Lavanya Murali',   role: 'Developer',      sub_role: 'Frontend',       branch: 'Gharuda Infotech',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 55, emp_id: 65, name: 'Deepak Srinivasan',role: 'Developer',      sub_role: 'Python',         branch: 'Gharuda IT Park',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 56, emp_id: 66, name: 'Koushik Velu',     role: 'Developer',      sub_role: 'Node.js',        branch: 'Gharuda Infotech',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 57, emp_id: 67, name: 'Soundarya Natarajan',role: 'Developer',    sub_role: 'QA',             branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 58, emp_id: 68, name: 'Akash Mohan',      role: 'Developer',      sub_role: 'Full Stack',     branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 59, emp_id: 69, name: 'Gayathri Prakash', role: 'Designer',       sub_role: 'UI/UX',          branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 60, emp_id: 70, name: 'Madhan Raj',       role: 'Developer',      sub_role: 'Java',           branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 61, emp_id: 71, name: 'Yamuna Selvan',    role: 'Developer',      sub_role: 'Mobile',         branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 62, emp_id: 72, name: 'Vigneshwar Ravi',  role: 'Developer',      sub_role: 'Flutter',        branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 63, emp_id: 73, name: 'Keerthana Thangaraj',role: 'Developer',   sub_role: 'Spring Boot',    branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 64, emp_id: 74, name: 'Manoj Kumar S',    role: 'Developer',      sub_role: 'DevOps',         branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 65, emp_id: 75, name: 'Archana Balan',    role: 'Developer',      sub_role: 'Cloud',          branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 66, emp_id: 76, name: 'Hariharan K',      role: 'Developer',      sub_role: 'OpenSource',     branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 67, emp_id: 77, name: 'Pavithra Ramesh',  role: 'Developer',      sub_role: 'C++',            branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 68, emp_id: 78, name: 'Sudhakar Muthu',   role: 'Developer',      sub_role: 'TypeScript',     branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 69, emp_id: 79, name: 'Abinaya Vijay',    role: 'Developer',      sub_role: 'Django',         branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 70, emp_id: 80, name: 'Raghu Ram',        role: 'Developer',      sub_role: 'Kotlin',         branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 71, emp_id: 81, name: 'Shobana Devi',     role: 'Developer',      sub_role: 'Vue.js',         branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 72, emp_id: 82, name: 'Vasanth Kumar',    role: 'Developer',      sub_role: 'Rust',           branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 73, emp_id: 83, name: 'Dharani S',        role: 'Marketing',      sub_role: 'Content Writer', branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 74, emp_id: 84, name: 'Ganesh Moorthy',   role: 'Developer',      sub_role: 'Backend',        branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 75, emp_id: 85, name: 'Sandhya Rani',     role: 'HR',             sub_role: 'Recruiter',      branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 76, emp_id: 86, name: 'Kishore Chandran', role: 'Developer',      sub_role: 'Frontend',       branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 77, emp_id: 87, name: 'Bhavani Shankar',  role: 'Finance',        sub_role: 'Accountant',     branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 78, emp_id: 88, name: 'Jeeva Anand',      role: 'Developer',      sub_role: 'DevOps',         branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 79, emp_id: 89, name: 'Hemalatha K',      role: 'Developer',      sub_role: 'QA',             branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 80, emp_id: 90, name: 'Senthil Kumar V',  role: 'Developer',      sub_role: 'Full Stack',     branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 81, emp_id: 91, name: 'Indumathi R',      role: 'Designer',       sub_role: 'Graphic Design', branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 82, emp_id: 92, name: 'Aravind Swamy',    role: 'Developer',      sub_role: 'Cloud',          branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 83, emp_id: 93, name: 'Roopa Manoharan',  role: 'Marketing',      sub_role: 'Social Media',   branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 84, emp_id: 94, name: 'Dhanush Raja',     role: 'Developer',      sub_role: 'Mobile',         branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 85, emp_id: 95, name: 'Geethanjali S',    role: 'HR',             sub_role: 'Training',       branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 86, emp_id: 96, name: 'Vinoth Kannan',    role: 'Developer',      sub_role: 'Java',           branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 87, emp_id: 97, name: 'Madhuri Dixit',    role: 'Finance',        sub_role: 'Payroll Officer',branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 88, emp_id: 98, name: 'Surya Prakash',    role: 'Developer',      sub_role: 'Python',         branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 89, emp_id: 99, name: 'Kavya Madhavan',   role: 'Developer',      sub_role: 'React',          branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 90, emp_id: 100, name: 'Gowtham Raj',     role: 'Developer',      sub_role: 'Node.js',        branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 91, emp_id: 101, name: 'Vasantha Malli',  role: 'Admin',          sub_role: 'Office Admin',   branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 92, emp_id: 102, name: 'Sarath Kumar',    role: 'Developer',      sub_role: 'Flutter',        branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 93, emp_id: 103, name: 'Monisha Reddy',   role: 'Developer',      sub_role: 'UI/UX',          branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 94, emp_id: 104, name: 'Niranjan Jay',    role: 'Developer',      sub_role: 'Spring Boot',    branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 95, emp_id: 105, name: 'Deepika S',       role: 'Developer',      sub_role: 'OpenSource',     branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 96, emp_id: 106, name: 'Balakumaran T',   role: 'Developer',      sub_role: 'C++',            branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
    { id: 97, emp_id: 107, name: 'Suganya Devi',    role: 'Developer',      sub_role: 'Django',         branch: 'Gharuda Infotech',      avatar: 'profile-1.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 98, emp_id: 108, name: 'Vimal Nathan',    role: 'Developer',      sub_role: 'Vue.js',         branch: 'Gharuda IT Park',      avatar: 'profile-2.jpg', shifts: {Sun: null, Mon: 2, Tue: 2, Wed: 2, Thu: 2, Fri: 2, Sat: null } },
    { id: 99, emp_id: 109, name: 'Radha Krishnan',  role: 'Developer',      sub_role: 'Go',             branch: 'Gharuda Infotech',      avatar: 'profile-3.jpg', shifts: {Sun: null, Mon: 1, Tue: 1, Wed: 1, Thu: 1, Fri: 1, Sat: null } },
    { id: 100,emp_id: 110, name: 'Shiva Sankar',    role: 'Developer',      sub_role: 'Backend',        branch: 'Gharuda IT Park',      avatar: 'profile-4.jpg', shifts: {Sun: null, Mon: 3, Tue: 3, Wed: 3, Thu: 3, Fri: 3, Sat: null } },
];

// Assign gender based on name keywords
var MALE_NAMES = ['Vijai','Anbarasan','venkatesanB','Karthik Raja','Mohammed Farhan','Suresh Kumar','Arun Prakash','Rajesh Verma','Vignesh T','Senthil Nathan','Kiran Patel','Mohan Raj','Prabhu K','Thirunavukkarasu','Yuvaraj S','Ravi Shankar','Manikandan R','Balaji Venkat','Gokul Krishna','Dinesh Babu','Saravanan M','Prasanna Kumar','Tharun S','Karthikeyan P','Aakash Singh','Sabari Ganesh','Sanjay Raghavan','Naveen Kumar','Deepak Srinivasan','Koushik Velu','Akash Mohan','Madhan Raj','Vigneshwar Ravi','Manoj Kumar S','Hariharan K','Sudhakar Muthu','Raghu Ram','Vasanth Kumar','Ganesh Moorthy','Kishore Chandran','Jeeva Anand','Senthil Kumar V','Aravind Swamy','Dhanush Raja','Vinoth Kannan','Surya Prakash','Gowtham Raj','Sarath Kumar','Niranjan Jay','Balakumaran T','Vimal Nathan','Radha Krishnan','Shiva Sankar'];
window.shiftScheduleEmployees.forEach(function (emp) {
    emp.gender = MALE_NAMES.indexOf(emp.name) !== -1 ? 'Male' : 'Female';
});

/* ------------------------------------------------------------------
   Static option lists
   ------------------------------------------------------------------
   The page carries its own data (no server-side rendering), so the
   three data-driven <select>s are filled from the arrays above once
   the markup exists.
------------------------------------------------------------------ */
var shiftScheduleSelectsFilled = false;

function fillShiftScheduleSelects() {
    if (shiftScheduleSelectsFilled) return;
    shiftScheduleSelectsFilled = true;

    var shifts = window.shiftScheduleShifts || [];

    /* Filter bar — shift list, keeping the "Not Assigned" option last */
    var filterShift = document.getElementById('filterShift');
    if (filterShift) {
        var notAssigned = filterShift.querySelector('option[value="unassigned"]');
        shifts.forEach(function (s) {
            var opt = document.createElement('option');
            opt.value = s.id;
            opt.textContent = s.shift_name;
            filterShift.insertBefore(opt, notAssigned);
        });
    }

    /* Monthly view — month list with the current month pre-selected */
    var monthSelector = document.getElementById('monthSelector');
    if (monthSelector) {
        window.shiftScheduleMonthNames.forEach(function (name, i) {
            var opt = document.createElement('option');
            opt.value = i + 1;
            opt.textContent = name;
            monthSelector.appendChild(opt);
        });
        monthSelector.value = new Date().getMonth() + 1;
    }

    /* Assign Shift modal — enabled shifts only, with their timing on the option */
    var singleShiftSelect = document.getElementById('asfSingleShiftSelect');
    if (singleShiftSelect) {
        shifts.filter(function (s) {
            return s.status === 'Enable';
        }).forEach(function (s) {
            var opt = document.createElement('option');
            opt.value = s.id;
            opt.setAttribute('data-start', s.start_time);
            opt.setAttribute('data-end', s.end_time);
            opt.textContent = s.shift_name + ' (' + s.shift_code + ')';
            singleShiftSelect.appendChild(opt);
        });
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', fillShiftScheduleSelects);
} else {
    fillShiftScheduleSelects();
}

/* ==========================================================================
   Script Block 2
   ========================================================================== */
/* =========================================================================
   Select2 for every <select> on this page
   -------------------------------------------------------------------------
   • #showEntries carries the `select2` class, so the global init in
     footer.php styles it like the other page-level dropdowns.
   • The selects inside #assignShiftModal and #shiftScheduleConfigModal are
     initialised when their modal opens, with dropdownParent set to the
     modal: without it the dropdown (z-index 1051) would render behind the
     Bootstrap modal (z-index 1055).
   • select2 only fires jQuery's 'change'; native addEventListener('change')
     handlers on the underlying <select> never run (verified against this
     project's select2 build). The bridge below re-dispatches a real DOM
     change event, so both styles of handler keep working.
   • Selects whose <option>s are rebuilt by JS are re-synced via
     `change.select2` so the displayed text does not go stale.
========================================================================= */
(function () {
    if (!window.jQuery || !jQuery.fn || !jQuery.fn.select2) return;

    var MODAL_SELECTS = '#assignShiftModal select, #shiftScheduleConfigModal select';
    var DYNAMIC_SELECTS = '.asf-batch-shift-select, .ssm-shift-select';

    function ghSelect2(el) {
        var $el = jQuery(el);
        if (!$el.length || $el.hasClass('gh-skip-select2')) return;

        /* native-change bridge — bound once per element */
        if (!$el.data('ghS2Bridge')) {
            $el.data('ghS2Bridge', true);
            $el.on('select2:select select2:unselect', function () {
                this.dispatchEvent(new Event('change', { bubbles: true }));
            });
        }

        if ($el.data('select2')) {
            /* already initialised: just refresh after an option rebuild */
            $el.trigger('change.select2');
            return;
        }

        /* hidden modal → initialise later from shown.bs.modal */
        if (!$el.is(':visible')) return;

        var $modal = $el.closest('.modal');
        $el.select2({
            width: '100%',
            minimumResultsForSearch: Infinity,
            dropdownParent: $modal.length ? $modal : jQuery(document.body)
        });
    }
    window.ghSelect2 = ghSelect2;

    function ghSelect2Apply(root) {
        jQuery(root || document)
            .find(MODAL_SELECTS + ', #showEntries')
            .each(function () {
                ghSelect2(this);
            });
    }
    window.ghSelect2Apply = ghSelect2Apply;

    jQuery(function () {
        ghSelect2(document.getElementById('showEntries'));

        jQuery(document).on(
            'shown.bs.modal',
            '#assignShiftModal, #shiftScheduleConfigModal',
            function () {
                ghSelect2Apply(this);
            }
        );

        /* Some selects start hidden inside the modals (mode/step panels) and
           are only revealed by these controls — re-apply once they are on screen. */
        jQuery(document).on(
            'click',
            '.asf-step-item, #asfNextStepBtn, #asfPrevStepBtn, #asfModeSplitPill, #asfModeSinglePill, #ssmModeRotationBtn, #ssmModeFixedBtn',
            function () {
                window.setTimeout(function () { ghSelect2Apply(document); }, 0);
            }
        );

        /* batch selects are injected by JS after load — watch the modal
           contents only, so table re-renders elsewhere stay cheap. */
        if (window.MutationObserver) {
            var onSelectsAdded = function (mutations) {
                mutations.forEach(function (m) {
                    Array.prototype.forEach.call(m.addedNodes, function (node) {
                        if (!node || node.nodeType !== 1) return;
                        if (node.matches && node.matches(DYNAMIC_SELECTS)) ghSelect2(node);
                        if (node.querySelectorAll) {
                            node.querySelectorAll(DYNAMIC_SELECTS).forEach(function (sel) {
                                ghSelect2(sel);
                            });
                        }
                    });
                });
            };
            ['assignShiftModal', 'shiftScheduleConfigModal'].forEach(function (id) {
                var host = document.getElementById(id);
                if (host) {
                    new MutationObserver(onSelectsAdded).observe(host, { childList: true, subtree: true });
                }
            });
        }
    });
})();

/* ==========================================================================
   Script Block 3
   ========================================================================== */
(function() {
        'use strict';

        var shiftsById = {};
        (Array.isArray(window.shiftScheduleShifts) ? window.shiftScheduleShifts : []).forEach(function(s) {
            shiftsById[s.id] = s;
        });

        var employees = Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees.slice() : [];
        /* Assign shift_type for demo: ~80% regular, ~20% overtime */
        employees.forEach(function(emp, idx) {
            emp.shift_type = (idx % 5 === 0) ? 'overtime' : 'regular';
        });

        /* ---- Stats summary cards ---- */
        (function computeStats() {
            var total = employees.length;
            var boys = 0, girls = 0;
            var deptMap = {};
            employees.forEach(function(emp) {
                if (emp.gender === 'Male') boys++;
                else girls++;
                if (!deptMap[emp.role]) deptMap[emp.role] = 0;
                deptMap[emp.role]++;
            });
            var elTotal = document.getElementById('statTotal');
            if (elTotal) elTotal.textContent = total;
            var elBoys = document.getElementById('statBoys');
            if (elBoys) elBoys.textContent = boys;
            var elGirls = document.getElementById('statGirls');
            if (elGirls) elGirls.textContent = girls;
            var elDept = document.getElementById('statDeptCount');
            if (elDept) elDept.textContent = Object.keys(deptMap).length;
        })();

        /* Click Total / Boys / Girls cards -> filter table by gender */
        var activeGenderCard = null;
        var genderClasses = { 'all': 'active-all', 'Male': 'active-male', 'Female': 'active-female' };
        function clearGenderCardStyles() {
            document.querySelectorAll('.stat-gender-card').forEach(function(c) {
                c.classList.remove('active-all', 'active-male', 'active-female');
            });
        }
        function applyGenderCardActive(card) {
            clearGenderCardStyles();
            if (card) card.classList.add(genderClasses[card.dataset.filter]);
        }
        document.querySelectorAll('.stat-gender-card').forEach(function(card) {
            card.addEventListener('click', function() {
                var filterVal = card.dataset.filter; // 'all', 'Male', or 'Female'
                if (activeGenderCard === card) {
                    activeGenderCard = null;
                    clearGenderCardStyles();
                    activeFilters.genderFilter = '';
                } else {
                    activeGenderCard = card;
                    applyGenderCardActive(card);
                    activeFilters.genderFilter = filterVal === 'all' ? '' : filterVal;
                }
                /* Clear dept card active when gender card is selected */
                activeDeptCards.clear();
                syncDeptCardStyles();
                document.getElementById('filterDepartment').value = '';
                currentPage = 1;
                renderTable();
            });
        });

        /* Click Departments card -> toggle dept breakdown section */
        var deptCard = document.getElementById('statDeptCard');
        var deptSection = document.getElementById('deptBreakdownSection');
        var closeDeptBtn = document.getElementById('closeDeptBreakdown');
        var deptBreakdownVisible = false;

        function buildDeptBreakdown() {
            var deptMap = {};
            var deptColors = ['#4f46e5','#0ea5e9','#10b981','#f59e0b','#ef4444','#8b5cf6','#ec4899','#06b6d4'];
            var deptIcons = ['bi-code-slash','bi-graph-up-arrow','bi-palette','bi-people','bi-calculator','bi-shield-check','bi-megaphone','bi-tools'];
            employees.forEach(function(emp) {
                if (!deptMap[emp.role]) deptMap[emp.role] = 0;
                deptMap[emp.role]++;
            });
            var el = document.getElementById('deptBreakdown');
            if (!el) return;
            var html = '';
            var idx = 0;
            Object.keys(deptMap).sort().forEach(function(dept) {
                var count = deptMap[dept];
                var icon = deptIcons[idx % deptIcons.length];
                html += '<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">';
                html += '<div class="dept-stat-card ssh-dept-stat-card" data-dept="' + dept + '">';
                html += '<div class="ssh-dept-stat-ico ssh-dcol-' + ((idx % deptColors.length) + 1) + '"><i class="bi ' + icon + '"></i></div>';
                html += '<div>';
                html += '<div class="ssh-dept-stat-name">' + dept + '</div>';
                html += '<div class="ssh-dept-stat-count">' + count + '</div>';
                html += '</div></div></div>';
                idx++;
            });
            el.innerHTML = html;
        }

        if (deptCard) {
            deptCard.addEventListener('click', function() {
                /* Clear gender card active when Departments card is clicked */
                activeGenderCard = null;
                clearGenderCardStyles();
                activeFilters.genderFilter = '';
                deptBreakdownVisible = !deptBreakdownVisible;
                if (deptBreakdownVisible) {
                    buildDeptBreakdown();
                    deptSection.classList.remove('ssh-hidden');
                    deptCard.classList.add('ssh-dept-active');
                } else {
                    deptSection.classList.add('ssh-hidden');
                    deptCard.classList.remove('ssh-dept-active');
                }
                currentPage = 1;
                renderTable();
            });
        }
        if (closeDeptBtn) {
            closeDeptBtn.addEventListener('click', function() {
                deptBreakdownVisible = false;
                deptSection.classList.add('ssh-hidden');
                deptCard.classList.remove('ssh-dept-active');
            });
        }

        /* Click handler for dept breakdown cards -> multi-select filter */
        var activeDeptCards = new Set();
        function getDeptCardColor(card) {
            var map = { 'Admin':'#4f46e5','Branch Manager':'#0ea5e9','Designer':'#10b981','Developer':'#f59e0b','Finance':'#ef4444','HR':'#8b5cf6','Marketing':'#ec4899' };
            return map[card.dataset.dept] || '#4f46e5';
        }
        /* Same palette as classes — replaces the runtime border/background inline writes */
        function getDeptCardColorClass(card) {
            var map = { 'Admin':'ssh-dcard-admin','Branch Manager':'ssh-dcard-branch','Designer':'ssh-dcard-designer','Developer':'ssh-dcard-developer','Finance':'ssh-dcard-finance','HR':'ssh-dcard-hr','Marketing':'ssh-dcard-marketing' };
            return map[card.dataset.dept] || 'ssh-dcard-admin';
        }
        function syncDeptCardStyles() {
            document.querySelectorAll('.dept-stat-card').forEach(function(c) {
                if (activeDeptCards.has(c.dataset.dept)) {
                    c.classList.add(getDeptCardColorClass(c));
                    c.classList.add('ssh-scaled');
                } else {
                    c.classList.remove(getDeptCardColorClass(c));
                    c.classList.remove('ssh-scaled');
                }
            });
        }
        document.getElementById('deptBreakdown').addEventListener('click', function(e) {
            var card = e.target.closest('.dept-stat-card');
            if (!card) return;
            var dept = card.dataset.dept;
            var bBar = document.getElementById('bulkActionBar');
            var bCount = document.getElementById('bulkCount');
            if (activeDeptCards.has(dept)) {
                activeDeptCards.delete(dept);
            } else {
                activeDeptCards.add(dept);
            }
            syncDeptCardStyles();
            /* Clear gender card active when dept is selected */
            activeGenderCard = null;
            clearGenderCardStyles();
            activeFilters.genderFilter = '';
            /* Update bulk bar */
            if (activeDeptCards.size > 0) {
                var deptCount = employees.filter(function(emp) { return activeDeptCards.has(emp.role); }).length;
                if (bCount) bCount.textContent = deptCount;
                if (bBar) bBar.classList.add('show');
            } else {
                if (bBar) bBar.classList.remove('show');
            }
            currentPage = 1;
            renderTable();
        });

        var tbody = document.getElementById('pgBody');
        var showSelect = document.getElementById('showEntries');
        var pgList = document.getElementById('pgList');
        var pgStart = document.getElementById('pgStart');
        var pgEnd = document.getElementById('pgEnd');
        var pgTotal = document.getElementById('pgTotal');
        var selectAllRows = document.getElementById('selectAllRows');

        var bulkBar = document.getElementById('bulkActionBar');
        var bulkCount = document.getElementById('bulkCount');
        var bulkAssignBtn = document.getElementById('bulkAssignBtn');
        var bulkClearBtn = document.getElementById('bulkClearBtn');
        var assignShiftTopBtn = document.getElementById('assignShiftTopBtn');

        var assignModalEl = document.getElementById('assignShiftModal');
        var assignModal = assignModalEl ? bootstrap.Modal.getOrCreateInstance(assignModalEl) : null;

        var currentPage = 1;
        var selectedIds = new Set();
        var assignTargets = [];

        /* fillAssignmentOptions removed — Assign To & Shift Type removed from modal */
        function fillAssignmentOptions_old() {
            var departments = Array.from(new Set(employees.map(function(emp) { return emp.role; }))).sort();
            var positions = Array.from(new Set(employees.map(function(emp) { return emp.sub_role; }))).sort();
            assignDepartment.innerHTML = '<option value="">Select department</option>' + departments.map(function(value) { return '<option value="' + escapeHtml(value) + '">' + escapeHtml(value) + '</option>'; }).join('');
            assignPosition.innerHTML = '<option value="">Select position</option>' + positions.map(function(value) { return '<option value="' + escapeHtml(value) + '">' + escapeHtml(value) + '</option>'; }).join('');
            if (window.jQuery) {
                jQuery('#assign_department, #assign_position').trigger('change.select2');
            }
        }

        function resolveAssignmentTargets() {
            var scope = assignScope.value;
            if (scope === 'department') {
                return employees.filter(function(emp) { return emp.role === assignDepartment.value; }).map(function(emp) { return emp.id; });
            }
            if (scope === 'position') {
                return employees.filter(function(emp) { return emp.sub_role === assignPosition.value; }).map(function(emp) { return emp.id; });
            }
            return assignTargets;
        }

        function updateAssignmentScope() {
            var scope = assignScope.value;
            assignDepartmentWrap.classList.toggle('ssh-hidden', scope !== 'department');
            assignPositionWrap.classList.toggle('ssh-hidden', scope !== 'position');
            assignTargets = resolveAssignmentTargets();
            document.getElementById('assignSelectedCount').textContent = String(assignTargets.length);
            document.getElementById('assignSelectedList').innerHTML = assignTargets.slice(0, 20).map(function(id) {
                var emp = employees.find(function(e) { return e.id === id; });
                return emp ? '<span class="assign-emp-chip"><img src="./assets/img/' + escapeHtml(emp.avatar) + '" alt="">' + escapeHtml(emp.name) + '</span>' : '';
            }).join('') + (assignTargets.length > 20 ? '<span class="small text-muted">+' + (assignTargets.length - 20) + ' more</span>' : '');
        }

        function updateShiftType() { /* removed */ }

        // fillAssignmentOptions, event listeners removed

        // ---------------- helpers ----------------

        function formatDateObj(date) {
            var day = String(date.getDate()).padStart(2, '0');
            var month = String(date.getMonth() + 1).padStart(2, '0');
            var year = date.getFullYear();
            return day + '-' + month + '-' + year;
        }

        function parseDDMMYYYY(str) {
            var parts = (str || '').split('-');
            if (parts.length !== 3) return null;
            var d = new Date(parseInt(parts[2], 10), parseInt(parts[1], 10) - 1, parseInt(parts[0], 10));
            return isNaN(d.getTime()) ? null : d;
        }

        // Returns date normalized to anchorDay (0=Sun, 1=Mon, ..., 3=Wed)
        function getAnchorDateFor(dateObj, anchorDay) {
            if (typeof anchorDay !== 'number' || isNaN(anchorDay)) anchorDay = 3; // default Wednesday
            var d = new Date(dateObj.getFullYear(), dateObj.getMonth(), dateObj.getDate());
            d.setHours(0, 0, 0, 0);
            var day = d.getDay();
            var diff = (day - anchorDay + 7) % 7;
            d.setDate(d.getDate() - diff);
            return d;
        }

        // Computes current Wednesday to next Wednesday 7-day range
        function computeWedToWedRange() {
            var now = new Date();
            var start = getAnchorDateFor(now, 3); // current week's Wednesday
            var end = new Date(start);
            end.setDate(end.getDate() + 7); // next Wednesday
            return {
                from: start,
                to: end
            };
        }

        function escapeHtml(value) {
            var div = document.createElement('div');
            div.appendChild(document.createTextNode(String(value)));
            return div.innerHTML;
        }

        function formatTime12(time24) {
            if (!time24) return '-';
            var parts = time24.split(':');
            var h = parseInt(parts[0], 10);
            var m = parts[1] || '00';
            var suffix = h >= 12 ? 'PM' : 'AM';
            var h12 = h % 12;
            if (h12 === 0) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + m + ' ' + suffix;
        }

        function shiftTiming(shift) {
            if (!shift) return '-';
            return formatTime12(shift.start_time) + ' – ' + formatTime12(shift.end_time);
        }

        // ---------------- Filters card (Apply / Clear / chips) ----------------
        // Filtering is "apply-committed": typing/selecting in the fields does NOT
        // touch the table until "Apply Filters" is clicked — same UX as
        // attendance-report.php. activeFilters holds the last-applied values.

        var activeFilters = {
            search: '',
            shiftId: '', // '', 'unassigned', or a shift id (string)
            shiftType: '', // '', 'regular', 'overtime'
            department: '',
            position: '',
            genderFilter: '', // '', 'Male', 'Female'
            scheduleType: '', // '', 'permanent', 'week', 'month', 'custom'
            dateFrom: null, // Date or null
            dateTo: null
        };

        var filterFields = [{
                id: 'filterSearch',
                label: 'Search',
                type: 'text'
            },
            {
                id: 'filterShift',
                label: 'Shift Name',
                type: 'select',
                empty: ''
            },
            {
                id: 'filterShiftType',
                label: 'Shift Type',
                type: 'select',
                empty: ''
            },
            {
                id: 'filterDepartment',
                label: 'Department',
                type: 'select',
                empty: ''
            },
            {
                id: 'filterPosition',
                label: 'Position',
                type: 'select',
                empty: ''
            },
            {
                id: 'filterScheduleType',
                label: 'Schedule Type',
                type: 'select',
                empty: ''
            }
        ];

        var toggleFiltersBtn = document.getElementById('toggleFiltersBtn');
        var filtersCollapse = document.getElementById('filtersCollapse');
        var filtersBar = document.getElementById('activeFiltersBar');
        var filtersList = document.getElementById('activeFiltersList');
        var applyFiltersBtn = document.getElementById('applyFiltersBtn');
        var clearFiltersBtn = document.getElementById('clearFiltersBtn');
        var activeFiltersClearAll = document.getElementById('activeFiltersClearAll');

        if (toggleFiltersBtn && filtersCollapse) {
            toggleFiltersBtn.addEventListener('click', function() {
                var willOpen = !filtersCollapse.classList.contains('open');
                if (!willOpen) filtersCollapse.classList.remove('ssh-ov-visible');
                var isOpen = filtersCollapse.classList.toggle('open');
                toggleFiltersBtn.classList.toggle('open', isOpen);
                var span = toggleFiltersBtn.querySelector('span');
                if (span) span.textContent = isOpen ? 'Hide Filters' : 'Filters';
            });

            filtersCollapse.addEventListener('transitionend', function(e) {
                if (e.propertyName !== 'max-height') return;
                if (filtersCollapse.classList.contains('open')) filtersCollapse.classList.add('ssh-ov-visible');
            });
        }

        function resetFilterField(field) {
            var el = document.getElementById(field.id);
            if (!el) return;
            el.value = field.type === 'select' ? field.empty : '';
        }

        function fieldDisplayValue(field, el) {
            if (field.type === 'select' && el.tagName === 'SELECT') {
                var opt = el.options[el.selectedIndex];
                return opt ? opt.textContent : el.value;
            }
            return el.value;
        }

        function buildChip(field, displayValue, delayIndex) {
            var chip = document.createElement('span');
            chip.className = 'filter-chip';
            chip.style.animationDelay = (delayIndex * 60) + 'ms';
            chip.dataset.fieldId = field.id;

            var keySpan = document.createElement('span');
            keySpan.className = 'chip-key';
            keySpan.textContent = field.label + ':';

            var valSpan = document.createElement('span');
            valSpan.textContent = displayValue;

            var closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.className = 'chip-close';
            closeBtn.innerHTML = '&times;';
            closeBtn.addEventListener('click', function() {
                removeChip(chip, field);
            });

            chip.appendChild(keySpan);
            chip.appendChild(valSpan);
            chip.appendChild(closeBtn);
            return chip;
        }

        function removeChip(chip, field) {
            chip.classList.add('removing');
            resetFilterField(field);
            setTimeout(function() {
                if (chip) chip.remove();
                if (filtersList && !filtersList.children.length) hideFiltersBar();
                commitFiltersFromFields();
                currentPage = 1;
                renderTable();
            }, 220);
        }

        function showFiltersBar() {
            if (filtersBar) filtersBar.classList.add('show');
        }

        function hideFiltersBar() {
            if (filtersBar) filtersBar.classList.remove('show');
        }

        // reads the current DOM field values into activeFilters (used after Apply
        // and after an individual chip is removed)
        function commitFiltersFromFields() {
            var searchEl = document.getElementById('filterSearch');
            var shiftEl = document.getElementById('filterShift');
            var shiftTypeEl = document.getElementById('filterShiftType');
            var deptEl = document.getElementById('filterDepartment');
            var posEl = document.getElementById('filterPosition');
            var typeEl = document.getElementById('filterScheduleType');

            activeFilters.search = searchEl ? searchEl.value.trim().toLowerCase() : '';
            activeFilters.shiftId = shiftEl ? shiftEl.value : '';
            activeFilters.shiftType = shiftTypeEl ? shiftTypeEl.value : '';
            activeFilters.department = deptEl ? deptEl.value : '';
            activeFilters.position = posEl ? posEl.value : '';
            activeFilters.scheduleType = typeEl ? typeEl.value : '';
        }

        function applyFilters() {
            if (!filtersList) return;
            commitFiltersFromFields();

            filtersList.innerHTML = '';
            var count = 0;

            filterFields.forEach(function(field) {
                var el = document.getElementById(field.id);
                if (!el) return;
                var raw = el.value.trim();
                var isEmpty = field.type === 'select' ?
                    (raw === '' || raw === field.empty) :
                    (raw === '');

                if (!isEmpty) {
                    var chip = buildChip(field, fieldDisplayValue(field, el), count);
                    filtersList.appendChild(chip);
                    count++;
                }
            });

            if (count > 0) showFiltersBar();
            else hideFiltersBar();

            currentPage = 1;
            renderTable();
        }

        function clearFilters() {
            filterFields.forEach(resetFilterField);
            if (filtersList) filtersList.innerHTML = '';
            hideFiltersBar();
            activeDeptCards.clear();
            syncDeptCardStyles();
            if (deptSection) deptSection.classList.add('ssh-hidden');
            deptBreakdownVisible = false;
            if (deptCard) deptCard.classList.remove('ssh-dept-active');
            if (bulkBar) bulkBar.classList.remove('show');

            activeFilters = {
                search: '',
                shiftId: '',
                shiftType: '',
                department: '',
                position: '',
                genderFilter: '',
                scheduleType: '',
                dateFrom: null,
                dateTo: null
            };
            clearGenderCardStyles();
            activeGenderCard = null;
            currentPage = 1;
            renderTable();
        }

        if (applyFiltersBtn) applyFiltersBtn.addEventListener('click', applyFilters);
        if (clearFiltersBtn) clearFiltersBtn.addEventListener('click', clearFilters);
        if (activeFiltersClearAll) activeFiltersClearAll.addEventListener('click', clearFilters);

        // ---------------- filtering (table data) ----------------

        function scheduleWindowOverlaps(emp, from, to) {
            if (!emp.shift_id || !emp.effective_from) return false;
            var effStart = parseDDMMYYYY(emp.effective_from);
            var effEnd = emp.effective_to ? parseDDMMYYYY(emp.effective_to) : null; // null = open-ended (permanent)
            if (!effStart) return false;

            if (from && effEnd && effEnd < from) return false;
            if (to && effStart > to) return false;
            return true;
        }

        function getFilteredRows() {
            return employees.filter(function(emp) {
                if (activeFilters.shiftId && activeFilters.shiftId !== 'unassigned') {
                    var hasShift = emp.shifts && Object.values(emp.shifts).some(function(id) {
                        return String(id) === String(activeFilters.shiftId);
                    });
                    if (!hasShift) return false;
                }
                if (activeFilters.shiftId === 'unassigned') {
                    var anyShift = emp.shifts && Object.values(emp.shifts).some(function(id) {
                        return id !== null;
                    });
                    if (anyShift) return false;
                }

                if (activeFilters.shiftType && emp.shift_type !== activeFilters.shiftType) return false;

                if (activeFilters.department && emp.role !== activeFilters.department) return false;
                if (activeDeptCards.size > 0 && !activeDeptCards.has(emp.role)) return false;

                if (activeFilters.position && emp.sub_role !== activeFilters.position) return false;

                if (activeFilters.genderFilter && emp.gender !== activeFilters.genderFilter) return false;

                if (activeFilters.scheduleType && emp.schedule_type !== activeFilters.scheduleType) return false;

                if (activeFilters.search) {
                    var q = activeFilters.search;
                    var matches = (
                        String(emp.emp_id).includes(q) ||
                        emp.name.toLowerCase().includes(q) ||
                        emp.role.toLowerCase().includes(q) ||
                        emp.branch.toLowerCase().includes(q)
                    );
                    if (!matches) return false;
                }

                return true;
            });
        }

        // ---------------- row rendering ----------------

        var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        var currentView = 'weekly'; // 'weekly' | 'monthly'
        var currentWeekOffset = 0; // 0 = current week, +1 = next week, -1 = prev week
        var monthSelector = document.getElementById('monthSelector');
        var monthSelectorWrap = document.getElementById('monthSelectorWrap');
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Week navigation date calculation
        function weekStartDate() {
            var now = new Date();
            var d = new Date(now.getFullYear(), now.getMonth(), now.getDate());
            d.setDate(d.getDate() - d.getDay() + (currentWeekOffset * 7)); // Sunday of target week
            return d;
        }

        function weekDateFor(dayName) {
            var idx = days.indexOf(dayName);
            var d = weekStartDate();
            d.setDate(d.getDate() + (idx < 0 ? 0 : idx));
            return d;
        }

        function updateWeekNavigationDisplay() {
            var labelEl = document.getElementById('weekDisplayLabel');
            if (!labelEl) return;
            var start = weekStartDate();
            var end = new Date(start);
            end.setDate(end.getDate() + 6);
            var sStr = start.getDate() + ' ' + monthNames[start.getMonth()].substring(0, 3);
            var eStr = end.getDate() + ' ' + monthNames[end.getMonth()].substring(0, 3);

            if (currentWeekOffset === 0) {
                labelEl.innerHTML = 'Current Week <span class="text-muted fw-normal ssh-fs-11">(' + sStr + ' – ' + eStr + ')</span>';
            } else if (currentWeekOffset === 1) {
                labelEl.innerHTML = '<span class="text-primary fw-bold">Next Week (+1)</span> <span class="text-muted fw-normal ssh-fs-11">(' + sStr + ' – ' + eStr + ')</span>';
            } else if (currentWeekOffset === -1) {
                labelEl.innerHTML = '<span class="text-secondary fw-bold">Prev Week (-1)</span> <span class="text-muted fw-normal ssh-fs-11">(' + sStr + ' – ' + eStr + ')</span>';
            } else if (currentWeekOffset > 1) {
                labelEl.innerHTML = '<span class="text-primary fw-bold">Week +' + currentWeekOffset + '</span> <span class="text-muted fw-normal ssh-fs-11">(' + sStr + ' – ' + eStr + ')</span>';
            } else {
                labelEl.innerHTML = '<span class="text-secondary fw-bold">Week ' + currentWeekOffset + '</span> <span class="text-muted fw-normal ssh-fs-11">(' + sStr + ' – ' + eStr + ')</span>';
            }
        }

        // Initialize Select2 on month selector (deferred until visible)
        var monthSelect2Init = false;

        function initMonthSelect2() {
            if (monthSelect2Init || !window.jQuery || !monthSelector) return;
            // make sure the select has options before init
            if (monthSelector.options.length <= 1) return;
            jQuery('#monthSelector').select2({
                width: 'resolve',
                minimumResultsForSearch: Infinity,
                dropdownAutoWidth: true
            });
            monthSelect2Init = true;
        }

        // Monthly helpers — use selected month
        function getSelectedMonth() {
            if (!monthSelector) return new Date().getMonth();
            return parseInt(monthSelector.value, 10) - 1; // 0-indexed
        }

        function getSelectedYear() {
            return new Date().getFullYear();
        }

        function getDaysInMonth() {
            var m = getSelectedMonth();
            var y = getSelectedYear();
            return new Date(y, m + 1, 0).getDate();
        }

        function getMonthDayName(dayNum) {
            var m = getSelectedMonth();
            var y = getSelectedYear();
            var d = new Date(y, m, dayNum);
            return days[d.getDay()];
        }

        /* Oru cell-oda shift id:
           1. Approved manual override (emp.overrides["dd-mm-yyyy"]) irundha adhu priority.
           2. Weekly Shift Rotation active aana: Part wise shifts rotate every week dynamically based on calendar date!
           3. Regular fallback: emp.shifts[dayName] */
        function getCellShiftId(emp, dayName, dateObj) {
            var ds = formatDateObj(dateObj);
            if (emp.overrides && Object.prototype.hasOwnProperty.call(emp.overrides, ds)) {
                return emp.overrides[ds];
            }

            // Weekly Rotation Calculation
            if (emp.rotation && emp.rotation.enabled && Array.isArray(emp.rotation.cycleShifts) && emp.rotation.cycleShifts.length > 0) {
                // If this day is marked as Week Off (shifts[dayName] === null), respect week off
                if (emp.shifts && emp.shifts[dayName] === null) {
                    return null;
                }

                var baseDate = parseDDMMYYYY(emp.rotation.baseDate);
                if (!baseDate) baseDate = new Date();

                // Anchor day (0=Sun, 1=Mon, ..., 3=Wed, default 3 for Wednesday)
                var anchorDay = (typeof emp.rotation.anchorDay === 'number') ? emp.rotation.anchorDay : 3;

                // Normalize base date and target date to their anchor day 00:00:00
                var baseAnchor = getAnchorDateFor(baseDate, anchorDay);
                var targetAnchor = getAnchorDateFor(dateObj, anchorDay);

                var diffMs = targetAnchor.getTime() - baseAnchor.getTime();
                var diffWeeks = Math.round(diffMs / (7 * 24 * 60 * 60 * 1000));

                var cycle = emp.rotation.cycleShifts;
                var cycleLen = cycle.length;
                var bIdx = (typeof emp.rotation.batchIndex === 'number') ? emp.rotation.batchIndex : 0;

                var rotatedIdx = ((bIdx + diffWeeks) % cycleLen + cycleLen) % cycleLen;
                return cycle[rotatedIdx];
            }

            return emp.shifts ? emp.shifts[dayName] : null;
        }

        // Returns shift id for a given employee + day number (1-31) in current month
        function getMonthlyShiftId(emp, dayNum) {
            return getCellShiftId(emp, getMonthDayName(dayNum), monthDateFor(dayNum));
        }

        // Check if a day in the selected month is in the past
        function isPastDay(dayNum) {
            var now = new Date();
            var m = getSelectedMonth();
            var y = getSelectedYear();
            var today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
            var check = new Date(y, m, dayNum);
            return check < today;
        }

        // Render thead based on view
        function renderThead() {
            var thead = document.querySelector('#shiftScheduleTable thead');
            if (!thead) return;

            var fixedCols = '<th class="ssh-th-sno">S.No</th>' +
                '<th>Employee</th>' +
                '<th>Roles</th>' +
                '<th>Punch In Branch</th>';

            var dayHeaders = '';
            if (currentView === 'weekly') {
                updateWeekNavigationDisplay();
                dayHeaders = days.map(function(d) {
                    var wDate = weekDateFor(d);
                    var dNum = wDate.getDate();
                    var mShort = monthNames[wDate.getMonth()].substring(0, 3);
                    return '<th class="text-nowrap text-center ssh-th-min95">' +
                        '<div class="day-label ssh-day-label">' + d + '</div>' +
                        '<span class="day-num ssh-day-num">' + dNum + ' ' + mShort + '</span>' +
                        '</th>';
                }).join('');
            } else {
                var totalDays = getDaysInMonth();
                var selMonth = getSelectedMonth();
                var selYear = getSelectedYear();
                var monthLabel = monthNames[selMonth] + ' ' + selYear;
                dayHeaders = '';
                for (var i = 1; i <= totalDays; i++) {
                    dayHeaders += '<th class="day-col-header text-nowrap"><div class="day-label">' + monthNames[selMonth].substring(0, 3) + '</div><span class="day-num">' + i + '</span> ' + getMonthDayName(i).substring(0, 3) + '</th>';
                }
            }

            thead.innerHTML = '<tr>' + fixedCols + dayHeaders + '</tr>';

            // re-bind selectAll checkbox
            selectAllRows = document.getElementById('selectAllRows');
            if (selectAllRows) {
                selectAllRows.addEventListener('change', function() {
                    var filtered = getFilteredRows();
                    var boxes = tbody.querySelectorAll('.row-check');
                    if (selectAllRows.checked) {
                        filtered.forEach(function(emp) {
                            selectedIds.add(emp.id);
                        });
                        boxes.forEach(function(box) {
                            box.checked = true;
                        });
                    } else {
                        filtered.forEach(function(emp) {
                            selectedIds.delete(emp.id);
                        });
                        boxes.forEach(function(box) {
                            box.checked = false;
                        });
                    }
                    updateBulkBar();
                });
            }
        }

        function buildRowHtml(emp, serialNo) {
            var dayCells = '';
            if (currentView === 'weekly') {
                dayCells = days.map(function(day) {
                    var shiftId = getCellShiftId(emp, day, weekDateFor(day));
                    var shift = shiftId ? shiftsById[shiftId] : null;
                    return '<td class="day-col" data-label="' + day + '">' +
                        buildShiftBadge(emp, day, weekDateFor(day), shift) +
                        '</td>';
                }).join('');
            } else {
                var totalDays = getDaysInMonth();
                for (var i = 1; i <= totalDays; i++) {
                    var pastCls = isPastDay(i) ? ' day-col-past' : '';
                    var shiftId = getMonthlyShiftId(emp, i);
                    var shift = shiftId ? shiftsById[shiftId] : null;
                    dayCells += '<td class="day-col' + pastCls + '" data-label="Day ' + i + '">' +
                        buildShiftBadge(emp, getMonthDayName(i), monthDateFor(i), shift) +
                        '</td>';
                }
            }

            return (
                '<tr data-id="' + emp.id + '">' +
                '<td data-label="S.No">' + serialNo + '</td>' +
                '<td data-label="Employee">' +
                '<div class="d-flex align-items-center gap-2">' +
                '<img src="./assets/img/' + escapeHtml(emp.avatar) + '" class="avatar-sm ssh-avatar-34" alt="' + escapeHtml(emp.name) + '">' +
                '<div>' +
                '<div class="person-name">' + escapeHtml(emp.name) + '</div>' +
                '<div class="ssh-emp-code">EMP' + escapeHtml(emp.emp_id) + '</div>' +
                '</div>' +
                '</div>' +
                '</td>' +
                '<td data-label="Roles">' +
                '<div>' +
                '<div class="fw-semibold ssh-fs-13">' + escapeHtml(emp.role) + '</div>' +
                '<div class="ssh-muted-12">' + escapeHtml(emp.sub_role) + '</div>' +
                '</div>' +
                '</td>' +
                '<td data-label="Punch In Branch" class="ssh-td-branch">' + escapeHtml(emp.branch) + '</td>' +
                dayCells +
                '</tr>'
            );
        }

        // ---- View toggle (Weekly / Monthly) ----
        var viewWeeklyBtn = document.getElementById('viewWeeklyBtn');
        var viewMonthlyBtn = document.getElementById('viewMonthlyBtn');
        var viewSlider = document.querySelector('.view-toggle-slider');

        function switchView(view) {
            currentView = view;
            if (viewWeeklyBtn) viewWeeklyBtn.classList.toggle('active', view === 'weekly');
            if (viewMonthlyBtn) viewMonthlyBtn.classList.toggle('active', view === 'monthly');
            if (viewSlider) viewSlider.classList.toggle('right', view === 'monthly');
            var weekNavWrap = document.getElementById('weekNavigatorWrap');
            if (weekNavWrap) {
                /* this element carries .d-flex (display:flex !important), so hide it with d-none */
                weekNavWrap.classList.toggle('d-none', view !== 'weekly');
            }
            if (monthSelectorWrap) {
                if (view === 'monthly') {
                    monthSelectorWrap.classList.remove('ssh-hidden');
                    initMonthSelect2();
                    setTimeout(function() {
                        jQuery('#monthSelector').select2('open');
                    }, 150);
                } else {
                    monthSelectorWrap.classList.add('ssh-hidden');
                }
            }
            renderThead();
            renderTable();
        }

        if (viewWeeklyBtn) viewWeeklyBtn.addEventListener('click', function() {
            switchView('weekly');
        });
        if (viewMonthlyBtn) viewMonthlyBtn.addEventListener('click', function() {
            switchView('monthly');
        });
        if (monthSelector) monthSelector.addEventListener('change', function() {
            renderThead();
            renderTable();
        });

        // Week navigation controls
        var btnPrevWeek = document.getElementById('btnPrevWeek');
        var btnCurrentWeek = document.getElementById('btnCurrentWeek');
        var btnNextWeek = document.getElementById('btnNextWeek');

        if (btnPrevWeek) {
            btnPrevWeek.addEventListener('click', function() {
                currentWeekOffset--;
                renderThead();
                renderTable();
            });
        }
        if (btnCurrentWeek) {
            btnCurrentWeek.addEventListener('click', function() {
                currentWeekOffset = 0;
                renderThead();
                renderTable();
            });
        }
        if (btnNextWeek) {
            btnNextWeek.addEventListener('click', function() {
                currentWeekOffset++;
                renderThead();
                renderTable();
            });
        }

        // initial thead render
        renderThead();

        function renderTable() {
            if (!tbody) return;

            var filtered = getFilteredRows();

            if (!filtered.length) {
                var fixedCols = 4;
                var dayCols = currentView === 'weekly' ? 7 : getDaysInMonth();
                tbody.innerHTML = '<tr class="no-record-row"><td colspan="' + (fixedCols + dayCols) + '" class="text-center text-muted py-4">No records found</td></tr>';
            } else {
                tbody.innerHTML = filtered.map(function(emp, index) {
                    return buildRowHtml(emp, index + 1);
                }).join('');
            }

            var tableEl = document.getElementById('shiftScheduleTable');
            if (tableEl) {
                if (tableEl.autoTable) {
                    tableEl.autoTable.refresh();
                } else if (window.AutoMasterTable) {
                    window.AutoMasterTable.init(tableEl);
                }
            }

            initTooltips();
            bindRowActions();
            updateSelectAllState(filtered);
            updateBulkBar();
            /* Safety: ensure gender card active color is always correct after render */
            if (activeGenderCard) applyGenderCardActive(activeGenderCard);
        }

        function renderPagination() {
            // Handled automatically by AutoMasterTable (datatable)
        }

        function initTooltips() {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                var existing = bootstrap.Tooltip.getInstance(el);
                if (existing) existing.dispose();
                new bootstrap.Tooltip(el, {
                    trigger: 'hover'
                });
            });
        }

        // ---------------- selection (checkbox) handling ----------------

        function bindRowActions() {
            tbody.querySelectorAll('.row-check').forEach(function(box) {
                box.addEventListener('change', function() {
                    var id = Number(box.getAttribute('data-id'));
                    if (box.checked) selectedIds.add(id);
                    else selectedIds.delete(id);

                    updateSelectAllState(getFilteredRows());
                    updateBulkBar();
                });
            });

            tbody.querySelectorAll('.btn-assign-row').forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = Number(button.getAttribute('data-id'));
                    openAssignModal([id]);
                });
            });
        }

        // header checkbox selects/clears ALL rows matching the current filter
        // (not just the current page) — so "select all" really means all employees.
        function updateSelectAllState(filtered) {
            if (!selectAllRows) return;
            var filteredIds = filtered.map(function(e) {
                return e.id;
            });
            var selectedInFilter = filteredIds.filter(function(id) {
                return selectedIds.has(id);
            });

            if (filteredIds.length === 0) {
                selectAllRows.checked = false;
                selectAllRows.indeterminate = false;
            } else if (selectedInFilter.length === filteredIds.length) {
                selectAllRows.checked = true;
                selectAllRows.indeterminate = false;
            } else if (selectedInFilter.length === 0) {
                selectAllRows.checked = false;
                selectAllRows.indeterminate = false;
            } else {
                selectAllRows.checked = false;
                selectAllRows.indeterminate = true;
            }
        }

        if (selectAllRows) {
            selectAllRows.addEventListener('change', function() {
                var filtered = getFilteredRows();
                var boxes = tbody.querySelectorAll('.row-check');
                if (selectAllRows.checked) {
                    filtered.forEach(function(emp) {
                        selectedIds.add(emp.id);
                    });
                    boxes.forEach(function(box) {
                        box.checked = true;
                    });
                } else {
                    filtered.forEach(function(emp) {
                        selectedIds.delete(emp.id);
                    });
                    boxes.forEach(function(box) {
                        box.checked = false;
                    });
                }
                updateBulkBar();
            });
        }

        function updateBulkBar() {
            var count = selectedIds.size;
            if (activeDeptCards.size > 0 || activeGenderCard) {
                count = employees.filter(function(emp) {
                    if (activeDeptCards.size > 0 && !activeDeptCards.has(emp.role)) return false;
                    if (activeGenderCard) {
                        var genderVal = activeGenderCard.dataset.filter;
                        if (genderVal !== 'all' && emp.gender !== genderVal) return false;
                    }
                    return true;
                }).length;
            }
            if (bulkCount) bulkCount.textContent = String(count);
            if (bulkBar) bulkBar.classList.toggle('show', count > 0);
        }

        if (bulkClearBtn) {
            bulkClearBtn.addEventListener('click', function() {
                selectedIds.clear();
                activeGenderCard = null;
                clearGenderCardStyles();
                activeFilters.genderFilter = '';
                activeDeptCards.clear();
                syncDeptCardStyles();
                document.getElementById('filterDepartment').value = '';
                renderTable();
            });
        }

        // ==================================================================
        // ASSIGN SHIFT FLOW CONTROLLER (Department, Designation & Multi-Batch Split)
        // ==================================================================

        var enabledShifts = (Array.isArray(window.shiftScheduleShifts) ? window.shiftScheduleShifts : []).filter(function(s) {
            return s.status === 'Enable';
        });

        var asfState = {
            department: 'ALL',
            designation: 'ALL',
            branch: 'ALL',
            searchFilter: '',
            selectedEmpIds: [],
            mode: 'split', // 'split' or 'single'
            partsCount: 3, // default: 3 parts
            enableRotation: true, // Auto weekly shift rotation
            rotationAnchorDay: 3, // 3 = Wednesday (default requested Wed ➔ Wed cycle)
            batches: [],
            singleShiftId: enabledShifts.length ? enabledShifts[0].id : 1,
            durationType: 'permanent',
            workingDaysPattern: 'mon-sat',
            remarks: ''
        };

        // Populate Department dropdown
        function populateAsfDepartmentOptions() {
            var deptSelect = document.getElementById('asfDepartmentSelect');
            if (!deptSelect) return;
            var depts = Array.from(new Set(employees.map(function(e) { return e.role; }))).filter(Boolean).sort();
            var cur = asfState.department;
            deptSelect.innerHTML = '<option value="ALL">All Departments (' + employees.length + ')</option>' +
                depts.map(function(d) {
                    var count = employees.filter(function(e) { return e.role === d; }).length;
                    return '<option value="' + escapeHtml(d) + '">' + escapeHtml(d) + ' (' + count + ')</option>';
                }).join('');
            deptSelect.value = cur;
            if (window.ghSelect2) window.ghSelect2(deptSelect);
        }

        // Populate Designation dropdown based on chosen department
        function populateAsfDesignationOptions() {
            var desigSelect = document.getElementById('asfDesignationSelect');
            if (!desigSelect) return;
            var filteredEmps = employees.filter(function(e) {
                return asfState.department === 'ALL' || e.role === asfState.department;
            });
            var desigs = Array.from(new Set(filteredEmps.map(function(e) { return e.sub_role; }))).filter(Boolean).sort();
            desigSelect.innerHTML = '<option value="ALL">All Designations</option>' +
                desigs.map(function(ds) {
                    var count = filteredEmps.filter(function(e) { return e.sub_role === ds; }).length;
                    return '<option value="' + escapeHtml(ds) + '">' + escapeHtml(ds) + ' (' + count + ')</option>';
                }).join('');

            if (desigs.indexOf(asfState.designation) !== -1) {
                desigSelect.value = asfState.designation;
            } else {
                asfState.designation = 'ALL';
                desigSelect.value = 'ALL';
            }
            if (window.ghSelect2) window.ghSelect2(desigSelect);
        }

        // Get employees matching current department, designation, branch
        function getAsfFilteredEmployees() {
            return employees.filter(function(e) {
                if (asfState.department !== 'ALL' && e.role !== asfState.department) return false;
                if (asfState.designation !== 'ALL' && e.sub_role !== asfState.designation) return false;
                if (asfState.branch !== 'ALL' && e.branch !== asfState.branch) return false;
                return true;
            });
        }

        // Refresh stats badges and customizer checkbox grid
        function refreshAsfEmployeeSelection() {
            var eligible = getAsfFilteredEmployees();
            var totalEligibleEl = document.getElementById('asfTotalEligible');
            var selectedCountEl = document.getElementById('asfSelectedEmpCount');
            var boysCountEl = document.getElementById('asfBoysCount');
            var girlsCountEl = document.getElementById('asfGirlsCount');

            if (totalEligibleEl) totalEligibleEl.textContent = String(eligible.length);
            if (selectedCountEl) selectedCountEl.textContent = String(asfState.selectedEmpIds.length);

            var boys = 0, girls = 0;
            asfState.selectedEmpIds.forEach(function(id) {
                var emp = employees.find(function(e) { return e.id === id; });
                if (emp) {
                    if (emp.gender === 'Male') boys++;
                    else girls++;
                }
            });
            if (boysCountEl) boysCountEl.innerHTML = '<i class="bi bi-gender-male"></i> ' + boys + ' Boys';
            if (girlsCountEl) girlsCountEl.innerHTML = '<i class="bi bi-gender-female"></i> ' + girls + ' Girls';

            renderAsfCustomizerGrid();
        }

        // Render checkboxes in custom employee picker drawer
        function renderAsfCustomizerGrid() {
            var grid = document.getElementById('asfEmpCheckboxGrid');
            if (!grid) return;
            var eligible = getAsfFilteredEmployees();
            var query = (asfState.searchFilter || '').toLowerCase().trim();

            var visibleEmps = eligible.filter(function(e) {
                if (!query) return true;
                return e.name.toLowerCase().indexOf(query) !== -1 ||
                       String(e.emp_id).indexOf(query) !== -1 ||
                       (e.sub_role && e.sub_role.toLowerCase().indexOf(query) !== -1);
            });

            if (!visibleEmps.length) {
                grid.innerHTML = '<div class="text-muted small py-2 text-center w-100">No matching employees found</div>';
                return;
            }

            var html = '';
            visibleEmps.forEach(function(emp) {
                var isChecked = asfState.selectedEmpIds.indexOf(emp.id) !== -1;
                html += '<label class="asf-emp-check-item">';
                html += '<input type="checkbox" class="form-check-input asf-emp-cb" data-id="' + emp.id + '" ' + (isChecked ? 'checked' : '') + '>';
                html += '<img src="./assets/img/' + escapeHtml(emp.avatar) + '" class="ssh-avatar-20" alt="">';
                html += '<div class="text-truncate">';
                html += '<span class="fw-semibold">' + escapeHtml(emp.name) + '</span> ';
                html += '<span class="text-muted ssh-fs-11">(EMP' + escapeHtml(emp.emp_id) + ')</span>';
                html += '</div>';
                html += '</label>';
            });

            grid.innerHTML = html;

            grid.querySelectorAll('.asf-emp-cb').forEach(function(cb) {
                cb.addEventListener('change', function() {
                    var empId = parseInt(cb.getAttribute('data-id'), 10);
                    if (cb.checked) {
                        if (asfState.selectedEmpIds.indexOf(empId) === -1) asfState.selectedEmpIds.push(empId);
                    } else {
                        var idx = asfState.selectedEmpIds.indexOf(empId);
                        if (idx !== -1) asfState.selectedEmpIds.splice(idx, 1);
                    }
                    refreshAsfEmployeeSelection();
                    asfDistributeBatches();
                });
            });
        }

        // Divide selected employees into P parts
        function asfDistributeBatches() {
            var selectedIds = asfState.selectedEmpIds.slice();
            var P = asfState.partsCount;
            var N = selectedIds.length;
            var base = Math.floor(N / P);
            var rem = N % P;
            var currentIdx = 0;
            var defaultShifts = [2, 3, 4, 1]; // Part 1: Morning (2), Part 2: Evening (3), Part 3: Night (4), Part 4: General (1)
            var batchTitles = ['Part 1 / Batch A', 'Part 2 / Batch B', 'Part 3 / Batch C', 'Part 4 / Batch D'];
            var newBatches = [];

            for (var b = 0; b < P; b++) {
                var count = base + (b < rem ? 1 : 0);
                var batchEmps = selectedIds.slice(currentIdx, currentIdx + count);
                currentIdx += count;

                var existingShiftId = (asfState.batches[b] && asfState.batches[b].shiftId) ?
                    asfState.batches[b].shiftId : (defaultShifts[b] || (enabledShifts[0] ? enabledShifts[0].id : 1));

                newBatches.push({
                    index: b,
                    title: batchTitles[b] || ('Part ' + (b + 1)),
                    count: batchEmps.length,
                    percent: N > 0 ? Math.round((batchEmps.length / N) * 100) : 0,
                    shiftId: existingShiftId,
                    empIds: batchEmps
                });
            }

            asfState.batches = newBatches;
            renderAsfBatchCards();
            renderAsfRotationTimeline();
            updateAsfSummary();
        }

        // Render the Batch Cards
        function renderAsfBatchCards() {
            var container = document.getElementById('asfBatchCardsRow');
            if (!container) return;
            var colCls = asfState.partsCount === 2 ? 'col-md-6' : (asfState.partsCount === 3 ? 'col-md-4' : 'col-lg-3 col-md-6');

            var html = '';
            asfState.batches.forEach(function(batch, idx) {
                var shiftObj = shiftsById[batch.shiftId];
                var shiftTimingText = shiftTiming(shiftObj);
                var themeCls = 'batch-theme-' + (idx % 5);

                var empChipsHtml = batch.empIds.map(function(id) {
                    var emp = employees.find(function(e) { return e.id === id; });
                    if (!emp) return '';
                    return '<span class="asf-emp-chip-item" title="' + escapeHtml(emp.name + ' (' + emp.role + ' - ' + emp.sub_role + ')') + '">' +
                        '<img src="./assets/img/' + escapeHtml(emp.avatar) + '" alt="">' +
                        escapeHtml(emp.name) +
                        '</span>';
                }).join('');

                html += '<div class="' + colCls + '">';
                html += '<div class="asf-batch-card ' + themeCls + '">';
                html += '<div class="asf-batch-header">';
                html += '<span class="asf-batch-title"><i class="bi bi-diagram-3-fill text-primary"></i> ' + escapeHtml(batch.title) + '</span>';
                html += '<span class="badge bg-primary text-white asf-batch-badge">' + batch.count + ' Employees (' + batch.percent + '%)</span>';
                html += '</div>';

                html += '<div class="mb-2">';
                html += '<label class="form-label small fw-semibold text-muted mb-1">Assign Shift:</label>';
                html += '<select class="form-select form-select-sm asf-batch-shift-select ssh-input-r8" data-batch-idx="' + idx + '">';
                enabledShifts.forEach(function(s) {
                    var sel = (s.id === batch.shiftId) ? ' selected' : '';
                    html += '<option value="' + s.id + '"' + sel + '>' + escapeHtml(s.shift_name) + ' (' + escapeHtml(s.shift_code) + ')</option>';
                });
                html += '</select>';
                html += '<div class="d-flex align-items-center gap-1 mt-1 text-muted ssh-fs-115">';
                html += '<i class="bi bi-clock text-primary"></i> <span class="asf-batch-timing-text" data-batch-idx="' + idx + '">' + escapeHtml(shiftTimingText) + '</span>';
                html += '</div>';
                html += '</div>';

                html += '<div class="small fw-semibold text-muted d-flex justify-content-between align-items-center mt-1 ssh-fs-11">';
                html += '<span>Allocated Employees:</span>';
                html += '<span class="text-primary fw-bold">' + batch.count + ' People</span>';
                html += '</div>';

                html += '<div class="asf-emp-preview-list">';
                html += empChipsHtml || '<span class="text-muted small p-2 d-block">No employees in this batch</span>';
                html += '</div>';

                html += '</div>';
                html += '</div>';
            });

            container.innerHTML = html;

            container.querySelectorAll('.asf-batch-shift-select').forEach(function(sel) {
                sel.addEventListener('change', function() {
                    var bIdx = parseInt(sel.getAttribute('data-batch-idx'), 10);
                    var val = parseInt(sel.value, 10);
                    if (asfState.batches[bIdx]) {
                        asfState.batches[bIdx].shiftId = val;
                        var sObj = shiftsById[val];
                        var tEl = container.querySelector('.asf-batch-timing-text[data-batch-idx="' + bIdx + '"]');
                        if (tEl && sObj) tEl.textContent = shiftTiming(sObj);
                        renderAsfRotationTimeline();
                        updateAsfSummary();
                    }
                });
            });

            renderAsfRotationTimeline();
        }

        // Render 4-Week Rotation Preview Cycle in Modal
        function renderAsfRotationTimeline() {
            var tbody = document.getElementById('asfRotationTimelineBody');
            var statusBadge = document.getElementById('asfRotationStatusBadge');
            var rotationSwitch = document.getElementById('asfEnableRotationSwitch');
            if (!tbody) return;

            var isRotating = asfState.enableRotation && asfState.mode === 'split';
            if (rotationSwitch) rotationSwitch.checked = asfState.enableRotation;

            if (statusBadge) {
                if (isRotating) {
                    statusBadge.className = 'badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1';
                    statusBadge.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Rotating Weekly';
                } else {
                    statusBadge.className = 'badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2 py-1';
                    statusBadge.innerHTML = '<i class="bi bi-dash-circle me-1"></i>Rotation Disabled';
                }
            }

            var cycle = asfState.batches.map(function(b) { return b.shiftId; });
            var P = cycle.length;
            if (P === 0) {
                tbody.innerHTML = '<tr><td colspan="5" class="text-muted py-2">No batches configured</td></tr>';
                return;
            }

            // Dynamically render thead with dates for anchorDay
            var thead = document.querySelector('#asfRotationTimelineTable thead');
            var anchorDay = (typeof asfState.rotationAnchorDay === 'number') ? asfState.rotationAnchorDay : 3;
            var anchorShorts = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            var baseCycleStart = getAnchorDateFor(new Date(), anchorDay);

            if (thead) {
                var thHtml = '<tr><th class="text-start ssh-th-batch">Batch / Part</th>';
                for (var cw = 0; cw < 4; cw++) {
                    var cStart = new Date(baseCycleStart);
                    cStart.setDate(cStart.getDate() + (cw * 7));
                    var cEnd = new Date(cStart);
                    cEnd.setDate(cEnd.getDate() + 6);

                    var sStr = cStart.getDate() + ' ' + monthNames[cStart.getMonth()].substring(0, 3);
                    var eStr = cEnd.getDate() + ' ' + monthNames[cEnd.getMonth()].substring(0, 3);

                    var cTitle = (cw === 0) ? ('Cycle 1 (Current ' + anchorShorts[anchorDay] + ')') :
                        ((cw === 1) ? ('Cycle 2 (Next ' + anchorShorts[anchorDay] + ')') :
                        ((cw === 2) ? ('Cycle 3 (+2 Wks)') : ('Cycle 4 (Repeats)')));

                    thHtml += '<th>' + cTitle + '<br><span class="fw-normal text-muted ssh-fs-105">(' + sStr + ' – ' + eStr + ')</span></th>';
                }
                thHtml += '</tr>';
                thead.innerHTML = thHtml;
            }

            function getShiftPill(shiftId) {
                var s = shiftsById[shiftId];
                if (!s) return '<span class="badge bg-secondary">Unassigned</span>';
                var code = (s.shift_code || '').toUpperCase();
                var cls = 'shift-gen';
                var icon = 'bi-clock';
                if (code === 'MOR') { cls = 'shift-mor'; icon = 'bi-brightness-high-fill text-warning'; }
                else if (code === 'EVE') { cls = 'shift-eve'; icon = 'bi-sunset-fill text-info'; }
                else if (code === 'NGT') { cls = 'shift-ngt'; icon = 'bi-moon-stars-fill text-primary'; }
                else if (code === 'GEN') { cls = 'shift-gen'; icon = 'bi-briefcase-fill text-success'; }

                return '<span class="asf-shift-pill ' + cls + '">' +
                    '<i class="bi ' + icon + '"></i> ' +
                    escapeHtml(s.shift_name) +
                    ' <span class="opacity-75 ssh-fs-10">(' + formatTime12(s.start_time) + ')</span>' +
                    '</span>';
            }

            var html = '';
            asfState.batches.forEach(function(batch, bIdx) {
                var title = escapeHtml(batch.title);
                var count = batch.count;
                var badgeTheme = 'bg-primary';
                if (bIdx === 0) badgeTheme = 'bg-success';
                else if (bIdx === 1) badgeTheme = 'bg-info text-dark';
                else if (bIdx === 2) badgeTheme = 'bg-warning text-dark';

                html += '<tr>';
                html += '<td class="text-start fw-bold text-dark text-nowrap">' +
                    '<span class="badge rounded-pill ' + badgeTheme + ' me-1 ssh-fs-10">Part ' + (bIdx + 1) + '</span> ' +
                    title + ' <span class="text-muted fw-normal small">(' + count + ' staff)</span>' +
                    '</td>';

                for (var w = 0; w < 4; w++) {
                    var sId = isRotating ? cycle[(bIdx + w) % P] : batch.shiftId;
                    var hlCls = (w === 0) ? ' class="ssh-hl-today"' : '';
                    html += '<td' + hlCls + '>' + getShiftPill(sId) + '</td>';
                }

                html += '</tr>';
            });

            tbody.innerHTML = html;
        }

        // Shuffle distribution
        function asfShuffleEmployees() {
            var array = asfState.selectedEmpIds.slice();
            for (var i = array.length - 1; i > 0; i--) {
                var j = Math.floor(Math.random() * (i + 1));
                var temp = array[i];
                array[i] = array[j];
                array[j] = temp;
            }
            asfState.selectedEmpIds = array;
            asfDistributeBatches();
            scrToast('Randomly shuffled employees across batches!', 'bi-shuffle');
        }

        // Balance gender evenly across batches
        function asfBalanceGenderDistribution() {
            var selectedEmps = asfState.selectedEmpIds.map(function(id) {
                return employees.find(function(e) { return e.id === id; });
            }).filter(Boolean);

            var males = selectedEmps.filter(function(e) { return e.gender === 'Male'; }).map(function(e) { return e.id; });
            var females = selectedEmps.filter(function(e) { return e.gender === 'Female'; }).map(function(e) { return e.id; });

            var P = asfState.partsCount;
            var bins = [];
            for (var i = 0; i < P; i++) bins.push([]);

            males.forEach(function(id, idx) {
                bins[idx % P].push(id);
            });

            females.forEach(function(id, idx) {
                bins[(idx + (males.length % P)) % P].push(id);
            });

            var newOrder = [];
            bins.forEach(function(bList) {
                newOrder = newOrder.concat(bList);
            });

            asfState.selectedEmpIds = newOrder;
            asfDistributeBatches();
            scrToast('Balanced ' + males.length + ' Boys & ' + females.length + ' Girls evenly across ' + P + ' batches!', 'bi-gender-ambiguous');
        }

        // Sort sequentially by Employee ID
        function asfSequentialDistribution() {
            asfState.selectedEmpIds.sort(function(a, b) {
                var empA = employees.find(function(e) { return e.id === a; });
                var empB = employees.find(function(e) { return e.id === b; });
                var idA = empA ? empA.emp_id : a;
                var idB = empB ? empB.emp_id : b;
                return idA - idB;
            });
            asfDistributeBatches();
            scrToast('Sorted employees sequentially by Employee ID!', 'bi-sort-numeric-down');
        }

        // Live Allocation Summary text
        function updateAsfSummary() {
            var summaryEl = document.getElementById('asfLiveSummaryText');
            if (!summaryEl) return;
            var totalSelected = asfState.selectedEmpIds.length;
            var footerCount = document.getElementById('asfFooterEmpCount');
            if (footerCount) footerCount.textContent = String(totalSelected);

            if (totalSelected === 0) {
                summaryEl.innerHTML = '<span class="text-danger fw-semibold"><i class="bi bi-exclamation-circle me-1"></i> No employees selected. Please select a department or employees above.</span>';
                return;
            }

            var durLabel = 'Permanent (Starts Today)';
            if (asfState.durationType === 'wed_to_wed') {
                var ww = computeWedToWedRange();
                durLabel = 'Wednesday to Next Wednesday (' + formatDateObj(ww.from) + ' to ' + formatDateObj(ww.to) + ')';
            } else if (asfState.durationType === 'week') {
                var wk = computeWeekRange();
                durLabel = 'This Week (' + formatDateObj(wk.from) + ' to ' + formatDateObj(wk.to) + ')';
            } else if (asfState.durationType === 'month') {
                var mo = computeMonthRange();
                durLabel = 'This Month (' + formatDateObj(mo.from) + ' to ' + formatDateObj(mo.to) + ')';
            } else if (asfState.durationType === 'custom') {
                var fVal = document.getElementById('asfCustomDateFrom').value;
                var tVal = document.getElementById('asfCustomDateTo').value;
                durLabel = (fVal && tVal) ? ('Custom Range: ' + fVal + ' to ' + tVal) : 'Custom Date Range';
            }

            var daysLabel = asfState.workingDaysPattern === 'mon-sat' ? 'Mon – Sat (Sunday Week-Off)' :
                (asfState.workingDaysPattern === 'mon-fri' ? 'Mon – Fri (Sat & Sun Week-Off)' : 'All 7 Days (Sun – Sat)');

            if (asfState.mode === 'split') {
                var breakdown = asfState.batches.map(function(b) {
                    var s = shiftsById[b.shiftId];
                    var sName = s ? s.shift_name : ('Shift #' + b.shiftId);
                    var t = s ? (' • ' + shiftTiming(s)) : '';
                    return '<div><b>' + escapeHtml(b.title) + '</b>: <span class="badge bg-white text-dark border px-2 py-1 mx-1">' + b.count + ' employees</span> → <strong class="text-success">' + escapeHtml(sName) + '</strong> <span class="text-muted small">(' + escapeHtml(t) + ')</span></div>';
                }).join('');

                var anchorNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                var anchorDayNum = (typeof asfState.rotationAnchorDay === 'number') ? asfState.rotationAnchorDay : 3;
                var aDayName = anchorNames[anchorDayNum] || 'Wednesday';

                var rotationNote = asfState.enableRotation ?
                    '<div class="mt-2 text-success small fw-semibold pt-2 border-top"><i class="bi bi-arrow-repeat me-1"></i> Auto Weekly Shift Rotation: <b>Active</b> — Shifts rotate continuously between batches every <b>' + aDayName + '</b>.</div>' :
                    '<div class="mt-2 text-muted small pt-2 border-top"><i class="bi bi-dash-circle me-1"></i> Weekly Shift Rotation: <b>Disabled</b> — Shifts remain static.</div>';

                summaryEl.innerHTML = '<div>Assigning <b>' + totalSelected + '</b> employees across <b>' + asfState.partsCount + ' batches</b>:</div>' +
                    '<div class="mt-2 ps-2 border-start border-3 border-success d-flex flex-column gap-1">' + breakdown + '</div>' +
                    rotationNote +
                    '<div class="mt-2 small text-muted pt-2 border-top"><i class="bi bi-calendar-event me-1"></i> Duration: <b>' + durLabel + '</b> | Working Pattern: <b>' + daysLabel + '</b></div>';
            } else {
                var s = shiftsById[asfState.singleShiftId];
                var sName = s ? s.shift_name : 'Selected Shift';
                var t = s ? (' (' + shiftTiming(s) + ')') : '';
                summaryEl.innerHTML = '<div>Assigning all <b>' + totalSelected + '</b> employees to <strong class="text-success">' + escapeHtml(sName) + '</strong> <span class="text-muted">' + escapeHtml(t) + '</span>.</div>' +
                    '<div class="mt-2 small text-muted pt-2 border-top"><i class="bi bi-calendar-event me-1"></i> Duration: <b>' + durLabel + '</b> | Working Pattern: <b>' + daysLabel + '</b></div>';
            }
        }

        // Apply shift assignments and update table
        function asfApplyShiftAssignments() {
            if (asfState.selectedEmpIds.length === 0) {
                alert('Please select at least one employee.');
                return;
            }

            var effectiveFrom = formatDateObj(new Date());
            var effectiveTo = null;

            if (asfState.durationType === 'wed_to_wed') {
                var ww = computeWedToWedRange();
                effectiveFrom = formatDateObj(ww.from);
                effectiveTo = formatDateObj(ww.to);
            } else if (asfState.durationType === 'week') {
                var wk = computeWeekRange();
                effectiveFrom = formatDateObj(wk.from);
                effectiveTo = formatDateObj(wk.to);
            } else if (asfState.durationType === 'month') {
                var mo = computeMonthRange();
                effectiveFrom = formatDateObj(mo.from);
                effectiveTo = formatDateObj(mo.to);
            } else if (asfState.durationType === 'custom') {
                var fromVal = document.getElementById('asfCustomDateFrom').value;
                var toVal = document.getElementById('asfCustomDateTo').value;
                if (!fromVal || !toVal) {
                    alert('Please select both Effective From and Effective To dates for custom range.');
                    return;
                }
                var fromDateObj = parseDDMMYYYY(fromVal);
                var toDateObj = parseDDMMYYYY(toVal);
                if (!fromDateObj || !toDateObj) {
                    alert('Please enter valid Effective From and Effective To dates (DD-MM-YYYY).');
                    return;
                }
                effectiveFrom = formatDateObj(fromDateObj);
                effectiveTo = formatDateObj(toDateObj);
            }

            var selectedDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            if (asfState.workingDaysPattern === 'mon-sat') {
                selectedDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            } else if (asfState.workingDaysPattern === 'mon-fri') {
                selectedDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
            }

            var empToShiftMap = {};
            if (asfState.mode === 'split') {
                asfState.batches.forEach(function(batch) {
                    batch.empIds.forEach(function(empId) {
                        empToShiftMap[empId] = batch.shiftId;
                    });
                });
            } else {
                var singleShiftVal = parseInt(document.getElementById('asfSingleShiftSelect').value, 10);
                if (!singleShiftVal) {
                    alert('Please select a shift to assign.');
                    return;
                }
                asfState.selectedEmpIds.forEach(function(empId) {
                    empToShiftMap[empId] = singleShiftVal;
                });
            }

            // Build Weekly Rotation metadata map if split mode + rotation enabled
            var empRotationMap = {};
            if (asfState.mode === 'split' && asfState.enableRotation) {
                var cycleShifts = asfState.batches.map(function(b) { return b.shiftId; });
                var anchorDay = (typeof asfState.rotationAnchorDay === 'number') ? asfState.rotationAnchorDay : 3;
                var baseAnchor = getAnchorDateFor(new Date(), anchorDay);
                var baseAnchorStr = formatDateObj(baseAnchor);

                asfState.batches.forEach(function(batch, bIdx) {
                    batch.empIds.forEach(function(empId) {
                        empRotationMap[empId] = {
                            enabled: true,
                            frequency: 'weekly',
                            cycleShifts: cycleShifts.slice(),
                            batchIndex: bIdx,
                            anchorDay: anchorDay,
                            baseDate: baseAnchorStr
                        };
                    });
                });
            }

            var remarksText = (document.getElementById('asfRemarksInput').value || '').trim();

            // Update employees dataset
            employees = employees.map(function(emp) {
                if (!empToShiftMap[emp.id]) return emp;
                var newShiftId = empToShiftMap[emp.id];
                var newShifts = Object.assign({}, emp.shifts || {});

                ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(function(d) {
                    if (selectedDays.indexOf(d) !== -1) {
                        newShifts[d] = newShiftId;
                    } else {
                        newShifts[d] = null; // off day
                    }
                });

                var updatedRotation = (asfState.mode === 'split' && asfState.enableRotation && empRotationMap[emp.id]) ?
                    empRotationMap[emp.id] : null;

                return Object.assign({}, emp, {
                    shift_id: newShiftId,
                    schedule_type: asfState.durationType,
                    effective_from: effectiveFrom,
                    effective_to: effectiveTo,
                    remarks: remarksText || emp.remarks,
                    shifts: newShifts,
                    rotation: updatedRotation
                });
            });

            // Close modal
            var modalEl = document.getElementById('assignShiftModal');
            var modalInst = bootstrap.Modal.getInstance(modalEl);
            if (modalInst) modalInst.hide();

            selectedIds.clear();
            renderTable();

            var deptText = asfState.department === 'ALL' ? 'all departments' : asfState.department;
            var successMsg = 'Successfully assigned shifts to <b>' + asfState.selectedEmpIds.length + '</b> employees in ' + escapeHtml(deptText) + '!';
            if (asfState.mode === 'split') {
                successMsg += ' (Split into ' + asfState.partsCount + ' batches' + (asfState.enableRotation ? ' with Weekly Rotation' : '') + ')';
            }
            scrToast(successMsg, 'bi-check-circle-fill');
        }

        // ===== Stepper Controller for 5-Step Rotational Shift Flow =====
        var asfCurrentStep = 1;
        var asfTotalSteps = 5;
        var asfStepTitles = {
            1: 'Step 1 of 5: Select Department & Staff',
            2: 'Step 2 of 5: Shift Parts & Batches',
            3: 'Step 3 of 5: Frequency & Working Days',
            4: 'Step 4 of 5: 4-Week Rotation Calendar Preview',
            5: 'Step 5 of 5: Review Summary & Deploy'
        };

        function setAsfStep(stepNum) {
            stepNum = Math.max(1, Math.min(asfTotalSteps, stepNum));

            // Validation: cannot proceed past step 1 without selecting at least one employee
            if (stepNum > 1 && asfState.selectedEmpIds.length === 0) {
                alert('Please select at least one employee before proceeding.');
                return false;
            }

            asfCurrentStep = stepNum;

            // Toggle Panels
            for (var s = 1; s <= asfTotalSteps; s++) {
                var p = document.getElementById('asfStepPanel' + s);
                if (p) p.classList.toggle('active', s === asfCurrentStep);
            }

            // Update Stepper track items
            var stepItems = document.querySelectorAll('.asf-step-item');
            stepItems.forEach(function(item) {
                var sn = parseInt(item.getAttribute('data-step'), 10);
                var circle = item.querySelector('.asf-step-circle');
                item.classList.remove('active', 'completed');

                if (sn === asfCurrentStep) {
                    item.classList.add('active');
                    if (circle) circle.innerHTML = String(sn);
                } else if (sn < asfCurrentStep) {
                    item.classList.add('completed');
                    if (circle) circle.innerHTML = '<i class="bi bi-check-lg"></i>';
                } else {
                    if (circle) circle.innerHTML = String(sn);
                }
            });

            // Update Stepper connecting lines
            var stepLines = document.querySelectorAll('.asf-step-line');
            stepLines.forEach(function(line, idx) {
                line.classList.toggle('active', asfCurrentStep > (idx + 1));
            });

            // Update Modal Footer Controls
            var prevBtn = document.getElementById('asfPrevStepBtn');
            var nextBtn = document.getElementById('asfNextStepBtn');
            var confirmBtn = document.getElementById('asfConfirmAssignBtn');
            var badgeEl = document.getElementById('asfStepBadge');

            if (prevBtn) prevBtn.classList.toggle('ssh-hidden', asfCurrentStep <= 1);
            if (nextBtn) nextBtn.classList.toggle('ssh-hidden', asfCurrentStep >= asfTotalSteps);
            if (confirmBtn) confirmBtn.classList.toggle('ssh-hidden', asfCurrentStep !== asfTotalSteps);
            if (badgeEl) badgeEl.textContent = asfStepTitles[asfCurrentStep] || ('Step ' + asfCurrentStep + ' of ' + asfTotalSteps);

            // Re-render corresponding views
            if (asfCurrentStep === 2) {
                renderAsfBatchCards();
            } else if (asfCurrentStep === 4) {
                renderAsfRotationTimeline();
            } else if (asfCurrentStep === 5) {
                updateAsfSummary();
            }

            // Scroll modal body to top smoothly
            var modalBody = document.querySelector('#assignShiftModal .modal-body');
            if (modalBody) modalBody.scrollTop = 0;

            return true;
        }

        // Open modal and initialize
        function openAssignShiftFlowModal(initialEmpIds, isRotationFlow, presetType) {
            populateAsfDepartmentOptions();

            if (Array.isArray(initialEmpIds) && initialEmpIds.length > 0) {
                asfState.selectedEmpIds = initialEmpIds.slice();
                var targetEmps = employees.filter(function(e) { return initialEmpIds.indexOf(e.id) !== -1; });
                var targetDepts = Array.from(new Set(targetEmps.map(function(e) { return e.role; })));
                if (targetDepts.length === 1) {
                    asfState.department = targetDepts[0];
                    document.getElementById('asfDepartmentSelect').value = asfState.department;
                } else {
                    asfState.department = 'ALL';
                    document.getElementById('asfDepartmentSelect').value = 'ALL';
                }
            } else {
                // Default to Developer if exists, else ALL
                var hasDev = employees.some(function(e) { return e.role === 'Developer'; });
                asfState.department = hasDev ? 'Developer' : 'ALL';
                document.getElementById('asfDepartmentSelect').value = asfState.department;
                var filtered = getAsfFilteredEmployees();
                asfState.selectedEmpIds = filtered.map(function(e) { return e.id; });
            }

            // If rotational flow requested or wed_to_wed preset chosen
            if (isRotationFlow || presetType === 'wed_to_wed') {
                asfState.mode = 'split';
                asfState.partsCount = 3;
                asfState.enableRotation = true;

                // Sync parts button UI
                document.querySelectorAll('.asf-parts-btn').forEach(function(btn) {
                    var p = parseInt(btn.getAttribute('data-parts'), 10);
                    if (p === 3) {
                        btn.classList.add('active', 'btn-primary');
                        btn.classList.remove('btn-outline-primary');
                    } else {
                        btn.classList.remove('active', 'btn-primary');
                        btn.classList.add('btn-outline-primary');
                    }
                });

                // Sync mode pills
                var splitPill = document.getElementById('asfModeSplitPill');
                var singlePill = document.getElementById('asfModeSinglePill');
                var splitSection = document.getElementById('asfSplitConfigSection');
                var singleSection = document.getElementById('asfSingleConfigSection');
                var splitCheck = document.getElementById('asfSplitCheckIcon');
                var singleCheck = document.getElementById('asfSingleCheckIcon');
                if (splitPill) splitPill.classList.add('active');
                if (singlePill) singlePill.classList.remove('active');
                if (splitSection) splitSection.classList.remove('ssh-hidden');
                if (singleSection) singleSection.classList.add('ssh-hidden');
                if (splitCheck) splitCheck.classList.remove('ssh-hidden');
                if (singleCheck) singleCheck.classList.add('ssh-hidden');

                var titleEl = document.getElementById('assignShiftModalLabel');
                var subEl = titleEl ? titleEl.nextElementSibling : null;

                if (presetType === 'wed_to_wed') {
                    asfState.durationType = 'wed_to_wed';
                    asfState.rotationAnchorDay = 3; // Wednesday
                    var durWedRadio = document.getElementById('asf_dur_wed');
                    if (durWedRadio) durWedRadio.checked = true;
                    var anchorSel = document.getElementById('asfRotationAnchorDay');
                    if (anchorSel) anchorSel.value = '3';

                    if (titleEl) titleEl.innerHTML = '<span class="text-warning"><i class="bi bi-calendar-range me-1"></i> Wednesday to Wednesday Shift Flow</span> — Auto-Rotating';
                    if (subEl) subEl.textContent = 'Shift cycle from this Wednesday to next Wednesday (7 Days) with auto-rotation every Wednesday';
                } else {
                    if (titleEl) titleEl.innerHTML = '<span class="text-success"><i class="bi bi-arrow-repeat me-1"></i> Rotational Shift Flow</span> — Auto Weekly Shift Rotation';
                    if (subEl) subEl.textContent = 'Weekly automatic shift rotation wizard: Split into Morning, Evening, and Night batches';
                }
            } else {
                var titleEl = document.getElementById('assignShiftModalLabel');
                var subEl = titleEl ? titleEl.nextElementSibling : null;
                if (titleEl) titleEl.textContent = 'Assign Shift Schedule';
                if (subEl) subEl.textContent = 'Department & Designation-wise shift assignment with multi-batch split flow';
            }

            populateAsfDesignationOptions();
            refreshAsfEmployeeSelection();
            asfDistributeBatches();
            updateRotationTriggerDisplay();

            // Reset to Step 1
            setAsfStep(1);

            var modalEl = document.getElementById('assignShiftModal');
            if (modalEl) {
                var modalInst = bootstrap.Modal.getOrCreateInstance(modalEl);
                modalInst.show();
            }
        }

        // Helper to update rotation trigger banner text
        function updateRotationTriggerDisplay() {
            var anchorDay = (typeof asfState.rotationAnchorDay === 'number') ? asfState.rotationAnchorDay : 3;
            var anchorNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            var aName = anchorNames[anchorDay] || 'Wednesday';
            var titleEl = document.getElementById('asfRotationTriggerTitle');
            var descEl = document.getElementById('asfRotationTriggerDesc');
            var badgeEl = document.getElementById('asfRotationTriggerBadge');

            if (titleEl) titleEl.textContent = 'Automatic Rotation Trigger: Every ' + aName + ' 00:00 AM';
            if (descEl) descEl.textContent = 'System automatically advances Part 1, Part 2, and Part 3 to the next shift on ' + aName + ' every week.';
            if (badgeEl) badgeEl.textContent = aName.substring(0, 3) + ' ➔ ' + aName.substring(0, 3) + ' Cycle';
        }

        // Bind event listeners for Assign Shift Flow modal
        (function initAsfEventListeners() {
            var deptSelect = document.getElementById('asfDepartmentSelect');
            if (deptSelect) {
                deptSelect.addEventListener('change', function() {
                    asfState.department = deptSelect.value;
                    asfState.designation = 'ALL';
                    populateAsfDesignationOptions();
                    var filtered = getAsfFilteredEmployees();
                    asfState.selectedEmpIds = filtered.map(function(e) { return e.id; });
                    refreshAsfEmployeeSelection();
                    asfDistributeBatches();
                });
            }

            var desigSelect = document.getElementById('asfDesignationSelect');
            if (desigSelect) {
                desigSelect.addEventListener('change', function() {
                    asfState.designation = desigSelect.value;
                    var filtered = getAsfFilteredEmployees();
                    asfState.selectedEmpIds = filtered.map(function(e) { return e.id; });
                    refreshAsfEmployeeSelection();
                    asfDistributeBatches();
                });
            }

            var branchSelect = document.getElementById('asfBranchSelect');
            if (branchSelect) {
                branchSelect.addEventListener('change', function() {
                    asfState.branch = branchSelect.value;
                    var filtered = getAsfFilteredEmployees();
                    asfState.selectedEmpIds = filtered.map(function(e) { return e.id; });
                    refreshAsfEmployeeSelection();
                    asfDistributeBatches();
                });
            }

            var selectAllBtn = document.getElementById('asfSelectAllBtn');
            if (selectAllBtn) {
                selectAllBtn.addEventListener('click', function() {
                    var filtered = getAsfFilteredEmployees();
                    asfState.selectedEmpIds = filtered.map(function(e) { return e.id; });
                    refreshAsfEmployeeSelection();
                    asfDistributeBatches();
                });
            }

            var deselectAllBtn = document.getElementById('asfDeselectAllBtn');
            if (deselectAllBtn) {
                deselectAllBtn.addEventListener('click', function() {
                    asfState.selectedEmpIds = [];
                    refreshAsfEmployeeSelection();
                    asfDistributeBatches();
                });
            }

            var toggleCustomizerBtn = document.getElementById('asfToggleCustomizerBtn');
            var customizerEl = document.getElementById('asfEmpCustomizer');
            var customizerChevron = document.getElementById('asfCustomizerChevron');
            if (toggleCustomizerBtn && customizerEl) {
                toggleCustomizerBtn.addEventListener('click', function() {
                    var isShown = customizerEl.classList.toggle('show');
                    if (customizerChevron) {
                        customizerChevron.className = isShown ? 'bi bi-chevron-up ms-1' : 'bi bi-chevron-down ms-1';
                    }
                });
            }

            var searchInput = document.getElementById('asfEmpSearchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    asfState.searchFilter = searchInput.value;
                    renderAsfCustomizerGrid();
                });
            }

            // Mode Pills (Split vs Single)
            var splitPill = document.getElementById('asfModeSplitPill');
            var singlePill = document.getElementById('asfModeSinglePill');
            var splitSection = document.getElementById('asfSplitConfigSection');
            var singleSection = document.getElementById('asfSingleConfigSection');
            var splitCheckIcon = document.getElementById('asfSplitCheckIcon');
            var singleCheckIcon = document.getElementById('asfSingleCheckIcon');

            function switchAsfMode(mode) {
                asfState.mode = mode;
                if (mode === 'split') {
                    if (splitPill) splitPill.classList.add('active');
                    if (singlePill) singlePill.classList.remove('active');
                    if (splitSection) splitSection.classList.remove('ssh-hidden');
                    if (singleSection) singleSection.classList.add('ssh-hidden');
                    if (splitCheckIcon) splitCheckIcon.classList.remove('ssh-hidden');
                    if (singleCheckIcon) singleCheckIcon.classList.add('ssh-hidden');
                } else {
                    if (splitPill) splitPill.classList.remove('active');
                    if (singlePill) singlePill.classList.add('active');
                    if (splitSection) splitSection.classList.add('ssh-hidden');
                    if (singleSection) singleSection.classList.remove('ssh-hidden');
                    if (splitCheckIcon) splitCheckIcon.classList.add('ssh-hidden');
                    if (singleCheckIcon) singleCheckIcon.classList.remove('ssh-hidden');
                }
                updateAsfSummary();
            }

            if (splitPill) splitPill.addEventListener('click', function() { switchAsfMode('split'); });
            if (singlePill) singlePill.addEventListener('click', function() { switchAsfMode('single'); });

            // Parts buttons (2, 3, 4 parts)
            document.querySelectorAll('.asf-parts-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.asf-parts-btn').forEach(function(b) {
                        b.classList.remove('active', 'btn-primary');
                        b.classList.add('btn-outline-primary');
                    });
                    btn.classList.add('active', 'btn-primary');
                    btn.classList.remove('btn-outline-primary');
                    asfState.partsCount = parseInt(btn.getAttribute('data-parts'), 10) || 3;
                    asfDistributeBatches();
                });
            });

            // Split helpers: Shuffle, Balance Gender, Sequential
            var shuffleBtn = document.getElementById('asfShuffleBtn');
            if (shuffleBtn) shuffleBtn.addEventListener('click', asfShuffleEmployees);

            var balanceGenderBtn = document.getElementById('asfBalanceGenderBtn');
            if (balanceGenderBtn) balanceGenderBtn.addEventListener('click', asfBalanceGenderDistribution);

            var sequentialBtn = document.getElementById('asfSequentialBtn');
            if (sequentialBtn) sequentialBtn.addEventListener('click', asfSequentialDistribution);

            // Single shift dropdown
            var singleShiftSelect = document.getElementById('asfSingleShiftSelect');
            var singleTimingPreview = document.getElementById('asfSingleShiftTimingPreview');
            var singleTimingText = document.getElementById('asfSingleShiftTimingText');
            if (singleShiftSelect) {
                singleShiftSelect.addEventListener('change', function() {
                    var val = parseInt(singleShiftSelect.value, 10);
                    asfState.singleShiftId = val;
                    var sObj = shiftsById[val];
                    if (sObj && singleTimingPreview && singleTimingText) {
                        singleTimingText.textContent = shiftTiming(sObj);
                        singleTimingPreview.classList.remove('ssh-hidden');
                    } else if (singleTimingPreview) {
                        singleTimingPreview.classList.add('ssh-hidden');
                    }
                    updateAsfSummary();
                });
            }

            // Duration Type radios
            document.querySelectorAll('input[name="asfDurationType"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    asfState.durationType = radio.value;
                    var customRow = document.getElementById('asfCustomRangeRow');
                    var alertEl = document.getElementById('asfDurationPreviewAlert');

                    if (customRow) customRow.classList.toggle('ssh-hidden', radio.value !== 'custom');

                    if (alertEl) {
                        if (radio.value === 'wed_to_wed') {
                            var ww = computeWedToWedRange();
                            alertEl.innerHTML = '<i class="bi bi-calendar-range me-1 text-warning"></i> Wednesday to Wednesday Shift: <strong>' + formatDateObj(ww.from) + ' to ' + formatDateObj(ww.to) + '</strong> (Auto-rotates next Wednesday).';
                        } else if (radio.value === 'permanent') {
                            alertEl.innerHTML = '<i class="bi bi-infinity me-1"></i> Shift starts from <strong>Today</strong> and stays in effect permanently until changed.';
                        } else if (radio.value === 'week') {
                            var wk = computeWeekRange();
                            alertEl.innerHTML = '<i class="bi bi-calendar-week me-1"></i> Shift applies for this week: <strong>' + formatDateObj(wk.from) + ' to ' + formatDateObj(wk.to) + '</strong>.';
                        } else if (radio.value === 'month') {
                            var mo = computeMonthRange();
                            alertEl.innerHTML = '<i class="bi bi-calendar-month me-1"></i> Shift applies for this month: <strong>' + formatDateObj(mo.from) + ' to ' + formatDateObj(mo.to) + '</strong>.';
                        } else if (radio.value === 'custom') {
                            alertEl.innerHTML = '<i class="bi bi-calendar-range me-1"></i> Shift applies between the selected custom date range.';
                        }
                    }
                    updateAsfSummary();
                });
            });

            // Rotation Anchor Day dropdown
            var anchorDaySelect = document.getElementById('asfRotationAnchorDay');
            if (anchorDaySelect) {
                anchorDaySelect.addEventListener('change', function() {
                    asfState.rotationAnchorDay = parseInt(anchorDaySelect.value, 10);
                    updateRotationTriggerDisplay();
                    renderAsfRotationTimeline();
                    updateAsfSummary();
                });
            }

            // Working Days pattern
            var workingDaysPatternSelect = document.getElementById('asfWorkingDaysPattern');
            if (workingDaysPatternSelect) {
                workingDaysPatternSelect.addEventListener('change', function() {
                    asfState.workingDaysPattern = workingDaysPatternSelect.value;
                    updateAsfSummary();
                });
            }

            // Custom date inputs
            var fromDateEl = document.getElementById('asfCustomDateFrom');
            var toDateEl = document.getElementById('asfCustomDateTo');
            if (fromDateEl) fromDateEl.addEventListener('change', updateAsfSummary);
            if (toDateEl) toDateEl.addEventListener('change', updateAsfSummary);

            // Weekly Rotation toggle switch
            var rotationSwitch = document.getElementById('asfEnableRotationSwitch');
            if (rotationSwitch) {
                rotationSwitch.addEventListener('change', function() {
                    asfState.enableRotation = rotationSwitch.checked;
                    renderAsfRotationTimeline();
                    updateAsfSummary();
                });
            }

            // Stepper Navigation Next / Prev / Steps
            var nextStepBtn = document.getElementById('asfNextStepBtn');
            if (nextStepBtn) {
                nextStepBtn.addEventListener('click', function() {
                    setAsfStep(asfCurrentStep + 1);
                });
            }

            var prevStepBtn = document.getElementById('asfPrevStepBtn');
            if (prevStepBtn) {
                prevStepBtn.addEventListener('click', function() {
                    setAsfStep(asfCurrentStep - 1);
                });
            }

            document.querySelectorAll('.asf-step-item').forEach(function(item) {
                item.addEventListener('click', function() {
                    var targetStep = parseInt(item.getAttribute('data-step'), 10);
                    if (targetStep) setAsfStep(targetStep);
                });
            });

            // Confirm Button
            var confirmBtn = document.getElementById('asfConfirmAssignBtn');
            if (confirmBtn) confirmBtn.addEventListener('click', asfApplyShiftAssignments);
        })();

        // Pre-seed default weekly shift rotation for Developers (Part 1: Morning, Part 2: Evening, Part 3: Night)
        // using Wednesday anchor day (Wed to Wed cycle)
        (function initDefaultDeveloperRotation() {
            var devEmps = employees.filter(function(e) { return e.role === 'Developer'; });
            if (devEmps.length > 0) {
                var baseWed = getAnchorDateFor(new Date(), 3); // Wednesday anchor
                var baseWedStr = formatDateObj(baseWed);
                var cycleShifts = [2, 3, 4]; // Morning (2), Evening (3), Night (4)
                var P = 3;
                devEmps.forEach(function(emp, idx) {
                    var bIdx = idx % P;
                    emp.rotation = {
                        enabled: true,
                        frequency: 'weekly',
                        cycleShifts: cycleShifts.slice(),
                        batchIndex: bIdx,
                        anchorDay: 3, // Wednesday
                        baseDate: baseWedStr
                    };
                    emp.shift_id = cycleShifts[bIdx];
                });
            }
        })();

        // Active Banner button: "Configure Shift Schedule"
        var bannerOpenShiftScheduleBtn = document.getElementById('bannerOpenShiftScheduleBtn');
        if (bannerOpenShiftScheduleBtn) {
            bannerOpenShiftScheduleBtn.addEventListener('click', function() {
                openShiftScheduleConfigModal();
            });
        }

        // Top button: "Assign Shift" in page header
        var openAssignShiftFlowBtn = document.getElementById('openAssignShiftFlowBtn');
        if (openAssignShiftFlowBtn) {
            openAssignShiftFlowBtn.addEventListener('click', function() {
                openAssignShiftFlowModal(null, false);
            });
        }

        // Table header button
        if (assignShiftTopBtn) {
            assignShiftTopBtn.addEventListener('click', function() {
                openAssignShiftFlowModal(selectedIds.size > 0 ? Array.from(selectedIds) : null, false);
            });
        }

        // Bulk action bar button
        if (bulkAssignBtn) {
            bulkAssignBtn.addEventListener('click', function() {
                if (selectedIds.size > 0) {
                    openAssignShiftFlowModal(Array.from(selectedIds), false);
                } else if (activeDeptCards.size > 0) {
                    var deptEmpIds = employees.filter(function(emp) { return activeDeptCards.has(emp.role); }).map(function(emp) { return emp.id; });
                    if (deptEmpIds.length) openAssignShiftFlowModal(deptEmpIds, false);
                } else if (activeGenderCard) {
                    var gVal = activeGenderCard.dataset.filter;
                    var gEmpIds = employees.filter(function(emp) { return gVal === 'all' ? true : emp.gender === gVal; }).map(function(emp) { return emp.id; });
                    if (gEmpIds.length) openAssignShiftFlowModal(gEmpIds, false);
                } else {
                    openAssignShiftFlowModal(null, false);
                }
            });
        }

        /* ==================================================================
           2. SHIFT SCHEDULE CONFIGURATION MODAL CONTROLLER
           ------------------------------------------------------------------
           Structure:
           2. Shift Schedule
           ├─ Target Scope (Department & Designation)
           ├─ Schedule Type (Daily / Weekly / Monthly)
           ├─ Effective From & To
           ├─ Shift Rotation Pattern
           └─ Schedule Calendar
           ================================================================== */

        var shifts = Array.isArray(window.shiftScheduleShifts) ? window.shiftScheduleShifts : [];

        var ssmState = {
            scheduleName: 'Standard 3-Shift Weekly Rotation Schedule 2026',
            department: 'Developer',
            designation: 'ALL',
            scheduleType: 'week', // 'week' | 'month' | 'permanent' | 'custom'
            effectiveFrom: '',
            effectiveTo: '',
            anchorDay: 3, // Wednesday anchor (Wed to Wed)
            frequency: 'weekly',
            batchesCount: 3,
            shiftCycle: [2, 3, 4], // Part 1: Morning (2), Part 2: Evening (3), Part 3: Night (4)
            rotationEnabled: true, // true: rotational shift by batches, false: fixed single shift
            fixedShiftId: 1, // single shift id when rotation is disabled
            scopeMode: 'department', // 'department' | 'employee'
            selectedEmpIds: new Set(), // set of employee IDs selected by name
            offDays: ['Sun'],
            workDays: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            autoHolidayOff: true,
            allowOvertime: false
        };

        function toISODate(d) {
            if (!d || isNaN(d.getTime())) return '';
            var y = d.getFullYear();
            var m = String(d.getMonth() + 1).padStart(2, '0');
            var day = String(d.getDate()).padStart(2, '0');
            return y + '-' + m + '-' + day;
        }

        function parseISODate(s) {
            if (!s) return null;
            var parts = s.split('-');
            if (parts.length !== 3) return null;
            var d = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
            return isNaN(d.getTime()) ? null : d;
        }

        function formatDisplayDateShort(d) {
            if (!d) return '';
            var mn = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return mn[d.getMonth()] + ' ' + String(d.getDate()).padStart(2, '0');
        }

        function getSsmTargetEmployees() {
            var emps = Array.isArray(employees) ? employees : (Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees : []);
            if (ssmState.scopeMode === 'employee') {
                return emps.filter(function(emp) {
                    return ssmState.selectedEmpIds.has(emp.id);
                });
            } else {
                return emps.filter(function(emp) {
                    if (ssmState.department !== 'ALL' && emp.role !== ssmState.department) return false;
                    if (ssmState.designation !== 'ALL' && emp.sub_role !== ssmState.designation) return false;
                    return true;
                });
            }
        }

        function updateSsmTargetSummary() {
            var targets = getSsmTargetEmployees();
            var badge = document.getElementById('ssmSelectedEmpBadge');
            var info = document.getElementById('ssmScopeInfoText');
            if (badge) {
                badge.textContent = targets.length + ' Employees Included';
            }
            if (info) {
                if (ssmState.scopeMode === 'employee') {
                    if (targets.length === 0) {
                        info.textContent = 'No employees selected. Search or choose employees from the list above.';
                    } else if (targets.length <= 3) {
                        var names = targets.map(function(t) { return t.name; }).join(', ');
                        info.textContent = 'Selected by Name: ' + names;
                    } else {
                        info.textContent = targets.length + ' specific employees selected across departments';
                    }
                } else {
                    var deptTxt = ssmState.department === 'ALL' ? 'all departments' : ssmState.department;
                    var desigTxt = ssmState.designation === 'ALL' ? 'all roles' : ssmState.designation;
                    info.textContent = 'Applies to ' + targets.length + ' staff in ' + deptTxt + ' (' + desigTxt + ')';
                }
            }
        }

        function renderSsmEmployeeList(searchTerm) {
            var container = document.getElementById('ssmEmpListContainer');
            if (!container) return;

            var emps = Array.isArray(employees) ? employees : (Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees : []);
            var term = (searchTerm || '').trim().toLowerCase();

            var filtered = emps.filter(function(emp) {
                if (!term) return true;
                var n = (emp.name || '').toLowerCase();
                var r = (emp.role || '').toLowerCase();
                var sr = (emp.sub_role || '').toLowerCase();
                var id = String(emp.emp_id || emp.id || '');
                return n.indexOf(term) !== -1 || r.indexOf(term) !== -1 || sr.indexOf(term) !== -1 || id.indexOf(term) !== -1;
            });

            if (filtered.length === 0) {
                container.innerHTML = '<div class="text-center text-muted py-3 small"><i class="bi bi-search me-1"></i>No employees found matching "' + escapeHtml(term) + '"</div>';
                return;
            }

            var html = '<div class="row g-2">';
            filtered.forEach(function(emp) {
                var isChecked = ssmState.selectedEmpIds.has(emp.id);
                var avatarSrc = './assets/img/' + (emp.avatar || 'profile-1.jpg');
                html += '<div class="col-md-4 col-sm-6">' +
                    '<label class="d-flex align-items-center gap-2 p-2 rounded-2 border ' + (isChecked ? 'border-primary bg-primary bg-opacity-10' : 'bg-white') + ' mb-0 w-100 ssm-emp-check-label ssh-pointer ssh-trans" data-emp-id="' + emp.id + '">' +
                        '<input type="checkbox" class="form-check-input mt-0 ssm-emp-checkbox ssh-pointer" value="' + emp.id + '" ' + (isChecked ? 'checked' : '') + '>' +
                        '<img src="' + avatarSrc + '" alt="" class="ssh-avatar-30b">' +
                        '<div class="flex-grow-1 ssh-line-clamp">' +
                            '<div class="fw-bold text-dark text-truncate ssh-fs-12">' + escapeHtml(emp.name) + '</div>' +
                            '<div class="text-muted small text-truncate ssh-fs-105">' + escapeHtml(emp.role) + (emp.sub_role ? ' · ' + escapeHtml(emp.sub_role) : '') + '</div>' +
                        '</div>' +
                    '</label>' +
                '</div>';
            });
            html += '</div>';

            container.innerHTML = html;

            var checkboxes = container.querySelectorAll('.ssm-emp-checkbox');
            checkboxes.forEach(function(cb) {
                cb.addEventListener('change', function() {
                    var empId = parseInt(this.value, 10);
                    if (this.checked) {
                        ssmState.selectedEmpIds.add(empId);
                    } else {
                        ssmState.selectedEmpIds.delete(empId);
                    }
                    var label = this.closest('.ssm-emp-check-label');
                    if (label) {
                        label.classList.toggle('border-primary', this.checked);
                        label.classList.toggle('bg-primary', this.checked);
                        label.classList.toggle('bg-opacity-10', this.checked);
                        label.classList.toggle('bg-white', !this.checked);
                    }
                    updateSsmTargetSummary();
                    renderSsmShiftCycleCards();
                    renderSsmCalendarPreview();
                });
            });
        }

        function setSsmScopeMode(mode) {
            var isDept = (mode === 'department');
            ssmState.scopeMode = mode;

            var deptBtn = document.getElementById('ssmScopeDeptBtn');
            var empBtn = document.getElementById('ssmScopeEmpBtn');
            if (deptBtn) {
                deptBtn.classList.toggle('active', isDept);
                deptBtn.classList.toggle('btn-primary', isDept);
                deptBtn.classList.toggle('btn-outline-primary', !isDept);
            }
            if (empBtn) {
                empBtn.classList.toggle('active', !isDept);
                empBtn.classList.toggle('btn-primary', !isDept);
                empBtn.classList.toggle('btn-outline-primary', isDept);
            }

            var deptView = document.getElementById('ssmScopeDeptView');
            var empView = document.getElementById('ssmScopeEmpView');
            if (deptView) deptView.classList.toggle('d-none', !isDept);
            if (empView) empView.classList.toggle('d-none', isDept);

            if (!isDept) {
                if (ssmState.selectedEmpIds.size === 0) {
                    var emps = Array.isArray(employees) ? employees : (Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees : []);
                    var initPool = emps.filter(function(e) {
                        return ssmState.department === 'ALL' || e.role === ssmState.department;
                    });
                    initPool.forEach(function(e) { ssmState.selectedEmpIds.add(e.id); });
                }
                var searchInput = document.getElementById('ssmEmpSearchInput');
                renderSsmEmployeeList(searchInput ? searchInput.value : '');
            }

            updateSsmTargetSummary();
            renderSsmShiftCycleCards();
            renderSsmCalendarPreview();
        }

        function populateSsmDesignations() {
            var select = document.getElementById('ssmDesignationSelect');
            if (!select) return;
            select.innerHTML = '<option value="ALL" selected>All Designations</option>';

            var emps = Array.isArray(employees) ? employees : (Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees : []);
            var eligible = emps.filter(function(e) {
                return ssmState.department === 'ALL' || e.role === ssmState.department;
            });

            var subRoles = [];
            eligible.forEach(function(e) {
                if (e.sub_role && subRoles.indexOf(e.sub_role) === -1) subRoles.push(e.sub_role);
            });
            subRoles.sort();

            subRoles.forEach(function(sr) {
                var opt = document.createElement('option');
                opt.value = sr;
                opt.textContent = sr;
                select.appendChild(opt);
            });
            if (window.ghSelect2) window.ghSelect2(select);
        }

        function renderSsmShiftCycleCards() {
            var row = document.getElementById('ssmShiftCycleCardsRow');
            if (!row) return;
            row.innerHTML = '';

            var targets = getSsmTargetEmployees();
            var P = ssmState.batchesCount;
            var defaultCycle = [2, 3, 4, 1]; // Morning, Evening, Night, General

            while (ssmState.shiftCycle.length < P) {
                ssmState.shiftCycle.push(defaultCycle[ssmState.shiftCycle.length % defaultCycle.length]);
            }
            if (ssmState.shiftCycle.length > P) {
                ssmState.shiftCycle = ssmState.shiftCycle.slice(0, P);
            }

            var colWidth = P === 2 ? 'col-md-6' : (P === 4 ? 'col-md-3' : 'col-md-4');
            var batchThemes = [
                { title: 'Part 1', badge: 'Morning / Primary', cls: 'ssh-theme-1' },
                { title: 'Part 2', badge: 'Evening / Secondary', cls: 'ssh-theme-2' },
                { title: 'Part 3', badge: 'Night / Third', cls: 'ssh-theme-3' },
                { title: 'Part 4', badge: 'Support / Fourth', cls: 'ssh-theme-4' }
            ];

            var activeEnabledShifts = (Array.isArray(window.shiftScheduleShifts) ? window.shiftScheduleShifts : []).filter(function(s) {
                return s.status === 'Enable';
            });

            for (var i = 0; i < P; i++) {
                var theme = batchThemes[i] || batchThemes[0];
                var empCount = Math.floor(targets.length / P) + (i < (targets.length % P) ? 1 : 0);
                var curShiftId = ssmState.shiftCycle[i];

                var nextShiftIndex = (i + 1) % P;
                var nextShiftId = ssmState.shiftCycle[nextShiftIndex];
                var nextShiftObj = (shiftsById && shiftsById[nextShiftId]) ? shiftsById[nextShiftId] : shifts.find(function(s) { return s.id === nextShiftId; });
                var nextShiftName = nextShiftObj ? nextShiftObj.shift_name : 'Next Shift';

                var cardCol = document.createElement('div');
                cardCol.className = colWidth;

                var html = '<div class="card h-100 p-3 ssh-batch-card ' + theme.cls + '">' +
                    '<div class="d-flex align-items-center justify-content-between mb-2">' +
                        '<span class="fw-bold ssh-batch-title">' + theme.title + '</span>' +
                        '<span class="badge ssh-batch-badge">' + empCount + ' Staff</span>' +
                    '</div>' +
                    '<label class="small text-muted mb-1 ssh-fs-11">Assigned Shift (Starting):</label>' +
                    '<select class="form-select form-select-sm ssm-shift-select ssh-select-sm" data-batch-index="' + i + '">';

                activeEnabledShifts.forEach(function(s) {
                    var isSel = (s.id === curShiftId) ? 'selected' : '';
                    html += '<option value="' + s.id + '" ' + isSel + '>' + escapeHtml(s.shift_name) + ' (' + s.start_time + ' - ' + s.end_time + ')</option>';
                });

                html += '</select>';

                if (ssmState.scheduleType === 'weekly' && ssmState.frequency !== 'fixed') {
                    html += '<div class="mt-2 pt-2 border-top small ssh-batch-foot">' +
                        '<i class="bi bi-arrow-repeat me-1"></i> Rotates to: <b>' + escapeHtml(nextShiftName) + '</b> next cycle' +
                    '</div>';
                }

                html += '</div>';
                cardCol.innerHTML = html;
                row.appendChild(cardCol);
            }

            var selects = row.querySelectorAll('.ssm-shift-select');
            selects.forEach(function(sel) {
                sel.addEventListener('change', function() {
                    var bIdx = parseInt(this.getAttribute('data-batch-index'), 10);
                    var newShiftId = parseInt(this.value, 10);
                    if (!isNaN(bIdx) && newShiftId) {
                        ssmState.shiftCycle[bIdx] = newShiftId;
                        renderSsmShiftCycleCards();
                        renderSsmCalendarPreview();
                    }
                });
            });
        }

        function renderSsmCalendarPreview() {
            var thead = document.getElementById('ssmCalendarPreviewHead');
            var tbody = document.getElementById('ssmCalendarPreviewBody');
            if (!thead || !tbody) return;

            var P = ssmState.batchesCount;
            var targets = getSsmTargetEmployees();
            var anchorDay = ssmState.anchorDay;

            var baseDate = parseISODate(ssmState.effectiveFrom);
            if (!baseDate) {
                baseDate = getAnchorDateFor(new Date(), anchorDay);
            } else {
                baseDate = getAnchorDateFor(baseDate, anchorDay);
            }

            var weeks = [];
            for (var w = 0; w < 4; w++) {
                var wStart = new Date(baseDate.getTime() + (w * 7 * 86400000));
                var wEnd = new Date(wStart.getTime() + (6 * 86400000));
                weeks.push({
                    title: 'Week ' + (w + 1),
                    dateStr: formatDisplayDateShort(wStart) + ' – ' + formatDisplayDateShort(wEnd)
                });
            }

            var headHtml = '<tr>' +
                '<th class="ssh-th-group">Batch / Part Group</th>';
            weeks.forEach(function(wk, idx) {
                var isFirst = idx === 0 ? ' <span class="badge bg-primary text-white ssh-badge-active">Active</span>' : '';
                headHtml += '<th class="ssh-th-week">' + wk.title + isFirst + '<span class="d-block small text-muted fw-normal ssh-fs-105">' + wk.dateStr + '</span></th>';
            });
            headHtml += '</tr>';
            thead.innerHTML = headHtml;

            function getPillHtml(shiftId) {
                var s = (shiftsById && shiftsById[shiftId]) ? shiftsById[shiftId] : shifts.find(function(x) { return x.id === shiftId; });
                if (!s) return '<span class="badge bg-secondary">Unassigned</span>';
                var spillCls = 'ssh-spill-0', icon = 'bi-clock';
                if (s.id === 2) { spillCls = 'ssh-spill-2'; icon = 'bi-sun-fill'; }
                else if (s.id === 3) { spillCls = 'ssh-spill-3'; icon = 'bi-sunset-fill'; }
                else if (s.id === 4) { spillCls = 'ssh-spill-4'; icon = 'bi-moon-stars-fill'; }
                else if (s.id === 1) { spillCls = 'ssh-spill-1'; icon = 'bi-briefcase-fill'; }

                return '<div class="p-1 px-2 rounded-2 text-center ssh-spill ' + spillCls + '">' +
                    '<i class="bi ' + icon + ' me-1"></i>' + escapeHtml(s.shift_name) +
                    '<div class="small fw-normal ssh-fs-95 ssh-op-90">' + s.start_time + ' - ' + s.end_time + '</div>' +
                '</div>';
            }

            var bodyHtml = '';
            var isRotation = ssmState.rotationEnabled && (ssmState.scheduleType !== 'custom' || ssmState.frequency !== 'fixed');

            if (!ssmState.rotationEnabled) {
                // Fixed Shift Mode: Same single shift for all employees and all weeks
                var fixedShiftId = ssmState.fixedShiftId || 1;
                bodyHtml += '<tr>' +
                    '<td class="ssh-td-left">' +
                        '<div class="fw-bold text-dark ssh-fs-125">All Staff (Fixed Shift)</div>' +
                        '<div class="small text-muted ssh-fs-11"><i class="bi bi-people me-1"></i>' + targets.length + ' Employees</div>' +
                    '</td>';
                for (var wIdx = 0; wIdx < 4; wIdx++) {
                    bodyHtml += '<td class="ssh-td-center">' + getPillHtml(fixedShiftId) + '</td>';
                }
                bodyHtml += '</tr>';
            } else {
                // Rotational Shift Mode: Batch-by-batch rotation
                for (var b = 0; b < P; b++) {
                    var count = Math.floor(targets.length / P) + (b < (targets.length % P) ? 1 : 0);
                    bodyHtml += '<tr>' +
                        '<td class="ssh-td-left">' +
                            '<div class="fw-bold text-dark ssh-fs-125">Part ' + (b + 1) + '</div>' +
                            '<div class="small text-muted ssh-fs-11"><i class="bi bi-people me-1"></i>' + count + ' Employees</div>' +
                        '</td>';

                    for (var wIdx = 0; wIdx < 4; wIdx++) {
                        var cycleIdx = isRotation ? ((b + wIdx) % P) : b;
                        var shiftId = ssmState.shiftCycle[cycleIdx];
                        bodyHtml += '<td class="ssh-td-center">' + getPillHtml(shiftId) + '</td>';
                    }

                    bodyHtml += '</tr>';
                }
            }

            tbody.innerHTML = bodyHtml;
        }

        /* ------------------------------------------------------------------
           Schedule Type & Effective Dates Condition Controller
           Options: week, month, permanent, custom
           ------------------------------------------------------------------ */

        function syncSsmWeek(preset) {
            var now = new Date();
            var weekFromInput = document.getElementById('ssmWeekFrom');
            var weekToInput = document.getElementById('ssmWeekTo');
            var hiddenFrom = document.getElementById('ssmEffectiveFrom');
            var hiddenTo = document.getElementById('ssmEffectiveTo');
            var alertText = document.getElementById('ssmWeekAlertText');

            var fromDate, toDate;
            if (preset === 'mon_to_sun') {
                ssmState.anchorDay = 1;
                var mon = new Date(now);
                var day = mon.getDay();
                var diff = mon.getDate() - day + (day === 0 ? -6 : 1);
                mon.setDate(diff);
                var sun = new Date(mon);
                sun.setDate(sun.getDate() + 6);
                fromDate = mon;
                toDate = sun;
            } else if (preset === 'next_week') {
                var base = parseDDMMYYYY(weekFromInput && weekFromInput.value) || now;
                var nextW = new Date(base.getTime() + (7 * 86400000));
                fromDate = nextW;
                toDate = new Date(nextW.getTime() + (7 * 86400000));
            } else { // default 'wed_to_wed' or datepicker change
                ssmState.anchorDay = 3;
                if (weekFromInput && weekFromInput.value && !preset) {
                    fromDate = parseDDMMYYYY(weekFromInput.value) || getAnchorDateFor(now, 3);
                } else {
                    fromDate = getAnchorDateFor(now, 3);
                }
                toDate = new Date(fromDate.getTime() + (7 * 86400000));
            }

            var fromStr = toISODate(fromDate);
            var toStr = toISODate(toDate);

            ssmState.effectiveFrom = fromStr;
            ssmState.effectiveTo = toStr;

            if (weekFromInput) weekFromInput.value = formatDateObj(fromDate);
            if (weekToInput) weekToInput.value = formatDateObj(toDate);
            if (hiddenFrom) hiddenFrom.value = fromStr;
            if (hiddenTo) hiddenTo.value = toStr;


            if (alertText) {
                var dayName = ssmState.anchorDay === 3 ? 'Wednesday' : (ssmState.anchorDay === 1 ? 'Monday' : 'cycle day');
                alertText.textContent = 'Weekly 7-Day Cycle (' + formatDisplayDateShort(fromDate) + ' to ' + formatDisplayDateShort(toDate) + '): Shifts rotate automatically every ' + dayName + '.';
            }
        }

        function syncSsmMonth(preset) {
            var now = new Date();
            var monthPicker = document.getElementById('ssmMonthPicker');
            var monthFrom = document.getElementById('ssmMonthFrom');
            var monthTo = document.getElementById('ssmMonthTo');
            var hiddenFrom = document.getElementById('ssmEffectiveFrom');
            var hiddenTo = document.getElementById('ssmEffectiveTo');
            var alertText = document.getElementById('ssmMonthAlertText');

            var targetYear = now.getFullYear();
            var targetMonth = now.getMonth();

            if (preset === 'next_month') {
                targetMonth += 1;
                if (targetMonth > 11) {
                    targetMonth = 0;
                    targetYear += 1;
                }
            } else if (!preset && monthPicker && monthPicker.value) {
                // date-picker gives DD-MM-YYYY; the month section only uses its month
                var pickedMonthDate = parseDDMMYYYY(monthPicker.value);
                if (pickedMonthDate) {
                    targetYear = pickedMonthDate.getFullYear();
                    targetMonth = pickedMonthDate.getMonth();
                }
            }

            var firstDay = new Date(targetYear, targetMonth, 1);
            var lastDay = new Date(targetYear, targetMonth + 1, 0);

            var fromStr = toISODate(firstDay);
            var toStr = toISODate(lastDay);

            ssmState.effectiveFrom = fromStr;
            ssmState.effectiveTo = toStr;

            if (monthPicker) monthPicker.value = formatDateObj(firstDay);
            if (monthFrom) monthFrom.value = formatDateObj(firstDay);
            if (monthTo) monthTo.value = formatDateObj(lastDay);
            if (hiddenFrom) hiddenFrom.value = fromStr;
            if (hiddenTo) hiddenTo.value = toStr;

            var mn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            if (alertText) {
                alertText.textContent = 'Monthly Schedule for ' + mn[targetMonth] + ' ' + targetYear + ' (' + formatDisplayDateShort(firstDay) + ' to ' + formatDisplayDateShort(lastDay) + '). Shifts rotate automatically across weeks.';
            }
        }

        function syncSsmPermanent() {
            var now = new Date();
            var permFrom = document.getElementById('ssmPermFrom');
            var hiddenFrom = document.getElementById('ssmEffectiveFrom');
            var hiddenTo = document.getElementById('ssmEffectiveTo');

            var fromDate = (permFrom && permFrom.value) ? (parseDDMMYYYY(permFrom.value) || now) : now;
            var fromStr = toISODate(fromDate);

            ssmState.effectiveFrom = fromStr;
            ssmState.effectiveTo = '';

            if (permFrom) permFrom.value = formatDateObj(fromDate);
            if (hiddenFrom) hiddenFrom.value = fromStr;
            if (hiddenTo) hiddenTo.value = '';
        }

        function syncSsmCustom() {
            var now = new Date();
            var customFrom = document.getElementById('ssmCustomFrom');
            var customTo = document.getElementById('ssmCustomTo');
            var hiddenFrom = document.getElementById('ssmEffectiveFrom');
            var hiddenTo = document.getElementById('ssmEffectiveTo');

            var fromDate = (customFrom && customFrom.value) ? (parseDDMMYYYY(customFrom.value) || now) : now;
            var toDate = (customTo && customTo.value) ? parseDDMMYYYY(customTo.value) : new Date(fromDate.getTime() + (14 * 86400000));

            var fromStr = toISODate(fromDate);
            var toStr = toISODate(toDate);

            ssmState.effectiveFrom = fromStr;
            ssmState.effectiveTo = toStr;

            if (customFrom) customFrom.value = formatDateObj(fromDate);
            if (customTo) customTo.value = formatDateObj(toDate);
            if (hiddenFrom) hiddenFrom.value = fromStr;
            if (hiddenTo) hiddenTo.value = toStr;
        }

        function updateSsmConditionView(type) {
            if (!type) type = 'week';
            if (type === 'weekly') type = 'week';
            if (type === 'monthly') type = 'month';
            ssmState.scheduleType = type;

            var typeOpts = document.querySelectorAll('.ssm-type-option');
            typeOpts.forEach(function(opt) {
                var t = opt.getAttribute('data-type');
                var isAct = (t === type);
                opt.classList.toggle('active', isAct);
                var chk = opt.querySelector('.ssm-type-check');
                if (chk) chk.classList.toggle('d-none', !isAct);
            });

            var badge = document.getElementById('ssmSelectedTypeBadge');
            if (badge) {
                var labelMap = {
                    'week': 'Week Selected',
                    'month': 'Month Selected',
                    'permanent': 'Permanent Selected',
                    'custom': 'Custom Range Selected'
                };
                badge.textContent = labelMap[type] || 'Week Selected';
            }

            var secWeek = document.getElementById('ssmConditionWeek');
            var secMonth = document.getElementById('ssmConditionMonth');
            var secPerm = document.getElementById('ssmConditionPermanent');
            var secCustom = document.getElementById('ssmConditionCustom');

            if (secWeek) secWeek.classList.toggle('d-none', type !== 'week');
            if (secMonth) secMonth.classList.toggle('d-none', type !== 'month');
            if (secPerm) secPerm.classList.toggle('d-none', type !== 'permanent');
            if (secCustom) secCustom.classList.toggle('d-none', type !== 'custom');

            if (type === 'week') {
                syncSsmWeek();
            } else if (type === 'month') {
                syncSsmMonth();
            } else if (type === 'permanent') {
                syncSsmPermanent();
            } else if (type === 'custom') {
                syncSsmCustom();
            }

            renderSsmShiftCycleCards();
            renderSsmCalendarPreview();
        }

        function setSsmPresetDuration(preset) {
            if (preset === 'wed_to_wed' || preset === 'this_week') {
                updateSsmConditionView('week');
                if (preset === 'this_week') syncSsmWeek('mon_to_sun');
                else syncSsmWeek('wed_to_wed');
            } else if (preset === 'this_month') {
                updateSsmConditionView('month');
                syncSsmMonth('current_month');
            } else if (preset === 'permanent') {
                updateSsmConditionView('permanent');
                syncSsmPermanent();
            }
            renderSsmCalendarPreview();
        }

        function populateSsmFixedShiftSelect() {
            var sel = document.getElementById('ssmFixedShiftSelect');
            if (!sel) return;
            sel.innerHTML = '';
            var availShifts = Array.isArray(shifts) ? shifts : [];
            availShifts.forEach(function(s) {
                var opt = document.createElement('option');
                opt.value = s.id;
                opt.textContent = s.shift_name + ' (' + s.start_time + ' – ' + s.end_time + ')';
                if (s.id === ssmState.fixedShiftId) opt.selected = true;
                sel.appendChild(opt);
            });
            if (window.ghSelect2) window.ghSelect2(sel);
        }

        function setSsmRotationMode(mode) {
            var isRot = (mode === 'rotation');
            ssmState.rotationEnabled = isRot;

            var rotBtn = document.getElementById('ssmModeRotationBtn');
            var fixedBtn = document.getElementById('ssmModeFixedBtn');
            if (rotBtn) {
                rotBtn.classList.toggle('active', isRot);
                rotBtn.classList.toggle('btn-primary', isRot);
                rotBtn.classList.toggle('btn-outline-primary', !isRot);
            }
            if (fixedBtn) {
                fixedBtn.classList.toggle('active', !isRot);
                fixedBtn.classList.toggle('btn-primary', !isRot);
                fixedBtn.classList.toggle('btn-outline-primary', isRot);
            }

            var rotWrap = document.getElementById('ssmRotationFlowWrap');
            var fixedWrap = document.getElementById('ssmFixedShiftFlowWrap');
            if (rotWrap) rotWrap.classList.toggle('d-none', !isRot);
            if (fixedWrap) fixedWrap.classList.toggle('d-none', isRot);

            if (!isRot) {
                populateSsmFixedShiftSelect();
            }

            renderSsmShiftCycleCards();
            renderSsmCalendarPreview();
        }

        function openShiftScheduleConfigModal(preselectedTarget) {
            var modalEl = document.getElementById('shiftScheduleConfigModal');
            if (!modalEl) {
                console.error('Modal #shiftScheduleConfigModal not found');
                return;
            }

            try {
                if (Array.isArray(preselectedTarget)) {
                    ssmState.scopeMode = 'employee';
                    ssmState.selectedEmpIds = new Set(preselectedTarget);
                } else if (typeof preselectedTarget === 'number') {
                    ssmState.scopeMode = 'employee';
                    ssmState.selectedEmpIds = new Set([preselectedTarget]);
                } else if (preselectedTarget && typeof preselectedTarget === 'string') {
                    ssmState.department = preselectedTarget;
                    ssmState.scopeMode = 'department';
                    ssmState.selectedEmpIds = new Set();
                } else {
                    ssmState.department = 'Developer';
                    ssmState.scopeMode = 'department';
                    ssmState.selectedEmpIds = new Set();
                }

                ssmState.designation = 'ALL';
                ssmState.scheduleType = 'week';
                ssmState.anchorDay = 3;
                ssmState.batchesCount = 3;
                ssmState.shiftCycle = [2, 3, 4];
                ssmState.rotationEnabled = true;
                ssmState.fixedShiftId = 1;
                ssmState.offDays = ['Sun'];
                ssmState.workDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                var deptSelect = document.getElementById('ssmDepartmentSelect');
                if (deptSelect) deptSelect.value = ssmState.department;

                setSsmScopeMode(ssmState.scopeMode);
                populateSsmDesignations();
                updateSsmTargetSummary();

                var batchBtns = document.querySelectorAll('.ssm-batch-btn');
                batchBtns.forEach(function(b) {
                    var c = parseInt(b.getAttribute('data-batches'), 10);
                    var isAct = (c === ssmState.batchesCount);
                    b.classList.toggle('active', isAct);
                    b.classList.toggle('btn-primary', isAct);
                    b.classList.toggle('btn-outline-primary', !isAct);
                });

                populateSsmFixedShiftSelect();
                setSsmRotationMode('rotation');
                updateSsmConditionView('week');
                renderSsmShiftCycleCards();
                renderSsmCalendarPreview();
            } catch (initErr) {
                console.error('Error during modal init:', initErr);
            }

            try {
                var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            } catch (bErr) {
                if (window.jQuery && jQuery.fn.modal) {
                    jQuery(modalEl).modal('show');
                } else {
                    modalEl.classList.add('show');
                    modalEl.classList.add('ssh-shown');
                    document.body.classList.add('modal-open');
                }
            }
        }

        window.openShiftScheduleConfigModal = openShiftScheduleConfigModal;

        function applySsmSchedule() {
            var targets = getSsmTargetEmployees();
            if (targets.length === 0) {
                if (ssmState.scopeMode === 'employee') {
                    alert('Please select at least one employee from the list to assign shifts.');
                } else {
                    alert('No employees match the selected department/designation scope.');
                }
                return;
            }

            var deptTxt = ssmState.department === 'ALL' ? 'All Departments' : ssmState.department;
            var targetDesc = ssmState.scopeMode === 'employee'
                ? (targets.length <= 2 ? targets.map(function(t) { return t.name; }).join(', ') : targets.length + ' Employees')
                : deptTxt;
            ssmState.scheduleName = 'Shift Schedule (' + targetDesc + ')';

            var fromVal = document.getElementById('ssmEffectiveFrom').value;
            var toVal = document.getElementById('ssmEffectiveTo').value;
            var fromDate = parseISODate(fromVal) || new Date();
            var toDate = (ssmState.scheduleType === 'permanent') ? null : parseISODate(toVal);

            var effFromStr = formatDateObj(fromDate);
            var effToStr = toDate ? formatDateObj(toDate) : null;

            var P = ssmState.batchesCount;
            var cycleShifts = ssmState.shiftCycle.slice(0, P);
            var anchorDay = ssmState.anchorDay;
            var isRotation = ssmState.rotationEnabled && (ssmState.scheduleType !== 'custom' || ssmState.frequency !== 'fixed');

            var baseAnchor = getAnchorDateFor(fromDate, anchorDay);
            var baseAnchorStr = formatDateObj(baseAnchor);

            var targetIdSet = new Set(targets.map(function(e) { return e.id; }));

            employees = employees.map(function(emp) {
                if (!targetIdSet.has(emp.id)) return emp;

                var targetIdx = targets.findIndex(function(t) { return t.id === emp.id; });
                var assignedShiftId;
                var rotObj = null;

                if (ssmState.rotationEnabled) {
                    var bIdx = targetIdx >= 0 ? (targetIdx % P) : 0;
                    assignedShiftId = cycleShifts[bIdx];
                    if (isRotation) {
                        rotObj = {
                            enabled: true,
                            frequency: ssmState.frequency,
                            cycleShifts: cycleShifts.slice(),
                            batchIndex: bIdx,
                            anchorDay: anchorDay,
                            baseDate: baseAnchorStr
                        };
                    }
                } else {
                    assignedShiftId = ssmState.fixedShiftId || 1;
                    rotObj = null; // No rotation
                }

                var newShifts = Object.assign({}, emp.shifts || {});
                ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(function(d) {
                    newShifts[d] = assignedShiftId;
                });

                return Object.assign({}, emp, {
                    shift_id: assignedShiftId,
                    schedule_name: ssmState.scheduleName,
                    schedule_type: ssmState.scheduleType,
                    effective_from: effFromStr,
                    effective_to: effToStr,
                    shifts: newShifts,
                    rotation: rotObj
                });
            });

            var modalEl = document.getElementById('shiftScheduleConfigModal');
            try {
                var modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
                else if (window.jQuery && jQuery.fn.modal) jQuery(modalEl).modal('hide');
                else { modalEl.classList.remove('show', 'ssh-shown'); document.body.classList.remove('modal-open'); }
            } catch(e) {}

            renderTable();

            var cycleTxt = ssmState.rotationEnabled
                ? ((isRotation && anchorDay === 3) ? 'Wed ➔ Wed Rotational Cycle' : 'Weekly Rotation')
                : 'Fixed Shift (Same shift for all days - No Rotation)';
            scrToast(
                '<b>' + escapeHtml(ssmState.scheduleName) + '</b> applied to <b>' + targets.length + '</b> employee' + (targets.length > 1 ? 's' : '') + '!<br>' +
                '<span class="small opacity-75">' + cycleTxt + ' (' + escapeHtml(ssmState.scheduleType.toUpperCase()) + ')</span>',
                'bi-check-circle-fill'
            );
        }

        window.applySsmSchedule = applySsmSchedule;

        // Bind event listeners for 2. Shift Schedule Modal
        (function initSsmEvents() {
            // Global click delegation for opening modal
            document.addEventListener('click', function(e) {
                var btn = e.target.closest('#openShiftScheduleModalBtn, #tableShiftScheduleBtn, #bannerOpenShiftScheduleBtn');
                if (btn) {
                    e.preventDefault();
                    openShiftScheduleConfigModal();
                }
            });

            // Scope mode toggle: By Department vs By Employee Name
            var scopeModeBtns = document.querySelectorAll('.ssm-scope-mode-btn');
            scopeModeBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var mode = this.getAttribute('data-mode');
                    setSsmScopeMode(mode);
                });
            });

            // Search employee by name
            var empSearchInput = document.getElementById('ssmEmpSearchInput');
            if (empSearchInput) {
                empSearchInput.addEventListener('input', function() {
                    renderSsmEmployeeList(this.value);
                });
            }

            // Select all employees button
            var selectAllEmpsBtn = document.getElementById('ssmSelectAllEmpsBtn');
            if (selectAllEmpsBtn) {
                selectAllEmpsBtn.addEventListener('click', function() {
                    var emps = Array.isArray(employees) ? employees : (Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees : []);
                    var term = (empSearchInput ? empSearchInput.value : '').trim().toLowerCase();
                    var toAdd = emps.filter(function(emp) {
                        if (!term) return true;
                        var n = (emp.name || '').toLowerCase();
                        var r = (emp.role || '').toLowerCase();
                        var sr = (emp.sub_role || '').toLowerCase();
                        var id = String(emp.emp_id || emp.id || '');
                        return n.indexOf(term) !== -1 || r.indexOf(term) !== -1 || sr.indexOf(term) !== -1 || id.indexOf(term) !== -1;
                    });
                    toAdd.forEach(function(emp) {
                        ssmState.selectedEmpIds.add(emp.id);
                    });
                    renderSsmEmployeeList(term);
                    updateSsmTargetSummary();
                    renderSsmShiftCycleCards();
                    renderSsmCalendarPreview();
                });
            }

            // Deselect / Clear all employees button
            var deselectAllEmpsBtn = document.getElementById('ssmDeselectAllEmpsBtn');
            if (deselectAllEmpsBtn) {
                deselectAllEmpsBtn.addEventListener('click', function() {
                    var term = (empSearchInput ? empSearchInput.value : '').trim().toLowerCase();
                    if (!term) {
                        ssmState.selectedEmpIds.clear();
                    } else {
                        var emps = Array.isArray(employees) ? employees : (Array.isArray(window.shiftScheduleEmployees) ? window.shiftScheduleEmployees : []);
                        var toRemove = emps.filter(function(emp) {
                            var n = (emp.name || '').toLowerCase();
                            var r = (emp.role || '').toLowerCase();
                            var sr = (emp.sub_role || '').toLowerCase();
                            var id = String(emp.emp_id || emp.id || '');
                            return n.indexOf(term) !== -1 || r.indexOf(term) !== -1 || sr.indexOf(term) !== -1 || id.indexOf(term) !== -1;
                        });
                        toRemove.forEach(function(emp) {
                            ssmState.selectedEmpIds.delete(emp.id);
                        });
                    }
                    renderSsmEmployeeList(term);
                    updateSsmTargetSummary();
                    renderSsmShiftCycleCards();
                    renderSsmCalendarPreview();
                });
            }

            // Rotation mode buttons (Rotational Shift vs Fixed Single Shift)
            var rotModeBtns = document.querySelectorAll('.ssm-rot-mode-btn');
            rotModeBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var mode = this.getAttribute('data-mode');
                    setSsmRotationMode(mode);
                });
            });

            var fixedShiftSel = document.getElementById('ssmFixedShiftSelect');
            if (fixedShiftSel) {
                fixedShiftSel.addEventListener('change', function() {
                    ssmState.fixedShiftId = parseInt(this.value, 10);
                    renderSsmCalendarPreview();
                });
            }

            var deptSel = document.getElementById('ssmDepartmentSelect');
            if (deptSel) {
                deptSel.addEventListener('change', function() {
                    ssmState.department = this.value;
                    populateSsmDesignations();
                    updateSsmTargetSummary();
                    renderSsmShiftCycleCards();
                    renderSsmCalendarPreview();
                });
            }

            var desigSel = document.getElementById('ssmDesignationSelect');
            if (desigSel) {
                desigSel.addEventListener('change', function() {
                    ssmState.designation = this.value;
                    updateSsmTargetSummary();
                    renderSsmShiftCycleCards();
                    renderSsmCalendarPreview();
                });
            }

            // Schedule Type selection (week, month, permanent, custom)
            var typeOptions = document.querySelectorAll('.ssm-type-option');
            typeOptions.forEach(function(opt) {
                opt.addEventListener('click', function() {
                    var t = this.getAttribute('data-type');
                    updateSsmConditionView(t);
                });
            });

            // 1. WEEK Controls
            var weekFrom = document.getElementById('ssmWeekFrom');
            if (weekFrom) {
                weekFrom.addEventListener('change', function() {
                    syncSsmWeek();
                    renderSsmCalendarPreview();
                });
            }
            document.querySelectorAll('.ssm-week-preset-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.ssm-week-preset-btn').forEach(function(b) { b.classList.remove('active'); });
                    this.classList.add('active');
                    var p = this.getAttribute('data-preset');
                    syncSsmWeek(p);
                    renderSsmCalendarPreview();
                });
            });

            // 2. MONTH Controls
            var monthPicker = document.getElementById('ssmMonthPicker');
            if (monthPicker) {
                monthPicker.addEventListener('change', function() {
                    syncSsmMonth();
                    renderSsmCalendarPreview();
                });
            }
            document.querySelectorAll('.ssm-month-preset-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.ssm-month-preset-btn').forEach(function(b) { b.classList.remove('active'); });
                    this.classList.add('active');
                    var p = this.getAttribute('data-preset');
                    syncSsmMonth(p);
                    renderSsmCalendarPreview();
                });
            });

            // 3. PERMANENT Controls
            var permFrom = document.getElementById('ssmPermFrom');
            if (permFrom) {
                permFrom.addEventListener('change', function() {
                    syncSsmPermanent();
                    renderSsmCalendarPreview();
                });
            }

            // 4. CUSTOM Controls
            var customFrom = document.getElementById('ssmCustomFrom');
            if (customFrom) {
                customFrom.addEventListener('change', function() {
                    syncSsmCustom();
                    renderSsmCalendarPreview();
                });
            }
            var customTo = document.getElementById('ssmCustomTo');
            if (customTo) {
                customTo.addEventListener('change', function() {
                    syncSsmCustom();
                    renderSsmCalendarPreview();
                });
            }

            var fromInput = document.getElementById('ssmEffectiveFrom');
            if (fromInput) {
                fromInput.addEventListener('change', function() {
                    ssmState.effectiveFrom = this.value;
                    renderSsmCalendarPreview();
                });
            }
            var toInput = document.getElementById('ssmEffectiveTo');
            if (toInput) {
                toInput.addEventListener('change', function() {
                    ssmState.effectiveTo = this.value;
                    renderSsmCalendarPreview();
                });
            }


            var batchBtns = document.querySelectorAll('.ssm-batch-btn');
            batchBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    batchBtns.forEach(function(b) {
                        b.classList.remove('active', 'btn-primary');
                        b.classList.add('btn-outline-primary');
                    });
                    this.classList.add('active', 'btn-primary');
                    this.classList.remove('btn-outline-primary');

                    var count = parseInt(this.getAttribute('data-batches'), 10);
                    if (count) {
                        ssmState.batchesCount = count;
                        renderSsmShiftCycleCards();
                        renderSsmCalendarPreview();
                    }
                });
            });

            var deployBtn = document.getElementById('ssmDeployScheduleBtn');
            if (deployBtn) {
                deployBtn.addEventListener('click', applySsmSchedule);
            }

            var saveDraftBtn = document.getElementById('ssmSaveDraftBtn');
            if (saveDraftBtn) {
                saveDraftBtn.addEventListener('click', function() {
                    try {
                        localStorage.setItem('gharuda_shift_schedule_draft', JSON.stringify(ssmState));
                        scrToast('<b>Schedule Draft Template Saved!</b><br><small class="text-muted">Configuration saved in browser storage.</small>', 'bi-bookmark-check-fill');
                    } catch (e) {
                        scrToast('Saved draft configuration.', 'bi-check-circle');
                    }
                });
            }
        })();

        function computeWeekRange() {
            var start = new Date();
            var end = new Date();
            end.setDate(end.getDate() + 6);
            return {
                from: start,
                to: end
            };
        }

        function computeMonthRange() {
            var start = new Date();
            var end = new Date(start.getFullYear(), start.getMonth() + 1, 0);
            return {
                from: start,
                to: end
            };
        }

        // ---------------- misc listeners ----------------

        if (showSelect) {
            showSelect.addEventListener('change', function() {
                currentPage = 1;
                renderTable();
            });
        }

        /* ==================================================================
           SHIFT CHANGE REQUEST FLOW
           ------------------------------------------------------------------
           Table la oru shift-badge click panna -> "Shift Change Request"
           modal open aagum -> employee request submit panna -> reporting
           manager ku approval ku poagum (dummy). Requests ellam keela
           "Shift Change Requests" card la list aagum.
           ================================================================== */

        var shiftRequests = [];      // all raised requests (dummy store)
        var requestByCell = {};      // "empId|dd-mm-yyyy" -> request (latest)
        var scrSeq = 0;
        var scrContext = null;       // details of the badge that was clicked
        var scrSelect2Ready = false;

        var scrModalEl = document.getElementById('shiftChangeModal');
        var scrModal = scrModalEl ? bootstrap.Modal.getOrCreateInstance(scrModalEl) : null;

        // ---------- date helpers (weekStartDate & weekDateFor defined above with offset support) ----------

        function monthDateFor(dayNum) {
            return new Date(getSelectedYear(), getSelectedMonth(), dayNum);
        }

        function cellKey(empId, dateStr) {
            return String(empId) + '|' + dateStr;
        }

        function longDate(date) {
            var mn = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return date.getDate() + ' ' + mn[date.getMonth()] + ' ' + date.getFullYear();
        }

        function nowStamp() {
            var d = new Date();
            return longDate(d) + ', ' + formatTime12(d.getHours() + ':' + String(d.getMinutes()).padStart(2, '0'));
        }

        // ---------- badge builder (used by buildRowHtml) ----------

        function buildShiftBadge(emp, dayName, dateObj, shift) {
            var dateStr = formatDateObj(dateObj);
            var req = requestByCell[cellKey(emp.id, dateStr)];
            var cls = 'shift-badge clickable' + (shift ? '' : ' unassigned');
            var title = 'Click to raise a shift change request';

            if (req && req.status === 'Pending') {
                cls += ' req-pending';
                title = req.reqId + ' — pending manager approval';
            } else if (req && req.status === 'Approved') {
                cls += ' req-approved';
                title = req.reqId + ' — approved';
            } else if (req && req.status === 'Rejected') {
                cls += ' req-rejected';
                title = req.reqId + ' — rejected';
            }

            var icon = (req && req.status === 'Pending') ?
                '<i class="bi bi-hourglass-split badge-swap-icon ssh-op-90"></i>' :
                (req && req.status === 'Approved') ?
                '<i class="bi bi-check-circle badge-swap-icon ssh-op-90"></i>' :
                (req && req.status === 'Rejected') ?
                '<i class="bi bi-x-circle badge-swap-icon ssh-op-90"></i>' :
                '<i class="bi bi-arrow-left-right badge-swap-icon"></i>';

            return '<span class="' + cls + '"' +
                ' data-emp-id="' + emp.id + '"' +
                ' data-day="' + escapeHtml(dayName) + '"' +
                ' data-date="' + dateStr + '"' +
                ' data-shift-id="' + (shift ? shift.id : '') + '"' +
                ' title="' + escapeHtml(title) + '">' +
                escapeHtml(shift ? shift.shift_name : '-') + icon +
                '</span>';
        }

        // ---------- scope -> affected cells ----------

        /* "Select Date Range" input-la irundhu {from, to} edukkum.
           Format: "dd-mm-yyyy to dd-mm-yyyy" (oru date mattum pick panninaalum work aagum).
           Valid illena null. Max 366 days. */
        function getScrRange() {
            var el = document.getElementById('scr_custom_range');
            var val = el ? el.value.trim() : '';
            if (!val) return null;
            var parts = val.split(/\s+to\s+/);
            var from = parseDDMMYYYY(parts[0]);
            var to = parts.length > 1 ? parseDDMMYYYY(parts[1]) : from;
            if (!from || !to) return null;
            if (to < from) { var t = from; from = to; to = t; }
            var maxTo = new Date(from);
            maxTo.setDate(maxTo.getDate() + 365);
            if (to > maxTo) to = maxTo;
            return { from: from, to: to, fromStr: formatDateObj(from), toStr: formatDateObj(to) };
        }

        /* Apply For (day / week / month) padi entha cell-ellam maaranum-nu
           kanippom. Week off (shift illatha) naal-ah skip pannuvom, aana
           click panna cell eppovum include aagum. */
        function computeAffectedCells(emp, dateStr, scope) {
            var base = parseDDMMYYYY(dateStr);
            if (!base) return { dates: [dateStr], dayNames: [], skipped: [] };

            var list = [];
            if (scope === 'week') {
                var start = new Date(base);
                start.setDate(start.getDate() - start.getDay()); // Sunday
                for (var i = 0; i < 7; i++) {
                    var d = new Date(start);
                    d.setDate(start.getDate() + i);
                    list.push(d);
                }
            } else if (scope === 'date_range') {
                var rg = getScrRange();
                if (rg) {
                    for (var cur = new Date(rg.from); cur <= rg.to; cur.setDate(cur.getDate() + 1)) {
                        list.push(new Date(cur));
                    }
                }
            } else if (scope === 'month') {
                var lastDay = new Date(base.getFullYear(), base.getMonth() + 1, 0).getDate();
                for (var dd = base.getDate(); dd <= lastDay; dd++) {
                    list.push(new Date(base.getFullYear(), base.getMonth(), dd));
                }
            } else {
                list.push(new Date(base));
            }

            var dates = [], dayNames = [], skipped = [];
            list.forEach(function(d) {
                var dn = days[d.getDay()];
                var ds = formatDateObj(d);
                var hasShift = getCellShiftId(emp, dn, d) !== null && getCellShiftId(emp, dn, d) !== undefined;
                if (ds !== dateStr && !hasShift) { // week off -> touch pannala
                    skipped.push(ds);
                    return;
                }
                if (dates.indexOf(ds) === -1) dates.push(ds);
                if (dayNames.indexOf(dn) === -1) dayNames.push(dn);
            });
            return { dates: dates, dayNames: dayNames, skipped: skipped };
        }

        function clearScopePreview() {
            if (!tbody) return;
            tbody.querySelectorAll('.shift-badge.scr-skipped').forEach(function(b) {
                b.classList.remove('scr-skipped');
            });
            tbody.querySelectorAll('.shift-badge.scr-preview').forEach(function(b) {
                b.classList.remove('scr-preview');
                if (b.hasAttribute('data-orig')) {
                    b.innerHTML = b.getAttribute('data-orig');
                    b.removeAttribute('data-orig');
                }
            });
            document.body.classList.remove('scr-preview-mode');
        }

        /* Modal la Apply For / Change To maathum podhu, table la andha
           employee oda affected cells ellam live-a preview aagum. */
        function applyScopePreview() {
            clearScopePreview();
            if (!scrContext || !tbody) return;

            var scopeEl = document.getElementById('scr_apply_scope');
            var shiftEl = document.getElementById('scr_new_shift');
            var hintEl = document.getElementById('scrScopeHint');
            var scope = scopeEl ? scopeEl.value : 'day';
            var newShift = (shiftEl && shiftEl.value) ? shiftsById[Number(shiftEl.value)] : null;

            /* Date range picker: "Select Date Range" na mattum kaattu */
            var rangeWrap = document.getElementById('scrRangeWrap');
            if (rangeWrap) rangeWrap.classList.toggle('ssh-hidden', scope !== 'date_range');

            var cells = computeAffectedCells(scrContext.emp, scrContext.dateStr, scope);
            scrContext.affected = cells;

            var marked = 0;
            tbody.querySelectorAll('.shift-badge[data-emp-id="' + scrContext.emp.id + '"]').forEach(function(b) {
                if (cells.dates.indexOf(b.getAttribute('data-date')) === -1) {
                    /* same range la irundhaalum week off naal -> skip-nu kaattu */
                    if (scope !== 'day' && cells.skipped.indexOf(b.getAttribute('data-date')) !== -1) {
                        b.classList.add('scr-skipped');
                        b.setAttribute('title', 'Week off — this day will not be changed');
                    }
                    return;
                }
                marked++;
                if (newShift) {
                    if (!b.hasAttribute('data-orig')) b.setAttribute('data-orig', b.innerHTML);
                    b.innerHTML = escapeHtml(newShift.shift_name) +
                        '<i class="bi bi-arrow-repeat badge-swap-icon ssh-op-90"></i>';
                }
                b.classList.add('scr-preview');
            });

            if (marked > 0) document.body.classList.add('scr-preview-mode');

            if (hintEl) {
                var total = cells.dates.length;
                if (scope === 'date_range' && !getScrRange()) {
                    hintEl.className = 'scr-scope-hint muted';
                    hintEl.innerHTML = '<i class="bi bi-info-circle me-1"></i>Pick a from – to date range to preview it in the table.';
                } else if (!newShift) {
                    hintEl.className = 'scr-scope-hint muted';
                    hintEl.innerHTML = '<i class="bi bi-info-circle me-1"></i>' + total +
                        ' day(s) will be affected — select a shift to preview it in the table.';
                } else {
                    hintEl.className = 'scr-scope-hint';
                    hintEl.innerHTML = '<i class="bi bi-eye me-1"></i>' + total + ' day(s) — ' +
                        escapeHtml(cells.dayNames.join(', ')) + ' — previewed in the table.' +
                        (cells.skipped && cells.skipped.length ?
                            ' <span class="text-muted">(' + cells.skipped.length + ' week off day(s) skipped)</span>' : '') +
                        (marked < total ?
                            ' <span class="text-muted">(' + marked + ' visible in the current view — switch Weekly / Monthly view to see the rest)</span>' : '');
                }
            }
        }

        if (scrModalEl) {
            scrModalEl.addEventListener('hidden.bs.modal', function() {
                clearScopePreview();
            });
        }

        // ---------- manager resolver ----------

        function findManagerFor(emp) {
            var mgr = employees.filter(function(e) {
                return e.role === 'Branch Manager' && e.branch === emp.branch && e.id !== emp.id;
            })[0];
            if (!mgr) {
                mgr = employees.filter(function(e) {
                    return e.role === 'Branch Manager' && e.id !== emp.id;
                })[0];
            }
            if (!mgr) {
                mgr = employees.filter(function(e) {
                    return e.sub_role === 'HR Manager' && e.id !== emp.id;
                })[0];
            }
            return mgr || null;
        }

        // ---------- toast ----------

        function scrToast(message, icon) {
            var wrap = document.getElementById('scrToastWrap');
            if (!wrap) return;
            var el = document.createElement('div');
            el.className = 'scr-toast';
            el.innerHTML = '<i class="bi ' + (icon || 'bi-check-circle-fill') + '"></i><span>' + message + '</span>';
            wrap.appendChild(el);
            setTimeout(function() {
                el.classList.add('out');
                setTimeout(function() {
                    el.remove();
                }, 260);
            }, 3200);
        }

        // ---------- open modal ----------

        function openShiftChangeModal(emp, dayName, dateStr, currentShiftId) {
            var currentShift = currentShiftId ? shiftsById[currentShiftId] : null;
            var manager = findManagerFor(emp);
            var existing = requestByCell[cellKey(emp.id, dateStr)];

            if (existing && existing.status === 'Pending') {
                scrToast('This day already has a pending request: <b>' + existing.reqId + '</b>.', 'bi-hourglass-split');
                return;
            }

            scrContext = {
                emp: emp,
                dayName: dayName,
                dateStr: dateStr,
                currentShift: currentShift,
                manager: manager
            };

            // employee card
            document.getElementById('scrEmpAvatar').src = './assets/img/' + emp.avatar;
            document.getElementById('scrEmpName').textContent = emp.name;
            document.getElementById('scrEmpMeta').textContent = 'EMP' + emp.emp_id + ' • ' + emp.role + ' — ' + emp.sub_role;
            document.getElementById('scrDayName').textContent = dayName;
            document.getElementById('scrDayDate').textContent = dateStr;

            // current shift box
            document.getElementById('scrCurrentShiftName').textContent = currentShift ? currentShift.shift_name : 'Not assigned';
            document.getElementById('scrCurrentShiftTime').textContent = currentShift ? shiftTiming(currentShift) : 'No timing';

            // requested shift box reset
            document.getElementById('scrNewShiftName').textContent = 'Not selected';
            document.getElementById('scrNewShiftTime').textContent = '-';

            // shift options (enabled only, current shift avoid)
            var shiftSelect = document.getElementById('scr_new_shift');
            var options = ['<option value="">Select the shift you want</option>'];
            (window.shiftScheduleShifts || []).forEach(function(s) {
                if (s.status !== 'Enable') return;
                if (currentShift && String(s.id) === String(currentShift.id)) return;
                options.push('<option value="' + s.id + '">' + escapeHtml(s.shift_name) +
                    ' (' + formatTime12(s.start_time) + ' – ' + formatTime12(s.end_time) + ')</option>');
            });
            shiftSelect.innerHTML = options.join('');
            shiftSelect.value = '';

            // swap colleague options (same branch, not himself)
            var swapSelect = document.getElementById('scr_swap_with');
            var swapOpts = ['<option value="">Select colleague</option>'];
            employees.filter(function(e) {
                return e.id !== emp.id && e.branch === emp.branch;
            }).slice(0, 30).forEach(function(e) {
                swapOpts.push('<option value="' + e.id + '">' + escapeHtml(e.name) + ' (EMP' + e.emp_id + ')</option>');
            });
            swapSelect.innerHTML = swapOpts.join('');
            swapSelect.value = '';

            // reset the other fields
            document.getElementById('scr_reason').value = '';
            document.getElementById('scr_apply_scope').value = 'day';
            var scrRangeEl = document.getElementById('scr_custom_range');
            if (scrRangeEl) scrRangeEl.value = '';
            scrLastRange = '';
            var scrRangeWrapEl = document.getElementById('scrRangeWrap');
            if (scrRangeWrapEl) scrRangeWrapEl.classList.add('ssh-hidden');
            document.getElementById('scr_remarks').value = '';
            document.getElementById('scrRemarkCount').textContent = '0';
            document.getElementById('scrSwapWrap').classList.add('ssh-hidden');

            // manager card
            if (manager) {
                document.getElementById('scrMgrAvatar').src = './assets/img/' + manager.avatar;
                document.getElementById('scrMgrName').textContent = manager.name;
                document.getElementById('scrMgrRole').textContent = manager.sub_role + ' • ' + manager.branch;
            } else {
                document.getElementById('scrMgrAvatar').src = './assets/img/profile-3.jpg';
                document.getElementById('scrMgrName').textContent = 'Reporting Manager';
                document.getElementById('scrMgrRole').textContent = 'Auto assigned';
            }

            // form view on, success view off
            document.getElementById('shiftChangeForm').classList.remove('ssh-hidden');
            document.getElementById('scrSuccessView').classList.remove('ssh-shown');
            document.getElementById('scrSubmitBtn').classList.remove('ssh-hidden');
            document.getElementById('scrSubmitBtn').disabled = false;
            document.getElementById('scrSubmitBtn').innerHTML = '<i class="bi bi-send me-1"></i> Send Request';
            document.getElementById('scrCancelBtn').classList.remove('ssh-hidden');
            document.getElementById('scrDoneBtn').classList.add('ssh-hidden');

            var hintEl = document.getElementById('scrScopeHint');
            if (hintEl) hintEl.innerHTML = '';

            if (scrModal) scrModal.show();
            initScrSelect2();
            applyScopePreview();
        }

        function initScrSelect2() {
            if (!window.jQuery || !jQuery.fn || !jQuery.fn.select2) return;
            ['#scr_new_shift', '#scr_reason', '#scr_apply_scope', '#scr_swap_with'].forEach(function(sel) {
                var $el = jQuery(sel);
                if (!$el.length) return;
                if ($el.data('select2')) $el.select2('destroy');
                $el.select2({
                    width: '100%',
                    dropdownParent: jQuery('#shiftChangeModal'),
                    minimumResultsForSearch: Infinity
                });
            });

            /* IMPORTANT: select2 jQuery-oda 'change' thaan trigger pannum,
               adhu native addEventListener listener-a fire pannadhu. So
               jQuery handlers-a thaniya bind panrom (namespace vechu, so
               duplicate aagadhu). */
            if (!scrSelect2Ready) {
                jQuery(document)
                    .off('change.scr', '#scr_new_shift')
                    .on('change.scr', '#scr_new_shift', function() {
                        scrOnShiftChange();
                    })
                    .off('change.scr', '#scr_reason')
                    .on('change.scr', '#scr_reason', function() {
                        scrOnReasonChange();
                    })
                    .off('change.scr', '#scr_apply_scope')
                    .on('change.scr', '#scr_apply_scope', function() {
                        applyScopePreview();
                    });
                scrSelect2Ready = true;
            }
        }

        // ---------- badge click (event delegation, survives re-render) ----------

        if (tbody) {
            tbody.addEventListener('click', function(e) {
                var badge = e.target.closest ? e.target.closest('.shift-badge') : null;
                if (!badge || !tbody.contains(badge)) return;

                var empId = Number(badge.getAttribute('data-emp-id'));
                var emp = employees.find(function(x) {
                    return x.id === empId;
                });
                if (!emp) return;

                openShiftChangeModal(
                    emp,
                    badge.getAttribute('data-day'),
                    badge.getAttribute('data-date'),
                    badge.getAttribute('data-shift-id')
                );
            });
        }

        // ---------- live preview of the chosen shift ----------

        function scrOnShiftChange() {
            var el = document.getElementById('scr_new_shift');
            var s = (el && el.value) ? shiftsById[Number(el.value)] : null;
            document.getElementById('scrNewShiftName').textContent = s ? s.shift_name : 'Not selected';
            document.getElementById('scrNewShiftTime').textContent = s ? shiftTiming(s) : '-';
            applyScopePreview();
        }

        function scrOnReasonChange() {
            var el = document.getElementById('scr_reason');
            var isSwap = el && el.value === 'Swap with colleague';
            document.getElementById('scrSwapWrap').classList.toggle('ssh-hidden', !isSwap);
        }

        /* native listeners (select2 illaina idhu velai seiyum) */
        var scrShiftSelect = document.getElementById('scr_new_shift');
        if (scrShiftSelect) scrShiftSelect.addEventListener('change', scrOnShiftChange);

        var scrScopeSelect = document.getElementById('scr_apply_scope');
        if (scrScopeSelect) scrScopeSelect.addEventListener('change', applyScopePreview);

        /* Date range pick pannumbodhu table-la live preview.
           date-picker.js value-va set pannum, so change/input events + oru light
           watcher (modal open-la irukkumbodhu mattum) rendume use panrom. */
        var scrLastRange = '';
        var scrRangeInput = document.getElementById('scr_custom_range');

        function scrOnRangeChange() {
            if (!scrRangeInput) return;
            var v = scrRangeInput.value;
            if (v === scrLastRange) return;
            scrLastRange = v;
            applyScopePreview();
        }

        /* Calendar popup-a (input-a thavira .date-picker child) kandupidichu
           .scr-dp-float class podum. Popup lazy-a create aanalum
           MutationObserver pudichidum. */
        function scrFloatRangePopup() {
            var wrap = document.querySelector('#scrRangeWrap .date-picker');
            if (!wrap) return;
            Array.prototype.forEach.call(wrap.children, function(el) {
                if (el.tagName === 'INPUT' || el.classList.contains('scr-dp-float')) return;
                if (el.querySelectorAll('*').length > 10) el.classList.add('scr-dp-float');
            });
            /* popup theriyumbodhu mattum wrap-ku .scr-range-open */
            var pop = wrap.querySelector('.scr-dp-float');
            var open = false;
            if (pop) {
                var cs = window.getComputedStyle(pop);
                open = pop.getClientRects().length > 0 && cs.visibility !== 'hidden' && cs.opacity !== '0';
            }
            var outer = document.getElementById('scrRangeWrap');
            if (outer) outer.classList.toggle('scr-range-open', open);
        }
        var scrRangeWrapNode = document.querySelector('#scrRangeWrap .date-picker');
        if (scrRangeWrapNode) {
            new MutationObserver(scrFloatRangePopup).observe(scrRangeWrapNode, {
                childList: true, subtree: true, attributes: true, attributeFilter: ['class', 'style']
            });
            scrRangeWrapNode.addEventListener('click', function() { setTimeout(scrFloatRangePopup, 0); });
            scrRangeWrapNode.addEventListener('focusin', function() { setTimeout(scrFloatRangePopup, 0); });
            scrFloatRangePopup();
        }

        if (scrRangeInput) {
            ['change', 'input'].forEach(function(evName) {
                scrRangeInput.addEventListener(evName, scrOnRangeChange);
            });
            setInterval(function() {
                if (scrModalEl && scrModalEl.classList.contains('show') && scrScopeSelect && scrScopeSelect.value === 'date_range') {
                    scrOnRangeChange();
                }
                scrFloatRangePopup();
            }, 300);
        }

        var scrReasonSelect = document.getElementById('scr_reason');
        if (scrReasonSelect) scrReasonSelect.addEventListener('change', scrOnReasonChange);

        var scrRemarks = document.getElementById('scr_remarks');
        if (scrRemarks) {
            scrRemarks.addEventListener('input', function() {
                document.getElementById('scrRemarkCount').textContent = String(scrRemarks.value.length);
            });
        }

        // ---------- submit ----------

        var scrSubmitBtn = document.getElementById('scrSubmitBtn');
        if (scrSubmitBtn) {
            scrSubmitBtn.addEventListener('click', function() {
                if (!scrContext) return;

                var shiftSelect = document.getElementById('scr_new_shift');
                var reasonSelect = document.getElementById('scr_reason');
                var swapSelect = document.getElementById('scr_swap_with');

                if (!shiftSelect.value) {
                    alert('Please select the shift you want to change to.');
                    shiftSelect.focus();
                    return;
                }
                if (!reasonSelect.value) {
                    alert('Please select a reason.');
                    reasonSelect.focus();
                    return;
                }
                if (reasonSelect.value === 'Swap with colleague' && !swapSelect.value) {
                    alert('Please select the colleague you want to swap with.');
                    swapSelect.focus();
                    return;
                }

                if (document.getElementById('scr_apply_scope').value === 'date_range') {
                    var rg = getScrRange();
                    if (!rg) {
                        alert('Please select a valid date range.');
                        if (scrRangeInput) scrRangeInput.focus();
                        return;
                    }
                    var chk = computeAffectedCells(scrContext.emp, scrContext.dateStr, 'date_range');
                    if (!chk.dates.length) {
                        alert('The selected range has no working days (all are week off).');
                        return;
                    }
                    var clash = chk.dates.filter(function(ds) {
                        var ex = requestByCell[cellKey(scrContext.emp.id, ds)];
                        return ex && ex.status === 'Pending';
                    });
                    if (clash.length) {
                        alert('A pending request already exists for ' + clash[0] + (clash.length > 1 ? ' (+' + (clash.length - 1) + ' more)' : '') + '.');
                        return;
                    }
                }

                // fake "sending to manager" state
                scrSubmitBtn.disabled = true;
                scrSubmitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';

                setTimeout(function() {
                    scrSeq++;
                    var swapEmp = swapSelect.value ? employees.find(function(x) {
                        return x.id === Number(swapSelect.value);
                    }) : null;

                    var req = {
                        reqId: 'SCR-' + new Date().getFullYear() + '-' + String(scrSeq).padStart(3, '0'),
                        empId: scrContext.emp.id,
                        empName: scrContext.emp.name,
                        empCode: 'EMP' + scrContext.emp.emp_id,
                        avatar: scrContext.emp.avatar,
                        dayName: scrContext.dayName,
                        dateStr: scrContext.dateStr,
                        fromShiftId: scrContext.currentShift ? scrContext.currentShift.id : null,
                        toShiftId: Number(shiftSelect.value),
                        reason: reasonSelect.value,
                        scope: document.getElementById('scr_apply_scope').value,
                        rangeFrom: '',
                        rangeTo: '',
                        affectedDates: [],
                        affectedDays: [],
                        swapWith: swapEmp ? swapEmp.name : '',
                        remarks: document.getElementById('scr_remarks').value.trim(),
                        managerName: scrContext.manager ? scrContext.manager.name : 'Reporting Manager',
                        managerAvatar: scrContext.manager ? scrContext.manager.avatar : 'profile-3.jpg',
                        status: 'Pending',
                        createdAt: nowStamp()
                    };

                    var affected = computeAffectedCells(scrContext.emp, req.dateStr, req.scope);
                    req.affectedDates = affected.dates;
                    req.affectedDays = affected.dayNames;
                    if (req.scope === 'date_range') {
                        var rgSaved = getScrRange();
                        req.rangeFrom = rgSaved ? rgSaved.fromStr : '';
                        req.rangeTo = rgSaved ? rgSaved.toStr : '';
                    }

                    shiftRequests.unshift(req);
                    req.affectedDates.forEach(function(ds) {
                        requestByCell[cellKey(req.empId, ds)] = req;
                    });

                    // success view
                    document.getElementById('shiftChangeForm').classList.add('ssh-hidden');
                    document.getElementById('scrSuccessView').classList.add('ssh-shown');
                    document.getElementById('scrSuccessReqId').textContent = req.reqId;
                    document.getElementById('scrStepSubmitted').textContent = req.createdAt;
                    document.getElementById('scrStepManager').textContent = req.managerName + ' — waiting for approval';

                    document.getElementById('scrSubmitBtn').classList.add('ssh-hidden');
                    document.getElementById('scrCancelBtn').classList.add('ssh-hidden');
                    document.getElementById('scrDoneBtn').classList.remove('ssh-hidden');

                    clearScopePreview();
                    renderShiftRequests();
                    renderTable();
                    scrToast('<b>' + req.reqId + '</b> sent to ' + req.managerName + ' (' +
                        req.affectedDates.length + ' day(s)).', 'bi-send-check-fill');
                }, 850);
            });
        }

        // ---------- requests list ----------

        function renderShiftRequests() {
            var body = document.getElementById('scrRequestsBody');
            if (!body) return;

            var pending = shiftRequests.filter(function(r) {
                return r.status === 'Pending';
            }).length;
            document.getElementById('scrPendingCount').textContent = String(pending);

            var headerBadge = document.getElementById('scrHeaderPendingBadge');
            if (headerBadge) {
                headerBadge.textContent = String(pending);
                headerBadge.classList.toggle('ssh-hidden', !(pending > 0));
            }

            if (!shiftRequests.length) {
                body.innerHTML = '<tr class="no-record-row"><td colspan="8" class="text-center text-muted py-5">' +
                    '<i class="bi bi-inbox ssh-empty-ico"></i>' +
                    'No shift change requests yet.</td></tr>';
                return;
            }

            var statusIcons = {
                Pending: 'bi-hourglass-split',
                Approved: 'bi-check-circle-fill',
                Rejected: 'bi-x-circle-fill',
                Withdrawn: 'bi-slash-circle'
            };

            body.innerHTML = shiftRequests.map(function(r) {
                var fromShift = r.fromShiftId ? shiftsById[r.fromShiftId] : null;
                var toShift = shiftsById[r.toShiftId];
                var scopeText = r.scope === 'day' ? 'This day only' :
                    (r.scope === 'week' ? 'Full week' :
                    (r.scope === 'date_range' ? (r.rangeFrom + ' to ' + r.rangeTo) : 'Rest of month'));

                var action;
                if (r.status === 'Pending' && scrViewRole === 'manager') {
                    action = '<div class="d-flex gap-2 flex-nowrap">' +
                        '<button type="button" class="scr-approve-btn" data-req="' + r.reqId + '"><i class="bi bi-check-lg me-1"></i>Approve</button>' +
                        '<button type="button" class="scr-reject-btn" data-req="' + r.reqId + '"><i class="bi bi-x-lg me-1"></i>Reject</button>' +
                        '</div>';
                } else if (r.status === 'Pending') {
                    action = '<button type="button" class="btn btn-sm btn-reject scr-withdraw ssh-btn-outline-115" data-req="' + r.reqId + '">Withdraw</button>';
                } else if (r.status === 'Rejected' && scrViewRole === 'employee') {
                    action = '<button type="button" class="scr-view-btn-action scr-view-rejection" data-req="' + r.reqId + '"><i class="bi bi-eye me-1"></i>View</button>';
                } else {
                    action = '<span class="text-muted ssh-muted-115">—</span>';
                }

                return '<tr>' +
                    '<td data-label="Request ID"><span class="fw-bold ssh-req-id">' + r.reqId + '</span>' +
                    '<div class="ssh-muted-11">' + escapeHtml(r.createdAt) + '</div></td>' +
                    '<td data-label="Employee"><div class="d-flex align-items-center gap-2">' +
                    '<img src="./assets/img/' + escapeHtml(r.avatar) + '" class="avatar-sm ssh-avatar-30" alt="">' +
                    '<div><div class="person-name ssh-fs-125">' + escapeHtml(r.empName) + '</div>' +
                    '<div class="ssh-muted-11">' + escapeHtml(r.empCode) + '</div></div></div></td>' +
                    '<td data-label="Day"><div class="fw-semibold ssh-fs-125">' + escapeHtml(r.dayName) + '</div>' +
                    '<div class="ssh-muted-11">' + escapeHtml(r.dateStr) + ' • ' + scopeText + '</div></td>' +
                    '<td data-label="Shift Change"><span class="scr-mini-shift"><span class="scr-old">' +
                    escapeHtml(fromShift ? fromShift.shift_name : 'Not assigned') + '</span> → <span class="scr-new">' +
                    escapeHtml(toShift ? toShift.shift_name : '-') + '</span></span></td>' +
                    '<td data-label="Reason"><div class="ssh-fs-125">' + escapeHtml(r.reason) + '</div>' +
                    (r.swapWith ? '<div class="ssh-muted-11">with ' + escapeHtml(r.swapWith) + '</div>' : '') +
                    (r.remarks ? '<div class="ssh-muted-11">' + escapeHtml(r.remarks) + '</div>' : '') + '</td>' +
                    '<td data-label="Approver"><div class="d-flex align-items-center gap-2">' +
                    '<img src="./assets/img/' + escapeHtml(r.managerAvatar) + '" class="avatar-sm ssh-avatar-26" alt="">' +
                    '<span class="ssh-fs-125 fw-semibold">' + escapeHtml(r.managerName) + '</span></div></td>' +
                    '<td data-label="Status"><span class="scr-status-pill ' + r.status.toLowerCase() + '">' +
                    '<i class="bi ' + statusIcons[r.status] + '"></i>' + r.status + '</span>' +
                    (r.actedAt ? '<div class="ssh-muted-11">' + escapeHtml(r.actedAt) + '</div>' : '') +
                    (r.rejectReason ? '<div class="scr-reject-reason-note"><i class="bi bi-chat-left-text me-1"></i>' + escapeHtml(r.rejectReason) + '</div>' : '') + '</td>' +
                    '<td data-label="Action">' + action + '</td>' +
                    '</tr>';
            }).join('');

            body.querySelectorAll('.scr-withdraw').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var req = shiftRequests.find(function(r) {
                        return r.reqId === btn.getAttribute('data-req');
                    });
                    if (!req) return;
                    req.status = 'Withdrawn';
                    req.actedAt = nowStamp();
                    (req.affectedDates && req.affectedDates.length ? req.affectedDates : [req.dateStr]).forEach(function(ds) {
                        delete requestByCell[cellKey(req.empId, ds)];
                    });
                    renderShiftRequests();
                    renderTable();
                    scrToast('<b>' + req.reqId + '</b> has been withdrawn.', 'bi-slash-circle');
                });
            });

            body.querySelectorAll('.scr-approve-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    approveRequest(btn.getAttribute('data-req'));
                });
            });

            body.querySelectorAll('.scr-reject-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    openRejectModal(btn.getAttribute('data-req'));
                });
            });

            body.querySelectorAll('.scr-view-rejection').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    openViewRejectionModal(btn.getAttribute('data-req'));
                });
            });
        }

        // ---------- Employee / Manager view toggle ----------

        var scrViewRole = 'employee';
        var scrViewToggle = document.getElementById('scrViewToggle');
        var scrManagerBanner = document.getElementById('scrManagerBanner');

        if (scrViewToggle) {
            scrViewToggle.querySelectorAll('.scr-view-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    scrViewRole = btn.getAttribute('data-role');
                    scrViewToggle.querySelectorAll('.scr-view-btn').forEach(function(b) {
                        b.classList.toggle('active', b === btn);
                    });
                    if (scrManagerBanner) scrManagerBanner.classList.toggle('show', scrViewRole === 'manager');
                    renderShiftRequests();
                });
            });
        }

        // ---------- approve / reject (Manager View) ----------

        function applyApprovedShift(req) {
            var emp = employees.find(function(e) {
                return e.id === req.empId;
            });
            if (emp && req.scope === 'date_range') {
                /* Date range: andha date-ku mattum maaranum (weekday pattern-a thodadhu) */
                emp.overrides = emp.overrides || {};
                (req.affectedDates || []).forEach(function(ds) {
                    emp.overrides[ds] = req.toShiftId;
                });
            } else if (emp && emp.shifts) {
                var targetDays = (req.affectedDays && req.affectedDays.length) ? req.affectedDays : [req.dayName];
                targetDays.forEach(function(d) {
                    emp.shifts[d] = req.toShiftId;
                });
            }
        }

        function approveRequest(reqId) {
            var req = shiftRequests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!req || req.status !== 'Pending') return;

            req.status = 'Approved';
            req.actedAt = nowStamp();
            applyApprovedShift(req);

            renderShiftRequests();
            renderTable();
            scrToast('<b>' + req.reqId + '</b> approved. Schedule updated for ' +
                ((req.affectedDays && req.affectedDays.length) || 1) + ' day(s).', 'bi-check-circle-fill');
        }

        // ---------- view rejection (Employee View) ----------

        var scrViewRejectionModalEl = document.getElementById('scrViewRejectionModal');
        var scrViewRejectionModal = scrViewRejectionModalEl ? bootstrap.Modal.getOrCreateInstance(scrViewRejectionModalEl) : null;

        /* Same stacking issue as the Reject modal — this also opens on top
           of the fullscreen Shift Requests modal, so its own backdrop
           needs to be tagged above the requests modal's backdrop. */
        if (scrViewRejectionModalEl) {
            scrViewRejectionModalEl.addEventListener('shown.bs.modal', function() {
                var backdrops = document.querySelectorAll('.modal-backdrop');
                var latest = backdrops[backdrops.length - 1];
                if (latest) latest.classList.add('scr-view-rejection-backdrop');
            });
        }

        function openViewRejectionModal(reqId) {
            var req = shiftRequests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!req || req.status !== 'Rejected') return;

            var fromShift = req.fromShiftId ? shiftsById[req.fromShiftId] : null;
            var toShift = shiftsById[req.toShiftId];

            document.getElementById('scrViewRejEmpAvatar').src = './assets/img/' + req.avatar;
            document.getElementById('scrViewRejEmpName').textContent = req.empName;
            document.getElementById('scrViewRejMeta').textContent = req.empCode;
            document.getElementById('scrViewRejReqId').textContent = req.reqId;
            document.getElementById('scrViewRejDate').textContent = req.dayName + ' • ' + req.dateStr;

            document.getElementById('scrViewRejFromShift').textContent = fromShift ? fromShift.shift_name : 'Not assigned';
            document.getElementById('scrViewRejToShift').textContent = toShift ? toShift.shift_name : '-';

            document.getElementById('scrViewRejReasonText').textContent = req.rejectReason ?
                req.rejectReason : 'No reason provided by the manager.';

            document.getElementById('scrViewRejMgrAvatar').src = './assets/img/' + req.managerAvatar;
            document.getElementById('scrViewRejMgrName').textContent = req.managerName;
            document.getElementById('scrViewRejMgrWhen').textContent = req.actedAt ? ('Rejected on ' + req.actedAt) : 'Rejected';

            if (scrViewRejectionModal) scrViewRejectionModal.show();
        }

        var scrRejectContext = null;
        var scrRejectModalEl = document.getElementById('scrRejectModal');
        var scrRejectModal = scrRejectModalEl ? bootstrap.Modal.getOrCreateInstance(scrRejectModalEl) : null;

        /* scrRejectModal opens ON TOP of the fullscreen scrRequestsModal.
           Bootstrap gives every backdrop the same z-index by default, so
           when the 2nd (reject) backdrop is created it sits ABOVE the 1st
           modal's own content (only below the newest modal) — the requests
           table behind goes dark/unclickable but the reject modal itself
           looked "stuck behind" because both modals shared 1055. Tagging
           just the reject modal's own backdrop fixes the stacking without
           touching any other modal on the page. */
        if (scrRejectModalEl) {
            scrRejectModalEl.addEventListener('shown.bs.modal', function() {
                var backdrops = document.querySelectorAll('.modal-backdrop');
                var latest = backdrops[backdrops.length - 1];
                if (latest) latest.classList.add('scr-reject-backdrop');
            });
        }

        function openRejectModal(reqId) {
            var req = shiftRequests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!req || req.status !== 'Pending') return;

            scrRejectContext = req;
            var toShift = shiftsById[req.toShiftId];
            document.getElementById('scrRejectEmpLine').innerHTML =
                '<i class="bi bi-person me-1"></i>' + escapeHtml(req.empName) + ' (' + escapeHtml(req.empCode) + ')' +
                ' — ' + escapeHtml(req.dayName) + ' ' + escapeHtml(req.dateStr) +
                ' → requesting <b>' + escapeHtml(toShift ? toShift.shift_name : '-') + '</b>';

            var reasonEl = document.getElementById('scr_reject_reason');
            reasonEl.value = '';
            document.getElementById('scrRejectRemarkCount').textContent = '0';

            if (scrRejectModal) scrRejectModal.show();
        }

        var scrRejectReasonEl = document.getElementById('scr_reject_reason');
        if (scrRejectReasonEl) {
            scrRejectReasonEl.addEventListener('input', function() {
                document.getElementById('scrRejectRemarkCount').textContent = String(scrRejectReasonEl.value.length);
            });
        }

        var scrRejectConfirmBtn = document.getElementById('scrRejectConfirmBtn');
        if (scrRejectConfirmBtn) {
            scrRejectConfirmBtn.addEventListener('click', function() {
                if (!scrRejectContext) return;
                var req = scrRejectContext;

                req.status = 'Rejected';
                req.actedAt = nowStamp();
                req.rejectReason = document.getElementById('scr_reject_reason').value.trim();

                (req.affectedDates && req.affectedDates.length ? req.affectedDates : [req.dateStr]).forEach(function(ds) {
                    delete requestByCell[cellKey(req.empId, ds)];
                });

                if (scrRejectModal) scrRejectModal.hide();
                scrRejectContext = null;

                renderShiftRequests();
                renderTable();
                scrToast('<b>' + req.reqId + '</b> has been rejected.', 'bi-x-circle-fill');
            });
        }

        renderTable();
        renderShiftRequests();
    })();

/* ==========================================================================
   Script Block 4
   ========================================================================== */
(function(){
    var dropzone = document.getElementById('shiftBulkDropzone');
    var fileInput = document.getElementById('shiftBulkInput');
    var fileBox = document.getElementById('shiftUploadFile');
    var fileName = document.getElementById('shiftUploadFileName');
    var removeBtn = document.getElementById('shiftUploadRemove');
    var countBox = document.getElementById('shiftUploadCount');
    var rowCount = document.getElementById('shiftUploadRowCount');
    var preview = document.getElementById('shiftUploadPreview');
    var previewHead = document.getElementById('shiftPreviewHead');
    var previewBody = document.getElementById('shiftPreviewBody');
    var confirmBtn = document.getElementById('confirmShiftBulkUpload');
    var offcanvas = document.getElementById('shiftBulkUploadOffcanvas');
    var uploadedFile = null;

    if (!dropzone) return;

    /* --- Click to browse --- */
    dropzone.addEventListener('click', function(){ fileInput.click(); });

    /* --- Drag & drop --- */
    ['dragenter','dragover'].forEach(function(evt){
        dropzone.addEventListener(evt, function(e){ e.preventDefault(); e.stopPropagation(); dropzone.classList.add('dragover'); });
    });
    ['dragleave','drop'].forEach(function(evt){
        dropzone.addEventListener(evt, function(e){ e.preventDefault(); e.stopPropagation(); dropzone.classList.remove('dragover'); });
    });
    dropzone.addEventListener('drop', function(e){
        var files = e.dataTransfer.files;
        if (files.length) handleFile(files[0]);
    });

    /* --- File input change --- */
    fileInput.addEventListener('change', function(){
        if (fileInput.files.length) handleFile(fileInput.files[0]);
    });

    /* --- Remove file --- */
    removeBtn.addEventListener('click', function(e){
        e.stopPropagation();
        clearUpload();
    });

    /* --- Handle file --- */
    function handleFile(file){
        var allowed = ['.xlsx','.xls','.csv'];
        var ext = '.' + file.name.split('.').pop().toLowerCase();
        if (allowed.indexOf(ext) === -1) { alert('Please upload .xlsx, .xls, or .csv files only.'); return; }
        if (file.size > 5 * 1024 * 1024) { alert('File size must be under 5MB.'); return; }

        uploadedFile = file;
        fileName.textContent = file.name + ' (' + formatSize(file.size) + ')';
        fileBox.classList.add('show');
        dropzone.classList.add('ssh-hidden');
        confirmBtn.disabled = false;

        /* Read CSV preview */
        if (ext === '.csv') {
            var reader = new FileReader();
            reader.onload = function(e){ parseCSV(e.target.result); };
            reader.readAsText(file);
        } else {
            /* For xlsx/xls show a generic preview message */
            previewHead.innerHTML = '';
            preview.classList.add('show');
            countBox.classList.add('show');
            rowCount.textContent = '—';
        }
    }

    function parseCSV(text){
        var lines = text.split('\n').filter(function(l){ return l.trim(); });
        if (lines.length < 2) { alert('CSV file appears empty or has no data rows.'); clearUpload(); return; }
        var headers = lines[0].split(',').map(function(h){ return h.trim().replace(/^"|"$/g,''); });
        var dataRows = [];
        for (var i = 1; i < Math.min(lines.length, 6); i++) {
            dataRows.push(lines[i].split(',').map(function(c){ return c.trim().replace(/^"|"$/g,''); }));
        }
        previewHead.innerHTML = '<tr>' + headers.map(function(h){ return '<th>' + h + '</th>'; }).join('') + '</tr>';
        previewBody.innerHTML = dataRows.map(function(r){
            return '<tr>' + r.map(function(c){ return '<td>' + c + '</td>'; }).join('') + '</tr>';
        }).join('');
        preview.classList.add('show');
        countBox.classList.add('show');
        rowCount.textContent = (lines.length - 1);
    }

    function formatSize(bytes){
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1048576) return (bytes/1024).toFixed(1) + ' KB';
        return (bytes/1048576).toFixed(1) + ' MB';
    }

    function clearUpload(){
        uploadedFile = null;
        fileInput.value = '';
        fileBox.classList.remove('show');
        countBox.classList.remove('show');
        preview.classList.remove('show');
        previewHead.innerHTML = '';
        previewBody.innerHTML = '';
        dropzone.classList.remove('ssh-hidden');
        confirmBtn.disabled = true;
    }

    /* --- Confirm upload --- */
    confirmBtn.addEventListener('click', function(){
        if (!uploadedFile) return;
        alert('Shift schedule file "' + uploadedFile.name + '" uploaded successfully!\nRows: ' + rowCount.textContent);
        clearUpload();
        var bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvas);
        if (bsOffcanvas) bsOffcanvas.hide();
    });    /* --- Reset on offcanvas close --- */
    offcanvas.addEventListener('hidden.bs.offcanvas', function(){ clearUpload(); });
})();
