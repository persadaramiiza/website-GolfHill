@extends('layouts.app')

@section('title', 'Our Facilities - GolfHill Terraces')

@section('content')

{{-- Page Header --}}
<section style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.30) 0%, #FFF 50%, #FFF 100%); padding-top: 85px;">
    <div class="max-w-5xl mx-auto px-8 pb-0">
        <div class="flex flex-col items-center" style="padding-bottom: 0;">
            {{-- Gradient Bar --}}
            <div style="width: 80px; height: 6px; background: linear-gradient(180deg, #009ED1 0%, #4BD997 100%); border-radius: 3px; margin-bottom: 38px;"></div>

            {{-- Title --}}
            <h1 style="color: #00377D; font-size: 60px; font-weight: 700; line-height: 60px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 24px;">
                Our Facilities
            </h1>

            {{-- Subtitle --}}
            <p style="color: #4A5565; font-size: 20px; font-weight: 400; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 64px;">
                World-class amenities designed for your comfort, wellness, and lifestyle
            </p>
        </div>
    </div>
</section>

{{-- Indoor Section --}}
<section style="background: #FFF; padding: 64px 0 80px 0;">
    <div class="max-w-5xl mx-auto px-8">
        {{-- Section Heading --}}
        <h2 style="color: #00377D; font-size: 36px; font-weight: 700; line-height: 40px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 48px;">
            Indoor
        </h2>

        {{-- 2×2 Card Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- Card: 24 Hour Receptionist --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/0d3cc04398441010a65d535cca14784973854c54?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 33C26.2843 33 33 26.2843 33 18C33 9.71573 26.2843 3 18 3C9.71573 3 3 9.71573 3 18C3 26.2843 9.71573 33 18 33Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18 9V18L24 21" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">24 Hour Receptionist</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Always available to assist you</p>
                </div>
            </div>

            {{-- Card: Restaurant --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/3c95df005b0489f82caa795cf82b2d6b61cf1565?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 3V13.5C4.5 15.15 5.85 16.5 7.5 16.5H13.5C14.2956 16.5 15.0587 16.1839 15.6213 15.6213C16.1839 15.0587 16.5 14.2956 16.5 13.5V3" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.5 3V33" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.5 22.5V3C29.5109 3 27.6032 3.79018 26.1967 5.1967C24.7902 6.60322 24 8.51088 24 10.5V19.5C24 21.15 25.35 22.5 27 22.5H31.5ZM31.5 22.5V33" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Restaurant</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">International cuisine on-site</p>
                </div>
            </div>

            {{-- Card: Gym --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/7af30c8d1f69c3abec15a704cf9355c399f6bddb?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.5999 21.6L14.3999 14.4" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M27.9856 32.2275C27.4231 32.7902 26.66 33.1064 25.8644 33.1065C25.0687 33.1067 24.3056 32.7907 23.7428 32.2282C23.1801 31.6657 22.8639 30.9027 22.8638 30.107C22.8636 29.3113 23.1796 28.5482 23.7421 27.9855L21.0916 30.6375C20.5289 31.2002 19.7657 31.5163 18.9698 31.5163C18.174 31.5163 17.4108 31.2002 16.8481 30.6375C16.2854 30.0747 15.9692 29.3115 15.9692 28.5157C15.9692 27.7199 16.2854 26.9567 16.8481 26.394L26.3941 16.848C26.9568 16.2853 27.72 15.9691 28.5158 15.9691C29.3117 15.9691 30.0749 16.2853 30.6376 16.848C31.2003 17.4107 31.5165 18.1739 31.5165 18.9697C31.5165 19.7655 31.2003 20.5287 30.6376 21.0915L27.9856 23.742C28.5483 23.1794 29.3115 22.8635 30.1071 22.8636C30.9028 22.8638 31.6658 23.18 32.2283 23.7427C32.7909 24.3054 33.1068 25.0686 33.1067 25.8643C33.1065 26.6599 32.7903 27.4229 32.2276 27.9855L27.9856 32.2275Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32.2499 32.25L30.1499 30.15" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.85 5.85L3.75 3.75" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.60613 19.152C9.04341 19.7147 8.28019 20.0309 7.48438 20.0309C6.68857 20.0309 5.92536 19.7147 5.36263 19.152C4.79991 18.5893 4.48377 17.8261 4.48377 17.0303C4.48377 16.2344 4.79991 15.4712 5.36263 14.9085L8.01463 12.258C7.736 12.5365 7.40523 12.7575 7.04122 12.9082C6.67721 13.0589 6.28708 13.1364 5.8931 13.1363C5.09743 13.1362 4.33441 12.82 3.77188 12.2573C3.49335 11.9786 3.27242 11.6479 3.12172 11.2839C2.97102 10.9198 2.89349 10.5297 2.89355 10.1357C2.8937 9.34006 3.20991 8.57703 3.77263 8.01451L8.01463 3.77251C8.57716 3.20979 9.34018 2.89357 10.1359 2.89343C10.5298 2.89336 10.92 2.97089 11.284 3.1216C11.648 3.2723 11.9788 3.49323 12.2574 3.77176C12.536 4.05029 12.7571 4.38098 12.9079 4.74494C13.0587 5.1089 13.1364 5.499 13.1365 5.89298C13.1365 6.28696 13.059 6.67709 12.9083 7.0411C12.7576 7.40511 12.5367 7.73588 12.2581 8.01451L14.9086 5.36251C15.4714 4.79979 16.2346 4.48365 17.0304 4.48365C17.8262 4.48365 18.5894 4.79979 19.1521 5.36251C19.7149 5.92523 20.031 6.68845 20.031 7.48426C20.031 8.28007 19.7149 9.04329 19.1521 9.60601L9.60613 19.152Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Gym</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">State-of-the-art equipment</p>
                </div>
            </div>

            {{-- Card: Function Room --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/5925fac02fd943472360530e9c06fb1734e292b2?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 31.5V28.5C24 26.9087 23.3679 25.3826 22.2426 24.2574C21.1174 23.1321 19.5913 22.5 18 22.5H9C7.4087 22.5 5.88258 23.1321 4.75736 24.2574C3.63214 25.3826 3 26.9087 3 28.5V31.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.5 16.5C16.8137 16.5 19.5 13.8137 19.5 10.5C19.5 7.18629 16.8137 4.5 13.5 4.5C10.1863 4.5 7.5 7.18629 7.5 10.5C7.5 13.8137 10.1863 16.5 13.5 16.5Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M33 31.4999V28.4999C32.999 27.1705 32.5565 25.8791 31.742 24.8284C30.9276 23.7777 29.7872 23.0273 28.5 22.6949" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24 4.69495C25.2906 5.0254 26.4346 5.776 27.2515 6.82841C28.0684 7.88083 28.5118 9.17519 28.5118 10.5074C28.5118 11.8397 28.0684 13.1341 27.2515 14.1865C26.4346 15.2389 25.2906 15.9895 24 16.3199" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Function Room</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Perfect for events & gatherings</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Outdoor Section --}}
<section style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.20) 0%, #FFF 100%); padding: 64px 0 80px 0;">
    <div class="max-w-5xl mx-auto px-8">
        {{-- Section Heading --}}
        <h2 style="color: #00377D; font-size: 36px; font-weight: 700; line-height: 40px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 48px;">
            Outdoor
        </h2>

        {{-- 2×2 + 1 Card Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- Card: Tennis Court --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/7556f5512854cf4ffed418d53eaae928c6ffdf2f?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M31.7852 31.785C38.2936 25.2767 38.2936 14.7233 31.7852 8.21499C25.2769 1.70666 14.7236 1.70666 8.21523 8.21499C1.7069 14.7233 1.7069 25.2767 8.21523 31.785C14.7236 38.2933 25.2769 38.2933 31.7852 31.785ZM33.2386 18.4017C32.8844 15.4377 31.5423 12.6794 29.4286 10.5717C27.313 8.45036 24.5425 7.10651 21.5669 6.75832L21.5502 6.85166C20.8739 10.5006 19.1071 13.8586 16.483 16.4827C13.8589 19.1068 10.5008 20.8736 6.8519 21.55L6.75857 21.5667C7.10675 24.5423 8.45061 27.3128 10.5719 29.4283C12.6797 31.542 15.4379 32.8842 18.4019 33.2383L18.4219 33.1217C19.0979 29.4725 20.8646 26.114 23.4887 23.4896C26.1129 20.8652 29.4711 19.0981 33.1202 18.4217L33.2386 18.4017ZM33.1202 22.3817V21.825C30.3656 22.4543 27.8444 23.8481 25.8463 25.8461C23.8483 27.8441 22.4546 30.3653 21.8252 33.12H22.3819C25.0531 32.6392 27.5126 31.3507 29.4286 29.4283C31.351 27.5124 32.6395 25.0529 33.1202 22.3817ZM6.85357 18.1483V17.7767C7.31078 15.0458 8.61096 12.5265 10.5719 10.5717C12.5265 8.6101 15.0459 7.30933 17.7769 6.85166H18.1469C17.5176 9.60632 16.1238 12.1275 14.1258 14.1256C12.1278 16.1236 9.60656 17.5173 6.8519 18.1467" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Tennis Court</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Professional standard court</p>
                </div>
            </div>

            {{-- Card: Swimming Pool --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/07d48f3a8f04f01457e3959ad09bb73d002f2bad?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 9C3.9 9.75 4.8 10.5 6.75 10.5C10.5 10.5 10.5 7.5 14.25 7.5C18.15 7.5 17.85 10.5 21.75 10.5C25.5 10.5 25.5 7.5 29.25 7.5C31.2 7.5 32.1 8.25 33 9" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 18C3.9 18.75 4.8 19.5 6.75 19.5C10.5 19.5 10.5 16.5 14.25 16.5C18.15 16.5 17.85 19.5 21.75 19.5C25.5 19.5 25.5 16.5 29.25 16.5C31.2 16.5 32.1 17.25 33 18" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 27C3.9 27.75 4.8 28.5 6.75 28.5C10.5 28.5 10.5 25.5 14.25 25.5C18.15 25.5 17.85 28.5 21.75 28.5C25.5 28.5 25.5 25.5 29.25 25.5C31.2 25.5 32.1 26.25 33 27" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Swimming Pool</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Resort-style relaxation</p>
                </div>
            </div>

            {{-- Card: Kid's Playground --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/3243a16bae4abc01e861e3056597532d96698e84?width=795') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 40C0 17.9086 17.9086 0 40 0C62.0914 0 80 17.9086 80 40C80 62.0914 62.0914 80 40 80C17.9086 80 0 62.0914 0 40Z" fill="white" fill-opacity="0.2"/>
                            <path d="M28.3332 42.5001H32.8332L31.2498 39.9584C31.0832 39.7084 30.8815 39.514 30.6448 39.3751C30.4082 39.2362 30.1376 39.1667 29.8332 39.1667H28.3332V42.5001ZM28.3332 52.5001H41.8332C40.9721 52.5001 40.1737 52.2917 39.4382 51.8751C38.7026 51.4584 38.0982 50.889 37.6248 50.1667L34.9165 45.8334H28.3332V52.5001ZM23.3332 55.8334C22.861 55.8334 22.4654 55.6734 22.1465 55.3534C21.8276 55.0334 21.6676 54.6379 21.6665 54.1667C21.6654 53.6956 21.8254 53.3001 22.1465 52.9801C22.4676 52.6601 22.8632 52.5001 23.3332 52.5001H24.9998V34.1667C24.9998 33.6945 25.1598 33.299 25.4798 32.9801C25.7998 32.6612 26.1954 32.5012 26.6665 32.5001C27.1376 32.499 27.5337 32.659 27.8548 32.9801C28.176 33.3012 28.3354 33.6967 28.3332 34.1667V35.8334H29.8332C30.6943 35.8334 31.4932 36.0417 32.2298 36.4584C32.9665 36.8751 33.5704 37.4445 34.0415 38.1667L40.4165 48.3751C40.5832 48.6251 40.7848 48.8195 41.0215 48.9584C41.2582 49.0973 41.5287 49.1667 41.8332 49.1667H44.9998C45.4721 49.1667 45.8682 49.3267 46.1882 49.6467C46.5082 49.9667 46.6676 50.3623 46.6665 50.8334V52.5001H49.9998V42.2501C48.5554 41.8612 47.361 41.0834 46.4165 39.9167C45.4721 38.7501 44.9998 37.389 44.9998 35.8334C44.9998 34.889 45.1804 34.0067 45.5415 33.1867C45.9026 32.3667 46.4026 31.6517 47.0415 31.0417C46.9026 30.7362 46.8054 30.4306 46.7498 30.1251C46.6943 29.8195 46.6665 29.5001 46.6665 29.1667C46.6665 27.7779 47.1526 26.5973 48.1248 25.6251C49.0971 24.6529 50.2776 24.1667 51.6665 24.1667C53.0554 24.1667 54.236 24.6529 55.2082 25.6251C56.1804 26.5973 56.6665 27.7779 56.6665 29.1667C56.6665 29.5001 56.6387 29.8195 56.5832 30.1251C56.5276 30.4306 56.4304 30.7362 56.2915 31.0417C56.9304 31.6529 57.4304 32.3684 57.7915 33.1884C58.1526 34.0084 58.3332 34.8901 58.3332 35.8334C58.3332 37.389 57.861 38.7501 56.9165 39.9167C55.9721 41.0834 54.7776 41.8612 53.3332 42.2501V52.5001H56.6665C57.1387 52.5001 57.5343 52.6601 57.8532 52.9801C58.1721 53.3001 58.3321 53.6956 58.3332 54.1667C58.3343 54.6379 58.1743 55.034 57.8532 55.3551C57.5321 55.6762 57.1365 55.8356 56.6665 55.8334H23.3332Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Kid's Playground</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Safe & fun for children</p>
                </div>
            </div>

            {{-- Card: Jogging Track --}}
            <div style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/c44f0bf2b47d12a857f7d8e149234b23fcf563d5?width=799') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 40C0 17.9086 17.9086 0 40 0C62.0914 0 80 17.9086 80 40C80 62.0914 62.0914 80 40 80C17.9086 80 0 62.0914 0 40Z" fill="white" fill-opacity="0.2"/>
                            <path d="M34.9869 24.7924C34.9259 24.4651 34.7389 24.1749 34.4661 23.9841C34.1932 23.7933 33.8564 23.7173 33.5281 23.7724C33.3669 23.7994 33.2126 23.8582 33.0744 23.9455C32.9362 24.0327 32.8167 24.1467 32.723 24.2806C32.6294 24.4146 32.5633 24.5659 32.5288 24.7256C32.4942 24.8854 32.4919 25.0505 32.5219 25.2112C32.5619 25.4312 32.6085 25.6478 32.6619 25.8612C29.1231 26.9512 27.1206 28.6787 26.0619 30.7062C25.0994 32.5487 25.0119 34.4849 25.0019 35.9462L23.1556 38.3187C22.8927 38.6564 22.7019 39.0446 22.5952 39.4592C22.4885 39.8737 22.4681 40.3057 22.5353 40.7285C22.6024 41.1512 22.7557 41.5557 22.9856 41.9167C23.2156 42.2778 23.5172 42.5877 23.8719 42.8274L41.1756 54.5274C42.8297 55.6465 44.781 56.2447 46.7781 56.2449H51.8831C52.6211 56.2449 53.3519 56.0995 54.0338 55.8171C54.7156 55.5347 55.3352 55.1207 55.857 54.5988C56.3789 54.077 56.7929 53.4574 57.0753 52.7756C57.3577 52.0937 57.5031 51.3629 57.5031 50.6249C57.5031 47.4612 54.8831 45.2574 52.4819 44.2412C51.6244 43.8774 50.9131 43.3812 50.4669 42.7249L45.1181 33.5974L45.2281 33.5799C45.3894 33.5531 45.5438 33.4944 45.6822 33.4072C45.8206 33.32 45.9402 33.2061 46.034 33.0721C46.1278 32.9381 46.1939 32.7868 46.2286 32.6269C46.2632 32.4671 46.2656 32.3019 46.2356 32.1412C46.1749 31.8139 45.9882 31.5235 45.7157 31.3325C45.4431 31.1415 45.1064 31.0652 44.7781 31.1199C40.0869 31.9162 35.7794 29.1099 34.9869 24.7924Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Jogging Track</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Scenic path through gardens</p>
                </div>
            </div>

            {{-- Card: EV Charger (centered in last row) --}}
            <div class="md:col-start-1 md:col-span-1 md:mx-auto md:w-full" style="border-radius: 16px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden;">
                <div style="height: 160px; background: url('https://api.builder.io/api/v1/image/assets/TEMP/c866412024f9786784f9c734d0306e4b043b6527?width=801') lightgray 50% / cover no-repeat; display: flex; justify-content: center; align-items: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(255,255,255,0.20); display: flex; justify-content: center; align-items: center;">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.00023 21C5.71638 21.001 5.43808 20.9214 5.19766 20.7705C4.95725 20.6196 4.76458 20.4035 4.64206 20.1475C4.51953 19.8914 4.47217 19.6059 4.50548 19.324C4.53879 19.0421 4.6514 18.7754 4.83023 18.555L19.6802 3.255C19.7916 3.12642 19.9434 3.03953 20.1107 3.0086C20.278 2.97766 20.4508 3.00452 20.6008 3.08476C20.7508 3.16499 20.8691 3.29385 20.9362 3.45016C21.0034 3.60648 21.0153 3.78097 20.9702 3.945L18.0902 12.975C18.0053 13.2023 17.9768 13.4468 18.0071 13.6875C18.0374 13.9282 18.1257 14.158 18.2644 14.3571C18.403 14.5563 18.5879 14.7188 18.8031 14.8307C19.0184 14.9427 19.2576 15.0008 19.5002 15H30.0002C30.2841 14.999 30.5624 15.0786 30.8028 15.2295C31.0432 15.3804 31.2359 15.5965 31.3584 15.8525C31.4809 16.1086 31.5283 16.3941 31.495 16.676C31.4617 16.9579 31.3491 17.2246 31.1702 17.445L16.3202 32.745C16.2088 32.8736 16.057 32.9605 15.8898 32.9914C15.7225 33.0223 15.5496 32.9955 15.3996 32.9152C15.2496 32.835 15.1314 32.7062 15.0642 32.5498C14.9971 32.3935 14.9851 32.219 15.0302 32.055L17.9102 23.025C17.9952 22.7977 18.0237 22.5532 17.9933 22.3125C17.963 22.0718 17.8747 21.842 17.7361 21.6429C17.5975 21.4437 17.4126 21.2812 17.1973 21.1693C16.9821 21.0573 16.7429 20.9992 16.5002 21H6.00023Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div style="padding: 24px 24px 24px 24px; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                    <h3 style="color: #00377D; font-size: 20px; font-weight: 700; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">EV Charger</h3>
                    <p style="color: #4A5565; font-size: 14px; font-weight: 400; line-height: 20px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif;">Electric vehicle charging</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- CTA Section --}}
<section style="background: linear-gradient(131deg, #00377D 0%, #009ED1 100%); padding: 80px 0;">
    <div class="max-w-5xl mx-auto px-8 text-center">
        <h2 style="color: #FFF; font-size: 48px; font-weight: 700; line-height: 56px; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 16px;">
            Ready to Experience<br>GolfHill Terraces?
        </h2>
        <p style="color: rgba(255,255,255,0.80); font-size: 20px; font-weight: 400; line-height: 28px; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 40px;">
            Discover your perfect home in the heart of Jakarta
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('units.index') }}"
               style="display: inline-block; padding: 16px 40px; background: #FFF; color: #00377D; font-size: 16px; font-weight: 700; border-radius: 12px; text-decoration: none; transition: opacity 0.2s;"
               onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Explore Units
            </a>
            <a href="https://wa.me/6281803730325"
               style="display: inline-block; padding: 16px 40px; background: #22AE6C; color: #FFF; font-size: 16px; font-weight: 700; border-radius: 12px; text-decoration: none; transition: opacity 0.2s;"
               onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Contact Us
            </a>
        </div>
    </div>
</section>

@endsection
