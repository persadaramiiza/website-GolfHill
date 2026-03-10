{{-- resources/views/filament/resources/articles/list-articles.blade.php --}}
<div>
  <div class="gf-units-wrap">

    {{-- Page Header --}}
    <div class="gf-units-header">
      <div class="gf-units-heading-block">
        <h1 class="gf-units-title">Articles</h1>
        <p class="gf-units-subtitle">Manage lifestyle articles and blog posts</p>
      </div>
      <a href="{{ route('filament.admin.resources.articles.create') }}" class="gf-add-unit-btn">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
          <path d="M4.16699 10H15.8337" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M10 4.16669V15.8334" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        New Article
      </a>
    </div>

    {{-- Filament default table --}}
    <div>
      {{ $this->table }}
    </div>

  </div>

  <style>
    /* ── Complete Filament Layout Override ──────────────────────── */
    .fi-page {
      background: #F9FAFB !important;
      padding: 0 !important;
    }
    .fi-page-content,
    .fi-page-content-ctn {
      padding: 0 !important;
      max-width: 100% !important;
      width: 100% !important;
    }
    .fi-main {
      background: #F9FAFB !important;
    }
    
    /* ── Admin Layout Overrides ─────────────────────────────────── */
    .fi-sidebar {
      background-color: #00377D !important;
      width: 256px !important;
    }
    .fi-sidebar-nav,
    .fi-sidebar-nav > ul,
    .fi-sidebar-header {
      background-color: #00377D !important;
    }
    .fi-sidebar-item-button,
    .fi-sidebar-group-label,
    .fi-sidebar-item-label {
      color: #ffffff !important;
    }
    .fi-sidebar-item-button:hover {
      background-color: rgba(255,255,255,0.10) !important;
    }
    .fi-sidebar-item-button.fi-active,
    .fi-sidebar-item-button[aria-current="page"] {
      background-color: #ffffff !important;
      box-shadow: 0 10px 15px -3px rgba(0,0,0,.10), 0 4px 6px -4px rgba(0,0,0,.10) !important;
      border-radius: 14px !important;
    }
    .fi-sidebar-item-button.fi-active .fi-sidebar-item-label,
    .fi-sidebar-item-button[aria-current="page"] .fi-sidebar-item-label {
      color: #00377D !important;
    }
    .fi-sidebar-item-button.fi-active svg,
    .fi-sidebar-item-button[aria-current="page"] svg {
      color: #00377D !important;
      stroke: #00377D !important;
    }
    .fi-topbar {
      background-color: #ffffff !important;
      border-bottom: 1px solid #E5E7EB !important;
    }

    /* ── Page Wrapper ────────────────────────────────────────────── */
    .gf-units-wrap {
      display: flex;
      flex-direction: column;
      gap: 16px;
      padding: 40px 4px 32px 4px;
      font-family: 'Plus Jakarta Sans', sans-serif;
      min-height: 100%;
      background: #F9FAFB;
    }

    /* ── Header ─────────────────────────────────────────────────── */
    .gf-units-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
      padding-top: 0;
      margin-top: 16px;
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
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      line-height: 24px;
      text-decoration: none;
      transition: background 0.15s;
      white-space: nowrap;
      flex-shrink: 0;
    }
    .gf-add-unit-btn:hover { background: #1a9559; }
  </style>
</div>
