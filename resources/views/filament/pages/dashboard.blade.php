<div>
<div class="gf-dashboard-wrap">
    {{-- Page Heading --}}
    <div class="gf-dash-header">
        <h1 class="gf-dash-title">Dashboard</h1>
        <p class="gf-dash-subtitle">Welcome back! Here's an overview of your content.</p>
    </div>

    {{-- Stat Cards - 2x2 grid --}}
    <div class="gf-stat-grid">

        {{-- Total Articles --}}
        <div class="gf-stat-card" style="background: linear-gradient(180deg, #00377D 0%, #009ED1 100%);">
            <div class="gf-stat-icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.8;">
                    <path d="M20.0002 2.66663H8.00016C7.29292 2.66663 6.61464 2.94758 6.11454 3.44767C5.61445 3.94777 5.3335 4.62605 5.3335 5.33329V26.6666C5.3335 27.3739 5.61445 28.0521 6.11454 28.5522C6.61464 29.0523 7.29292 29.3333 8.00016 29.3333H24.0002C24.7074 29.3333 25.3857 29.0523 25.8858 28.5522C26.3859 28.0521 26.6668 27.3739 26.6668 26.6666V9.33329L20.0002 2.66663Z" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.6665 2.66663V7.99996C18.6665 8.7072 18.9475 9.38548 19.4476 9.88558C19.9477 10.3857 20.6259 10.6666 21.3332 10.6666H26.6665" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3332 12H10.6665" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.3332 17.3334H10.6665" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.3332 22.6666H10.6665" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="gf-stat-value">{{ $totalArticles }}</div>
            <div class="gf-stat-label">Total Articles</div>
        </div>

        {{-- Total Units --}}
        <div class="gf-stat-card" style="background: linear-gradient(180deg, #22AE6C 0%, #4BD997 100%);">
            <div class="gf-stat-icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.8;">
                    <path d="M8 29.3333V5.33329C8 4.62605 8.28095 3.94777 8.78105 3.44767C9.28115 2.94758 9.95942 2.66663 10.6667 2.66663H21.3333C22.0406 2.66663 22.7189 2.94758 23.219 3.44767C23.719 3.94777 24 4.62605 24 5.33329V29.3333H8Z" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.99984 16H5.33317C4.62593 16 3.94765 16.281 3.44755 16.781C2.94746 17.2811 2.6665 17.9594 2.6665 18.6667V26.6667C2.6665 27.3739 2.94746 28.0522 3.44755 28.5523C3.94765 29.0524 4.62593 29.3333 5.33317 29.3333H7.99984" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M24 12H26.6667C27.3739 12 28.0522 12.281 28.5523 12.781C29.0524 13.2811 29.3333 13.9594 29.3333 14.6667V26.6667C29.3333 27.3739 29.0524 28.0522 28.5523 28.5523C28.0522 29.0524 27.3739 29.3333 26.6667 29.3333H24" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3335 8H18.6668" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3335 13.3334H18.6668" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3335 18.6666H18.6668" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3335 24H18.6668" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="gf-stat-value">{{ $totalUnits }}</div>
            <div class="gf-stat-label">Total Units</div>
        </div>

        {{-- Total Facilities --}}
        <div class="gf-stat-card" style="background: linear-gradient(180deg, #009ED1 0%, #97E7F5 100%);">
            <div class="gf-stat-icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.8;">
                    <path d="M24.0002 5.33337H8.00016C6.5274 5.33337 5.3335 6.52728 5.3335 8.00004V24C5.3335 25.4728 6.5274 26.6667 8.00016 26.6667H24.0002C25.4729 26.6667 26.6668 25.4728 26.6668 24V8.00004C26.6668 6.52728 25.4729 5.33337 24.0002 5.33337Z" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.6667 12H13.3333C12.597 12 12 12.597 12 13.3333V18.6667C12 19.403 12.597 20 13.3333 20H18.6667C19.403 20 20 19.403 20 18.6667V13.3333C20 12.597 19.403 12 18.6667 12Z" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20 2.66663V5.33329" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20 26.6666V29.3333" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2.6665 20H5.33317" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2.6665 12H5.33317" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M26.6665 20H29.3332" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M26.6665 12H29.3332" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 2.66663V5.33329" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 26.6666V29.3333" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="gf-stat-value">{{ $totalFacilities }}</div>
            <div class="gf-stat-label">Total Facilities</div>
        </div>

        {{-- Active Listings --}}
        <div class="gf-stat-card" style="background: linear-gradient(180deg, #4BD997 0%, #22AE6C 100%);">
            <div class="gf-stat-icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.8;">
                    <path d="M29.3332 9.33337L17.9998 20.6667L11.3332 14L2.6665 22.6667" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.3335 9.33337H29.3335V17.3334" stroke="white" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="gf-stat-value">{{ $activeListings }}</div>
            <div class="gf-stat-label">Active Listings</div>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="gf-card">
        <h2 class="gf-card-heading">Quick Actions</h2>
        <div class="gf-qa-grid">

            <a href="/admin/articles/create" class="gf-qa-btn">
                <div class="gf-qa-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V7L15 2Z" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 2V6C14 6.53043 14.2107 7.03914 14.5858 7.41421C14.9609 7.78929 15.4696 8 16 8H20" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 9H8" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 13H8" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 17H8" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="gf-qa-label">Add New Article</span>
            </a>

            <a href="/admin/units/create" class="gf-qa-btn">
                <div class="gf-qa-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 22V4C6 3.46957 6.21071 2.96086 6.58579 2.58579C6.96086 2.21071 7.46957 2 8 2H16C16.5304 2 17.0391 2.21071 17.4142 2.58579C17.7893 2.96086 18 3.46957 18 4V22H6Z" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 12H4C3.46957 12 2.96086 12.2107 2.58579 12.5858C2.21071 12.9609 2 13.4696 2 14V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H6" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V20C22 20.5304 21.7893 21.0391 21.4142 21.4142C21.0391 21.7893 20.5304 22 20 22H18" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 6H14" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 10H14" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 14H14" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 18H14" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="gf-qa-label">Add New Unit</span>
            </a>

            <a href="#" class="gf-qa-btn">
                <div class="gf-qa-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4Z" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 9H10C9.44772 9 9 9.44772 9 10V14C9 14.5523 9.44772 15 10 15H14C14.5523 15 15 14.5523 15 14V10C15 9.44772 14.5523 9 14 9Z" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 2V4" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 20V22" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 15H4" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 9H4" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 15H22" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 9H22" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 2V4" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 20V22" stroke="#009ED1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="gf-qa-label">Add New Facility</span>
            </a>

        </div>
    </div>

    {{-- Recent Activity --}}
    <div class="gf-card">
        <h2 class="gf-card-heading">Recent Activity</h2>
        <div class="gf-activity-list">

            {{-- Row 1: Article --}}
            <div class="gf-activity-row">
                <div class="gf-activity-icon" style="background:#DCFCE7;">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5002 1.66663H5.00016C4.55814 1.66663 4.13421 1.84222 3.82165 2.15478C3.50909 2.46734 3.3335 2.89127 3.3335 3.33329V16.6666C3.3335 17.1087 3.50909 17.5326 3.82165 17.8451C4.13421 18.1577 4.55814 18.3333 5.00016 18.3333H15.0002C15.4422 18.3333 15.8661 18.1577 16.1787 17.8451C16.4912 17.5326 16.6668 17.1087 16.6668 16.6666V5.83329L12.5002 1.66663Z" stroke="#00A63E" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.6665 1.66663V4.99996C11.6665 5.44199 11.8421 5.86591 12.1547 6.17847C12.4672 6.49103 12.8911 6.66663 13.3332 6.66663H16.6665" stroke="#00A63E" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.33317 7.5H6.6665" stroke="#00A63E" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.3332 10.8334H6.6665" stroke="#00A63E" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.3332 14.1666H6.6665" stroke="#00A63E" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="gf-activity-content">
                    <p class="gf-activity-title">Article "Mediterranean Living" updated</p>
                    <p class="gf-activity-time">2 hours ago</p>
                </div>
            </div>

            {{-- Row 2: Unit --}}
            <div class="gf-activity-row">
                <div class="gf-activity-icon" style="background:#DBEAFE;">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 18.3333V3.33329C5 2.89127 5.17559 2.46734 5.48816 2.15478C5.80072 1.84222 6.22464 1.66663 6.66667 1.66663H13.3333C13.7754 1.66663 14.1993 1.84222 14.5118 2.15478C14.8244 2.46734 15 2.89127 15 3.33329V18.3333H5Z" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.99984 10H3.33317C2.89114 10 2.46722 10.1756 2.15466 10.4882C1.8421 10.8007 1.6665 11.2246 1.6665 11.6667V16.6667C1.6665 17.1087 1.8421 17.5326 2.15466 17.8452C2.46722 18.1577 2.89114 18.3333 3.33317 18.3333H4.99984" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 7.5H16.6667C17.1087 7.5 17.5326 7.6756 17.8452 7.98816C18.1577 8.30072 18.3333 8.72464 18.3333 9.16667V16.6667C18.3333 17.1087 18.1577 17.5326 17.8452 17.8452C17.5326 18.1577 17.1087 18.3333 16.6667 18.3333H15" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.3335 5H11.6668" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.3335 8.33337H11.6668" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.3335 11.6666H11.6668" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.3335 15H11.6668" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="gf-activity-content">
                    <p class="gf-activity-title">Unit "Type 06" details modified</p>
                    <p class="gf-activity-time">5 hours ago</p>
                </div>
            </div>

            {{-- Row 3: Facility --}}
            <div class="gf-activity-row">
                <div class="gf-activity-icon" style="background:#F3E8FF;">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.0002 3.33337H5.00016C4.07969 3.33337 3.3335 4.07957 3.3335 5.00004V15C3.3335 15.9205 4.07969 16.6667 5.00016 16.6667H15.0002C15.9206 16.6667 16.6668 15.9205 16.6668 15V5.00004C16.6668 4.07957 15.9206 3.33337 15.0002 3.33337Z" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.6667 7.5H8.33333C7.8731 7.5 7.5 7.8731 7.5 8.33333V11.6667C7.5 12.1269 7.8731 12.5 8.33333 12.5H11.6667C12.1269 12.5 12.5 12.1269 12.5 11.6667V8.33333C12.5 7.8731 12.1269 7.5 11.6667 7.5Z" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.5 1.66663V3.33329" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.5 16.6666V18.3333" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1.6665 12.5H3.33317" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1.6665 7.5H3.33317" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.6665 12.5H18.3332" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.6665 7.5H18.3332" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.5 1.66663V3.33329" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.5 16.6666V18.3333" stroke="#9810FA" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="gf-activity-content">
                    <p class="gf-activity-title">Facility "Swimming Pool" information updated</p>
                    <p class="gf-activity-time">1 day ago</p>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
    /* Hide visible scrollbar in Dashboard (still scrollable) */
    body.fi-body,
    .fi-main,
    .fi-main-ctn {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    body.fi-body::-webkit-scrollbar,
    .fi-main::-webkit-scrollbar,
    .fi-main-ctn::-webkit-scrollbar {
        width: 0;
        height: 0;
        display: none;
    }

    /* ─── Dashboard wrapper ────────────────────────────────── */
    .gf-dashboard-wrap {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding-top: 28px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        box-sizing: border-box;
        overflow-x: clip;
    }

    /* ─── Header ───────────────────────────────────────────── */
    .gf-dash-header {
        padding-top: 0;
    }
    .gf-dash-title {
        color: #00377D !important;
        font-size: 36px !important;
        font-weight: 700 !important;
        line-height: 40px !important;
        margin: 0 0 8px !important;
    }
    .gf-dash-subtitle {
        color: #4A5565 !important;
        font-size: 16px !important;
        font-weight: 400 !important;
        line-height: 24px !important;
        margin: 0 !important;
    }

    /* ─── Stat card grid ───────────────────────────────────── */
    .gf-stat-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
    }
    @media (max-width: 640px) {
        .gf-stat-grid { grid-template-columns: 1fr; }
    }

    .gf-stat-card {
        border-radius: 16px;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10);
        padding: 24px;
        min-height: 164px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .gf-stat-icon { flex-shrink: 0; }
    .gf-stat-value {
        color: #fff !important;
        font-size: 36px !important;
        font-weight: 700 !important;
        line-height: 40px !important;
    }
    .gf-stat-label {
        color: rgba(255,255,255,0.9) !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        line-height: 20px !important;
    }

    /* ─── White card (Quick Actions + Recent Activity) ─────── */
    .gf-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10);
        padding: 32px;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    .gf-card-heading {
        color: #00377D !important;
        font-size: 24px !important;
        font-weight: 700 !important;
        line-height: 32px !important;
        margin: 0 !important;
    }

    /* ─── Quick Actions ────────────────────────────────────── */
    .gf-qa-grid {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }
    .gf-qa-btn {
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
        min-width: 140px;
        padding: 0 16px;
        height: 84px;
        border-radius: 14px;
        border: 2px solid #E5E7EB;
        text-decoration: none !important;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .gf-qa-btn:hover {
        border-color: #009ED1;
        box-shadow: 0 4px 12px rgba(0,158,209,0.15);
    }
    .gf-qa-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: rgba(0, 158, 209, 0.10);
        flex-shrink: 0;
    }
    .gf-qa-label {
        color: #364153 !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        line-height: 24px !important;
    }

    /* ─── Recent Activity ──────────────────────────────────── */
    .gf-activity-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .gf-activity-row {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 0 16px;
        height: 76px;
        border-radius: 14px;
        background: #F9FAFB;
    }
    .gf-activity-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .gf-activity-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .gf-activity-title {
        color: #1E2939 !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        line-height: 24px !important;
        margin: 0 !important;
    }
    .gf-activity-time {
        color: #6A7282 !important;
        font-size: 14px !important;
        font-weight: 400 !important;
        line-height: 20px !important;
        margin: 0 !important;
    }

    /* ─── Filament layout overrides ────────────────────────── */

    /* Main sidebar → dark navy */
    .fi-sidebar.fi-main-sidebar {
        background-color: #00377D !important;
    }
    .fi-sidebar-header,
    .fi-sidebar-header-ctn {
        background-color: #00377D !important;
    }

    /* Sidebar nav links → white text */
    .fi-main-sidebar .fi-sidebar-item-btn,
    .fi-main-sidebar .fi-sidebar-item-btn span,
    .fi-main-sidebar .fi-sidebar-item-btn svg {
        color: rgba(255,255,255,0.85) !important;
    }
    .fi-main-sidebar .fi-sidebar-item-btn svg path,
    .fi-main-sidebar .fi-sidebar-item-btn svg rect,
    .fi-main-sidebar .fi-sidebar-item-btn svg circle {
        stroke: rgba(255,255,255,0.85) !important;
    }

    /* Active sidebar item → white card */
    .fi-main-sidebar .fi-sidebar-item.fi-active .fi-sidebar-item-btn {
        background-color: #ffffff !important;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10) !important;
        border-radius: 14px !important;
    }
    .fi-main-sidebar .fi-sidebar-item.fi-active .fi-sidebar-item-btn,
    .fi-main-sidebar .fi-sidebar-item.fi-active .fi-sidebar-item-btn span {
        color: #00377D !important;
    }
    .fi-main-sidebar .fi-sidebar-item.fi-active .fi-sidebar-item-btn svg path,
    .fi-main-sidebar .fi-sidebar-item.fi-active .fi-sidebar-item-btn svg rect {
        stroke: #00377D !important;
    }

    /* Sidebar hover state */
    .fi-main-sidebar .fi-sidebar-item-btn:hover {
        background-color: rgba(255,255,255,0.12) !important;
        border-radius: 14px !important;
    }

    /* Brand/logo in sidebar header → white */
    .fi-sidebar-header .fi-logo,
    .fi-sidebar-header .fi-logo span,
    .fi-sidebar-header [class*="brand"] {
        color: #ffffff !important;
    }

    /* Main content area → light gray background */
    .fi-main {
        background-color: #F9FAFB !important;
    }
    .fi-main .fi-page-header-heading {
        color: #00377D !important;
    }

    /* Topbar → white with border */
    .fi-topbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #E5E7EB !important;
    }
    .fi-topbar-ctn {
        background-color: #ffffff !important;
    }
</style>

</div>
