// server.js
const express = require('express');
const cors = require('cors');
const axios = require('axios');

const app = express();
app.use(cors());
app.use(express.json());

const PORT = 3001;
const API_KEY = 'ijHDaIjug0SFyNRaPUXsyGdyJrKXz6mf';

app.post('/chat', async (req, res) => {
    try {
        const userMessage = req.body.message;

        const response = await axios.post(
            'https://api.mistral.ai/v1/chat/completions',
            {
                model: 'mistral-small', // ou medium / large selon ton plan
                messages: [
                    { role: 'system', content: 'Tu es un assistant utile.' },
                    { role: 'user', content: userMessage },
                ],
            },
            {
                headers: {
                    Authorization: `Bearer ${API_KEY}`,
                    'Content-Type': 'application/json',
                },
            }
        );

        const botReply = response.data.choices[0].message.content;
        res.json({ reply: botReply });
    } catch (error) {
        console.error(error.response?.data || error.message);
        res.status(500).json({ error: 'Erreur serveur Mistral' });
    }
});

app.listen(PORT, () => {
    console.log(`Serveur backend Mistral démarré sur http://localhost:${PORT}`);
});
