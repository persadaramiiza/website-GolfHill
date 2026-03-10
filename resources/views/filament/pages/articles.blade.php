<div>
  <div class="gf-articles-wrap">

    {{-- Page Header --}}
    <div class="gf-articles-header">
      <div class="gf-articles-heading-block">
        <h1 class="gf-articles-title">Articles</h1>
        <p class="gf-articles-subtitle">Manage lifestyle articles and blog posts</p>
      </div>
      <a href="{{ $this->getCreateUrl() }}" class="gf-add-article-btn">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
          <path d="M4.16699 10H15.8337" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M10 4.16669V15.8334" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        New Article
      </a>
    </div>

    {{-- Article Table --}}
    <div class="gf-articles-table">
      {{ $this->table }}
    </div>

  </div>

  <style>
    /* ── Page Wrapper ─────────────────────────────────────── */
    .gf-articles-wrap {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-top: 28px;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* ── Header ───────────────────────────────────────────── */
    .gf-articles-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
    }
    .gf-articles-title {
      color: #00377D;
      font-size: 36px;
      font-weight: 700;
      line-height: 40px;
      margin: 0 0 8px;
    }
    .gf-articles-subtitle {
      color: #4A5565;
      font-size: 16px;
      font-weight: 400;
      line-height: 24px;
      margin: 0;
    }
    .gf-add-article-btn {
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
    .gf-add-article-btn:hover { background: #1c9b5f !important; }

    /* ── Table Card ───────────────────────────────────────── */
    .gf-articles-table {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.10), 0 2px 4px -2px rgba(0,0,0,.10);
      overflow: hidden;
    }
  </style>
</div>
