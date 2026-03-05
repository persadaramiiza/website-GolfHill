{{-- Custom Admin Login Portal - Matches Figma Design --}}
<div style="position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; z-index: 9999; overflow: hidden; font-family: 'Plus Jakarta Sans', sans-serif;">

    {{-- Font Import --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

{{-- Full-page background (fixed position, covers entire viewport) --}}
<div style="position: absolute; inset: 0; overflow: hidden; z-index: 0;">
    {{-- Photo base + gradient overlay --}}
    <div style="position: absolute; inset: 0; background: url('https://api.builder.io/api/v1/image/assets/TEMP/aea8cdd097b4a585d24ff1d9d25453bd37a90236?width=1819') lightgray center / cover no-repeat;"></div>
    <div style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(0,55,125,0.95) 0%, rgba(0,158,209,0.90) 50%, rgba(0,55,125,0.95) 100%);"></div>

    {{-- Decorative blobs --}}
    <svg style="filter: blur(125px); position: absolute; left: 37px; top: 30px; pointer-events: none;" width="426" height="631" viewBox="0 0 426 631" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_f_91_177)">
            <path d="M377.528 354.751C393.145 374.18 414.975 373.318 424.428 396.917C433.881 420.516 399.284 478.051 358.612 498.683C317.939 519.315 194.115 382.497 194.115 382.497C175.839 372.466 154.904 306.097 217.366 120.872C279.829 -64.3531 328.122 60.3301 344.461 145.825C344.461 145.825 361.911 335.322 377.528 354.751Z" fill="#009ED1"/>
            <path d="M120.727 293.962C117.54 268.489 98.8391 256.324 102.928 231C107.017 205.677 165.21 177.967 209.725 184.717C254.24 191.466 288.275 379.024 288.275 379.024C298.465 398.204 282.239 466.086 135.818 584.172C-10.6023 702.257 12.3823 569.439 42.1772 488.269C42.1772 488.269 123.915 319.435 120.727 293.962Z" fill="#22AE6C"/>
            <path d="M100.658 110.275C97.4707 84.8014 78.7701 72.636 82.8588 47.3125C86.9476 21.9891 145.141 -5.72021 189.656 1.02914C234.171 7.77848 268.206 195.336 268.206 195.336C278.396 214.517 262.17 282.399 115.749 400.484C-30.6713 518.569 -7.68671 385.751 22.1082 304.582C22.1082 304.582 103.846 135.748 100.658 110.275Z" fill="#00377D"/>
        </g>
        <defs>
            <filter id="filter0_f_91_177" x="-250" y="-250" width="926" height="1131" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_91_177"/>
            </filter>
        </defs>
    </svg>
</div>

{{-- White Card --}}
<div style="position: relative; z-index: 10; width: 448px; max-width: calc(100vw - 2rem); background: #FFF; border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); padding: 48px; max-height: calc(100vh - 2rem); overflow-y: auto;">

    {{-- Title Block --}}
    <div style="text-align: center; margin-bottom: 32px;">
        <h1 style="color: #00377D; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 36px; font-weight: 700; line-height: 40px; margin-bottom: 8px;">
            Admin Portal
        </h1>
        <p style="color: #4A5565; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
            Golfhill Terraces Management
        </p>
    </div>

    {{-- Filament Form (fields + submit button) --}}
    {{ $this->content }}

    {{-- Demo Credentials Hint --}}
    <p style="text-align: center; margin-top: 16px; color: #6A7282; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 400; line-height: 20px;">
        Demo: admin@golfhill.com / password
    </p>
</div>

{{-- CSS Overrides: strip Filament's shell, style form elements --}}
<style>
    /* ─── Hide Filament's layout shells (our fixed wrapper takes over) ── */
    .fi-simple-layout,
    .fi-simple-main-ctn,
    .fi-simple-main,
    .fi-simple-page {
        background: transparent !important;
        padding: 0 !important;
        margin: 0 !important;
        min-height: unset !important;
        width: auto !important;
        max-width: unset !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }

    /* ─── Input fields ─────────────────────────────────────────── */
    .fi-input,
    .fi-fo-text-input input,
    input[type="email"].fi-input,
    input[type="password"].fi-input {
        border-radius: 14px !important;
        border: 2px solid #E5E7EB !important;
        height: 52px !important;
        font-size: 16px !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        color: #0A0A0A !important;
        background: #FFF !important;
    }
    .fi-input:focus {
        border-color: #009ED1 !important;
        box-shadow: 0 0 0 3px rgba(0,158,209,0.15) !important;
        outline: none !important;
    }
    .fi-input::placeholder {
        color: rgba(10,10,10,0.45) !important;
    }

    /* ─── Field labels ─────────────────────────────────────────── */
    .fi-fo-field-wrp-label,
    .fi-fo-field-wrp-label label,
    .fi-label-wrp label,
    .fi-label,
    label.fi-fo-field-wrp-label {
        color: #364153 !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        line-height: 20px !important;
    }

    /* ─── Prefix icon ──────────────────────────────────────────── */
    .fi-input-wrp-prefix-icon {
        color: #99A1AF !important;
    }

    /* ─── Submit button ────────────────────────────────────────── */
    .fi-sc-actions .fi-btn,
    .fi-sc-actions button[type="submit"],
    .fi-form-actions .fi-btn,
    .fi-btn-primary,
    [wire\:click\\.prevent="authenticate"] {
        background: #22AE6C !important;
        border-radius: 14px !important;
        width: 100% !important;
        justify-content: center !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        font-family: 'Plus Jakarta Sans', sans-serif !important;
        color: #FFF !important;
        border: none !important;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10) !important;
        min-height: 52px !important;
    }
    .fi-sc-actions .fi-btn:hover,
    .fi-sc-actions button[type="submit"]:hover {
        background: #1a9a5e !important;
        opacity: 1 !important;
    }

    /* ─── Hide "Forgot password?" link ────────────────────────── */
    .fi-fo-text-input .fi-fo-field-wrp-hint {
        display: none !important;
    }
</style>

</div>
