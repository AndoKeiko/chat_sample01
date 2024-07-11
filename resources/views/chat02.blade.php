<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemini Chat</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div id="chat-container">
        <div id="chat-messages"></div>
        <input type="text" id="user-input" placeholder="メッセージを入力...">
        <button onclick="sendMessage()">送信</button>
    </div>

    <script>
        function sendMessage() {
            const input = document.getElementById('user-input');
            const message = input.value;
            input.value = '';

            displayMessage('あなた: ' + message);

            axios.post('/chat02', { message: message })
                .then(function (response) {
                    displayMessage('Gemini: ' + response.data.response);
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
        }

        function displayMessage(message) {
            const chatMessages = document.getElementById('chat-messages');
            const messageElement = document.createElement('p');
            messageElement.textContent = message;
            chatMessages.appendChild(messageElement);
        }
    </script>
</body>
</html>