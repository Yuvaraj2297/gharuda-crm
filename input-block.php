<?php include 'header.php'; ?>
 

<div class="row bg-white rounded p-3 g-3 mb-3">
    <div class="col-md-4">
        <label for="inputtext" class="form-label">Input text</label>
        <input type="text" class="form-control" id="inputtext" placeholder="Type here">
    </div>
    <div class="col-md-4">
        <label for="inputtext" class="form-label">Input Email</label>
        <input type="email" class="form-control" id="inputtext" placeholder="Type here">
    </div>
    <div class="col-md-4">
        <label for="inputtext" class="form-label">Input password</label>
        <input type="password" class="form-control" id="inputtext" placeholder="Type here">
    </div>
    <div class="col-md-4">
        <label for="inputtext" class="form-label">Input Select</label>
        <select class="form-select select2" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="col-md-8">
        <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
</div>

<div class="row bg-white rounded p-3 g-3 mt-3">
    <div class="col-4">
        <label for="inputtext" class="form-label">Select with Search</label>
        <select id="employeeSelect" class="form-select">
            <option value=""></option>
            <option value="1"
                data-image="./assets/img/profile-1.jpg">
                Arun Kumar
            </option>
            <option value="2"
                data-image="./assets/img/profile-2.jpg">
                Bala Kumar
            </option>
            <option value="3"
                data-image="./assets/img/profile-3.jpg">
                Chandran
            </option>
            <option value="4"
                data-image="./assets/img/profile-4.jpg">
                Dinesh Kumar
            </option>
        </select>
    </div>
</div>


<div class="d-flex gap-3 align-items-center bg-white rounded p-4 pb-3 g-3 mt-3">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
        <label class="form-check-label" for="radioDefault1">
            Radio Button
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input " type="radio" name="radioDefault" id="radioDefault2" disabled>
        <label class="form-check-label" for="radioDefault2">
            disabled Radio Button
        </label>
    </div>
</div>

<div class="d-flex gap-4 flex-wrap align-items-center bg-white rounded p-4 pb-3 g-3 mt-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
        <label class="form-check-label" for="switchCheckDefault">Default switch</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" checked>
        <label class="form-check-label" for="switchCheckChecked">Checked switch</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDisabled" disabled>
        <label class="form-check-label" for="switchCheckDisabled">Disabled switch</label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckCheckedDisabled" checked disabled>
        <label class="form-check-label" for="switchCheckCheckedDisabled">Disabled checked switch</label>
    </div>
</div>


<div class="d-flex gap-4 flex-wrap align-items-center bg-white rounded p-4 pb-3 g-3 mt-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="checkDefault">
        <label class="form-check-label" for="checkDefault">
            Default checkbox
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
        <label class="form-check-label" for="checkChecked">
            Checked checkbox
        </label>
    </div>
</div>

<?php include 'footer.php'; ?>


 

<script>
    $('#employeeSelect').select2({
        width: '100%',
        placeholder: 'Select Employee',
        allowClear: true,

        templateResult: function(data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-option">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        },

        templateSelection: function(data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-selected">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        }
    });
</script>