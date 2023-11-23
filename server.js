const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios'); // Pour faire des requêtes HTTP

const app = express();
const port = process.env.PORT || 3000;

app.use(bodyParser.json());

const openaiApiKey = process.env.OPENAI_API_KEY; // Utilisez la variable d'environnement pour stocker votre clé

app.post('/api/message', async (req, res) => {
    const userMessage = req.body.message;

    // Utilisez votre clé d'API sécurisée ici pour faire la requête à OpenAI
    const openaiResponse = await axios.post(
        'https://api.openai.com/v1/...',
        { prompt: userMessage },
        { headers: { Authorization: `Bearer ${openaiApiKey}` } }
    );

    const aiResponse = openaiResponse.data.choices[0].text.trim();
    res.json({ response: aiResponse });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
