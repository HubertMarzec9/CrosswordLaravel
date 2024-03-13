<!DOCTYPE html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crossword Puzzle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                               aria-current="page">Dashboard</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                   aria-current="page">Dashboard</a>
                <a href="#"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
                <a href="#"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                <a href="#"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
                <a href="#"
                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Reports</a>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="#"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <a href="#"
                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                        out</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div class="container mx-auto py-8">
                <div id='startButtonDiv'
                     class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col items-center justify-center"
                     style="width: 100%; height: 600px;">
                    <button type="button" id="startButton"
                            class="mt-4 px-3 py-2 bg-blue-500 text-white rounded-md font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                        Start
                    </button>
                </div>

                <div id="content" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"></div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" id="resetButton" class="text-sm font-semibold leading-6 text-gray-900">Reset
                    </button>
                    <button type="submit" id="checkButton"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Check
                    </button>
                </div>
            </div>


        </div>
    </main>
</div>
</body>
</html>

<script>
    function convert_to_json(word_list) {
        var json_data = [];
        for (let i in word_list) {
            if (word_list[i].length > 0) {
                json_data[i] = {"answer": word_list[i].toLowerCase()};
            }
        }

        return json_data;
    }

    function distance(x1, y1, x2, y2) {
        return Math.abs(x1 - x2) + Math.abs(y1 - y2);
    }

    function weightedAverage(weights, values) {
        var temp = 0;
        for (let k = 0; k < weights.length; k++) {
            temp += weights[k] * values[k];
        }

        if (temp < 0 || temp > 1) {
            console.log("Error: " + values);
        }

        return temp;
    }

    function computeScore1(connections, word) {
        return (connections / (word.length / 2));
    }

    function computeScore2(rows, cols, i, j) {
        return 1 - (distance(rows / 2, cols / 2, i, j) / ((rows / 2) + (cols / 2)));
    }

    function computeScore3(a, b, verticalCount, totalCount) {
        if (verticalCount > totalCount / 2) {
            return a;
        } else if (verticalCount < totalCount / 2) {
            return b;
        } else {
            return 0.5;
        }
    }

    function computeScore4(val, word) {
        return word.length / val;
    }

    function addWord(best, words, table) {
        var bestScore = best[0];
        var word = best[1];
        var index = best[2];
        var bestI = best[3];
        var bestJ = best[4];
        var bestO = best[5];

        words[index].startx = bestJ + 1;
        words[index].starty = bestI + 1;

        if (bestO == 0) {
            for (let k = 0; k < word.length; k++) {
                table[bestI][bestJ + k] = word.charAt(k);
            }
            words[index].orientation = "across";
        } else {
            for (let k = 0; k < word.length; k++) {
                table[bestI + k][bestJ] = word.charAt(k);
            }
            words[index].orientation = "down";
        }
    }

    function assignPositions(words) {
        var positions = {};
        for (let index in words) {
            var word = words[index];
            if (word.orientation != "none") {
                var tempStr = word.starty + "," + word.startx;
                if (tempStr in positions) {
                    word.position = positions[tempStr];
                } else {
                    positions[tempStr] = Object.keys(positions).length + 1;
                    word.position = positions[tempStr];
                }
            }
        }
    }

    function computeDimension(words, factor) {
        var temp = 0;
        for (let i = 0; i < words.length; i++) {
            if (temp < words[i].answer.length) {
                temp = words[i].answer.length;
            }
        }

        return temp * factor;
    }

    function initTable(rows, cols) {
        var table = [];
        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols; j++) {
                if (j == 0) {
                    table[i] = ["-"];
                } else {
                    table[i][j] = "-";
                }
            }
        }

        return table;
    }

    function isConflict(table, isVertical, character, i, j) {
        if (character != table[i][j] && table[i][j] != "-") {
            return true;
        } else if (table[i][j] == "-" && !isVertical && (i + 1) in table && table[i + 1][j] != "-") {
            return true;
        } else if (table[i][j] == "-" && !isVertical && (i - 1) in table && table[i - 1][j] != "-") {
            return true;
        } else if (table[i][j] == "-" && isVertical && (j + 1) in table[i] && table[i][j + 1] != "-") {
            return true;
        } else if (table[i][j] == "-" && isVertical && (j - 1) in table[i] && table[i][j - 1] != "-") {
            return true
        } else {
            return false;
        }
    }

    function attemptToInsert(rows, cols, table, weights, verticalCount, totalCount, word, index) {
        var bestI = 0;
        var bestJ = 0;
        var bestO = 0;
        var bestScore = -1;

        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols - word.length + 1; j++) {
                var isValid = true;
                var atleastOne = false;
                var connections = 0;
                var prevFlag = false;

                for (let k = 0; k < word.length; k++) {
                    if (isConflict(table, false, word.charAt(k), i, j + k)) {
                        isValid = false;
                        break;
                    } else if (table[i][j + k] == "-") {
                        prevFlag = false;
                        atleastOne = true;
                    } else {
                        if (prevFlag) {
                            isValid = false;
                            break;
                        } else {
                            prevFlag = true;
                            connections += 1;
                        }
                    }
                }

                if ((j - 1) in table[i] && table[i][j - 1] != "-") {
                    isValid = false;
                } else if ((j + word.length) in table[i] && table[i][j + word.length] != "-") {
                    isValid = false;
                }

                if (isValid && atleastOne && word.length > 1) {
                    var tempScore1 = computeScore1(connections, word);
                    var tempScore2 = computeScore2(rows, cols, i, j + (word.length / 2), word);
                    var tempScore3 = computeScore3(1, 0, verticalCount, totalCount);
                    var tempScore4 = computeScore4(rows, word);
                    var tempScore = weightedAverage(weights, [tempScore1, tempScore2, tempScore3, tempScore4]);

                    if (tempScore > bestScore) {
                        bestScore = tempScore;
                        bestI = i;
                        bestJ = j;
                        bestO = 0;
                    }
                }
            }
        }

        for (let i = 0; i < rows - word.length + 1; i++) {
            for (let j = 0; j < cols; j++) {
                var isValid = true;
                var atleastOne = false;
                var connections = 0;
                var prevFlag = false;

                for (let k = 0; k < word.length; k++) {
                    if (isConflict(table, true, word.charAt(k), i + k, j)) {
                        isValid = false;
                        break;
                    } else if (table[i + k][j] == "-") {
                        prevFlag = false;
                        atleastOne = true;
                    } else {
                        if (prevFlag) {
                            isValid = false;
                            break;
                        } else {
                            prevFlag = true;
                            connections += 1;
                        }
                    }
                }

                if ((i - 1) in table && table[i - 1][j] != "-") {
                    isValid = false;
                } else if ((i + word.length) in table && table[i + word.length][j] != "-") {
                    isValid = false;
                }

                if (isValid && atleastOne && word.length > 1) {
                    var tempScore1 = computeScore1(connections, word);
                    var tempScore2 = computeScore2(rows, cols, i + (word.length / 2), j, word);
                    var tempScore3 = computeScore3(0, 1, verticalCount, totalCount);
                    var tempScore4 = computeScore4(rows, word);
                    var tempScore = weightedAverage(weights, [tempScore1, tempScore2, tempScore3, tempScore4]);

                    if (tempScore > bestScore) {
                        bestScore = tempScore;
                        bestI = i;
                        bestJ = j;
                        bestO = 1;
                    }
                }
            }
        }

        if (bestScore > -1) {
            return [bestScore, word, index, bestI, bestJ, bestO];
        } else {
            return [-1];
        }
    }

    function generateTable(table, rows, cols, words, weights) {
        var verticalCount = 0;
        var totalCount = 0;

        for (let outerIndex in words) {
            var best = [-1];
            for (let innerIndex in words) {
                if ("answer" in words[innerIndex] && !("startx" in words[innerIndex])) {
                    var temp = attemptToInsert(rows, cols, table, weights, verticalCount, totalCount, words[innerIndex].answer, innerIndex);
                    if (temp[0] > best[0]) {
                        best = temp;
                    }
                }
            }

            if (best[0] == -1) {
                break;
            } else {
                addWord(best, words, table);
                if (best[5] == 1) {
                    verticalCount += 1;
                }
                totalCount += 1;
            }
        }

        for (let index in words) {
            if (!("startx" in words[index])) {
                words[index].orientation = "none";
            }
        }

        return {"table": table, "result": words};
    }

    function removeIsolatedWords(data) {
        var oldTable = data.table;
        var words = data.result;
        var rows = oldTable.length;
        var cols = oldTable[0].length;
        var newTable = initTable(rows, cols);

        for (let wordIndex in words) {
            var word = words[wordIndex];
            if (word.orientation == "across") {
                var i = word.starty - 1;
                var j = word.startx - 1;
                for (let k = 0; k < word.answer.length; k++) {
                    if (newTable[i][j + k] == "-") {
                        newTable[i][j + k] = "O";
                    } else if (newTable[i][j + k] == "O") {
                        newTable[i][j + k] = "X";
                    }
                }
            } else if (word.orientation == "down") {
                var i = word.starty - 1;
                var j = word.startx - 1;
                for (let k = 0; k < word.answer.length; k++) {
                    if (newTable[i + k][j] == "-") {
                        newTable[i + k][j] = "O";
                    } else if (newTable[i + k][j] == "O") {
                        newTable[i + k][j] = "X";
                    }
                }
            }
        }

        for (let wordIndex in words) {
            var word = words[wordIndex];
            var isIsolated = true;
            if (word.orientation == "across") {
                var i = word.starty - 1;
                var j = word.startx - 1;
                for (let k = 0; k < word.answer.length; k++) {
                    if (newTable[i][j + k] == "X") {
                        isIsolated = false;
                        break;
                    }
                }
            } else if (word.orientation == "down") {
                var i = word.starty - 1;
                var j = word.startx - 1;
                for (let k = 0; k < word.answer.length; k++) {
                    if (newTable[i + k][j] == "X") {
                        isIsolated = false;
                        break;
                    }
                }
            }
            if (word.orientation != "none" && isIsolated) {
                delete words[wordIndex].startx;
                delete words[wordIndex].starty;
                delete words[wordIndex].position;
                words[wordIndex].orientation = "none";
            }
        }

        newTable = initTable(rows, cols);
        for (let wordIndex in words) {
            var word = words[wordIndex];
            if (word.orientation == "across") {
                var i = word.starty - 1;
                var j = word.startx - 1;
                for (let k = 0; k < word.answer.length; k++) {
                    newTable[i][j + k] = word.answer.charAt(k);
                }
            } else if (word.orientation == "down") {
                var i = word.starty - 1;
                var j = word.startx - 1;
                for (let k = 0; k < word.answer.length; k++) {
                    newTable[i + k][j] = word.answer.charAt(k);
                }
            }
        }

        return {"table": newTable, "result": words};
    }

    function trimTable(data) {
        var table = data.table;
        var rows = table.length;
        var cols = table[0].length;

        var leftMost = cols;
        var topMost = rows;
        var rightMost = -1;
        var bottomMost = -1;

        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols; j++) {
                if (table[i][j] != "-") {
                    var x = j;
                    var y = i;

                    if (x < leftMost) {
                        leftMost = x;
                    }
                    if (x > rightMost) {
                        rightMost = x;
                    }
                    if (y < topMost) {
                        topMost = y;
                    }
                    if (y > bottomMost) {
                        bottomMost = y;
                    }
                }
            }
        }

        var trimmedTable = initTable(bottomMost - topMost + 1, rightMost - leftMost + 1);
        for (let i = topMost; i < bottomMost + 1; i++) {
            for (let j = leftMost; j < rightMost + 1; j++) {
                trimmedTable[i - topMost][j - leftMost] = table[i][j];
            }
        }

        var words = data.result;
        for (let entry in words) {
            if ("startx" in words[entry]) {
                words[entry].startx -= leftMost;
                words[entry].starty -= topMost;
            }
        }

        return {
            "table": trimmedTable,
            "result": words,
            "rows": Math.max(bottomMost - topMost + 1, 0),
            "cols": Math.max(rightMost - leftMost + 1, 0)
        };
    }

    function createCrossWord(words) {
        var rows = computeDimension(words, 3);
        var cols = rows;
        var blankTable = initTable(rows, cols);
        var table = generateTable(blankTable, rows, cols, words, [0.7, 0.15, 0.1, 0.05]);
        var newTable = removeIsolatedWords(table);
        var finalTable = trimTable(newTable);
        return finalTable;
    }

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function createHTMLTable(data) {
        const tableData = data.table;
        const tableResult = data.result;
        const tableContainer = document.createElement('div');
        tableContainer.className = 'mx-auto';

        addRowWithBorderCells(tableContainer, data.cols + 2, 0);

        for (let i = 0; i < data.rows; i++) {
            const row = document.createElement('div');
            row.className = 'flex justify-center';

            addCellWithBorder(row, '', 0, i + 1);

            for (let j = 0; j < data.cols; j++) {
                const cell = document.createElement('div');
                cell.className = 'border border-solid border-black text-xl text-center';
                cell.style.width = '100px';
                cell.style.height = '100px';
                //cell.textContent = tableData[i][j] === '-' ? '' : tableData[i][j];
                cell.style.backgroundColor = tableData[i][j] === '-' ? 'black' : '';
                cell.setAttribute('x', j + 1);
                cell.setAttribute('y', i + 1);

                if (tableData[i][j] !== '-') {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.className = 'text-xl text-center';
                    input.style.width = '100%';
                    input.style.height = '100%';
                    input.style.fontSize = '36px';
                    input.maxLength = 1;
                    input.setAttribute('letter', tableData[i][j]);
                    input.value = tableData[i][j];
                    cell.appendChild(input);
                }
                row.appendChild(cell);
            }

            addCellWithBorder(row, '', data.cols + 1, i + 1);

            tableContainer.appendChild(row);
        }

        addRowWithBorderCells(tableContainer, data.cols + 2, data.rows + 1);

        for (let i = 0; i < tableResult.length; i++) {
            let cellArrow = findCellByCoordinates(tableContainer, tableResult[i].startx, tableResult[i].starty);
            if (tableResult[i].orientation === 'down') {
                let cellText = findCellByCoordinates(tableContainer, tableResult[i].startx, tableResult[i].starty - 1);
                cellText.style.backgroundColor = 'yellow';

                /*
                                const div = document.createElement('div');
                                div.style.clipPath = "polygon(46% 78%, 36% 100%, 59% 100%)";
                                div.style.backgroundColor = 'black';
                                cellArrow.append(div);

                 */
            } else {
                let cellText = findCellByCoordinates(tableContainer, tableResult[i].startx - 1, tableResult[i].starty);
                cellText.style.backgroundColor = 'yellow';

                /*
                const div = document.createElement('div');
                div.style.height = '30px';
                div.style.clipPath = "polygon(50% 20%, 63% 100%, 37% 100%)";
                div.style.backgroundColor = 'black';
                cellArrow.append(div);
                */
            }
        }

        return tableContainer;
    }

    function findCellByCoordinates(tableContainer, x, y) {
        return tableContainer.querySelector(`div[x="${x}"][y="${y}"]`);
    }

    function addRowWithBorderCells(container, numCells, y) {
        const row = document.createElement('div');
        row.className = 'flex justify-center';
        for (let j = 0; j < numCells; j++) {
            addCellWithBorder(row, '', j, y);
        }
        container.appendChild(row);
    }

    function addCellWithBorder(row, content, x, y) {
        const cell = document.createElement('div');
        cell.className = 'border border-solid border-black px-8 py-4 text-xl text-center';
        cell.style.width = '100px';
        cell.style.height = '100px';
        cell.style.backgroundColor = 'black';
        cell.textContent = content;
        cell.setAttribute('x', x);
        cell.setAttribute('y', y);
        row.appendChild(cell);
    }

    function generateCrossword() {
        return fetch('/api/crossword-data')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                let words = data.map(item => item.word);
                console.log(words);
                words = shuffleArray(words);
                const crossWord = createCrossWord(convert_to_json(words));

                console.log(crossWord.table);
                console.log(crossWord.result);

                return crossWord;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                return null;
            });
    }

    function displayCrossword() {
        generateCrossword()
            .then(crossWord => {
                if (!crossWord) return;

                const tableData = crossWord.table;
                const tableResult = crossWord.result;

                const container = document.getElementById('content');
                container.appendChild(createHTMLTable(crossWord));
            });
    }

    function saveTime(nick, time) {
        let data = {
            nick: nick,
            time: Math.ceil(time),
        }
        console.log(data);
        console.log(JSON.stringify(data));
        fetch('/api/score-save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
            .then(response => {
                if (response.ok) {
                    console.log(response);
                    return response.json();
                }
                throw new Error('Wystąpił błąd podczas wysyłania zapytania.');
            })
            .then(data => {
                console.log('Odpowiedź z serwera:', data);
            })
            .catch(error => {
                console.error('Wystąpił błąd:', error);
            });
    }

    function showNewDiv(timeDiff) {
        // Tworzymy nowy element style
        var style = document.createElement('style');

        // Dodajemy reguły CSS do elementu style
        style.textContent = `
        #newDiv {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 120px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }
    `;

        // Dodajemy element style do nagłówka dokumentu
        document.head.appendChild(style);

        // Tworzymy nowy div
        var newDiv = document.createElement('div');
        newDiv.id = 'newDiv';

        // Dodajemy input
        var input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'Podaj nick';
        input.id = 'input_nick';
        newDiv.appendChild(input);

        // Dodajemy guzik
        var button = document.createElement('button');
        button.textContent = 'Wyslij';
        button.onclick = function () {
            saveTime(document.getElementById('input_nick').value, timeDiff);

            document.body.removeChild(newDiv);
            document.head.removeChild(style);
        };
        newDiv.appendChild(button);

        // Dodajemy nowy div do body
        document.body.appendChild(newDiv);
    }


    ///////////
    var startTime;
    var endTime;

    document.getElementById('checkButton').addEventListener('click', function () {
        var inputs = document.querySelectorAll('input[letter]');
        var allMatch = true;

        inputs.forEach(function (input) {
            if (input.value !== input.getAttribute('letter')) {
                allMatch = false;
            }
        });

        if (allMatch) {
            alert('Poprawne rozwiazanie');
            endTime = performance.now();
            let timeDiff = endTime - startTime;
            let minutes = Math.floor(timeDiff / 60000);
            let seconds = Math.floor((timeDiff % 60000) / 1000);

            console.log(`Czas wykonania: ${minutes} minut ${seconds} sekund`);
            showNewDiv(timeDiff);
        } else {
            alert('Nie poprawne rozwiazanie');
        }
    });

    document.getElementById('resetButton').addEventListener('click', function () {
        var inputs = document.querySelectorAll('input[letter]');

        inputs.forEach(function (input) {
            input.value = '';
        });
        //startTime = new Date();
    });

    document.getElementById('startButton').addEventListener('click', function () {
        displayCrossword();
        startTime = performance.now();
        document.getElementById('startButtonDiv').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    });
</script>

