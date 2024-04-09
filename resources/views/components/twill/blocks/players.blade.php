<div class="grid grid-cols-3 mx-14 my-3 gap-5">
    <div class="p-2 border-black border-2 rounded-md bg-gray-300">
        @foreach ($block->getRelated('players') as $player)
            <div
                class="dragPlayer bg-white border-2 border-black rounded-md absolute w-fit flex flex-col items-center justify-center z-[1] cursor-move">
                <div class="text-[2vh] mt-1 mx-2 whitespace-nowrap">{{ $player->title }}</div>
                <div>
                    <img class="h-[5vh] mb-1" src="{{ $player->image('icon', 'free') }}">
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-2 border-black border-2 rounded-md py-5 bg-gray-300">
        <div class="grid grid-cols-2 justify-items-center">
            <button onclick="newGame()"
                class="bg-sky-200 border-2 border-sky-400 rounded-md font-semibold w-fit px-5 py-2 ml-5 hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">New
                Game</button>
            <button onclick="saveGame()"
                class="bg-sky-200 border-2 border-sky-400 rounded-md font-semibold w-fit px-5 py-2 mr-5 hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">Save
                Game</button>
        </div>
    </div>
    <div class="p-2 border-black border-2 rounded-md py-5 bg-gray-300">
        <div class="grid grid-cols-2 items-center justify-items-center mr-16">
            <button id="rollButton"
                class="bg-sky-200 border-2 border-sky-400 rounded-md font-semibold w-fit px-5 py-2 hover:bg-sky-500 hover:border-sky-300 hover:text-white hover:scale-110 cursor-pointer hover:shadow-xl transition duration-300 ease-in-out">Roll</button>
            <div class="grid grid-cols-5 items-center justify-items-center w-full h-full font-bold text-lg">
                <div id="num1" class="bg-white border-2 border-black rounded-md px-5 pt-1">0</div>
                <div>+</div>
                <div id="num2" class="bg-white border-2 border-black rounded-md px-5 pt-1">0</div>
                <div>=</div>
                <div id="result" class="bg-white border-2 border-black rounded-md px-5 pt-1">0</div>
            </div>
        </div>
    </div>
</div>

<script>
    // Select all elements with the dragPlayer class
    var dragElements = document.querySelectorAll(".dragPlayer");

    // Loop through each dragPlayer element and attach the drag functionality
    dragElements.forEach(function(el) {
        dragElement(el);
    });

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;

        elmnt.onmousedown = dragMouseDown;

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }

    // New game reloads the page
    function newGame() {
        location.reload();
    }

    // Save the game
    function saveGame() {

    }

    // Function to generate a random number between min and max
    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // Function to roll the numbers and update the display
    function rollNumbers() {
        var num1Array = [];
        var num2Array = [];

        // Generate 10 random numbers for num1 and num2
        for (var i = 0; i < 10; i++) {
            num1Array.push(getRandomNumber(1, 6));
            num2Array.push(getRandomNumber(1, 6));
        }

        // Update the display with the first numbers
        document.getElementById('num1').textContent = num1Array[0];
        document.getElementById('num2').textContent = num2Array[0];

        // Loop through the arrays with a 0.1s interval
        var index = 1;
        var interval = setInterval(function() {
            if (index < 10) {
                document.getElementById('num1').textContent = num1Array[index];
                document.getElementById('num2').textContent = num2Array[index];
                document.getElementById('result').textContent = num1Array[index] + num2Array[index];
                index++;
            } else {
                clearInterval(interval); // Stop the interval when reaching the last number
            }
        }, 50);
    }

    // Add event listener to the roll button
    document.getElementById('rollButton').addEventListener('click', rollNumbers);
</script>
