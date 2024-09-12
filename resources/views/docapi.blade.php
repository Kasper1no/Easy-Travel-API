<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Документація</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: fit-content;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1,
        h2,
        h3,
        h4 {
            color: #333;
        }

        h4{
            background-color: #4566de;
            padding: 10px;
            border-radius: 5px;
            width: fit-content;
        }

        code {
            background-color: #f4f4f4;
            padding: 2px 4px;
            border-radius: 4px;
        }

        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .endpoint {
            margin-bottom: 20px;
        }

        .method {
            font-weight: bold;
        }

        .response,
        .request {
            margin: 10px 0;
        }

        .status-codes,
        .faq {
            margin-top: 30px;
        }

        .status-codes table,
        .faq table {
            width: 100%;
            border-collapse: collapse;
        }

        .status-codes th,
        .status-codes td,
        .faq th,
        .faq td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .status-codes th {
            background-color: #f2f2f2;
        }

        .accordion {
            background-color: #eee;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
            font-weight: bold;
        }

        .accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .accordion.active:after {
            content: "\2212";
        }

        .panel {
            display: none;
            padding: 0 18px;
            background-color: white;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            border: 1px solid #ddd;
            border-top: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>API Документація</h1>

        <h2>Вступ</h2>
        <p>Ця документація описує API для туристичного сервісу. API надає можливість інтеграції з системою для управління турами, країнами, містами, готелями та замовленнями.</p>

        <h2>Основні концепції</h2>
        <ul>
            <li><strong>Базовий URL:</strong> <code>https://127.0.0.1:8000/api</code></li>
        </ul>

        <h2>Ресурси API</h2>

        <button class="accordion">1. Тури (Tours)</button>
        <div class="panel">
            <div class="endpoint">
                <h4>Отримати список турів</h4>
                <p class="method">Метод: GET</p>
                <p>Endpoint: <code>/tours</code></p>
                <p>Опис: Повертає список всіх турів.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>GET /tours  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>[
  {
    "id": 1,
    "name": "Tour A",
    "description": "Description of Tour A",
    "price": 100.00
  },
  {
    "id": 2,
    "name": "Tour B",
    "description": "Description of Tour B",
    "price": 200.00
  }
]</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Отримати тур за ID</h4>
                <p class="method">Метод: GET</p>
                <p>Endpoint: <code>/tours/{id}</code></p>
                <p>Опис: Повертає інформацію про тур за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>GET /tours/1  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "id": 1,
  "name": "Tour A",
  "description": "Description of Tour A",
  "price": 100.00
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Створити новий тур</h4>
                <p class="method">Метод: POST</p>
                <p>Endpoint: <code>/tours</code></p>
                <p>Опис: Створює новий тур.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>POST /tours  
Host:  https://127.0.0.1:8000/api
Content-Type: application/json

{
  "name": "New Tour",
  "description": "Description of New Tour",
  "count_persons": 10,
  "transport": "Bus",
  "price": 150.00,
  "time_from": "2024-07-01",
  "time_to": "2024-07-10",
  "visa": true,
  "insurance": true,
  "transfer": true,
  "img": "example.jpg",
  "images": [1, 2, 3]
}</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "tour": {
    "id": 3,
    "name": "New Tour",
    "description": "Description of New Tour",
    "count_persons": 10,
    "transport": "Bus",
    "price": 150.00,
    "time_from": "2024-07-01",
    "time_to": "2024-07-10",
    "visa": true,
    "insurance": true,
    "transfer": true,
    "img": "example.jpg"
  }
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Оновити тур</h4>
                <p class="method">Метод: PUT</p>
                <p>Endpoint: <code>/tours/{id}</code></p>
                <p>Опис: Оновлює інформацію про тур за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>PUT /tours/1  
Host:  https://127.0.0.1:8000/api
Content-Type: application/json

{
  "name": "Updated Tour",
  "description": "Updated description of Tour",
  "count_persons": 8,
  "transport": "Train",
  "price": 120.00,
  "time_from": "2024-08-01",
  "time_to": "2024-08-10",
  "visa": false,
  "insurance": true,
  "transfer": false,
  "img": "example.jpg"
}</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "id": 1,
  "name": "Updated Tour",
  "description": "Updated description of Tour",
  "count_persons": 8,
  "transport": "Train",
  "price": 120.00,
  "time_from": "2024-08-01",
  "time_to": "2024-08-10",
  "visa": false,
  "insurance": true,
  "transfer": false,
  "img": "example.jpg"
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Видалити тур</h4>
                <p class="method">Метод: DELETE</p>
                <p>Endpoint: <code>/tours/{id}</code></p>
                <p>Опис: Видаляє тур за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>DELETE /tours/1  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "message": "Tour deleted successfully"
}</code></pre>
                </div>
            </div>
        </div>

        <button class="accordion">2. Країни (Countries)</button>
        <div class="panel">
            <div class="endpoint">
                <h4>Отримати список країн</h4>
                <p class="method">Метод: GET</p>
                <p>Endpoint: <code>/countries</code></p>
                <p>Опис: Повертає список всіх країн.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>GET /countries  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>[
  {
    "id": 1,
    "name": "Country A"
  },
  {
    "id": 2,
    "name": "Country B"
  }
]</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Отримати країну за ID</h4>
                <p class="method">Метод: GET</p>
                <p>Endpoint: <code>/countries/{id}</code></p>
                <p>Опис: Повертає інформацію про країну за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>GET /countries/1  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "id": 1,
  "name": "Country A"
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Створити нову країну</h4>
                <p class="method">Метод: POST</p>
                <p>Endpoint: <code>/countries</code></p>
                <p>Опис: Створює нову країну.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>POST /countries  
