import './bootstrap';

let globalResult = [];


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
    return trimTable(newTable);
}

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function createHTMLTable(data) {
    console.log(data);
    const tableData = data.table;
    const tableResult = data.result;
    const tableContainer = document.createElement('div');
    tableContainer.className = 'mx-auto';
    tableContainer.id = 'tableContainer';

    addRowWithBorderCells(tableContainer, data.cols + 2, 0);

    for (let i = 0; i < data.rows; i++) {
        const row = document.createElement('div');
        row.className = 'flex justify-center';

        addCellWithBorder(row, '', 0, i + 1);

        for (let j = 0; j < data.cols; j++) {

            const cell = document.createElement('div');
            cell.className = 'border border-solid border-black text-xl text-center';
            cell.style.position = 'relative';
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
                input.style.fontSize = '18px';
                input.style.backgroundColor = 'white';
                input.maxLength = 1;
                input.setAttribute('letter', tableData[i][j]);
                //input.value = tableData[i][j];
                input.setAttribute('x', j + 1);
                input.setAttribute('y', i + 1);
                cell.appendChild(input);
            }
            row.appendChild(cell);
        }

        addCellWithBorder(row, '', data.cols + 1, i + 1);

        tableContainer.appendChild(row);
    }

    addRowWithBorderCells(tableContainer, data.cols + 2, data.rows + 1);

    getDataCrossword().then(questionsAndAnswers => {
        for (let i = 0; i < tableResult.length; i++) {
            let cellArrow = findCellByCoordinates(tableContainer, tableResult[i].startx, tableResult[i].starty).querySelector('input');
            let question = getQuestionByAnswer(tableResult[i].answer, questionsAndAnswers);

            if (tableResult[i].orientation === 'down') {
                let cellText = findCellByCoordinates(tableContainer, tableResult[i].startx, tableResult[i].starty - 1);
                cellText.style.backgroundColor = 'grey';
                cellText.style.fontSize = '0.1em';
                cellText.style.overflow = 'hidden';
                cellText.style.fontWeight = 'bold';
                cellText.style.lineHeight = '1';
                cellText.innerHTML = question;

                cellText.addEventListener('mouseenter', function (e) {
                    const tooltip = document.createElement('div');
                    tooltip.textContent = this.innerHTML;
                    tooltip.classList.add('tooltip');
                    document.body.appendChild(tooltip);

                    const x = e.clientX - 25;
                    const y = e.clientY - 50;

                    tooltip.style.top = y + 'px';
                    tooltip.style.left = x + 'px';
                });

                cellText.addEventListener('mouseleave', function () {
                    const tooltip = document.querySelector('.tooltip');
                    if (tooltip) {
                        tooltip.remove();
                    }
                });

                cellArrow.style.backgroundImage = 'url(' + assetPath + 'img/arrow-down.png)';
                cellArrow.style.backgroundRepeat = 'no-repeat';
                cellArrow.style.backgroundPosition = '50% 0%';
            } else {
                let cellText = findCellByCoordinates(tableContainer, tableResult[i].startx - 1, tableResult[i].starty);
                cellText.style.backgroundColor = 'grey';
                cellText.style.fontSize = '0.5em';
                cellText.style.overflow = 'hidden';
                cellText.style.fontWeight = 'bold';
                cellText.style.lineHeight = '1';
                cellText.innerHTML = question;

                cellText.addEventListener('mouseenter', function (e) {
                    const tooltip = document.createElement('div');
                    tooltip.textContent = this.innerHTML;
                    tooltip.classList.add('tooltip');
                    document.body.appendChild(tooltip);

                    const x = e.clientX - 25;
                    const y = e.clientY - 50;

                    tooltip.style.top = y + 'px';
                    tooltip.style.left = x + 'px';
                });

                cellText.addEventListener('mouseleave', function () {
                    const tooltip = document.querySelector('.tooltip');
                    if (tooltip) {
                        tooltip.remove();
                    }
                });

                cellArrow.style.backgroundImage = 'url(' + assetPath + 'img/arrow-right.png)';
                cellArrow.style.backgroundRepeat = 'no-repeat';
                cellArrow.style.backgroundPosition = '0% 50%';
            }
        }

    });

    return tableContainer;
}

function getQuestionByAnswer(answer, questionsAndAnswers) {
    for (let i = 0; i < questionsAndAnswers.length; i++) {
        if (questionsAndAnswers[i].answer === answer) {
            return questionsAndAnswers[i].question;
        }
    }

    return null;
}

