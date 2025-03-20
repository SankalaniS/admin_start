<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .chat-container {
            display: flex;
            height: 65vh;
            max-width: 500px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            overflow: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .chat-list {
            width: 45%;
            background: #343a40;
            color: white;
            overflow-y: auto;
            padding: 5px;
        }
        .chat-list .user-item {
            padding: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }
        .chat-list .user-item:hover {
            background: #495057;
        }
        .user-item img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .chat-box {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            padding: 8px;
            background: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 14px;
        }
        .chat-messages {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
            background: #f1f1f1;
            display: flex;
            flex-direction: column;
            font-size: 13px;
        }
        .message {
            padding: 6px 10px;
            border-radius: 15px;
            margin-bottom: 5px;
            max-width: 75%;
        }
        .message.admin {
            background: #007bff;
            color: white;
            align-self: flex-end;
        }
        .message.user {
            background: #ffffff;
            border: 1px solid #ddd;
            align-self: flex-start;
        }
        .chat-input {
            display: flex;
            padding: 8px;
            background: white;
            border-top: 1px solid #ddd;
        }
        .chat-input input {
            flex-grow: 1;
            border: none;
            padding: 7px;
            outline: none;
            font-size: 13px;
        }
        .chat-input button {
            background: #007bff;
            color: white;
            border: none;
            padding: 7px 10px;
            border-radius: 5px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="chat-container">
        <!-- Chat List -->
        <div class="chat-list">
            <h6 class="text-center">Chats</h6>
            <div class="user-item" onclick="openChat('Nora S. Vans')">
                <img src="./images/nora new.jpg" alt="Nora">
                <div>
                    <strong>Nora S. Vans</strong><br>
                    <small>Where is your new update?</small>
                </div>
            </div>
            <div class="user-item" onclick="openChat('John K.')">
                <img src="./images/John.jpg" alt="John">
                <div>
                    <strong>John K.</strong><br>
                    <small>Can we discuss the project?</small>
                </div>
            </div>
            <div class="user-item" onclick="openChat('Emily D.')">
                <img src="./images/emily.jpg" alt="Emily">
                <div>
                    <strong>Emily D.</strong><br>
                    <small>Thanks for your help!</small>
                </div>
            </div>
        </div>

        <!-- Chat Box -->
        <div class="chat-box">
            <div class="chat-header" id="chatHeader">Select a chat</div>
            <div class="chat-messages" id="chatMessages">
                <p class="text-muted text-center">No chat selected</p>
            </div>
            <div class="chat-input">
                <input type="text" id="messageInput" placeholder="Type a message..." disabled>
                <button id="sendBtn" disabled>Send</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentUser = "";
    const chatHistories = {
        "Nora S. Vans": [
            { sender: "user", text: "Hey, do you have the latest update?" },
            { sender: "admin", text: "Yes, I sent it yesterday." },
            { sender: "user", text: "Great, thanks!" }
        ],
        "John K.": [
            { sender: "user", text: "Can we discuss the project?" },
            { sender: "admin", text: "Sure, what do you need help with?" },
            { sender: "user", text: "The API integration part." }
        ],
        "Emily D.": [
            { sender: "user", text: "Thanks for your help earlier!" },
            { sender: "admin", text: "You're welcome! Let me know if you need anything else." }
        ]
    };

    function openChat(userName) {
        currentUser = userName;
        document.getElementById("chatHeader").innerText = userName;
        document.getElementById("chatMessages").innerHTML = "";

        // Load chat history
        chatHistories[userName].forEach(msg => {
            let messageDiv = document.createElement("div");
            messageDiv.className = `message ${msg.sender}`;
            messageDiv.innerText = msg.text;
            document.getElementById("chatMessages").appendChild(messageDiv);
        });

        document.getElementById("messageInput").disabled = false;
        document.getElementById("sendBtn").disabled = false;
    }

    document.getElementById("sendBtn").addEventListener("click", function () {
        let messageInput = document.getElementById("messageInput");
        let messageText = messageInput.value.trim();
        if (messageText === "") return;

        let chatMessages = document.getElementById("chatMessages");

        let messageDiv = document.createElement("div");
        messageDiv.className = "message admin";
        messageDiv.innerText = messageText;
        chatMessages.appendChild(messageDiv);

        // Save to chat history
        chatHistories[currentUser].push({ sender: "admin", text: messageText });

        messageInput.value = "";
        chatMessages.scrollTop = chatMessages.scrollHeight;
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
