<?php include 'header.php'; ?>

 

<style>
    .interview-card {
        border: 1px solid var(--border-soft);
        border-radius: 14px;
        background: var(--white);
        padding: 16px;
        transition: all .2s ease;
    }
    .interview-card:hover {
        border-color: var(--primary);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .06);
    }
    .round-tag {
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 99px;
    }
    .round-tech { background: #fef3c7; color: #b45309; }
    .round-hr { background: #f3e8ff; color: #7e22ce; }
    .round-manager { background: #e0f2fe; color: #0369a1; }
</style>

<!-- Title & Action Bar -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Interview Schedules & Evaluations</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-calendar2-check fs-6"></i>
            <span>Recruitment</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Interviews</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#scheduleInterviewModal">
            <i class="bi bi-plus-lg me-1"></i> Schedule Interview
        </button>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-4 col-md-6">
        <div class="interview-card h-100 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="round-tag round-tech">Technical Round 2 (Coding & System Architecture)</span>
                    <span class="badge bg-primary-subtle text-primary">Upcoming</span>
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="./assets/img/profile-3.jpg" class="avatar-md" style="width:44px;height:44px;border-radius:50%;object-fit:cover;" alt="Siddharth Nair">
                    <div>
                        <div class="fw-bold text-dark fs-6">Siddharth Nair</div>
                        <div class="text-muted" style="font-size:12px;">iOS App Developer</div>
                    </div>
                </div>
                <div class="p-3 bg-light rounded-3 mb-3" style="font-size:12px;">
                    <div class="mb-1"><i class="bi bi-clock me-2 text-primary"></i><strong>Today, 03:30 PM - 04:30 PM</strong></div>
                    <div class="mb-1"><i class="bi bi-person-video2 me-2 text-primary"></i>Panel: Daniel Martinez (Lead Backend Dev)</div>
                    <div><i class="bi bi-geo-alt me-2 text-primary"></i>Google Meet (Online)</div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-primary btn-sm flex-fill" onclick="alert('Launching meeting link...');">
                    <i class="bi bi-camera-video me-1"></i> Join Call
                </button>
                <button type="button" class="btn btn-primary btn-sm flex-fill" onclick="alert('Opening candidate evaluation scorecard...');">
                    <i class="bi bi-pencil-square me-1"></i> Scorecard
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="interview-card h-100 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="round-tag round-hr">HR & Culture Fit Discussion</span>
                    <span class="badge bg-primary-subtle text-primary">Upcoming</span>
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="./assets/img/profile-2.jpg" class="avatar-md" style="width:44px;height:44px;border-radius:50%;object-fit:cover;" alt="Arun Kumar">
                    <div>
                        <div class="fw-bold text-dark fs-6">Arun Kumar</div>
                        <div class="text-muted" style="font-size:12px;">Lead Backend Engineer</div>
                    </div>
                </div>
                <div class="p-3 bg-light rounded-3 mb-3" style="font-size:12px;">
                    <div class="mb-1"><i class="bi bi-clock me-2 text-primary"></i><strong>Tomorrow, 11:00 AM - 11:45 AM</strong></div>
                    <div class="mb-1"><i class="bi bi-person-video2 me-2 text-primary"></i>Panel: Sarah Mitchell (HR Admin)</div>
                    <div><i class="bi bi-geo-alt me-2 text-primary"></i>In-Person (Room 3B)</div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-primary btn-sm flex-fill" onclick="alert('Launching meeting link...');">
                    <i class="bi bi-camera-video me-1"></i> Join Call
                </button>
                <button type="button" class="btn btn-primary btn-sm flex-fill" onclick="alert('Opening candidate evaluation scorecard...');">
                    <i class="bi bi-pencil-square me-1"></i> Scorecard
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="interview-card h-100 d-flex flex-column justify-content-between">
            <div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="round-tag round-manager">Design Portfolio & Challenge Review</span>
                    <span class="badge bg-success-subtle text-success">Completed (Recommended - 4.8/5)</span>
                </div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="./assets/img/profile-1.jpg" class="avatar-md" style="width:44px;height:44px;border-radius:50%;object-fit:cover;" alt="Kavitha Raman">
                    <div>
                        <div class="fw-bold text-dark fs-6">Kavitha Raman</div>
                        <div class="text-muted" style="font-size:12px;">Senior UI/UX Designer</div>
                    </div>
                </div>
                <div class="p-3 bg-light rounded-3 mb-3" style="font-size:12px;">
                    <div class="mb-1"><i class="bi bi-clock me-2 text-primary"></i><strong>24-Feb-2026, 02:00 PM</strong></div>
                    <div class="mb-1"><i class="bi bi-person-video2 me-2 text-primary"></i>Panel: Amelia Curr (Design Lead)</div>
                    <div><i class="bi bi-geo-alt me-2 text-primary"></i>Google Meet</div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-primary btn-sm flex-fill" onclick="alert('Launching meeting link...');">
                    <i class="bi bi-camera-video me-1"></i> View Recording
                </button>
                <button type="button" class="btn btn-primary btn-sm flex-fill" onclick="alert('Opening candidate evaluation scorecard...');">
                    <i class="bi bi-eye me-1"></i> Scorecard
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Schedule Interview -->
<div class="modal fade" id="scheduleInterviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold"><i class="bi bi-calendar2-plus text-primary me-2"></i> Schedule Candidate Interview</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Select Candidate *</label>
                        <select class="form-select select2" required>
                            <option>Siddharth Nair (iOS App Developer)</option>
                            <option>Rahul Verma (Lead Backend Engineer)</option>
                            <option>Priya Sundaram (Financial Analyst)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Interview Round *</label>
                        <select class="form-select">
                            <option>Initial Screening</option>
                            <option>Technical Round 1</option>
                            <option>Technical Round 2 (System Design)</option>
                            <option>Managerial Round</option>
                            <option>HR & Culture Fit</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Assigned Interviewer(s) *</label>
                        <select class="form-select select2" required>
                            <option>Daniel Martinez (Senior Backend Dev)</option>
                            <option>Amelia Curr (Design Lead)</option>
                            <option>Sarah Mitchell (HR Admin)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Date *</label>
                        <input type="date" class="form-control" value="2026-03-02" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Time *</label>
                        <input type="time" class="form-control" value="15:30" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold" style="font-size:12.5px;">Meeting Link / Venue</label>
                        <input type="text" class="form-control" placeholder="https://meet.google.com/xyz-abcd-efg or Conference Room 3B">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="alert('Interview invitation sent to candidate and panel calendar!'); $('#scheduleInterviewModal').modal('hide');">
                    <i class="bi bi-send me-1"></i> Send Invites
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
