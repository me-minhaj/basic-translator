<!DOCTYPE HTML>
<HTML>
<head>
    <title>Google Translate Website</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f2f2f2;
        }

        #container {
            width: 800px;
            margin: 0 auto;
            /* margin-bottom: 200px !important; */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px #ccc;
        }

        #left-panel {
            float: left;
            width: 40%;
            padding: 10px;
        }

        #right-panel {
            float: right;
            width: 40%;
            padding: 10px;
        }

        #input-box {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #output-box {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #language-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #0099ff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        #input-box {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1 style="text-align: center;">Google Translate Website</h1>
        <div id="left-panel">
            <h3>Input</h3>
            <input type="text" id="input-box" placeholder="Enter text to translate...">
            <select id="language-select">
                <option value="af">Afrikaans</option>
                <option value="sq">Albanian</option>
                <option value="am">Amharic</option>
                <option value="ar">Arabic</option>
                <option value="hy">Armenian</option>
                <option value="az">Azerbaijani</option>
                <option value="eu">Basque</option>
                <option value="be">Belarusian</option>
                <option value="bn">Bengali</option>
                <option value="bs">Bosnian</option>
                <option value="bg">Bulgarian</option>
                <option value="ca">Catalan</option>
                <option value="zh-CN">Chinese (Simplified)</option>
                <option value="zh-TW">Chinese (Traditional)</option>
                <option value="hr">Croatian</option>
                <option value="cs">Czech</option>
                <option value="da">Danish</option>
                <option value="nl">Dutch</option>
                <option value="en" selected>English</option>
                <option value="eo">Esperanto</option>
                <option value="et">Estonian</option>
                <option value="fr">French</option>
                <option value="tl">Filipino</option>
                <option value="fi">Finnish</option>
                <option value="de">German</option>
                <option value="gl">Galician</option>
                <option value="ka">Georgian</option>
                <option value="el">Greek</option>
                <option value="gu">Gujarati</option>
                <option value="ht">Haitian Creole</option>
                <option value="iw">Hebrew</option>
                <option value="hi">Hindi</option>
                <option value="hu">Hungarian</option>
                <option value="it">Italian</option>
                <option value="is">Icelandic</option>
                <option value="id">Indonesian</option>
                <option value="ga">Irish</option>
                <option value="ja">Japanese</option>
                <option value="kn">Kannada</option>
                <option value="ko">Korean</option>
                <option value="la">Latin</option>
                <option value="lv">Latvian</option>
                <option value="lt">Lithuanian</option>
                <option value="mk">Macedonian</option>
                <option value="ms">Malay</option>
                <option value="mt">Maltese</option>
                <option value="no">Norwegian</option>
                <option value="fa">Persian</option>
                <option value="pl">Polish</option>
                <option value="pt">Portuguese</option>
                <option value="ro">Romanian</option>
                <option value="ru">Russian</option>
                <option value="es">Spanish</option>
                <option value="sr">Serbian</option>
                <option value="sk">Slovak</option>
                <option value="sl">Slovenian</option>
                <option value="sw">Swahili</option>
                <option value="sv">Swedish</option>
                <option value="ta">Tamil</option>
                <option value="te">Telugu</option>
                <option value="th">Thai</option>
                <option value="tr">Turkish</option>
                <option value="uk">Ukrainian</option>
                <option value="ur">Urdu</option>
                <option value="vi">Vietnamese</option>
                <option value="cy">Welsh</option>
                <option value="yi">Yiddish</option>
            </select>
            <div class="submit_btn">
                <button id="submit-btn">Translate</button>
            </div>
        </div>
        <div id="right-panel">
            <h3>Output</h3>
            <textarea id="output-box" placeholder="Translated text will appear here..."></textarea>
        </div>
    </div>

    <script>
        // Get the input and output elements
        const inputBox = document.getElementById('input-box');
        const outputBox = document.getElementById('output-box');
        const languageSelect = document.getElementById('language-select');
        const submitBtn = document.getElementById('submit-btn');

        // Add an event listener to the submit button
        submitBtn.addEventListener('click', () => {
            // Get the input text and the selected language
            const inputText = inputBox.value;
            const language = languageSelect.value;

            // Make a request to the Google Translate API
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=${language}&dt=t&q=${inputText}`);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    // Parse the response and get the translated text
                    const response = JSON.parse(xhr.responseText);
                    const translatedText = response[0][0][0];

                    // Update the output box with the translated text
                    outputBox.value = translatedText;
                }
            };
            xhr.send();
        });
    </script>
</body>
</HTML>