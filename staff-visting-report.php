<?php include 'header.php'; ?>

<main class="svr-summary-page">

    <!-- Single-Row Enterprise Page Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip bg-primary-subtle text-primary d-flex align-items-center justify-content-center rounded-3" style="width:42px;height:42px;">
                <i class="bi bi-signpost-split fs-5"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title" id="pageTitle">Staff Visiting Reports</h1>
                <p class="text-muted font-12 mb-0">Daily field staff distance traveled (KM), route logs &amp; visiting activity summary</p>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <!-- Quick Distance Filter Pills -->
            <ul class="nav nav-pills gap-1 bg-white p-1 border rounded-pill shadow-xs" id="svsKmTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active rounded-pill px-3 py-1 font-12 fw-semibold" data-km="all">
                        <i class="bi bi-layers me-1"></i>All Logs
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-km="active">
                        <i class="bi bi-check2-circle me-1"></i>Active (&gt;0 km)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link rounded-pill px-3 py-1 font-12 fw-semibold" data-km="zero">
                        <i class="bi bi-dash-circle me-1"></i>No Travel (0 km)
                    </button>
                </li>
            </ul>

            <!-- Offcanvas Filter Button -->
            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" data-bs-toggle="offcanvas" data-bs-target="#svsFilterOffcanvas">
                <i class="bi bi-funnel text-primary"></i>
                <span>Filters</span>
                <span class="badge rounded-pill bg-primary text-white font-10 d-none" id="svsFilterCountBadge">0</span>
            </button>

            <!-- Header Actions Dropdown -->
            <div class="dropdown">
                <button class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-lightning-charge text-primary"></i>
                    <span>Actions</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end table-action-menu shadow-lg border-0 p-2">
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="staff-visiting-location-report.php">
                            <span class="action-icon-pill bg-primary-subtle text-primary"><i class="bi bi-geo-alt"></i></span>
                            <span>Location Audit Report</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-2 py-2" href="lead-map.php">
                            <span class="action-icon-pill bg-success-subtle text-success"><i class="bi bi-map"></i></span>
                            <span>Field Staff Live Map</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider my-1"></li>
                    <li>
                        <button type="button" class="dropdown-item rounded-2 py-2" onclick="window.print()">
                            <span class="action-icon-pill bg-secondary-subtle text-secondary"><i class="bi bi-printer"></i></span>
                            <span>Print Visiting Report</span>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Primary CTA -->
            <a href="staff-visiting-location-report.php" class="btn btn-primary fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-sm">
                <i class="bi bi-geo-alt"></i>
                <span>Location Report</span>
            </a>
        </div>
    </div>

    <div class="card-custom p-0 mb-4" id="staffVisitWrap">

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

    <!-- Slide-Over Offcanvas Filter Drawer -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="svsFilterOffcanvas" aria-labelledby="svsFilterOffcanvasLabel" style="width: 380px;">
        <div class="offcanvas-header border-bottom bg-light py-3 px-4">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-chip bg-primary-subtle text-primary rounded-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                    <i class="bi bi-sliders"></i>
                </div>
                <div>
                    <h6 class="offcanvas-title fw-bold mb-0 font-14" id="svsFilterOffcanvasLabel">Filter Visiting Summary</h6>
                    <span class="text-muted font-11">Narrow by field staff, distance &amp; date range</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4 py-3">
            <form id="filterForm" autocomplete="off" onsubmit="return false;">
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="filter_km">Travel Activity Filter</label>
                    <select class="form-select font-13" id="filter_km">
                        <option value="all">All Logs</option>
                        <option value="active">Active Travel (&gt; 0 km)</option>
                        <option value="zero">No Travel (0 km)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="filter_staff">Field Staff</label>
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
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="filter_from">From Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="filter_from" value="03-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="filter_to">To Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="filter_to" value="17-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="text-danger small mb-2 d-none" id="dateError">From Date should not be greater than To Date</div>
            </form>
        </div>
        <div class="offcanvas-footer border-top bg-light p-3 d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-semibold font-13" id="btnReset">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
            <button type="button" class="btn btn-primary flex-fill fw-semibold font-13" id="btnSearch" data-bs-dismiss="offcanvas">
                <i class="bi bi-check2-circle me-1"></i>Apply Filters
            </button>
        </div>
    </div>
