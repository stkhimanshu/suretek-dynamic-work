<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>GHL Announcements – Full Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        .ClientSuccessAnnouncement-app {
            display: flex;
            height: 100vh;
        }

        /* ----------------- ADMIN SIDE ----------------- */
        .ClientSuccessAnnouncement-admin-shell {
            width: 65%;
            display: flex;
            flex-direction: row;
            border-right: 1px solid #e5e7eb;
            background: #ffffff;
        }

        .ClientSuccessAnnouncement-admin-sidebar {
            width: 180px;
            border-right: 1px solid #e5e7eb;
            background: #0f172a;
            color: #e5e7eb;
            display: flex;
            flex-direction: column;
        }

        .ClientSuccessAnnouncement-admin-logo {
            padding: 14px 16px;
            border-bottom: 1px solid rgba(148, 163, 184, .3);
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .ClientSuccessAnnouncement-admin-logo span {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: #38bdf8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            color: #0f172a;
        }

        .ClientSuccessAnnouncement-admin-nav {
            padding: 10px 8px;
        }

        .ClientSuccessAnnouncement-admin-nav button {
            width: 100%;
            border: none;
            background: transparent;
            color: #cbd5f5;
            padding: 7px 10px;
            border-radius: 4px;
            font-size: 13px;
            text-align: left;
            cursor: pointer;
            margin-bottom: 4px;
        }

        .ClientSuccessAnnouncement-admin-nav button.ClientSuccessAnnouncement-active {
            background: #1d4ed8;
            color: #ffffff;
        }

        .ClientSuccessAnnouncement-admin-nav button:hover:not(.ClientSuccessAnnouncement-active) {
            background: rgba(148, 163, 184, .2);
        }

        .ClientSuccessAnnouncement-admin-main {
            flex: 1;
            padding: 16px 18px;
            overflow: auto;
        }

        .ClientSuccessAnnouncement-admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .ClientSuccessAnnouncement-admin-header h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .ClientSuccessAnnouncement-btn-green {
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 7px 12px;
            font-size: 13px;
            cursor: pointer;
        }

        .ClientSuccessAnnouncement-btn-green:hover {
            background: #15803d;
        }

        .ClientSuccessAnnouncement-admin-controls {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .ClientSuccessAnnouncement-admin-controls select {
            font-size: 12px;
            padding: 2px 4px;
        }

        .ClientSuccessAnnouncement-table {
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            background: #ffffff;
            margin-bottom: 15px;
        }

        /* UPDATED: extra column for Locations */
        .ClientSuccessAnnouncement-table-header,
        .ClientSuccessAnnouncement-table-row {
            display: grid;
            grid-template-columns: 50px minmax(0, 1fr) 75px 96px 63px 250px 85px 125px;
            font-size: 12px;
        }

        .ClientSuccessAnnouncement-table-header {
            background: #f9fafb;
            font-weight: 600;
            border-bottom: 1px solid #e5e7eb;
        }

        .ClientSuccessAnnouncement-table-header div,
        .ClientSuccessAnnouncement-table-row div {
            padding: 8px 10px;
            border-right: 1px solid #e5e7eb;
        }

        .ClientSuccessAnnouncement-table-header div:last-child,
        .ClientSuccessAnnouncement-table-row div:last-child {
            border-right: none;
        }

        .ClientSuccessAnnouncement-table-row:nth-child(even) {
            background: #f9fafb;
        }

        .ClientSuccessAnnouncement-badge {
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 11px;
            display: inline-block;
        }

        .ClientSuccessAnnouncement-badge-pub {
            background: #dcfce7;
            color: #166534;
        }

        .ClientSuccessAnnouncement-badge-draft {
            background: #fef9c3;
            color: #854d0e;
        }

        .ClientSuccessAnnouncement-badge-popup {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .ClientSuccessAnnouncement-badge-pending {
            background: red;
            color: #f4f5fa;
        }

        .ClientSuccessAnnouncement-badge-reviewed {
            background: #dcfce7;
            color: #1d4ed8;
        }

        .ClientSuccessAnnouncement-admin-actions button {
            margin-right: 4px;
            padding: 3px 6px;
            font-size: 11px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            cursor: pointer;
        }

        .ClientSuccessAnnouncement-admin-actions button:hover {
            background: #e5e7eb;
        }

        .ClientSuccessAnnouncement-admin-empty {
            padding: 14px;
            font-size: 13px;
            color: #9ca3af;
        }

        /* Pagination Styles */
        .ClientSuccessAnnouncement-pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-top: 1px solid #e5e7eb;
            background: #f9fafb;
            font-size: 13px;
        }

        .ClientSuccessAnnouncement-pagination-info {
            color: #6b7280;
        }

        .ClientSuccessAnnouncement-pagination-controls {
            display: flex;
            gap: 5px;
        }

        .ClientSuccessAnnouncement-pagination-btn {
            padding: 5px 10px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .ClientSuccessAnnouncement-pagination-btn:hover:not(:disabled) {
            background: #f3f4f6;
        }

        .ClientSuccessAnnouncement-pagination-btn:disabled {
            color: #9ca3af;
            cursor: not-allowed;
        }

        .ClientSuccessAnnouncement-pagination-btn.ClientSuccessAnnouncement-active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .ClientSuccessAnnouncement-page-numbers {
            display: flex;
            gap: 5px;
            margin: 0 10px;
        }

        /* User Segmentation panel */
        .ClientSuccessAnnouncement-seg-box {
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            padding: 12px;
            background: #f9fafb;
            font-size: 13px;
        }

        .ClientSuccessAnnouncement-seg-section-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .06em;
            color: #6b7280;
            margin-top: 10px;
            margin-bottom: 4px;
        }

        /* ------------- CLIENT SIDE ------------- */
        .ClientSuccessAnnouncement-client-shell {
            flex: 1;
            padding: 16px 18px;
            overflow: auto;
        }

        .ClientSuccessAnnouncement-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
        }

        .ClientSuccessAnnouncement-tab {
            padding: 7px 12px;
            font-size: 13px;
            background: #e5e7eb;
            border-radius: 4px;
            cursor: pointer;
        }

        .ClientSuccessAnnouncement-tab.ClientSuccessAnnouncement-active {
            background: #1d4ed8;
            color: #ffffff;
        }

        .ClientSuccessAnnouncement-panel {
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            min-height: 120px;
            background: #ffffff;
        }

        .ClientSuccessAnnouncement-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 10px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 13px;
        }

        .ClientSuccessAnnouncement-row:last-child {
            border-bottom: none;
        }

        .ClientSuccessAnnouncement-row-title {
            font-weight: 600;
        }

        .ClientSuccessAnnouncement-btn-small {
            padding: 4px 8px;
            font-size: 11px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            cursor: pointer;
        }

        .ClientSuccessAnnouncement-btn-small:hover {
            background: #e5e7eb;
        }

        select.ClientSuccessAnnouncement-location-select {
            font-size: 13px;
            padding: 4px 6px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
        }

        /* ------------- MODAL (Create/Edit) ------------- */
        .ClientSuccessAnnouncement-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .35);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 60px;
            z-index: 9000;
        }

        .ClientSuccessAnnouncement-modal {
            width: 560px;
            max-height: 80vh;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .35);
            display: flex;
            flex-direction: column;
        }

        .ClientSuccessAnnouncement-modal-header {
            padding: 12px 16px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ClientSuccessAnnouncement-modal-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .ClientSuccessAnnouncement-modal-body {
            padding: 12px 16px;
            overflow: auto;
            font-size: 13px;
        }

        .ClientSuccessAnnouncement-modal-footer {
            padding: 10px 16px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 8px;
        }

        .ClientSuccessAnnouncement-modal-field {
            margin-bottom: 10px;
        }

        .ClientSuccessAnnouncement-modal-field label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .ClientSuccessAnnouncement-modal-field textarea {
            width: 100%;
            min-height: 80px;
            resize: vertical;
            padding: 6px 8px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
        }

        .ClientSuccessAnnouncement-modal-field input[type="text"],
        .ClientSuccessAnnouncement-modal-field input[type="url"],
        .ClientSuccessAnnouncement-modal-field select {
            width: 100%;
            padding: 6px 8px;
            border-radius: 4px;
            border: 1px solid #d1d5db;
            font-size: 13px;
        }

        .ClientSuccessAnnouncement-modal-field small {
            font-size: 11px;
            color: #6b7280;
        }

        /* ------------- POPUP (Client announcement) ------------- */
        .ClientSuccessAnnouncement-ms-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 60px;
            z-index: 9999;
        }

        .ClientSuccessAnnouncement-ms-modal {
            width: 70%;
            max-width: 900px;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.35);
            display: flex;
            flex-direction: column;
        }

        .ClientSuccessAnnouncement-ms-header {
            padding: 14px 18px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ClientSuccessAnnouncement-ms-header h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .ClientSuccessAnnouncement-ms-close {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .ClientSuccessAnnouncement-ms-body {
            padding: 18px;
            max-height: 50vh;
            overflow: auto;
            font-size: 14px;
        }

        .ClientSuccessAnnouncement-ms-footer {
            padding: 12px 18px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 8px;
        }

        /* Loading state */
        .ClientSuccessAnnouncement-loading {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
        }

        #ClientSuccessAnnouncement-clientLocationSelect {
            display: none;
        }

        .ClientSuccessAnnouncement-gsLocationDataId {
            display: none;
        }

        .ClientSuccessAnnouncement-gsLocationHeader {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="ClientSuccessAnnouncement-app">

        <!-- ADMIN SIDE -->
        <div class="ClientSuccessAnnouncement-admin-shell">

            <div class="ClientSuccessAnnouncement-admin-sidebar">
                <div class="ClientSuccessAnnouncement-admin-logo">
                    <span>MS</span> Sub Accounts<br />Announcements
                </div>
                <div class="ClientSuccessAnnouncement-admin-nav">
                    <button id="ClientSuccessAnnouncement-navDashboard" class="ClientSuccessAnnouncement-active" onclick="ClientSuccessAnnouncement_switchAdminTab('dashboard')">Dashboard</button>
                    <button id="ClientSuccessAnnouncement-navSegmentation" onclick="ClientSuccessAnnouncement_switchAdminTab('segmentation')">User Segmentation</button>
                </div>
            </div>

            <div class="ClientSuccessAnnouncement-admin-main">
                <!-- DASHBOARD -->
                <div id="ClientSuccessAnnouncement-adminDashboard">
                    <div class="ClientSuccessAnnouncement-admin-header">
                        <h2>Announcements</h2>
                        <div style="margin: auto;text-align: center;width: 50%;">
                            <label style="font-size: 14px;margin: 0;font-weight: 700;">Please Choose Your account from the list below:</label>
                            <select onchange="ClientSuccessAnnouncement_loadAnnouncements(this.value)" id="ClientSuccessAnnouncement-locationSelect" style="padding: 0px 0px;border-radius: 4px;border: 1px solid #d1d5db;text-align:center;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                                <option value="">Loading locations...</option>
                            </select>
                        </div>
                        <button class="ClientSuccessAnnouncement-btn-green" onclick="ClientSuccessAnnouncement_openAnnouncementForm()">+ Create Announcement</button>
                    </div>

                    <div class="ClientSuccessAnnouncement-admin-controls">
                        <span>Items per page:</span>
                        <select id="ClientSuccessAnnouncement-itemsPerPage" onchange="ClientSuccessAnnouncement_changeItemsPerPage()">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <label><input type="checkbox" id="ClientSuccessAnnouncement-showExpired" onchange="ClientSuccessAnnouncement_toggleExpired()" /> Show expired</label>
                        <label><input type="checkbox" id="ClientSuccessAnnouncement-showPreview" onchange="ClientSuccessAnnouncement_togglePreview()" /> Show content preview</label>
                    </div>

                    <div id="ClientSuccessAnnouncement-adminTableContainer">
                        <div class="ClientSuccessAnnouncement-loading">Loading announcements...</div>
                    </div>

                    <div id="ClientSuccessAnnouncement-paginationContainer"></div>
                </div>

                <!-- USER SEGMENTATION -->
                <div id="ClientSuccessAnnouncement-adminSegmentation" style="display:none;">
                    <h2>User Segmentation</h2>
                    <p style="font-size:13px; color:#6b7280; margin-bottom:10px;">
                        In the real system, this is where you'd define groups of sub-accounts
                        (e.g. "Rover Clients", "Beta Users", "High-Volume Teams") and tie them
                        to announcement targeting. For this demo, segmentation is kept simple.
                    </p>
                    <div class="ClientSuccessAnnouncement-seg-box">
                        <div class="ClientSuccessAnnouncement-seg-section-label">Example Segments</div>
                        <label><input type="checkbox" checked /> Rover feedback users</label><br />
                        <label><input type="checkbox" /> High ticket branches</label><br />
                        <label><input type="checkbox" /> Trial accounts</label>

                        <div class="ClientSuccessAnnouncement-seg-section-label">How it connects</div>
                        <p style="margin:0; font-size:13px;">
                            Segments map down to <strong>location IDs</strong>. In the
                            announcement form, you can choose "All locations" or target specific
                            locations. In a production build, you'd swap those checkboxes for
                            segment pickers.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CLIENT SIDE -->
        <div class="ClientSuccessAnnouncement-client-shell">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                <h2 style="margin:0;">Client View — Location:
                    <span id="ClientSuccessAnnouncement-locLabel">abc123</span>
                </h2>
                <select id="ClientSuccessAnnouncement-clientLocationSelect" class="ClientSuccessAnnouncement-location-select" onchange="ClientSuccessAnnouncement_onClientLocationChange()">

                </select>
            </div>

            <div class="ClientSuccessAnnouncement-tabs">
                <div id="ClientSuccessAnnouncement-tabLive" class="ClientSuccessAnnouncement-tab ClientSuccessAnnouncement-active" onclick="ClientSuccessAnnouncement_switchClientTab('live')">Live Announcements</div>
                <div id="ClientSuccessAnnouncement-tabDone" class="ClientSuccessAnnouncement-tab" onclick="ClientSuccessAnnouncement_switchClientTab('done')">Completed</div>
            </div>

            <div id="ClientSuccessAnnouncement-panelLive" class="ClientSuccessAnnouncement-panel">
                <div class="ClientSuccessAnnouncement-loading">Loading announcements...</div>
            </div>
            <div id="ClientSuccessAnnouncement-panelDone" class="ClientSuccessAnnouncement-panel" style="display:none;">
                <div class="ClientSuccessAnnouncement-loading">Loading announcements...</div>
            </div>
        </div>
    </div>

    <!-- CREATE / EDIT ANNOUNCEMENT MODAL -->
    <div id="ClientSuccessAnnouncement-announcementModal" style="display:none;"></div>

    <script>
        /* ===========================
            DATA MODELS (DEMO)
            =========================== */

        // Global announcements variable
        var ClientSuccessAnnouncement_announcements = [];
        var ClientSuccessAnnouncement_locationIds = [];
        var ClientSuccessAnnouncement_nextAnnouncementId = 2;
        var ClientSuccessAnnouncement_currentEditingId = null;

        // Pagination variables
        var ClientSuccessAnnouncement_currentPage = 1;
        var ClientSuccessAnnouncement_itemsPerPage = 10;
        var ClientSuccessAnnouncement_totalPages = 1;
        var ClientSuccessAnnouncement_showExpired = false;
        var ClientSuccessAnnouncement_showPreview = false;

        function ClientSuccessAnnouncement_getLocationDetails() {
            $.ajax({
                url: "https://kangaroo.growsimple.io/api.php",
                method: "POST",
                data: {
                    action: "get_client_announcements_locationId",
                },
                success: function(response) {
                    // Handle the response - assuming response is an array or needs parsing
                    if (typeof response === 'string') {
                        try {
                            ClientSuccessAnnouncement_locationIds = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            ClientSuccessAnnouncement_locationIds = [];
                        }
                    } else {
                        ClientSuccessAnnouncement_locationIds = response || [];
                    }

                    // Populate the dropdown
                    ClientSuccessAnnouncement_populateLocationDropdown();

                    // Load announcements for the first location by default (if available)
                    if (ClientSuccessAnnouncement_locationIds.length > 0) {
                        ClientSuccessAnnouncement_loadAnnouncements('');
                    } else {
                        ClientSuccessAnnouncement_loadAnnouncements('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading locations:', error);
                    ClientSuccessAnnouncement_locationIds = [];
                    ClientSuccessAnnouncement_populateLocationDropdown();
                    ClientSuccessAnnouncement_loadAnnouncements('');
                }
            });
        }

        function ClientSuccessAnnouncement_populateLocationDropdown() {
            const select = document.getElementById('ClientSuccessAnnouncement-locationSelect');

            // Keep the first "Choose Location" option and add locations after it
            select.innerHTML = '<option value="">All</option>';

            if (!ClientSuccessAnnouncement_locationIds || ClientSuccessAnnouncement_locationIds.length === 0) {
                select.innerHTML += '<option value="" disabled>No locations available</option>';
                return;
            }

            // Add options for each location after the "Choose Location" option
            ClientSuccessAnnouncement_locationIds.forEach(element => {
                const option = document.createElement('option');
                option.value = element.locationId;
                option.textContent = element.name || element.locationId;
                select.appendChild(option);
            });
        }

        function ClientSuccessAnnouncement_loadAnnouncements(locationId = '') {
            $.ajax({
                url: "https://kangaroo.growsimple.io/api.php",
                method: "POST",
                data: {
                    action: "get_client_announcements",
                    locationId: locationId
                },
                success: function(response) {
                    // Handle the response - assuming response is an array or needs parsing
                    if (typeof response === 'string') {
                        try {
                            ClientSuccessAnnouncement_announcements = JSON.parse(response);
                        } catch (e) {
                            console.error('Error parsing response:', e);
                            ClientSuccessAnnouncement_announcements = [];
                        }
                    } else {
                        ClientSuccessAnnouncement_announcements = response || [];
                    }

                    // Update UI to show which location is being viewed (if any)
                    ClientSuccessAnnouncement_updateLocationDisplay(locationId);

                    // Initialize the application with the loaded data
                    ClientSuccessAnnouncement_initializeApp();
                },
                error: function(xhr, status, error) {
                    console.error('Error loading announcements:', error);
                    ClientSuccessAnnouncement_announcements = [];
                    ClientSuccessAnnouncement_initializeApp();
                }
            });
        }

        function ClientSuccessAnnouncement_updateLocationDisplay(locationId) {
            const locationSelect = document.getElementById('ClientSuccessAnnouncement-locationSelect');
            const locationLabel = document.getElementById('ClientSuccessAnnouncement-locLabel');

            // Update admin side display
            if (locationId) {
                const selectedLocation = ClientSuccessAnnouncement_locationIds.find(loc => loc.locationId === locationId);
                if (selectedLocation) {
                    console.log(`Now viewing announcements for: ${selectedLocation.name}`);
                }
            } else {
                console.log('Viewing all announcements');
            }

            // Also update client side location if needed
            if (locationLabel) {
                if (locationId) {
                    const selectedLocation = ClientSuccessAnnouncement_locationIds.find(loc => loc.locationId === locationId);
                    locationLabel.textContent = selectedLocation ? selectedLocation.name : locationId;
                } else {
                    locationLabel.textContent = 'All Locations';
                }
            }
        }

        function ClientSuccessAnnouncement_initializeApp() {
            ClientSuccessAnnouncement_renderAdminTable();
            ClientSuccessAnnouncement_renderClientPanels();
        }

        // Call this function when the page loads
        ClientSuccessAnnouncement_getLocationDetails();

        /* ===========================
           PAGINATION FUNCTIONS
           =========================== */

        function ClientSuccessAnnouncement_changeItemsPerPage() {
            ClientSuccessAnnouncement_itemsPerPage = parseInt(document.getElementById('ClientSuccessAnnouncement-itemsPerPage').value);
            ClientSuccessAnnouncement_currentPage = 1; // Reset to first page
            ClientSuccessAnnouncement_renderAdminTable();
        }

        function ClientSuccessAnnouncement_toggleExpired() {
            ClientSuccessAnnouncement_showExpired = document.getElementById('ClientSuccessAnnouncement-showExpired').checked;
            ClientSuccessAnnouncement_currentPage = 1; // Reset to first page
            ClientSuccessAnnouncement_renderAdminTable();
        }

        function ClientSuccessAnnouncement_togglePreview() {
            ClientSuccessAnnouncement_showPreview = document.getElementById('ClientSuccessAnnouncement-showPreview').checked;
            ClientSuccessAnnouncement_renderAdminTable();
        }

        function ClientSuccessAnnouncement_goToPage(page) {
            if (page < 1 || page > ClientSuccessAnnouncement_totalPages) return;
            ClientSuccessAnnouncement_currentPage = page;
            ClientSuccessAnnouncement_renderAdminTable();
        }

        function ClientSuccessAnnouncement_renderPagination() {
            const container = document.getElementById('ClientSuccessAnnouncement-paginationContainer');

            // Get filtered announcements based on showExpired setting
            const filteredAnnouncements = ClientSuccessAnnouncement_getFilteredAnnouncements();

            if (filteredAnnouncements.length <= ClientSuccessAnnouncement_itemsPerPage) {
                container.innerHTML = '';
                return;
            }

            const startIndex = (ClientSuccessAnnouncement_currentPage - 1) * ClientSuccessAnnouncement_itemsPerPage + 1;
            const endIndex = Math.min(ClientSuccessAnnouncement_currentPage * ClientSuccessAnnouncement_itemsPerPage, filteredAnnouncements.length);

            let paginationHTML = `
            <div class="ClientSuccessAnnouncement-pagination">
                <div class="ClientSuccessAnnouncement-pagination-info">
                    Showing ${startIndex}-${endIndex} of ${filteredAnnouncements.length} announcements
                </div>
            <div class="ClientSuccessAnnouncement-pagination-controls">
                <button class="ClientSuccessAnnouncement-pagination-btn" ${ClientSuccessAnnouncement_currentPage === 1 ? 'disabled' : ''} onclick="ClientSuccessAnnouncement_goToPage(${ClientSuccessAnnouncement_currentPage - 1})">Previous</button>
                <div class="ClientSuccessAnnouncement-page-numbers">`;

                // Calculate which page numbers to show
                let startPage = Math.max(1, ClientSuccessAnnouncement_currentPage - 2);
                let endPage = Math.min(ClientSuccessAnnouncement_totalPages, ClientSuccessAnnouncement_currentPage + 2);

                // Always show first page if not in range
                if (startPage > 1) {
                    paginationHTML += `<button class="ClientSuccessAnnouncement-pagination-btn ${1 === ClientSuccessAnnouncement_currentPage ? 'ClientSuccessAnnouncement-active' : ''}" onclick="ClientSuccessAnnouncement_goToPage(1)">1</button>`;
                    if (startPage > 2) {
                        paginationHTML += `<span style="padding: 5px 10px;">...</span>`;
                    }
                }

                    // Show page numbers
                    for (let i = startPage; i <= endPage; i++) {
                        paginationHTML += `<button class="ClientSuccessAnnouncement-pagination-btn ${i === ClientSuccessAnnouncement_currentPage ? 'ClientSuccessAnnouncement-active' : ''}" onclick="ClientSuccessAnnouncement_goToPage(${i})">${i}</button>`;
                    }

                    // Always show last page if not in range
                    if (endPage < ClientSuccessAnnouncement_totalPages) {
                        if (endPage < ClientSuccessAnnouncement_totalPages - 1) {
                            paginationHTML += `<span style="padding: 5px 10px;">...</span>`;
                        }
                        paginationHTML += `<button class="ClientSuccessAnnouncement-pagination-btn ${ClientSuccessAnnouncement_totalPages === ClientSuccessAnnouncement_currentPage ? 'ClientSuccessAnnouncement-active' : ''}" onclick="ClientSuccessAnnouncement_goToPage(${ClientSuccessAnnouncement_totalPages})">${ClientSuccessAnnouncement_totalPages}</button>`;
                    }

                paginationHTML += `</div>
                    <button class="ClientSuccessAnnouncement-pagination-btn" ${ClientSuccessAnnouncement_currentPage === ClientSuccessAnnouncement_totalPages ? 'disabled' : ''} onclick="ClientSuccessAnnouncement_goToPage(${ClientSuccessAnnouncement_currentPage + 1})">Next</button>
                </div>
            </div>`;

            container.innerHTML = paginationHTML;
        }

        // Helper function to filter announcements based on expiry date
        function ClientSuccessAnnouncement_getFilteredAnnouncements() {
            function toDateOnly(dt) {
                return new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
            }

            var today = toDateOnly(new Date());

            if (!ClientSuccessAnnouncement_showExpired) {
                // Show only non-expired announcements
                return ClientSuccessAnnouncement_announcements.filter(function(a) {
                    if (!a.expirydate) return true;

                    var expiry = toDateOnly(new Date(a.expirydate));
                    return expiry >= today;
                });
            } else {
                // Show only expired announcements
                return ClientSuccessAnnouncement_announcements.filter(function(a) {
                    if (!a.expirydate) return false;

                    var expiry = toDateOnly(new Date(a.expirydate));
                    return expiry < today;
                });
            }
        }

        /* ===========================
           ADMIN NAV
           =========================== */

        function ClientSuccessAnnouncement_switchAdminTab(tab) {
            document.getElementById("ClientSuccessAnnouncement-navDashboard").classList.remove("ClientSuccessAnnouncement-active");
            document.getElementById("ClientSuccessAnnouncement-navSegmentation").classList.remove("ClientSuccessAnnouncement-active");
            document.getElementById("ClientSuccessAnnouncement-adminDashboard").style.display = "none";
            document.getElementById("ClientSuccessAnnouncement-adminSegmentation").style.display = "none";

            if (tab === "dashboard") {
                document.getElementById("ClientSuccessAnnouncement-navDashboard").classList.add("ClientSuccessAnnouncement-active");
                document.getElementById("ClientSuccessAnnouncement-adminDashboard").style.display = "block";
            } else {
                document.getElementById("ClientSuccessAnnouncement-navSegmentation").classList.add("ClientSuccessAnnouncement-active");
                document.getElementById("ClientSuccessAnnouncement-adminSegmentation").style.display = "block";
            }
        }

        /* ===========================
           ADMIN TABLE RENDER
           =========================== */

        function ClientSuccessAnnouncement_renderAdminTable() {
            var container = document.getElementById("ClientSuccessAnnouncement-adminTableContainer");

            // Get filtered announcements based on showExpired setting
            const filteredAnnouncements = ClientSuccessAnnouncement_getFilteredAnnouncements();

            // Calculate pagination
            const startIndex = (ClientSuccessAnnouncement_currentPage - 1) * ClientSuccessAnnouncement_itemsPerPage;
            const endIndex = Math.min(startIndex + ClientSuccessAnnouncement_itemsPerPage, filteredAnnouncements.length);
            ClientSuccessAnnouncement_totalPages = Math.ceil(filteredAnnouncements.length / ClientSuccessAnnouncement_itemsPerPage);

            // Get announcements for current page
            const currentAnnouncements = filteredAnnouncements.slice(startIndex, endIndex);

            if (!filteredAnnouncements.length) {
                if (ClientSuccessAnnouncement_showExpired) {
                    container.innerHTML = '<div class="ClientSuccessAnnouncement-admin-empty">No expired announcements found.</div>';
                } else {
                    container.innerHTML = '<div class="ClientSuccessAnnouncement-admin-empty">No announcements yet. Click "Create Announcement" to get started.</div>';
                }
                document.getElementById('ClientSuccessAnnouncement-paginationContainer').innerHTML = '';
                return;
            }

            var html = '<div class="ClientSuccessAnnouncement-table">';
            html += '<div class="ClientSuccessAnnouncement-table-header">' +
                '<div>#</div>' +
                '<div>Title</div>' +
                '<div>Status</div>' +
                '<div>Review Status</div>' +
                '<div>Type</div>' +
                '<div>Locations</div>' +
                '<div class="ClientSuccessAnnouncement-gsLocationHeader">Gs Location</div>' +
                '<div>Expiry Date</div>' +
                '<div>Actions</div>' +
                '</div>';

            currentAnnouncements.forEach(function(a) {
                var statusBadge = a.status === "PUBLISHED" ?
                    '<span class="ClientSuccessAnnouncement-badge ClientSuccessAnnouncement-badge-pub">Published</span>' :
                    '<span class="ClientSuccessAnnouncement-badge ClientSuccessAnnouncement-badge-draft">Completed</span>';

                var reviewBadge = a.reviewstatus == "PENDING" ?
                    '<span class="ClientSuccessAnnouncement-badge ClientSuccessAnnouncement-badge-pending">PENDING</span>' :
                    '<span class="ClientSuccessAnnouncement-badge ClientSuccessAnnouncement-badge-reviewed">REVIEWED</span>';

                // Get location display name
                var locationDisplay = ClientSuccessAnnouncement_getLocationDisplayName(a.gslocationid, a.targetlocations);

                // Check if announcement is expired and add expired badge if needed
                var expiredBadge = '';
                if (a.expirydate) {
                    function toDateOnly(dt) {
                        return new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
                    }
                    var expiry = toDateOnly(new Date(a.expirydate));
                    var today = toDateOnly(new Date());
                    if (expiry < today) {
                        expiredBadge = ' <span class="ClientSuccessAnnouncement-badge ClientSuccessAnnouncement-badge-pending" style="background: #ef4444; color: white;">EXPIRED</span>';
                    }
                }


                html += '<div class="ClientSuccessAnnouncement-table-row">' +
                    '<div>#' + a.id + '</div>' +
                    '<div>' + (a.title || 'Untitled') + expiredBadge + '</div>' +
                    '<div>' + statusBadge + '</div>' +
                    '<div>' + reviewBadge + '</div>' +
                    '<div><span class="ClientSuccessAnnouncement-badge ClientSuccessAnnouncement-badge-popup">' + (a.type || 'POPUP') + '</span></div>' +
                    '<div>' + a.gslocationid + ' - ' + locationDisplay.replace(/\s*\([^)]*\)/g, '').trim() + '</div>' +
                    '<div class="ClientSuccessAnnouncement-gsLocationDataId">' + a.gslocationid + '</div>' +
                    '<div>' + (a.expirydate || "No expiry") + '</div>' +
                    '<div class="ClientSuccessAnnouncement-admin-actions">' +
                    '<button ' + (a.status == 'COMPLETED' ? 'disabled ' : '') +
                    'onclick="ClientSuccessAnnouncement_openAnnouncementForm(' + a.id + ')">Edit</button>' +
                    '<button onclick="ClientSuccessAnnouncement_previewAnnouncement(' + a.id + ')">Preview</button>' +
                    '</div>' +
                    '</div>';
            });

            html += '</div>';
            container.innerHTML = html;

            // Render pagination controls
            ClientSuccessAnnouncement_renderPagination();
        }

        // Helper function to get location display name
        function ClientSuccessAnnouncement_getLocationDisplayName(gslocationid, targetlocations) {
            // If targetlocations already has a display name, use it
            if (targetlocations && targetlocations !== "All Locations") {
                return targetlocations;
            }

            // If gslocationid is an array (multiple locations)
            if (Array.isArray(gslocationid)) {
                if (gslocationid.length === 0) return "All Locations";

                // Show first location name + count of others
                var firstLocation = ClientSuccessAnnouncement_getLocationName(gslocationid[0]);
                if (gslocationid.length === 1) {
                    return firstLocation;
                } else {
                    return firstLocation + ' +' + (gslocationid.length - 1) + ' more';
                }
            }

            // If gslocationid is a single string
            if (gslocationid && gslocationid !== "all") {
                return ClientSuccessAnnouncement_getLocationName(gslocationid) || gslocationid;
            }

            // Default to "All Locations"
            return "All Locations";
        }

        // Helper function to get location name by ID
        function ClientSuccessAnnouncement_getLocationName(locationId) {
            if (!locationId || locationId === "all") return "All Locations";
            var location = ClientSuccessAnnouncement_locationIds.find(function(loc) {
                return loc.locationId === locationId;
            });
            return location ? location.name : locationId;
        }

        /* ===========================
           CREATE / EDIT ANNOUNCEMENT
           =========================== */

        function ClientSuccessAnnouncement_openAnnouncementForm(id) {
            ClientSuccessAnnouncement_currentEditingId = id || null;
            var isEdit = !!id;
            var data = {
                title: "",
                status: "PUBLISHED",
                bodyHtml: "",
                ctaText: "Start now!",
                ctaUrl: "/dashboard",
                forcePopup: false,
                showNever: true,
                targetType: "all",
                targetLocations: []
            };

            if (isEdit) {
                var existing = ClientSuccessAnnouncement_announcements.find(function(a) {
                    return a.id == id;
                });
                if (existing) {
                    data = JSON.parse(JSON.stringify(existing));
                }
            }
            var modalRoot = document.getElementById("ClientSuccessAnnouncement-announcementModal");
            modalRoot.innerHTML = "";
            modalRoot.style.display = "block";

            var overlay = document.createElement("div");
            overlay.className = "ClientSuccessAnnouncement-overlay";

            var modal = document.createElement("div");
            modal.className = "ClientSuccessAnnouncement-modal";

            var titleText = isEdit ? "Edit Announcement" : "Create Announcement";

            // Create location options for the modal
            var locationOptionsHtml = '<option value="all">All</option>';
            if (ClientSuccessAnnouncement_locationIds && ClientSuccessAnnouncement_locationIds.length > 0) {
                ClientSuccessAnnouncement_locationIds.forEach(function(location) {
                    var selected = data.gslocationid && data.gslocationid.includes(location.locationId) ? 'selected' : '';
                    locationOptionsHtml += '<option value="' + location.locationId + '" ' + selected + '>' + (location.name || location.locationId) + '</option>';
                });
            }

            modal.innerHTML =
                '<div class="ClientSuccessAnnouncement-modal-header">' +
                '<h3>' + titleText + '</h3>' +
                '<button class="ClientSuccessAnnouncement-ms-close" onclick="ClientSuccessAnnouncement_closeAnnouncementForm()">×</button>' +
                '</div>' +
                '<div class="ClientSuccessAnnouncement-modal-body">' +
                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>Title</label>' +
                '<input id="ClientSuccessAnnouncement-formTitle" type="text" value="' + ClientSuccessAnnouncement_escapeHtmlAttr(data.title) + '" />' +
                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>Status</label>' +
                (
                    isEdit ?
                    '<select id="ClientSuccessAnnouncement-formStatus">' +
                    '<option value="PUBLISHED" ' + (data.status === "PUBLISHED" ? "selected" : "") + '>Published</option>' +
                    '<option value="COMPLETED" ' + (data.status === "COMPLETED" ? "selected" : "") + '>Completed</option>' +
                    '</select>' :
                    '<select id="ClientSuccessAnnouncement-formStatus" style="display:none">' +
                    '<option value="PUBLISHED" ' + (data.status === "PUBLISHED" ? "selected" : "") + '>Published</option>' +
                    '</select>'
                ) +

                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>Body (HTML)</label>' +
                '<textarea id="ClientSuccessAnnouncement-formBody">' + ClientSuccessAnnouncement_escapeHtml(data.bodyhtml) + '</textarea>' +
                '<small>Supports basic HTML (p, br, strong, etc.)</small>' +
                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>CTA Text</label>' +
                '<input id="ClientSuccessAnnouncement-formCtaText" type="text" value="' + ClientSuccessAnnouncement_escapeHtmlAttr(data.ctatext) + '" />' +
                '<input style="display:none" id="ClientSuccessAnnouncement-posted" type="text" value="' + ClientSuccessAnnouncement_escapeHtmlAttr(data.posted) + '" />' +
                '<input style="display:none" id="ClientSuccessAnnouncement-reviewStatus" type="text" value="' + ClientSuccessAnnouncement_escapeHtmlAttr(data.reviewstatus) + '" />' +
                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>CTA URL</label>' +
                '<input id="ClientSuccessAnnouncement-formCtaUrl" type="url" value="' + ClientSuccessAnnouncement_escapeHtmlAttr(data.ctaurl) + '" />' +
                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>Target Location</label>' +
                '<select id="ClientSuccessAnnouncement-formLocation" style="width: 100%; padding: 6px 8px; border-radius: 4px; border: 1px solid #d1d5db;">' +
                locationOptionsHtml +
                '</select>' +
                '<small>Select a specific location or leave as "Choose Location" for all locations</small>' +
                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>Expiration Settings</label>' +
                '<div style="display: flex; gap: 10px; flex-wrap: wrap;">' +
                '<div style="flex: 1;">' +
                '<label style="font-size: 11px;">Expiry Date</label>' +
                '<input type="date" id="ClientSuccessAnnouncement-expiry_date" value="' + (data.expirydate || '') + '" min="' + new Date().toISOString().split("T")[0] + '" style="width: 100%; padding: 6px 8px; border-radius: 4px; border: 1px solid #d1d5db;" />' +
                '</div>' +
                '<div style="flex: 1;">' +
                '<label style="font-size: 11px;display:none">Visibility Duration (days)</label>' +
                '<input style="display:none" type="number" id="ClientSuccessAnnouncement-visibility_duration" value="' + (data.visibilityduration || '7') + '" style="width: 100%; padding: 6px 8px; border-radius: 4px; border: 1px solid #d1d5db;" min="1" />' +
                '</div>' +
                '</div>' +
                '</div>' +

                '<div class="ClientSuccessAnnouncement-modal-field">' +
                '<label>Behavior</label>' +
                '<label><input id="ClientSuccessAnnouncement-formForce" type="checkbox" ' + (data.forcepopup ? "checked" : "") + '> Force popup (cannot click away)</label><br/>' +
                '<label><input id="ClientSuccessAnnouncement-formShowNever" type="checkbox" ' + (data.shownever ? "checked" : "") + '> Show "Never show again" button</label>' +
                '</div>' +
                '</div>' +
                '<div class="ClientSuccessAnnouncement-modal-footer">' +
                '<button class="btn btn-secondary" onclick="ClientSuccessAnnouncement_closeAnnouncementForm()">Cancel</button>' +
                '<button class="btn btn-primary" onclick="ClientSuccessAnnouncement_saveAnnouncement()">Save announcement</button>' +
                '</div>';

            overlay.appendChild(modal);
            modalRoot.appendChild(overlay);
        }

        function ClientSuccessAnnouncement_closeAnnouncementForm() {
            ClientSuccessAnnouncement_currentEditingId = null;
            document.getElementById("ClientSuccessAnnouncement-announcementModal").style.display = "none";
            document.getElementById("ClientSuccessAnnouncement-announcementModal").innerHTML = "";
        }

        function ClientSuccessAnnouncement_saveAnnouncement() {
            var title = document.getElementById("ClientSuccessAnnouncement-formTitle").value.trim();
            var status = document.getElementById("ClientSuccessAnnouncement-formStatus").value;
            var body = document.getElementById("ClientSuccessAnnouncement-formBody").value;
            var posted = document.getElementById("ClientSuccessAnnouncement-posted").value;
            var reviewStatus = document.getElementById("ClientSuccessAnnouncement-reviewStatus").value;
            var ctaText = document.getElementById("ClientSuccessAnnouncement-formCtaText").value.trim() || "Start now!";
            var ctaUrl = document.getElementById("ClientSuccessAnnouncement-formCtaUrl").value.trim() || "/dashboard";
            var forcePopup = document.getElementById("ClientSuccessAnnouncement-formForce").checked;
            var showNever = document.getElementById("ClientSuccessAnnouncement-formShowNever").checked;
            var selectedLocation = document.getElementById("ClientSuccessAnnouncement-formLocation").value;
            var visibilityDuration = document.getElementById("ClientSuccessAnnouncement-visibility_duration").value;
            var expiryDate = document.getElementById("ClientSuccessAnnouncement-expiry_date").value;

            if (!title) {
                alert("Title is required.");
                return;
            }

            // Prepare gslocationid - if "all" is selected, send all location IDs as array
            var gslocationid;
            if (selectedLocation === "all") {
                // Get all location IDs as an array
                gslocationid = ClientSuccessAnnouncement_locationIds.map(function(location) {
                    return location.locationId;
                });
            } else {
                // Single location selected
                gslocationid = selectedLocation;
            }

            // Prepare data for API
            var announcementData = {
                id: "", // optional, sheet has Id column
                title: title,
                status: status,
                type: "POPUP",
                targetlocations: selectedLocation === "all" ? "All Locations" : (ClientSuccessAnnouncement_getLocationName(selectedLocation) || selectedLocation),
                gslocationid: gslocationid,
                posted: posted ? posted : new Date().toISOString().slice(0, 10), // sheet has this column, keep empty
                bodyhtml: body,
                ctatext: ctaText,
                ctaurl: ctaUrl,
                forcepopup: forcePopup ? true : false,
                shownever: showNever ? true : false,
                visibilityduration: visibilityDuration,
                expirydate: expiryDate,
                reviewstatus: reviewStatus ? reviewStatus : 'PENDING'
            };

            // If editing, add the ID
            if (ClientSuccessAnnouncement_currentEditingId) {
                announcementData.id = ClientSuccessAnnouncement_currentEditingId;
            }

            // Send data to API
            $.ajax({
                url: "https://kangaroo.growsimple.io/api.php",
                method: "POST",
                data: {
                    action: "save_client_announcements",
                    data: JSON.stringify(announcementData)
                },
                success: function(response) {
                    console.log('Save announcement response:', response);

                    // Handle the response
                    try {
                        var result = typeof response === 'string' ? JSON.parse(response) : response;

                        if (result.success) {
                            // Close modal and refresh announcements
                            ClientSuccessAnnouncement_closeAnnouncementForm();

                            // Reload announcements to show the new/updated one
                            const currentLocation = document.getElementById('ClientSuccessAnnouncement-locationSelect').value;
                            ClientSuccessAnnouncement_loadAnnouncements(currentLocation);

                            alert('Announcement saved successfully!');
                        } else {
                            alert('Error saving announcement: ' + (result.message || 'Unknown error'));
                        }
                    } catch (e) {
                        console.error('Error parsing save response:', e);
                        alert('Announcement saved successfully!');
                        ClientSuccessAnnouncement_closeAnnouncementForm();
                        const currentLocation = document.getElementById('ClientSuccessAnnouncement-locationSelect').value;
                        ClientSuccessAnnouncement_loadAnnouncements(currentLocation);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error saving announcement:', error);
                    alert('Error saving announcement. Please try again.');
                }
            });
        }

        /* ===========================
           CLIENT SIDE RENDER
           =========================== */

        function ClientSuccessAnnouncement_onClientLocationChange() {
            var locId = document.getElementById("ClientSuccessAnnouncement-clientLocationSelect").value;
            document.getElementById("ClientSuccessAnnouncement-locLabel").textContent = locId;
            ClientSuccessAnnouncement_renderClientPanels();
        }

        function ClientSuccessAnnouncement_isAnnouncementTargetedAt(ann, locId) {
            if (!ann) return false;
            if (!ann.locationId || ann.locationId === "") return true; // No specific location = all locations
            return ann.locationId === locId;
        }

        function ClientSuccessAnnouncement_getLiveAnnouncementsForLocation(locId) {
            if (!ClientSuccessAnnouncement_announcements || !ClientSuccessAnnouncement_announcements.length)
                return [];

            // Helper to strip time
            function toDateOnly(dt) {
                return new Date(dt.getFullYear(), dt.getMonth(), dt.getDate());
            }

            var today = toDateOnly(new Date());

            return ClientSuccessAnnouncement_announcements.filter(function(a) {

                if (a.status !== "PUBLISHED") return false;

                if (!ClientSuccessAnnouncement_isAnnouncementTargetedAt(a, locId)) return false;

                // Check if announcement is expired (date only)
                if (a.expirydate) {
                    var expiry = toDateOnly(new Date(a.expirydate));
                    if (expiry < today) return false;
                }

                var stateObj = a.perLocation ? a.perLocation[locId] : null;
                return !stateObj || stateObj.state !== "COMPLETED";
            });
        }

        function ClientSuccessAnnouncement_getCompletedAnnouncementsForLocation(locId) {
            if (!ClientSuccessAnnouncement_announcements || !ClientSuccessAnnouncement_announcements.length) return [];
            return ClientSuccessAnnouncement_announcements.filter(function(a) {
                var stateObj = a.perLocation ? a.perLocation[locId] : (a.status ?? null);
                return stateObj && stateObj.state === "COMPLETED" || stateObj === "COMPLETED";
            });
        }

        function ClientSuccessAnnouncement_renderClientPanels() {
            var locId = document.getElementById("ClientSuccessAnnouncement-clientLocationSelect").value;
            var livePanel = document.getElementById("ClientSuccessAnnouncement-panelLive");
            var donePanel = document.getElementById("ClientSuccessAnnouncement-panelDone");

            var live = ClientSuccessAnnouncement_getLiveAnnouncementsForLocation(locId);
            var done = ClientSuccessAnnouncement_getCompletedAnnouncementsForLocation(locId);

            // LIVE
            if (!live.length) {
                livePanel.innerHTML = '<div class="ClientSuccessAnnouncement-row"><span style="color:#9ca3af;">No live announcements for this location.</span></div>';
            } else {
                var htmlLive = "";
                live.forEach(function(a) {
                    htmlLive += '<div class="ClientSuccessAnnouncement-row">' +
                        '<div class="ClientSuccessAnnouncement-row-title">' + (a.title || 'Untitled') + '</div>' +
                        '<div>' +
                        '<button class="ClientSuccessAnnouncement-btn-small" onclick="ClientSuccessAnnouncement_openClientPopup(' + a.id + ')">Open</button> ' +
                        '<button class="ClientSuccessAnnouncement-btn-small" onclick="ClientSuccessAnnouncement_markAnnouncementComplete(' + a.id + ')">Complete</button>' +
                        '</div>' +
                        '</div>';
                });
                livePanel.innerHTML = htmlLive;
            }

            // COMPLETED
            if (!done.length) {
                donePanel.innerHTML = '<div class="ClientSuccessAnnouncement-row"><span style="color:#9ca3af;">No completed announcements yet.</span></div>';
            } else {
                var htmlDone = "";
                done.forEach(function(a) {
                    htmlDone += '<div class="ClientSuccessAnnouncement-row">' +
                        '<div class="ClientSuccessAnnouncement-row-title">' + (a.title || 'Untitled') + '</div>' +
                        '<div style="font-size:12px; color:#6b7280;">Completed</div>' +
                        '</div>';
                });
                donePanel.innerHTML = htmlDone;
            }
        }

        /* complete from client list or popup */
        function ClientSuccessAnnouncement_markAnnouncementComplete(annId) {
            var locId = document.getElementById("ClientSuccessAnnouncement-clientLocationSelect").value;
            var ann = ClientSuccessAnnouncement_announcements.find(function(a) {
                return a.id == annId;
            });
            if (!ann) return;

            // Initialize perLocation if it doesn't exist
            if (!ann.perLocation) {
                ann.perLocation = {};
            }

            ann.perLocation[locId] = {
                state: "COMPLETED",
                completedAt: new Date().toISOString()
            };
            ClientSuccessAnnouncement_renderClientPanels();
        }

        /* ===========================
           CLIENT POPUP
           =========================== */

        function ClientSuccessAnnouncement_openClientPopup(annId) {
            var ann = ClientSuccessAnnouncement_announcements.find(function(a) {
                return a.id == annId;
            });
            if (!ann) return;
            ClientSuccessAnnouncement_showAnnouncementPopup(ann);
        }

        function ClientSuccessAnnouncement_previewAnnouncement(annId) {
            var ann = ClientSuccessAnnouncement_announcements.find(function(a) {
                return a.id == annId;
            });
            if (!ann) return;
            ClientSuccessAnnouncement_showAnnouncementPopup(ann);
        }

        function ClientSuccessAnnouncement_showAnnouncementPopup(ann) {
            var locId = document.getElementById("ClientSuccessAnnouncement-clientLocationSelect").value || "abc123";

            var backdrop = document.createElement("div");
            backdrop.className = "ClientSuccessAnnouncement-ms-backdrop";

            var modal = document.createElement("div");
            modal.className = "ClientSuccessAnnouncement-ms-modal";

            var bodyHtml = ann.bodyhtml || "";

            var footerHtml =
                (ann.shownever ?
                    '<button class="btn btn-secondary btn-small" onclick="alert(\'Never show again for ' + locId + '\'); ClientSuccessAnnouncement_removePopup()">' +
                    'Never show again' +
                    '</button>' : '') +
                '<button class="btn btn-secondary btn-small" onclick="ClientSuccessAnnouncement_markAnnouncementComplete(' + ann.id + '); ClientSuccessAnnouncement_removePopup()">Mark as complete</button>' +
                '<button class="btn btn-primary btn-small" onclick="alert(\'Navigate → ' + ann.ctaUrl + '\'); ClientSuccessAnnouncement_markAnnouncementComplete(' + ann.id + '); ClientSuccessAnnouncement_removePopup()">' + (ann.ctaText || 'Start now!') + '</button>';

            modal.innerHTML =
                '<div class="ClientSuccessAnnouncement-ms-header">' +
                '<h3>' + (ann.title || 'Untitled') + '</h3>' +
                '<button class="ClientSuccessAnnouncement-ms-close">×</button>' +
                '</div>' +
                '<div class="ClientSuccessAnnouncement-ms-body">' + bodyHtml + '</div>' +
                '<div class="ClientSuccessAnnouncement-ms-footer">' + footerHtml + '</div>';

            backdrop.appendChild(modal);
            document.body.appendChild(backdrop);

            var force = ann.forcePopup;

            backdrop.addEventListener("click", function(e) {
                if (!force && e.target === backdrop) ClientSuccessAnnouncement_removePopup();
            });
            modal.querySelector(".ClientSuccessAnnouncement-ms-close").addEventListener("click", function() {
                if (!force) ClientSuccessAnnouncement_removePopup();
            });
        }

        function ClientSuccessAnnouncement_removePopup() {
            var el = document.querySelector(".ClientSuccessAnnouncement-ms-backdrop");
            if (el) el.remove();
        }

        /* ===========================
           CLIENT TABS
           =========================== */

        function ClientSuccessAnnouncement_switchClientTab(tab) {
            document.getElementById("ClientSuccessAnnouncement-tabLive").classList.remove("ClientSuccessAnnouncement-active");
            document.getElementById("ClientSuccessAnnouncement-tabDone").classList.remove("ClientSuccessAnnouncement-active");
            document.getElementById("ClientSuccessAnnouncement-panelLive").style.display = "none";
            document.getElementById("ClientSuccessAnnouncement-panelDone").style.display = "none";

            if (tab === "live") {
                document.getElementById("ClientSuccessAnnouncement-tabLive").classList.add("ClientSuccessAnnouncement-active");
                document.getElementById("ClientSuccessAnnouncement-panelLive").style.display = "block";
            } else {
                document.getElementById("ClientSuccessAnnouncement-tabDone").classList.add("ClientSuccessAnnouncement-active");
                document.getElementById("ClientSuccessAnnouncement-panelDone").style.display = "block";
            }
        }

        /* ===========================
           HELPERS
           =========================== */
        function ClientSuccessAnnouncement_escapeHtml(str) {
            if (!str) return "";
            return str
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;");
        }

        function ClientSuccessAnnouncement_escapeHtmlAttr(str) {
            if (!str) return "";
            return str
                .replace(/&/g, "&amp;")
                .replace(/"/g, "&quot;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;");
        }

        /* ===========================
           INIT - START THE APPLICATION
           =========================== */

        // Initialize the application by loading announcements
        ClientSuccessAnnouncement_getLocationDetails();
    </script>

</body>

</html>