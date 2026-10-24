<?php include 'header.php'; ?>



<div class="bg-white rounded p-3 mb-3">
    <label class="w-100 form-label fw-bold mb-3">Modals</label>
    <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#samplemodal">Sample Modal</button>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#smallmodal">Small Modal</button>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largemodal">Large Modal</button>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#fullscreenmodal">Fullscreen Modal</button>
    </div>
</div>


<div class="bg-white rounded p-3 mb-3">
    <label class="w-100 form-label fw-bold mb-3">Offcanvas</label>
    <div class="d-flex justify-content-start gap-3 align-items-center flex-wrap">
        <button class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Offcanvas Right</button>
        <button class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">Offcanvas Left</button>
        <button class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Offcanvas Top</button>
        <button class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Offcanvas Bottom</button>
    </div>
</div>


<!-- sample Modal -->
<div class="modal fade" id="samplemodal" tabindex="-1" aria-labelledby="samplemodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="samplemodalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 400px;">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- small Modal -->
<div class="modal fade" id="smallmodal" tabindex="-1" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="smallmodalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 200px;">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- large Modal -->
<div class="modal fade" id="largemodal" tabindex="-1" aria-labelledby="largemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="largemodalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 400px;">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- fullscreen Modal -->
<div class="modal fade" id="fullscreenmodal" tabindex="-1" aria-labelledby="fullscreenmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="fullscreenmodalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 400px;">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- right offcanvas  -->
<div class="offcanvas offcanvas-end" id="offcanvasRight">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>

<!-- left offcanvas  -->
<div class="offcanvas offcanvas-start" id="offcanvasLeft">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLeftLabel">Offcanvas Left</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>

<!-- top offcanvas  -->
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>


<!-- bottom offcanvas  -->
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
        ...
    </div>
</div>

<?php include 'footer.php'; ?>