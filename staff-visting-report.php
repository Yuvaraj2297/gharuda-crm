<?php include 'header.php'; ?>


<style>
    /* Report switch tabs */
    .report-switch-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .rstab {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 9px 18px;
        text-decoration: none;
        transition: .15s;
    }

    .rstab i {
        font-size: 14px;
        color: #6b7280;
    }

    .rstab:hover {
        border-color: #86efac;
        color: #15803d;
        text-decoration: none;
    }

    .rstab:hover i {
        color: #15803d;
    }

    .rstab.active {
        background: linear-gradient(135deg, #16a34a, #15803d);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 2px 6px rgba(22, 163, 74, .3);
    }

    .rstab.active i {
        color: #fff;
    }

</style>

<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
    <h1 class="font-display fw-bold mb-1 page-title" id="pageTitle">Staff Visiting Reports</h1>
</div>

<!-- Report switch tabs -->
<div class="report-switch-tabs">
    <a class="rstab active" href="staff-visting-report.php"><i class="bi bi-signpost-split"></i>Staff Visiting Reports</a>
    <a class="rstab" href="staff-visiting-location-report.php"><i class="bi bi-geo-alt"></i>Staff Visiting Location Report</a>
</div>

<div class="card-custom p-0" id="staffVisitWrap">

    <!-- Filter -->
    <form id="filterForm" class="p-3 pb-0" onsubmit="return false;">
        <div class="row g-3 align-items-center mb-3">
            <div class="col-lg-3 col-md-6">
                <select class="form-select select2" id="filter_staff">
                    <option value="all" selected>All Staff</option>
                    <option value="ghrA0011">GHARUDA SOFTWARE</option>
                    <option value="ghrA0012">ASHISH</option>
                    <option value="1234">thilak ma</option>
                    <option value="ghrA0014">KISHORE R</option>
                    <option value="ghrA0015">Rokith R</option>
                    <option value="ghrA0016">Prabhu S</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <input type="date" class="form-control" id="filter_from" value="2026-10-03">
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <input type="date" class="form-control" id="filter_to" value="2026-10-17">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary btn-sm px-3" id="btnSearch">Search</button>
                <button type="button" class="btn btn-danger btn-sm px-3" id="btnReset">Reset</button>
            </div>
        </div>
        <div class="text-danger small mb-3 d-none" id="dateError">From Date should not be greater than To Date</div>
    </form>

    <!-- Table (toolbar, columns, export, search, show entries & pagination are auto-created by the "datatable" class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="staffVisitTable" data-table-name="Staff Visiting Report">
            <thead>
                <tr>
                    <th class="text-center" style="width:70px;">S.No.</th>
                    <th class="text-center">Staff Name</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Total KM</th>
                </tr>
            </thead>
            <tbody id="staffVisitTbody">
                <tr data-staff="ghrA0011" data-date="2026-10-17">
                    <td class="">1</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">17-10-2026</td>
                    <td class=""><span data-sort="25"><b>25</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-17">
                    <td class="">2</td>
                    <td class="">ASHISH</td>
                    <td class="">17-10-2026</td>
                    <td class=""><span data-sort="36.4"><b>36.4</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-17">
                    <td class="">3</td>
                    <td class="">thilak ma</td>
                    <td class="">17-10-2026</td>
                    <td class=""><span data-sort="47.8"><b>47.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-17">
                    <td class="">4</td>
                    <td class="">KISHORE R</td>
                    <td class="">17-10-2026</td>
                    <td class=""><span data-sort="19.3"><b>19.3</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-17">
                    <td class="">5</td>
                    <td class="">Rokith R</td>
                    <td class="">17-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-17">
                    <td class="">6</td>
                    <td class="">Prabhu S</td>
                    <td class="">17-10-2026</td>
                    <td class=""><span data-sort="30.7"><b>30.7</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-16">
                    <td class="">7</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">16-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-16">
                    <td class="">8</td>
                    <td class="">ASHISH</td>
                    <td class="">16-10-2026</td>
                    <td class=""><span data-sort="22.3"><b>22.3</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-16">
                    <td class="">9</td>
                    <td class="">thilak ma</td>
                    <td class="">16-10-2026</td>
                    <td class=""><span data-sort="33.7"><b>33.7</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-16">
                    <td class="">10</td>
                    <td class="">KISHORE R</td>
                    <td class="">16-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-16">
                    <td class="">11</td>
                    <td class="">Rokith R</td>
                    <td class="">16-10-2026</td>
                    <td class=""><span data-sort="45.1"><b>45.1</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-16">
                    <td class="">12</td>
                    <td class="">Prabhu S</td>
                    <td class="">16-10-2026</td>
                    <td class=""><span data-sort="16.6"><b>16.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-15">
                    <td class="">13</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">15-10-2026</td>
                    <td class=""><span data-sort="43.8"><b>43.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-15">
                    <td class="">14</td>
                    <td class="">ASHISH</td>
                    <td class="">15-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-15">
                    <td class="">15</td>
                    <td class="">thilak ma</td>
                    <td class="">15-10-2026</td>
                    <td class=""><span data-sort="19.6"><b>19.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-15">
                    <td class="">16</td>
                    <td class="">KISHORE R</td>
                    <td class="">15-10-2026</td>
                    <td class=""><span data-sort="38.1"><b>38.1</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-15">
                    <td class="">17</td>
                    <td class="">Rokith R</td>
                    <td class="">15-10-2026</td>
                    <td class=""><span data-sort="31"><b>31</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-15">
                    <td class="">18</td>
                    <td class="">Prabhu S</td>
                    <td class="">15-10-2026</td>
                    <td class=""><span data-sort="3.5"><b>3.5</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-14">
                    <td class="">19</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">14-10-2026</td>
                    <td class=""><span data-sort="29.7"><b>29.7</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-14">
                    <td class="">20</td>
                    <td class="">ASHISH</td>
                    <td class="">14-10-2026</td>
                    <td class=""><span data-sort="41.1"><b>41.1</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-14">
                    <td class="">21</td>
                    <td class="">thilak ma</td>
                    <td class="">14-10-2026</td>
                    <td class=""><span data-sort="6.5"><b>6.5</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-14">
                    <td class="">22</td>
                    <td class="">KISHORE R</td>
                    <td class="">14-10-2026</td>
                    <td class=""><span data-sort="24"><b>24</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-14">
                    <td class="">23</td>
                    <td class="">Rokith R</td>
                    <td class="">14-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-14">
                    <td class="">24</td>
                    <td class="">Prabhu S</td>
                    <td class="">14-10-2026</td>
                    <td class=""><span data-sort="35.4"><b>35.4</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-13">
                    <td class="">25</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">13-10-2026</td>
                    <td class=""><span data-sort="15.6"><b>15.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-13">
                    <td class="">26</td>
                    <td class="">ASHISH</td>
                    <td class="">13-10-2026</td>
                    <td class=""><span data-sort="27"><b>27</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-13">
                    <td class="">27</td>
                    <td class="">thilak ma</td>
                    <td class="">13-10-2026</td>
                    <td class=""><span data-sort="38.4"><b>38.4</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-13">
                    <td class="">28</td>
                    <td class="">KISHORE R</td>
                    <td class="">13-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-13">
                    <td class="">29</td>
                    <td class="">Rokith R</td>
                    <td class="">13-10-2026</td>
                    <td class=""><span data-sort="3.8"><b>3.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-13">
                    <td class="">30</td>
                    <td class="">Prabhu S</td>
                    <td class="">13-10-2026</td>
                    <td class=""><span data-sort="21.3"><b>21.3</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-12">
                    <td class="">31</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">12-10-2026</td>
                    <td class=""><span data-sort="48.5"><b>48.5</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-12">
                    <td class="">32</td>
                    <td class="">ASHISH</td>
                    <td class="">12-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-12">
                    <td class="">33</td>
                    <td class="">thilak ma</td>
                    <td class="">12-10-2026</td>
                    <td class=""><span data-sort="24.3"><b>24.3</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-12">
                    <td class="">34</td>
                    <td class="">KISHORE R</td>
                    <td class="">12-10-2026</td>
                    <td class=""><span data-sort="42.8"><b>42.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-12">
                    <td class="">35</td>
                    <td class="">Rokith R</td>
                    <td class="">12-10-2026</td>
                    <td class=""><span data-sort="35.7"><b>35.7</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-12">
                    <td class="">36</td>
                    <td class="">Prabhu S</td>
                    <td class="">12-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-11">
                    <td class="">37</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">11-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-11">
                    <td class="">38</td>
                    <td class="">ASHISH</td>
                    <td class="">11-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-11">
                    <td class="">39</td>
                    <td class="">thilak ma</td>
                    <td class="">11-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-11">
                    <td class="">40</td>
                    <td class="">KISHORE R</td>
                    <td class="">11-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-11">
                    <td class="">41</td>
                    <td class="">Rokith R</td>
                    <td class="">11-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-11">
                    <td class="">42</td>
                    <td class="">Prabhu S</td>
                    <td class="">11-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-10">
                    <td class="">43</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">10-10-2026</td>
                    <td class=""><span data-sort="20.3"><b>20.3</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-10">
                    <td class="">44</td>
                    <td class="">ASHISH</td>
                    <td class="">10-10-2026</td>
                    <td class=""><span data-sort="31.7"><b>31.7</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-10">
                    <td class="">45</td>
                    <td class="">thilak ma</td>
                    <td class="">10-10-2026</td>
                    <td class=""><span data-sort="43.1"><b>43.1</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-10">
                    <td class="">46</td>
                    <td class="">KISHORE R</td>
                    <td class="">10-10-2026</td>
                    <td class=""><span data-sort="14.6"><b>14.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-10">
                    <td class="">47</td>
                    <td class="">Rokith R</td>
                    <td class="">10-10-2026</td>
                    <td class=""><span data-sort="8.5"><b>8.5</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-10">
                    <td class="">48</td>
                    <td class="">Prabhu S</td>
                    <td class="">10-10-2026</td>
                    <td class=""><span data-sort="26"><b>26</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-09">
                    <td class="">49</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">09-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-09">
                    <td class="">50</td>
                    <td class="">ASHISH</td>
                    <td class="">09-10-2026</td>
                    <td class=""><span data-sort="17.6"><b>17.6</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-09">
                    <td class="">51</td>
                    <td class="">thilak ma</td>
                    <td class="">09-10-2026</td>
                    <td class=""><span data-sort="29"><b>29</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-09">
                    <td class="">52</td>
                    <td class="">KISHORE R</td>
                    <td class="">09-10-2026</td>
                    <td class=""><span data-sort="47.5"><b>47.5</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-09">
                    <td class="">53</td>
                    <td class="">Rokith R</td>
                    <td class="">09-10-2026</td>
                    <td class=""><span data-sort="40.4"><b>40.4</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-09">
                    <td class="">54</td>
                    <td class="">Prabhu S</td>
                    <td class="">09-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-08">
                    <td class="">55</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">08-10-2026</td>
                    <td class=""><span data-sort="39.1"><b>39.1</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-08">
                    <td class="">56</td>
                    <td class="">ASHISH</td>
                    <td class="">08-10-2026</td>
                    <td class=""><span data-sort="4.5"><b>4.5</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-08">
                    <td class="">57</td>
                    <td class="">thilak ma</td>
                    <td class="">08-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-08">
                    <td class="">58</td>
                    <td class="">KISHORE R</td>
                    <td class="">08-10-2026</td>
                    <td class=""><span data-sort="33.4"><b>33.4</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-08">
                    <td class="">59</td>
                    <td class="">Rokith R</td>
                    <td class="">08-10-2026</td>
                    <td class=""><span data-sort="26.3"><b>26.3</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-08">
                    <td class="">60</td>
                    <td class="">Prabhu S</td>
                    <td class="">08-10-2026</td>
                    <td class=""><span data-sort="44.8"><b>44.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-07">
                    <td class="">61</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">07-10-2026</td>
                    <td class=""><span data-sort="25"><b>25</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-07">
                    <td class="">62</td>
                    <td class="">ASHISH</td>
                    <td class="">07-10-2026</td>
                    <td class=""><span data-sort="36.4"><b>36.4</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-07">
                    <td class="">63</td>
                    <td class="">thilak ma</td>
                    <td class="">07-10-2026</td>
                    <td class=""><span data-sort="47.8"><b>47.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-07">
                    <td class="">64</td>
                    <td class="">KISHORE R</td>
                    <td class="">07-10-2026</td>
                    <td class=""><span data-sort="19.3"><b>19.3</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-07">
                    <td class="">65</td>
                    <td class="">Rokith R</td>
                    <td class="">07-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-07">
                    <td class="">66</td>
                    <td class="">Prabhu S</td>
                    <td class="">07-10-2026</td>
                    <td class=""><span data-sort="30.7"><b>30.7</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-06">
                    <td class="">67</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">06-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-06">
                    <td class="">68</td>
                    <td class="">ASHISH</td>
                    <td class="">06-10-2026</td>
                    <td class=""><span data-sort="22.3"><b>22.3</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-06">
                    <td class="">69</td>
                    <td class="">thilak ma</td>
                    <td class="">06-10-2026</td>
                    <td class=""><span data-sort="33.7"><b>33.7</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-06">
                    <td class="">70</td>
                    <td class="">KISHORE R</td>
                    <td class="">06-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-06">
                    <td class="">71</td>
                    <td class="">Rokith R</td>
                    <td class="">06-10-2026</td>
                    <td class=""><span data-sort="45.1"><b>45.1</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-06">
                    <td class="">72</td>
                    <td class="">Prabhu S</td>
                    <td class="">06-10-2026</td>
                    <td class=""><span data-sort="16.6"><b>16.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-05">
                    <td class="">73</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">05-10-2026</td>
                    <td class=""><span data-sort="43.8"><b>43.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-05">
                    <td class="">74</td>
                    <td class="">ASHISH</td>
                    <td class="">05-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-05">
                    <td class="">75</td>
                    <td class="">thilak ma</td>
                    <td class="">05-10-2026</td>
                    <td class=""><span data-sort="19.6"><b>19.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-05">
                    <td class="">76</td>
                    <td class="">KISHORE R</td>
                    <td class="">05-10-2026</td>
                    <td class=""><span data-sort="38.1"><b>38.1</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-05">
                    <td class="">77</td>
                    <td class="">Rokith R</td>
                    <td class="">05-10-2026</td>
                    <td class=""><span data-sort="31"><b>31</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-05">
                    <td class="">78</td>
                    <td class="">Prabhu S</td>
                    <td class="">05-10-2026</td>
                    <td class=""><span data-sort="3.5"><b>3.5</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-04">
                    <td class="">79</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">04-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-04">
                    <td class="">80</td>
                    <td class="">ASHISH</td>
                    <td class="">04-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-04">
                    <td class="">81</td>
                    <td class="">thilak ma</td>
                    <td class="">04-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-04">
                    <td class="">82</td>
                    <td class="">KISHORE R</td>
                    <td class="">04-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-04">
                    <td class="">83</td>
                    <td class="">Rokith R</td>
                    <td class="">04-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-04">
                    <td class="">84</td>
                    <td class="">Prabhu S</td>
                    <td class="">04-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0011" data-date="2026-10-03">
                    <td class="">85</td>
                    <td class="">GHARUDA SOFTWARE</td>
                    <td class="">03-10-2026</td>
                    <td class=""><span data-sort="15.6"><b>15.6</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0012" data-date="2026-10-03">
                    <td class="">86</td>
                    <td class="">ASHISH</td>
                    <td class="">03-10-2026</td>
                    <td class=""><span data-sort="27"><b>27</b> km</span></td>
                </tr>
                <tr data-staff="1234" data-date="2026-10-03">
                    <td class="">87</td>
                    <td class="">thilak ma</td>
                    <td class="">03-10-2026</td>
                    <td class=""><span data-sort="38.4"><b>38.4</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0014" data-date="2026-10-03">
                    <td class="">88</td>
                    <td class="">KISHORE R</td>
                    <td class="">03-10-2026</td>
                    <td class=""><span data-sort="0">0 km</span></td>
                </tr>
                <tr data-staff="ghrA0015" data-date="2026-10-03">
                    <td class="">89</td>
                    <td class="">Rokith R</td>
                    <td class="">03-10-2026</td>
                    <td class=""><span data-sort="3.8"><b>3.8</b> km</span></td>
                </tr>
                <tr data-staff="ghrA0016" data-date="2026-10-03">
                    <td class="">90</td>
                    <td class="">Prabhu S</td>
                    <td class="">03-10-2026</td>
                    <td class=""><span data-sort="21.3"><b>21.3</b> km</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<script src="./assets/js/pages/staff-visting-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>