function getDataCrossword() {
    return fetch('/api/crossword-data')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            return data.crossword;
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            return null;
        });
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
    cell.className = 'border border-solid border-black text-xl text-center';
    cell.style.backgroundColor = 'black';
    cell.textContent = content;
    cell.setAttribute('x', x);
    cell.setAttribute('y', y);
    row.appendChild(cell);
}

function findCellByCoordinates(tableContainer, x, y) {
    return tableContainer.querySelector(`div[x="${x}"][y="${y}"]`);
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
            let answers = data.crossword.map(item => item.answer);
            console.log(answers);
            answers = shuffleArray(answers);
            const crossWord = createCrossWord(convert_to_json(answers));
            console.log(crossWord.table);
            console.log(crossWord.result);

            return crossWord;
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
            return null;
        });
}

function hideOverlay() {
    const overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
}

export function displayCrossword() {
    generateCrossword()
        .then(crossword => {
            if (!crossword) return;
            const container = document.getElementById('content');
            container.appendChild(createHTMLTable(crossword));

            initializeCrosswordInputs(crossword.result);

            getHoliday().then(holiday => {
                holiday = holiday.toLowerCase();
                displaySolution(holiday);
                processHolidayWords(holiday);
            }).catch(error => {
                console.error('Error:', error);
            });

            const containerWidth = container.clientWidth;
            const containerHeight = container.clientHeight;
            const cellSize = Math.min(containerWidth / (crossword.cols + 2), containerHeight / (crossword.rows + 2));

            const tableContainer = document.getElementById('tableContainer');
            const tableRows = tableContainer.querySelectorAll('div');
            tableRows.forEach(function (row) {
                const cells = row.querySelectorAll('div');
                cells.forEach(function (cell) {
                    cell.style.width = cellSize + 'px';
                    cell.style.height = cellSize + 'px';
                });
            });

            setTimeout(function() {
                hideOverlay();
            }, 1200);
        });
}

function unCheck(result) {
    if (result.orientation === "down") {
        for (let i = 0; i < result.answer.length; i++) {
            const element = document.querySelector(`input[x="${result.startx}"][y="${result.starty + i}"]`);
            element.style.backgroundColor = 'white';
        }
    } else {
        for (let i = 0; i < result.answer.length; i++) {
            const element = document.querySelector(`input[x="${result.startx + i}"][y="${result.starty}"]`);
            element.style.backgroundColor = 'white';
        }
    }
}