</main>

<script>
    (function() {
        'use strict';

        var DEFAULT_FROM = '03-10-2026';
        var DEFAULT_TO = '17-10-2026';

        var tbody = document.getElementById('staffVisitTbody');
        var table = document.getElementById('staffVisitTable');

        // Keep a pristine copy of the static rows (taken before the datatable initialises)
        var allRows = Array.prototype.map.call(tbody.querySelectorAll('tr'), function(tr) {
            var kmSpan = tr.querySelector('[data-sort]');
            var kmVal = kmSpan ? parseFloat(kmSpan.getAttribute('data-sort') || '0') : 0;
            return {
                staff: tr.getAttribute('data-staff'),
                date: tr.getAttribute('data-date'),
                km: kmVal,
                html: tr.outerHTML
            };
        });

        function dmyToISO(str) {
            var v = (str || '').trim();
            if (/^\d{4}-\d{2}-\d{2}$/.test(v)) return v;
            var m = /^(\d{2})-(\d{2})-(\d{4})$/.exec(v);
            return m ? (m[3] + '-' + m[2] + '-' + m[1]) : '';
        }

        function updateFilterBadge() {
            var count = 0;
            var kmVal = document.getElementById('filter_km').value;
            var staffVal = document.getElementById('filter_staff').value;
            var fromVal = document.getElementById('filter_from').value;
            var toVal = document.getElementById('filter_to').value;

            if (kmVal !== 'all') count++;
            if (staffVal !== 'all') count++;
            if (fromVal && fromVal !== DEFAULT_FROM) count++;
            if (toVal && toVal !== DEFAULT_TO) count++;

            var badge = document.getElementById('svsFilterCountBadge');
            if (badge) {
                badge.textContent = count;
                badge.classList.toggle('d-none', count === 0);
            }
        }

        function syncKmTabs(kmVal) {
            var tabs = document.querySelectorAll('#svsKmTabs .nav-link');
            Array.prototype.forEach.call(tabs, function(btn) {
                btn.classList.toggle('active', btn.getAttribute('data-km') === kmVal);
            });
        }

        function applyFilter() {
            var kmFilter = document.getElementById('filter_km').value;
            var staffId = document.getElementById('filter_staff').value;
            var from = dmyToISO(document.getElementById('filter_from').value);
            var to = dmyToISO(document.getElementById('filter_to').value);
            var err = document.getElementById('dateError');

            if (from && to && from > to) {
                err.classList.remove('d-none');
                return;
            }
            err.classList.add('d-none');

            syncKmTabs(kmFilter);
            updateFilterBadge();

            var html = allRows.filter(function(r) {
                if (kmFilter === 'active' && r.km <= 0) return false;
                if (kmFilter === 'zero' && r.km > 0) return false;
                if (staffId !== 'all' && r.staff !== staffId) return false;
                if (from && r.date < from) return false;
                if (to && r.date > to) return false;
                return true;
            }).map(function(r) {
                return r.html;
            }).join('');

            tbody.innerHTML = html;
            if (table && table.autoTable) table.autoTable.refresh(); // re-run search / sort / pagination / S.No
        }

        var tabButtons = document.querySelectorAll('#svsKmTabs .nav-link');
        Array.prototype.forEach.call(tabButtons, function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('filter_km').value = btn.getAttribute('data-km') || 'all';
                applyFilter();
            });
        });

        document.getElementById('btnSearch').addEventListener('click', applyFilter);

        document.getElementById('btnReset').addEventListener('click', function() {
            document.getElementById('filter_km').value = 'all';
            document.getElementById('filter_staff').value = 'all';
            if (window.jQuery) window.jQuery('#filter_staff').trigger('change'); // refresh select2
            document.getElementById('filter_from').value = DEFAULT_FROM;
            document.getElementById('filter_to').value = DEFAULT_TO;
            applyFilter();
        });
    })();
</script>

<?php include 'footer.php'; ?>