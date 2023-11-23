const chatDisplay = document.getElementById('chat-display');
const userInput = document.getElementById('user-input');

function sendMessage() {
    const userMessage = userInput.value;
    displayMessage("You: " + userMessage);

    const apiKey = "org-0jAHjSyOsWOQ5KdR0GXZ2uph"; // Remplace par ta clé réelle
    fetch('https://api.openai.com/v1/chat/completions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${apiKey}`
        },
        body: JSON.stringify({
            messages: [{ role: 'system', content: 'You are a helpful assistant.' }, { role: 'user', content: userMessage }]
        })
    })
    .then(response => response.json())
    .then(data => {
        const aiReply = data.choices[0].message.content;
        displayMessage("ChatGPT: " + aiReply);
    })
    .catch(error => console.error('Error:', error));

    userInput.value = '';
}

function displayMessage(message) {
    chatDisplay.innerHTML += `<div>${message}</div>`;
}
