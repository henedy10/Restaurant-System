<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contacts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
@livewireStyles
  <style>
    body {
      background-color: #1e1e1e;
      color: #fff;
      font-family: "Cairo", sans-serif;
      height: 100vh;
      overflow: hidden;
    }
    .chat-container {
      display: flex;
      height: 100vh;
    }
    .sidebar {
      background-color: #2b2b2b;
      width: 30%;
      border-left: 1px solid #444;
      display: flex;
      flex-direction: column;
    }
    .chat-list {
      flex: 1;
      overflow-y: auto;
    }
    .chat-item {
      padding: 10px 15px;
      cursor: pointer;
      border-bottom: 1px solid #444;
    }
    .chat-item:hover, .chat-item.active {
      background-color: #3b3b3b;
    }
    .chat-box {
      background-color: #1e1e1e;
      width: 70%;
      display: flex;
      flex-direction: column;
      border-left: 1px solid #444;
    }
    .chat-header {
      background-color: #2b2b2b;
      padding: 15px;
      border-bottom: 1px solid #444;
    }
    .chat-messages {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      background-color: #1e1e1e;
    }
    .message {
      max-width: 70%;
      padding: 10px 15px;
      border-radius: 15px;
      margin-bottom: 10px;
      word-wrap: break-word;
    }
    .message.sent {
      background-color: #ffc107;
      color: #000;
      align-self: flex-end;
    }
    .message.received {
      background-color: #2b2b2b;
      color: #fff;
      align-self: flex-start;
    }
    .chat-input {
      background-color: #2b2b2b;
      padding: 10px;
      border-top: 1px solid #444;
    }
    .chat-input input {
      background-color: #1e1e1e;
      border: none;
      color: #fff;
    }
    .chat-input input:focus {
      box-shadow: none;
      border-color: #ffc107;
    }
    .chat-input button {
      background-color: #ffc107;
      border: none;
      color: #000;
    }
  </style>
</head>
<body>

    @livewire('contact')

@livewireScripts
</body>
</html>
