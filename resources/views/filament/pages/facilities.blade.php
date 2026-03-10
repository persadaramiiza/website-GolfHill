<div>
  <div class="gf-fac-wrap">

    {{-- Page Header --}}
    <div class="gf-fac-header">
      <div class="gf-fac-heading-block">
        <h1 class="gf-fac-title">Our Facilities</h1>
        <p class="gf-fac-subtitle">Manage building amenities and facilities</p>
      </div>
      <a href="{{ $this->getCreateUrl() }}" class="gf-add-fac-btn">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
          <path d="M4.16699 10H15.8337" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M10 4.16669V15.8334" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Add New Facility
      </a>
    </div>

    {{-- Search + Filter Bar --}}
    <div class="gf-fac-search-card">
      <div class="gf-fac-search-row">
        <div class="gf-fac-search-box">
          <svg class="gf-fac-search-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="#99A1AF" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M17.5003 17.5L13.917 13.9166" stroke="#99A1AF" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search facilities..."
            class="gf-fac-search-input"
          >
        </div>
        <div class="gf-fac-filter-box">
          <select wire:model.live="filterType" class="gf-fac-filter-select">
            <option value="">All Types</option>
            <option value="indoor">Indoor</option>
            <option value="outdoor">Outdoor</option>
          </select>
        </div>
      </div>
    </div>

    {{-- Facility Cards Grid --}}
    <div class="gf-fac-grid">
      @forelse ($this->getFacilities() as $facility)
      <div class="gf-fac-card" wire:key="facility-{{ $facility->id }}">

        {{-- Card Top --}}
        <div class="gf-fac-card-top">
          <div class="gf-fac-card-info">

            {{-- Name + Type Badge --}}
            <div class="gf-fac-name-row">
              <h3 class="gf-fac-name">{{ $facility->name }}</h3>
              <span class="gf-fac-badge {{ $facility->type === 'indoor' ? 'gf-badge-indoor' : 'gf-badge-outdoor' }}">
                {{ $facility->type }}
              </span>
            </div>

            {{-- Description --}}
            @if ($facility->description)
              <p class="gf-fac-desc">{{ $facility->description }}</p>
            @endif

          </div>

          {{-- Action Buttons --}}
          <div class="gf-fac-actions">
            <a href="{{ $this->getEditUrl($facility) }}" class="gf-fac-action-btn gf-fac-edit-btn" title="Edit facility">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M9 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75H14.25C14.6478 15.75 15.0294 15.592 15.3107 15.3107C15.592 15.0294 15.75 14.6478 15.75 14.25V9" stroke="#155DFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.7813 1.9688C14.0797 1.67043 14.4844 1.50281 14.9063 1.50281C15.3283 1.50281 15.733 1.67043 16.0313 1.9688C16.3297 2.26717 16.4973 2.67184 16.4973 3.0938C16.4973 3.51575 16.3297 3.92043 16.0313 4.2188L9.27157 10.9793C9.09348 11.1572 8.87347 11.2875 8.63182 11.358L6.47707 11.988C6.41253 12.0069 6.34412 12.008 6.279 11.9913C6.21388 11.9746 6.15444 11.9407 6.10691 11.8932C6.05937 11.8457 6.02549 11.7862 6.0088 11.7211C5.99212 11.656 5.99325 11.5876 6.01207 11.523L6.64207 9.3683C6.71297 9.12684 6.84347 8.90709 7.02157 8.7293L13.7813 1.9688Z" stroke="#155DFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
            <button
              wire:click="deleteFacility({{ $facility->id }})"
              wire:confirm="Are you sure you want to delete '{{ addslashes($facility->name) }}'?"
              class="gf-fac-action-btn gf-fac-delete-btn"
              title="Delete facility"
            >
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M2.25 4.5H15.75" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.25 4.5V15C14.25 15.75 13.5 16.5 12.75 16.5H5.25C4.5 16.5 3.75 15.75 3.75 15V4.5" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6 4.5V3C6 2.25 6.75 1.5 7.5 1.5H10.5C11.25 1.5 12 2.25 12 3V4.5" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.5 8.25V12.75" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 8.25V12.75" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>

        {{-- Card Bottom: Visibility --}}
        <div class="gf-fac-card-bottom">
          <span class="gf-fac-vis-label">Visibility:</span>
          <button
            wire:click="toggleVisibility({{ $facility->id }})"
            class="gf-fac-vis-btn {{ $facility->show_on_page ? 'gf-vis-on' : 'gf-vis-off' }}"
            title="Toggle visibility"
          >
            @if ($facility->show_on_page)
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M1.37468 8.232C1.31912 8.08232 1.31912 7.91767 1.37468 7.768C1.91581 6.4559 2.83435 5.33402 4.01386 4.5446C5.19336 3.75517 6.58071 3.33374 8.00001 3.33374C9.41932 3.33374 10.8067 3.75517 11.9862 4.5446C13.1657 5.33402 14.0842 6.4559 14.6253 7.768C14.6809 7.91767 14.6809 8.08232 14.6253 8.232C14.0842 9.54409 13.1657 10.666 11.9862 11.4554C10.8067 12.2448 9.41932 12.6663 8.00001 12.6663C6.58071 12.6663 5.19336 12.2448 4.01386 11.4554C2.83435 10.666 1.91581 9.54409 1.37468 8.232Z" stroke="#008236" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#008236" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Visible
            @else
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M2 2L14 14" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M6.6 2.73C7.06 2.6 7.52 2.54 8 2.54C11 2.54 13.5 4.68 14.5 8C14.22 8.86 13.8 9.65 13.27 10.34M9.13 9.13C8.9 9.37 8.62 9.57 8.3 9.7C7.98 9.83 7.64 9.9 7.29 9.9C6.93 9.9 6.57 9.83 6.25 9.7C5.93 9.57 5.64 9.37 5.39 9.13C5.14 8.89 4.94 8.6 4.81 8.28C4.68 7.96 4.61 7.61 4.62 7.25C4.62 6.9 4.69 6.56 4.82 6.24C4.95 5.92 5.14 5.63 5.38 5.39M11.58 11.58C10.55 12.34 9.3 12.78 8 12.78C5 12.78 2.5 10.64 1.5 7.32C2.08 5.56 3.24 4.07 4.75 3.09" stroke="#E7000B" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Hidden
            @endif
          </button>
        </div>

      </div>
      @empty
      <div class="gf-fac-empty">
        No facilities found. <a href="{{ $this->getCreateUrl() }}">Add your first facility →</a>
      </div>
      @endforelse
    </div>

  </div>

  <style>
    /* Hide visible scrollbar in Facilities page (still scrollable) */
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

    .gf-fac-wrap {
      display: flex;
      flex-direction: column;
      gap: 20px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      padding-top: 28px;
      box-sizing: border-box;
      overflow-x: clip;
    }

    /* ── Header ── */
    .gf-fac-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0;
    }
    .gf-fac-title {
      font-size: 36px;
      font-weight: 700;
      color: #00377D;
      line-height: 40px;
      margin: 0 0 8px;
    }
    .gf-fac-subtitle {
      font-size: 16px;
      font-weight: 400;
      color: #4A5565;
      margin: 0;
    }
    .gf-add-fac-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 24px;
      background: #22AE6C;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      text-decoration: none;
      border-radius: 14px;
      box-shadow: 0 10px 15px -3px rgba(0,0,0,.10), 0 4px 6px -4px rgba(0,0,0,.10);
      white-space: nowrap;
      transition: opacity .15s;
    }
    .gf-add-fac-btn:hover { opacity: .88; }

    /* ── Search + Filter ── */
    .gf-fac-search-card {
      background: #fff;
      border-radius: 14px;
      padding: 16px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1);
      margin-bottom: 0;
    }
    .gf-fac-search-row {
      display: flex;
      gap: 16px;
      align-items: center;
    }
    .gf-fac-search-box {
      position: relative;
      flex: 1;
    }
    .gf-fac-search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
    }
    .gf-fac-search-input {
      width: 100%;
      height: 52px;
      padding: 12px 16px 12px 48px;
      border-radius: 14px;
      border: 2px solid #E5E7EB;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px;
      color: #0A0A0A;
      background: #fff;
      box-sizing: border-box;
      outline: none;
      transition: border-color .15s;
    }
    .gf-fac-search-input::placeholder { color: rgba(10,10,10,.5); }
    .gf-fac-search-input:focus { border-color: #00377D; }

    .gf-fac-filter-box {
      flex-shrink: 0;
    }
    .gf-fac-filter-select {
      height: 52px;
      padding: 0 16px;
      border-radius: 14px;
      border: 2px solid #E5E7EB;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 15px;
      color: #364153;
      background: #fff;
      outline: none;
      cursor: pointer;
      min-width: 140px;
      transition: border-color .15s;
    }
    .gf-fac-filter-select:focus { border-color: #00377D; }

    /* ── Cards Grid ── */
    .gf-fac-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 16px;
    }

    .gf-fac-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -2px rgba(0,0,0,.1);
      padding: 24px 24px 0 24px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    /* Card Top */
    .gf-fac-card-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 12px;
    }
    .gf-fac-card-info { flex: 1; }
    .gf-fac-name-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 8px;
      flex-wrap: wrap;
    }
    .gf-fac-name {
      font-size: 20px;
      font-weight: 700;
      color: #00377D;
      line-height: 28px;
      margin: 0;
    }

    /* Type badges */
    .gf-fac-badge {
      display: inline-flex;
      padding: 4px 12px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
      line-height: 16px;
      white-space: nowrap;
    }
    .gf-badge-indoor {
      background: #DBEAFE;
      color: #1447E6;
    }
    .gf-badge-outdoor {
      background: #DCFCE7;
      color: #008236;
    }

    .gf-fac-desc {
      font-size: 14px;
      font-weight: 400;
      color: #4A5565;
      line-height: 20px;
      margin: 0;
    }

    /* Action Buttons */
    .gf-fac-actions {
      display: flex;
      align-items: center;
      gap: 4px;
      flex-shrink: 0;
    }
    .gf-fac-action-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 34px;
      height: 34px;
      border-radius: 10px;
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 8px;
      text-decoration: none;
      transition: background .15s;
    }
    .gf-fac-action-btn:hover { background: #F3F4F6; }

    /* Card Bottom */
    .gf-fac-card-bottom {
      display: flex;
      align-items: center;
      gap: 12px;
      border-top: 1px solid rgba(0,0,0,.10);
      padding: 12px 0;
    }
    .gf-fac-vis-label {
      font-size: 14px;
      font-weight: 600;
      color: #364153;
      white-space: nowrap;
    }
    .gf-fac-vis-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      height: 32px;
      padding: 0 12px;
      border-radius: 10px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 14px;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: opacity .15s;
    }
    .gf-fac-vis-btn:hover { opacity: .85; }
    .gf-vis-on {
      background: #DCFCE7;
      color: #008236;
    }
    .gf-vis-off {
      background: #FEE2E2;
      color: #E7000B;
    }

    /* Empty state */
    .gf-fac-empty {
      grid-column: 1 / -1;
      padding: 48px;
      text-align: center;
      color: #6A7282;
      font-size: 16px;
    }
    .gf-fac-empty a {
      color: #00377D;
      text-decoration: underline;
    }
  </style>
</div>
