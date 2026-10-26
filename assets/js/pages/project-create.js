/**
 * Gharuda CRM - Project Create Page Script
 * File: assets/js/pages/project-create.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// Tab Switcher
    function switchProjTab(tabName) {
        var btnProject = document.getElementById('tabBtnProject');
        var btnSettings = document.getElementById('tabBtnSettings');
        var contentProject = document.getElementById('tabContentProject');
        var contentSettings = document.getElementById('tabContentSettings');

        if (tabName === 'project') {
            btnProject.classList.add('active');
            btnSettings.classList.remove('active');
            contentProject.style.display = 'block';
            contentSettings.style.display = 'none';
        } else {
            btnSettings.classList.add('active');
            btnProject.classList.remove('active');
            contentSettings.style.display = 'block';
            contentProject.style.display = 'none';
        }
    }

    // Toggle Task Progress Calculation
    function toggleProgressCalc(chk) {
        var fill = document.getElementById('progressFillBar');
        var text = document.getElementById('progressValText');
        if (chk.checked) {
            fill.style.width = '0%';
            text.innerText = '0%';
        } else {
            fill.style.width = '50%';
            text.innerText = '50%';
        }
    }

    // Quill Rich Text Editor Instance
    var quill = null;
    function initProjectQuill() {
        if (quill || typeof Quill === 'undefined') return;
        quill = new Quill('#projectQuillEditor', {
            theme: 'snow',
            placeholder: 'Write detailed project scope, milestones, deliverables, and instructions...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    [{ 'font': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['link', 'image', 'clean']
                ]
            }
        });

        quill.on('text-change', function() {
            var descArea = document.getElementById('projDescription');
            if (descArea) {
                var text = quill.getText().trim();
                descArea.value = text.length > 0 ? quill.root.innerHTML : '';
            }
        });
    }

    // Form Submit Handler
    function handleSubmitProject(e) {
        e.preventDefault();
        var name = document.getElementById('projName').value.trim();
        var customer = document.getElementById('projCustomer').value;

        if (!name) {
            alert('Please enter a Project Name.');
            document.getElementById('projName').focus();
            return;
        }

        if (!customer) {
            alert('Please select a Customer.');
            $('#projCustomer').select2('open');
            return;
        }

        // Make sure Quill content is synced to hidden textarea
        if (quill) {
            var text = quill.getText().trim();
            document.getElementById('projDescription').value = text.length > 0 ? quill.root.innerHTML : '';
        }

        alert('Project "' + name + '" created successfully!');
        window.location.href = 'projects-list.php';
    }

    // Initialize Select2 and Quill on DOM ready
    document.addEventListener("DOMContentLoaded", function () {
        initProjectQuill();

        if (typeof jQuery !== 'undefined' && jQuery.fn.select2) {
            jQuery('.select2').each(function() {
                var $this = jQuery(this);
                if (!$this.hasClass("select2-hidden-accessible")) {
                    $this.select2({
                        width: '100%',
                        placeholder: $this.attr('data-placeholder') || '',
                        allowClear: !$this.prop('required')
                    });
                }
            });
        }
    });
