<div>
  <div class="gf-units-wrap">

    {{-- Page Header --}}
    <div class="gf-units-header">
      <div class="gf-units-heading-block">
        <h1 class="gf-units-title">Our Units</h1>
        <p class="gf-units-subtitle">Manage apartment unit types and specifications</p>
      </div>
      <a href="{{ $this->getCreateUrl() }}" class="gf-add-unit-btn">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
          <path d="M4.16699 10H15.8337" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M10 4.16669V15.8334" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Add New Unit
      </a>
    </div>

    {{-- Search Bar --}}
    <div class="gf-search-card">
      <div class="gf-search-inner">
        <svg class="gf-search-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
          <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="#99A1AF" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M17.5003 17.5L13.917 13.9166" stroke="#99A1AF" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <input
          type="text"
          wire:model.live.debounce.300ms="search"
          placeholder="Search units..."
          class="gf-search-input"
        >
      </div>
    </div>

    {{-- Unit Cards --}}
    <div class="gf-units-list">
      @forelse ($this->getUnits() as $unit)
      <div class="gf-unit-card" wire:key="unit-{{ $unit->id }}">

        {{-- Thumbnail --}}
        <div class="gf-unit-thumb">
          @php $imgUrl = $unit->getFirstMediaUrl('gallery'); @endphp
          @if ($imgUrl)
            <img src="{{ $imgUrl }}" alt="{{ $unit->name }}" class="gf-unit-img">
          @endif
        </div>

        {{-- Card Content --}}
        <div class="gf-unit-content">

          {{-- Top Row: Info + Action Buttons --}}
          <div class="gf-unit-top">
            <div class="gf-unit-info">
              <h3 class="gf-unit-name">{{ $unit->name }}</h3>
              <p class="gf-unit-specs">
                @php
                  $parts = [];
                  if ($unit->size)      $parts[] = number_format((float) $unit->size, 0) . ' SQM';
                  if ($unit->bedrooms)  $parts[] = $unit->bedrooms . ' Bedroom' . ($unit->bedrooms != 1 ? 's' : '');
                  if ($unit->bathrooms) $parts[] = $unit->bathrooms . ' Bathroom' . ($unit->bathrooms != 1 ? 's' : '');
                  if ($unit->location)  $parts[] = $unit->location;
                @endphp
                {{ implode(' • ', $parts) ?: '—' }}
              </p>
            </div>
            <div class="gf-unit-actions">
              <a href="{{ $this->getEditUrl($unit) }}" class="gf-action-btn gf-edit-btn" title="Edit unit">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M10 2.5H4.16667C3.72464 2.5 3.30072 2.67559 2.98816 2.98816C2.67559 3.30072 2.5 3.72464 2.5 4.16667V15.8333C2.5 16.2754 2.67559 16.6993 2.98816 17.0118C3.30072 17.3244 3.72464 17.5 4.16667 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0118C17.3244 16.6993 17.5 16.2754 17.5 15.8333V10" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15.3123 2.18744C15.6438 1.85592 16.0934 1.66968 16.5623 1.66968C17.0311 1.66968 17.4807 1.85592 17.8123 2.18744C18.1438 2.51897 18.33 2.9686 18.33 3.43744C18.33 3.90629 18.1438 4.35592 17.8123 4.68744L10.3014 12.1991C10.1035 12.3968 9.85909 12.5415 9.59059 12.6199L7.19642 13.3199C7.12471 13.3409 7.0487 13.3421 6.97634 13.3236C6.90399 13.305 6.83794 13.2674 6.78512 13.2146C6.73231 13.1618 6.69466 13.0957 6.67612 13.0234C6.65758 12.951 6.65884 12.875 6.67975 12.8033L7.37975 10.4091C7.45852 10.1408 7.60353 9.89666 7.80142 9.69911L15.3123 2.18744Z" stroke="#155DFC" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
              <button
                wire:click="deleteUnit({{ $unit->id }})"
                wire:confirm="Are you sure you want to delete '{{ addslashes($unit->name) }}'?"
                class="gf-action-btn gf-delete-btn"
                title="Delete unit"
              >
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M2.5 5H17.5" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15.8337 5V16.6667C15.8337 17.5 15.0003 18.3333 14.167 18.3333H5.83366C5.00033 18.3333 4.16699 17.5 4.16699 16.6667V5" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.66699 4.99996V3.33329C6.66699 2.49996 7.50033 1.66663 8.33366 1.66663H11.667C12.5003 1.66663 13.3337 2.49996 13.3337 3.33329V4.99996" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M8.33301 9.16663V14.1666" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M11.667 9.16663V14.1666" stroke="#E7000B" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>

          {{-- Bottom Row: Show on Page Toggle --}}
          <div class="gf-unit-visibility">
            <span class="gf-visibility-label">Show on Page:</span>
            <button
              wire:click="toggleVisibility({{ $unit->id }})"
              class="gf-visibility-btn {{ $unit->show_on_page ? 'gf-vis-on' : 'gf-vis-off' }}"
              title="Toggle visibility"
            >
              @if ($unit->show_on_page)
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                  <path d="M1.54688 9.26103C1.48437 9.09264 1.48437 8.90741 1.54688 8.73903C2.15565 7.26292 3.18902 6.00081 4.51596 5.1127C5.8429 4.22459 7.40366 3.75049 9.00038 3.75049C10.5971 3.75049 12.1579 4.22459 13.4848 5.1127C14.8117 6.00081 15.8451 7.26292 16.4539 8.73903C16.5164 8.90741 16.5164 9.09264 16.4539 9.26103C15.8451 10.7371 14.8117 11.9992 13.4848 12.8874C12.1579 13.7755 10.5971 14.2496 9.00038 14.2496C7.40366 14.2496 5.8429 13.7755 4.51596 12.8874C3.18902 11.9992 2.15565 10.7371 1.54688 9.26103Z" stroke="#008236" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M9 11.25C10.2426 11.25 11.25 10.2426 11.25 9C11.25 7.75736 10.2426 6.75 9 6.75C7.75736 6.75 6.75 7.75736 6.75 9C6.75 10.2426 7.75736 11.25 9 11.25Z" stroke="#008236" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Visible
              @else
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                  <path d="M2.25 2.25L15.75 15.75" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M7.425 3.07502C7.93875 2.94002 8.46375 2.87627 9 2.87502C12.375 2.87502 15.1875 5.25002 16.5 9.00002C16.155 9.97502 15.675 10.875 15.075 11.6625M10.5225 10.5225C10.2872 10.7744 10.004 10.9758 9.69016 11.1149C9.3763 11.254 9.03842 11.3281 8.69605 11.3328C8.35368 11.3376 8.01386 11.2729 7.69625 11.1426C7.37864 11.0123 7.08958 10.8189 6.84715 10.5736C6.60472 10.3284 6.41401 10.0364 6.28607 9.71605C6.15812 9.39568 6.09558 9.05417 6.10227 8.71074C6.10896 8.3673 6.18472 8.02833 6.32499 7.71346C6.46526 7.3986 6.66714 7.11487 6.92 6.8775M13.045 13.045C11.8481 13.9463 10.3936 14.4396 8.895 14.4563C5.5125 14.4563 2.7 12.0813 1.3875 8.33252C2.09506 6.35948 3.42285 4.66399 5.1675 3.5025" stroke="#E7000B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Hidden
              @endif
            </button>
          </div>

        </div>
      </div>
      @empty
      <div class="gf-units-empty">
        No units found. <a href="{{ $this->getCreateUrl() }}">Add your first unit →</a>
      </div>
      @endforelse
    </div>

  </div>

  <style>
    /* ── Page Wrapper ─────────────────────────────────────── */
    .gf-units-wrap {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-top: 10px;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── Header ───────────────────────────────────────────── */
    .gf-units-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
    }
    .gf-units-title {
      color: #00377D;
      font-size: 36px;
      font-weight: 700;
      line-height: 40px;
      margin: 0 0 8px;
    }
    .gf-units-subtitle {
      color: #4A5565;
      font-size: 16px;
      font-weight: 400;
      line-height: 24px;
      margin: 0;
    }
    .gf-add-unit-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 24px;
      border-radius: 14px;
      background: #22AE6C;
      box-shadow: 0 10px 15px -3px rgba(0,0,0,.10), 0 4px 6px -4px rgba(0,0,0,.10);
      color: #fff !important;
      font-size: 16px;
      font-weight: 600;
      line-height: 24px;
      text-decoration: none !important;
      transition: background 0.15s;
      white-space: nowrap;
      flex-shrink: 0;
    }
    .gf-add-unit-btn:hover { background: #1c9b5f !important; }

    /* ── Search Card ──────────────────────────────────────── */
    .gf-search-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.10), 0 2px 4px -2px rgba(0,0,0,.10);
      padding: 16px;
    }
    .gf-search-inner { position: relative; }
    .gf-search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      pointer-events: none;
    }
    .gf-search-input {
      width: 100%;
      padding: 12px 16px 12px 48px;
      border-radius: 14px;
      border: 2px solid #E5E7EB;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px;
      color: #0a0a0a;
      background: #fff;
      outline: none;
      box-sizing: border-box;
      transition: border-color 0.15s;
    }
    .gf-search-input::placeholder { color: rgba(10,10,10,0.5); }
    .gf-search-input:focus { border-color: #009ED1; }

    /* ── Units List ───────────────────────────────────────── */
    .gf-units-list {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .gf-units-empty {
      padding: 48px;
      text-align: center;
      color: #6A7282;
      font-size: 16px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.10), 0 2px 4px -2px rgba(0,0,0,.10);
    }
    .gf-units-empty a { color: #009ED1; text-decoration: none; }

    /* ── Unit Card ────────────────────────────────────────── */
    .gf-unit-card {
      display: flex;
      align-items: center;
      gap: 24px;
      padding: 0 24px;
      min-height: 192px;
      border-radius: 16px;
      background: #fff;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.10), 0 2px 4px -2px rgba(0,0,0,.10);
      overflow: hidden;
    }

    /* ── Thumbnail ────────────────────────────────────────── */
    .gf-unit-thumb {
      flex-shrink: 0;
      width: 192px;
      height: 128px;
      border-radius: 14px;
      background: #E5E7EB;
      overflow: hidden;
    }
    .gf-unit-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* ── Content ──────────────────────────────────────────── */
    .gf-unit-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 16px;
      min-width: 0;
      padding: 24px 0;
    }
    .gf-unit-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 16px;
    }
    .gf-unit-info { flex: 1; min-width: 0; }
    .gf-unit-name {
      color: #00377D;
      font-size: 24px;
      font-weight: 700;
      line-height: 32px;
      margin: 0 0 8px;
    }
    .gf-unit-specs {
      color: #4A5565;
      font-size: 16px;
      font-weight: 400;
      line-height: 24px;
      margin: 0;
    }

    /* ── Action Buttons ───────────────────────────────────── */
    .gf-unit-actions {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-shrink: 0;
    }
    .gf-action-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 10px;
      border: none;
      background: transparent;
      cursor: pointer;
      padding: 0;
      transition: background 0.15s;
      text-decoration: none;
    }
    .gf-edit-btn:hover   { background: #EFF6FF; }
    .gf-delete-btn:hover { background: #FEF2F2; }

    /* ── Visibility Toggle ────────────────────────────────── */
    .gf-unit-visibility {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .gf-visibility-label {
      color: #364153;
      font-size: 14px;
      font-weight: 600;
      line-height: 20px;
      white-space: nowrap;
    }
    .gf-visibility-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 0 16px;
      height: 40px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-family: 'Plus Jakarta Sans', sans-serif;
      font-size: 16px;
      font-weight: 600;
      line-height: 24px;
      transition: opacity 0.15s;
    }
    .gf-visibility-btn:hover { opacity: 0.85; }
    .gf-vis-on  { background: #DCFCE7; color: #008236; }
    .gf-vis-off { background: #FEE2E2; color: #E7000B; }
  </style>
</div>
