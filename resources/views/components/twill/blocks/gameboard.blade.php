{{-- TOP & BOTTOM CARDS: w-[8vw] h-[20vh], Counter: w-[8vw] h-[6vh] --}}
{{-- LEFT & RIGHT CARDS: w-[10vw] h-[20vh], Conuter: w-[3vw] h-[20vh], Margin: [0.5vw] --}}
{{-- CORNER CARDS: w-[10vw] h-[20vh] --}}
{{-- Title: h-[6vh], Images: h-[8vh] --}}

{{-- TODO: Add owner to property --}}

<div class="my-2">
    {{-- TOP ROW --}}
    <div class="flex flex-row justify-center">
        {{-- FREE PARKING --}}
        <div class="w-[3vw]"></div>
        <div>
            <div class="h-[6vh]"></div>
            <div
                class="flex flex-col items-center justify-center select-none w-[10vw] h-[20vh] border-2 border-black font-semibold bg-lime-200 text-red hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                <div class="mt-1">{{ $block->translatedInput('parking_top') }}</div>
                <div>
                    <img src="{{ $block->image('parking_icon', 'free') }}">
                </div>
                <div class="mb-1">{{ $block->translatedInput('parking_bottom') }}</div>
            </div>
        </div>
        @foreach ($block->getRelated('top_cards') as $card)
            <div class="wrapper">
                @if ($card instanceof \App\Models\Property)
                    <div class="counter w-[8vw] h-[6vh] select-none grid grid-cols-3">
                        <div
                            class="decrement m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                            -</div>
                        <div class="houseNum flex flex-row items-center justify-center"></div>
                        <div
                            class="increment m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                            +</div>
                    </div>
                @else
                    <div class="h-[6vh]"></div>
                @endif
                <div
                    class="propertyCard select-none bg-white border-2 border-black w-[8vw] h-[20vh] text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                    @if ($card instanceof \App\Models\Property)
                        <div class="rentData hidden">
                            <div class="rent0">{{ $card->rent0 }}</div>
                            <div class="rent1">{{ $card->rent1 }}</div>
                            <div class="rent2">{{ $card->rent2 }}</div>
                            <div class="rent3">{{ $card->rent3 }}</div>
                            <div class="rent4">{{ $card->rent4 }}</div>
                            <div class="rentHotel"> {{ $card->rentHotel }}</div>
                        </div>
                    @endif
                    {{-- Clicking the card toggles between this --}}
                    <div class="mainContent flex flex-col justify-end flex-grow">
                        <div
                            class="flex-grow flex items-center justify-center px-1 h-[6vh] border-b-2 border-black @if (in_array($loop->index, [0, 2, 3])) bg-red @elseif(in_array($loop->index, [5, 6, 8])) bg-yellow @endif">
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
                    <div class="additionalDetails text-[2vh] my-auto" style="display: none;">
                        @if ($card instanceof \App\Models\Property)
                            <div class="rent"></div>

                            <div class="bg-black h-[0.1vh] my-[1vh]"></div>

                            <div class="grid grid-rows-2">
                                <div class="flex flex-row items-center justify-center">
                                    <div>+1</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="2vw"
                                        height="2vh" viewBox="0 0 50 50">
                                        <path
                                            d="M 24.962891 1.0546875 A 1.0001 1.0001 0 0 0 24.384766 1.2636719 L 1.3847656 19.210938 A 1.0005659 1.0005659 0 0 0 2.6152344 20.789062 L 4 19.708984 L 4 46 A 1.0001 1.0001 0 0 0 5 47 L 18.832031 47 A 1.0001 1.0001 0 0 0 19.158203 47 L 30.832031 47 A 1.0001 1.0001 0 0 0 31.158203 47 L 45 47 A 1.0001 1.0001 0 0 0 46 46 L 46 19.708984 L 47.384766 20.789062 A 1.0005657 1.0005657 0 1 0 48.615234 19.210938 L 41 13.269531 L 41 6 L 35 6 L 35 8.5859375 L 25.615234 1.2636719 A 1.0001 1.0001 0 0 0 24.962891 1.0546875 z M 25 3.3222656 L 44 18.148438 L 44 45 L 32 45 L 32 26 L 18 26 L 18 45 L 6 45 L 6 18.148438 L 25 3.3222656 z M 37 8 L 39 8 L 39 11.708984 L 37 10.146484 L 37 8 z M 20 28 L 30 28 L 30 45 L 20 45 L 20 28 z">
                                        </path>
                                    </svg>
                                    <div>:${{ $card->costHouse }}</div>
                                </div>

                                <div class="flex flex-row items-center justify-center">
                                    <div>+1</div>
                                    <svg data-slot="icon" fill="none" stroke-width="0.7" stroke="currentColor"
                                        width="2.2vw" height="2.2vh" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819">
                                        </path>
                                    </svg>
                                    <div>:${{ $card->costHotel }}</div>
                                </div>
                            </div>
                            <div class="bg-black h-[0.1vh] my-[1vh]"></div>
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
            </div>
        @endforeach
        {{-- GO TO JAIL --}}
        <div>
            <div class="h-[6vh]"></div>
            <div
                class="flex flex-col items-center justify-center select-none w-[10vw] h-[20vh] border-2 border-black font-semibold bg-lime-200 text-red hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                <div class="mt-1">{{ $block->translatedInput('jail_top') }}</div>
                <div>
                    <img src="{{ $block->image('jail_icon', 'free') }}">
                </div>
                <div class="mb-1">{{ $block->translatedInput('jail_bottom') }}</div>
            </div>
        </div>
        <div class="w-[3vw]"></div>
    </div>

    <div class="grid grid-cols-2 justify-items-stretch">
        {{-- LEFT ROW --}}
        <div class="flex flex-col items-start ml-[0.5vw]">
            @foreach ($block->getRelated('left_cards') as $card)
                <div class="wrapper">
                    <div class="flex flex-row">
                        @if ($card instanceof \App\Models\Property)
                            <div class="counter w-[3vw] h-[20vh] select-none grid grid-rows-3">
                                <div
                                    class="increment m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                                    +</div>
                                <div class="houseNum flex flex-col items-center justify-center"></div>
                                <div
                                    class="decrement m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                                    -</div>
                            </div>
                        @else
                            <div class="w-[3vw]"></div>
                        @endif
                        <div
                            class="propertyCard bg-white border-2 border-black w-[10vw] h-[20vh] select-none text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                            @if ($card instanceof \App\Models\Property)
                                <div class="rentData hidden">
                                    <div class="rent0">{{ $card->rent0 }}</div>
                                    <div class="rent1">{{ $card->rent1 }}</div>
                                    <div class="rent2">{{ $card->rent2 }}</div>
                                    <div class="rent3">{{ $card->rent3 }}</div>
                                    <div class="rent4">{{ $card->rent4 }}</div>
                                    <div class="rentHotel"> {{ $card->rentHotel }}</div>
                                </div>
                            @endif
                            {{-- Clicking the card toggles between this --}}
                            <div class="mainContent flex flex-col justify-end">
                                <div
                                    class="flex items-center justify-center px-1 h-[6vh] border-b-2 border-black @if (in_array($loop->index, [0, 1, 3])) bg-orange @elseif(in_array($loop->index, [5, 6, 8])) bg-pink @endif">
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
                            <div class="additionalDetails text-[2vh] my-auto leading-tight" style="display: none;">
                                @if ($card instanceof \App\Models\Property)
                                    <div class="rent"></div>

                                    <div class="bg-black h-[0.1vh] my-[1vh]"></div>

                                    <div class="grid grid-rows-2">
                                        <div class="flex flex-row items-center justify-center">
                                            <div>+1</div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="2vw"
                                                height="2vh" viewBox="0 0 50 50">
                                                <path
                                                    d="M 24.962891 1.0546875 A 1.0001 1.0001 0 0 0 24.384766 1.2636719 L 1.3847656 19.210938 A 1.0005659 1.0005659 0 0 0 2.6152344 20.789062 L 4 19.708984 L 4 46 A 1.0001 1.0001 0 0 0 5 47 L 18.832031 47 A 1.0001 1.0001 0 0 0 19.158203 47 L 30.832031 47 A 1.0001 1.0001 0 0 0 31.158203 47 L 45 47 A 1.0001 1.0001 0 0 0 46 46 L 46 19.708984 L 47.384766 20.789062 A 1.0005657 1.0005657 0 1 0 48.615234 19.210938 L 41 13.269531 L 41 6 L 35 6 L 35 8.5859375 L 25.615234 1.2636719 A 1.0001 1.0001 0 0 0 24.962891 1.0546875 z M 25 3.3222656 L 44 18.148438 L 44 45 L 32 45 L 32 26 L 18 26 L 18 45 L 6 45 L 6 18.148438 L 25 3.3222656 z M 37 8 L 39 8 L 39 11.708984 L 37 10.146484 L 37 8 z M 20 28 L 30 28 L 30 45 L 20 45 L 20 28 z">
                                                </path>
                                            </svg>
                                            <div>:${{ $card->costHouse }}</div>
                                        </div>

                                        <div class="flex flex-row items-center justify-center">
                                            <div>+1</div>
                                            <svg data-slot="icon" fill="none" stroke-width="0.7"
                                                stroke="currentColor" width="2.2vw" height="2.2vh"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819">
                                                </path>
                                            </svg>
                                            <div>:${{ $card->costHotel }}</div>
                                        </div>
                                    </div>
                                    <div class="bg-black h-[0.1vh] my-[1vh]"></div>
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
                    </div>
                </div>
            @endforeach
        </div>

        {{-- RIGHT ROW --}}
        <div class="flex flex-col items-end mr-[0.5vw]">
            @foreach ($block->getRelated('right_cards') as $card)
                <div class="wrapper">
                    <div class="flex flex-row">
                        <div
                            class="propertyCard bg-white border-2 border-black w-[10vw] h-[20vh] select-none text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                            @if ($card instanceof \App\Models\Property)
                                <div class="rentData hidden">
                                    <div class="rent0">{{ $card->rent0 }}</div>
                                    <div class="rent1">{{ $card->rent1 }}</div>
                                    <div class="rent2">{{ $card->rent2 }}</div>
                                    <div class="rent3">{{ $card->rent3 }}</div>
                                    <div class="rent4">{{ $card->rent4 }}</div>
                                    <div class="rentHotel"> {{ $card->rentHotel }}</div>
                                </div>
                            @endif
                            {{-- Clicking the card toggles between this --}}
                            <div class="mainContent flex flex-col justify-end">
                                <div
                                    class="flex items-center justify-center px-1 h-[6vh] border-b-2 border-black @if (in_array($loop->index, [0, 1, 3])) bg-green @elseif(in_array($loop->index, [6, 8])) bg-darkblue @endif">
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
                            <div class="additionalDetails text-[2vh] my-auto leading-tight" style="display: none;">
                                @if ($card instanceof \App\Models\Property)
                                    <div class="rent"></div>

                                    <div class="bg-black h-[0.1vh] my-[1vh]"></div>

                                    <div class="grid grid-rows-2">
                                        <div class="flex flex-row items-center justify-center">
                                            <div>+1</div>
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="2vw"
                                                height="2vh" viewBox="0 0 50 50">
                                                <path
                                                    d="M 24.962891 1.0546875 A 1.0001 1.0001 0 0 0 24.384766 1.2636719 L 1.3847656 19.210938 A 1.0005659 1.0005659 0 0 0 2.6152344 20.789062 L 4 19.708984 L 4 46 A 1.0001 1.0001 0 0 0 5 47 L 18.832031 47 A 1.0001 1.0001 0 0 0 19.158203 47 L 30.832031 47 A 1.0001 1.0001 0 0 0 31.158203 47 L 45 47 A 1.0001 1.0001 0 0 0 46 46 L 46 19.708984 L 47.384766 20.789062 A 1.0005657 1.0005657 0 1 0 48.615234 19.210938 L 41 13.269531 L 41 6 L 35 6 L 35 8.5859375 L 25.615234 1.2636719 A 1.0001 1.0001 0 0 0 24.962891 1.0546875 z M 25 3.3222656 L 44 18.148438 L 44 45 L 32 45 L 32 26 L 18 26 L 18 45 L 6 45 L 6 18.148438 L 25 3.3222656 z M 37 8 L 39 8 L 39 11.708984 L 37 10.146484 L 37 8 z M 20 28 L 30 28 L 30 45 L 20 45 L 20 28 z">
                                                </path>
                                            </svg>
                                            <div>:${{ $card->costHouse }}</div>
                                        </div>

                                        <div class="flex flex-row items-center justify-center">
                                            <div>+1</div>
                                            <svg data-slot="icon" fill="none" stroke-width="0.7"
                                                stroke="currentColor" width="2.2vw" height="2.2vh"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819">
                                                </path>
                                            </svg>
                                            <div>:${{ $card->costHotel }}</div>
                                        </div>
                                    </div>
                                    <div class="bg-black h-[0.1vh] my-[1vh]"></div>
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
                        @if ($card instanceof \App\Models\Property)
                            <div class="counter w-[3vw] h-[20vh] select-none grid grid-rows-3">
                                <div
                                    class="increment m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                                    +</div>
                                <div class="houseNum flex flex-col items-center justify-center"></div>
                                <div
                                    class="decrement m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                                    -</div>
                            </div>
                        @else
                            <div class="w-[3vw]"></div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- BOTTOM ROW --}}
    <div class="flex flex-row justify-center">
        {{-- IN JAIL --}}
        <div class="w-[3vw]"></div>
        <div>
            <div
                class="flex flex-col items-center justify-center w-[10vw] h-[20vh] select-none border-2 border-black font-semibold bg-lime-200 text-black hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                <div class="flex flex-col items-center justify-center mx-1 bg-red border-2 border-black">
                    <div>{{ $block->translatedInput('in_jail_top') }}
                        {{ $block->translatedInput('in_jail_bottom') }}</div>
                    <div>
                        <img src="{{ $block->image('in_jail_icon', 'free') }}">
                    </div>
                </div>

                <div class="my-1">{{ $block->translatedInput('visiting') }}</div>
            </div>
            <div class="h-[6vh]"></div>
        </div>

        @foreach ($block->getRelated('bottom_cards') as $card)
            <div class="wrapper">
                <div
                    class="propertyCard bg-white border-2 border-black w-[8vw] h-[20vh] select-none text-[2vh] font-semibold text-center flex flex-col hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                    @if ($card instanceof \App\Models\Property)
                        <div class="rentData hidden">
                            <div class="rent0">{{ $card->rent0 }}</div>
                            <div class="rent1">{{ $card->rent1 }}</div>
                            <div class="rent2">{{ $card->rent2 }}</div>
                            <div class="rent3">{{ $card->rent3 }}</div>
                            <div class="rent4">{{ $card->rent4 }}</div>
                            <div class="rentHotel"> {{ $card->rentHotel }}</div>
                        </div>
                    @endif
                    {{-- Clicking the card toggles between this --}}
                    <div class="mainContent flex flex-col justify-end flex-grow">
                        <div
                            class="flex-grow flex items-center justify-center px-1 h-[6vh] border-b-2 border-black @if (in_array($loop->index, [8, 6])) bg-brown @elseif(in_array($loop->index, [0, 1, 3])) bg-lightblue @endif">
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
                    <div class="additionalDetails text-[2vh] my-auto" style="display: none;">
                        @if ($card instanceof \App\Models\Property)
                            <div class="rent"></div>

                            <div class="bg-black h-[0.1vh] my-[1vh]"></div>

                            <div class="grid grid-rows-2">
                                <div class="flex flex-row items-center justify-center">
                                    <div>+1</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="2vw"
                                        height="2vh" viewBox="0 0 50 50">
                                        <path
                                            d="M 24.962891 1.0546875 A 1.0001 1.0001 0 0 0 24.384766 1.2636719 L 1.3847656 19.210938 A 1.0005659 1.0005659 0 0 0 2.6152344 20.789062 L 4 19.708984 L 4 46 A 1.0001 1.0001 0 0 0 5 47 L 18.832031 47 A 1.0001 1.0001 0 0 0 19.158203 47 L 30.832031 47 A 1.0001 1.0001 0 0 0 31.158203 47 L 45 47 A 1.0001 1.0001 0 0 0 46 46 L 46 19.708984 L 47.384766 20.789062 A 1.0005657 1.0005657 0 1 0 48.615234 19.210938 L 41 13.269531 L 41 6 L 35 6 L 35 8.5859375 L 25.615234 1.2636719 A 1.0001 1.0001 0 0 0 24.962891 1.0546875 z M 25 3.3222656 L 44 18.148438 L 44 45 L 32 45 L 32 26 L 18 26 L 18 45 L 6 45 L 6 18.148438 L 25 3.3222656 z M 37 8 L 39 8 L 39 11.708984 L 37 10.146484 L 37 8 z M 20 28 L 30 28 L 30 45 L 20 45 L 20 28 z">
                                        </path>
                                    </svg>
                                    <div>:${{ $card->costHouse }}</div>
                                </div>

                                <div class="flex flex-row items-center justify-center">
                                    <div>+1</div>
                                    <svg data-slot="icon" fill="none" stroke-width="0.7" stroke="currentColor"
                                        width="2.2vw" height="2.2vh" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819">
                                        </path>
                                    </svg>
                                    <div>:${{ $card->costHotel }}</div>
                                </div>
                            </div>
                            <div class="bg-black h-[0.1vh] my-[1vh]"></div>
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
                @if ($card instanceof \App\Models\Property)
                    <div class="counter w-[8vw] h-[6vh] select-none grid grid-cols-3">
                        <div
                            class="decrement m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                            -</div>
                        <div class="houseNum flex flex-row items-center justify-center"></div>
                        <div
                            class="increment m-1 flex items-center justify-center bg-sky-200 border-2 border-sky-400 rounded-md font-semibold hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
                            +</div>
                    </div>
                @else
                    <div class="h-[6vh]"></div>
                @endif
            </div>
        @endforeach

        {{-- GO --}}
        <div>
            <div
                class="flex flex-col items-center justify-center w-[10vw] h-[20vh] select-none border-2 border-black font-semibold bg-lime-200 text-red hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">
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
            <div class="h-[6vh]"></div>
        </div>
        <div class="w-[3vw]"></div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrappers = document.querySelectorAll('.wrapper');
        wrappers.forEach(wrapper => {
            const card = wrapper.querySelector('.propertyCard');
            const mainContent = card.querySelector('.mainContent');
            const additionalDetails = card.querySelector('.additionalDetails');
            let timer;

            // IMPORTANT: put this in front so the script will not return early
            card.addEventListener('click', function() {
                clearTimeout(timer); // Clear the timer on manual click
                if (additionalDetails.style.display === 'none') {
                    additionalDetails.style.display = 'block';
                    mainContent.style.display = 'none';
                } else {
                    additionalDetails.style.display = 'none';
                    mainContent.style.display = 'flex'; // Reset display to flex
                }
                // Set the timer to transition back to main content after 5 seconds
                timer = setTimeout(() => {
                    additionalDetails.style.display = 'none';
                    mainContent.style.display = 'flex';
                }, 5000);
            });

            const counter = wrapper.querySelector('.counter');
            if (counter == null) {
                return;
            }
            let houseCount = 0;
            const houseNum = counter.querySelector('.houseNum');
            const incrementBtn = counter.querySelector('.increment');
            const decrementBtn = counter.querySelector('.decrement');

            const rentData = card.querySelector('.rentData');
            let dataMap = null;



            if (rentData != null) {
                dataMap = {
                    0: parseInt(rentData.querySelector('.rent0').textContent.trim()),
                    1: parseInt(rentData.querySelector('.rent1').textContent.trim()),
                    2: parseInt(rentData.querySelector('.rent2').textContent.trim()),
                    3: parseInt(rentData.querySelector('.rent3').textContent.trim()),
                    4: parseInt(rentData.querySelector('.rent4').textContent.trim()),
                    5: parseInt(rentData.querySelector('.rentHotel').textContent.trim()),
                };
                console.log(dataMap);
                updateCount();
            }

            incrementBtn.addEventListener('click', function() {
                clearTimeout(timer); // Clear the timer on manual click
                if (houseCount < 5) {
                    houseCount++;
                    updateCount();
                }
                // Set the timer to transition back to main content after 5 seconds
                timer = setTimeout(() => {
                    additionalDetails.style.display = 'none';
                    mainContent.style.display = 'flex';
                }, 5000);
            });

            decrementBtn.addEventListener('click', function() {
                clearTimeout(timer); // Clear the timer on manual click
                if (houseCount > 0) {
                    houseCount--;
                    updateCount();
                }
                // Set the timer to transition back to main content after 5 seconds
                timer = setTimeout(() => {
                    additionalDetails.style.display = 'none';
                    mainContent.style.display = 'flex';
                }, 5000);
            });

            function updateCount() {
                let svgCode = ''; // Variable to store the generated SVG code

                if (dataMap != null) {
                    const currentRent = dataMap[houseCount];
                    const rent = additionalDetails.querySelector('.rent');
                    rent.innerHTML = `Rent: $` + currentRent;
                }


                if (houseCount == 5) {
                    svgCode = `<svg data-slot="icon" fill="none" stroke-width="0.7" stroke="currentColor"
                                            width="3vw" height="3vh" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819">
                                            </path>
                                        </svg>`;
                } else {
                    for (let i = 0; i < houseCount; i++) {
                        // Generate SVG code for the house favicon and concatenate it to the svgCode variable
                        svgCode += `
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="2vw" height="2vh" viewBox="0 0 50 50">
                            <path d="M 24.962891 1.0546875 A 1.0001 1.0001 0 0 0 24.384766 1.2636719 L 1.3847656 19.210938 A 1.0005659 1.0005659 0 0 0 2.6152344 20.789062 L 4 19.708984 L 4 46 A 1.0001 1.0001 0 0 0 5 47 L 18.832031 47 A 1.0001 1.0001 0 0 0 19.158203 47 L 30.832031 47 A 1.0001 1.0001 0 0 0 31.158203 47 L 45 47 A 1.0001 1.0001 0 0 0 46 46 L 46 19.708984 L 47.384766 20.789062 A 1.0005657 1.0005657 0 1 0 48.615234 19.210938 L 41 13.269531 L 41 6 L 35 6 L 35 8.5859375 L 25.615234 1.2636719 A 1.0001 1.0001 0 0 0 24.962891 1.0546875 z M 25 3.3222656 L 44 18.148438 L 44 45 L 32 45 L 32 26 L 18 26 L 18 45 L 6 45 L 6 18.148438 L 25 3.3222656 z M 37 8 L 39 8 L 39 11.708984 L 37 10.146484 L 37 8 z M 20 28 L 30 28 L 30 45 L 20 45 L 20 28 z"></path>
                        </svg>
                    `;
                    }
                }

                houseNum.innerHTML = svgCode;
            }
        })
    });
</script>