function initializeCrosswordInputs(crossword) {
    console.log(crossword);
    crossword.forEach((result) => {
        const xValue = result.startx;
        const yValue = result.starty;
        const element = document.querySelector(`input[x="${xValue}"][y="${yValue}"]`);

        element.addEventListener('click', function () {
            const resultConst = result;
            console.log(globalResult);

            if (globalResult !== resultConst || globalResult.length === 0) {
                if (globalResult.length !== 0)
                    unCheck(globalResult);
                globalResult = resultConst;

                if (resultConst.orientation === "down") {
                    for (let i = 0; i < resultConst.answer.length; i++) {
                        const element = document.querySelector(`input[x="${resultConst.startx}"][y="${resultConst.starty + i}"]`);
                        element.style.backgroundColor = "Gainsboro";
                        element.addEventListener('input', function (event) {
                            let nextInput = document.querySelector(`input[x="${resultConst.startx}"][y="${resultConst.starty + i + 1}"]`);
                            if (nextInput) {
                                if (nextInput.value.length !== 0) {
                                    let j = 1;
                                    do {
                                        nextInput = document.querySelector(`input[x="${resultConst.startx}"][y="${resultConst.starty + i + 1 + j}"]`);
                                        j++;
                                    } while (nextInput && nextInput.value.length !== 0);
                                }
                                nextInput.focus();
                            }
                        });
                    }
                } else {
                    for (let i = 0; i < resultConst.answer.length; i++) {
                        const element = document.querySelector(`input[x="${resultConst.startx + i}"][y="${resultConst.starty}"]`);
                        element.style.backgroundColor = "Gainsboro";
                        element.addEventListener('input', function (event) {
                            let nextInput = document.querySelector(`input[x="${resultConst.startx + i + 1}"][y="${resultConst.starty}"]`);
                            if (nextInput) {
                                if (nextInput.value.length !== 0) {
                                    let j = 1;
                                    do {
                                        nextInput = document.querySelector(`input[x="${resultConst.startx + i + 1 + j}"][y="${resultConst.starty}"]`);
                                        j++;
                                    } while (nextInput && nextInput.value.length !== 0);
                                }
                                nextInput.focus();
                            }
                        });
                    }
                }
            }
        })
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

export function showNewDiv(timeDiff) {
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

function displaySolution(holiday) {
    const divWordTemplate = document.createElement('div');
    divWordTemplate.className = 'border border-solid border-black text-xl text-center';
    divWordTemplate.style.backgroundColor = 'white';
    divWordTemplate.style.width = '31.9583px'; //TODO
    divWordTemplate.style.height = '31.9583px';
    divWordTemplate.style.position = 'relative';

    const divSpaceTemplate = document.createElement('div');
    divSpaceTemplate.style.backgroundColor = 'white';
    divSpaceTemplate.style.width = '31.9583px';
    divSpaceTemplate.style.height = '31.9583px';

    let words = holiday.split(' ');
    let solutionHTML = '';
    let positionLetter = 1;
    words.forEach((word, index) => {
        for (let i = 0; i < word.length; i++) {
            let divWord = divWordTemplate.cloneNode(true);
            const backgroundDiv = document.createElement('div');
            backgroundDiv.style.position = 'absolute';
            backgroundDiv.style.fontSize = '10px';
            backgroundDiv.style.display = 'block';
            backgroundDiv.style.marginBlockStart = '-1em';
            backgroundDiv.style.marginBlockEnd = '1em';
            backgroundDiv.style.marginInlineStart = '0px';
            backgroundDiv.style.marginInlineEnd = '0px';
            backgroundDiv.style.right = '0';
            backgroundDiv.style.top = '0';
            backgroundDiv.style.fontWeight = 'bold';
            backgroundDiv.textContent = positionLetter;
            backgroundDiv.classList.add('unselectable');
            divWord.appendChild(backgroundDiv);
            const input = document.createElement('input');
            input.type = 'text';
            input.className = 'text-xl text-center';
            input.style.width = '100%';
            input.style.height = '100%';
            input.style.fontSize = '18px';
            input.style.backgroundColor = 'white';
            input.maxLength = 1;
            //input.setAttribute('letter', word[i]);
            input.setAttribute('positionLetter', positionLetter);
            divWord.appendChild(input);
            solutionHTML += divWord.outerHTML;
            positionLetter++;
        }
        if (index < words.length - 1) {
            solutionHTML += divSpaceTemplate.outerHTML;
        }
    });

    document.getElementById('solution').innerHTML = solutionHTML;
}

function getCoordinatesToOccupied(inputElement) {
    const xValue = inputElement.getAttribute('x');
    const yValue = inputElement.getAttribute('y');
    return `(${xValue},${yValue})`;
}

function processHolidayWords(holiday) {
    const words = holiday.split(' ');
    const occupiedCoordinates = new Set();

    let positionLetter = 1;

    words.forEach((word) => {
        for (const letter of word) {
            const inputs = document.querySelectorAll(`input[letter="${letter}"]`);
            let isLetterOccupied = false;
            for (const input of inputs) {
                const coordinates = getCoordinatesToOccupied(input);
                if (!occupiedCoordinates.has(coordinates)) {
                    occupiedCoordinates.add(coordinates);
                    isLetterOccupied = true;

                    const backgroundDiv = document.createElement('div');
                    backgroundDiv.style.position = 'absolute';
                    backgroundDiv.style.fontSize = '10px';
                    backgroundDiv.style.display = 'block';
                    backgroundDiv.style.marginBlockStart = '-1em';
                    backgroundDiv.style.marginBlockEnd = '1em';
                    backgroundDiv.style.marginInlineStart = '0px';
                    backgroundDiv.style.marginInlineEnd = '0px';
                    backgroundDiv.style.right = '0';
                    backgroundDiv.style.top = '0';
                    backgroundDiv.style.fontWeight = 'bold';
                    backgroundDiv.textContent = positionLetter;
                    backgroundDiv.classList.add('unselectable');

                    input.addEventListener('input', function () {
                        let positionLetter = this.parentElement.querySelector('div').textContent;
                        const inputSolution = document.getElementById('solution').querySelector(`div input[positionletter="${positionLetter}"]`);
                        inputSolution.value = this.value;
                    });

                    positionLetter++;

                    input.parentElement.appendChild(backgroundDiv);

                    break;
                }
            }
            if (!isLetterOccupied) {
                const input = document.getElementById('solution').querySelector(`div input[positionletter="${positionLetter}"]`);
                input.value = letter;
                positionLetter++;
            }
        }
    });
}

function getHoliday() {
    return new Promise((resolve, reject) => {
        fetch('/api/crossword-data-holiday')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                resolve(data.holiday.toString());
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                reject(null);
            });
    });
}



