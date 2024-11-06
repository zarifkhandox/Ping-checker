<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ping Checker</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #c4e0e5, #e3f2fd);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .ping-container {
            text-align: center;
            padding: 30px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .ping-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .ping-button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 28px;
            font-size: 18px;
            border: none;
            border-radius: 50px;
            background-color: #0078d4;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .ping-button:hover {
            background-color: #005ea0;
            transform: scale(1.05);
        }

        .ping-result {
            margin-top: 50px; /* Increased margin for better spacing */
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            padding: 10px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .ping-result.success {
            background-color: #d4edda; /* Light green for success */
            color: #155724;
        }

        .ping-result.error {
            background-color: #f8d7da; /* Light red for errors */
            color: #721c24;
        }

        @media (max-width: 600px) {
            .ping-container {
                width: 100%;
                padding: 20px;
            }

            .ping-button {
                padding: 10px 20px;
                font-size: 16px;
            }

            .ping-result {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="ping-container">
    <h1>Ping Checker</h1>
    <p>Click the button below to measure your ping.</p>
    <button class="ping-button" onclick="measurePing()">Check Ping</button>
    <div class="ping-result" id="pingResult">Your ping will appear here</div>
</div>

<script>
    function measurePing() {
        const startTime = new Date().getTime();
        fetch(window.location.href + '?ping')
            .then(() => {
                const endTime = new Date().getTime();
                const ping = endTime - startTime;
                const resultDiv = document.getElementById('pingResult');
                resultDiv.innerText = `Your Ping: ${ping} ms`;
                resultDiv.className = 'ping-result success'; // Apply success class
            })
            .catch(() => {
                const resultDiv = document.getElementById('pingResult');
                resultDiv.innerText = 'Error measuring ping';
                resultDiv.className = 'ping-result error'; // Apply error class
            });
    }
</script>

</body>
</html>
