<div class="my-2">
    {{-- TOP ROW --}}
    <div class="flex flex-row justify-center">
        {{-- FREE PARKING --}}
        <div
            class="flex flex-col items-center justify-center w-[10vw] border-2 border-black font-semibold bg-lime-200 text-red hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
            <div class="mt-1">{{ $block->translatedInput('parking_top') }}</div>
            <div>
                <img src="{{ $block->image('parking_icon', 'free') }}">
            </div>
            <div class="mb-1">{{ $block->translatedInput('parking_bottom') }}</div>
        </div>
        @foreach ($block->getRelated('top_cards') as $card)
            <div id="top"
                class="propertyCard bg-white border-2 border-black w-[8vw] text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                {{-- Clicking the card toggles between this --}}
                <div class="mainContent flex flex-col justify-end flex-grow">
                    <div
                        class="flex-grow flex items-center justify-center px-1 border-b-2 border-black @if (in_array($loop->index, [0, 2, 3])) bg-red @elseif(in_array($loop->index, [5, 6, 8])) bg-yellow @endif">
                        {{ $card->title }}
                    </div>
                    <div>
                        @if ($card->cost)
                            <div class="flex flex-grow justify-center">
                                <img class="my-2 h-[8vh]" src="{{ $card->image('cover', 'free') }}">
                            </div>
                            <div class="mb-2">${{ $card->cost }}</div>
                        @else
                            <div class="flex flex-grow justify-center">
                                <img class="mt-6 mb-2 h-[8vh]" src="{{ $card->image('cover', 'free') }}">
                            </div>
                            <div class="h-[2vh]"></div>
                        @endif
                    </div>
                </div>

                {{-- And this --}}
                <div class="additionalDetails text-[1.5vh] my-auto" style="display: none;">
                    @if ($card instanceof \App\Models\Property)
                        <div>Rent: ${{ $card->rent0 }}</div>
                        <div>1 Garage: ${{ $card->rent1 }}</div>
                        <div>2 Garages: ${{ $card->rent2 }}</div>
                        <div>3 Garages: ${{ $card->rent3 }}</div>
                        <div>4 Garages: ${{ $card->rent4 }}</div>
                        <div>Showroom: ${{ $card->rentHotel }}</div>
                        <div>Build garage: ${{ $card->costHouse }}</div>
                        <div>Build showroom: ${{ $card->costHotel }}</div>
                    @else
                        @if ($card->own1)
                            <div>1 owned: ${{ $card->own1 }}</div>
                        @endif
                        @if ($card->own2)
                            <div>2 owned: ${{ $card->own2 }}</div>
                        @endif
                        @if ($card->own3)
                            <div>3 owned: ${{ $card->own3 }}</div>
                        @endif
                        @if ($card->own4)
                            <div>4 owned: ${{ $card->own4 }}</div>
                        @endif
                    @endif
                    @if ($card->mortgage)
                        {{-- This must be a company card --}}
                        <div>Mortgage: ${{ $card->mortgage }}</div>
                    @else
                        @if ($card->cost)
                            {{-- This must be a tax card --}}
                            <div class="mx-1">Pay your {{ $card->title }}!</div>
                        @else
                            {{-- This must be a chance / community card --}}
                            <div class="mx-1">Draw a {{ $card->title }} card!</div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
        {{-- GO TO JAIL --}}
        <div
            class="flex flex-col items-center justify-center w-[10vw] border-2 border-black font-semibold bg-lime-200 text-red hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
            <div class="mt-1">{{ $block->translatedInput('jail_top') }}</div>
            <div>
                <img src="{{ $block->image('jail_icon', 'free') }}">
            </div>
            <div class="mb-1">{{ $block->translatedInput('jail_bottom') }}</div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-[65vw]">
        {{-- LEFT ROW --}}
        <div class="flex flex-col items-center">
            @foreach ($block->getRelated('left_cards') as $card)
                <div id="left"
                    class="propertyCard bg-white border-2 border-black w-[10vw] h-[16vh] text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                    {{-- Clicking the card toggles between this --}}
                    <div class="mainContent flex flex-col justify-end">
                        <div
                            class="flex items-center justify-center px-1 border-b-2 border-black @if (in_array($loop->index, [0, 1, 3])) bg-orange @elseif(in_array($loop->index, [5, 6, 8])) bg-pink @endif">
                            {{ $card->title }} @if ($card->cost)
                                — ${{ $card->cost }}
                            @endif
                        </div>
                        <div class="flex flex-grow justify-center">
                            <img class="mt-2 h-[7.5vh]" src="{{ $card->image('cover', 'free') }}">
                        </div>
                    </div>

                    {{-- And this --}}
                    <div class="additionalDetails text-[1.5vh] my-auto leading-tight" style="display: none;">
                        @if ($card instanceof \App\Models\Property)
                            <div>Rent: ${{ $card->rent0 }}</div>
                            <div>1 Garage: ${{ $card->rent1 }}</div>
                            <div>2 Garages: ${{ $card->rent2 }}</div>
                            <div>3 Garages: ${{ $card->rent3 }}</div>
                            <div>4 Garages: ${{ $card->rent4 }}</div>
                            <div>Showroom: ${{ $card->rentHotel }}</div>
                            <div>Build garage: ${{ $card->costHouse }}</div>
                            <div>Build showroom: ${{ $card->costHotel }}</div>
                        @else
                            @if ($card->own1)
                                <div>1 owned: ${{ $card->own1 }}</div>
                            @endif
                            @if ($card->own2)
                                <div>2 owned: ${{ $card->own2 }}</div>
                            @endif
                            @if ($card->own3)
                                <div>3 owned: ${{ $card->own3 }}</div>
                            @endif
                            @if ($card->own4)
                                <div>4 owned: ${{ $card->own4 }}</div>
                            @endif
                        @endif
                        @if ($card->mortgage)
                            {{-- This must be a company card --}}
                            <div>Mortgage: ${{ $card->mortgage }}</div>
                        @else
                            @if ($card->cost)
                                {{-- This must be a tax card --}}
                                <div class="mx-1">Pay your {{ $card->title }}!</div>
                            @else
                                {{-- This must be a chance / community card --}}
                                <div class="mx-1">Draw a {{ $card->title }} card!</div>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- RIGHT ROW --}}
        <div class="flex flex-col items-center">
            @foreach ($block->getRelated('right_cards') as $card)
                <div id="right"
                    class="propertyCard bg-white border-2 border-black w-[10vw] h-[16vh] text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                    {{-- Clicking the card toggles between this --}}
                    <div class="mainContent flex flex-col justify-end">
                        <div
                            class="flex items-center justify-center px-1 border-b-2 border-black @if (in_array($loop->index, [0, 1, 3])) bg-green @elseif(in_array($loop->index, [6, 8])) bg-darkblue @endif">
                            {{ $card->title }} @if ($card->cost)
                                — ${{ $card->cost }}
                            @endif
                        </div>
                        <div class="flex flex-grow justify-center">
                            <img class="mt-2 h-[7.5vh]" src="{{ $card->image('cover', 'free') }}">
                        </div>
                    </div>

                    {{-- And this --}}
                    <div class="additionalDetails text-[1.5vh] my-auto leading-tight" style="display: none;">
                        @if ($card instanceof \App\Models\Property)
                            <div>Rent: ${{ $card->rent0 }}</div>
                            <div>1 Garage: ${{ $card->rent1 }}</div>
                            <div>2 Garages: ${{ $card->rent2 }}</div>
                            <div>3 Garages: ${{ $card->rent3 }}</div>
                            <div>4 Garages: ${{ $card->rent4 }}</div>
                            <div>Showroom: ${{ $card->rentHotel }}</div>
                            <div>Build garage: ${{ $card->costHouse }}</div>
                            <div>Build showroom: ${{ $card->costHotel }}</div>
                        @else
                            @if ($card->own1)
                                <div>1 owned: ${{ $card->own1 }}</div>
                            @endif
                            @if ($card->own2)
                                <div>2 owned: ${{ $card->own2 }}</div>
                            @endif
                            @if ($card->own3)
                                <div>3 owned: ${{ $card->own3 }}</div>
                            @endif
                            @if ($card->own4)
                                <div>4 owned: ${{ $card->own4 }}</div>
                            @endif
                        @endif
                        @if ($card->mortgage)
                            {{-- This must be a company card --}}
                            <div>Mortgage: ${{ $card->mortgage }}</div>
                        @else
                            @if ($card->cost)
                                {{-- This must be a tax card --}}
                                <div class="mx-1">Pay your {{ $card->title }}!</div>
                            @else
                                {{-- This must be a chance / community card --}}
                                <div class="mx-1">Draw a {{ $card->title }} card!</div>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- BOTTOM ROW --}}
    <div class="flex flex-row justify-center">
        {{-- IN JAIL --}}
        <div
            class="flex flex-col items-center justify-center w-[10vw] border-2 border-black font-semibold bg-lime-200 text-black hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
            <div class="flex flex-col items-center justify-center mx-1 bg-red border-2 border-black">
                <div>{{ $block->translatedInput('in_jail_top') }}
                    {{ $block->translatedInput('in_jail_bottom') }}</div>
                <div>
                    <img src="{{ $block->image('in_jail_icon', 'free') }}">
                </div>
            </div>

            <div class="my-1">{{ $block->translatedInput('visiting') }}</div>
        </div>
        @foreach ($block->getRelated('bottom_cards') as $card)
            <div id="bottom"
                class="propertyCard bg-white border-2 border-black w-[8vw] text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                {{-- Clicking the card toggles between this --}}
                <div class="mainContent flex flex-col justify-end flex-grow">
                    <div
                        class="flex-grow flex items-center justify-center px-1 border-b-2 border-black @if (in_array($loop->index, [8, 6])) bg-brown @elseif(in_array($loop->index, [0, 1, 3])) bg-lightblue @endif">
                        {{ $card->title }}
                    </div>
                    <div>
                        @if ($card->cost)
                            <div class="flex flex-grow justify-center">
                                <img class="my-2 h-[8vh]" src="{{ $card->image('cover', 'free') }}">
                            </div>
                            <div class="mb-2">${{ $card->cost }}</div>
                        @else
                            <div class="flex flex-grow justify-center">
                                <img class="mt-6 mb-2 h-[8vh]" src="{{ $card->image('cover', 'free') }}">
                            </div>
                            <div class="h-[2vh]"></div>
                        @endif
                    </div>
                </div>

                {{-- And this --}}
                <div class="additionalDetails text-[1.5vh] my-auto" style="display: none;">
                    @if ($card instanceof \App\Models\Property)
                        <div>Rent: ${{ $card->rent0 }}</div>
                        <div>1 Garage: ${{ $card->rent1 }}</div>
                        <div>2 Garages: ${{ $card->rent2 }}</div>
                        <div>3 Garages: ${{ $card->rent3 }}</div>
                        <div>4 Garages: ${{ $card->rent4 }}</div>
                        <div>Showroom: ${{ $card->rentHotel }}</div>
                        <div>Build garage: ${{ $card->costHouse }}</div>
                        <div>Build showroom: ${{ $card->costHotel }}</div>
                    @else
                        @if ($card->own1)
                            <div>1 owned: ${{ $card->own1 }}</div>
                        @endif
                        @if ($card->own2)
                            <div>2 owned: ${{ $card->own2 }}</div>
                        @endif
                        @if ($card->own3)
                            <div>3 owned: ${{ $card->own3 }}</div>
                        @endif
                        @if ($card->own4)
                            <div>4 owned: ${{ $card->own4 }}</div>
                        @endif
                    @endif
                    @if ($card->mortgage)
                        {{-- This must be a company card --}}
                        <div>Mortgage: ${{ $card->mortgage }}</div>
                    @else
                        @if ($card->cost)
                            {{-- This must be a tax card --}}
                            <div class="mx-1">Pay your {{ $card->title }}!</div>
                        @else
                            {{-- This must be a chance / community card --}}
                            <div class="mx-1">Draw a {{ $card->title }} card!</div>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
        {{-- GO --}}
        <div
            class="flex flex-col items-center justify-center w-[10vw] border-2 border-black font-semibold bg-lime-200 text-red hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
            <div class="mt-1">{{ $block->translatedInput('go_bottom') }}</div>
            <div>
                <img src="{{ $block->image('go_icon', 'free') }}">
            </div>
            <div class="flex flex-row mb-1">
                <span>
                    {{-- https://www.flaticon.com/search?type=icon&word=arrow --}}
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </span>
                <span>
                    {{ $block->translatedInput('go_top') }}
                </span>
            </div>
        </div>
    </div>
</div>

<script>
    const cards = document.querySelectorAll('.propertyCard');

    cards.forEach(card => {
        const mainContent = card.querySelector('.mainContent');
        const additionalDetails = card.querySelector('.additionalDetails');
        const originalHeight = mainContent.clientHeight; // Get the original height of the main content
        let timer; // Variable to store the timer

        card.addEventListener('click', function() {
            clearTimeout(timer); // Clear the timer on manual click
            if (additionalDetails.style.display === 'none') {
                additionalDetails.style.display = 'block';
                mainContent.style.display = 'none';
                mainContent.style.height = additionalDetails.clientHeight +
                    'px'; // Set height to match additional details
            } else {
                additionalDetails.style.display = 'none';
                mainContent.style.display = 'flex'; // Reset display to flex
                mainContent.style.height = originalHeight + 'px'; // Reset height to original height
            }
            // Set the timer to transition back to main content after 5 seconds
            timer = setTimeout(() => {
                additionalDetails.style.display = 'none';
                mainContent.style.display = 'flex';
                mainContent.style.height = originalHeight + 'px';
            }, 5000);
        });
    });
</script>