Host:  https://127.0.0.1:8000/api
Content-Type: application/json

{
  "name": "New Country"
}</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "country": {
    "id": 3,
    "name": "New Country"
  }
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Оновити країну</h4>
                <p class="method">Метод: PUT</p>
                <p>Endpoint: <code>/countries/{id}</code></p>
                <p>Опис: Оновлює інформацію про країну за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>PUT /countries/1  
Host:  https://127.0.0.1:8000/api
Content-Type: application/json

{
  "name": "Updated Country"
}</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "id": 1,
  "name": "Updated Country"
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Видалити країну</h4>
                <p class="method">Метод: DELETE</p>
                <p>Endpoint: <code>/countries/{id}</code></p>
                <p>Опис: Видаляє країну за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>DELETE /countries/1  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "message": "Country deleted successfully"
}</code></pre>
                </div>
            </div>
        </div>

        <button class="accordion">3. Міста (Cities)</button>
        <div class="panel">
            <div class="endpoint">
                <h4>Отримати список міст</h4>
                <p class="method">Метод: GET</p>
                <p>Endpoint: <code>/cities</code></p>
                <p>Опис: Повертає список всіх міст.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>GET /cities  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>[
  {
    "id": 1,
    "name": "City A",
    "country_id": 1
  },
  {
    "id": 2,
    "name": "City B",
    "country_id": 2
  }
]</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Отримати місто за ID</h4>
                <p class="method">Метод: GET</p>
                <p>Endpoint: <code>/cities/{id}</code></p>
                <p>Опис: Повертає інформацію про місто за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>GET /cities/1  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "id": 1,
  "name": "City A",
  "country_id": 1
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Створити нове місто</h4>
                <p class="method">Метод: POST</p>
                <p>Endpoint: <code>/cities</code></p>
                <p>Опис: Створює нове місто.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>POST /cities  
Host:  https://127.0.0.1:8000/api
Content-Type: application/json

{
  "name": "New City",
  "country_id": 1
}</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "city": {
    "id": 3,
    "name": "New City",
    "country_id": 1
  }
}</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Оновити місто</h4>
                <p class="method">Метод: PUT</p>
                <p>Endpoint: <code>/cities/{id}</code></p>
                <p>Опис: Оновлює інформацію про місто за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>PUT /cities/1  
Host:  https://127.0.0.1:8000/api
Content-Type: application/json

{
  "name": "Updated City",
  "country_id": 2
}</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
                    "id": 1,
                    "name": "Updated City",
                    "country_id": 2
                    }</code></pre>
                </div>
            </div>

            <div class="endpoint">
                <h4>Видалити місто</h4>
                <p class="method">Метод: DELETE</p>
                <p>Endpoint: <code>/cities/{id}</code></p>
                <p>Опис: Видаляє місто за вказаним ID.</p>

                <div class="request">
                    <h5>Запит</h5>
                    <pre><code>DELETE /cities/1  
Host:  https://127.0.0.1:8000/api
</code></pre>
                </div>

                <div class="response">
                    <h5>Відповідь</h5>
                    <pre><code>{
  "message": "City deleted successfully"
}</code></pre>
                </div>
            </div>
        </div>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        for (var i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>