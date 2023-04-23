<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ChatGPT Example</title>
  </head>
  <body>
    <h1>ChatGPT Example</h1>
    <div id="chat"></div>
    <script src="https://cdn.jsdelivr.net/npm/@openai/chat-api@1.0.0-beta.3/dist/chat.js"></script>
    <script>
      const model = 'text-davinci-002';
      const prompt = 'Hello!';
      const apiKey = 'A';

      const chat = new OpenAIChat({
        model: model,
        apiKey: apiKey,
        container: document.getElementById('chat')
      });

      chat.addUserMessage(prompt);
    </script>
  </body>
</html>